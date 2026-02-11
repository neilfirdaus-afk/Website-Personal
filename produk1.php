<?php
session_start();

// Tambah produk ke keranjang
if (isset($_GET['beli'])) {
    $produkList = [
        "1" => ["nama" => "Kaos Polos Pria", "harga" => 45000],
        "2" => ["nama" => "Headset Bluetooth", "harga" => 120000],
        "3" => ["nama" => "Tumbler Stainless", "harga" => 35000],
        "4" => ["nama" => "Mouse Wireless", "harga" => 75000],
        "5" => ["nama" => "Jam Dinding", "harga" => 60000],
        "6" => ["nama" => "Lampu LED USB", "harga" => 15000],
        "7" => ["nama" => "Dompet Kulit", "harga" => 85000],
        "8" => ["nama" => "Sandal Wanita Fashion", "harga" => 55000],
        "9" => ["nama" => "Power Bank 10.000mAh", "harga" => 125000],
        "10" => ["nama" => "Notebook A5", "harga" => 20000],
    ];

    $id = $_GET['beli'];
    if (isset($produkList[$id])) {
        $item = $produkList[$id];
        $item['jumlah'] = 1;
        $_SESSION['keranjang'][] = $item;
        header("Location: keranjang.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .produk-kolom {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .produk {
            padding: 10px;
            text-align: center;
            border: 0;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }

        .produk img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .produk:hover {
            transform: scale(1.03);
            background-color: #fff;
        }

        .beli-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .beli-btn:hover {
            background-color: #218838;
        }

        .kembali {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }

        .kembali:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Produk Kami</h2>

<div class="produk-kolom">
    <?php
    // Daftar produk lengkap
    $produk = [
        "1" => ["nama" => "Kaos Polos Pria", "harga" => 45000, "deskripsi" => "Kaos cotton combed 100%, nyaman dipakai.", "gambar" => "https://via.placeholder.com/150"],
        "2" => ["nama" => "Headset Bluetooth", "harga" => 120000, "deskripsi" => "Wireless headset dengan suara jernih.", "gambar" => "https://via.placeholder.com/150"],
        "3" => ["nama" => "Tumbler Stainless", "harga" => 35000, "deskripsi" => "Botol minum tahan panas dan dingin.", "gambar" => "https://via.placeholder.com/150"],
        "4" => ["nama" => "Mouse Wireless", "harga" => 75000, "deskripsi" => "Mouse ergonomis tanpa kabel.", "gambar" => "https://via.placeholder.com/150"],
        "5" => ["nama" => "Jam Dinding", "harga" => 60000, "deskripsi" => "Jam dinding minimalis dan elegan.", "gambar" => "https://via.placeholder.com/150"],
        "6" => ["nama" => "Lampu LED USB", "harga" => 15000, "deskripsi" => "Lampu USB mini, cocok untuk laptop.", "gambar" => "https://via.placeholder.com/150"],
        "7" => ["nama" => "Dompet Kulit", "harga" => 85000, "deskripsi" => "Dompet kulit asli pria, awet dan stylish.", "gambar" => "https://via.placeholder.com/150"],
        "8" => ["nama" => "Sandal Wanita Fashion", "harga" => 55000, "deskripsi" => "Sandal modis dan nyaman dipakai.", "gambar" => "https://via.placeholder.com/150"],
        "9" => ["nama" => "Power Bank 10.000mAh", "harga" => 125000, "deskripsi" => "Pengisian cepat, tahan lama.", "gambar" => "https://via.placeholder.com/150"],
        "10" => ["nama" => "Notebook A5", "harga" => 20000, "deskripsi" => "Buku catatan dengan desain menarik.", "gambar" => "https://via.placeholder.com/150"]
    ];

    // Tampilkan produk
    foreach ($produk as $id => $item) {
        echo '<div class="produk">';
        echo '<img src="' . $item["gambar"] . '" alt="' . $item["nama"] . '">';
        echo '<h3>' . $item["nama"] . '</h3>';
        echo '<p>' . $item["deskripsi"] . '</p>';
        echo '<p><strong>Rp' . number_format($item["harga"], 0, ',', '.') . '</strong></p>';
        echo '<a class="beli-btn" href="produk.php?beli=' . $id . '">Beli</a>';
        echo '</div>';
    }
    ?>
</div>

<div style="text-align: center;">
    <a class="kembali" href="index.php">← Kembali ke Home</a>
</div>

</body>
</html>
