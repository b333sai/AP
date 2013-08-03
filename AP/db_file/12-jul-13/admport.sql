-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 188.121.42.239
-- Generation Time: Jul 11, 2013 at 11:12 PM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admport`
--

-- --------------------------------------------------------

--
-- Table structure for table `ap_feedback`
--

CREATE TABLE `ap_feedback` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date_posted` varchar(30) NOT NULL,
  PRIMARY KEY  (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_feedback`
--

INSERT INTO `ap_feedback` VALUES(1, 'BATTINOJU SAIKUMAR', 'battionjusaikumar@gmail.com', 'website looks cool but has less content. Even add some more images and stuff to make it attractive.', '14,June,2013, 17:13:39');
INSERT INTO `ap_feedback` VALUES(2, 'BATTINOJU SAIKUMAR', 'battionjusaikumar@gmail.com', 'Also put some animations on the website to make it cool.', '15,June,2013, 06:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `college_info`
--

CREATE TABLE `college_info` (
  `name` text NOT NULL,
  `ap_id` varchar(30) NOT NULL,
  `engineering` int(1) NOT NULL default '0',
  `medical` int(1) NOT NULL default '0',
  `management` int(1) NOT NULL default '0',
  `auditorium` int(1) NOT NULL default '0',
  `canteen` int(1) NOT NULL default '0',
  `computer_labs` int(1) NOT NULL default '0',
  `medical_facility` int(11) NOT NULL,
  `email` varchar(50) NOT NULL default '0',
  `gym` int(1) NOT NULL default '0',
  `laboratories` int(1) NOT NULL default '0',
  `library` int(1) NOT NULL default '0',
  `sports` int(1) NOT NULL default '0',
  `hostels` int(1) NOT NULL default '0',
  `intake` int(1) NOT NULL default '1',
  `address` varchar(300) NOT NULL,
  `city` text NOT NULL,
  `state` int(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `phone` text NOT NULL,
  `fax` text NOT NULL,
  `train` varchar(50) NOT NULL,
  `bus` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `year_of_opening` int(4) NOT NULL,
  `director` text NOT NULL,
  `rank` int(11) NOT NULL default '0',
  `views` int(11) NOT NULL default '0',
  `date_created` varchar(50) NOT NULL default '0',
  `date_modified` varchar(50) NOT NULL default '0',
  `shrt_name` varchar(30) NOT NULL,
  `coll_code` varchar(30) NOT NULL,
  `ap_rank` int(30) NOT NULL default '0',
  `last_login` varchar(50) NOT NULL,
  `last_logout` varchar(50) NOT NULL,
  `last_update` varchar(50) NOT NULL,
  `affiliated` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL default 'Pending',
  `password` varchar(32) NOT NULL,
  `eng_courses` varchar(1000) NOT NULL,
  `med_courses` varchar(1000) NOT NULL,
  `man_courses` varchar(1000) NOT NULL,
  `app_no` varchar(30) NOT NULL,
  `app_remarks` varchar(1000) NOT NULL,
  PRIMARY KEY  (`ap_id`),
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `eng_courses` (`eng_courses`),
  FULLTEXT KEY `address` (`address`,`med_courses`,`man_courses`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_info`
--

INSERT INTO `college_info` VALUES('Indian Institute of Information Technology, Design and Manufacturing, Kancheepuram', 'APIIITDMK14062013115415', 1, 0, 0, 0, 1, 1, 1, 'office@iiitdm.ac.in', 1, 1, 1, 1, 1, 100, 'Off vandalur-kelambakkam road, Melakottaiyur road, Kandigai', 'Chennai', 31, 600127, '9551913197', '7207302954', 'Perungalathur', 'Kandigai', 'http://www.iiitdm.ac.in', 2007, 'DrGnanamoorthy', 0, 37, '14,June,2013, 11:58:25', '14,June,2013, 18:42:36', 'IIITDMK', '333', 0, '18,June,2013, 21:37:19', '18,June,2013, 21:37:29', '', 'Autonomous', 'Government', 'Co-Education College', 'Pending', '23d472a875c50b7e372d403c41ef55a2', '* Computer Engineering (COE)<br /><br />* Electrical Design and Manufacturing (EDM)<br /><br />* Mechanical Design and Manufacturing (MDM)', '', '', '14062013115415', '');
INSERT INTO `college_info` VALUES('Indian Institute of Information Technology Allahabad', 'APIIITA14062013184501', 1, 0, 0, 1, 1, 1, 1, 'contact@iiita.ac.in', 1, 1, 1, 1, 1, 300, 'Devghat, Jhalwa', 'Allahabad', 33, 211012, '5322922000', '5322430006', 'Allahabad', 'Devghat Jhalwa', 'http://www.iiita.ac.in', 1999, 'M. D. Tiwari', 0, 13, '14,June,2013, 18:56:05', '14,June,2013, 18:56:05', 'IIITA', '', 0, '', '', '', 'Deemed', 'Government', 'Co-Education College', 'Pending', 'd00f90c13a48835d7a7cbe4424787677', '* Computer Science and Engineering (CSC)<br /><br />* Electronics and Communication Engineering', '', '', '14062013184501', '');
INSERT INTO `college_info` VALUES('Indian Institute of Information Technology, Design and Manufacturing, Jabalpur', 'APIIITDMJ23062013170118', 1, 0, 0, 1, 1, 1, 1, 'query@iiitdmj.ac.in', 1, 1, 1, 1, 1, 100, 'Dumna Airport Road, Jabalpur', 'Jabalpur', 20, 482005, '7612632273', '7612632524', 'Jabalpur', 'Jabalpur', 'http://www.iiitdmj.ac.in', 2005, 'Aparajita Ojha', 0, 1, '23,June,2013, 17:02:54', '23,June,2013, 17:02:54', 'IIITDMJ', '482005', 0, '', '', '', 'Autonomous', 'Government', 'Co-Education College', 'Pending', '3bd573b1f9f4a8021e519d741bfecd71', '* Computer Science and Engineering (CSC)<br /><br />* Electronics and Communication Engineering<br /><br />* Mechanical Engineering (MEE)', '', '', '23062013170118', '');
INSERT INTO `college_info` VALUES('Indian Institute of Information Technology and Management, Gwalior', 'APIIITMG23062013171849', 1, 0, 0, 1, 1, 1, 1, 'office@iiitm.ac.in', 1, 1, 1, 1, 1, 100, 'Morena Link Road, Gwalior', 'Gwalior', 20, 474015, '7512449816', '7512449813', 'Gwalior', 'Gwalior', 'http://www.iiitm.ac.in', 1997, 'Sanjeev Govind Deshmukh', 0, 2, '23,June,2013, 17:19:13', '23,June,2013, 17:19:13', 'IIITMG', '474015', 0, '', '', '', 'Autonomous', 'Government', 'Co-Education College', 'Pending', '29a92f664e7e8a9aed01b438ba98fb35', '* Computer Science and Engineering (CSC)<br /><br />* Electrical and Electronics Engineering (EEE)', '', '', '23062013171849', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `stream` int(30) NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` VALUES(1, 'Computer Science and Engineering (CSC)');
INSERT INTO `courses` VALUES(1, 'Electrical and Electronics Engineering (EEE)');
INSERT INTO `courses` VALUES(1, 'Civil Engineering (CE)');
INSERT INTO `courses` VALUES(1, 'Electronics and Communication Engineering');
INSERT INTO `courses` VALUES(1, 'Chemical Engineering (CHE)');
INSERT INTO `courses` VALUES(1, 'Computer Engineering (COE)');
INSERT INTO `courses` VALUES(1, 'Electrical Design and Manufacturing (EDM)');
INSERT INTO `courses` VALUES(1, 'Mechanical Design and Manufacturing (MDM)');
INSERT INTO `courses` VALUES(1, 'Mechanical Engineering (MEE)');

-- --------------------------------------------------------

--
-- Table structure for table `entrances`
--

CREATE TABLE `entrances` (
  `ent_id` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrances`
--


-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `not_id` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `res_id` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `results_date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--


-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `Sno` int(10) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` VALUES(1, 'Andhra Pradesh');
INSERT INTO `states` VALUES(2, 'Arunachal Pradesh');
INSERT INTO `states` VALUES(3, 'Andaman and Nicobar Islands');
INSERT INTO `states` VALUES(4, 'Assam');
INSERT INTO `states` VALUES(5, 'Bihar');
INSERT INTO `states` VALUES(6, 'Chandigarh');
INSERT INTO `states` VALUES(7, 'Chhattisgarh');
INSERT INTO `states` VALUES(8, 'Dadra and Nagar Haveli');
INSERT INTO `states` VALUES(9, 'Daman and Diu');
INSERT INTO `states` VALUES(10, 'Delhi');
INSERT INTO `states` VALUES(11, 'Goa');
INSERT INTO `states` VALUES(12, 'Gujarat');
INSERT INTO `states` VALUES(13, 'Haryana');
INSERT INTO `states` VALUES(14, 'Himachal Pradesh');
INSERT INTO `states` VALUES(15, 'Jammu and Kashmir');
INSERT INTO `states` VALUES(16, 'Jharkhand');
INSERT INTO `states` VALUES(17, 'Karnataka');
INSERT INTO `states` VALUES(18, 'Kerala');
INSERT INTO `states` VALUES(19, 'Lakshadweep');
INSERT INTO `states` VALUES(20, 'Madhya Pradesh');
INSERT INTO `states` VALUES(21, 'Maharashtra');
INSERT INTO `states` VALUES(22, 'Manipur');
INSERT INTO `states` VALUES(23, 'Meghalaya');
INSERT INTO `states` VALUES(24, 'Mizoram');
INSERT INTO `states` VALUES(25, 'Nagaland');
INSERT INTO `states` VALUES(26, 'Odisha');
INSERT INTO `states` VALUES(27, 'Puducherry');
INSERT INTO `states` VALUES(28, 'Punjab');
INSERT INTO `states` VALUES(29, 'Rajasthan');
INSERT INTO `states` VALUES(30, 'Sikkim');
INSERT INTO `states` VALUES(31, 'Tamil Nadu');
INSERT INTO `states` VALUES(32, 'Tripura');
INSERT INTO `states` VALUES(33, 'Uttar Pradesh');
INSERT INTO `states` VALUES(34, 'Uttarakhand');
INSERT INTO `states` VALUES(35, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `college_name` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `ap_id` varchar(50) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `last_logout` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_modified` varchar(50) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES('admin', '', '224796396d31207cbd07c46f6c88bfc3', 'BMW', 0, '', '', '', '', '', '', '', '', '24,June,2013, 19:50:54', '24,June,2013, 19:58:49', '', '');
INSERT INTO `users` VALUES('bmw333sai', 'IIITDMK', '5c576e49b23e7c4698b44cb542d4db7f', 'Battinoju Saikumar', 0, '', '', 'Hyderabad', 'Andhra Pradesh', 'B.Tech 3rd Year', 'battinojusaikumar@gmail.com', '', '', '23,June,2013, 19:22:32', '23,June,2013, 19:22:36', '23,June,2013, 18:50:59', '23,June,2013, 18:50:59');
