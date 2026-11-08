<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Family;
use Illuminate\Support\Collection;

/**
 * Headline numbers about the whole family.
 */
final class FamilyStats
{
    /**
     * @return array{total: int, generations: int, male: int, female: int, common_surname: ?string, common_surname_count: int}
     */
    public function summary(): array
    {
        $members = Family::query()->get(['id', 'last_name', 'gender', 'father_id', 'mother_id']);

        $surnames = $members
            ->map(fn (Family $member): string => mb_trim((string) $member->last_name))
            ->filter(fn (string $surname): bool => $surname !== '')
            ->countBy(fn (string $surname): string => mb_convert_case($surname, MB_CASE_TITLE))
            ->sortKeys()
            ->sortDesc();

        return [
            'total' => $members->count(),
            'generations' => $this->generations($members),
            'male' => $members->where('gender', 'M')->count(),
            'female' => $members->where('gender', 'F')->count(),
            'common_surname' => $surnames->keys()->first(),
            'common_surname_count' => (int) $surnames->first(),
        ];
    }

    /**
     * Length of the longest parent-to-child line in the family.
     *
     * @param  Collection<int, Family>  $members
     */
    private function generations(Collection $members): int
    {
        /** @var array<int, list<int>> $parentIds */
        $parentIds = $members->mapWithKeys(fn (Family $member): array => [
            (int) $member->id => array_values(array_map('intval', array_filter([$member->father_id, $member->mother_id]))),
        ])->all();

        /** @var array<int, int> $depths */
        $depths = [];

        $depthOf = function (int $id, array $visiting) use (&$depthOf, &$depths, $parentIds): int {
            if (isset($depths[$id])) {
                return $depths[$id];
            }

            $deepestParent = 0;

            foreach ($parentIds[$id] ?? [] as $parentId) {
                if (! isset($parentIds[$parentId]) || isset($visiting[$parentId])) {
                    continue;
                }

                $deepestParent = max($deepestParent, $depthOf($parentId, $visiting + [$id => true]));
            }

            return $depths[$id] = $deepestParent + 1;
        };

        return array_reduce(array_keys($parentIds), fn (int $max, int $id): int => max($max, $depthOf($id, [])), 0);
    }
}
