-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2018 at 10:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(6) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_img` varchar(255) NOT NULL,
  `admin_phone` varchar(100) NOT NULL,
  `admin_officeID` varchar(100) NOT NULL,
  `admin_status` varchar(20) NOT NULL,
  `super_admin` varchar(20) NOT NULL,
  `register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_img`, `admin_phone`, `admin_officeID`, `admin_status`, `super_admin`, `register`) VALUES
(1, 'admin2', '5683', 'man-in-suit2.jpg', '01707080401', 'BD00058', '1', '1', '2018-11-13 05:29:38'),
(3, 'admin', '5683', 'download.png', '017070707', 'BD25821', '1', '0', '2018-11-13 05:29:02'),
(5, 'syful', '5683', 'man-in-suit2.jpg', '01701752412', '32154465', '0', '1', '2018-11-11 13:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `car_booking`
--

CREATE TABLE `car_booking` (
  `booking_id` int(20) NOT NULL,
  `car_id` varchar(100) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `car_img` varchar(255) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `day_count` varchar(50) NOT NULL,
  `boking_status` varchar(20) NOT NULL,
  `booking_cost` varchar(100) NOT NULL,
  `driver_rating` varchar(50) NOT NULL,
  `driver_id` varchar(20) NOT NULL,
  `start_mileage` varchar(50) NOT NULL,
  `end_mileage` varchar(50) NOT NULL,
  `comit_st` varchar(20) NOT NULL,
  `reg_date_booking` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_booking`
--

INSERT INTO `car_booking` (`booking_id`, `car_id`, `user_id`, `user_name`, `car_name`, `car_number`, `car_img`, `start_date`, `end_date`, `location`, `day_count`, `boking_status`, `booking_cost`, `driver_rating`, `driver_id`, `start_mileage`, `end_mileage`, `comit_st`, `reg_date_booking`) VALUES
(1, '17', '4', 'rana', 'Nissan 2', 'DM-THA-15-7078', 'rewre.jpg', '2018-11-16 01:00:00', '2018-11-16 23:59:00', 'valuka', '1', '1', '', '', '', '', '', '', '2018-11-16 01:16:06.091096'),
(2, '17', '4', 'rana', 'Nissan 2', 'DM-THA-15-7078', 'rewre.jpg', '2018-11-17 01:00:00', '2018-11-18 23:59:00', 'Mymensingh', '2', '1', '', '', '12', '4582', '', '', '2018-11-17 09:30:55.874921'),
(3, '25', '4', 'rana', 'Hiace\r\n', 'DM-CHA-15-7076', 'IMG_7944.JPG', '2018-11-16 01:00:00', '2018-11-17 23:59:00', 'Savar', '2', '1', '', '', '', '', '', '', '2018-11-16 01:16:19.355216'),
(4, '26', '4', 'rana', 'Toytota Noah', 'DM-DHA-15-7081', 'IMG_7929.JPG', '2018-11-24 01:00:00', '2018-11-25 23:59:00', 'Dhaka', '2', '1', '568', '2', '21', '1425', '1425', '', '2018-11-17 04:38:27.361989'),
(5, '26', '4', 'rana', 'Toytota Noah', 'DM-DHA-15-7081', 'IMG_7929.JPG', '2018-11-18 01:00:00', '2018-11-19 23:59:00', 'Savar', '2', '1', '1423', '10', '21', '2568', '2568', '1', '2018-11-17 04:12:13.369350'),
(6, '17', '1', 'saif', 'Nissan 2', 'DM-THA-15-7078', 'rewre.jpg', '2018-11-23 01:00:00', '2018-11-24 23:59:00', 'Savar', '2', '1', '', '', '', '', '', '', '2018-11-16 01:16:37.991907'),
(7, '26', '1', 'saif', 'Toytota Noah', 'DM-DHA-15-7081', 'IMG_7929.JPG', '2018-11-29 01:00:00', '2018-11-29 23:59:00', 'Mymensingh', '1', '1', '', '', '', '', '', '', '2018-11-16 01:16:46.672588'),
(8, '14', '4', 'rana', 'Toyotassss', 'DM-THA-15-7080', 'ddd (1).jpg', '2018-11-17 09:00:00', '2018-11-17 10:30:00', 'valuka', '0', '1', '', '', '', '', '', '', '2018-11-17 04:16:01.724696'),
(9, '14', '4', 'rana', 'Toyotassss', 'DM-THA-15-7080', 'ddd (1).jpg', '2018-11-17 11:00:00', '2018-11-17 14:00:00', 'Dhaka', '0', '1', '', '', '', '', '', '', '2018-11-17 04:56:48.213770'),
(10, '16', '4', 'rana', 'Suzuki', 'DM-THA-15-7079', 'ddd (2).jpg', '2018-11-17 09:00:00', '2018-11-17 12:30:00', 'Dhaka', '0', '1', '', '', '1', '1234', '2345', '', '2018-11-17 05:38:27.936852'),
(11, '26', '4', 'rana', 'Toytota Noah', 'DM-DHA-15-7081', 'IMG_7929.JPG', '2018-11-17 01:00:00', '2018-11-17 23:59:00', 'Savar', '1', '1', '', '', '21', '1234', '2345', '', '2018-11-17 05:34:36.329152'),
(12, '14', '4', 'rana', 'Toyotassss', 'DM-THA-15-7080', 'ddd (1).jpg', '2018-11-18 12:00:00', '2018-11-18 13:00:00', 'valuka', '0', '1', '', '', '', '', '', '', '2018-11-17 05:47:26.703358'),
(13, '27', '4', 'rana', 'Toytota', 'DM-DHA-15-7083', 'IMG_7915.JPG', '2018-11-18 01:00:00', '2018-11-19 23:59:00', 'valuka', '2', '1', '', '', '', '', '', '', '2018-11-17 05:49:05.857366'),
(14, '27', '4', 'rana', 'Toytota', 'DM-DHA-15-7083', 'IMG_7915.JPG', '2018-11-21 12:00:00', '2018-11-21 09:30:00', 'Mymensingh', '0', '1', '', '', '22', '3456', '', '', '2018-11-17 09:30:29.831191'),
(15, '27', '4', 'rana', 'Toytota', 'DM-DHA-15-7083', 'IMG_7915.JPG', '2018-11-22 12:00:00', '2018-11-22 14:30:00', 'Mymensingh', '0', '1', '458', '8', '22', '4568', '4568', '', '2018-11-17 06:59:58.243206'),
(16, '17', '4', 'rana', 'Nissan 2', 'DM-THA-15-7078', 'rewre.jpg', '2018-11-25 12:00:00', '2018-11-25 11:30:00', 'valuka', '0', '1', '', '', '', '', '', '', '2018-11-17 08:07:25.991902'),
(17, '17', '4', 'rana', 'Nissan 2', 'DM-THA-15-7078', 'rewre.jpg', '2018-11-25 11:00:00', '2018-11-25 14:00:00', 'Mymensingh', '0', '1', '258', '5', '12', '4785', '7894', '1', '2018-11-17 08:58:12.488490'),
(18, '17', '4', 'rana', 'Nissan 2', 'DM-THA-15-7078', 'rewre.jpg', '2018-11-25 14:30:00', '2018-11-25 15:00:00', 'Dhaka', '0', '1', '582', '6', '12', '1254', '4568', '1', '2018-11-18 09:31:04.532545');

-- --------------------------------------------------------

--
-- Table structure for table `car_driver`
--

CREATE TABLE `car_driver` (
  `driver_id` int(20) NOT NULL,
  `car_id` int(6) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `driver_phone` varchar(50) NOT NULL,
  `driver_img` varchar(255) NOT NULL,
  `driver_license` varchar(100) NOT NULL,
  `driver_nid` varchar(100) NOT NULL,
  `driver_status` varchar(20) NOT NULL,
  `leave_start` varchar(200) NOT NULL,
  `leave_end` varchar(200) NOT NULL,
  `driver_reg` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_driver`
--

INSERT INTO `car_driver` (`driver_id`, `car_id`, `driver_name`, `driver_phone`, `driver_img`, `driver_license`, `driver_nid`, `driver_status`, `leave_start`, `leave_end`, `driver_reg`) VALUES
(1, 16, 'Belal', '01707080401', 'driver2.png', '65448161', '25525826522', '1', '', '', '2018-11-13 04:55:29.879465'),
(11, 14, 'Rahim', '01707080401', 'Driver Default.jpg', '644444444', '2552582652258888', '1', '', '', '2018-10-17 05:37:55.848103'),
(12, 17, 'Hadi', '1707080401', 'driver2.png', '5689586521', '199235689548', '1', '2018-11-12 01:01:01', '2018-11-12 23:59:01', '2018-11-16 05:20:21.291143'),
(21, 26, 'Dulal', '01715788357', 'IMG_7965.JPG', '000000000000', '000000000000', '1', '2018-11-17 01:01:01', '2018-11-18 23:59:01', '2018-11-16 05:20:25.723605'),
(22, 27, 'Kalam', '01921311474', 'IMG_7971.JPG', '000000000000', '000000000000', '1', '', '', '2018-11-10 08:53:05.660591'),
(23, 25, 'Rofiq(Jr)', '01984548331', 'IMG_7968.JPG', '000000000000', '000000000000', '1', '', '', '2018-11-10 08:56:04.460375');

-- --------------------------------------------------------

--
-- Table structure for table `driver_leave`
--

CREATE TABLE `driver_leave` (
  `driver_leave_id` int(20) NOT NULL,
  `driver_id` varchar(20) NOT NULL,
  `driver_leave_start` varchar(200) NOT NULL,
  `driver_leave_end` varchar(200) NOT NULL,
  `leave_status` varchar(20) NOT NULL,
  `Leave_reg` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_leave`
--

INSERT INTO `driver_leave` (`driver_leave_id`, `driver_id`, `driver_leave_start`, `driver_leave_end`, `leave_status`, `Leave_reg`) VALUES
(1, '24', '2018-11-15', '2018-11-15', '1', '2018-11-12 06:45:25.492450'),
(2, '1', '2018-11-12', '2018-11-13', '1', '2018-11-12 06:45:29.104503'),
(3, '1', '2018-11-15', '2018-11-15', '1', '2018-11-12 06:45:32.244892'),
(4, '1', '2018-11-16', '2018-11-16', '0', '2018-11-12 06:50:57.850048'),
(5, '1', '2018-11-16', '2018-11-17', '', '2018-11-12 06:54:34.311507'),
(6, '1', '2018-11-20', '2018-11-21', '1', '2018-11-12 06:56:51.100140'),
(7, '21', '2018-11-1201.01.01', '2018-11-1223.59.01', '1', '2018-11-12 09:54:41.806984'),
(8, '12', '2018-11-12 01:01:01', '2018-11-12 23:59:01', '1', '2018-11-12 09:56:17.892535'),
(9, '24', '2018-11-12 01:01:01', '2018-11-12 23:59:01', '1', '2018-11-12 09:59:38.979836'),
(10, '1', '2018-11-13 01:01:01', '2018-11-13 23:59:01', '0', '2018-11-13 04:55:29.955493'),
(11, '21', '2018-11-17 01:01:01', '2018-11-18 23:59:01', '1', '2018-11-13 04:10:11.392355');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(6) NOT NULL,
  `location` varchar(250) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`, `regDate`) VALUES
(1, 'valuka', '2018-10-28 09:00:19'),
(2, 'Savar', '2018-10-28 09:00:19'),
(3, 'Mymensingh', '2018-10-28 09:00:59'),
(7, 'Dhaka', '2018-11-11 10:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE `loginlog` (
  `login_id` int(6) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_os` varchar(50) NOT NULL,
  `user_browser` varchar(50) NOT NULL,
  `user_device` varchar(100) NOT NULL,
  `user_status` varchar(6) NOT NULL,
  `logIn` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `logOut` varchar(255) NOT NULL,
  `regsistration` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`login_id`, `user_name`, `user_id`, `user_ip`, `user_os`, `user_browser`, `user_device`, `user_status`, `logIn`, `logOut`, `regsistration`) VALUES
(1, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 03:13:23.103669', '2018-11-11 09:13:23 AM', '2018-11-11 03:13:23.103669'),
(2, 'admin', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 03:34:36.305356', '2018-11-11 09:34:36 AM', '2018-11-11 03:34:36.305356'),
(3, 'saif', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 03:58:10.118039', '2018-11-11 09:58:10 AM', '2018-11-11 03:58:10.118039'),
(4, 'admin', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 05:14:08.441972', '2018-11-11 11:14:08 AM', '2018-11-11 05:14:08.441972'),
(5, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 05:16:20.372134', '2018-11-11 11:16:20 AM', '2018-11-11 05:16:20.372134'),
(6, 'admin', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 05:33:23.002948', '2018-11-11 11:33:23 AM', '2018-11-11 05:33:23.002948'),
(7, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 05:51:09.271791', '2018-11-11 11:51:09 AM', '2018-11-11 05:51:09.271791'),
(8, 'admin', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 05:51:23.797826', '', '2018-11-11 05:51:23.797826'),
(9, 'admin', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 05:51:45.521448', '', '2018-11-11 05:51:45.521448'),
(10, 'admin2', '', '::1', '0', 'Chrome', 'Computer', '', '2018-11-11 05:54:11.565681', '', '2018-11-11 05:54:11.565681'),
(11, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 05:59:04.420011', '2018-11-11 11:59:04 AM', '2018-11-11 05:59:04.420011'),
(12, 'admin', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 05:59:10.639551', '', '2018-11-11 05:59:10.639551'),
(13, 'admin', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 06:02:53.918925', '2018-11-11 12:02:53 PM', '2018-11-11 06:02:53.918925'),
(14, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 06:04:52.106190', '2018-11-11 12:04:52 PM', '2018-11-11 06:04:52.106190'),
(15, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 06:05:10.843669', '2018-11-11 12:05:10 PM', '2018-11-11 06:05:10.843669'),
(16, 'admin', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 11:41:14.147171', '2018-11-11 05:41:14 PM', '2018-11-11 11:41:14.147171'),
(17, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 06:52:46.442937', '', '2018-11-11 06:52:46.442937'),
(18, 'rana', '4', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 09:19:48.890323', '2018-11-11 03:19:48 PM', '2018-11-11 09:19:48.890323'),
(19, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 09:56:51.329882', '2018-11-11 03:56:51 PM', '2018-11-11 09:56:51.329882'),
(20, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 09:57:06.929319', '', '2018-11-11 09:57:06.929319'),
(21, 'admin2', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 10:00:28.308370', '2018-11-11 04:00:28 PM', '2018-11-11 10:00:28.308370'),
(22, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 10:00:32.918061', '', '2018-11-11 10:00:32.918061'),
(23, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 10:03:12.908401', '', '2018-11-11 10:03:12.908401'),
(24, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 11:13:40.381844', '2018-11-11 05:13:40 PM', '2018-11-11 11:13:40.381844'),
(25, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 11:13:45.282041', '', '2018-11-11 11:13:45.282041'),
(26, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 11:28:17.503577', '2018-11-11 05:28:17 PM', '2018-11-11 11:28:17.503577'),
(27, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 11:28:47.475428', '', '2018-11-11 11:28:47.475428'),
(28, 'rana', '4', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 11:37:46.630934', '', '2018-11-11 11:37:46.630934'),
(29, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 11:45:38.770861', '2018-11-11 05:45:38 PM', '2018-11-11 11:45:38.770861'),
(30, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 11:59:49.788269', '2018-11-11 05:59:49 PM', '2018-11-11 11:59:49.788269'),
(31, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 11:47:14.974061', '', '2018-11-11 11:47:14.974061'),
(32, 'admin', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 04:57:34.214254', '2018-13-11 10:57:34 AM', '2018-11-13 04:57:34.214254'),
(33, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 11:59:26.493732', '2018-11-11 05:59:26 PM', '2018-11-11 11:59:26.493732'),
(34, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-11 11:59:30.950921', '', '2018-11-11 11:59:30.950921'),
(35, 'admin2', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 12:00:04.131707', '', '2018-11-11 12:00:04.131707'),
(36, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 13:45:41.737478', '2018-11-11 07:45:41 PM', '2018-11-11 13:45:41.737478'),
(37, 'admin2', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 13:53:27.257017', '2018-11-11 07:53:27 PM', '2018-11-11 13:53:27.257017'),
(38, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 13:53:36.525864', '', '2018-11-11 13:53:36.525864'),
(39, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 14:06:45.383962', '', '2018-11-11 14:06:45.383962'),
(40, 'admin2', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 14:39:44.548171', '2018-11-11 08:39:44 PM', '2018-11-11 14:39:44.548171'),
(41, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 14:42:59.344304', '', '2018-11-11 14:42:59.344304'),
(42, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-11 15:23:09.522001', '', '2018-11-11 15:23:09.522001'),
(43, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-12 03:16:14.633118', '2018-11-12 09:16:14 AM', '2018-11-12 03:16:14.633118'),
(44, 'admin2', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-12 03:16:30.237798', '', '2018-11-12 03:16:30.237798'),
(45, 'rana', '4', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-12 10:34:27.939451', '2018-11-12 04:34:27 PM', '2018-11-12 10:34:27.939451'),
(46, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-12 10:34:41.922398', '', '2018-11-12 10:34:41.922398'),
(47, 'rana', '4', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-12 12:19:56.418161', '', '2018-11-12 12:19:56.418161'),
(48, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-13 03:52:44.330529', '2018-11-13 09:52:44 AM', '2018-11-13 03:52:44.330529'),
(49, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 03:45:36.804061', '', '2018-11-13 03:45:36.804061'),
(50, 'admin2', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-13 04:16:56.706791', '2018-13-11 10:16:56 AM', '2018-11-13 04:16:56.706791'),
(51, 'rana', '4', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 04:07:14.094924', '', '2018-11-13 04:07:14.094924'),
(52, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-13 05:30:57.953076', '2018-11-13 11:30:57 AM', '2018-11-13 05:30:57.953076'),
(53, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 04:32:28.441206', '', '2018-11-13 04:32:28.441206'),
(54, 'admin2', '', '::1', '0', 'Chrome', 'Computer', '', '2018-11-13 04:33:55.738633', '', '2018-11-13 04:33:55.738633'),
(55, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 04:35:16.739670', '2018-13-11 10:35:16 AM', '2018-11-13 04:35:16.739670'),
(56, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 04:35:24.258073', '', '2018-11-13 04:35:24.258073'),
(57, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 05:15:20.271718', '2018-13-11 11:15:20 AM', '2018-11-13 05:15:20.271718'),
(58, 'admin2', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 05:16:07.893702', '2018-13-11 11:16:07 AM', '2018-11-13 05:16:07.893702'),
(59, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 05:16:10.295501', '', '2018-11-13 05:16:10.295501'),
(60, 'admin', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 05:29:52.678961', '2018-13-11 11:29:52 AM', '2018-11-13 05:29:52.678961'),
(61, 'admin', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-13 05:30:53.471398', '2018-13-11 11:30:53 AM', '2018-11-13 05:30:53.471398'),
(62, 'admin2', '', '::1', '0', 'Firefox', 'Computer', '', '2018-11-13 05:31:10.603604', '', '2018-11-13 05:31:10.603604'),
(63, 'admin2', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-18 03:34:09.427011', '2018-18-11 09:34:09 AM', '2018-11-18 03:34:09.427011'),
(64, 'admin', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-13 05:31:57.385745', '', '2018-11-13 05:31:57.385745'),
(65, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'DESKTOP-N65QGSV', '1', '2018-11-15 04:43:44.522058', '2018-11-15 10:43:44 AM', '2018-11-15 04:43:44.522058'),
(66, '', '1', '::1', 'Windows 10', 'Firefox', 'DESKTOP-N65QGSV', '1', '2018-11-15 16:44:23.453186', '', '2018-11-15 16:44:23.453186'),
(67, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 00:26:50.038485', '', '2018-11-16 00:26:50.038485'),
(68, 'admin', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 00:27:01.131494', '', '2018-11-16 00:27:01.131494'),
(69, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 00:30:15.667447', '2018-11-16 06:30:15 AM', '2018-11-16 00:30:15.667447'),
(70, 'saif', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '0', '2018-11-16 00:30:24.243615', '', '2018-11-16 00:30:24.243615'),
(71, 'admin', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 00:30:36.590365', '', '2018-11-16 00:30:36.590365'),
(72, 'saif', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 00:38:00.817658', '2018-11-16 06:38:00 AM', '2018-11-16 00:38:00.817658'),
(73, 'admin', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 01:54:02.079354', '2018-16-11 07:54:02 AM', '2018-11-16 01:54:02.079354'),
(74, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 05:15:29.027677', '', '2018-11-16 05:15:29.027677'),
(75, 'admin', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 05:17:47.464047', '', '2018-11-16 05:17:47.464047'),
(76, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-16 08:41:14.441292', '', '2018-11-16 08:41:14.441292'),
(77, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 02:30:15.960352', '', '2018-11-17 02:30:15.960352'),
(78, 'admin', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-17 03:50:32.041389', '', '2018-11-17 03:50:32.041389'),
(79, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 04:55:18.968225', '', '2018-11-17 04:55:18.968225'),
(80, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 06:21:42.137252', '', '2018-11-17 06:21:42.137252'),
(81, 'rana', '4', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-17 09:00:55.415052', '2018-11-17 03:00:55 PM', '2018-11-17 09:00:55.415052'),
(82, 'admin', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 09:27:42.793115', '2018-17-11 03:27:42 PM', '2018-11-17 09:27:42.793115'),
(83, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 09:58:32.924380', '2018-11-17 03:58:32 PM', '2018-11-17 09:58:32.924380'),
(84, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 09:58:47.151958', '', '2018-11-17 09:58:47.151958'),
(85, 'admin', '3', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 10:00:52.063171', '2018-17-11 04:00:52 PM', '2018-11-17 10:00:52.063171'),
(86, '', '1', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-17 10:00:55.859606', '', '2018-11-17 10:00:55.859606'),
(87, 'admin', '3', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-17 10:08:09.346329', '2018-17-11 04:08:09 PM', '2018-11-17 10:08:09.346329'),
(88, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-17 10:08:15.199480', '', '2018-11-17 10:08:15.199480'),
(89, '', '1', '::1', 'Windows 10', 'Chrome', 'Syful-IT', '1', '2018-11-17 10:09:24.054871', '', '2018-11-17 10:09:24.054871'),
(90, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-18 05:03:48.783395', '2018-11-18 11:03:48 AM', '2018-11-18 05:03:48.783395'),
(91, 'rana', '4', '::1', 'Windows 10', 'Firefox', 'Syful-IT', '1', '2018-11-18 05:58:36.423869', '', '2018-11-18 05:58:36.423869');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_namePlate` varchar(200) NOT NULL,
  `temp_car` varchar(20) NOT NULL,
  `car_type` varchar(100) NOT NULL,
  `car_capacity` varchar(255) NOT NULL,
  `car_img1` varchar(255) NOT NULL,
  `car_img2` varchar(255) NOT NULL,
  `car_img3` varchar(100) NOT NULL,
  `car_door` varchar(50) NOT NULL,
  `car_gearbox` varchar(50) NOT NULL,
  `car_gps` varchar(50) NOT NULL,
  `car_aircobdition` varchar(100) NOT NULL,
  `car_power_doorLock` varchar(100) NOT NULL,
  `car_cdPlayer` varchar(100) NOT NULL,
  `car_remarks` varchar(255) NOT NULL,
  `show_status` varchar(6) NOT NULL,
  `update_time` varchar(100) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`car_id`, `car_name`, `car_namePlate`, `temp_car`, `car_type`, `car_capacity`, `car_img1`, `car_img2`, `car_img3`, `car_door`, `car_gearbox`, `car_gps`, `car_aircobdition`, `car_power_doorLock`, `car_cdPlayer`, `car_remarks`, `show_status`, `update_time`, `reg_time`) VALUES
(14, 'Toyotassss', 'DM-THA-15-7080', '1', 'CNG', '6', 'ddd (1).jpg', 'dsssss.jpg', 'ddd (2).jpg', '6', 'Manual', '1', '1', '1', '1', 'this is demo ttttttttttttttttttttttttttt', '1', '', '2018-11-13 05:25:44'),
(16, 'Suzuki', 'DM-THA-15-7079', '1', 'Petrol', '7', 'ddd (2).jpg', 'dsssss.jpg', 'ddd (1).jpg', '', '', '', '0', '1', '1', 'dfhfghg', '1', '', '2018-11-13 05:25:47'),
(17, 'Nissan 2', 'DM-THA-15-7078', '0', 'Petrol', '4', 'rewre.jpg', 'dhtrhtr.jpg', 'ertyrey.jpg', '4', 'Automatic', '0', '1', '1', '1', '								This is Nissan car ............... Updated<br>							', '1', '', '2018-11-13 05:22:49'),
(25, 'Hiace\r\n', 'DM-CHA-15-7076\r\n', '0', 'CNG', '6', 'IMG_7944.JPG', 'IMG_7950.JPG', 'IMG_7952.JPG', '4', 'Automatic', '1', '1', '1', '1', 'This is demon', '1', '', '2018-11-13 05:25:27'),
(26, 'Toytota Noah', 'DM-DHA-15-7081', '0', 'CNG', '6', 'IMG_7929.JPG', 'IMG_7938.JPG', 'IMG_7943.JPG', '4', 'Automatic', '1', '1', '1', '1', '', '1', '', '2018-11-13 05:23:42'),
(27, 'Toytota', 'DM-DHA-15-7083', '0', 'CNG', '6', 'IMG_7915.JPG', 'IMG_7910.JPG', 'IMG_7911.JPG', '4', 'Automatic', '1', '1', '1', '1', '', '1', '', '2018-11-13 05:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_contract` varchar(100) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_officeId` varchar(20) NOT NULL,
  `user_status` varchar(6) NOT NULL,
  `user_update` varchar(20) NOT NULL,
  `user_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_contract`, `user_img`, `user_officeId`, `user_status`, `user_update`, `user_reg`) VALUES
(1, 'saif', '5683', '8888888888888', 'download.jpg', '5555555555', '1', '', '2018-11-16 00:30:46'),
(4, 'rana', '5683', '2147483647', 'hdfhgfd.png', 'BG-9999990', '1', '13-10-2018 10:36:08 ', '2018-11-11 11:30:39'),
(5, 'user', '12345', '2147483647', '0003.jpg', 'BG-998777666666666', '0', '', '2018-11-16 00:30:50'),
(6, 'hadi', '12345', '14548645', 'download.png', '014894894', '1', '', '2018-11-07 13:27:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `car_booking`
--
ALTER TABLE `car_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `car_driver`
--
ALTER TABLE `car_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `driver_leave`
--
ALTER TABLE `driver_leave`
  ADD PRIMARY KEY (`driver_leave_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car_booking`
--
ALTER TABLE `car_booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `car_driver`
--
ALTER TABLE `car_driver`
  MODIFY `driver_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `driver_leave`
--
ALTER TABLE `driver_leave`
  MODIFY `driver_leave_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loginlog`
--
ALTER TABLE `loginlog`
  MODIFY `login_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `car_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
