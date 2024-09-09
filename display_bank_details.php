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

// Retrieve banking details from the database
$sql = "SELECT * FROM bank_details";
$result = $conn->query($sql);

// Check if there are any rows in the result set
if ($result->num_rows > 0) {
    echo "<h2>Banking Details</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Account Holder</th><th>Account Number</th><th>Bank Name</th><th>Branch</th></tr>";

    // Output data from each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["account_holder"] . "</td>";
        echo "<td>" . $row["account_number"] . "</td>";
        echo "<td>" . $row["bank_name"] . "</td>";
        echo "<td>" . $row["branch"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No banking details found.";
}

// Close the database connection
$conn->close();
?>