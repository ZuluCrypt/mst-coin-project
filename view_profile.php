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

// Query to retrieve profile information
$sql = "SELECT * FROM profiles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the profile information in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone Number</th><th>Address</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No profile information found.";
}

// Close the database connection
$conn->close();
?>