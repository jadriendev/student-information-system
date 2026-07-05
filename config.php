<?php
$conn = mysqli_connect("localhost", "root", "", "student_management_db");

if (!$conn)
    {
        die ("Connection Failed: " . mysqli_connect_error());
    }
?>