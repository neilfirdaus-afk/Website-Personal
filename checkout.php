                                <?php
session_start();

// Simpan data pembeli dan tampilkan konfirmasi (tanpa database)
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telepon = htmlspecialchars($_POST['telepon']);

    $pesan = "<h3>Terima kasih, $nama!</h3>
    <p>Pesanan Anda telah kami terima dan akan dikirim ke:</p>
    <p><strong>Alamat:</strong> $alamat</p>
    <p><strong>Telepon:</strong> $telepon</p>
    <p>Total belanja: <strong>Rp" . number_format(totalBelanja(), 0, ',', '.') . "</strong></p>";

    // Kosongkan keranjang setelah checkout
    unset($_SESSION['keranjang']);
}

// Hitung total
function totalBelanja() {
    $total = 0;
    if (isset($_SESSION['keranjang'])) {
        foreach ($_SESSION['keranjang'] as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }
    }
    return $total;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { text-align: center; }
        .form-checkout {
            max-width: 400px;
            margin: 0 auto;
            background: #fafafa;
            padding: 20px;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #fcec;
            border-radius: 5px;
        }
        .btn-submit {
            margin-top: 20px;
            background-color::rgb(6, 3, 49);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color:rgb(6, 3, 49);
        }
        .ringkasan {
            max-width: 600px;
            margin: 20px auto;
        }
        .ringkasan table {
            width: 100%;
            border-collapse: collapse;
        }
        .ringkasan th, .ringkasan td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .pesan {
            max-width: 600px;
            margin: 30px auto;
            background: #e8f5e9;
            padding: 20px;
            border-radius: 10px;
            color::rgb(21, 20, 32);
        }
        .kembali {
            display: block;
            text-align: center;
            margin-top: 30px;
            text-decoration: none;
            color:rgb(24, 25, 27);
        }
    </style>
</head>
<body>

<h2>Checkout</h2>

<?php if ($pesan): ?>
    <div class="pesan"><?= $pesan ?></div>
<?php elseif (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])): ?>
    <p style="text-align:center;">Keranjang Anda kosong, <a href="produk.php">Belanja dulu yuk</a> 😊</p>
<?php else: ?>
<div class="ringkasan">
    <h3>Ringkasan Belanja</h3>
    <table>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($_SESSION['keranjang'] as $item): ?>
        <tr>
            <td><?= $item['nama'] ?></td>
            <td><?= $item['jumlah'] ?></td>
            <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
            <td>Rp<?= number_format($item['harga'] * $item['jumlah'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" style="text-align:right;">Total:</td>
            <td>Rp<?= number_format(totalBelanja(), 0, ',', '.') ?></td>
        </tr>
    </table>
</div>

<div class="form-checkout">
    <form method="post">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>Alamat Pengiriman</label>
        <textarea name="alamat" rows="3" required></textarea>

        <label>No. Telepon</label>
        <input type="text" name="telepon" required>

        <button class="btn-submit" type="submit">Kirim Pesanan</button>
    </form>
</div>
<?php endif; ?>

<a class="kembali" href="index.php">← Kembali ke Beranda</a>

</body>
</html>
