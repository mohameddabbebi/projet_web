<?php

$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$password = $_POST["password"];
$genre = isset($_POST["gender"]) ? $_POST["gender"] : 'Not specified';  // Default value if not set
$cv = $_POST['cv'];

try
{
$conn = new mysqli('localhost','root','1234','jobconnect');

}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Get the current date and time
    $registrationDate = date('Y-m-d H:i:s');

    // Prepare an SQL statement to insert the new user
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password ,registration_date,gender,resume) VALUES (?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssssss", $prenom, $nom, $email,$password ,$registrationDate,$genre,$cv);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Account created successfully";
        header ('Location: user_connect.html');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();





?>