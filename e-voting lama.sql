-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 06:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(7) NOT NULL,
  `nama_admin` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `nohp`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
('ADM001', 'Admin123', 'Jakarta', '02828828', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2021-06-17 00:37:49', NULL),
('ADM002', 'Admin2', 'Jakarta Barat', '018928391839', 'admin231', '17c4520f6cfd1ab53d8745e84681eb49', '1', '2021-06-17 19:42:49', NULL),
('ADM003', 'tester', 'jlawdwadaw', '123132131', 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', '1', '2021-06-28 20:44:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_voting`
--

CREATE TABLE `detail_voting` (
  `id_detail_voting` int(11) NOT NULL,
  `id_voting` varchar(10) NOT NULL,
  `id_kandidat` varchar(7) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_voting`
--

INSERT INTO `detail_voting` (`id_detail_voting`, `id_voting`, `id_kandidat`, `poin`) VALUES
(18, 'VOT001', 'KDV001', 0),
(19, 'VOT001', 'KDV002', 2),
(20, 'VOT002', 'KDV001', 1),
(21, 'VOT002', 'KDV002', 1),
(22, 'VOT003', 'KDV001', 1),
(23, 'VOT003', 'KDV002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` varchar(7) NOT NULL,
  `nama_kandidat` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(80) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nama_kandidat`, `alamat`, `desc`, `image`, `visi`, `misi`, `status`, `created_at`, `updated_at`) VALUES
('KDV001', 'Budi Sumarno', 'Jl Merdeka II', '<ul><li>Membangun Sarana Prasarana</li><li>Dll</li></ul>', 'kandidat_041913.jpg', '<ul><li>Visi</li><li>Misi</li></ul>', '<ul><li>Misi</li><li>Visi</li></ul>', '1', '2021-06-18 00:37:40', NULL),
('KDV002', 'Waluyo', 'Tes Alamat', '<ul><li>test</li></ul>', 'kandidat_041846.jpg', '<ul><li>test</li></ul>', '<ul><li>test</li></ul>', '1', '2021-06-19 21:00:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` varchar(7) NOT NULL,
  `no_ktp` varchar(60) NOT NULL,
  `nama_pemilih` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `no_ktp`, `nama_pemilih`, `alamat`, `nohp`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
('PMV001', '3122686482648262', 'Joko Bodo', 'Jl Mekar Sari II', '0821737173', '3122686482648262', '817dc30fa29da910a8644eac1a928743', '1', '2021-06-17 23:05:45', NULL),
('PMV002', '312268648264222', 'Jaka', 'Jakarta', '1231312321312', '312268648264222', 'e7988d312cab487579a593265a5fabac', '1', '2021-06-19 23:29:28', NULL),
('PMV003', '3122686482648222', 'Joko Bodo', 'Jakarta', '1231321312', '3122686482648222', '89e783850531fe37295ba0fa2a0911a1', '1', '2021-06-28 20:46:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_voting`
--

CREATE TABLE `riwayat_voting` (
  `id` int(11) NOT NULL,
  `id_pemilih` varchar(7) NOT NULL,
  `id_voting` varchar(10) NOT NULL,
  `id_kandidat` varchar(7) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_voting`
--

INSERT INTO `riwayat_voting` (`id`, `id_pemilih`, `id_voting`, `id_kandidat`, `created_at`, `updated_at`, `status`) VALUES
(11, 'PMV001', 'VOT002', 'KDV001', '2021-06-19 23:50:05', NULL, '1'),
(12, 'PMV002', 'VOT002', 'KDV002', '2021-06-28 20:32:00', NULL, '1'),
(13, 'PMV001', 'VOT003', 'KDV002', '2021-06-28 22:13:57', NULL, '1'),
(14, 'PMV002', 'VOT003', 'KDV001', '2021-06-28 22:25:32', NULL, '1'),
(15, 'PMV003', 'VOT003', 'KDV002', '2021-06-28 22:26:14', NULL, '1');

--
-- Triggers `riwayat_voting`
--
DELIMITER $$
CREATE TRIGGER `NAMBAH_POIN` AFTER INSERT ON `riwayat_voting` FOR EACH ROW BEGIN
 UPDATE detail_voting SET poin=poin+1

 WHERE id_voting=NEW.id_voting AND id_kandidat=NEW.id_kandidat;
 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id_voting` varchar(10) NOT NULL,
  `id_admin` varchar(7) NOT NULL,
  `nama_voting` text NOT NULL,
  `date_start` date NOT NULL DEFAULT current_timestamp(),
  `date_end` date DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id_voting`, `id_admin`, `nama_voting`, `date_start`, `date_end`, `status`, `created_at`, `updated_at`) VALUES
('VOT001', 'ADM001', 'Pemilihan RT 03', '2021-06-26', '2021-06-19', '1', '2021-06-19 20:34:29', NULL),
('VOT002', 'ADM001', 'Pemilihan RT 04', '2021-06-19', '2021-06-28', '1', '2021-06-19 23:49:16', NULL),
('VOT003', 'ADM001', 'Voting RT 05', '2021-06-29', '2021-06-28', '1', '2021-06-28 22:10:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_voting`
--
ALTER TABLE `detail_voting`
  ADD PRIMARY KEY (`id_detail_voting`),
  ADD KEY `id_voting` (`id_voting`),
  ADD KEY `id_kandidat` (`id_kandidat`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indexes for table `riwayat_voting`
--
ALTER TABLE `riwayat_voting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemilih` (`id_pemilih`),
  ADD KEY `id_voting` (`id_voting`),
  ADD KEY `id_kandidat` (`id_kandidat`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id_voting`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_voting`
--
ALTER TABLE `detail_voting`
  MODIFY `id_detail_voting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `riwayat_voting`
--
ALTER TABLE `riwayat_voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
