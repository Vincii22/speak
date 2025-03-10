<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Logo and Subtitle -->
        <div class="flex flex-col justify-center items-center mb-5">
            <img src="{{url('img/Screenshot 2024-11-11 134435.png')}}" alt="Logo" class="w-[60%] sm:w-[50%] md:w-[70%]">
            <p class="text-sm sm:text-md lg:text-[2.1vh] text-gray-500 mt-2">
                Enter your details to log in to your account:
            </p>
        </div>

        <!-- Name -->
        <div>
            <x-input-label class="lg:!text-[2vh]" for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="lg:!text-[2vh]" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="lg:!text-[2vh]" for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="lg:!text-[2vh]" for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm lg:text-[1.7vh] text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 lg:text-[1.7vh]">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
