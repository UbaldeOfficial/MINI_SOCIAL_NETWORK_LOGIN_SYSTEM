<?php
ini_set('session.cookie_path','/');
session_start();
require_once "db.php";

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if(empty($username) || empty($email) || empty($password) || empty($confirm)){
        $error = "All fields are required.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email address.";
    } elseif(strlen($password) < 6){
        $error = "Password must be at least 6 characters.";
    } elseif($password !== $confirm){
        $error = "Passwords do not match.";
    } else {
        // Check if email exists
        $stmt = $conn->prepare("SELECT * FROM fb_users WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            $error = "Email is already registered.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO fb_users (username,email,password) VALUES (?,?,?)");
            $stmt->bind_param("sss",$username,$email,$hashed);
            if($stmt->execute()){
                $success = "Account created successfully. <a href='fb_login.php'>Login here</a>.";
            } else {
                $error = "Error: ".$conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Facebook Register</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; padding: 50px; }
        .register-box { background: white; padding: 30px; border-radius: 8px; max-width: 400px; margin: auto; }
        input { width: 100%; padding: 10px; margin-bottom: 10px; }
        button { width: 100%; padding: 10px; background: #1877f2; color: white; border: none; border-radius: 5px; }
        .error { color: red; }
        .success { color: green; }
        a { color: #1877f2; }
    </style>
</head>
<body>

<div class="register-box">
    <h2>Facebook Register</h2>
    <?php if($error) echo "<div class='error'>$error</div>"; ?>
    <?php if($success) echo "<div class='success'>$success</div>"; ?>

    <form method="POST">
        Username:<br>
        <input type="text" name="username" required><br>
        Email:<br>
        <input type="email" name="email" required><br>
        Password:<br>
        <input type="password" name="password" required><br>
        Confirm Password:<br>
        <input type="password" name="confirm_password" required><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="fb_login.php">Login here</a></p>
</div>

</body>
</html>
