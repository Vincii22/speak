<?php

namespace App\Http\Controllers\Admin;

use App\Models\Day;
use App\Models\Set;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DayController extends Controller
{
    public function index(Set $set)
    {
        $days = $set->days;
        return view('admin.days.index', compact('days', 'set'));
    }

    public function create(Set $set)
    {
        return view('admin.days.create', compact('set'));
    }

    public function store(Request $request, Set $set)
    {
        $request->validate(['name' => 'required']);
        $set->days()->create($request->all());
        return redirect()->route('admin.days.index', $set);
    }

    public function edit(Day $day)
    {
        return view('admin.days.edit', compact('day'));
    }

    public function update(Request $request, Day $day)
    {
        $request->validate(['name' => 'required']);
        $day->update($request->all());
        return redirect()->route('admin.days.index', $day->set);
    }

    public function destroy(Day $day)
    {
        $day->delete();
        return redirect()->route('admin.days.index', $day->set);
    }
}
