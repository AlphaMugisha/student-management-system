<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        /* Preloader styles */
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
            z-index: 9999;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        /* Hide content initially */
        #content {
            display: none;
        }

        /* Your form styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #243b55;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
        }

        h2 {
            color: #243b55;
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
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
            display: block;
            text-align: center;
            margin-top: 15px;
            padding: 8px;
            background-color: #e0e0e0;
            color: #243b55;
            text-decoration: none;
            border-radius: 6px;
        }

        a:hover {
            background-color: #d0d0d0;
        }

        .message {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .message.success { color: green; }
        .message.error { color: red; }
    </style>
</head>
<body>

<!-- Preloader -->
<div id="preloader">Loading...</div>

<!-- Actual content -->
<div id="content" class="form-container">

<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "success") {
        echo "<p class='message success'>Student added successfully</p>";
    } elseif ($_GET['msg'] == "error") {
        echo "<p class='message error'>All fields are required</p>";
    } elseif ($_GET['msg'] == "failed") {
        echo "<p class='message error'>Insert failed</p>";
    }
}
?>

<h2>Add Student</h2>

<form method="POST" action="insert_student.php">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <input type="text" name="gender" placeholder="Gender" required>
    <input type="date" name="date" required>
    <input type="submit" value="Add Student">
</form>

<a href="index.php">Back Home</a>
</div>

<script>
    // Show preloader for 5 seconds, then show content
    setTimeout(function() {
        document.getElementById('preloader').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    }, 5000); // 5000 milliseconds = 5 seconds
</script>

</body>
</html>
