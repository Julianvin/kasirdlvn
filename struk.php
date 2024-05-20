<?php
session_start();

// Pastikan session kasir dan asep ada dan berisi data
if (!isset($_SESSION['kasir']) || !isset($_SESSION['asep']) || empty($_SESSION['kasir']) || empty($_SESSION['asep'])) {
    echo "Terjadi kesalahan. Silahkan kembali ke halaman awal.";
    exit;
}

$kembalian = $_SESSION['asep']['kembalian'];
$uang = $_SESSION['asep']['uang'];
$total = $_SESSION['asep']['total'];

// Menampilkan struk
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .struk {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .struk h1 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        .struk p {
            margin-bottom: 10px;
            line-height: 1.5;
            color: #555;
        }

        .btn-back {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto 0;
        }

        .footer-text {
            font-size: 12px;
            text-align: center;
            margin-top: 20px;
            color: #888;
        }

        .garis {
            border-top: 1px dashed #ccc;
            margin: 20px 0;
        }

        .ikon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            margin: 0 auto 20px;
        }

        .ikon i {
            font-size: 24px;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="struk">
            <div class="ikon"><i class="bi bi-receipt"></i></div>
            <h1>Struk Belanja</h1>
            <hr class="garis">
            <?php foreach ($_SESSION['kasir'] as $item) : ?>
                <p><?= $item['nama_barang'] ?> - <?= $item['jumlah_barang'] ?> x Rp <?= number_format($item['harga_barang']) ?></p>
            <?php endforeach; ?>
            <hr class="garis">
            <p class="total">Total: Rp <?= number_format($total) ?></p>
            <p>Uang Bayar: Rp <?= number_format($uang) ?></p>
            <p>Kembalian: Rp <?= number_format($kembalian) ?></p>
        </div>
        <button type="submit" name="kembali" class="btn btn-primary btn-back"><a href="reset.php" class="text-white" style="text-decoration: none;">Kembali</a></button>
        <p class="footer-text">Terima kasih atas kunjungan Anda!</p>
    </div>
</body>

</html>