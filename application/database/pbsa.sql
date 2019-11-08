-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2019 at 05:29 PM
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
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_rejected` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `c31_path` varchar(200) NOT NULL,
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
  `c32_path` varchar(200) NOT NULL,
  `c32_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c4`
--

CREATE TABLE `c4` (
  `c4_id` int(11) NOT NULL,
  `c41` int(11) DEFAULT NULL,
  `c42` int(11) DEFAULT NULL,
  `c43` int(11) DEFAULT NULL,
  `c44` int(11) DEFAULT NULL,
  `c45` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c5`
--

CREATE TABLE `c5` (
  `c5_id` int(11) NOT NULL,
  `c51` int(11) DEFAULT NULL,
  `c52` int(11) DEFAULT NULL,
  `c53` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c6`
--

CREATE TABLE `c6` (
  `c6_id` int(11) NOT NULL,
  `c61` int(11) DEFAULT NULL,
  `c62` int(11) DEFAULT NULL,
  `c63` int(11) DEFAULT NULL,
  `c64` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c7`
--

CREATE TABLE `c7` (
  `c7_id` int(11) NOT NULL,
  `c71` int(11) DEFAULT NULL,
  `c72` int(11) DEFAULT NULL,
  `c73` int(11) DEFAULT NULL,
  `c74` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c8`
--

CREATE TABLE `c8` (
  `c8_id` int(11) NOT NULL,
  `c81` int(11) DEFAULT NULL,
  `c82` int(11) DEFAULT NULL,
  `c83` int(11) DEFAULT NULL,
  `c84` int(11) DEFAULT NULL,
  `c85` int(11) DEFAULT NULL,
  `c86` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db',
  `phone` varchar(10) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `doj` varchar(10) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `is_rejected` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `emp_id`, `role`, `department`, `first_name`, `last_name`, `email`, `password`, `phone`, `dob`, `doj`, `is_active`, `is_rejected`) VALUES
(1, '123', 3, 6, 'Sanath', 'S', '4su17cs081@sdmit.in', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '9481694830', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `m_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_rejected` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pbsa`
--

CREATE TABLE `pbsa` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `c1_id` int(11) NOT NULL,
  `c2_id` int(11) NOT NULL,
  `c3_id` int(11) NOT NULL,
  `c4_id` int(11) NOT NULL,
  `c5_id` int(11) NOT NULL,
  `c6_id` int(11) NOT NULL,
  `c7_id` int(11) NOT NULL,
  `c8_id` int(11) NOT NULL,
  `year` date NOT NULL,
  `is_saved` int(11) NOT NULL DEFAULT '0',
  `is_submitted` int(11) NOT NULL DEFAULT '0',
  `is_accepted` int(11) NOT NULL DEFAULT '0',
  `is_rejected` int(11) NOT NULL DEFAULT '0',
  `comments` varchar(10000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, 'Secretary'),
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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

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
