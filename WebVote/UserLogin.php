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

// Get user inputs from the form
$adharid = $_POST['adharid'];
$password = $_POST['password'];

// Perform SQL query to check user credentials
$sql = "SELECT * FROM users WHERE ahdarid = '$adharid' AND password = '$password'";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows == 1) {
    // Check if the user's age is above 60
    $row = $result->fetch_assoc();
    $dateOfBirth = $row['dateofbirth'];
    $birthYear = date('Y', strtotime($dateOfBirth));
    $currentYear = date('Y');
    $age = $currentYear - $birthYear;

    if ($age > 60) {
        // Successful login for users above 60
        session_start();
        $_SESSION['adharid'] = $adharid;
        header("Location: dashboard.php"); // Redirect to user dashboard
    } else {
        // User's age is below 60
        echo "You are below 60 years of age. Please go back to <a href='loginuser.html'>Login</a>.";
		header("Location: invalidage.html");
    }
} else {
    // Failed login
    echo "Invalid login credentials. Please try again.";
	header("Location: loginuserfail.html");
}

$conn->close();
?>
