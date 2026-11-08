<?php

declare(strict_types=1);

use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\DB;

it('clears father and mother references when a parent is deleted', function (): void {
    $father = Family::factory()->create(['gender' => 'M']);
    $mother = Family::factory()->create(['gender' => 'F']);
    $child = Family::factory()->create(['father_id' => $father->id, 'mother_id' => $mother->id]);

    $father->delete();

    expect($child->refresh())
        ->father_id->toBeNull()
        ->mother_id->toBe($mother->id);

    $mother->delete();

    expect($child->refresh()->mother_id)->toBeNull();
});

it('removes a deleted member from other members spouse lists', function (): void {
    $husband = Family::factory()->create(['gender' => 'M']);
    $firstWife = Family::factory()->create(['gender' => 'F']);
    $secondWife = Family::factory()->create(['gender' => 'F']);
    $husband->update(['spouse' => json_encode([$firstWife->id, $secondWife->id])]);

    $firstWife->delete();

    expect($husband->refresh()->spouse)->toBe([$secondWife->id])
        ->and($secondWife->refresh()->spouse)->toBe([$husband->id]);
});

it('leaves an empty spouse list when the only spouse is deleted', function (): void {
    $wife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'spouse' => json_encode([$wife->id])]);

    $wife->delete();

    expect($husband->refresh()->spouse)->toBe([])
        ->and(DB::table('families')->where('id', $husband->id)->value('spouse'))->toBe('[]');
});

it('removes spouse references stored as strings', function (): void {
    $wife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M']);
    DB::table('families')->where('id', $husband->id)->update(['spouse' => json_encode([(string) $wife->id])]);

    $wife->delete();

    expect($husband->refresh()->spouse)->toBe([]);
});

it('does not touch unrelated members when someone is deleted', function (): void {
    $father = Family::factory()->create(['gender' => 'M']);
    $wife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'father_id' => $father->id, 'spouse' => json_encode([$wife->id])]);
    $stranger = Family::factory()->create();

    $stranger->delete();

    expect($husband->refresh())
        ->father_id->toBe($father->id)
        ->spouse->toBe([$wife->id]);
});

it('links the spouse back when a member is created with a spouse', function (): void {
    $wife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'spouse' => json_encode([$wife->id])]);

    expect($wife->refresh()->spouse)->toBe([$husband->id]);
});

it('unlinks a spouse removed on edit from both sides', function (): void {
    $husband = Family::factory()->create(['gender' => 'M']);
    $firstWife = Family::factory()->create(['gender' => 'F']);
    $secondWife = Family::factory()->create(['gender' => 'F']);
    $husband->update(['spouse' => json_encode([$firstWife->id, $secondWife->id])]);

    $husband->refresh()->update(['spouse' => json_encode([$secondWife->id])]);

    expect($husband->refresh()->spouse)->toBe([$secondWife->id])
        ->and($firstWife->refresh()->spouse)->toBe([])
        ->and($secondWife->refresh()->spouse)->toBe([$husband->id]);
});

it('unlinks every spouse when the spouse list is cleared', function (): void {
    $wife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'spouse' => json_encode([$wife->id])]);

    $husband->refresh()->update(['spouse' => '[]']);

    expect($wife->refresh()->spouse)->toBe([]);
});

it('keeps the removed spouse other marriages intact', function (): void {
    $husband = Family::factory()->create(['gender' => 'M']);
    $otherHusband = Family::factory()->create(['gender' => 'M']);
    $wife = Family::factory()->create(['gender' => 'F', 'spouse' => json_encode([$husband->id, $otherHusband->id])]);

    $husband->refresh()->update(['spouse' => '[]']);

    expect($wife->refresh()->spouse)->toBe([$otherHusband->id])
        ->and($otherHusband->refresh()->spouse)->toBe([$wife->id]);
});

it('swaps one spouse for another on edit', function (): void {
    $oldWife = Family::factory()->create(['gender' => 'F']);
    $newWife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'spouse' => json_encode([$oldWife->id])]);

    $husband->refresh()->update(['spouse' => json_encode([$newWife->id])]);

    expect($oldWife->refresh()->spouse)->toBe([])
        ->and($newWife->refresh()->spouse)->toBe([$husband->id]);
});

it('does not touch spouses when an unrelated field changes', function (): void {
    $wife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'spouse' => json_encode([$wife->id])]);
    DB::table('families')->where('id', $wife->id)->update(['spouse' => '[]']);

    $husband->refresh()->update(['first_name' => 'Renamed']);

    expect($wife->refresh()->spouse)->toBe([]);
});

it('clears every spouse when an admin submits the edit form with none selected', function (): void {
    $wife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'spouse' => json_encode([$wife->id])]);

    $this->actingAs(User::factory()->create(['role' => 'admin']))
        ->put(route('admin.family.update', $husband), [
            'first_name' => $husband->first_name,
            'last_name' => $husband->last_name,
            'gender' => 'M',
        ])
        ->assertRedirect(route('admin.family.show', $husband));

    expect($husband->refresh()->spouse)->toBe([])
        ->and($wife->refresh()->spouse)->toBe([]);
});

it('removes a spouse when a user edits a member from the family page', function (): void {
    $firstWife = Family::factory()->create(['gender' => 'F']);
    $secondWife = Family::factory()->create(['gender' => 'F']);
    $husband = Family::factory()->create(['gender' => 'M', 'spouse' => json_encode([$firstWife->id, $secondWife->id])]);

    $this->actingAs(User::factory()->create(['role' => 'admin']))
        ->put(route('page.family.update', $husband), [
            'first_name' => $husband->first_name,
            'last_name' => $husband->last_name,
            'gender' => 'M',
            'spouse' => [(string) $secondWife->id],
        ])
        ->assertRedirect(route('page.family.show', $husband));

    expect($husband->refresh()->spouse)->toBe([$secondWife->id])
        ->and($firstWife->refresh()->spouse)->toBe([])
        ->and($secondWife->refresh()->spouse)->toBe([$husband->id]);
});
