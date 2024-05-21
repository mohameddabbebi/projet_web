<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "jobconnect";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $application_id = $_POST['application_id'];
    $new_status = $_POST['new_status'];

    // Validate input and check authorization
    if (isset($_SESSION['company_id'], $application_id, $new_status)) {
        // Update query with a JOIN to check company_id in the job_offers table
        $query = "UPDATE applications a 
                  JOIN job_offers j ON a.job_id = j.job_id 
                  SET a.stat = ? 
                  WHERE a.application_id = ? AND j.company_id = ?";
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param('sii', $new_status, $application_id, $_SESSION['company_id']);
            if ($stmt->execute()) {
                header ('Location: company_applications.php');
            } else {
                echo "Error updating status.";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Invalid input or not authorized.";
    }
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
