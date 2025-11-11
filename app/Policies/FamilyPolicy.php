<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Arr;

final class FamilyPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user): ?bool
    {

        if ($user->isAdmin()) {
            return true;
        }

        return null;

    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Family $family): bool
    {
        // Logged-in user can edit their own, parents, sibling, children and spouse details
        $loggedFamily = Family::query()->where('email', $user->email)->first();
        if ($loggedFamily) {
            $familyIds = [];
            $familyIds[] = $loggedFamily->id;
            $familyIds[] = $loggedFamily->father_id;
            $familyIds[] = $loggedFamily->mother_id;
            $familyIds[] = $loggedFamily->spouse;

            if ($children = Family::query()->where('father_id', $loggedFamily->id)->orWhere('mother_id', $loggedFamily->id)->get(['id'])) {
                $familyIds[] = $children->pluck(['id'])->all();
            }

            if ($sibling = Family::query()->where('father_id', $family->father_id)->orWhere('mother_id', $family->mother_id)->get(['id'])) {
                $familyIds[] = $sibling->pluck(['id'])->all();
            }

            $familyIds = Arr::whereNotNull(Arr::flatten($familyIds));

            return in_array($family->id, $familyIds);
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(): bool
    {
        return false;
    }
}
