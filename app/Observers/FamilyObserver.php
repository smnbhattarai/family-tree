<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class FamilyObserver
{
    /**
     * Handle the Family "created" event.
     */
    public function created(Family $family): void
    {
        $this->updateUser($family);
        $this->updateSpouse($family);
        $this->deleteCache();
    }

    /**
     * Handle the Family "updated" event.
     */
    public function updated(Family $family): void
    {
        $this->updateUser($family);
        $this->updateSpouse($family);
        $this->deleteCache();
    }

    /**
     * Handle the Family "deleted" event.
     */
    public function deleted(Family $family): void
    {
        $this->deleteUser((string) $family->email);
        $this->detachFromRelatives($family);
        $this->deleteCache();
    }

    /**
     * Handle the Family "restored" event.
     */
    public function restored(): void
    {
        //
    }

    /**
     * Handle the Family "force deleted" event.
     */
    public function forceDeleted(): void
    {
        //
    }

    private function updateUser(Family $family): void
    {
        if (! empty($family->email)) {

            if ($family->email !== $family->getOriginal('email')) {
                // delete old user
                $this->deleteUser((string) $family->getOriginal('email'));
            }
            if (! User::query()->where('email', $family->email)->first()) {
                User::create([
                    'name' => $family->name(),
                    'email' => $family->email,
                    'email_verified_at' => now(),
                    'password' => Hash::make(Str::random(12)),
                    'role' => 'user',
                    'remember_token' => Str::random(10),
                ]);
            }
        }

    }

    private function deleteUser(string $email): void
    {
        User::query()->where('email', $email)->delete();
    }

    private function updateSpouse(Family $family): void
    {
        // When spouse is added to a family member, assign reverse relation as well
        $spouseIds = (array) $family->spouse;
        if ($spouseIds !== []) {
            $spouses = Family::query()->findMany($spouseIds);
            foreach ($spouses as $spouse) {
                $spouseData = (array) $spouse->spouse;
                $spouseData[] = $family->id;
                $spouseData = array_unique($spouseData);
                DB::table('families')->where('id', $spouse->id)->update(['spouse' => json_encode($spouseData)]);
            }
        }
    }

    /**
     * Remove every reference other members hold to a deleted member.
     */
    private function detachFromRelatives(Family $family): void
    {
        $deletedId = (int) $family->id;

        Family::query()->where('father_id', $deletedId)->update(['father_id' => null]);
        Family::query()->where('mother_id', $deletedId)->update(['mother_id' => null]);

        Family::query()
            ->get(['id', 'spouse'])
            ->filter(fn (Family $relative): bool => in_array($deletedId, (array) $relative->spouse, true))
            ->each(function (Family $relative) use ($deletedId): void {
                $remainingSpouseIds = array_values(array_diff((array) $relative->spouse, [$deletedId]));

                DB::table('families')->where('id', $relative->id)->update([
                    'spouse' => json_encode($remainingSpouseIds),
                ]);
            });
    }

    private function deleteCache(): void
    {
        $cacheKeys = ['family.all'];
        foreach ($cacheKeys as $cache_key) {
            Cache::forget($cache_key);
        }
    }
}
