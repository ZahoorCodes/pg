-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 05:22 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jkpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `pg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `pg_id`, `user_id`, `comment`) VALUES
(1, 7, 5, 'test'),
(2, 7, 5, 'test'),
(3, 7, 5, 'test'),
(4, 10, 5, 'test'),
(5, 9, 5, 'test'),
(6, 0, 0, 'TEST'),
(7, 15, 0, 'TEST'),
(8, 0, 5, 'TEST'),
(9, 15, 5, 'TEST'),
(10, 7, 13, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `name`, `region_id`, `created_at`, `update_at`) VALUES
(1, 'Jammu', 1, '2018-10-09 16:18:00', '0000-00-00 00:00:00'),
(2, 'Udhampur', 1, '2018-10-09 17:51:11', '0000-00-00 00:00:00'),
(3, 'Anantnag', 2, '2018-10-09 17:51:53', '0000-00-00 00:00:00'),
(4, 'Baramulla', 2, '2018-10-26 09:05:28', '0000-00-00 00:00:00'),
(5, 'Ganderbal', 2, '2018-10-26 09:05:48', '0000-00-00 00:00:00'),
(6, 'Kathua', 1, '2018-10-26 09:06:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facilite`
--

CREATE TABLE `tbl_facilite` (
  `id` int(11) NOT NULL,
  `facility_name` varchar(100) DEFAULT NULL,
  `facility_icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_facilite`
--

INSERT INTO `tbl_facilite` (`id`, `facility_name`, `facility_icon`, `created_at`, `updated_at`) VALUES
(7, 'In-Unit Washer', '', '2018-11-29 12:20:46', '2018-11-20 12:21:56'),
(8, 'Parking Lot', 'car', '2018-11-29 12:13:36', '2018-11-20 16:23:21'),
(10, 'Fully Furnished', 'building', '2018-11-29 12:14:35', '0000-00-00 00:00:00'),
(11, 'new facility', NULL, '2018-12-02 10:03:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locality`
--

CREATE TABLE `tbl_locality` (
  `id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pincode` int(5) DEFAULT NULL,
  `creqted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_locality`
--

INSERT INTO `tbl_locality` (`id`, `district_id`, `name`, `pincode`, `creqted_at`, `updated_at`) VALUES
(1, 1, 'Janipur', 180007, '2018-10-09 17:48:57', '0000-00-00 00:00:00'),
(3, 3, 'KP Road', NULL, '2018-10-09 18:27:52', '0000-00-00 00:00:00'),
(4, 1, 'Kot Bhalwal', NULL, '2018-10-10 04:55:07', '0000-00-00 00:00:00'),
(5, 3, 'Bijbehara', NULL, '2018-10-12 06:18:37', '0000-00-00 00:00:00'),
(6, 3, 'srigufwara', NULL, '2018-11-13 06:35:35', '0000-00-00 00:00:00'),
(7, 1, 'Bantalab', NULL, '2018-11-13 15:17:23', '0000-00-00 00:00:00'),
(8, 1, 'Vijay Pur', NULL, '2018-11-13 15:57:49', '0000-00-00 00:00:00'),
(9, 2, 'Roop Nagar', NULL, '2018-11-20 11:29:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pg`
--

CREATE TABLE `tbl_pg` (
  `id` int(11) NOT NULL,
  `pg_title` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `locality_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `budget_per_month` int(11) DEFAULT NULL,
  `meal_type` tinyint(2) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `pg_description` text NOT NULL,
  `lat` decimal(12,8) DEFAULT NULL,
  `lon` decimal(12,8) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pg`
--

INSERT INTO `tbl_pg` (`id`, `pg_title`, `address`, `locality_id`, `region_id`, `district_id`, `user_id`, `budget_per_month`, `meal_type`, `contact`, `img`, `video`, `pg_description`, `lat`, `lon`, `landmark`, `created_at`, `updated_at`, `status`) VALUES
(6, 'Tadaka Pg', '548 janipur colony', 1, 1, 1, 9, 6000, 0, '8491965432', 'images/pgs/2929-1111-1818-1543486041.jpeg', 'videos/videoplayback.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'EasyDay', '2019-03-31 19:31:28', '2018-12-05 13:21:09', 1),
(7, 'BREAKUP PROBLEM', 'test', 6, 2, 3, 9, 123, 0, '8491965432', 'images/pgs/2929-1111-1818-1543486145.jpeg', 'videos/videoplayback.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'EasyDay', '2019-03-31 19:31:31', '2018-12-05 13:21:00', 1),
(9, 'Nadira Hostel', 'Janipur', 1, 1, 1, 9, 5000, 0, '7051672128', 'images/pgs/2929-1111-1818-1543495605.jpeg', 'videos/videoplayback.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'EasyDay', '2019-03-31 19:31:35', '2018-12-01 13:38:34', 1),
(10, 'Wani and sons', 'zirpara, Bijbehara', 5, 2, 3, 9, 3000, 0, '7051672128', 'images/pgs/2929-1111-1818-1543496435.jpeg', 'videos/videoplayback.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'J&amp;K Bank', '2024-06-12 15:09:11', '2024-06-12 15:09:11', 2),
(11, 'test', 'Test Address', 5, 2, 3, 9, 6000, 0, '12345678', 'images/pgs/2929-1111-1818-1543496701.jpeg', 'videos/videoplayback.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'EasyDay', '2019-03-31 19:31:19', '2018-12-05 13:21:05', 1),
(12, 'Best', 'kathsu', 6, 2, 3, 9, 4000, 0, '7051672128', 'images/pgs/2929-1111-1818-1543497061.jpeg', 'videos/videoplayback.mp4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'Public Park', '2019-03-31 19:31:23', '2018-12-01 13:28:46', 1),
(13, 'jammu', '676bantlab', 4, 1, 1, 10, 3456, 0, '7889760745', 'images/pgs/3030-1111-1818-1543575776.jpeg', '', 'sdgjlzxvbnmytrtyuiLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'J&amp;K Bank', '2019-03-31 19:30:51', '2018-12-01 13:28:55', 1),
(14, 'Akram PG for Boys_edit', '548 janipur colony_edit', 3, 2, 3, 11, 30000, 0, '7889760747', 'images/pgs/0101-1212-1818-1543661170.jpeg', 'videos/videoplayback.mp4', 'This is a good pg  _testLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'EasyDay_test', '2019-03-31 19:31:13', '2018-12-01 13:29:02', 1),
(15, 'my pg', 'Janipur, Jammu', 1, 1, 1, 5, 5000, 2, '8713000000', 'images/pgs/3131-0303-1919-1554023770.jpeg', 'videos/VID_20190320_120245.3gp', 'A colleague is someone you work with at your job. When you are a teacher, the other teachers are your colleagues. When you work as a cashier at 7-11, the guy at the deli counter is your colleague as well. Your colleagues are usually people at the same level or rank as you are.', NULL, NULL, 'ATM JK Bank', '2019-03-31 10:36:40', '2019-03-31 10:36:40', 1),
(16, 'my second pg', 'Bathindi, Jammu', 8, 1, 1, 5, 2000, 1, '1234567890`', 'images/pgs/3131-0303-1919-1554029231.jpeg', 'videos/videoplayback.mp4', 'testLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget mi sem. Nulla facilisi. Sed ultricies eros a nibh tempus, in sodales mi vestibulum. Nullam quis dui ac nisl ultrices euismod et sit amet urna. Morbi semper sapien quis ex tempor, sit amet scelerisque eros rhoncus. Cras scelerisque auctor gravida. Nunc fermentum luctus rhoncus. Nulla vulputate fermentum convallis. In quis pellentesque tortor. Cras metus nibh, gravida vitae ante vel, finibus semper tellus. Nulla vel tincidunt magna. Morbi tempor velit lectus, eu commodo quam volutpat vitae.', NULL, NULL, 'Makkah Masjid', '2019-03-31 19:30:59', '2019-03-31 10:47:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgfacility`
--

CREATE TABLE `tbl_pgfacility` (
  `facility_id` int(11) DEFAULT NULL,
  `pg_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pgfacility`
--

INSERT INTO `tbl_pgfacility` (`facility_id`, `pg_id`) VALUES
(8, 6),
(10, 6),
(8, 7),
(10, 9),
(7, 10),
(8, 10),
(10, 10),
(7, 11),
(8, 11),
(10, 11),
(7, 12),
(8, 12),
(7, 13),
(8, 13),
(10, 13),
(10, 14),
(7, 15),
(8, 15),
(10, 15),
(11, 15),
(7, 16),
(8, 16),
(10, 16),
(11, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgrules`
--

CREATE TABLE `tbl_pgrules` (
  `pg_id` int(11) DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pgrules`
--

INSERT INTO `tbl_pgrules` (`pg_id`, `rule_id`) VALUES
(6, 3),
(6, 5),
(7, 4),
(9, 3),
(9, 5),
(10, 4),
(11, 3),
(11, 4),
(11, 5),
(12, 4),
(12, 5),
(13, 3),
(13, 4),
(13, 5),
(14, 4),
(14, 6),
(15, 3),
(15, 4),
(15, 6),
(15, 7),
(16, 3),
(16, 4),
(16, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pg_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `user_id`, `pg_id`, `rating`) VALUES
(12, 5, 16, 5),
(13, 5, 15, 5),
(14, 5, 6, 2),
(15, 5, 7, 1),
(16, 5, 9, 3),
(18, 6, 16, 4),
(23, 6, 15, 4),
(24, 6, 12, 3),
(25, 13, 15, 5),
(26, 13, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_region`
--

CREATE TABLE `tbl_region` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_region`
--

INSERT INTO `tbl_region` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Jammu', '2018-11-20 17:42:29', '2018-11-20 17:42:29'),
(2, 'Kashmir', '2018-09-30 13:06:16', '0000-00-00 00:00:00'),
(9, 'Ladakh', '2018-10-10 04:54:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rule`
--

CREATE TABLE `tbl_rule` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated__at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rule`
--

INSERT INTO `tbl_rule` (`id`, `name`, `description`, `created_at`, `updated__at`) VALUES
(3, 'No Late Entry', NULL, '2018-11-20 17:08:41', '0000-00-00 00:00:00'),
(4, 'No Alcohal', NULL, '2018-11-20 18:09:47', '0000-00-00 00:00:00'),
(5, 'No Boys Allowed', NULL, '2018-11-22 09:06:42', '0000-00-00 00:00:00'),
(6, 'NO GIRLS ALLOWED', NULL, '2018-11-30 11:07:02', '0000-00-00 00:00:00'),
(7, 'test', NULL, '2018-12-01 11:24:26', '0000-00-00 00:00:00'),
(8, 'no exit', NULL, '2024-06-12 15:09:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `encrypted_password` varchar(100) DEFAULT NULL,
  `user_type` tinyint(5) DEFAULT NULL,
  `gender` tinyint(3) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `contact`, `encrypted_password`, `user_type`, `gender`, `image`, `created_at`) VALUES
(5, 'aadil bhat', 'd@gm.com', '8491965432', '123', 1, 1, 'images/users/28-11-18-1543396788.png', '2018-12-06 08:10:02'),
(6, 'zahoor ', 'zahoor@gmail.com', '8491965432', '123', 1, 1, 'images/users/28-11-18-1543397664.png', '2020-01-19 09:33:32'),
(7, 'aadil bhat', '1234567d@gm.com', '8491965432', '121', 1, 1, 'images/users/28-11-18-1543397731.png', '2018-12-06 08:10:05'),
(8, 'aadil bhat', 'sssssssssssd@gm.com', '8491965432', '121', 1, 1, 'images/users/29-11-18-1543463852.png', '2018-12-06 08:10:07'),
(9, 'aadil bhat', 'd@gm.comss', '8491965432', '121', 1, 1, 'images/users/29-11-18-1543485642.jpeg', '2018-12-06 08:10:57'),
(10, 'nazia', 'naziaakhtar72@gmail.com', '7889760745', '123', 1, 2, 'images/users/30-11-18-1543575657.jpeg', '2018-12-06 08:11:05'),
(11, 'aadil bhat', 'k@k.com', '8491965432', 'qwerty', 1, 1, 'images/users/30-11-18-1543577420.jpeg', '2018-12-06 08:11:02'),
(12, 'test user', 'email@gmil.com', '8491965432', '123', 1, 1, 'images/users/05-12-18-1543999897.jpeg', '2018-12-06 08:11:11'),
(13, 'zahoor', 'admin@demo.com', '1234567890', 'admin', 2, 1, 'images/users/11-08-20-1597159890.jpeg', '2020-08-11 15:31:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `tbl_facilite`
--
ALTER TABLE `tbl_facilite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_locality`
--
ALTER TABLE `tbl_locality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lodis` (`district_id`);

--
-- Indexes for table `tbl_pg`
--
ALTER TABLE `tbl_pg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preg` (`region_id`),
  ADD KEY `fk_pdis` (`district_id`),
  ADD KEY `fk_puse` (`user_id`),
  ADD KEY `fk_loclality` (`locality_id`);

--
-- Indexes for table `tbl_pgfacility`
--
ALTER TABLE `tbl_pgfacility`
  ADD KEY `fk_pfac` (`facility_id`),
  ADD KEY `fk_pgid` (`pg_id`);

--
-- Indexes for table `tbl_pgrules`
--
ALTER TABLE `tbl_pgrules`
  ADD KEY `fk_pid` (`pg_id`),
  ADD KEY `fk_ruid` (`rule_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pg_id` (`pg_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rule`
--
ALTER TABLE `tbl_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_facilite`
--
ALTER TABLE `tbl_facilite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_locality`
--
ALTER TABLE `tbl_locality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pg`
--
ALTER TABLE `tbl_pg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_region`
--
ALTER TABLE `tbl_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_rule`
--
ALTER TABLE `tbl_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD CONSTRAINT `tbl_district_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `tbl_region` (`id`);

--
-- Constraints for table `tbl_locality`
--
ALTER TABLE `tbl_locality`
  ADD CONSTRAINT `fk_lodis` FOREIGN KEY (`district_id`) REFERENCES `tbl_district` (`id`);

--
-- Constraints for table `tbl_pg`
--
ALTER TABLE `tbl_pg`
  ADD CONSTRAINT `fk_loclality` FOREIGN KEY (`locality_id`) REFERENCES `tbl_locality` (`id`),
  ADD CONSTRAINT `fk_pdis` FOREIGN KEY (`district_id`) REFERENCES `tbl_district` (`id`),
  ADD CONSTRAINT `fk_preg` FOREIGN KEY (`region_id`) REFERENCES `tbl_region` (`id`),
  ADD CONSTRAINT `fk_puse` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_pgfacility`
--
ALTER TABLE `tbl_pgfacility`
  ADD CONSTRAINT `fk_pfac` FOREIGN KEY (`facility_id`) REFERENCES `tbl_facilite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pgid` FOREIGN KEY (`pg_id`) REFERENCES `tbl_pg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pgrules`
--
ALTER TABLE `tbl_pgrules`
  ADD CONSTRAINT `fk_pid` FOREIGN KEY (`pg_id`) REFERENCES `tbl_pg` (`id`),
  ADD CONSTRAINT `tbl_pgrules_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `tbl_rule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `tbl_rating_ibfk_1` FOREIGN KEY (`pg_id`) REFERENCES `tbl_pg` (`id`),
  ADD CONSTRAINT `tbl_rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
