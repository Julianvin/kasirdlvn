<?php

session_start();

if (!isset($_SESSION['kasir'])) {
    $_SESSION['kasir'] = array();
}

$totalHarga = 0;
foreach ($_SESSION['kasir'] as $item) {
  $totalHarga += $item['harga_barang'] * $item['jumlah_barang'];
}

$uangBayar = @$_POST['uang_bayar'];

$kembalian = $uangBayar - $totalHarga;

// Menampilkan hasil
if (isset($_POST['kirim'])) {
    if (!isset($uangBayar) || empty($uangBayar)) {
    } elseif ($uangBayar < $totalHarga) {
        echo "<div class='alert alert-danger'>Uang bayar tidak cukup!</div>";
    } else {

        $_SESSION['asep'] = [
            'kembalian' => $kembalian,
            'uang' => $uangBayar,
            'total' => $totalHarga
    ];

    // Redirect ke halaman struk
    header("Location:struk.php");
    exit;
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Disini</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Center the form horizontally */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5">Pembayaran Disini</h1>
        <form method="POST" action="" style="max-width: 400px; margin: 0 auto;">
            <div class="mb-3">
                <label for="masukkanUang" class="form-label">Masukkan Uang</label>
                <div class="input-group">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" name="uang_bayar" class="form-control" id="masukkanUang">
                </div>
            </div>
            <button type="submit" name="kirim" class="btn btn-primary">Bayar</button>
        </form>
    </div>
</body>

</html>
