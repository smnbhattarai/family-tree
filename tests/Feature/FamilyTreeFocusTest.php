<?php

declare(strict_types=1);

use App\Models\Family;
use App\Models\User;

it('centres the tree on the focused member', function (): void {
    $user = User::factory()->create(['role' => 'user']);
    Family::factory()->create(['email' => $user->email]);
    $focused = Family::factory()->create();

    $this->actingAs($user)
        ->get(route('page.family', ['focus' => $focused->id]))
        ->assertSuccessful()
        ->assertViewHas('mainId', $focused->id);
});

it('falls back to the logged in member when the focused member does not exist', function (): void {
    $user = User::factory()->create(['role' => 'user']);
    $member = Family::factory()->create(['email' => $user->email]);

    $this->actingAs($user)
        ->get(route('page.family', ['focus' => 999999]))
        ->assertSuccessful()
        ->assertViewHas('mainId', $member->id);
});

it('rejects a focus value that is not a member id', function (mixed $focus): void {
    Family::factory()->create();

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family', ['focus' => $focus]))
        ->assertRedirect()
        ->assertSessionHasErrors('focus');
})->with([
    'text' => 'abc',
    'zero' => 0,
    'negative' => -5,
]);

it('requires login to focus the tree', function (): void {
    $member = Family::factory()->create();

    $this->get(route('page.family', ['focus' => $member->id]))->assertRedirect();
});

it('links from a profile to that member in the tree', function (): void {
    $member = Family::factory()->create();

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family.show', $member))
        ->assertSuccessful()
        ->assertSee(route('page.family', ['focus' => $member->id]), false)
        ->assertSee(__('View in tree'));
});
