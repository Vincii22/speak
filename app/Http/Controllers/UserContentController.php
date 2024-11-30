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

    public function submitRecording(Request $request, $categoryId, $level)
{
    dd($request->all());
    $request->validate([
        'audio' => 'required|file|mimes:wav,mp3,ogg', // Ensure this is valid
    ]);

    try {
        // Get the uploaded audio file
        $audioFile = $request->file('audio');

        // Generate a unique filename for the mp3 file
        $mp3Filename = uniqid() . '.mp3';

        // Store the audio file temporarily (retain original format)
        $audioPath = $audioFile->storeAs('temp_audio', $mp3Filename); // We store the file with a temporary mp3 name

        // Convert the uploaded audio to mp3
        $mp3FilePath = 'recordings/' . uniqid() . '.mp3'; // This will store the final mp3 file

        // Create an instance of FFMpeg to convert the file
        $ffmpeg = FFMpeg::create();
        $audio = $ffmpeg->open(storage_path('app/' . $audioPath));
        $audio->save(new Mp3(), storage_path('app/' . $mp3FilePath)); // Save it as mp3 format

        // Delete the temporary file after conversion
        Storage::delete($audioPath);

        // Using Auth::user() for better compatibility
        $user = Auth::user();
        $userId = (int) $user->id;

        // Save to AudioAttempt (save the final mp3 path)
        $audioAttempt = AudioAttempt::create([
            'user_id' => $userId,
            'category_id' => $categoryId,
            'level' => $level,
            'audio_file' => $mp3FilePath, // Store path to mp3 file
        ]);

        // Save to UserProgress (if the level is completed)
        $userProgress = UserProgress::where('user_id', $userId)
            ->where('category_id', $categoryId)
            ->where('level', $level)
            ->first();

        if ($userProgress) {
            $userProgress->completed_at = now();
            $userProgress->save();
        } else {
            $userProgress = UserProgress::create([
                'user_id' => $userId,
                'category_id' => $categoryId,
                'level' => $level,
                'completed_at' => now(),
                'audio_file_path' => $mp3FilePath,
            ]);
        }

        return redirect()->route('user.content.success')->with('status', 'Recording submitted successfully!');
    } catch (\Exception $e) {
        Log::error('Error during audio submission: ' . $e->getMessage());
        return redirect()->route('user.content.error')->with('error', 'There was an error saving your recording. Please try again.');
    }
}

public function success()
{
    return view('user.content.success');
}

public function error()
{
    return view('user.content.error');
}


public function schedule()
{
    return view('user.calendar');
}
}
