-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2022 pada 01.59
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga_pokok` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `barcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga_pokok`, `harga_jual`, `barcode`) VALUES
(1, 'AQUA 600ML', 21, 3400, 4000, '8000000020'),
(2, 'Indomie Goreng', 106, 2100, 2500, '8000000013'),
(3, 'Baterai Alkaline', 4, 10000, 12000, '8000000012'),
(4, 'Chiki Balls', 16, 1200, 1500, '8000000011'),
(5, 'AC Daikin 1/2 PK', 1, 3000000, 3300000, '8000000017'),
(6, 'Sosis So Nice', 6, 21000, 21000, '8000000018'),
(8, 'Chitato', 15, 1200, 1500, '8000000003'),
(9, 'AC Gree 1/2 PK', 0, 2800000, 3000000, '8000000019'),
(10, 'UC 1000 Rasa Lemon', 0, 5100, 5500, '8000000015'),
(14, 'Pulpen Pilot', 5, 1200, 1500, '8000000005'),
(15, 'Daia 100 Gram', 10, 1100, 1500, '8000000016'),
(16, 'Mizone 600 ML', 0, 4000, 5000, '8000000002'),
(17, 'Kertas A4 Sidu (RIM)', 0, 45000, 50000, '8000000008'),
(18, 'Pulpen Faster ', 0, 4000, 5000, '8000000007'),
(19, 'Fiesta Chicken Nugget 1 Kg', 0, 60000, 650000, '8000000001'),
(20, 'Mouse Ryzer G200', 0, 150000, 175000, '8000000006'),
(21, 'Swallow Agar Agar 10 Gram', 0, 5000, 6000, '8000000004'),
(22, 'Rinso Anti Noda 400 Gram', 0, 7000, 8000, '8000000014'),
(23, 'Mie Sedap Soto Ayam 60 Gram', 0, 2000, 2500, '8000000009'),
(24, 'Pop Mie Ayam 200Gram', 0, 5000, 6000, '8000000010'),
(25, 'Yakult Isi 5', 0, 9000, 10000, '20220830');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id_beli` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `id_pemasok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id_beli`, `tanggal`, `waktu`, `id_pemasok`) VALUES
(19, '2022-08-31', '08:29:00', 1),
(20, '2022-08-31', '08:29:00', 3),
(21, '2022-08-31', '08:30:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_detail`
--

CREATE TABLE `beli_detail` (
  `id_beli_detail` int(10) NOT NULL,
  `id_beli` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beli_detail`
--

INSERT INTO `beli_detail` (`id_beli_detail`, `id_beli`, `id_barang`, `harga_beli`, `jumlah`) VALUES
(22, 19, 2, 2200, 20),
(23, 19, 14, 1200, 5),
(24, 19, 10, 5100, 20),
(25, 20, 2, 2100, 30),
(26, 20, 1, 3400, 3),
(27, 21, 8, 1200, 15),
(28, 21, 15, 1100, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_keranjang`
--

CREATE TABLE `beli_keranjang` (
  `id_beli_keranjang` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `harga_beli` int(17) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `id_pelanggan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`id_jual`, `tanggal`, `waktu`, `id_pelanggan`) VALUES
(9, '2022-09-16', '11:26:00', 4),
(10, '2022-09-16', '11:27:00', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual_detail`
--

CREATE TABLE `jual_detail` (
  `id_jual_detail` int(10) NOT NULL,
  `id_jual` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `harga_pokok` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual_detail`
--

INSERT INTO `jual_detail` (`id_jual_detail`, `id_jual`, `id_barang`, `harga_pokok`, `harga_jual`, `jumlah`) VALUES
(20, 9, 1, 3400, 4000, 1),
(21, 10, 3, 10000, 12000, 2),
(22, 10, 6, 21000, 21000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual_keranjang`
--

CREATE TABLE `jual_keranjang` (
  `id_jual_keranjang` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `harga_pokok` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `alamat`, `no_hp`, `email`, `username`, `password`, `hak_akses`) VALUES
(4, 'AHLAN APRIYADI', ' Badung', '087860265451', 'ahlan21@gmail.com', 'ahlan', 'ahlan2022', 1),
(5, 'NI PUTU SUCI RISTA YANTI', 'Denpasar', '087860265451', 'suci@gmail.com', 'suci', 'suci', 2),
(6, 'I PUTU SANDHI DHARMAWAN', 'Denpasar', '087860265451', 'shandi@gmail.com', 'shandi', 'shandi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(2, 'Pelanggan Setia', 'Jalan Setia', '077947947947', 'setia@gmail.com'),
(3, 'Wayan Koster', 'Denpasar', '08786029797', 'koster@gmail.com'),
(4, 'Joko Widodo', 'Istana Negara', '0808080', 'jokowi@ri.id'),
(5, 'Nadiem Makarim', 'Jl. Kebudayan', '087860265451', 'nadiem@gojek.com'),
(6, 'I Gusti Ngurah Jaya Negara', 'Jl. Puputan', '08676767', 'jn@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `nama`, `alamat`, `no_hp`, `email`) VALUES
(1, 'Lotte Grosir', 'Denpasar', '087860265451', 'agusarianto211@gmail.com'),
(3, 'Tiara Dewata', 'Badung', '087860265451', 'agus_prayogi_putu_sst_par@gmail.com'),
(4, 'Pasar Badung', '-', '-', 'ahlan21@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indeks untuk tabel `beli_detail`
--
ALTER TABLE `beli_detail`
  ADD PRIMARY KEY (`id_beli_detail`);

--
-- Indeks untuk tabel `beli_keranjang`
--
ALTER TABLE `beli_keranjang`
  ADD PRIMARY KEY (`id_beli_keranjang`);

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indeks untuk tabel `jual_detail`
--
ALTER TABLE `jual_detail`
  ADD PRIMARY KEY (`id_jual_detail`);

--
-- Indeks untuk tabel `jual_keranjang`
--
ALTER TABLE `jual_keranjang`
  ADD PRIMARY KEY (`id_jual_keranjang`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `beli`
--
ALTER TABLE `beli`
  MODIFY `id_beli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `beli_detail`
--
ALTER TABLE `beli_detail`
  MODIFY `id_beli_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `beli_keranjang`
--
ALTER TABLE `beli_keranjang`
  MODIFY `id_beli_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jual_detail`
--
ALTER TABLE `jual_detail`
  MODIFY `id_jual_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `jual_keranjang`
--
ALTER TABLE `jual_keranjang`
  MODIFY `id_jual_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
