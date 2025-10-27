<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        $families = Family::query()
            ->where('first_name', 'LIKE', "%$q%")
            ->orWhere('middle_name', 'LIKE', "%$q%")
            ->orWhere('last_name', 'LIKE', "%$q%")
            ->orWhere('email', 'LIKE', "%$q%")
            ->orWhere('phone', 'LIKE', "%$q%")
            ->orWhere('address', 'LIKE', "%$q%")
            ->orWhere('dob', 'LIKE', "%$q%")
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

            $children = [];
            $childrenData = $family->childrens();
            if (! empty($childrenData)) {
                foreach ($childrenData as $child) {
                    $children[] = [
                        $child->name(),
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
                'father' => $family->father ? $family->father->name() : '-',
                'mother' => $family->mother ? $family->mother->name() : '-',
                'spouse' => $betterHalf,
                'children' => $children,
                'updated_at' => $family->updated_at ? $family->updated_at->diffForHumans() : null,
            ];
        }

        return response()->json($results);
    }
}
