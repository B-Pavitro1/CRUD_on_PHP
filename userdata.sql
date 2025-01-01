-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 10:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `classname` text NOT NULL,
  `rollno` int(11) NOT NULL,
  `school` text NOT NULL,
  `gender` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `image`, `name`, `email`, `phone`, `classname`, `rollno`, `school`, `gender`, `created_at`) VALUES
(3, 'uploads/6773dc231175f2.24338292.jpg', 'Suresh', 'suresh18@gmail.com', '7845120369', '3rd', 33, 'ZPH School Palasa', 'Male', '2024-12-31 11:57:23'),
(4, 'uploads/6773e14957b825.29393907.jpg', 'Tarun Kumar', 'tarun@gmail.com', '9985654144', '12th', 12, 'ZPH School Nagarmpalli', 'Male', '2024-12-31 12:19:21'),
(5, 'uploads/6773e3a53a1b13.98314697.jpg', 'Gowri B', 'gowri167@gmail.com', '9512360487', '11th', 78, 'ZPH School Kotturu', 'Female', '2024-12-31 12:29:25'),
(6, 'uploads/6773eb112cfeb8.82738079.jpg', 'Priyanka', 'priyanka001@gmail.com', '6307895412', '1st', 1, 'ZPH School Hukumpeta', 'Female', '2024-12-31 13:01:05'),
(11, 'uploads/6774eabc205391.39477749.avif', 'Uday', 'uday11@gmail.com', '7845784502', '9th', 14, 'ZPH School Nuvvalarevu', 'Male', '2025-01-01 07:11:56'),
(12, 'uploads/6774ec266ca555.58048144.jfif', 'Siddu', 'sid16@gmail.com', '8979456210', '2nd', 24, 'ZPH School Nagarmpalli', 'Female', '2025-01-01 07:14:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
