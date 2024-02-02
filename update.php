<?php
include 'db.php';

$id = $_POST['id'];
$completed = isset($_POST['completed']) ? 1 : 0;
$due_date = $_POST['due_date'];

$sql = "UPDATE tasks SET completed=$completed, due_date='$due_date' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Task updated successfully";
} else {
    echo "Error updating task: " . $conn->error;
}

$conn->close();
?>
