<?php
session_start();

// Create connection
$conn = new mysqli('localhost', 'root', '1234', 'jobconnect');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password']; // This should be hashed and checked against a hashed password in the database
$type = $_POST['type'];
// Check if the username and password are correct (simple example)
if($type == 'pers'){
    $sql = "SELECT user_id, first_name, last_name FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // login success
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $email;

        header("Location: user_profile.php"); // Redirect to the profile page
        exit();
    } else {
        // login failed
        echo "Invalid username or password!";
    }
}
else{
    $sql = "SELECT company_id, name FROM companies WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // login success
    $user = $result->fetch_assoc();
    $_SESSION['company_id'] = $user['company_id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['website_url'] = $user['website_url'];
    $_SESSION['email'] = $email;

    header("Location: company_profile.php"); // Redirect to the profile page
    exit();
}
else {
    // login failed
    echo "Invalid username or password!";
}
}
$stmt->close();
$conn->close();

?>
