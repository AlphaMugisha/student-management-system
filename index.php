<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
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
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            max-width: 900px;
            width: 90%;
            background: white;
            padding: 100px;
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
            text-align: center;
        }

        h1 {
            color: #243b55;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 40px;
        }

        a {
            padding: 14px 28px;
            background: #243b55;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(36,59,85,0.4);
        }

        a:hover {
            background: #141e30;
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(20,30,48,0.5);
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

<div class="box">
    <h1>Student Management System</h1>

    <div class="buttons">
        <a href="add_student.php">Add Student</a>
        <a href="view_student.php">View Students</a>
    </div>
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
