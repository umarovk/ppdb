<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
error_reporting(0);
$id = $_GET["id"];

$siswa = query("SELECT * FROM tbpembayaran INNER JOIN tbsiswa ON tbpembayaran.idsiswa = tbsiswa.idsiswa WHERE tbsiswa.idsiswa = $id");
$siswadelete = query("SELECT * FROM tbpembayaran INNER JOIN tbsiswa ON tbpembayaran.idsiswa = tbsiswa.idsiswa WHERE tbsiswa.idsiswa = $id")[0];
$alldata = query("SELECT * FROM tbsiswa INNER JOIN tbgelombang ON  tbgelombang.idgelombang = tbsiswa.idgelombang WHERE tbsiswa.idsiswa = $id");

// sintak untuk menghitung pembayaran
$totalbayar = query("SELECT SUM(bayar) AS total_bayar FROM tbpembayaran INNER JOIN tbsiswa ON tbpembayaran.idsiswa = tbsiswa.idsiswa WHERE tbsiswa.idsiswa = $id")[0];

// var_dump($deletebiaya);
// var_dump($siswa);
// var_dump($alldata);
// var_dump($siswadelete);
// var_dump($siswadelete["idbiaya"]);
// var_dump($siswa["0"]["idgelombang"]);

$tampildatasiswa = query("SELECT * FROM tbsiswa WHERE idsiswa = $id")[0];
// echo ($tampildatasiswa["nama"]);
// var_dump($tampildatasiswa["namasiswa"]);

// cek apakah tombol submit sudah diklik
if (isset($_POST["submit"])) {


    // cek apakah tambah datanya berhasil
    if (tambahbiaya($_POST) > 0) {
        echo "
        <script>
        // alert ('data berhasil ditambah!');
        document.location.href = 'biaya.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert ('data gagal ditambah!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}



$data_gel = ($alldata["0"]["idgelombang"]);

// var_dump($data_gel);

// buat if untuk kode daftar - ditaruh form input kode
// if ($data_gel == 1) {
//     echo "G1";
// } elseif ($data_gel == 2) {
//     echo "G2";
// } elseif ($data_gel == 3) {
//     echo "G3";
// } else {
//     echo "KODE-GELOMBANG-ERROR";
// }


//convert string to currency Rupiah
function rupiah($totalbayar)
{

    $hasil_rupiah = "Rp " . number_format($totalbayar, 2, ',', '.');
    return $hasil_rupiah;
}

// conver string to float menggunakan floatval()
$btnterima = floatval($totalbayar["total_bayar"]);

?>

<script type="text/javascript">
    function numberonly(input) {
        var num = /[^0-9]/gi;
        input.value = input.value.replace(num, "");
    }
</script>

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
    <title>Biaya</title>
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
                            <!-- <form action="" method="POST" class="d-flex" role="search">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control me-2" autofocus placeholder="Masukan nama siswa" autocomplete="off" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                    <button type="submit" class="btn btn-light" type="button" id="button-addon2" name="cari">Cari</button>
                                </div>
                            </form> -->
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

        <div class="row">
            <div class="col text-center">
                <br><br>
                <a href="#" class="link-primary">
                    <img src="img/logo smk cokro.png" alt="" style="width: 150px ;">
                </a>
                <br>
                <br>
                <h1 class="text-center">Form Pembayaran Siswa Baru<br>SMK Cokroaminoto Wanadadi</h1>
            </div>
        </div>
        <!-- BUTTON TAMBAH DATA -->
        <br>
        <br>
        <!-- <div class="row">
            <div class="col-2">
                <a class="btn btn-info fw-bold text-light" href="tambah-biaya.php?nama=<?= $ssw["idsiswa"]; ?>">Input Pembayaran</a>
                <br><br>
            </div>
        </div> -->


        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <label for="namasiswa" class="form-label">Nama Siswa</label>
                    <input type="text" placeholder="nama siswa" class="form-control mb-4" name="namasiswa" value="<?= $tampildatasiswa["nama"] ?>">

                    <label for="kodedaftar" class="form-label">Kode Daftar</label>
                    <!-- OTOMATIS ISI KODE DAFTAR -->
                    <input type="text" placeholder="Masukan Kode daftar" class="form-control mb-4" name="kodedaftar" value="IS<?= $tampildatasiswa["idsiswa"] ?>/<?php if ($data_gel == 1) {
                                                                                                                                                                        echo "G1";
                                                                                                                                                                    } elseif ($data_gel == 2) {
                                                                                                                                                                        echo "G2";
                                                                                                                                                                    } elseif ($data_gel == 3) {
                                                                                                                                                                        echo "G3";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo "KODE-GELOMBANG-ERROR";
                                                                                                                                                                    } ?>/001">

                    <label for="tanggalbayar" class="form-label">Tanggal transaksi</label>
                    <!-- <input type="text" placeholder="Masukan Kode daftar" class="form-control mb-4"> -->
                    <div class="input-group date" id="datepicker3">
                        <input type="text" class="form-control mb-3" placeholder="Tanggal" name="tanggalbayar" required>
                        <span class="input-group-append">
                            <span class="input-group-text bg-white" style="margin-bottom:1rem;">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>

                        <script type="text/javascript">
                            $(function() {
                                $('#datepicker3').datepicker();
                            });
                        </script>
                    </div>
                    <label for="petugas" class="form-label">Nama petugas</label>
                    <input type="text" placeholder="Nama petugas" class="form-control mb-4" name="petugas" required>
                </div>

                <div class="col">

                    <input type="hidden" id="disabledTextInput" class="form-control" value="<?= $tampildatasiswa["idsiswa"] ?>" name="idsiswa" for="idsiswa">

                    <label for="jenisbiaya" class="form-label">Jenis Biaya</label>
                    <input type="text" placeholder="Pembarayan ke - " value="Pembarayan ke - " class="form-control mb-4" name="jenisbiaya" required>

                    <label for="bayar" class="form-label">Nominal</label>
                    <input type="text" placeholder="Masukan Nominal" class="form-control mb-4" name="bayar" onkeyup="numberonly(this)" required>

                    <label for=" keterangan" class="form-label">Keterangan</label>
                    <input type="text" placeholder="Keterangan" class="form-control mb-4" name="keterangan">

                    <div class="row">

                        <div class="col d-grid gap-2 col-6 mx-auto mb-5">
                            <button type="submit" name="submit" onclick="return confirm('yakin disimpan?')" class="btn btn-primary">Simpan</button>

                        </div>
                        <div class="col d-grid gap-2 col-6 mx-auto mb-5">
                            <!-- <button type="submit" name="submit" class="btn btn-primary">Home</button> -->
                            <a class="btn btn-secondary" href="../ppdb" role="button" onclick="return confirm('yakin ingin kembali?')">Kembali</a>

                        </div>
                    </div>

                </div>
            </div>

    </div>
    </form>


    <div class="container">
        <div class="row">
            <div class="col">
                <table cellpadding="15" cellspacing="1" class="table table-striped">

                    <tr class="text-bg-info p-3">
                        <th style="color: white;">No</th>
                        <th style="color: white;">Nama</th>
                        <th style="color: white;">Kode daftar</th>
                        <th style="color: white;">Jenis Biaya</th>
                        <th style="color: white;">Nominal</th>
                        <th style="color: white;">Tanggal</th>
                        <th style="color: white;">Keterangan</th>
                        <th style="color: white;">Aksi</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $ssw) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $ssw["nama"]; ?></td>
                            <td><?= $ssw["kodedaftar"]; ?></td>
                            <td><?= $ssw["jenisbiaya"]; ?></td>
                            <td><?= $ssw["bayar"]; ?></td>
                            <td><?= $ssw["tanggal"]; ?></td>
                            <td><?= $ssw["keterangan"]; ?></td>
                            <td>

                                <!-- sintak delete masih rancu -->
                                <!-- <a href="hapusbiaya.php?id=<?= $siswadelete["idbiaya"]; ?>" onclick="return confirm('yakin dihapus?')" class="btn btn-danger btn-sm" style="">&ensp;Hapus&ensp;</a> -->

                                <a onclick="return confirm('yakin dihapus?')" class="btn btn-danger text-light" onclick="return confirm('yakin dihapus?')" href="hapusbiaya.php?id=<?= $ssw["idbiaya"]; ?>&ids=<?= $tampildatasiswa["idsiswa"] ?>" role="button" target="_blank">
                                    <img src="img/trash.svg" alt="Bootstrap" width="25" height="25"></a>

                                <!-- <a class="btn btn-info text-light" href="print.php?id=<?= $ssw["idbiaya"]; ?>&ids=<?= $tampildatasiswa["idsiswa"] ?>" role="button" target="_blank">Print</a> -->
                                <a class="btn btn-info text-light" href="print-kwitansi.php?id=<?= $ssw["idbiaya"]; ?>&ids=<?= $tampildatasiswa["idsiswa"] ?>" role="button" target="_blank">
                                    kwitansi &nbsp;<img src="img/bills.svg" alt="Bootstrap" width="25" height="25"></a>

                                <!-- <a class="btn btn-success text-light" href="surat-terima.php?id=<?= $ssw["idbiaya"]; ?>&ids=<?= $tampildatasiswa["idsiswa"] ?>" role="button" target="_blank">
                                    Kartu terima &nbsp;<img src="img/paper.svg" alt="Bootstrap" width="25" height="25"></a> -->



                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <br>
                <h3>Total Pembayaran = <?= rupiah($totalbayar["total_bayar"]); ?></h3>

                <a class="btn btn-success text-light" href="surat-terima.php?id=<?= $ssw["idbiaya"]; ?>&ids=<?= $tampildatasiswa["idsiswa"] ?>" role="button" target="_blank">
                        Surat terima &nbsp;<img src="img/paper.svg" alt="Bootstrap" width="25" height="25"></a>

                <!-- <?php if ($btnterima >= 300000) :  ?>
                    <a class="btn btn-success text-light" href="surat-terima.php?id=<?= $ssw["idbiaya"]; ?>&ids=<?= $tampildatasiswa["idsiswa"] ?>" role="button" target="_blank">
                        Surat terima &nbsp;<img src="img/paper.svg" alt="Bootstrap" width="25" height="25"></a>


                <?php else : ?>
                    <p>Belum memenuhi syarat untuk cetak surat diterima</p>

                <?php endif; ?> -->
                <br><br>
            </div>
        </div>
    </div>
</body>


</html>