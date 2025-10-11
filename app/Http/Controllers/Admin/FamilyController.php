<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FamilyRequest;
use App\Models\Family;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

final class FamilyController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $families = Cache::remember('admin.family.index', 5, fn () => Family::all());

        return view('admin.family.index', ['families' => $families]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.family.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // process original image
            $filename = Str::slug((string) $data['first_name']).'-'.Str::random(8);
            $thumbImage = Image::read($file)->scaleDown(150, 150);

            $file->move(public_path('avatar'), $filename.'.'.$file->getClientOriginalExtension());
            $data['avatar'] = 'avatar/'.$filename.'.'.$file->getClientOriginalExtension();

            // process thumbnail
            $thumbFilename = 'thumb-'.$filename.'.'.$file->getClientOriginalExtension();
            Storage::disk('public_avatar')->put("thumbnail/$thumbFilename", $thumbImage->encodeByExtension($file->getClientOriginalExtension(), quality: 70));
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
    public function show(Family $family): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.family.show', ['family' => $family]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(): void
    {
        //
    }
}
