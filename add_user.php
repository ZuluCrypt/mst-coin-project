<?php
// Start a new session or resume the existing session
session_start();

// Include your database connection code here
require_once("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Insert the new user into the database
    $sql = "INSERT INTO users (username, email) VALUES ('$name', '$email')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // User added successfully
        // Create a session variable to store user information
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;

        // Redirect back to user_data.php
        header('Location: user_data.php');
        exit;
    } else {
        // Handle errors
        $error_message = "Failed to add user.";
    }
}

// Close the database connection when done
mysqli_close($conn);
?>

<!-- Display any error messages, if applicable -->
<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>
