-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2020 at 06:03 PM
-- Server version: 10.5.6-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sondageApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendsList`
--

CREATE TABLE `friendsList` (
  `friendsList_id` int(11) NOT NULL,
  `friendsList_userID1` int(11) NOT NULL,
  `friendsList_userID2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reponseSondage`
--

CREATE TABLE `reponseSondage` (
  `reponseSondage_id` int(11) NOT NULL,
  `sondageID` int(11) NOT NULL,
  `userID` varchar(30) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sondage`
--

CREATE TABLE `sondage` (
  `sondage_id` int(11) NOT NULL,
  `sondage_name` int(11) NOT NULL,
  `sondage_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(30) NOT NULL,
  `user_firstName` varchar(30) NOT NULL,
  `user_lastName` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_pseudo`, `user_firstName`, `user_lastName`, `user_email`, `user_password`, `user_online`) VALUES
(1, 'PseudoTest', 'FirstNameTest', 'LastNameTest', 'EmailTest', 'PasswordTest', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendsList`
--
ALTER TABLE `friendsList`
  ADD PRIMARY KEY (`friendsList_id`);

--
-- Indexes for table `reponseSondage`
--
ALTER TABLE `reponseSondage`
  ADD PRIMARY KEY (`reponseSondage_id`);

--
-- Indexes for table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`sondage_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendsList`
--
ALTER TABLE `friendsList`
  MODIFY `friendsList_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reponseSondage`
--
ALTER TABLE `reponseSondage`
  MODIFY `reponseSondage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `sondage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
