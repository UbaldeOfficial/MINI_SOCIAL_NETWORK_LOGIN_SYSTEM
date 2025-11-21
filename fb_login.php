<?php
ini_set('session.cookie_path','/');
session_start();
require_once "db.php";

$error = "";

// Handle normal login
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'] ?? '';

    if(empty($email) || empty($password)){
        $error = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM fb_users WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                header("Location: fb_dashboard.php");
                exit();
            } else {
                $error = "Wrong password.";
            }
        } else {
            $error = "Account not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Facebook Login</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;}
        .login-box { background: white; padding: 40px; border-radius: 8px; width: 380px; box-shadow: 0 2px 10px rgba(0,0,0,0.2);}
        .login-box h2 { color: #1877f2; text-align: center; margin-bottom: 30px; }
        input[type="email"], input[type="password"] { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px; }
        button { width: 100%; padding: 12px; border: none; border-radius: 5px; color: white; font-weight: bold; cursor: pointer; }
        .login-btn { background: #1877f2; margin-bottom: 10px; }
        .google-btn { background: #db4437; margin-bottom: 10px; }
        .error { color: red; margin-bottom: 15px; text-align: center; }
        .register-link { text-align: center; margin-top: 15px; }
        .register-link a { text-decoration: none; color: #1877f2; }
        .fb-logo { display: block; margin: 0 auto 20px auto; width: 80px; }
    </style>
</head>
<body>

<div class="login-box">
    <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" 
         class="fb-logo" alt="Facebook Logo">
    <h2>Facebook Login</h2>

    <?php if($error) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login" class="login-btn">Login</button>
    </form>

    <form method="POST" action="fb_google_mock.php">
        <button type="submit" class="google-btn">Login with Google</button>
    </form>

    <div class="register-link">
        Don't have an account? <a href="fb_register.php">Register here</a>
    </div>
</div>

</body>
</html>
