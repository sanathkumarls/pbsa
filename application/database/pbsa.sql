-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2020 at 03:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `initial` varchar(5) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `photo` varchar(100) DEFAULT 'assets/admin/images/a.png' COMMENT 'assets/admin/images/a.png',
  `dob` date DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `initial`, `first_name`, `last_name`, `email`, `password`, `photo`, `dob`, `phone`, `is_active`) VALUES
(2, 'Mr.', 'Sanath', 'L S', '4su17cs081@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', 'uploads/admin/profile/2Z6ySroeV8g.jpeg', '2019-02-04', '9481694830', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c1`
--

CREATE TABLE `c1` (
  `c1_id` int(11) NOT NULL,
  `c11` float DEFAULT NULL,
  `c11_path` varchar(200) DEFAULT NULL,
  `c12` float DEFAULT NULL,
  `c12_path` varchar(200) DEFAULT NULL,
  `c1_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c1`
--

INSERT INTO `c1` (`c1_id`, `c11`, `c11_path`, `c12`, `c12_path`, `c1_total`) VALUES
(1, 0, '', 0, '', 0),
(2, 100, '', 100, '', 10),
(3, 0, '', 0, '', 0),
(4, 0, '', 0, '', 0),
(5, 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c2`
--

CREATE TABLE `c2` (
  `c2_id` int(11) NOT NULL,
  `c21` float DEFAULT NULL,
  `c21_path` varchar(200) DEFAULT NULL,
  `c22` float DEFAULT NULL,
  `c22_path` varchar(200) DEFAULT NULL,
  `c23` float DEFAULT NULL,
  `c23_path` varchar(200) DEFAULT NULL,
  `c24` float DEFAULT NULL,
  `c24_path` varchar(200) DEFAULT NULL,
  `c2_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c2`
--

INSERT INTO `c2` (`c2_id`, `c21`, `c21_path`, `c22`, `c22_path`, `c23`, `c23_path`, `c24`, `c24_path`, `c2_total`) VALUES
(1, 0, '', 0, '', 0, '', 0, '', 0),
(2, 100, '', 100, '', 100, '', 100, '', 10),
(3, 0, '', 0, '', 0, '', 0, '', 0),
(4, 0, '', 0, '', 0, '', 0, '', 0),
(5, 0, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c3`
--

CREATE TABLE `c3` (
  `c3_id` int(11) NOT NULL,
  `c31_1` float DEFAULT NULL,
  `c31_2` float DEFAULT NULL,
  `c31_3` float DEFAULT NULL,
  `c31_4` float DEFAULT NULL,
  `c31_5` float DEFAULT NULL,
  `c31_path` varchar(200) DEFAULT NULL,
  `c32_1` float DEFAULT NULL,
  `c32_2` float DEFAULT NULL,
  `c32_3` float DEFAULT NULL,
  `c32_4` float DEFAULT NULL,
  `c32_5` float DEFAULT NULL,
  `c32_6` float DEFAULT NULL,
  `c32_7` float DEFAULT NULL,
  `c32_8` float DEFAULT NULL,
  `c32_9` float DEFAULT NULL,
  `c32_10` float DEFAULT NULL,
  `c32_11` float DEFAULT NULL,
  `c32_12` float DEFAULT NULL,
  `c32_13` float DEFAULT NULL,
  `c32_14` float DEFAULT NULL,
  `c32_15` float DEFAULT NULL,
  `c32_16` float DEFAULT NULL,
  `c32_17` float DEFAULT NULL,
  `c32_18` float DEFAULT NULL,
  `c32_19` float DEFAULT NULL,
  `c32_path` varchar(200) DEFAULT NULL,
  `c3_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c3`
--

INSERT INTO `c3` (`c3_id`, `c31_1`, `c31_2`, `c31_3`, `c31_4`, `c31_5`, `c31_path`, `c32_1`, `c32_2`, `c32_3`, `c32_4`, `c32_5`, `c32_6`, `c32_7`, `c32_8`, `c32_9`, `c32_10`, `c32_11`, `c32_12`, `c32_13`, `c32_14`, `c32_15`, `c32_16`, `c32_17`, `c32_18`, `c32_19`, `c32_path`, `c3_total`) VALUES
(1, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0),
(2, 5, 10, 2, 2, 4, '', 20, 20, 5, 20, 20, 20, 20, 20, 20, 20, 20, 2, 2, 0, 0, 0, 0, 0, 0, '', 10),
(3, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0),
(4, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0),
(5, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c4`
--

CREATE TABLE `c4` (
  `c4_id` int(11) NOT NULL,
  `c41` float DEFAULT NULL,
  `c41_path` varchar(50) DEFAULT NULL,
  `c42` float DEFAULT NULL,
  `c42_path` varchar(50) DEFAULT NULL,
  `c43` float DEFAULT NULL,
  `c43_path` varchar(50) DEFAULT NULL,
  `c44` float DEFAULT NULL,
  `c44_path` varchar(50) DEFAULT NULL,
  `c45` float DEFAULT NULL,
  `c45_path` varchar(50) DEFAULT NULL,
  `c4_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c4`
--

INSERT INTO `c4` (`c4_id`, `c41`, `c41_path`, `c42`, `c42_path`, `c43`, `c43_path`, `c44`, `c44_path`, `c45`, `c45_path`, `c4_total`) VALUES
(1, 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(2, 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(3, 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(4, 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(5, 0, '', 0, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c5`
--

CREATE TABLE `c5` (
  `c5_id` int(11) NOT NULL,
  `phd` int(11) DEFAULT NULL,
  `c51_1` varchar(10) DEFAULT NULL COMMENT 'date',
  `c51_2` float DEFAULT NULL,
  `c51_3` float DEFAULT NULL,
  `c51_path` varchar(50) DEFAULT NULL,
  `c52` float DEFAULT NULL,
  `c52_path` varchar(50) DEFAULT NULL,
  `c53` float DEFAULT NULL,
  `c53_path` varchar(50) DEFAULT NULL,
  `c5_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c5`
--

INSERT INTO `c5` (`c5_id`, `phd`, `c51_1`, `c51_2`, `c51_3`, `c51_path`, `c52`, `c52_path`, `c53`, `c53_path`, `c5_total`) VALUES
(1, 0, '', 0, 0, '', 0, '', 0, '', 0),
(2, 0, '', 0, 0, '', 0, '', 0, '', 0),
(3, 0, '', 0, 0, '', 0, '', 0, '', 0),
(4, 0, '', 0, 0, '', 0, '', 0, '', 0),
(5, 0, '', 0, 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c6`
--

CREATE TABLE `c6` (
  `c6_id` int(11) NOT NULL,
  `c61` float DEFAULT NULL,
  `c61_path` varchar(50) DEFAULT NULL,
  `c62` float DEFAULT NULL,
  `c62_path` varchar(50) DEFAULT NULL,
  `c63` float DEFAULT NULL,
  `c63_path` varchar(50) DEFAULT NULL,
  `c64` float DEFAULT NULL,
  `c64_path` varchar(50) DEFAULT NULL,
  `c6_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c6`
--

INSERT INTO `c6` (`c6_id`, `c61`, `c61_path`, `c62`, `c62_path`, `c63`, `c63_path`, `c64`, `c64_path`, `c6_total`) VALUES
(1, 0, '', 0, '', 0, '', 0, '', 0),
(2, 0, '', 0, '', 0, '', 0, '', 0),
(3, 0, '', 0, '', 0, '', 0, '', 0),
(4, 0, '', 0, '', 0, '', 0, '', 0),
(5, 0, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c7`
--

CREATE TABLE `c7` (
  `c7_id` int(11) NOT NULL,
  `c71` float DEFAULT NULL,
  `c71_path` varchar(50) DEFAULT NULL,
  `c72` float DEFAULT NULL,
  `c72_path` varchar(50) DEFAULT NULL,
  `c73` float DEFAULT NULL,
  `c73_path` varchar(50) DEFAULT NULL,
  `c74` float DEFAULT NULL,
  `c74_path` varchar(50) DEFAULT NULL,
  `c7_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c7`
--

INSERT INTO `c7` (`c7_id`, `c71`, `c71_path`, `c72`, `c72_path`, `c73`, `c73_path`, `c74`, `c74_path`, `c7_total`) VALUES
(1, 0, '', 0, '', 0, '', 0, '', 0),
(2, 0, '', 0, '', 0, '', 0, '', 0),
(3, 0, '', 0, '', 0, '', 0, '', 0),
(4, 0, '', 0, '', 0, '', 0, '', 0),
(5, 0, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c8`
--

CREATE TABLE `c8` (
  `c8_id` int(11) NOT NULL,
  `c81` float DEFAULT NULL,
  `c81_path` varchar(50) DEFAULT NULL,
  `c82` float DEFAULT NULL,
  `c82_path` varchar(50) DEFAULT NULL,
  `c83` float DEFAULT NULL,
  `c83_path` varchar(50) DEFAULT NULL,
  `c84` float DEFAULT NULL,
  `c84_path` varchar(50) DEFAULT NULL,
  `c85` float DEFAULT NULL,
  `c85_path` varchar(50) DEFAULT NULL,
  `c86` float DEFAULT NULL,
  `c86_path` varchar(50) DEFAULT NULL,
  `c8_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c8`
--

INSERT INTO `c8` (`c8_id`, `c81`, `c81_path`, `c82`, `c82_path`, `c83`, `c83_path`, `c84`, `c84_path`, `c85`, `c85_path`, `c86`, `c86_path`, `c8_total`) VALUES
(1, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(2, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(3, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(4, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0),
(5, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_abbr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `d_abbr`) VALUES
(1, 'Biotechnology', 'Biotechnology'),
(2, 'Chemistry', 'Chemistry'),
(3, 'Centre for Interdisciplinary Research in Humanitie', 'CIRHS'),
(4, 'Commerce', 'Commerce'),
(5, 'Economics', 'Economics'),
(6, 'English', 'English'),
(7, 'Physics', 'Physics'),
(8, 'Department of Journalism and Mass Communication', 'MCJ'),
(9, 'Department of Masters in Social Work', 'MSW'),
(10, 'Psychology', 'Psychology'),
(11, 'Statistics', 'Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `initial` varchar(5) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db' COMMENT 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db',
  `phone` varchar(10) DEFAULT NULL,
  `photo` varchar(50) DEFAULT 'assets/faculty/images/a.png' COMMENT 'assets/faculty/images/a.png',
  `dob` varchar(10) DEFAULT NULL,
  `doj` varchar(10) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0' COMMENT '0 - pending , 1 - active , 2 - deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `emp_id`, `role`, `department`, `initial`, `first_name`, `last_name`, `email`, `password`, `phone`, `photo`, `dob`, `doj`, `is_active`) VALUES
(6, '1', 3, NULL, NULL, 'Principal', 'Sdmit', 'principal@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '1212121212', 'assets/principal/images/a.png', NULL, NULL, 1),
(7, '2', 2, 1, NULL, 'hod', 'bio', 'hodbio@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '1212121212', 'assets/hod/images/a.png', NULL, NULL, 1),
(8, '3', 2, 2, NULL, 'hod', 'che', 'hodche@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '1212121212', 'assets/hod/images/a.png', NULL, NULL, 1),
(9, '4', 1, 1, NULL, 'faculty', 'bio', 'facultybio@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '1212121212', 'assets/faculty/images/a.png', NULL, NULL, 1),
(10, '5', 1, 2, NULL, 'faculty', 'che', 'facultyche@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '1211212121', 'assets/faculty/images/a.png', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `m_id` int(11) NOT NULL,
  `initial` varchar(5) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`m_id`, `initial`, `first_name`, `last_name`, `email`, `password`, `phone`, `photo`, `dob`, `is_active`) VALUES
(1, 'Mr.', 'Sanath', 'S', 'sanathlslokanathapura@gmail.com', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '9481694830', NULL, NULL, 1),
(2, 'Mr.', 'Subramanya', 'Kashyap', 'sukruth21@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '6677672672', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pbsa`
--

CREATE TABLE `pbsa` (
  `pbsa_id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `is_submitted` int(11) DEFAULT '0',
  `is_accepted` int(11) DEFAULT '0' COMMENT '0 - not accepted , 2 - accepted by hod , 3 - accepted by principal',
  `is_rejected` int(11) DEFAULT '0' COMMENT '0 - not rejected , 2 - rejected by hod , 3 - rejected by principal',
  `rejected_comments` varchar(5000) DEFAULT NULL,
  `emp_comments` varchar(10000) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbsa`
--

INSERT INTO `pbsa` (`pbsa_id`, `e_id`, `year`, `is_submitted`, `is_accepted`, `is_rejected`, `rejected_comments`, `emp_comments`, `timestamp`) VALUES
(1, 10, '2020', 1, 3, 0, '', '', '2020-02-03 14:42:24'),
(2, 9, '2020', 1, 3, 0, '', '', '2020-02-03 14:43:21'),
(3, 7, '2020', 1, 3, 0, '', '', '2020-02-03 14:46:08'),
(4, 8, '2020', 1, 3, 0, '', '', '2020-02-03 14:46:28'),
(5, 9, '2019', 1, 3, 0, '', '', '2020-02-03 14:51:57');

--
-- Triggers `pbsa`
--
DELIMITER $$
CREATE TRIGGER `criteria_id_creater` AFTER INSERT ON `pbsa` FOR EACH ROW BEGIN
INSERT INTO c1(c1_id, c11,c11_path, c12, c12_path, c1_total) VALUES (NEW.pbsa_id,null,null,null,null,null);
INSERT INTO `c2`(`c2_id`, `c21`, `c21_path`, `c22`, `c22_path`, `c23`, `c23_path`, `c24`, `c24_path`, `c2_total`)VALUES (NEW.pbsa_id,null,null,null,null,null,null,null,null,null);
INSERT INTO `c3`(`c3_id`, `c31_1`, `c31_2`, `c31_3`, `c31_4`, `c31_5`, `c31_path`, `c32_1`, `c32_2`, `c32_3`, `c32_4`, `c32_5`, `c32_6`, `c32_7`, `c32_8`, `c32_9`, `c32_10`, `c32_11`, `c32_12`, `c32_13`, `c32_14`, `c32_15`, `c32_16`, `c32_17`, `c32_18`, `c32_19`, `c32_path`, `c3_total`) VALUES (NEW.pbsa_id,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
INSERT INTO `c4`(`c4_id`, `c41`, `c41_path`, `c42`, `c42_path`, `c43`, `c43_path`, `c44`, `c44_path`, `c45`, `c45_path`, `c4_total`) VALUES (NEW.pbsa_id,null,null,null,null,null,null,null,null,null,null,null);
INSERT INTO `c5`(`c5_id`, `c51_1`, `c51_2`, `c51_3`, `c51_path`, `c52`, `c52_path`, `c53`, `c53_path`, `c5_total`) VALUES (NEW.pbsa_id,null,null,null,null,null,null,null,null,null);
INSERT INTO `c6`(`c6_id`, `c61`, `c61_path`, `c62`, `c62_path`, `c63`, `c63_path`, `c64`, `c64_path`, `c6_total`) VALUES (NEW.pbsa_id,null,null,null,null,null,null,null,null,null);
INSERT INTO `c7`(`c7_id`, `c71`, `c71_path`, `c72`, `c72_path`, `c73`, `c73_path`, `c74`, `c74_path`, `c7_total`)  VALUES (NEW.pbsa_id,null,null,null,null,null,null,null,null,null);
INSERT INTO `c8`(`c8_id`, `c81`, `c81_path`, `c82`, `c82_path`, `c83`, `c83_path`, `c84`, `c84_path`, `c85`, `c85_path`, `c86`, `c86_path`, `c8_total`) VALUES (NEW.pbsa_id,null,null,null,null,null,null,null,null,null,null,null,null,null);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `r_name`) VALUES
(1, 'Faculty'),
(2, 'HOD'),
(3, 'Principal'),
(4, 'Management'),
(5, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `c1`
--
ALTER TABLE `c1`
  ADD PRIMARY KEY (`c1_id`);

--
-- Indexes for table `c2`
--
ALTER TABLE `c2`
  ADD PRIMARY KEY (`c2_id`);

--
-- Indexes for table `c3`
--
ALTER TABLE `c3`
  ADD PRIMARY KEY (`c3_id`);

--
-- Indexes for table `c4`
--
ALTER TABLE `c4`
  ADD PRIMARY KEY (`c4_id`);

--
-- Indexes for table `c5`
--
ALTER TABLE `c5`
  ADD PRIMARY KEY (`c5_id`);

--
-- Indexes for table `c6`
--
ALTER TABLE `c6`
  ADD PRIMARY KEY (`c6_id`);

--
-- Indexes for table `c7`
--
ALTER TABLE `c7`
  ADD PRIMARY KEY (`c7_id`);

--
-- Indexes for table `c8`
--
ALTER TABLE `c8`
  ADD PRIMARY KEY (`c8_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `employee_ibfk_1` (`role`),
  ADD KEY `branch` (`department`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `pbsa`
--
ALTER TABLE `pbsa`
  ADD PRIMARY KEY (`pbsa_id`),
  ADD KEY `emp_id` (`e_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pbsa`
--
ALTER TABLE `pbsa`
  MODIFY `pbsa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `c1`
--
ALTER TABLE `c1`
  ADD CONSTRAINT `c1_ibfk_1` FOREIGN KEY (`c1_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c2`
--
ALTER TABLE `c2`
  ADD CONSTRAINT `c2_ibfk_1` FOREIGN KEY (`c2_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c3`
--
ALTER TABLE `c3`
  ADD CONSTRAINT `c3_ibfk_1` FOREIGN KEY (`c3_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4`
--
ALTER TABLE `c4`
  ADD CONSTRAINT `c4_ibfk_1` FOREIGN KEY (`c4_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c5`
--
ALTER TABLE `c5`
  ADD CONSTRAINT `c5_ibfk_1` FOREIGN KEY (`c5_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c6`
--
ALTER TABLE `c6`
  ADD CONSTRAINT `c6_ibfk_1` FOREIGN KEY (`c6_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c7`
--
ALTER TABLE `c7`
  ADD CONSTRAINT `c7_ibfk_1` FOREIGN KEY (`c7_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c8`
--
ALTER TABLE `c8`
  ADD CONSTRAINT `c8_ibfk_1` FOREIGN KEY (`c8_id`) REFERENCES `pbsa` (`pbsa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`r_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`d_id`) ON DELETE CASCADE;

--
-- Constraints for table `pbsa`
--
ALTER TABLE `pbsa`
  ADD CONSTRAINT `pbsa_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
