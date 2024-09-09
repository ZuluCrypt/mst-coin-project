<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    // Retrieve data from the form
    $fullName = $_POST["fullName"];
    $phoneNumber = $_POST["phoneNumber"];
    $address = $_POST["address"];

    // Insert data into the database
    $sql = "INSERT INTO profiles (user_id,full_name, phone_number, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $user_id,$fullName, $phoneNumber, $address);

    if ($stmt->execute()) {
        // Data inserted successfully
        header("Location: dashboard.php"); // Redirect to a success page
        exit();
    } else {
        // Error occurred while inserting data
        header("Location: profile_error.php"); // Redirect to an error page
        exit();
    }

    // Close the database connection
    $conn->close();
}
?>