<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <header class="bg-white shadow py-2 fixed w-full z-10">
            <div class="container mx-auto px-10">
                <!-- Logo -->
                <div class="flex items-center justify-center lg:justify-between">
                    <div class="flex items-center py-1 px-3 bg-[#feddd5] rounded-md">
                        <img src="{{url('img/pink-bg-logo.png')}}" alt="Logo" class="h-8 w-34 mr-3 ">
                    </div>

                    <!-- Mobile Menu Toggle Button -->
                    <button id="menu-toggle" class="block left- absolute lg:hidden text-gray-600 dark:text-black focus:outline-none">
                        <!-- Icon for the menu (hamburger icon) -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Navigation Links in the Center -->
                    <nav id="navlinks"
                        class="hidden lg:flex lg:space-x-6 flex-col lg:flex-row mt-4 lg:mt-0 lg:space-y-0 space-y-2">
                        <a href="/"
                            class="active text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Home</a>
                        <a href="#about"
                            class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">About</a>
                        <a href="#catalog"
                            class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Catalog</a>
                        <a href="#courses"
                            class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Courses</a>
                        <a href="{{route('login')}}"
                            class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Schedule</a>
                        <a href="#directory"
                            class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Directory</a>
                        <a href="#testimonials"
                            class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Testimonials</a>
                    </nav>

                    <!-- Auth Links on the Right -->
                    <div class="hidden lg:flex items-center space-x-4">
                        @if (Route::has('login'))
                            <div class="flex flex-col lg:flex-row items-center lg:space-x-4 space-y-2 lg:space-y-0">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="rounded-md px-4 py-2 text-gray-600 ring-1 ring-transparent transition hover:text-gray-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="rounded-[50px] px-4 py-2 border-4 border-[#694F8E] text-lg !text-gray-600 ring-1 ring-transparent transition hover:text-gray-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="rounded-[50px] bg-[#694F8E] px-4 py-2 text-white border-4 border-[#694F8E] ring-1 ring-transparent transition hover:text-gray-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Responsive Dropdown Menu -->
            <div id="mobile-menu" class="lg:hidden hidden flex-col mt-4 space-y-2">
                <!-- Navigation Links for Mobile -->
                <nav class="space-y-2">
                    <a href="#home" class="block text-gray-600 hover:text-gray-800 transition">Home</a>
                    <a href="#about" class="block text-gray-600 hover:text-gray-800 transition">About</a>
                    <a href="#services" class="block text-gray-600 hover:text-gray-800 transition">Catalog</a>
                    <a href="#courses" class="block text-gray-600 hover:text-gray-800 transition">Courses</a>
                    <a href="#contact" class="block text-gray-600 hover:text-gray-800 transition">Schedule</a>
                    <a href="#contact" class="block text-gray-600 hover:text-gray-800 transition">Directory</a>
                    <a href="#contact" class="block text-gray-600 hover:text-gray-800 transition">Testimonials</a>
                </nav>

                <!-- Auth Links for Mobile -->
                <div class="space-y-2 mt-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="block text-gray-600 hover:text-gray-800 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block text-gray-600 hover:text-gray-800 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block text-gray-600 hover:text-gray-800 transition">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </header>
        


        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 !bg-[#ffffff] px-10">
            <img src="{{url('img/cloud1.png')}}" alt="" class="absolute left-[5%] bottom-[30%] w-[10%] max-w-[80px] sm:max-w-[100px] md:max-w-[120px]">
            <img src="{{url('img/cloud2.png')}}" alt="" class="absolute left-[20%] top-[16%] w-[10%] max-w-[80px] sm:max-w-[100px] md:max-w-[120px]">
            <img src="{{url('img/cloud3.png')}}" alt="" class="absolute right-[27%] top-[15%] w-[8%] max-w-[60px] sm:max-w-[80px] md:max-w-[100px]">
            <img src="{{url('img/cloud2.png')}}" alt="" class="absolute right-[2%] w-[10%] max-w-[80px] sm:max-w-[100px] md:max-w-[120px]">
            <div class="w-full sm:max-w-sm lg:max-w-[27vw] h-auto lg:max-h-[80vh] px-4 sm:px-6 py-6 lg:p-10 bg-white border-2 border-[#694F8E] shadow-xl relative overflow-hidden flex justify-center items-center rounded-lg mt-[10vh]">
                {{ $slot }}
            </div>
        </div>
    </body>
        <!-- JavaScript for toggling mobile menu -->
        <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</html>
