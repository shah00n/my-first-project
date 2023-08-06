-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 يونيو 2023 الساعة 17:31
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aqsadb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `majors_tb`
--

CREATE TABLE `majors_tb` (
  `id` int(4) NOT NULL,
  `NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `majors_tb`
--

INSERT INTO `majors_tb` (`id`, `NAME`) VALUES
(1, 'Fin'),
(2, 'MIS');

-- --------------------------------------------------------

--
-- بنية الجدول `students_tb`
--

CREATE TABLE `students_tb` (
  `STDNO` int(11) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `MOBILE` varchar(10) NOT NULL,
  `DOB` datetime NOT NULL,
  `MAJOR` int(4) NOT NULL,
  `ADDRESS` varchar(150) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `students_tb`
--

INSERT INTO `students_tb` (`STDNO`, `FNAME`, `LNAME`, `EMAIL`, `MOBILE`, `DOB`, `MAJOR`, `ADDRESS`, `CREATED_AT`) VALUES
(24, 'حسام', 'خالد', 'husam@gmail.com', '0595561742', '2001-05-27 00:00:00', 1, 'البريج', '2023-06-15 12:52:55'),
(26, 'خليل', 'احمد', 'khalil2@gmail.com', '0591111112', '2000-01-20 00:00:00', 2, 'النصيرات', '2023-06-15 15:02:03'),
(27, 'محمد', 'عارف', 'mohammad@gmail.com', '0593333333', '2006-05-01 00:00:00', 1, 'الشجاعية', '2023-06-15 15:04:28'),
(29, 'مؤيد', 'بشير', 'moaed@gmail.com', '0593333344', '2001-05-27 00:00:00', 2, 'البريج', '2023-06-15 15:14:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `majors_tb`
--
ALTER TABLE `majors_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_tb`
--
ALTER TABLE `students_tb`
  ADD PRIMARY KEY (`STDNO`),
  ADD UNIQUE KEY `STD_EMAIL_UNO` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `majors_tb`
--
ALTER TABLE `majors_tb`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students_tb`
--
ALTER TABLE `students_tb`
  MODIFY `STDNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
