<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PracticeExercise;
use App\Models\PracticeCategory;

class PracticeExerciseController extends Controller
{
    // Show all exercises from a specific category
    public function index($categoryId)
    {
        $category = PracticeCategory::findOrFail($categoryId); // Fetch the category
        $exercises = $category->exercises; // Fetch exercises related to this category

        return view('user.practices.index', compact('category', 'exercises'));
    }

    // Show a single exercise
    public function show($categoryId, $exerciseId)
    {
        $category = PracticeCategory::findOrFail($categoryId); // Fetch the category
        $exercise = PracticeExercise::findOrFail($exerciseId); // Fetch the exercise

        return view('user.practices.show', compact('category', 'exercise'));
    }
}
