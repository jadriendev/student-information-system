<?php
include_once 'config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tbl_students WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

if (isset($_POST['submit']))
    {
        $last_name = $_POST['last_name'];
        $given_name = $_POST['given_name'];
        $middle_initial = $_POST['middle_initial'];
        $course = $_POST['course'];
        $year_level = $_POST['year_level'];
        $email = $_POST['email'];

        $sql = "UPDATE tbl_students 
            SET 
            last_name = '$last_name',
            given_name = '$given_name',
            middle_initial = '$middle_initial',
            course = '$course',
            year_level = '$year_level',
            email = '$email'
            WHERE id = $id";

            mysqli_query($conn, $sql);


            header("Location: students.php");
            exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $row['given_name']; ?> | Student Information System</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="last_name" value="<?= $row['last_name'] ?>">

        <input type="text" name="given_name" value="<?= $row['given_name']; ?>">

        <input type="text" name="middle_initial" value="<?= $row['middle_initial']; ?>">

        <input type="text" name="course" value="<?= $row['course']; ?>">

        <select class="border rounded-lg w-full pl-12 py-2 focus:outline-none focus:ring-2 focus:border-blue-700" name="year_level" value="<?= $row['year_level']; ?>">
            <option value="1st Year" <?= $row['year_level'] == '1st Year' ? 'selected' :  ''; ?>>1st Year</option>
            <option value="2nd Year" <?= $row['year_level'] == '2nd Year' ? 'selected' :  ''; ?>>2nd Year</option>
            <option value="3rd Year" <?= $row['year_level'] == '3rd Year' ? 'selected' :  ''; ?>>3rd Year</option>
            <option value="4th Year" <?= $row['year_level'] == '4th Year' ? 'selected' :  ''; ?>>4th Year</option>
        </select>

        <input type="text" name="email" value="<?= $row['email']; ?>">

        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>