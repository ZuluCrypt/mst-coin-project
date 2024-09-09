<?php
// Include your database connection code here
require_once("db_connection.php");

// Query to fetch contact information for users
$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

// Check for errors and fetch data
if ($result) {
    $user_messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Close the database connection when done
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Messages</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
</head>
<body>
    <header>
        <h1>User Messages</h1>
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
            <h2>User Message List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>message</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($user_messages)): ?>
                        <?php foreach ($user_messages as $info): ?>
                            <tr>
                                <td><?php echo $info['name']; ?></td>
                                <td><?php echo $info['email']; ?></td>
                                <td><?php echo $info['message']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No contact information found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Dashboard</p>
    </footer>
</body>
</html>
