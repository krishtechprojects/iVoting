<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ivoting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID from query parameter
$userId = $_GET['id'];

// Perform SQL query to delete user
$sql = "DELETE FROM users WHERE id = '$userId'";

if ($conn->query($sql) === TRUE) {
    header("Location: viewAllUsers.php"); // Redirect back to viewAllUsers.php
} else {
    echo "Error deleting user: " . $conn->error;
}

$conn->close();
?>
