-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 07:37 PM
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
-- Database: `job_app_mock_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobapp`
--

CREATE TABLE `jobapp` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobapp`
--

INSERT INTO `jobapp` (`id`, `first_name`, `last_name`, `phone`, `email`, `job`, `date`) VALUES
(2, 'bob', 'john', '111-111-1111', 'notanemail@gmail.com', 'Cashier', '2022-04-30'),
(4, 'bill', 'joe', '222-222-2222', 'newemail@yahoo.com', 'Server', '2022-04-30'),
(5, 'robert', 'jones', '505-404-1234', 'robertsemail@robert.com', 'Sleep', '2022-04-21'),
(6, 'bill', 'turner', '777-777-7777', 'billturner@pirate.com', 'Pirate', '2022-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobapp`
--
ALTER TABLE `jobapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobapp`
--
ALTER TABLE `jobapp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
