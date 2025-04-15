-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2023 pada 09.04
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdbfix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbayah`
--

CREATE TABLE `tbayah` (
  `idayah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahunlahir` date NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `penghasilan` float NOT NULL,
  `nomorhp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `idsiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdaftar`
--

CREATE TABLE `tbdaftar` (
  `iddaftar` int(11) NOT NULL,
  `kodedaftar` varchar(100) NOT NULL,
  `biaya` float NOT NULL,
  `waktu` date NOT NULL,
  `kelas` char(20) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idjurusan` int(11) NOT NULL,
  `idgelombang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbgelombang`
--

CREATE TABLE `tbgelombang` (
  `idgelombang` int(11) NOT NULL,
  `gelombang` varchar(100) NOT NULL,
  `nominal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbgelombang`
--

INSERT INTO `tbgelombang` (`idgelombang`, `gelombang`, `nominal`) VALUES
(1, 'Gelombang 1', 525000),
(2, 'Gelombang 2', 825000),
(3, 'Gelombang 3', 1125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbibu`
--

CREATE TABLE `tbibu` (
  `idibu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahunlahir` date NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `penghasilan` float NOT NULL,
  `nomorhp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `idsiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbjurusan`
--

CREATE TABLE `tbjurusan` (
  `idjurusan` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbjurusan`
--

INSERT INTO `tbjurusan` (`idjurusan`, `jurusan`) VALUES
(1, 'Teknik Jaringan Komputer & Telekomunikasi'),
(2, 'Teknik Sepeda Motor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpembayaran`
--

CREATE TABLE `tbpembayaran` (
  `idbiaya` int(11) NOT NULL,
  `kodedaftar` varchar(100) NOT NULL,
  `jenisbiaya` varchar(255) NOT NULL,
  `bayar` float NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `idsiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpembayaran`
--

INSERT INTO `tbpembayaran` (`idbiaya`, `kodedaftar`, `jenisbiaya`, `bayar`, `petugas`, `keterangan`, `tanggal`, `idsiswa`) VALUES
(45, 'IS120/G2/001', 'Pembarayan ke - 1', 500000, 'Rini', '', '2022-06-02', 120),
(46, 'IS125/G2/001', 'Pembarayan ke - 1', 500000, 'bayu', '', '2022-06-04', 125),
(47, 'IS126/G3/001', 'Pembarayan ke - 1', 500000, 'BAYU', '', '2022-06-07', 126),
(48, 'IS134/G1/001', 'Pembarayan ke - 1', 101010, 'Yuu', '', '2022-06-15', 134),
(49, 'IS134/G1/002', 'Pembarayan ke - 2', 20202000, 'Yuu', '', '2022-06-22', 134),
(50, 'IS48/G1/001', 'Pembarayan ke - 1', 10, '1', '', '2023-02-08', 48),
(52, 'IS136/G2/001', 'Pembarayan ke - ', 2000000, 'yu', '', '2023-02-13', 136),
(54, 'IS79/G1/001', 'Pembarayan ke - ', 0, '1', '', '2023-02-14', 79),
(55, 'IS79/G1/001', 'Pembarayan ke - ', 0, 'ttyu', '', '2023-02-23', 79),
(56, 'IS79/G1/001', 'Pembarayan ke - 2', 3424230, '1', '', '2023-02-06', 79),
(57, 'IS63/G2/001', 'Pembarayan ke - 1', 1000000000000, 'Umar', 'ookeehhh', '2023-02-13', 63),
(58, 'IS136/G2/002', 'Pembarayan ke - 2', 333333, 'Umar', '1', '2023-02-20', 136),
(59, 'IS136/G2/001', 'Pembarayan ke - 1', 342, '324', '', '2023-02-14', 136),
(88, 'IS138/G1/001', 'Pembarayan ke - 1', 100000, 'x', '', '2023-02-19', 138);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbprestasi`
--

CREATE TABLE `tbprestasi` (
  `idprestasi` int(11) NOT NULL,
  `jenisprestasi` varchar(255) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `idsiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsekolah`
--

CREATE TABLE `tbsekolah` (
  `idsekolah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `npsn` varchar(30) NOT NULL,
  `idsiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `idsiswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `ijasah` varchar(50) NOT NULL,
  `skhun` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `kebkhusus` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `transport` varchar(100) NOT NULL,
  `nokip` varchar(100) NOT NULL,
  `nokks` varchar(100) NOT NULL,
  `nokps` varchar(100) NOT NULL,
  `aktalahir` varchar(100) NOT NULL,
  `namaayah` varchar(100) NOT NULL,
  `tanggallahirayah` date DEFAULT NULL,
  `tempatlahirayah` varchar(100) NOT NULL,
  `alamatayah` varchar(200) NOT NULL,
  `pekerjaanayah` varchar(100) NOT NULL,
  `penghasilanayah` float NOT NULL,
  `nomorhpayah` varchar(20) NOT NULL,
  `namaibu` varchar(100) NOT NULL,
  `tanggallahiribu` date DEFAULT NULL,
  `tempatlahiribu` varchar(100) NOT NULL,
  `alamatibu` varchar(200) NOT NULL,
  `pekerjaanibu` varchar(100) NOT NULL,
  `penghasilanibu` float NOT NULL,
  `nomorhpibu` varchar(20) NOT NULL,
  `namawali` varchar(100) NOT NULL,
  `tanggallahirwali` date DEFAULT NULL,
  `tempatlahirwali` varchar(100) NOT NULL,
  `alamatwali` varchar(200) NOT NULL,
  `pekerjaanwali` varchar(100) NOT NULL,
  `penghasilanwali` float NOT NULL,
  `nomorhpwali` varchar(20) NOT NULL,
  `nomorun` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `npsn` varchar(100) NOT NULL,
  `sekolahasal` varchar(255) NOT NULL,
  `jenistinggal` varchar(255) NOT NULL,
  `emailsiswa` varchar(100) NOT NULL,
  `pendidikanayah` varchar(100) NOT NULL,
  `pendidikanibu` varchar(100) NOT NULL,
  `pendidikanwali` varchar(100) NOT NULL,
  `jumlahsaudara` varchar(100) NOT NULL,
  `nomorhpsiswa` varchar(30) NOT NULL,
  `idjurusan` int(11) NOT NULL,
  `idgelombang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbsiswa`
--

INSERT INTO `tbsiswa` (`idsiswa`, `nama`, `nis`, `nisn`, `gender`, `tempatlahir`, `tanggallahir`, `tinggi`, `berat`, `ijasah`, `skhun`, `agama`, `kebkhusus`, `alamat`, `transport`, `nokip`, `nokks`, `nokps`, `aktalahir`, `namaayah`, `tanggallahirayah`, `tempatlahirayah`, `alamatayah`, `pekerjaanayah`, `penghasilanayah`, `nomorhpayah`, `namaibu`, `tanggallahiribu`, `tempatlahiribu`, `alamatibu`, `pekerjaanibu`, `penghasilanibu`, `nomorhpibu`, `namawali`, `tanggallahirwali`, `tempatlahirwali`, `alamatwali`, `pekerjaanwali`, `penghasilanwali`, `nomorhpwali`, `nomorun`, `nik`, `npsn`, `sekolahasal`, `jenistinggal`, `emailsiswa`, `pendidikanayah`, `pendidikanibu`, `pendidikanwali`, `jumlahsaudara`, `nomorhpsiswa`, `idjurusan`, `idgelombang`) VALUES
(48, 'MUHAMMAD ARUL MAULANA', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Karangkemiri 004/002 Karangkemiri Wanadadi Banjarnegara Jawa Tengah 53461', 'Motor', 'PYMXM29', 'GFK2MD53400008', '3a5nb253461005', '12531/TP/2010', 'Akhmad Lukman Wibowo', NULL, '', '', 'Petani', 0, '083154830182', 'Umayah', NULL, '', '', 'Petani', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '081215155725', 2, 1),
(49, 'Juli Saputra', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Karangkemiri 004/002 Karangkemiri Wanadadi Banjarnegara Jawa Tengah 53461', 'Motor', 'PYMXM29', 'GFK2MD53400008', '3a5nb253461005', '12531/TP/2010', 'Akhmad Lukman Wibowo', NULL, '', '', 'Petani', 0, '083154830182', 'Umayah', NULL, '', '', 'Petani', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '081215155725', 2, 1),
(50, 'Raihan Maulana', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Karangkemiri 002/002 Karangkemiri Wanadadi Banjarnegara Jawa Tengah53461', '', '', '', '', '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', '', '', '', '', '087897122066', 2, 1),
(51, 'Faiz Karunia', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya 002/003 Lemahjaya Wanadadi Banjarnegara Jawa Tengah 53461', '', '', '', '', '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', '', '', '', '', '085601506786', 2, 1),
(52, 'Farid Febrian', '', '0076699987', 'Laki-laki', 'Banjarnegara', '0000-00-00', 166, 55, '', '', 'Islam', '', '002/001 Wanakarsa Wanadadi Banjarnegara Jawa Tengah 53461', '', 'P6F7EQ', '', '', '', 'Singgih Dwi Priyono', NULL, '', '', 'Buruh', 400000, '', 'Ngaisah', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '3304101102070001', '', 'MTs Cokroaminoto Wanadadi', '', '', 'Tamat SD/sederajat', '', '', '', '088221469639', 2, 1),
(53, 'BANJAR ISTIAWAN', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', '', '', 'Lemahjaya RT 02 RW 01 Lemajaya Wanadadi Banjarnegara Jawa Tengah 53461', 'Sepeda Motor', 'VADJ56', '', '', '', 'Agusmunandar (alm)', NULL, '', '', '', 0, '', 'Dwi Umarwati', NULL, '', '', '', 0, '', 'Muhatim', NULL, '', '', '', 0, '', '', '3304100305060002', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '087798716961', 2, 1),
(54, 'Rizki Saputra', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya, 002/003, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Supandi (Alm)', NULL, '', '', '', 0, '081225206504', 'Lareng', NULL, '', '', '', 0, '', 'Subekti', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '085878320152', 2, 2),
(55, 'MUHAMMAD RIZQI HIDAYATULLOH', '0068594721', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lengkong, RT 02 RW 04, Lengkong, Rakit, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Ali Rahmat', NULL, '', '', 'Buruh', 500000, '089604037946', 'Siti Rukhbaniah (alm)', NULL, '', '', '', 0, '', 'Mumfariah', NULL, '', '', '', 0, '', '', '330411907060003', '', '', '', '', 'SD/Sederajat', '', '', '', '', 2, 2),
(56, 'APTA WIDYA DHANA', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'KANDANGWANGI KARANGJAMBU RT 01/03', '', '', '', '', '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP COKROAMINOTO WANADADI', '', '', '', '', '', '', '', 2, 2),
(57, 'Alfatih Nur Ramadani', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Wanakarsa, 04/02, Wanakarsa, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '10751/TP/2007', 'Muhamad Yusup', NULL, '', '', 'Buruh', 0, '082134509944', 'Khadiyah', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 2 Wanadadi', '', '', 'SD', 'SD', '', '', '083144576013', 2, 2),
(58, 'Angga Suratman', '', '', 'Laki-laki', 'Ciamis', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Kandangwangi, Kandangwangi, 004/001, Kandangwangi, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Maman Rukmana', NULL, '', '', '', 0, '082313793745', 'Murniyati', NULL, '', '', 'Buruh', 0, '', '', NULL, '', '', '', 0, '', '', '3304102502050000', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '082007361684', 2, 2),
(59, 'AJI PRIYANTO', '', '', 'Laki-laki', '', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Wanasri, RT 03 RW 05, Sidarata, Punggelan, Banjarnegara, Jawa Tengah', '', '', '', '', '', 'MOH. NASRUDIN', NULL, '', '', 'Wiraswasta', 0, '087737699682', 'ROLIYAH', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '3304122104070002', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '085641642589', 2, 2),
(60, 'RAAFY NUR RAMADHAN', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Wanakarsa, 007/001, Wanakarsa, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Kalari', NULL, '', '', 'Buruh', 0, '', 'Sobikhah', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '3304101510060001', '', 'Mts Cokroaminoto Wanadadi', '', '', '', '', '', '', '087826756215', 2, 2),
(61, 'DIMAS SUBEKTI', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'BANTARWARU PELEM, RT 06 RW 02, SIDARATA, PUNGGELAN, BANJARNEGARA, JAWA TENGAH, 53462', 'MOTOR', '5813408', '', '', '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '3304120007070000', '', 'SMP 2 WANADADI', '', '', '', '', '', '', '081226072224', 2, 2),
(62, 'Abdi Praditya', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 165, 39, '', '', 'Islam', '', 'KARANG GUDE RT 001/RW 003 BADAKARYA,PUNGGELAN, Rawa Windu, 04/02, Wanakarsa, Wanadadi, Banjarnegara , Jawa Tengah, 53461', '', '', '6013016768339168', '', '20239/TP/2007', 'Ngatiyo', NULL, '', '', 'Wiraswasta', 0, '082242507848', 'Gurip Riya Lestari', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 2 Wanadadi', '', '', 'SD', 'SD', '', '', '081818146006', 2, 2),
(63, 'Nanang Setiawan', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'KARANG GUDE RT 001/RW 003 BADAKARYA,PUNGGELAN, KARANG GUDE , RT 001/RW 003, BADAKARYA, PUNGGELAN, BANJARNEGARA, JAWA TENGAH', '', '', '', '', 'AL.652.0223673', 'JUMARI', NULL, '', '', 'BURUH', 0, '', 'NURSIYAH', NULL, '', '', 'IBU RUMAH TANGGA', 0, '', '', NULL, '', '', '', 0, '', '', '3304121203060000', '', 'SMP COKROAMINOTO WANADADI', '', '', '', '', '', '', '', 2, 2),
(64, 'ARYFA RYZQYANA', ' ', ' ', '', 'Banjarnegara', '0000-00-00', 0, 0, ' ', ' ', 'Islam', ' ', 'Purwasana, Batur, 002/003, Purwasana, Punggelan, Banjarnegara, Jawa Tengah, 53461', ' ', ' ', ' ', ' ', ' ', ' Fauzi Muhammad Hasan', '1970-01-01', ' ', ' ', '', 0, '085291990597', 'Khomsatun', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', ' ', ' ', ' ', ' MTs Tanbighul Ghofilin', ' ', ' ', ' ', ' ', ' ', ' ', '085716563902', 2, 2),
(65, 'ELMYANA RIZKA NURAZIZAH', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya, Lemahjaya, 001/002, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', 'F2MBSQ', '', '', '3304-LT-25102013-0043', 'Rudin', NULL, '', '', '', 0, '085702787947', 'Siti Nurjanah', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '3304104911070001', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '081575869033', 2, 2),
(66, 'BAGAS AFANDI', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'RAWAWINDU, RT 02 RW 04, WANAKARSA, WANADADI, BANJARNEGARA, JAWA TENGAH', '', '', '', '', '', 'ALI USMAN', NULL, '', '', '', 0, '', 'NUNIK YULIANTI', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP NEGERI 2 WANADADI', '', '', '', '', '', '', '', 2, 2),
(67, 'ANANG PANGESTU', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 160, 54, '', '', 'Islam', '', 'KANDANGWANGI RT 2/3 WANADADI, KANDANGWANGI RT 2/3 WANADADI, KANDANGWANGI, WANADADI, BANJARNEGARA, JAWA TENGAH, 53461', '', '', '', '', '14515/TP/2008', 'ARIF SUKENDRO AL SALIMAN', NULL, '', '', '', 0, '', 'SUKARTI', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '330410261260001', '', 'SMP N 1 WANADADI', '', '', '', '', '', '', '83897876640', 2, 2),
(68, 'Galih Muhafid', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Kandangwangi, Wanatawang, 001/004, Kandangwangi, Wanadadi, Banjarnegara , Jawa Tengah, 53461', '', '', '', '', '', 'Ikhwanto', NULL, '', '', 'Buruh', 0, '082324290294', 'Eka Suwiyati', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 2 Wanadadi', '', '', 'SD', 'SLTP', '', '', '081319793074', 2, 2),
(69, 'Iqbal Faozi', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya, 004/005, Lemahjaya, Wanadadi, Banjarnegara , Jawa Tengah,', '', '', 'PJXFSS', '3a5ou753461009', '3304-LT-04122014-0015', 'Sujarwo', NULL, '', '', 'Buruh', 0, '087719066396', 'Sutarti', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 2 Wanadadi', '', '', 'SD', 'SD', '', '', '081229653165', 2, 2),
(70, 'Al Shifa Safitri', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Medayu, -, 001/001, Medayu, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Sumardi', NULL, '', '', 'Petani', 0, '', 'Nasiyem', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', '', '', '', 'SLTP', 'SLTP', '', '', '', 1, 1),
(71, 'Karimah Nur Indah Lestari', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 156, 46, '', '', 'Islam', '', 'Karangjambe, 002/001, Karangjambe, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Teguh Rahayu Hamidun', NULL, '', '', 'Pedagang', 0, '', 'Purmartati', NULL, '', '', 'Pedagang', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '', 1, 1),
(72, 'Ngazizah Nuri Latifah', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 145, 40, '', '', 'Islam', '', 'Karangjambe, 002/001, Karangjambe, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Teguh Rahayu Hamidun', NULL, '', '', 'Pedagang', 0, '', 'Purmartati', NULL, '', '', 'Pedagang', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '', 1, 1),
(73, 'Hilmi Abdur Rafi', '', '3067546217', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Linggasari, 001/005, Linggasari, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Tohar Ahmad', NULL, '', '', 'Sopir', 0, '087739662253', 'Chamdaniati', NULL, '', '', 'Ibu Rumah Tangga', 0, '', 'Anti Mukaromah', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', '', '', 'SMP Negeri 1 Wanadadi', '', '', 'SLTP', 'SLTP', '', '', '', 1, 1),
(74, 'Saeah Nur Safaah', '', '0056406717', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Karangkemiri, 002/001, Karangkemiri, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '3a5ndm53461001', '3304-LT-29062018-0005', 'MH. Sutrimo Trimo', NULL, '', '', 'Petani', 1000000, '', 'Khotimah', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD', 'SLTP', '', '', '083182487826', 1, 1),
(75, 'Ade Nur Suciani', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 151, 42, '', '', 'Islam', '', 'Lemahjaya, 001/005, Lemahjaya, Wanadadi, Banjarnegara , Jawa Tengah, 53461', '', 'PHNIHL', '', '2,01562E+14', '', 'Yudiono', NULL, '', '', 'Wiraswasta', 0, '085773056019', 'Safingah', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '083865919581', 1, 1),
(76, 'Melysatun Khasanah', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 155, 0, '', '', 'Islam', '', 'Lemahjaya, 002/005, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', 'T63DNY', '6013016719144774', '', '3304-LT-20032017-0054', 'Ali Arifin', NULL, '', '', 'Buruh', 0, '081573710536', 'Sumini', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '0882007240347', 1, 1),
(77, 'Erli Nur Setia Ningsih', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 158, 40, '', '', 'Islam', '', 'Kasilib, 003/002, Kasilib , Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '2527/2007', 'Wartono Rusmanto', NULL, '', '', 'Wiraswasta', 0, '085329394824', 'Turah', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '085329394824', 1, 1),
(78, 'Zahrotun Nisa', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 160, 55, '', '', 'Islam', '', 'Wanakarsa, 002/001, Wanakarsa, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '2305/2006', 'Teguh Widiyawanto', NULL, '', '', 'Wiraswasta', 1500000, '085293650661', 'Nurkhayati', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SLTP', 'SLTA', '', '', '087830675610', 1, 1),
(79, 'Dita Setyaningrum', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 148, 42, '', '', 'Islam', '', 'Karangkemiri, 002/001, Karangkemiri, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', 'T2REJ1', '6013016732160344', '', '3304-LT-16052013-0194', 'Iswadi', NULL, '', '', 'Wiraswasta', 1000000, '083150088199', 'Noni Widiastuti', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SLTP', 'SLTP', '', '', '083145185304', 1, 1),
(80, 'Umu Tohibah', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Sidarata, Wanasri, 001/004, Sidarata, Punggelan, Banjarnegara, Jawa Tengah, 53462', '', 'TA14JX', '6013016732132434', '', '3304-LT-07062013-0138', 'Karso', NULL, '', '', 'Petani', 0, '', 'Ratem', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD', 'SD', '', '', '085604985541', 1, 1),
(81, 'Febriyano Maulana', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Medayu, 005/001, Medayu, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Ramli', NULL, '', '', '', 0, '081904943879', 'Sunarti', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '0859144685606', 1, 1),
(82, 'Makhrus Aziz Bisyarof', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya, 001/004, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '3268/2007', 'Pujiono', NULL, '', '', 'Buruh', 0, '085326677832', 'Evi Ekawati', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SLTP', 'SLTP', '', '', '085876705297', 1, 1),
(83, 'Rizki Lestari', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Kandangwangi, Wanatawang, RT 01 RW 04, Kandangwangi , Wanadadi, Banjarnegara, Jawa Tengah, 53461', 'Motor', '', '', '', '', 'Muhamdi', NULL, '', '', 'Buruh', 0, '', 'Umiyati', NULL, '', '', 'IbuRumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', 'SMP', '', '', '081225279364', 1, 1),
(84, 'Falah Rafadillah', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Paseh, Sindang, RT 06 RW 03, Paseh, Banjarmangu, Banjarnegara, Jawa Tengah', '', '', '', '', '', 'Suhalal', NULL, '', '', '', 0, '', 'Eka Apriya', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '081228752004', 1, 1),
(85, 'Awal Begja Asdianto', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Sigeblog, Klapa Sawit, 001/004, Sigeblog, Banjarmangu, Banjarnegara, Jawa Tengah', '', '', '', '', '', 'Miskamto', NULL, '', '', 'Pedagang', 0, '', 'Eni Suani', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', '', '', '', '', '083121072780', 1, 1),
(86, 'Olyvian Riszki Rahmatuloh', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Paseh, Gedangan, 005/004, Paseh, Banjarmangu, Banjarnegara, Jawa Tengah', '', '', '', '', '', 'Rakim', NULL, '', '', 'Buruh', 0, '', 'Mainah', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SLTA', 'SD', '', '', '082225996350', 1, 1),
(87, 'SEPTI INDAH SAPUTRI', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya RT 02 RW 04, Lemahjaya, RT 02 RW 04, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'JUREDI', NULL, '', '', 'Wirausaha', 2000000, '89503825707,00', 'SUMIATI', NULL, '', '', 'Pedagang', 1000000, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', 'SD/Sederajat', 'SD/Sederajat', '', '', '081919318433', 1, 1),
(88, 'PRAYOGA SETIAWAN', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', '', '', 'Lemahjaya RT 05 RW 04, Lemahjaya, RT 05 RW 04, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', 'Motor', '', '', '', '', 'MISTO', NULL, '', '', 'Petani', 3000000, '085216602786', 'MARYATI', NULL, '', '', 'Ibu Rumahtangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP N 2 WANADADI', '', '', 'SLTP/Sederajat', 'SLTP/Sederajat', '', '', '081227350712', 1, 2),
(89, 'SIVA AMALIA', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'KRAJAN, RT 01 RW 02, LEMAHJAYA, WANADADI, BANJARNEGARA, JAWA TENGAH, 53461', 'Angkutan Umum', '', '', '', '', 'SUWARNO ALI WARDOYO', NULL, '', '', 'Transportasi', 2000000, '089671127459', 'SUYANTI', NULL, '', '', 'Ibu Rumahtangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 2 Wanadadi', '', '', 'SD/ Sederajat', 'SD/ Sederajat', '', '', '85879262241', 1, 1),
(90, 'DWI ANGGITA', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Bergasan, RT 07 RW 03, Kandangwangi, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Yatno', NULL, '', '', '', 0, '', 'Sri Wahyuni', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Wanadadi', '', '', '', '', '', '', '\'087736970560', 1, 1),
(91, 'Faril Nurman Hidayat', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya, 002/003, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Yatno', NULL, '', '', '', 0, '', 'Sri Wahyuni', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '\'087736970560', 1, 1),
(92, 'Bayu Septiono Ramadhani', '4122', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Wanakarsa, Kalijoho, 007/001, Wanakarsa, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', 'AL.652.0032311', 'Anwarudin', NULL, '', '', 'Wirausaha', 350000, '', 'Lusiyati', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', 'SD', 'SLTP', '', '1', '`085922148375', 1, 1),
(93, 'Robiatun Nahdia', '', '', 'Perempuan', 'Bangkalan', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Banjarmangu , Klesem, RT 02 RW 01, Banjarmangu , Banjarmangu , Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '3526-LT-07102020-0033', 'Agus Tosin', NULL, '', '', 'Pedagang', 0, '087868226813', 'Lisah', NULL, '', '', 'Ibu Rumahtangga', 0, '', 'Siti Musringah', NULL, '', '', '', 0, '', '', '', '', 'MTs Muhammadiyah Banjarmangu', '', '', 'SD', 'SD', '', '', '081326621210', 1, 2),
(94, 'Alvina fitrianingsih', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', '', '', 'Karanganyar, RT 01 RW 01, Kandangwangi, Wanadadi, Banjarnegara, Jawa Tengah, 53452', '', '', '', '', '', 'Saefudin', NULL, '', '', '', 0, '81391296756', 'Tuti herowati', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTS Muhammadiyah Banjarmangu', '', '', '', '', '', '', '81391296756', 1, 2),
(95, 'Verlin Eka Pratiwi', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Sipedang, Lemahjaya, 006/002, Sipedang , Banjarmangu, Banjarnegara, Jawa Tengah, 53461', 'Sepeda Motor', '', '', '', '', 'Mardi', NULL, '', '', 'Sopir', 0, '081227643170', 'Eni', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Muhammadiyah Banjarmangu', '', '', 'SD', 'SD', '', '', '081390811465', 1, 2),
(96, 'Nisa Alzura', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Kandangwangi, 002/004, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Misto', NULL, '', '', 'Dagang', 0, '082250353231', 'Irah Safitri', NULL, '', '', 'Mengurus Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri I Wanadadi', '', '', 'Tamat SD/sederajat', 'Tamat SD/sederajat', '', '', '081227574831', 1, 2),
(97, 'Najwa Putri Rahayu', '', '', 'Perempuan', 'Garut', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Lemahjaya, 005/001, Kandangwangi, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Rahmat Hidayat (Alm)', NULL, '', '', '', 0, '081227675223', 'Yusan Yusanti', NULL, '', '', 'Buruh', 0, '', 'Badarudin', NULL, '', '', '', 0, '', '', '', '', 'Mts Tanbighul Ghofilin', '', '', '', '', '', '', '082138668842', 1, 2),
(98, 'Devita Nur Halimah', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'BUNDERAN, BUNDERAN, 003/002, Lemahjaya, Wanadadi, Banjarnegara , Jawa Tengah, 53462', '', '', '', '', '', 'Sholatun', NULL, '', '', '', 0, '', 'Maidah', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 2 Bawang', '', '', '', '', '', '', '', 1, 2),
(99, 'ALFAIZI PRAMADANY', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 165, 42, '', '', 'ISLAM', '', 'Klesem, 0,6, BONDOLHARJO, PUNGGELAN, BANJARNEGARA, JAWA TENGAH, 53641', '', 'TOTG29', '', '', '6370/TP/2010', 'SUPARMIN', NULL, '', '', '', 0, '', 'BARIYAH', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP COKROAMINOTO WANADADI', '', '', '', '', '', '', '081390275438', 1, 2),
(100, 'Melani Putri', '', '', 'Perempuan', 'Balikpapan', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Bondolharjo, Totogan, RT 03 RW 01, Kandangwangi, Wanadadi, Banjarnegara, Jawa Tengah', '', '', '', '', '', 'Hariyono (alm)', NULL, '', '', '', 0, '082114648580', 'Khanifah', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Tanjungtirta', '', '', '', 'SD', '', '', '088215340424', 1, 2),
(101, 'Feby Yanti', '', '', 'Perempuan', '', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Bondolharjo, Totogan, 02/01, Bondolharjo, Punggelan, Banjarnegara, Jawa Tengah', '', '', '', '', '', 'Subardi', NULL, '', '', '', 0, '', 'Nur Afrida', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '088215340424', 1, 2),
(102, 'Shania Amalia Sahara', '', '', 'Perempuan', '', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Bondolharjo, Totogan, 02/01, Bondolharjo, Punggelan, Banjarnegara, Jawa Tengah', '', '', '', '', '', 'Subardi', NULL, '', '', '', 0, '', 'Nur Afrida', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '088215340424', 1, 2),
(103, 'Adinda Latifa Nur Aprilliana', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 153, 38, '', '', 'Islam', '', 'Kandangwangi, 04/01, Kandangwangi, Wanadadi, Banjarnegara , Jawa Tengah, 53461', '', '', '', '', '', 'Tuwarno', NULL, '', '', 'Buruh', 0, '083898855206', 'Nita Ayu Hastuti Ningsih', NULL, '', '', 'Ibu Rumah Tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 2 Wanadadi', '', '', 'SLTP', 'SLTP', '', '', '083848227444', 1, 2),
(104, 'FAUZAN ALFARIS', '', '', 'Laki-laki', 'Jakarta', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Wanasri, 003/005, Wanasri, Punggelan, Banjarnegara, Jawa Tengah, 53461', 'Sepeda Motor', '', '', '', '', 'Gatot', NULL, '', '', 'Buruh', 0, '083894194914', 'Walyati', NULL, '', '', 'Ibu rumah tangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '085842980367', 1, 2),
(105, 'Septi Febriyanti', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Sarwodadi, 005/005, Lemahjaya, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', 'T91XIX', '', '6013016718731500,00', '3304-LT-09092016-0027', 'Paidi', NULL, '', '', '', 0, '', 'Raswati', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Cokroaminoto Wanadadi', '', '', '', '', '', '', '081226071740', 1, 2),
(106, 'Leo Aditya Maulana', '', '', 'Laki-laki', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Karangkemiri, RT 05 RW 02, Karangkemiri, Wanadadi, Banjarnegara, Jawa Tengah, 53461', '', '', '', '', '', 'Muchtarom', NULL, '', '', '', 0, '', 'Yamah', NULL, '', '', 'Ibu rumahtangga', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 1 Wanadadi', '', '', '', '', '', '', '085384523010', 1, 2),
(107, 'LILIS SETIA NINGRUM', '', '', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Wanakarsa, Wanakarsa, 007/001, Wanakarsa, Wanadadi, Banjarnegara, Jawa Tengah', '', '3brpOf', '', '', '', 'Misyono', NULL, '', '', '', 0, '085810793516', 'Rahmawati', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'SMP Negeri 1 Wanadadi', '', '', '', '', '', '', '081575868481', 1, 2),
(108, 'karina Rahmawati', '', '', 'Perempuan', '', '0000-00-00', 158, 46, '', '', 'islam', '', 'Bulu Rakit, Bulu , 1,25, Rakit, Rakit, Banjarnegara, Jawa Tengah, 53462', '', '', '', '', '18236/TP/2009', 'NURUDIN', NULL, '', '', '', 0, '', 'SUWARTI', NULL, '', '', '', 0, '', '', NULL, '', '', '', 0, '', '', '', '', 'Mts Al Maarif rakit', '', '', '', '', '', '', '882007355014', 1, 2),
(109, 'DWI ARIYATI', '2389', '0068846123', 'Perempuan', 'Banjarnegara', '0000-00-00', 0, 0, '', '', 'Islam', '', 'Tanjungtirta, RT 03 RW 02, Tanjungtirta, Punggelan, Banjarnegara, 01 Januari 2006, Jawa Tengah, 53461', 'Motor', '', '', '', '', 'HERI SUBAGYO', NULL, '', '', 'KARYAWAN SWASTA', 0, '', 'RAMINEM', NULL, '', '', 'IBU RUMAHTANGGA', 0, '', 'RASEM', NULL, '', '', '', 0, '', '', '', '', 'MTs Cokroaminoto Tanjungtirta', '', '', 'SLTP/SEDERAJAT', 'SLTP/SEDERAJAT', '', '', '085865142094', 1, 2),
(110, 'SABAR PANGESTU', '  ', '  ', '', 'Banjarnegara', '0000-00-00', 160, 50, '  ', '  ', 'Islam', '  ', 'Bumen Tulak Rt/Rw 1/3 Lemah Jaya Wanadadi, Bumen Tulak Rt/Rw 1/3 Lemah Jaya Wanadadi, Lemah Jaya, Wanadadi, Banjarnegara, Jawa Tengah', '  ', '  ', '  ', '  ', '  30664/TP/2008', '  BISMA MAHENDRA', '1970-01-01', '  ', '  ', '', 0, '', 'SARTIYAH', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '  ', '  ', '  ', '  SMP N 2 Wanadadi', '  ', '  ', '  ', '  ', '  ', '  ', '85741485094', 1, 2),
(111, 'Zaid A\'rof Abdilah Rozaq', '   ', '   ', '', 'Banjarnegara', '0000-00-00', 160, 50, '   ', '   ', 'ISLAM', '   ', 'KARANG KEMIRI, KARANG KEMIRI, 1, KARANG KEMIRI, WANADADI, BANJARNEGARA, JAWA TENGAH,', '   ', '   ', '   ', '   ', '   30664/TP/2008', ' Sungkowo', '1970-01-01', '   ', '   ', '', 0, '', 'SARTIYAH', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '   ', '   ', '   ', '   SMP COKROAMINOTO WANADADI', '   ', '   ', '   ', '   ', '   ', '   ', '85741485094', 1, 2),
(112, 'ESTI ASTIWI', ' ', ' ', '', '', '0000-00-00', 160, 50, ' ', ' ', '', ' ', '', ' ', ' ', ' ', ' ', ' ', '', '1970-01-01', ' ', ' ', '', 0, '', 'SUWARNI', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '087710168670', 1, 2),
(113, 'ANANDA NUR ALIZAH', '  ', '  ', 'Perempuan', 'Banjarnegara', '2007-05-12', 0, 0, '  ', '  ', 'ISLAM', '  ', 'KANDANGWANGI RT 01/01 WANADADI  ', '  ', '  ', '  ', '  ', '  ', '  SAEBANI', '1978-05-11', '  BANJARNEGARA', 'KANDANGWANGI RT 01/01 WANADADI  ', 'PETANI', 0, '', 'SUWARNI', '1985-08-08', 'PALEMBANG', 'KANDANGWANGI RT 01/01 WANADADI  ', 'ibu rumah tangga', 0, '', '', '1970-01-01', '', '', '', 0, '', '  ', '3304101205070001', '  ', '  MTS MUHAMMADIYAH BANJARMANGU', '  BERSAMA ORANGTUA', '  ', '  SD', '  TIDAKSEKOLAH', '  ', '1', '082135259090', 1, 2),
(120, 'ALYA NAVISA SYAFIQ', '   ', '   ', '', 'BANJARNEGARA', '2007-05-30', 0, 0, '   ', '   ', 'Islam', '   ', 'Wanakarsa RT 05 RW 01, Wanadadi, Banjarnegara, Jawa Tengah', '   Diantar', '   ', '   ', '   ', '   AL.6520198074', '   AKHMAD NUR SALIM', '1981-09-29', '   BANJARNEGARA', '   Wanakarsa RT 05 RW 01, Wanadadi, Banjarnegara, Jawa Tengah', 'Buruh Harian Lepas', 0, '', 'Rima Ningsih', '1984-04-08', 'Banjarnegara', '', 'Ibu Rumahtangga', 0, '082129702811', '', '1970-01-01', '', '', '', 0, '', '   ', '   330410191014001', '   ', '   MTs Tanbighul Ghofilin', ' Bersama Orangtua', '   ', '   slta', '   SLTA', '   ', '   1', '087848895024', 1, 2),
(121, 'Arfan Dwi Adika', ' ', ' ', '', 'Banjarnegara', '2007-11-15', 160, 47, ' ', ' ', 'Islam', ' ', '', ' ', ' E27UUR', ' ', ' ', ' ', ' EDI MUTOHA', '2064-08-07', ' BANJARNEGARA', ' DUSUN 4 RT 2/4 LINGGASARI WANADADI', 'BURUH', 0, '', 'KHATINAH', '1979-09-21', 'BANJARNEGARA', ' DUSUN 4 RT 2/4 LINGGASARI WANADADI', 'IBU RUMAH TANGGA', 0, '', '', '1970-01-01', '', '', '', 0, '', ' ', '3304101511070001', ' ', ' ', ' ', ' ', ' SD', 'SD ', ' ', ' ', '087852555027', 1, 2),
(125, 'dedi setiawan', '   ', '   ', '', 'banjarnegara', '2006-01-08', 160, 45, '   ', '   ', 'Islam', '   ', 'petuguran rt 3/5 punggelan', '   ', '   ', '   ', '   ', '   ', '   achmad syarifudin', '1970-01-01', '   ', '   Petuguran Rt 3/5Punggelan', '', 0, '082136839786', 'WARSITI', '1988-08-20', '', '', 'ibu rumah tangga', 0, '', '', '1970-01-01', '', '', '', 0, '', '   ', '   3304120801060002', '   ', '   Mts Cokroaminoto Punggelan', '   ', '   ', '   ', '   SD', '   ', '   ', '', 2, 2),
(126, 'AHMAD AJI SATRIO', '     ', '    3068829804 ', '', 'BANJARNEGARA', '2005-06-30', 165, 60, '    mts-13 110017903', '     ', 'Islam', '     ', 'PENISIHAN RT 2/7 BONDOLHARJO PUNGGELAN', '     ', '     ', '     ', '     ', '     ', '     YANTO A NURHIDAYAT', '1983-06-12', '     JAKARTA', '     PENISIHAN RT 2/7 BONDOLHARJO PUNGGELAN', 'BURUH', 0, '', 'NURIAH', '1983-05-21', 'BANJARNEGARA', 'PENISIHAN RT 2/7 BONDOLHARJO PUNGGELAN', 'IBU RUMAH TANGGA', 0, '', '', '1970-01-01', '', '', '', 0, '', '     ', '    3304121401040001', '     20363516', '     MTS COKROAMINOTO TANJUNGTIRTA', '     ', '     ', '     SLTP', '     SD', '     ', '     2', '081323676344', 1, 3),
(134, 'testtt', '', '', '', '', '1970-01-01', 0, 0, '', '', 'Islam', '', '', '', '', '', '', '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(135, 'um', '', '', '', '', '1970-01-01', 0, 0, '', '', 'Islam', '', '', '', '', '', '', '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 2, 2),
(136, 'ye ye yee', '  ', '  ', '', '', '1970-01-01', 0, 0, '  ', '  ', 'Islam', '  ', '', '  ', '  ', '  ', '  ', '  ', '  ', '1970-01-01', '  ', '  ', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '  ', '  ', '  ', '  SMP Cokroaminoto Wanadadi', '  ', '  ', '  ', '  ', '  ', '  ', '', 1, 2),
(137, 'hahahah', '', '', '', '', '1970-01-01', 0, 0, '', '', 'Islam', '', '', '', '', '', '', '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(138, 'umarr', '', '', '', '', '1970-01-01', 0, 0, '', '', 'Islam', '', '', '', '', '', '', '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '1970-01-01', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsiswaditerima`
--

CREATE TABLE `tbsiswaditerima` (
  `idsiswaditerima` int(11) NOT NULL,
  `tanggalditerima` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idbiaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbwali`
--

CREATE TABLE `tbwali` (
  `idwali` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahunlahir` date NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `penghasilan` float NOT NULL,
  `nomorhp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `idsiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$1LrLuNdZ.EBIBSqTPWceDuWn0pwams1d0MaceO/rGY/MBMifN09RK'),
(3, 'umar', '$2y$10$YeAjUXweXq1ol7YrkpXUQeLHCLg3Y4xYPLUQMjmaf1t0Ieg0HdSRO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbayah`
--
ALTER TABLE `tbayah`
  ADD PRIMARY KEY (`idayah`),
  ADD KEY `idsiswa` (`idsiswa`);

--
-- Indeks untuk tabel `tbdaftar`
--
ALTER TABLE `tbdaftar`
  ADD PRIMARY KEY (`iddaftar`),
  ADD KEY `idsiswa` (`idsiswa`,`idjurusan`,`idgelombang`),
  ADD KEY `idjurusan` (`idjurusan`),
  ADD KEY `idgelombang` (`idgelombang`);

--
-- Indeks untuk tabel `tbgelombang`
--
ALTER TABLE `tbgelombang`
  ADD PRIMARY KEY (`idgelombang`);

--
-- Indeks untuk tabel `tbibu`
--
ALTER TABLE `tbibu`
  ADD PRIMARY KEY (`idibu`),
  ADD KEY `idsiswa` (`idsiswa`);

--
-- Indeks untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indeks untuk tabel `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD PRIMARY KEY (`idbiaya`),
  ADD KEY `idsiswa` (`idsiswa`);

--
-- Indeks untuk tabel `tbprestasi`
--
ALTER TABLE `tbprestasi`
  ADD PRIMARY KEY (`idprestasi`),
  ADD KEY `idsiswa` (`idsiswa`);

--
-- Indeks untuk tabel `tbsekolah`
--
ALTER TABLE `tbsekolah`
  ADD PRIMARY KEY (`idsekolah`),
  ADD KEY `idsiswa` (`idsiswa`);

--
-- Indeks untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `idjurusan` (`idjurusan`,`idgelombang`),
  ADD KEY `idgelombang` (`idgelombang`);

--
-- Indeks untuk tabel `tbsiswaditerima`
--
ALTER TABLE `tbsiswaditerima`
  ADD PRIMARY KEY (`idsiswaditerima`),
  ADD UNIQUE KEY `idsiswa` (`idsiswa`),
  ADD UNIQUE KEY `idbiaya` (`idbiaya`);

--
-- Indeks untuk tabel `tbwali`
--
ALTER TABLE `tbwali`
  ADD PRIMARY KEY (`idwali`),
  ADD KEY `idsiswa` (`idsiswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbayah`
--
ALTER TABLE `tbayah`
  MODIFY `idayah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbdaftar`
--
ALTER TABLE `tbdaftar`
  MODIFY `iddaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbgelombang`
--
ALTER TABLE `tbgelombang`
  MODIFY `idgelombang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbibu`
--
ALTER TABLE `tbibu`
  MODIFY `idibu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbjurusan`
--
ALTER TABLE `tbjurusan`
  MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  MODIFY `idbiaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `tbprestasi`
--
ALTER TABLE `tbprestasi`
  MODIFY `idprestasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbsekolah`
--
ALTER TABLE `tbsekolah`
  MODIFY `idsekolah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT untuk tabel `tbsiswaditerima`
--
ALTER TABLE `tbsiswaditerima`
  MODIFY `idsiswaditerima` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbwali`
--
ALTER TABLE `tbwali`
  MODIFY `idwali` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbayah`
--
ALTER TABLE `tbayah`
  ADD CONSTRAINT `tbayah_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`);

--
-- Ketidakleluasaan untuk tabel `tbdaftar`
--
ALTER TABLE `tbdaftar`
  ADD CONSTRAINT `tbdaftar_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`),
  ADD CONSTRAINT `tbdaftar_ibfk_2` FOREIGN KEY (`idjurusan`) REFERENCES `tbjurusan` (`idjurusan`),
  ADD CONSTRAINT `tbdaftar_ibfk_3` FOREIGN KEY (`idgelombang`) REFERENCES `tbgelombang` (`idgelombang`);

--
-- Ketidakleluasaan untuk tabel `tbibu`
--
ALTER TABLE `tbibu`
  ADD CONSTRAINT `tbibu_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`);

--
-- Ketidakleluasaan untuk tabel `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD CONSTRAINT `tbpembayaran_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`);

--
-- Ketidakleluasaan untuk tabel `tbprestasi`
--
ALTER TABLE `tbprestasi`
  ADD CONSTRAINT `tbprestasi_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`);

--
-- Ketidakleluasaan untuk tabel `tbsekolah`
--
ALTER TABLE `tbsekolah`
  ADD CONSTRAINT `tbsekolah_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`);

--
-- Ketidakleluasaan untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD CONSTRAINT `tbsiswa_ibfk_1` FOREIGN KEY (`idjurusan`) REFERENCES `tbjurusan` (`idjurusan`),
  ADD CONSTRAINT `tbsiswa_ibfk_2` FOREIGN KEY (`idgelombang`) REFERENCES `tbgelombang` (`idgelombang`);

--
-- Ketidakleluasaan untuk tabel `tbsiswaditerima`
--
ALTER TABLE `tbsiswaditerima`
  ADD CONSTRAINT `tbsiswaditerima_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`),
  ADD CONSTRAINT `tbsiswaditerima_ibfk_2` FOREIGN KEY (`idbiaya`) REFERENCES `tbpembayaran` (`idbiaya`);

--
-- Ketidakleluasaan untuk tabel `tbwali`
--
ALTER TABLE `tbwali`
  ADD CONSTRAINT `tbwali_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `tbsiswa` (`idsiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
