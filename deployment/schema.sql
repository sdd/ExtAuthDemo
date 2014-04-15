-- phpMyAdmin SQL Dump
-- version 4.1.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2014 at 04:13 AM
-- Server version: 5.5.34-MariaDB-log
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cofabit`
--
CREATE DATABASE IF NOT EXISTS `extauthdemo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `extauthdemo`;

-- --------------------------------------------------------


--
-- Table structure for table `social_profiles`
--

CREATE TABLE IF NOT EXISTS `social_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(36) NOT NULL,
  `provider` varchar(32) NOT NULL,
  `oid` varchar(128) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `picture` varchar(128) DEFAULT NULL,
  `raw` text NOT NULL,
  `access_token` varchar(64) DEFAULT NULL,
  `created` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(36) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `password_token` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `email_token` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email_token_expires` datetime DEFAULT NULL,
  `tos` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_action` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `role` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `BY_USERNAME` (`username`),
  KEY `BY_EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `position` float NOT NULL DEFAULT '1',
  `field` varchar(255) NOT NULL,
  `value` text,
  `input` varchar(16) NOT NULL,
  `data_type` varchar(16) NOT NULL,
  `label` varchar(128) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_PROFILE_PROPERTY` (`field`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
