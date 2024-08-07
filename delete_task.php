<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM todolist WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Task</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Delete Task</h1>
    <p>Task deleted successfully.</p>
    <a href="index.php">Back to Task List</a>
</body>
</html>
