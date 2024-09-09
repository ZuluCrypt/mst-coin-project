<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
</head>
<body>
    <header>
        <h1>All User</h1>
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["user_id"]) && is_numeric($_POST["user_id"])) {
            $userId = $_POST["user_id"];

            require_once("db_connection.php");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT 
                u.id AS user_id,
                u.username,
                u.email,
                p.full_name,
                p.phone_number,
                p.address,
                b.account_holder,
                b.account_number,
                b.bank_name,
                b.branch,
                i.file_path AS profile_picture
            FROM users u
            LEFT JOIN profiles p ON u.id = p.user_id
            LEFT JOIN bank_details b ON u.id = b.user_id
            LEFT JOIN images i ON u.id = i.user_id
            WHERE u.id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>User Information for User ID: " . $row["user_id"] . "</h2>";

                echo "<table>";
                echo "<tr><th>Field</th><th>Value</th></tr>";

                // Display user information in a table
                foreach ($row as $key => $value) {
                    echo "<tr><td>" . ucwords(str_replace("_", " ", $key)) . "</td><td>$value</td></tr>";
                }

                // Display profile picture if available
                if (!empty($row["profile_picture"])) {
                    echo "<tr><td>Profile Picture</td><td><img src='" . $row["profile_picture"] . "' alt='Profile Picture' width='100'></td></tr>";
                }

                echo "</table>";
            } else {
                echo "No user found with the provided ID.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Invalid user ID.";
        }
    }
    ?>
    <!-- Admin form to input user ID -->
    <form method="POST">
        <label for="user_id">Enter User ID:</label>
        <input type="text" id="user_id" name="user_id">
        <input type="submit" value="View User Information">
    </form>
</body>
</html>
