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

//------- var_dump($ids);
//------- cek lagi disini
// $siswa = query("SELECT * FROM tbpembayaran INNER JOIN tbsiswa ON tbpembayaran.idsiswa = tbsiswa.idsiswa WHERE tbpembayaran.idbiaya = $id")[0];

//------- var_dump($siswa);

$tampildatasiswa = query("SELECT * FROM tbsiswa INNER JOIN tbjurusan ON tbjurusan.idjurusan = tbsiswa.idjurusan INNER JOIN tbgelombang ON tbgelombang.idgelombang = tbsiswa.idgelombang WHERE idsiswa = $ids")[0];

$biayagel1 = "Rp. 550.000";
$biayagel2 = "Rp. 950.000";
$biayagel3 = "Rp. 1.100.000";

$gelombangke = $tampildatasiswa["gelombang"];


// PHP WAKTU INDONESIA
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

// PHP NOMOR SURAT SESUAI BULAN
function tgl_surat($tanggal)
{
    $bulan = array(
        1 =>   'I',
        'II',
        'III',
        'IV',
        'V',
        'VI',
        'VII',
        'VIII',
        'IX',
        'X',
        'XI',
        'XII'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan[(int)$pecahkan[1]];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/paper.css">
    <title>Surat Keterangan Diterima</title>

</head>

<body class="A4">
    <section class="sheet padding-10mm">

        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="img/cop-header.jpg" class="img-fluid" alt="cop surat" style="width: 200mm">

                </div>
            </div>
            <div class="row">
                <br>
                <div class="col">
                    <label for="nosurat">No &emsp;&emsp; : <?= $tampildatasiswa["idsiswa"] ?>/PPDB-A3/smk.c/wnd/<?= tgl_surat($currentDate = date('Y-m-d')) ?>/2023</label>
                    <!-- <?= $tampildatasiswa["idsiswa"] ?> -->
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="nosurat">Lamp &emsp;: -</label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="nosurat">Hal &emsp;&emsp;: <b>Pengumuman</b></label>
                </div>
            </div>

            <div class="row">
                <P style="margin-left:2em">
                    Kepada Yth.<b>
                        <br>Bpk/Ibu Wali Calon siswa Baru
                        <br>SMK Cokroaminoto Wanadadi 2023/2024
                        <br>di Tempat</b>
                    <br>
                </p>
                <img src="img/salam-open.jpg" alt="Assalamu'alaikum Wr. Wb.<br>" style="width:170px; margin-left:2em;">
                <p style="margin-left:2em; margin-right:4em; text-align: justify;">
                    Disampaikan dengan hormat, berkenaan dengan hasil penilaian <?= $gelombangke ?> oleh tim seleksi
                    calon pesera didik baru SMK Cokroaminoto Wanadadi Tahun Pelajaran 2023/2024,
                    kami beritahukan bahwa :

                </P>
            </div>
            <div class="row">
                <div class="col" style="margin-left:2em">
                    <label for="nama"><b> Nama &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</b></label>
                    <label for="isinama"><b> <?= $tampildatasiswa["nama"] ?></b></label>
                </div>
            </div>

            <div class="row">
                <div class="col" style="margin-left:2em">
                    <label for="jurusan"><b> Program keahlian&emsp;:</b></label>
                    <label for="jurusan"><b><?= $tampildatasiswa["jurusan"] ?></b></label>
                </div>
            </div>

            <div class="row">
                <div class="col" style="margin-left:2em">
                    <label for="sekolah"><b> Sekolah Asal&emsp;&emsp;&emsp;&nbsp;:</b></label>
                    <label for="sekolah"><b><?= $tampildatasiswa["sekolahasal"] ?></b></label>
                </div>
            </div>

            <div class="row">
                <div class="col" style="text-align: center; width:200mm">
                    <p><br>Dinyatakan :</p><br>
                    <p style="font-size:25px; margin-top:-30px; text-decoration-line: underline;"><b>DITERIMA / </b><b style="text-decoration-line: line-through">DITOLAK</b></p>
                    <p style="margin-top: -20px;">
                        Menjadi siswa SMK Cokroaminoto Wanadadi
                        <br>Tahun Pelajaran 2023/2024

                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p style="text-align: justify; margin-left:2em; margin-right:4em">
                        <br>Bersama ini kami ucapkan selamat dan kami berharap kesempatan ini dapat dimanfaatkan dengan sebaik-baiknya sebagai jalan menuju sukses meraih cita-cita dan masa depan putra-putri Bapak/Ibu.

                        <br><br>Adapun proses selanjutnya setelah diterima menjadi siswa SMK Cokroaminoto Wanadadi adalah melakukan daftar ulang dengan ketentuan sebagaimana terlampir.

                        <br><br>Demikian pemberitahuan ini kami sampaikan, atas perhatiannya kami sampaikan terima kasih.

                        <br><br>Billaahi fie Sabilil Haq

                    </P>
                </div>
                <img src="img/salam-close.png" alt="Assalamu'alaikum Wr. Wb.<br>" style="width:180px; margin-left:2em;">

            </div>


        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col" style="margin-left:100mm; text-align: center;">
                    <p>Wanadadi, <?= tgl_indo($currentDate = date('Y-m-d')) ?></p>
                    <p style="margin-top: -10px;">Kepala SMK Cokroaminoto Wanadadi</p>
                    <img src="img/ttd-kepsek.png" alt="" style="width:150px; margin-top:-20px;">
                    <p style="text-decoration: underline; margin-top:-10px;"><b>Soeprijadi, S.Kom</b></p>
                    <p style="margin-top: -10px;">NPPY. 20080714181</p>

                </div>
            </div>
        </div>
    </section>
</body>

</html>