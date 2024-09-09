<?php
// Include your database connection code here
require_once("db_connection.php");

// Query to get the total number of users
$sql = "SELECT COUNT(*) AS total_users FROM users";
$result = mysqli_query($conn, $sql);

// Check for errors and fetch the result
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalUsers = $row['total_users'];
} else {
    $totalUsers = "Error"; // Handle errors as needed
}

// Close the database connection
mysqli_close($conn);

// Return the total users as a JSON response
header("Content-Type: application/json");
echo json_encode(['total_users' => $totalUsers]);
?>
