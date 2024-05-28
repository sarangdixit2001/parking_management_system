-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 05:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Admin_Name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Admin_Password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Admin_Name`, `Admin_Password`) VALUES
('Ashish', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cbs_slot`
--

CREATE TABLE `cbs_slot` (
  `slot_number` int(20) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbs_slot`
--

INSERT INTO `cbs_slot` (`slot_number`, `Status`) VALUES
(1, 'BOOKED'),
(2, 'BOOKED'),
(3, 'BOOKED'),
(4, 'BOOKED'),
(5, 'BOOKED'),
(6, 'Available'),
(7, 'Available'),
(8, 'Available'),
(9, 'Available'),
(10, 'Available'),
(11, 'Available'),
(12, 'Available'),
(13, 'Available'),
(14, 'Available'),
(15, 'Available'),
(16, 'Available'),
(17, 'Available'),
(18, 'Available'),
(19, 'Available'),
(20, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `cbs_slot_bookings`
--

CREATE TABLE `cbs_slot_bookings` (
  `Booking_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phnumber` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `hour` int(255) NOT NULL,
  `check_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbs_slot_bookings`
--

INSERT INTO `cbs_slot_bookings` (`Booking_ID`, `name`, `email`, `phnumber`, `location`, `date`, `start_time`, `vehicle`, `hour`, `check_time`) VALUES
(103, 'userI', 'user1@gmail.com', '9460546546', 'CBS', '2022-05-23', '06:00:00', 'MH 72 FH 6671', 6, '2022-05-20 19:22:16'),
(104, 'userII', 'user2@gmail.com', '8923478623', 'CBS', '2022-05-27', '06:00:00', 'MH 19 UY 3744', 3, '2022-05-20 19:24:43'),
(105, 'userIII', 'user3@gmail.com', '7834657863', 'CBS', '2022-05-30', '09:00:00', 'MH 98 AS 2365', 6, '2022-05-20 19:28:50'),
(106, 'userIII', 'user3@gmail.com', '7834657863', 'CBS', '2022-05-31', '10:12:00', 'MH 73 JJ 3489', 4, '2022-05-20 19:29:25'),
(107, 'userIV', 'user4@gmail.com', '7875623465', 'CBS', '2022-05-28', '11:04:00', 'MH 35 DF 4523', 5, '2022-05-20 19:32:22'),
(108, 'userV', 'user5@gmail.com', '8273846823', 'CBS', '2022-05-28', '06:10:00', 'MH 34 CN 9567', 5, '2022-05-20 19:35:53'),
(109, 'byk', 'byk@gmail.com', '8454367677', 'CBS', '2022-05-24', '14:00:00', 'MH 34 SD 5346', 4, '2022-05-23 04:49:57'),
(110, 'byk', 'byk@gmail.com', '8454367677', 'CBS', '2022-05-24', '04:24:00', 'MH 45 SD 3545', 5, '2022-05-23 04:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `college_slot`
--

CREATE TABLE `college_slot` (
  `slot_number` int(20) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_slot`
--

INSERT INTO `college_slot` (`slot_number`, `Status`) VALUES
(1, 'BOOKED'),
(2, 'BOOKED'),
(3, 'BOOKED'),
(4, 'BOOKED'),
(5, 'Available'),
(6, 'BOOKED'),
(7, 'BOOKED'),
(8, 'Available'),
(9, 'Available'),
(10, 'Available'),
(11, 'Available'),
(12, 'Available'),
(13, 'Available'),
(14, 'Available'),
(15, 'Available'),
(16, 'Available'),
(17, 'Available'),
(18, 'Available'),
(19, 'Available'),
(20, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `college_slot_bookings`
--

CREATE TABLE `college_slot_bookings` (
  `Booking_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phnumber` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `hour` int(255) NOT NULL,
  `check_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_slot_bookings`
--

INSERT INTO `college_slot_bookings` (`Booking_ID`, `name`, `email`, `phnumber`, `location`, `date`, `start_time`, `vehicle`, `hour`, `check_time`) VALUES
(109, 'userI', 'user1@gmail.com', '9460546546', 'College Road', '2022-05-23', '09:00:00', 'MH 15 AA 4438', 4, '2022-05-20 18:38:17'),
(110, 'userII', 'user2@gmail.com', '8923478623', 'College Road', '2022-05-23', '05:00:00', 'MH 15 SF 5675', 5, '2022-05-20 19:24:15'),
(111, 'userIII', 'user3@gmail.com', '7834657863', 'College Road', '2022-05-26', '06:03:00', 'MH 34 HG 1923', 4, '2022-05-20 19:28:12'),
(112, 'userIV', 'user4@gmail.com', '7875623465', 'College Road', '2022-05-24', '07:07:00', 'MH 34 DF 7846', 4, '2022-05-20 19:31:47'),
(113, 'userV', 'user5@gmail.com', '8273846823', 'College Road', '2022-05-29', '23:17:00', 'MH 12 GJ 3478', 2, '2022-05-20 19:35:28'),
(115, 'userI', 'user1@gmail.com', '9460546546', 'College Road', '2022-05-28', '04:16:00', 'MH 27 SD 8387', 5, '2022-05-23 05:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `date_time`) VALUES
(34, 'userI', 'user1@gmail.com', '9460546546', 'nice service', 'GOOD PARKING SPACE\r\n', '2022-05-20 19:23:38'),
(35, 'userII', 'user2@gmail.com', '8923478623', 'KNOW ABOUT CAREERS ', 'looking for job opportunities ', '2022-05-20 19:27:22'),
(36, 'userIII', 'user3@gmail.com', '7834657863', 'IS YOUR SERVICE AVALIABLE FOR 24*7', 'THANK YOU\r\n', '2022-05-20 19:30:26'),
(37, 'userIV', 'user4@gmail.com', '7875623465', 'CHARGING POINT', 'DO YOU PROVIDE CHARGING STATION\r\n', '2022-05-20 19:31:21'),
(38, 'userV', 'user5@gmail.com', '8273846823', 'more slots needed', 'please ad more slot to your parking space', '2022-05-20 19:34:46'),
(40, 'userI', 'user1@gmail.com', '9460546546', 'nice', 'tq', '2022-05-23 05:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `nashik_rd_slot`
--

CREATE TABLE `nashik_rd_slot` (
  `slot_number` int(20) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nashik_rd_slot`
--

INSERT INTO `nashik_rd_slot` (`slot_number`, `Status`) VALUES
(1, 'BOOKED'),
(2, 'BOOKED'),
(3, 'BOOKED'),
(4, 'BOOKED'),
(5, 'BOOKED'),
(6, 'Available'),
(7, 'Available'),
(8, 'Available'),
(9, 'Available'),
(10, 'Available'),
(11, 'Available'),
(12, 'Available'),
(13, 'Available'),
(14, 'Available'),
(15, 'Available'),
(16, 'Available'),
(17, 'Available'),
(18, 'Available'),
(19, 'Available'),
(20, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `nashik_rd_slot_bookings`
--

CREATE TABLE `nashik_rd_slot_bookings` (
  `Booking_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phnumber` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `hour` int(255) NOT NULL,
  `check_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nashik_rd_slot_bookings`
--

INSERT INTO `nashik_rd_slot_bookings` (`Booking_ID`, `name`, `email`, `phnumber`, `location`, `date`, `start_time`, `vehicle`, `hour`, `check_time`) VALUES
(103, 'userI', 'user1@gmail.com', '9460546546', 'Nashik Road', '2022-05-24', '09:15:00', 'MH 23 HJ 2342', 5, '2022-05-20 19:22:57'),
(104, 'userII', 'user2@gmail.com', '8923478623', 'Nashik Road', '2022-05-29', '04:00:00', 'MH 67 SD 5678', 3, '2022-05-20 19:26:32'),
(105, 'userIII', 'user3@gmail.com', '7834657863', 'Nashik Road', '2022-05-29', '04:03:00', 'MH 93 AD 8734', 4, '2022-05-20 19:29:46'),
(106, 'userIV', 'user4@gmail.com', '7875623465', 'Nashik Road', '2022-05-29', '07:08:00', 'MH 37 SF 5234', 4, '2022-05-20 19:33:06'),
(107, 'userV', 'user5@gmail.com', '8273846823', 'Nashik Road', '2022-05-29', '07:06:00', 'MH 34 IJ 2348', 4, '2022-05-20 19:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phnumber` varchar(255) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`ID`, `name`, `username`, `email`, `phnumber`, `register_time`, `password`, `cpassword`) VALUES
(23, 'userI', 'user_1', 'user1@gmail.com', '9460546546', '2022-05-20 18:28:00', '$2y$10$LAa/SM.liwMhiw7uWb74VeenUswe7WBu9VRuZRXVE0N0eLv049LXO', '$2y$10$c4sXHThuf5.qYkv08M59ieoDqOyf609kqzeZiU7YZ8D9E12OlLN/S'),
(24, 'userII', 'user2', 'user2@gmail.com', '8923478623', '2022-05-20 18:28:32', '$2y$10$fU9PUkZJj/jgS7KP31eYLuj/DLFp2lIEzF7bJodRaqEYKANjbYjQu', '$2y$10$lsnzGbPMyFfXWgkQvRbeM.YDTkIj2c.WmCPB0ARrjMuRll8GoTBuW'),
(25, 'userIII', 'user_3', 'user3@gmail.com', '7834657863', '2022-05-20 18:28:59', '$2y$10$6MW6HGdAIiky9p4u87epg.W7Yg1TL4DYz7hWruIDqah1Hgsadga2m', '$2y$10$r/mrgi8naI8dsyKOfUjIGOu7EEU8UXLc5codUKtZItSS52Bv19./2'),
(26, 'userIV', 'user_4', 'user4@gmail.com', '7875623465', '2022-05-20 18:29:33', '$2y$10$tUq4GCG0Fq3.gcCj8lDZB.6DNrLeK2IkNGxMkRF5Ff28PjtoQa0zW', '$2y$10$UX8hrxckh/eKeTiEyh..u.C4aSoxynQRzRQri8hgYVDhUsGhLjclK'),
(27, 'userV', 'user_5', 'user5@gmail.com', '8273846823', '2022-05-20 18:30:04', '$2y$10$1pLG33Olxn88OcLRTH4rqeqhdwHrZA9iz3mKlu2r89XylTm7t/RS2', '$2y$10$fDViZIMgl4GVBMri0nqK7u.Cvao0rv0WlFLm/ecUi5l5fRQyT/dcG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbs_slot_bookings`
--
ALTER TABLE `cbs_slot_bookings`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `college_slot_bookings`
--
ALTER TABLE `college_slot_bookings`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nashik_rd_slot_bookings`
--
ALTER TABLE `nashik_rd_slot_bookings`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbs_slot_bookings`
--
ALTER TABLE `cbs_slot_bookings`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `college_slot_bookings`
--
ALTER TABLE `college_slot_bookings`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `nashik_rd_slot_bookings`
--
ALTER TABLE `nashik_rd_slot_bookings`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
