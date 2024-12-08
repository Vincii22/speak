<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch schedules from the database
        $schedules = Schedule::all(); // Adjust query as needed (e.g., filter by professional)

        // Pass schedules to the view
        return view('professional.dashboard', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function fetchReservedDatesForLoggedInUser()
    {
        try {
            $user = Auth::user();

            if ($user->role !== 'professional') {
                return response()->json(['error' => 'Unauthorized access.'], 403);
            }

            $reservedDates = Schedule::where('user_id', $user->id)
                ->get(['month', 'day', 'year', 'time']);

            return response()->json($reservedDates);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

     
    public function fetchReservedDates(Request $request)
    {
        $pathologist = $request->input('speech_language_pathologist');

        if (!$pathologist) {
            return response()->json(['error' => 'Pathologist not specified'], 400);
        }

        $reservedDates = Schedule::where('speech_language_pathologist', $pathologist)
            ->get(['month', 'day', 'year']);

        return response()->json($reservedDates);
    }

    public function create()
    {
        $schedules = Schedule::all();
        $pathologists = User::where('role', 'professional')->get();
        return view('user.calendar', [
            'schedules' => $schedules,
            'pathologists' => $pathologists,
        ]);   
    }

    public function store(Request $request)
    {
        $speechLanguagePathologist = User::where('role', 'professional')
            ->where('name', $request->speech_language_pathologist) 
            ->first();

        if (!$speechLanguagePathologist) {
            return redirect()->back()->with('error', 'The specified speech-language pathologist does not exist.');
        }

        $schedule = new Schedule();

        $schedule->user_id = $speechLanguagePathologist->id;

        $schedule->month = $request->month;
        $schedule->day = $request->day;
        $schedule->year = $request->year;
        $schedule->time = $request->time;
        $schedule->speech_language_pathologist = $request->speech_language_pathologist;
        $schedule->email = $request->email;
        $schedule->contact = $request->contact;

        $schedule->save();

        return redirect()->route('schedule.create')
                        ->with('success', 'Schedule created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
