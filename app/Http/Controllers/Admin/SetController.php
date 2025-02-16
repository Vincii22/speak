<?php

// app/Http/Controllers/Admin/SetController.php
namespace App\Http\Controllers\Admin;

use App\Models\Set;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetController extends Controller
{
    public function index()
    {
        $sets = Set::all();
        return view('admin.sets.index', compact('sets'));
    }

    public function create()
    {
        return view('admin.sets.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Set::create($request->all());
        return redirect()->route('admin.sets.index');
    }

    public function edit(Set $set)
    {
        return view('admin.sets.edit', compact('set'));
    }

    public function update(Request $request, Set $set)
    {
        $request->validate(['name' => 'required']);
        $set->update($request->all());
        return redirect()->route('admin.sets.index');
    }

    public function destroy(Set $set)
    {
        $set->delete();
        return redirect()->route('admin.sets.index');
    }
}
