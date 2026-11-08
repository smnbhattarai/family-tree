<?php

declare(strict_types=1);

use App\Models\Family;
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
