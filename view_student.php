<?php
include "db.php";

// Fetch students ordered by ID (low → high)
$result = mysqli_query($conn, "SELECT Distinct name,age,gender,enrollment_date,class_id,student_id FROM students  ");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9cfcf;
            margin: 0;
            padding: 30px;
        }

        h2 {
            color: #243b55;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px 15px;
            text-align: center;
        }

        th {
            background-color: #243b55;
            color: white;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: #ffffff;
            background-color: #243b55;
            transition: 0.3s;
        }

        a:hover {
            background-color: #141e30;
        }

        .back-home {
            display: block;
            width: 120px;
            margin: 20px auto;
            text-align: center;
            background-color: #e0e0e0;
            color: #243b55;
        }

        .back-home:hover {
            background-color: #d0d0d0;
        }
    </style>
</head>
<body>

<h2>Student List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>No</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Date</th>
        <th>classes</th>
        <th>edit</th>
        <th>delete</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['student_id']}</td>
                <td>$no</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['enrollment_date']}</td>
                <td>{$row['class_id']}</td>
              </tr>";
              echo "<!-- Debug: Row data - ";
              print_r($row);
              echo " -->";
        $no++;
    }
    ?>
</table>

<a href="index.php" class="back-home">Back Home</a>

</body>
</html>
