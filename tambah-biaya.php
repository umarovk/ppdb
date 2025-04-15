<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// $id = $_GET["nama"];

// $siswa = query("SELECT * FROM tbpembayaran INNER JOIN tbsiswa ON tbpembayaran.idsiswa = tbsiswa.idsiswa WHERE tbsiswa.idsiswa = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>

    <div class="container">
        <h1>Form Input data Pembayaran</h1>

        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <label for="namasiswa" class="form-label">Nama Siswa</label>
                    <input type="text" placeholder="nama siswa" class="form-control mb-4">
                    <label for=" kodedaftar" class="form-label">Kode Daftar</label>
                    <input type="text" placeholder="Masukan Kode daftar" class="form-control mb-4">
                </div>

                <div class="col">
                    <label for="jenisbiaya" class="form-label">Jenis Biaya</label>
                    <input type="text" placeholder="Masukan Kode daftar" class="form-control mb-4">

                    <label for="kodedaftar" class="form-label">Kode Daftar</label>
                    <input type="text" placeholder="Masukan Kode daftar" class="form-control mb-4">
                </div>

            </div>


        </form>

    </div>

</body>

</html>