<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if (!Auth::user()->google_access_token)
                        <a href="{{ url('/auth/google') }}" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600">
                            Sign in with Google
                        </a>
                    @else
                        <p class="text-green-500">✅ Google account linked!</p>

                        <!-- Sign Out Button -->
                        <form action="{{ route('google.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-600 mt-2">
                                Sign Out with Google
                            </button>
                        </form>
                    @endif
                </div>
            </div>



            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>



    </div>
</x-app-layout>
