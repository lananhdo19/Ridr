-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2020 at 07:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridr`
--

-- --------------------------------------------------------

--
-- Table structure for table `filtertable`
--

CREATE TABLE `filtertable` (
  `post_ID` int(11) NOT NULL DEFAULT 0,
  `email` varchar(500) CHARACTER SET latin1 NOT NULL,
  `destination` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `comment` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `zipcode` varchar(5) CHARACTER SET latin1 NOT NULL,
  `isDriver` tinyint(1) NOT NULL DEFAULT 0,
  `seats` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filtertable`
--

INSERT INTO `filtertable` (`post_ID`, `email`, `destination`, `datetime`, `comment`, `zipcode`, `isDriver`, `seats`) VALUES
(46, 'persona@virginia.edu', 'Fair Oaks Mall', '2020-05-21 18:00:00', '', '12345', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_ID` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `destination` varchar(500) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `zipcode` varchar(5) NOT NULL,
  `isDriver` tinyint(1) NOT NULL DEFAULT 0,
  `seats` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_ID`, `email`, `destination`, `datetime`, `comment`, `zipcode`, `isDriver`, `seats`) VALUES
(43, 'persona@virginia.edu', 'Charlottesvile', '2020-04-21 12:00:00', '', '12345', 0, 3),
(44, 'persona@virginia.edu', 'GMU', '2020-04-25 16:00:00', '', '12345', 0, 4),
(45, 'rbkh13@gmail.com', 'Fairfax Station', '2020-04-22 12:30:00', '', '12345', 1, 0),
(46, 'persona@virginia.edu', 'Fair Oaks Mall', '2020-05-21 18:00:00', '', '12345', 1, 0),
(47, 'rbkh13@gmail.com', 'Heaven', '2020-05-25 15:00:00', '', '12345', 0, 2),
(48, 'personb@virginia.edu', 'Springfield', '2020-04-22 12:00:00', '', '12345', 0, 4),
(49, 'personb@virginia.edu', 'Vienna', '2020-04-21 12:04:00', '', '12345', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profilepics`
--

CREATE TABLE `profilepics` (
  `email` varchar(500) NOT NULL,
  `color` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profilepics`
--

INSERT INTO `profilepics` (`email`, `color`) VALUES
('rbkh13@gmail.com', 'static/images/profilepic-black.png'),
('rk4tb@virginia.edu', 'static/images/profilepic-red.png'),
('undefined', 'static/images/profilepic-grey.png');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `rider_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `rider_email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`rider_ID`, `post_ID`, `rider_email`) VALUES
(7, 43, 'rbkh13@gmail.com'),
(9, 47, 'personb@virginia.edu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `first_name`, `last_name`) VALUES
('ld9hu@virginia.edu', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'Lan Anh', 'Do'),
('persona@virginia.edu', '$2y$10$SBXsEQry3e.G9SN11q1NTe2JjGORku8lwz8xw.qghsT1xJ4qDWuei', 'Person ', 'A'),
('personb@virginia.edu', '$2y$10$YGk2iEy1Vea2HozIf2KBFuW/ecwEBHph3qBAIS/HwHDhn73g.j7Fa', 'Person B', 'Test'),
('rbkh13@gmail.com', '$2y$10$bhrGVrwuvDUmPnoLD9cYH.82wM4gGyGy7/15xPHQjGtbTjDtMc4VC', 'Rebekah', 'Kang'),
('rk4tb@virginia.edu', '$2y$10$4V0QEf9/Pb1bazv8kLJjvunh0Y9f06gtqABbgqyiflrFJ.kji3kKy', 'Rebecca', 'Kim'),
('test2@virginia.edu', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'John', 'Doe'),
('test@virginia.edu', '*196BDEDE2AE4F84CA44C47D54D78478C7E2BD7B7', 'Jane', 'Doe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_ID`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`rider_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
