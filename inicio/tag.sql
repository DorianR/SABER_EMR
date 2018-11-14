-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2011 at 08:10 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tag`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_tag`
--

DROP TABLE IF EXISTS `image_tag`;
CREATE TABLE IF NOT EXISTS `image_tag` (
  `id` int(11) NOT NULL auto_increment,
  `pic_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pic_x` int(11) NOT NULL,
  `pic_y` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `pic_id` (`pic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `image_tag`
--


-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `name`) VALUES (1, 'minion.jpg');
