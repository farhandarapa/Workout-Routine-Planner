<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM workouts WHERE user_id='$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="top-bar">
        <a class="logout-button" href="logout.php">Logout</a>
    </div>
    <h2>Workout Routine Planner</h2>
    <button class="create-button" onclick="location.href='create.php'">Create New Workout</button>
    <h3>Your Workouts</h3>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='workout'>
                    <h4>{$row['title']}</h4>
                    <p>{$row['description']}</p>
                    <p>Date: {$row['date']}</p>
                    <button class='edit-button' onclick=\"location.href='update.php?id={$row['id']}'\">Edit</button>
                    <button class='delete-button' onclick=\"location.href='delete.php?id={$row['id']}'\">Delete</button>
                </div>";
        }
    } else {
        echo "<p>No workouts found.</p>";
    }
    ?>
</div>
</body>
</html>
