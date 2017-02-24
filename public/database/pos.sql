-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 12:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--
CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pos`;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `admin_id` int(20) NOT NULL AUTO_INCREMENT,
  `aname` varchar(30) NOT NULL,
  `apwd` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_id`, `aname`, `apwd`) VALUES
(1, 'Samrat', '23456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `userid`, `foodid`) VALUES
(35, 1, 4),
(36, 1, 4),
(37, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `foodid` int(11) NOT NULL AUTO_INCREMENT,
  `foname` varchar(100) NOT NULL,
  `fosize` varchar(15) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `ftype` varchar(8) NOT NULL,
  `fsize` varchar(12) NOT NULL,
  `quantity` varchar(3) NOT NULL,
  `price` varchar(100) NOT NULL,
  `fpath` varchar(100) NOT NULL,
  PRIMARY KEY (`foodid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodid`, `foname`, `fosize`, `fname`, `ftype`, `fsize`, `quantity`, `price`, `fpath`) VALUES
(1, 'Mango Chicken Dolly Pizza', 'Large', 'img025.png', 'image/pn', '144646', '100', '340', 'files/7301_1437042887.5648_img025.png'),
(2, 'Fronic Chicken Burst ', 'Large', 'img014.png', 'image/pn', '130803', '100', '310', 'files/8350_1437066627.9388_img014.png'),
(3, 'Fried Tomatino', 'Medium', 'img001.png', 'image/pn', '137885', '100', '110', 'files/1997_1437066683.2511_img001.png'),
(4, 'Mutton Chilly Fire', 'Medium', 'img015.png', 'image/pn', '143112', '100', '180', 'files/1202_1437066776.4868_img015.png'),
(5, 'Rasaani Special', 'Small', 'img011.png', 'image/pn', '142951', '100', '150', 'files/8076_1437066823.8434_img011.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `logid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(25) NOT NULL,
  `orderdatee` date NOT NULL,
  `foodid` int(20) NOT NULL,
  PRIMARY KEY (`orderid`),
  UNIQUE KEY `userid` (`userid`,`orderdatee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `userid`, `orderdatee`, `foodid`) VALUES
(1, 1, '2015-07-24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `placeorder`
--

CREATE TABLE IF NOT EXISTS `placeorder` (
  `opid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `userid` varchar(30) NOT NULL,
  PRIMARY KEY (`opid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `placeorder`
--

INSERT INTO `placeorder` (`opid`, `name`, `address`, `phno`, `userid`) VALUES
(1, 'Samrat', 'F-009 Ramgard', '980001111', '1'),
(2, 'asdaaasd', 'asas', '980001111', '1');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE IF NOT EXISTS `userprofile` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `street` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`userid`, `fname`, `lname`, `street`, `location`, `city`, `state`, `pincode`, `mob`, `email`, `pwd`) VALUES
(1, 'Samrat', 'Saha', '354 Ganguly Bagan\r\nP.O- Naktal', 'Kalyan Sangha 5th Pally', 'Kolkata', 'West Bengal', '700047', '8981815106', 'sahasamrat1@gmail.com', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
