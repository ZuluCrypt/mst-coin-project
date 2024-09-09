<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>GO Back</h1>
    </header>
    <nav>
        <!-- Your navigation links here -->
    </nav>

    <!-- Display messages here -->
    <div class="message-container">
        <?php
        require_once("db_connection.php"); // Include your database connection code

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            $uploadSuccess = false;
            $errorMessage = "";

            // Check if a file was uploaded without errors
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
                // Directory to store uploaded images
                $targetDirectory = "uploads/";

                // Create the directory if it doesn't exist
                if (!file_exists($targetDirectory)) {
                    mkdir($targetDirectory, 0777, true);
                }

                $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

                // Check if the file already exists
                if (file_exists($targetFile)) {
                    $errorMessage = "Sorry, file already exists.";
                } else {
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        // Insert the image file path into the "images" table
                        $imageFilePath = $targetFile;

                        $sql = "INSERT INTO images (file_path) VALUES (?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $imageFilePath);

                        if ($stmt->execute()) {
                            $uploadSuccess = true;
                        } else {
                            $errorMessage = "Error inserting image: " . $conn->error;
                        }

                        $stmt->close();
                    } else {
                        $errorMessage = "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                $errorMessage = "No file was uploaded or an error occurred during upload.";
            }

            if ($uploadSuccess) {
                echo "Image has been uploaded and stored in the database.";
            } else {
                echo $errorMessage; // Display error message
            }
        }
        ?>
    </div>

    <!-- Admin form to input user ID -->
    <form method="POST" enctype="multipart/form-data">
        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image">
        <input type="submit" name="submit" value="Upload Image">
    </form>
</body>
</html>
