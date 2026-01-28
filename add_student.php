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
<div id="preloader">
    <div class="spinner"></div>
    <div class="progress-container">
        <div class="progress-bar" id="progress-bar"></div>
    </div>
    <p id="progress-text">0%</p>
</div>

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
    let progress = 0;
    const progressBar = document.getElementById('progress-bar');
    const progressText = document.getElementById('progress-text');

    // Update progress every 50ms
    const interval = setInterval(() => {
        if(progress >= 100){
            clearInterval(interval);
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('content').style.display = 'block';
        } else {
            progress++;
            progressBar.style.width = progress + '%';
            progressText.textContent = progress + '%';
        }
    }, 50); // 50ms × 100 = ~5 seconds
</script>

</body>
</html>
