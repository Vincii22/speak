<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PracticeCategory;
class PracticeCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'JAW EXERCISES'],
            ['name' => 'TONGUE EXERCISES'],
        ];

        PracticeCategory::insert($categories);
    }
}
