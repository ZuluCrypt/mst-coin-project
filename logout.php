<?php
require_once("db_connection.php");
session_start(); // Start a session

if (isset($_SESSION['admin_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
</head>
<body>
    <h1>Logout Page</h1>

    <p>You have been logged out.</p>

    <form action="index.php" method="post">
        <input type="submit" value="Return to Login">
    </form>
</body>
</html>