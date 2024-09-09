<?php
// Include your database connection code here (e.g., mysqli_connect)
require_once("db_connection.php");

$errorMessage = ""; // Initialize error message variable
$fullNameError = "";
$emailError = "";
$passwordError = "";
$confirmPasswordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validation (you can add more checks as needed)
    if (empty($fullName)) {
        $fullNameError = "Full name is required.";
    }
    
    if (empty($email)) {
        $emailError = "Email address is required.";
    }

    if (empty($password)) {
        $passwordError = "Password is required.";
    } elseif ($password !== $confirmPassword) {
        $passwordError = "Passwords do not match.";
        $confirmPasswordError = "Passwords do not match.";
    }

    if (empty($confirmPassword)) {
        $confirmPasswordError = "Confirm password is required.";
    }

    if (empty($fullNameError) && empty($emailError) && empty($passwordError) && empty($confirmPasswordError)) {
        // Hash the password before storing it in the database
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insert the password into the passwords table
        $sqlInsertPassword = "INSERT INTO passwords (password_hash) VALUES (?)";
        $stmtInsertPassword = mysqli_prepare($conn, $sqlInsertPassword);

        // Bind the password value to the placeholder
        mysqli_stmt_bind_param($stmtInsertPassword, "s", $passwordHash);

        if (mysqli_stmt_execute($stmtInsertPassword)) {
            $passwordId = mysqli_insert_id($conn); // Get the generated password_id
            mysqli_stmt_close($stmtInsertPassword);

            // Insert user data into the users table with the valid password_id
            $sqlInsertUser = "INSERT INTO users (username, email, password_id) VALUES (?, ?, ?)";
            $stmtInsertUser = mysqli_prepare($conn, $sqlInsertUser);

            mysqli_stmt_bind_param($stmtInsertUser, "ssi", $fullName, $email, $passwordId);

            if (mysqli_stmt_execute($stmtInsertUser)) {
                // Redirect to profile.php
                header("Location: profile.php");
                exit(); // Make sure to exit to prevent further script execution
            } else {
                $errorMessage = "Error inserting user: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmtInsertUser);
        } else {
            $errorMessage = "Error inserting password: " . mysqli_error($conn);
        }
    }
}
?>
