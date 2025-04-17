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
