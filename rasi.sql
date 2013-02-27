-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2013 at 10:49 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `meanings`
--

CREATE TABLE IF NOT EXISTS `meanings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wordid` int(11) NOT NULL,
  `meaning` varchar(250) CHARACTER SET utf8 NOT NULL,
  `languageid` int(11) NOT NULL,
  `createdby` varchar(250) NOT NULL,
  `modifiedby` varchar(250) NOT NULL,
  `createdon` datetime NOT NULL,
  `modifiedon` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `meanings`
--

INSERT INTO `meanings` (`id`, `wordid`, `meaning`, `languageid`, `createdby`, `modifiedby`, `createdon`, `modifiedon`) VALUES
(23, 17, 'à´µà´¿à´µà´°à´‚', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 17, 'à´°àµ‡à´–', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
