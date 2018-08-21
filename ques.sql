-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2018 at 11:46 AM
-- Server version: 5.1.51
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ques`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `from` varchar(5) NOT NULL,
  `to` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `name`, `from`, `to`, `created_at`) VALUES
(1, '1st year', '2014', '2017', '2018-08-10 11:20:10'),
(3, 'asdasd', '2004', '2007', '2018-08-14 11:49:55'),
(4, 'asczxcxzc', '2017', '2020', '2018-08-14 11:50:05'),
(5, 'xzc dfsfsdf', '2006', '2009', '2018-08-14 12:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(2) NOT NULL DEFAULT '1' COMMENT '0 = admin, 1 = user',
  `name` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `uname` varchar(50) NOT NULL COMMENT '(roll no)',
  `email` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `name`, `lname`, `uname`, `email`, `password`, `created_at`, `batch_id`) VALUES
(1, 0, 'karthi', '', 'karthisgk', '', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00', 0),
(3, 1, 'user', '', 'user1', '', '123456', '0000-00-00 00:00:00', 1),
(4, 1, 'mahesh', 'waren', '123', 'mahesh20@g.in', '12345', '0000-00-00 00:00:00', 4),
(5, 1, 'user3', 'askjdhasjkh', '10006689', 'user3@g.in', '89f0f675e2e4822ba531f97566dbccae', '2018-08-21 10:18:40', 1);
