<?php

// app/Http/Controllers/Admin/PracticeCategoryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeCategory;
use Illuminate\Http\Request;

class PracticeCategoryController extends Controller
{
    public function index()
    {
        $categories = PracticeCategory::all();
        return view('admin.practiceCategories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.practiceCategories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PracticeCategory::create($request->all());
        return redirect()->route('admin.practiceCategories.index')->with('success', 'Category created successfully.');
    }

    public function edit(PracticeCategory $practiceCategory)
    {
        return view('admin.practiceCategories.edit', compact('practiceCategory'));
    }

    public function update(Request $request, PracticeCategory $practiceCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $practiceCategory->update($request->all());
        return redirect()->route('admin.practiceCategories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(PracticeCategory $practiceCategory)
    {
        $practiceCategory->delete();
        return redirect()->route('admin.practiceCategories.index')->with('success', 'Category deleted successfully.');
    }
}
