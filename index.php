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
    <a href="create_task.php"><button type="button" >Create New Task</button></a>
    <a href="Update.php"><button type="button" >Update Task</button></a>
    <a href="Delete.php"><button type="button" >Delete Task</button></a>
    <br>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            
        </tr>
        <?php endwhile; ?>
    </table>
    <button id="returnButton" onclick="return">Return to visio</button>
    <script>
        
         document.getElementById('returnButton').addEventListener('click', function() {
         // Replace 'myvisioapp://' with your app's custom scheme
        // window.location.href = 'myvisioapp://';
        window.location.href = 'C:\\Users\\hp\\Downloads\\officedeploymenttool_17531-20046.exe';
          });
</script>
    </script>
</body>
</html>


