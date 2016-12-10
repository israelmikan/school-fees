-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2015 at 12:34 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblCategory`
--

CREATE TABLE IF NOT EXISTS `tblCategory` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblCategory`
--

INSERT INTO `tblCategory` (`id`, `name`) VALUES
(1, 'Tuition fees'),
(2, 'Development Fees'),
(3, 'Hostel fees'),
(4, 'convenience Fees'),
(5, 'Exam Fees'),
(6, 'Enrollment Fees'),
(7, 'Caution Money'),
(8, 'Book Bank / Library Fee'),
(9, 'Book Bank Security'),
(10, 'Sports /  Cultural Activities'),
(11, 'Admission / Registration Fee'),
(12, 'Other Fee'),
(13, 'Run time addition');

-- --------------------------------------------------------

--
-- Table structure for table `tblCourse`
--

CREATE TABLE IF NOT EXISTS `tblCourse` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastUpdated` datetime DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblCourse`
--

INSERT INTO `tblCourse` (`id`, `name`, `lastUpdated`, `status`) VALUES
(1, 'Diploma_Mechanical Engineering', '2015-05-06 00:00:00', 1),
(2, 'Diploma_Electrical Engineering', '2015-05-06 00:00:00', 1),
(3, 'Degree_Electrical Engineering', '2015-05-08 00:00:00', 1),
(4, 'Degree_Mechanical Engineering', '2015-05-08 00:00:00', 1),
(5, 'Degree_Electronics and Communication Engineering', '2015-05-08 00:00:00', 1),
(6, 'Degree_Civil Engineering', '2015-05-08 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblSemester`
--

CREATE TABLE IF NOT EXISTS `tblSemester` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courseId` bigint(20) DEFAULT NULL,
  `lastUpdated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblSemester`
--

INSERT INTO `tblSemester` (`id`, `name`, `courseId`, `lastUpdated`) VALUES
(1, 'Year - 1', 1, '2015-05-06 00:00:00'),
(2, 'Year - 2', 1, '2015-05-06 00:00:00'),
(3, 'Year - 3', 1, '2015-05-06 00:00:00'),
(11, 'Year - 1', 2, '2015-05-06 00:00:00'),
(12, 'Year - 2', 2, '2015-05-06 00:00:00'),
(13, 'Year - 3', 2, '2015-05-06 00:00:00'),
(21, 'semester - 1', 3, '2015-05-08 00:00:00'),
(22, 'semester - 2', 3, '2015-05-08 00:00:00'),
(23, 'semester - 3', 3, '2015-05-08 00:00:00'),
(24, 'semester - 4', 3, '2015-05-08 00:00:00'),
(25, 'semester - 5', 3, '2015-05-08 00:00:00'),
(26, 'semester - 6', 3, '2015-05-08 00:00:00'),
(27, 'semester - 7', 3, '2015-05-08 00:00:00'),
(28, 'semester - 8', 3, '2015-05-08 00:00:00'),
(35, 'semester - 1', 4, '2015-05-08 00:00:00'),
(36, 'semester - 2', 4, '2015-05-08 00:00:00'),
(37, 'semester - 3', 4, '2015-05-08 00:00:00'),
(38, 'semester - 4', 4, '2015-05-08 00:00:00'),
(39, 'semester - 5', 4, '2015-05-08 00:00:00'),
(40, 'semester - 6', 4, '2015-05-08 00:00:00'),
(41, 'semester - 7', 4, '2015-05-08 00:00:00'),
(42, 'semester - 8', 4, '2015-05-08 00:00:00'),
(43, 'semester - 1', 5, '2015-05-08 00:00:00'),
(44, 'semester - 2', 5, '2015-05-08 00:00:00'),
(45, 'semester - 3', 5, '2015-05-08 00:00:00'),
(46, 'semester - 4', 5, '2015-05-08 00:00:00'),
(47, 'semester - 5', 5, '2015-05-08 00:00:00'),
(48, 'semester - 6', 5, '2015-05-08 00:00:00'),
(49, 'semester - 7', 5, '2015-05-08 00:00:00'),
(50, 'semester - 8', 5, '2015-05-08 00:00:00'),
(51, 'semester - 1', 6, '2015-05-08 00:00:00'),
(52, 'semester - 2', 6, '2015-05-08 00:00:00'),
(53, 'semester - 3', 6, '2015-05-08 00:00:00'),
(54, 'semester - 4', 6, '2015-05-08 00:00:00'),
(55, 'semester - 5', 6, '2015-05-08 00:00:00'),
(56, 'semester - 6', 6, '2015-05-08 00:00:00'),
(57, 'semester - 7', 6, '2015-05-08 00:00:00'),
(58, 'semester - 8', 6, '2015-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblStudent`
--

CREATE TABLE IF NOT EXISTS `tblStudent` (
`id` bigint(20) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `enrollNo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `p1` varchar(255) DEFAULT NULL,
  `p2` varchar(255) DEFAULT NULL,
  `studentTotalFeesId` bigint(20) DEFAULT NULL,
  `courseId` bigint(20) DEFAULT NULL,
  `lastUpdated` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentEMI`
--

CREATE TABLE IF NOT EXISTS `tblStudentEMI` (
`id` bigint(20) NOT NULL,
  `studentId` bigint(20) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `studentTotalFeesId` bigint(20) DEFAULT NULL,
  `lastUpdated` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblStudentTotalFees`
--

CREATE TABLE IF NOT EXISTS `tblStudentTotalFees` (
`id` bigint(20) NOT NULL,
  `courseId` bigint(20) DEFAULT NULL,
  `semesterId` bigint(20) DEFAULT NULL,
  `studentId` bigint(20) DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `lastUpdated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblTotalFeesCategoryRelation`
--

CREATE TABLE IF NOT EXISTS `tblTotalFeesCategoryRelation` (
`id` bigint(20) NOT NULL,
  `totalFeesId` bigint(20) DEFAULT NULL,
  `categoryId` bigint(20) DEFAULT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `studentId` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblUser`
--

CREATE TABLE IF NOT EXISTS `tblUser` (
`id` bigint(20) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastUpdated` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblUser`
--

INSERT INTO `tblUser` (`id`, `firstName`, `lastName`, `email`, `password`, `lastUpdated`, `status`) VALUES
(1, 'Firstname', 'Lastname', 'info@kustomcodes.com', 'password', '2015-05-07 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblCategory`
--
ALTER TABLE `tblCategory`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblCourse`
--
ALTER TABLE `tblCourse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblSemester`
--
ALTER TABLE `tblSemester`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblStudent`
--
ALTER TABLE `tblStudent`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblStudentEMI`
--
ALTER TABLE `tblStudentEMI`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblStudentTotalFees`
--
ALTER TABLE `tblStudentTotalFees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblTotalFeesCategoryRelation`
--
ALTER TABLE `tblTotalFeesCategoryRelation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblUser`
--
ALTER TABLE `tblUser`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblCategory`
--
ALTER TABLE `tblCategory`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tblCourse`
--
ALTER TABLE `tblCourse`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblSemester`
--
ALTER TABLE `tblSemester`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tblStudent`
--
ALTER TABLE `tblStudent`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tblStudentEMI`
--
ALTER TABLE `tblStudentEMI`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tblStudentTotalFees`
--
ALTER TABLE `tblStudentTotalFees`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblTotalFeesCategoryRelation`
--
ALTER TABLE `tblTotalFeesCategoryRelation`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tblUser`
--
ALTER TABLE `tblUser`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
