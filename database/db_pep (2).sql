-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 01:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pep`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'akademik01', 'admin456', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kuisioner_id` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal_submit` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `nim`, `kuisioner_id`, `jawaban`, `tanggal_submit`) VALUES
(70, '1233123', 13, 'Bekerja', '2025-04-23'),
(71, '1233123', 14, '3 <= WT < 6 Bulan ', '2025-04-23'),
(72, '1233123', 15, 'Rp. 5.000.000 - 10.000.000', '2025-04-23'),
(73, '1233123', 16, 'WAEAWE', '2025-04-23'),
(74, '1233123', 17, 'AWEAWE', '2025-04-23'),
(75, '1233123', 18, 'AWWEAW', '2025-04-23'),
(76, '1233123', 19, 'Beasiswa Pemerintah Daerah', '2025-04-23'),
(77, '1233123', 20, 'Tinggi', '2025-04-23'),
(78, '1233123', 21, 'Setara', '2025-04-23'),
(79, '1233123', 22, 'Sedang', '2025-04-23'),
(80, '1233123', 23, 'Sangat Rendah', '2025-04-23'),
(81, '1233123', 24, 'Rendah', '2025-04-23'),
(82, '1233123', 25, 'Sangat Rendah', '2025-04-23'),
(83, '1233123', 26, 'Sedang', '2025-04-23'),
(84, '1233123', 27, 'Rendah', '2025-04-23'),
(85, '1233123', 28, 'Rendah', '2025-04-23'),
(86, '1233123', 29, 'Sedang', '2025-04-23'),
(87, '1233123', 30, 'Rendah', '2025-04-23'),
(88, '1233123', 31, 'Rendah', '2025-04-23'),
(89, '1233123', 32, 'Sedang', '2025-04-23'),
(90, '1233123', 33, 'Sangat Rendah', '2025-04-23'),
(91, '1233123', 34, 'Rendah', '2025-04-23'),
(92, '1233123', 35, 'Sangat Rendah', '2025-04-23'),
(93, '1233123', 38, 'Cukup', '2025-04-23'),
(94, '1233123', 39, 'Kecil', '2025-04-23'),
(95, '1233123', 40, 'Tidak Sama Sekali', '2025-04-23'),
(96, '1233123', 41, 'Kecil', '2025-04-23'),
(97, '1233123', 42, 'Kecil', '2025-04-23'),
(98, '1233123', 43, 'Tidak Sama Sekali', '2025-04-23'),
(99, '1233123', 44, 'Kecil', '2025-04-23'),
(100, '1233123', 45, '<=6 bulan Sebelum Lulus', '2025-04-23'),
(101, '1233123', 46, 'Membangun bisnis sendiri, Bekerja di tempat yang sama dengan tempat kerja semasa kuliah', '2025-04-23'),
(102, '1233123', 47, '<5 perusahaan/instansi/institusi', '2025-04-23'),
(103, '1233123', 48, 'Ya', '2025-04-23'),
(104, '1233123', 49, 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya., Pekerjaan saya saat ini lebih menarik.', '2025-04-23'),
(105, '1233123', 50, 'Tidak Sama Sekali', '2025-04-23'),
(106, '1233123', 51, 'Kecil', '2025-04-23'),
(107, '1233123', 52, 'Kecil', '2025-04-23'),
(108, '1233123', 53, 'Kecil', '2025-04-23'),
(109, '1233123', 54, 'Kecil', '2025-04-23'),
(110, '1233123', 55, 'Kecil', '2025-04-23'),
(111, '1233123', 56, 'Tidak Sama Sekali', '2025-04-23'),
(112, '1233123', 57, 'Kecil', '2025-04-23'),
(113, '1233123', 58, 'Kecil', '2025-04-23'),
(114, '1233123', 59, 'Cukup', '2025-04-23'),
(115, '1233123', 60, 'Kecil', '2025-04-23'),
(116, '1233123', 61, 'Kecil', '2025-04-23'),
(117, '1233123', 62, 'Tidak Sama Sekali', '2025-04-23'),
(118, '1233123', 63, 'Kecil', '2025-04-23'),
(119, '1233123', 13, 'Bekerja', '2025-04-23'),
(120, '1233123', 14, '3 <= WT < 6 Bulan ', '2025-04-23'),
(121, '1233123', 15, 'Rp. 5.000.000 - 10.000.000', '2025-04-23'),
(122, '1233123', 16, 'WAEAWE', '2025-04-23'),
(123, '1233123', 17, 'AWEAWE', '2025-04-23'),
(124, '1233123', 18, 'AWWEAW', '2025-04-23'),
(125, '1233123', 19, 'Beasiswa Pemerintah Daerah', '2025-04-23'),
(126, '1233123', 20, 'Tinggi', '2025-04-23'),
(127, '1233123', 21, 'Setara', '2025-04-23'),
(128, '1233123', 22, 'Sedang', '2025-04-23'),
(129, '1233123', 23, 'Sangat Rendah', '2025-04-23'),
(130, '1233123', 24, 'Rendah', '2025-04-23'),
(131, '1233123', 25, 'Sangat Rendah', '2025-04-23'),
(132, '1233123', 26, 'Sedang', '2025-04-23'),
(133, '1233123', 27, 'Rendah', '2025-04-23'),
(134, '1233123', 28, 'Rendah', '2025-04-23'),
(135, '1233123', 29, 'Sedang', '2025-04-23'),
(136, '1233123', 30, 'Rendah', '2025-04-23'),
(137, '1233123', 31, 'Rendah', '2025-04-23'),
(138, '1233123', 32, 'Sedang', '2025-04-23'),
(139, '1233123', 33, 'Sangat Rendah', '2025-04-23'),
(140, '1233123', 34, 'Rendah', '2025-04-23'),
(141, '1233123', 35, 'Sangat Rendah', '2025-04-23'),
(142, '1233123', 38, 'Cukup', '2025-04-23'),
(143, '1233123', 39, 'Kecil', '2025-04-23'),
(144, '1233123', 40, 'Tidak Sama Sekali', '2025-04-23'),
(145, '1233123', 41, 'Kecil', '2025-04-23'),
(146, '1233123', 42, 'Kecil', '2025-04-23'),
(147, '1233123', 43, 'Tidak Sama Sekali', '2025-04-23'),
(148, '1233123', 44, 'Kecil', '2025-04-23'),
(149, '1233123', 45, '<=6 bulan Sebelum Lulus', '2025-04-23'),
(150, '1233123', 46, 'Membangun bisnis sendiri, Bekerja di tempat yang sama dengan tempat kerja semasa kuliah', '2025-04-23'),
(151, '1233123', 47, '<5 perusahaan/instansi/institusi', '2025-04-23'),
(152, '1233123', 48, 'Ya', '2025-04-23'),
(153, '1233123', 49, 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya., Pekerjaan saya saat ini lebih menarik.', '2025-04-23'),
(154, '1233123', 50, 'Tidak Sama Sekali', '2025-04-23'),
(155, '1233123', 51, 'Kecil', '2025-04-23'),
(156, '1233123', 52, 'Kecil', '2025-04-23'),
(157, '1233123', 53, 'Kecil', '2025-04-23'),
(158, '1233123', 54, 'Kecil', '2025-04-23'),
(159, '1233123', 55, 'Kecil', '2025-04-23'),
(160, '1233123', 56, 'Tidak Sama Sekali', '2025-04-23'),
(161, '1233123', 57, 'Kecil', '2025-04-23'),
(162, '1233123', 58, 'Kecil', '2025-04-23'),
(163, '1233123', 59, 'Cukup', '2025-04-23'),
(164, '1233123', 60, 'Kecil', '2025-04-23'),
(165, '1233123', 61, 'Kecil', '2025-04-23'),
(166, '1233123', 62, 'Tidak Sama Sekali', '2025-04-23'),
(167, '1233123', 63, 'Kecil', '2025-04-23'),
(168, '1233123', 13, 'Bekerja', '2025-04-23'),
(169, '1233123', 14, '3 <= WT < 6 Bulan ', '2025-04-23'),
(170, '1233123', 15, 'Rp. 5.000.000 - 10.000.000', '2025-04-23'),
(171, '1233123', 16, 'WAEAWE', '2025-04-23'),
(172, '1233123', 17, 'AWEAWE', '2025-04-23'),
(173, '1233123', 18, 'AWWEAW', '2025-04-23'),
(174, '1233123', 19, 'Beasiswa Pemerintah Daerah', '2025-04-23'),
(175, '1233123', 20, 'Tinggi', '2025-04-23'),
(176, '1233123', 21, 'Setara', '2025-04-23'),
(177, '1233123', 22, 'Sedang', '2025-04-23'),
(178, '1233123', 23, 'Sangat Rendah', '2025-04-23'),
(179, '1233123', 24, 'Rendah', '2025-04-23'),
(180, '1233123', 25, 'Sangat Rendah', '2025-04-23'),
(181, '1233123', 26, 'Sedang', '2025-04-23'),
(182, '1233123', 27, 'Rendah', '2025-04-23'),
(183, '1233123', 28, 'Rendah', '2025-04-23'),
(184, '1233123', 29, 'Sedang', '2025-04-23'),
(185, '1233123', 30, 'Rendah', '2025-04-23'),
(186, '1233123', 31, 'Rendah', '2025-04-23'),
(187, '1233123', 32, 'Sedang', '2025-04-23'),
(188, '1233123', 33, 'Sangat Rendah', '2025-04-23'),
(189, '1233123', 34, 'Rendah', '2025-04-23'),
(190, '1233123', 35, 'Sangat Rendah', '2025-04-23'),
(191, '1233123', 38, 'Cukup', '2025-04-23'),
(192, '1233123', 39, 'Kecil', '2025-04-23'),
(193, '1233123', 40, 'Tidak Sama Sekali', '2025-04-23'),
(194, '1233123', 41, 'Kecil', '2025-04-23'),
(195, '1233123', 42, 'Kecil', '2025-04-23'),
(196, '1233123', 43, 'Tidak Sama Sekali', '2025-04-23'),
(197, '1233123', 44, 'Kecil', '2025-04-23'),
(198, '1233123', 45, '<=6 bulan Sebelum Lulus', '2025-04-23'),
(199, '1233123', 46, 'Membangun bisnis sendiri, Bekerja di tempat yang sama dengan tempat kerja semasa kuliah', '2025-04-23'),
(200, '1233123', 47, '<5 perusahaan/instansi/institusi', '2025-04-23'),
(201, '1233123', 48, 'Ya', '2025-04-23'),
(202, '1233123', 49, 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya., Pekerjaan saya saat ini lebih menarik.', '2025-04-23'),
(203, '1233123', 50, 'Tidak Sama Sekali', '2025-04-23'),
(204, '1233123', 51, 'Kecil', '2025-04-23'),
(205, '1233123', 52, 'Kecil', '2025-04-23'),
(206, '1233123', 53, 'Kecil', '2025-04-23'),
(207, '1233123', 54, 'Kecil', '2025-04-23'),
(208, '1233123', 55, 'Kecil', '2025-04-23'),
(209, '1233123', 56, 'Tidak Sama Sekali', '2025-04-23'),
(210, '1233123', 57, 'Kecil', '2025-04-23'),
(211, '1233123', 58, 'Kecil', '2025-04-23'),
(212, '1233123', 59, 'Cukup', '2025-04-23'),
(213, '1233123', 60, 'Kecil', '2025-04-23'),
(214, '1233123', 61, 'Kecil', '2025-04-23'),
(215, '1233123', 62, 'Tidak Sama Sekali', '2025-04-23'),
(216, '1233123', 63, 'Kecil', '2025-04-23'),
(217, '1233123', 13, 'Bekerja', '2025-04-23'),
(218, '1233123', 14, 'WT < 3 Bulan', '2025-04-23'),
(219, '1233123', 15, 'Rp. > 10.000.000', '2025-04-23'),
(220, '1233123', 16, 'waedaw', '2025-04-23'),
(221, '1233123', 17, 'awda', '2025-04-23'),
(222, '1233123', 18, 'awda', '2025-04-23'),
(223, '1233123', 19, 'Beasiswa Pemerintah Daerah', '2025-04-23'),
(224, '1233123', 20, 'Sedang', '2025-04-23'),
(225, '1233123', 21, 'Setingkat lebih tinggi', '2025-04-23'),
(226, '1233123', 22, 'Rendah', '2025-04-23'),
(227, '1233123', 23, 'Sangat Rendah', '2025-04-23'),
(228, '1233123', 24, 'Sangat Rendah', '2025-04-23'),
(229, '1233123', 25, 'Sedang', '2025-04-23'),
(230, '1233123', 26, 'Rendah', '2025-04-23'),
(231, '1233123', 27, 'Rendah', '2025-04-23'),
(232, '1233123', 28, 'Rendah', '2025-04-23'),
(233, '1233123', 29, 'Rendah', '2025-04-23'),
(234, '1233123', 30, 'Sangat Rendah', '2025-04-23'),
(235, '1233123', 31, 'Rendah', '2025-04-23'),
(236, '1233123', 32, 'Sangat Rendah', '2025-04-23'),
(237, '1233123', 33, 'Sangat Rendah', '2025-04-23'),
(238, '1233123', 34, 'Sangat Rendah', '2025-04-23'),
(239, '1233123', 35, 'Rendah', '2025-04-23'),
(240, '1233123', 38, 'Cukup', '2025-04-23'),
(241, '1233123', 39, 'Kecil', '2025-04-23'),
(242, '1233123', 40, 'Tidak Sama Sekali', '2025-04-23'),
(243, '1233123', 41, 'Tidak Sama Sekali', '2025-04-23'),
(244, '1233123', 42, 'Kecil', '2025-04-23'),
(245, '1233123', 43, 'Tidak Sama Sekali', '2025-04-23'),
(246, '1233123', 44, 'Kecil', '2025-04-23'),
(247, '1233123', 45, '<=6 bulan Sebelum Lulus', '2025-04-23'),
(248, '1233123', 46, 'Melalui iklan di koran/majalah, brosur', '2025-04-23'),
(249, '1233123', 47, '<5 perusahaan/instansi/institusi', '2025-04-23'),
(250, '1233123', 48, 'Tidak', '2025-04-23'),
(251, '1233123', 49, 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.', '2025-04-23'),
(252, '1233123', 50, 'Tidak Sama Sekali', '2025-04-23'),
(253, '1233123', 51, 'Kecil', '2025-04-23'),
(254, '1233123', 52, 'Tidak Sama Sekali', '2025-04-23'),
(255, '1233123', 53, 'Kecil', '2025-04-23'),
(256, '1233123', 54, 'Kecil', '2025-04-23'),
(257, '1233123', 55, 'Tidak Sama Sekali', '2025-04-23'),
(258, '1233123', 56, 'Kecil', '2025-04-23'),
(259, '1233123', 57, 'Kecil', '2025-04-23'),
(260, '1233123', 58, 'Kecil', '2025-04-23'),
(261, '1233123', 59, 'Tidak Sama Sekali', '2025-04-23'),
(262, '1233123', 60, 'Tidak Sama Sekali', '2025-04-23'),
(263, '1233123', 61, 'Kecil', '2025-04-23'),
(264, '1233123', 62, 'Tidak Sama Sekali', '2025-04-23'),
(265, '1233123', 63, 'Tidak Sama Sekali', '2025-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Keadaan Sekarang'),
(2, 'Tingkat Kompetensi (Lulus)'),
(3, 'Tingkat Kompetensi (Sekarang)'),
(4, 'Masa Transisi'),
(5, 'Kuesioner Kepuasan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuisioner`
--

CREATE TABLE `tb_kuisioner` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jenis_jawaban` enum('radio','checkbox','text','select') NOT NULL,
  `opsi_jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kuisioner`
--

INSERT INTO `tb_kuisioner` (`id`, `judul`, `kategori_id`, `nomor`, `soal`, `jenis_jawaban`, `opsi_jawaban`) VALUES
(13, 'Keadaan Sekarang', 1, 1, 'Jelaskan Status Anda Saat Ini? (termasuk pekerjaan sambilan)', 'radio', '{\"opsi\":[\"Bekerja\",\"Berwirausaha\",\"Melanjutkan Studi\",\"Tidak Kerja Tetapi Sedang Mencari Kerja\"],\"ada_lainnya\":false}'),
(14, 'Keadaan Sekarang', 1, 2, 'Berapa lama Anda menunggu untuk mendapatkan pekerjaan pertama setelah Anda lulus? (WT=Waktu Tunggu)', 'radio', '{\"opsi\":[\"WT < 3 Bulan\",\"3 <= WT < 6 Bulan \",\"6 <= WT < 12 Bulan\",\"WT >= 12 Bulan\"],\"ada_lainnya\":false}'),
(15, 'Keadaan Sekarang', 1, 3, 'Berapa Kisaran Pendapatan perbulan Anda saat ini?', 'radio', '{\"opsi\":[\"Rp. > 10.000.000\",\"Rp. 5.000.000 - 10.000.000\",\"Rp. 3.000.000 - 5.000.000\",\"Rp. < 3.000.000\"],\"ada_lainnya\":false}'),
(16, 'Keadaan Sekarang', 1, 4, 'Di provinsi mana anda bekerja?', 'text', '{\"opsi\":[],\"ada_lainnya\":false}'),
(17, 'Keadaan Sekarang', 1, 5, 'Apa jenis perusahaan/instansi tempat anda bekerja sekarang', 'text', '{\"opsi\":[],\"ada_lainnya\":false}'),
(18, 'Keadaan Sekarang', 1, 6, 'Apa nama perusahaan/kantor tempat anda bekerja sekarang?', 'text', '{\"opsi\":[],\"ada_lainnya\":false}'),
(19, 'Keadaan Sekarang', 1, 7, 'Ketika anda kuliah di UNM, sumber dalam pembiayaan kuliah?', 'radio', '{\"opsi\":[\"Beasiswa PPA\\/BBM\",\"Beasiswa Pemerintah Daerah\",\"Beasiswa Pemerintah Pusat\",\"Orang Tua\"],\"ada_lainnya\":false}'),
(20, 'Keadaan Sekarang', 1, 8, 'Seberapa besar relevansi antara program studi dengan pekerjaan anda?', 'radio', '{\"opsi\":[\"Tinggi\",\"Sedang\",\"Rendah\"],\"ada_lainnya\":false}'),
(21, 'Keadaan Sekarang', 1, 9, 'Tingkat pendidikan apa yang paling tepat/sesuai dengan pekerjaan anda saat ini?', 'radio', '{\"opsi\":[\"Setingkat lebih tinggi\",\"Setara\",\"Setingkat leboh rendah\",\"Tidak memerlukan pendidikan tinggi\"],\"ada_lainnya\":false}'),
(22, 'Tingkat Kompetensi (Lulus)', 2, 1, 'Etika', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(23, 'Tingkat Kompetensi (Lulus)', 2, 2, 'Keahlian berdasarkan bidang ilmu', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(24, 'Tingkat Kompetensi (Lulus)', 2, 3, 'Bahasa inggris', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(25, 'Tingkat Kompetensi (Lulus)', 2, 4, 'Penggunaan Teknologi Informasi', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(26, 'Tingkat Kompetensi (Lulus)', 2, 5, 'Komunikasi', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(27, 'Tingkat Kompetensi (Lulus)', 2, 6, 'Kerja sama tim', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(28, 'Tingkat Kompetensi (Lulus)', 2, 7, 'Pengembangan Diri', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(29, 'Tingkat Kompetensi (Sekarang)', 3, 1, 'Etika', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(30, 'Tingkat Kompetensi (Sekarang)', 3, 2, 'Keahlian Berdasarkan Bidang Ilmu', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(31, 'Tingkat Kompetensi (Sekarang)', 3, 3, 'Bahasa Inggris', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(32, 'Tingkat Kompetensi (Sekarang)', 3, 4, 'Penggunaan Teknologi Informasi', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(33, 'Tingkat Kompetensi (Sekarang)', 3, 5, 'Komunikasi', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(34, 'Tingkat Kompetensi (Sekarang)', 3, 6, 'Kerja sama tim', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(35, 'Tingkat Kompetensi (Sekarang)', 3, 7, 'Pengembangan Diri', 'select', '{\"opsi\":[\"Sangat Rendah\",\"Rendah\",\"Sedang\",\"Tinggi\",\"Sangat Tinggi\"],\"ada_lainnya\":false}'),
(37, 'Masa Transisi', 4, 1, 'Menurut anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi anda?', '', '{\"opsi\":[],\"ada_lainnya\":false}'),
(38, 'Masa Transisi', 4, 1, 'Perkuliahan', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(39, 'Masa Transisi', 4, 2, 'Demonstrasi', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(40, 'Masa Transisi', 4, 3, 'Partisipasi dalam proyek riset', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(41, 'Masa Transisi', 4, 4, 'Magang', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(42, 'Masa Transisi', 4, 5, 'Praktikum', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(43, 'Masa Transisi', 4, 6, 'Kerja Lapangan', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(44, 'Masa Transisi', 4, 7, 'Diskusi', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(45, 'Masa Transisi', 4, 8, 'Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan', 'radio', '{\"opsi\":[\"<=6 bulan Sebelum Lulus\",\"Setelah Lulus\",\"=>6 bulan SETELAH LULUS\"],\"ada_lainnya\":false}'),
(46, 'Masa Transisi', 4, 9, 'Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu', 'checkbox', '{\"opsi\":[\"Melalui iklan di koran\\/majalah, brosur\",\"Melamar ke perusahaan tanpa mengetahui lowongan yang ada\",\"Pergi ke bursa\\/pameran kerja\",\"Mencari lewat internet\\/iklan online\\/milis\",\"Dihubungi oleh perusahaan\",\"Menghubungi Kemenakertrans\",\"Menghubungi agen tenaga kerja komersial\\/swasta\",\"Memeroleh informasi dari pusat\\/kantor pengembangan karir fakultas\\/universitas\",\"Menghubungi kantor kemahasiswaan\\/hubungan alumni\",\"Membangun jejaring (network) sejak masih kuliah\",\"Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)\",\"Membangun bisnis sendiri\",\"Melalui penempatan kerja atau magang\",\"Bekerja di tempat yang sama dengan tempat kerja semasa kuliah\"],\"ada_lainnya\":true}'),
(47, 'Masa Transisi', 4, 10, 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memperoleh pekerjaan pertama?', 'radio', '{\"opsi\":[\"<5 perusahaan\\/instansi\\/institusi\",\">=5 perusahaan\\/instansi\\/institusi\"],\"ada_lainnya\":false}'),
(48, 'Masa Transisi', 4, 11, 'Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir?', 'radio', '{\"opsi\":[\"Ya\",\"Tidak\"],\"ada_lainnya\":false}'),
(49, 'Masa Transisi', 4, 12, 'Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu', 'checkbox', '{\"opsi\":[\"Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.\",\"Saya belum mendapatkan pekerjaan yang lebih sesuai.\",\"Di pekerjaan ini saya memeroleh prospek karir yang bai\",\"Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.\",\"Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.\",\"Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.\",\"Pekerjaan saya saat ini lebih aman\\/terjamin\\/secure.\",\"Pekerjaan saya saat ini lebih menarik.\",\"Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan\\/jadwal yang fleksibel, dll.\",\"Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.\",\"Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.\",\"Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.\"],\"ada_lainnya\":false}'),
(50, 'Kuesioner Kepuasan', 5, 1, 'Keterlibatan lulusan dalam menyusun kurikulum dan profil program studi', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(51, 'Kuesioner Kepuasan', 5, 2, 'Kemudahan mengakses informasi akademik dan kepegawaian.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(52, 'Kuesioner Kepuasan', 5, 3, 'Kesempatan untuk menyampaikan saran dan kritikan.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(53, 'Kuesioner Kepuasan', 5, 4, 'Tindak lanjut kritik, saran dan keluhan yang disampaikan oleh lulusan.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(54, 'Kuesioner Kepuasan', 5, 5, 'Pemberdayaan lulusan.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(55, 'Kuesioner Kepuasan', 5, 6, 'Perlakuan yang adil terhadap mahasiswa berkaitan dengan kinerja program studi.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(56, 'Kuesioner Kepuasan', 5, 7, 'Ketersediaan informasi tentang legalisir ijazah dan transkrip nilai.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(57, 'Kuesioner Kepuasan', 5, 8, 'Keramahan tenaga kependidikan dalam melayani lulusan.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(58, 'Kuesioner Kepuasan', 5, 9, 'Kemudahan dalam proses legalisir ijazah dan transkrip nilai.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(59, 'Kuesioner Kepuasan', 5, 10, 'Kejelasan prosedur dalam legalisir ijazah dan transkrip nilai.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(60, 'Kuesioner Kepuasan', 5, 11, 'Kepastian waktu pengambilan legalisir ijazah dan transkrip nilai.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(61, 'Kuesioner Kepuasan', 5, 12, 'Tenaga kependidikan memberikan perilaku yang adil dalam pengambilan legalisir ijazah dan transkrip nilai.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(62, 'Kuesioner Kepuasan', 5, 13, 'Ketersediaan informasi tentang lowongan kerja.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}'),
(63, 'Kuesioner Kepuasan', 5, 14, 'Ketersediaan informasi tentang pelatihan dalam pengembangan karir.', 'select', '{\"opsi\":[\"Tidak Sama Sekali\",\"Kecil\",\"Cukup\",\"Besar\",\"Sangat Besar\"],\"ada_lainnya\":false}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('pria','wanita') NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `program_studi`, `tahun_lulus`, `password`, `nama_lengkap`, `tgl_lahir`, `gender`, `email`, `no_hp`, `alamat`) VALUES
('230210501001', 'Tekom', '2025', 'mhs123', 'Ali Mahasiswa', '2003-05-10', 'pria', 'ali@kampus.ac.id', '081234567890', 'Jl. Pendidikan No.1'),
('230210501002', 'Tekom', '2026', 'mhs123', 'Budi Santoso', '2003-08-15', 'pria', 'budi@kampus.ac.id', '081234567891', 'Jl. Merdeka No.2'),
('230210501003', 'Tekom', '2027', 'mhs123', 'Clara Rahmawati', '2002-12-05', 'wanita', 'clara@kampus.ac.id', '081234567892', 'Jl. Mawar No.3'),
('230210501004', 'Tekom', '1999', 'mhs123', 'Dewi Lestari', '2003-01-20', 'wanita', 'dewi@kampus.ac.id', '081234567893', 'Jl. Dahlia No.4'),
('230210501005', 'PTIK', '2100', 'mhs123', 'Andi Aidin Akabr', '2000-01-01', 'pria', 'default@example.com', '0000000000', 'Default Alamat'),
('230210501991', 'Teknik Komputer Magical', '0000', 'xxxxxxx', 'Muh Daryadnan Yurisky Ganteng', '2003-05-10', 'wanita', 'lusokasik@ITB.ac.id', 'callurmom', 'jalan afrika nomor 69');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuisioner_id` (`kuisioner_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kuisioner`
--
ALTER TABLE `tb_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `namaLengkap` (`nama_lengkap`,`email`,`no_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kuisioner`
--
ALTER TABLE `tb_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD CONSTRAINT `tb_jawaban_ibfk_1` FOREIGN KEY (`kuisioner_id`) REFERENCES `tb_kuisioner` (`id`);

--
-- Constraints for table `tb_kuisioner`
--
ALTER TABLE `tb_kuisioner`
  ADD CONSTRAINT `tb_kuisioner_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
