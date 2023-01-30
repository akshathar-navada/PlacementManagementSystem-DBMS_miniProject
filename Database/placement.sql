-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 07:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('Admin', 'admin@gmail.com', 'admin'),
('Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appliedjob`
--

CREATE TABLE `appliedjob` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `studentfname` varchar(255) NOT NULL,
  `studentlname` varchar(255) NOT NULL,
  `studentemail` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `cdesc` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appliedjob`
--

INSERT INTO `appliedjob` (`id`, `cname`, `studentfname`, `studentlname`, `studentemail`, `status`, `cdesc`, `cid`) VALUES
(1, 'Amazon', 'Vishal', 'Gami', 'itsmevishal4@gmail.com', 'Pending', 'Software Tester', 15),
(2, 'Amazon', 'Krutarth', 'Belani', 'krutarthbelani@gmail.com', 'Pending', 'Software Tester', 15);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `csalary` int(10) NOT NULL,
  `ccity` varchar(255) NOT NULL,
  `cdesc` varchar(255) NOT NULL,
  `cexperience` varchar(255) NOT NULL,
  `clogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `cname`, `csalary`, `ccity`, `cdesc`, `cexperience`, `clogo`) VALUES
(12, 'Whastapp ', 800000, 'Banglore', 'Software Tester, Sr. Software Developer', '3', '../upload/whastapp.jpg'),
(13, 'Microsoft', 700000, 'Pune', 'Software Developer', '5', '../upload/microsoft.jpg'),
(14, 'Google', 1500000, 'California', 'Software Maintannace', '8', '../upload/google.jpg'),
(15, 'Amazon', 600000, 'Pune', 'Software Tester', '2', '../upload/amazon.jpg'),
(16, 'Flipkart', 500000, 'Banglore', 'Software Analyser', '1', '../upload/flipkart.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `email`, `password`, `address`, `city`, `contact`, `qualification`, `stream`, `skills`, `about`, `state`) VALUES
(1, 'Vishal', 'Gami', 'itsmevishal4@gmail.com', 'vishal@1', 'Abc', 'Rajkot', 7016830000, 'B. Tech ', 'CE', 'Java, ', 'I am a web designer', 'Gujarat'),
(2, 'Krutarth', 'Belani', 'krutarthbelani@gmail.com', 'krutarth@1', 'Hemu Gadhvi Hall, rajkot', 'Rajkot', 9999999999, 'B. Tech marwadi', 'Computer', 'Photoshop, GameDEveloper', 'I am a Fresher', 'Gujarat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appliedjob`
--
ALTER TABLE `appliedjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appliedjob`
--
ALTER TABLE `appliedjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
