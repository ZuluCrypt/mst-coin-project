<?php
require_once("db_connection.php");

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

    // Get the user_id, you may have it stored in a variable or session
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id']; // Replace with how you store the user ID

        // Insert the image with the user_id
        $sql = "INSERT INTO images (user_id, file_path) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $userId, $targetFile);

        if ($stmt->execute()) {
            echo "Image has been stored in the database.";
        } else {
            echo "Error inserting image: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "User not authenticated. Make sure you have a valid user session.";
    }

    $conn->close();
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>
