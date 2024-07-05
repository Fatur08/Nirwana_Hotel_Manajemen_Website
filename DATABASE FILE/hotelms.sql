-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 11:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `total_price`, `remaining_price`, `payment_status`) VALUES
(25, 27, 32, '2023-08-01 12:01:43', '07-08-2023', '18-08-2023', 18000, 0, 1),
(26, 28, 11, '2023-08-01 12:02:08', '01-08-2023', '29-08-2023', 58000, 0, 1),
(27, 29, 12, '2023-08-01 12:05:55', '07-08-2023', '18-08-2023', 36000, 0, 1),
(29, 31, 32, '2023-08-02 07:11:44', '07-08-2023', '25-08-2023', 28500, 0, 1),
(43, 45, 31, '2023-08-02 09:28:57', '07-08-2023', '31-08-2023', 25000, 0, 1),
(44, 46, 31, '2023-08-02 09:31:24', '04-08-2023', '22-08-2023', 19000, 19000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(100) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resolve_status` tinyint(1) NOT NULL,
  `resolve_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complainant_name`, `complaint_type`, `complaint`, `created_at`, `resolve_status`, `resolve_date`, `budget`) VALUES
(1, 'Janice Alexander\n', 'Room Windows', 'Doesnot operate properly', '2020-07-16 06:51:24', 1, '2020-07-17 06:51:58', 3600),
(3, 'Jason J Pirkle\n', 'Bad Smells', 'Some odd smells around room areas', '2018-04-01 07:01:17', 1, '2018-04-01 07:01:52', 500),
(9, 'deor', 'WC BAU', 'sssdada', '2023-07-31 18:05:28', 1, '2023-08-01 20:32:35', 10000),
(11, 'adddd', 'awdadad', 'ddad', '2023-08-02 09:29:26', 1, '2023-08-02 09:29:40', 1400);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_card_type_id` int(10) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `contact_no`, `email`, `id_card_type_id`, `id_card_no`, `address`) VALUES
(1, 'Billy S. Burke', 7540001240, 'billyb9@gmail.com', 1, '422510099122', '3166 Rockford Road'),
(2, 'John Mitchell', 2870214970, 'johnm@gmail.com', 2, '422510099122', '1954 Armory Road'),
(3, 'Beatriz M. Matthews', 1247778460, 'matthews@gmail.com', 1, '422510099122', '4879 Shearwood Forest Drive'),
(4, 'Kevin Johnson', 1478546500, 'kevin@gmail.com', 3, '0', '926 Richland Avenue\n'),
(5, 'Dwayne Scott', 2671249780, 'scottdway@gmail.com', 1, '422510099122', '4698 Columbia Road\n'),
(6, 'Bruno Denn', 1245554780, 'denbru@gmail.com', 4, 'AASS 12454784541', '4764 Warner Street\n'),
(7, 'Ric Austin', 2450006974, 'austinric@gmail.com', 1, '457896000002', '1680  Brownton Road'),
(8, 'Andrew Stuartt', 2457778450, 'andrew@gmail.com', 1, '147000245810', '766  Lodgeville Road'),
(9, 'John Constantine', 9664545241, 'Contatinopel@gmail.com', 1, '435242424141', 'asdafadad'),
(12, 'addd sdwas', 2324241222, 'dwaddddadad@f.com', 2, 'adsdadwad', 'adawadawd'),
(13, 'Ali Muhammad', 21231312312312, 'firmandeomahli92@yahoo.co.id', 1, '012331231313', 'csacacacsa'),
(14, 'forke wong', 123131312333, 'adad@d', 1, '121313131314', 'Beringin'),
(15, 'Heri wong', 13131214123131, '13131314113213123@e', 1, '132113131312313', 'adadadadads'),
(16, 'Ali Constantine', 1311313131313133, 'firmandeomahli92@yahoo.co.id', 1, '1311231311213131', 'vcacaca'),
(17, 'John Yadi', 12222131313123, 'Avendjar@gmail.com', 1, '13131311313131313', 'vcacaca'),
(18, 'Ali Constantine', 134441662112, 'adam@gmail.com', 1, '42641121354444', 'Beringin'),
(19, 'ada Muhammad', 54313123134141, 'firmandeomahli92@yahoo.co.id', 1, '689876543452', 'asdafadad'),
(20, 'Frankb wong', 987654323456, '987654dcvbh@f', 1, '0987654345678', 'adadadadads'),
(21, '09876543456ygv 89876rdcvbn', 87654345678, '987654edfg@r', 1, '09876543456789', 'csacacacsa'),
(22, 'ada Constantine', 87654456789, 'ssff@f', 1, '234567890987654', 'vcacaca'),
(23, 'Frankb Constantine', 9876543345678, 'firmandeomahli92@yahoo.co.id', 1, '9876543234567', 'adadadadads'),
(24, 'Frankb wong', 9876543234567, 'firmandeomahli92@yahoo.co.id', 1, '9876543234567', 'asdafadad'),
(25, 'oiuyertyhu Constantine', 98765432345, 'firmandeomahli92@yahoo.co.id', 1, '012339876543456', 'adadadadads'),
(26, 'Ali wong', 98765434567, 'admin3add@r', 1, '0987654345678', 'vcacaca'),
(27, 'baron james', 7654345678, 'admin@d', 1, '765434567898765', 'Beringin'),
(28, 'John Heri', 4567654323456, 'Avendjar@gmail.com', 1, '3456789876543', 'adadadadads'),
(29, 'deeess Constantine', 23456789098765, 'duyfuyf@hf', 1, '23456789876543', 'asdafadad'),
(30, 'vuyiubiu ibiubiu', 2345678987654, 'buubiu@h', 1, '3456789066666', 'vuviuviu'),
(31, 'vvwvwvew vvwevw', 12331, 'vvv@d', 1, '29876543456789', 'vvwevwv'),
(32, 'Frankb wong', 2323423444, 'vv@d', 1, '8765434567322', 'csacacacsa'),
(33, 'Ani Muhammad', 21313131, 'admin@d', 3, '2qdq2d2d2223', 'csacacacsa'),
(34, 'Ali wong', 2341413131313, 'dDdd@d', 1, '2424444112414', 'ffff'),
(35, 'John m', 9876543456789, 'dd@d', 1, '4131313133131', 'fffff'),
(36, 'adwdadad dwadwadad', 3131314141414, 'dadawddad@j', 1, '414122141414124', 'aadada'),
(37, 'adwdawd addawdad', 1231314141441, 'aadadadwd@d', 1, '1313132313133', 'dadwadad'),
(38, 'adaadad cvevevvav', 1213313132411, 'adadadwd@d', 1, '1131311331313444', 'dadwdadadd'),
(39, 'awdaawdada adadadaad', 13131321123131, 'dadwawad@d', 1, '1313131313123113', 'dadadad'),
(40, 'adadwad adadwaada', 13131313131311313, 'aadadadawdadada@dd', 1, '13131313131331', 'adaadadadad'),
(41, 'dadwada adawdadaad', 1231313131213, '1dad@e', 1, '123131313121131', 'adadwa'),
(42, 'adaddadadadad wadadawdadad', 113121313, '081617342725d@dd', 1, '133211313131', 'adawdwadad'),
(43, 'adadada wong', 3121311313, 'adadawdad@d', 1, '1313131313131231', 'adadadadad'),
(44, 'dadawdadaw adadawdwadad', 13312313131313, 'awdad@d', 1, '13131313131313', 'fadadadad'),
(45, 'adadadad awdawdwada', 1313113113, 'dwaadad@d', 1, '311331311313131', 'dadad'),
(46, 'adawdada adadawdwa', 131313123113, 'adadwdw@d', 1, '123415353324', 'dadadadfafaf');

-- --------------------------------------------------------

--
-- Table structure for table `emp_history`
--

CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `to_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_history`
--

INSERT INTO `emp_history` (`id`, `emp_id`, `shift_id`, `from_date`, `to_date`, `created_at`) VALUES
(6, 6, 3, '2017-11-13 05:42:03', NULL, '2017-11-13 05:42:03'),
(8, 8, 3, '2017-11-13 05:43:13', '2017-11-18 02:32:26', '2017-11-13 05:43:13'),
(16, 8, 1, '2017-11-18 07:02:26', NULL, '2017-11-18 07:02:26'),
(21, 13, 2, '2021-04-09 08:35:27', NULL, '2021-04-09 08:35:27'),
(22, 14, 3, '2023-08-01 11:59:59', NULL, '2023-08-01 11:59:59'),
(23, 23, 4, '2023-08-01 12:57:24', NULL, '2023-08-01 12:57:24'),
(24, 24, 2, '2023-08-01 12:57:40', NULL, '2023-08-01 12:57:40'),
(25, 25, 4, '2023-08-01 12:57:55', NULL, '2023-08-01 12:57:55'),
(26, 26, 2, '2023-08-01 12:58:11', NULL, '2023-08-01 12:58:11'),
(27, 27, 2, '2023-08-01 12:58:34', NULL, '2023-08-01 12:58:34'),
(28, 28, 2, '2023-08-01 12:58:50', NULL, '2023-08-01 12:58:50'),
(29, 29, 1, '2023-08-01 12:59:12', NULL, '2023-08-01 12:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_type`
--

CREATE TABLE `id_card_type` (
  `id_card_type_id` int(10) NOT NULL,
  `id_card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_card_type`
--

INSERT INTO `id_card_type` (`id_card_type_id`, `id_card_type`) VALUES
(1, 'National Identity Card'),
(2, 'Voter Id Card'),
(3, 'Pan Card'),
(4, 'Driving License');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`) VALUES
(11, 3, 'C-103', NULL, 0, 1),
(12, 4, 'C-104', NULL, 0, 1),
(13, 4, 'D-101', NULL, 0, 1),
(14, 5, 'K-699', NULL, 0, 1),
(15, 5, 'K-799', NULL, 0, 1),
(16, 5, 'K-899', NULL, 0, 0),
(17, 6, 'M-333', NULL, 0, 0),
(18, 6, 'M-444', NULL, 0, 0),
(19, 6, 'M-555', NULL, 0, 0),
(20, 9, 'P-696', NULL, 0, 0),
(21, 10, 'M-966', NULL, 0, 0),
(22, 10, 'M-869', NULL, 0, 1),
(23, 8, 'Z-666', NULL, 0, 0),
(24, 7, 'X-969', NULL, 0, 0),
(25, 8, 'Z-111', NULL, 0, 0),
(26, 6, 'M-135', NULL, 0, 0),
(31, 1, 'A-103', 1, 0, 1),
(32, 2, 'A-104', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`) VALUES
(1, 'Single', 1000, 1),
(2, 'Double', 1500, 2),
(3, 'Triple', 2000, 3),
(4, 'Family', 3000, 2),
(5, 'King Sized', 5500, 4),
(6, 'Master Suite', 6500, 6),
(7, 'Mini-Suite', 3600, 3),
(8, 'Connecting Rooms', 8000, 6),
(9, 'Presidential Suite', 21000, 4),
(10, 'Murphy Room', 6900, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(10) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `shift_timing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift`, `shift_timing`) VALUES
(1, 'Morning', '5:00 AM - 10:00 AM'),
(2, 'Day', '10:00 AM - 4:00PM'),
(3, 'Evening', '4:00 PM - 10:00 PM'),
(4, 'Night', '10:00PM - 5:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `id_card_type` int(11) NOT NULL,
  `id_card_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`emp_id`, `emp_name`, `staff_type_id`, `shift_id`, `id_card_type`, `id_card_no`, `address`, `contact_no`, `salary`, `joining_date`, `updated_at`) VALUES
(6, 'Miguel M. Miller', 3, 3, 3, '0', 'Ap #897-1459 Quam Avenue', 8520000000, 40000, '2017-11-13 05:42:03', '2021-04-08 17:36:47'),
(8, 'Heri Yadi', 3, 1, 1, '01233', 'Beringin', 1457845554, 15000, '0000-00-00 00:00:00', '2023-07-30 14:39:00'),
(13, 'Brent Dixon', 9, 2, 1, '457854555012', '1821 Harry Place', 7457778560, 65500, '2021-04-09 08:35:27', '2021-04-09 08:35:27'),
(14, 'josua Yadi', 3, 3, 1, '987654334564', 'adadadadads', 987654334567, 50000, '2023-08-01 11:59:59', '2023-08-01 11:59:59'),
(23, 'Frankbdd hgfdxcv', 2, 4, 1, '876543765411', 'aadada', 2233344124, 654344, '2023-08-01 12:57:23', '2023-08-01 12:57:23'),
(24, 'nbdsdfg hgdc', 1, 2, 1, '098765432345678', 'wfff', 32324, 1123, '2023-08-01 12:57:40', '2023-08-01 12:57:40'),
(25, 'vsdv fadafafa', 3, 4, 1, '9876543234567890', 'adadadadads', 345523, 131313, '2023-08-01 12:57:55', '2023-08-01 12:57:55'),
(26, '11113d fwfwfwr', 9, 2, 1, '13131314142155', 'fesdvsv', 5112414, 321, '2023-08-01 12:58:11', '2023-08-01 12:58:11'),
(27, '141123 fwr223r', 4, 2, 2, '12141e1e1e1e', '141ee1', 141120, 21141, '2023-08-01 12:58:34', '2023-08-01 12:58:34'),
(28, '1441ee e1e2124', 5, 2, 1, '234563654124145', 'dfsf', 12121412313, 12, '2023-08-01 12:58:50', '2023-08-01 12:58:50'),
(29, '11r1r2 1r21r1de1', 7, 1, 1, '6325141411514', 'ffqwfqwfq', 141525241, 4412, '2023-08-01 12:59:12', '2023-08-01 12:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `staff_type_id` int(10) NOT NULL,
  `staff_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type`) VALUES
(1, 'Manager'),
(2, 'Housekeeping Manager'),
(3, 'Front Desk Receptionist'),
(4, 'Cheif'),
(5, 'Waiter'),
(6, 'Room Attendant'),
(7, 'Concierge'),
(8, 'Hotel Maintenance Engineer'),
(9, 'Hotel Sales Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `created_at`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', 'admin', '2015-11-12 12:49:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id_type` (`id_card_type_id`);

--
-- Indexes for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `id_card_type`
--
ALTER TABLE `id_card_type`
  ADD PRIMARY KEY (`id_card_type_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `id_card_type` (`id_card_type`),
  ADD KEY `shift_id` (`shift_id`),
  ADD KEY `staff_type_id` (`staff_type_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `id_card_type`
--
ALTER TABLE `id_card_type`
  MODIFY `id_card_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `staff_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_card_type_id`) REFERENCES `id_card_type` (`id_card_type_id`);

--
-- Constraints for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD CONSTRAINT `emp_history_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `staff` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_history_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_card_type`) REFERENCES `id_card_type` (`id_card_type_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`),
  ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
