-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2024 at 08:08 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_showtime`
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
(1, 'Akhil Mohanan', 'akhilmohanan417@gmail.com', '2255');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_band`
--

CREATE TABLE `tbl_band` (
  `band_id` int(11) NOT NULL auto_increment,
  `band_name` varchar(50) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `band_address` varchar(50) NOT NULL,
  `place_id` varchar(50) NOT NULL,
  `band_contact` varchar(20) NOT NULL,
  `band_email` varchar(50) NOT NULL,
  `band_password` varchar(50) NOT NULL,
  `band_photo` varchar(50) NOT NULL,
  `band_vstatus` varchar(50) NOT NULL default '0',
  `band_owner` varchar(50) NOT NULL,
  `band_vimage` varchar(50) NOT NULL,
  PRIMARY KEY  (`band_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_band`
--

INSERT INTO `tbl_band` (`band_id`, `band_name`, `category_id`, `band_address`, `place_id`, `band_contact`, `band_email`, `band_password`, `band_photo`, `band_vstatus`, `band_owner`, `band_vimage`) VALUES
(24, 'Vedan', '11', 'Sundharabhavanam(H),kochi,kerala', '46', '9209299922', 'vedan@gmail.com', '2255', 'fa.jpg', '1', 'Hirandas Murali', 'a1.jpg'),
(25, 'KochiKaatt', '10', 'Sundharabhavanam(H),kochi,kerala', '15', '9209299922', 'hiran@gmail.com', '2255', 'a88.jpg', '1', 'Hirandas Murali', ''),
(26, 'RahmanGang', '11', 'valiyaveettil', '21', '9876545678', '3@gmail.com', '2255', 'b2.jpg', '0', '3', ''),
(27, 'RahmanGang', '10', 'valiyaveettil', '25', '9876545678', 'arrahman@gmail.com', '2255', 'a3.jpg', '2', '3', ''),
(28, 'RahmanGang', '12', 'valiyaveettil', '20', '9876545670', 'rahman@gmail.com', '2255', 'a6.jpg', '1', '3', 'a6.jpg'),
(29, 'RahmanGang', '10', 'valiyaveettil', '16', '9876545670', 'r@gmail.com', '2255', 'a77.jpg', '2', '3', 'a77.jpg'),
(30, 'adithyan', '10', 'valiyaveettil', '14', '9898905066', 'a@gmail.com', '2255', 'a77.jpg', '0', 'amal', ''),
(31, 'Lolan', '12', 'valiyaveettil', '33', '9898905066', 'l@gmail.com', '2255', 'b3.jpg', '0', 'amal', 'a6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL auto_increment,
  `user_id` int(50) NOT NULL,
  `band_id` int(50) NOT NULL,
  `eventtype_id` int(50) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `booking_time` varchar(50) NOT NULL,
  `booking_fordate` varchar(50) NOT NULL,
  `booking_payment` varchar(50) NOT NULL,
  `booking_status` int(50) NOT NULL default '0',
  `booking_venue` varchar(50) NOT NULL,
  `place_id` int(50) NOT NULL,
  `booking_details` varchar(50) NOT NULL,
  `payment_status` int(50) NOT NULL default '0',
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `user_id`, `band_id`, `eventtype_id`, `booking_date`, `booking_time`, `booking_fordate`, `booking_payment`, `booking_status`, `booking_venue`, `place_id`, `booking_details`, `payment_status`) VALUES
(8, 5, 17, 10, '2023-10-19', '10:00', '2023-11-01', '', 2, 'Nirmala College Muvattupuzha', 16, 'Friends Re-Union.', 0),
(9, 5, 17, 8, '2023-10-21', '16:38', '2023-09-30', '', 1, 'KOCHI KERALA', 15, 'fdgy', 0),
(10, 6, 18, 8, '2023-10-29', '18:00', '2023-10-31', '', 2, 'New man collwge Thodupuzha , One way junction', 28, 'Anniversary', 0),
(11, 6, 18, 8, '2023-10-29', '16:15', '2023-10-31', '', 1, 'New man college Thodupuzha', 28, 'Anniversary', 0),
(12, 7, 17, 8, '2023-10-29', '22:28', '2023-10-11', '', 1, 'PURAVATHU(H)', 16, 'mmm', 0),
(13, 7, 19, 10, '2023-10-30', '20:58', '2023-11-04', '', 0, 'VedanVilla(H),kochi', 28, 'sharp', 0),
(14, 7, 23, 7, '2024-01-05', '07:00', '2024-01-13', '', 1, 'Sundharabhavanam(H),kochi,kerala', 15, 'stage and refreshments are set,no worries', 0),
(15, 7, 23, 7, '2024-01-05', '15:04', '2024-01-12', '', 1, 'PURAVATHU(H)', 63, 'werty', 0),
(16, 7, 24, 6, '2024-01-11', '11:11', '2024-01-18', '', 1, 'Sundharabhavanam(H),kochi,kerala', 14, 'come at sharp time', 0),
(17, 7, 25, 6, '2024-01-11', '10:00', '2024-01-18', '', 1, 'Sundharabhavanam(H),kochi,kerala', 15, 'come at', 0),
(18, 7, 25, 6, '2024-01-11', '09:00', '2024-01-01', '', 0, 'PURAVATHU(H)', 14, 'mqhvhq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(10, 'Classical'),
(11, 'Hiphop'),
(12, 'Lofi'),
(13, 'Devotional'),
(14, 'DJ'),
(16, 'K-pop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_details` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_status` int(50) NOT NULL default '0',
  `complaint_reply` varchar(50) NOT NULL,
  `band_id` int(11) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_details`, `user_id`, `complaint_status`, `complaint_reply`, `band_id`) VALUES
(18, 'Lofi event', 'Some Instruments issue', 5, 1, 'fyyu', 0),
(19, 'Annual', 'Some technical issues', 6, 1, 'sryy', 0),
(20, 'Network', 'network error', 0, 0, '', 0),
(22, '1', '1122', 0, 0, '', 0),
(23, '1', '11111111', 0, 0, '', 0),
(24, 'not ok', 'bad pgm', 7, 1, 'ok', 0),
(25, '1', 'programs are average', 7, 1, 'soory for your inconvenience . we will try to impr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crew`
--

CREATE TABLE `tbl_crew` (
  `band_id` int(11) NOT NULL,
  `crew_id` int(11) NOT NULL auto_increment,
  `crew_name` varchar(50) NOT NULL,
  `crew_contact` varchar(50) NOT NULL,
  `crew_gender` varchar(50) NOT NULL,
  `crew_address` varchar(50) NOT NULL,
  `place_id` varchar(50) NOT NULL,
  `crew_photo` varchar(50) NOT NULL,
  PRIMARY KEY  (`crew_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_crew`
--

INSERT INTO `tbl_crew` (`band_id`, `crew_id`, `crew_name`, `crew_contact`, `crew_gender`, `crew_address`, `place_id`, `crew_photo`) VALUES
(17, 8, 'Govind Vasantha', '9024578645', 'male', 'Irinjalakuda (H)', '46', 'image_search_1697658631804.jpg'),
(18, 10, 'Harishankar', '9845765141', 'male', 'Thrivandram', '39', 'photo_3_2023-10-29_15-56-19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL auto_increment,
  `district_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(34, 'Ernakulam'),
(36, 'Alappuzha'),
(37, 'Kottayam'),
(38, 'Idukki'),
(39, 'Palakkad'),
(40, 'Wayanad'),
(41, 'Thiruvananthapuram'),
(42, 'Thrissur'),
(43, 'Pathanamthitta'),
(44, 'Malappuram'),
(45, 'Kasargod'),
(46, 'Kannur'),
(48, 'Kozhikode'),
(49, 'Kollam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventtype`
--

CREATE TABLE `tbl_eventtype` (
  `event_id` int(11) NOT NULL auto_increment,
  `event_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_eventtype`
--

INSERT INTO `tbl_eventtype` (`event_id`, `event_name`) VALUES
(6, 'Wedding'),
(7, 'Birthday'),
(8, 'Anniversary'),
(9, 'Festival'),
(11, 'Re-union');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL auto_increment,
  `feedback_title` varchar(50) NOT NULL,
  `feedback_details` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_title`, `feedback_details`, `user_id`) VALUES
(1, 'Music show', 'Good program', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL auto_increment,
  `gallery_file` varchar(500) NOT NULL,
  `band_id` int(11) NOT NULL,
  PRIMARY KEY  (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_file`, `band_id`) VALUES
(2, 'image_search_1697616825190.jpg', 17),
(3, 'photo_2_2023-10-29_15-56-19.jpg', 18),
(4, 'photo_1_2023-10-29_15-56-19.jpg', 18),
(7, '8d0100fc253e05598f1dd552e60154aa.jpg', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruments`
--

CREATE TABLE `tbl_instruments` (
  `instruments_id` int(11) NOT NULL auto_increment,
  `instruments_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`instruments_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_instruments`
--

INSERT INTO `tbl_instruments` (`instruments_id`, `instruments_name`, `category_id`) VALUES
(9, 'Thabala + Veena + Vocals', 10),
(10, 'Flute + Veena + Thabala', 10),
(12, 'Flute + Veena + Vocals', 12),
(13, 'Thabala + Veena + Vocals', 13),
(14, 'Flute + Veena + Thabala', 13),
(16, 'Guitar + Keyboard +Flute + Drum + Vocals', 15),
(17, 'Guitar + Keyboard + Drum + Vocals', 10),
(18, 'Guitar + Keyboard + Drum + Vocals', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL auto_increment,
  `notification_date` varchar(50) NOT NULL,
  `notification_file` varchar(50) NOT NULL,
  `notification_photo` varchar(50) NOT NULL,
  `notification_title` varchar(50) NOT NULL,
  `notification_details` varchar(300) NOT NULL,
  PRIMARY KEY  (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification_date`, `notification_file`, `notification_photo`, `notification_title`, `notification_details`) VALUES
(15, '2023-10-29', 'image_search_1697654829273.jpg', 'image_search_1697617340812.jpg', 'noti', 'ghdrtut'),
(16, '2024-01-05', '102930AB-68AD-4013-9C4F-5788E2B73135.JPG', 'a11.jpg', 'Free Event', 'There will be an entry free event tomorrrow');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(50) NOT NULL,
  `district_id` varchar(50) NOT NULL,
  PRIMARY KEY  (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(14, 'Vytila', '34'),
(15, 'Kochi', '34'),
(16, 'Muvattupuzha', '34'),
(17, 'Perumbavoor', '34'),
(18, 'Kakkanad', '34'),
(19, 'Aluva', '34'),
(20, 'Cherthala', '36'),
(21, 'Alappuzha', '36'),
(22, 'Ernakulam', '34'),
(23, 'Kuttanad', '36'),
(24, 'Kottayam', '37'),
(25, 'Pala', '37'),
(26, 'Erattupetta', '37'),
(27, 'Vaikom', '37'),
(28, 'Thodupuzha', '38'),
(29, 'Cheruthoni', '38'),
(30, 'Kattappana', '38'),
(31, 'Adimaly', '38'),
(32, 'Ottapalam', '39'),
(33, 'Palakkad', '39'),
(34, 'Alathur', '39'),
(35, 'Pattambi', '39'),
(36, 'Kalpetta', '40'),
(37, 'Mananthavady', '40'),
(38, 'Sulthan Bathery', '40'),
(39, 'Thiruvananthapuram', '41'),
(40, 'Varkala', '41'),
(41, 'Neyyattinkara', '41'),
(42, 'Attingal', '41'),
(43, 'Nedumangad', '41'),
(44, 'Guruvayur', '42'),
(45, 'Chalakkudy', '42'),
(46, 'Irinjalakuda', '42'),
(47, 'Kodugallur', '42'),
(48, 'Chavakkad', '42'),
(49, 'Pathanamthitta', '43'),
(50, 'Thiruvalla', '43'),
(51, 'Adoor', '43'),
(52, 'Ranni', '43'),
(53, 'Thiroor', '44'),
(54, 'Ponnani', '44'),
(55, 'Chelambra', '44'),
(56, 'Nileshwaram', '45'),
(57, 'Cheruvathur', '45'),
(58, 'Uppala', '45'),
(59, 'Kannur', '46'),
(60, 'Payyannur', '46'),
(61, 'Iritty', '46'),
(62, 'Kozhikode', '48'),
(63, 'Beypore', '48'),
(64, 'Vatakara', '48'),
(65, 'Koyilandi', '48'),
(66, 'Piravom', '34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(500) NOT NULL,
  `user_rating` varchar(500) NOT NULL,
  `user_review` varchar(5000) NOT NULL,
  `review_datetime` varchar(500) NOT NULL,
  `band_id` int(11) NOT NULL,
  PRIMARY KEY  (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `review_datetime`, `band_id`) VALUES
(1, 'Good', '3', 'Good Works', '2023-10-29 12:46:20', 17),
(2, 'Good', '5', 'Good', '2023-10-29 16:18:10', 18),
(3, 'Lolan', '4', 'Average show', '2024-01-05 15:04:05', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_vstatus` varchar(50) NOT NULL default '0',
  `user_contact` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_image` varchar(300) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_vstatus`, `user_contact`, `user_address`, `place_id`, `user_image`) VALUES
(5, 'Abhimanue', 'abhimanuepb7@gmail.com', 'abd156', '0', '9061814024', 'Parathazhathu', 16, '1650737882313.jpg'),
(6, 'Devananda S', 'devanandas144@gmail.com', '654321', '0', '8547802408', 'Thamarasseriyil', 16, '1649875381775.jpg'),
(7, 'Akhil M', 'lolan@gmail.com', '2255', '0', '9207795602', 'valiyaveettil', 17, '20230623060408_IMG_0127.JPG'),
(14, 'Eldees', 'eldeess@gmail.com', '123', '0', '9209299922', 'ss', 57, 'surrenderflag.jpg'),
(15, 'RADHA BABU', 'radha@gmail.com', 'Radha@123', '0', '9400079706', 'PURAVATHU(H)', 17, 'b4.jpg'),
(20, 'AMAL MOHANAN', 'amal@gmail.com', 'Amal@1234', '0', '8943338281', 'Pulimoottil (H), methala p.o, Methala', 52, 'a88.jpg');
