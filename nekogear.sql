-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2014 at 09:26 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nekogear`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bank_ids` varchar(4) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `bank_ids`, `logo`) VALUES
(1, 'Bank Mandiri', '008', ''),
(2, 'Bank BNI', '009', ''),
(3, 'Bank BRI', '002', ''),
(4, 'Bank Danamon', '011', ''),
(5, 'Bank Niaga', '022', ''),
(6, 'Bank Permata', '013', ''),
(7, 'Bank Mega', '426', ''),
(8, 'Bank Bukopin', '441', ''),
(9, 'Bank Muamalat Indonesia', '147', ''),
(10, 'Bank NISP', '028', ''),
(11, 'Bank Mayapada', '097', ''),
(12, 'Bank Syariah Mandiri', '451', ''),
(13, 'Bank Syariah Mega Indonesia', '506', ''),
(14, 'Bank Arta Niaga Kencana', '020', ''),
(15, 'Bank Buana Indonesia', '023', ''),
(16, 'ABN AMRO Bank', '052', ''),
(17, 'Lippobank', '026', ''),
(18, 'Bank Ganesha', '161', ''),
(19, 'Bank Mayora', '553', ''),
(20, 'Bank International Indonesia', '016', ''),
(21, 'Bank Bumiputera', '485', ''),
(22, 'Bank Nusantara Parahyangan', '145', ''),
(23, 'Bank Mestika', '151', ''),
(24, 'Bank IFI', '093', ''),
(25, 'Bank Panin', '019', ''),
(26, 'Bank Commonwealth', '950', ''),
(27, 'Bank Agroniaga', '494', ''),
(28, 'Bank HS 1906', '212', ''),
(29, 'Bank Eksekutif', '558', ''),
(30, 'Bank Artos Indonesia', '542', ''),
(31, 'Bank Swadesi', '146', ''),
(32, 'Standard Chartered Bank', '050', ''),
(33, 'Bank BPD Lampung', '121', ''),
(34, 'BPD DIY', '112', ''),
(35, 'Bank Sulut', '127', ''),
(36, 'Bank BPD Jambi', '115', ''),
(37, 'Bank Riau', '119', ''),
(38, 'BPD Bali', '129', ''),
(39, 'Bank BPD Kaltim', '124', ''),
(40, 'Bank Jatim', '114', ''),
(41, 'Bank Nagari', '118', ''),
(42, 'BPD Aceh', '116', ''),
(43, 'Bank Papua', '132', ''),
(44, 'BPD Kalsel', '122', ''),
(45, 'Bank DKI', '111', ''),
(46, 'Bank Ina Perdana', '513', ''),
(47, 'Bank Sumut', '117', ''),
(48, 'Bank Maluku', '131', ''),
(49, 'Bank BPD Sulsel', '126', ''),
(50, 'Bank NTT', '130', ''),
(51, 'Bank BPD NTB', '128', ''),
(52, 'Bank Jabar', '110', ''),
(53, 'BPD Kalteng', '125', ''),
(54, 'Bank BPD Sultra', '135', ''),
(55, 'Bank Bengkulu', '133', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(55) NOT NULL,
  `label` varchar(55) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `label`) VALUES
(1, 'Ready Stock', 'bg-lightBlue'),
(2, 'Pre Order', 'bg-amber');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('fbfdf800d45312a804f0fd80849042c6', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0', 1395350910, 'a:6:{s:9:"user_data";s:0:"";s:8:"identity";s:19:"gudang@nekogear.com";s:8:"username";s:7:"gu dang";s:5:"email";s:19:"gudang@nekogear.com";s:7:"user_id";s:2:"18";s:14:"old_last_login";s:10:"1394277179";}');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(55) NOT NULL,
  `color_code` varchar(6) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color`, `color_code`) VALUES
(1, 'Heather Black', '4b4b4b'),
(2, 'Heather Grey', 'b3b3b3'),
(3, 'White', 'ffffff'),
(4, 'Creme', 'fdf4dd'),
(5, 'Brown', '56341c'),
(6, 'Cranberry', '972844'),
(7, 'Sangria', 'ba3664'),
(8, 'Coral', 'e87977'),
(9, 'Red', 'c53437'),
(10, 'Poppy', 'db412c'),
(11, 'Orange', 'dc6824'),
(12, 'Gold', 'f3bf37'),
(13, 'Sunshine', 'f7e16c'),
(14, 'Lemon', 'fffbb0'),
(15, 'Light Pink', 'f9ebee'),
(16, 'Pink', 'efc9e1'),
(17, 'Mauve', 'd8c8d5'),
(18, 'Lavender', 'c7c1dd'),
(19, 'Ash Grey Apricot', 'e9c2bc'),
(20, 'Fuchsia', 'db54a0'),
(21, 'Rapsberry', 'b3388a'),
(22, 'Eggplant', '5f406e'),
(23, 'Purple', '5f5c9c'),
(24, 'Navy', '0f275d'),
(25, 'Lapis', '364f8d'),
(26, 'Royal Blue', '1d4db4'),
(27, 'Teal', '52a2ca'),
(28, 'Aqua', '7ec6dd'),
(29, 'Turquoise', '71d4d9'),
(30, 'Light Aqua', 'addedc'),
(31, 'Ash Grey Sea Foam', 'dae1d8'),
(32, 'Baby Blue', 'addedc'),
(33, 'Light Blue', 'e3ecf1'),
(34, 'Sea Foam', 'dbe9e8'),
(35, 'Lime', 'cce8bf'),
(36, 'Mint', '86c9b4'),
(37, 'Grass', '85b66b'),
(38, 'Kelly Green', '508e5a'),
(39, 'Forest', '32575d'),
(40, 'Olive', '535d4a'),
(41, 'Army', '5a533c'),
(42, 'Asphalt', '434157'),
(43, 'Stone T', 'aba79f'),
(44, 'New Silver', 'ccd2d5'),
(45, 'Ash Grey', 'e2e2e2'),
(46, 'Silver', 'e5e6e6'),
(47, 'Slate', 'adadbb'),
(48, 'Black', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `default_cities`
--

CREATE TABLE IF NOT EXISTS `default_cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `attribute` varchar(50) DEFAULT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kota_id` (`province_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=468 ;

--
-- Dumping data for table `default_cities`
--

INSERT INTO `default_cities` (`id`, `name`, `attribute`, `province_id`) VALUES
(1, 'Aceh Barat Daya', 'Kabupaten ', 1),
(2, 'Aceh Besar', 'Kabupaten ', 1),
(3, 'Aceh Jaya', 'Kabupaten ', 1),
(4, ' Aceh Selatan', 'Kabupaten', 1),
(5, ' Aceh Singkil', 'Kabupaten', 1),
(6, ' Aceh Tamiang', 'Kabupaten', 1),
(7, ' Aceh Tengah', 'Kabupaten', 1),
(8, 'Aceh Tenggara', 'Kabupaten ', 1),
(9, 'Aceh Timur', 'Kabupaten ', 1),
(10, 'Aceh Utara', 'Kabupaten ', 1),
(11, 'Bener Meriah', 'Kabupaten ', 1),
(12, 'Bireuen', 'Kabupaten ', 1),
(13, 'Gayo Lues', 'Kabupaten ', 1),
(14, 'Nagan Raya', 'Kabupaten ', 1),
(15, 'Pidie', 'Kabupaten ', 1),
(16, 'Pidie Jaya', 'Kabupaten ', 1),
(17, 'Simeulue', 'Kabupaten ', 1),
(18, 'Banda Aceh', 'Kota ', 1),
(19, 'Langsa', 'Kota ', 1),
(20, 'Lhokseumawe', 'Kota ', 1),
(21, 'Sabang', 'Kota ', 1),
(22, 'Subulussalam', 'Kota ', 1),
(23, 'Batu Bara', 'Kabupaten ', 2),
(24, 'Dairi', 'Kabupaten ', 2),
(25, 'Deli Serdang', 'Kabupaten ', 2),
(26, 'Humbang Hasundutan', 'Kabupaten ', 2),
(27, 'Karo', 'Kabupaten ', 2),
(28, 'Labuhanbatu', 'Kabupaten ', 2),
(29, 'Labuhanbatu Selatan', 'Kabupaten ', 2),
(30, 'Labuhanbatu Utara', 'Kabupaten ', 2),
(31, 'Langkat', 'Kabupaten ', 2),
(32, 'Mandailing Natal', 'Kabupaten ', 2),
(33, 'Nias', 'Kabupaten ', 2),
(34, 'Nias Barat', 'Kabupaten ', 2),
(35, 'Nias Selatan', 'Kabupaten ', 2),
(36, 'Nias Utara', 'Kabupaten ', 2),
(37, 'Padang Lawas', 'Kabupaten ', 2),
(38, 'Padang Lawas Utara', 'Kabupaten ', 2),
(39, 'Pakpak Bharat', 'Kabupaten ', 2),
(40, 'Samosir', 'Kabupaten ', 2),
(41, 'Serdang Bedagai', 'Kabupaten ', 2),
(42, 'Simalungun', 'Kabupaten ', 2),
(43, 'Tapanuli Selatan', 'Kabupaten ', 2),
(44, 'Tapanuli Tengah', 'Kabupaten ', 2),
(45, 'Tapanuli Utara', 'Kabupaten ', 2),
(46, 'Toba Samosir', 'Kabupaten ', 2),
(47, 'Binjai', 'Kota ', 2),
(48, 'Gunung Sitoli', 'Kota ', 2),
(49, 'Medan', 'Kota ', 2),
(50, 'Padang Sidempuan', 'Kota ', 2),
(51, 'Pematangsiantar', 'Kota ', 2),
(52, 'Sibolga', 'Kota ', 2),
(53, 'Tanjung Balai', 'Kota ', 2),
(54, 'Tebing Tinggi', 'Kota ', 2),
(55, 'Bengkulu Tengah', 'Kabupaten ', 3),
(56, 'Bengkulu Utara', 'Kabupaten ', 3),
(57, 'Benteng', 'Kabupaten ', 3),
(58, 'Kaur', 'Kabupaten ', 3),
(59, 'Kepahiang', 'Kabupaten ', 3),
(60, ' Lebong', 'Kabupaten', 3),
(61, 'Mukomuko', 'Kabupaten ', 3),
(62, 'Rejang Lebong', 'Kabupaten ', 3),
(63, 'Seluma', 'Kabupaten ', 3),
(64, 'Bengkulu', 'Kota ', 3),
(65, 'Bungo', 'Kabupaten ', 4),
(66, 'Kerinci', 'Kabupaten ', 4),
(67, 'Merangin', 'Kabupaten ', 4),
(68, 'Muaro Jambi', 'Kabupaten ', 4),
(69, 'Sarolangun', 'Kabupaten ', 4),
(70, 'Tanjung Jabung Barat', 'Kabupaten ', 4),
(71, 'Tanjung Jabung Timur', 'Kabupaten ', 4),
(72, 'Tebo', 'Kabupaten ', 4),
(73, 'Jambi', 'Kota ', 4),
(74, 'Sungai Penuh', 'Kota ', 4),
(75, 'Indragiri Hilir', 'Kabupaten ', 5),
(76, 'Indragiri Hulu', 'Kabupaten ', 5),
(77, 'Kampar', 'Kabupaten ', 5),
(78, 'Kuantan Singingi', 'Kabupaten ', 5),
(79, 'Pelalawan', 'Kabupaten ', 5),
(80, 'Rokan Hilir', 'Kabupaten ', 5),
(81, 'Rokan Hulu', 'Kabupaten ', 5),
(82, 'Siak', 'Kabupaten ', 5),
(83, 'Pekanbaru', 'Kota ', 5),
(84, 'Dumai', 'Kota ', 5),
(85, 'Kepulauan Meranti', 'Kabupaten ', 5),
(86, 'Dharmasraya', 'Kabupaten ', 6),
(87, 'Kepulauan Mentawai', 'Kabupaten ', 6),
(88, 'Lima Puluh Kota', 'Kabupaten ', 6),
(89, 'Padang Pariaman', 'Kabupaten ', 6),
(90, 'Pasaman', 'Kabupaten ', 6),
(91, 'Pasaman Barat', 'Kabupaten ', 6),
(92, 'Pesisir Selatan', 'Kabupaten ', 6),
(93, 'Sijunjung', 'Kabupaten ', 6),
(94, 'Solok', 'Kabupaten ', 6),
(95, 'Solok Selatan', 'Kabupaten ', 6),
(96, 'Tanah Datar', 'Kabupaten ', 6),
(97, 'Bukittinggi', 'Kota ', 6),
(98, 'Padang', 'Kota ', 6),
(99, 'Padangpanjang', 'Kota ', 6),
(100, 'Pariaman', 'Kota ', 6),
(101, 'Payakumbuh', 'Kota ', 6),
(102, 'Sawahlunto', 'Kota ', 6),
(103, 'Solok', 'Kota ', 6),
(104, 'Empat Lawang', 'Kabupaten ', 7),
(105, 'Lahat', 'Kabupaten ', 7),
(106, 'Muara Enim', 'Kabupaten ', 7),
(107, 'Musi Banyuasin', 'Kabupaten ', 7),
(108, 'Musi Rawas', 'Kabupaten ', 7),
(109, 'Ogan Ilir', 'Kabupaten ', 7),
(110, 'Ogan Komering Ilir', 'Kabupaten ', 7),
(111, 'Ogan Komering Ulu', 'Kabupaten ', 7),
(112, 'Ogan Komering Ulu Selatan', 'Kabupaten ', 7),
(113, 'Ogan Komering Ulu Timur', 'Kabupaten ', 7),
(114, 'Lubuklinggau', 'Kota ', 7),
(115, 'Pagar Alam', 'Kota ', 7),
(116, 'Palembang', 'Kota ', 7),
(117, 'Prabumulih', 'Kota ', 7),
(118, 'Lampung Selatan', 'Kabupaten ', 8),
(119, 'Lampung Tengah', 'Kabupaten ', 8),
(120, 'Lampung Timur', 'Kabupaten ', 8),
(121, 'Lampung Utara', 'Kabupaten ', 8),
(122, 'Mesuji', 'Kabupaten ', 8),
(123, 'Pesawaran', 'Kabupaten ', 8),
(124, 'Pringsewu', 'Kabupaten ', 8),
(125, 'Tanggamus', 'Kabupaten ', 8),
(126, 'Tulang Bawang', 'Kabupaten ', 8),
(127, 'Tulang Bawang Barat', 'Kabupaten ', 8),
(128, 'Way Kanan', 'Kabupaten ', 8),
(129, 'Bandar Lampung', 'Kota ', 8),
(130, 'Metro', 'Kota ', 8),
(131, 'Bangka Barat', 'Kabupaten ', 9),
(132, 'Bangka Selatan', 'Kabupaten ', 9),
(133, 'Bangka Tengah', 'Kabupaten ', 9),
(134, 'Belitung', 'Kabupaten ', 9),
(135, 'Belitung Timur', 'Kabupaten ', 9),
(136, 'Pangkal Pinang', 'Kota ', 9),
(137, 'Karimun', 'Kabupaten ', 10),
(138, 'Kepulauan Anambas', 'Kabupaten ', 10),
(139, 'Lingga', 'Kabupaten ', 10),
(140, 'Natuna', 'Kabupaten ', 10),
(141, 'Batam', 'Kota ', 10),
(142, 'Tanjung Pinang', 'Kota ', 10),
(143, 'Pandeglang', 'Kabupaten ', 11),
(144, 'Serang', 'Kabupaten ', 11),
(145, 'Tangerang', 'Kabupaten ', 11),
(146, 'Cilegon', 'Kota ', 11),
(147, 'Serang', 'Kota ', 11),
(148, 'Tangerang', 'Kota ', 11),
(149, 'Tangerang Selatan', 'Kota ', 11),
(150, 'Bandung Barat', 'Kabupaten ', 12),
(151, 'Bekasi', 'Kabupaten ', 12),
(152, 'Bogor', 'Kabupaten ', 12),
(153, 'Ciamis', 'Kabupaten ', 12),
(154, 'Cianjur', 'Kabupaten ', 12),
(155, 'Cirebon', 'Kabupaten ', 12),
(156, 'Garut', 'Kabupaten ', 12),
(157, 'Indramayu', 'Kabupaten', 12),
(158, 'Karawang', 'Kabupaten ', 12),
(159, 'Kuningan', 'Kabupaten ', 12),
(160, 'Majalengka', 'Kabupaten ', 12),
(161, 'Purwakarta', 'Kabupaten ', 12),
(162, 'Subang', 'Kabupaten ', 12),
(163, 'Sukabumi', 'Kabupaten ', 12),
(164, 'Sumedang', 'Kabupaten ', 12),
(165, 'Tasikmalaya', 'Kabupaten ', 12),
(166, 'Bandung', 'Kota ', 12),
(167, 'Banjar', 'Kota ', 12),
(168, 'Bekasi', 'Kota ', 12),
(169, 'Bogor', 'Kota ', 12),
(170, 'Cimahi', 'Kota ', 12),
(171, 'Cirebon', 'Kota ', 12),
(172, 'Depok', 'Kota ', 12),
(173, 'Sukabumi', 'Kota ', 12),
(174, 'Tasikmalaya', 'Kota ', 12),
(175, 'Administrasi Jakarta Barat', 'Kota ', 13),
(176, 'Administrasi Jakarta Pusat', 'Kota ', 13),
(177, 'Administrasi Jakarta Selatan', 'Kota ', 13),
(178, 'Administrasi Jakarta Timur', 'Kota ', 13),
(179, 'Administrasi Jakarta Utara', 'Kota ', 13),
(180, 'Banyumas', 'Kabupaten ', 14),
(181, 'Batang', 'Kabupaten ', 14),
(182, 'Blora', 'Kabupaten ', 14),
(183, 'Boyolali', 'Kabupaten ', 14),
(184, 'Brebes', 'Kabupaten ', 14),
(185, 'Cilacap', 'Kabupaten ', 14),
(186, 'Demak', 'Kabupaten ', 14),
(187, 'Grobogan', 'Kabupaten ', 14),
(188, 'Jepara', 'Kabupaten ', 14),
(189, 'Karanganyar', 'Kabupaten ', 14),
(190, 'Kebumen', 'Kabupaten ', 14),
(191, 'Kendal', 'Kabupaten ', 14),
(192, 'Klaten', 'Kabupaten ', 14),
(193, 'Kudus', 'Kabupaten ', 14),
(194, 'Magelang', 'Kabupaten ', 14),
(195, 'Pati', 'Kabupaten ', 14),
(196, 'Pekalongan', 'Kabupaten ', 14),
(197, 'Pemalang', 'Kabupaten ', 14),
(198, 'Purbalingga', 'Kabupaten ', 14),
(199, 'Purworejo', 'Kabupaten ', 14),
(200, 'Rembang', 'Kabupaten ', 14),
(201, 'Semarang', 'Kabupaten ', 14),
(202, 'Sragen', 'Kabupaten ', 14),
(203, 'Sukoharjo', 'Kabupaten ', 14),
(204, 'Tegal', 'Kabupaten ', 14),
(205, 'Temanggung', 'Kabupaten ', 14),
(206, 'Wonogiri', 'Kabupaten ', 14),
(207, 'Wonosobo', 'Kabupaten ', 14),
(208, 'Magelang', 'Kota ', 14),
(209, 'Pekalongan', 'Kota ', 14),
(210, 'Salatiga', 'Kota ', 14),
(211, 'Semarang', 'Kota ', 14),
(212, 'Surakarta', 'Kota ', 14),
(213, 'Tegal', 'Kota ', 14),
(214, 'Banyuwangi', 'Kabupaten ', 15),
(215, 'Blitar', 'Kabupaten ', 15),
(216, 'Bojonegoro', 'Kabupaten ', 15),
(217, 'Bondowoso', 'Kabupaten ', 15),
(218, 'Gresik', 'Kabupaten ', 15),
(219, 'Jember', 'Kabupaten ', 15),
(220, 'Jombang', 'Kabupaten ', 15),
(221, 'Kediri', 'Kabupaten ', 15),
(222, 'Lamongan', 'Kabupaten ', 15),
(223, 'Lumajang', 'Kabupaten ', 15),
(224, 'Madiun', 'Kabupaten ', 15),
(225, 'Magetan', 'Kabupaten ', 15),
(226, 'Malang', 'Kabupaten ', 15),
(227, 'Mojokerto', 'Kabupaten ', 15),
(228, 'Nganjuk', 'Kabupaten ', 15),
(229, 'Ngawi', 'Kabupaten ', 15),
(230, 'Pacitan', 'Kabupaten ', 15),
(231, 'Pamekasan', 'Kabupaten ', 15),
(232, 'Pasuruan', 'Kabupaten ', 15),
(233, 'Ponorogo', 'Kabupaten ', 15),
(234, 'Probolinggo', 'Kabupaten ', 15),
(235, 'Sampang', 'Kabupaten ', 15),
(236, 'Sidoarjo', 'Kabupaten ', 15),
(237, 'Situbondo', 'Kabupaten ', 15),
(238, 'Sumenep', 'Kabupaten ', 15),
(239, 'Trenggalek', 'Kabupaten ', 15),
(240, 'Tuban', 'Kabupaten ', 15),
(241, 'Tulungagung', 'Kabupaten ', 15),
(242, 'Batu', 'Kota ', 15),
(243, 'Blitar', 'Kota ', 15),
(244, 'Kediri', 'Kota ', 15),
(245, 'Madiun', 'Kota ', 15),
(246, 'Malang', 'Kota ', 15),
(247, 'Mojokerto', 'Kota ', 15),
(248, 'Pasuruan', 'Kota ', 15),
(249, 'Probolinggo', 'Kota ', 15),
(250, 'Surabaya', 'Kota ', 15),
(251, 'Gunung Kidul', 'Kabupaten ', 16),
(252, 'Kulon Progo', 'Kabupaten ', 16),
(253, 'Sleman', 'Kabupaten ', 16),
(254, 'Yogyakarta', 'Kota ', 16),
(255, 'Bangli', 'Kabupaten ', 17),
(256, 'Buleleng', 'Kabupaten ', 17),
(257, 'Gianyar', 'Kabupaten ', 17),
(258, 'Jembrana', 'Kabupaten ', 17),
(259, 'Karangasem', 'Kabupaten ', 17),
(260, 'Klungkung', 'Kabupaten ', 17),
(261, 'Tabanan', 'Kabupaten ', 17),
(262, 'Denpasar', 'Kota ', 17),
(263, 'Dompu', 'Kabupaten ', 18),
(264, 'Lombok Barat', 'Kabupaten ', 18),
(265, 'Lombok Tengah', 'Kabupaten ', 18),
(266, 'Lombok Timur', 'Kabupaten ', 18),
(267, 'Lombok Utara', 'Kabupaten ', 18),
(268, 'Sumbawa', 'Kabupaten ', 18),
(269, 'Sumbawa Barat', 'Kabupaten ', 18),
(270, 'Bima', 'Kota ', 18),
(271, 'Mataram', 'Kota ', 18),
(272, 'Timor Tengah Selatan', 'Kabupaten ', 19),
(273, 'Timor Tengah Utara', 'Kabupaten ', 19),
(274, 'Belu', 'Kabupaten ', 19),
(275, 'Alor', 'Kabupaten ', 19),
(276, 'Flores Timur', 'Kabupaten ', 19),
(277, 'Sikka', 'Kabupaten ', 19),
(278, 'Ende', 'Kabupaten ', 19),
(279, 'Ngada', 'Kabupaten ', 19),
(280, 'Manggarai', 'Kabupaten ', 19),
(281, 'Sumba Timur', 'Kabupaten ', 19),
(282, 'Sumba Barat', 'Kabupaten ', 19),
(283, 'Lembata', 'Kabupaten ', 19),
(284, 'Rote Ndao', 'Kabupaten ', 19),
(285, 'Manggarai Barat', 'Kabupaten ', 19),
(286, 'Nagekeo', 'Kabupaten ', 19),
(287, 'Sumba Tengah', 'Kabupaten ', 19),
(288, 'Sumba Barat Daya', 'Kabupaten ', 19),
(289, 'Manggarai Timur', 'Kabupaten ', 19),
(290, 'Sabu Raijua', 'Kabupaten', 19),
(291, 'Kupang', 'Kota ', 19),
(292, 'Kapuas Hulu', 'Kabupaten ', 20),
(293, 'Kayong Utara', 'Kabupaten ', 20),
(294, 'Ketapang', 'Kabupaten ', 20),
(295, 'Kubu Raya', 'Kabupaten ', 20),
(296, 'Landak', 'Kabupaten ', 20),
(297, 'Melawi', 'Kabupaten ', 20),
(298, 'Pontianak', 'Kabupaten ', 20),
(299, 'Sambas', 'Kabupaten ', 20),
(300, 'Sanggau', 'Kabupaten ', 20),
(301, 'Sekadau', 'Kabupaten ', 20),
(302, 'Sintang', 'Kabupaten ', 20),
(303, 'Pontianak', 'Kota ', 20),
(304, 'Singkawang', 'Kota ', 20),
(305, 'Banjar', 'Kabupaten ', 21),
(306, 'Barito Kuala', 'Kabupaten ', 21),
(307, 'Hulu Sungai Selatan', 'Kabupaten ', 21),
(308, 'Hulu Sungai Tengah', 'Kabupaten ', 21),
(309, 'Hulu Sungai Utara', 'Kabupaten ', 21),
(310, 'Kotabaru', 'Kabupaten ', 21),
(311, 'Tabalong', 'Kabupaten ', 21),
(312, 'Tanah Bumbu', 'Kabupaten ', 21),
(313, 'Tanah Laut', 'Kabupaten ', 21),
(314, 'Tapin', 'Kabupaten ', 21),
(315, 'Banjarbaru', 'Kota ', 21),
(316, 'Banjarmasin', 'Kota ', 21),
(317, 'Barito Timur', 'Kabupaten ', 22),
(318, 'Barito Utara', 'Kabupaten ', 22),
(319, 'Gunung Mas', 'Kabupaten ', 22),
(320, 'Kapuas', 'Kabupaten ', 22),
(321, 'Katingan', 'Kabupaten ', 22),
(322, 'Kotawaringin Barat', 'Kabupaten ', 22),
(323, 'Kotawaringin Timur', 'Kabupaten ', 22),
(324, 'Lamandau', 'Kabupaten ', 22),
(325, 'Murung Raya', 'Kabupaten ', 22),
(326, 'Pulang Pisau', 'Kabupaten ', 22),
(327, 'Sukamara', 'Kabupaten ', 22),
(328, 'Seruyan', 'Kabupaten ', 22),
(329, 'Palangka Raya', 'Kota ', 22),
(330, 'Bulungan', 'Kabupaten ', 23),
(331, 'Kutai Barat', 'Kabupaten ', 23),
(332, 'Kutai Kartanegara', 'Kabupaten ', 23),
(333, 'Kutai Timur', 'Kabupaten ', 23),
(334, 'Malinau', 'Kabupaten ', 23),
(335, 'Nunukan', 'Kabupaten ', 23),
(336, 'Paser', 'Kabupaten ', 23),
(337, 'Penajam Paser Utara', 'Kabupaten ', 23),
(338, 'Tana Tidung', 'Kabupaten ', 23),
(339, 'Balikpapan', 'Kota ', 23),
(340, 'Bontang', 'Kota ', 23),
(341, 'Samarinda', 'Kota ', 23),
(342, 'Tarakan', 'Kota ', 23),
(343, 'Bone Bolango', 'Kabupaten ', 24),
(344, 'Gorontalo', 'Kabupaten ', 24),
(345, 'Gorontalo Utara', 'Kabupaten ', 24),
(346, 'Pohuwato', 'Kabupaten ', 24),
(347, 'Gorontalo', 'Kota ', 24),
(348, 'Barru', 'Kabupaten ', 25),
(349, 'Bone', 'Kabupaten ', 25),
(350, 'Bulukumba', 'Kabupaten ', 25),
(351, 'Enrekang', 'Kabupaten ', 25),
(352, 'Gowa', 'Kabupaten ', 25),
(353, 'Jeneponto', 'Kabupaten ', 25),
(354, 'Kepulauan Selayar', 'Kabupaten ', 25),
(355, 'Luwu', 'Kabupaten ', 25),
(356, 'Luwu Timur', 'Kabupaten ', 25),
(357, 'Luwu Utara', 'Kabupaten ', 25),
(358, 'Maros', 'Kabupaten ', 25),
(359, 'Pangkajene dan Kepulauan', 'Kabupaten ', 25),
(360, 'Pinrang', 'Kabupaten ', 25),
(361, 'Sidenreng Rappang', 'Kabupaten ', 25),
(362, 'Sinjai', 'Kabupaten', 25),
(363, 'Soppeng', 'Kabupaten ', 25),
(364, 'Takalar', 'Kabupaten ', 25),
(365, 'Tana Toraja', 'Kabupaten ', 25),
(366, 'Toraja Utara', 'Kabupaten ', 25),
(367, ' Wajo', 'Kabupaten', 25),
(368, 'Makassar', 'Kota ', 25),
(369, 'Palopo', 'Kota ', 25),
(370, 'Parepare', 'Kota ', 25),
(371, 'Buton', 'Kabupaten ', 26),
(372, 'Buton Utara', 'Kabupaten ', 26),
(373, 'Kolaka', 'Kabupaten ', 26),
(374, 'Kolaka Utara', 'Kabupaten ', 26),
(375, 'Konawe', 'Kabupaten ', 26),
(376, 'Konawe Selatan', 'Kabupaten ', 26),
(377, 'Konawe Utara', 'Kabupaten ', 26),
(378, 'Muna', 'Kabupaten ', 26),
(379, 'Wakatobi', 'Kabupaten ', 26),
(380, 'Bau-Bau', 'Kota ', 26),
(381, 'Kendari', 'Kota ', 26),
(382, 'Banggai Kepulauan', 'Kabupaten ', 27),
(383, 'Buol', 'Kabupaten ', 27),
(384, 'Donggala', 'Kabupaten ', 27),
(385, 'Morowali', 'Kabupaten ', 27),
(386, 'Parigi Moutong', 'Kabupaten ', 27),
(387, 'Poso', 'Kabupaten ', 27),
(388, 'Tojo Una-Una', 'Kabupaten ', 27),
(389, 'Toli-Toli', 'Kabupaten ', 27),
(390, 'Sigi', 'Kabupaten ', 27),
(391, 'Palu', 'Kota ', 27),
(392, 'Bolaang Mongondow Selatan', 'Kabupaten ', 28),
(393, 'Bolaang Mongondow Timur', 'Kabupaten ', 28),
(394, 'Bolaang Mongondow Utara', 'Kabupaten ', 28),
(395, 'Kepulauan Sangihe', 'Kabupaten ', 28),
(396, 'Kepulauan Siau Tagulandang Biaro', 'Kabupaten ', 28),
(397, 'Kepulauan Talaud', 'Kabupaten ', 28),
(398, 'Minahasa', 'Kabupaten ', 28),
(399, 'Minahasa Selatan', 'Kabupaten ', 28),
(400, 'Minahasa Tenggara', 'Kabupaten ', 28),
(401, 'Minahasa Utara', 'Kabupaten', 28),
(402, 'Bitung', 'Kota ', 28),
(403, 'Kotamobagu', 'Kota ', 28),
(404, 'Manado', 'Kota', 28),
(405, 'Tomohon', 'Kota ', 28),
(406, 'Mamasa', 'Kabupaten ', 29),
(407, 'Mamuju', 'Kabupaten ', 29),
(408, 'Mamuju Utara', 'Kabupaten ', 29),
(409, 'Polewali Mandar', 'Kabupaten ', 29),
(410, 'Buru Selatan', 'Kabupaten ', 30),
(411, 'Kepulauan Aru', 'Kabupaten ', 30),
(412, 'Maluku Barat Daya', 'Kabupaten ', 30),
(413, 'Maluku Tengah', 'Kabupaten ', 30),
(414, 'Maluku Tenggara', 'Kabupaten ', 30),
(415, 'Maluku Tenggara Barat', 'Kabupaten ', 30),
(416, 'Seram Bagian Barat', 'Kabupaten ', 30),
(417, 'Seram Bagian Timur', 'Kabupaten ', 30),
(418, 'Ambon', 'Kota ', 30),
(419, 'Tual', 'Kota ', 30),
(420, 'Halmahera Tengah', 'Kabupaten ', 31),
(421, 'Halmahera Utara', 'Kabupaten ', 31),
(422, 'Halmahera Selatan', 'Kabupaten ', 31),
(423, 'Kepulauan Sula', 'Kabupaten ', 31),
(424, 'Halmahera Timur', 'Kabupaten ', 31),
(425, 'Pulau Morotai', 'Kabupaten ', 31),
(426, 'Ternate', 'Kota ', 31),
(427, 'Tidore Kepulauan', 'Kota ', 31),
(428, 'Biak Numfor', 'Kabupaten ', 32),
(429, 'Boven Digoel', 'Kabupaten ', 32),
(430, 'Deiyai', 'Kabupaten ', 32),
(431, 'Dogiyai', 'Kabupaten ', 32),
(432, 'Intan Jaya', 'Kabupaten ', 32),
(433, 'Jayapura', 'Kabupaten ', 32),
(434, 'Jayawijaya', 'Kabupaten ', 32),
(435, 'Keerom', 'Kabupaten ', 32),
(436, 'Kepulauan Yapen', 'Kabupaten ', 32),
(437, 'Lanny Jaya', 'Kabupaten ', 32),
(438, 'Mamberamo Raya', 'Kabupaten ', 32),
(439, 'Mamberamo Tengah', 'Kabupaten ', 32),
(440, 'Mappi', 'Kabupaten ', 32),
(441, 'Merauke', 'Kabupaten', 32),
(442, 'Mimika', 'Kabupaten ', 32),
(443, 'Nabire', 'Kabupaten ', 32),
(444, 'Nduga', 'Kabupaten ', 32),
(445, 'Paniai', 'Kabupaten ', 32),
(446, 'Pegunungan Bintang', 'Kabupaten ', 32),
(447, 'Puncak', 'Kabupaten ', 32),
(448, 'Puncak Jaya', 'Kabupaten ', 32),
(449, 'Sarmi', 'Kabupaten ', 32),
(450, ' Supiori', 'Kabupaten', 32),
(451, 'Tolikara', 'Kabupaten ', 32),
(452, 'Waropen', 'Kabupaten ', 32),
(453, 'Yahukimo', 'Kabupaten ', 32),
(454, 'Yalimo', 'Kabupaten ', 32),
(455, 'Jayapura', 'Kota ', 32),
(456, 'Asahan', 'Kabupaten ', 2),
(457, 'Kaimana', 'Kabupaten', 33),
(458, 'Manokwari', 'Kabupaten ', 33),
(459, 'Maybrat', 'Kabupaten ', 33),
(460, 'Raja Ampat', 'Kabupaten ', 33),
(461, 'Sorong', 'Kabupaten ', 33),
(462, 'Sorong Selatan', 'Kabupaten ', 33),
(463, 'Tambrauw', 'Kabupaten ', 33),
(464, 'Teluk Bintuni', 'Kabupaten ', 33),
(465, 'Teluk Wondama', 'Kabupaten ', 33),
(466, 'Sorong', 'Kota ', 33);

-- --------------------------------------------------------

--
-- Table structure for table `default_countries`
--

CREATE TABLE IF NOT EXISTS `default_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iso_2` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iso_3` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address_format` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_code` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `default_countries`
--

INSERT INTO `default_countries` (`id`, `name`, `iso_2`, `iso_3`, `address_format`, `post_code`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '', 0, 1),
(2, 'Albania', 'AL', 'ALB', '', 0, 1),
(3, 'Algeria', 'DZ', 'DZA', '', 0, 1),
(4, 'American Samoa', 'AS', 'ASM', '', 0, 1),
(5, 'Andorra', 'AD', 'AND', '', 0, 1),
(6, 'Angola', 'AO', 'AGO', '', 0, 1),
(7, 'Anguilla', 'AI', 'AIA', '', 0, 1),
(8, 'Antarctica', 'AQ', 'ATA', '', 0, 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', '', 0, 1),
(10, 'Argentina', 'AR', 'ARG', '', 0, 1),
(11, 'Armenia', 'AM', 'ARM', '', 0, 1),
(12, 'Aruba', 'AW', 'ABW', '', 0, 1),
(13, 'Australia', 'AU', 'AUS', '', 0, 1),
(14, 'Austria', 'AT', 'AUT', '', 0, 1),
(15, 'Azerbaijan', 'AZ', 'AZE', '', 0, 1),
(16, 'Bahamas', 'BS', 'BHS', '', 0, 1),
(17, 'Bahrain', 'BH', 'BHR', '', 0, 1),
(18, 'Bangladesh', 'BD', 'BGD', '', 0, 1),
(19, 'Barbados', 'BB', 'BRB', '', 0, 1),
(20, 'Belarus', 'BY', 'BLR', '', 0, 1),
(21, 'Belgium', 'BE', 'BEL', '', 0, 1),
(22, 'Belize', 'BZ', 'BLZ', '', 0, 1),
(23, 'Benin', 'BJ', 'BEN', '', 0, 1),
(24, 'Bermuda', 'BM', 'BMU', '', 0, 1),
(25, 'Bhutan', 'BT', 'BTN', '', 0, 1),
(26, 'Bolivia', 'BO', 'BOL', '', 0, 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', '', 0, 1),
(28, 'Botswana', 'BW', 'BWA', '', 0, 1),
(29, 'Bouvet Island', 'BV', 'BVT', '', 0, 1),
(30, 'Brazil', 'BR', 'BRA', '', 0, 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', '', 0, 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', '', 0, 1),
(33, 'Bulgaria', 'BG', 'BGR', '', 0, 1),
(34, 'Burkina Faso', 'BF', 'BFA', '', 0, 1),
(35, 'Burundi', 'BI', 'BDI', '', 0, 1),
(36, 'Cambodia', 'KH', 'KHM', '', 0, 1),
(37, 'Cameroon', 'CM', 'CMR', '', 0, 1),
(38, 'Canada', 'CA', 'CAN', '', 0, 1),
(39, 'Cape Verde', 'CV', 'CPV', '', 0, 1),
(40, 'Cayman Islands', 'KY', 'CYM', '', 0, 1),
(41, 'Central African Republic', 'CF', 'CAF', '', 0, 1),
(42, 'Chad', 'TD', 'TCD', '', 0, 1),
(43, 'Chile', 'CL', 'CHL', '', 0, 1),
(44, 'China', 'CN', 'CHN', '', 0, 1),
(45, 'Christmas Island', 'CX', 'CXR', '', 0, 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', '', 0, 1),
(47, 'Colombia', 'CO', 'COL', '', 0, 1),
(48, 'Comoros', 'KM', 'COM', '', 0, 1),
(49, 'Congo', 'CG', 'COG', '', 0, 1),
(50, 'Cook Islands', 'CK', 'COK', '', 0, 1),
(51, 'Costa Rica', 'CR', 'CRI', '', 0, 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', '', 0, 1),
(53, 'Croatia', 'HR', 'HRV', '', 0, 1),
(54, 'Cuba', 'CU', 'CUB', '', 0, 1),
(55, 'Cyprus', 'CY', 'CYP', '', 0, 1),
(56, 'Czech Republic', 'CZ', 'CZE', '', 0, 1),
(57, 'Denmark', 'DK', 'DNK', '', 0, 1),
(58, 'Djibouti', 'DJ', 'DJI', '', 0, 1),
(59, 'Dominica', 'DM', 'DMA', '', 0, 1),
(60, 'Dominican Republic', 'DO', 'DOM', '', 0, 1),
(61, 'East Timor', 'TP', 'TMP', '', 0, 1),
(62, 'Ecuador', 'EC', 'ECU', '', 0, 1),
(63, 'Egypt', 'EG', 'EGY', '', 0, 1),
(64, 'El Salvador', 'SV', 'SLV', '', 0, 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', '', 0, 1),
(66, 'Eritrea', 'ER', 'ERI', '', 0, 1),
(67, 'Estonia', 'EE', 'EST', '', 0, 1),
(68, 'Ethiopia', 'ET', 'ETH', '', 0, 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '', 0, 1),
(70, 'Faroe Islands', 'FO', 'FRO', '', 0, 1),
(71, 'Fiji', 'FJ', 'FJI', '', 0, 1),
(72, 'Finland', 'FI', 'FIN', '', 0, 1),
(73, 'France', 'FR', 'FRA', '', 0, 1),
(74, 'France, Metropolitan', 'FX', 'FXX', '', 0, 1),
(75, 'French Guiana', 'GF', 'GUF', '', 0, 1),
(76, 'French Polynesia', 'PF', 'PYF', '', 0, 1),
(77, 'French Southern Territories', 'TF', 'ATF', '', 0, 1),
(78, 'Gabon', 'GA', 'GAB', '', 0, 1),
(79, 'Gambia', 'GM', 'GMB', '', 0, 1),
(80, 'Georgia', 'GE', 'GEO', '', 0, 1),
(81, 'Germany', 'DE', 'DEU', '', 0, 1),
(82, 'Ghana', 'GH', 'GHA', '', 0, 1),
(83, 'Gibraltar', 'GI', 'GIB', '', 0, 1),
(84, 'Greece', 'GR', 'GRC', '', 0, 1),
(85, 'Greenland', 'GL', 'GRL', '', 0, 1),
(86, 'Grenada', 'GD', 'GRD', '', 0, 1),
(87, 'Guadeloupe', 'GP', 'GLP', '', 0, 1),
(88, 'Guam', 'GU', 'GUM', '', 0, 1),
(89, 'Guatemala', 'GT', 'GTM', '', 0, 1),
(90, 'Guinea', 'GN', 'GIN', '', 0, 1),
(91, 'Guinea-bissau', 'GW', 'GNB', '', 0, 1),
(92, 'Guyana', 'GY', 'GUY', '', 0, 1),
(93, 'Haiti', 'HT', 'HTI', '', 0, 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', '', 0, 1),
(95, 'Honduras', 'HN', 'HND', '', 0, 1),
(96, 'Hong Kong', 'HK', 'HKG', '', 0, 1),
(97, 'Hungary', 'HU', 'HUN', '', 0, 1),
(98, 'Iceland', 'IS', 'ISL', '', 0, 1),
(99, 'India', 'IN', 'IND', '', 0, 1),
(100, 'Indonesia', 'ID', 'IDN', '', 0, 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', '', 0, 1),
(102, 'Iraq', 'IQ', 'IRQ', '', 0, 1),
(103, 'Ireland', 'IE', 'IRL', '', 0, 1),
(104, 'Israel', 'IL', 'ISR', '', 0, 1),
(105, 'Italy', 'IT', 'ITA', '', 0, 1),
(106, 'Jamaica', 'JM', 'JAM', '', 0, 1),
(107, 'Japan', 'JP', 'JPN', '', 0, 1),
(108, 'Jordan', 'JO', 'JOR', '', 0, 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', '', 0, 1),
(110, 'Kenya', 'KE', 'KEN', '', 0, 1),
(111, 'Kiribati', 'KI', 'KIR', '', 0, 1),
(112, 'North Korea', 'KP', 'PRK', '', 0, 1),
(113, 'Korea, Republic of', 'KR', 'KOR', '', 0, 1),
(114, 'Kuwait', 'KW', 'KWT', '', 0, 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', '', 0, 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', '', 0, 1),
(117, 'Latvia', 'LV', 'LVA', '', 0, 1),
(118, 'Lebanon', 'LB', 'LBN', '', 0, 1),
(119, 'Lesotho', 'LS', 'LSO', '', 0, 1),
(120, 'Liberia', 'LR', 'LBR', '', 0, 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '', 0, 1),
(122, 'Liechtenstein', 'LI', 'LIE', '', 0, 1),
(123, 'Lithuania', 'LT', 'LTU', '', 0, 1),
(124, 'Luxembourg', 'LU', 'LUX', '', 0, 1),
(125, 'Macau', 'MO', 'MAC', '', 0, 1),
(126, 'Macedonia', 'MK', 'MKD', '', 0, 1),
(127, 'Madagascar', 'MG', 'MDG', '', 0, 1),
(128, 'Malawi', 'MW', 'MWI', '', 0, 1),
(129, 'Malaysia', 'MY', 'MYS', '', 0, 1),
(130, 'Maldives', 'MV', 'MDV', '', 0, 1),
(131, 'Mali', 'ML', 'MLI', '', 0, 1),
(132, 'Malta', 'MT', 'MLT', '', 0, 1),
(133, 'Marshall Islands', 'MH', 'MHL', '', 0, 1),
(134, 'Martinique', 'MQ', 'MTQ', '', 0, 1),
(135, 'Mauritania', 'MR', 'MRT', '', 0, 1),
(136, 'Mauritius', 'MU', 'MUS', '', 0, 1),
(137, 'Mayotte', 'YT', 'MYT', '', 0, 1),
(138, 'Mexico', 'MX', 'MEX', '', 0, 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', '', 0, 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', '', 0, 1),
(141, 'Monaco', 'MC', 'MCO', '', 0, 1),
(142, 'Mongolia', 'MN', 'MNG', '', 0, 1),
(143, 'Montserrat', 'MS', 'MSR', '', 0, 1),
(144, 'Morocco', 'MA', 'MAR', '', 0, 1),
(145, 'Mozambique', 'MZ', 'MOZ', '', 0, 1),
(146, 'Myanmar', 'MM', 'MMR', '', 0, 1),
(147, 'Namibia', 'NA', 'NAM', '', 0, 1),
(148, 'Nauru', 'NR', 'NRU', '', 0, 1),
(149, 'Nepal', 'NP', 'NPL', '', 0, 1),
(150, 'Netherlands', 'NL', 'NLD', '', 0, 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', '', 0, 1),
(152, 'New Caledonia', 'NC', 'NCL', '', 0, 1),
(153, 'New Zealand', 'NZ', 'NZL', '', 0, 1),
(154, 'Nicaragua', 'NI', 'NIC', '', 0, 1),
(155, 'Niger', 'NE', 'NER', '', 0, 1),
(156, 'Nigeria', 'NG', 'NGA', '', 0, 1),
(157, 'Niue', 'NU', 'NIU', '', 0, 1),
(158, 'Norfolk Island', 'NF', 'NFK', '', 0, 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', '', 0, 1),
(160, 'Norway', 'NO', 'NOR', '', 0, 1),
(161, 'Oman', 'OM', 'OMN', '', 0, 1),
(162, 'Pakistan', 'PK', 'PAK', '', 0, 1),
(163, 'Palau', 'PW', 'PLW', '', 0, 1),
(164, 'Panama', 'PA', 'PAN', '', 0, 1),
(165, 'Papua New Guinea', 'PG', 'PNG', '', 0, 1),
(166, 'Paraguay', 'PY', 'PRY', '', 0, 1),
(167, 'Peru', 'PE', 'PER', '', 0, 1),
(168, 'Philippines', 'PH', 'PHL', '', 0, 1),
(169, 'Pitcairn', 'PN', 'PCN', '', 0, 1),
(170, 'Poland', 'PL', 'POL', '', 0, 1),
(171, 'Portugal', 'PT', 'PRT', '', 0, 1),
(172, 'Puerto Rico', 'PR', 'PRI', '', 0, 1),
(173, 'Qatar', 'QA', 'QAT', '', 0, 1),
(174, 'Reunion', 'RE', 'REU', '', 0, 1),
(175, 'Romania', 'RO', 'ROM', '', 0, 1),
(176, 'Russian Federation', 'RU', 'RUS', '', 0, 1),
(177, 'Rwanda', 'RW', 'RWA', '', 0, 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', '', 0, 1),
(179, 'Saint Lucia', 'LC', 'LCA', '', 0, 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '', 0, 1),
(181, 'Samoa', 'WS', 'WSM', '', 0, 1),
(182, 'San Marino', 'SM', 'SMR', '', 0, 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', '', 0, 1),
(184, 'Saudi Arabia', 'SA', 'SAU', '', 0, 1),
(185, 'Senegal', 'SN', 'SEN', '', 0, 1),
(186, 'Seychelles', 'SC', 'SYC', '', 0, 1),
(187, 'Sierra Leone', 'SL', 'SLE', '', 0, 1),
(188, 'Singapore', 'SG', 'SGP', '', 0, 1),
(189, 'Slovak Republic', 'SK', 'SVK', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city} {postcode}\r\n{zone}\r\n{country}', 0, 1),
(190, 'Slovenia', 'SI', 'SVN', '', 0, 1),
(191, 'Solomon Islands', 'SB', 'SLB', '', 0, 1),
(192, 'Somalia', 'SO', 'SOM', '', 0, 1),
(193, 'South Africa', 'ZA', 'ZAF', '', 0, 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', '', 0, 1),
(195, 'Spain', 'ES', 'ESP', '', 0, 1),
(196, 'Sri Lanka', 'LK', 'LKA', '', 0, 1),
(197, 'St. Helena', 'SH', 'SHN', '', 0, 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', '', 0, 1),
(199, 'Sudan', 'SD', 'SDN', '', 0, 1),
(200, 'Suriname', 'SR', 'SUR', '', 0, 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '', 0, 1),
(202, 'Swaziland', 'SZ', 'SWZ', '', 0, 1),
(203, 'Sweden', 'SE', 'SWE', '', 0, 1),
(204, 'Switzerland', 'CH', 'CHE', '', 0, 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', '', 0, 1),
(206, 'Taiwan', 'TW', 'TWN', '', 0, 1),
(207, 'Tajikistan', 'TJ', 'TJK', '', 0, 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', '', 0, 1),
(209, 'Thailand', 'TH', 'THA', '', 0, 1),
(210, 'Togo', 'TG', 'TGO', '', 0, 1),
(211, 'Tokelau', 'TK', 'TKL', '', 0, 1),
(212, 'Tonga', 'TO', 'TON', '', 0, 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', '', 0, 1),
(214, 'Tunisia', 'TN', 'TUN', '', 0, 1),
(215, 'Turkey', 'TR', 'TUR', '', 0, 1),
(216, 'Turkmenistan', 'TM', 'TKM', '', 0, 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', '', 0, 1),
(218, 'Tuvalu', 'TV', 'TUV', '', 0, 1),
(219, 'Uganda', 'UG', 'UGA', '', 0, 1),
(220, 'Ukraine', 'UA', 'UKR', '', 0, 1),
(221, 'United Arab Emirates', 'AE', 'ARE', '', 0, 1),
(222, 'United Kingdom', 'GB', 'GBR', '', 1, 1),
(223, 'United States of America', 'US', 'USA', '', 0, 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', '', 0, 1),
(225, 'Uruguay', 'UY', 'URY', '', 0, 1),
(226, 'Uzbekistan', 'UZ', 'UZB', '', 0, 1),
(227, 'Vanuatu', 'VU', 'VUT', '', 0, 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', '', 0, 1),
(229, 'Venezuela', 'VE', 'VEN', '', 0, 1),
(230, 'Viet Nam', 'VN', 'VNM', '', 0, 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', '', 0, 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', '', 0, 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', '', 0, 1),
(234, 'Western Sahara', 'EH', 'ESH', '', 0, 1),
(235, 'Yemen', 'YE', 'YEM', '', 0, 1),
(236, 'Yugoslavia', 'YU', 'YUG', '', 0, 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', '', 0, 1),
(238, 'Zambia', 'ZM', 'ZMB', '', 0, 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `default_provinces`
--

CREATE TABLE IF NOT EXISTS `default_provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `default_provinces`
--

INSERT INTO `default_provinces` (`id`, `name`, `country_id`) VALUES
(1, 'Aceh', 100),
(2, 'Sumatera Utara', 100),
(3, 'Bengkulu', 100),
(4, 'Jambi', 100),
(5, 'Riau', 100),
(6, 'Sumatera Barat', 100),
(7, 'Sumatera Selatan', 100),
(8, 'Lampung', 100),
(9, 'Kepulauan Bangka Belitung', 100),
(10, 'Kepulauan Riau', 100),
(11, 'Banten', 100),
(12, 'Jawa Barat', 100),
(13, 'DKI Jakarta', 100),
(14, 'Jawa Tengah', 100),
(15, 'Jawa Timur', 100),
(16, 'Daerah Istimewa Yogyakarta', 100),
(17, 'Bali', 100),
(18, 'Nusa Tenggara Barat', 100),
(19, 'Nusa Tenggara Timur', 100),
(20, 'Kalimantan Barat', 100),
(21, 'Kalimantan Selatan', 100),
(22, 'Kalimantan Tengah', 100),
(23, 'Kalimantan Timur', 100),
(24, 'Gorontalo', 100),
(25, 'Sulawesi Selatan', 100),
(26, 'Sulawesi Tenggara', 100),
(27, 'Sulawesi Tengah', 100),
(28, 'Sulawesi Utara', 100),
(29, 'Sulawesi Barat', 100),
(30, 'Maluku', 100),
(31, 'Maluku Utara', 100),
(32, 'Papua', 100),
(33, 'Papua Barat', 100);

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE IF NOT EXISTS `design` (
  `design_id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(55) NOT NULL,
  `design` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `design_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approval_date` datetime NOT NULL,
  `status` enum('PENDING','SUBMITTED','APPROVED','REJECTED') NOT NULL,
  PRIMARY KEY (`design_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`design_id`, `theme`, `design`, `email`, `design_date`, `approval_date`, `status`) VALUES
(2, '3', '4dd5a-nisekoi.full.1637441.jpg', 'admin@admin.com', '2014-02-25 04:07:12', '2014-02-25 04:07:12', 'APPROVED'),
(7, '3', '710cb-nisekoi.full.1637440.jpg', 'admin@admin.com', '2014-02-25 06:01:25', '0000-00-00 00:00:00', 'PENDING'),
(8, '', '', 'admin@admin.com', '2014-03-08 18:15:46', '0000-00-00 00:00:00', 'PENDING'),
(9, '7', '844dd-345.jpg', '', '2014-03-08 18:17:09', '0000-00-00 00:00:00', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `design_theme`
--

CREATE TABLE IF NOT EXISTS `design_theme` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(55) NOT NULL,
  `theme` varchar(55) NOT NULL,
  `theme_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('PENDING','DONE') NOT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `design_theme`
--

INSERT INTO `design_theme` (`theme_id`, `email`, `theme`, `theme_date`, `status`) VALUES
(3, '', 'Nisekoi', '2014-02-17 18:20:01', 'PENDING'),
(4, '', 'Gundam', '2014-02-17 18:24:28', 'PENDING'),
(5, '', 'Wooser', '2014-02-17 18:33:41', 'PENDING'),
(6, '', 'Haruhi', '2014-02-17 18:48:04', 'PENDING'),
(7, '', 'Robot', '2014-03-08 18:16:08', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'gudang', 'Divisi Gudang'),
(4, 'keuangan', 'Divisi Keuangan'),
(5, 'desainer', 'Desainer');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `SKU` varchar(55) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` enum('Ready Stock','Pre Order') NOT NULL,
  `weight` float NOT NULL,
  `price` float NOT NULL,
  `anime_origin` varchar(55) NOT NULL,
  `character_name` varchar(55) NOT NULL,
  `tees_material` enum('Cotton Combad 30','Cotton Combad 24','Cotton Combad 20') NOT NULL,
  `printing_material` enum('Superwhite','Rubber','Foam','Glow','Gold / Silver Dust') NOT NULL,
  `printing_size` enum('A4','A3','A2','A1','Full Print') NOT NULL,
  `notes` text NOT NULL,
  `published` enum('Y','N') NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `SKU`, `image`, `category`, `weight`, `price`, `anime_origin`, `character_name`, `tees_material`, `printing_material`, `printing_size`, `notes`, `published`) VALUES
(1, 'Nisekoi-01', 'nisekoi-01-blue.jpg', 'Ready Stock', 0.5, 90000, '3', 'Kirisaki Chitoge', 'Cotton Combad 30', 'Superwhite', 'A2', '', 'Y'),
(2, 'Nisekoi-02', 'nisekoi-02-red.jpg', 'Ready Stock', 0.5, 90000, '3', 'Ichijou Raku', 'Cotton Combad 24', 'Rubber', 'A2', '', 'Y'),
(3, 'Wooser-01', 'wooser-01-yellow.jpg', 'Pre Order', 0.5, 90000, '4', 'Wooser', 'Cotton Combad 20', 'Foam', 'A3', '<p>\r\n Produk pre-order, perkiraan selesai tanggal xxxx-xx-xx</p>\r\n', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `items_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  PRIMARY KEY (`items_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `item_id`, `stock_id`) VALUES
(0, 1, 1),
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 3, 16),
(17, 3, 17),
(18, 3, 18),
(19, 3, 19),
(20, 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE IF NOT EXISTS `item_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `colour` varchar(55) NOT NULL,
  `size` enum('XS','S','L','M','XL') NOT NULL,
  `stock_quantity` smallint(5) NOT NULL DEFAULT '0',
  `production_id` int(11) NOT NULL,
  `returnee` enum('Y','N') NOT NULL,
  `returnee_stat` enum('-','PENDING','PROSES','SELESAI') NOT NULL,
  PRIMARY KEY (`stock_id`),
  UNIQUE KEY `stock_id` (`stock_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`stock_id`, `colour`, `size`, `stock_quantity`, `production_id`, `returnee`, `returnee_stat`) VALUES
(1, 'Putih', 'XS', 3, 8, 'Y', 'PENDING'),
(2, 'Putih', 'S', 3, 8, 'N', '-'),
(3, 'Putih', 'M', 2, 8, 'N', '-'),
(4, 'Putih', 'L', 1, 8, 'N', '-'),
(5, 'Putih', 'XL', 0, 8, 'N', '-'),
(6, 'Biru', 'XS', 1, 8, 'N', '-'),
(7, 'Biru', 'S', 2, 0, 'N', '-'),
(8, 'Biru', 'M', 5, 0, 'N', '-'),
(9, 'Biru', 'L', 4, 0, 'N', '-'),
(10, 'Biru', 'XL', 2, 0, 'N', '-'),
(11, 'Merah', 'XS', 3, 0, 'N', '-'),
(12, 'Merah', 'S', 4, 0, 'N', '-'),
(13, 'Merah', 'M', 3, 0, 'N', '-'),
(14, 'Merah', 'L', 2, 0, 'N', '-'),
(15, 'Merah', 'XL', 2, 0, 'N', '-'),
(16, 'Kuning', 'XS', 7, 0, 'N', '-'),
(17, 'Kuning', 'S', 8, 0, 'N', '-'),
(18, 'Kuning', 'M', 1, 0, 'N', '-'),
(19, 'Kuning', 'L', 3, 0, 'N', '-'),
(20, 'Kuning', 'XL', 6, 0, 'N', '-');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total_bill` double NOT NULL,
  `order_date` datetime NOT NULL,
  `process_date` datetime NOT NULL,
  `status` enum('PENDING','PROSES','TERKIRIM','BATAL') NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `email`, `total_bill`, `order_date`, `process_date`, `status`) VALUES
('530C7BD81C7', 'ceroberoz@gmail.com', 285000, '2014-02-25 12:17:44', '2014-02-25 12:18:46', 'TERKIRIM'),
('530CB98BD81', 'admin@admin.com', 190000, '2014-02-25 16:40:59', '2014-02-25 16:41:27', 'PROSES'),
('531AFABBDA8', 'ceroberoz@gmail.com', 285000, '2014-03-08 12:10:51', '2014-03-08 12:12:28', 'TERKIRIM'),
('532194A5CDA', 'ceroberoz@gmail.com', 380000, '2014-03-13 12:21:09', '2014-03-13 12:22:29', 'PROSES'),
('532B588D3CD', 'ceroberoz@gmail.com', 285000, '2014-03-20 22:07:25', '0000-00-00 00:00:00', 'PENDING'),
('532B588DCD2', 'ceroberoz@gmail.com', 285000, '2014-03-20 22:07:25', '0000-00-00 00:00:00', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `order_complaint`
--

CREATE TABLE IF NOT EXISTS `order_complaint` (
  `order_id` varchar(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `message` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `complaint_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('PENDING','DONE','SOLVED') NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_complaint`
--

INSERT INTO `order_complaint` (`order_id`, `email`, `subject`, `message`, `attachment`, `complaint_date`, `status`) VALUES
('530C7BD81C7', '', '', '', '', '2014-02-25 18:17:44', 'PENDING'),
('530CB98BD81', '', '', '', '', '2014-02-25 22:41:00', 'PENDING'),
('531AFABBDA8', '', '', '', '', '2014-03-08 18:10:52', 'PENDING'),
('5321929917B', '', '', '', '', '2014-03-13 18:12:25', 'PENDING'),
('532194A5CDA', '', '', '', '', '2014-03-13 18:21:10', 'PENDING'),
('532B588D3CD', '', '', '', '', '2014-03-21 04:07:26', 'PENDING'),
('532B588DCD2', '', '', '', '', '2014-03-21 04:07:27', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(11) NOT NULL,
  `SKU` varchar(55) NOT NULL,
  `category` varchar(55) NOT NULL,
  `weight` float NOT NULL,
  `size` varchar(3) NOT NULL,
  `color` varchar(55) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_price` double NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `order_id`, `SKU`, `category`, `weight`, `size`, `color`, `quantity`, `order_price`) VALUES
(1, '530C7BD81C7', 'Wooser-01', 'Pre Order', 1, 'XL', 'Kuning', 2, 180000),
(2, '530C7BD81C7', 'Nisekoi-02', 'Ready Stock', 0.5, 'XS', 'Merah', 1, 90000),
(3, '530CB98BD81', 'Wooser-01', 'Pre Order', 1, 'XS', 'Kuning', 2, 180000),
(4, '531AFABBDA8', 'Wooser-01', 'Pre Order', 0.5, 'XS', 'Kuning', 1, 90000),
(5, '531AFABBDA8', 'Wooser-01', 'Pre Order', 0.5, 'L', 'Kuning', 1, 90000),
(6, '531AFABBDA8', 'Nisekoi-01', 'Ready Stock', 0.5, 'XS', 'Putih', 1, 90000),
(9, '532194A5CDA', 'Nisekoi-02', 'Ready Stock', 0.5, 'XS', 'Merah', 1, 90000),
(10, '532194A5CDA', 'Nisekoi-01', 'Ready Stock', 0.5, 'XS', 'Biru', 1, 90000),
(11, '532194A5CDA', 'Wooser-01', 'Pre Order', 1, 'XS', 'Kuning', 2, 180000),
(12, '532B588D3CD', 'Wooser-01', 'Pre Order', 0.5, 'XS', 'Kuning', 1, 90000),
(13, '532B588D3CD', 'Wooser-01', 'Pre Order', 0.5, 'XL', 'Kuning', 1, 90000),
(14, '532B588D3CD', 'Nisekoi-02', 'Ready Stock', 0.5, 'XS', 'Merah', 1, 90000),
(15, '532B588DCD2', 'Wooser-01', 'Pre Order', 0.5, 'XS', 'Kuning', 1, 90000),
(16, '532B588DCD2', 'Wooser-01', 'Pre Order', 0.5, 'XL', 'Kuning', 1, 90000),
(17, '532B588DCD2', 'Nisekoi-02', 'Ready Stock', 0.5, 'XS', 'Merah', 1, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `our_bank_account`
--

CREATE TABLE IF NOT EXISTS `our_bank_account` (
  `our_bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(55) NOT NULL,
  `owner` varchar(55) NOT NULL,
  `bank_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`our_bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `our_bank_account`
--

INSERT INTO `our_bank_account` (`our_bank_id`, `bank_name`, `bank_account`, `owner`, `bank_logo`) VALUES
(2, 'Bank Mandiri', '34567887654567', 'Perdana Hadi Sanjaya', 'assets/images/bank/logo-mandiri.png'),
(3, 'Bank BCA', '456789876556', 'Perdana Hadi Sanjaya', 'assets/images/bank/logo-bca.png'),
(4, '-', '', '', 'assets/images/bank/logo-null.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(11) NOT NULL,
  `payment_method` enum('-','Cash','Transfer') NOT NULL,
  `account_holder` varchar(55) NOT NULL,
  `bank_account` varchar(55) NOT NULL,
  `bank_origin` varchar(55) NOT NULL,
  `bank_destination` enum('-','Bank BCA','Bank Mandiri') NOT NULL,
  `paid_value` double NOT NULL,
  `image_verification` varchar(255) NOT NULL,
  `payment_date` datetime NOT NULL,
  `status` enum('PENDING','LUNAS') NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_method`, `account_holder`, `bank_account`, `bank_origin`, `bank_destination`, `paid_value`, `image_verification`, `payment_date`, `status`) VALUES
(1, '530C7BD81C7', 'Transfer', 'Perdana Hadi', '8000080000', 'Bank DKI', 'Bank Mandiri', 295000, 'Nov_[02].png', '2014-02-25 12:18:46', 'LUNAS'),
(2, '530CB98BD81', 'Transfer', 'Perdana Hadi', '90009090', 'Bank Mandiri', 'Bank Mandiri', 190000, 'useless_maid.png', '2014-02-25 16:41:27', 'LUNAS'),
(3, '531AFABBDA8', 'Transfer', 'Perdana', '0879987', 'Bank Mandiri', 'Bank Mandiri', 285000, '440.jpg', '2014-03-08 12:12:28', 'LUNAS'),
(5, '532194A5CDA', 'Transfer', 'Perdana Hadi', '147000000000808', 'Bank Mandiri', 'Bank Mandiri', 380000, 'kill-la-kill_twIcon1_4.png', '2014-03-13 12:22:29', 'LUNAS'),
(6, '532B588D3CD', '-', '', '', '', '-', 0, '', '0000-00-00 00:00:00', 'PENDING'),
(7, '532B588DCD2', '-', '', '', '', '-', 0, '', '0000-00-00 00:00:00', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE IF NOT EXISTS `production` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `vendor_id` varchar(55) NOT NULL,
  `design_id` int(11) NOT NULL,
  `tees_color` varchar(255) NOT NULL,
  `tees_material` enum('Cotton Combad 30''s','Cotton Combad 24''s','Cotton Combad 20''s') NOT NULL,
  `printing_material` enum('Superwhite','Rubber','Foam','Glow','Gold / Silver Dust') NOT NULL,
  `XS` int(11) NOT NULL,
  `S` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `XL` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `production_form` varchar(255) NOT NULL,
  `production_date_start` datetime NOT NULL,
  `production_date_end` datetime NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` enum('PENDING','PROD. START','PROD. END') NOT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `email`, `vendor_id`, `design_id`, `tees_color`, `tees_material`, `printing_material`, `XS`, `S`, `M`, `L`, `XL`, `total_cost`, `production_form`, `production_date_start`, `production_date_end`, `note`, `status`) VALUES
(8, 'admin@admin.com', '0', 2, '19', 'Cotton Combad 24''s', 'Foam', 2, 4, 5, 6, 7, 900000, '997bc-dfm.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'PROD. END'),
(9, '', 'HYV', 9, '5', '', 'Superwhite', 2, 2, 3, 5, 6, 0, '2a0cb-1173.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'PROD. END');

-- --------------------------------------------------------

--
-- Table structure for table `production_design`
--

CREATE TABLE IF NOT EXISTS `production_design` (
  `prodes_id` int(11) NOT NULL AUTO_INCREMENT,
  `production_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  PRIMARY KEY (`prodes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `production_pay`
--

CREATE TABLE IF NOT EXISTS `production_pay` (
  `prod_pay_id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `payment_type` enum('TRANSFER','CASH') NOT NULL,
  `bank_origin` int(11) NOT NULL,
  `acc_number` varchar(55) NOT NULL,
  `acc_name` varchar(55) NOT NULL,
  `paid_value` float NOT NULL,
  `bank_destination` int(11) NOT NULL,
  `acc_number_dest` varchar(55) NOT NULL,
  `paid_upload` varchar(255) NOT NULL,
  `paid_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('DP','LUNAS') NOT NULL,
  PRIMARY KEY (`prod_pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_pay`
--

INSERT INTO `production_pay` (`prod_pay_id`, `email`, `payment_type`, `bank_origin`, `acc_number`, `acc_name`, `paid_value`, `bank_destination`, `acc_number_dest`, `paid_upload`, `paid_date`, `status`) VALUES
(8, 'admin@admin.com', 'TRANSFER', 3, '789789', 'Nekogear Co', 900000, 9, '80808080', '', '0000-00-00 00:00:00', 'LUNAS'),
(9, '', 'TRANSFER', 3, '8659876589765', 'Perdana', 8500000, 15, '567897667656789', '', '2014-04-01 00:00:00', 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `co_note` varchar(55) NOT NULL,
  `shipping_date` datetime NOT NULL,
  `expedition` enum('JNE','TIKI','POS Indonesia') NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `fees` double NOT NULL,
  `status` enum('PENDING','TERKIRIM') NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`co_note`, `shipping_date`, `expedition`, `order_id`, `fees`, `status`) VALUES
('100000101', '2014-02-25 12:19:48', 'JNE', '530C7BD81C7', 15000, 'TERKIRIM'),
('', '0000-00-00 00:00:00', 'JNE', '530CB98BD81', 10000, 'PENDING'),
('DPK0989876976976', '2014-03-08 12:14:25', 'JNE', '531AFABBDA8', 15000, 'TERKIRIM'),
('', '0000-00-00 00:00:00', 'JNE', '532194A5CDA', 20000, 'PENDING'),
('', '0000-00-00 00:00:00', 'JNE', '532B588D3CD', 15000, 'PENDING'),
('', '0000-00-00 00:00:00', 'JNE', '532B588DCD2', 15000, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `address`, `city`, `postal_code`, `phone`) VALUES
(1, '\0\0', 'administrator', '523fe770aba8138513173ccabc4deaeaa7e76a24', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1394737973, 1, 'Admin', 'istrator', 'Bukit Waringin 29', 169, '16321', '085780909147'),
(2, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Perdana Hadi', 'f4634e9898054d040fae92299bc97dfb927e5e83', NULL, 'ceroberoz@gmail.com', NULL, NULL, NULL, NULL, 1390808090, 1395349597, 1, 'Perdana', 'Hadi', 'Bukit Waringin C17/3', 152, '16321', NULL),
(3, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'andre christian', '6033a1048a09a7a48e4a42b1f6768d4e76cf54eb', NULL, 'andre@gmail.com', NULL, NULL, NULL, NULL, 1390896927, 1390896956, 1, 'Andre', 'Christian', '', 0, '', '0817171717'),
(4, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'niwa daisuke', '671e6141c60f66b891d9cf80de59c5e9f800b730', NULL, 'ceropyon@yahoo.com', NULL, NULL, NULL, NULL, 1391020634, 1391020634, 1, 'Niwa', 'Daisuke', 'Jalan Apalah 9', 0, '16322', '085780909111'),
(5, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Perdana Hadi', 'fc9d39cab528c557aaf9f1268b617e319ce0a3f8', NULL, 'ceroberoz@yahoo.com', NULL, NULL, NULL, NULL, 1391022858, 1391022877, 1, 'Perdana', 'Hadi', 'Dimana aja boleh', 0, '16321', '085780909147'),
(6, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'ratu sarah', '17261290307db0bddbea91924f0c55860ccd15f0', NULL, 'shiroe666@yahoo.com', NULL, NULL, NULL, NULL, 1391030367, 1391030367, 1, 'Ratu', 'Sarah', 'dimana aja boleh 819', 0, '45678', '897543456787654'),
(8, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'adam san', '546ce04a2f92ebf16f7a48c53918cb3e16fefe3c', NULL, 'adam@live.com', NULL, NULL, NULL, NULL, 1391052533, 1391052533, 1, 'Adam', 'San', 'Markas rahasia 8', 0, '45678', '987656789976'),
(9, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'bruce wayne', '50eb2f5c1230b0eb3f5931e77d90987bcfd0a562', NULL, 'batman@mail.com', NULL, NULL, NULL, NULL, 1392230527, 1392230527, 1, 'Bruce', 'Wayne', 'Wayne Mayor', 0, '123452', '678976567899'),
(10, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'clark kent', 'c5dc0a71ca2a9419cd7f32b7b73904c27c1f144a', NULL, 'superman@mail.com', NULL, NULL, NULL, NULL, 1392230748, 1392230785, 1, 'Clark', 'Kent', 'Smallville', 146, '456765', '69767899876'),
(11, '', '', '01f2f45a98a5e591a481e4f0e2f49f46132b147c', NULL, 'cero@mail.net', NULL, NULL, NULL, NULL, 1392236639, NULL, 1, 'Perdana', 'Hadi', '', 0, '', NULL),
(12, '', '', '80ed7d556bbb5161997e57eaeac26bef750dcca6', NULL, 'resnu@mail.com', NULL, NULL, NULL, NULL, 1392270443, NULL, 1, 'Resnu', 'Wanwan', 'di sebelah rumahnya orang', 250, '67869', '75678998765'),
(13, '', '', '26ded6db79942cc80fe984fa1ae83ccc67dee1c7', NULL, 'sanjaya@mail.com', NULL, NULL, NULL, NULL, 1392291486, NULL, 1, 'Perdana', 'Hadi', '', 0, '', NULL),
(14, '', '', '110240e8681d621b5bad72b50b0ca97d11836e4b', NULL, 'lalala@lala.com', NULL, NULL, NULL, NULL, 1392295425, NULL, 1, 'Mikaku', 'Nina', 'entahah', 6, '567766', '7898789'),
(15, '', '', '3b4fe777abe0f04c3366bb01b0d4344e75364d6a', NULL, 'uuu@yay.com', NULL, NULL, NULL, NULL, 1392295768, NULL, 1, 'Uuuu', 'Yay', 'cero7410', 84, '678876', '67897678'),
(16, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'desa iner', '59faa1ab975e601a49f6475fc44543efd2e1a636', NULL, 'desainer@nekogear.com', NULL, NULL, NULL, NULL, 1393297574, 1394708875, 1, 'Desa', 'Iner', '-', 250, '16324', '00000000000001'),
(17, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'keu angan', '7eae6f16685f48fed022e77e812125a7074f20b5', NULL, 'keuangan@nekogear.com', NULL, NULL, NULL, NULL, 1393297611, 1394709817, 1, 'Keu', 'Angan', '-', 245, '56786', '00000000000001'),
(18, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'gu dang', '31cf8fe123cfdb95255b2ffc7b5ad5ceace4e7cc', NULL, 'gudang@nekogear.com', NULL, NULL, NULL, NULL, 1393297645, 1395350514, 1, 'Gu', 'Dang', '-', 262, '56776', '00000000000001');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(18, 1, 3),
(19, 1, 4),
(17, 1, 5),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(9, 8, 2),
(10, 9, 2),
(11, 10, 2),
(12, 11, 2),
(13, 12, 2),
(14, 13, 2),
(15, 14, 2),
(16, 15, 2),
(20, 16, 2),
(25, 16, 5),
(21, 17, 2),
(24, 17, 4),
(22, 18, 2),
(23, 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(55) NOT NULL,
  `specialized` set('Tees','Hoodie','Jacket','Merchandise') NOT NULL,
  `reputation` enum('POOR','GOOD','TRUSTED') NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `name`, `address`, `city`, `email`, `specialized`, `reputation`) VALUES
('CAP', 'Custom Apparel', '', '166', 'ordermakeyourtees@yahoo.com', 'Tees', 'GOOD'),
('HYV', 'Helloyello Co', '', '211', 'vendor@vint8.com', 'Tees', 'TRUSTED');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
