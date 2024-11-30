<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        $pathologists = User::where('role', 'professional')->get();
        return view('user.calendar', [
            'schedules' => $schedules,
            'pathologists' => $pathologists,
        ]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function fetchReservedDates(Request $request)
    {
        $pathologist = $request->input('speech_language_pathologist'); // Get selected pathologist

        if (!$pathologist) {
            return response()->json(['error' => 'Pathologist not specified'], 400);
        }

        // Fetch reserved dates for the selected pathologist
        $reservedDates = Schedule::where('speech_language_pathologist', $pathologist)
            ->get(['month', 'day', 'year']); // Only fetch the necessary fields

        return response()->json($reservedDates); // Return the reserved dates as JSON
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedule=new Schedule();

        $schedule->month=$request->month;
        $schedule->day=$request->day;
        $schedule->year=$request->year;
        $schedule->time=$request->time;
        $schedule->speech_language_pathologist=$request->speech_language_pathologist;
        $schedule->email=$request->email;
        $schedule->contact=$request->contact;

        $schedule->save();

        return redirect()->route('schedule.index')
                         ->with('error', 'You must complete previous categories to unlock this one.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
