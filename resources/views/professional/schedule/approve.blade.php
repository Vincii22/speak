@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">Approve Appointment</h2>

        <form action="{{ route('schedule.approve', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Schedule Information -->
            <h3 class="text-lg font-semibold mb-2">Schedule Information</h3>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Date:</label>
                <p class="text-gray-900">{{ $schedule->month }} {{ $schedule->day }}, {{ $schedule->year }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Time:</label>
                <p class="text-gray-900">{{ $schedule->time }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Speech Language Pathologist:</label>
                <p class="text-gray-900">{{ $schedule->speech_language_pathologist }}</p>
            </div>

            <!-- User Information -->
            <h3 class="text-lg font-semibold mb-2">User Information</h3>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Name:</label>
                <p class="text-gray-900">{{ $user->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Email:</label>
                <p class="text-gray-900">{{ $user->email }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Contact:</label>
                <p class="text-gray-900">{{ $schedule->contact }}</p>
            </div>

            <!-- Professional Information -->
            <h3 class="text-lg font-semibold mb-2">Professional Information</h3>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Name:</label>
                <p class="text-gray-900">{{ $professional->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Email:</label>
                <p class="text-gray-900">{{ $professional->email }}</p>
            </div>

            <!-- Approval Action -->
            <h3 class="text-lg font-semibold mb-2">Approval</h3>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold">Status:</label>
                <select id="status" name="status" class="w-full border rounded-lg p-2">
                    <option value="approved" {{ $schedule->status === 'approved' ? 'selected' : '' }}>Approve</option>
                    <option value="declined" {{ $schedule->status === 'declined' ? 'selected' : '' }}>Decline</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
