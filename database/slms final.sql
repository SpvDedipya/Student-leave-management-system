-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 01:03 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `slno` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `logintype` varchar(256) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT current_timestamp(),
  `question` varchar(256) NOT NULL,
  `answer` varchar(256) NOT NULL,
  `lastlogindate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`slno`, `username`, `password`, `logintype`, `dat`, `question`, `answer`, `lastlogindate`) VALUES
(1, 'admin', 'admin', 'admin', '2021-06-30 02:30:11', 'Your pet name?', 'admin', '30-06-2021 12:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `slno` int(11) NOT NULL,
  `leavetype` varchar(256) NOT NULL,
  `todate` varchar(256) NOT NULL,
  `fromdate` varchar(256) NOT NULL,
  `reason` varchar(256) NOT NULL,
  `postingdate` varchar(256) NOT NULL DEFAULT current_timestamp(),
  `adminremark` varchar(256) NOT NULL DEFAULT 'Not Yet Viewed',
  `adminremarkdate` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'Pending',
  `rollnum` varchar(256) NOT NULL,
  `fname` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`slno`, `leavetype`, `todate`, `fromdate`, `reason`, `postingdate`, `adminremark`, `adminremarkdate`, `status`, `rollnum`, `fname`) VALUES
(1, 'SICK LEAVE', '2021-07-07', '2021-07-01', 'fever', '2021-06-30 08:15:39', 'okk', '30-06-2021 04:55:02', 'Accepted', '2', 'TomBond'),
(2, 'CASUAL LEAVE', '2021-07-16', '2021-07-13', 'event', '2021-06-30 08:23:24', 'Not Yet Viewed', '', 'Pending', '2', 'TomBond'),
(3, 'CASUAL LEAVE', '2021-07-05', '2021-07-01', 'registered for an event', '2021-06-30 08:24:19', 'okay', '30-06-2021 05:03:29', 'Accepted', '1', 'johndoe'),
(4, 'CASUAL LEAVE', '2021-07-04', '2021-07-02', 'function', '2021-06-30 08:26:50', 'no , soon exams will be conducted', '30-06-2021 04:58:13', 'Rejected', '3', 'teena'),
(5, 'CASUAL LEAVE', '2021-07-07', '2021-07-04', 'trip ', '2021-06-30 08:32:42', 'no', '30-06-2021 05:04:58', 'Rejected', '4', 'Harrypotter'),
(6, 'SICK LEAVE', '2021-07-17', '2021-07-15', 'fever', '2021-06-30 08:34:32', 'okay', '30-06-2021 05:05:15', 'Accepted', '4', 'Harrypotter'),
(7, 'SICK LEAVE', '2021-07-09', '2021-07-04', 'fever', '2021-06-30 09:24:25', 'Not Yet Viewed', '', 'Pending', '5', 'KateMoss'),
(8, 'CASUAL LEAVE', '2021-07-15', '2021-07-11', 'event', '2021-06-30 09:24:45', 'Not Yet Viewed', '', 'Pending', '5', 'KateMoss'),
(9, 'CASUAL LEAVE', '2021-08-27', '2021-08-13', 'event', '2021-06-30 09:25:07', 'Not Yet Viewed', '', 'Pending', '5', 'KateMoss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `slno` int(11) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `rollnum` varchar(256) NOT NULL,
  `branch` varchar(256) NOT NULL,
  `section` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `phonenumber` varchar(14) NOT NULL,
  `email` varchar(256) NOT NULL,
  `parent|guardian_name` varchar(256) NOT NULL,
  `parent|guardian_num` varchar(14) NOT NULL,
  `password` varchar(256) NOT NULL,
  `question` varchar(256) NOT NULL,
  `answer` varchar(256) NOT NULL,
  `logintype` varchar(256) NOT NULL DEFAULT 'student',
  `tad` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastlogindate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`slno`, `fname`, `rollnum`, `branch`, `section`, `gender`, `phonenumber`, `email`, `parent|guardian_name`, `parent|guardian_num`, `password`, `question`, `answer`, `logintype`, `tad`, `lastlogindate`) VALUES
(1, 'johndoe', '1', 'CSE', 'b', 'male', '123456', 'johndoe@gmail.com', 'Jane Doe', '7896541', 'john', 'Your pet name?', 'john', 'student', '2021-06-30 02:39:41', '30-06-2021 12:52:07'),
(2, 'TomBond', '2', 'CSE', 'a', 'male', '456789', 'virat@gmail.com', 'AngieBond', '876454121', '12', 'Your pet name?', 'Tom', 'student', '2021-06-30 02:44:59', '30-06-2021 13:01:34'),
(3, 'teena', '3', 'CSE', 'c', 'female', '147852369', 'teena@gmail.com', 'john', '963258741', '123', 'Your pet name?', 'teena', 'student', '2021-06-30 02:56:19', '30-06-2021 12:53:33'),
(4, 'Harrypotter', '4', 'CSE', 'b', 'male', '7896541456', 'harry@gmail.com', 'lilypotter', '123356497', '1234', 'Your pet name?', 'harry', 'student', '2021-06-30 03:01:34', '30-06-2021 12:53:55'),
(5, 'KateMoss', '5', 'select your option', 'c', 'male', '7896541', 'kate@gmail.com', 'AnnaWintour', '98168416', '12345', 'Your pet name?', 'kate', 'student', '2021-06-30 03:53:42', '30-06-2021 12:54:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
