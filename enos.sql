-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 08:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enos`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_stack`
--

CREATE TABLE `file_stack` (
  `Sr_no` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_stack`
--

INSERT INTO `file_stack` (`Sr_no`, `name`, `image`, `uid`) VALUES
(1, 'sss', '53658752_841784202838209_826238397923196928_n.jpg', 0),
(12, 'trial_3', '', 0),
(13, 'trial', '', 0),
(14, 'trial_3', '', 0),
(15, 'trial_1', '', 0),
(16, '', '', 0),
(17, '$name', '$img', 0),
(18, 'trial_1', 'Screenshot 2019-09-08 at 10.17.31 PM.png', 0),
(19, 'trial', 'Screenshot 2019-08-17 at 2.50.01 PM.crypto', 0),
(20, 'hey', 'Screenshot 2019-08-17 at 2.50.01 PM.crypto', 0),
(21, 'noigiveup', 'Screenshot 2019-09-25 at 10.20.43 PM.png', 0),
(22, 'sss', '53658752_841784202838209_826238397923196928_n.jpg', 0),
(23, 'ss', '53658752_841784202838209_826238397923196928_n.jpg', 0),
(24, 'sss', '53658752_841784202838209_826238397923196928_n.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `Id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`Id`, `username`, `password`, `email`) VALUES
(1, 'zxc', 'a938dfdfbaa1f25ccbc39e16060f73c44e5ef0dd', 'zxc@g.com'),
(2, 'qwe', '056eafe7cf52220de2df36845b8ed170c67e23e3', 'qwe@g.no'),
(3, 'ijk', 'f33a2b1d7fcaa2bddb92e44cc2aff0aeb5a7060f', 'ijk@g.com'),
(4, 'ty', '32ad247f77b8a066ef05467ce49a5a63e193c3a3', 'ty@g.b'),
(5, 'sy', '1d4daae77833ec89b7ceeb6c3a11778734e5df0d', 'sy@g.com'),
(6, 'fy', '898353c8bdf4d1da0e634fe08b4a2dd207a17cca', 'fy@s.com'),
(7, 'enos', '00ccc2df50cb5cf85e59d5dd19d42808e5535102', 'enos@mail.com'),
(9, 'jebas', '8cb2237d0679ca88db6464eac60da96345513964', 'jebastinfranklin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_stack`
--
ALTER TABLE `file_stack`
  ADD PRIMARY KEY (`Sr_no`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_stack`
--
ALTER TABLE `file_stack`
  MODIFY `Sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
