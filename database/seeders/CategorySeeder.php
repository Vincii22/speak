<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Day;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $days = Day::all();

        foreach ($days as $day) {
            Category::create(['day_id' => 1, 'name' => 'SOUND']);
            Category::create(['day_id' => 1, 'name' => 'SYLLABLE']);

            Category::create(['day_id' => 2, 'name' => 'SYLLABLE']);
            Category::create(['day_id' => 2, 'name' => 'WORDS']);

            Category::create(['day_id' => 3, 'name' => 'WORDS']);
            Category::create(['day_id' => 3, 'name' => 'PHRASES']);

            Category::create(['day_id' => 4, 'name' => 'PHRASES']);
            Category::create(['day_id' => 4, 'name' => 'SENTENCES']);

            Category::create(['day_id' => 5, 'name' => 'SENTENCES']);

            Category::create(['day_id' => 6, 'name' => 'SOUND']);
            Category::create(['day_id' => 6, 'name' => 'SYLLABLE']);

            Category::create(['day_id' => 7, 'name' => 'SYLLABLE']);
            Category::create(['day_id' => 7, 'name' => 'WORDS']);

            Category::create(['day_id' => 8, 'name' => 'WORDS']);
            Category::create(['day_id' => 8, 'name' => 'PHRASES']);

            Category::create(['day_id' => 9, 'name' => 'PHRASES']);
            Category::create(['day_id' => 9, 'name' => 'SENTENCES']);

            Category::create(['day_id' => 10, 'name' => 'SENTENCES']);

            Category::create(['day_id' => 11, 'name' => 'SOUND']);
            Category::create(['day_id' => 11, 'name' => 'SYLLABLE']);

            Category::create(['day_id' => 12, 'name' => 'SYLLABLE']);
            Category::create(['day_id' => 12, 'name' => 'WORDS']);

            Category::create(['day_id' => 13, 'name' => 'WORDS']);
            Category::create(['day_id' => 13, 'name' => 'PHRASES']);

            Category::create(['day_id' => 14, 'name' => 'PHRASES']);
            Category::create(['day_id' => 14, 'name' => 'SENTENCES']);

            Category::create(['day_id' => 15, 'name' => 'SENTENCES']);


        }
    }
}
