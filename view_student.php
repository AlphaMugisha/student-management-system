<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        /* COOL PRELOADER CSS */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, #243b55 0%, #141e30 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: 9999;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: opacity 0.8s ease; /* Smooth fade out */
        }

        /* Glowing Ring Loader */
        .loader-ring {
            position: relative;
            width: 120px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader-ring span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 2px solid #fff;
            border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
            transition: 0.5s;
            animation: animate 6s linear infinite;
        }

        /* Multiple rings with different speeds */
        .loader-ring span:nth-child(1) { animation-duration: 4s; }
        .loader-ring span:nth-child(2) { animation-duration: 3s; border-color: #00d2ff; }
        .loader-ring span:nth-child(3) { animation-duration: 2s; border-color: #3a7bd5; }

        @keyframes animate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .percentage {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 2px;
            margin-top: 20px;
            text-shadow: 0 0 10px rgba(255,255,255,0.5);
        }

        .loading-text {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            opacity: 0.6;
            margin-top: 10px;
        }

        /* CONTENT STYLING */
        #content {
            opacity: 0;
            transform: translateY(20px);
            transition: all 1s ease;
            padding: 30px;
        }

        /* Existing Table/Body styles */
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; }
        h2 { color: #243b55; text-align: center; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #eee; padding: 12px; text-align: center; }
        th { background-color: #243b55; color: white; }
        .back-home { display: inline-block; padding: 10px 20px; background: #243b55; color: white; text-decoration: none; border-radius: 4px; margin: 10px; }
    </style>
</head>
<body>

    <div id="preloader">
        <div class="loader-ring">
            <span></span>
            <span></span>
            <span></span>
            <div class="percentage" id="progress-text">0%</div>
        </div>
        <div class="loading-text">Synchronizing Data</div>
    </div>

    <div id="content">
        <h2>Student List</h2>
        <table>
            <tr>
                <th>ID</th><th>No</th><th>Names</th><th>Age</th><th>Gender</th><th>Enrollment Date</th><th>Edit</th><th>Delete</th>
            </tr>
            <?php
            // Your PHP Loop here remains the same
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$no}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['enrollment_date']}</td>
                        <td><a href='#'>Edit</a></td>
                        <td><a href='#'>Delete</a></td>
                      </tr>";
                $no++;
            }
            ?>
        </table>
        <div style="text-align:center">
            <a href="index.php" class="back-home">Back Home</a>
            <a href="admin_status.php" class="back-home">See Visitors</a>
        </div>
    </div>

    <script>
        let progress = 0;
        const progressText = document.getElementById('progress-text');
        const preloader = document.getElementById('preloader');
        const content = document.getElementById('content');

        const interval = setInterval(() => {
            // Speeding up the increments slightly for a snappier feel
            let increment = Math.floor(Math.random() * 5) + 1; 
            progress += increment;

            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                
                // Phase 1: Fade out preloader
                preloader.style.opacity = '0';
                
                setTimeout(() => {
                    preloader.style.display = 'none';
                    // Phase 2: Fade in and slide up content
                    content.style.opacity = '1';
                    content.style.transform = 'translateY(0)';
                }, 800);
            }
            progressText.textContent = progress + '%';
        }, 80); 
    </script>
</body>
</html>