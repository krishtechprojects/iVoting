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

// Get candidate inputs from the form
$adharid = $_POST['adharid'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$party = $_POST['party'];
$constituency = $_POST['constituency'];

// Upload symbol image
$symbol = $_FILES['symbol']['name'];
$symbolTmpName = $_FILES['symbol']['tmp_name'];
$symbolPath = "symbols/" . $symbol;
move_uploaded_file($symbolTmpName, $symbolPath);

// Upload candidate photo
$photo = $_FILES['photo']['name'];
$photoTmpName = $_FILES['photo']['tmp_name'];
$photoPath = "photos/" . $photo;
move_uploaded_file($photoTmpName, $photoPath);

// Generate QR code using phpQRcode library
require_once('phpqrcode/qrlib.php');
$qrText = $adharid;
$qrCodeName = 'qrimages/' . $adharid . '.png';
QRcode::png($qrText, $qrCodeName, QR_ECLEVEL_L, 10);

// Perform SQL query to insert candidate data
$sql = "INSERT INTO candidates (adharid, name, phone, party, constituency, symbol, photo, qrimage,qrcode)
        VALUES ('$adharid', '$name', '$phone', '$party', '$constituency', '$symbol', '$photo', '$qrCodeName','$qrText')";

if ($conn->query($sql) === TRUE) {
    echo "Candidate registration successful!";
	header("Location: addcandidatesuccess.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	header("Location: addcandidatefail.html");
}

$conn->close();
?>
