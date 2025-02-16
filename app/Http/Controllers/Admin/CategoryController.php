<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Day;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Day $day)
    {
        $categories = $day->categories;  // Get categories associated with this specific day
        return view('admin.categories.index', compact('categories', 'day'));
    }


    public function create(Day $day)
    {
        return view('admin.categories.create', compact('day'));
    }

    public function store(Request $request, Day $day)
    {
        $request->validate(['name' => 'required']);
        $day->categories()->create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.days.categories.index', $day);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);
        $category->update($request->all());
        return redirect()->route('admin.categories.index', $category->day);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index', $category->day);
    }
}
