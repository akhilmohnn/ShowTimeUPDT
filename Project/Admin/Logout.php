<?php
// Start or resume the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other page after logout
header("Location: ../Guest/login.php");
exit();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout Example</title>
</head>
<body>
    <h1>Welcome, User!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
