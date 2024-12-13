<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            [
                'month' => 'December',
                'day' => '12',
                'year' => '2024',
                'time' => '10:00 AM',
                'speech_language_pathologist' => 'Dr. Jane Doe',
                'email' => 'jane.doe@example.com',
                'contact' => '123-456-7890',
                'status' => 'confirmed',
                'user_id' => 1,
                'professional_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 'January',
                'day' => '5',
                'year' => '2025',
                'time' => '2:00 PM',
                'speech_language_pathologist' => 'Dr. John Smith',
                'email' => 'john.smith@example.com',
                'contact' => '987-654-3210',
                'status' => 'pending',
                'user_id' => 2,
                'professional_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 'January',
                'day' => '6',
                'year' => '2025',
                'time' => '2:00 PM',
                'speech_language_pathologist' => 'Dr. John Smith',
                'email' => 'john.smith@example.com',
                'contact' => '987-654-3210',
                'status' => 'pending',
                'user_id' => 2,
                'professional_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 'January',
                'day' => '7',
                'year' => '2025',
                'time' => '2:00 PM',
                'speech_language_pathologist' => 'Dr. John Smith',
                'email' => 'john.smith@example.com',
                'contact' => '987-654-3210',
                'status' => 'pending',
                'user_id' => 2,
                'professional_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 'January',
                'day' => '8',
                'year' => '2025',
                'time' => '2:00 PM',
                'speech_language_pathologist' => 'Dr. John Smith',
                'email' => 'john.smith@example.com',
                'contact' => '987-654-3210',
                'status' => 'pending',
                'user_id' => 2,
                'professional_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 'February',
                'day' => '20',
                'year' => '2025',
                'time' => '11:30 AM',
                'speech_language_pathologist' => 'Dr. Emily Clark',
                'email' => 'emily.clark@example.com',
                'contact' => '555-123-4567',
                'status' => 'completed',
                'user_id' => 3,
                'professional_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
