<?php
// database connection
require_once("db_connection.php");

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    // Validation 
    if (empty($email) || empty($password)) {
        $errorMessage = "Email and password are required.";
    } else {
        //database to retrieve the admin with the provided email
        $sql = "SELECT * FROM admin WHERE admin_email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_assoc($result);

        if ($admin && password_verify($password, $admin['admin_password'])) {
            // Admin login successful
            $_SESSION["admin_logged_in"] = true;
            header("Location: admin_dashboard.php"); // Redirect to admin dashboard
            exit();
        } else {
            $errorMessage = "Invalid email or password for admin.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>