<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$workout_id = $_GET['id'];
$sql = "DELETE FROM workouts WHERE id='$workout_id' AND user_id='{$_SESSION['user_id']}'";

if ($conn->query($sql) === TRUE) {
    header('Location: dashboard.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
