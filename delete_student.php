<?php
include "db.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM students WHERE student_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
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
            color: red;
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
    <p>Record deleted successfully</p>
    <a href="view_student.php">Back to List</a>
</div>

</body>
</html>
