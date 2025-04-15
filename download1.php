<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$siswa = query("SELECT * FROM tbpembayaran INNER JOIN tbsiswa ON tbpembayaran.idsiswa = tbsiswa.idsiswa INNER JOIN tbgelombang ON tbsiswa.idgelombang = tbgelombang.idgelombang INNER JOIN tbjurusan ON tbsiswa.idjurusan = tbjurusan.idjurusan");

// var_dump($siswa);

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-pembayaran-ppdb.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Data Pembayaran PPDB 2022/2023</h1>
    <table cellpadding="15" cellspacing="1" class="table table-striped">

        <tr class="text-bg-info p-3">
            <th>No</th>
            <th>Kode daftar</th>
            <th>Nama</th>
            <th>Kode Gelombang</th>
            <th>Kode Jurusan</th>
            <th>Jenis Biaya</th>
            <th>Nominal</th>
            <th>Tanggal</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($siswa as $ssw) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $ssw["kodedaftar"]; ?></td>
                <td><?= $ssw["nama"]; ?></td>
                <td><?= $ssw["gelombang"]; ?></td>
                <td><?= $ssw["jurusan"]; ?></td>
                <td><?= $ssw["jenisbiaya"]; ?></td>
                <td><?= $ssw["bayar"]; ?></td>
                <td><?= $ssw["tanggal"]; ?></td>
                <td><?= $ssw["keterangan"]; ?></td>
                <td>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        </tabel>
</body>

</html>