<?php

declare(strict_types=1);

use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\DB;

it('renders the themed home page for guests', function (): void {
    $this->get(route('home'))
        ->assertSuccessful()
        ->assertSee('ft-navbar', false)
        ->assertSee('ft-footer', false)
        ->assertSee(__('Sign in to explore'))
        ->assertDontSee(__('Explore the tree'));
});

it('renders the themed home page for members', function (): void {
    $user = User::factory()->create(['role' => 'user']);

    $this->actingAs($user)
        ->get(route('home'))
        ->assertSuccessful()
        ->assertSee($user->name)
        ->assertSee(__('Explore the tree'))
        ->assertDontSee(__('Sign in to explore'));
});

it('renders the sign in card', function (): void {
    $this->get(route('page.sign.in'))
        ->assertSuccessful()
        ->assertSee('ft-auth-card', false)
        ->assertSee(__('Please sign in'));
});

it('renders the search page', function (): void {
    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.search.family'))
        ->assertSuccessful()
        ->assertSee('ft-search', false)
        ->assertSee(__('Find a family member'));
});

it('renders the family chart inside a full width container', function (): void {
    Family::factory()->create();

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family'))
        ->assertSuccessful()
        ->assertSee('ft-chart-shell', false)
        ->assertSee('container-fluid', false);
});

it('renders an empty state instead of crashing when there are no family members', function (): void {
    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family'))
        ->assertSuccessful()
        ->assertSee('ft-empty', false)
        ->assertSee(__('No family members have been added yet.'))
        ->assertDontSee('updateMainId', false)
        ->assertDontSee(route('admin.family.create'), false);
});

it('links admins to add the first member when the tree is empty', function (): void {
    $this->actingAs(User::factory()->create(['role' => 'admin']))
        ->get(route('page.family'))
        ->assertSuccessful()
        ->assertSee(route('admin.family.create'), false);
});

it('centres the tree on the signed in member', function (): void {
    Family::factory()->count(3)->create();
    $member = Family::factory()->create(['email' => 'me@example.com']);
    $user = User::query()->where('email', 'me@example.com')->firstOrFail();

    $this->actingAs($user)
        ->get(route('page.family'))
        ->assertSuccessful()
        ->assertViewHas('mainId', $member->id);
});

it('lists each member\'s children in the tree data', function (): void {
    $father = Family::factory()->create(['gender' => 'M']);
    $mother = Family::factory()->create(['gender' => 'F']);
    $fullChild = Family::factory()->create(['father_id' => $father->id, 'mother_id' => $mother->id]);
    $halfChild = Family::factory()->create(['father_id' => $father->id, 'mother_id' => null]);
    $loner = Family::factory()->create(['father_id' => null, 'mother_id' => null]);

    $response = $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family'))
        ->assertSuccessful();

    $children = collect(json_decode((string) $response->viewData('data'), true))
        ->mapWithKeys(fn (array $node): array => [$node['id'] => $node['rels']['children']]);

    expect($children[$father->id])->toEqualCanonicalizing([$fullChild->id, $halfChild->id])
        ->and($children[$mother->id])->toBe([$fullChild->id])
        ->and($children[$loner->id])->toBe([]);
});

it('builds the tree without a query per member', function (): void {
    $father = Family::factory()->create(['gender' => 'M']);
    Family::factory()->count(10)->create(['father_id' => $father->id]);
    $user = User::factory()->create(['role' => 'user']);

    DB::enableQueryLog();

    $this->actingAs($user)->get(route('page.family'))->assertSuccessful();

    expect(DB::getQueryLog())->toHaveCount(3);
});

it('renders a profile with relative chips', function (): void {
    $father = Family::factory()->create(['gender' => 'M']);
    $child = Family::factory()->create(['father_id' => $father->id, 'avatar' => null]);

    $this->actingAs(User::factory()->create(['role' => 'user']))
        ->get(route('page.family.show', $child))
        ->assertSuccessful()
        ->assertSee('ft-profile-initial', false)
        ->assertSee('ft-relative-chip', false)
        ->assertSee($father->name());
});

it('renders the admin family list and user list', function (): void {
    Family::factory()->create();
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get(route('admin.family.index'))
        ->assertSuccessful()
        ->assertSee(__('Family Members'));

    $this->actingAs($admin)
        ->get(route('admin.page.users'))
        ->assertSuccessful()
        ->assertSee('ft-surface', false);
});

it('renders the admin create form with themed fieldsets', function (): void {
    $this->actingAs(User::factory()->create(['role' => 'admin']))
        ->get(route('admin.family.create'))
        ->assertSuccessful()
        ->assertSee('ft-fieldset', false)
        ->assertSee('avatarPreview', false);
});
