<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamUp: Community Dashboard</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="./public/css/style.css" type="text/css">
    
    <!-- tailwind cdn link -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- bootstrap cdn css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css">
</head>
<body>
    <!--============ start: HEADER ============-->
    <div class="navbar flex justify-between items-center p-4 mx-16">
        <div class="flex justify-center items-center md:order-2">
            <div class="hamburger-menu inline-block p-4 cursor-pointer md:hidden">
                <div class="line h-0.5 w-6 my-1 bg-black"></div>
                <div class="line h-0.5 w-6 my-1 bg-black"></div>
                <div class="line h-0.5 w-6 my-1 bg-black"></div>
            </div>

            <div class="search md:hidden">
                SearchIconM
            </div>
        </div>
        <div class="logo md:order-1 text-center flex">
            <div class="p-1 w-48">
                <img class="h-10 w-26 md:h-12 md:w-28" src="./public/assets/logo-teamUp.png" alt="TeamUp">
            </div>
        </div>
        <div class="signin-btn md:order-3 text-center flex justify-center items-center">
            <!-- NAVBAR MENU -->
            <div class="features absolute inset-0 md:flex md:mx-8 md:space-x-8 -translate-x-96 md:translate-x-0 bg-gray-200 w-fit md:w-auto md:bg-white md:static hidden">
                <div><a class="decoration-0 no-underline text-[#000] font-normal hover:text-[#0076CB]" href="">Features</a></div>
                <div><a class="decoration-0 no-underline text-[#000] font-normal hover:text-[#0076CB]" href="">Explore</a></div>
                <div><a class="decoration-0 no-underline text-[#000] font-normal hover:text-[#0076CB]" href="">Blog</a></div>
                <div><a class="decoration-0 no-underline text-[#000] font-normal hover:text-[#0076CB]" href="">Contact</a></div>
                <div><a class="decoration-0 no-underline text-[#000] font-normal hover:text-[#0076CB]" href="">Support</a></div>
            </div>

            <!-- SIGN IN -->
            <div class="flex flex-wrap">
                <button type="button" class="font-bold py-2 px-4 rounded relative border-gray-100 transition-colors before:absolute before:left-0 before:top-0 before:-z-10 before:h-full before:w-full before:origin-top-left before:scale-x-0 before:bg-[#3286DA] before:transition-transform before:duration-300 before:content-[''] before:hover:scale-x-100">
                    <a class="decoration-0 no-underline" href="./app/page_signin.php">
                        Sign In
                    </a>
                </button>
            </div>
        </div>
    </div>
    <!-- <hr> -->
    <!--============ end: HEADER ============-->
    
    <!--============ start: MAIN CONTENT ============-->
    <!-- SLIDER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./public/assets/slide-1.png" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="./public/assets/slide-a.png" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="./public/assets/slide-b.png" class="d-block w-100" alt="">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- <div class="slider flex justify-center items-center">
        <div class="img-slide flex bg-[#f2f2f2] relative">
            <img src="./public/assets/slide-a.png" alt="dynamic-flow">
        </div>
        <div class="text-slide flex absolute flex-col md:items-baseline">
            <h1 class="text-xl text-white md:text-5xl mx-5 text-left tracking-wider font-semibold">Simplify Your <br> Group’s Event</h1>
            <p class="mx-5 p-2 text-left text-white md:text-left tracking-wider font-light">Seamlessly coordinate activities and communicate <br> with your group to ensure no one misses out.</p>
        </div>
    </div> -->
    <!-- GET STARTED -->
    <div class="flex justify-center items-center flex-col p-9">
        <div class="title pt-3">
            <h1 class="text-xl text-black md:text-5xl text-center tracking-wide font-semibold">Let's Get Started</h1>
        </div>
        <div class="sub-title pt-1">
            <p class="mx-5 p-3 text-center text-[#616161] text-lg md:text-left tracking-wider font-light">Your personalized dashboard awaits, ensuring you never forget an <br> event with automated reminders and real-time notifications.</p>
        </div>
        <div class="btn-signup p-2">
            <button type="button" class="border-2 border-slate-600 hover:bg-[#3286DA] text-2xl text-slate-950 hover:text-blue-50 font-medium py-3 px-14 rounded-2xl">
                <a class="decoration-0 no-underline" href="./app/page_signup.php">
                    Start for free
                </a>
            </button>
        </div>
    </div>
    <!-- SCHEDULING EVENT -->
    <div class="flex justify-center items-center flex-col p-9">
        <div class="title pt-2">
            <h1 class="text-xl text-black md:text-5xl text-center tracking-wide font-semibold">Scheduling Solutions for <br> Every Event</h1>
        </div>
        <div class="sub-title pt-3">
            <p class="mx-5 p-3 text-center text-[#616161] md:text-left tracking-wider text-lg font-light">Streamline your event planning with our intuitive scheduling tools designed <br> for any occasion.</p>
        </div>
        <div class="img-event p-12 pb-32">
            <img src="./public/assets/img-event.png" alt="">
        </div>
    </div>
    <!-- POWERFUL EVENT -->
    <div class="flex justify-center items-center flex-col p-9 bg-[#F1F1F1] pt-20 pb-20">
        <div class="title pt-2">
            <h1 class="text-xl text-black md:text-5xl text-center tracking-wide font-semibold">Powerful event organizer</h1>
        </div>
        <div class="sub-title pt-3">
            <p class="mx-5 p-3 text-center text-[#616161] md:text-left tracking-wider text-lg font-light">Empower your events with seamless organization and efficient scheduling <br> tools for any occasion.</p>
        </div>
        <div class="grid grid-cols-2 gap-11 p-12">
            <div class="bg-gray-50 w-[485px] h-[250px] p-4 rounded-2xl drop-shadow-lg flex justify-center items-start flex-col">
                <h3 class="text-base text-[#0076CB] md:text-3xl text-left tracking-wide font-normal">Group Management</h3>
                <p class="pt-3 text-left text-[#616161] w-[350px] md:text-left tracking-wide font-light">Easily add and manage groups to streamline coordination and communication for large teams or attendee lists.</p>
            </div>
            <div class="bg-gray-50 w-[485px] h-[250px] p-4 rounded-2xl drop-shadow-lg flex justify-center items-start flex-col">
                <h3 class="text-base text-[#0076CB] md:text-3xl text-left tracking-wide font-normal">User-Friendly Interface</h3>
                <p class="pt-3 text-left text-[#616161] w-[350px] md:text-left tracking-wide font-light">Intuitive design ensures effortless event scheduling for all users, regardless of technical expertise.</p>
            </div>
            <div class="bg-gray-50 w-[485px] h-[250px] p-4 rounded-2xl drop-shadow-lg flex justify-center items-start flex-col">
                <h3 class="text-base text-[#0076CB] md:text-3xl text-left tracking-wide font-normal">User-Friendly Interface</h3>
                <p class="pt-3 text-left text-[#616161] w-[350px] md:text-left tracking-wide font-light">Intuitive design ensures effortless event scheduling for all users, regardless of technical expertise.</p>
            </div>
            <div class="bg-gray-50 w-[485px] h-[250px] p-4 rounded-2xl drop-shadow-lg flex justify-center items-start flex-col">
                <h3 class="text-base text-[#0076CB] md:text-3xl text-left tracking-wide font-normal">Group Management</h3>
                <p class="pt-3 text-left text-[#616161] w-[350px] md:text-left tracking-wide font-light">Easily add and manage groups to streamline coordination and communication for large teams or attendee lists.</p>
            </div>
        </div>
    </div>
    <!-- ABOUT -->
    <div class="flex justify-center items-center flex-col p-14">
        <div class="title pt-8">
            <h1 class="text-xl text-black md:text-5xl text-center tracking-wide font-semibold">About</h1>
        </div>
        <div class="sub-title flex justify-between items-center flex-row pt-4">
            <div class="img-about">
                <img class="w-[490px] h-[382px]" src="./public/assets/calender.png" alt="">
            </div>
            <div class="about pt-3 pr-3 pb-3 pl-0">
                <p class="text-left text-lg w-[440px] text-[#616161] md:text-left tracking-wider font-light">Introducing TeamUp, a dynamic platform enhancing classroom collaboration. Students can share assignments, discuss topics, and support each other academically. Real-time updates on deadlines and events keep everyone informed. With intuitive features like event calendars and group project management, TeamUp ensures seamless academic organization. Stay connected and informed with TeamUp, where learning thrives through teamwork.</p>
            </div>
        </div>
    </div>
    <!--============ end: MAIN CONTENT ============-->

    <!--============ start: FOOTER SECTION ============-->
    <hr>
    <div class="footer flex justify-center items-center flex-row p-3">
        <p class="text-center text-base font-medium pr-1" title="All rights reserved.">© 2024</p> 
        <p class="text-center text-base font-semibold hover:text-red-500"> Dakode</p>
        <p class="text-center text-base font-medium pl-1 pr-1 pb-1">|</p>
        <p class="text-center text-base font-medium hover:text-blue-500">Universitas Komputer Indonesia</p>
    </div>
    <!--============ end: FOOTER SECTION ============-->

    <!-- custom js file link -->
    <script src="./public/js/script.js"></script>
    <!-- bootstrap cdn js link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>