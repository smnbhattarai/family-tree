<?php

declare(strict_types=1);

use App\Models\Family;
use App\Models\User;

it('shows family stats to signed in members', function (): void {
    $parent = Family::factory()->create(['gender' => 'M', 'last_name' => 'Bhattarai']);
    Family::factory()->create(['gender' => 'F', 'last_name' => 'Bhattarai', 'father_id' => $parent->id]);
    Family::factory()->create(['gender' => 'F', 'last_name' => 'Sharma']);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('home'))
        ->assertSuccessful()
        ->assertSee('ft-stats', false)
        ->assertSeeInOrder([
            '3', trans_choice('Member|Members', 3),
            '2', trans_choice('Generation|Generations', 2),
            '1', '/', '2', __('Male / Female'),
            'Bhattarai', __('Most common surname (:count)', ['count' => 2]),
        ]);
});

it('hides family stats from guests', function (): void {
    Family::factory()->create();

    $this->get(route('home'))
        ->assertSuccessful()
        ->assertDontSee('ft-stats', false);
});

it('hides family stats when there are no members', function (): void {
    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('home'))
        ->assertSuccessful()
        ->assertDontSee('ft-stats', false);
});

it('omits the surname stat when no surnames are recorded', function (): void {
    Family::factory()->create(['last_name' => '']);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('home'))
        ->assertSuccessful()
        ->assertSee('ft-stats', false)
        ->assertDontSee(__('Most common surname (:count)', ['count' => 0]));
});
