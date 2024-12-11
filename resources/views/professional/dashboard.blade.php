<x-professional-layout>
    <div>
        @section('professional_content')

        <div>

            <!---------------------- Landing Section ---------------------->

            <section id="home" class="section flex items-center justify-center min-h-screen bg-[#FFDED6] text-center">
                <div
                    class="relative max-w-[80%] md:max-w-[60%] py-8 bg-[#694F8E] rounded-[50px] border border-gray-300 dark:border-gray-700 text-white dark:text-white/80 mx-4">
                    <!-- Content -->
                    <div class="w-full px-8 md:px-16 mx-auto text-justify">
                        <h1 class="text-3xl md:text-4xl lg:text-[5vh] font-semibold mb-4 text-[#FFDED6]">
                            Empowering Clear Speech, One Step at a Time!
                        </h1>
                        <h3 class="text-xl md:text-3xl lg:text-[3.9vh] mb-6 leading-8 md:leading-10">
                            We specialize in helping adults with dysarthria communicate at
                            their best by offering convenient, effective, and affordable
                            speech therapy.
                        </h3>

                        <!-- Learn More Button -->
                        <div class="flex w-full justify-center md:justify-end mt-4">
                            <a href="{{route('login')}}"
                                class="bottom-4 right-4 inline-flex items-center px-4 py-2 italic text-white rounded-full text-lg md:text-2xl font-medium hover:text-[#FFDED6] hover:underline transition-all focus:outline-none">
                                Learn More
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M13 5l7 7-7 7M5 12h14" />
                                </svg>
                            </a>
                        </div>

                        <!-- Join Here Button -->
                        <div class="flex justify-center items-center">
                            <h1
                                class="absolute bottom-[-25px] bg-[#694F8E] w-[50%] text-center py-3 rounded-[50px] text-2xl">
                                READY TO START?
                                <a href="{{route('login')}}"
                                    class="hover:text-[#FFDED6] hover:underline transition-all focus:outline-none">JOIN
                                    HERE.</a>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>

            <!---------------------- End of Landing Section ---------------------->


            <!---------------------- About ---------------------->

            <section id="about" class="section min-h-[90vh] bg-white text-center">
                <div class="flex justify-center items-center relative">
                    <div
                        class="bg-design bg-[#FFDED6] flex justify-center items-center w-full md:w-1/2 gap-5 py-2 px-4 md:px-0">
                        <div class="bg-left"></div>
                        <h1 class="text-[#694F8E] text-[2.5rem] md:text-[4rem] font-semibold">ABOUT</h1>
                        <img src="{{url('img/pink-bg-logo.png')}}" alt="" class="w-[34%] md:w-[28%]">
                        <div class="bg-right"></div>
                    </div>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:px-[150px] mx-4 pt-7 pb-5 relative sm:px-[150px]">
                    <div
                        class="bg-[#694F8E] min-h-[40vh] lg:min-h-[57vh] rounded-xl flex flex-col items-center p-4 md:px-5 gap-4">
                        <div class="h-[100px] md:h-[150px] lg:h-[25vh]">
                            <img src="{{url('img/about1.png')}}" alt="" class="h-[100%]">
                        </div>
                        <div class="h-[40%]">
                            <h1 class="text-justify text-base md:text-lg text-[#FFDED6]">
                                <span class="ml-4 md:ml-8"></span>
                                SPEAK, or Speech Potential Enhanced through Applied Knowledge, is an online platform
                                accessible to its targeted end users, which are adults with dysarthria. It aims to
                                provide
                                exercises or practices leading to improvement of the patients' speech. By using
                                evidence-based techniques, SPEAK empowers users to take control of their speech
                                rehabilitation journey in a convenient, virtual setting.
                            </h1>
                        </div>
                    </div>

                    <div
                        class="bg-[#694F8E] min-h-[40vh] lg:min-h-[57vh] rounded-xl flex flex-col items-center p-4 md:px-5 gap-4">
                        <div class="h-[100px] md:h-[150px] lg:h-[25vh]">
                            <img src="{{url('img/about2.png')}}" alt="" class="h-[100%]">
                        </div>
                        <div class="h-[40%]">
                            <h1 class="text-justify text-base md:text-xl text-[#FFDED6]">
                                <span class="ml-4 md:ml-8"></span>
                                At SPEAK, insights and knowledge from Professional Speech Language Pathologists (SLPs)
                                are
                                highly valued and incorporated in the whole website development process. Through this
                                collaboration, their expertise ensures that the platform provides scientifically-backed,
                                effective strategies for managing dysarthria.
                            </h1>
                        </div>
                    </div>

                    <div
                        class="bg-[#694F8E] min-h-[40vh] lg:min-h-[57vh] rounded-xl flex flex-col items-center p-4 md:px-5 gap-4">
                        <div class="h-[100px] md:h-[150px] lg:h-[25vh]">
                            <img src="{{url('img/about3.png')}}" alt="" class="h-[100%]">
                        </div>
                        <div class="h-[40%]">
                            <h1 class="text-justify text-base md:text-xl text-[#FFDED6]">
                                <span class="ml-4 md:ml-8"></span>
                                SPEAK also offers valuable resources for caregivers, ensuring they are equipped to
                                support
                                the patient’s progress at home. These resources offer guidance on how to implement
                                at-home
                                practices, foster a supportive environment, and address challenges that may arise during
                                the
                                rehabilitation process.
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mr-4 md:justify-end sm:justify-end mt-5">
                    <a href="#developers"
                        class="text-[#694F8E] italic flex items-center text-2xl md:text-3xl font-semibold hover:underline transition-all">
                        Developers
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 5l7 7-7 7M5 12h14" />
                        </svg>
                    </a>
                </div>
            </section>

            <!---------------------- End of About ---------------------->


            <!---------------------- Developers ---------------------->

            <section id="developers" class="section bg-white text-center">
                <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2 px-4">
                    <h1 class="text-[#694F8E] text-[1.6rem] md:text-[4rem] font-semibold">DEVELOPERS OF</h1>
                    <img src="{{url('img/pink-bg-logo.png')}}" alt="" class="w-[20%] md:w-[15%] h-auto">
                </div>

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-10 px-4 md:px-[100px] pt-10 pb-5 relative lg:px-32">
                    <div
                        class="h-[15rem] md:h-[20rem] w-[15rem] md:w-[20rem] flex flex-col justify-center items-center mx-auto relative ">
                        <div
                            class="bg-[#694F8E] h-[12rem] md:h-[33vh] w-[12rem] md:w-[33vh] rounded-full overflow-hidden flex items-center justify-center p-4">
                            <img src="{{url('img/bella.jpeg')}}" alt="" class="rounded-full w-full h-full object-cover">
                        </div>
                        <h1
                            class="bg-[#A6A6A6] text-white lg:text-[2.5vh] text-base md:text-lg font-semibold rounded-xl mt-2 px-2 absolute bottom-[10px] sm:bottom-[20px]">
                            Bella Beatrice C. Fundano
                        </h1>
                    </div>

                    <div
                        class="h-[15rem] md:h-[20rem] w-[15rem] md:w-[20rem] flex flex-col justify-center items-center mx-auto relative ">
                        <div
                            class="bg-[#694F8E] h-[12rem] md:h-[33vh] w-[12rem] md:w-[33vh] rounded-full overflow-hidden flex items-center justify-center p-4">
                            <img src="{{url('img/roxanne.jpeg')}}" alt=""
                                class="rounded-full w-full h-full object-cover">
                        </div>
                        <h1
                            class="bg-[#A6A6A6] text-white lg:text-[2.5vh] text-base md:text-lg font-semibold rounded-xl mt-2 px-2 absolute bottom-[10px] sm:bottom-[20px]">
                            Roxanne E. Gutierrez
                        </h1>
                    </div>

                    <div
                        class="h-[15rem] md:h-[20rem] w-[15rem] md:w-[20rem] flex flex-col justify-center items-center mx-auto relative ">
                        <div
                            class="bg-[#694F8E] h-[12rem] md:h-[33vh] w-[12rem] md:w-[33vh] rounded-full overflow-hidden flex items-center justify-center p-4">
                            <img src="{{url('img/rean.jpeg')}}" alt="" class="rounded-full w-full h-full object-cover">
                        </div>
                        <h1
                            class="bg-[#A6A6A6] text-white lg:text-[2.5vh] text-base md:text-lg font-semibold rounded-xl mt-2 px-2 absolute bottom-[10px] sm:bottom-[20px]">
                            Rean Luane G. Luzuriaga
                        </h1>
                    </div>

                    <div
                        class="h-[15rem] md:h-[20rem] w-[15rem] md:w-[20rem] flex flex-col justify-center items-center mx-auto relative ">
                        <div
                            class="bg-[#694F8E] h-[12rem] md:h-[33vh] w-[12rem] md:w-[33vh] rounded-full overflow-hidden flex items-center justify-center p-4">
                            <img src="{{url('img/john.jpeg')}}" alt="" class="rounded-full w-full h-full object-cover">
                        </div>
                        <h1
                            class="bg-[#A6A6A6] text-white lg:text-[2.5vh] text-base md:text-lg font-semibold rounded-xl mt-2 px-2 absolute bottom-[10px] sm:bottom-[20px]">
                            John Christopher L. Obispo
                        </h1>
                    </div>
                </div>

                <div class="flex justify-center md:justify-end mr-4 md:mr-[150px] my-5">
                    <a href=""
                        class="text-[#694F8E] italic flex items-center text-2xl md:text-3xl font-semibold hover:underline transition-all">
                        Contact Us
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 5l7 7-7 7M5 12h14" />
                        </svg>
                    </a>
                </div>
            </section>

            <!---------------------- End of Developers ---------------------->


            <!---------------------- Catalog Section ---------------------->

            <section id="catalog" class="section py-5 bg-white">
                <!---------------------- Catalog Header ---------------------->
                <div class="px-10 md:px-[150px] sticky py-5  bg-[#FFDED6] z-[2] top-[50px] lg:px-32">
                    <h1 class="text-[#694F8E] text-[1.6rem] md:text-[2.5rem] font-semibold">Catalog</h1>
                </div>


                <!---------------------- Stories Section ---------------------->

                <div class="">
                    <div class="px-4 md:px-[150px] sticky py-5 top-[50px] flex justify-end z-[2] lg:px-32">
                        <h1 class="text-[#694F8E] text-[1.6rem] md:text-[2.5rem] font-semibold px-3 rounded-2xl">Stories
                        </h1>
                    </div>
                    <div
                        class="flex flex-col md:flex-row gap-5 md:gap-10 px-4 sm:px-[150px] md:px-[100px] pt-10 pb-5 relative lg:px-24">
                        <div
                            class="w-full md:w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                            <img src="{{url('img/blank.webp')}}" alt="" class="h-[35vh] w-full mb-4 object-cover">
                            <a href="" class="text-lg text-black">
                                <i class="fa-solid fa-globe"></i> Philippines
                            </a>
                            <h1 class="text-black text-xl font-semibold pt-7">
                                ARTICLE HEADLINE; LOREM IPSUM DOLOR
                            </h1>
                            <h2 class="text-lg text-black">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet
                                reiciendis facere asperiores ea deleniti ratione debitis.
                            </h2>
                        </div>
                        <div
                            class="w-full md:w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                            <img src="{{url('img/blank.webp')}}" alt="" class="h-[35vh] w-full mb-4 object-cover">
                            <a href="" class="text-lg text-black">
                                <i class="fa-solid fa-globe"></i> Philippines
                            </a>
                            <h1 class="text-black text-xl font-semibold pt-7">
                                ARTICLE HEADLINE; LOREM IPSUM DOLOR
                            </h1>
                            <h2 class="text-lg text-black">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet
                                reiciendis facere asperiores ea deleniti ratione debitis.
                            </h2>
                        </div>
                    </div>
                </div>

                <!---------------------- End of Stories Section ---------------------->


                <!---------------------- Articles Section ---------------------->

                <div class="">
                    <div class="px-4 md:px-[150px] sticky py-5 top-[50px] flex justify-end z-[2] lg:px-32">
                        <h1 class="text-[#694F8E] text-[1.6rem] md:text-[2.5rem] font-semibold px-3 rounded-2xl ">
                            Articles
                        </h1>
                    </div>
                    <div
                        class="flex flex-col md:flex-row gap-5 md:gap-10 px-4 md:px-[100px] pt-10 pb-5 relative lg:px-24">
                        <div
                            class="w-full md:w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                            <img src="{{url('img/blank.webp')}}" alt="" class="h-[35vh] w-full mb-4 object-cover">
                            <a href="" class="text-lg text-black">
                                <i class="fa-solid fa-globe"></i> Philippines
                            </a>
                            <h1 class="text-black text-xl font-semibold pt-7">
                                ARTICLE HEADLINE; LOREM IPSUM DOLOR
                            </h1>
                            <h2 class="text-lg text-black">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet
                                reiciendis facere asperiores ea deleniti ratione debitis.
                            </h2>
                        </div>
                        <div
                            class="w-full md:w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                            <img src="{{url('img/blank.webp')}}" alt="" class="h-[35vh] w-full mb-4 object-cover">
                            <a href="" class="text-lg text-black">
                                <i class="fa-solid fa-globe"></i> Philippines
                            </a>
                            <h1 class="text-black text-xl font-semibold pt-7">
                                ARTICLE HEADLINE; LOREM IPSUM DOLOR
                            </h1>
                            <h2 class="text-lg text-black">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet
                                reiciendis facere asperiores ea deleniti ratione debitis.
                            </h2>
                        </div>
                        <div
                            class="w-full md:w-[50%] p-5 items-center bg-[#fff] shadow-xl rounded-lg hover:bg-[#ffded627] transition-all">
                            <img src="{{url('img/blank.webp')}}" alt="" class="h-[35vh] w-full mb-4 object-cover">
                            <a href="" class="text-lg text-black">
                                <i class="fa-solid fa-globe"></i> Philippines
                            </a>
                            <h1 class="text-black text-xl font-semibold pt-7">
                                ARTICLE HEADLINE; LOREM IPSUM DOLOR
                            </h1>
                            <h2 class="text-lg text-black">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit accusamus natus amet
                                reiciendis facere asperiores ea deleniti ratione debitis.
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="hidden">
                    <h1>AM&MAB</h1>
                </div>
                <!---------------------- End of Articles Section ---------------------->


                <!---------------------- Content Creator Section ---------------------->

                <div class="">
                    <div class="px-4 md:px-[150px] sticky py-5 top-[50px] flex justify-end z-[2] lg:px-32">
                        <h1 class="text-[#694F8E] text-[1.6rem] md:text-[2.5rem] font-semibold px-3 rounded-2xl">Content
                            Creators</h1>
                    </div>
                    <div class="flex flex-wrap gap-5 justify-center px-4 md:px-[100px] pt-10 pb-5 relative">
                        <div class="min-h-[20rem] w-[90%] md:w-[20rem] lg:w-[25rem] p-4">
                            <div class="flex flex-col justify-center items-center relative">
                                <div
                                    class="bg-[#694F8E] h-[15rem] w-[15rem] md:w-[29vh] md:h-[29vh] rounded-full flex items-center flex-col justify-center">
                                    <img src="{{url('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                                </div>
                                <a href="https://www.youtube.com/" class="absolute bottom-[-30px]" target="_blank">
                                    <img src="{{url('img/yt.png')}}" class="w-[70px] md:w-[90px]">
                                </a>
                            </div>
                            <div class="text-black">
                                <h1 class="text-lg lg:text-[3vh] font-semibold rounded-xl mt-10 text-center mb-3">
                                    TEACHER KAYE TALKS, SLP
                                </h1>
                                <h2 class="lg:text-[2.1vh] mb-2">Speech-Language Pathologist - Bulan RegionalHealth
                                    (2015 -
                                    2016)</h2>
                                <h2 class="lg:text-[2.1vh] mb-2">- Performed evaluation and treatment planning of over
                                    50
                                    patients a month</h2>
                                <h2 class="lg:text-[2.1vh] mb-2">- Provided direct and indirect speech therapy services
                                    to
                                    350 students with
                                    communication disorders.</h2>
                            </div>
                        </div>
                        <div class="min-h-[20rem] w-[90%] md:w-[20rem] lg:w-[25rem] p-4">
                            <div class="flex flex-col justify-center items-center relative">
                                <div
                                    class="bg-[#694F8E] h-[15rem] w-[15rem] md:w-[29vh] md:h-[29vh] rounded-full flex items-center flex-col justify-center">
                                    <img src="{{url('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                                </div>
                                <a href="https://www.youtube.com/" class="absolute bottom-[-30px]" target="_blank">
                                    <img src="{{url('img/yt.png')}}" class="w-[70px] md:w-[90px]">
                                </a>
                            </div>
                            <div class="text-black">
                                <h1 class="text-lg lg:text-[3vh] font-semibold rounded-xl mt-10 text-center mb-3">
                                    TEACHERKAYE TALKS, SLP
                                </h1>
                                <h2 class="lg:text-[2.1vh] mb-2">Speech-Language Pathologist - Bulan RegionalHealth
                                    (2015 -
                                    2016)</h2>
                                <h2 class="lg:text-[2.1vh] mb-2">- Performed evaluation and treatment planning of over
                                    50
                                    patients a month</h2>
                                <h2 class="lg:text-[2.1vh] mb-2">- Provided direct and indirect speech therapy services
                                    to
                                    350 students with
                                    communication disorders.</h2>
                            </div>
                        </div>
                        <div class="min-h-[20rem] w-[90%] md:w-[20rem] lg:w-[25rem] p-4">
                            <div class="flex flex-col justify-center items-center relative">
                                <div
                                    class="bg-[#694F8E] h-[15rem] w-[15rem] md:w-[29vh] md:h-[29vh] rounded-full flex items-center flex-col justify-center">
                                    <img src="{{url('img/toga.png')}}" alt="" class="rounded-full w-full h-full">
                                </div>
                                <a href="https://www.youtube.com/" class="absolute bottom-[-30px]" target="_blank">
                                    <img src="{{url('img/yt.png')}}" class="w-[70px] md:w-[90px]">
                                </a>
                            </div>
                            <div class="text-black">
                                <h1 class="text-lg lg:text-[3vh] font-semibold rounded-xl mt-10 text-center mb-3">
                                    TEACHERKAYE TALKS, SLP
                                </h1>
                                <h2 class="lg:text-[2.1vh] mb-2">Speech-Language Pathologist - Bulan RegionalHealth
                                    (2015 -
                                    2016)</h2>
                                <h2 class="lg:text-[2.1vh] mb-2">- Performed evaluation and treatment planning of over
                                    50
                                    patients a month</h2>
                                <h2 class="lg:text-[2.1vh] mb-2">- Provided direct and indirect speech therapy services
                                    to
                                    350 students with
                                    communication disorders.</h2>
                            </div>
                        </div>
                        <!-- Additional Content Creator Divs Here -->
                    </div>
                </div>

                <!---------------------- End of Content Creator Section ---------------------->

            </section>

            <!---------------------- End of Catalog Section ---------------------->


            <!---------------------- Courses Section ---------------------->

            <section id="courses" class="section bg-white">
                <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2 px-5">
                    <h1 class="text-[#694F8E] text-[2rem] md:text-[3rem] lg:text-[4rem] font-semibold">Courses</h1>
                </div>

                <div class="flex flex-col lg:flex-row h-auto lg:h-[80vh]">
                    <div class="bg-[#694F8E] py-5 w-full lg:w-[60%] flex flex-col items-center justify-center">
                        <div class="bg-[#DEDBE3] text-right px-5 md:px-10 py-3 w-full">
                            <h1 class="text-3xl md:text-4xl lg:text-5xl  text-[#694F8E] font-bold">
                                DYSARTHRIA COUNSELING <br class="hidden md:block"> FOR FAMILIES
                            </h1>
                        </div>
                        <p
                            class="text-lg md:text-xl lg:text-3xl px-5 md:px-10 text-justify leading-7 md:leading-8 lg:!leading-[2.5rem] font-semibold text-white pt-5">
                            Holistic care for dysarthria involves more than just SPEAK. Cooperation from the patient’s
                            family and environment is crucial,
                            and proper at-home care that supports their dysarthria journey is essential for
                            demonstrating
                            progress. There will be online courses
                            and seminars accessible for the families regarding these topics.
                        </p>
                        <a href="{{route('login')}}"
                            class="bg-[#b692c2] px-3 py-2 md:px-4 md:py-2 font-semibold mt-5 text-lg md:text-2xl text-white rounded-full">
                            COURSES AND WEBINARS
                        </a>
                    </div>
                    <div class="w-full lg:w-[40%] h-[20rem] lg:h-[80vh] mt-5 lg:mt-0">
                        <img src="{{url('img/course-image.png')}}" alt="" class="w-full h-full object-cover">
                    </div>
                </div>
            </section>

            <!---------------------- End of Courses Section ---------------------->


            <!---------------------- Directory Section ---------------------->

            <section id="directory" class="section min-h-[90vh] bg-white">
                <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2 px-5 ">
                    <h1 class="text-[#694F8E] text-[2rem] md:text-[3rem] lg:text-[4rem] font-semibold text-center">Meet
                        Our
                        Speech-Language Pathologists!</h1>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 px-5 md:px-[50px] pb-5 relative lg:px-32 items-start">
                    <div
                        class="h-auto w-full max-w-[30rem] flex flex-col justify-center items-center mt-10 lg:mt-[100px] mx-auto relative">
                        <div class="relative">
                            <div
                                class="bg-[#694F8E] h-[12rem] w-[12rem] md:h-[15rem] md:w-[15rem] rounded-full relative flex justify-center overflow-hidden">
                                <img src="{{url('img/p1.jpeg')}}" alt=""
                                    class="rounded-full w-full h-full object-contain">
                            </div>
                            <h1
                                class="bg-[#A6A6A6] text-white text-center text-lg font-semibold rounded-xl absolute bottom-[0px] px-3 w-full z-20">
                                CONTACT
                            </h1>
                        </div>
                        <div class="text-black px-5 md:px-12">
                            <h1 class="text-lg md:text-xl lg:text-[3vh] font-semibold rounded-xl mt-5 text-center mb-3">
                                Hannah Maria D. Albert, SLP
                            </h1>
                            <h1 class="text-justify mb-3 lg:text-[2.1vh]">
                                <span class="font-semibold">Credentials:</span>
                                Faculty member of the Department of Speech Pathology.
                            </h1>
                            <h2 class="text-justify mb-3 lg:text-[2.1vh]">
                                - Bachelor's degree in Speech Pathology from the College of Allied Medical Professions,
                                UP
                                Manila in 2011.
                            </h2>
                            <h2 class="text-justify mb-3 lg:text-[2.1vh]">
                                - Master in Rehabilitation Science in Speech Pathology in 2022.
                            </h2>

                            <!-- Hidden content -->
                            <div id="more-info" class="hidden text-justify mt-3">
                                <h2 class="text-lg font-semibold">Full Information:</h2>
                                <p class=" lg:text-[2.1vh]">
                                    "Hannah Maria D. Albert is a full time faculty member of the Department of Speech
                                    Pathology. She obtained her Bachelor's degree in Speech Pathology from the College
                                    of
                                    Allied Medical Professions, UP Manila in 2011, and her Master in Rehabilitation
                                    Science
                                    in Speech Pathology in 2022. She started as a clinical instructor in 2012, worked
                                    part-time until 2018, and subsequently transitioned to a full time faculty member in
                                    2019. Her teaching and research interests are in the areas of fluency, speech sound
                                    disorders, pediatric intervention and education. She is currently serving as the
                                    chairperson of the Department.
                                    hdalbert@up.edu.ph"
                                </p>
                            </div>

                            <div class="text-center mt-3">
                                <button id="learn-more-btn"
                                    class="bg-pink-400 px-4 py-1 rounded-full text-white lg:text-[2.1vh]">
                                    Learn more..
                                </button>
                            </div>
                        </div>
                    </div>


                    <div
                        class="h-auto w-full max-w-[30rem] flex flex-col justify-center items-center mt-10 lg:mt-[100px] mx-auto">
                        <div class="relative">
                            <div
                                class="bg-[#694F8E] h-[12rem] w-[12rem] md:h-[15rem] md:w-[15rem] rounded-full relative flex justify-center overflow-hidden">
                                <img src="{{url('img/p2.jpeg')}}" alt=""
                                    class="rounded-full w-full h-full object-cover">
                            </div>
                            <h1
                                class="bg-[#A6A6A6] text-white text-center text-lg font-semibold rounded-xl absolute bottom-[0px] px-3 w-full z-20">
                                CONTACT
                            </h1>
                        </div>
                        <div class="text-black px-5 md:px-12">
                            <h1
                                class="text-lg md:text-xl lg:text-[3vh] font-semibold rounded-xl mt-5 text-center mb-3 ">
                                Founder
                            </h1>
                            <h1 class="text-justify mb-3 lg:text-[2.1vh]">
                                <span class="font-semibold">Credentials:</span> Founder of Our Learning Corner ·
                                Self-employed
                            </h1>
                            <h2 class="text-justify mb-3 lg:text-[2.1vh]">
                                - Bachelor's degree in Speech Pathology from University of Santo Tomas in 2016.
                            </h2>
                            <h2 class="text-justify mb-3 lg:text-[2.1vh]">
                                - Consultant Speech Language Pathologist <br>
                                Theratalk Therapy Center · Part-time <br>
                                Feb 2018 - Sep 2023
                            </h2>

                            <div id="more-info2" class="hidden text-justify mt-3">
                                <h2 class="text-lg font-semibold">Full Information:</h2>
                                <p class="lg:text-[2.1vh]">
                                    Speech Teletherapist · Self-employed · May 2020 - Present <br><br>
                                    - Facilitated therapy sessions through direct patient interactions with digital
                                    materials or functional home activities with average patient load of 15 clients per
                                    week.
                                    <br>
                                    <br>
                                    Registered Speech-Language Pathologist · Philippine Professional Regulation
                                    Commission ·
                                    Issued Mar 2023
                                    <br><br>
                                    - Itinerant Speech Language Pathologist <br>
                                    Gifted Ones Development Foundation Center · Part-time <br>
                                    Jul 2016 - Present
                                </p>
                            </div>

                            <div class="text-center mt-3">
                                <button id="learn-more-btn2"
                                    class="bg-pink-400 px-4 py-1 rounded-full text-white lg:text-[2.1vh]">
                                    Learn more..
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for the third section -->
                    <!-- <div class="h-auto w-full max-w-[30rem] flex flex-col justify-center items-center mt-10 lg:mt-[100px] mx-auto">
                    <div class="relative">
                        <div class="bg-[#694F8E] h-[12rem] w-[12rem] md:h-[15rem] md:w-[15rem] rounded-full relative flex justify-center overflow-hidden">
                            <img src="{{url ('img/toga.png')}}" alt="" class="rounded-full w-full h-full object-cover">
                        </div>
                        <h1 class="bg-[#A6A6A6] text-white text-center text-lg font-semibold rounded-xl absolute bottom-[0px] px-3 w-full z-20">
                            CONTACT
                        </h1>
                    </div>
                    <div class="text-black px-5 md:px-12">
                        <h1 class="text-lg md:text-xl font-semibold rounded-xl mt-5 text-center mb-3">
                            Not defined
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
                </div> -->
                </div>
            </section>

            <!---------------------- End of Directory Section ---------------------->


            <!---------------------- Testimonials Section ---------------------->

            <section id="testimonials" class="section bg-[#fff7f5]">
                <div class="bg-[#FFDED6] w-full flex justify-center items-center gap-5 py-2 px-4">
                    <h1 class="text-[#694F8E] text-[2rem] md:text-[4rem] lg:text-[3rem] font-semibold">TESTIMONIALS</h1>
                </div>
                <h2 class="text-lg md:text-2xl lg:text-3xl font-bold text-center text-[#694F8E] mt-8 md:mt-12 italic">
                    How was your experience in SPEAK? Let us know!
                </h2>
                <!-- Carousel Container -->
                <div class="carousel-container relative max-w-5xl mx-auto px-4 md:px-6 py-8 md:py-16 overflow-hidden">
                    <div id="carousel" class="carousel flex space-x-4">
                        <!-- Testimonial Items -->
                        <div
                            class="hover:bg-white transition-all bg-[#ffded62c] p-4 md:p-6 rounded-lg shadow-lg flex-shrink-0 w-[80%] sm:w-[60%] md:w-[40%] lg:w-1/3">
                            <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very
                                easy to use."</p>
                            <div class="flex items-center space-x-4 mt-4">
                                <img src="https://via.placeholder.com/48" alt="Jordan's photo"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                    <h4 class="text-gray-800 text-[.8rem] font-semibold">October 10, 2024</h4>
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
                        <div
                            class="hover:bg-white transition-all bg-[#ffded62c] p-4 md:p-6 rounded-lg shadow-lg flex-shrink-0 w-[80%] sm:w-[60%] md:w-[40%] lg:w-1/3">
                            <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very
                                easy to use."</p>
                            <div class="flex items-center space-x-4 mt-4">
                                <img src="https://via.placeholder.com/48" alt="Jordan's photo"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                    <h4 class="text-gray-800 text-[.8rem] font-semibold">October 10, 2024</h4>
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
                        <div
                            class="hover:bg-white transition-all bg-[#ffded62c] p-4 md:p-6 rounded-lg shadow-lg flex-shrink-0 w-[80%] sm:w-[60%] md:w-[40%] lg:w-1/3">
                            <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very
                                easy to use."</p>
                            <div class="flex items-center space-x-4 mt-4">
                                <img src="https://via.placeholder.com/48" alt="Jordan's photo"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                    <h4 class="text-gray-800 text-[.8rem] font-semibold">October 10, 2024</h4>
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
                        <div
                            class="hover:bg-white transition-all bg-[#ffded62c] p-4 md:p-6 rounded-lg shadow-lg flex-shrink-0 w-[80%] sm:w-[60%] md:w-[40%] lg:w-1/3">
                            <p class="text-gray-600 italic mb-4">"Overall had a great experience as the website was very
                                easy to use."</p>
                            <div class="flex items-center space-x-4 mt-4">
                                <img src="https://via.placeholder.com/48" alt="Jordan's photo"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <h4 class="text-gray-800 text-lg font-semibold">User001</h4>
                                    <h4 class="text-gray-800 text-[.8rem] font-semibold">October 10, 2024</h4>
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
                    <button id="prev"
                        class="absolute top-1/2 left-2 md:left-0 transform -translate-y-1/2 bg-[#694F8E] text-white p-2 px-4 rounded-full">❮</button>
                    <button id="next"
                        class="absolute top-1/2 right-2 md:right-0 transform -translate-y-1/2 bg-[#694F8E] text-white p-2 px-4 rounded-full">❯</button>
                </div>
            </section>

            <!---------------------- End of Directory Section ---------------------->


            <!---------------------- Footer Section ---------------------->

            <section id="contact" class="section min-h-[40vh] bg-[#FFBFE2]">
                <footer class="flex flex-col lg:flex-row relative w-full">
                    <!---------------------- Left Side Logo and Social Links ---------------------->
                    <div class="lg:w-[50%] p-5 lg:p-10 flex flex-col items-center">
                        <img src="{{url('img/pink-bg-logo.png')}}" alt="SPEAK Logo" class="w-[90%] mt-5 lg:mt-10">
                        <div class="flex gap-4 justify-center items-center mt-4">
                            <a href="#" aria-label="Facebook"
                                class="text-3xl group transition-transform duration-300 ease-in-out">
                                <i
                                    class="fa-brands fa-facebook text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                            </a>
                            <a href="#" aria-label="Twitter"
                                class="text-3xl group transition-transform duration-300 ease-in-out">
                                <i
                                    class="fa-brands fa-twitter text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                            </a>
                            <a href="#" aria-label="Instagram"
                                class="text-3xl group transition-transform duration-300 ease-in-out">
                                <i
                                    class="fa-brands fa-instagram text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                            </a>
                            <a href="#" aria-label="LinkedIn"
                                class="text-3xl group transition-transform duration-300 ease-in-out">
                                <i
                                    class="fa-brands fa-linkedin text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                            </a>
                            <a href="#" aria-label="YouTube"
                                class="text-3xl group transition-transform duration-300 ease-in-out">
                                <i
                                    class="fa-brands fa-youtube text-[#694f8e] group-hover:-translate-y-2 transition-all"></i>
                            </a>
                        </div>
                    </div>

                    <!---------------------- Right Side: Contact Form ---------------------->
                    <div class="lg:w-[50%] h-full flex flex-col items-center p-5 lg:p-10">
                        <h1 class="text-black text-center py-2 text-xl md:text-2xl font-semibold">
                            Have any concerns or feedback about SPEAK? <br> Let us know—we're here to help!
                        </h1>
                        <div class="w-full max-w-lg p-5">
                            <form action="" method="POST">
                                <div class="flex flex-col md:flex-row w-full gap-5">
                                    <div class="flex flex-col gap-2 w-full text-black">
                                        <label for="name" class="text-black font-medium">Name:</label>
                                        <input type="text" name="name" id="name" placeholder="Your Name"
                                            class="border-2 border-[#694F8E] bg-transparent rounded-full px-3 py-2 focus:outline-none focus:border-[#FFDED6]">
                                    </div>
                                    <div class="flex flex-col gap-2 w-full text-black">
                                        <label for="email" class="text-black font-medium">Email:</label>
                                        <input type="email" name="email" id="email" placeholder="Your Email"
                                            class="border-2 border-[#694F8E] bg-transparent rounded-full px-3 py-2 focus:outline-none focus:border-[#FFDED6]">
                                    </div>
                                </div>
                                <!-- Message Input -->
                                <div class="flex flex-col gap-2 w-full text-black mt-4">
                                    <label for="message" class="text-black font-medium">Message:</label>
                                    <textarea name="message" id="message" placeholder="Type your message here"
                                        class="border-2 border-[#694F8E] bg-transparent rounded-xl px-3 py-2 focus:outline-none focus:border-[#FFDED6]"
                                        rows="1"></textarea>
                                </div>
                                <div class="flex justify-end mt-5">
                                    <button type="submit"
                                        class="bg-[#FFDED6] px-8 py-2 rounded-xl text-[#694F8E] hover:bg-[#694F8E] hover:text-white transition-colors">
                                        Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </footer>
            </section>

            <!---------------------- End of Footer Section ---------------------->



            <style>
                nav a {
                    border-radius: 50px;
                    padding: 4px 15px;
                }

                nav a.active {
                    background-color: #FFBFE2;
                    border-radius: 50px;
                }

                .bg-design {
                    border-radius: 0 0 40px 40px;
                    position: relative;
                }

                .bg-left {
                    background: #FFDED6;
                    height: 80px;
                    width: 100px;
                    position: absolute;
                    overflow: hidden;
                    left: -100px;
                    top: 0;
                }

                .bg-left:after {
                    position: absolute;
                    content: '';
                    display: block;
                    height: 200%;
                    width: 200%;
                    left: -100%;
                    background: white;
                    border-radius: 100%;
                }

                .bg-right {
                    background: #FFDED6;
                    height: 80px;
                    width: 100px;
                    position: absolute;
                    overflow: hidden;
                    right: -100px;
                    top: 0;
                }

                .bg-right:after {
                    position: absolute;
                    content: '';
                    display: block;
                    height: 200%;
                    width: 200%;
                    right: -100%;
                    background: white;
                    border-radius: 100%;
                }

                .carousel-container {
                    overflow: hidden;
                }

                .carousel {
                    display: flex;
                    transition: transform 0.5s ease-in-out;
                    will-change: transform;
                }

                @media only screen and (max-width: 768px) {
                    .bg-design:after {
                        display: none;
                    }

                    .bg-left {
                        display: none;
                    }

                    .bg-right {
                        display: none;
                    }
                }
            </style>


            <!-- JavaScript for toggling mobile menu -->
            <script>
                // responsive nav js
                document.getElementById('menu-toggle').addEventListener('click', function () {
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
                document.addEventListener('DOMContentLoaded', () => {
                    const carousel = document.getElementById('carousel');
                    const nextButton = document.getElementById('next');
                    const prevButton = document.getElementById('prev');

                    let currentIndex = 0;
                    const totalSlides = carousel.children.length;
                    const slideWidth = carousel.children[0].getBoundingClientRect().width + 16; // Including space between slides

                    nextButton.addEventListener('click', () => {
                        // Increment index, wrap around if at the end
                        currentIndex = (currentIndex + 1) % totalSlides;
                        updateCarouselPosition();
                    });

                    prevButton.addEventListener('click', () => {
                        // Decrement index, wrap around if at the beginning
                        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                        updateCarouselPosition();
                    });

                    const updateCarouselPosition = () => {
                        carousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                    };

                    // Update slide width dynamically on window resize
                    window.addEventListener('resize', () => {
                        const updatedSlideWidth = carousel.children[0].getBoundingClientRect().width + 16;
                        if (updatedSlideWidth !== slideWidth) {
                            updateCarouselPosition();
                        }
                    });
                });
            </script>
            <script>
                document.getElementById('learn-more-btn').addEventListener('click', function () {
                    const moreInfo = document.getElementById('more-info');

                    // Toggle the hidden class
                    if (moreInfo.classList.contains('hidden')) {
                        moreInfo.classList.remove('hidden'); // Show the content
                        this.textContent = 'Show less'; // Update button text
                    } else {
                        moreInfo.classList.add('hidden'); // Hide the content
                        this.textContent = 'Learn more..'; // Update button text
                    }

                });
                document.getElementById('learn-more-btn2').addEventListener('click', function () {
                    const moreInfo2 = document.getElementById('more-info2');

                    // Toggle the hidden class
                    if (moreInfo2.classList.contains('hidden')) {
                        moreInfo2.classList.remove('hidden'); // Show the content
                        this.textContent = 'Show less'; // Update button text
                    } else {
                        moreInfo2.classList.add('hidden'); // Hide the content
                        this.textContent = 'Learn more..'; // Update button text
                    }

                });
            </script>

        </div>

        @stop
    </div>
</x-professional-layout>