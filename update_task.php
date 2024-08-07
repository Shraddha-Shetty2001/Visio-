<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM todolist WHERE id=$id");
    $task = $result->fetch_assoc();
    // $currentcontent = $task["content"];
    }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    // $content = $currentcontent."\n".$newcontent;
    // $sql = "SELECT * FROM todolist WHERE id= '$id'";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     echo "Task number already exists. Please choose a different number.";
    // } else {
        $sql = "UPDATE todolist SET title='$title', content='$content' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    }   else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Task</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Update Task</h1>
    <form action="update_task.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>"> 
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $task['title']; ?>">
        <label for="content">Content:</label>
  
        <textarea id="content" name="content"><?php echo htmlspecialchars(str_replace(array('<br>', '<br/>', '<br />'), "\n", $task['content'])); ?></textarea>

        <input type="submit" value="Update Task">
    </form>
    <a href="index.php">Back to Task List</a>
</body>
</html>
