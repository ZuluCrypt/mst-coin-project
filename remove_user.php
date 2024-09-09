<?php
// Include your database connection code here
require_once("db_connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    // Get the user ID to be removed and sanitize it
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

    // Check if the user ID is a valid integer
    if (filter_var($user_id, FILTER_VALIDATE_INT)) {
        // Delete the user from the database
        $sql = "DELETE FROM users WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // User removed successfully
            header('Location: user_data.php'); // Redirect back to user_data.php
            exit;
        } else {
            // Handle errors
            $error_message = "Failed to remove user.";
        }
    } else {
        // Invalid user ID, handle the error
        $error_message = "Invalid user ID.";
    }
}

// Close the database connection when done
mysqli_close($conn);
?>

<!-- Display any error messages, if applicable -->
<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>