<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_connect.html");
    exit();
}

// Database configuration
$host = 'localhost';
$username = 'root';
$password = '1234';
$dbname = 'jobconnect';

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$user_id = $_SESSION['user_id'];
$userQuery = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    exit('No such user found.');
}
$user = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
  
    <link rel="stylesheet" type="text/css" href="user_pro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="head">
    <img src="logo1.png.png" alt="logo_projet" style="border-radius: 50%; width: 50px; height: 50px;">
    <div id="hamburger-icon" onclick="toggleMenu()" style="font-size: 24px; cursor: pointer; margin-right: 25px;">
        <i class="fas fa-bars"></i>
    </div>
  
  <div class="dropdown-menu" id="navbar">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="about.php">About</a></li>
  </div>

</div>
<br><br><br><br><br><br>
<h1 id='welcome'>Welcome, <?php echo htmlspecialchars($user['first_name']); ?></h1>
<div class="container-main">

    <div class="sidebar">
        <ul>
            <li><a href="jobs.php">Job Offers</a></li>
            <li><a href="user_applications.php">My Applications</a></li>
        </ul>
    </div>
    <div class="profile-container">
        <p>ID: <?php echo $user['user_id']; ?></p>
        <p>Name: <?php echo htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    </div>

</div>
    <div class="footer-info">
    
    <p>&copy; JobConnect</p>
    <p>Pour toute question ou assistance, n'hésitez pas à nous contacter :</p>
    <p>Email: <a href="mailto:rami.benamor@ensi_uma.tn">rami.benamor@ensi_uma.tn</a></p>
    <p>Téléphone: +216 57 911 341</p>
  </div>
  <script src='main.js'></script>
</body>
</html>
