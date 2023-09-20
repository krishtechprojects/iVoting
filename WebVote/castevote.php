<!-- Add this section to your existing dashboard.php code -->
<style>
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
<h3>Cast Your Vote:</h3>
<form action="vote.php" method="post">
  <div class="form-group">
    <label for="voterid">Voter ID:</label>
    <input type="text" class="form-control" id="voterid" name="voterid" required>
  </div>
  <div class="form-group">
    <label for="partyid">Party ID:</label>
    <input type="text" class="form-control" id="partyid" name="partyid" required>
  </div>
  <button type="submit" class="btn btn-primary">Cast Vote</button>
</form>
