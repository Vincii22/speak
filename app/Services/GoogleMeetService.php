<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class GoogleMeetService
{
    public function createGoogleMeetEvent($appointment)
    {
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('credentials.json')); // Your OAuth credentials
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessToken(session('google_access_token')); // Store in session

        $service = new Google_Service_Calendar($client);

        $event = new Google_Service_Calendar_Event([
            'summary' => 'Appointment with ' . $appointment->name,
            'start' => ['dateTime' => "{$appointment->year}-{$appointment->month}-{$appointment->day}T{$appointment->time}:00", 'timeZone' => 'UTC'],
            'end' => ['dateTime' => "{$appointment->year}-{$appointment->month}-{$appointment->day}T" . date('H:i', strtotime($appointment->time . ' +1 hour')), 'timeZone' => 'UTC'],
            'conferenceData' => [
                'createRequest' => [
                    'requestId' => uniqid(),
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                ],
            ],
        ]);

        $event = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);
        return $event->getHangoutLink();
    }
}
