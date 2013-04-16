-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2013 at 11:16 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `susquestionnaires`
--

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'The id of the user_questionnaire table',
  `user_id` bigint(20) NOT NULL COMMENT 'The id of the owner of this questionnaire.',
  `title` varchar(256) NOT NULL COMMENT 'The title of the questionnaire.',
  `closed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether or not the questionnaire is closed.',
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questionnaire`
--


-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'The id of the questionnaire table',
  `questionnaire_id` bigint(20) NOT NULL,
  `q1` int(11) NOT NULL COMMENT 'I think that I would like to use this system frequently.',
  `q2` int(11) NOT NULL COMMENT 'I found the system unnecessarily complex.',
  `q3` int(11) NOT NULL COMMENT 'I thought the system was easy to use.',
  `q4` int(11) NOT NULL COMMENT 'I think that I would need the support of a technical person to be able to use this system.',
  `q5` int(11) NOT NULL COMMENT 'I found the various functions in this system were well integrated.',
  `q6` int(11) NOT NULL COMMENT 'I thought there was too much inconsistency in this system.',
  `q7` int(11) NOT NULL COMMENT 'I would imagine that most people would learn to use this system very quickly.',
  `q8` int(11) NOT NULL COMMENT 'I found the system very cumbersome to use.',
  `q9` int(11) NOT NULL COMMENT 'I felt very confident using the system.',
  `q10` int(11) NOT NULL COMMENT 'I needed to learn a lot of things before I could get going with this system.',
  `comments` text COMMENT 'Additional optional comments on the user test.',
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `result`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'The id of the user table',
  `emailaddress` varchar(256) NOT NULL COMMENT 'The e-mail address of the user associated with this user account.',
  `username` varchar(256) NOT NULL COMMENT 'The username of the user associated with this user account.',
  `password` varchar(256) NOT NULL COMMENT 'The password of the user.',
  PRIMARY KEY (`_id`),
  UNIQUE KEY `emailaddress` (`emailaddress`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

