-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2018 at 11:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1974768_90001`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `nomor_resep` varchar(20) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `harga` int(50) NOT NULL,
  `dosis` varchar(20) NOT NULL,
  `sub_total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `kode_dkt` varchar(50) NOT NULL,
  `nama_dkt` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat_dkt` text NOT NULL,
  `telepon_dkt` varchar(20) NOT NULL,
  `kode_plk` varchar(20) NOT NULL,
  `tarif` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kode_dkt`, `nama_dkt`, `spesialis`, `alamat_dkt`, `telepon_dkt`, `kode_plk`, `tarif`) VALUES
('59f1ffff520cb', 'Andro', 'test', '1', '88831', '1', 5666),
('59f205edc9b06', 'Petra', 'Mata', 'JL>AMD raya', '', '2', 566666);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga_obat` int(50) NOT NULL,
  `jumlah_obat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_psn` varchar(50) NOT NULL,
  `nama_psn` varchar(50) NOT NULL,
  `alamat_psn` text NOT NULL,
  `gender_psn` varchar(10) NOT NULL,
  `umur_psn` varchar(3) NOT NULL,
  `telepon_psn` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kode_psn`, `nama_psn`, `alamat_psn`, `gender_psn`, `umur_psn`, `telepon_psn`) VALUES
('59edb231e1b65', 'Rifky zamroni', 'JL upsex', 'laki-laki', '20', 9993505838),
('59edb2bb1dc9d', 'Noor fadhil fadhal ahmad', 'JL. serpong utara', 'laki-laki', '12', 895333125844),
('59f32892f24b8', 'Fadlawalad dimas', 'JL.engkol', 'laki-laki', '54', 10988882);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `nomor_byr` int(20) NOT NULL,
  `kode_psn` varchar(20) NOT NULL,
  `tanggal_byr` varchar(10) NOT NULL,
  `jumlah_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `nomor_pdf` varchar(20) NOT NULL,
  `tanggal_pdf` varchar(10) NOT NULL,
  `kode_dkt` varchar(50) NOT NULL,
  `kode_psn` varchar(50) NOT NULL,
  `kode_plk` varchar(50) NOT NULL,
  `biaya` int(20) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `kode_plk` varchar(100) NOT NULL,
  `nama_plk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='List tabel poliklinik';

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `nomor_resep` varchar(20) NOT NULL,
  `tanggal_resep` varchar(20) NOT NULL,
  `kode_dkt` varchar(20) NOT NULL,
  `kode_psn` varchar(20) NOT NULL,
  `kode_plk` varchar(20) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `bayar` int(50) NOT NULL,
  `kembali` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kode_dkt`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_psn`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`nomor_pdf`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`kode_plk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
