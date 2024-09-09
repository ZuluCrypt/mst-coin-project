<?php
// Include your database connection code here
require_once("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the user's email and generate a unique token
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32)); // Generate a random token

    // Check if the user's email exists in the users table
    $checkUserQuery = "SELECT id FROM users WHERE email = ?";
    $stmtCheckUser = mysqli_prepare($conn, $checkUserQuery);
    mysqli_stmt_bind_param($stmtCheckUser, "s", $email);
    mysqli_stmt_execute($stmtCheckUser);
    mysqli_stmt_bind_result($stmtCheckUser, $userId);

    // Fetch the result and close the statement
    mysqli_stmt_fetch($stmtCheckUser);
    mysqli_stmt_close($stmtCheckUser);

    if ($userId) {
        // Insert the password reset data into the password_resets table
        $insertQuery = "INSERT INTO password_resets (user_id, token, created_at) VALUES (?, ?, NOW())";
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "is", $userId, $token);

        if (mysqli_stmt_execute($stmt)) {
            // Send the password reset email to the user with a link containing the token
            $resetLink = "http://cs3-dev.ict.ru.ac.za/Practicals/G20M7935/reset_password.php?token=" . $token;
            // Send the email to the user with the reset link
            // You can use a library like PHPMailer for sending emails

            // Display a message to the user indicating the email has been sent
            echo "Password reset email sent. Please check your inbox.";

        } else {
            echo "Failed to insert reset token into the database.";
        }
    } else {
        echo "Email address not found.";
    }

    // Close the insert statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
