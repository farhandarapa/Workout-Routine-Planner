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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = "UPDATE workouts SET title='$title', description='$description', date='$date' WHERE id='$workout_id'";

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
    <title>Update Workout</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Update Workout</h2>
    <form method="POST" action="">
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
        <textarea name="description" required><?php echo $row['description']; ?></textarea>
        <input type="date" name="date" value="<?php echo $row['date']; ?>" required>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
