<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FamilyRequest;
use App\Models\Family;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

final class FamilyController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory
    {
        $families = Cache::remember('family.all', 24 * 60 * 60, fn () => Family::with('father', 'mother')->get());

        return view('admin.family.index', ['families' => $families]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View
    {
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

        return view('admin.family.create', ['fathers' => $f, 'mothers' => $m, 'spouse' => $s]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyRequest $request): RedirectResponse
    {
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
        }

        if ($request->filled('spouse')) {
            $data['spouse'] = json_encode($request->input('spouse'));
        }

        Family::query()->create($data);

        return redirect()->route('admin.family.index')->with('success', 'Member added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family): Factory|View
    {
        return view('admin.family.show', ['family' => $family]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family): Factory|View
    {
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

        return view('admin.family.edit', ['family' => $family, 'fathers' => $f, 'mothers' => $m, 'spouse' => $s]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Family $family, FamilyRequest $request): RedirectResponse
    {
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

        return redirect()->route('admin.family.show', $family->id)->with('success', 'Member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family): RedirectResponse
    {
        $this->deleteAvatar($family);
        $family->delete();

        return redirect()->route('admin.family.index');
    }

    private function deleteAvatar(Family $family): void
    {
        Storage::disk('public_avatar')->delete($family->avatarFilename());
        Storage::disk('public_avatar')->delete($family->avatarThumbnailFilename());
    }
}
