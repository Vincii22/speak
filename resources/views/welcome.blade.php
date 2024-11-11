<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Speak</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <header class="bg-white shadow py-4 fixed w-full">
            <div class="container mx-auto flex items-center justify-between px-4 md:px-10 ">

                <!-- Logo -->
                <div class="flex items-center">
                    <img src="logo.png" alt="Logo" class="h-8 w-8 mr-3"> <!-- Replace logo.png with the actual logo path -->
                    <span class="font-semibold text-lg text-black dark:text-white">Speak</span>
                </div>

                <!-- Mobile Menu Toggle Button -->
                <button id="menu-toggle" class="block lg:hidden text-gray-600 dark:text-white focus:outline-none">
                    <!-- Icon for the menu (hamburger icon) -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Navigation Links in the Center -->
                <nav id="nav-links" class="hidden lg:flex lg:space-x-6 flex-col lg:flex-row mt-4 lg:mt-0 lg:space-y-0 space-y-2">
                    <a href="#home" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Home</a>
                    <a href="#about" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">About</a>
                    <a href="#services" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Catalog</a>
                    <a href="#portfolio" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Courses</a>
                    <a href="#contact" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Schedule</a>
                    <a href="#contact" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Directory</a>
                    <a href="#contact" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Testimonials</a>
                </nav>

                <!-- Auth Links on the Right -->
                <div class="hidden lg:flex items-center space-x-4">
                    @if (Route::has('login'))
                        <div class="flex flex-col lg:flex-row items-center lg:space-x-4 space-y-2 lg:space-y-0">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-md px-4 py-2 text-gray-600 ring-1 ring-transparent transition hover:text-gray-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-[50px] px-4 py-2 border-4 border-[#694F8E] text-lg text-gray-600 ring-1 ring-transparent transition hover:text-gray-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-[50px] bg-[#694F8E] px-4 py-2 text-white border-4 border-[#694F8E] ring-1 ring-transparent transition hover:text-gray-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

            </div>

            <!-- Responsive Dropdown Menu -->
            <div id="mobile-menu" class="lg:hidden hidden flex flex-col mt-4 space-y-2">
                <!-- Navigation Links for Mobile -->
                <nav class="space-y-2">
                    <a href="#home" class="block text-gray-600 hover:text-gray-800 transition">Home</a>
                    <a href="#about" class="block text-gray-600 hover:text-gray-800 transition">About</a>
                    <a href="#services" class="block text-gray-600 hover:text-gray-800 transition">Catalog</a>
                    <a href="#portfolio" class="block text-gray-600 hover:text-gray-800 transition">Courses</a>
                    <a href="#contact" class="block text-gray-600 hover:text-gray-800 transition">Schedule</a>
                    <a href="#contact" class="block text-gray-600 hover:text-gray-800 transition">Directory</a>
                    <a href="#contact" class="block text-gray-600 hover:text-gray-800 transition">Testimonials</a>
                </nav>

                <!-- Auth Links for Mobile -->
                <div class="space-y-2 mt-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block text-gray-600 hover:text-gray-800 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block text-gray-600 hover:text-gray-800 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block text-gray-600 hover:text-gray-800 transition">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </header>

        <section class="flex items-center justify-center min-h-screen bg-[#FFDED6] text-center">
    <div class="relative max-w-[80%] md:max-w-[60%] py-8 bg-[#694F8E] rounded-[50px] border border-gray-300 dark:border-gray-700 text-white dark:text-white/80 mx-4">
        <!-- Content -->
        <div class="w-full px-8 md:px-16 mx-auto text-justify">
            <h1 class="text-3xl md:text-4xl font-semibold mb-4 text-[#FFDED6]">
                Empowering Clear Speech, One Step at a Time!
            </h1>
            <h3 class="text-xl md:text-3xl mb-6 leading-8 md:leading-10">
                We specialize in helping adults with dysarthria communicate at
                their best by offering convenient, effective, and affordable
                speech therapy.
            </h3>

            <!-- Learn More Button -->
            <div class="flex w-full justify-center md:justify-end mt-4">
                <a href="#learn-more" class="bottom-4 right-4 inline-flex items-center px-4 py-2 italic text-white rounded-full text-lg md:text-2xl font-medium hover:text-[#FFDED6] hover:underline transition-all focus:outline-none">
                    Learn More
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 5l7 7-7 7M5 12h14" />
                    </svg>
                </a>
            </div>

            <!-- Join Here Button -->
            <div class="flex justify-center items-center">
                        <h1 class="absolute bottom-[-25px] bg-[#694F8E] w-[50%] text-center py-3 rounded-[50px] text-2xl">
                        READY TO START? 
                        <a href="" class="hover:text-[#FFDED6] hover:underline transition-all focus:outline-none">JOIN HERE.</a>
                        </h1>
                     </div>
        </div>
    </div>
</section>

    </div>

    <!-- JavaScript for toggling mobile menu -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
