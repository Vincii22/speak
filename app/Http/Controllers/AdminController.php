<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use App\Models\Sound;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Category CRUD
    public function indexCategories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:categories', 'order' => 'required|integer']);
        Category::create($request->only(['name', 'order']));
        return redirect()->route('admin.categories.index')->with('status', 'Category created successfully');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate(['name' => 'required|string', 'order' => 'required|integer']);
        $category = Category::findOrFail($id);
        $category->update($request->only(['name', 'order']));
        return redirect()->route('admin.categories.index')->with('status', 'Category updated successfully');
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Category deleted successfully');
    }

    // Level CRUD
    public function indexLevels($categoryId)
    {
        $category = Category::with('levels')->findOrFail($categoryId);
        return view('admin.levels.index', compact('category'));
    }

    public function createLevel($categoryId)
    {
        return view('admin.levels.create', compact('categoryId'));
    }

    public function storeLevel(Request $request, $categoryId)
    {
        $request->validate(['level' => 'required|integer']);
        Level::create(['category_id' => $categoryId, 'level' => $request->level]);
        return redirect()->route('admin.levels.index', $categoryId)->with('status', 'Level created successfully');
    }

    public function editLevel($categoryId, $levelId)
    {
        $level = Level::findOrFail($levelId);
        return view('admin.levels.edit', compact('level', 'categoryId'));
    }

    public function updateLevel(Request $request, $categoryId, $levelId)
    {
        $request->validate(['level' => 'required|integer']);
        $level = Level::findOrFail($levelId);
        $level->update(['level' => $request->level]);
        return redirect()->route('admin.levels.index', $categoryId)->with('status', 'Level updated successfully');
    }

    public function destroyLevel($categoryId, $levelId)
    {
        $level = Level::findOrFail($levelId);
        $level->delete();
        return redirect()->route('admin.levels.index', $categoryId)->with('status', 'Level deleted successfully');
    }

    // Sound CRUD
    public function indexSounds($levelId)
    {
        $level = Level::with('sounds')->findOrFail($levelId);
        return view('admin.sounds.index', compact('level'));
    }

    public function createSound($levelId)
    {
        return view('admin.sounds.create', compact('levelId'));
    }

    public function storeSound(Request $request, $levelId)
    {
        $request->validate(['audio_file' => 'required|file|mimes:mp3,wav']);
        $audioPath = $request->file('audio_file')->store('sounds', 'public');

        Sound::create(['level_id' => $levelId, 'audio_file' => $audioPath]);
        return redirect()->route('admin.sounds.index', $levelId)->with('status', 'Sound created successfully');
    }

    public function destroySound($levelId, $soundId)
    {
        $sound = Sound::findOrFail($soundId);
        $sound->delete();
        return redirect()->route('admin.sounds.index', $levelId)->with('status', 'Sound deleted successfully');
    }
}
