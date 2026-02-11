<?php
session_start();

// Cek jika user sudah login
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: index.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Data login contoh (username: admin, password: admin123)
    if ($username == 'admin' && $password == 'admin123') {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background: #f5f5f5; }
        .login-box {
            max-width: 350px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 { text-align: center; }
        label { display: block; margin-top: 15px; }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-login {
            width: 100%;
            margin-top: 20px;
            background:rgb(106, 204, 175);
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-login:hover {
            background:rgb(110, 202, 148);
        }
        .error {
            color:rgb(255, 251, 0);
            background: #ffbaba;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
        .kembali {
            display: block;
            margin-top: 18px;
            text-align: center;
            color:rgb(0, 255, 128);
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn-login">Login</button>
    </form>
    <a class="kembali" href="index.php">&larr; Kembali ke Beranda</a>
</div>

</body>
</html>
