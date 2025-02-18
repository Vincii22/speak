<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Set;

class SetSeeder extends Seeder
{
    public function run(): void
    {
        $sets = [
            ['name' => 'FIRST SET (P)'],
            ['name' => 'SECOND SET (B)'],
            ['name' => 'THIRD SET (M)'],
        ];

        Set::insert($sets);
    }
}
