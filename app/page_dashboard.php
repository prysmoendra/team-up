<?php require_once("./module/db-connect.php") ?>
<!DOCTYPE html>
<?php
    session_start();
    
    if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email'])) {
        $id = $_SESSION['id'];
?>
<!-- <h1>Welcome to dashboard <#?= $_SESSION['name']?>!</h1> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamUp: Community Dashboard</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../public/css/style.css">

    <!-- CSS for full calender -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" /> -->
    
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
                <div class="flex flex-row" onclick="optionProfile()">
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
    <section class="main-content w-[calc(100%-280px)] ml-[280px] min-h-screen flex flex-row">
        <!-- start: MID CONTENT -->
        <div class="mid-content flex flex-col h-screen w-full">

            <!-- start: TOP SECTION -->
            <div class="mid-top-content w-full h-20 bg-white flex flex-row justify-between items-center">
                <div class="flex flex-row ml-8">
                    <!-- sidebar btn -->
                    <div class="flex flex-col justify-between items-start px-3 py-2 bg-[#0076CB] hover:bg-[#D0DEE8] text-gray-200 hover:text-gray-600 rounded-full cursor-pointer border hover:drop-shadow-md">
                        <i class="bi bi-layout-sidebar-inset text-xl cursor-pointer hover:drop-shadow-md"></i>
                    </div>
                    <!-- notification -->
                    <div class="flex flex-col overflow-visible relative justify-center items-center px-3 py-2 bg-white hover:bg-[#F3F5F5] rounded-lg ml-8 cursor-pointer border hover:drop-shadow-md">
                        <i class="bi bi-bell text-xl cursor-pointer hover:drop-shadow-md"></i>
                        <!-- <span class="relative flex h-2 w-2 -top-6 -right-1">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span> -->
                        </span>
                    </div>
                    <!-- search -->
                    <div class="flex flex-row justify-center items-center rounded-lg px-2 py-1 ml-4 duration-300 cursor-pointer bg-white text-gray-600 border hover:drop-shadow-md">
                        <i class="bi bi-search text-xl cursor-pointer px-2 py-1 hover:drop-shadow-md"></i>
                        <input type="text" placeholder="Search menu" class="text-[15px] text-lg font-normal tracking-wide py-1 pr-10 ml-2 w-full bg-transparent focus:outline-none">
                    </div>
                </div>

                <!-- add new event -->
                <!-- modal -->
                <div class="btn-form relative flex overflow-hidden bg-gray-50 rounded-lg sm:py12 m-9 z-10">
                    <!-- modal trigger -->
                    <label for="form-modal" class="cursor-pointer rounded-lg bg-[#0076CB] text-white active:bg-slate-400 px-5 py-3">
                        <i class="bi bi-plus-lg mr-1"></i>
                        Add Event
                    </label>
                    
                    <!-- hidden toggle -->
                    <input type="checkbox" id="form-modal" class="peer fixed appearance-none opacity-0">
                    <!-- form modal -->
                    <label for="form-modal" class="pointer-events-none invisible fixed inset-0 flex cursor-pointer items-center justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0 transition-all duration-200 ease-in-out peer-checked:pointer-events-auto peer-checked:visible peer-checked:opacity-100 peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100" id="form-schedule">
                        <!-- modal box -->
                        <label for="" class="max-h-[calc(100vh - 5em)] h-fit max-w-lg scale-90 overflow-y-auto overscroll-contain rounded-md bg-white p-4 text-black shadow-2xl transition">
                            <!-- start: Form input event -->
                            <form method="POST" action="./module/save_schedule.php" class="bg-white p-2 rounded w-[470px]" id="schedule-form">
                                <h1 class="text-xl font-semibold mb-1 text-center tracking-wider">Schedule Form</h1>
                                <h4 class="text-base font-normal mb-2 text-center text-gray-500">To get started, please complate form</h4>

                                <div class="mb-4 pt-4">
                                    <label for="text" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Title</label>
                                    <input type="text" id="title" name="title" class="block w-full px-3 py-2 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" placeholder="Enter your title" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Description</label>
                                    <textarea class="bg-[#F5F7FA] border-gray-100 px-3 py-2 h-32 rounded-lg border w-full focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" name="description" id="description" required></textarea>
                                </div>

                                <div class="mb-4 flex flex-col">
                                    <label for="start_datetime" class="block mb-2 text-base font-medium tracking-wide text-gray-700">Start Datetime</label>
                                    <input type="datetime-local" class="bg-[#F5F7FA] border-gray-100 px-3 py-2 rounded-lg border w-full focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="mb-4 flex flex-col">
                                    <label for="end_datetime" class="block mb-2 text-base font-medium tracking-wide text-gray-700">End Datetime</label>
                                    <input type="datetime-local" class="bg-[#F5F7FA] border-gray-100 px-3 py-2 rounded-lg border w-full focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 disabled:shadow-none" name="end_datetime" id="end_datetime" required>
                                </div>

                                <hr class="my-4 text-gray-800">

                                <button type="submit" class="w-full px-4 py-3 rounded-lg bg-[#007ABF] text-white text-lg font-medium tracking-wider shadow-sm mt-2 hover:bg-[#1E98F0]">Save schedule</button>
                                <!-- <button type="cancel" class="w-full px-4 py-3 rounded-lg bg-gray-100 text-black text-lg font-medium tracking-wider shadow-sm hover:bg-gray-300 hover:text-gray-600">Cancel</button> -->
                            </form>
                            <!-- end: Form input event -->
                        </label>
                    </label>
                </div>
            </div>
            <!-- end: TOP SECTION -->

            <!-- start: MAIN SECTION -->
            <div class="mid-main-content flex flex-auto w-full h-80">

                <!-- load the Full calendar -->
                <div class="col-span-8 flex w-full border-t-2 p-4 z-0" id="calendar"></div>

            </div>
            <!-- end: MAIN SECTION -->
        </div>
        <!-- end: MID CONTENT -->

        <!-- start: RIGHT CONTENT -->
        <div class="right-content bg-white h-screen w-full max-w-[400px] ml-3 border-l-2 drop-shadow-xl overflow-y-auto inset-0 hidden opacity-0" id="event-details-modal">
            <div class="flex flex-col items-start justify-start m-2">

                <div class="flex flex-col justify-between w-full">

                    <!-- event details -->
                    <div class="flex flex-row justify-between items-start border-b-2">
                        <h1 class="text-2xl font-semibold text-center tracking-wider text-[#165A81] m-3">Event Details</h1>
                        <!-- <i class="bi bi-three-dots-vertical text-2xl py-3 px-2 hover:bg-gray-400" id="three-dots" onclick=""></i> -->
                    </div>
                    
                    <!-- more option button -->
                    <!-- <div class="bg-white flex flex-row justify-end invisible " id="event-detail" onclick="eventDetail()">
                        <div class="bg-white flex flex-col justify-end w-fit absolute rounded-lg p-1.5 border drop-shadow-md shadow-md border-gray-300 duration-300 cursor-pointer font-medium tracking-wider">
                            <ul class="list-floating-menu p-2">
                                    <li class="flex justify-start items-center hover:bg-[#D0DEE8] rounded-md px-2 py-2">
                                        <i class="bi bi-sliders2 text-gray-600"></i>
                                        <span class="text-[15px] ml-3 text-gray-600">Profile setting</span>
                                    </li>
                                    <li class="flex justify-start items-center hover:bg-[#D0DEE8] rounded-md px-2 py-2">
                                        <i class="bi bi-person-fill-add text-gray-600"></i>
                                        <span class="text-[15px] ml-3 text-gray-600">Create another account</span>
                                    </li>
                                    <li class="flex justify-start items-center hover:bg-[#D0DEE8] rounded-md px-2 py-2">
                                        <i class="bi bi-box-arrow-left text-red-600"></i>
                                        <span class="text-[15px] ml-3 text-red-600">Log out</span>
                                    </li>
                                </ul>
                        </div>
                    </div> -->
                </div>
                <div class="modal-body bg-white flex justify-start items-start max-w-[400px]] w-full py-4 flex-col" id="info-event">
                    <dl class="w-full">
                        <div class="p-2 ml-2">
                            <dt class="pb-1 font-normal text-sm tracking-wide text-[#165A81]">Title</dt>
                            <dd id="title" class="font-semibold text-3xl text-gray-700"></dd>
                        </div>
    
                        <div class="p-2 ml-2">
                            <dt class="pb-1 font-normal text-sm tracking-wide text-[#165A81]">Description</dt>
                            <dd id="description" class="font-medium text-base text-gray-700"></dd>
                        </div>
    
                        <div class="p-2 ml-2">
                            <dt class="pb-1 font-normal text-sm tracking-wide text-[#165A81]">Start from</dt>
                            <dd id="start" class="font-medium text-base text-gray-700"></dd>
                        </div>
    
                        <div class="p-2 ml-2 mb-4">
                            <dt class="pb-1 font-normal text-sm tracking-wide text-[#165A81]">Deadline</dt>
                            <dd id="end" class="font-medium text-base text-gray-700"></dd>
                        </div>
                    </dl>
                    <div class="p-4 border-t flex justify-center items-center w-full sticky top-0">
                        <button type="button" id="edit" class="bg-[#0076CB] text-white cursor-pointer py-2 rounded hover:drop-shadow-md mr-3" data-id="">
                            <label for="form-modal" class="active:bg-slate-400 cursor-pointer w-full px-4 py-2">
                                Edit
                            </label>
                        </button>

                        <button type="button" id="delete" class="bg-red-500 text-white px-4 py-2 rounded hover:drop-shadow-md mr-3" data-id="">Delete</button>

                        <button type="button" id="closeModalButtonFooter" class="bg-gray-500 text-white px-4 py-2 rounded hover:drop-shadow-md" onclick="hideModal()">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Event Details Modal -->
        <!-- <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden"></div>

        <div id="event-details-modal" class="fixed inset-0 items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg w-1/3">
                <div class="p-4 border-b flex justify-between items-center">
                    <h5 class="text-lg font-bold">Schedule Details</h5>
                    <button type="button" id="closeModalButton" class="text-gray-500 hover:text-gray-800" onclick="hideModal()">&times;</button>
                </div>
                <div class="p-4">
                    <div class="container mx-auto">
                        <dl>
                            <dt class="text-gray-600">Title</dt>
                            <dd id="title" class="font-bold text-lg"></dd>
                            <dt class="text-gray-600">Description</dt>
                            <dd id="description" class="mt-1"></dd>
                            <dt class="text-gray-600">Start</dt>
                            <dd id="start" class="mt-1"></dd>
                            <dt class="text-gray-600">End</dt>
                            <dd id="end" class="mt-1"></dd>
                        </dl>
                    </div>
                </div>
                <div class="p-4 border-t flex justify-end">
                    <button type="button" id="edit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2" data-id="">Edit</button>
                    <button type="button" id="delete" class="bg-red-500 text-white px-4 py-2 rounded mr-2" data-id="">Delete</button>
                    <button type="button" id="closeModalButtonFooter" class="bg-gray-500 text-white px-4 py-2 rounded" onclick="hideModal()">Close</button>
                </div>
            </div>
        </div> -->
        <!-- end: RIGHT CONTENT -->
    </section>
    <!--========== end: MAIN CONTENT ==========-->

<?php 
    }
?>

    <!-- <script>
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
    </script> -->

    <!-- JS for jQuery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="../public/js/jquery-3.6.0.min.js"></script> -->
    
    <!-- JS for full calender -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script> -->
    <!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script> -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<?php 
    function getRandomSoftColor() {
        $softColors = [
            '#4B70F5',
            '#E68369',
            '#E3A5C7',
            '#EF5A6F',
            '#009FBD',
            '#6482AD',
            '#E1AFD1',
            '#176B87',
            '#F875AA',
            '#BF3131',
            '#00A9FF',
        ];
    
        return $softColors[array_rand($softColors)];
    }

    $schedules = $conn->query("SELECT * FROM `schedule_list`");
    $sched_res = [];
    foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
        $row['color'] = getRandomSoftColor();
        $sched_res[$row['id']] = $row;
    };
?>
</body>
<script>
    var scheds = JSON.parse('<?= json_encode($sched_res) ?>')
</script>
<!-- custom js file link -->
<script src="../public/js/script.js" type="text/javascript"></script>
<?php 
    if(isset($conn)) $conn->close();
?>
</html>