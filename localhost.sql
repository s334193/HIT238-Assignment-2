-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2020 at 11:40 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurant`
--
CREATE DATABASE `restaurant` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restaurant`;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedbackID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(100) NOT NULL,
  `Feedback` varchar(100) NOT NULL,
  `Dates` varchar(40) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`FeedbackID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(100) NOT NULL,
  `ProductName` varchar(40) NOT NULL,
  `Units` varchar(40) NOT NULL,
  `Totalcost` varchar(40) NOT NULL,
  `Dates` varchar(40) NOT NULL,
  `Status` varchar(40) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `UserID` (`UserID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerName`, `ProductName`, `Units`, `Totalcost`, `Dates`, `Status`, `UserID`, `ProductID`) VALUES
(2, 'susan', 'yoghurt', '2', '110', '2020-09-27', 'PENDING', 2, 2),
(3, 'susan', 'yoghurt', '1', '55', '2020-09-28', 'PENDING', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(100) NOT NULL,
  `ProductName` varchar(40) NOT NULL,
  `Mode` varchar(40) NOT NULL,
  `Amount` varchar(40) NOT NULL,
  `Dates` varchar(40) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  PRIMARY KEY (`paymentID`),
  KEY `OrderID` (`OrderID`),
  KEY `ProductID` (`ProductID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Costs` varchar(100) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Description`, `Costs`) VALUES
(2, 'yoghurt', 'available', '55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) NOT NULL,
  `Telphone` varchar(100) NOT NULL,
  `EmaiL` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Passwords` varchar(100) NOT NULL,
  `Usertype` varchar(100) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `Telphone`, `EmaiL`, `Username`, `Passwords`, `Usertype`) VALUES
(1, 'joel', '+546565656', 'j@gmail.com', 'joel', 'joel', 'staff'),
(2, 'susan', '+545465656', 'su@gmail.com', 'susan', 'susan', 'customer'),
(3, 'Erick', '+465656656', 'er@gmail.com', 'erick', 'Erick12345', 'customer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
