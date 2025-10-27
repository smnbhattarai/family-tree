<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\FamilyObserver;
use Database\Factories\FamilyFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

        return $exploded[0].'/thumbnail/'.$thumbFilename;
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

    public function getChildrensId(): array
    {
        return self::query()->where('father_id', $this->id)->orWhere('mother_id', $this->id)->pluck('id')->toArray();
    }

    public function siblings(): ?Collection
    {
        if (! $this->father_id || ! $this->mother_id) {
            return null;
        }

        return self::query()
            ->where(function ($query): void {
                $query->where('father_id', $this->father_id);
                $query->orWhere('mother_id', $this->mother_id);
            })
            ->where('id', '!=', $this->id)
            ->get();
    }

    /**
     * Get the spouse.
     */
    protected function spouse(): Attribute
    {
        return Attribute::make(

            get: fn (?string $value): mixed => $value === null || $value === '' || $value === '0' ? [] : array_map('intval', json_decode($value)),

        );
    }
}
