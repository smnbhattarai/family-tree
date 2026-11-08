<?php

declare(strict_types=1);

use App\Models\Family;
use App\Services\BirthdayCalendar;
use Carbon\CarbonImmutable;

beforeEach(function (): void {
    $this->travelTo('2026-11-08 09:00:00');
});

it('lists birthdays in the window soonest first with the age being turned', function (): void {
    $later = Family::factory()->create(['dob' => '1980-12-01']);
    $today = Family::factory()->create(['dob' => '1990-11-08']);
    $soon = Family::factory()->create(['dob' => '2000-11-10']);

    $birthdays = (new BirthdayCalendar)->upcoming(30);

    expect($birthdays->pluck('member.id')->all())->toBe([$today->id, $soon->id, $later->id])
        ->and($birthdays->pluck('days_away')->all())->toBe([0, 2, 23])
        ->and($birthdays->pluck('turning')->all())->toBe([36, 26, 46])
        ->and($birthdays->first()['date']->toDateString())->toBe('2026-11-08');
});

it('includes the last day of the window but nothing after it', function (): void {
    $edge = Family::factory()->create(['dob' => '1990-12-08']);
    Family::factory()->create(['dob' => '1990-12-09']);

    expect((new BirthdayCalendar)->upcoming(30)->pluck('member.id')->all())->toBe([$edge->id]);
});

it('wraps across the new year', function (): void {
    $member = Family::factory()->create(['dob' => '1990-01-02']);

    $birthday = (new BirthdayCalendar)->upcoming(60)->sole();

    expect($birthday['member']->id)->toBe($member->id)
        ->and($birthday['date']->toDateString())->toBe('2027-01-02')
        ->and($birthday['turning'])->toBe(37);
});

it('skips members without a date of birth or born in the future', function (): void {
    Family::factory()->create(['dob' => null]);
    Family::factory()->create(['dob' => '2027-11-10']);

    expect((new BirthdayCalendar)->upcoming(365))->toBeEmpty();
});

it('orders members sharing a birthday by name', function (): void {
    $zed = Family::factory()->create(['first_name' => 'Zed', 'middle_name' => '', 'dob' => '1990-11-20']);
    $amy = Family::factory()->create(['first_name' => 'Amy', 'middle_name' => '', 'dob' => '1995-11-20']);

    expect((new BirthdayCalendar)->upcoming(30)->pluck('member.id')->all())->toBe([$amy->id, $zed->id]);
});

it('can start the window from a given day', function (): void {
    $member = Family::factory()->create(['dob' => '1990-03-01']);

    $birthday = (new BirthdayCalendar)->upcoming(7, CarbonImmutable::parse('2027-02-25'))->sole();

    expect($birthday['member']->id)->toBe($member->id)
        ->and($birthday['days_away'])->toBe(4);
});
