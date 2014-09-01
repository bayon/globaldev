-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2014 at 02:21 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `corekeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `anchor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `title`, `year`, `month`, `day`, `note`, `anchor`) VALUES
(1, 0, 'Pet Flea Meds', 2014, 8, 11, 'take em to the vet', 'http://www.forteworks.com'),
(2, 0, 'mom', 2014, 8, 13, 'hi mom', 'http://www.google.com'),
(11, 0, 'test 1', 0, 0, 0, '', ''),
(12, 0, 'test 5', 2014, 8, 27, '', ''),
(13, 0, 'test6', 2014, 8, 28, '', ''),
(14, 4, 'katie date', 2014, 8, 28, 'yahoo', ''),
(16, 2, 'jose sixpack birthday', 2014, 8, 29, '', ''),
(17, 4, 'asdf', 2014, 8, 3, '', ''),
(18, 4, 'Ida ballet', 0, 0, 0, 'shes so awesom', ''),
(19, 4, 'Ida Ballet', 2014, 8, 29, 'she is awesom', '');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `filename` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `user_id`, `student_id`, `filename`) VALUES
(1, 4, 0, 'Math.1_images.jpg'),
(2, 2, 0, 'Math.1.G_Chrysanthemum.jpg'),
(14, 4, 0, 'Math.1.G_Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `ContactFullName` varchar(60) NOT NULL,
  `ContactSalutation` varchar(20) NOT NULL,
  `ContactTel` varchar(20) NOT NULL,
  PRIMARY KEY (`ContactID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ContactID`, `ContactFullName`, `ContactSalutation`, `ContactTel`) VALUES
(1, 'Jim Beam', 'Mr', '444-555-3546'),
(2, 'Jack Daniels', 'Yo', '333-222-3847');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE IF NOT EXISTS `license` (
  `lic_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eq_id` int(11) NOT NULL,
  `host_name` text NOT NULL,
  `exp_date` date NOT NULL,
  `license_key` text NOT NULL,
  PRIMARY KEY (`lic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`lic_id`, `eq_id`, `host_name`, `exp_date`, `license_key`) VALUES
(1, 111, 'verizon', '2014-07-22', 'verizon-secret'),
(2, 222, 'timewarner', '2014-07-22', 'timewarner-secret'),
(3, 333, 'verizon', '2014-07-31', 'verizon-secret-333');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `firstName`, `middleName`, `lastName`, `email`, `phone`) VALUES
(2, 0, 'jay', 'nickchie', 'foomando', 'jfoomando@home.com', '444-555-6565'),
(3, 0, 'marge', 'itema', 'zanchez', 'mzanchez@home.com', '205-333-6588'),
(4, 0, '', '', '', '', ''),
(5, 0, 'sppooks', '', '', '', ''),
(6, 0, 'jimbo', '', '', '', ''),
(7, 0, 'george', '', '', '', ''),
(8, 0, 'James', '', '', '', ''),
(9, 0, 'jackeeoo', '', '', '', ''),
(10, 0, 'zebo', '', '', '', ''),
(11, 0, 'freddy', '', '', '', ''),
(12, 0, 'andy', '', '', '', ''),
(13, 0, 'zulu', '', '', '', ''),
(14, 2, 'mojo', '', '', '', ''),
(15, 2, 'mack', '', '', '', ''),
(16, 2, 'mary', '', '', '', ''),
(17, 4, 'amy', '', 'May', '', '235-666-8765'),
(18, 4, 'sandy', '', '', '', ''),
(19, 4, 'moochild', '', '', '', ''),
(20, 4, 'fred', '', '', '', ''),
(21, 4, 'frederick', 'bayon', 'forte', 'bayon@', '4564564569'),
(22, 4, '', 'joeyZeboey', '', '', ''),
(23, 4, 'joeyZeboey', '', '', '', ''),
(24, 4, 'Sammy', 'Jack', 'oFiddle', 'sf@fiddle.com', '555-555-1234'),
(25, 4, 'aaa', 'bbb', 'ccc', 'sdfg', 'sdfg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(2, 'jose', 'sixpack', ''),
(3, 'jack', 'black', ''),
(4, 'katie', 'forte', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
