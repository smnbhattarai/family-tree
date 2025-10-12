<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Family;
use App\Models\User;
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
    }

    /**
     * Handle the Family "updated" event.
     */
    public function updated(Family $family): void
    {
        $this->updateUser($family);
    }

    /**
     * Handle the Family "deleted" event.
     */
    public function deleted(Family $family): void
    {
        $this->deleteUser($family);
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
        if ($family->email && ! User::query()->where('email', $family->email)->first()) {
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

    private function deleteUser(Family $family): void
    {
        User::query()->where('email', $family->email)->delete();
    }
}
