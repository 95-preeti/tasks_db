<?php
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];
$priority = $_POST['priority'];

$sql = "INSERT INTO tasks (title, description, due_date, priority) VALUES ('$title', '$description', '$due_date', '$priority')";

if ($conn->query($sql) === TRUE) {
    echo "Task added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
