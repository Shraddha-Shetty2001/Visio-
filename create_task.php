<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);

    $sql = "SELECT * FROM todolist WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Task number already exists. Please choose a different number.";
    } else {
        $sql = "INSERT INTO todolist (id,title, content) VALUES ('$id','$title', '$content')";
        if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    }   else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
}}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Create Task</h1>
    <form action="create_task.php" method="post">
        <label for="id">Note number:</label>
        <input type="number" id="id" name="id" required>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="content">Description:</label>
        <textarea id="content" name="content" required></textarea>
        <input type="submit" value="Create Task">
    </form>
    <a href="index.php">Back to Task List</a>
</body>
</html>
