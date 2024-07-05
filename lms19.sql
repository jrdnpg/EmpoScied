-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 05:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms19`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `date_borrow` datetime NOT NULL DEFAULT current_timestamp(),
  `borrowcode` bigint(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_assigned` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `time_limit` datetime NOT NULL,
  `date_return` datetime DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `date_borrow`, `borrowcode`, `member_id`, `item_id`, `stock_id`, `user_id`, `room_assigned`, `status`, `time_limit`, `date_return`, `quantity`) VALUES
(15, '2023-10-23 19:47:10', 1023202312311713, 13, 29, 27, 1, 6, 1, '2023-10-24 06:31:00', NULL, 1),
(16, '2023-10-23 19:47:19', 1023202303151013, 13, 32, 30, 1, 1, 1, '2023-10-30 11:15:00', NULL, 1),
(17, '2023-10-23 19:47:22', 1023202301152413, 13, 30, 28, 1, 6, 1, '2023-10-24 07:15:00', NULL, 1),
(18, '2023-10-23 19:47:25', 1022202310345913, 13, 33, 31, 1, 7, 1, '2023-10-25 06:34:00', NULL, 1),
(19, '2023-10-23 19:47:28', 1022202310335313, 13, 30, 28, 1, 8, 2, '2023-10-28 06:33:00', '2023-10-23 13:47:54', 1),
(20, '2023-10-23 20:02:06', 102320231402061, 13, 31, 29, 1, 8, 1, '2023-10-23 08:01:00', NULL, 1),
(21, '2023-10-23 20:02:22', 102320231402221, 13, 34, 32, 1, 9, 1, '2023-10-23 08:01:00', NULL, 1),
(22, '2023-10-23 20:05:04', 102320231405041, 14, 29, 27, 1, 7, 1, '2023-10-23 08:03:00', NULL, 1),
(23, '2023-11-28 11:39:19', 112820230439191, 13, 29, 27, 1, 6, 1, '2023-11-28 11:39:00', NULL, 4),
(24, '2023-11-28 11:42:55', 112820230442551, 14, 32, 30, 1, 6, 1, '2023-11-28 11:42:00', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `e_deviceid` varchar(50) NOT NULL,
  `e_model` varchar(50) NOT NULL,
  `e_category` varchar(50) NOT NULL,
  `e_brand` varchar(50) NOT NULL,
  `e_description` text NOT NULL,
  `e_stock` int(11) NOT NULL,
  `e_stockleft` int(11) NOT NULL,
  `e_type` varchar(50) NOT NULL,
  `e_status` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_inventory`
--

CREATE TABLE `equipment_inventory` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_logs`
--

CREATE TABLE `history_logs` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `status_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `history_logs`
--

INSERT INTO `history_logs` (`id`, `description`, `table_name`, `status_name`, `user_id`, `user_type`, `date_created`) VALUES
(49, 'add new equipmentSM-922 , Mouse', 'equipment', '', 1, 1, '2017-02-17 13:28:52'),
(50, 'add 2items toSM-922quantity', 'equipment', '', 1, 1, '2017-02-17 13:46:29'),
(51, 'add 2items toSM-9221quantity', 'equipment', '', 1, 1, '2017-02-17 14:15:46'),
(52, 'add new equipment---- , AVR', 'equipment', '', 1, 1, '2017-02-21 11:20:20'),
(53, 'add new equipmentH328C , Projector', 'equipment', '', 1, 1, '2017-02-21 11:24:12'),
(54, 'add new equipmentOM-130006A/K , Keyboard', 'equipment', '', 1, 1, '2017-02-21 11:28:04'),
(55, 'add new equipment---- , Remote', 'equipment', '', 1, 1, '2017-02-21 11:31:19'),
(56, 'add new equipment58E510 , TV', 'equipment', '', 1, 1, '2017-02-21 11:35:07'),
(57, 'add new equipmentChemicals , chemicals', 'equipment', '', 1, 1, '2023-07-03 12:03:09'),
(58, 'add new equipment4rt , tools', 'equipment', '', 1, 1, '2023-07-03 12:04:11'),
(59, 'add new equipmentBeaker , tools', 'equipment', '', 1, 1, '2023-07-03 12:16:19'),
(60, 'add new equipmentTest Tube , tools', 'equipment', '', 1, 1, '2023-07-03 12:18:14'),
(61, 'add new equipmentPotassium Chloride , chemicals', 'equipment', '', 1, 1, '2023-07-03 12:25:14'),
(62, 'add new equipmentPotassium Permanganate , chemicals', 'equipment', '', 1, 1, '2023-07-03 12:29:49'),
(63, 'add new ItemMicroscope , tools', 'equipment', '', 1, 1, '2023-10-19 00:20:34'),
(64, 'add new ItemGlass Funnel , tools', 'equipment', '', 1, 1, '2023-10-19 00:33:09'),
(65, 'add new ItemChemical Goggles , tools', 'equipment', '', 1, 1, '2023-10-19 00:38:12'),
(66, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:22'),
(67, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:23'),
(68, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:24'),
(69, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:24'),
(70, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:24'),
(71, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:24'),
(72, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:24'),
(73, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:25'),
(74, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:25'),
(75, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:25'),
(76, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:25'),
(77, 'add new ItemMolisch Reagent , chemicals', 'equipment', '', 1, 1, '2023-10-19 09:59:25'),
(78, 'add userJose', 'user', '', 1, 1, '2023-10-23 03:22:33'),
(79, 'edit user', 'user', '', 1, 1, '2023-10-23 03:22:52'),
(80, 'add new ItemBeaker , tools', 'equipment', '', 1, 1, '2023-10-23 18:12:55'),
(81, 'edit room room 301 to room  heb lab 01', 'room', '', 1, 1, '2023-10-23 18:15:49'),
(82, 'add new student', 'client', '', 1, 1, '2023-10-23 19:29:25'),
(83, 'edit client', 'client', '', 1, 1, '2023-10-23 19:31:10'),
(84, 'deactivate client', 'client', '', 1, 1, '2023-10-23 19:35:03'),
(85, 'edit client', 'client', '', 1, 1, '2023-10-23 19:37:01'),
(86, 'activate client', 'client', '', 1, 1, '2023-10-23 19:37:07'),
(87, 'edit client', 'client', '', 1, 1, '2023-10-23 19:37:25'),
(88, 'add csv file clients', 'client', '', 1, 0, '2023-10-23 19:42:23'),
(89, 'add userMarck Luell Jonson', 'user', '', 1, 1, '2023-10-23 23:30:05'),
(90, 'add new Itemalak , chemicals', 'equipment', '', 1, 1, '2023-11-28 11:22:13'),
(91, 'add new Itemaad , tools', 'equipment', '', 1, 1, '2023-11-28 11:23:06'),
(92, 'create borrow transaction', 'borrow', '', 1, 1, '2023-11-28 11:39:19'),
(93, 'create borrow transaction', 'borrow', '', 1, 1, '2023-11-28 11:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(5) NOT NULL,
  `i_deviceID` varchar(50) NOT NULL,
  `i_model` varchar(50) NOT NULL,
  `i_category` varchar(50) NOT NULL,
  `i_brand` varchar(50) NOT NULL,
  `i_description` text NOT NULL,
  `i_type` varchar(50) NOT NULL,
  `item_rawstock` int(11) NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT 1,
  `i_mr` varchar(50) NOT NULL,
  `i_price` decimal(10,2) NOT NULL,
  `i_photo` varchar(100) NOT NULL,
  `i_date_added` date DEFAULT NULL,
  `i_date_expiration` date DEFAULT NULL,
  `i_liter` varchar(11) DEFAULT NULL,
  `i_grams` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `i_deviceID`, `i_model`, `i_category`, `i_brand`, `i_description`, `i_type`, `item_rawstock`, `i_status`, `i_mr`, `i_price`, `i_photo`, `i_date_added`, `i_date_expiration`, `i_liter`, `i_grams`) VALUES
(29, '11299', 'Beaker', 'Tools', 'FisherBrand', 'Fragile', 'Non-consumable', 100, 1, 'Admin', 450.00, '1697674627.webp', '2023-07-03', '0000-00-00', NULL, NULL),
(30, '11300', 'Test Tube', 'Tools', 'FisherBrand', 'Fragile', 'Non-consumable', 100, 1, 'Admin', 250.00, '1697674575.webp', '2023-07-03', '0000-00-00', NULL, NULL),
(31, '11301', 'Potassium Chloride', 'Chemicals', 'Dalkem', 'Before using Potassium Chloride in the laboratory, be sure to carefully review the Material Safety Data Sheet (MSDS) and follow all recommended safety precautions.', 'Consumable', 100, 1, 'Admin', 1000.31, '1697676067.png', '2023-07-03', '2026-05-03', NULL, NULL),
(32, '11302', 'Potassium Permanganate', 'Chemicals', 'Dawn Sci', 'Prior to using laboratory chemical Potassium Permanganate, familiarize yourself with its proper handling and safety precautions to prevent any accidents or harm.', 'Consumable', 98, 1, 'Admin', 5119.00, '1697676202.webp', '2023-07-03', '2024-07-03', NULL, NULL),
(33, '11118', 'Microscope', 'tools', 'Olympus', 'Do not touch the glass part of the lenses with your fingers. Use only special lens paper to clean the lenses. Always keep your microscope covered when not in use.', 'Non-consumable', 15, 1, 'admin', 0.00, '1697674834.jpg', '2023-10-19', '0000-00-00', NULL, NULL),
(34, '11119', 'Glass Funnel', 'tools', 'Jlab Borosilicate ', 'Handle the laboratory glass funnel with utmost care to avoid any damage or contamination.', 'Non-consumable', 150, 1, 'admin', 0.00, '1697675589.png', '2023-10-19', '0000-00-00', NULL, NULL),
(35, '11120', 'Chemical Goggles', 'tools', 'B Brand', 'Always handle laboratory chemical goggles with caution to ensure your eye safety during experiments and chemical handling.', 'Non-consumable', 50, 1, 'admin', 0.00, '1697675892.jpg', '2023-10-19', '0000-00-00', NULL, NULL),
(36, '11126', 'Molisch Reagent', 'chemicals', 'marck chemicals', 'Before using the laboratory chemical Molisch Reagent, review the safety protocols and ensure proper handling to minimize risks and ensure accurate results in your experiments.', 'Consumable', 1, 1, 'admin', 1000.00, '1697709562.jpg', '2023-10-19', '2023-10-25', NULL, NULL),
(37, '11126', 'ninhydrin solution', 'Chemicals', 'Marck Chemicals', 'Before using the laboratory chemical Molisch Reagent, review the safety protocols and ensure proper handling to minimize risks and ensure accurate results in your experiments.', 'Consumable', 1, 1, 'Admin', 7180.00, '1697709683.webp', '2023-10-19', '2023-10-20', NULL, NULL),
(38, '11126', 'Nitric Acid', 'Chemicals', 'Marck Chemicals', 'Before using the laboratory chemical Molisch Reagent, review the safety protocols and ensure proper handling to minimize risks and ensure accurate results in your experiments.', 'Consumable', 1, 1, 'Admin', 1353.00, '1697709807.jpg', '2023-10-19', '2024-10-25', NULL, NULL),
(39, '11126', 'parrafin wax', 'Chemicals', 'Marck Chemicals', 'Before using the laboratory chemical Molisch Reagent, review the safety protocols and ensure proper handling to minimize risks and ensure accurate results in your experiments.', 'Consumable', 1, 2, 'Admin', 680.00, '1697709975.jpg', '2023-10-19', '2023-12-25', NULL, NULL),
(40, '11126', 'Molisch Reagent', 'chemicals', 'marck chemicals', 'Before using the laboratory chemical Molisch Reagent, review the safety protocols and ensure proper handling to minimize risks and ensure accurate results in your experiments.', 'Consumable', 1, 1, 'admin', 1000.00, '1697709564.jpg', '2023-10-19', '2024-10-19', NULL, NULL),
(49, '11508', 'alak', 'chemicals', 'a', 'aa', 'Consumable', 11, 1, 'admin', 11.00, '1701141733.jpg', '2023-11-28', '2023-11-29', '100', 0),
(50, '11509', 'aad', 'tools', 'aa', 'aa', 'Non-consumable', 11, 1, 'admin', 11.00, '1701141786.jpg', '2023-11-28', '0000-00-00', '100ml', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_inventory`
--

CREATE TABLE `item_inventory` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `inventory_itemstock` int(11) NOT NULL,
  `inventory_status` int(11) NOT NULL,
  `item_remarks` text NOT NULL,
  `date_change` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_inventory`
--

INSERT INTO `item_inventory` (`id`, `item_id`, `inventory_itemstock`, `inventory_status`, `item_remarks`, `date_change`) VALUES
(8, 16, 2, 2, '', '2017-02-17 06:13:59'),
(9, 16, 2, 2, 'test', '2017-02-17 06:16:07'),
(10, 29, 12, 3, 'nawala', '2023-10-23 10:51:11'),
(11, 31, 50, 4, 'nabasag ang chemical', '2023-10-23 10:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `items_stock` int(11) NOT NULL,
  `item_status` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`id`, `item_id`, `room_id`, `items_stock`, `item_status`, `status`) VALUES
(27, 29, 14, 75, 1, 1),
(28, 30, 14, 99, 1, 1),
(29, 31, 14, 49, 1, 1),
(30, 32, 14, 87, 1, 1),
(31, 33, 14, 14, 1, 1),
(32, 34, 14, 149, 1, 1),
(33, 35, 14, 50, 1, 1),
(34, 36, 14, 1, 1, 1),
(35, 37, 14, 1, 1, 1),
(36, 38, 14, 1, 1, 1),
(37, 39, 14, 1, 1, 1),
(38, 40, 14, 1, 1, 1),
(39, 41, 14, 1, 1, 1),
(40, 42, 14, 1, 1, 1),
(41, 43, 14, 1, 1, 1),
(42, 44, 14, 1, 1, 1),
(43, 45, 14, 1, 1, 1),
(44, 46, 14, 1, 1, 1),
(45, 47, 14, 1, 1, 1),
(46, 48, 14, 12, 1, 1),
(47, 49, 14, 11, 1, 1),
(48, 50, 14, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_transfer`
--

CREATE TABLE `item_transfer` (
  `id` int(11) NOT NULL,
  `t_itemID` int(11) NOT NULL,
  `t_roomID` int(11) NOT NULL,
  `t_stockID` int(11) NOT NULL,
  `t_quantity` int(11) NOT NULL,
  `date_transfer` timestamp NOT NULL DEFAULT current_timestamp(),
  `t_status` int(11) NOT NULL DEFAULT 1,
  `personincharge` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `m_school_id` varchar(11) NOT NULL,
  `m_fname` varchar(50) NOT NULL,
  `m_lname` varchar(50) NOT NULL,
  `m_gender` varchar(10) NOT NULL,
  `m_contact` varchar(15) NOT NULL,
  `m_department` varchar(50) NOT NULL,
  `m_year_section` varchar(20) NOT NULL,
  `m_type` varchar(50) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `m_school_id`, `m_fname`, `m_lname`, `m_gender`, `m_contact`, `m_department`, `m_year_section`, `m_type`, `m_password`, `m_status`) VALUES
(13, '20-72209', 'anthony', 'nimo', 'Male', '090909098', 'CAS', '4th- 3301', '1', '8c50c8b5c5d2a9785f7828f654676043', 1),
(14, '20-70506', 'Francis', 'Dacules', 'Male', '090909090', 'CAS', '4th- 4101', 'Student', '', 1),
(15, '20-71233', 'Jordan ', 'Jonson', 'Male', '9272930886', 'CAS', '4th-3101', 'Student', '', 1),
(16, '20-72132', 'Jigs', 'Madrigal', 'Male', '9272637446', 'CTE', '3rd-2101', 'Student', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `reservation_code` varchar(60) NOT NULL,
  `member_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reserve_date` varchar(50) DEFAULT NULL,
  `reservation_time` varchar(20) NOT NULL,
  `time_limit` datetime NOT NULL,
  `assign_room` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_code`, `member_id`, `item_id`, `stock_id`, `room_id`, `reserve_date`, `reservation_time`, `time_limit`, `assign_room`, `status`, `remarks`, `r_date`, `quantity`) VALUES
(1, '1022202310335313', 13, 30, 28, 0, '10/26/2023', '06:37', '2023-10-28 06:33:00', 8, 3, '', '2023-10-22 10:33:53', 1),
(2, '1022202310345913', 13, 33, 31, 0, '10/25/2023', '18:34', '2023-10-25 06:34:00', 7, 3, '', '2023-10-22 10:34:59', 1),
(3, '1023202303151013', 13, 32, 30, 0, '10/27/2023', '23:18', '2023-10-30 11:15:00', 1, 3, '', '2023-10-23 03:15:10', 1),
(4, '1023202312311713', 13, 29, 27, 0, '10/27/2023', '18:32', '2023-10-24 06:31:00', 6, 3, '', '2023-10-23 18:31:17', 1),
(5, '1023202301152413', 13, 30, 28, 0, '10/23/2023', '07:15', '2023-10-24 07:15:00', 6, 3, '', '2023-10-23 19:15:24', 1),
(6, '1128202304415614', 14, 29, 27, 0, '11/28/2023', '11:41', '2023-11-12 05:43:00', 6, 0, '', '2023-11-28 11:41:56', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_status`
--

CREATE TABLE `reservation_status` (
  `id` int(11) NOT NULL,
  `reservation_code` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `res_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservation_status`
--

INSERT INTO `reservation_status` (`id`, `reservation_code`, `remark`, `res_status`) VALUES
(13, '0217201706314310', 'Accepted Reservation', 1),
(14, '021920170329593', 'Accepted Reservation', 1),
(15, '021920170329593', 'Accepted Reservation', 1),
(16, '021920170345437', 'Accepted Reservation', 1),
(17, '021920170353384', 'Accepted Reservation', 1),
(18, '1023202312311713', 'Accepted Reservation', 1),
(19, '1023202301152413', 'Accepted Reservation', 1),
(20, '1022202310345913', 'Accepted Reservation', 1),
(21, '1022202310335313', 'Accepted Reservation', 1),
(22, '1023202303151013', 'Accepted Reservation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `rm_name` varchar(50) NOT NULL,
  `rm_date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `rm_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `rm_name`, `rm_date_added`, `rm_status`) VALUES
(1, 'room 312', '2016-11-16 21:21:42', 1),
(2, 'room 403', '2016-11-16 21:21:47', 1),
(3, 'room 311', '2016-11-16 21:21:53', 1),
(4, 'room 313', '2016-11-17 18:45:03', 1),
(5, 'room 402', '2016-11-17 20:51:30', 1),
(6, 'room  heb lab 01', '2016-11-17 20:51:43', 1),
(7, 'room 302', '2016-11-17 20:51:54', 1),
(8, 'room 303', '2016-11-17 20:52:04', 1),
(9, 'room 304', '2016-11-17 20:52:20', 1),
(10, 'room 305', '2016-11-17 20:52:56', 1),
(11, 'room 306', '2016-11-17 20:53:20', 1),
(14, 'room 310', '2017-01-08 13:17:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_equipment`
--

CREATE TABLE `room_equipment` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `re_quantity` int(11) NOT NULL,
  `stats` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room_equipment`
--

INSERT INTO `room_equipment` (`id`, `equipment_id`, `room_id`, `re_quantity`, `stats`) VALUES
(1, 1, 14, 12, 1),
(2, 2, 14, 12, 1),
(3, 3, 14, 12, 1),
(4, 4, 14, 12, 1),
(5, 5, 14, 12, 1),
(6, 6, 14, 12, 1),
(7, 7, 14, 12, 1),
(8, 8, 14, 12, 1),
(9, 1, 14, 10, 1),
(10, 2, 14, 10, 1),
(11, 1, 14, 12, 1),
(12, 2, 14, 12, 1),
(13, 3, 14, 2, 1),
(14, 1, 14, 12, 1),
(15, 2, 14, 10, 1),
(16, 3, 14, 10, 1),
(17, 1, 14, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=admin, 2=stafff',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 2=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `type`, `status`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1, 1),
(7, 'Jose', 'technician', 'eb919176ebac2099dd026ec41524b707', 2, 1),
(8, 'Marck Luell Jonson', 'luell123', '6200ab380002da4d1aeb779af6e7cbb6', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `equipment_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `equipment_inventory`
--
ALTER TABLE `equipment_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `history_logs`
--
ALTER TABLE `history_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_inventory`
--
ALTER TABLE `item_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_transfer`
--
ALTER TABLE `item_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `equipment_id` (`item_id`);

--
-- Indexes for table `reservation_status`
--
ALTER TABLE `reservation_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_equipment`
--
ALTER TABLE `room_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_inventory`
--
ALTER TABLE `equipment_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_logs`
--
ALTER TABLE `history_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `item_inventory`
--
ALTER TABLE `item_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `item_transfer`
--
ALTER TABLE `item_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservation_status`
--
ALTER TABLE `reservation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room_equipment`
--
ALTER TABLE `room_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
