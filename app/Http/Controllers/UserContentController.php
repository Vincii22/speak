<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use App\Models\UserProgress;
use App\Models\AudioAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserContentController extends Controller
{
    // Show all categories with their status (locked/unlocked)
    public function index()
    {
        $categories = Category::with('levels')->get();
        $userId = Auth::id();

        foreach ($categories as $category) {
            $category->unlocked = $this->isCategoryUnlocked($userId, $category->id);
        }

        return view('user.content.index', compact('categories'));
    }

    // Check if a category is unlocked
   // In UserContentController.php

private function isCategoryUnlocked($userId, $categoryId)
{
    // Always unlock the first category (SOUNDS)
    if ($categoryId == 1) {
        return true; // The first category is always unlocked
    }

    // Get all categories before the current one
    $previousCategories = Category::where('id', '<', $categoryId)->get();

    foreach ($previousCategories as $category) {
        // Check if the user has completed the previous category
        if (!UserProgress::where('user_id', $userId)
                         ->where('category_id', $category->id)
                         ->whereNotNull('completed_at')
                         ->exists()) {
            return false; // If any previous category is not completed, lock this category
        }
    }

    return true; // All previous categories must be completed to unlock this one
}


    // Show levels for a specific category
// In UserContentController.php

public function showCategory($categoryId)
{
    $category = Category::find($categoryId);

    // Ensure the category is unlocked before showing it
    if (!$category->unlocked) {
        return redirect()->route('user.content.index')
                         ->with('error', 'You must complete previous categories to unlock this one.');
    }

    // Normal category content
    return view('user.content.category', compact('category'));
}

    // Handle recording submission for a specific level
    public function submitRecording(Request $request, $categoryId, $level)
    {
        $userId = Auth::id();

        $audioPath = $request->file('audio')->store('audio_attempts', 'public');

        // Store the audio attempt
        AudioAttempt::create([
            'user_id' => $userId,
            'category_id' => $categoryId,
            'level' => $level,
            'audio_file' => $audioPath
        ]);

        // Update user progress
        UserProgress::updateOrCreate(
            ['user_id' => $userId, 'category_id' => $categoryId, 'level' => $level],
            ['completed_at' => now()]
        );

        return back()->with('status', 'Recording submitted successfully!');
    }
}
