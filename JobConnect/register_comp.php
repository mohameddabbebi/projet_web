<?php


$nom = $_POST["nom"];
$addr =  $_POST["addr"];
$ind =  $_POST["ind"];
$curl =  $_POST["curl"];
$email = $_POST["email"];
$password = $_POST["password"];



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

    // Prepare an SQL statement to insert the new user
    $stmt = $conn->prepare("INSERT INTO companies (name, location ,industry	,website_url ,email	,password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",  $nom,$addr ,$ind,$curl,$email,$password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "comany registred successfuly";
        header ('Location: user_connect.html');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

header ('Location: user_connect.html');





?>