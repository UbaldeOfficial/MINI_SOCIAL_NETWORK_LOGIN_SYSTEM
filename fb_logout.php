<?php
ini_set('session.cookie_path','/');
session_start();
session_unset();
session_destroy();

// Redirect to login page
header("Location: fb_login.php");
exit();
?>
