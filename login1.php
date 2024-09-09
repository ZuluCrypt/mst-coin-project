<?php
Error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection code here (e.g., mysqli_connect)
require_once("db_connection.php");

session_start(); // Start a session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $loginEmail = $_POST["loginEmail"];
    $loginPassword = $_POST["loginPassword"];

    // Validation (you can add more checks as needed)
    if (empty($loginEmail) || empty($loginPassword)) {
        $loginError = "Both email and password are required.";
    } else {
        // Check if the user exists in the database
        $sql = "SELECT id, username, password_id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $loginEmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $userId, $username, $passwordId);
        mysqli_stmt_fetch($stmt);

        // Close the result set of the first query
        mysqli_stmt_close($stmt);

        // Fetch the hashed password from the passwords table
        $sqlFetchPasswordHash = "SELECT password_hash FROM passwords WHERE id = ?";
        $stmtFetchPasswordHash = mysqli_prepare($conn, $sqlFetchPasswordHash);
        mysqli_stmt_bind_param($stmtFetchPasswordHash, "i", $passwordId);
        mysqli_stmt_execute($stmtFetchPasswordHash);
        mysqli_stmt_bind_result($stmtFetchPasswordHash, $storedPasswordHash);
        mysqli_stmt_fetch($stmtFetchPasswordHash);

        // Verify the password
        if (password_verify($loginPassword, $storedPasswordHash)) {
            // Password is correct, create a session and log the user in
            $_SESSION["user_id"] = $userId;
            $_SESSION["username"] = $username;

            if (isset($loginError1)) {
                // Don't redirect if there's a password error, stay on the login page
                mysqli_close($conn);
            } else {
                // Redirect to the dashboard page
                header("Location: dashboard.php");
                exit();
            }
        } else {
            $loginError1 = "Invalid email or password.";
        }

        mysqli_stmt_close($stmtFetchPasswordHash);
    }
}
?>