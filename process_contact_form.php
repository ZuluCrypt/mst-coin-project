<?php
$errors = []; // Initialize an empty array to store validation errors

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate form fields
    if (empty($name)) {
        $errors["name"] = "Name is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    if (empty($message)) {
        $errors["message"] = "Message is required.";
    }

    // If there are no validation errors, save the message to the database
    if (empty($errors)) {
        // Connect to the MySQL database (update credentials)
        $servername = "cs3-dev.ict.ru.ac.za";
        $username = "G20M7935";
        $password = "G20M7935";
        $database = "G20M7935";

        $conn = new mysqli($servername, $username, $password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the message into the database
        $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo '<script>alert("Thank you for your message. We will get in touch with you soon!")</script>';
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
}

// If the form was not submitted or there are validation errors, display the form again
?>