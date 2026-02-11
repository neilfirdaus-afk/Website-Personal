<!DOCTYPE html>
<html>
<head>
    <title>Kontak Kami</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            max-width: 800px;
            margin: auto;
            line-height: 1.6;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .kontak-info {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 0 5px rgba(0,0,0,0.05);
        }

        .form-kontak {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.05);
        }

        input[type=text], input[type=email], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #75e4b073;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #75e4b073;
        }

        .kembali {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #75e4b073;
            color: #fff;
            border-radius: 5px;
        }

        .kembali:hover {
            background-color: #75e4b073;
        }
    </style>
</head>
<body>

    <h2>Hubungi Kami</h2>

    <div class="kontak-info">
        <p><strong>Toko NEIL17</strong></p>
        <p>Jl. Contoh No. 123, Padang, Sumatera Barat</p>
        <p>Email: tokohNEIL17@gmail.com</p>
        <p>Telepon/WA: 0882-7733-8852</p>
        <p>Instagram: <a href="https://instagram.com/tok0habibi0164" target="_blank">@tokoabc</a></p>
    </div>

    <div class="form-kontak">
        <h3>Formulir Pesan Singkat</h3>
        <form method="POST" action="">
            Nama: <input type="text" name="nama" required>
            Email: <input type="email" name="email" required>
            Pesan: <textarea name="pesan" rows="5" required></textarea>
            <button type="submit" name="kirim">Kirim</button>
        </form>

        <?php
        if (isset($_POST['kirim'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $email = htmlspecialchars($_POST['email']);
            $pesan = htmlspecialchars($_POST['pesan']);

            echo "<p style='margin-top:20px; color:green;'>Terima kasih, <strong>$nama</strong>. Pesan Anda telah terkirim!</p>";
        }
        ?>
    </div>

    <div style="text-align: center;">
        <a class="kembali" href="index.php">← Kembali ke Home</a>
    </div>

</body>
</html>