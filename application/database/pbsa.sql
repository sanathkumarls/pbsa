-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2019 at 06:41 PM
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
(1, 'Mr.', 'Santhosh', 'Kumar', '4su17cs082@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', 'uploads/admin/profile/b5Nq7n6iDv.jpeg', '2019-02-04', '6544334443', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c1`
--

CREATE TABLE `c1` (
  `c1_id` int(11) NOT NULL,
  `c11` int(11) DEFAULT NULL,
  `c11_path` varchar(200) DEFAULT NULL,
  `c12` int(11) DEFAULT NULL,
  `c12_path` varchar(200) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c2`
--

CREATE TABLE `c2` (
  `c2_id` int(11) NOT NULL,
  `c21` int(11) DEFAULT NULL,
  `c21_path` varchar(200) DEFAULT NULL,
  `c22` int(11) DEFAULT NULL,
  `c22_path` varchar(200) DEFAULT NULL,
  `c23` int(11) DEFAULT NULL,
  `c23_path` varchar(200) DEFAULT NULL,
  `c24` int(11) DEFAULT NULL,
  `c24_path` varchar(200) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c3`
--

CREATE TABLE `c3` (
  `c3_id` int(11) NOT NULL,
  `c31_1` int(11) DEFAULT NULL,
  `c31_2` int(11) DEFAULT NULL,
  `c31_3` int(11) DEFAULT NULL,
  `c31_4` int(11) DEFAULT NULL,
  `c31_5` int(11) DEFAULT NULL,
  `c31_path` varchar(200) DEFAULT NULL,
  `c31_total` int(11) DEFAULT NULL,
  `c32_1` int(11) DEFAULT NULL,
  `c32_2` int(11) DEFAULT NULL,
  `c32_3` int(11) DEFAULT NULL,
  `c32_4` int(11) DEFAULT NULL,
  `c32_5` int(11) DEFAULT NULL,
  `c32_6` int(11) DEFAULT NULL,
  `c32_7` int(11) DEFAULT NULL,
  `c32_8` int(11) DEFAULT NULL,
  `c32_9` int(11) DEFAULT NULL,
  `c32_10` int(11) DEFAULT NULL,
  `c32_11` int(11) DEFAULT NULL,
  `c32_12` int(11) DEFAULT NULL,
  `c32_13` int(11) DEFAULT NULL,
  `c32_14` int(11) DEFAULT NULL,
  `c32_15` int(11) DEFAULT NULL,
  `c32_16` int(11) DEFAULT NULL,
  `c32_17` int(11) DEFAULT NULL,
  `c32_18` int(11) DEFAULT NULL,
  `c32_19` int(11) DEFAULT NULL,
  `c32_path` varchar(200) DEFAULT NULL,
  `c32_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c4`
--

CREATE TABLE `c4` (
  `c4_id` int(11) NOT NULL,
  `c41` int(11) DEFAULT NULL,
  `c41_path` varchar(50) DEFAULT NULL,
  `c42` int(11) DEFAULT NULL,
  `c42_path` varchar(50) DEFAULT NULL,
  `c43` int(11) DEFAULT NULL,
  `c43_path` varchar(50) DEFAULT NULL,
  `c44` int(11) DEFAULT NULL,
  `c44_path` varchar(50) DEFAULT NULL,
  `c45` int(11) DEFAULT NULL,
  `c45_path` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c5`
--

CREATE TABLE `c5` (
  `c5_id` int(11) NOT NULL,
  `c51` int(11) DEFAULT NULL,
  `c51_path` varchar(50) DEFAULT NULL,
  `c52` int(11) DEFAULT NULL,
  `c52_path` varchar(50) DEFAULT NULL,
  `c53` int(11) DEFAULT NULL,
  `c53_path` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c6`
--

CREATE TABLE `c6` (
  `c6_id` int(11) NOT NULL,
  `c61` int(11) DEFAULT NULL,
  `c61_path` varchar(50) DEFAULT NULL,
  `c62` int(11) DEFAULT NULL,
  `c62_path` varchar(50) DEFAULT NULL,
  `c63` int(11) DEFAULT NULL,
  `c63_path` varchar(50) DEFAULT NULL,
  `c64` int(11) DEFAULT NULL,
  `c64_path` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c7`
--

CREATE TABLE `c7` (
  `c7_id` int(11) NOT NULL,
  `c71` int(11) DEFAULT NULL,
  `c71_path` varchar(50) DEFAULT NULL,
  `c72` int(11) DEFAULT NULL,
  `c72_path` varchar(50) DEFAULT NULL,
  `c73` int(11) DEFAULT NULL,
  `c73_path` varchar(50) DEFAULT NULL,
  `c74` int(11) DEFAULT NULL,
  `c74_path` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c8`
--

CREATE TABLE `c8` (
  `c8_id` int(11) NOT NULL,
  `c81` int(11) DEFAULT NULL,
  `c81_path` varchar(50) DEFAULT NULL,
  `c82` int(11) DEFAULT NULL,
  `c82_path` varchar(50) DEFAULT NULL,
  `c83` int(11) DEFAULT NULL,
  `c83_path` varchar(50) DEFAULT NULL,
  `c84` int(11) DEFAULT NULL,
  `c84_path` varchar(50) DEFAULT NULL,
  `c85` int(11) DEFAULT NULL,
  `c85_path` varchar(50) DEFAULT NULL,
  `c86` int(11) DEFAULT NULL,
  `c86_path` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_abbr` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`, `d_abbr`, `is_active`) VALUES
(1, 'Biotechnology', 'Biotechnology', 1),
(2, 'Chemistry', 'Chemistry', 1),
(3, 'Centre for Interdisciplinary Research in Humanitie', 'CIRHS', 1),
(4, 'Commerce', 'Commerce', 1),
(5, 'Economics', 'Economics', 1),
(6, 'English', 'English', 1),
(7, 'Physics', 'Physics', 0),
(8, 'Department of Journalism and Mass Communication', 'MCJ', 1),
(9, 'Department of Masters in Social Work', 'MSW', 1),
(10, 'Psychology', 'Psychology', 1),
(11, 'Statistics', 'Statistics', 1);

--
-- Triggers `department`
--
DELIMITER $$
CREATE TRIGGER `department status` AFTER UPDATE ON `department` FOR EACH ROW BEGIN
UPDATE employee set `is_department_active` = NEW.is_active where department = OLD.d_id;
END
$$
DELIMITER ;

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
  `is_active` int(11) DEFAULT '0',
  `is_rejected` int(11) DEFAULT '0',
  `is_department_active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `emp_id`, `role`, `department`, `initial`, `first_name`, `last_name`, `email`, `password`, `phone`, `photo`, `dob`, `doj`, `is_active`, `is_rejected`, `is_department_active`) VALUES
(1, '123', 1, 6, 'Mr.', 'Sanath', 'L S', '4su17cs081@sdmit.in', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '9481694830', 'uploads/faculty/profile/Js5kb0LC2u.jpeg', '1999-09-16', '2019-11-09', 1, 0, 1),
(2, '1245656', 2, 1, NULL, 'Santhosh', 'Kumar', 'aasgg@sdmit.in', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '2656526526', NULL, NULL, NULL, 1, 0, 1),
(3, '4434', 3, 3, NULL, 'Sudhanva', 'Hebbar', 'ccvcvc@sdmit.in', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '1234567766', NULL, NULL, NULL, 0, 1, 1),
(4, '555656', 2, 2, NULL, 'Goutham', 'C P', 'freekash@sdmit.in', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '9663361747', NULL, NULL, NULL, 1, 0, 1),
(5, '123', 3, 6, NULL, 'Subramanya', 'Kashyap', '4su17cs099@sdmit.in', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '1234567890', NULL, NULL, NULL, 0, 1, 1);

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
(1, 'Mr.', 'Sanath', 'S', 'sanathlslokanathapura@gmail.com', '0dd3e512642c97ca3f747f9a76e374fbda73f9292823c0313be9d78add7cdd8f72235af0c553dd26797e78e1854edee0ae002f8aba074b066dfce1af114e32f8', '9481694830', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pbsa`
--

CREATE TABLE `pbsa` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `c1_id` int(11) DEFAULT NULL,
  `c2_id` int(11) DEFAULT NULL,
  `c3_id` int(11) DEFAULT NULL,
  `c4_id` int(11) DEFAULT NULL,
  `c5_id` int(11) DEFAULT NULL,
  `c6_id` int(11) DEFAULT NULL,
  `c7_id` int(11) DEFAULT NULL,
  `c8_id` int(11) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `is_saved` int(11) DEFAULT '0',
  `is_submitted` int(11) DEFAULT '0',
  `is_accepted` int(11) DEFAULT '0',
  `is_rejected` int(11) DEFAULT '0',
  `rejected_comments` varchar(5000) DEFAULT NULL,
  `emp_comments` varchar(10000) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `c1_id` (`c1_id`),
  ADD KEY `c2_id` (`c2_id`),
  ADD KEY `c3_id` (`c3_id`),
  ADD KEY `c4_id` (`c4_id`),
  ADD KEY `c5_id` (`c5_id`),
  ADD KEY `c6_id` (`c6_id`),
  ADD KEY `c7_id` (`c7_id`),
  ADD KEY `c8_id` (`c8_id`);

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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `c1`
--
ALTER TABLE `c1`
  MODIFY `c1_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c2`
--
ALTER TABLE `c2`
  MODIFY `c2_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c3`
--
ALTER TABLE `c3`
  MODIFY `c3_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c4`
--
ALTER TABLE `c4`
  MODIFY `c4_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c5`
--
ALTER TABLE `c5`
  MODIFY `c5_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c6`
--
ALTER TABLE `c6`
  MODIFY `c6_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c7`
--
ALTER TABLE `c7`
  MODIFY `c7_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c8`
--
ALTER TABLE `c8`
  MODIFY `c8_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pbsa`
--
ALTER TABLE `pbsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `pbsa_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_2` FOREIGN KEY (`c1_id`) REFERENCES `c1` (`c1_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_3` FOREIGN KEY (`c2_id`) REFERENCES `c2` (`c2_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_4` FOREIGN KEY (`c3_id`) REFERENCES `c3` (`c3_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_5` FOREIGN KEY (`c4_id`) REFERENCES `c4` (`c4_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_6` FOREIGN KEY (`c5_id`) REFERENCES `c5` (`c5_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_7` FOREIGN KEY (`c6_id`) REFERENCES `c6` (`c6_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_8` FOREIGN KEY (`c7_id`) REFERENCES `c7` (`c7_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pbsa_ibfk_9` FOREIGN KEY (`c8_id`) REFERENCES `c8` (`c8_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
