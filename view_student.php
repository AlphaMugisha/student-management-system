<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <style>
        :root {
            --neon-blue: #00f2ff;
            --dark-bg: #050a10;
        }

        #preloader {
            position: fixed;
            inset: 0;
            background-color: var(--dark-bg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            overflow: hidden;
            font-family: 'Courier New', Courier, monospace;
        }

        /* The Laser Scan Line */
        #preloader::after {
            content: "";
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent, var(--neon-blue), transparent);
            opacity: 0.1;
            animation: scan 3s linear infinite;
        }

        @keyframes scan {
            0% { top: -100%; }
            100% { top: 100%; }
        }

        .loader-container {
            position: relative;
            width: 250px;
            text-align: center;
        }

        /* Digital Square Loader */
        .square-loader {
            width: 100px;
            height: 100px;
            border: 2px solid var(--neon-blue);
            margin: 0 auto 30px;
            position: relative;
            animation: rotate 4s linear infinite;
            box-shadow: 0 0 15px var(--neon-blue), inset 0 0 15px var(--neon-blue);
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); border-radius: 0%; }
            50% { transform: rotate(180deg); border-radius: 50%; }
            100% { transform: rotate(360deg); border-radius: 0%; }
        }

        .status-text {
            color: var(--neon-blue);
            text-transform: uppercase;
            letter-spacing: 5px;
            font-size: 14px;
            margin-bottom: 10px;
            text-shadow: 0 0 8px var(--neon-blue);
        }

        .percentage-num {
            font-size: 48px;
            font-weight: 900;
            color: #fff;
            margin: 0;
            font-style: italic;
        }

        /* Content Transition */
        #content {
            display: none;
            opacity: 0;
            filter: blur(10px);
            transition: all 1.2s ease-out;
        }

        .content-visible {
            display: block !important;
            opacity: 1 !important;
            filter: blur(0px) !important;
        }

        /* Table Styling Upgrades */
        body { background: #0f172a; color: #f8fafc; margin: 0; padding: 40px; font-family: 'Inter', sans-serif; }
        table { width: 90%; margin: auto; border-radius: 12px; overflow: hidden; border-collapse: collapse; background: #1e293b; border: 1px solid #334155; }
        th { background: #334155; color: var(--neon-blue); padding: 15px; text-transform: uppercase; font-size: 12px; }
        td { padding: 15px; border-bottom: 1px solid #334155; text-align: center; }
        .btn { background: var(--neon-blue); color: #000; padding: 8px 16px; border-radius: 4px; font-weight: bold; text-decoration: none; font-size: 12px; }

        .matrix-bg {
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(
        0deg,
        rgba(0,255,255,0.05) 0px,
        rgba(0,255,255,0.05) 1px,
        transparent 1px,
        transparent 3px
    );
    animation: matrixMove 10s linear infinite;
    z-index: 0;
}

@keyframes matrixMove {
    from { background-position: 0 0; }
    to { background-position: 0 100px; }
}

/* GLITCH TITLE */
.glitch-title {
    font-size: 22px;
    color: var(--neon-blue);
    position: relative;
    letter-spacing: 3px;
    margin-bottom: 25px;
    text-shadow: 0 0 10px var(--neon-blue);
    animation: flicker 2s infinite alternate;
}

.glitch-title::before,
.glitch-title::after {
    content: attr(data-text);
    position: absolute;
    left: 0;
    width: 100%;
    overflow: hidden;
}

.glitch-title::before {
    color: #ff00c8;
    animation: glitchTop 1s infinite linear alternate-reverse;
}

.glitch-title::after {
    color: #00ffea;
    animation: glitchBottom 1s infinite linear alternate-reverse;
}

@keyframes glitchTop {
    0% { clip-path: inset(0 0 80% 0); transform: translate(-2px,-2px); }
    100% { clip-path: inset(0 0 60% 0); transform: translate(2px,2px); }
}

@keyframes glitchBottom {
    0% { clip-path: inset(60% 0 0 0); transform: translate(2px,2px); }
    100% { clip-path: inset(80% 0 0 0); transform: translate(-2px,-2px); }
}

/* ELECTRIC FLICKER */
@keyframes flicker {
    0%,18%,22%,25%,53%,57%,100% {
        opacity: 1;
    }
    20%,24%,55% {
        opacity: 0.4;
    }
}

/* COOL EXIT ZOOM */
.preloader-exit {
    animation: zoomOut 0.6s ease forwards;
}

@keyframes zoomOut {
    to {
        transform: scale(1.2);
        opacity: 0;
        filter: blur(20px);
    }
}
    </style>
</head>
<body>

<div id="preloader">
    <div class="loader-container">
        <div class="square-loader"></div>
        <div class="status-text" id="status-label">Initializing...</div>
        <div class="percentage-num" id="progress-text">00%</div>
    </div>
</div>

<div id="content">
    <h2 style="text-align: center; color: var(--neon-blue);">RECORDS_DATABASE_V1.0</h2>
    
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>#{$row['student_id']}</td>
                        <td style='color: #fff;'>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td><span style='color: #4ade80;'>ACTIVE</span></td>
                        <td><a href='edit_student.php?id={$row['student_id']}' class='btn'>VIEW</a></td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    let progress = 0;
    const progressText = document.getElementById('progress-text');
    const statusLabel = document.getElementById('status-label');
    const preloader = document.getElementById('preloader');
    const content = document.getElementById('content');

    const statuses = ["Accessing Kernel...", "Bypassing Firewall...", "fetching_data.exe", "Decrypted!", "Ready"];

    const interval = setInterval(() => {
        progress += Math.floor(Math.random() * 4) + 1;

        if (progress > 20) statusLabel.innerText = statuses[0];
        if (progress > 45) statusLabel.innerText = statuses[1];
        if (progress > 70) statusLabel.innerText = statuses[2];
        if (progress > 90) statusLabel.innerText = statuses[3];

        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            statusLabel.innerText = statuses[4];
            
            setTimeout(() => {
                preloader.style.transition = "0.5s";
                preloader.style.opacity = "0";
                
                content.classList.add('content-visible');
                
                setTimeout(() => {
                    preloader.style.display = "none";
                }, 500);
            }, 600);
        }
        
        // Pad the number with a leading zero if under 10
        progressText.innerText = progress.toString().padStart(2, '0') + "%";
    }, 60);
</script>

</body>
</html>