<?php

// app/Http/Controllers/Admin/PracticeExerciseController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeCategory;
use App\Models\PracticeExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class PracticeExerciseController extends Controller
{
    public function index()
    {
        $exercises = PracticeExercise::with('category')->get(); // Eager load 'category'
        return view('admin.practiceExercises.index', compact('exercises'));
    }


    public function create()
    {
        $categories = PracticeCategory::all();
        return view('admin.practiceExercises.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Log incoming request data
        Log::info('Incoming request data:', $request->all());

        // Validate the input
        $request->validate([
            'name' => 'required',
            'practiceCategory_id' => 'required|exists:practice_categories,id', // Validate that the category exists
            'media_file' => 'required|file|mimes:mp4,mp3,avi,mkv,wav,flac,m4a', // Adjust the file types as needed
        ]);

        $media_file = null;

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
                    return back()->withErrors('File storage error. Please try again.');
                }
            } catch (\Exception $e) {
                Log::error('File upload failed: ' . $e->getMessage());
                return back()->withErrors('File upload failed. Please try again.');
            }
        } else {
            Log::error('No file uploaded');
            return back()->withErrors('No file uploaded');
        }

        // If no file is uploaded, log the error
        if (!$media_file) {
            Log::error('No media file provided');
            return back()->withErrors('No media uploaded');
        }

        // Store the exercise with the uploaded file and practiceCategory_id
        try {
            $exercise = PracticeExercise::create([
                'name' => $request->name,
                'practiceCategory_id' => $request->practiceCategory_id, // Include the practiceCategory_id here
                'media_file' => $media_file, // Store the file path
            ]);
            Log::info('Exercise Created:', ['name' => $request->name, 'practiceCategory_id' => $request->practiceCategory_id, 'media_file' => $media_file]);
        } catch (\Exception $e) {
            Log::error('Error creating exercise: ' . $e->getMessage());
            return back()->withErrors('Error saving exercise.');
        }

        // Redirect to the exercises index page with success message
        return redirect()->route('admin.practiceExercises.index')->with('success', 'Exercise created successfully.');
    }


    public function edit(PracticeExercise $practiceExercise)
    {
        $categories = PracticeCategory::all();
        return view('admin.practiceExercises.edit', compact('practiceExercise', 'categories'));
    }

    public function update(Request $request, PracticeExercise $practiceExercise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'practiceCategory_id' => 'required|exists:practiceCategories,id',
            'media_file' => 'nullable|file|mimes:mp4,mp3,png,jpeg,jpg,gif',
        ]);

        $data = $request->all();

        if ($request->hasFile('media_file')) {
            $data['media_file'] = $request->file('media_file')->store('media');
        }

        $practiceExercise->update($data);
        return redirect()->route('admin.practiceExercises.index')->with('success', 'Exercise updated successfully.');
    }

    public function destroy(PracticeExercise $practiceExercise)
    {
        $practiceExercise->delete();
        return redirect()->route('admin.practiceExercises.index')->with('success', 'Exercise deleted successfully.');
    }
}
