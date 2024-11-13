<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Speak</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a1d595f7c6.js" crossorigin="anonymous"></script>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

        <header class="bg-white shadow py-2 fixed w-full z-10">
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
                <nav id="navlinks" class="hidden lg:flex lg:space-x-6 flex-col lg:flex-row mt-4 lg:mt-0 lg:space-y-0 space-y-2">
                    <a href="#home" class="active text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Home</a>
                    <a href="#about" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">About</a>
                    <a href="#catalog" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Catalog</a>
                    <a href="#courses" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Courses</a>
                    <a href="{{route ('login')}}" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Schedule</a>
                    <a href="#directory" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Directory</a>
                    <a href="#testimonials" class="text-[#545454] font-semibold uppercase hover:text-gray-800 transition">Testimonials</a>
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
                    <a href="#courses" class="block text-gray-600 hover:text-gray-800 transition">Courses</a>
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

        <!---------------------- Landing Section ---------------------->

        <section id="home" class="section flex items-center justify-center min-h-screen bg-[#FFDED6] text-center">
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
                        <a href="{{route ('login')}}" class="bottom-4 right-4 inline-flex items-center px-4 py-2 italic text-white rounded-full text-lg md:text-2xl font-medium hover:text-[#FFDED6] hover:underline transition-all focus:outline-none">
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
                                <a href="{{route ('login')}}" class="hover:text-[#FFDED6] hover:underline transition-all focus:outline-none">JOIN HERE.</a>
                                </h1>
                            </div>
                </div>
            </div>
        </section>

        <!---------------------- End of Landing Section ---------------------->


        <!---------------------- About ---------------------->

        <section id="about" class="section min-h-[90vh] bg-white text-center">
            <div class="flex justify-center items-center relative">
                <div class="bg-design bg-[#FFDED6] flex justify-center items-center w-1/2 gap-5 py-2">
                    <div class="bg-left"></div>
                    <h1 class="text-[#694F8E] text-[4rem] font-semibold">ABOUT</h1>
                    <img src="{{url ('img/pink-bg-logo.png')}}" alt="" class="w-[28%]">
                    <div class="bg-right"></div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-10 px-[150px] pt-7 pb-5 relative">
                <div class="bg-[#694F8E] min-h-[57vh] rounded-xl flex flex-col items-center px-5 gap-4">
                    <div class="h-[150px]">
                        <img src="{{url ('img/about1.png')}}" alt="" class="h-[100%]">
                    </div>
                    <div class="h-[40%]">
                        <h1 class="text-justify text-lg text-[#FFDED6]">
                            <span class="ml-8"></span>
                            SPEAK, or Speech Potential Enhanced
                            through Applied Knowledge, is an online
                            platform accessible to its targeted end
                            users, which are adults with dysarthria. It
                            aims to provide exercises or practices
                            leading to improvement of the patients'
                            speech. By using evidence-based
                            techniques, SPEAK empowers users to
                            take control of their speech rehabilitation
                            journey in a convenient, virtual setting.
                        </h1>
                    </div>
                </div>

                <div class="bg-[#694F8E] min-h-[57vh] rounded-xl flex flex-col items-center px-5 gap-4">
                    <div class="h-[150px]">
                        <img src="{{url ('img/about2.png')}}" alt="" class="h-[100%]">
                    </div>
                    <div class="h-[40%]">
                        <h1 class="text-justify text-xl text-[#FFDED6]">
                            <span class="ml-8"></span>
                            At SPEAK, insights and knowledge
                            from Professional Speech Language
                            Pathologists (SLPs) are highly valued
                            and incorporated in the whole website
                            development process. Through this
                            collaboration, their expertise ensures
                            that the platform provides scientificallybacked, effective strategies for
                            managing dysarthria.
                        </h1>
                    </div>
                </div>

                <div class="bg-[#694F8E] min-h-[57vh] rounded-xl flex flex-col items-center px-5 gap-4">
                    <div class="h-[150px]">
                        <img src="{{url ('img/about3.png')}}" alt="" class="h-[100%]">
                    </div>
                    <div class="h-[40%]">
                        <h1 class="text-justify text-xl text-[#FFDED6]">
                            <span class="ml-8"></span>
                            SPEAK also offers valuable resources
                            for caregivers, ensuring they are
                            equipped to support the patient’s
                            progress at home. These resources
                            offer guidance on how to implement athome practices, foster a supportive
                            environment, and address challenges
                            that may arise during the rehabilitation
                            process.
                        </h1>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mr-[150px]">
                <a href="#developers" class="text-[#694F8E] italic flex items-center text-3xl font-semibold hover:underline transition-all">
                    Developers
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 5l7 7-7 7M5 12h14" />
                    </svg>
                </a>
            </div>
        </section>

        <!---------------------- End of About ---------------------->


        <!---------------------- Developers ---------------------->

        <section id="developers" class="section min-h-[80vh] bg-white text-center">
            <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2">
                <h1 class="text-[#694F8E] text-[4rem] font-semibold">DEVELOPERS OF</h1>
                <img src="{{url ('img/pink-bg-logo.png')}}" alt="" class="w-[15%] h-[5%]">
            </div>

            <div class="grid grid-cols-4 gap-10 px-[100px] pt-10 pb-5 relative">
                <div class="h-[20rem] w-[20rem] flex flex-col justify-center items-center">
                    <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full">
                        <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                        <h1 class="bg-[#A6A6A6] text-white text-lg font-semibold rounded-xl relative top-[-15px]">
                            Bella Beatrice C. Fundano
                        </h1>
                    </div>
                </div>
                <div class="h-[20rem] w-[20rem] flex flex-col justify-center items-center">
                    <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full">
                        <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                        <h1 class="bg-[#A6A6A6] text-white text-lg font-semibold rounded-xl relative top-[-15px]">
                            Roxanne E. Gutierrez
                        </h1>
                    </div>
                </div>
                <div class="h-[20rem] w-[20rem] flex flex-col justify-center items-center">
                    <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full">
                        <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                        <h1 class="bg-[#A6A6A6] text-white text-lg font-semibold rounded-xl relative top-[-15px]">
                            Rean Luane G. Luzuriaga 
                        </h1>
                    </div>
                </div>
                <div class="h-[20rem] w-[20rem] flex flex-col justify-center items-center">
                    <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full">
                        <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                        <h1 class="bg-[#A6A6A6] text-white text-lg font-semibold rounded-xl relative top-[-15px]">
                            JohnChristopher L. Obispo
                        </h1>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mr-[150px]">
                <a href="" class="text-[#694F8E] italic flex items-center text-3xl font-semibold hover:underline transition-all">
                    Contact Us
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 5l7 7-7 7M5 12h14" />
                    </svg>
                </a>
            </div>
        </section>

        <!---------------------- End of Developers ---------------------->


        <!---------------------- Catalog Section ---------------------->
        
        <section id="catalog" class="section min-h-[270vh] bg-white">'
            <div class="px-[150px] sticky py-5  top-[60px] bg-[#FFDED6] z-[2]">
                <h1 class="text-[#694F8E] text-[2.5rem] font-semibold ">Catalog</h1>
            </div>


            <!---------------------- Stories Section ---------------------->

            <div class="">
                <div class="px-[150px] sticky py-5 top-[60px] flex justify-end z-[2]">
                    <h1 class="text-[#694F8E] text-[2.5rem] font-semibold px-3 rounded-2xl">Stories</h1>
                </div>
                <div class="flex gap-10 px-[100px] pt-10 pb-5 relative">
                    <div class="h-[100%] w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                        <img src="{{url ('img/blank.webp')}}" alt="" class="h-[35vh] w-[100%] mb-4">
                        <a href="" class="text-lg text-black">
                            <i class="fa-solid fa-globe"></i>
                            Philippines
                        </a>
                        <h1 class="text-black text-xl font-semibold pt-7">
                        ARTICLE HEADLINE; LOREM IPSUM DOLOR
                        </h1>
                        <h2 class="text-lg text-black">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet reiciendis facere asperiores ea deleniti ratione debitis.
                        </h2>
                    </div>
                    <div class="h-[100%] w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                        <img src="{{url ('img/blank.webp')}}" alt="" class="h-[35vh] w-[100%] mb-4">
                        <a href="" class="text-lg text-black">
                            <i class="fa-solid fa-globe"></i>
                            Philippines
                        </a>
                        <h1 class="text-black text-xl font-semibold pt-7">
                        ARTICLE HEADLINE; LOREM IPSUM DOLOR
                        </h1>
                        <h2 class="text-lg text-black">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet reiciendis facere asperiores ea deleniti ratione debitis.
                        </h2>
                    </div>
                </div>
            </div>

        <!---------------------- End of Stories Section ---------------------->


        <!---------------------- Article Section ---------------------->

            <div class="">
                <div class="px-[150px] sticky py-5 top-[60px] flex justify-end z-[2]">
                    <h1 class="text-[#694F8E] text-[2.5rem] font-semibold px-3 rounded-2xl">Articles</h1>
                </div>
                <div class="flex gap-10 px-[100px] pt-10 pb-5 relative">
                    <div class="h-[100%] w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                        <img src="{{url ('img/blank.webp')}}" alt="" class="h-[35vh] w-[100%] mb-4">
                        <a href="" class="text-lg text-black">
                            <i class="fa-solid fa-globe"></i>
                            Philippines
                        </a>
                        <h1 class="text-black text-xl font-semibold pt-7">
                        ARTICLE HEADLINE; LOREM IPSUM DOLOR
                        </h1>
                        <h2 class="text-lg text-black">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet reiciendis facere asperiores ea deleniti ratione debitis.
                        </h2>
                    </div>
                    <div class="h-[100%] w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                        <img src="{{url ('img/blank.webp')}}" alt="" class="h-[35vh] w-[100%] mb-4">
                        <a href="" class="text-lg text-black">
                            <i class="fa-solid fa-globe"></i>
                            Philippines
                        </a>
                        <h1 class="text-black text-xl font-semibold pt-7">
                        ARTICLE HEADLINE; LOREM IPSUM DOLOR
                        </h1>
                        <h2 class="text-lg text-black">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet reiciendis facere asperiores ea deleniti ratione debitis.
                        </h2>
                    </div>
                    <div class="h-[100%] w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                        <img src="{{url ('img/blank.webp')}}" alt="" class="h-[35vh] w-[100%] mb-4">
                        <a href="" class="text-lg text-black">
                            <i class="fa-solid fa-globe"></i>
                            Philippines
                        </a>
                        <h1 class="text-black text-xl font-semibold pt-7">
                        ARTICLE HEADLINE; LOREM IPSUM DOLOR
                        </h1>
                        <h2 class="text-lg text-black">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet reiciendis facere asperiores ea deleniti ratione debitis.
                        </h2>
                    </div>
                </div>
            </div>

        <!---------------------- End of Article Section ---------------------->


        <!---------------------- Content Creator Section ---------------------->

            <div class="">
                <div class="px-[150px] sticky py-5 top-[60px] flex justify-end z-[2]">
                    <h1 class="text-[#694F8E] text-[2.5rem] font-semibold px-3 rounded-2xl">Content Creators</h1>
                </div>
                <div class="flex gap-10 px-[100px] pt-10 pb-5 relative justify-center">
                    <div class="min-h-[20rem] w-[20rem] p-4">
                        <div class="flex flex-col justify-center items-center relative">
                            <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full flex items-center flex-col justify-center">
                                <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                            </div>
                            <a href="https://www.youtube.com/" class="absolute bottom-[-30px]" target="_blank">
                                <img src="{{url ('img/yt.png')}}" class="w-[90px]">

                            </a>
                        </div>
                        <div class="text-black">
                            <h1 class=" text-lg font-semibold rounded-xl mt-10 text-center mb-3">
                                TEACHERKAYE TALKS, SLP
                            </h1>
                            <h2 class="">
                            Speech-Language Pathologist - Bulan RegionalHealth (2015 - 2016)
                            </h2>
                            <h2 class="">
                            - Performed evaluation and treatment planning of over 50 patients a month
                            </h2>
                            <h2 class="">
                            - Provided direct and indirect speech therapy services to 350 students with communication disorders.
                            </h2>
                        </div>
                    </div>
                    <div class="min-h-[20rem] w-[20rem] p-4">
                        <div class="flex flex-col justify-center items-center relative">
                            <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full flex items-center flex-col justify-center">
                                <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                            </div>
                            <a href="https://www.youtube.com/" class="absolute bottom-[-30px]" target="_blank">
                                <img src="{{url ('img/yt.png')}}" class="w-[90px]">

                            </a>
                        </div>
                        <div class="text-black">
                            <h1 class=" text-lg font-semibold rounded-xl mt-10 text-center mb-3">
                                TEACHERKAYE TALKS, SLP
                            </h1>
                            <h2 class="">
                            Speech-Language Pathologist - Bulan RegionalHealth (2015 - 2016)
                            </h2>
                            <h2 class="">
                            - Performed evaluation and treatment planning of over 50 patients a month
                            </h2>
                            <h2 class="">
                            - Provided direct and indirect speech therapy services to 350 students with communication disorders.
                            </h2>
                        </div>
                    </div>
                    <div class="min-h-[20rem] w-[20rem] p-4">
                        <div class="flex flex-col justify-center items-center relative">
                            <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full flex items-center flex-col justify-center">
                                <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                            </div>
                            <a href="https://www.youtube.com/" class="absolute bottom-[-30px]" target="_blank">
                                <img src="{{url ('img/yt.png')}}" class="w-[90px]">

                            </a>
                        </div>
                        <div class="text-black">
                            <h1 class=" text-lg font-semibold rounded-xl mt-10 text-center mb-3">
                                TEACHERKAYE TALKS, SLP
                            </h1>
                            <h2 class="">
                            Speech-Language Pathologist - Bulan RegionalHealth (2015 - 2016)
                            </h2>
                            <h2 class="">
                            - Performed evaluation and treatment planning of over 50 patients a month
                            </h2>
                            <h2 class="">
                            - Provided direct and indirect speech therapy services to 350 students with communication disorders.
                            </h2>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!---------------------- End of Content Creator Section ---------------------->


        </section>


        <!---------------------- End of Catalog Section ---------------------->

        
        <!---------------------- Courses Section ---------------------->

        <section id="courses" class="section min-h-[90vh] bg-white">'
            <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2">
                <h1 class="text-[#694F8E] text-[4rem] font-semibold">Courses</h1>
            </div>

            <div class="flex h-[35rem]">
                <div class="bg-[#694F8E] py-5 w-[60%] flex flex-col items-center justify-center">
                    <div class="bg-[#DEDBE3] text-right px-10 py-3 w-full">
                        <h1 class="text-5xl text-[#694F8E] font-bold">
                            DYSARTHRIA COUNSELING <br>FOR FAMILIES
                        </h1>
                    </div>
                    <p class="text-3xl px-10 text-justify !leading-[2.5rem] font-semibold text-white pt-5">
                        Holistic care for dysarthria involves more than just SPEAK. Cooperation from the patient’s family and environment is crucial, 
                        and proper at-home care that supports their dysarthria journey is essential for demonstrating progress. There will be online courses 
                        and seminars accessible for the families regarding these topics.
                    </p>
                    <a href="{{route ('login')}}" class="bg-[#b692c2] px-4 py-2 font-semibold mt-5 text-2xl text-white rounded-[50px]">
                        COURSES AND WEBINARS
                    </a>
                </div>
                <div class="h-[35rem] w-[700px]">
                    <img src="{{url ('img/course-image.png')}}" alt="" class="w-[100%] h-[35rem]">
                </div>
            </div>
        </section>

        <!---------------------- End of Courses Section ---------------------->


        <!---------------------- Directory Section ---------------------->

        <section id="directory" class="section min-h-[90vh] bg-white ">
            <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2">
                <h1 class="text-[#694F8E] text-[4rem] font-semibold">Meet Our Speech-Language Pathologists!</h1>
            </div>

            <div class="grid grid-cols-3 gap-10 px-[100px] pb-5 relative">
                <div class="h-[20rem] w-[30rem] flex flex-col justify-center items-center mt-[100px]">
                    <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full relative flex justify-center">
                        <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                        <h1 class="bg-[#A6A6A6] text-white text-center text-lg font-semibold rounded-xl absolute bottom-[-15px] px-3 w-full">
                            CONTACT
                        </h1>
                    </div>
                    <div class="text-black px-12">
                        <h1 class=" text-lg font-semibold rounded-xl mt-10 text-center mb-3">
                            JUANDELACRUZ, SLP
                        </h1>
                        <h1 class="text-justify">
                            <span class="font-semibold">Credentials:</span> Speech-Language Pathologist
                        </h1>
                        <h2 class="text-justify">
                            - Bulan Regional Health (2015 - 2016)
                        </h2>
                        <h2 class="text-justify">
                            - Performed evaluation and treatment planning of over 50 patients a month.                        
                        </h2>
                        <h2 class="text-justify">
                            - Provided direct and indirect speech therapy services to 350 students with communication disorders.
                        </h2>
                    </div>
                </div>
                <div class="h-[20rem] w-[30rem] flex flex-col justify-center items-center mt-[100px]">
                    <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full relative flex justify-center">
                        <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                        <h1 class="bg-[#A6A6A6] text-white text-center text-lg font-semibold rounded-xl absolute bottom-[-15px] px-3 w-full">
                            CONTACT
                        </h1>
                    </div>
                    <div class="text-black px-12">
                        <h1 class=" text-lg font-semibold rounded-xl mt-10 text-center mb-3">
                            JUANDELACRUZ, SLP
                        </h1>
                        <h1 class="text-justify">
                            <span class="font-semibold">Credentials:</span> Speech-Language Pathologist
                        </h1>
                        <h2 class="text-justify">
                            - Bulan Regional Health (2015 - 2016)
                        </h2>
                        <h2 class="text-justify">
                            - Performed evaluation and treatment planning of over 50 patients a month.                        
                        </h2>
                        <h2 class="text-justify">
                            - Provided direct and indirect speech therapy services to 350 students with communication disorders.
                        </h2>
                    </div>
                </div>
                <div class="h-[20rem] w-[30rem] flex flex-col justify-center items-center mt-[100px]">
                    <div class="bg-[#694F8E] h-[15rem] w-[15rem] rounded-full relative flex justify-center">
                        <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                        <h1 class="bg-[#A6A6A6] text-white text-center text-lg font-semibold rounded-xl absolute bottom-[-15px] px-3 w-full">
                            CONTACT
                        </h1>
                    </div>
                    <div class="text-black px-12">
                        <h1 class=" text-lg font-semibold rounded-xl mt-10 text-center mb-3">
                            JUANDELACRUZ, SLP
                        </h1>
                        <h1 class="text-justify">
                            <span class="font-semibold">Credentials:</span> Speech-Language Pathologist
                        </h1>
                        <h2 class="text-justify">
                            - Bulan Regional Health (2015 - 2016)
                        </h2>
                        <h2 class="text-justify">
                            - Performed evaluation and treatment planning of over 50 patients a month.                        
                        </h2>
                        <h2 class="text-justify">
                            - Provided direct and indirect speech therapy services to 350 students with communication disorders.
                        </h2>
                    </div>
                </div>
                
            </div>
        </section>

        <!---------------------- End of Directory Section ---------------------->


         <!---------------------- Directory Section ---------------------->

         <section id="testimonials" class="section min-h-[70vh] bg-[#fff7f5] ">
            <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2">
                <h1 class="text-[#694F8E] text-[4rem] font-semibold">TESTIMONIALS</h1>
            </div>
            <h2 class="text-3xl font-bold text-center text-[#694F8E] mt-12 italic">How was your experience in SPEAK? Let us know!</h2>
            <!-- Carousel Container -->
            <div class="carousel-container relative max-w-5xl mx-auto px-6 py-16">
                <div id="carousel" class="carousel space-x-4">
                    <div class="hover:bg-white transition-all bg-[#ffded62c] p-6 rounded-lg shadow-lg flex-shrink-0 w-full md:w-1/3">
                        <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very easy to use."</p>
                        <div class="flex items-center space-x-4 mt-4">
                            <img src="https://via.placeholder.com/48" alt="Jordan's photo" class="w-12 h-12 rounded-full">
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                <h4 class="text-gray-800 text-[.8rem] font-semibold">October10, 2024</h4>
                                <span class="text-gray-500 text-sm">
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                </span>                            
                            </div>
                        </div>
                    </div>
                    <div class="hover:bg-white transition-all bg-[#ffded62c] p-6 rounded-lg shadow-lg flex-shrink-0 w-full md:w-1/3">
                        <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very easy to use."</p>
                        <div class="flex items-center space-x-4 mt-4">
                            <img src="https://via.placeholder.com/48" alt="Jordan's photo" class="w-12 h-12 rounded-full">
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                <h4 class="text-gray-800 text-[.8rem] font-semibold">October10, 2024</h4>
                                <span class="text-gray-500 text-sm">
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                </span>                            
                            </div>
                        </div>
                    </div>
                    <div class="hover:bg-white transition-all bg-[#ffded62c] p-6 rounded-lg shadow-lg flex-shrink-0 w-full md:w-1/3">
                        <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very easy to use."</p>
                        <div class="flex items-center space-x-4 mt-4">
                            <img src="https://via.placeholder.com/48" alt="Jordan's photo" class="w-12 h-12 rounded-full">
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                <h4 class="text-gray-800 text-[.8rem] font-semibold">October10, 2024</h4>
                                <span class="text-gray-500 text-sm">
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                </span>                            
                            </div>
                        </div>
                    </div>
                    <div class="hover:bg-white transition-all bg-[#ffded62c] p-6 rounded-lg shadow-lg flex-shrink-0 w-full md:w-1/3">
                        <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very easy to use."</p>
                        <div class="flex items-center space-x-4 mt-4">
                            <img src="https://via.placeholder.com/48" alt="Jordan's photo" class="w-12 h-12 rounded-full">
                            <div>
                                <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                <h4 class="text-gray-800 text-[.8rem] font-semibold">October10, 2024</h4>
                                <span class="text-gray-500 text-sm">
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button id="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-[#694F8E] text-white p-2 px-4 rounded-[50%]">❮</button>
                <button id="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-[#694F8E] text-white p-2 px-4 rounded-[50%]">❯</button>
            </div>
        </section>

        <!---------------------- End of Directory Section ---------------------->


        <!---------------------- Footer Section ---------------------->

        <section id="contact" class="section min-h-[40vh] bg-[#FFBFE2] ">
            <footer class="flex relative w-full">
                <div class="w-[50%] p-10 ">
                    <img src="{{url ('img/pink-bg-logo.png')}}" alt="" class="w-[90%] mt-10">
                    <div class="flex gap-5 justify-center items-center mt-4">
                        <a href="" class="text-3xl group transition-transform duration-300 ease-in-out">
                            <i class="fa-brands fa-facebook text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                        </a>
                        <a href="" class="text-3xl group transition-transform duration-300 ease-in-out">
                            <i class="fa-brands fa-facebook text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                        </a>
                        <a href="" class="text-3xl group transition-transform duration-300 ease-in-out">
                            <i class="fa-brands fa-facebook text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                        </a>
                        <a href="" class="text-3xl group transition-transform duration-300 ease-in-out">
                            <i class="fa-brands fa-facebook text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                        </a>
                        <a href="" class="text-3xl group transition-transform duration-300 ease-in-out">
                            <i class="fa-brands fa-facebook text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                        </a>
                    </div>
                </div>
                <div class="w-[50%] h-full">
                    <h1 class="text-black text-center py-2 text-2xl font-semibold">
                        Have any concerns or feedback about SPEAK? <br> Let us know—we're here to help!
                    </h1>
                    <div class=" p-5 m-5 rounded-2xl">
                        <form action="">
                            <div class="flex w-full gap-5">
                                <div class="flex flex-col gap-2 w-[100%] text-black">
                                    <label for="name" class="text-black">Name:</label>
                                    <input type="text" name="name" class=" border-2 border-[#694F8E] bg-transparent rounded-full">
                                </div>
                                <div class="flex flex-col gap-2 w-[100%] text-black">
                                    <label for="email" class="text-black">Email:</label>
                                    <input type="text" name="email" class=" border-2 border-[#694F8E] bg-transparent rounded-full">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 w-[100%] text-black mt-3">
                                <label for="message" class="text-black">Message:</label>
                                <input type="text" name="text" class="border-2 border-[#694F8E] bg-transparent rounded-full">
                            </div>
                            <div class="flex justify-end mt-5">
                            <button class="bg-[#FFDED6] px-10 py-2 rounded-xl text-[#694F8E]">Send</button>

                            </div>
                        </form>
                    </div>
                </div>
            </footer>
        </section>
        
        <!---------------------- End of Footer Section ---------------------->



    </div>


    <style>
        nav a{
            border-radius: 50px;
            padding: 4px 15px;
        }
        nav a.active{
            background-color: #FFBFE2;
            border-radius: 50px;
        }

        .bg-design{
            border-radius: 0 0 40px 40px ;
            position: relative;
        }
        .bg-left {
            background:#FFDED6;
            height:80px;
            width:100px;
            position:absolute;
            overflow:hidden;
            left: -100px;
            top: 0;
        }
        .bg-left:after {
            position:absolute;
            content:'';
            display:block;
            height:200%;
            width:200%;
            left:-100%;
            background:white; 
            border-radius:100%;
        }
        .bg-right {
            background:#FFDED6;
            height:80px;
            width:100px;
            position:absolute;
            overflow:hidden;
            right: -100px;
            top: 0;
        }
        .bg-right:after {
            position:absolute;
            content:'';
            display:block;
            height:200%;
            width:200%;
            right:-100%;
            background:white; 
            border-radius:100%;
        }
        .carousel-container {
            overflow: hidden;
        }
        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
    </style>


    <!-- JavaScript for toggling mobile menu -->
    <script>
        // responsive nav js
        document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // active links js
        let sections = document.querySelectorAll('.section');
        let navLinks = document.querySelectorAll('header nav a');

        window.onscroll = () => {
            sections.forEach(sec => { // Corrected: "foreach" to "forEach"
                let top = window.scrollY;
                let offset = sec.offsetTop - 150;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');

                if (top >= offset && top < offset + height) {
                    navLinks.forEach(links => {
                        links.classList.remove('active');
                        document.querySelector('header nav a[href*=' + id + ']').classList.add('active'); // Also fixed the query string
                    });
                }
            });
        };

        // carousel JS
        const carousel = document.getElementById('carousel');
            const nextButton = document.getElementById('next');
            const prevButton = document.getElementById('prev');

            let currentIndex = 0;
            const totalSlides = carousel.children.length;
            const slideWidth = carousel.children[0].offsetWidth + 16; // Adjust for padding/margin between slides

            nextButton.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                carousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            });

            prevButton.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                carousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            });
    </script>

</body>
</html>
