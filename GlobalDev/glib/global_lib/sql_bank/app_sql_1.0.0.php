-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2014 at 05:12 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `projectx`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `anchor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `title`, `year`, `month`, `day`, `note`, `anchor`) VALUES
(1, 'Pet Flea Meds', 2014, 8, 11, 'take em to the vet', 'http://www.forteworks.com'),
(2, 'mom', 2014, 8, 13, 'hi mom', 'http://www.google.com');

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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(2, 'jose', 'sixpack', ''),
(3, 'jack', 'black', '');
