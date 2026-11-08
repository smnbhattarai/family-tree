<?php

declare(strict_types=1);

use App\Models\Family;

it('includes full and half siblings when both parents are known', function (): void {
    $father = Family::factory()->create(['gender' => 'M']);
    $mother = Family::factory()->create(['gender' => 'F']);
    $member = Family::factory()->create(['father_id' => $father->id, 'mother_id' => $mother->id]);
    $fullSibling = Family::factory()->create(['father_id' => $father->id, 'mother_id' => $mother->id]);
    $paternalHalf = Family::factory()->create(['father_id' => $father->id, 'mother_id' => null]);
    $maternalHalf = Family::factory()->create(['father_id' => null, 'mother_id' => $mother->id]);
    Family::factory()->create(['father_id' => null, 'mother_id' => null]);

    expect($member->siblings()->modelKeys())
        ->toEqualCanonicalizing([$fullSibling->id, $paternalHalf->id, $maternalHalf->id]);
});

it('finds siblings when only the father is known', function (): void {
    $father = Family::factory()->create(['gender' => 'M']);
    $member = Family::factory()->create(['father_id' => $father->id, 'mother_id' => null]);
    $sibling = Family::factory()->create(['father_id' => $father->id, 'mother_id' => null]);

    expect($member->siblings()->modelKeys())->toBe([$sibling->id]);
});

it('finds siblings when only the mother is known', function (): void {
    $mother = Family::factory()->create(['gender' => 'F']);
    $member = Family::factory()->create(['father_id' => null, 'mother_id' => $mother->id]);
    $sibling = Family::factory()->create(['father_id' => null, 'mother_id' => $mother->id]);

    expect($member->siblings()->modelKeys())->toBe([$sibling->id]);
});

it('has no siblings when no parent is known', function (): void {
    $member = Family::factory()->create(['father_id' => null, 'mother_id' => null]);
    Family::factory()->create(['father_id' => null, 'mother_id' => null]);

    expect($member->siblings())->toBeEmpty();
});
