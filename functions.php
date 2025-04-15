<?php

//koneksi database (host server, username, password, database)
$conn = mysqli_connect("localhost", "root", "", "ppdb2023a");

function query($query)
{
    global $conn;                                       // buat var $conn agar bisa digunakan dalam function
    $result = mysqli_query($conn, $query);              // buat var $result yang menghubungkan dengan sintak query
    $rows = [];                                         // buat wadah untuk menampilkan data, wadahnya aja ya. $rows kotak kosong
    while ($row = mysqli_fetch_assoc($result)) {        // buat looping untuk mengambil datanya dan $row = isi data yang diambil
        $rows[] = $row;                                   // ambil data/$row lalu letakan dalam wadahnya/$rows
    }
    return $rows;
}

function tambahbiaya($data)
{
    global $conn;

    $idsiswa = $data["idsiswa"];
    // $namasiswa = $data["namasiswa"];
    $kodedaftar = $data["kodedaftar"];
    // $tanggalbayar = $data["tanggalbayar"];
    $tanggalbayar = date('y-m-d', strtotime($_POST["tanggalbayar"]));
    $jenisbiaya = $data["jenisbiaya"];
    $bayar = $data["bayar"];
    $keterangan = $data["keterangan"];
    $petugas = $data["petugas"];

    $query = "INSERT INTO `tbpembayaran` (`idbiaya`, `kodedaftar`, `jenisbiaya`, `bayar`, `petugas`, `keterangan`, `tanggal`, `idsiswa`) VALUES (NULL, '$kodedaftar', '$jenisbiaya', '$bayar', '$petugas', '$keterangan', '$tanggalbayar', '$idsiswa')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah($data)
{

    global $conn;

    //ambil data dari tiap form
    $nama = addslashes($data["nama"]);
    $nis = $data["nis"];
    $nisn = $data["nisn"];
    $gender = $data["gender"];
    $tempatlahir = $data["tempatlahir"];
    // $tanggallahir = $data["tanggallahir"];
    $tanggallahir = date('y-m-d', strtotime($_POST["tanggallahir"]));
    $tinggi = $data["tinggi"];
    $berat = $data["nis"];
    $ijasah = $data["ijasah"];
    $skhun = $data["skhun"];
    $agama = $data["agama"];
    $kebkhusus = $data["kebkhusus"];
    $alamat = addslashes($data["alamat"]);
    $transport = addslashes($data["transport"]);
    $nokip = $data["nokip"];
    $nokks = $data["nokks"];
    $nokps = $data["nokps"];
    $aktalahir = $data["aktalahir"];
    $namaayah = addslashes($data["namaayah"]);
    // $tanggallahirayah = $data["tanggallahirayah"];
    $tanggallahirayah = date('y-m-d', strtotime($_POST["tanggallahirayah"]));
    $tempatlahirayah = addslashes($data["tempatlahirayah"]);
    $alamatayah = addslashes($data["alamatayah"]);
    $pekerjaanayah = $data["pekerjaanayah"];
    $penghasilanayah = $data["penghasilanayah"];
    $nomorhpayah = $data["nomorhpayah"];
    $namaibu = addslashes($data["namaibu"]);
    // $tanggallahiribu = $data["tanggallahiribu"];
    $tanggallahiribu = date('y-m-d', strtotime($_POST["tanggallahiribu"]));
    $tempatlahiribu = addslashes($data["tempatlahiribu"]);
    $alamatibu = addslashes($data["alamatibu"]);
    $pekerjaanibu = $data["pekerjaanibu"];
    $penghasilanibu = $data["penghasilanibu"];
    $nomorhpibu = $data["nomorhpibu"];
    $namawali = addslashes($data["namawali"]);
    // $tanggallahirwali = $data["tanggallahirwali"];
    $tanggallahirwali = date('y-m-d', strtotime($_POST["tanggallahirwali"]));
    $tempatlahirwali = addslashes($data["tempatlahirwali"]);
    $alamatwali = addslashes($data["alamatwali"]);
    $pekerjaanwali = $data["pekerjaanwali"];
    $penghasilanwali = $data["penghasilanwali"];
    $nomorhpwali = $data["nomorhpwali"];
    $idjurusan = $data["jurusan"];
    $idgelombang = $data["gelombang"];

    // field tambahan

    $nomorun = $data["nomorun"];
    $nik = $data["nik"];
    $npsn = $data["npsn"];
    $sekolahasal = addslashes($data["sekolahasal"]);
    $jenistinggal = $data["jenistinggal"];
    $emailsiswa = $data["emailsiswa"];
    $pendidikanayah = $data["pendidikanayah"];
    $pendidikanibu = $data["pendidikanibu"];
    $pendidikanwali = $data["pendidikanwali"];
    $jumlahsaudara = $data["jumlahsaudara"];
    $nomorhpsiswa = $data["nomorhpsiswa"];

    // $tanggale = date('y-m-d', (NOW()));



    // $x = $data["x"];
    // $gelombang = $data["gelombang"];
    //   $gelombang = $data["gelombang"];

    $query = "INSERT INTO `tbsiswa` (`idsiswa`, `nama`, `nis`, `nisn`, `gender`, `tempatlahir`, `tanggallahir`, `tinggi`, `berat`, `ijasah`, `skhun`, `agama`, `kebkhusus`, `alamat`, `transport`, `nokip`, `nokks`, `nokps`, `aktalahir`, `namaayah`, `tanggallahirayah`, `tempatlahirayah`, `alamatayah`, `pekerjaanayah`, `penghasilanayah`, `nomorhpayah`, `namaibu`, `tanggallahiribu`, `tempatlahiribu`, `alamatibu`, `pekerjaanibu`, `penghasilanibu`, `nomorhpibu`, `namawali`, `tanggallahirwali`, `tempatlahirwali`, `alamatwali`, `pekerjaanwali`, `penghasilanwali`, `nomorhpwali`, `nomorun`, `nik`, `npsn`, `sekolahasal`, `jenistinggal`, `emailsiswa`, `pendidikanayah`, `pendidikanibu`, `pendidikanwali`, `jumlahsaudara`, `nomorhpsiswa`, `idjurusan`, `idgelombang`) VALUES (NULL, '$nama', '$nis', '$nisn', '$gender', '$tempatlahir', '$tanggallahir', '$tinggi', '$berat', '$ijasah', '$skhun', '$agama', '$kebkhusus', '$alamat', '$transport', '$nokip', '$nokks', '$nokps', '$aktalahir', '$namaayah', '$tanggallahirayah', '$tempatlahirayah', '$alamatayah', '$pekerjaanayah', '$penghasilanayah', '*$nomorhpayah', '$namaibu', '$tanggallahiribu', '$tempatlahiribu', '$alamatibu', '$pekerjaanibu', '$penghasilanibu', '*$nomorhpibu', '$namawali', '$tanggallahirwali', '$tempatlahirwali', '$alamatwali', '$pekerjaanwali', '$penghasilanwali', '*$nomorhpwali', '$nomorun', '*$nik', '$npsn', '$sekolahasal', '$jenistinggal', '$emailsiswa', '$pendidikanayah', '$pendidikanibu', '$pendidikanwali', '$jumlahsaudara', '*$nomorhpsiswa', '$idjurusan', '$idgelombang')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbsiswa WHERE idsiswa = $id");
    return mysqli_affected_rows($conn);
}

function hapusbiaya($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tbpembayaran WHERE idbiaya = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    //ambil data dari tiap form
    $id = $data["idsiswa"];
    $nama = addslashes($data["nama"]);
    $nis = $data["nis"];
    $nisn = $data["nisn"];
    $gender = $data["gender"];
    $tempatlahir = addslashes($data["tempatlahir"]);
    // $tanggallahir = $data["tanggallahir"];
    $tanggallahir = date('y-m-d', strtotime($_POST["tanggallahir"]));
    $tinggi = $data["tinggi"];
    $berat = $data["berat"];
    $ijasah = $data["ijasah"];
    $skhun = $data["skhun"];
    $agama = $data["agama"];
    $kebkhusus = $data["kebkhusus"];
    $alamat = addslashes($data["alamat"]);
    $transport = addslashes($data["transport"]);
    $nokip = $data["nokip"];
    $nokks = $data["nokks"];
    $nokps = $data["nokps"];
    $aktalahir = $data["aktalahir"];
    $namaayah = addslashes($data["namaayah"]);
    // $tanggallahirayah = $data["tanggallahirayah"];
    $tanggallahirayah = date('y-m-d', strtotime($_POST["tanggallahirayah"]));
    $tempatlahirayah = addslashes($data["tempatlahirayah"]);
    $alamatayah = $data["alamatayah"];
    $pekerjaanayah = addslashes($data["pekerjaanayah"]);
    $penghasilanayah = $data["penghasilanayah"];
    $nomorhpayah = $data["nomorhpayah"];
    $namaibu = addslashes($data["namaibu"]);
    // $tanggallahiribu = $data["tanggallahiribu"];
    $tanggallahiribu = date('y-m-d', strtotime($_POST["tanggallahiribu"]));
    $tempatlahiribu = addslashes($data["tempatlahiribu"]);
    $alamatibu = addslashes($data["alamatibu"]);
    $pekerjaanibu = $data["pekerjaanibu"];
    $penghasilanibu = $data["penghasilanibu"];
    $nomorhpibu = $data["nomorhpibu"];
    $namawali = addslashes($data["namawali"]);
    // $tanggallahirwali = $data["tanggallahirwali"];
    $tanggallahirwali = date('y-m-d', strtotime($_POST["tanggallahirwali"]));
    $tempatlahirwali = addslashes($data["tempatlahirwali"]);
    $alamatwali = $data["alamatwali"];
    $pekerjaanwali = addslashes($data["pekerjaanwali"]);
    $penghasilanwali = $data["penghasilanwali"];
    $nomorhpwali = $data["nomorhpwali"];
    // $idjurusan = $data["jurusan"];
    // $idgelombang = $data["gelombang"];

    // field tambahan

    $nomorun = $data["nomorun"];
    $nik = $data["nik"];
    $npsn = $data["npsn"];
    $sekolahasal = addslashes($data["sekolahasal"]);
    $jenistinggal = $data["jenistinggal"];
    $emailsiswa = $data["emailsiswa"];
    $pendidikanayah = $data["pendidikanayah"];
    $pendidikanibu = $data["pendidikanibu"];
    $pendidikanwali = $data["pendidikanwali"];
    $jumlahsaudara = $data["jumlahsaudara"];
    $nomorhpsiswa = $data["nomorhpsiswa"];


    // ini benar - untuk update jurusan dan gelombang - 
    // $query = "UPDATE tbsiswa SET nama = '$nama', nis = '$nis', nisn = '$nisn', gender = '$gender', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', tinggi = '$tinggi', berat = '$berat', ijasah = '$ijasah', skhun = '$skhun', agama = '$agama', kebkhusus = '$kebkhusus', alamat = '$alamat', transport = '$transport', nokip = '$nokip', nokks = '$nokks', nokps = '$nokps', aktalahir = '$aktalahir', namaayah = '$namaayah', tanggallahirayah = '$tanggallahirayah', tempatlahirayah = '$tempatlahirayah', alamatayah = '$alamatayah', pekerjaanayah = '$pekerjaanayah', penghasilanayah = '$penghasilanayah', nomorhpayah = '$nomorhpayah', namaibu = '$namaibu', tanggallahiribu = '$tanggallahiribu', tempatlahiribu = '$tempatlahiribu', alamatibu = '$alamatibu', pekerjaanibu = '$pekerjaanibu', penghasilanibu = '$penghasilanibu', nomorhpibu = '$nomorhpibu', namawali = '$namawali', tanggallahirwali = '$tanggallahirwali', tempatlahirwali = '$tempatlahirwali', alamatwali = '$alamatwali', pekerjaanwali = '$pekerjaanwali', penghasilanwali = '$penghasilanwali', nomorhpwali = '$nomorhpwali', idjurusan = '$idjurusan', idgelombang = '$idgelombang' WHERE tbsiswa.idsiswa = $id";
    $query = "UPDATE tbsiswa SET nama = '$nama', nis = '$nis', nisn = '$nisn', gender = '$gender', tempatlahir = '$tempatlahir', tanggallahir = '$tanggallahir', tinggi = '$tinggi', berat = '$berat', ijasah = '$ijasah', skhun = '$skhun', agama = '$agama', kebkhusus = '$kebkhusus', alamat = '$alamat', transport = '$transport', nokip = '$nokip', nokks = '$nokks', nokps = '$nokps', aktalahir = '$aktalahir', namaayah = '$namaayah', tanggallahirayah = '$tanggallahirayah', tempatlahirayah = '$tempatlahirayah', alamatayah = '$alamatayah', pekerjaanayah = '$pekerjaanayah', penghasilanayah = '$penghasilanayah', nomorhpayah = '*$nomorhpayah', namaibu = '$namaibu', tanggallahiribu = '$tanggallahiribu', tempatlahiribu = '$tempatlahiribu', alamatibu = '$alamatibu', pekerjaanibu = '$pekerjaanibu', penghasilanibu = '$penghasilanibu', nomorhpibu = '*$nomorhpibu', namawali = '$namawali', tanggallahirwali = '$tanggallahirwali', tempatlahirwali = '$tempatlahirwali', alamatwali = '$alamatwali', pekerjaanwali = '$pekerjaanwali', penghasilanwali = '$penghasilanwali', nomorhpwali = '*$nomorhpwali', `nomorun` = '$nomorun', `nik` = '*$nik', `npsn` = '$npsn', `sekolahasal` = '$sekolahasal', `jenistinggal` = '$jenistinggal', `emailsiswa` = '$emailsiswa', `pendidikanayah` = '$pendidikanayah', `pendidikanibu` = '$pendidikanibu', `pendidikanwali` = '$pendidikanwali', `jumlahsaudara` = '$jumlahsaudara', `nomorhpsiswa` = '*$nomorhpsiswa' WHERE tbsiswa.idsiswa = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    global $query;
    $query = "SELECT * FROM tbsiswa INNER JOIN tbgelombang USING (idgelombang) INNER JOIN tbjurusan USING (idjurusan)
    WHERE tbsiswa.nama LIKE '%$keyword%' OR tbgelombang.gelombang LIKE '%$keyword%' OR tbsiswa.nik LIKE '%$keyword%' OR tbsiswa.nokip LIKE '%$keyword%' OR tbsiswa.nokks LIKE '%$keyword%' OR tbsiswa.namaayah LIKE '%$keyword%' OR tbsiswa.namaibu LIKE '%$keyword%' OR tbsiswa.namawali LIKE '%$keyword%' OR tbsiswa.nomorhpsiswa LIKE '%$keyword%' OR tbjurusan.jurusan LIKE '%$keyword%'";
    return query($query); // hasilnya berupa array assoc pada var $query, dan hasilnya akan dimasukan pada var $siswa pada isset button cari.
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek apakah username sudah digunakan
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah terdaftar!')
        </script>";
        return false; // untuk tidak melanjutkan script lainnya
    }

    // cek apakah password tidak sesuai
    if ($password !== $password2) {
        echo "<script>
        alert('Password tidak sama!');
        </script>";
        return false;
    }
    // return 1; // untuk mengecek bahwa tombol dah bisa di eksekusi

    // enkripsi password yang diinputkan
    $password = password_hash($password, PASSWORD_DEFAULT);

    // buat query insert to database
    mysqli_query($conn, "INSERT INTO user VALUE ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
