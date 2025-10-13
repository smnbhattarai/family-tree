<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

final class PageController
{
    public function home(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('home');
    }

    public function family(): \Illuminate\Contracts\View\View
    {
        // $families = Cache::remember('admin.family.index', 24 * 60 * 60, fn () => Family::all());
        $families = Family::all();

        $mainperson = Family::query()->where('email', auth()->user()->email)->first();
        if (! $mainperson) {
            $randomPerson = Family::query()->inRandomOrder()->first();
        }
        $mainId = $randomPerson->id ?? null;

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

    public function searchFamily(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $family = Family::query()->find(6);

        return view('page.family-search', ['family' => $family]);
    }

    public function searchFamilyData(Request $request)
    {
        $validated = $request->validate([
            'q' => 'required|string',
        ]);

        $q = $validated['q'];

        $families = Family::query()
            ->where('first_name', 'LIKE', '%'.$q.'%')
            ->orWhere('middle_name', 'LIKE', '%'.$q.'%')
            ->orWhere('last_name', 'LIKE', '%'.$q.'%')
            ->orWhere('email', 'LIKE', '%'.$q.'%')
            ->orWhere('phone', 'LIKE', '%'.$q.'%')
            ->orWhere('address', 'LIKE', '%'.$q.'%')
            ->orWhere('dob', 'LIKE', '%'.$q.'%')
            ->get();

        $results = [];

        foreach ($families as $family) {
            $betterHalf = [];
            if (! empty($family->spouse)) {
                $spouses = Family::query()->findMany($family->spouse);
                foreach ($spouses as $spouse) {
                    $betterHalf[] = [
                        $spouse->name(),
                    ];
                }
            }

            $results[] = [
                'first_name' => $family->first_name,
                'middle_name' => $family->middle_name ?? '-',
                'last_name' => $family->last_name,
                'name' => $family->name(),
                'thumbnail' => $family->thumbnailPath(),
                'dob' => $family->dob ?? '-',
                'gender' => $family->gender,
                'email' => $family->email ?? '-',
                'phone' => $family->phone ?? '-',
                'address' => $family->address ?? '-',
                'father' => $family?->father?->name() ?? '-',
                'mother' => $family?->mother?->name() ?? '-',
                'spouse' => $betterHalf,
                'updated_at' => $family->updated_at->diffForHumans(),
            ];
        }

        return response()->json($results);
    }
}
