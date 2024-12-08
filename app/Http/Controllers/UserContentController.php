<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use App\Models\Sound;
use App\Models\UserProgress;
use App\Models\AudioAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class UserContentController extends Controller
{
    // Show all categories with their status (locked/unlocked)
    public function index()
    {
        $categories = Category::with('levels')->get();
        $userId = Auth::id();

        foreach ($categories as $category) {
            $category->unlocked = ($category->id == 1) || $this->isCategoryUnlocked($userId, $category->id);
        }

        return view('user.content.index', compact('categories'));
    }
    // Check if a category is unlocked
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
    $userId = Auth::id();
    $category = Category::with('levels')->find($categoryId);

    // Check if the category is unlocked based on user progress
    $isUnlocked = $this->isCategoryUnlocked($userId, $categoryId);

    // Redirect if the category is locked
    if (!$isUnlocked) {
        return redirect()->route('user.content.index')
                         ->with('error', 'You must complete previous categories to unlock this one.');
    }

    // Fetch user progress for each level in this category
    $userProgress = UserProgress::where('user_id', $userId)
                                ->where('category_id', $categoryId)
                                ->get();

    return view('user.content.category', compact('category', 'userProgress'));
}

public function showLevel($categoryId, $level)
{
    $category = Category::findOrFail($categoryId);
    $sound = Sound::where('level_id', $level)->first();
    return view('user.content.level', compact('category', 'level', 'sound'));
}
    // Handle recording submission for a specific level

    public function submitRecording(Request $request, $categoryId, $levelId)
    {
        // Validate the video file
        $request->validate([
            'video' => 'required|file|mimes:webm,mp4,avi|max:102400', // 100MB max size
        ]);

        // Get authenticated user's ID
        $userId = Auth::id();

        // Get the uploaded video file
        $videoFile = $request->file('video');

        if ($videoFile) {
            // Save the video file
            $videoPath = $videoFile->storeAs('public/videos', $videoFile->getClientOriginalName());
            Log::info("Video stored at: " . $videoPath);

            // Attempt to insert into database
            try {
                $audioAttempt = AudioAttempt::create([
                    'user_id' => $userId,
                    'category_id' => $categoryId,
                    'level_id' => $levelId,
                    'video_file' => $videoPath, // Save file path to the database
                ]);

                // Debugging: Check the returned AudioAttempt object
                Log::info("Database insertion success: " . json_encode($audioAttempt));

                return redirect()->route('user.content.success')->with('status', 'Video submitted successfully!');
            } catch (\Exception $e) {
                // Log database insertion error
                Log::error('Database insertion failed: ' . $e->getMessage());
                return redirect()->route('user.content.error')->with('error', 'Failed to save the video to the database.');
            }
        }

        return redirect()->back()->with('error', 'No video file was uploaded.');
    }



    public function success()
    {
        return view('user.content.success');
    }

    public function error()
    {
        return view('user.content.error');
    }


}
