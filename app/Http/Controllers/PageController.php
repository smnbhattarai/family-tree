<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FamilyRequest;
use App\Http\Requests\FamilyTreeRequest;
use App\Http\Requests\RelationshipRequest;
use App\Models\Family;
use App\Services\BirthdayCalendar;
use App\Services\FamilyStats;
use App\Services\RelationshipFinder;
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
    public function home(BirthdayCalendar $calendar, FamilyStats $stats): Factory|View
    {
        return view('home', [
            'birthdays' => auth()->check() ? $calendar->upcoming(30)->take(6) : collect(),
            'stats' => auth()->check() ? $stats->summary() : null,
        ]);
    }

    public function birthdays(BirthdayCalendar $calendar): View
    {
        return view('page.birthdays', [
            'birthdaysByMonth' => $calendar->upcoming(365)->groupBy(fn (array $birthday): string => $birthday['date']->format('F Y')),
        ]);
    }

    public function family(FamilyTreeRequest $request): View
    {
        $families = Cache::remember('family.all', 24 * 60 * 60, fn () => Family::with('father', 'mother')->get());

        if ($families->isEmpty()) {
            return view('page.family', ['data' => '[]', 'mainId' => null]);
        }

        $mainPerson = ($request->filled('focus') ? $families->firstWhere('id', $request->integer('focus')) : null)
            ?? $families->firstWhere('email', auth()->user()->email)
            ?? $families->random();
        $mainId = (int) $mainPerson->id;

        $childrenIdsByParent = [];

        foreach ($families as $family) {
            foreach (array_unique(array_filter([$family->father_id, $family->mother_id])) as $parentId) {
                $childrenIdsByParent[(int) $parentId][] = (int) $family->id;
            }
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
                    'children' => $childrenIdsByParent[(int) $family->id] ?? [],
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
            ->orderBy('first_name')
            ->orderBy('middle_name')
            ->orderBy('last_name')
            ->orderBy('id')
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

    public function relationship(RelationshipRequest $request, RelationshipFinder $finder): View
    {
        $members = [];

        foreach (Family::query()->orderBy('first_name')->orderBy('last_name')->get(['id', 'first_name', 'middle_name', 'last_name', 'avatar']) as $member) {
            $members[$member->id] = ['text' => $member->name(), 'image' => $member->thumbnailPath()];
        }

        $subject = $request->filled('from')
            ? Family::query()->find($request->integer('from'))
            : Family::query()->where('email', auth()->user()->email)->first();

        $relative = $request->filled('to') ? Family::query()->find($request->integer('to')) : null;

        return view('page.relationship', [
            'members' => $members,
            'subject' => $subject,
            'relative' => $relative,
            'result' => $subject && $relative ? $finder->find($subject, $relative) : null,
        ]);
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

        $data['spouse'] = json_encode(array_values(array_map('intval', (array) $request->input('spouse', []))));

        $family->update($data);

        return redirect()->route('page.family.show', $family->id)->with('success', 'Member updated successfully!');
    }

    private function deleteAvatar(Family $family): void
    {
        Storage::disk('public_avatar')->delete($family->avatarFilename());
        Storage::disk('public_avatar')->delete($family->avatarThumbnailFilename());
    }
}
