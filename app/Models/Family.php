<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\FamilyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ObservedBy(FamilyObserver::class)]
final class Family extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function father(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'father_id');
    }

    public function mother(): HasOne
    {
        return $this->hasOne(self::class, 'id', 'mother_id');
    }

    public function spouses(): ?\Illuminate\Database\Eloquent\Collection
    {
        if ($this->spouse) {
            $spouse_ids = json_decode($this->spouse);

            return self::query()->findMany($spouse_ids);
        }

        return null;
    }

    public function name(): string
    {
        return "$this->first_name $this->middle_name $this->last_name";
    }

    public function thumbnailPath(): string
    {
        if (! $this->avatar) {
            return '';
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
}
