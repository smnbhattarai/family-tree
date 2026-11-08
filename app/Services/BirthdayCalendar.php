<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Family;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Illuminate\Support\Collection;

/**
 * Lists family members whose birthday falls within the coming days.
 */
final class BirthdayCalendar
{
    /**
     * Birthdays from the given day (defaults to today) up to and including `$days` days ahead,
     * soonest first.
     *
     * @return Collection<int, array{member: Family, date: CarbonImmutable, days_away: int, turning: int}>
     */
    public function upcoming(int $days = 30, ?CarbonInterface $from = null): Collection
    {
        $from = CarbonImmutable::instance($from ?? today())->startOfDay();
        $until = $from->addDays(max(0, $days));

        return Family::query()
            ->whereNotNull('dob')
            ->get()
            ->map(function (Family $member) use ($from): ?array {
                $date = $member->nextBirthday($from);

                if (! $date instanceof CarbonImmutable) {
                    return null;
                }

                return [
                    'member' => $member,
                    'date' => $date,
                    'days_away' => (int) $from->diffInDays($date),
                    'turning' => (int) $member->age($date),
                ];
            })
            ->filter(fn (?array $birthday): bool => $birthday !== null && $birthday['date']->lessThanOrEqualTo($until))
            ->sortBy([
                ['days_away', 'asc'],
                fn (array $a, array $b): int => strcmp($a['member']->name(), $b['member']->name()),
            ])
            ->values();
    }
}
