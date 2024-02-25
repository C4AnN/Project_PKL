-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 02:51 PM
-- Server version: 10.1.29-MariaDB
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
-- Database: `rw_uas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn_dosen` bigint(20) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `foto_dosen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn_dosen`, `nama_dosen`, `foto_dosen`) VALUES
(1, 20220011001, 'Septiadani Safitri, M.Kom', '1702995853_bb0ab56769a13fd342c5.jpg'),
(2, 20220011002, 'Lea Putri, M.Kom', '1702995328_d5afd82881d5629144b6.jpg'),
(3, 20220011003, 'Hendira Putri, M.Cs', ''),
(4, 20220011005, 'Dendi, M.Kom', '1702995313_6cc309308c60991b0a0f.jpg'),
(6, 20220011004, 'PSJ, M.Kom', '1702995125_a5ce53126efe0d6cc2e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id_jadwalkuliah` int(11) NOT NULL,
  `hari_kuliah` varchar(50) NOT NULL,
  `jam_kuliah` text NOT NULL,
  `tempat_kuliah` text NOT NULL,
  `tanggal_entri` date NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id_jadwalkuliah`, `hari_kuliah`, `jam_kuliah`, `tempat_kuliah`, `tanggal_entri`, `id_mahasiswa`, `id_dosen`) VALUES
(1, 'Senin', '08:00 s/d 10:20', 'Gedung I Lt.2', '2023-12-20', 2, 1),
(2, 'Senin', '07:00 s/d 10:30', 'Gedung J Lt.2', '2023-12-20', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `jk_mahasiswa` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir_mahasiswa` date NOT NULL,
  `alamat_mahasiswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim_mahasiswa`, `nama_mahasiswa`, `jk_mahasiswa`, `tgl_lahir_mahasiswa`, `alamat_mahasiswa`) VALUES
(1, 202153001, 'Rini Pertiwi', 'Perempuan', '2023-12-13', 'Kudus'),
(2, 202153002, 'Pujianto', 'Laki-laki', '2023-12-13', 'Kudus'),
(3, 202153003, 'Riana', 'Perempuan', '2023-12-14', 'Bae, Kudus');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'Admin'),
(14, 'pegawai1', 'pegawai1', 'Bukan Admin'),
(17, 'pegawai2', '1', 'Bukan Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id_jadwalkuliah`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id_jadwalkuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
