<?php
include "db.php";

$name = trim($_POST['name']);
$age = $_POST['age'];
$gender = trim($_POST['gender']);
$date = $_POST['date'];
$phone = ($_POST['phone']);

if ($name == "" || $gender == "") {
    header("Location: add_student.php?msg=error");
} else {
    $sql = "INSERT INTO students (name, age, gender, enrollment_date,phone)
            VALUES ('$name', '$age', '$gender', '$date','$phone')";

    if (mysqli_query($conn, $sql)) {
        header("Location: add_student.php?msg=success");
    } else {
        header("Location: add_student.php?msg=failed");
    }
}
exit();
