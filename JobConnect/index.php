<?php
// Start the session
session_start();

// Simulate a user login for demonstration purposes
// In a real application, this would be set when the user logs in
$is_logged_in = isset($_SESSION['user_id']);  // Check if a user is logged in
$c_logged_in = isset($_SESSION['company_id']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Site Emploi</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .salem{
      display: flex;
      align-items: center;
      margin-left: 10% ;
    }
    .section {
            background-color: rgb(190, 206, 235);
            padding: 20px;
            width: 400px;
            border-radius: 10px;
            margin-right: 20px;
            margin-left: 20px;
            flex: 1;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
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
  <br><br><br><br><br>
  <div>
    <h1 id="ti1">Bienvenue sur Votre Site Emploi</h1>
    <a href="jobs.php"><button class="bu_r">Les offres</button></a>
  </div>  
  <div class="cco">
      <video src="invideo-ai-720 JobConnect_ Your Gateway to Opportunitie 2024-04-04.mp4" controls class="vid"></video>
      <br>
      <br>
      <br>
      <div class="salem">
      <p class="section">
      For Job Seekers: Unlock Your Career Potential
JobConnect empowers job seekers by providing a platform to showcase their skills and experiences. Explore a multitude of job listings from leading companies, and apply to positions that match your expertise. Take the next step in your career journey with JobConnect – where opportunities meet ambition.
      </p>
      </div>
      <img src="32b6b60931b8fa90fdde9de97a571949.jpg" alt="" class="vid">
      <br>
      <br>
      <br>
      <div class="salem">
      <p class="section" >
      For Employers: Find Your Ideal Team Members
At JobConnect, we understand the pivotal role talent plays in the success of any business. Post your job openings, browse through a diverse pool of resumes, and connect with candidates who align with your company's vision. Our platform streamlines the hiring process, making it efficient and tailored to your unique needs
      </p>
      </div>
      <img src="entreprise.jpeg" alt="" class="vid">
      <br>
      <br>
      <br>
      <br>
      <div class="salem">
      <p class="section">
      Why Choose JobConnect?
Efficient Matching: Our advanced algorithms ensure that employers find the right candidates, and job seekers discover positions that align with their skills and aspirations.
User-Friendly Interface: Navigate seamlessly through our user-friendly interface, whether you are an employer posting a job or a job seeker searching for the perfect opportunity.
Privacy and Security: Trust is paramount in our community. JobConnect prioritizes the privacy and security of your data, providing a safe environment for your job search or recruitment needs
      </p>
      </div>
      <img src="close-up-gens-affaires-travaillant-documents_1098-1263.avif" alt=""class="vid">
      <p>Explorez des offres d'emploi ou trouvez le candidat idéal.</p>
      <p>Pour continuer, connectez-vous ou inscrivez-vous :</p>
  </div>
  <div class="footer-info">
    <p>&copy; JobConnect</p>
    <p>Pour toute question ou assistance, n'hésitez pas à nous contacter :</p>
    <p>Email: <a href="mailto:rami.benamor@ensi_uma.tn">rami.benamor@ensi_uma.tn</a></p>
    <p>Téléphone: +216 57 911 341</p>
  </div>

  <script src="main.js"></script>
  <script>
    document.getElementById('insc').addEventListener('click', function() {
        console.log('Clicked!');
    });
  </script>

</body>
</html>