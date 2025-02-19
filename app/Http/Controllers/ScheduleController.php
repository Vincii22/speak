<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_ConferenceData;
use Google_Service_Calendar_CreateConferenceRequest;
use Google_Service_Calendar_ConferenceSolutionKey;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    public function index()
{
    $user = Auth::user();

    if ($user->role !== 'professional') {
        return redirect()->route('home')->with('error', 'Unauthorized access.');
    }

    $schedules = Schedule::where('professional_id', $user->id)
        ->where('status', 'pending')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->orderBy('day', 'asc')
        ->get();

    $approvedSchedules = Schedule::where('professional_id', $user->id)
        ->where('status', 'approved')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->orderBy('day', 'asc')
        ->get();

    return view('professional.schedule.index', compact('schedules', 'approvedSchedules'));
}



     public function fetchReservedDatesForLoggedInUser()
    {
        try {
            $user = Auth::user();

            if ($user->role !== 'professional') {
                return response()->json(['error' => 'Unauthorized access.'], 403);
            }

            $reservedDates = Schedule::where('professional_id', $user->id)
                ->get(['month', 'day', 'year', 'status', 'id']); // Only retrieve the necessary fields

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

        $schedule->professional_id = $speechLanguagePathologist->id;
        $schedule->user_id = Auth::id();
        $schedule->month = $request->month;
        $schedule->day = $request->day;
        $schedule->year = $request->year;
        $schedule->time = $request->time;
        $schedule->speech_language_pathologist = $request->speech_language_pathologist;
        $schedule->email = $request->email;
        $schedule->contact = $request->contact;

        $schedule->save();

        return redirect()->route('schedule.create')->with([
            'success' => 'Schedule created successfully.',
            'scheduleData' => [
                'date' => "{$request->month} {$request->day}, {$request->year}",
                'time' => $request->time,
                'pathologist' => $request->speech_language_pathologist,
            ],
        ]);
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
        $reservedDate = Schedule::findOrFail($id);
        $pathologists = User::where('role', 'professional')->get();

        return view('professional.schedule.edit', compact('reservedDate', 'pathologists'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $schedule = Schedule::findOrFail($id);

            $request->validate([
                'month' => 'required|string',
                'day' => 'required|integer|min:1|max:31',
                'year' => 'required|integer|min:' . now()->year,
                'time' => 'required|date_format:H:i',
            ]);

            $schedule->month = $request->input('month');
            $schedule->day = $request->input('day');
            $schedule->year = $request->input('year');
            $schedule->time = $request->input('time');
            $schedule->save();

            return redirect()
                ->route('schedule.index')
                ->with('success', 'Schedule updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors()) // Validation errors
                ->withInput(); // Retain old input values
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();
        }
    }
// Google Meet event creation logic
private function createGoogleMeetEvent($appointment)
{
    $client = new Google_Client();
    $user = Auth::user();

    if (!$user->google_access_token) {
        return 'Google authentication required. Please log in with Google.';
    }

    $client->setAccessToken($user->google_access_token);

    // If token is expired, refresh it
    if ($client->isAccessTokenExpired()) {
        if (!$user->google_refresh_token) {
            Log::error("Missing refresh token for user ID: " . $user->id);
            return 'Google token expired. Please re-authenticate.';
        }

        Log::info("Refreshing token for user ID: " . $user->id);
        Log::info("Stored refresh token: " . $user->google_refresh_token);

        $client->fetchAccessTokenWithRefreshToken($user->google_refresh_token);
        $newAccessToken = $client->getAccessToken();

        Log::info("New access token received for user ID: " . $user->id, $newAccessToken);

        // ✅ Correct way to update user tokens
        $user->google_access_token = $newAccessToken['access_token'];
        $user->google_refresh_token = $newAccessToken['refresh_token'] ?? $user->google_refresh_token; // Keep old refresh token if not returned
        $user->save(); // Save to database
    }

    Log::info("Using access token: " . $client->getAccessToken()['access_token']);

    // Initialize Google Calendar service
    $service = new Google_Service_Calendar($client);

    // Create event with Google Meet
    $event = new Google_Service_Calendar_Event([
        'summary' => 'Appointment with ' . $appointment->name,
        'start' => [
            'dateTime' => date('c', strtotime("{$appointment->year}-{$appointment->month}-{$appointment->day} {$appointment->time}")),
            'timeZone' => 'UTC',
        ],
        'end' => [
            'dateTime' => date('c', strtotime("{$appointment->year}-{$appointment->month}-{$appointment->day} {$appointment->time} +1 hour")),
            'timeZone' => 'UTC',
        ],
        'conferenceData' => [
            'createRequest' => [
                'requestId' => uniqid(),
                'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
            ],
        ],
    ]);

    try {
        $event = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

        $meetLink = $event->getHangoutLink();

        if (!$meetLink) {
            Log::error("No Google Meet link generated for appointment ID: " . $appointment->id);
            return 'No Google Meet link generated.';
        }

        return $meetLink;
    } catch (\Exception $e) {
        Log::error("Error creating Google Meet event for user ID: {$user->id}, Error: " . $e->getMessage());
        return 'Error creating Google Meet event: ' . $e->getMessage();
    }
}



    public function storeAppointment(Request $request, $scheduleId)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'appointment_month' => 'required|string|max:50',
            'appointment_day' => 'required|string|max:50',
            'appointment_year' => 'required|string|max:50',
            'appointment_time' => 'required|string|max:50',
            'status' => 'required|string|in:approved,declined',
            'contact' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'speech_language_pathologist' => 'nullable|string|max:255',
        ]);

        // Retrieve the schedule by ID
        $schedule = Schedule::findOrFail($scheduleId);

        // Create a new Appointment record
        $appointment = Appointment::create([
            'user_id' => $schedule->user_id,
            'name' => $validated['user_name'],
            'email' => $validated['user_email'],
            'month' => $validated['appointment_month'],
            'day' => $validated['appointment_day'],
            'year' => $validated['appointment_year'],
            'time' => $validated['appointment_time'],
            'status' => $validated['status'],
            'contact' => $validated['contact'],
            'contact_email' => $validated['contact_email'],
            'schedule_id' => $schedule->id,
        ]);

        // Update the schedule status to 'approved' when appointment is created
        $schedule->status = 'approved';
        $schedule->save();

        // Create Google Meet link if the appointment is approved
        if ($appointment->status === 'approved') {
            // Create the Google Meet link
            $googleMeetLink = $this->createGoogleMeetEvent($appointment);

            // Save the Google Meet link to the appointment
            $appointment->google_meet_link = $googleMeetLink;
            $appointment->save();
        }

        return redirect()->back()->with('success', 'Appointment has been successfully saved and the schedule status has been updated.');
    }

public function getScheduleData($id)
{
    // Fetch the schedule and its related user data using the 'id' column
    $schedule = Schedule::with('user')->findOrFail($id);

    // Return the data in JSON format
    return response()->json([
        'user_name' => $schedule->user->name,
        'user_email' => $schedule->user->email,
        'appointment_month' => $schedule->month,
        'appointment_day' => $schedule->day,
        'appointment_year' => $schedule->year,
        'appointment_time' => $schedule->time,
        'contact' => $schedule->contact,
        'contact_email' => $schedule->email,
        'speech_language_pathologist' => $schedule->speech_language_pathologist,
        'schedule_id' => $schedule->id,
    ]);
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule= Schedule::find($id);
        $schedule->delete();
        return redirect()->back()->with('message','Schedule Successfully Cancelled');
    }
}
