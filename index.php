<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


// use CodeIgniter\Database\Query;

require 'functions.php';


// pagination
// konfirmasi
$Jumlahdataperhalaman = 10;
$Jumlahdata = count(query("SELECT * FROM tbsiswa"));
$Jumlahhalaman = ceil($Jumlahdata / $Jumlahdataperhalaman);
$Halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$Awaldata = ($Jumlahdataperhalaman * $Halamanaktif) - $Jumlahdataperhalaman;

$siswa = query("SELECT * FROM tbsiswa INNER JOIN tbjurusan ON tbjurusan.idjurusan = tbsiswa.idjurusan INNER JOIN tbgelombang ON tbgelombang.idgelombang = tbsiswa.idgelombang ORDER BY idsiswa DESC LIMIT $Awaldata, $Jumlahdataperhalaman");


// jika tombol cari di klik - variabel query akan ditimpa dengan variable cari -
if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

//ambil data dari tabel siswa / query data siswa
// $result = mysqli_query($conn, "SELECT * FROM tbsiswa");

// cek jika query error - tidak untuk user interface
// if (!$result) {
// echo mysqli_error($conn);
// }

// tampilkan isi dari tabel - baca lagi tentang fetch
// while untuk perulangan atau keluarkan semua data yang ada
// while ($siswa = mysqli_fetch_assoc($result)) {
// var_dump($siswa["nama"]);
// }

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

    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.js">

    </script>

    <title>PPDB</title>
</head>

<body>
    <!-- NAVBAR -->
    <div class="container">
        <div class="row">
            <div class="col bg-info fixed-top">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a href="../ppdb/">
                            <img src="img/logo smkc wnd.png" alt="" style="width: 50px ;">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="tambah.php">Input data
                                        <img src="img/add.svg" alt="Bootstrap" width="30" height="24">

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a onclick="window.open('data-siswa-download.php')" class="nav-link" href="#">
                                        <img src="img/folder-download.svg" alt="Bootstrap" width="30" height="24">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a onclick="window.open('download.php')" class="nav-link" href="#">
                                        <img src="img/person-hearts.svg" alt="Bootstrap" width="30" height="24">
                                    </a>
                                </li>
                            </ul>

                            <!-- <form action="" method="POST" class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2" name="cari">Cari</button>
                            </form> -->
                            <form action="" method="POST" class="d-flex" role="search">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control me-2" autofocus placeholder="Masukan nama siswa" autocomplete="off" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                    <button type="submit" class="btn btn-light" type="button" id="button-addon2" name="cari">Cari</button>
                                </div>
                            </form>
                            <ul>
                                <li class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <a class="nav-link text-white" href="logout.php">keluar
                                        <img src="img/logout.svg" alt="Bootstrap" width="30" height="24">

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    </div>
    <!-- END NAVBAR -->


    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col text-center">
                <img src="img/logo smkc wnd.png" alt="" style="width: 150px ;">
                <p class="fs-3">Pendaftaran Peserta Didik Baru</p>
                <P class="fs-1">SMK Cokroaminoto Wanadadi</P>


            </div>
        </div>


        <br>

        <!-- BUTTON TAMBAH DATA -->
        <!-- <div class="row">
            <div class="col">
                <a class="btn btn-info fw-bold text-light" href="tambah.php">Input Data</a>
                <a onclick="window.open('data-siswa-download.php')" style="background-color:#5F9EA0;" class="btn btn-success fw-bold text-light" href="">Export data siswa</a>
                <a onclick="window.open('download.php')" style="background-color:#5F9EA0;" class="btn btn-success fw-bold text-light" href="">Export data pembayaran</a>
                <br><br>
            </div>
        </div> -->


        <!-- BUTTON CARI -->
        <!-- <form action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" autofocus placeholder="Masukan kata pencarian.." autocomplete="off" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2" name="cari">Cari</button>
            </div>
        </form> -->

        <table cellpadding="15" cellspacing="1" class="table table-striped">

            <tr class="text-bg-info p-3">
                <th style="color: white;">No</th>
                <th style="color: white; width:300px;">Nama</th>
                <!-- <th style="color: white;">Agama</th> -->
                <th style="color: white;">NIS</th>
                <!-- <th style="color: white;">kode daftar</th> -->
                <th style="color: white;">Gelombang</th>
                <th style="color: white;">Jurusan</th>
                <th style="color: white;">Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($siswa as $ssw) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $ssw["nama"]; ?></td>
                    <!-- <td><?= $ssw["agama"]; ?></td> -->
                    <td><?= $ssw["nis"]; ?></td>
                    <!-- <td>Harusnya kode daftar</td> -->
                    <td><?= $ssw["gelombang"]; ?></td>
                    <td><?= $ssw["jurusan"]; ?></td>
                    <td>
                        <a href="hapus.php?id=<?= $ssw["idsiswa"]; ?>" onclick="return confirm('yakin dihapus?')" class="btn btn-danger btn-sm" style="">
                            <img src="img/trash.svg" alt="Bootstrap" width="15" height="15">
                        </a> <!-- firur konfirmasi true false, jika benar maka di eksekusi dan sebaliknya -->
                        <a href="ubah.php?id=<?= $ssw["idsiswa"]; ?>" class="btn btn-info text-light btn-sm">
                            <img src="img/edit.svg" alt="Bootstrap" width="15" height="15">
                        </a>
                        <a href="biaya.php?id=<?= $ssw["idsiswa"]; ?>" class="btn-success text-dark btn-sm">
                            <img src="img/money.svg" alt="Bootstrap" width="17" height="17">
                        </a>

                        <!-- <a href="" class="btn btn-success btn-sm">&ensp;Cetak&ensp;</a> -->
                    </td>

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>



        <div class="row">
            <div class="col">
                <!-- navigasi pagination -->
                <!-- previous kiri jika ada -->
                <ul class="pagination">

                    <?php if ($Halamanaktif > 1) : ?>
                        <li class="page-item">
                            <a href="?halaman=<?= $Halamanaktif - 1; ?>" class="page-link">Previous</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $Jumlahhalaman; $i++) : ?>
                        <?php if ($i == $Halamanaktif) : ?>
                            <li class="page-item">
                                <a style="font-weight:bold;" href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>

                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a href="?halaman=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                            </li>

                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($Halamanaktif < $Jumlahhalaman) : ?>
                        <li class="page-item">
                            <a href="?halaman=<?= $Halamanaktif + 1; ?>" class="page-link">Next</a>

                        </li>
                    <?php endif; ?>
                </ul>

                <!-- pagination selesai -->
            </div>
        </div>

    </div>

</body>

</html>