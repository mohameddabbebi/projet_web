<?php
// Connexion à la base de données

$conn = new mysqli('localhost', 'root', '1234', 'jobconnect');
session_start();
// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION['user_id']) && !isset($_SESSION['company_id'])) {
  header("Location: user_connect.html");
  exit();
}

$comp_id = $_SESSION['company_id'];
$is_logged_in = isset($_SESSION['user_id']);  // Check if a user is logged in
$c_logged_in = isset($_SESSION['company_id']);
// Requête SQL pour récupérer toutes les offres d'emploi
$sql = "SELECT * FROM job_offers j , companies c where j.company_id=c.company_id and c.company_id = ?" ;
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $comp_id);
$stmt->execute();
$result = $stmt->get_result();

// Vérification s'il y a des résultats
if ($result->num_rows > 0) {
  echo '<br><br><br><br><br>';
  while($row = $result->fetch_assoc()) {
      echo '<div class="eee">';
      echo '<div class="ent">';
      echo '<div class="ioii">';
      echo '<h2 class="ioii">Poste : ' . $row["title"] . '</h2>';
      echo '</div>';
      echo '<img src="logo1.png" alt="" id="imgg"><br>';
      echo '<p class="ioi">' . $row["description1"] . '</p>';
      echo '<br><br>';
      echo '<p class="ioi"> From: ' . $row["posted_date"] . '</p><br>';
      echo '<p class="ioi"> To   :  ' . $row["close_date"] . '</p>';
      echo '<br>';
      echo '<div class="ioi">';
      echo '</div>';
      echo '</div>';
  }
} else {
  echo "Aucune offre d'emploi trouvée.";
}


// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
</head>
<body>
  <div class="head">
    <img src="logo1.png.png" alt="logo_projet" style="border-radius: 50%; width: 50px; height: 50px;">
    <div id="hamburger-icon" onclick="toggleMenu()" style="font-size: 24px; cursor: pointer; margin-right: 25px;">
        <i class="fas fa-bars"></i>
    </div>
  </div>
  <div class="dropdown-menu" id="navbar">
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <?php if ($is_logged_in): ?>
        <li><a href="user_profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <?php if ($c_logged_in): ?>
          <li><a href="company_profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href='#' id='connec' onclick="">Login</a></li>
          <li><a href='#' id='insc'  onclick="">Sign In</a></li>
        <?php endif; ?>
      <?php endif; ?>
      <li><a href="about.php">About</a></li>
    </ul>
  </div>

<div id="myChoice" class="modal">
  <div class="modal-content">
    <p>Compte personnelle ou entreprise?</p>
    <button id="pers">personnelle</button>
    <button id="ent">Entreprise</button>
  </div>
</div>
<div id="myChoice" class="modal">
  <div class="modal-content">
    <p>Compte personnelle ou entreprise?</p>
    <button id="pers">personnelle</button>
    <button id="ent">Entreprise</button>
  </div>
</div>
  <br><br><br><br><br>
        <div class="footer-info">
          <p>&copy; JobConnect</p>
          <p>Pour toute question ou assistance, n'hésitez pas à nous contacter :</p>
          <p>Email: <a href="mailto:rami.benamor@ensi_uma.tn">rami.benamor@ensi_uma.tn</a></p>
          <p>Téléphone: +216 57 911 341</p>
        </div>
        <script src="main.js"></script>
</body>
</html>