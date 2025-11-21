<?php
ini_set('session.cookie_path','/');
session_start();

// Protect pages: only logged-in users can access
if(!isset($_SESSION['username'])){
    header("Location: fb_login.php");
    exit();
}
?>
    