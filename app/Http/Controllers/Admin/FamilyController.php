<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FamilyRequest;
use App\Models\Family;

final class FamilyController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $families = Family::query()->paginate(50);

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
    public function store(FamilyRequest $request): never
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(): void
    {
        //
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
