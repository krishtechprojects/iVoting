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

// Get admin inputs from the form
$adminid = $_POST['adminid'];
$password = $_POST['password'];

// Perform SQL query to check admin credentials
$sql = "SELECT * FROM admin WHERE adminid = '$adminid' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Successful login
    session_start();
    $_SESSION['adminid'] = $adminid;
    header("Location: adminPanel.html"); // Redirect to admin panel
} else {
    // Failed login
    echo "Invalid admin login credentials. Please try again.";
	header("Location: loginadminfail.html");
}

$conn->close();
?>
