-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 10:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`) VALUES
('TS-418', 'COMPRESSION SLEEVE', '-'),
('TS-419', 'COMPRESSION SLEEVE', '-'),
('TS-465', 'CORE ASSY VALVE', '-'),
('TS-771', 'COUPLING LENO', '-'),
('TY-198', 'COMPRESSION SLEEVE', '-'),
('TY-223', 'CORE ASSY SOLENOID PIN', '-'),
('TY-556', 'GUNTING OPERATOR', '-');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barangkeluar` int(5) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `tanggalkeluar` date NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barangkeluar`, `id_barang`, `tanggalkeluar`, `jumlah`, `satuan`, `keterangan`) VALUES
(4, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(14, 'TY-198', '2022-09-01', 1000, 'PCS', '-'),
(18, 'TS-465', '2022-09-01', 30, 'PCS', '-'),
(24, 'TS-771', '2022-09-01', 111, 'PCS', '-'),
(52, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(101, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(104, 'TY-223', '2022-09-01', 20, 'PCS', '-'),
(162, 'TY-223', '2022-09-01', 18, 'PCS', '-'),
(164, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(262, 'TY-556', '2022-09-01', 200, 'PCS', '-'),
(275, 'TS-419', '2022-09-01', 30, 'PCS', '-'),
(279, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(280, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(332, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(368, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(378, 'TY-556', '2022-09-01', 160, 'PCS', '-'),
(446, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(469, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(522, 'TY-223', '2022-09-01', 13, 'PCS', '-'),
(532, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(540, 'TS-418', '2022-09-01', 37, 'PCS', '-'),
(579, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(584, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(588, 'TS-419', '2022-09-01', 50, 'PCS', '-'),
(632, 'TY-556', '2022-09-01', 200, 'PCS', '-'),
(660, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(661, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(668, 'TS-771', '2022-09-01', 10, 'PCS', '-'),
(700, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(701, 'TY-556', '2022-09-01', 280, 'PCS', '-'),
(721, 'TS-771', '2022-09-01', 69, 'PCS', '-'),
(769, 'TY-556', '2022-09-01', 60, 'PCS', '-'),
(774, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(802, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(845, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(857, 'TS-419', '2022-09-01', 100, 'PCS', '-'),
(866, 'TS-418', '2022-09-01', 13, 'PCS', '-'),
(875, 'TS-419', '2022-09-01', 150, 'PCS', '-'),
(883, 'TS-418', '2022-09-01', 25, 'PCS', '-'),
(884, 'TS-465', '2022-09-01', 25, 'PCS', '-'),
(918, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(945, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(1005, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(1037, 'TY-198', '2022-09-01', 100, 'PCS', '-'),
(1041, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(1074, 'TS-771', '2022-09-01', 50, 'PCS', '-'),
(1096, 'TY-556', '2022-09-01', 80, 'PCS', '-'),
(1126, 'TY-556', '2022-09-01', 200, 'PCS', '-'),
(1167, 'TS-419', '2022-09-01', 200, 'PCS', '-'),
(1179, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(1180, 'TS-419', '2022-09-01', 100, 'PCS', '-'),
(1259, 'TS-465', '2023-04-11', 25, 'PCS', 'pulang');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barangmasuk` int(5) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `tanggalmasuk` date NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barangmasuk`, `id_barang`, `tanggalmasuk`, `jumlah`, `satuan`, `keterangan`) VALUES
(1, 'TY-198', '2022-09-01', 800, 'PCS', '-'),
(5, 'TS-771', '2022-09-01', 112, 'PCS', '-'),
(42, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(49, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(70, 'TY-223', '2022-09-01', 30, 'PCS', '-'),
(93, 'TS-419', '2022-09-01', 100, 'PCS', '-'),
(94, 'TY-556', '2022-09-01', 200, 'PCS', '-'),
(95, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(134, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(161, 'TY-556', '2022-09-01', 160, 'PCS', '-'),
(164, 'TY-198', '2022-09-01', 200, 'PCS', '-'),
(179, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(209, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(238, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(261, 'TY-556', '2022-09-01', 200, 'PCS', '-'),
(267, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(269, 'TY-556', '2022-09-01', 230, 'PCS', '-'),
(271, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(274, 'TY-198', '2022-09-01', 200, 'PCS', '-'),
(284, 'TY-198', '2022-09-01', 400, 'PCS', '-'),
(317, 'TY-556', '2022-09-01', 60, 'PCS', '-'),
(323, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(343, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(344, 'TS-419', '2022-09-01', 200, 'PCS', '-'),
(345, 'TS-418', '2022-09-01', 300, 'PCS', '-'),
(354, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(394, 'TS-465', '2022-09-01', 25, 'PCS', '-'),
(431, 'TY-556', '2022-09-01', 30, 'PCS', '-'),
(437, 'TS-771', '2022-09-01', 100, 'PCS', '-'),
(453, 'TS-418', '2022-09-01', 300, 'PCS', '-'),
(455, 'TY-556', '2022-09-01', 80, 'PCS', '-'),
(465, 'TY-556', '2022-09-01', 200, 'PCS', '-'),
(483, 'TY-556', '2022-09-01', 50, 'PCS', '-'),
(518, 'TY-198', '2022-09-01', 300, 'PCS', '-');

-- --------------------------------------------------------

--
-- Table structure for table `barang_retur`
--

CREATE TABLE `barang_retur` (
  `id_retur` int(5) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `tanggalretur` date NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_retur`
--

INSERT INTO `barang_retur` (`id_retur`, `id_barang`, `tanggalretur`, `jumlah`, `satuan`, `keterangan`) VALUES
(2, 'TS-418', '2022-09-01', 10, 'PCS', 'Tidak Sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `detailbarangkeluar`
--

CREATE TABLE `detailbarangkeluar` (
  `id_detailbarangkeluar` int(5) NOT NULL,
  `id_barangkeluar` int(5) DEFAULT NULL,
  `id_barang` varchar(25) NOT NULL,
  `id_user` int(4) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailbarangkeluar`
--

INSERT INTO `detailbarangkeluar` (`id_detailbarangkeluar`, `id_barangkeluar`, `id_barang`, `id_user`, `customer`, `spesifikasi`) VALUES
(4, 4, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(14, 14, 'TY-198', 2, 'DELTA MERLIN', 'NO. 3/16 (M6) / 10 mm'),
(18, 18, 'TS-465', 2, 'DEWI SAKTI', 'ZA -205 (BESAR)'),
(24, 24, 'TS-771', 2, 'DELTA MERLIN', 'N ZA 368 - KECIL'),
(52, 52, 'TY-198', 2, 'UNITEX', '0'),
(101, 101, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(104, 104, 'TY-223', 2, 'SURITEX', 'T 600'),
(162, 162, 'TY-223', 2, 'SURITEX', 'T 600'),
(164, 164, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(262, 262, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(275, 275, 'TS-419', 2, 'AICHITEX', 'SN 8'),
(279, 279, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(280, 280, 'TY-556', 2, 'UNITEX', 'PUTIH'),
(332, 332, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(368, 368, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(378, 378, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(446, 446, 'TY-556', 2, 'UNITEX', 'PUTIH'),
(469, 469, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(522, 522, 'TY-223', 2, 'SAN FASIFIC ABADI', 'T 600'),
(532, 532, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(540, 540, 'TS-418', 2, 'AICHITEX', 'SN 6'),
(579, 579, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(584, 584, 'TY-556', 2, 'UNITEX', 'PUTIH'),
(588, 588, 'TS-419', 2, 'ISTEM', 'SN 8'),
(632, 632, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(660, 660, 'TY-556', 2, 'UNITEX', 'PUTIH'),
(661, 661, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(668, 668, 'TS-771', 2, 'TANTRA', 'N ZA 368 - KECIL'),
(700, 700, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(701, 701, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(721, 721, 'TS-771', 2, 'DELTA MERLIN', 'N ZA 368 - KECIL'),
(769, 769, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(774, 774, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(802, 802, 'TY-556', 2, 'UNITEX', 'PUTIH'),
(845, 845, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(857, 857, 'TS-419', 2, 'UNITEX', 'SN 8'),
(866, 866, 'TS-418', 2, 'AICHITEX', 'SN 6'),
(875, 875, 'TS-419', 2, 'ISTEM', 'SN 8'),
(883, 883, 'TS-418', 2, 'AICHITEX', 'SN 6'),
(884, 884, 'TS-465', 2, 'DEWI SAKTI', 'ZA -205 (BESAR)'),
(918, 918, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(945, 945, 'TY-198', 2, 'UNITEX', '0'),
(1005, 1005, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(1037, 1037, 'TY-198', 2, 'UNITEX', 'NO. 3/16 (M6) / 10 mm'),
(1041, 1041, 'TY-556', 2, 'UNITEX', 'PUTIH'),
(1074, 1074, 'TS-771', 2, 'DELTA MERLIN', 'N ZA 368 - KECIL'),
(1096, 1096, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(1126, 1126, 'TY-556', 2, 'NIKAWA', 'PUTIH'),
(1167, 1167, 'TS-419', 2, 'ISTEM', 'SN 8'),
(1179, 1179, 'TY-556', 2, 'UNITEX', 'PUTIH'),
(1180, 1180, 'TS-419', 2, 'UNITEX', 'SN 8'),
(1259, 1259, 'TS-465', 3, 'Unitex', 'Lebar pxl');

-- --------------------------------------------------------

--
-- Table structure for table `detailbarangmasuk`
--

CREATE TABLE `detailbarangmasuk` (
  `id_detailbarangmasuk` int(5) NOT NULL,
  `id_barangmasuk` int(5) DEFAULT NULL,
  `id_barang` varchar(25) NOT NULL,
  `id_user` int(4) NOT NULL,
  `lead` int(3) DEFAULT NULL,
  `supplier` varchar(50) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailbarangmasuk`
--

INSERT INTO `detailbarangmasuk` (`id_detailbarangmasuk`, `id_barangmasuk`, `id_barang`, `id_user`, `lead`, `supplier`, `spesifikasi`) VALUES
(1, 1, 'TY-198', 2, 0, 'FLEXINDO', 'NO. 3/16 (M6) / 10 mm'),
(5, 5, 'TS-771', 2, 4, 'KMT', 'N ZA 368 - KECIL'),
(42, 42, 'TY-556', 2, 7, 'KMT', 'PUTIH'),
(49, 49, 'TY-556', 2, 2, 'KMT', 'PUTIH'),
(70, 70, 'TY-223', 2, 6, 'SUSAN(SHAOXING YINGXIANG TEXTILE)', 'T 600'),
(93, 93, 'TS-419', 2, 4, 'FLEXINDO', 'SN 8'),
(94, 94, 'TY-556', 2, 0, 'KMT', 'PUTIH'),
(95, 95, 'TY-556', 2, 5, 'KMT', 'PUTIH'),
(134, 134, 'TY-556', 2, 15, 'KMT', 'PUTIH'),
(161, 161, 'TY-556', 2, 7, 'KMT', 'PUTIH'),
(164, 164, 'TY-198', 2, 6, 'FLEXINDO', 'NO. 3/16 (M6) / 10 mm'),
(179, 179, 'TY-556', 2, 4, 'KMT', 'PUTIH'),
(209, 209, 'TY-556', 2, 7, 'KMT', 'PUTIH'),
(238, 238, 'TY-556', 2, 7, 'KMT', 'PUTIH'),
(261, 261, 'TY-556', 2, 31, 'KMT', 'PUTIH'),
(267, 267, 'TY-556', 2, 3, 'KMT', 'PUTIH'),
(269, 269, 'TY-556', 2, 0, 'KMT', 'PUTIH'),
(271, 271, 'TY-556', 2, 7, 'KMT', 'PUTIH'),
(274, 274, 'TY-198', 2, 2, 'FLEXINDO', 'NO. 3/16 (M6) / 10 mm'),
(284, 284, 'TY-198', 2, 0, 'FLEXINDO', 'NO. 3/16 (M6) / 10 mm'),
(317, 317, 'TY-556', 2, 3, 'KMT', 'PUTIH'),
(323, 323, 'TY-556', 2, 0, 'KMT', 'PUTIH'),
(343, 343, 'TY-556', 2, 5, 'KMT', 'PUTIH'),
(344, 344, 'TS-419', 2, 3, 'FLEXINDO', 'SN 8'),
(345, 345, 'TS-418', 2, 3, 'FLEXINDO', 'SN 6'),
(354, 354, 'TY-556', 2, 2, 'KMT', 'PUTIH'),
(394, 394, 'TS-465', 2, 5, 'SUSAN(SHAOXING YINGXIANG TEXTILE)', 'ZA -205 (BESAR)'),
(431, 431, 'TY-556', 2, 0, 'KMT', 'PUTIH'),
(437, 437, 'TS-771', 2, 7, 'SUSAN(SHAOXING YINGXIANG TEXTILE)', 'N ZA 368 - KECIL'),
(453, 453, 'TS-418', 2, 3, 'FLEXINDO', 'SN 6'),
(455, 455, 'TY-556', 2, 3, 'KMT', 'PUTIH'),
(465, 465, 'TY-556', 2, 4, 'KMT', 'PUTIH'),
(483, 483, 'TY-556', 2, 7, 'KMT', 'PUTIH'),
(518, 518, 'TY-198', 2, 2, 'FLEXINDO', 'NO. 3/16 (M6) / 10 mm');

-- --------------------------------------------------------

--
-- Table structure for table `detailbarangretur`
--

CREATE TABLE `detailbarangretur` (
  `id_detailbarangretur` int(5) NOT NULL,
  `id_barangretur` int(5) DEFAULT NULL,
  `id_barang` varchar(25) NOT NULL,
  `id_user` int(4) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailbarangretur`
--

INSERT INTO `detailbarangretur` (`id_detailbarangretur`, `id_barangretur`, `id_barang`, `id_user`, `customer`, `spesifikasi`) VALUES
(2, 2, 'TS-418', 3, 'AICHITEX', 'SN 6');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` varchar(5) NOT NULL,
  `nama_gudang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama_gudang`) VALUES
('GD01', 'Gudang 1'),
('GD02', 'Gudang 2');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'adm'),
(2, 'Teddy', 'manajergudang', 'manajer', 'mgr'),
(3, 'Hendra', 'staffgudang', 'stf', 'stf'),
(4, 'Rito', 'managerpurchasing', 'pcs', 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan`
--

CREATE TABLE `perencanaan` (
  `id_perencanaan` int(5) NOT NULL,
  `id_barang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perencanaan`
--

INSERT INTO `perencanaan` (`id_perencanaan`, `id_barang`) VALUES
(2, 'TS-418'),
(3, 'TS-419'),
(4, 'TS-465'),
(5, 'TS-771'),
(6, 'TY-198'),
(7, 'TY-223'),
(8, 'TY-556');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_barang`
--

CREATE TABLE `persediaan_barang` (
  `id_persediaan` int(5) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `stok` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `id_gudang` varchar(5) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `safety_stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan_barang`
--

INSERT INTO `persediaan_barang` (`id_persediaan`, `id_barang`, `stok`, `satuan`, `id_gudang`, `lokasi`, `safety_stock`) VALUES
(1, 'TS-418', 392, 'PCS', 'GD02', 'Rak 3', 9),
(2, 'TS-419', 50, 'PCS', 'GD02', 'Rak 3', 64),
(3, 'TY-198', 400, 'PCS', 'GD02', 'Rak 3', 255),
(4, 'TY-223', 0, 'PCS', 'GD01', 'Rak 1', 5),
(5, 'TS-465', 0, 'PCS', 'GD02', 'Rak 2', 3),
(6, 'TS-771', 50, 'PCS', 'GD01', 'Rak 4', 67),
(7, 'TY-556', 0, 'PCS', 'GD01', 'Rak 1', 321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barangkeluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `barang_retur`
--
ALTER TABLE `barang_retur`
  ADD PRIMARY KEY (`id_retur`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `detailbarangkeluar`
--
ALTER TABLE `detailbarangkeluar`
  ADD PRIMARY KEY (`id_detailbarangkeluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `detailbarangkeluar_ibfk_4` (`id_barangkeluar`);

--
-- Indexes for table `detailbarangmasuk`
--
ALTER TABLE `detailbarangmasuk`
  ADD PRIMARY KEY (`id_detailbarangmasuk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barangmasuk` (`id_barangmasuk`),
  ADD KEY `detailbarangmasuk_ibfk_3` (`id_user`);

--
-- Indexes for table `detailbarangretur`
--
ALTER TABLE `detailbarangretur`
  ADD PRIMARY KEY (`id_detailbarangretur`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `detailbarangretur_ibfk_2` (`id_barangretur`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD PRIMARY KEY (`id_perencanaan`),
  ADD UNIQUE KEY `id_barang_2` (`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `persediaan_barang`
--
ALTER TABLE `persediaan_barang`
  ADD PRIMARY KEY (`id_persediaan`),
  ADD UNIQUE KEY `id_barang_2` (`id_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barangkeluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1260;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barangmasuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;

--
-- AUTO_INCREMENT for table `barang_retur`
--
ALTER TABLE `barang_retur`
  MODIFY `id_retur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detailbarangkeluar`
--
ALTER TABLE `detailbarangkeluar`
  MODIFY `id_detailbarangkeluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1260;

--
-- AUTO_INCREMENT for table `detailbarangmasuk`
--
ALTER TABLE `detailbarangmasuk`
  MODIFY `id_detailbarangmasuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;

--
-- AUTO_INCREMENT for table `detailbarangretur`
--
ALTER TABLE `detailbarangretur`
  MODIFY `id_detailbarangretur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perencanaan`
--
ALTER TABLE `perencanaan`
  MODIFY `id_perencanaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `persediaan_barang`
--
ALTER TABLE `persediaan_barang`
  MODIFY `id_persediaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;

--
-- Constraints for table `barang_retur`
--
ALTER TABLE `barang_retur`
  ADD CONSTRAINT `barang_retur_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `detailbarangkeluar`
--
ALTER TABLE `detailbarangkeluar`
  ADD CONSTRAINT `detailbarangkeluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailbarangkeluar_ibfk_4` FOREIGN KEY (`id_barangkeluar`) REFERENCES `barang_keluar` (`id_barangkeluar`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailbarangkeluar_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `detailbarangmasuk`
--
ALTER TABLE `detailbarangmasuk`
  ADD CONSTRAINT `detailbarangmasuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailbarangmasuk_ibfk_2` FOREIGN KEY (`id_barangmasuk`) REFERENCES `barang_masuk` (`id_barangmasuk`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailbarangmasuk_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `detailbarangretur`
--
ALTER TABLE `detailbarangretur`
  ADD CONSTRAINT `detailbarangretur_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detailbarangretur_ibfk_2` FOREIGN KEY (`id_barangretur`) REFERENCES `barang_retur` (`id_retur`) ON DELETE CASCADE,
  ADD CONSTRAINT `detailbarangretur_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD CONSTRAINT `perencanaan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `persediaan_barang`
--
ALTER TABLE `persediaan_barang`
  ADD CONSTRAINT `persediaan_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `persediaan_barang_ibfk_2` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
