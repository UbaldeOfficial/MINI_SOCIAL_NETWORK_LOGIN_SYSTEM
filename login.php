<?php
ini_set('session.cookie_path','/');
session_start();
require_once "db.php";

$error = "";

// Handle normal login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure keys exist
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                // Redirect to existing CRUD dashboard
                header("Location: /assignment6/dashboard.php");
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
        body { font-family: Arial, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;}
        .login-box { background: white; padding: 40px; border-radius: 8px; width: 380px; box-shadow: 0 2px 10px rgba(0,0,0,0.2);}
        .login-box h2 { color: #1877f2; margin-bottom: 30px; text-align: center;}
        input[type="email"], input[type="password"] { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 15px;}
        button { width: 100%; padding: 12px; background-color: #1877f2; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer;}
        button:hover { background-color: #165ec9; }
        .error { color: red; margin-bottom: 15px; text-align: center;}
        .google-btn { background: #db4437; margin-top: 10px; width: 100%; padding: 12px; border: none; color: white; font-size: 16px; border-radius: 6px; cursor: pointer;}
        .google-btn:hover { background: #c1351d; }
        .register-link { text-align: center; margin-top: 20px;}
        .register-link a { color: #1877f2; text-decoration: none; font-weight: bold;}
        .register-link a:hover { text-decoration: underline;}
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Facebook Login</h2>
        <?php if($error) echo "<div class='error'>$error</div>"; ?>
        <form method="POST">
            Email:<br>
            <input type="email" name="email" required><br>
            Password:<br>
            <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
        <form action="fb_google_mock.php" method="POST">
            <button type="submit" class="google-btn">Login with Google</button>
        </form>
        <div class="register-link">
            Don't have an account? <a href="fb_register.php">Register here</a>
        </div>
    </div>
</body>
</html>
