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

// Get candidate ID from query parameter
$candidateId = $_GET['id'];

// Perform SQL query to delete candidate
$sql = "DELETE FROM candidates WHERE id = '$candidateId'";

if ($conn->query($sql) === TRUE) {
    header("Location: viewCandidates.php"); // Redirect back to viewCandidates.php
} else {
    echo "Error deleting candidate: " . $conn->error;
}

$conn->close();
?>
