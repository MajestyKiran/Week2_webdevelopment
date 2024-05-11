<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; // Change this to your MySQL username
    $password = "password: YES"; // Change this to your MySQL password
    $dbname = "todo_tasks";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $taskTitle, $taskDescription);

    // Set parameters and execute
    $taskTitle = $_POST["taskTitle"];
    $taskDescription = $_POST["taskDescription"];
    $stmt->execute();

    echo "New records created successfully";

    $stmt->close();
    $conn->close();
}
?>
