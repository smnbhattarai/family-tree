<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Family;
use App\Models\User;
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
    }

    /**
     * Handle the Family "updated" event.
     */
    public function updated(Family $family): void
    {
        $this->updateUser($family);
        $this->updateSpouse($family);
    }

    /**
     * Handle the Family "deleted" event.
     */
    public function deleted(Family $family): void
    {
        $this->deleteUser($family->email);
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
                $this->deleteUser($family->getOriginal('email'));
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

    private function deleteUser($email): void
    {
        User::query()->where('email', $email)->delete();
    }

    private function updateSpouse(Family $family): void
    {
        // When spouse is added to a family member, assign reverse relation as well
        $spouseIds = $family->spouse;
        if (! empty($spouseIds)) {
            $spouses = Family::query()->findMany($spouseIds);
            foreach ($spouses as $spouse) {
                $spouseData = $spouse->spouse;
                $spouseData[] = $family->id;
                $spouseData = array_unique($spouseData);
                DB::table('families')->where('id', $spouse->id)->update(['spouse' => json_encode($spouseData)]);
            }
        }
    }
}
