-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2014 at 08:50 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `title`, `year`, `month`, `day`, `note`, `anchor`) VALUES
(1, 'Pet Flea Meds', 2014, 8, 11, 'take em to the vet', 'http://www.forteworks.com'),
(2, 'mom', 2014, 8, 13, 'hi mom', 'http://www.google.com'),
(9, 'fruit cake fest', 2014, 8, 29, 'bring your own fruit', 'www.fruits.com'),
(10, 'bday', 2014, 8, 2, 'bring beer', 'www.foo.com'),
(11, 'title One', 2014, 8, 11, 'foo child', 'www.foo.com'),
(12, 'title One', 2014, 8, 11, 'foo child', 'www.foo.com'),
(13, 'asdf', 2014, 8, 19, 'asdf', 'asdf'),
(14, 'asdf', 2014, 8, 19, 'asdf', 'asdf'),
(15, 'monky', 2014, 8, 31, 'study book', 'www.monky.com'),
(16, 'monky', 2014, 8, 31, 'study book', 'www.monky.com'),
(17, 'fert', 2014, 8, 28, 'sdfgfdsfg', 'gggggggggggg'),
(18, 'ajax is jacked?', 2014, 8, 1, 'copy the error down', ''),
(19, 'new fix', 2014, 8, 3, 'finding all the bugs', ''),
(20, '', 2014, 8, 28, '', ''),
(21, 'fart', 2014, 8, 4, 'asdf', ''),
(22, '', 2014, 8, 19, '', ''),
(23, 'YOYO', 2014, 8, 19, '', ''),
(24, 'foo haa', 2014, 8, 5, 'need it ', ''),
(25, 'gumbahaya', 2014, 8, 10, '', ''),
(26, 'gumbahaya', 2014, 8, 10, '', ''),
(27, 'zoodog', 2014, 8, 8, '', ''),
(28, 'zoodog', 2014, 8, 8, '', ''),
(29, 'gooosshh', 2014, 8, 9, '', ''),
(30, 'Mannnnn', 2014, 8, 16, '', ''),
(31, 'ggggggggggggggggg', 2014, 8, 27, '', ''),
(32, 'yoyoyoyoyo', 2014, 8, 14, '', ''),
(33, 'jquery datepicker', 0, 13, 0, 'works in ie has to be themed....back end date handling code changed.', ''),
(34, 'jquery datepicker', 0, 13, 0, 'works in ie has to be themed....back end date handling code changed.', ''),
(35, 'blach ie', 0, 13, 0, '', ''),
(36, 'blach ie', 0, 13, 0, '', ''),
(37, 'foochie', 2014, 13, 25, '', ''),
(38, 'foochie', 2014, 13, 25, '', ''),
(39, '15 is good', 2014, 13, 15, 'hoo yeah', ''),
(40, 'make 23', 2014, 13, 23, 'twenty three is here ', ''),
(41, 'foo the 7th', 2014, 13, 7, 'asdf', ''),
(42, '20 yo', 2014, 13, 20, '', ''),
(43, '21', 2014, 13, 21, '', ''),
(44, '666666666', 2014, 13, 6, '', ''),
(45, '666666666', 2014, 13, 6, '', ''),
(46, 'quarterback', 2014, 13, 12, '', ''),
(47, 'eighteen', 2014, 13, 18, '', ''),
(48, 'thirtuy', 0, 13, 0, '', ''),
(49, 'thirty', 2014, 13, 30, '', ''),
(50, '', 0, 13, 0, '', ''),
(51, '', 0, 13, 0, '', ''),
(52, '', 0, 13, 0, '', ''),
(53, 'twin two', 2014, 13, 22, '', ''),
(54, 'twin two', 2014, 13, 22, '', ''),
(55, 'twin two', 2014, 13, 22, '', ''),
(56, 'twin two', 2014, 13, 22, '', ''),
(57, 'twin two', 2014, 13, 22, '', ''),
(58, 'twin two', 2014, 13, 22, '', ''),
(59, 'july 4th', 2014, 13, 4, '', ''),
(60, 'july 4th', 2014, 13, 4, '', ''),
(61, 'july 4th', 2014, 13, 4, '', ''),
(62, '4th', 2014, 13, 4, '', ''),
(63, '4th', 2014, 13, 4, '', ''),
(64, '4th', 2014, 13, 4, '', ''),
(65, '4th', 2014, 13, 4, '', ''),
(66, '4th', 0, 0, 0, '', ''),
(67, '4th', 7, 4, 2014, '', ''),
(68, '4th', 2014, 7, 4, '', ''),
(69, '15 thththth', 2014, 8, 15, '', ''),
(70, 'third', 2014, 7, 3, '', '');

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
-- Table structure for table `simple_feedback`
--

CREATE TABLE IF NOT EXISTS `simple_feedback` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `answer_1` varchar(30) NOT NULL DEFAULT '',
  `answer_2` varchar(30) NOT NULL DEFAULT '',
  `answer_3` varchar(30) NOT NULL DEFAULT '',
  `answer_4` int(3) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `simple_feedback`
--

INSERT INTO `simple_feedback` (`id`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `date`) VALUES
(1, 'yes', 'sort of', 'no', 25, '0000-00-00'),
(2, 'yes', 'yes', 'yes', 100, '0000-00-00'),
(3, 'yes', 'sort of', 'no', 75, '0000-00-00'),
(4, 'yes', 'sort of', 'no', 71, '0000-00-00'),
(5, 'yes', 'no', 'sort of', 34, '0000-00-00'),
(6, 'yes', 'yes', 'yes', 99, '0000-00-00'),
(7, 'yes', 'sort of', 'yes', 90, '0000-00-00'),
(8, 'yes', 'yes', 'yes', 93, '0000-00-00'),
(9, 'yes', 'sort of', 'no', 50, '0000-00-00'),
(10, 'yes', 'yes', 'yes', 98, '0000-00-00'),
(11, 'yes', 'sort of', 'sort of', 40, '0000-00-00'),
(12, 'yes', 'no', 'yes', 100, '0000-00-00'),
(13, 'no', 'yes', 'yes', 50, '0000-00-00'),
(14, 'yes', 'sort of', 'yes', 89, '0000-00-00'),
(15, 'yes', 'sort of', 'no', 50, '0000-00-00'),
(16, 'yes', 'no', 'no', 0, '0000-00-00'),
(17, 'yes', 'yes', 'yes', 98, '0000-00-00'),
(18, 'yes', 'yes', 'yes', 50, '0000-00-00'),
(19, 'yes', 'sort of', 'sort of', 81, '0000-00-00'),
(20, 'no', 'no', 'no', 29, '0000-00-00'),
(21, 'yes', 'sort of', 'yes', 70, '0000-00-00'),
(22, 'yes', 'sort of', 'no', 30, '0000-00-00'),
(23, 'yes', 'yes', 'yes', 98, '0000-00-00'),
(24, 'no', 'yes', 'yes', 50, '0000-00-00'),
(25, 'yes', 'yes', 'yes', 100, '0000-00-00'),
(26, 'no', 'sort of', 'sort of', 75, '0000-00-00'),
(27, 'no', 'no', 'no', 0, '0000-00-00'),
(28, 'yes', 'yes', 'sort of', 75, '0000-00-00'),
(29, 'yes', 'yes', 'yes', 66, '0000-00-00'),
(30, 'no', 'yes', 'yes', 56, '0000-00-00'),
(31, 'yes', 'sort of', 'sort of', 99, '0000-00-00'),
(32, 'no', 'yes', 'yes', 50, '0000-00-00'),
(33, 'yes', 'sort of', 'yes', 82, '0000-00-00'),
(34, 'no', 'sort of', 'no', 22, '0000-00-00'),
(35, 'no', 'yes', 'yes', 74, '0000-00-00'),
(36, 'no', 'yes', 'yes', 22, '0000-00-00');

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
