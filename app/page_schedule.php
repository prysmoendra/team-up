<?php
    require_once('./module/db-connect.php');
    session_start();
    
    if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email'])) {
        $id = $_SESSION['id'];
?>
<!-- <h1>Welcome to dashboard <#?= $_SESSION['name']?>!</h1> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamUp: Community Dashboard</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../public/css/style.css">

    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    
    <!-- tailwind cdn link -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    
    <!-- bootstrap icon cdn link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-white">
    <!--========== start: SIDEBAR ==========-->
    <section class="main-sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[280px] h-full overflow-y-auto text-center bg-[#F3F5F5] shadow-md shadow-gray-500 rounded-r-2xl flex flex-col border-r-2 justify-between">
        <div class="flex flex-col w-full">
            <!-- your group -->
            <div class="text-gray-100 text-xl">
                <!-- <div class="p-2.5 mt-1 flex items-center">
                    <i class="bi bi-app-indicator px-2 py-1 bg-blue-600 rounded-md"></i>
                    <h1 class="font-bold text-gray-700 text-[15px] ml-3">Uranus</h1>
                    <i class="bi bi-x ml-20 cursor-pointer lg:hidden"></i>
                </div> -->
    
                <div class="p-2.5 mt-2 mb-4 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-[#0076CB] hover:bg-[#D0DEE8] text-gray-200 hover:text-gray-600" onclick="dropdownGroup()">
                    <i class="bi bi-collection-fill"></i>
                    <div class="flex justify-between w-full items-center hover:text-gray-600">
                        <span class="text-[15px] ml-4 font-semibold">Your Group</span>
                        <span id="list_group" class="text-sm rotate-180">
                            <i class="bi bi-chevron-up"></i>
                        </span>
                    </div>
                </div>
    
                <div id="submenu_group" class="text-left text-sm font-normal mt-2 w-4/5 mx-auto text-gray-700">
                    <h1 class="cursor-pointer p-2 bg-gray-200 hover:bg-[#D0DEE8] rounded-md mt-1">
                        <i class="bi bi-plus-square pr-2 pl-1"></i>
                        Add new group
                    </h1>
                    <h1 class="cursor-pointer p-2 hover:bg-[#D0DEE8] rounded-md mt-1">
                        <i class="bi bi-people-fill pr-2 pl-1"></i>
                        Informatika Squad
                    </h1>
                    <h1 class="cursor-pointer p-2 hover:bg-[#D0DEE8] rounded-md mt-1">
                        <i class="bi bi-microsoft-teams pr-2 pl-1"></i>
                        Badminton UNIKOM
                    </h1>
                </div>
                
                <hr class="my-2 text-gray-600">
            </div>

            <!-- home -->
            <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-transparent hover:bg-[#D0DEE8] text-gray-600">
                <i class="bi bi-house-door-fill"></i>
                <span class="text-[15px] ml-4 text-gray-600">Home</span>
            </div>

            <!-- schedule -->
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-transparent hover:bg-[#D0DEE8] text-gray-600">
                <i class="bi bi-calendar2-event"></i>
                <span class="text-[15px] ml-4 text-gray-600">Schedule</span>
            </div>

            <hr class="my-4 text-gray-600">
            
            <!-- manage -->
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-transparent hover:bg-[#D0DEE8] text-gray-600" onclick="dropdownMenu()">
                <i class="bi bi-kanban"></i>
                <div class="flex justify-between w-full items-center">
                    <span class="text-[15px] ml-4 text-gray-600">Manage</span>
                    <span id="arrow_list" class="text-sm rotate-180">
                        <i class="bi bi-chevron-up"></i>
                    </span>
                </div>
            </div>
            <div id="list_submenu" class="text-left text-sm font-normal mt-2 w-4/5 mx-auto text-gray-700">
                <h1 class="cursor-pointer p-2 hover:bg-[#D0DEE8] rounded-md mt-1">
                    <i class="bi bi-people-fill pr-2 pl-1"></i>
                    People
                </h1>
                <h1 class="cursor-pointer p-2 hover:bg-[#D0DEE8] rounded-md mt-1">
                    <i class="bi bi-microsoft-teams pr-2 pl-1"></i>
                    Social
                </h1>
                <h1 class="cursor-pointer p-2 hover:bg-[#D0DEE8] rounded-md mt-1">
                    <i class="bi bi-person-square pr-2 pl-1"></i>
                    Personal
                </h1>
            </div>

            <!-- logout -->
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white font-medium tracking-wider">
                <i class="bi bi-box-arrow-right"></i>
                <span class="text-[15px] ml-4 text-gray-200"><a href="./module/auth-logout.php">Logout</a></span>
            </div>
        </div>

        <!-- profile -->
        <div class="profile-menu flex flex-col items-center overflow-visible relative">
            <div class="floating-menu p-1.5 flex justify-start items-start absolute -top-32 border border-gray-300 rounded-lg duration-300 cursor-pointer bg-white text-white font-medium tracking-wider shadow-2xl" id="more_option">
                <ul class="list-floating-menu p-2">
                    <li class="flex justify-start items-start hover:bg-[#D0DEE8] rounded-md px-2 py-2">
                        <i class="bi bi-sliders2 text-gray-600"></i>
                        <span class="text-[15px] ml-3 text-gray-600">Profile setting</span>
                    </li>
                    <li class="flex justify-start items-start hover:bg-[#D0DEE8] rounded-md px-2 py-2">
                        <i class="bi bi-person-fill-add text-gray-600"></i>
                        <span class="text-[15px] ml-3 text-gray-600">Create another account</span>
                    </li>
                    <li class="flex justify-start items-start hover:bg-[#D0DEE8] rounded-md px-2 py-2">
                        <i class="bi bi-box-arrow-left text-red-600"></i>
                        <span class="text-[15px] ml-3 text-red-600">Log out</span>
                    </li>
                </ul>
            </div>
            <div class="flex flex-row pl-2 pr-3 pt-3 pb-3 mt-3 items-center border-t-2 border-gray-300 rounded-b-xl bg-white hover:bg-gray-100">
                <div class="flex flex-row">
                    <img src="../public/assets/profile.png" alt="foto profile" class="w-10 h-10 rounded-full border cursor-pointer hover:drop-shadow-md hover:shadow-gray-200">
                    <div class="flex justify-between items-start w-52 ml-4 flex-col">
                        <h4 class="font-semibold cursor-pointer hover:drop-shadow-md hover:shadow-gray-100">Mas Krismo</h4>
                        <span class="text-xs text-gray-600 cursor-pointer hover:drop-shadow-md hover:shadow-gray-100">kangmas@gmail.com</span>
                    </div>
                </div>
                <div class="flex justify-center items-center cursor-pointer w-4 h-full" onclick="optionProfile()">
                    <label for="tw-modal" class="cursor-pointer rounded px-2 py-1 active:bg-slate-400 hover:bg-gray-300">
                        <i class="bi bi-three-dots hover:drop-shadow-md hover:shadow-gray-100 cursor-pointer"></i>
                    </label>
                </div>
            </div>
        </div>

    </section>
    <!--========== end: SIDEBAR ==========-->
    
    <!--========== start: MAIN CONTENT ==========-->
    <section class="main-content w-[calc(100%-280px)] ml-[280px] min-h-screen">
        <!-- modal -->
        <!-- <div class="btn-form relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-gray-50 py-6 sm:py12"> -->
        <div class="btn-form relative flex overflow-hidden bg-gray-50 py-4 sm:py12">
            <!-- modal trigger -->
            <label for="form-modal" class="cursor-pointer rounded-lg bg-[#0076CB] px-5 py-3 text-white active:bg-slate-400">
                <i class="bi bi-plus-lg"></i>
                Add Event
            </label>
            
            <!-- hidden toggle -->
            <input type="checkbox" id="form-modal" class="peer fixed appearance-none opacity-0">
            <!-- form modal -->
            <label for="form-modal" class="pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">
                <!-- modal box -->
                <label for="" class="max-h-[calc(100vh - 5em)] h-fit max-w-lg scale-90 overflow-y-auto overscroll-contain rounded-md bg-white p-4 text-black shadow-2xl transition">
                    <!-- start: Form input event -->
                    <form method="POST" action="./module/save_schedule.php" class="bg-white m-2 rounded w-[470px]">
                        <h1 class="text-xl font-semibold mb-1 text-center tracking-wider">Schedule Form</h1>
                        <h4 class="text-base font-normal mb-2 text-center text-gray-500">To get started, please complate form</h4>

                        <div class="mb-4 pt-4">
                            <label for="text" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Title</label>
                            <input type="text" id="title" name="title" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your title" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Description</label>
                            <textarea class="bg-[#F5F7FA] border-gray-100 px-3 py-2 h-32 rounded-lg border w-full focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" name="description" id="description" required></textarea>
                        </div>

                        <div class="mb-4 flex flex-col">
                            <label for="start_datetime" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Start Datetime</label>
                            <input type="datetime-local" class="bg-[#F5F7FA] border-gray-100 px-3 py-2 rounded-lg border w-full focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" name="start_datetime" id="start_datetime" required>
                        </div>
                        <div class="mb-10 flex flex-col">
                            <label for="end_datetime" class="block mb-2 text-base font-medium tracking-wide text-gray-700">End Datetime</label>
                            <input type="datetime-local" class="bg-[#F5F7FA] border-gray-100 px-3 py-2 rounded-lg border w-full focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" name="end_datetime" id="end_datetime" required>
                        </div>

                        <button type="submit" class="w-full px-4 py-2 rounded-md bg-[#007ABF] text-white border text-md font-normal tracking-wider shadow-sm mb-4 hover:bg-[#1E98F0]">Save schedule</button>
                        <button type="cancel" class="w-full px-4 py-2 rounded-md bg-white text-black border text-md font-normal tracking-wider shadow-sm hover:bg-gray-200 hover:text-gray-600">Cancel</button>
                    </form>
                    <!-- end: Form input event -->
                </label>
            </label>
        </div>
    </section>
    <!--========== end: MAIN CONTENT ==========-->

<?php 
    }
?>
    <!-- custom js file link -->
    <script src="../public/js/script.js" type="text/javascript"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar')
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,list',
                },
            })
            calendar.render()
        })
    </script>

    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

</body>
</html>