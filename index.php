<!DOCTYPE html>
<html>
<head>
    <title>Task Management Application</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Task Management Application</h1>
    <form action="create_task.php" method="post">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="date" name="due_date" required><br>
        <select name="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select><br>
        <input type="submit" value="Add Task">
    </form>

    <h2>Tasks</h2>
    <ul>
        <?php 
        include 'db.php';

        // Filter tasks by priority or due date if provided
        $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
        
        $sql = "SELECT * FROM tasks";
        if ($filter) {
            $sql .= " WHERE priority = '$filter' OR due_date = '$filter'";
        }
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Task ID: " . $row["id"]. " - Title: " . $row["title"]. " - Description: " . $row["description"]. " - Due Date: " . $row["due_date"]. " - Priority: " . $row["priority"]. "<br>";
            }
        } else {
            echo "No tasks found";
        }
        
        $conn->close();
         ?>
    </ul>
</body>
</html>
