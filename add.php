<?php
include_once 'config.php';

if (isset($_POST['submit']))
    {
        $id = $_POST['student_id'];
        $last_name =  $_POST['last_name'];
        $given_name = $_POST['given_name'];
        $middle_initial = $_POST['middle_initial'];
        $course = $_POST['course'];
        $year_level = $_POST['year_level'];
        $email = $_POST['email'];

        $sql = "INSERT INTO tbl_students (student_id, last_name, given_name, middle_initial, course, year_level, email)
        VALUES ('$id', '$last_name', '$given_name', '$middle_initial', '$course', '$year_level', '$email')";
        $result = mysqli_query($conn, $sql);

        header("Location: students.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en" style="font-family: 'Google Sans', sans-serif;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quattrocento:wght@400;700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Student | Student Information System</title>
</head>
<body class="flex min-h-screen flex-col lg:flex-row">
    <aside class="lg:w-[310px] shadow-xl">
        <nav class="flex justify-between h-screen flex-col">
            <div class="px-5 py-5 border-b-2 border-black">
                <h1 class="text-lg font-bold">Student Information System</h1>
            </div>

            <div class="mt-10">
                <ul class="flex flex-col gap-5">
                    <li class="flex items-center transition-all duration-300 lg:hover:bg-gray-200"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="dashboard.php"><i class="fa fa-house text-lg mr-2"></i>Dashboard</a></li>
                    <li class="flex items-center transition-all duration-300 lg:hover:bg-gray-200"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="students.php"><i class="fa fa-users text-lg mr-2"></i>Students</a></li>
                    <li class="flex items-center bg-gray-200"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="add.php"><i class="fa fa-add text-lg mr-2"></i>Add Student</a></li>
                    <li class="flex items-center transition-all duration-300 lg:hover:bg-gray-200"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="profile.php"><i class="fa fa-user text-lg mr-2text-lg mr-2"></i>Profile</a></li>
                </ul>
            </div>

            <div class="mt-auto py-2 border-t-2 border-black">
                <li class="flex items-center mt-auto transition-all duration-300 lg:hover:bg-gray-200"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4 mx-auto" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket text-lg mr-2 text-red-600"></i>Logout</a></li>
            </div>
        </nav>
    </aside>

    <main class="flex-1 min-h-screen p-5">
        <div class="min-h-screen flex items-center justify-center w-full">
            <form class="bg-white shadow-xl rounded-lg w-full max-w-3xl py-3 " method="POST">
                <div class="text-center bg-black rounded-t-lg py-4 w-full">
                    <h1 class="text-xl text-white font-semibold tracking-wide">Student Information System</h1>
                </div>
                
                <div class="px-4 mt-10">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="relative">
                            <i class="absolute top-[7px] left-2 fa-regular fa-id-badge text-xl"></i>
                            <input class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" type="text" name="student_id" placeholder="Student ID" required>
                        </div>

                        <div class="relative">
                            <i class="absolute top-[7px] left-2 fa fa-user text-xl"></i>
                            <input class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" type="text" name="last_name" placeholder="Last Name" required>
                        </div>

                        <div class="relative">
                            <i class="absolute top-[7px] left-2 fa fa-user text-xl"></i>
                            <input class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" type="text" name="given_name" placeholder="Given Name" required>
                        </div>

                        <div class="relative">
                            <i class="absolute top-[7px] left-2 fa fa-user text-xl"></i>
                            <input class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" type="text" name="middle_initial" placeholder="Middle Initial" required>
                        </div>

                        <div class="relative">
                            <i class="absolute top-[7px] left-2 fa-solid fa-graduation-cap text-xl"></i>
                            <input class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" type="text" name="course" placeholder="Course" required>
                        </div>

                        <div class="relative">
                            <i class="absolute top-[7px] left-2 fa-solid fa-layer-group text-xl"></i>
                            <select class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" name="year_level" id="">
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                        </div>

                        <div class="relative">
                            <i class="absolute top-[7px] left-2 fa fa-envelope text-xl"></i>
                            <input class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" type="text" name="email" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="mt-8">
                        <input class="border-2 border-black text-black transition-all duration-300 lg:hover:bg-black lg:hover:text-white cursor-pointer py-2 px-5 w-full rounded-lg" type="submit" name="submit" value="Add Student">
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>