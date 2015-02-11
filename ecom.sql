-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2015 at 01:29 PM
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
-- Table structure for table `aduser`
--

CREATE TABLE IF NOT EXISTS `aduser` (
  `ad_id` int(5) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(100) NOT NULL,
  `ad_user` varchar(50) NOT NULL,
  `ad_pass` varchar(100) NOT NULL,
  UNIQUE KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aduser`
--

INSERT INTO `aduser` (`ad_id`, `ad_name`, `ad_user`, `ad_pass`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `cat_des` varchar(200) NOT NULL,
  `cat_image` varchar(200) NOT NULL,
  `cat_ico` varchar(50) NOT NULL,
  `cat_order` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_id` (`cat_id`),
  KEY `cat_id_2` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_parent_id`, `cat_des`, `cat_image`, `cat_ico`, `cat_order`) VALUES
(-1, 'All Items', -1, '', 'all.jpg', '', 0),
(23, 'three', 0, 'dfdf', '', '', 0),
(27, 'MEN', 0, 'Men items', '', '', 0),
(29, 'jsfhdkhf', 0, '', '', '', 0),
(32, 'four', 0, 'test', '', '', 0),
(33, 'testj g', 23, 'dfm,d.fm', '20150131200422_53185_Hydrangeas.jpg', '', 0),
(34, 'Shoes', 27, 'face', '20150131200716_74598_Penguins.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itm_id` int(11) NOT NULL AUTO_INCREMENT,
  `itm_name` varchar(50) NOT NULL,
  `itm_des` text NOT NULL,
  `itm_des_long` text NOT NULL,
  `itm_ico` varchar(100) NOT NULL,
  `itm_image` varchar(100) NOT NULL,
  `itm_cat_id` int(11) NOT NULL,
  `itm_price` float NOT NULL,
  `itm_qty` int(11) NOT NULL,
  `itm_dis` int(11) NOT NULL,
  `itm_views` int(10) NOT NULL,
  `itm_sold` int(100) NOT NULL,
  PRIMARY KEY (`itm_id`),
  UNIQUE KEY `itm_id` (`itm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itm_id`, `itm_name`, `itm_des`, `itm_des_long`, `itm_ico`, `itm_image`, `itm_cat_id`, `itm_price`, `itm_qty`, `itm_dis`, `itm_views`, `itm_sold`) VALUES
(2, 'Shoes', 'testing sdhkjhfkdsjhfkjds hsdjfhskdjhf ksjdhfksjdhf kjsdhfkjshdf kjshdkjfhsdf ', 'this is a new item', 'sample.jpg', '', 31, 100, 1, 1, 0, 0),
(3, 'New', 'dfdmfdnf,dnf', '', 'sample.jpg', '', 33, 1, -1, 11, 0, 0),
(4, 'fuck', 'fuckung', '', 'sample.jpg', '', 33, 1111, 110, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itm_images`
--

CREATE TABLE IF NOT EXISTS `itm_images` (
  `img_id` int(10) NOT NULL AUTO_INCREMENT,
  `itm_id` int(10) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `img_link` varchar(100) NOT NULL,
  PRIMARY KEY (`img_id`),
  UNIQUE KEY `img_id` (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `itm_images`
--

INSERT INTO `itm_images` (`img_id`, `itm_id`, `img_name`, `img_link`) VALUES
(13, 2, 'sample1.jpg', 'images/items/20150131190748_91677_0Chrysanthemum.jpg'),
(14, 3, 'sample1.jpg', 'images/items/20150131203751_19869_1Penguins.jpg'),
(15, 3, 'sample1.jpg', 'images/items/20150131203751_19256_2Tulips.jpg'),
(16, 4, 'sample1.jpg', 'images/items/20150131204238_55452_0almanda.PNG'),
(17, 4, 'sample2.jpg', 'images/items/20150131204238_64481_1select seat.PNG'),
(18, 4, 'sample3.jpg', 'images/items/20150131204238_64481_1select seat.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `pk_id` int(5) NOT NULL AUTO_INCREMENT,
  `pk_name` varchar(100) NOT NULL,
  `pk_des` text NOT NULL,
  `pk_price` int(5) NOT NULL,
  `pk_img` varchar(200) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pk_id`, `pk_name`, `pk_des`, `pk_price`, `pk_img`) VALUES
(1, 'Small Box', 'Item will be packed in a Small Box\r\n', 11, '1.png'),
(2, 'Small Box New', 'Item will be packed in a Small Box\r\n', 20, '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `page_log`
--

CREATE TABLE IF NOT EXISTS `page_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_name` text NOT NULL,
  `user_ip` varchar(15) NOT NULL,
  `page_url` varchar(200) NOT NULL,
  `log_time` datetime NOT NULL,
  `user_came_from` varchar(200) NOT NULL,
  UNIQUE KEY `log_id` (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `page_log`
--

INSERT INTO `page_log` (`log_id`, `page_name`, `user_ip`, `page_url`, `log_time`, `user_came_from`) VALUES
(1, 'listing', '::1', 'http://localhost/ecom/ecom/list.php?id=2', '2015-01-27 16:23:10', 'http://localhost/ecom/ecom/list.php'),
(2, 'listing', '::1', 'http://localhost/ecom/ecom/list.php?id=2', '2015-01-27 16:25:43', 'http://localhost/ecom/ecom/list.php?id=2'),
(3, 'listing', '::1', 'http://localhost/ecom/ecom/list.php', '2015-01-27 17:19:54', 'http://localhost/ecom/ecom/'),
(4, 'listing', '::1', 'http://localhost/ecom/ecom/list.php?id=2', '2015-01-27 17:20:32', 'http://localhost/ecom/ecom/list.php'),
(5, 'listing', '::1', 'http://localhost/ecom/ecom/list.php?id=2', '2015-01-27 17:21:55', 'none'),
(6, 'listing', '::1', 'http://localhost/ecom/ecom/list.php?id=2', '2015-01-27 17:22:08', 'none');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
