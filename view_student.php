<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * from students order by student_id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
                #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #243b55;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: 9999;
            color: white;
            font-family: Arial, sans-serif;
        }

        .spinner {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #ffffff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }

        .progress-container {
            width: 200px;
            height: 10px;
            background-color: #ffffff50;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0%;
            background-color: #ffffff;
            transition: width 0.2s;
        }

        /* Hide content initially */
        #content {
            display: none;
        }

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
    <div id="preloader">
    <div class="spinner"></div>
    <div class="progress-container">
        <div class="progress-bar" id="progress-bar"></div>
    </div>
    <p id="progress-text">0%</p>
</div>

<h2>Student List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>No</th>
        <th>Names</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Enrollment Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['student_id']}</td>
                <td>{$no}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['enrollment_date']}</td>
                <td><a href='edit_student.php?id={$row['student_id']}'>Edit</a></td>
                <td><a href='delete_student.php?id={$row['student_id']}'>Delete</a></td>
              </tr>";
        $no++;
    }
    ?>
</table>

<a href="index.php" class="back-home">Back Home</a>
<a href="admin_status.php" class="back-home">See Visitors</a>

</body>
</html>
