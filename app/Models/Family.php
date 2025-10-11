<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Family extends Model
{
    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
