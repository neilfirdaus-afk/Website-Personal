<?php

// Testimoni awal (default)
$testimoni_default = [
    ["nama" => "Yusuf Andrianto", "pesan" => "Produk yang saya beli bagus dan pengirimannya cepat!"],
    ["nama" => "Yuni Rahmawati", "pesan" => "Pelayanan sangat ramah dan responsif. Terima kasih toko ABC!"],
    ["nama" => "Budi Santoso", "pesan" => "Kualitas produknya oke banget, sesuai dengan deskripsi."],
    ["nama" => "Dewi Prasetya", "pesan" => "Harganya terjangkau dan barangnya sesuai deskripsi."],
    ["nama" => "Dika Martinez", "pesan" => "Suka banget belanja di sini, banyak pilihan produk menarik!"],
];

// Inisialisasi session testimoni baru
if (!isset($_SESSION['testimoni_baru'])) {
    $_SESSION['testimoni_baru'] = [];
}

// Menyimpan testimoni baru dari form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $pesan = htmlspecialchars(trim($_POST['pesan']));

    if (!empty($nama) && !empty($pesan)) {
        $_SESSION['testimoni_baru'][] = ["nama" => $nama, "pesan" => $pesan];
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .testimoni-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .nama {
            font-weight: bold;
            color: #333;
        }

        .pesan {
            font-style: italic;
            color: #555;
            margin-top: 10px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 30px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input[type="text"],
        form textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form button {
            background-color:rgb(141, 219, 152);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color:rgb(141, 219, 152);
        }
    </style>
</head>
<body>
    <h2>Testimoni Pelanggan</h2>

    <div class="testimoni-container">
        <?php
        // Menampilkan testimoni default
        foreach ($testimoni_default as $testimoni) {
            echo '<div class="card">';
            echo '<p class="nama">' . $testimoni['nama'] . '</p>';
            echo '<p class="pesan">' . $testimoni['pesan'] . '</p>';
            echo '</div>';
        }

        // Menampilkan testimoni baru dari session
        if (!empty($_SESSION['testimoni_baru'])) {
            foreach ($_SESSION['testimoni_baru'] as $testimoni) {
                echo '<div class="card">';
                echo '<p class="nama">' . $testimoni['nama'] . '</p>';
                echo '<p class="pesan">' . $testimoni['pesan'] . '</p>';
                echo '</div>';
            }
        }
        ?>
    </div>

    <form method="post">
        <h3>Berikan Testimoni Anda</h3>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" rows="4" required></textarea>

        <button type="submit">Kirim Testimoni</button>
    </form>

</body>
</html>
