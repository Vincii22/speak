<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;
use App\Models\Set;

class DaySeeder extends Seeder
{
    public function run(): void
    {
        $sets = Set::all();

        foreach ($sets as $set) {
            Day::create(['set_id' => 1, 'name' => 'Day 1']);
            Day::create(['set_id' => 1, 'name' => 'Day 2']);
            Day::create(['set_id' => 1, 'name' => 'Day 3']);
            Day::create(['set_id' => 1, 'name' => 'Day 4']);
            Day::create(['set_id' => 1, 'name' => 'Day 5']);

            Day::create(['set_id' => 2, 'name' => 'Day 1']);
            Day::create(['set_id' => 2, 'name' => 'Day 2']);
            Day::create(['set_id' => 2, 'name' => 'Day 3']);
            Day::create(['set_id' => 2, 'name' => 'Day 4']);
            Day::create(['set_id' => 2, 'name' => 'Day 5']);

            Day::create(['set_id' => 3, 'name' => 'Day 1']);
            Day::create(['set_id' => 3, 'name' => 'Day 2']);
            Day::create(['set_id' => 3, 'name' => 'Day 3']);
            Day::create(['set_id' => 3, 'name' => 'Day 4']);
            Day::create(['set_id' => 3, 'name' => 'Day 5']);
        }
    }
}
