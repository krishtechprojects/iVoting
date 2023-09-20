<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>i-Voting - Add Candidate</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */
	.add-candidate-panel {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      margin-top: 20px;
      width: 60%;
    }
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

<div class="container mt-4">
  <div class="add-candidate-panel">
  <h2>Add Candidate</h2>
  <form action="RegisterCandidate.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="adharid">Adhar ID:</label>
    <input type="text" class="form-control" id="adharid" name="adharid" pattern="[0-9]{12}" title="Adhar ID must be 12 digits" required>
  </div>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" pattern="[A-Za-z\s]+" title="Name must contain only letters" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" title="Phone number must be 10 digits" required>
  </div>
  <div class="form-group">
    <label for="party">Party:</label>
    <input type="text" class="form-control" id="party" name="party" required>
  </div>
  <div class="form-group">
    <label for="constituency">Constituency:</label>
    <textarea class="form-control" id="constituency" name="constituency" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="symbol">Symbol Image:</label>
    <input type="file" class="form-control-file" id="symbol" name="symbol" accept="image/*" required>
  </div>
  <div class="form-group">
    <label for="photo">Candidate Photo:</label>
    <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
  </div>
  <button type="submit" class="btn btn-primary">Register Candidate</button>
</form>

</div>
</div>
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
