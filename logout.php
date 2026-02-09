<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy session
session_destroy();

// Clear session cookies (if applicable)
if (ini_get("session.use_cookies")) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Redirect to homepage
header("Location: index.php");
exit();
?>
