-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2014 at 08:33 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_opp`
--

CREATE TABLE IF NOT EXISTS `add_opp` (
  `id` varchar(100) NOT NULL,
  `name_org` varchar(100) NOT NULL,
  `type_org` varchar(100) NOT NULL,
  `name_opp` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `eligibility` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `featured_opt` varchar(50) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `app_date` date NOT NULL,
  `app_enddate` date NOT NULL,
  `opp_start_date` date NOT NULL,
  `opp_end_date` date NOT NULL,
  `deadline` date NOT NULL,
  `description` text NOT NULL,
  `summary` text NOT NULL,
  `reference` varchar(7) NOT NULL,
  `website_opp` varchar(100) NOT NULL,
  `stipend` varchar(100) NOT NULL,
  `email_status` varchar(3) NOT NULL,
  `current_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `org_id` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_opp`
--

INSERT INTO `add_opp` (`id`, `name_org`, `type_org`, `name_opp`, `logo`, `email`, `email2`, `eligibility`, `location`, `pincode`, `country`, `featured_opt`, `flag`, `app_date`, `app_enddate`, `opp_start_date`, `opp_end_date`, `deadline`, `description`, `summary`, `reference`, `website_opp`, `stipend`, `email_status`, `current_date`, `org_id`, `keywords`) VALUES
('1035965819', 'new interns', 'Reaserch Organisation', 'web designer at newinterns', 'logo/2012-09-22-177.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '632014', 'RUSSIA', 'No', '1', '2014-06-26', '2014-06-27', '2014-06-28', '2014-06-29', '2014-06-30', '                               Tech work mainly', 'technical internship', '1', 'hiiiii', '1000', '0', '2014-06-27 12:25:27', '0', 'internships football '),
('1042097779', 'grayslab', 'Company', 'intern at grayslab', 'logo/1.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '632014', 'CHINA', 'YES', '1', '2014-06-06', '2014-06-07', '2014-06-08', '2014-06-09', '2014-06-10', '                    \r\n                hey this is us , grayslab  !!!', 'hiiii', '1', 'www.grsyalab.com', '10000', '0', '2014-06-27 11:52:46', '0', 'work from home'),
('1063359410', 'lklk', 'University', 'intern at lmk', 'logo/2012-09-22-177.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'other', '632014', 'CHINA', 'YES', '2', '2014-06-02', '2014-06-03', '2014-06-04', '2014-06-05', '2014-06-06', 'lkjblkjbljkb                    \r\n                ', 'lkjblkjblkj', '2', 'klkjlkljb', '100000', '0', '2014-06-27 13:13:46', '0', 'work at home,with stipend'),
('1068177378', 'hiihiii', 'Company', 'ghantaa', 'logo/2012-09-22-177.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'other', '8898998', 'RUSSIA', 'YES', '1', '2014-06-06', '2014-06-07', '2014-06-08', '2014-06-09', '2014-06-10', '                    \r\n                aman', 'aman', '4', 'oioioioiooi', '90000', '0', '2014-06-27 12:51:08', '0', 'with stipend'),
('1105795073', 'lmml', 'Company', 'Cristinao Ronaldo', 'logo/2012-09-22-177.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '87686868', 'RUSSIA', 'YES', '3', '2014-06-06', '2014-06-19', '2014-06-25', '2014-06-28', '2014-06-22', '.lkn;lkl                    \r\n                ', 'kn;lknl;knlk', '2', 'kllkjblkb', '20000', '0', '2014-06-27 13:10:43', '0', 'standard profile job interns'),
('1109749561', 'ap', 'Company', 'sociial media', 'logo/1.jpg', 'sd@hot.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '44444444', '-1', 'YES', '1', '2014-07-04', '2014-07-10', '2014-07-18', '2014-07-26', '2014-07-30', '                    \r\n                sdcwcc', 'dfscvd  vc', '1', 'ascsd', 'adsdscdsc', '0', '2014-06-30 19:37:26', '9', 'new branded multitasking job intern '),
('1115068097', 'misc', 'University', 'noddy', 'logo/2012-09-22-177.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Students', 'online', '8989876', 'USA', 'YES', '1', '2014-06-20', '2014-06-21', '2014-06-20', '2014-06-04', '2014-06-06', '.nlknl;kn;lkn;kn                    \r\n                ', '/;loihkjv', '4', 'lklknlknkllk', '100000', '0', '2014-06-27 12:42:31', '0', 'encouraging'),
('1153386587', 'jackie', 'University', 'fIFA', 'logo/1.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '899898', 'RUSSIA', 'YES', '1', '2014-06-05', '2014-06-05', '2014-06-06', '2014-06-07', '2014-06-10', 'lolololoololo                    \r\n                ', 'ololool', '2', 'lolololo', '80000', '0', '2014-06-27 13:04:48', '0', 'low profile interns job expenses covered stipend'),
('1198475261', 'misc', 'Company', 'Kick', 'logo/1.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '8687', 'USA', 'YES', '1', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '                    \r\n                b,kjb', ';llk;k', '4', '', '2000-4-0000 depnd upon work', '0', '2014-06-27 18:46:16', '0', 'high profile job intern'),
('1206797206', 'pop', 'Company', 'INDIA WON THE FIFA 2050', 'logo/1.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Students', 'other', '89899', 'USA', 'YES', '3', '2014-06-04', '2014-06-05', '2014-06-06', '2014-06-07', '2014-06-08', 'lkjblkjbj                    \r\n                ', 'bkjblkjb', '2', '.kjbljkb', '4000', '0', '2014-06-27 18:01:31', '0', 'job intern stipend '),
('1263962086', 'grayslab2', 'Company,Reaserch Organisation', 'intern at google', 'logo/1.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '632014', 'RUSSIA', 'YES', '2', '2014-06-19', '2014-06-20', '2014-06-21', '2014-06-22', '2014-06-28', ';ln;lkn;kln                    \r\n                ', ';lnk;lkn;lkn', '1', 'kjclkjb', '10000', '0', '2014-06-27 12:05:20', '0', 'company funded research'),
('1286500166', 'Shanus', 'Company', 'Network Admin', 'logo/1.jpg', 'amanpareek93@gmail.com', 'amanpareek93@gmail.com', 'Undergradlevel', 'india', '8787877', '-1', 'YES', '1', '2014-07-05', '2014-07-16', '2014-07-23', '2014-07-28', '2014-08-02', '                    \r\n                A good job for freshers', 'Much needed job', '1', 'www.shanus.com', '1000', '0', '2014-07-02 19:10:24', '4', 'network administration \r\njob with stipend'),
('1343640017', 'lio', 'Company', 'liomessi', 'logo/1.jpg', 'messi@gmail.com', 'messi@red.com', 'Gradlevel', 'india', '', '-1', 'YES', '3', '2014-06-05', '2014-06-06', '2014-06-07', '2014-06-09', '2014-06-10', 'mlmlmlm                    \r\n                ', 'mlmlmlml', '4', 'ml', 'expenses covered', '0', '2014-06-29 08:52:57', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `venue` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `event_date` date NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `any_url` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1206797207 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`user_id`, `type`, `event_name`, `venue`, `city`, `event_date`, `contact_person`, `any_url`, `name`, `keywords`) VALUES
(1063359410, 'workshops', 'kjfkjhfj', 'delhi', ';l;lk;lk', '2014-06-28', 'dudue', 'l;k;kn;kn', 'lkhjk', ''),
(1105795073, 'compititions', 'lkhkljj', 'delhi', 'lkjlkjnlkj', '2014-06-05', 'aman', 'noooo', 'kok', ''),
(1206797206, 'compititions', 'lol', ';kln;lkj;lkn;lkn', 'lknlkn', '2014-06-06', 'l;kn;lkn', 'kljkj', 'kl', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedid` int(11) NOT NULL AUTO_INCREMENT,
  `User_id_stu` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`feedid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE IF NOT EXISTS `internships` (
  `user_id` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `any_url` varchar(100) NOT NULL,
  `inter_bra` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`user_id`, `duration`, `type`, `location`, `any_url`, `inter_bra`, `name`, `keywords`) VALUES
('1042097779', '9', 'miscellaneus', 'nahar ka chota,bundi', '', 'cse', 'intern at grayslab', ''),
('1109749561', '34', 'engineering', 'sz', '', 'cse', 'sociial media', ''),
('1263962086', '2months', 'business_and_management', 'delhi', '', 'amkt', 'intern at google', ''),
('1286500166', '8 months', 'engineering', 'Dadar ,Mumbai', 'http://shanus.com', 'it', 'Network Admin', 'network administration \r\njob with stipend');

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneus`
--

CREATE TABLE IF NOT EXISTS `miscellaneus` (
  `user_id` varchar(100) NOT NULL,
  `misc_name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date _occ` date NOT NULL,
  `location` varchar(30) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miscellaneus`
--

INSERT INTO `miscellaneus` (`user_id`, `misc_name`, `type`, `date _occ`, `location`, `contact_person`, `url`, `description`, `name`, `keywords`) VALUES
('1068177378', 'lolo', 'science', '2014-06-12', 'kkjhlkjbljkbjbl', 'bljblijbkj', '.kjbkblk', 'bkjbkjbljb', 'lolo', ''),
('1198475261', 'ko', 'arts', '2014-06-04', 'l.khlkj', 'lknlk;n', '.lkhlkh', '.nlkn;lkn', 'ko', ''),
('1343640017', 'liomessi', 'science', '2014-06-27', 'delhi', 'ronaldo', 'no', 'knbsadkjb', 'liomessi', '');

-- --------------------------------------------------------

--
-- Table structure for table `organisers`
--

CREATE TABLE IF NOT EXISTS `organisers` (
  `activation` varchar(400) NOT NULL,
  `status` varchar(10) NOT NULL,
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `compname` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `points` int(5) NOT NULL DEFAULT '100',
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `organisers`
--

INSERT INTO `organisers` (`activation`, `status`, `org_id`, `name`, `email`, `password`, `compname`, `website`, `location`, `phone`, `points`) VALUES
('', '', 3, 'Deepanker Saxena', 'Deepanker2905@gmail.com', 'a', 'VIT University', 'a', 'India', '919486767007', 100),
('b4fee5a3e5b1aef668f26ee21401bf25', '1', 4, 'Aman pareek', 'amanpareek93@gmail.com', '5aca7ec4b01a14a826abf1a0fdaee1ad', '.na', 'grayslab', 'India', '919715003304', 90),
('0995ce828589496f3cec7dd1bb9aceac', '1', 5, 'tatti', 'tatti@gmail.com', '3cfd436919bc3107d68b912ee647f341', 'pop', 'pop', 'pop', '919715003304', 100),
('52f46fec7ac535e52c9dc6aa03d6a6cf', '1', 6, 'nan', 'nan@gmail.com', '488c428cd4a8d916deee7c1613c8b2fd', 'n', 'n', 'n', '919715003304', 100),
('b81e0fba2cf0cf1aa87d90ca851d5a1d', '1', 8, 'lio', 'messi@gmail.com', '1fdda3f0c5555b8b3057369ba3c58215', 'messi', 'www.liomessi.com', 'argentina', '8898978665', 90),
('6ed76a560ef4588cb25d52f5a5a994bc', '1', 9, 'anil', 'anil@gmail.com', '7bb083eda01aa4ba8e0235d56a2d5102', 'anil.co', 'ani.com', 'mumbai', '919715003304', 90);

-- --------------------------------------------------------

--
-- Table structure for table `sponsered_programs`
--

CREATE TABLE IF NOT EXISTS `sponsered_programs` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(200) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1035965820 ;

--
-- Dumping data for table `sponsered_programs`
--

INSERT INTO `sponsered_programs` (`user_id`, `url`, `type`, `venue`, `date`, `name`, `keywords`) VALUES
(1035965819, 'http://www.google.com', 'scholarship', 'delhi', '2014-06-20', 'brazuka', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_id_stu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `college` varchar(50) NOT NULL,
  `points` int(5) NOT NULL DEFAULT '100',
  `status` varchar(10) NOT NULL,
  `activation` varchar(500) NOT NULL,
  PRIMARY KEY (`User_id_stu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id_stu`, `name`, `email`, `pass`, `location`, `phone`, `college`, `points`, `status`, `activation`) VALUES
(1, 'Deepanker Saxena', 'Deepanker2905@gmail.com', 'aa', 'India', '919486767007', 'VIT University', 100, '', ''),
(2, 'Aman pareek', 'amanpareek93@gmail.com', 'af85d512594fc84a5c65ec9970956ea5', 'India', '919715003304', '.na', 100, '0', '094df24532270e4a0e3688c88ae2c701'),
(3, 'hari', 'hari@gmail.com', '69f107bb0584c1a3d88d98674cfef8cd', 'delhi', '909090000', 'oihhlk', 100, '0', 'f68a63253d108f7b1b91820bb8882e08'),
(4, 'ganesh', 'gaesh@gmail.com', '', 'pop', '98988989', 'pop', 80, '0', '3f00160609eb7d215a30cf0dba920be3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
