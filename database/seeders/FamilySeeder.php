<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;

final class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Family::factory(2)->create();
    }
}
