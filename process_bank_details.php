<?php
require_once("db_connection.php");

// Get data from the form
$account_holder = $_POST["accountHolder"];
$account_number = $_POST["accountNumber"];
$bank_name = $_POST["bankName"];
$branch = $_POST["branch"];

// Assuming you have the user's ID stored in $userId
session_start();  // If you use sessions
$userId = $_SESSION['user_id'];  // Set $userId based on your authentication

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the bank_details table with the $userId
$sql = "INSERT INTO bank_details (user_id, account_holder, account_number, bank_name, branch)
VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issss", $userId, $account_holder, $account_number, $bank_name, $branch);

if ($stmt->execute()) {
    echo "Banking details updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>