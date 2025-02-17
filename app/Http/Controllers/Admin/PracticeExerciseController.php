<?php

// app/Http/Controllers/Admin/PracticeExerciseController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeCategory;
use App\Models\PracticeExercise;
use Illuminate\Http\Request;

class PracticeExerciseController extends Controller
{
    public function index()
    {
        $exercises = PracticeExercise::all();
        return view('admin.practiceExercises.index', compact('exercises'));
    }

    public function create()
    {
        $categories = PracticeCategory::all();
        return view('admin.practiceExercises.create', compact('categories'));
    }

    public function store(Request $request)
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

        PracticeExercise::create($data);
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
