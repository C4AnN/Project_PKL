-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 25 Feb 2024 pada 10.26
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_alpha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nik_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `bagian_admin` varchar(20) NOT NULL,
  `id_mandor` int(11) NOT NULL,
  `foto_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nik_admin`, `nama_admin`, `bagian_admin`, `id_mandor`, `foto_admin`) VALUES
(10, '18922', 'Agus ', 'CTP', 5, '1707611522_fcaf76cf2bfd971b45c4.jpg'),
(11, '17829', 'Budi W', 'CTP', 5, '1707611564_b5341b2eb077c907ea6f.jpg'),
(12, '16782', 'Asep K', 'CTP', 5, '1707611594_5fbcb0b3d14fbc031382.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` int(11) NOT NULL,
  `nomor_customer` varchar(20) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `ketentuan_warna` varchar(100) NOT NULL,
  `size_cetakan` varchar(20) NOT NULL,
  `id_mesin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_customer`
--

INSERT INTO `data_customer` (`id_customer`, `nomor_customer`, `nama_customer`, `nama_produk`, `ketentuan_warna`, `size_cetakan`, `id_mesin`) VALUES
(3, '3457FR44', 'Unilever', 'Fair And Lovely Bright C Glow Facial Foam', 'Cyan, Magenta, Yellow, Black, Silver', '23 cm x 30 cm', 4),
(4, '2456MR33', 'Miratone', 'Miratone Bubble Play POP Ice Espresso', 'Cyan, Magenta, Yellow, Black, Red, Silver', '25 cm x 34 cm', 1),
(5, '1421CR12', 'PT. Ceres', 'Silverqueen Cashew 62 Gram', 'Cyan, Magenta, Yellow, Black, Red', '15 cm x 20 cm', 4),
(6, '1342CR24', 'PT. Ceres', 'Silverqueen Matcha 58 Gram', 'Magenta, Yellow, Green, Black, Cyan', '10 cm x 15 cm', 4),
(7, '2446MR34', 'Miratone', 'Miratone Bubble Play POP Apple Caramel', 'Cyan, Magenta, Yellow, Black, Red, Silver', '25 cm x 34 cm', 1),
(8, '3452FR45', 'Unilever', 'Fair And Lovely Multivitamin Cream', 'Cyan, Magenta, Yellow, Black, Silver', '23 cm x 30 cm', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mandor`
--

CREATE TABLE `data_mandor` (
  `id_mandor` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama_mandor` varchar(50) NOT NULL,
  `bagian_mandor` varchar(50) NOT NULL,
  `foto_mandor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mandor`
--

INSERT INTO `data_mandor` (`id_mandor`, `nik`, `nama_mandor`, `bagian_mandor`, `foto_mandor`) VALUES
(2, '00761', 'Ali', 'Cetak 2', '1707611197_5eb665fdde50baf9936a.jpg'),
(3, '04582', 'Farid', 'Cetak 1', '1707611167_d3cebd296d08556e0f22.jpg'),
(5, '14582', 'Agung S', 'CTP', '1707611068_6a15226c6914e24bfbbe.jpg'),
(6, '27897', 'Anton', 'HR GA', '1707611025_837801b363e53d84be2f.jpg'),
(7, '03683', 'Santoso', 'Cetak 3', '1707611251_0ba3f1e76b84c9278fc7.jpg'),
(8, '04267', 'Eko S', 'Cetak 4', '1707611343_be4b36c8c92d74239994.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mesin`
--

CREATE TABLE `data_mesin` (
  `id_mesin` int(11) NOT NULL,
  `nama_mesin` varchar(50) NOT NULL,
  `jumlah_warna` int(10) NOT NULL,
  `area_cetak` varchar(20) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `foto_mesin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mesin`
--

INSERT INTO `data_mesin` (`id_mesin`, `nama_mesin`, `jumlah_warna`, `area_cetak`, `bagian`, `foto_mesin`) VALUES
(1, 'SM-74', 6, '51 cm x 72 cm', 'Cetak 4', '1706321750_52c279dff9d0f906a73d.jpg'),
(2, 'KOR 1', 1, '32 cm x 47 cm', 'Cetak 2', '1706321657_9c9333bdf126ae1001ac.jpg'),
(3, 'Oliver 1', 2, '42 cm x 56 cm', 'Cetak 1', '1706321566_4d20cdf7c44df07e327b.jpg'),
(4, 'GTO 1', 5, '32 cm x 42 cm', 'Cetak 3', '1706328321_27ea4f657e3dce5e09ed.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nik_pengguna` varchar(10) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `bagian_pengguna` varchar(20) NOT NULL,
  `id_mandor` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `foto_pengguna` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengguna`
--

INSERT INTO `data_pengguna` (`id_pengguna`, `nik_pengguna`, `nama_pengguna`, `bagian_pengguna`, `id_mandor`, `id_mesin`, `foto_pengguna`) VALUES
(5, '29876', 'Eka ', 'Cetak 1', 3, 3, '1707611956_0003f7e72b1851211d91.jpg'),
(6, '28778', 'Suryono', 'Cetak 2', 2, 2, '1707612008_5c69d223e076c490a197.jpg'),
(7, '26899', 'David K', 'Cetak 3', 7, 4, '1707612048_53f2f5faa5f4ccbfd72d.jpg'),
(8, '25673', 'Kurniawan S', 'Cetak 4', 8, 1, '1707612096_8471c09fcc330e48fc47.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_plat`
--

CREATE TABLE `data_plat` (
  `id_plat` int(11) NOT NULL,
  `nomor_plat` varchar(20) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `nama_cetakan` varchar(50) NOT NULL,
  `foto_plat` text NOT NULL,
  `ukuran_cetakan` varchar(20) NOT NULL,
  `warna_plat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_plat`
--

INSERT INTO `data_plat` (`id_plat`, `nomor_plat`, `id_customer`, `tgl_order`, `nama_cetakan`, `foto_plat`, `ukuran_cetakan`, `warna_plat`) VALUES
(1, '1A13422-4', 6, '2024-02-12', '6', '1707891739_cded42c37da854b92a11.pdf', '6', '6'),
(4, '1A14211-2', 5, '2024-02-13', '5', '1707891273_c7b28b42b676810f2ec2.pdf', '5', '5'),
(7, '2B24463-4', 7, '2024-02-11', '7', '1707894789_20cf92ec29aefe0f9b7e.pdf', '7', '7'),
(8, '2B24563-3', 4, '2024-02-10', '4', '1707894862_d133b1fc21d573578b88.pdf', '4', '4'),
(9, '3C34524-5', 8, '2024-02-09', '8', '1707894959_c6d288e8997105905f33.pdf', '8', '8'),
(10, '3C34574-4', 3, '2024-02-08', '3', '1707895028_6b016cb530cb6a7e63eb.pdf', '3', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_plat`
--

CREATE TABLE `konfirmasi_plat` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `konfirmasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_plat`
--

INSERT INTO `konfirmasi_plat` (`id_konfirmasi`, `id_order`, `id_mesin`, `id_customer`, `konfirmasi`) VALUES
(3, 10, 4, 8, 'Selesai Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_revisi`
--

CREATE TABLE `konfirmasi_revisi` (
  `id_konfirmasi_revisi` int(11) NOT NULL,
  `id_revisi` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `konfirmasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_revisi`
--

INSERT INTO `konfirmasi_revisi` (`id_konfirmasi_revisi`, `id_revisi`, `id_mesin`, `id_customer`, `konfirmasi`) VALUES
(1, 15, 4, 8, 'Selesai Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_plat`
--

CREATE TABLE `order_plat` (
  `id_order` int(11) NOT NULL,
  `nomor_plat` varchar(20) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `Nama_Cetakan2` varchar(50) NOT NULL,
  `warna_plat` varchar(10) NOT NULL,
  `tgl_orderplat` date NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_mandor` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_plat`
--

INSERT INTO `order_plat` (`id_order`, `nomor_plat`, `id_customer`, `Nama_Cetakan2`, `warna_plat`, `tgl_orderplat`, `id_mesin`, `id_pengguna`, `id_mandor`, `keterangan`) VALUES
(10, '3C34524-5', 8, '8', 'Yellow', '2024-02-14', 4, 7, 7, 'Plat Rusakk !!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisi_plat`
--

CREATE TABLE `revisi_plat` (
  `id_revisi` int(11) NOT NULL,
  `nomor_plat` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `Nama_Cetakan` varchar(50) NOT NULL,
  `warna_plat` varchar(10) NOT NULL,
  `tgl_revisi` date NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_mandor` int(11) NOT NULL,
  `file_perbaikan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `revisi_plat`
--

INSERT INTO `revisi_plat` (`id_revisi`, `nomor_plat`, `id_customer`, `Nama_Cetakan`, `warna_plat`, `tgl_revisi`, `id_mesin`, `id_pengguna`, `id_mandor`, `file_perbaikan`, `keterangan`) VALUES
(15, '3C34524-5', 8, '8', 'Silver', '2024-02-14', 4, 7, 7, '1707905908_b6fda96da1dd29b48197.jpg', 'Register Mohon Dipertebal !!! Urgent !!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `nik_user` varchar(10) NOT NULL,
  `bagian_user` varchar(20) NOT NULL,
  `foto_user` text NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `nik_user`, `bagian_user`, `foto_user`, `hak_akses`) VALUES
(1, 'Sutejo', 'SuperAdmin@123', 'Sutejo', '28976', 'HR GA', '1707614880_dedf1c5083c4845e4937.jpg', 'Super_Admin'),
(11, 'Agus', 'Candra@123', 'Agus', '18922', 'CTP', '1707614110_2b320a470a8bb82dd5af.jpg', 'Admin'),
(12, 'Asep K', 'Asep@123', 'Asep K', '16782', 'CTP', '1707615285_b6c0f30b6d3c419be10d.jpg', 'Admin'),
(13, 'Budi W', 'Budi@123', 'Budi W', '17892', 'CTP', '1707615322_b8da829511f960f0f2df.jpg', 'Admin'),
(14, 'Kurniawan S', 'Kurniawan@123', 'Kurniawan', '25673', 'Cetak 4', '1707615449_9478ce76148dd3e5b5b6.jpg', 'User'),
(15, 'David K', 'David@123', 'David K', '26899', 'Cetak 3', '1707615493_b910fbb8f4af5478338e.jpg', 'User'),
(16, 'Suryono', 'Suryono@123', 'Suryono', '28778', 'Cetak 2', '1707615538_c2c64eadcee896c1e6d6.jpg', 'User'),
(17, 'Eka', 'Eka@1234', 'Eka', '29876', 'Cetak 1', '1707615586_bce5170aeb79101f00bd.jpg', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `data_mandor`
--
ALTER TABLE `data_mandor`
  ADD PRIMARY KEY (`id_mandor`);

--
-- Indexes for table `data_mesin`
--
ALTER TABLE `data_mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `data_plat`
--
ALTER TABLE `data_plat`
  ADD PRIMARY KEY (`id_plat`);

--
-- Indexes for table `konfirmasi_plat`
--
ALTER TABLE `konfirmasi_plat`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `konfirmasi_revisi`
--
ALTER TABLE `konfirmasi_revisi`
  ADD PRIMARY KEY (`id_konfirmasi_revisi`);

--
-- Indexes for table `order_plat`
--
ALTER TABLE `order_plat`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `revisi_plat`
--
ALTER TABLE `revisi_plat`
  ADD PRIMARY KEY (`id_revisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_mandor`
--
ALTER TABLE `data_mandor`
  MODIFY `id_mandor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_mesin`
--
ALTER TABLE `data_mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_plat`
--
ALTER TABLE `data_plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `konfirmasi_plat`
--
ALTER TABLE `konfirmasi_plat`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konfirmasi_revisi`
--
ALTER TABLE `konfirmasi_revisi`
  MODIFY `id_konfirmasi_revisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_plat`
--
ALTER TABLE `order_plat`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `revisi_plat`
--
ALTER TABLE `revisi_plat`
  MODIFY `id_revisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
