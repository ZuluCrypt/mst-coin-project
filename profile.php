<?php
session_start(); // Start the session

// Check if the user is logged in (i.e., user ID is set in the session)
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or show an access denied message if not logged in
    header("Location: login.php"); // Replace with your login page
    exit();
}

require_once("db_connection.php");

// Check if the form has been submitted for updating user information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profile"])) {
    $newUsername = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];

    // Update user data in the database based on the user's ID
    $user_id = $_SESSION['user_id'];
    $sqlUpdate = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmtUpdate = mysqli_prepare($conn, $sqlUpdate);
    mysqli_stmt_bind_param($stmtUpdate, "ssi", $newUsername, $newEmail, $user_id);

    if (mysqli_stmt_execute($stmtUpdate)) {
        // Update user data in the session
        $_SESSION['username'] = $newUsername;
        $_SESSION['email'] = $newEmail;
    } else {
        $updateError = "Error updating user information: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmtUpdate);
}

// Retrieve user data from the session
$username = $_SESSION['username'];
$newemail = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MST Coin Auction - Your Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="stylesheet" href="bank.css">
    <link href='https://fonts.googleapis.com/css?family=Young Serif' rel='stylesheet'>
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
    <script defer src="JS_index2.js"></script>
</head>

<body>
    <nav>
        <ul>
            <li><a href="dashboard.php"><i class="feather icon-home"></i> Dashboard</a></li>
            <li class="topnav-right"><a href="logout.php">Logout</a></li>

            <li><a href="profile.php">Profile</a></li>
        </ul>
    </nav>

    <main>
    <section class="profile">
        <h2>User Profile</h2>
        <?php
        if (isset($updateError)) {
            echo '<div class="error-message">' . $updateError . '</div>';
        }
        ?>
        <div>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Email:</strong> <?php echo $newemail; ?></p>
            <!-- Display other user profile information here -->
        </div>
    </section>

        <section class="profile-edit-form">
            <h2>Update Profile</h2>
            <form method="post">
                <input type="text" name="newUsername" placeholder="New Username" value="<?php echo $username; ?>"
                    required />
                <input type="email" name="newEmail" placeholder="New Email" value="<?php echo $newemail; ?>" required />
                <input type="submit" name="update_profile" value="Update Profile" />
            </form>
        </section>

        <section class="profile-details-section">
            <div class="container">
                <h2>Profile Details</h2>
                <p>Insert your profile information below:</p>
                <form id="profileDetailsForm" method="post" action="process_profile_details.php">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Profile</button>

                </form>
                <h2>Upload an Image</h2>
                <form action="upload_image.php" method="POST" enctype="multipart/form-data">
                    Select an image to upload:
                    <input type="file" name="image" id="image">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
                <?php
                if (!empty($errorMessage)) {
                    echo '<p style="color: red;">' . $errorMessage . '</p>';
                }
                ?>

            </div>
        </section>


    </main>
</body>


</html>