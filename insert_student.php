<?php
include "db.php";

$name = mysqli_real_escape_string($conn, trim($_POST['name']));
$age = $_POST['age'];
$gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
$date = $_POST['date'];

// Validate required fields
if ($name == "" || $gender == "" || $age == "" || $date == "") {
    header("Location: add_student.php?msg=error");
    exit();
}

// Insert student
$sql = "INSERT INTO students (name, age, gender, enrollment_date)
        VALUES ('$name', '$age', '$gender', '$date')";

if (mysqli_query($conn, $sql)) {
    header("Location: add_student.php?msg=success");
} else {
    header("Location: add_student.php?msg=failed");
}
exit();
