<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>i-Voting - View All Users</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include custom CSS for styling -->
  <style>
    .container {
      margin-top: 20px;
    }
	
	.panel {
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }
	
	.table {
      background-color: #fff; /* White background for the table */
    }
	/* Custom styles */
    body {
      background: url('bg.jpg') no-repeat center center fixed;
      background-size: cover;
      background-color: #333; /* Fallback color if image is unavailable */
    }

    .navbar {
      background-color: rgba(255, 255, 255, 0.8);
    }

    .navbar-brand {
      color: #3498db;
      font-size: 24px;
      font-weight: bold;
    }

    .navbar-brand:hover {
      color: #e74c3c;
    }

    .nav-link {
      color: #333;
      transition: color 0.3s;
    }

    .nav-link:hover {
      color: #e67e22;
    }

    .jumbotron {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      margin-top: 20px;
    }

    .jumbotron h1 {
      color: #e74c3c;
      font-size: 48px;
      font-weight: bold;
    }

    .jumbotron p {
      color: #333;
      font-size: 18px;
    }
	.introduction-panel {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      margin-top: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .introduction-text {
      flex: 1;
      padding: 20px;
    }

    .introduction-text h2 {
      color: #e74c3c;
      font-size: 30px;
      margin-bottom: 10px;
    }

    .introduction-text p {
      color: #333;
      font-size: 18px;
    }

    .introduction-image {
      flex: 1;
      text-align: center;
    }

    .introduction-image img {
      max-width: 100%;
      border-radius: 5px;
    }
	body {
      background: url('bg.jpg') no-repeat center center fixed;
      background-size: cover;
      background-color: #333; /* Fallback color if image is unavailable */
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
    }

    .navbar-brand {
      font-size: 24px;
      font-weight: bold;
      transition: color 0.3s;
    }

    .navbar-brand .brand-i {
      color: #e74c3c; /* Red color for the "i" */
    }

    .navbar-brand .brand-voting {
      color: #3498db; /* Blue color for "Voting" */
    }

    .navbar-brand:hover .brand-i {
      color: #c0392b; /* Darker red color on hover */
    }

    .navbar-brand:hover .brand-voting {
      color: #2980b9; /* Darker blue color on hover */
    }

    .navbar-brand:hover {
      color: #e74c3c; /* Red color on hover */
    }

    .nav-link {
      color: #ffffff; /* White color for nav links */
      transition: color 0.3s;
    }

    .nav-link:hover {
      color: #3498db; /* Blue color on hover */
    }
  </style>
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
        <a class="nav-link" href="addCandidate.php">Add Candidate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewCandidates.php">View Candidates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewAllUsers.php">View Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="panel">
    <h2>View Candidates</h2>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Adhar ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
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

            // Fetch user data
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ahdarid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['dateofbirth'] . "</td>";
                echo "<td><a href='DeleteUser.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='6'>No users found.</td></tr>";
            }

            $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
