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
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$place = $_POST['place'];
$constituency = $_POST['constituency'];
$address = $_POST['address'];
$password = $_POST['password'];

// Perform SQL query to insert user data
$sql = "INSERT INTO users (ahdarid, name, phone, email, dateofbirth, age, place, constituence, address, password) 
        VALUES ('$adharid', '$name', '$phone', '$email', '$dob', '$age', '$place', '$constituency', '$address', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
	header("Location: regsuccess.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	header("Location: regfail.html");
}

$conn->close();
?>
