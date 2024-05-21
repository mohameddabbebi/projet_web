<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "jobconnect";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$query = "SELECT application_id, title, user_id, application_date, cover_letter, stat FROM applications a,job_offers j WHERE user_id = ? and j.job_id=a.job_id";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id); // 'i' denotes the type of the parameter, 'i' stands for integer
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Applications</title>
    <link rel="stylesheet" href="style1.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General body and page styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding-top: 80px; /* Added space for fixed header */
}

/* Header styling */




/* Table styling */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

th, td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}

/* Footer styling */
.footer-info {
    text-align: center;
    padding: 20px;
    background-color: white;
    color: black;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.footer-info a {
    color: #9cdf97;
}
.hh{
    text-align: center;
}
    </style>
</head>
<body>
<div class="head">
    <img src="logo1.png.png" alt="logo_projet" style="border-radius: 50%; width: 50px; height: 50px;">
    <div id="hamburger-icon" onclick="toggleMenu()" style="font-size: 24px; cursor: pointer; margin-right: 25px;">
        <i class="fas fa-bars"></i>
    </div>
  </div>
  <div class="dropdown-menu" id="navbar">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="about.php">About</a></li>
  </div>

<br><br><br><br><br>
    <h1 class="hh">USER APPLICATION</h1>
    <?php
    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Application ID</th><th>Job title</th><th>User ID</th><th>Date</th><th>Status</th></tr>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["application_id"] . '</td>';
            echo '<td>' . $row["title"] . '</td>';
            echo '<td>' . $row["user_id"] . '</td>';
            echo '<td>' . $row["application_date"] . '</td>';
            echo '<td>' . $row["stat"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

  <div class="footer-info">
    <p>&copy; JobConnect</p>
    <p>Pour toute question ou assistance, n'hésitez pas à nous contacter :</p>
    <p>Email: <a href="mailto:rami.benamor@ensi_uma.tn">rami.benamor@ensi_uma.tn</a></p>
    <p>Téléphone: +216 57 911 341</p>
  </div>
  <script src="main.js"></script>
</body>
</html>
