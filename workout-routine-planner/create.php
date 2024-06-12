<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = "INSERT INTO workouts (user_id, title, description, date) VALUES ('$user_id', '$title', '$description', '$date')";

    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Workout</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="top-bar">
        <a class="logout-button" href="logout.php">Logout</a>
    </div>
    <h2>Create Workout</h2>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="date" name="date" required>
        <button type="submit">Create</button>
    </form>
    <button class="back-button" onclick="location.href='dashboard.php'">Back to Dashboard</button>
</div>
</body>
</html>
