<?php


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement
$sql = "SELECT * FROM chat_messages ORDER BY timestamp ASC";
$result = $conn->query($sql);

// Display the chat messages
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row['sender'] . ":</strong> " . $row['message'] . "</p>";
    }
} else {
    echo "<p>No messages yet</p>";
}

$conn->close();
?>
