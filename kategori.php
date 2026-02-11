<!DOCTYPE html>
<html>
<head>
    <title>Kategori Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .kategori-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        .kategori {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.2s ease;
        }

        .kategori:hover {
            transform: scale(1.05);
        }

        .kategori a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .kembali {
            display: block;
            text-align: center;
            margin-top: 30px;
            text-decoration: none;
            padding: 10px 20px;
            background-color:rgb(96, 219, 172);
            color: white;
            border-radius: 5px;
        }

        .kembali:hover {
            background-color:rgb(99, 184, 155);
        }
    </style>
</head>
<body>
    <h2>Kategori Produk</h2>

    <div class="kategori-grid">
        <div class="kategori"><a href="produk.php?kategori=Elektronik">Elektronik</a></div>
        <div class="kategori"><a href="produk.php?kategori=Fashion%20Pria">Fashion Pria</a></div>
        <div class="kategori"><a href="produk.php?kategori=Fashion%20Wanita">Fashion Wanita</a></div>
        <div class="kategori"><a href="produk.php?kategori=Aksesoris">Aksesoris</a></div>
        <div class="kategori"><a href="produk.php?kategori=Peralatan%20Rumah">Peralatan Rumah</a></div>
        <div class="kategori"><a href="produk.php?kategori=Kecantikan">Kecantikan</a></div>
        <div class="kategori"><a href="produk.php?kategori=Perlengkapan%20Kantor">Perlengkapan Kantor</a></div>
        <div class="kategori"><a href="produk.php?kategori=Mainan%20dan%20Hobi">Mainan & Hobi</a></div>
    </div>

    <a class="kembali" href="index.php">← Kembali ke Home</a>

    <!-- Footer -->
<footer>
&copy; <?= date("Y") ?> Toko Toko Neil firdaus 24101152610176. All rights reserved.
</footer>

</body>
</html>
