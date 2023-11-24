-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2023 at 07:29 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Asdf1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL auto_increment,
  `branch_email` varchar(50) NOT NULL,
  `branch_contact` varchar(50) NOT NULL,
  `branch_address` varchar(50) NOT NULL,
  `place_id` varchar(50) NOT NULL,
  `branch_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_email`, `branch_contact`, `branch_address`, `place_id`, `branch_password`) VALUES
(14, 'branch@hmail.com', '9567415266', 'Muvattupuzha', '37', 'Branch26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaintype_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_content` varchar(50) NOT NULL,
  `consignment_id` int(11) NOT NULL,
  `complaint_reply` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_status` char(1) NOT NULL default '0',
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaintype_id`, `complaint_title`, `complaint_content`, `consignment_id`, `complaint_reply`, `user_id`, `complaint_status`) VALUES
(1, 2, 'solid', 'sdcw', 0, '', 9, '0'),
(2, 2, 'solid', 'sdgfsrthryj', 10, 'dzfhdfj', 9, '1'),
(3, 2, 'solid', 'hai', 0, '', 9, '0'),
(4, 2, 'solid', 'hi', 10, 'ok', 9, '1'),
(5, 2, 'solid', 'broken', 0, 'hi', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaintype`
--

CREATE TABLE `tbl_complaintype` (
  `complaintype_id` int(11) NOT NULL auto_increment,
  `complaintype_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`complaintype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_complaintype`
--

INSERT INTO `tbl_complaintype` (`complaintype_id`, `complaintype_name`) VALUES
(2, 'damaged');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consignment`
--

CREATE TABLE `tbl_consignment` (
  `consignment_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `couriertype_id` int(11) NOT NULL,
  `consignment_rname` varchar(50) NOT NULL,
  `consignment_raddress` varchar(50) NOT NULL,
  `consignment_rcontact` int(11) NOT NULL,
  `consignment_trackid` varchar(50) NOT NULL default '0',
  `place_id` int(11) NOT NULL,
  `consignment_date` varchar(20) NOT NULL,
  `consignment_status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`consignment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_consignment`
--

INSERT INTO `tbl_consignment` (`consignment_id`, `user_id`, `branch_id`, `couriertype_id`, `consignment_rname`, `consignment_raddress`, `consignment_rcontact`, `consignment_trackid`, `place_id`, `consignment_date`, `consignment_status`) VALUES
(15, 0, 14, 0, 'Rahul', 'vadattupara\r\nkothamangalam', 2147483647, '0', 30, '2023-10-19', 0),
(16, 0, 14, 0, 'Arun', 'Muvattupuzha', 2147483647, '0', 37, '2023-10-19', 0),
(17, 0, 0, 0, 'Habeeb', 'muvattupuzha\r\npattalayil', 2147483647, '0', 15, '2023-10-19', 0),
(18, 0, 0, 0, 'Rahul', 'miokmpl,l;,.;\r\nokiom', 2147483647, '0', 19, '2023-10-19', 0),
(19, 0, 0, 0, 'Arun', 'Muvattupuzha', 2147483647, '0', 7, '2023-10-19', 0),
(20, 0, 14, 0, 'Arun', 'Muvattupuzha', 2147483647, '0', 7, '2023-10-19', 0),
(21, 0, 14, 0, 'Mathew', 'miokmpl,l;,.;\r\nokiom', 2147483647, '0', 10, '2023-10-19', 0),
(22, 10, 14, 2, 'Mathew', 'miokmpl,l;,.;\r\nokiom', 2147483647, 'CE10022', 10, '2023-10-19', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_couriertype`
--

CREATE TABLE `tbl_couriertype` (
  `couriertype_id` int(11) NOT NULL auto_increment,
  `couriertype_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`couriertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_couriertype`
--

INSERT INTO `tbl_couriertype` (`couriertype_id`, `couriertype_name`) VALUES
(2, 'SpeedPost'),
(6, 'Local Courier'),
(7, 'Overnight Courier');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(14, 'Thiruvananthapuram'),
(21, 'Kollam'),
(22, 'Pathanamthitta'),
(23, 'Alappuzha'),
(24, 'Kottayam'),
(25, 'Idukki'),
(28, 'Ernakulam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `user_id`, `branch_id`) VALUES
(12, 'excellent', 9, 11),
(13, 'nice product', 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL,
  `place_pincode` varchar(30) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`, `place_pincode`) VALUES
(1, 'Venjaramood', 10, ''),
(2, 'Kanjoor', 10, ''),
(3, 'muvattupuzha', 12, ''),
(4, 'pezhakappally', 12, ''),
(5, 'punalur', 11, ''),
(7, 'Amboori', 14, ''),
(8, 'Mudakkal', 14, ''),
(9, 'Karakulam', 14, ''),
(10, 'Ayoor', 21, ''),
(11, 'Kulathupuzha', 21, ''),
(12, 'Nedungolam', 21, ''),
(13, 'Punalur', 21, ''),
(14, 'Aranmulaâ€Ž ', 22, ''),
(15, 'Kozhencherry', 22, ''),
(16, 'Mallapally', 22, ''),
(17, 'Pandalam', 22, ''),
(18, 'Arthunkal', 23, ''),
(19, 'Budhanoor', 23, ''),
(20, 'Champakulam', 23, ''),
(21, 'Edanad', 23, ''),
(22, 'Changanasseryâ€Ž', 24, ''),
(24, 'Kanjirappally', 24, ''),
(25, 'Pala', 24, ''),
(26, 'Vaikom', 24, ''),
(27, ' Aanakkulam', 25, ''),
(28, 'Anavilasam', 25, ''),
(29, 'Chemmannar', 25, ''),
(30, ' Devikulam', 25, ''),
(31, 'Perumbavoor', 26, ''),
(32, 'Aluva', 26, ''),
(33, 'Muvattupuzha', 26, ''),
(34, 'Kolenchery', 26, ''),
(35, 'Muvattupuzha', 28, ''),
(37, 'Aluva', 28, ''),
(38, 'Pezhakapally', 28, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_pwd` varchar(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_address`, `place_id`, `user_pwd`, `user_photo`, `user_contact`) VALUES
(10, 'Habeeb jaffer', 'Habeebpattalayil@gmail.com', 'Male', 'muvattupuzha\r\npattalayil', 35, 'Habeeb@26', 'Screenshot (2).png', '9567415266');
