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
    
    <!-- tailwind cdn link -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    
    <!-- bootstrap icon cdn link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .tab-content {
            display: none;
            transition: opacity 0.3s ease-in-out;
        }
        .tab-content.active {
            display: block;
            opacity: 1;
        }
        .main-null-content {
            background-image: url('../public/assets/bg-ifnull.jpg');
        }
    </style>
</head>
<body class="bg-gray-200">
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
                <a href="./page_dashboard.php">
                    <span class="text-[15px] ml-4 text-gray-600">Home</span>
                </a>
            </div>

            <!-- schedule -->
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-transparent hover:bg-[#D0DEE8] text-gray-600">
                <i class="bi bi-calendar-week"></i>
                <a href="./page_schedule.php">
                    <span class="text-[15px] ml-4 text-gray-600">Schedule</span>
                </a>
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
            <!-- <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white font-medium tracking-wider">
                <i class="bi bi-box-arrow-right"></i>
                <span class="text-[15px] ml-4 text-gray-200"><a href="./module/auth-logout.php">Logout</a></span>
            </div> -->
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
                        <span class="text-[15px] ml-3 text-red-600"><a href="./module/auth-logout.php">Log out</a></span>
                    </li>
                </ul>
            </div>
            <div class="flex flex-row pl-2 pr-3 pt-3 pb-3 mt-3 items-center border-t-2 border-gray-300 rounded-b-xl bg-white hover:bg-gray-100">
                <div class="flex flex-row">
                    <img src="../public/assets/main-profile.jpg" alt="foto profile" class="w-10 h-10 rounded-full border cursor-pointer hover:drop-shadow-md hover:shadow-gray-200">
                    <div class="flex justify-between items-start w-52 ml-4 flex-col">
                        <h4 class="font-semibold cursor-pointer hover:drop-shadow-md hover:shadow-gray-100"><?= $_SESSION['name']?></h4>
                        <span class="text-xs text-gray-600 cursor-pointer hover:drop-shadow-md hover:shadow-gray-100"><?= $_SESSION['email']?></span>
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
    <section class="main-null-content w-[calc(100%-280px)] ml-[280px] min-h-screen flex flex-row bg-gray-200 justify-center items-center">
        <div class="prompt-join-group relative z-0 flex justify-center items-center h-screen w-full">
            <div class="absolute inset-0 bg-gray-200 opacity-90"></div>
            <!-- <div class="w-[calc(100%-50%)] h-[calc(100%-30%)] bg-white rounded-2xl flex justify-start items-start">
                <h1 class="text-red-300 font-bold w-full">test view when group is NULL</h1>
            </div> -->
            
            <!-- CONTENT -->
            <div class="max-w-4xl relative z-10 mx-auto p-6 bg-white shadow-md mt-10 w-[calc(100%-50%)] h-[calc(100%-30%)] rounded-2xl">
                <div class="flex justify-between border-b w-full">
                    <button class="tab-link px-4 py-4 w-full rounded-t-2xl text-xl font-bold tracking-wide bg-[#0076CB] text-white" data-tab="join-group">Join group</button>
                    <button class="tab-link px-4 py-4 w-full rounded-t-2xl text-xl font-bold tracking-wide text-gray-700" data-tab="create-group">Create group</button>
                </div>

                <!-- JOIN TAB -->
                <div id="join-group" class="tab-content active p-6">
                    <!-- join group content -->
                    <img src="../public/assets/join-group.png" alt="" class="w-full h-64">
                    <h2 class="text-lg font-medium mt-4">Join group instead into Team Community</h2>
                    <ul class="list-disc pl-0 pt-3 text-base">
                        To join a group, make sure you have the group code you are going to. Enter the group code you have in the column provided and click the "Join group" button. If you do not have a group code, you can create a new group by clicking the "Create group" button.
                    </ul>

                    <!-- FORM JOIN GROUP -->
                    <div class="btn-form relative flex overflow-hidden bg-white rounded-lg sm:py12 pt-10 z-10">

                        <!-- modal trigger -->
                        <label for="form-join" class="cursor-pointer rounded-lg bg-white border hover:bg-[#FFC700] font-medium text-black hover:text-white active:bg-slate-400 px-12 py-4 tracking-widest">
                            Join now!
                        </label>

                        <!-- hidden toggle -->
                        <input type="checkbox" id="form-join" class="peer fixed appearance-none opacity-0">

                        <!-- form modal -->
                        <label for="form-join" class="pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100" id="form-schedule">
                            <!-- modal box -->
                            <label for="" class="max-h-[calc(100vh - 5em)] h-fit max-w-lg scale-90 overflow-y-auto overscroll-contain rounded-md bg-white p-4 text-black shadow-2xl transition">

                                <!-- start: Form input Join -->
                                <form method="POST" action="./module/find_group.php" class="bg-white p-2 rounded w-[470px]" id="schedule-form">
                                    <input type="hidden" name="id" value="">
                                    
                                    <h1 class="text-xl font-semibold mb-1 text-center tracking-wider">Let's go find the group!</h1>
                                    <h4 class="text-base font-normal mb-2 text-center text-gray-500">To get started, please complate form</h4>

                                    <div class="mb-4 pt-4">
                                        <label for="name_group" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Group Name</label>
                                        <input type="text" id="name_group" name="name_group" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your group name" required>
                                    </div>

                                    <div class="mb-4 pt-0">
                                        <label for="code_group" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Code Group</label>
                                        <input type="text" id="code_group" name="code_group" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your unique code group" required>
                                    </div>
                                        
                                    <div class="mb-6 pt-0">
                                        <label for="lock_code" class="block mb-2 text-base font-medium tracking-wide text-gray-700 flex-row">Lock Code *</label>
                                        <input type="text" id="lock_code" name="lock_code" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your password group code if required">
                                    </div>

                                    <hr class="my-4 text-gray-800">

                                    <button type="submit" class="w-full px-4 py-3 rounded-lg bg-[#007ABF] text-white text-lg font-medium tracking-wider shadow-sm mt-2 hover:bg-[#1E98F0]">Find and join group</button>
                                </form>
                                <!-- end: Form input event -->

                            </label>
                        </label>
                    </div>
                </div>

                <!-- CREATE TAB -->
                <div id="create-group" class="tab-content p-6">
                    <!-- create group content -->
                    <img src="../public/assets/join-group.png" alt="" class="w-full h-64">
                    <h2 class="text-lg font-medium mt-4">Create group for your Team Community</h2>
                    <ul class="list-disc pl-0 pt-3 text-base">
                        You can create a new group by clicking the "Create Group" button. This process is very easy and fast. By creating a new group, you will become the group admin and have full control over the management of the group. You can invite new members, set member roles, and manage activities in the group. Make sure to share the generated group code with the people you want to invite, so they can easily join and start participating in group activities.
                    </ul>

                    <!-- FORM CREATE GROUP -->
                    <div class="btn-form relative flex overflow-hidden bg-white rounded-lg sm:py12 pt-10 z-10">

                        <!-- modal trigger -->
                        <label for="form-create" class="cursor-pointer rounded-lg bg-white border hover:bg-[#4CCD99] font-medium text-black hover:text-white active:bg-slate-400 px-12 py-4 tracking-widest">
                            Create one!
                        </label>

                        <!-- hidden toggle -->
                        <input type="checkbox" id="form-create" class="peer fixed appearance-none opacity-0">

                        <!-- form modal -->
                        <label for="form-create" class="pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100" id="form-schedule">
                            <!-- modal box -->
                            <label for="" class="max-h-[calc(100vh - 5em)] h-fit max-w-lg scale-90 overflow-y-auto overscroll-contain rounded-md bg-white p-4 text-black shadow-2xl transition">

                                <!-- start: Form input Join -->
                                <form action="./module/save_group.php" method="POST" class="bg-white p-2 rounded w-[470px]" id="group-form">
                                    <!-- <input type="hidden" name="id" value=""> -->
                                    
                                    <h1 class="text-xl font-semibold mb-1 text-center tracking-wider">Let's go create one group!</h1>
                                    <h4 class="text-base font-normal mb-2 text-center text-gray-500">To get started, please complate form</h4>

                                    <div class="mb-4 pt-4">
                                        <label for="name_group" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Group Name</label>
                                        <input type="text" id="name_group" name="name_group" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your group name" required>
                                    </div>

                                    <div class="mb-4 pt-0">
                                        <label for="code_group" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Code Group</label>
                                        <input type="text" id="code_group" name="code_group" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your unique code group" required>
                                    </div>

                                    <div class="mb-0">
                                        <label for="description_group" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Description Group</label>
                                        <textarea class="bg-[#F5F7FA] border-gray-100 px-3 py-2 h-32 rounded-lg border w-full focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" name="description_group" id="description_group" required></textarea>
                                    </div>

                                    <div class="mb-4 pt-2">
                                        <label for="is_lock" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Secure Group</label>
                                        <div class="ml-3">
                                            <input type="radio" id="private" name="is_lock" value="1" class="mr-3 cursor-pointer">
                                            <label for="private" class="tracking-wide hover:drop-shadow-md">Private group</label><br>
                                            <input type="radio" id="anyone" name="is_lock" value="0" class="mt-2 mr-3 cursor-pointer" checked>
                                            <label for="anyone" class="tracking-wide hover:drop-shadow-md">Anyone can join</label><br>
                                        </div>
                                    </div>

                                    <!-- Placeholder for the new input -->
                                    <div id="privateCodeInput" class="hidden mb-5">
                                        <label for="lock_code" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Private Code</label>
                                        <input type="text" id="lock_code" name="lock_code" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your password code group">
                                    </div>

                                    <hr class="my-4 text-gray-800">

                                    <button type="submit" class="w-full px-4 py-3 rounded-lg bg-[#007ABF] text-white text-lg font-medium tracking-wider shadow-sm mt-2 hover:bg-[#1E98F0]">Save group</button>
                                </form>
                                <!-- end: Form input event -->

                            </label>
                        </label>
                    </div>
                </div>

            </div>
    
        </div>

    </section>
    <!--========== end: MAIN CONTENT ==========-->

<?php 
    }
?>
    <!-- custom js file link -->
    <script src="../public/js/dashboard.js" type="text/javascript"></script>
</body>
</html>