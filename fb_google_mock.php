<?php
ini_set('session.cookie_path','/');
session_start();

// Simulate Google login
$_SESSION['username'] = "Google User";
$_SESSION['user_id'] = 0; // 0 indicates a mocked user

// Redirect to your CRUD dashboard
header("Location: /assignment6/dashboard.php");
exit();
?>
    