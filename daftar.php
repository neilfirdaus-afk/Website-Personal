<?php
session_start();

$error = "";
$success = "";

// Simpan data user sementara di session (tanpa database)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    $konfirmasi = $_POST["konfirmasi"] ?? "";

    if ($username == "" || $password == "" || $konfirmasi == "") {
        $error = "Semua kolom wajib diisi!";
    } elseif ($password != $konfirmasi) {
        $error = "Konfirmasi password tidak cocok!";
    } else {
        // Simpan akun ke session (bisa disesuaikan jika pakai database nantinya)
        $_SESSION["akun"][$username] = [
            "username" => $username,
            "password" => $password
        ];

        $success = "Registrasi berhasil! Silakan login.";
        header("Refresh:2; url=login.php"); // Redirect ke login setelah 2 detik
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f0f0f0;
        }

        .register-box {
            width: 400px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 8px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .btn-register {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-register:hover {
            background: #218838;
        }

        .error, .success {
            text-align: center;
            margin-top: 10px;
        }

        .error { color: red; }
        .success { color: green; }

        .kembali {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="register-box">
    <h2>Registrasi</h2>
    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php elseif ($success): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="konfirmasi" required>

        <button type="submit" class="btn-register">Daftar</button>
    </form>

    <a class="kembali" href="login.php">Sudah punya akun? Login di sini</a>
</div>
</body>
</html>
