<?php
// Database connection parameters (update with your credentials)
$servername = "cs3-dev.ict.ru.ac.za";
$username = "G20M7935";
$password = "G20M7935";
$database = "G20M7935";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve messages from the database
$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

// Check if there are messages
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        // Display each message in a table row
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No messages found.";
}

// Close the database connection
$conn->close();
?>
