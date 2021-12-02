-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 05:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_user` (IN `email` VARCHAR(50), IN `password` VARCHAR(64))  SELECT * FROM users u WHERE u.email = email AND u.password = password$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `email` VARCHAR(50), IN `pass` VARCHAR(64))  begin 
select u.*, r.`role` 
from users u 
join roles r on r.user_id = u.user_id 
where 
u.email = email
and 
u.password = pass;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL DEFAULT 'no description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `image`, `name`, `description`) VALUES
(5, 'b774b-library.jpg', 'Library', 'Our library covers almost all local book and magazines. It comes with free wifi and 8 sets of computers and a database computer where you can find the books you wanted with ease'),
(6, 'ab265-ballroom.jpg', 'Ballroom', '<p>\n	Our ballroom is a 20mx30m empty room that suits all your needs, including wedding, dance party, and other events. It can upto 200 person and can be configured as you wished for.</p>\n'),
(7, '0cf0e-it-lab.jpg', 'IT Laboratory', '<p>\n	Our IT Laboratory consist of 30 set of computers and one projector in the front line. All the computers are installed with Windows<sup>TM</sup> 10 Operating System and dual booted with Linux 21.4 LTS. It also comes with free wifi and free access to our server</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `approval` varchar(50) NOT NULL DEFAULT 'waiting for approval...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `requester_id`, `facility_id`, `date`, `start_time`, `end_time`, `approval`) VALUES
(1, 2, 5, '2021-11-29', '02:32:00', '02:33:00', 'waiting for approval...');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Andhika Gautama', 'andhika@gmail.com', '28d67a58597fd6ccc2680491076ce438276eeb108ad98dd9754d19c672e2e911', 'admin'),
(2, 'Chandra Sri Sulyanto', 'chandra@gmail.com', '4a577ac3c017756a7cf2c8689ea5876f168c690497d05ef8e22da2dd13a22c11', 'user'),
(3, 'Gunawan Kumangki', 'gunawan@gmail.com', 'b0145cac074d45faa18e77d4fbb31862cb55e038186e8fd20e1bda8f92dfa7e5', 'user'),
(4, 'Aditya Sekar Ayu', 'aditya@gmail.com', '265719f4e7ee032fe4a0c5ed5735a0530545e4f35c8648155dc5450330327e2a', 'user'),
(5, 'Cahyo Purnomo Wiguna', 'cahyo@gmail.com', 'de66d0e8965c8fed104942b72b530c8d2f1fb1f14c507985e460b735cafddf60', 'user'),
(6, 'Ahmad Faisal', 'ahmad@gmail.com', '86e68363a3da0c8a647ba9730882a43075e8a53a6c9dadfdc23a90466126f68f', 'user'),
(7, 'chandranika', 'chandranika@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user'),
(8, 'wijaya', 'wijaya@gmail.com', 'c0dfb0bc178c4b94c96bd4a272426876e5e418222429a022993f837af099a800', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
