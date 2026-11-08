<?php

declare(strict_types=1);

use App\Models\Family;
use Carbon\CarbonImmutable;

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

it('calculates age in whole years', function (string $dob, string $today, ?int $expected): void {
    $member = Family::factory()->make(['dob' => $dob]);

    expect($member->age(CarbonImmutable::parse($today)))->toBe($expected);
})->with([
    'birthday already passed this year' => ['1990-03-10', '2026-11-08', 36],
    'birthday later this year' => ['1990-12-25', '2026-11-08', 35],
    'birthday is today' => ['1990-11-08', '2026-11-08', 36],
    'born today' => ['2026-11-08', '2026-11-08', 0],
    'leap day in a non-leap year before 1 March' => ['2000-02-29', '2027-02-28', 26],
    'leap day in a non-leap year on 1 March' => ['2000-02-29', '2027-03-01', 27],
    'born in the future' => ['2030-01-01', '2026-11-08', null],
]);

it('has no age or next birthday without a usable date of birth', function (?string $dob): void {
    $member = Family::factory()->make(['dob' => $dob]);

    expect($member->birthDate())->toBeNull()
        ->and($member->age())->toBeNull()
        ->and($member->nextBirthday())->toBeNull();
})->with([
    'missing' => [null],
    'empty' => [''],
    'garbage' => ['not-a-date'],
]);

it('finds the next birthday on or after a day', function (string $dob, string $from, string $expected): void {
    $member = Family::factory()->make(['dob' => $dob]);

    expect($member->nextBirthday(CarbonImmutable::parse($from))->toDateString())->toBe($expected);
})->with([
    'later this year' => ['1990-12-25', '2026-11-08', '2026-12-25'],
    'today' => ['1990-11-08', '2026-11-08', '2026-11-08'],
    'already passed rolls to next year' => ['1990-03-10', '2026-11-08', '2027-03-10'],
    'leap day in a leap year' => ['2000-02-29', '2027-11-08', '2028-02-29'],
    'leap day falls back to 28 February' => ['2000-02-29', '2026-11-08', '2027-02-28'],
]);

it('defaults age and next birthday to today', function (): void {
    $this->travelTo('2026-11-08 18:30:00');
    $member = Family::factory()->make(['dob' => '1990-11-09']);

    expect($member->age())->toBe(35)
        ->and($member->nextBirthday()->toDateString())->toBe('2026-11-09');
});
