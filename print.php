<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$id = $_GET["id"];
$ids = $_GET["ids"];

// var_dump($ids);
// cek lagi disini
$siswa = query("SELECT * FROM tbpembayaran INNER JOIN tbsiswa ON tbpembayaran.idsiswa = tbsiswa.idsiswa WHERE tbpembayaran.idbiaya = $id")[0];
// var_dump($siswa);

$tampildatasiswa = query("SELECT * FROM tbsiswa INNER JOIN tbjurusan ON tbjurusan.idjurusan = tbsiswa.idjurusan INNER JOIN tbgelombang ON tbgelombang.idgelombang = tbsiswa.idgelombang WHERE idsiswa = $ids")[0];

$biayagel1 = "Rp. 550.000";
$biayagel2 = "Rp. 950.000";
$biayagel3 = "Rp. 1.100.000";

$gelombangke = $tampildatasiswa["gelombang"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <script src="bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.js"></script>

    <title>Print Kwitansi</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col">
                <img src="img/logo smk cokro.png" alt="logo smkc" style="width: 140px; margin-left:20px;">

                <h1 class="text-center" style="margin-top:-120px;">SMK COKROAMINOTO WANADADI</h1>
                <h5 class="text-center">Jl. Hos. Cokroaminoto No. 02 Wanadadi Banjarnegara</h5>
                <h5 class="text-center">Jawa Tengah 53461 Telp. 0812 2645 3837</h5>
                <hr class="text border-10 opacity-100">
                <h4 class="text-center">Bukti Pendaftaran <br> PPDB 2023/2024</h4>
            </div>
        </div>
        <div class="row" style="margin-left: 100px;">

            <div class="col">
                <label for="nopen"> No. Pendaftaran </label>
                <label for="isinopen">: <?= $siswa["kodedaftar"] ?></label>
            </div>

            <div class="col">
                <label for="tanggal"> Tanggal </label>
                <label for="isitanggal">: <?= $siswa["tanggal"] ?></label>
            </div>

        </div>

        <div class="row" style="margin-left: 100px;">

            <div class="col">
                <label for="nama"> Nama </label>
                <label for="isinama">: <?= $tampildatasiswa["nama"] ?></label>
            </div>

            <div class="col">
                <label for="jurusan"> Jurusan </label>
                <label for="isijurusan">: <?= $tampildatasiswa["jurusan"] ?></label>
            </div>

        </div>
        <hr class="text border-10 opacity-100">

        <div class="row">
            <div class="col">
                <h4 class="text-center">Kwitansi Pembayaran Daftar Ulang <br> <?= $tampildatasiswa["gelombang"] ?></h4>
                <p>Pembayaran daftar ulang <?= $gelombangke ?> sebesar <?php
                                                                        if ($gelombangke == "Gelombang 1") {
                                                                            echo $biayagel1;
                                                                        } elseif ($gelombangke == "Gelombang 2") {
                                                                            echo $biayagel2;
                                                                        } elseif ($gelombangke == "Gelombang 3") {
                                                                            echo $biayagel3;
                                                                        } else {
                                                                            echo "data gelombang error";
                                                                        }
                                                                        ?></p>

                <p>Telah dibayarkan sejumlah : Rp. <?= number_format($siswa["nominal"], 0, ',', '.'); ?></p>

                <p>
                    Terimakasih telah bergabung di SMK Cokroaminoto Wanadadi. Kwitansi ini sebagai bukti pembayaran peserta didik baru 2023-2024. Mohon disimpan dengan baik.
                </p>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p class="fw-bold">Diterima :</p>
                Bahan Osis
                <br>Bahan Pramuka
                <br>Atribut, dasi, topi, badge
            </div>
            <div class="col text-center">
                <p class="fw-bold">&nbsp;</p>
                <input type="radio" class="form-check-input">
                <br><input type="radio" class="form-check-input">
                <br><input type="radio" class="form-check-input">
            </div>
            <div class="col">

            </div>
            <div class="col">
                <p class=" text-center">Petugas</p>
                <br>
                <br>
                <p class=" text-center"><?= $siswa["petugas"] ?></p>

            </div>
            <div class="col">
                <p class="text-center">Bendahara</p>
                <br>
                <br>
                <p class=" text-center">(. . . . . . . . . . . . . . . . . . .)</p>

            </div>
        </div>
    </div>
</body>
<!-- <script>
    window.print();
</script> -->

</html>