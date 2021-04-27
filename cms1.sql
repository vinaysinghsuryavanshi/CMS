-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 01:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `name`, `email`, `phone_no`, `profile_pic`, `message`) VALUES
(1, 'update website content', 'abc@gmail.com', '9878659053', '', 'd,mbwj'),
(2, 'Vinay', 'abc@gmail.com', '9878659053', '', 'dsnjrkle'),
(3, 'Vinay Singh', 'nnlivesocial@nursingnextlive.in', '9878659053', '', 'mdnfjksdk'),
(4, 'Vinay', 'nnlivesocial@nursingnextlive.in', '9878659053', '', 'dnmbfmsn'),
(5, 'Vinay', 'abc@gmail.com', '9878659053', '', 'jkhjkhk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `admin_name` varchar(250) DEFAULT NULL,
  `admin_email` varchar(250) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `loginPhoneNo` varchar(250) NOT NULL,
  `otp_verified` int(11) NOT NULL,
  `loginCode` varchar(250) NOT NULL,
  `isEnable` varchar(250) NOT NULL,
  `is_logged_in` varchar(250) NOT NULL,
  `loginType` varchar(250) NOT NULL,
  `agent_status` varchar(250) NOT NULL,
  `approved_by_admin` varchar(250) NOT NULL,
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`loginPhoneNo`, `otp_verified`, `loginCode`, `isEnable`, `is_logged_in`, `loginType`, `agent_status`, `approved_by_admin`, `ID`, `userID`) VALUES
('8743907452', 1, '1', '1', '1', '1', '1', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `ID` int(11) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`ID`, `mobile_no`, `otp`) VALUES
(1, '8743907452', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
