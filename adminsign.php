<?php
session_start(); // Start a session

require_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["loginEmail"]) && isset($_POST["loginPassword"])) {
        $loginEmail = $_POST["loginEmail"];
        $loginPassword = $_POST["loginPassword"];

        // Rest of your login code here
    } else {
        echo "Both email and password are required.";
    }


    // Validation (you can add more checks as needed)
    if (empty($loginEmail) || empty($loginPassword)) {
        echo "Both email and password are required.";
    } else {
        // Check if the user exists in the database
        $sql = "SELECT admin_id, admin_username, admin_password FROM admin WHERE admin_email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $loginEmail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $adminId, $adminUsername, $adminPassword);
        mysqli_stmt_fetch($stmt);

        // Close the result set of the first query
        mysqli_stmt_close($stmt);

        // Verify the password
        if (password_verify($loginPassword, $adminPassword)) {
            // Password is correct, create a session and log the user in
            $_SESSION["admin_id"] = $adminId;
            $_SESSION["admin_username"] = $adminUsername;

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <!-- <link rel="stylesheet" href="signups.css" /> Include your CSS file here -->
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
    <script defer src="JS_index4.js"></script>
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        header {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav {
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 20px;
        }

        .wrapper1 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        .form h1 {
            color: #333;
        }

        .form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to MST Admin</h1>
    </header>
    <nav>
        <ul>
            <li style="display: inline;"><a href="index.php">Home</a></li>
        </ul>
    </nav>
    <section class="wrapper1">
        <!-- Admin Login Form -->
        <div class="form login1">
            <h1>Admin Login</h1>
            <form action="login2.php" id="loginForm" method="post">
                <input type="email" name="loginEmail" id="loginEmail" placeholder="Email address" required />
                <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" required />
                <input type="submit" value="Login" />
            </form>
        </div>
    </section>
</body>

</html>
