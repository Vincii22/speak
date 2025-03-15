<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <header class="bg-white shadow fixed w-full z-10">
        <div class="container mx-auto px-10 py-2">
            <!-- Logo -->
            <div class="flex items-center justify-center lg:justify-between">
                <div class="flex items-center py-1 px-3 bg-[#feddd5] rounded-md">
                    <img src="{{url('img/pink-bg-logo.png')}}" alt="Logo" class="h-8 w-34 mr-3 ">
                </div>

                <!-- Mobile Menu Toggle Button -->
                <button id="menu-toggle"
                    class="block left- absolute lg:hidden text-gray-600 dark:text-black focus:outline-none">
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
                    <a href="{{ route('user.home')}}" href="#home"
                        class="active text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Home</a>
                    <a href="{{ route('user.dashboard')}}" href="#dashboard"
                        class="font-semibold uppercase hover:text-gray-800 transition">Dashboard</a>

                </nav>


                <!-- Auth Links on the Right -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>
        </div>

        <!-- Responsive Dropdown Menu -->
        <div id="mobile-menu" class="lg:hidden hidden flex-col mt-4 space-y-2">


            <!-- Auth Links for Mobile -->
            <div class="space-y-2 mt-4">
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sub nav -->
        <div class="flex justify-center gap-10 items-center bg-[#FFEFEB] py-2 relative z-30">
            <a href="{{ route('schedule.create')}}"
                class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Schedule</a>
            <a href="{{ route('user.exercises.index')}}"
                class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Exercises</a>
            <a href="{{ route('user.practices.index')}}"
                class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Practice</a>
                <a href="{{ route('testimonials.index')}}"
                class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Testimonials</a>
        </div>
    </header>


</nav>
