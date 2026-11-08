<?php

declare(strict_types=1);

use App\Models\Family;
use App\Services\FamilyStats;

it('returns zeros for an empty family', function (): void {
    expect((new FamilyStats)->summary())->toBe([
        'total' => 0,
        'generations' => 0,
        'male' => 0,
        'female' => 0,
        'common_surname' => null,
        'common_surname_count' => 0,
    ]);
});

it('counts members and the gender split', function (): void {
    Family::factory()->count(3)->create(['gender' => 'M']);
    Family::factory()->count(2)->create(['gender' => 'F']);

    $stats = (new FamilyStats)->summary();

    expect($stats['total'])->toBe(5)
        ->and($stats['male'])->toBe(3)
        ->and($stats['female'])->toBe(2);
});

it('counts one generation when nobody has parents', function (): void {
    Family::factory()->count(2)->create();

    expect((new FamilyStats)->summary()['generations'])->toBe(1);
});

it('measures the longest line through either parent', function (): void {
    $greatGrandmother = Family::factory()->create(['gender' => 'F']);
    $grandmother = Family::factory()->create(['gender' => 'F', 'mother_id' => $greatGrandmother->id]);
    $father = Family::factory()->create(['gender' => 'M']);
    $mother = Family::factory()->create(['gender' => 'F', 'mother_id' => $grandmother->id]);
    Family::factory()->create(['father_id' => $father->id, 'mother_id' => $mother->id]);

    expect((new FamilyStats)->summary()['generations'])->toBe(4);
});

it('ignores parent ids that point at missing members', function (): void {
    Family::factory()->create(['father_id' => 9999]);

    expect((new FamilyStats)->summary()['generations'])->toBe(1);
});

it('does not loop forever on circular parent links', function (): void {
    $a = Family::factory()->create();
    $b = Family::factory()->create(['father_id' => $a->id]);
    $a->updateQuietly(['father_id' => $b->id]);

    expect((new FamilyStats)->summary()['generations'])->toBe(2);
});

it('finds the most common surname ignoring case, spacing and blanks', function (): void {
    Family::factory()->create(['last_name' => 'Bhattarai']);
    Family::factory()->create(['last_name' => ' bhattarai ']);
    Family::factory()->create(['last_name' => 'Sharma']);
    Family::factory()->count(3)->create(['last_name' => '']);

    $stats = (new FamilyStats)->summary();

    expect($stats['common_surname'])->toBe('Bhattarai')
        ->and($stats['common_surname_count'])->toBe(2);
});

it('breaks surname ties alphabetically', function (): void {
    Family::factory()->create(['last_name' => 'Sharma']);
    Family::factory()->create(['last_name' => 'Adhikari']);

    expect((new FamilyStats)->summary()['common_surname'])->toBe('Adhikari');
});
