<?php
session_start();
session_unset();  // Unset all of the session variables.
session_destroy();  // Destroy the session.

header("Location: index.php");  // Redirect to home page or login page
exit();
?>
