<x-guest-layout>
    <!-- Session Status -->
     
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Logo and Subtitle -->
            <div class="flex flex-col justify-center items-center mb-5">
                <img src="{{url('img/Screenshot 2024-11-11 134435.png')}}" alt="Logo" class="w-[60%] sm:w-[50%]">
                <p class="text-sm sm:text-md text-gray-500 mt-2">
                    Enter your details to log in to your account:
                </p>
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Log in Button -->
            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <!-- Create Account Link -->
            <div class="flex items-center justify-center mt-4">
                <a href="" class="italic text-gray-400 text-sm hover:text-black">Create an account</a>
            </div>
        </form>
</x-guest-layout>
