-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 11:22 AM
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
-- Database: `codex_question`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `GIVEN_START_PERMISSION` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `first_year_test_1_question`
--

CREATE TABLE `first_year_test_1_question` (
  `QUESTION_ID` int(11) NOT NULL,
  `QUESTIONS` varchar(255) NOT NULL,
  `PROGRAM_IMG` varchar(255) NOT NULL,
  `OPTION1` varchar(100) NOT NULL,
  `OPTION2` varchar(100) NOT NULL,
  `OPTION3` varchar(100) NOT NULL,
  `OPTION4` varchar(100) NOT NULL,
  `CORRECT_RESPONSE` varchar(11) NOT NULL,
  `EXPLANATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_year_common_test_1_question`
--

CREATE TABLE `other_year_common_test_1_question` (
  `QUESTION_ID` int(11) NOT NULL,
  `QUESTION` varchar(255) NOT NULL,
  `PROGRAM_IMG` varchar(255) NOT NULL,
  `OPTION1` varchar(255) NOT NULL,
  `OPTION2` varchar(255) NOT NULL,
  `OPTION3` varchar(255) NOT NULL,
  `OPTION4` varchar(255) NOT NULL,
  `CORRECT_RESPONSE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_1_attendance`
--

CREATE TABLE `test_1_attendance` (
  `NAME` varchar(100) NOT NULL,
  `ROLL_NO` int(11) NOT NULL,
  `MARKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `first_year_test_1_question`
--
ALTER TABLE `first_year_test_1_question`
  ADD PRIMARY KEY (`QUESTION_ID`);

--
-- Indexes for table `other_year_common_test_1_question`
--
ALTER TABLE `other_year_common_test_1_question`
  ADD PRIMARY KEY (`QUESTION_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `first_year_test_1_question`
--
ALTER TABLE `first_year_test_1_question`
  MODIFY `QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_year_common_test_1_question`
--
ALTER TABLE `other_year_common_test_1_question`
  MODIFY `QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
