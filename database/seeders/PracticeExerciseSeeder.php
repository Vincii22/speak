<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\PracticeExercise;
use App\Models\PracticeCategory;

class PracticeExerciseSeeder extends Seeder
{
    public function run(): void
    {
        // Get categories
        $categories = PracticeCategory::all();

        // If no categories exist, run PracticeCategorySeeder first
        if ($categories->isEmpty()) {
            $this->call(PracticeCategorySeeder::class);
            $categories = PracticeCategory::all();
        }

        // Ensure storage directory exists
        Storage::disk('public')->makeDirectory('exercises');

        $exercises = [
            [
                'name' => 'Open Wide and Close Tight',
                'practiceCategory_id' => $categories->where('name', 'JAW EXERCISES')->first()->id ?? 1,
                'media_file' => 'JAW EXERCISES/- Open Wide and Close Tight.mp4',
            ],
            [
                'name' => 'Jaw Drop',
                'practiceCategory_id' => $categories->where('name', 'JAW EXERCISES')->first()->id ?? 1,
                'media_file' => 'JAW EXERCISES/Jaw Drop.mp4',
            ],
            [
                'name' => 'Move Jaw Forward and Backward',
                'practiceCategory_id' => $categories->where('name', 'JAW EXERCISES')->first()->id ?? 1,
                'media_file' => 'JAW EXERCISES/Move Jaw Forward And Backward.mp4',
            ],
            [
                'name' => 'Move Jaw From Side to Side',
                'practiceCategory_id' => $categories->where('name', 'JAW EXERCISES')->first()->id ?? 1,
                'media_file' => 'JAW EXERCISES/Move Jaw From Side To Side.mp4',
            ],
            [
                'name' => 'Wee Woo Whoa',
                'practiceCategory_id' => $categories->where('name', 'JAW EXERCISES')->first()->id ?? 1,
                'media_file' => 'JAW EXERCISES/Wee Woo Whoa.mp4',
            ],
            [
                'name' => 'LATERALIZATION',
                'practiceCategory_id' => $categories->where('name', 'TONGUE EXERCISES')->first()->id ?? 2,
                'media_file' => 'TONGUE EXERCISES/LATERALIZATION.mp4',
            ],
            [
                'name' => 'PROTRUSION',
                'practiceCategory_id' => $categories->where('name', 'TONGUE EXERCISES')->first()->id ?? 2,
                'media_file' => 'TONGUE EXERCISES/PROTRUSION.mp4',
            ],
            [
                'name' => 'PUSH',
                'practiceCategory_id' => $categories->where('name', 'TONGUE EXERCISES')->first()->id ?? 2,
                'media_file' => 'TONGUE EXERCISES/PUSH.mp4',
            ],
            [
                'name' => 'SCRAPE',
                'practiceCategory_id' => $categories->where('name', 'TONGUE EXERCISES')->first()->id ?? 2,
                'media_file' => 'TONGUE EXERCISES/SCRAPE.mp4',
            ],
            [
                'name' => 'TONGUE SLIP',
                'practiceCategory_id' => $categories->where('name', 'TONGUE EXERCISES')->first()->id ?? 2,
                'media_file' => 'TONGUE EXERCISES/TONGUE SLIP.mp4',
            ],

        ];

        // Copy media files (Make sure these exist in the "storage/app/public/exercises" folder)
        foreach ($exercises as &$exercise) {
            $sourcePath = database_path("seeders/media/{$exercise['media_file']}");
            $destinationPath = "public/{$exercise['media_file']}";

            if (file_exists($sourcePath)) {
                Storage::put($destinationPath, file_get_contents($sourcePath));
            }
        }

        // Insert exercises
        PracticeExercise::insert($exercises);
    }
}
