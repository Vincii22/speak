<?php

namespace App\Http\Controllers\Admin;

use App\Models\Day;
use App\Models\Set;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class DayController extends Controller
{
    public function index(Set $set)
    {
        // Get all days related to this specific set
        $days = $set->days;

        // Return the view with days and the set data
        return view('admin.days.index', compact('days', 'set'));
    }

    public function create(Set $set)
    {
        return view('admin.days.create', compact('set'));
    }

    public function store(Request $request, Set $set)
    {
        // Log the entire request to check if set_id is coming through
        Log::debug('Form data: ', $request->all());

        $request->validate([
            'name' => 'required',
        ]);

        // You don't need to manually pass set_id because it's already part of the $set model
        $set->days()->create([
            'name' => $request->name, // Only the name is needed
        ]);

        return redirect()->route('admin.sets.days.index', $set);
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
