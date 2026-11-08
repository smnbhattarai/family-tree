<?php

declare(strict_types=1);

use App\Models\Family;
use App\Models\User;

it('requires login', function (): void {
    $this->get(route('page.relationship'))->assertRedirect();
});

it('renders the finder form without a result when nothing is picked', function (): void {
    Family::factory()->create(['first_name' => 'Hari']);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.relationship'))
        ->assertSuccessful()
        ->assertSee(__('How are we related?'))
        ->assertSee('Hari')
        ->assertDontSee('ft-relationship-result', false);
});

it('shows how two members are related with the chain between them', function (): void {
    $father = Family::factory()->create(['first_name' => 'Hari', 'gender' => 'M', 'father_id' => null, 'mother_id' => null]);
    $child = Family::factory()->create(['first_name' => 'Ram', 'gender' => 'M', 'father_id' => $father->id, 'mother_id' => null]);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.relationship', ['from' => $father->id, 'to' => $child->id]))
        ->assertSuccessful()
        ->assertSee('ft-relationship-result', false)
        ->assertSeeInOrder([$father->name(), $child->name(), 'father'])
        ->assertSee(route('page.family.show', $child->id));
});

it('defaults the first member to the logged in user', function (): void {
    $user = User::factory()->create(['role' => 'user']);
    $me = Family::factory()->create(['email' => $user->email, 'gender' => 'F', 'father_id' => null, 'mother_id' => null]);
    $father = Family::factory()->create(['gender' => 'M', 'father_id' => null, 'mother_id' => null]);
    $me->update(['father_id' => $father->id]);

    $response = $this->actingAs($user)
        ->get(route('page.relationship', ['to' => $father->id]))
        ->assertSuccessful();

    expect($response->viewData('subject')->id)->toBe($me->id)
        ->and($response->viewData('result')['label'])->toBe('daughter');
});

it('tells the user when two members are not connected', function (): void {
    $first = Family::factory()->create(['father_id' => null, 'mother_id' => null]);
    $second = Family::factory()->create(['father_id' => null, 'mother_id' => null]);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.relationship', ['from' => $first->id, 'to' => $second->id]))
        ->assertSuccessful()
        ->assertSee(__('No connection was found between :subject and :relative.', ['subject' => $first->name(), 'relative' => $second->name()]));
});

it('tells the user when the same member is picked twice', function (): void {
    $member = Family::factory()->create();

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.relationship', ['from' => $member->id, 'to' => $member->id]))
        ->assertSuccessful()
        ->assertSee(__('You picked the same person twice.'));
});

it('rejects members that do not exist', function (mixed $from, mixed $to, string $field): void {
    $member = Family::factory()->create();

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.relationship', ['from' => $from ?? $member->id, 'to' => $to ?? $member->id]))
        ->assertSessionHasErrors($field);
})->with([
    'unknown first member' => [999999, null, 'from'],
    'unknown second member' => [null, 999999, 'to'],
    'non numeric member' => ['abc', null, 'from'],
]);

it('links to the finder from a member profile', function (): void {
    $member = Family::factory()->create();

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family.show', $member))
        ->assertSuccessful()
        ->assertSee(route('page.relationship', ['to' => $member->id]), false);
});
