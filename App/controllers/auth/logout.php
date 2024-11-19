<?php
session_start(); // Ensure the session is started

// Destroy the session and clear session data
$_SESSION = [];
session_destroy();

// Clear session cookie if set
$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 3600, 
    $params["path"], 
    $params["domain"], 
    $params["secure"], 
    $params["httponly"]
);

header("Location: /login"); // Redirect to login page
exit(); // Make sure no further code is executed
?>
