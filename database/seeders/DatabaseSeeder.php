<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $this->call(ScheduleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call([
            PracticeCategorySeeder::class,
            PracticeExerciseSeeder::class,
            SetSeeder::class,
            DaySeeder::class,
            CategorySeeder::class,
            ExerciseSeeder::class,

        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
