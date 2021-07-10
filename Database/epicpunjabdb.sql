-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 07:18 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epicpunjabdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Admin', '$2y$10$5gv5Hq9HsFk0f5iHntPjQOB2tZRDFMQRoxzp2MLKsYSoZKBHNoBvu');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL,
  `blogger_name` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `blog` varchar(5000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `uploaded_by`, `blogger_name`, `title`, `blog`, `timestamp`) VALUES
(2, 'Admin', 'Admin', 'Jodha Bai', 'Jodha Bai was the wife of Emperor Akbar. She was Hindu and Emperor Akbar allowed her to stay Hindu after marriage. Emperor Akbar not forced her to be converted.', '2019-05-14 13:53:49'),
(3, 'Admin', 'Admin', 'Todar Mal', 'Todar Mal was very Honest Person. He was an accountant and worked for Emperor Akbar. He was one who helped Akbar to solve the tax issues and the results was very effective.', '2019-05-14 13:53:49'),
(4, 'idnavi03', 'Navjeet Singh', 'King Akbar', 'The real name of king akbar was Jalal-ul-din Mohammad.', '2019-05-14 13:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_type` varchar(100) NOT NULL,
  `c_products` varchar(255) DEFAULT NULL,
  `c_mail` varchar(100) NOT NULL,
  `c_contact` varchar(15) NOT NULL,
  `c_website` varchar(100) NOT NULL,
  `c_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`c_id`, `c_name`, `c_address`, `c_type`, `c_products`, `c_mail`, `c_contact`, `c_website`, `c_desc`) VALUES
(1, 'Nav Bharat Castings', 'Opp Civil Hospital, Railway Road, Maler Kotla', 'Machinery', 'Machinery-rolls for steel rolling mills', 'navbharat@gmail.com', '2455970', 'www.navbharat.com', 'Machinery-rolls for steel rolling mills');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_location` varchar(50) NOT NULL,
  `e_regwith` varchar(50) DEFAULT NULL,
  `e_type` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `e_contact` varchar(13) NOT NULL,
  `courses` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`e_id`, `e_name`, `e_location`, `e_regwith`, `e_type`, `e_mail`, `e_contact`, `courses`) VALUES
(1, 'Apex International Sr. Sec. Public School', 'Nakodar', 'CBSE', 'School', 'apexinternational@gmail.com', '01821-240740', NULL),
(2, 'State Public School', 'Nakodar', 'CBSE', 'School', 'stateschool@yahoo.com', '01821-240115', NULL),
(3, 'KPS Bal Bharti Public School', 'Uggi', 'PBSE', 'School', 'kpsschool@hotmail.com', '01821-241563', NULL),
(5, 'CT Group of Institute', 'Shahpur', 'PTU , GNDU', 'College', 'ctgroup@gmail.com', '0181-240114', NULL),
(7, 'Indo Swiss Inernational School', 'Nakodar', 'ICICI', 'School', 'indoswiss01@live.com', '01821-240110', NULL),
(9, 'Somanand Educational Society', 'Baba Muraad Shah Road, Nakodar', 'ISO Certified', 'Centres', 'snecnakodar@gmail.com', '01821-240115', 'php,asp.net,tally,javascript,html,css,spoken english'),
(12, 'CT University', 'Ludhiana', NULL, 'University', 'ctuniversity@gmail.com', '01831-210230', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `name`, `description`, `timestamp`) VALUES
(16, '2019-05-27', 'Gurgaddi Gurpurab Sri Guru Harigobind ji', 'Gurgaddi Gurpurab Sri Guru Harigobind ji', '2019-05-05 12:06:39'),
(17, '2019-05-18', 'Puranmashi', 'In India, Puranmashi is the period of the full moon.', '2019-05-05 12:25:10'),
(18, '2019-08-22', 'PARKAASH SRI GURU GRANTH SAHIB JI', 'First Parkaash Sri Guru Granth Sahib Ji', '2019-05-07 15:36:54'),
(19, '2019-01-05', 'Guru Gobind Singh Birthday', 'Birthday of Sikh\'s 10th guru', '2019-05-13 15:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL,
  `g_image` varchar(1000) NOT NULL,
  `g_thumbnail` varchar(255) NOT NULL,
  `g_title` varchar(255) DEFAULT NULL,
  `g_by` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_image`, `g_thumbnail`, `g_title`, `g_by`, `timestamp`) VALUES
(7, 'Uploads/Gallery/Orignials/Chamkaursahib3.jpg', 'Uploads/Gallery/Thumbnails/Chamkaursahib3.jpg', 'Chamkaur Sahib', 'Admin', '2019-05-07 15:46:20'),
(8, 'Uploads/Gallery/Orignals/bhagat-singh-4a.jpg', 'Uploads/Gallery/Thumbnails/bhagat-singh-4a.jpg', 'Bhagat Singh', 'Admin', '2019-05-07 15:46:20'),
(9, 'Uploads/Gallery/Originals/Golden-Temple-Desktop-Wallpapers-Download.jpg', 'Uploads/Gallery/Thumbnails/Golden-Temple-Desktop-Wallpapers-Download.jpg', 'Golden Temple', 'Admin', '2019-05-07 15:46:20'),
(10, 'Uploads/Gallery/Originals/AzesIIFineCoin.jpg', 'Uploads/Gallery/Thumbnails/AzesIIFineCoin.jpg', 'Coin', 'Admin', '2019-05-07 15:46:20'),
(11, 'Uploads/Gallery/Originals/Taxila1.jpg', 'Uploads/Gallery/Thumbnails/Taxila1.jpg', 'Taxila', 'Admin', '2019-05-07 15:46:20'),
(12, 'Uploads/Gallery/Originals/Pope1880Panjab3.jpg', 'Uploads/Gallery/Thumbnails/Pope1880Panjab3.jpg', 'Old Punjab Map', 'Admin', '2019-05-07 15:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(50) NOT NULL,
  `h_address` varchar(50) NOT NULL,
  `h_special` varchar(255) NOT NULL,
  `h_mail` varchar(50) DEFAULT NULL,
  `h_contact` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`h_id`, `h_name`, `h_address`, `h_special`, `h_mail`, `h_contact`) VALUES
(2, 'Shanti Hospital', 'Wadal Chawk Jalandhar', 'Surgery', 'shantihospital09@gmail.com', '01821-242122');

-- --------------------------------------------------------

--
-- Table structure for table `kc`
--

CREATE TABLE `kc` (
  `d_id` int(11) NOT NULL,
  `d_tp` varchar(50) DEFAULT NULL,
  `d_name` varchar(100) NOT NULL,
  `d_by` varchar(100) DEFAULT NULL,
  `d_place` varchar(255) DEFAULT NULL,
  `d_describe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kc`
--

INSERT INTO `kc` (`d_id`, `d_tp`, `d_name`, `d_by`, `d_place`, `d_describe`) VALUES
(2, '11th Century', 'Calico', '', 'Subcontinent', 'Calico Fabric Prints done in lotus design');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(111) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `name`, `message`, `timestamp`) VALUES
(1, 'idnavi03@gmail.com', 'Navjeet Singh', 'Please add some more features', '2019-05-08 14:16:31'),
(2, 'idnavi03@gmail.com', 'Navjeet Singh', 'Please Add levels to quiz', '2019-05-08 14:16:31'),
(5, 'mschallenger38@gmail.com', 'Max Challenger', 'This design is far more better than the previous design.', '2019-05-11 12:43:32'),
(8, 'mschallenger38@gmail.com', 'Max Challenger', 'Please remove authentication from some pages to guest users.', '2019-05-11 12:47:38'),
(9, 'idnavi03@gmail.com', 'Navjeet Singh', 'Make Some Changes in the quiz section.', '2019-05-13 06:39:51'),
(10, 'Khalasjatt@gmail.com', 'Khalsa Jatt', 'What new features will we get in the future ?', '2019-05-13 15:22:42'),
(11, 'idnavi04@gmail.com', 'Navi Singh', 'Its really good to know upcoming features as well. This kind of things we were needed.', '2019-05-13 17:08:31'),
(12, 'rajit.kumar@gmail.com', 'Rajit Kumar', 'Well, It is fantastic.', '2019-05-14 13:40:58'),
(13, 'idnavi03@gmail.com', 'Navjeet Singh', 'I love this hybrid application.', '2019-05-15 05:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `newsmedia`
--

CREATE TABLE `newsmedia` (
  `nm_id` int(11) NOT NULL,
  `nm_name` varchar(100) NOT NULL,
  `nm_address` varchar(255) NOT NULL,
  `nm_type` varchar(10) NOT NULL,
  `nm_services` varchar(255) DEFAULT NULL,
  `nm_mail` varchar(100) NOT NULL,
  `nm_contact` varchar(15) NOT NULL,
  `nm_website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsmedia`
--

INSERT INTO `newsmedia` (`nm_id`, `nm_name`, `nm_address`, `nm_type`, `nm_services`, `nm_mail`, `nm_contact`, `nm_website`) VALUES
(1, 'MH ONE', 'New Delhi', 'Channel', 'News , Entertainment', 'mhone@gmail.com', '3265458945', 'www.mhone.com'),
(4, 'Ajit', 'Jalandhar', 'Newspaper', 'News, Advertisement', 'ajit@ajitjalandhar.com', '2455963', 'www.ajitjalandhar.com');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_location` varchar(255) NOT NULL,
  `p_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`p_id`, `p_name`, `p_location`, `p_type`) VALUES
(1, 'Golden Temple', 'Amritsar', 'Place Of God');

-- --------------------------------------------------------

--
-- Table structure for table `travelagents`
--

CREATE TABLE `travelagents` (
  `ta_id` int(11) NOT NULL,
  `ta_name` varchar(100) NOT NULL,
  `ta_address` varchar(255) NOT NULL,
  `ta_mail` varchar(100) NOT NULL,
  `ta_contact` varchar(15) NOT NULL,
  `ta_website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travelagents`
--

INSERT INTO `travelagents` (`ta_id`, `ta_name`, `ta_address`, `ta_mail`, `ta_contact`, `ta_website`) VALUES
(2, 'Punjab Tours and Travels', 'Sector 22-B, Near HDFC Bank, Chandigarh', 'pbtravels07@yahoo.co.in', '98143 20197', 'www.punjabtravelsindia.com');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `profilepic` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question1` varchar(50) NOT NULL,
  `ans1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`email`, `password`, `name`, `mobile`, `profilepic`, `thumbnail`, `regdate`, `question1`, `ans1`) VALUES
('happy@gmail.com', 'happy1234', 'Harpreet Singh', '+919977886655', NULL, NULL, '2019-05-04 18:30:00', 'q1', 'Bagga'),
('idnavi03@gmail.com', 'navisaab', 'Navjeet Singh', '+919878987867', 'Uploads/User/Original/cd9830fa9b4202a4f5b646cf38eed56b.jpg', 'Uploads/User/Thumbnails/cd9830fa9b4202a4f5b646cf38eed56b.jpg', '2019-04-17 18:30:00', 'q1', 'Sheru'),
('mschallenger38@gmail.com', '$2y$10$RMYfFNGAW4Gv7uIYihoEzOukIi3wZ61qub8PpAovXlT9Hh29O3Zhm', 'Max Challenger', '+919878987862', 'Uploads/User/Original/11220081_908830732545279_3086318213650328231_n.jpg', 'Uploads/User/Thumbnails/11220081_908830732545279_3086318213650328231_n.jpg', '2019-04-17 18:30:00', 'q1', 'Shera'),
('mschallenger39@gmail.com', 'montysingh', 'Max Brendon', '+998877665544', NULL, NULL, '2019-05-07 18:30:00', 'q1', 'Rocky');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `kc`
--
ALTER TABLE `kc`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsmedia`
--
ALTER TABLE `newsmedia`
  ADD PRIMARY KEY (`nm_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `travelagents`
--
ALTER TABLE `travelagents`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kc`
--
ALTER TABLE `kc`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsmedia`
--
ALTER TABLE `newsmedia`
  MODIFY `nm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `travelagents`
--
ALTER TABLE `travelagents`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
