<?php

declare(strict_types=1);

use App\Models\Family;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;

beforeEach(function (): void {
    $this->travelTo('2026-11-08 09:00:00');
});

it('requires login', function (): void {
    $this->get(route('page.birthdays'))->assertRedirect();
});

it('lists the next twelve months of birthdays grouped by month', function (): void {
    $november = Family::factory()->create(['dob' => '1990-11-20']);
    $march = Family::factory()->create(['dob' => '1985-03-05']);
    $unknown = Family::factory()->create(['first_name' => 'Undated', 'dob' => null]);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.birthdays'))
        ->assertSuccessful()
        ->assertSeeInOrder([
            'November 2026', $november->name(), __('Turns :age', ['age' => 36]),
            'March 2027', $march->name(), __('Turns :age', ['age' => 42]),
        ])
        ->assertSee(route('page.family.show', $november), false)
        ->assertDontSee(route('page.family.show', $unknown), false);
});

it('labels birthdays happening today, tomorrow and later', function (): void {
    Family::factory()->create(['dob' => '1990-11-08']);
    Family::factory()->create(['dob' => '1990-11-09']);
    Family::factory()->create(['dob' => '1990-11-15']);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.birthdays'))
        ->assertSuccessful()
        ->assertSeeInOrder([__('Today'), __('Tomorrow'), __('In :days days', ['days' => 7])]);
});

it('shows an empty state when no birthdays are recorded', function (): void {
    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.birthdays'))
        ->assertSuccessful()
        ->assertSee(__('No birthdays recorded yet. Add dates of birth to family members to see them here.'));
});

it('shows the next 30 days of birthdays on the home page', function (): void {
    $soon = Family::factory()->create(['dob' => '1990-11-20']);
    $far = Family::factory()->create(['dob' => '1990-02-01']);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('home'))
        ->assertSuccessful()
        ->assertSee(__('Birthdays in the next 30 days'))
        ->assertSee(route('page.family.show', $soon), false)
        ->assertDontSee(route('page.family.show', $far), false)
        ->assertSee(route('page.birthdays'), false);
});

it('caps the home page card at six birthdays', function (): void {
    Family::factory()->count(8)->state(new Sequence(fn (Sequence $sequence): array => ['dob' => '1990-11-'.(10 + $sequence->index)]))->create();

    $response = $this->actingAs(User::factory()->create(['role' => 'user']))->get(route('home'));

    expect($response->viewData('birthdays'))->toHaveCount(6);
});

it('tells members when nobody has a birthday soon', function (): void {
    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('home'))
        ->assertSuccessful()
        ->assertSee(__('No birthdays coming up in the next 30 days.'));
});

it('hides the birthdays card from guests', function (): void {
    Family::factory()->create(['dob' => '1990-11-20']);

    $this->get(route('home'))
        ->assertSuccessful()
        ->assertDontSee(__('Birthdays in the next 30 days'));
});

it('shows age and a birthday badge on the profile', function (): void {
    $member = Family::factory()->create(['dob' => '1990-11-08']);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family.show', $member))
        ->assertSuccessful()
        ->assertSee('36 years old')
        ->assertSee(__('Birthday today!'));
});

it('shows no age on a profile without a date of birth', function (): void {
    $member = Family::factory()->create(['dob' => null]);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family.show', $member))
        ->assertSuccessful()
        ->assertDontSee('years old')
        ->assertDontSee(__('Birthday today!'));
});
