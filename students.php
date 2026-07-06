<?php
include_once 'config.php';

$sql = "SELECT * FROM tbl_students";
$result = mysqli_query($conn, $sql);
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
    <title>Students | Student Information System</title>
</head>
<body class="flex min-h-screen flex-col lg:flex-row">
    <aside class="lg:w-[310px] shadow-xl">
        <nav class="flex justify-between h-screen flex-col">
            <div class="px-5 py-5 border-b-2 border-black">
                <h1 class="text-lg font-bold">Student Information System</h1>
            </div>

            <div class="mt-10">
                <ul class="flex flex-col gap-5">
                    <li class="flex items-center transition-all duration-300 lg:hover:bg-gray-100"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="dashboard.php"><i class="fa fa-house text-lg mr-2"></i>Dashboard</a></li>
                    <li class="flex items-center bg-gray-200"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="students.php"><i class="fa fa-users text-lg mr-2"></i>Students</a></li>
                    <li class="flex items-center transition-all duration-300 lg:hover:bg-gray-100"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="add.php"><i class="fa fa-add text-lg mr-2"></i>Add Student</a></li>
                    <li class="flex items-center transition-all duration-300 lg:hover:bg-gray-100"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4" href="profile.php"><i class="fa fa-user text-lg mr-2text-lg mr-2"></i>Profile</a></li>
                </ul>
            </div>

            <div class="mt-auto py-2 border-t-2 border-black">
                <li class="flex items-center mt-auto transition-all duration-300 lg:hover:bg-gray-200"><a class="py-4 px-5 w-full text-lg font-semibold transition-all duration-300 lg:hover:translate-x-4 mx-auto" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket text-lg mr-2 text-red-600"></i>Logout</a></li>
            </div>
        </nav>
    </aside>

    <main class="flex-1 min-h-screen p-5 bg-[#EDEDED]">
        <div class="">
            <div class="mt-10">
                <div class="">
                    <h1 class="text-3xl font-bold mb-4">List of Students</h1>
                </div>
                <?php if($result->num_rows > 0) { ?>
                    <table class="bg-[#EDEDED] w-full text-center" cellpadding="15">
                        <thead class="border-b-2 border-black">
                            <th>Last Name</th>
                            <th>Given Name</th>
                            <th>Middle Inital</th>
                            <th>Course</th>
                            <th>&nbsp;</th>
                        </thead>

                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr class="border-b-2 border-black">
                                <td><?= $row['last_name']; ?></td>
                                <td><?= $row['given_name']; ?></td>
                                <td><?= $row['middle_initial']; ?></td>
                                <td><?= $row['course']; ?></td>
                                <td></td>
                                <td>
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="view_details.php?id=<?= $row['id']; ?>">
                                        <i class="fa fa-eye text-lg transition-all duration-300 lg:hover:scale-110"></i>
                                        </a>

                                        <a href="edit_details.php?id=">
                                            <i class="fa fa-edit text-lg text-green-600 transition-all duration-300 lg:hover:scale-110"></i>
                                        </a>

                                        <a href="delete_details.php?id=">
                                            <i class="fa fa-trash text-lg text-red-600 transition-all duration-300 lg:hover:scale-110"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } else { ?>
                    <tr>
                        <td colspan="7" class="py-8 text-red-700">
                            No Students Found.
                        </td>
                    </tr>
                    <?php } ?>
            </div>
        </div>
    </main>
</body>
</html>