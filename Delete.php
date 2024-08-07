<?php
include 'config.php';

$result = $conn->query("SELECT * FROM todolist");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Task List</h1>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td>
                <a href="delete_task.php?id=<?php echo $row['id']; ?>">Delete</a>
            
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="index.php">Back to Task List</a>
</body>
</html>