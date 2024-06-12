<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$workout_id = $_GET['id'];
$sql = "SELECT * FROM workouts WHERE id='$workout_id' AND user_id='{$_SESSION['user_id']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Workout</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Workout Details</h2>
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['description']; ?></p>
    <p>Date: <?php echo $row['date']; ?></p>
    <a href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>
