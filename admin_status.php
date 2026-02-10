<?php
include "db.php";

// 1. Logic: Get total visits for EVERY page in the database
// We use COUNT to get the number of hits and MAX to find the most recent time
$query = "SELECT page_name, 
                 COUNT(*) as total_hits, 
                 MAX(visit_time) as last_visit 
          FROM visits 
          GROUP BY page_name 
          ORDER BY total_hits DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Management Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f2f5; margin: 0; padding: 40px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #243b55; border-bottom: 2px solid #243b55; padding-bottom: 10px; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #243b55; color: white; }
        tr:hover { background-color: #f9f9f9; }
        
        .badge { background: #243b55; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.9em; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #243b55; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Visitor & Page Management</h2>
    <p>View how many people are using your site pages.</p>

    <table>
        <thead>
            <tr>
                <th>Page Name</th>
                <th>Total Visitors</th>
                <th>Last Activity</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><strong><?php echo $row['page_name']; ?></strong></td>
                <td><span class="badge"><?php echo $row['total_hits']; ?> hits</span></td>
                <td><?php echo date('M d, Y - H:i', strtotime($row['last_visit'])); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn">Back to Home</a>
</div>

</body>
</html>