<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FamilyRequest;
use App\Models\Family;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

final class PageController
{
    public function home(): Factory|View
    {
        return view('home');
    }

    public function family(): View
    {
        $families = Cache::remember('family.all', 24 * 60 * 60, fn () => Family::with('father', 'mother')->get());

        $mainPerson = null;

        if (auth()->user()) {
            $mainPerson = Family::query()->where('email', auth()->user()->email)->first();
        }

        if ($mainPerson) {
            $mainId = $mainPerson->id;
        } else {
            $randomPerson = Family::query()->inRandomOrder()->first();
            $mainId = $randomPerson->id;
        }

        $data = [];

        foreach ($families as $family) {
            $data[] = [
                'id' => (int) $family->id,
                'data' => [
                    'fn' => $family->first_name,
                    'ln' => $family->last_name,
                    'phone' => $family->phone,
                    'label' => $family->name(),
                    'avatar' => $family->thumbnailPath() === null ? asset('assets/images/avatar.png') : asset($family->thumbnailPath()),
                    'gender' => $family->gender,
                ],
                'rels' => [
                    'father' => $family->father_id ? (int) $family->father_id : null,
                    'mother' => $family->mother_id ? (int) $family->mother_id : null,
                    'spouses' => $family->spouse,
                    'children' => $family->getChildrensId(),
                ],
                'main' => false,
            ];
        }

        return view('page.family', ['data' => json_encode($data), 'mainId' => $mainId]);
    }

    public function searchFamily(): Factory|View
    {
        return view('page.family-search');
    }

    public function searchFamilyData(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'q' => 'required|string',
        ]);

        $q = (string) $validated['q'];

        $totalMembers = Family::query()->count();

        $families = Family::query()
            ->where('first_name', 'LIKE', "%$q%")
            ->orWhere('middle_name', 'LIKE', "%$q%")
            ->orWhere('last_name', 'LIKE', "%$q%")
            ->orWhere('email', 'LIKE', "%$q%")
            ->orWhere('phone', 'LIKE', "%$q%")
            ->orWhere('address', 'LIKE', "%$q%")
            ->orWhere('dob', 'LIKE', "%$q%")
            ->inRandomOrder()
            ->get();

        $results = [];
        $results['total'] = $totalMembers;

        foreach ($families as $family) {
            $results['data'][] = [
                'id' => $family->id,
                'name' => $family->name(),
                'thumbnail' => $family->thumbnailPath(),
                'gender' => $family->gender,
                'phone' => $family->phone ?? '-',
                'address' => $family->address ?? '-',
                'updated_at' => $family->updated_at ? $family->updated_at->diffForHumans() : null,
            ];
        }

        return response()->json($results);
    }

    public function showFamily(Family $family): Factory|View
    {
        return view('page.family-show', ['family' => $family]);
    }

    public function editFamily(Family $family): Factory|View
    {
        if (auth()->user()->cannot('update', $family)) {
            abort(403);
        }

        $fathers = Family::query()->where('gender', 'M')->get(['id', 'first_name', 'middle_name', 'last_name', 'avatar']);
        $mothers = Family::query()->where('gender', 'F')->get(['id', 'first_name', 'middle_name', 'last_name', 'avatar']);
        $spouse = Family::query()->get(['id', 'first_name', 'middle_name', 'last_name', 'avatar']);

        $f = [];
        foreach ($fathers as $father) {
            $f[$father->id] = ['text' => $father->name(), 'image' => $father->thumbnailPath()];
        }

        $m = [];
        foreach ($mothers as $mother) {
            $m[$mother->id] = ['text' => $mother->name(), 'image' => $mother->thumbnailPath()];
        }

        $s = [];
        foreach ($spouse as $item) {
            $s[$item->id] = ['text' => $item->name(), 'image' => $item->thumbnailPath()];
        }

        return view('page.family-edit', ['family' => $family, 'fathers' => $f, 'mothers' => $m, 'spouse' => $s]);
    }

    public function updateFamily(Family $family, FamilyRequest $request): RedirectResponse
    {
        if (auth()->user()->cannot('update', $family)) {
            abort(403);
        }

        $data = $request->validated();
        $fName = $data['first_name'];

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // process original image
            $filename = Str::slug($fName).'-'.Str::random(8);
            $thumbImage = Image::read($file)->scaleDown(300, 300);

            $file->move(public_path('avatar'), $filename.'.'.$file->getClientOriginalExtension());
            $data['avatar'] = 'avatar/'.$filename.'.'.$file->getClientOriginalExtension();

            // process thumbnail
            $thumbFilename = 'thumb-'.$filename.'.'.$file->getClientOriginalExtension();
            Storage::disk('public_avatar')->put("thumbnail/$thumbFilename", $thumbImage->encodeByExtension($file->getClientOriginalExtension(), quality: 90));

            // Delete old avatar file
            $this->deleteAvatar($family);
        }

        if ($request->filled('spouse')) {
            $data['spouse'] = json_encode($request->input('spouse'));
        }

        $family->update($data);

        return redirect()->route('page.family.show', $family->id)->with('success', 'Member updated successfully!');
    }

    private function deleteAvatar(Family $family): void
    {
        Storage::disk('public_avatar')->delete($family->avatarFilename());
        Storage::disk('public_avatar')->delete($family->avatarThumbnailFilename());
    }
}
