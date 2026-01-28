<?php
include "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];

mysqli_query($conn, "UPDATE students SET
    name='$name',
    age='$age',
    gender='$gender'
    WHERE student_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #208446;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .message-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            width: 350px;
        }

        .message-container p {
            font-weight: bold;
            color: green;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #e0e0e0;
            color: #243b55;
            border-radius: 6px;
        }

        a:hover {
            background-color: #d0d0d0;
        }
    </style>
</head>
<body>

<div class="message-container">
    <p>Record updated successfully</p>
    <a href="view_student.php">Back to List</a>
</div>

</body>
</html>
