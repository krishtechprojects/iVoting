<?php
session_start();

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

// Fetch candidate data
$sql = "SELECT * FROM candidates";
$result = $conn->query($sql);

$candidatesData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $candidatesData[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>i-Voting - Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include custom CSS for styling -->
  <style>
    .container {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.html">i-Voting</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <h3>Election Polls Opens till 5PM</h3>
  
  <!-- Countdown Timer -->
  <div id="countdown"></div>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Party</th>
        <th>Photo</th>
        <th>Party Symbol</th>
        <th>QR Image</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($candidatesData as $candidate) {
          echo "<tr>";
          echo "<td>" . $candidate['name'] . "</td>";
          
		  echo "<td>" . $candidate['party'] . "</td>";
		  echo "<td align='center'><img src='photos/" . $candidate['photo'] . "' alt='Party Symbol' width='100' height='100'></td>";
          echo "<td align='center'><img src='symbols/" . $candidate['symbol'] . "' alt='Party Symbol' width='100' height='100'></td>";
          echo "<td align='center'><img src='" . $candidate['qrimage'] . "' alt='QR Image' width='150' height='150'></td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Countdown Timer Script -->
<script>
  // Set the target time (5 PM)
  const targetTime = new Date();
  targetTime.setHours(23, 0, 0, 0);

  // Update the countdown every second
  const countdown = document.getElementById('countdown');
  const interval = setInterval(() => {
    const now = new Date().getTime();
    const timeLeft = targetTime - now;

    if (timeLeft <= 0) {
      clearInterval(interval);
      window.location.href = 'electionover.html'; // Redirect to electionover.html when time is up
    } else {
      const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

      countdown.innerHTML = `Time left: ${hours}h ${minutes}m ${seconds}s`;
    }
  }, 1000);
</script>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
