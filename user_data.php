<?php
// Include your database connection code here
require_once("db_connection.php");
// Query to fetch user data from the database
// Replace 'users' with your actual database table name
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check for errors and fetch data
if ($result) {
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Close the database connection when done
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
</head>

<body>
    <header>
        <h1>User Data</h1>
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
            <h2>User List</h2>
            <div class="table-container">
                <table class="header-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                </table>
                <div class="content-table">
                    <table>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <?php echo $user['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['username']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['email']; ?>
                                        </td>
                                        <td>
                                            <form action="remove_user.php" method="post">
                                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                <button type="submit">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </section>
        <section>
            <h2>Add User</h2>
            <form action="add_user.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Add User</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Dashboard</p>
    </footer>
</body>

</html>