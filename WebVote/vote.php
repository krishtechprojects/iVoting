<!-- CastVote.php -->

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ivoting";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$voterid = $_POST['voterid'];
$partyid = $_POST['partyid'];

$checkQuery = "SELECT * FROM votes WHERE voterid = '$voterid'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows == 0) {
    $insertQuery = "INSERT INTO votes (voterid, partyid, voted) VALUES ('$voterid', '$partyid', 'Yes')";
    if ($conn->query($insertQuery) === TRUE) {
        $updateQuery = "UPDATE countvote SET count = count + 1 WHERE partyid = '$partyid'";
        if ($conn->query($updateQuery) !== TRUE) {
            echo "Error updating party vote count: " . $conn->error;
        } else {
            echo "Vote recorded successfully. Thank you for voting!";
        }
    } else {
        echo "Error recording vote: " . $conn->error;
    }
} else {
    echo "You have already voted.";
}

$conn->close();
?>
