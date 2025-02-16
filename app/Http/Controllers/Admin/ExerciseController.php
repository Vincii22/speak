<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exercise;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $request->validate([
            'name' => 'required',
            'media_url' => 'required|url',
        ]);
        $category->exercises()->create($request->all());
        return redirect()->route('admin.exercises.index', $category);
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
