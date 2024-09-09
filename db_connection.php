<?php
$servername = "cs3-dev.ict.ru.ac.za";
$username = "G20M7935";
$password = "G20M7935";
$dbname = "G20M7935";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>