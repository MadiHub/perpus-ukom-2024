-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 04:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_madi_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` varchar(10) NOT NULL,
  `id_kategori_buku` varchar(10) NOT NULL,
  `id_sub_kategori` varchar(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `sampul_buku` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_kategori_buku`, `id_sub_kategori`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `sampul_buku`, `stok`) VALUES
('BK-001', 'KT-002', 'SK-013', 'Student Hidjo', 'Mas Marco Kartonodikromo', 'Gramedia', 2017, 'BK-001_Student Hidjo.png', 12),
('BK-002', 'KT-009', 'SK-015', 'The Forest Of Stars', 'Heather kassner', 'Gramedia', 2017, 'BK-002_The Forest Of Stars.png', 16),
('BK-003', 'KT-009', 'SK-015', 'Ghost Girl', 'Ally Malinenko', 'Gramedia', 2016, 'BK-003_jawaa.png', 22),
('BK-004', 'KT-007', 'SK-002', 'Pemrograman Web', 'Sharfina Faza', 'Gramedia', 2020, 'Dongeng ff_1709364491.png', 22),
('BK-005', 'KT-012', 'SK-016', 'Naruto', 'Masashi Kishimoto', 'Shueisha', 1999, 'BK-005_Naruto.png', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_buku`
--

CREATE TABLE `tb_kategori_buku` (
  `id_kategori_buku` varchar(10) NOT NULL,
  `nama_kategori_buku` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_kategori_buku`
--

INSERT INTO `tb_kategori_buku` (`id_kategori_buku`, `nama_kategori_buku`) VALUES
('KT-001', 'Fiksi'),
('KT-002', 'Sejarah'),
('KT-003', 'Novel'),
('KT-005', 'Bahasa'),
('KT-006', 'Pemrograman'),
('KT-007', 'komik'),
('KT-008', 'AI'),
('KT-009', 'Horor'),
('KT-010', 'Game'),
('KT-011', 'Wisata'),
('KT-012', 'Anime');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koleksi_buku`
--

CREATE TABLE `tb_koleksi_buku` (
  `id_koleksi` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_kategori_buku` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_koleksi_buku`
--

INSERT INTO `tb_koleksi_buku` (`id_koleksi`, `id_member`, `id_buku`, `id_kategori_buku`) VALUES
(16, 1, 'BK-006', 'KT-003'),
(17, 5, 'BK-001', 'KT-002'),
(18, 5, 'BK-003', 'KT-009'),
(19, 12, 'BK-002', 'KT-009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `password`, `email`, `no_telpon`, `nama_lengkap`, `alamat`) VALUES
(1, '1', 'alvian@gmail.com', '08777777777', 'Alvian', 'duren jaya'),
(4, '123', 'Fahri@gmail.com', '0885883297597', 'Fahmi Ibadurahman', 'Duren Jaya'),
(5, '1', 'azmi@gmail.com', '08377357334', 'Raihan Azami', 'Bekasi'),
(6, 'aisyah00', 'SitiAisyah00@gmail.com', '0895126783926', 'Siti Aisyah', 'Bekasi'),
(7, 'tino12', 'tino12@gmail.com', '08517313', 'ssss', 'Kajandjdj'),
(8, '1', 'moreno@gmail.com', '083636333', 'Morenolorem', 'Regency'),
(9, '1', 'rahmadi@gmail.com', '08636367367', 'Rahmadi Cahyo Saputro ', 'Perumahan Griya Utama'),
(10, '1', 'samsulek@gmail.com', '086262622', 'Samsulek', 'California Canada'),
(12, '1', 'arief@gmail.com', '08262456222', 'Arief Ikhsanudin', 'Duren Jaya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` varchar(50) NOT NULL,
  `total_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_member`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `total_pinjam`) VALUES
(48, 5, 'BK-001', '2024-01-13', '2024-02-14', 'di-kembalikan', 0),
(49, 5, 'BK-004', '2024-02-13', '2024-02-14', 'di-pinjam', 1),
(50, 5, 'BK-001', '2024-02-13', '2024-02-20', 'di-kembalikan', 0),
(51, 5, 'BK-006', '2024-02-13', '2024-02-13', 'di-kembalikan', 0),
(52, 1, 'BK-005', '2024-02-15', '2024-02-15', 'di-kembalikan', 0),
(53, 5, 'BK-001', '2024-02-15', '2024-02-20', 'di-kembalikan', 0),
(54, 5, 'BK-001', '2024-02-17', '2024-02-17', 'di-kembalikan', 0),
(55, 5, 'BK-007', '2024-02-21', '2024-02-22', 'di-kembalikan', 0),
(56, 5, 'BK-004', '2024-02-21', '2024-02-21', 'di-kembalikan', 0),
(57, 4, 'BK-001', '2024-02-21', '2024-02-21', 'di-pinjam', 2),
(58, 4, 'BK-007', '2024-02-21', '2024-02-23', 'di-kembalikan', 0),
(59, 5, 'BK-005', '2024-03-02', '2024-03-02', 'di-pinjam', 1),
(60, 5, 'BK-002', '2024-03-03', '2024-03-03', 'di-kembalikan', 0),
(61, 12, 'BK-002', '2024-06-11', '2024-06-13', 'di-kembalikan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `hari_keterlambatan` varchar(3) NOT NULL,
  `total_denda` int(11) NOT NULL,
  `total_pengembalian` int(11) NOT NULL,
  `uang_dibayarkan` int(11) NOT NULL,
  `uang_kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pengembalian`, `id_buku`, `id_member`, `id_peminjaman`, `tanggal_pengembalian`, `hari_keterlambatan`, `total_denda`, `total_pengembalian`, `uang_dibayarkan`, `uang_kembalian`) VALUES
(108, 'BK-001', 5, 48, '2024-02-13', '-', 0, 1, 0, 0),
(109, 'BK-001', 5, 50, '2024-02-13', '-', 0, 1, 0, 0),
(110, 'BK-005', 1, 52, '2024-02-15', '-', 0, 2, 0, 0),
(111, 'BK-001', 5, 53, '2024-02-19', '-', 0, 3, 0, 0),
(112, 'BK-001', 5, 54, '2024-01-23', '6', 12000, 1, 20000, 8000),
(113, 'BK-004', 5, 49, '2024-02-21', '7', 14000, 3, 200000, 186000),
(114, 'BK-007', 5, 55, '2024-02-23', '1', 2000, 2, 2000, 0),
(115, 'BK-006', 5, 51, '2024-02-21', '8', 16000, 1, 20000, 4000),
(116, 'BK-004', 5, 56, '2024-02-21', '-', 0, 1, 0, 0),
(117, 'BK-004', 5, 56, '2024-02-21', '-', 0, 1, 0, 0),
(118, 'BK-004', 5, 56, '2024-02-21', '-', 0, 1, 0, 0),
(119, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 0, 0),
(120, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(121, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(122, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(123, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(124, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(125, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(126, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(127, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(128, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(129, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(130, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(131, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(132, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(133, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(134, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(135, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(136, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(137, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(138, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(139, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(140, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(141, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(142, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(143, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(144, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(145, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(146, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(147, 'BK-001', 5, 48, '2024-02-21', '7', 14000, 1, 20000, 6000),
(148, 'BK-007', 4, 58, '2024-02-21', '-', 0, 2, 0, 0),
(149, 'BK-002', 12, 61, '2024-06-11', '-', 0, 1, 0, 0),
(150, 'BK-002', 5, 60, '2024-06-11', '100', 200000, 2, 200000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `role` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_lengkap`, `alamat`, `email`, `password`, `no_telpon`, `role`) VALUES
('A-001', 'Wian Winata', 'duren jaya', 'admin@gmail.com', '1', '087777773344', 'admin'),
('A-002', 'Rahmadi Cahyo Saputro ', 'ss', 'madiadmin@gmail.com', '1', '0882', 'admin'),
('P-002', 'Petugas ', 'petugas', 'petugas@gmail.com', '1', '08635733333', 'petugas'),
('P-003', 'Azami', '22', 'azmi@gmail.com', '1', '08377357334', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kategori`
--

CREATE TABLE `tb_sub_kategori` (
  `id_sub_kategori` varchar(10) NOT NULL,
  `id_kategori_buku` varchar(10) NOT NULL,
  `nama_sub_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_sub_kategori`
--

INSERT INTO `tb_sub_kategori` (`id_sub_kategori`, `id_kategori_buku`, `nama_sub_kategori`) VALUES
('SK-001', 'KT-003', 'Romantis'),
('SK-002', 'KT-007', 'api, petir, angin'),
('SK-003', 'KT-007', 'Sulap, Lucu, Komedi'),
('SK-005', 'KT-001', 'sihir'),
('SK-006', 'KT-001', 'Petualangan, Mendaki, Menembak, Menyopet'),
('SK-007', 'KT-005', 'Bahasa Indonesia'),
('SK-008', 'KT-004', 'Agama Islam'),
('SK-009', 'KT-006', 'Pemrograman Web dan Aplikasi'),
('SK-010', 'KT-001', 'Magic, Sihir'),
('SK-011', 'KT-002', 'Perang, Pochinok, Bima Sakti'),
('SK-012', 'KT-008', 'ChatGPT'),
('SK-013', 'KT-002', 'Perang Dunia'),
('SK-014', 'KT-001', 'Magic, Sihir'),
('SK-015', 'KT-009', 'Petualangan'),
('SK-016', 'KT-012', 'Petualangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ulasan_buku`
--

CREATE TABLE `tb_ulasan_buku` (
  `id_ulasan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal_ulasan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_ulasan_buku`
--

INSERT INTO `tb_ulasan_buku` (`id_ulasan`, `id_member`, `id_buku`, `ulasan`, `rating`, `tanggal_ulasan`) VALUES
(27, 5, 'BK-008', 'Ular Serem', 4, '2024-02-09'),
(28, 5, 'BK-004', 'oke ', 5, '2024-02-15'),
(29, 5, 'BK-003', 'gg', 5, '2024-02-15'),
(30, 1, 'BK-006', 'Keren', 3, '2024-02-15'),
(31, 5, 'BK-001', '', 4, '2024-02-15'),
(32, 1, 'BK-001', 'keren', 5, '2024-02-15'),
(33, 4, 'BK-001', 'Menarik', 3, '2024-02-15'),
(34, 5, 'BK-005', 'Whoo', 4, '2024-02-17'),
(35, 12, 'BK-002', 'Keren cerita nya', 5, '2024-06-11'),
(37, 12, 'BK-003', 'Good', 4, '2024-06-11'),
(39, 12, 'BK-005', 'Sukaa', 4, '2024-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kategori_buku`
--
ALTER TABLE `tb_kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indexes for table `tb_koleksi_buku`
--
ALTER TABLE `tb_koleksi_buku`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_sub_kategori`
--
ALTER TABLE `tb_sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `tb_ulasan_buku`
--
ALTER TABLE `tb_ulasan_buku`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_koleksi_buku`
--
ALTER TABLE `tb_koleksi_buku`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tb_ulasan_buku`
--
ALTER TABLE `tb_ulasan_buku`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
