-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 02:35 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
('ADM001', 'Suyatno', 'jln. Bougenvile 5', '089736255367', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2021-06-17 00:37:49', NULL),
('ADM002', 'Sentot', 'jln. Bougenvile 8', '018928391839', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '1', '2021-06-17 19:42:49', NULL),
('ADM003', 'Sukoyo', 'jln. Bougenvile 3', '021388473888', 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', '1', '2021-06-28 20:44:30', NULL);

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
(23, 'VOT003', 'KDV002', 2),
(24, 'VOT004', 'KDV001', 4),
(25, 'VOT004', 'KDV002', 2),
(26, 'VOT005', 'KDV003', 1),
(27, 'VOT005', 'KDV004', 1),
(28, 'VOT005', 'KDV005', 2);

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
('KDV001', 'Pratomo Zainul', 'jln. Bougenvile 4', '<ul><li>Membangun Sarana Prasarana</li><li>Dll</li></ul>', 'kandidat_085255.JPG', '<ul><li>Mempererat tali persaudaraan antar pemuda untuk meningkatkan partisipasi pemuda dalam kegiatan-kegiatan yang bermanfaat di masyarakat guna meningkatkan peran organisasi kepemudaan</li><li>Mewujudkan generasi muda yang berilmu pengetahuan, kreatif, Mandiri, tangguh, beriman , berkualitas dan bertanggung jawab</li></ul>', '<ul><li>Kepedulian terhadap lingkungan sosial masyarakat</li><li>Melestarikan kesenian daerah serta pembangunan minat untuk berolahraga</li><li>Menggalang kemitraan dengan berbagai pihak yang berkompeten dalam masalah Pemuda dan sosial kemasyarakatan</li></ul>', '1', '2021-06-18 00:37:40', NULL),
('KDV002', 'Dimas Akmaludin', 'jln. Bougenvile 2', '<ul><li>test</li></ul>', 'kandidat_085044.JPG', '<ul><li>Meningkatkan partisipasi pemuda dalam kegiatan yang bermanfaat di masyarakat guna mengoptimalkan peran organisasi kepemudaan berdasarkan Pancasila sebagai potensi sumber kesejahteraan sosial</li></ul>', '<ul><li>Mengembangkan akhlak budi pekerti yang luhur</li><li>Mengembangkan kreativitas dan bakat pemuda melalui pendidikan dan pelatihan kepemudaan serta usaha produktif</li><li>Turut membantu dalam menjaga kebersihan dan keindahan lingkungan hidup</li><li>Mempererat tali persaudaraan antar pemuda dengan mengadakan pertemuan rutin</li></ul>', '1', '2021-06-19 21:00:23', NULL),
('KDV003', 'Sanjaya Indra', 'jln. Bougenvile 2', '', 'kandidat_113057.JPG', '<p>Bersinergi bersama Pemuda dan Pemudi RW 029 ke arah yang lebih baik di era melenial</p>', '<ul><li>Menjadikan pemuda RW 029 lebih produktif</li><li>Menjadikan pemuda sebagai unjung tombak perubahan ke arah yang lebih baik</li><li>Bersama Pemuda dan Pemudi memajukan dan melestarikan di berbagai bidang (kesenian, olah raga, sosial budaya)</li></ul>', '1', '2021-07-05 03:21:09', NULL),
('KDV004', 'Handoko Hary', 'jln. Bougenvile 1', '', 'kandidat_1139371.JPG', '<p>Mempererat tali persaudaraan antar pemuda untuk meningkatkan partisipasi pemuda dalam kegiatan-kegiatan yang bermanfaat dimasyarakat guna meningkatkan peran organisasi kepemudaan</p>', '<ul><li>Mengembangkan akhlak budi pekerti yang luhur</li><li>Mempererat tali persaudaran antar pemuda desa bandasari dengan mengadakan pertemuan rutin</li><li>Melestarikan nilai-nilai seni dan budaya masyarakat</li></ul>', '1', '2021-07-05 03:29:22', NULL),
('KDV005', 'Nurfareza Arief', 'jln. Bougenvile 3', '', 'kandidat_114301.JPG', '<p>Mewujudkan pemuda RW 029 berjiwa sosial dan mampu menciptakan generasi muda yang tangguh, berbudi pekerti yang baik, sopan satun dan berkualitas dalam bermasyarakat</p>', '<ul><li>Turut menbantu menciptakan lingkungan RW 029 yang bersih dan sehat</li><li>Berkegiatan dengan didasari jiwa Kebangsaan dan Kepancasilaan</li><li>Mengembangkan Potensi Diri Setiap Anggota</li></ul>', '1', '2021-07-08 21:14:47', NULL);

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
('PMV001', '3122686482648262', 'Paulo Sitanggang', 'jln. Bougenvile 1', '082173717344', '3122686482648262', '817dc30fa29da910a8644eac1a928743', '1', '2021-06-17 23:05:45', NULL),
('PMV002', '3122686482642223', 'Hengki Atmojo', 'jln. Bougenvile 2', '086536672342', '3122686482642223', '6b872d8a8bc37944d2e01ede0019d6bb', '1', '2021-06-19 23:29:28', NULL),
('PMV003', '3122686482648222', 'Anwar Siregar', 'jln. Bougenvile 3', '087467363653', '3122686482648222', '89e783850531fe37295ba0fa2a0911a1', '1', '2021-06-28 20:46:36', NULL),
('PMV004', '3275031301000021', 'Bagus Irawan', 'jln. Bougenvile 3', '081293636397', '3275031301000021', '233642487ecce59977e26dad78da50bd', '1', '2021-06-29 13:55:09', NULL),
('PMV005', '3256489362536447', 'Eko Supriyono', 'jln. Bougenvile 3', '085883937292', '3256489362536447', '5dfc62fe46ed21872ce0e35e364a366b', '1', '2021-06-29 13:56:24', NULL),
('PMV006', '3765599408033661', 'Reza Gunawan', 'jln. Bougenvile 5', '081973647778', '3765599408033661', 'be0aae8aa95ae9a8ebfb26baddc12a21', '1', '2021-06-29 13:57:57', NULL),
('PMV007', '3893398900034999', 'Sigit Sulistyo', 'jln Bougenvile 1', '081938876455', '3893398900034999', 'b1bbd9d96a059adcead1b79efffa0433', '1', '2021-07-19 23:40:25', NULL),
('PMV008', '3772662773677497', 'Agung Sulaeman', 'jln Bougenvile 7', '081324345466', '3772662773677497', 'fc7b085ea5f8a2079c0b86fedbce27b6', '1', '2021-07-19 23:41:49', NULL),
('PMV009', '3062655300746645', 'Wendy Wardoyo', 'jln Bougenvile 6', '081236657787', '3062655300746645', '9fbdbc8c2c2422c97b6206c7dcdf42d7', '1', '2021-07-19 23:43:08', NULL),
('PMV010', '3456000988490098', 'Chandra Nur Hidayat', 'jln Bougenvile 5', '085699489454', '3456000988490098', '5d6d890b32a4ee20cc31a13d9788579c', '1', '2021-07-19 23:45:42', NULL),
('PMV011', '3876788874747896', 'Muhammad Febrianto', 'jln Bougenvile 4', '081277658688', '3876788874747896', '9b002aff422f3da994299b61378dcc95', '1', '2021-07-19 23:47:45', NULL),
('PMV012', '3245993899301299', 'Wahjoe Nugroho', 'jln Bougenvile 2', '081237674554', '3245993899301299', '2fcdc5bb2109c6e013fb4a1a3a7e6554', '1', '2021-07-19 23:49:23', NULL),
('PMV013', '3929774646561498', 'Witri Hidayat', 'jln Bougenvile 3', '081387866657', '3929774646561498', 'fbeb6c584cc2a1e61c6f8628e837c458', '1', '2021-07-19 23:50:51', NULL),
('PMV014', '3945988878760097', 'Afina Nada', 'jln Bougenvile 3', '081398986065', '3945988878760097', '51313799dd0519e2ac99bb17b7c2d020', '1', '2021-07-19 23:52:57', NULL),
('PMV015', '3273888987890093', 'Wulan Nafesa', 'jln Bougenvile 2', '085677886767', '3273888987890093', '62b1ac0d55ab2ae758aab83937013af7', '1', '2021-07-19 23:53:53', NULL);

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
(15, 'PMV003', 'VOT003', 'KDV002', '2021-06-28 22:26:14', NULL, '1'),
(16, 'PMV004', 'VOT004', 'KDV001', '2021-06-29 14:39:59', NULL, '1'),
(17, 'PMV001', 'VOT004', 'KDV001', '2021-06-29 15:42:22', NULL, '1'),
(18, 'PMV002', 'VOT004', 'KDV002', '2021-06-29 15:43:21', NULL, '1'),
(19, 'PMV003', 'VOT004', 'KDV002', '2021-06-29 15:44:00', NULL, '1'),
(20, 'PMV005', 'VOT004', 'KDV001', '2021-06-29 15:44:32', NULL, '1'),
(21, 'PMV006', 'VOT004', 'KDV001', '2021-06-29 15:44:53', NULL, '1'),
(22, 'PMV006', 'VOT005', 'KDV004', '2021-07-15 04:22:45', NULL, '1'),
(23, 'PMV005', 'VOT005', 'KDV005', '2021-07-15 04:23:31', NULL, '1'),
(24, 'PMV003', 'VOT005', 'KDV003', '2021-07-15 04:24:29', NULL, '1'),
(25, 'PMV002', 'VOT005', 'KDV005', '2021-07-15 04:24:51', NULL, '1');

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
('VOT003', 'ADM001', 'Voting RT 05', '2021-06-29', '2021-06-28', '1', '2021-06-28 22:10:12', NULL),
('VOT004', 'ADM003', 'Periode 2021/2023', '2021-06-29', '2021-06-29', '1', '2021-06-29 01:23:23', NULL),
('VOT005', 'ADM003', 'Periode 2022/2024', '2021-07-05', NULL, '2', '2021-07-05 03:32:23', NULL);

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
  MODIFY `id_detail_voting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `riwayat_voting`
--
ALTER TABLE `riwayat_voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
