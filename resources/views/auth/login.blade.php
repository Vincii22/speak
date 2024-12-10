<x-guest-layout>
    <!-- Session Status -->
     
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!---------------------- Logo and Subtitle ---------------------->
        <div class="flex flex-col justify-center items-center mb-5 relative">
            <img src="{{url('img/Screenshot 2024-11-11 134435.png')}}" alt="Logo" class="w-[50%] sm:w-[40%] md:w-[70%]">
            <p class="text-sm sm:text-md lg:text-[2.1vh] text-gray-500 my-3 text-center">
                Enter your details to log in to your account:
            </p>
        </div>

        <!---------------------- Email Address ---------------------->
        <div class="mb-4">
            <label for="email" class="block text-sm lg:text-[2vh] font-medium text-gray-700">{{ __('Email') }}</label>
            <input id="email" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!---------------------- Password ---------------------->
        <div class="mb-4">
            <label for="password" class="block text-sm lg:text-[2vh] font-medium text-gray-700">{{ __('Password') }}</label>
            <input id="password" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" type="password" name="password" required>
            @error('password')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm lg:text-[2vh] text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-center mt-4">
            <button type="submit" class="inline-flex lg:text-[2vh] justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log in') }}
            </button>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a href="{{ route('register') }}" class="italic text-gray-400 text-sm lg:text-[2vh] hover:text-black">
                Create an account
            </a>
        </div>
    </form>
</x-guest-layout>
