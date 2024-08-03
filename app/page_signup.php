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
    <!-- bootstrap cdn css link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.min.css"> -->
</head>
<body>
    <section class="main-content max-h-screen">
        <!--============ start: HEADER ============-->
        <div class="navbar flex justify-between items-center p-4 mx-10">
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
                    <img class="h-10 w-26 md:h-12 md:w-28" src="../public/assets/logo-teamUp.png" alt="TeamUp">
                </div>
            </div>
            <div class="signin-btn md:order-3 text-center flex justify-center items-center">
                <!-- NAVBAR MENU -->
                <div class="features absolute inset-0 md:flex md:mx-8 md:space-x-8 -translate-x-96 md:translate-x-0 bg-gray-200 w-fit md:w-auto md:bg-white md:static hidden">
                    <div><a class="decoration-0 no-underline text-[#000]" href="../index.php">Home</a></div>
                    <div><a class="decoration-0 no-underline text-[#000]" href="">Calendar</a></div>
                    <div><a class="decoration-0 no-underline text-[#000]" href="">Group</a></div>
                    <div><a class="decoration-0 no-underline text-[#000]" href="">Contact</a></div>
                    <div><a class="decoration-0 no-underline text-[#000]" href="">Feedback</a></div>
                </div>

                <!-- SIGN IN -->
                <!-- <div>
                    <button type="button" class="bg-[#007ABF] hover:bg-[#3286DA] text-blue-50 hover:text-slate-100 font-medium py-2 px-4 rounded">
                        <a class="decoration-0 no-underline text-white" href="./template/module/signin.php">
                            Sign In
                        </a>
                    </button>
                </div> -->
            </div>
        </div>
        <!-- <hr> -->
        <!--============ end: HEADER ============-->

        <!--============ start: MAIN CONTENT ============-->
        <div class="flex justify-center items-center h-full flex-col pt-8">
            <form method="POST" action="./module/auth-signup.php" class="bg-white p-5 rounded w-full md:w-1/3">

                <h1 class="text-4xl font-semibold mb-2 text-center">Create an account</h1>
                <h4 class="text-2xl font-normal mb-6 text-center text-gray-500">To get started, please sign up</h4>

                <div class="mb-4 pt-10">
                    <label for="name" class="block mb-2 text-lg font-normal tracking-wide text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="block w-full px-3 py-3 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none" placeholder="Enter your name">
                </div>
                
                <!-- <div class="mb-4 pt-10">
                    <label for="username" class="block mb-2 text-lg font-normal tracking-wide text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="block w-full px-3 py-3 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none" placeholder="Enter your username">
                </div> -->

                <div class="mb-4">
                    <label for="email" class="block mb-2 text-lg font-normal tracking-wide text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="block w-full px-3 py-3 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none" placeholder="Enter your email">
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-lg font-normal tracking-wide text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="block w-full px-3 py-3 rounded-lg border bg-[#F5F7FA] border-gray-100 placeholder:font-light placeholder:tracking-wide focus:outline-none focus:ring-blue-400 focus:border-blue-400 shadow-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none" placeholder="Enter your password">
                </div>

                <button type="submit" class="w-full px-4 py-3.5 rounded-xl bg-[#007ABF] text-white text-xl font-normal tracking-wider shadow-sm hover:bg-[#1E98F0]">Sign up</button>
            </form>
            
            <div class="flex flex-row space-x-6 items-center px-6 pt-2 pb-2">
                <!-- line separate -->
                <div class="w-[132px] bg-gray-200 h-0.5 rounded-full my-4"></div>
                <div class="">
                    <p class="font-normal text-gray-400">or</p>
                </div>
                <div class="w-[132px] bg-gray-200 h-0.5 rounded-full my-4"></div>
            </div>

            <div class="flex flex-row space-x-6 items-center p-0">
                <!-- google button -->
                <div title="Continue with Google" class="w-[52px] y-[50px] border-2 border-gray-300 rounded-full my-4 hover:bg-gray-200 hover:drop-shadow-md cursor-pointer">
                    <img class="p-2 md:h-12 md:w-28" src="../public/assets/google-icon.png" alt="google-icon-logo">
                </div>
                <!-- facebook button -->
                <div title="Continue with Facebook" class="w-[52px] y-[50px] border-2 border-gray-300 rounded-full my-4 hover:bg-gray-200 hover:drop-shadow-md cursor-pointer">
                    <img class="p-3 md:h-12 md:w-28" src="../public/assets/fb-icon.png" alt="facebook-icon-logo">
                </div>
            </div>

            <div class="flex flex-row p-4 pb-[168px]">
                <div class=""><p class="pr-1 tracking-wide text-gray-600 font-light">Already have an account?</p></div>
                <div class="">
                    <a href="./page_signin.php" class="tracking-wide font-medium text-gray-600 hover:text-blue-500">Sign in</a>
                </div>
            </div>
        </div>
        <!--============ end: MAIN CONTENT ============-->
        
        <!--============ start: FOOTER SECTION ============-->
        <!-- <hr>
        <div class="footer flex justify-center items-center flex-row p-3">
            <p class="text-center text-base font-medium pr-1">© 2024</p> 
            <p class="text-center text-base font-semibold hover:text-red-500"> Dakode</p>
            <p class="text-center text-base font-medium pr-1">,</p>
            <p class="text-center text-base font-medium hover:text-blue-500">Universitas Komputer Indonesia</p>
        </div>
        <hr> -->
        <!--============ end: FOOTER SECTION ============-->
    </section>

    <!-- custom js file link -->
    <script src="../public/js/script.js"></script>
</body>
</html>