<?php 

session_start();

// Simulate a user login for demonstration purposes
// In a real application, this would be set when the user logs in
$is_logged_in = isset($_SESSION['user_id']);  // Check if a user is logged in
$c_logged_in = isset($_SESSION['company_id']);


?>




<!DOCTYPE html>
<html lang="en">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

        * {
          text-decoration: none;
          list-style: none;
          margin: 0;
          padding: 0;
        }
        /* Style pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        /* Style pour chaque section */
        .section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-right: 20px;
            margin-left: 20px;
            flex: 1;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Style pour les titres */
        h1, h2 {
            color: #333;
            margin-top: 0;
        }

        /* Style pour les listes à puces */
        ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        /* Style pour les liens */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Style pour le conteneur des palettes */
        .palette-container {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        /* Animation de survol */
        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Style pour le logo */
        .dropdown-menu {
            display: none; /* Hide dropdown by default */
            position: absolute; /* Position it at the bottom of the header */
            top: 70px;
            right: 0;
            padding: 20px 0 0 20px;
            width: 120px;
            height: 60vh;
            background-color: #fff; /* Match header background */
            box-shadow: 0 4px 8px rgba(0,0,0,0.3); /* Dropdown shadow */
            padding: 10px;
            border-radius: 5px;
        }
        .dropdown-menu li{
          padding: 10px;
          text-transform: uppercase;
          transform: all 0.2s;
          animation: fade 0.5s ease-in-out forwards;
        }

        .dropdown-menu li:hover{
          background-color: #c7c6c6;
        }

        .dropdown-menu a{
          color: #000000;
        }

        @keyframes fade{
          from{
            opacity: 0;
            transform: translateX(100px);
          }to{
            opacity: 1;
            transform: translateX(0);
          }
        }

        .footer-info {
            text-align: center;
            margin-top: 20px;
            font-size: small;
            color: #666;
        }
        .footer-info p {
            margin: 5px 0;
        }
        .footer-info a {
            color: #0056b3;
            text-decoration: none;
        }

        /* Animation de survol pour le logo */
        
    </style>
</head>
<body>
    <head>
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
                  
                <?php endif; ?>
              <?php endif; ?>
              <li><a href="about.html">About</a></li>
            </ul>
          </div>
        
    </head>
    <div id="myChoice" class="modal">
          <div class="modal-content">
            <p>Compte personnelle ou entreprise?</p>
            <button id="pers">personnelle</button>
            <button id="ent">Entreprise</button>
          </div>
        </div>
    <br>
    <br>
    <div class="palette-container">
        <div class="section" style="background-color: #ffe0b2;">
            <h1>Welcome to JobConnect – Bridging Opportunities, Connecting Talents</h1>
            <p>Are you a forward-thinking company seeking to expand your team with top-notch talent? Or perhaps you are a skilled professional eager to explore new career opportunities? Look no further than JobConnect, your gateway to a world of employment possibilities.</p>
        </div>

        <div class="section" style="background-color: #b3e5fc;">
            <h2>For Employers: Find Your Ideal Team Members</h2>
            <p>At JobConnect, we understand the pivotal role talent plays in the success of any business. Post your job openings, browse through a diverse pool of resumes, and connect with candidates who align with your company's vision. Our platform streamlines the hiring process, making it efficient and tailored to your unique needs.</p>
        </div>

        <div class="section" style="background-color: #c8e6c9;">
            <h2>For Job Seekers: Unlock Your Career Potential</h2>
            <p>JobConnect empowers job seekers by providing a platform to showcase their skills and experiences. Explore a multitude of job listings from leading companies, and apply to positions that match your expertise. Take the next step in your career journey with JobConnect – where opportunities meet ambition.</p>
        </div>
    </div>
    <script src="main.js"></script>
    <div class="palette-container">
        <div class="section" style="background-color: #ffe0b2;">
            <h2>Why Choose JobConnect?</h2>
            <ol>
                <li><strong>Efficient Matching:</strong> Our advanced algorithms ensure that employers find the right candidates, and job seekers discover positions that align with their skills and aspirations.</li>
                <li><strong>User-Friendly Interface:</strong> Navigate seamlessly through our user-friendly interface, whether you are an employer posting a job or a job seeker searching for the perfect opportunity.</li>
                <li><strong>Privacy and Security:</strong> Trust is paramount in our community. JobConnect prioritizes the privacy and security of your data, providing a safe environment for your job search or recruitment needs.</li>
            </ol>
        </div>

        <div class="section" style="background-color: #b3e5fc;">
            <h2>Join JobConnect Today!</h2>
            <p>Whether you're a dynamic company ready to grow or a talented professional seeking your next career move, JobConnect is the bridge to your success. Sign up today to unlock a world of opportunities and connections.</p>
        </div>
    </div>
    <div class="footer-info">
        <p>&copy; JobConnect</p>
        <p>Pour toute question ou assistance, n'hésitez pas à nous contacter :</p>
        <p>Email: <a href="mailto:rami.benamor@ensi_uma.tn">rami.benamor@ensi_uma.tn</a></p>
        <p>Téléphone: +216 57 911 341</p>
    </div>
</body>
</html>