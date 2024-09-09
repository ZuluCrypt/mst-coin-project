<?php
require_once("db_connection.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $loginEmail = $_POST["loginEmail"];
    $loginPassword = $_POST["loginPassword"];

    // Validation (you can add more checks as needed)
    if (empty($loginEmail) || empty($loginPassword)) {
        echo "Both email and password are required.";
    } else {
        // Check if the user exists in the database
        $sql = "SELECT admin_id, admin_username, admin_password FROM admin WHERE admin_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $loginEmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $admin_Id, $admin_username, $admin_password);
        mysqli_stmt_fetch($stmt);

        // Close the result set of the first query
        mysqli_stmt_close($stmt);

        // Verify the password
        if (password_verify($loginPassword, $admin_password)) {
            // Password is correct, create a session and log the user in
            session_start();
            $_SESSION["admin_id"] = $admin_Id;
            $_SESSION["admin_username"] = $admin_username;

            // Redirect to the admin dashboard page
            header("Location: admin_dashboard.php");
            exit(); // Make sure to exit after the redirection
        } else {
            echo "Invalid email or password.";
        }

        // Close the database connection
        mysqli_close($conn);
    }
}

?>
