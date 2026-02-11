<?php
session_start();

// Inisialisasi keranjang jika belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// Hapus item
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['keranjang'][$index]);
    $_SESSION['keranjang'] = array_values($_SESSION['keranjang']); // reset index
    header("Location: keranjang.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            max-width: 900px;
            margin: auto;
            background-color: #f8f8f8;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .hapus-btn {
            color: red;
            text-decoration: none;
            font-weight: bold;
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

<h2>Keranjang Belanja Anda</h2>

<?php if (empty($_SESSION['keranjang'])): ?>
    <p>Keranjang masih kosong.</p>
<?php else: ?>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        $grandTotal = 0;
        foreach ($_SESSION['keranjang'] as $index => $item): 
            $total = $item['harga'] * $item['jumlah'];
            $grandTotal += $total;
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $item['nama'] ?></td>
            <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
            <td><?= $item['jumlah'] ?></td>
            <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
            <td><a href="?hapus=<?= $index ?>" class="hapus-btn" onclick="return confirm('Hapus item ini dari keranjang?')">Hapus</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="4">Total Belanja</th>
            <th colspan="2">Rp <?= number_format($grandTotal, 0, ',', '.') ?></th>
        </tr>
    </table>
<?php endif; ?>

<a class="kembali" href="produk.php">← Lanjut Belanja</a>

</body>
</html>
