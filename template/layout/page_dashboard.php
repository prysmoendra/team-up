<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamUp: Community Dashboard</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../../public/css/style.css">
    <!-- boxicons link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- tailwind cdn link -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- bootstrap cdn link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css"> -->
</head>
<?php
	session_start();

	if (isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email'])) {
		$id = $_SESSION['id'];
?>
    <!-- <h1>Welcome to dashboard <#?= $_SESSION['name']?>!</h1> -->
<body class="bg-gray-200">
    <!--===== SIDEBAR =====-->
    <div class="main-sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[275px] overflow-y-auto text-center bg-gray-500">
        <div class="text-gray-100 text-xl">
            <div class="p-2 5 mt-1 flex items-center">
                <i class="bi bi-app-indicator px-2 py-1 bg-blue-600 rounded-md"></i>
                <h1 class="font-bold text-gray-200 text-[15px] ml-3">TeamUp</h1>
                <i class="bi bi-x ml-20 cursor-pointer lg:hidden"></i>
            </div>
            <hr class="my-2 text-gray-600">
        </div>
        <div class="p-2 5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
            <i class="bi bi-search text-sm"></i>
            <input type="text" placeholder="Search menu" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none">
        </div>

        <div class="p-2 5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200">Home</span>
        </div>
        <div class="p-2 5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200">Schedule</span>
        </div>

        <hr class="my-4 text-gray-600">

        <div class="p-2 5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white" onclick="dropdownMenu()">
            <i class="bi bi-house-door-fill"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200">Manage</span>
                <span id="arrow_list" class="text-sm rotate-180"></span>
                <i class="bi bi-chevron-down"></i>
            </div>
        </div>

        <div id="list_submenu" class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200">
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">People</h1>
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Social</h1>
            <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Personal</h1>
        </div>

        <div class="p-2 5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200">Logout</span>
        </div>

    </div>
<?php 
    }
?>
    
    <!-- custom js file link -->
    <script src="../../public/js/script.js" type="text/javascript">
        var arrow_list = document.getElementById('arrow_list');
        var list_submenu = document.getElementById('list_submenu');

        function dropdownMenu() {
            arrow_list.classList.toggle('rotate-0');
            list_submenu.classList.toggle('hidden');
        }
    </script>
</body>

</html>