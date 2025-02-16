<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exercise;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class ExerciseController extends Controller
{
    public function index(Category $category)
    {
        $exercises = $category->exercises;
        return view('admin.exercises.index', compact('exercises', 'category'));
    }

    public function create(Category $category)
    {
        return view('admin.exercises.create', compact('category'));
    }

    public function store(Request $request, Category $category)
    {
        // Log incoming request data
        Log::info('Request Data:', $request->all());

        // Validate the input
        $request->validate([
            'name' => 'required',
            'media_type' => 'required|in:url,file',
        ]);

        $media_url = null;
        $media_file = null;

        // Handle URL input
        if ($request->media_type === 'url') {
            $request->validate([
                'media_url' => 'required|url',
            ]);
            $media_url = $request->media_url; // Save the media URL
            Log::info('Media URL:', [$media_url]); // Log the media URL
        }

        // Handle File input
        if ($request->media_type === 'file') {
            $request->validate([
                'media_file' => 'required|file|mimes:mp4,mp3,avi,mkv,wav,flac,m4a',
            ]);

            // Debugging: Log the file details (real path, name, etc.)
            Log::info('File received:', [
                'file_name' => $request->file('media_file')->getClientOriginalName(),
                'file_mime' => $request->file('media_file')->getMimeType(),
                'file_size' => $request->file('media_file')->getSize(),
            ]);

            // Check if the file is properly uploaded
            if ($request->hasFile('media_file')) {
                try {
                    // Debugging: Log the temporary file path and final destination
                    $tempFilePath = $request->file('media_file')->getRealPath();
                    Log::info('Temp file path:', [$tempFilePath]);

                    // Store the file in the 'media' directory within public disk
                    $media_file = $request->file('media_file')->store('media', 'public');
                    Log::info('File stored at:', [$media_file]);

                    // Verify the file exists after upload
                    $storedFilePath = storage_path('app/public/' . $media_file);
                    if (!file_exists($storedFilePath)) {
                        Log::error('File does not exist at path after storage: ' . $storedFilePath);
                    }
                } catch (\Exception $e) {
                    Log::error('File upload failed: ' . $e->getMessage());
                    return back()->withErrors('File upload failed. Please try again.');
                }
            } else {
                Log::error('No file uploaded');
                return back()->withErrors('No file uploaded');
            }
        }

        // If no media URL or file provided, log the error
        if (!$media_url && !$media_file) {
            Log::error('No media URL or file provided');
            return back()->withErrors('No media uploaded');
        }

        // Create the exercise with either the media URL or file
        try {
            $exercise = $category->exercises()->create([
                'name' => $request->name,
                'media_url' => $media_url, // Store the URL if provided
                'media_file' => $media_file, // Store the file path if file uploaded
            ]);
            Log::info('Exercise Created:', ['name' => $request->name, 'media_url' => $media_url, 'media_file' => $media_file]);
        } catch (\Exception $e) {
            Log::error('Error creating exercise: ' . $e->getMessage());
            return back()->withErrors('Error saving exercise.');
        }

        return redirect()->route('admin.categories.exercises.index', $category);
    }





    public function edit(Exercise $exercise)
    {
        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name' => 'required',
            'media_url' => 'required|url',
        ]);
        $exercise->update($request->all());
        return redirect()->route('admin.exercises.index', $exercise->category);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return redirect()->route('admin.exercises.index', $exercise->category);
    }
}
