<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Family;
use Illuminate\Database\Eloquent\Collection;

/**
 * Works out how one family member is related to another, e.g. "Ram is Sita's first cousin".
 */
final class RelationshipFinder
{
    /**
     * Gendered terms as [male, female, neutral].
     *
     * @var array<string, array{0: string, 1: string, 2: string}>
     */
    private const array TERMS = [
        'parent' => ['father', 'mother', 'parent'],
        'child' => ['son', 'daughter', 'child'],
        'sibling' => ['brother', 'sister', 'sibling'],
        'pibling' => ['uncle', 'aunt', 'aunt/uncle'],
        'nibling' => ['nephew', 'niece', 'niece/nephew'],
        'spouse' => ['husband', 'wife', 'spouse'],
        'parent-in-law' => ['father-in-law', 'mother-in-law', 'parent-in-law'],
        'sibling-in-law' => ['brother-in-law', 'sister-in-law', 'sibling-in-law'],
        'child-in-law' => ['son-in-law', 'daughter-in-law', 'child-in-law'],
        'stepparent' => ['stepfather', 'stepmother', 'stepparent'],
        'stepchild' => ['stepson', 'stepdaughter', 'stepchild'],
    ];

    private const array ORDINALS = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth'];

    /** @var Collection<int, Family> */
    private Collection $members;

    /** @var array<int, list<int>> */
    private array $childrenByParent = [];

    /**
     * Describe how $subject is related to $relative ("$subject is $relative's {label}").
     *
     * @return array{label: string, path: list<array{member: Family, relation: ?string}>}|null null when they are not connected at all
     */
    public function find(Family $subject, Family $relative): ?array
    {
        if ($subject->is($relative)) {
            return ['label' => 'same person', 'path' => [['member' => $subject, 'relation' => null]]];
        }

        $this->loadMembers();

        $subjectId = (int) $subject->id;
        $relativeId = (int) $relative->id;

        $path = $this->shortestPath($subjectId, $relativeId);

        if ($path === null) {
            return null;
        }

        $label = $this->bloodLabel($subjectId, $relativeId)
            ?? $this->marriageLabel($subjectId, $relativeId)
            ?? 'relative by marriage';

        return ['label' => $label, 'path' => $path];
    }

    private function loadMembers(): void
    {
        $this->members = Family::query()
            ->get(['id', 'first_name', 'middle_name', 'last_name', 'gender', 'avatar', 'father_id', 'mother_id', 'spouse'])
            ->keyBy('id');

        $this->childrenByParent = [];

        foreach ($this->members as $member) {
            foreach (array_unique(array_filter([(int) $member->father_id, (int) $member->mother_id])) as $parentId) {
                $this->childrenByParent[$parentId][] = (int) $member->id;
            }
        }
    }

    /**
     * Label for two members who share a common ancestor (or one descends from the other).
     */
    private function bloodLabel(int $subjectId, int $relativeId): ?string
    {
        $generations = $this->generationsToCommonAncestor($subjectId, $relativeId);

        if ($generations === null) {
            return null;
        }

        [$up, $down] = $generations;

        return $this->bloodTerm($this->gender($subjectId), $up, $down, $up === 1 && $down === 1 && $this->areHalfSiblings($subjectId, $relativeId));
    }

    /**
     * Label for members connected through one marriage: spouses, in-laws, step-relatives.
     */
    private function marriageLabel(int $subjectId, int $relativeId): ?string
    {
        $subjectGender = $this->gender($subjectId);

        if (in_array($subjectId, $this->spouseIds($relativeId), true)) {
            return $this->term('spouse', $subjectGender);
        }

        foreach ($this->spouseIds($subjectId) as $spouseId) {
            $generations = $this->generationsToCommonAncestor($spouseId, $relativeId);

            if ($generations === null) {
                continue;
            }

            [$up, $down] = $generations;

            return match (true) {
                $up === 1 && $down === 0 => $this->term('child-in-law', $subjectGender),
                $up === 1 && $down === 1 => $this->term('sibling-in-law', $subjectGender),
                $up === 0 && $down === 1 => $this->term('stepparent', $subjectGender),
                $up === 1 => $this->bloodTerm($subjectGender, $up, $down),
                default => $this->bloodTerm($this->gender($spouseId), $up, $down)."'s ".$this->term('spouse', $subjectGender),
            };
        }

        foreach ($this->spouseIds($relativeId) as $spouseId) {
            $generations = $this->generationsToCommonAncestor($subjectId, $spouseId);

            if ($generations === null) {
                continue;
            }

            [$up, $down] = $generations;

            return match (true) {
                $up === 0 && $down === 1 => $this->term('parent-in-law', $subjectGender),
                $up === 1 && $down === 1 => $this->term('sibling-in-law', $subjectGender),
                $up === 1 && $down === 0 => $this->term('stepchild', $subjectGender),
                default => $this->term('spouse', $this->gender($spouseId))."'s ".$this->bloodTerm($subjectGender, $up, $down),
            };
        }

        return null;
    }

    /**
     * @param  int  $up  generations from the subject up to the common ancestor
     * @param  int  $down  generations from the relative up to the common ancestor
     */
    private function bloodTerm(string $gender, int $up, int $down, bool $isHalfSibling = false): string
    {
        return match (true) {
            $up === 0 => $this->ancestry('parent', $gender, $down),
            $down === 0 => $this->ancestry('child', $gender, $up),
            $up === 1 && $down === 1 => ($isHalfSibling ? 'half-' : '').$this->term('sibling', $gender),
            $up === 1 => str_repeat('great-', $down - 2).$this->term('pibling', $gender),
            $down === 1 => str_repeat('great-', $up - 2).$this->term('nibling', $gender),
            default => $this->cousin(min($up, $down) - 1, abs($up - $down)),
        };
    }

    private function ancestry(string $key, string $gender, int $generations): string
    {
        $term = $this->term($key, $gender);

        return $generations === 1 ? $term : str_repeat('great-', $generations - 2).'grand'.$term;
    }

    private function cousin(int $degree, int $removed): string
    {
        $label = (self::ORDINALS[$degree - 1] ?? "{$degree}th").' cousin';

        return match ($removed) {
            0 => $label,
            1 => "$label once removed",
            2 => "$label twice removed",
            default => "$label $removed times removed",
        };
    }

    /**
     * Generations from each member up to their closest common ancestor.
     *
     * @return array{0: int, 1: int}|null
     */
    private function generationsToCommonAncestor(int $firstId, int $secondId): ?array
    {
        $firstAncestors = $this->ancestorDistances($firstId);
        $secondAncestors = $this->ancestorDistances($secondId);

        $closest = null;

        foreach (array_intersect_key($firstAncestors, $secondAncestors) as $ancestorId => $distance) {
            $candidate = [$distance, $secondAncestors[$ancestorId]];

            if ($closest === null || array_sum($candidate) < array_sum($closest)) {
                $closest = $candidate;
            }
        }

        return $closest;
    }

    /**
     * Every ancestor (and the member itself at 0) keyed by id, with the generation distance.
     *
     * @return array<int, int>
     */
    private function ancestorDistances(int $memberId): array
    {
        $distances = [$memberId => 0];
        $queue = [$memberId];

        while ($queue !== []) {
            $currentId = array_shift($queue);
            $member = $this->members->get($currentId);

            foreach ([(int) $member?->father_id, (int) $member?->mother_id] as $parentId) {
                if ($parentId > 0 && ! isset($distances[$parentId]) && $this->members->has($parentId)) {
                    $distances[$parentId] = $distances[$currentId] + 1;
                    $queue[] = $parentId;
                }
            }
        }

        return $distances;
    }

    /**
     * Half-siblings have a known parent that differs; an unknown parent is not assumed to differ.
     */
    private function areHalfSiblings(int $firstId, int $secondId): bool
    {
        $first = $this->members->get($firstId);
        $second = $this->members->get($secondId);

        foreach (['father_id', 'mother_id'] as $column) {
            $firstParentId = (int) $first?->{$column};
            $secondParentId = (int) $second?->{$column};

            if ($firstParentId > 0 && $secondParentId > 0 && $firstParentId !== $secondParentId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Breadth-first search over parent, child and spouse links.
     *
     * @return list<array{member: Family, relation: ?string}>|null
     */
    private function shortestPath(int $fromId, int $toId): ?array
    {
        $previous = [$fromId => null];
        $queue = [$fromId];

        while ($queue !== [] && ! array_key_exists($toId, $previous)) {
            $currentId = array_shift($queue);

            foreach ($this->neighbours($currentId) as $neighbourId => $relation) {
                if (! array_key_exists($neighbourId, $previous)) {
                    $previous[$neighbourId] = [$currentId, $relation];
                    $queue[] = $neighbourId;
                }
            }
        }

        if (! array_key_exists($toId, $previous)) {
            return null;
        }

        $path = [];

        for ($id = $toId; $previous[$id] !== null; $id = $previous[$id][0]) {
            $path[] = ['member' => $this->members->get($id), 'relation' => $previous[$id][1]];
        }

        $path[] = ['member' => $this->members->get($fromId), 'relation' => null];

        return array_reverse($path);
    }

    /**
     * Directly linked members, keyed by id, with how each relates to the given member.
     *
     * @return array<int, string>
     */
    private function neighbours(int $memberId): array
    {
        $member = $this->members->get($memberId);

        if ($member === null) {
            return [];
        }

        $neighbours = [];

        foreach (['father_id', 'mother_id'] as $column) {
            $parentId = (int) $member->{$column};

            if ($this->members->has($parentId)) {
                $neighbours[$parentId] = $this->term('parent', $this->gender($parentId));
            }
        }

        foreach ($this->childrenByParent[$memberId] ?? [] as $childId) {
            $neighbours[$childId] = $this->term('child', $this->gender($childId));
        }

        foreach ($this->spouseIds($memberId) as $spouseId) {
            $neighbours[$spouseId] ??= $this->term('spouse', $this->gender($spouseId));
        }

        return $neighbours;
    }

    /**
     * @return list<int>
     */
    private function spouseIds(int $memberId): array
    {
        $spouseIds = (array) $this->members->get($memberId)?->spouse;

        return array_values(array_filter($spouseIds, fn (int $spouseId): bool => $spouseId !== $memberId && $this->members->has($spouseId)));
    }

    private function gender(int $memberId): string
    {
        return (string) $this->members->get($memberId)?->gender;
    }

    private function term(string $key, string $gender): string
    {
        return self::TERMS[$key][match ($gender) {
            'M' => 0,
            'F' => 1,
            default => 2,
        }];
    }
}
