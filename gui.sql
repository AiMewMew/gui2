-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 04:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gui`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`CategoryId`, `CategoryName`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `image_tb`
--

CREATE TABLE `image_tb` (
  `Id` int(11) NOT NULL,
  `PhotoType` varchar(256) NOT NULL,
  `PhotoUrl` varchar(256) NOT NULL,
  `Description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_tb`
--

INSERT INTO `image_tb` (`Id`, `PhotoType`, `PhotoUrl`, `Description`) VALUES
(1, 'Personal', 'mb.png', 'ceremony photo');

-- --------------------------------------------------------

--
-- Table structure for table `post_tb`
--

CREATE TABLE `post_tb` (
  `Id` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Description` varchar(256) NOT NULL,
  `Body` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserPassword` varchar(600) NOT NULL,
  `UserCode` int(11) NOT NULL,
  `UserStatus` varchar(11) NOT NULL,
  `UserType` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`UserId`, `UserName`, `UserEmail`, `UserPassword`, `UserCode`, `UserStatus`, `UserType`) VALUES
(3, 'Abubakar', 'f180207@nu.edu.pk', '$2y$10$sCMwXdaOE4KfYoFE/atoXurjn/th3SBYZz5Haxpd99OllBESSMTe.', 0, 'verified', 'Admin'),
(7, 'malikzada624@gmail.com', 'malikzada624@gmail.com', '$2y$10$wF4hMlzz/UTchtzYG1FLCe1c3Fr1sokLSclp19TbVaSgrU.TBE7IG', 0, 'verified', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `video_tb`
--

CREATE TABLE `video_tb` (
  `Id` int(11) NOT NULL,
  `VideoType` varchar(256) NOT NULL,
  `VideoUrl` varchar(256) NOT NULL,
  `Description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_tb`
--

INSERT INTO `video_tb` (`Id`, `VideoType`, `VideoUrl`, `Description`) VALUES
(1, 'Personal', '1. Section 1 intro.mp4', 'course video');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `image_tb`
--
ALTER TABLE `image_tb`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `post_tb`
--
ALTER TABLE `post_tb`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `video_tb`
--
ALTER TABLE `video_tb`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image_tb`
--
ALTER TABLE `image_tb`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_tb`
--
ALTER TABLE `post_tb`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video_tb`
--
ALTER TABLE `video_tb`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
