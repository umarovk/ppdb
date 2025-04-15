<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$siswa = query("SELECT * FROM tbsiswa INNER JOIN tbjurusan ON tbjurusan.idjurusan = tbsiswa.idjurusan INNER JOIN tbgelombang ON tbgelombang.idgelombang = tbsiswa.idgelombang ORDER BY idsiswa DESC");

// var_dump($siswa);

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-pendaftaran-ppdb.xls");
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

<h1>Data Pendaftaran PPDB 2022/2023</h1>

<table cellpadding="15" cellspacing="1" class="table table-striped">

            <tr class="text-bg-info p-3">
                <th >No</th>
                <th >Nama</th>
                <!-- <th style="color: white;">Agama</th> -->
                <th >NIS</th>
                <!-- <th style="color: white;">kode daftar</th> -->
                <th >Gelombang</th>
                <th >Jurusan</th>
                <th >Agama</th>
                <th >NIK</th>
                <th >Kelamin</th>
                <th >Hp Siswa</th>
                <th >Tempat lahir</th>
                <th >Tanggal lahir</th>
                <th >Tinggi</th>
                <th >Berat</th>
                <th >Email</th>
                <th >Alamat</th>
                <th >Transport</th>
                <th >Sekolah asal</th>
                <th >NPSN</th>
                <th >NISN</th>
                <th >Ijazah</th>
                <th >SKHUN</th>
                <th >Nomor KIP</th>
                <th >Nomor KPS</th>
                <th >Nomor KKS</th>
                <th >Nomor Ujian Nasional</th>
                <th >Jumlah Saudara Kandung</th>
                <th >Akta lahir</th>
                <th >Kebutuhan khusus</th>
                <th >Jenis tinggal</th>
                <th >Nama Ayah</th>
                <th >Pendidikan Ayah</th>
                <th >Tempat lahir ayah</th>
                <th >Tanggal lahir ayah</th>
                <th >Alamat ayah</th>
                <th >Pekerjaan ayah</th>
                <th >Penghasilan ayah</th>
                <th >Nomor hp ayah</th>
                <th >Nama Ibu</th>
                <th >Pendidikan Ibu</th>
                <th >Tempat lahir Ibu</th>
                <th >Tanggal lahir Ibu</th>
                <th >Alamat Ibu</th>
                <th >Pekerjaan Ibu</th>
                <th >Penghasilan Ibu</th>
                <th >Nomor hp Ibu</th>
                <th >Nama Wali</th>
                <th >Pendidikan Wali</th>
                <th >Tempat lahir Wali</th>
                <th >Tanggal lahir Wali</th>
                <th >Alamat Wali</th>
                <th >Pekerjaan Wali</th>
                <th >Penghasilan Wali</th>
                <th >Nomor hp Wali</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($siswa as $ssw) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $ssw["nama"]; ?></td>
                    <td><?= $ssw["nis"]; ?></td>
                    <td><?= $ssw["gelombang"]; ?></td>
                    <td><?= $ssw["jurusan"]; ?></td>
                    <td><?= $ssw["agama"]; ?></td>
                    <td><?= $ssw["nik"]; ?></td>
                    <td><?= $ssw["gender"]; ?></td>
                    <td><?= $ssw["nomorhpsiswa"]; ?></td>
                    <td><?= $ssw["tempatlahir"]; ?></td>
                    <td><?= $ssw["tanggallahir"]; ?></td>
                    <td><?= $ssw["tinggi"]; ?></td>
                    <td><?= $ssw["berat"]; ?></td>
                    <td><?= $ssw["emailsiswa"]; ?></td>
                    <td><?= $ssw["alamat"]; ?></td>
                    <td><?= $ssw["transport"]; ?></td>
                    <td><?= $ssw["sekolahasal"]; ?></td>
                    <td><?= $ssw["npsn"]; ?></td>
                    <td><?= $ssw["nisn"]; ?></td>
                    <td><?= $ssw["ijasah"]; ?></td>
                    <td><?= $ssw["skhun"]; ?></td>
                    <td><?= $ssw["nokip"]; ?></td>
                    <td><?= $ssw["nokps"]; ?></td>
                    <td><?= $ssw["nokks"]; ?></td>
                    <td><?= $ssw["nomorun"]; ?></td>
                    <td><?= $ssw["jumlahsaudara"]; ?></td>
                    <td><?= $ssw["aktalahir"]; ?></td>
                    <td><?= $ssw["kebkhusus"]; ?></td>
                    <td><?= $ssw["jenistinggal"]; ?></td>
                    <td><?= $ssw["namaayah"]; ?></td>
                    <td><?= $ssw["pendidikanayah"]; ?></td>
                    <td><?= $ssw["tempatlahirayah"]; ?></td>
                    <td><?= $ssw["tanggallahirayah"]; ?></td>
                    <td><?= $ssw["alamatayah"]; ?></td>
                    <td><?= $ssw["pekerjaanayah"]; ?></td>
                    <td><?= $ssw["penghasilanayah"]; ?></td>
                    <td><?= $ssw["nomorhpayah"]; ?></td>
                    <td><?= $ssw["namaibu"]; ?></td>
                    <td><?= $ssw["pendidikanibu"]; ?></td>
                    <td><?= $ssw["tempatlahiribu"]; ?></td>
                    <td><?= $ssw["tanggallahiribu"]; ?></td>
                    <td><?= $ssw["alamatibu"]; ?></td>
                    <td><?= $ssw["pekerjaanibu"]; ?></td>
                    <td><?= $ssw["penghasilanibu"]; ?></td>
                    <td><?= $ssw["nomorhpibu"]; ?></td>
                    <td><?= $ssw["namawali"]; ?></td>
                    <td><?= $ssw["pendidikanwali"]; ?></td>
                    <td><?= $ssw["tempatlahirwali"]; ?></td>
                    <td><?= $ssw["tanggallahirwali"]; ?></td>
                    <td><?= $ssw["alamatwali"]; ?></td>
                    <td><?= $ssw["pekerjaanwali"]; ?></td>
                    <td><?= $ssw["penghasilanwali"]; ?></td>
                    <td><?= $ssw["nomorhpwali"]; ?></td>

                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    
</body>
</html>