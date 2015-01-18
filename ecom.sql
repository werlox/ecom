-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2015 at 04:17 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecom`
--
CREATE DATABASE IF NOT EXISTS `ecom` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `cat_des` varchar(20) NOT NULL,
  `cat_image` varchar(50) NOT NULL,
  `cat_ico` varchar(50) NOT NULL,
  `cat_order` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_id` (`cat_id`),
  KEY `cat_id_2` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_parent_id`, `cat_des`, `cat_image`, `cat_ico`, `cat_order`) VALUES
(1, 'WOMEN COLLECTION', 0, 'women', '', '', 0),
(2, 'Tshirt', 1, 'tshirt', '', '', 0),
(3, 'MEN COLLECTION', 0, 'men', '', '', 0),
(4, 'More Stores', 0, 'more', '', '', 0),
(5, 'Fragrances', 1, 'frag', '', '', 0),
(6, 'Winter Collection', 1, 'winter', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itm_id` int(11) NOT NULL AUTO_INCREMENT,
  `itm_name` varchar(50) NOT NULL,
  `itm_des` text NOT NULL,
  `itm_ico` varchar(100) NOT NULL,
  `itm_image` varchar(100) NOT NULL,
  `itm_cat_id` int(11) NOT NULL,
  `itm_price` float NOT NULL,
  `itm_qty` int(11) NOT NULL,
  `itm_dis` int(11) NOT NULL,
  PRIMARY KEY (`itm_id`),
  UNIQUE KEY `itm_id` (`itm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itm_id`, `itm_name`, `itm_des`, `itm_ico`, `itm_image`, `itm_cat_id`, `itm_price`, `itm_qty`, `itm_dis`) VALUES
(1, 'Red Shoes', 'Very Good Looking Shoes..\r\nlool\r\n', 'images/product/1.jpg', 'images/zoom/1.jgp', 4, 10, 0, 0),
(2, 'Office Shoes Brown', 'Office Shoes Brown\r\nVery new.', 'images/product/2.jpg', 'images/zoom/2.jpg', 4, 29, 0, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
