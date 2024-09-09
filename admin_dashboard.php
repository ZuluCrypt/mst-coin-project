<?php
session_start(); // Start a session

// Check if the user is logged in (i.e., user ID is set in the session)
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page or show an access denied message if not logged in
    header("Location: adminsign.php"); 
    exit();
}

// You can access user-related data from the session
require("db_connection.php");

// Include your database connection code here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="JS_index5.js"></script>
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="user-stats">
        <p>Total Users: <span id="total-users">Loading...</span></p>
        <p>Active Users: <span id="active-users">Loading...</span></p>
        <p>Offline Users: <span id="offline-users">Loading...</span></p>
    </div>
    </header>
    <nav>
        <ul>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="user_data.php">User Data</a></li>
            <li><a href="messages.php">Messages</a></li>
            <li><a href="allUser.php">All User</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Dashboard</h2>
            <p>Welcome to the admin dashboard. Use the navigation links above to access user data sections.</p>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Dashboard</p>
    </footer>
</body>
</html>
