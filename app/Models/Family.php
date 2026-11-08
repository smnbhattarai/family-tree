<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\FamilyObserver;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Carbon\Exceptions\InvalidFormatException;
use Database\Factories\FamilyFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read list<int> $spouse
 */
#[ObservedBy(FamilyObserver::class)]
final class Family extends Model
{
    /** @use HasFactory<FamilyFactory> */
    use HasFactory;

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return HasOne<Family, Family> */
    public function father(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'father_id');
    }

    /** @return HasOne<Family, Family> */
    public function mother(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mother_id');
    }

    public function spouses(): ?Collection
    {
        if ($this->spouse) {

            return self::query()->findMany($this->spouse);
        }

        return null;
    }

    public function childrens(): ?Collection
    {
        return self::query()->where('father_id', $this->id)->orWhere('mother_id', $this->id)->get();
    }

    public function name(): string
    {
        return "$this->first_name $this->middle_name $this->last_name";
    }

    public function thumbnailPath(): string
    {
        if (! $this->avatar) {
            return asset('assets/images/avatar.png');
        }

        $originalFile = $this->avatar;
        $exploded = explode('/', $originalFile);
        $filename = end($exploded);
        $thumbFilename = "thumb-$filename";

        return asset($exploded[0].'/thumbnail/'.$thumbFilename);
    }

    public function avatarFilename(): string
    {
        if (! $this->avatar) {
            return '';
        }

        $originalFile = $this->avatar;
        $exploded = explode('/', $originalFile);

        return end($exploded);
    }

    public function avatarThumbnailFilename(): string
    {
        if (! $this->avatar) {
            return '';
        }

        $originalFile = $this->avatar;
        $exploded = explode('/', $originalFile);
        $filename = end($exploded);
        $thumbFilename = "thumb-$filename";

        return 'thumbnail/'.$thumbFilename;
    }

    /**
     * The date of birth, or null when it is missing or unreadable.
     */
    public function birthDate(): ?CarbonImmutable
    {
        if (! $this->dob) {
            return null;
        }

        try {
            return CarbonImmutable::parse($this->dob)->startOfDay();
        } catch (InvalidFormatException) {
            return null;
        }
    }

    /**
     * Age in whole years on the given day (defaults to today), or null when unknown.
     */
    public function age(?CarbonInterface $on = null): ?int
    {
        $birthDate = $this->birthDate();
        $on = CarbonImmutable::instance($on ?? today())->startOfDay();

        if (! $birthDate instanceof CarbonImmutable || $birthDate->greaterThan($on)) {
            return null;
        }

        return (int) $birthDate->diffInYears($on);
    }

    /**
     * The next birthday on or after the given day (defaults to today).
     * Members born on 29 February celebrate on 28 February in non-leap years.
     */
    public function nextBirthday(?CarbonInterface $from = null): ?CarbonImmutable
    {
        $birthDate = $this->birthDate();
        $from = CarbonImmutable::instance($from ?? today())->startOfDay();

        if (! $birthDate instanceof CarbonImmutable || $birthDate->greaterThan($from)) {
            return null;
        }

        $birthday = $this->birthdayInYear($birthDate, $from->year);

        return $birthday->lessThan($from) ? $this->birthdayInYear($birthDate, $from->year + 1) : $birthday;
    }

    /**
     * Members sharing at least one known parent, including half-siblings.
     *
     * @return Collection<int, Family>
     */
    public function siblings(): Collection
    {
        if (! $this->father_id && ! $this->mother_id) {
            return new Collection;
        }

        return self::query()
            ->where(function ($query): void {
                $query->when($this->father_id, fn ($query) => $query->orWhere('father_id', $this->father_id));
                $query->when($this->mother_id, fn ($query) => $query->orWhere('mother_id', $this->mother_id));
            })
            ->whereKeyNot($this->id)
            ->get();
    }

    /**
     * Get the spouse.
     */
    public function spouse(): Attribute
    {
        return Attribute::make(

            get: fn (?string $value): mixed => $value === null || $value === '' || $value === '0' ? [] : array_map('intval', json_decode($value)),

        );
    }

    private function birthdayInYear(CarbonImmutable $birthDate, int $year): CarbonImmutable
    {
        $day = min($birthDate->day, CarbonImmutable::create($year, $birthDate->month)->daysInMonth);

        return CarbonImmutable::create($year, $birthDate->month, $day);
    }
}
