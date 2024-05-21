<?php
$spec = $_POST['spec'];
$sal = $_POST['sal'];
$lin = $_POST['ll'];
$desc = $_POST['dd'];
$tit = $_POST['tt'];
$loc = $_POST['cc'];
$deb = $_POST['ddeb'];
$fin = $_POST['dfin'];
$comp_id = $_POST['company_id'];
$tp = $_POST['type'];

$conn = new mysqli('localhost', 'root', '1234', 'jobconnect');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO job_offers (company_id, title, description1 , location, salary_range, type, posted_date, close_date,status) VALUES (?, ?, ?, ?, ?, ?, ?, ?,'open');";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die('MySQL prepare error: ' . $conn->error);
}

$stmt->bind_param('isssisss', $comp_id, $tit, $desc, $loc, $sal, $tp, $deb, $fin);

if ($stmt->execute()) {
    echo "Offer registered successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
