-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2022 at 03:31 AM
-- Server version: 5.7.18-log
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stud_result_mgmt_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_srms`
--

DROP TABLE IF EXISTS `class_srms`;
CREATE TABLE IF NOT EXISTS `class_srms` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `class_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_srms`
--

INSERT INTO `class_srms` (`class_id`, `class_name`, `class_code`) VALUES
(9, 'BE', 'CS'),
(10, 'BE', 'CV'),
(12, 'BE', 'IS');

-- --------------------------------------------------------

--
-- Table structure for table `marks_srms`
--

DROP TABLE IF EXISTS `marks_srms`;
CREATE TABLE IF NOT EXISTS `marks_srms` (
  `marks_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `marks1` int(11) NOT NULL,
  `marks2` int(11) NOT NULL,
  `marks3` int(11) NOT NULL,
  `marks4` int(11) NOT NULL,
  `marks5` int(11) NOT NULL,
  `marks6` int(11) NOT NULL,
  PRIMARY KEY (`marks_id`),
  KEY `student_id` (`student_id`),
  KEY `sem_id` (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marks_srms`
--

INSERT INTO `marks_srms` (`marks_id`, `student_id`, `sem_id`, `marks1`, `marks2`, `marks3`, `marks4`, `marks5`, `marks6`) VALUES
(4, 66, 3, 1, 1, 1, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sem_srms`
--

DROP TABLE IF EXISTS `sem_srms`;
CREATE TABLE IF NOT EXISTS `sem_srms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`sem_id`,`class_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sem_srms`
--

INSERT INTO `sem_srms` (`id`, `sem_id`, `class_id`) VALUES
(6, 3, 9),
(7, 4, 9),
(8, 5, 9),
(9, 6, 9),
(10, 7, 9),
(11, 8, 9),
(12, 5, 10),
(13, 6, 10),
(14, 3, 12),
(15, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `student_srms`
--

DROP TABLE IF EXISTS `student_srms`;
CREATE TABLE IF NOT EXISTS `student_srms` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `student_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `student_usn` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `student_email_id` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `student_gender` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `student_dob` date NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `class_id` (`class_id`),
  KEY `sem_id` (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_srms`
--

INSERT INTO `student_srms` (`student_id`, `class_id`, `sem_id`, `student_name`, `student_usn`, `student_email_id`, `student_gender`, `student_dob`) VALUES
(66, 9, 3, 'Bharath', '4MH19CS010', 'bharathkumar@gmail.com', 'Male', '2001-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `subject_srms`
--

DROP TABLE IF EXISTS `subject_srms`;
CREATE TABLE IF NOT EXISTS `subject_srms` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `subject_name1` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name2` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name3` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name4` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name5` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name6` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `class_id` (`class_id`),
  KEY `sem_id` (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_srms`
--

INSERT INTO `subject_srms` (`subject_id`, `class_id`, `sem_id`, `subject_name1`, `subject_name2`, `subject_name3`, `subject_name4`, `subject_name5`, `subject_name6`) VALUES
(2, 9, 3, 'MAT', 'DAA', 'ADE', 'CO', 'SE', 'DMS'),
(3, 9, 4, 'MAT', 'DAA', 'OS', 'MCES', 'OOC', 'DC');

-- --------------------------------------------------------

--
-- Table structure for table `user_srms`
--

DROP TABLE IF EXISTS `user_srms`;
CREATE TABLE IF NOT EXISTS `user_srms` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_contact_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_srms`
--

INSERT INTO `user_srms` (`user_id`, `user_name`, `user_contact_no`, `user_email`, `user_password`) VALUES
(1, 'Darshan', '9876543210', 'darshanraj046@gmail.com', 'darsh123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_srms`
--
ALTER TABLE `student_srms`
  ADD CONSTRAINT `student_srms_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_srms` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_srms`
--
ALTER TABLE `subject_srms`
  ADD CONSTRAINT `subject_srms_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_srms` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
