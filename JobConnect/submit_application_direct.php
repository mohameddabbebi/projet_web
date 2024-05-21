<?php
session_start();
$conn = new mysqli('localhost', 'root', '1234', 'jobconnect');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to apply.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $job_id = $_POST['job_id'];
    

    // Insert the application into the database
    $sql = "INSERT INTO applications (job_id, user_id, application_date, stat) VALUES (?, ?, CURDATE(), 'submitted')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$job_id, $user_id])) {
        echo "Application submitted successfully!";
        // Optionally redirect or do further processing
    } else {
        echo "An error occurred.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
