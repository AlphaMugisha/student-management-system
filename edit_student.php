<?php
include "db.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE student_id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
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

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #243b55;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #243b55;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #141e30;
        }

        a {
            display: inline-block;
            text-decoration: none;
            margin-top: 15px;
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

<div class="form-container">
    <h2>Edit Student</h2>

    <form method="POST" action="update_student.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Name" required>
        <input type="number" name="age" value="<?php echo $row['age']; ?>" placeholder="Age" required>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>" placeholder="Gender" required>

        <input type="submit" value="Update Student">
    </form>

    <a href="view_student.php">Back</a>
</div>

</body>
</html>
