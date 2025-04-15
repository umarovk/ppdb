<?php

session_start();

// jika tidak mempunyai var session dengan key login, maka lempar ke login.php
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// cek apakah tombol submit sudah diklik
if (isset($_POST["submit"])) {


    // cek apakah tambah datanya berhasil
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert ('data berhasil ditambah!');
        document.location.href = 'index.php';
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


    // - coding lama - //
    // if (mysqli_affected_rows($conn) > 0) {
    //     echo "berhasil!";
    // } else {
    //     echo "gaga";
    //     echo "<br>";
    //     echo mysqli_errno($conn);
    // }
}


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
    <script src="bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.js"></script>
    <title>Tambah Siswa</title>
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
        <!-- Content here -->

        <div class="row">
            <div class="col text-center">
                <br>
                <br>
                <br>
                <img src="img/logo smk cokro.png" alt="" style="width: 200px ;">
                </a>
                <h1 class="text-center mb-5">Tambah Data Siswa</h1>
            </div>
        </div>

        <form action="" method="post">
            <div class="row">
                <div class="col">



                    <label for="nama" class="form-label">Nama</label>
                    <input autocomplete="off" type="text" name="nama" id="nama" class="form-control mb-3 " placeholder="Masukan nama" required>

                    <div class="row">
                        <div class="col">

                            <select name="jurusan" id="jurusan" class="form-select mb-3" aria-label="Default select example" required>
                                <option value="">Pilih jurusan</option>
                                <?php
                                $sql_jurusan = mysqli_query($conn, "SELECT * FROM tbjurusan") or die(mysqli_errno($conn));
                                while ($data_jurusan = mysqli_fetch_array($sql_jurusan)) {
                                    echo '<option value="' . $data_jurusan['idjurusan'] . '">' . $data_jurusan['jurusan'] . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col">

                            <select name="gelombang" id="gelombang" class="form-select" aria-label="Default select example" required>
                                <option value="">Pilih gelombang</option>
                                <?php
                                $sql_gelombang = mysqli_query($conn, "SELECT * FROM tbgelombang") or die(mysqli_errno($conn));
                                while ($data_gelombang = mysqli_fetch_array($sql_gelombang)) {
                                    echo '<option value="' . $data_gelombang['idgelombang'] . '">' . $data_gelombang['gelombang'] . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="agama" class="form-label">Agama</label>
                            <input autocomplete="off" type="text" name="agama" id="agama" class="form-control mb-4" value="Islam">
                        </div>
                        <div class="col">
                            <label for="nik" class="form-label">NIK</label>
                            <input autocomplete="off" type="text" name="nik" id="nik" class="form-control mb-4" onkeyup="numberonly(this)">
                            <!-- onkeyup="numberonly(this)" -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="gender" class="form-label">Jenis Kelamin</label>

                            <select name="gender" id="gender" class="form-select mb-4" required>
                                <option selected>Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="nomorhpsiswa" class="form-label">Nomor Hp Siswa</label>
                            <input autocomplete="off" type="text" name="nomorhpsiswa" id="nomorhpsiswa" class="form-control mb-4" onkeyup="numberonly(this)">
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">


                            <label for="tempatlahir" class="form-label">Tempat lahir</label>
                            <input autocomplete="off" type="text" name="tempatlahir" id="tempatlahir" class="form-control mb-3" placeholder="Tempat lahir">

                            <div class="row">
                                <div class="col">
                                    <label for="tinggi" class="form-label">Tinggi badan</label>
                                    <input autocomplete="off" type="text" name="tinggi" id="tinggi" class="form-control mb-3" placeholder="Tinggi" onkeyup="numberonly(this)">
                                </div>
                                <div class="col">
                                    <label for="berat" class="form-label">Berat badan</label>
                                    <input autocomplete="off" type="text" name="berat" id="berat" class="form-control mb-3" placeholder="Berat" onkeyup="numberonly(this)">
                                </div>
                            </div>




                            <label for="alamat" class="form-label">Alamat</label>
                            <!-- <input type="textarea" name="alamat" id="alamat" class="form-control mb-3"> -->
                            <textarea class="form-control" aria-label="With textarea" name="alamat" id="alamat" placeholder="Dusun, RT/RW, Desa, Kecamatan, Kabupaten, Provinsi, Kodepos"></textarea>

                        </div>


                        <div class=" col">

                            <label for="tanggallahir" class="form-label">Tanggal lahir</label>
                            <div class="input-group date" id="datepicker">
                                <input autocomplete="off" type="text" class="form-control" placeholder="Tanggal lahir" name="tanggallahir">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white" style="margin-bottom:1rem;">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>

                                <script type="text/javascript">
                                    $(function() {
                                        $('#datepicker').datepicker();
                                    });
                                </script>
                            </div>


                            <label for="emailsiswa" class="form-label mt-2">Email Siswa</label>
                            <input autocomplete="off" type="text" name="emailsiswa" id="emailsiswa" class="form-control mb-3" placeholder="E-mail">


                            <label for="transport" class="form-label">transport</label>
                            <input autocomplete="off" type="text" name="transport" id="transport" class="form-control mb-3">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">

                            <label for="sekolahasal" class="form-label">Sekolah asal</label>
                            <input autocomplete="off" type="text" name="sekolahasal" id="sekolahasal" class="form-control mb-3">

                            <label for="nis" class="form-label">NIS</label>
                            <input autocomplete="off" type="text" name="nis" id="nis" class="form-control mb-3">

                            <label for="ijazah" class="form-label">Ijazah</label>
                            <input autocomplete="off" type="text" name="ijasah" id="ijazah" class="form-control mb-3">


                            <label for="nokip" class="form-label mt-2">Nomor KIP</label>
                            <input autocomplete="off" type="text" name="nokip" id="nokip" class="form-control mb-3" placeholder="KIP">

                            <label for="nokks" class="form-label mt-2">Nomor KKS</label>
                            <input autocomplete="off" type="text" name="nokks" id="nokks" class="form-control mb-3" placeholder="KKS">

                            <label for="jumlahsaudara" class="form-label mt-2">Jumlah saudara kandung</label>
                            <input autocomplete="off" type="text" name="jumlahsaudara" id="jumlahsaudara" class="form-control mb-3" placeholder="Jumlah saudara" onkeyup="numberonly(this)">
                        </div>
                        <div class="col">

                            <label for="npsn" class="form-label">NPSN</label>
                            <input autocomplete="off" type="text" name="npsn" id="npsn" class="form-control mb-3">

                            <label for="nisn" class="form-label">NISN</label>
                            <input autocomplete="off" type="text" name="nisn" id="nisn" class="form-control mb-3">

                            <label for="skhun" class="form-label">SKHUN</label>
                            <input autocomplete="off" type="text" name="skhun" id="nisn" class="form-control mb-3">


                            <label for="nokps" class="form-label mt-2">Nomor KPS</label>
                            <input autocomplete="off" type="text" name="nokps" id="nokps" class="form-control mb-3" placeholder="KPS">

                            <label for="nomorun" class="form-label mt-2">Nomor Ujian Nasional</label>
                            <input autocomplete="off" type="text" name="nomorun" id="nomorun" class="form-control mb-3" placeholder="Nomor UN">

                            <label for="aktalahir" class="form-label mt-2">Akta lahir</label>
                            <input autocomplete="off" type="text" name="aktalahir" id="aktalahir" class="form-control mb-3" placeholder="Akta lahir">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="kebkhusus" class="form-label mt-2">Kebutuhan khusus</label>
                            <input autocomplete="off" type="text" name="kebkhusus" id="kebkhusus" class="form-control mb-3" placeholder="Kebutuhan khusus">
                        </div>
                        <div class="col">
                            <label for="jenistinggal" class="form-label mt-2">Jenis tinggal</label>
                            <input autocomplete="off" type="text" name="jenistinggal" id="jenistinggal" class="form-control mb-3" placeholder="Tinggal bersama..">
                        </div>
                    </div>



                </div>

                <!-- table ayah  -->
                <div class="col">


                    <div class="row">
                        <div class="col">

                            <label for="namaayah" class="form-label">Nama Ayah</label>
                            <input autocomplete="off" type="text" name="namaayah" id="namaayah" class="form-control mb-3">


                        </div>
                        <div class="col">
                            <label for="pendidikanayah" class="form-label">Pendidikan terakhir ayah</label>
                            <input autocomplete="off" type="text" name="pendidikanayah" id="pendidikanayah" class="form-control mb-3">
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                            <label for="tempatlahirayah" class="form-label">Tempat lahir Ayah </label>
                            <input autocomplete="off" type="text" name="tempatlahirayah" id="tempatlahirayah" class="form-control mb-3">

                            <label for="alamatayah" class="form-label">Alamat Ayah</label>
                            <input autocomplete="off" type="text" name="alamatayah" id="alamatayah" class="form-control mb-3">


                            <label for="penghasilanayah" class="form-label">Penghasilan</label>
                            <input autocomplete="off" type="text" name="penghasilanayah" id="penghasilanayah" class="form-control mb-3" onkeyup="numberonly(this)">
                        </div>

                        <div class="col">
                            <label for="tanggallahirayah" class="form-label">Tanggal lahir Ayah</label>
                            <!-- <input type="datetime-local" id="tanggallahirayah" name="tanggallahirayah"> -->
                            <div class="input-group date" id="datepicker1">
                                <input autocomplete="off" type="text" class="form-control mb-3" placeholder="Tanggal lahir" name="tanggallahirayah">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white" style="margin-bottom:1rem;">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>

                                <script type="text/javascript">
                                    $(function() {
                                        $('#datepicker1').datepicker();
                                    });
                                </script>
                            </div>


                            <label for="pekerjaanayah" class="form-label">Pekerjaan Ayah</label>
                            <input autocomplete="off" type="text" name="pekerjaanayah" id="pekerjaanayah" class="form-control mb-3">


                            <label for="nomorhpayah" class="form-label">Nomor Ayah</label>
                            <input autocomplete="off" type="text" name="nomorhpayah" id="nomorhpayah" class="form-control mb-3" onkeyup="numberonly(this)">
                        </div>
                    </div>


                    <!-- table ibu  -->
                    <div class="row mt-5">

                        <div class="col">

                            <div class="row">
                                <div class="col">
                                    <label for="namaibu" class="form-label">Nama Ibu</label>
                                    <input autocomplete="off" type="text" name="namaibu" id="namaibu" class="form-control mb-3">
                                </div>
                                <div class="col">
                                    <label for="pendidikanibu" class="form-label">Pendidikan terakhir ibu</label>
                                    <input autocomplete="off" type="text" name="pendidikanibu" id="pendidikanibu" class="form-control mb-3">
                                </div>
                            </div>



                            <div class="row">
                                <div class="col">
                                    <label for="tempatlahiribu" class="form-label">Tempat lahir Ibu </label>
                                    <input autocomplete="off" type="text" name="tempatlahiribu" id="tempatlahiribu" class="form-control mb-3">

                                    <label for="alamatibu" class="form-label">Alamat Ibu</label>
                                    <input autocomplete="off" type="text" name="alamatibu" id="alamatibu" class="form-control mb-3">


                                    <label for="penghasilanibu" class="form-label">Penghasilan</label>
                                    <input autocomplete="off" type="text" name="penghasilanibu" id="penghasilanibu" class="form-control mb-3" onkeyup="numberonly(this)">
                                </div>

                                <div class="col">
                                    <label for="tanggallahiribu" class="form-label">Tanggal lahir Ibu</label>
                                    <!-- <input type="datetime-local" id="tanggallahiribu" name="tanggallahiribu"> -->
                                    <div class="input-group date" id="datepicker2">
                                        <input autocomplete="off" type="text" class="form-control mb-3" placeholder="Tanggal lahir" name="tanggallahiribu">
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white" style="margin-bottom:1rem;">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>

                                        <script type="text/javascript">
                                            $(function() {
                                                $('#datepicker2').datepicker();
                                            });
                                        </script>
                                    </div>

                                    <label for="pekerjaanibu" class="form-label">Pekerjaan Ibu</label>
                                    <input autocomplete="off" type="text" name="pekerjaanibu" id="pekerjaanibu" class="form-control mb-3">


                                    <label for="nomorhpibu" class="form-label">Nomor Ibu</label>
                                    <input autocomplete="off" type="text" name="nomorhpibu" id="nomorhpibu" class="form-control mb-3" onkeyup="numberonly(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table wali  -->
                    <div class="row mt-5">

                        <div class="col">

                            <div class="row">
                                <div class="col">
                                    <label for="namawali" class="form-label">Nama wali</label>
                                    <input autocomplete="off" type="text" name="namawali" id="namawali" class="form-control mb-3">
                                </div>
                                <div class="col">
                                    <label for="pendidikanwali" class="form-label">Pendidikan terakhir wali</label>
                                    <input autocomplete="off" type="text" name="pendidikanwali" id="pendidikanwali" class="form-control mb-3">
                                </div>
                            </div>



                            <div class="row">
                                <div class="col">
                                    <label for="tempatlahirwali" class="form-label">Tempat lahir wali </label>
                                    <input autocomplete="off" type="text" name="tempatlahirwali" id="tempatlahirwali" class="form-control mb-3">

                                    <label for="alamatwali" class="form-label">Alamat Wali</label>
                                    <input autocomplete="off" type="text" name="alamatwali" id="alamatwali" class="form-control mb-3">


                                    <label for="penghasilanwali" class="form-label">Penghasilan wali</label>
                                    <input autocomplete="off" type="text" name="penghasilanwali" id="penghasilanwali" class="form-control mb-3" onkeyup="numberonly(this)">
                                </div>

                                <div class="col">
                                    <label for="tanggallahirwali" class="form-label">Tanggal lahir Wali</label>
                                    <!-- <input type="datetime-local" id="tanggallahirwali" name="tanggallahirwali"> -->
                                    <div class="input-group date" id="datepicker3">
                                        <input autocomplete="off" type="text" class="form-control mb-3" placeholder="Tanggal lahir" name="tanggallahirwali">
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

                                    <label for="pekerjaanwali" class="form-label">Pekerjaan Wali</label>
                                    <input autocomplete="off" type="text" name="pekerjaanwali" id="pekerjaanwali" class="form-control mb-3">


                                    <label for="nomorhpwali" class="form-label">Nomor Wali</label>
                                    <input autocomplete="off" type="text" name="nomorhpwali" id="nomorhpwali" class="form-control mb-3" onkeyup="numberonly(this)" onkeyup="numberonly(this)">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col d-grid gap-2 col-6 mx-auto mb-5">
                            <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('yakin simpan data?')">Simpan</button>

                        </div>
                        <div class="col d-grid gap-2 col-6 mx-auto mb-5">
                            <!-- <button type="submit" name="submit" class="btn btn-primary">Home</button> -->
                            <a class="btn btn-secondary" href="../ppdb" role="button" onclick="return confirm('yakin ingin kembali?')">Kembali</a>

                        </div>
                    </div>
        </form>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>
<script type="text/javascript">
    function numberonly(input) {
        var num = /[^0-9]/gi;
        input.value = input.value.replace(num, "");
    }
</script>

</html>