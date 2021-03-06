-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2013 at 11:12 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

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
-- Table structure for table `ajax`
--

CREATE TABLE IF NOT EXISTS `ajax` (
  `engine` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajax`
--

INSERT INTO `ajax` (`engine`, `browser`, `platform`, `version`, `grade`) VALUES
('Gecko', 'Firefox 1.0', 'Win 98+ /OSX.3+', '1.8', 'A'),
('Checko', 'Firefox 1.0', 'Win 98+ /OSX.3+', '1.8', 'A'),
('Webkit', 'Firefox 1.0', 'Win 98+ /OSX.3+', '1.8', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(250) NOT NULL,
  `unicodelanguage` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `unicodelanguage`) VALUES
(1, 'Malayalam', 'à´®à´²à´¯à´¾à´³à´‚ '),
(2, 'Kannada', 'à²•à²¨à³à²¨à²¡ '),
(3, 'Tamil', 'à®¤à®®à®¿à®´à¯ '),
(4, 'Telugu', 'à°¤à±†à°²à±à°—à± '),
(5, 'Hindi', 'à¤¹à¤¿à¤‚à¤¦à¥€ ');

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
  `comments` varchar(250) CHARACTER SET utf8 NOT NULL,
  `reference` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wordid` (`wordid`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `meanings`
--

INSERT INTO `meanings` (`id`, `wordid`, `meaning`, `languageid`, `createdby`, `modifiedby`, `createdon`, `modifiedon`, `comments`, `reference`) VALUES
(74, 17, 'à´¦à´¤àµà´¤à´®à´¾à´¯ à´µà´¿à´µà´°à´™àµà´™àµ¾', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/data'),
(75, 17, 'à´…à´Ÿà´¿à´¸àµà´¥à´¾à´¨ à´µà´¿à´µà´°à´™àµà´™àµ¾', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/data'),
(76, 17, 'à´µà´¸àµà´¤àµà´¤à´•àµ¾', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/data'),
(77, 18, 'à´•à´‚à´ªàµà´¯àµ‚à´Ÿàµà´Ÿà´±à´¿à´²àµ‡à´¯àµâ€Œà´•àµà´•àµ à´ªà´•àµ¼à´¨àµà´¨àµ à´¶àµ‡à´–à´°à´¿à´šàµà´šàµ à´µà´šàµà´šà´¿à´Ÿàµà´Ÿàµà´³àµà´³ à´µà´¸àµâ€Œà´¤àµà´¤à´•àµ¾', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/database'),
(78, 21, 'à´¸à´¾à´§à´¾à´°à´£ à´•à´‚à´ªàµà´¯àµ‚à´Ÿàµà´Ÿà´±à´¿à´¨àµ à´ªà´±à´¯àµà´¨àµà´¨ à´ªàµ‡à´°àµâ€Œ', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/desktop'),
(79, 21, 'à´ªà´¿à´¸à´¿ à´…à´¥à´µà´¾ à´ªàµ‡à´´àµâ€Œà´¸à´£àµ½ à´•à´®àµà´ªàµà´¯àµ‚à´Ÿàµà´Ÿà´±à´¿à´¨àµà´ªà´±à´¯àµà´¨àµà´¨ à´®à´±àµà´±àµŠà´°àµ à´ªàµ‡à´°àµâ€Œ', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/desktop'),
(80, 23, 'à´†à´§à´¾à´°à´‚', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/document'),
(81, 23, 'à´ªàµà´°à´®à´¾à´£à´‚', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/document'),
(82, 23, 'à´²à´¿à´–à´¿à´¤à´‚', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/document'),
(83, 23, 'à´°àµ‡à´–', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/document'),
(84, 25, 'à´‡à´¨àµà´±àµ¼à´¨àµ†à´±àµà´±à´¿àµ½ à´¨à´¿à´¨àµà´¨àµà´‚ à´¡à´¾à´±àµà´± à´¸àµà´µà´¨àµà´¤à´‚ à´•à´®àµà´ªàµà´¯àµ‚à´Ÿàµà´Ÿà´±à´¿à´²àµ‡à´•àµà´•àµâ€Œ à´•àµ‹à´ªàµà´ªà´¿ à´šàµ†à´¯àµà´¯àµà´•', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/download'),
(85, 25, 'à´’à´°àµ à´µàµ†à´¬àµâ€Œà´¸àµˆà´±àµà´±à´¿àµ½ à´¨à´¿à´¨àµà´¨àµâ€Œ à´µà´¿à´µà´°à´™àµà´™àµ¾ à´¨à´®àµà´®àµà´Ÿàµ† à´•à´®àµà´ªàµà´¯àµ‚à´Ÿàµà´Ÿà´±à´¿à´¨àµà´±àµ† à´¹à´¾àµ¼à´¡àµâ€Œ à´¡à´¿à´¸àµâ€Œà´•à´¿à´²àµ‡à´•àµà´•àµâ€Œ à´ªà´•àµ¼à´¤àµà´¤àµà´', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/download'),
(86, 25, 'à´•à´®àµà´ªàµà´¯àµ‚à´Ÿàµà´Ÿà´±à´¿àµ½ à´¨à´¿à´¨àµà´¨àµâ€Œ à´µà´¿à´µà´°à´™àµà´™àµ¾ à´ªà´•àµ¼à´¤àµà´¤àµà´•', 1, 'shijiltv', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NA', 'http://ml.wiktionary.org/wiki/download');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rated_by` varchar(250) DEFAULT NULL,
  `rating` decimal(2,0) DEFAULT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `meaning_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `meaningid` (`meaning_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rated_by`, `rating`, `reason`, `meaning_id`) VALUES
(92, 'shijiltv', 5, NULL, 74),
(93, 'shijiltv', 5, NULL, 75),
(94, 'shijiltv', 5, NULL, 76),
(95, 'rameez', 4, NULL, 74),
(96, 'rameez', 4, NULL, 75),
(97, 'rameez', 4, NULL, 76),
(98, 'shijiltv', 4, NULL, 77),
(99, 'anupama', 3, NULL, 74),
(100, 'anupama', 3, NULL, 75),
(101, 'anupama', 3, NULL, 76),
(102, 'shijiltv', 3, NULL, 80),
(103, 'shijiltv', 4, NULL, 81),
(104, 'shijiltv', 3, NULL, 82),
(105, 'shijiltv', 4, NULL, 83);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL,
  `password` char(16) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'shijiltv', 'shijiltv', 'shijiltv@gmail.com', 1),
(2, 'anupama', 'redlotus', 'anupama.2312.bmsit@gmail.', 1),
(4, 'bharathi', 'redlotus', 'bharathi121956@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(250) NOT NULL,
  `createdby` varchar(250) NOT NULL,
  `modifiedby` varchar(250) NOT NULL,
  `createdon` datetime NOT NULL,
  `modifiedon` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `word`, `createdby`, `modifiedby`, `createdon`, `modifiedon`) VALUES
(17, 'data', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(18, 'database', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(19, 'Debian', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(20, 'decompress', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(21, 'desktop', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(22, 'dialer', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(23, 'document', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(24, 'disk operating system (redirect (or disambig) from DOS)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(25, 'download', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(26, 'ENIAC Electronic Numerical Integrator and Calculator', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(27, 'electricity', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(28, 'email', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(29, 'Encarta encyclopedia', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(30, 'Epiphany web browser', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(31, 'End User License Agreement (redirect from EULA)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(32, 'Explorer', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(33, 'ext2 filesystem type', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(34, 'ext3 filesystem type', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(35, 'File allocation table (disambiguation from FAT or fat)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(36, 'FAT16 filesystem', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(37, 'FAT32 filesystem', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(38, 'Fedora', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(39, 'file', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(40, 'file types by ending', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(41, 'filesharing', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(42, 'filesystem', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(43, 'firewall', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(44, 'folder', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(45, 'free', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(46, 'FreeBSD', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(47, 'freeware', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(48, 'FTP', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(49, 'Facebook', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(50, 'gigabyte (redir from gb)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(51, 'Gimp', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(52, 'Gmail', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(53, 'Gnome', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(54, 'Google', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(55, 'GNU', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(56, 'GnuPG', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(57, 'hacker', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(58, 'hard disk (redirs from hard drive, hard disk drive, harddisk)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(59, 'hardware', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(60, 'Hash_function', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(61, 'home page', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(62, 'HTML', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(63, 'HTTP', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(64, 'HTTP_Cookie', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(65, 'Java (language) or Java programming language', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(66, 'J#', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(67, 'KDE*', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(68, 'kernel', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(69, 'keyboard', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(70, 'laptop', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(71, 'licensing examples for computer software', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(72, 'link', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(73, 'Linux', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(74, 'Lavasoft', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(75, 'live cd', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(76, 'Macintosh', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(77, 'Mac OS', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(78, 'Mac OS X', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(79, 'Malware', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(80, 'Mandrake Linux', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(81, 'Martus', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(82, 'md5', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(83, 'media', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(84, 'megabyte (redir or disamb from mb)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(85, 'Microsoft', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(86, 'modify', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(87, 'monitor', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(88, 'Motherboard', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(89, 'mouse', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(90, 'Mozilla web browser', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(91, 'Mozilla Firefox web browser', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(92, 'Modem', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(93, 'NTFS filesystem type', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(94, 'Netscape', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(95, 'Netscape Navigator web browser', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(96, 'network', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(97, 'non-commercial', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(98, 'notebook computer', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(99, 'ogg file format for multimedia', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(100, 'OpenOffice.org', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(101, 'Open Site', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(102, 'open source', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(103, 'open source computer programs', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(104, 'open source computer programs and their commercial equivalents', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(105, 'Opera web browser', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(106, 'operating system', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(107, 'operating systems, a list', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(108, 'page', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(109, 'Perl', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(110, 'personal computer (PC)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(111, 'pdf or more likely PDF', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(112, 'peer to peer, P2P', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(113, 'PGP', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(114, 'PHP', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(115, 'piracy', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(116, 'pirate', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(117, 'plug-in', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(118, 'pop up', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(119, 'printer', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(120, 'privacy', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(121, 'proprietary', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(122, 'program', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(123, 'program', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(124, 'program release', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(125, 'Python_(programming_language)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(126, 'QNX', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(127, 'QuickBasic', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(128, 'QuickTime', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(129, 'Random_access_memory(redirect from RAM)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(130, 'ReactOS', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(131, 'Read-only_memory(redirect from ROM)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(132, 'RedHat', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(133, 'Reiser FS filesystem type', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(134, 'root', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(135, 'RSA', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(136, 'Recycle Bin', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(137, 'scan', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(138, 'search engine', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(139, 'security', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(140, 'server', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(141, 'shared source', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(142, 'shareware', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(143, 'software', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(144, 'spam', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(145, 'spamming', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(146, 'Spreadsheet', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(147, 'spyware', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(148, 'super computer', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(149, 'super user', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(150, 'surfing the internet', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(151, 'Suse', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(152, 'SDK', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(153, 'training for computers', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(154, 'Trojan horse', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(155, 'Ubuntu', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(156, 'undo', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(157, 'UNIX', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(158, 'update', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(159, 'upload', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(160, 'user', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(161, 'version', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(162, 'virtual community', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(163, 'Visual Basic', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(164, 'virus', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(165, 'Windows', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(166, 'Xine', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(167, 'XML', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(168, 'X32(system type)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(169, 'X64(system type)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(170, 'Yahoo!', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00'),
(171, 'ZIP (file format)', 'admin', 'admin', '2013-02-27 00:00:00', '2013-02-27 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meanings`
--
ALTER TABLE `meanings`
  ADD CONSTRAINT `meanings_ibfk_1` FOREIGN KEY (`wordid`) REFERENCES `words` (`id`),
  ADD CONSTRAINT `meanings_ibfk_2` FOREIGN KEY (`wordid`) REFERENCES `words` (`id`),
  ADD CONSTRAINT `meanings_ibfk_3` FOREIGN KEY (`wordid`) REFERENCES `words` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`meaning_id`) REFERENCES `meanings` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
