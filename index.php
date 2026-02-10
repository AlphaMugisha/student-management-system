<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <style>
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

<div class="box">
    <h1>Student Management System</h1>

    <div class="buttons">
        <a href="add_student.php">Add Student</a>
        <a href="view_student.php">View Students</a>
    </div>
</div>

</body>
</html>
