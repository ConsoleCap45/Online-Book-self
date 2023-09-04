<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "chat_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['message'])) {
    $sender = "User"; // Update this with the appropriate sender name
    $message = $_POST['message'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO messages (sender, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $sender, $message);
    $stmt->execute();

    $stmt->close();
}

$conn->close();
?>
