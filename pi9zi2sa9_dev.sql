-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2022 at 10:07 AM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pi9zi2sa9_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL DEFAULT '',
  `point` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `use_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `code`, `point`, `status`, `create_date`, `use_date`) VALUES
(15, '000027679415174990840662759', '50', '0', '2021-11-15 06:14:48', '2021-11-15 20:14:59'),
(16, '000604015059256844098521468', '10000000', '0', '2022-07-28 01:35:42', '2022-07-28 08:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `code_script`
--

CREATE TABLE `code_script` (
  `id` int(11) NOT NULL,
  `script` int(11) NOT NULL DEFAULT 0,
  `code` varchar(30) NOT NULL DEFAULT '',
  `status` varchar(255) DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `use_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `code_script`
--

INSERT INTO `code_script` (`id`, `script`, `code`, `status`, `create_date`, `use_date`) VALUES
(22, 6, '000554341951506067', '0', '2021-11-15 06:15:11', '2021-11-15 20:15:23'),
(23, 67, '000235623941009281', '0', '2022-07-28 02:04:17', '2022-07-28 09:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history_topup`
--

CREATE TABLE `history_topup` (
  `id` int(255) NOT NULL COMMENT 'idรายการ',
  `status` varchar(955) NOT NULL COMMENT 'สถานะรายการ',
  `amount` varchar(955) NOT NULL COMMENT 'จำนวนเงิน',
  `slip_time_stamp` varchar(955) NOT NULL COMMENT 'วันเวลา',
  `ref_txid` varchar(955) NOT NULL COMMENT 'เลขอ้างอิง',
  `username` varchar(955) NOT NULL COMMENT 'ชื่อผูัทำรายการ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_topup`
--

INSERT INTO `history_topup` (`id`, `status`, `amount`, `slip_time_stamp`, `ref_txid`, `username`) VALUES
(1, '1', '1', '2022-07-23 22:29:00', '220422759283I000007B9790', 'Theearpat_tt'),
(2, '1', '428', '2022-07-24 15:04:00', '012205150453APP01412', 'Theearpat_tt');

-- --------------------------------------------------------

--
-- Table structure for table `kn_config`
--

CREATE TABLE `kn_config` (
  `id` int(11) NOT NULL,
  `website_title` varchar(100) NOT NULL,
  `website_status` varchar(50) NOT NULL DEFAULT '',
  `website_Domain` varchar(256) NOT NULL,
  `website_Version` varchar(50) NOT NULL,
  `Facebook` varchar(50) NOT NULL,
  `youtube` varchar(256) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `bgurl` varchar(256) NOT NULL,
  `new_script` varchar(256) NOT NULL,
  `wef_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kn_config`
--

INSERT INTO `kn_config` (`id`, `website_title`, `website_status`, `website_Domain`, `website_Version`, `Facebook`, `youtube`, `logo`, `bgurl`, `new_script`, `wef_title`) VALUES
(1, 'KN-SHOP', 'เปิดให้บริการ', 'KN-SHOP.ML', '3.0', 'https://web.facebook.com/Kn-Dev-102090228969937', 'https://www.youtube.com/embed/zS0iffhiRIY', 'https://www.img.in.th/images/a88fb9541bc9ee22dc870fcbaaba4e44.png', 'https://www.img.in.th/images/15f2cb9e21d73cc9737de1176956cb04.jpg', '/Script/7', 'KN-Deveropers');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` int(11) NOT NULL,
  `license` varchar(20) NOT NULL,
  `script` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL DEFAULT 'CURRENT_TIMESTAMP()',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) DEFAULT NULL,
  `download` int(255) DEFAULT 4,
  `dev` varchar(50) NOT NULL DEFAULT '<@752874415989063700>'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `license`, `script`, `ip`, `user`, `date`, `name`, `download`, `dev`) VALUES
(192, 'KNSHOP_O0INOIX1O0H7T', 'เว็ปสูตร คาสิโน SA SEXY SRC	', '223.24.157.132', 'CURRENT_TIMESTAMP()', '2022-11-15 06:47:00', 'name2888', 1, '<@752874415989063700>'),
(193, 'KNSHOP_QJWDCMT41ZHR0', 'เว็ปสูตร คาสิโน SA SEXY SRC	', '1', 'CURRENT_TIMESTAMP()', '2022-07-23 03:27:05', 'DEVTHA232', 0, '<@752874415989063700>'),
(194, 'KNSHOP_JRSP219PJK6ZW', 'เว็ปสูตร คาสิโน SA SEXY SRC	', '12', 'CURRENT_TIMESTAMP()', '2022-07-23 03:53:06', 'cmd888', 1, '<@752874415989063700>'),
(195, 'KNSHOP_EXVLH1JF7X2EW', 'เว็ปสูตร คาสิโน SA SEXY SRC	', '1', 'CURRENT_TIMESTAMP()', '2022-07-23 04:43:22', 'Sso', 1, '<@752874415989063700>'),
(196, 'HNAWKEY_C2NQQ6C42QF1', 'เว็ปสูตร คาสิโน SA SEXY SRC	', '1', 'CURRENT_TIMESTAMP()', '2022-07-23 04:43:50', 'Bkk', 1, '<@752874415989063700>'),
(197, 'HNAWKEY_HBOVO80EK5G7', 'เว็ปสูตร คาสิโน SA SEXY SRC', '2403:6200:8851:68b2:f8a8:8f79:ecb6:826e)', 'CURRENT_TIMESTAMP()', '2022-07-24 10:19:38', 'Theearpat_tt', 0, '<@752874415989063700>'),
(198, 'HNAWKEY_A1C71V01PIOV', 'เว็ปสูตร คาสิโน SA SEXY SRC', '1', 'CURRENT_TIMESTAMP()', '2022-07-28 02:21:08', 'Theearpat_tt', 4, '<@752874415989063700>');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `descript` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `descript`, `status`, `date`) VALUES
(3, 'User [123456] Register Success With IP: [223.24.158.122]', '1', '2021-11-13 13:30:05'),
(4, 'IP: [223.24.158.122] Try to log in using username. [kornzaxs]', '5', '2021-11-13 13:50:55'),
(5, 'IP: [223.24.158.122] Try to log in using username. [kornzaxs]', '5', '2021-11-13 13:57:32'),
(6, 'User [kornzaxs] Register Success With IP: [223.24.158.122]', '1', '2021-11-13 13:57:42'),
(7, 'User [kornzaxs] Use Code [000302799150343108780423238] With IP: [223.24.158.122] But Wrong Code', '5', '2021-11-13 13:58:18'),
(8, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 05:46:41'),
(9, 'User [iceza] Register Success With IP: [171.5.222.234]', '1', '2021-11-14 06:00:35'),
(10, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:02:12'),
(11, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:02'),
(12, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:06'),
(13, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:08'),
(14, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:12'),
(15, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:14'),
(16, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:14'),
(17, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:14'),
(18, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:30'),
(19, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:31'),
(20, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:31'),
(21, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:31'),
(22, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:32'),
(23, 'User [kornzaxs] Login Success With IP: [223.24.156.209]', '1', '2021-11-14 06:06:32'),
(24, 'User [kornzaxs] Login Success With IP: [223.24.171.25]', '1', '2021-11-14 12:21:48'),
(25, 'User [kornzaxs] Login Success With IP: [223.24.171.25]', '1', '2021-11-14 12:22:27'),
(26, 'User [kornzaxs] Login Success With IP: [223.24.171.25]', '1', '2021-11-14 12:26:29'),
(27, 'User [kornzaxs] Login Success With IP: [223.24.171.25]', '1', '2021-11-14 12:30:52'),
(28, 'User [kornzaxs] Login Success With IP: [223.24.171.25]', '1', '2021-11-14 15:02:43'),
(29, 'IP: [223.24.157.132] Try to log in using username. [http://kn-shop.ml/wef/]', '5', '2021-11-15 03:38:17'),
(30, 'User [kornzaxs] Login Success With IP: [223.24.157.132]', '1', '2021-11-15 04:01:32'),
(31, 'User [kornzaxs] Buy Script [KN_Thief] Error With IP: [223.24.157.132] Because the points are not enough', '5', '2021-11-15 04:02:11'),
(32, 'User [kornzaxs] Buy Script [KN_Thief] Error With IP: [223.24.157.132] Because the points are not enough', '5', '2021-11-15 04:02:54'),
(33, 'User [kornzaxs] Buy Script [KN_BurglaryHouse] Success With IP: [223.24.157.132]', '1', '2021-11-15 04:03:53'),
(34, 'User [kornzaxs] Login Success With IP: [223.24.157.132]', '1', '2021-11-15 05:19:06'),
(35, 'User [SNOPPY303403] Register Success With IP: [49.228.138.120]', '1', '2021-11-15 05:20:08'),
(36, 'User [d7me] Register Success With IP: [151.254.179.20]', '1', '2021-11-15 05:43:28'),
(37, 'User [123456789] Register Success With IP: [223.24.157.132]', '1', '2021-11-15 06:12:49'),
(38, 'User [123456789] Generate Code [000027679415174990840662759] For [50] Success With IP: [223.24.157.132]', '1', '2021-11-15 06:14:48'),
(39, 'User [123456789] Use Code [000027679415174990840662759] System Add Point [50] Point Success With IP: [223.24.157.132] ', '1', '2021-11-15 06:14:59'),
(40, 'User [123456789] Generate Code [000554341951506067] For [KN_Dj] Success With IP: [223.24.157.132]', '1', '2021-11-15 06:15:11'),
(41, 'User [123456789] Use Code [000554341951506067] System Add Script [KN_Dj] Success With IP: [223.24.157.132] ', '1', '2021-11-15 06:15:23'),
(42, 'User [123456789] UPDATE script IP to [11501150] Success With IP: [223.24.157.132] ', '1', '2021-11-15 06:15:32'),
(43, 'User [123456789] Add [1000] Point to User [123456789] Success With IP: [223.24.157.132] ', '1', '2021-11-15 06:15:54'),
(44, 'User [123456789] Add [9999] Point to User [123456789] Success With IP: [223.24.157.132] ', '1', '2021-11-15 06:16:17'),
(45, 'User [123456789] Buy Script [Mustart_Chefjob] Success With IP: [223.24.157.132]', '1', '2021-11-15 06:16:32'),
(46, 'User [123456789] Download Script [Mustart_Chefjob] Success With IP: [223.24.157.132]', '1', '2021-11-15 06:16:55'),
(47, 'User [123456789] Download Script [KN_Dj] Success With IP: [223.24.157.132]', '1', '2021-11-15 06:17:11'),
(48, 'IP: [223.24.157.132] Try to log in using username. [kornzaxs]', '5', '2021-11-15 06:46:32'),
(49, 'User [123456789] Login Success With IP: [223.24.157.132]', '1', '2021-11-15 06:46:46'),
(50, 'User [123456789] Buy Script [KN_carkey] Success With IP: [223.24.157.132]', '1', '2021-11-15 06:47:00'),
(51, 'IP: [223.24.157.132] Try to log in using username. [kornzaxs]', '5', '2021-11-15 08:19:55'),
(52, 'User [123456789] Login Error Wrong Password With IP: [223.24.157.132]', '5', '2021-11-15 08:20:22'),
(53, 'User [123456789] Login Success With IP: [223.24.157.132]', '1', '2021-11-15 08:20:33'),
(54, 'User [123456789] Login Success With IP: [223.24.92.129]', '1', '2021-11-15 11:03:19'),
(55, 'User [123456789] Login Success With IP: [223.24.92.129]', '1', '2021-11-15 11:30:20'),
(56, 'User [123456789] Login Success With IP: [223.24.92.129]', '1', '2021-11-15 11:55:37'),
(57, 'IP: [::1] Try to log in using username. [admin]', '5', '2022-07-23 00:53:34'),
(58, 'User [Theearpat_tt] Register Success With IP: [::1]', '1', '2022-07-23 00:53:53'),
(59, 'User [Theearpat_tt] Login Success With IP: [::1]', '1', '2022-07-23 02:10:10'),
(60, 'User [Theearpat_tt] Login Success With IP: [::1]', '1', '2022-07-23 03:13:07'),
(61, 'User [Theearpat_tt] Buy Script [KN_Tumra] Success With IP: [::1]', '1', '2022-07-23 03:27:05'),
(62, 'User [Theearpat_tt] Edit Script ID [9] Success With IP: [::1] ', '1', '2022-07-23 03:39:43'),
(63, 'User [Theearpat_tt] Buy Script [KN_Tumra] Success With IP: [::1]', '1', '2022-07-23 03:53:06'),
(64, 'User [Theearpat_tt] Edit Script ID [4] Success With IP: [::1] ', '1', '2022-07-23 04:02:03'),
(65, 'User [Theearpat_tt] Edit Script ID [4] Success With IP: [::1] ', '1', '2022-07-23 04:02:11'),
(66, 'User [Theearpat_tt] Buy Script [KN_BurglaryHouse] Success With IP: [::1]', '1', '2022-07-23 04:43:22'),
(67, 'User [Theearpat_tt] Buy Script [KN_carkey] Success With IP: [::1]', '1', '2022-07-23 04:43:50'),
(68, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:02:09'),
(69, 'User [Theearpat_tt] Download Script [KN_Tumra] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:02:45'),
(70, 'User [Theearpat_tt] Add Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e] ', '1', '2022-07-24 10:07:45'),
(71, 'User [Theearpat_tt] Edit Image Script ID [67] Error With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e] Because MySQL Error', '5', '2022-07-24 10:08:19'),
(72, 'User [Theearpat_tt] Edit Image Script ID [67] Error With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e] Because MySQL Error', '5', '2022-07-24 10:08:30'),
(73, 'User [Theearpat_tt] Buy Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:19:38'),
(74, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:19:46'),
(75, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Error With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e] Because already downloaded', '5', '2022-07-24 10:20:16'),
(76, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:24:43'),
(77, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:33:13'),
(78, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:33:24'),
(79, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:33:32'),
(80, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 10:33:41'),
(81, 'User [Theearpat_tt] Download Script [เว็ปสูตร คาสิโน SA SEXY SRC] Error With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e] Because already downloaded', '5', '2022-07-24 10:33:47'),
(82, 'User [Theearpat_tt] Edit Script ID [67] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e] ', '1', '2022-07-24 11:33:21'),
(83, 'User [Theearpat_tt] Edit Script ID [67] Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e] ', '1', '2022-07-24 11:33:31'),
(84, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:68b2:88a7:97ae:aad2:7aa]', '1', '2022-07-24 11:35:54'),
(85, 'User [Theearpat_tt] Login Error Wrong Password With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '5', '2022-07-24 12:15:32'),
(86, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:68b2:f8a8:8f79:ecb6:826e]', '1', '2022-07-24 12:15:42'),
(87, 'User [Theearpat_tt] Login Success With IP: [2001:44c8:4480:e3:b97f:59a6:bd7f:c439]', '1', '2022-07-24 14:39:05'),
(88, 'IP: [49.237.43.37] Try to log in using username. [&lt;script&gt;alert(&quot;HELLO&quot;);&lt;/script&gt;]', '5', '2022-07-24 14:45:25'),
(89, 'User [&lt;script&gt;alert(&quot;HELLO&quot;);&lt;/script&gt;] Register Success With IP: [49.237.43.37]', '1', '2022-07-24 14:46:06'),
(90, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:68b2:a941:b0b1:34e6:62b9]', '1', '2022-07-24 23:04:42'),
(91, 'User [Theearpat_tt] Login Success With IP: [2001:44c8:4446:7349:58b9:f7d7:f995:fce1]', '1', '2022-07-25 01:19:12'),
(92, 'IP: [110.171.14.195] Try to log in using username. [qwwe]', '5', '2022-07-25 21:31:48'),
(93, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:8c6a:d523:e89c:154f:2e22]', '1', '2022-07-25 22:27:55'),
(94, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:8c6a:d523:e89c:154f:2e22]', '1', '2022-07-25 22:27:55'),
(95, 'IP: [27.145.136.132] Try to log in using username. [admin]', '5', '2022-07-26 03:01:34'),
(96, 'User [Theearpat_tt] Login Success With IP: [171.4.251.23]', '1', '2022-07-26 13:13:03'),
(97, 'User [Theearpat_tt] Edit Script ID [67] Success With IP: [171.4.251.23] ', '1', '2022-07-26 13:13:25'),
(98, 'IP: [58.11.15.215] Try to log in using username. [8954]', '5', '2022-07-26 13:55:13'),
(99, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:62af:6107:8a7c:1017:958f]', '1', '2022-07-26 14:51:12'),
(100, 'User [Theearpat_tt] Login Error Wrong Password With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba]', '5', '2022-07-28 01:00:47'),
(101, 'User [Theearpat_tt] Login Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba]', '1', '2022-07-28 01:01:04'),
(102, 'User [Theearpat_tt] Add [590] Point to User [123456789] Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba] ', '1', '2022-07-28 01:17:57'),
(103, 'User [Theearpat_tt] Generate Code [000604015059256844098521468] For [10000000] Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba]', '1', '2022-07-28 01:35:42'),
(104, 'User [Theearpat_tt] Use Code [000604015059256844098521468] System Add Point [10000000] Point Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba] ', '1', '2022-07-28 01:35:54'),
(105, 'User [Theearpat_tt] Generate Code [000235623941009281] For [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba]', '1', '2022-07-28 02:04:17'),
(106, 'User [Theearpat_tt] Use Code [000235623941009281] System Add Script [เว็ปสูตร คาสิโน SA SEXY SRC] Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba] ', '1', '2022-07-28 02:21:08'),
(107, 'User [Theearpat_tt] Register Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba]', '1', '2022-07-28 02:35:23'),
(108, 'User [Theearpat_tt] Add Script [เว็บขายสคิป พร้อมระบบ เติมเงินแนบสลิป api tmweasy.com] Success With IP: [2403:6200:8851:c995:58a4:ae44:8cf0:b5ba] ', '1', '2022-07-28 02:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `point` varchar(255) DEFAULT '0',
  `status` varchar(255) DEFAULT 'member',
  `regis_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `phone`, `point`, `status`, `regis_date`) VALUES
(74, '&lt;script&gt;alert(&quot;HELLO&quot;);&lt;/script&gt;', '$2y$10$zPlC2FbZNFtwXnsGFGdgQOSE7xMfbuuuCUvZ4fE/EudTkQqTaIHW6', '1234564@gmail.com', '0623445126', '0', 'member', '2022-07-24 14:46:06'),
(75, 'Theearpat_tt', '$2y$10$uaTU0PVAmELd0kI4DV5AIuewCppQTLzbKdJSWIXhgtYAKegmp0Lne', 'mobeu773@gmail.com', '1234567890', '1789000000000000', 'admin', '2022-07-28 02:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `script`
--

CREATE TABLE `script` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `version` varchar(255) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `foldername` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `description` varchar(9999) DEFAULT NULL,
  `video_youtube` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discount` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `script`
--

INSERT INTO `script` (`id`, `name`, `version`, `price`, `foldername`, `file`, `description`, `video_youtube`, `image`, `date`, `discount`) VALUES
(67, 'เว็ปสูตร คาสิโน SA SEXY SRC', '1.1.2', '1000', 'เว็ปสูตร คาสิโน SA SEXY SRC', 'sexy.rar', '', 'pHPT-EANn2Q', '1234.png', '2022-07-26 13:13:25', 50),
(68, 'เว็บขายสคิป พร้อมระบบ เติมเงินแนบสลิป api tmweasy.com', '', '890', 'เว็บขายสคิป พร้อมระบบ เติมเงินแนบสลิป api tmweasy.com', 'shop.rar', NULL, NULL, 'shop.png', '2022-07-28 02:53:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`,`code`);

--
-- Indexes for table `code_script`
--
ALTER TABLE `code_script`
  ADD PRIMARY KEY (`id`,`code`);

--
-- Indexes for table `history_topup`
--
ALTER TABLE `history_topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kn_config`
--
ALTER TABLE `kn_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `script`
--
ALTER TABLE `script`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `code_script`
--
ALTER TABLE `code_script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `history_topup`
--
ALTER TABLE `history_topup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'idรายการ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kn_config`
--
ALTER TABLE `kn_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `script`
--
ALTER TABLE `script`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
