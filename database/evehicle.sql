-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 01:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `book_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `l_id` int(11) DEFAULT NULL,
  `date_for_booking` date DEFAULT NULL,
  `time_for_booking` time DEFAULT '12:00:00',
  `payment_type` int(4) DEFAULT NULL COMMENT '1-Online , 2-COD , 3-Refunded',
  `online_payment_id` varchar(50) NOT NULL DEFAULT 'Cash On Delivery',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `color` varchar(50) NOT NULL,
  `booking_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=Canceled\r\n1=Pending\r\n2=Delivered\r\n3=Refund',
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`book_id`, `vehicle_id`, `l_id`, `date_for_booking`, `time_for_booking`, `payment_type`, `online_payment_id`, `timestamp`, `color`, `booking_status`, `amount`) VALUES
(1, 1, 2, '2024-04-23', '12:00:00', 1, 'pay_Nqe4xQaE9HsBo8', '2024-03-25 15:57:13', ' Stealth Black', 1, 143000),
(2, 2, 2, '2024-03-29', '12:00:00', 2, 'Cash On Delivery', '2024-03-25 15:58:45', ' White', 1, 560000),
(3, 2, 2, '2024-03-27', '12:00:00', 1, 'pay_Nqe7QGJiqd9lzR', '2024-03-25 15:59:34', ' Shadow', 1, 560000),
(4, 5, 2, '2024-04-12', '12:00:00', 2, 'Cash On Delivery', '2024-03-25 16:06:13', ' Blaze Red', 1, 184000),
(5, 6, 3, '2024-03-26', '12:00:00', 2, 'Cash On Delivery', '2024-03-25 16:25:11', 'Red', 1, 135000),
(6, 4, 3, '2024-04-02', '12:00:00', 1, 'pay_NqeaeuxCpmXBcp', '2024-03-25 16:27:14', ' Red', 1, 187000),
(7, 9, 3, '2024-03-27', '12:00:00', 1, 'pay_NqecDfCWlWCwI9', '2024-03-25 16:28:43', ' Space Grey', 1, 145000),
(8, 11, 4, '2024-04-16', '12:00:00', 1, 'pay_NqenOnkvdCiWan', '2024-03-25 16:39:17', ' Liquid Silver', 1, 110000),
(9, 7, 4, '2024-03-26', '12:00:00', 2, 'Cash On Delivery', '2024-03-25 16:39:49', ' Steller Blue', 1, 130000),
(10, 12, 4, '2024-04-12', '12:00:00', 1, 'pay_NqephIYgdxQ56f', '2024-03-25 16:41:28', 'Maroon', 1, 130000),
(11, 7, 5, '2024-03-25', '12:00:00', 1, 'pay_NqfaL2q1NUcEaf', '2024-03-25 17:25:37', ' Steller Blue', 2, 130000),
(12, 2, 5, '2024-05-13', '12:00:00', 1, 'pay_NqfjS2yWhM2n0o', '2024-03-25 17:34:15', ' Shadow', 0, 560000),
(13, 5, 5, '2024-10-12', '12:00:00', 3, 'Cash On Delivery', '2024-03-25 17:35:14', ' Nord Grey', 3, 0),
(14, 2, 5, '2024-04-12', '12:00:00', 3, 'pay_Nqflgjnwx8vE1i', '2024-03-25 17:36:22', ' Shadow', 3, 0),
(15, 12, 5, '2024-04-01', '12:00:00', 1, 'pay_Nqfmv5Obk5XWwf', '2024-03-25 17:37:37', ' Blue', 1, 130000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_table`
--

CREATE TABLE `detail_table` (
  `detail_id` int(11) NOT NULL,
  `l_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_table`
--

INSERT INTO `detail_table` (`detail_id`, `l_id`, `name`, `dob`, `address`) VALUES
(1, 1, 'admin', '2004-01-23', 'Amreli'),
(2, 2, 'jenil', '2004-01-23', 'Amreli'),
(3, 3, 'jaydeep', '2004-01-22', 'Nikol'),
(4, 4, 'ansh', '2004-09-06', 'Maninagar'),
(5, 5, 'userr', '2004-01-25', 'Nikol'),
(6, 6, 'ex', '2004-01-23', 'Amreli\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `l_id` int(11) DEFAULT NULL,
  `ratings` int(4) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `l_id`, `ratings`, `comment`) VALUES
(1, 2, 5, 'Vehicle service is good at store.'),
(2, 2, 5, 'Vehicle Delivery Is Fast\r\n'),
(3, 3, 5, 'Good Service Provider'),
(4, 3, 4, 'Good Costumer Care Service'),
(5, 4, 4, 'Best Website\r\n'),
(6, 5, 5, 'Good Website'),
(7, 5, 5, 'Good Website'),
(8, 6, 5, 'Good Site');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `l_id` int(11) NOT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `phone_no` bigint(10) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `dp` varchar(50) DEFAULT NULL,
  `role` int(4) DEFAULT NULL COMMENT '1=Admin\r\n2=User',
  `status` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`l_id`, `email_id`, `phone_no`, `password`, `dp`, `role`, `status`) VALUES
(1, 'admin@gmail.com', 9898989898, 'admin', '1711381590.jpeg', 1, 1),
(2, 'jenil@gmail.com', 9265899732, 'jenil123', 'Star (Empty).png', 2, 1),
(3, 'jaydeep@gmail.com', 8799522081, 'jaydeep1', 'boy2.jpeg', 2, 1),
(4, 'ansh@gmail.com', 6353387413, 'ansh123', 'flash.jpg', 2, 1),
(5, 'user@gmail.com', 8667446545, 'user1234', 'boy1.jpeg', 2, 1),
(6, 'ex12@gmail.com', 9265899732, 'ex123', '1711448131.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `pay_id` varchar(50) NOT NULL,
  `pay_status` int(1) NOT NULL DEFAULT 1 COMMENT '0-Failed\r\n1-Success\r\n2=Refund',
  `l_id` int(11) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `payment_for` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_table`
--

INSERT INTO `payment_table` (`pay_id`, `pay_status`, `l_id`, `payment_amount`, `payment_for`, `product_id`, `timestamp`) VALUES
('pay_Nqe4xQaE9HsBo8', 1, 2, 143000, 'E-Vehicle', 1, '2024-03-25 15:57:13.191654'),
('pay_Nqe7QGJiqd9lzR', 1, 2, 560000, 'E-Vehicle', 2, '2024-03-25 15:59:34.301174'),
('pay_Nqe9ivsOjlI5QT', 1, 2, 1500, 'Services', 1, '2024-03-25 16:01:46.829986'),
('pay_NqeaeuxCpmXBcp', 1, 3, 187000, 'E-Vehicle', 4, '2024-03-25 16:27:14.459187'),
('pay_NqeBoPw50ouhNO', 1, 2, 2500, 'Services', 2, '2024-03-25 16:03:42.328425'),
('pay_NqecDfCWlWCwI9', 1, 3, 145000, 'E-Vehicle', 9, '2024-03-25 16:28:43.317813'),
('pay_Nqef44jlGApT33', 1, 3, 1500, 'Services', 1, '2024-03-25 16:31:24.917126'),
('pay_NqegbYpIwaEuCN', 1, 3, 2500, 'Services', 2, '2024-03-25 16:32:52.138346'),
('pay_NqenOnkvdCiWan', 1, 4, 110000, 'E-Vehicle', 11, '2024-03-25 16:39:17.350180'),
('pay_NqephIYgdxQ56f', 1, 4, 130000, 'E-Vehicle', 12, '2024-03-25 16:41:28.257505'),
('pay_NqeqnkK9ONc5ji', 1, 4, 1500, 'Services', 1, '2024-03-25 16:42:30.256578'),
('pay_Nqf4rMvKCXNPiY', 1, 4, 2500, 'Services', 2, '2024-03-25 16:55:48.735716'),
('pay_NqfaL2q1NUcEaf', 1, 5, 130000, 'E-Vehicle', 7, '2024-03-25 17:25:37.782566'),
('pay_NqfjS2yWhM2n0o', 1, 5, 560000, 'E-Vehicle', 2, '2024-03-25 17:34:15.172298'),
('pay_Nqflgjnwx8vE1i', 2, 5, 560000, 'E-Vehicle', 2, '2024-03-26 06:14:49.111548'),
('pay_Nqfmv5Obk5XWwf', 1, 5, 130000, 'E-Vehicle', 12, '2024-03-25 17:37:37.356484'),
('pay_NqfosjkxHyyUfe', 1, 5, 2500, 'Services', 2, '2024-03-25 17:39:24.373959'),
('pay_Nqfq96a0ZCadZx', 1, 5, 1500, 'Services', 1, '2024-03-25 17:40:34.928741'),
('pay_NqrUyEwTdLDqhn', 1, 5, 2500, 'Services', 2, '2024-03-26 05:04:51.671399');

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

CREATE TABLE `service_booking` (
  `booking_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `l_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `store_name` varchar(50) NOT NULL,
  `date_for_book_service` date DEFAULT NULL,
  `time_for_book_service` time DEFAULT '12:00:00',
  `payment_type` int(4) DEFAULT NULL COMMENT '1-Online , 2-COD , 3-Refunded',
  `online_payment_id` varchar(50) NOT NULL DEFAULT 'Cash On Delivery',
  `service_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=Canceled\r\n1=Pending\r\n2=Complated\r\n3=Refund',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_booking`
--

INSERT INTO `service_booking` (`booking_id`, `service_id`, `l_id`, `address`, `store_name`, `date_for_book_service`, `time_for_book_service`, `payment_type`, `online_payment_id`, `service_status`, `timestamp`, `amount`) VALUES
(1, 1, 2, 'Nehrunagar', 'EV24 Iscon', '2024-03-26', '12:00:00', 2, 'Cash On Delivery', 1, '2024-03-25 16:00:13', 1500),
(2, 1, 2, 'Prahlad Nagar', 'EV24 Iscon', '2024-04-15', '12:00:00', 1, 'pay_Nqe9ivsOjlI5QT', 1, '2024-03-25 16:01:46', 1500),
(3, 2, 2, 'Metro', 'EV24 Thaltej', '2024-04-20', '12:00:00', 1, 'pay_NqeBoPw50ouhNO', 1, '2024-03-25 16:03:42', 2500),
(4, 1, 3, 'Maninagar', 'EV24 Maninagar', '2024-04-12', '12:00:00', 2, 'Cash On Delivery', 1, '2024-03-25 16:30:35', 1500),
(5, 1, 3, 'Nikol', 'EV24 Nikol', '2024-03-26', '12:00:00', 1, 'pay_Nqef44jlGApT33', 1, '2024-03-25 16:31:24', 1500),
(6, 2, 3, 'Thaltej', 'EV24 Thaltej', '2024-04-05', '12:00:00', 1, 'pay_NqegbYpIwaEuCN', 1, '2024-03-25 16:32:52', 2500),
(7, 1, 4, 'Nikol', 'EV24 Nikol', '2024-03-26', '12:00:00', 1, 'pay_NqeqnkK9ONc5ji', 1, '2024-03-25 16:42:30', 1500),
(8, 2, 4, 'Kalol', 'EV24 Navrangpura', '2024-04-27', '12:00:00', 2, 'Cash On Delivery', 1, '2024-03-25 16:44:09', 2500),
(9, 2, 4, 'Maninagar', 'EV24 Maninagar', '2024-04-12', '12:00:00', 1, 'pay_Nqf4rMvKCXNPiY', 1, '2024-03-25 16:55:48', 2500),
(10, 2, 5, 'Nikol', 'EV24 Nikol', '2024-10-12', '12:00:00', 3, 'Cash On Delivery', 3, '2024-03-25 17:27:35', 0),
(11, 2, 5, 'Maninnagar', 'EV24 Maninagar', '2024-04-01', '12:00:00', 1, 'pay_NqfosjkxHyyUfe', 2, '2024-03-25 17:39:24', 2500),
(12, 1, 5, 'Isocn', 'EV24 Iscon', '2024-03-26', '12:00:00', 2, 'Cash On Delivery', 1, '2024-03-25 17:39:52', 1500),
(13, 1, 5, 'Iscon', 'EV24 Iscon', '2025-01-12', '12:00:00', 1, 'pay_Nqfq96a0ZCadZx', 0, '2024-03-25 17:40:34', 1500),
(14, 1, 5, 'Iscon', 'EV24 Iscon', '2025-01-12', '12:00:00', 2, 'Cash On Delivery', 1, '2024-03-25 17:41:41', 1500),
(15, 2, 5, 'Iscon', 'EV24 Iscon', '2024-03-25', '12:00:00', 1, 'pay_NqrUyEwTdLDqhn', 1, '2024-03-26 05:04:51', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `service_store_details_table`
--

CREATE TABLE `service_store_details_table` (
  `area_id` int(11) NOT NULL,
  `area_location` varchar(50) DEFAULT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_manager_name` varchar(50) NOT NULL,
  `store_contact_no` bigint(10) NOT NULL,
  `store_full_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_store_details_table`
--

INSERT INTO `service_store_details_table` (`area_id`, `area_location`, `store_name`, `store_manager_name`, `store_contact_no`, `store_full_address`) VALUES
(1, 'EV24 Iscon', 'EV24 Iscon', 'Hardik Khokhar', 9223372036, 'Shop -107 Xyx Complex Iscon'),
(2, 'EV24 Navrangpura', 'EV24 Navrangpura', 'Sahil Kathiriya', 2323232323, 'Shop Number - 4, ABC Complex, Navrangpura'),
(3, 'EV24 Maninagar', 'EV24 Maninagar', 'Krunal Gajera', 3434343434, 'Shop - 103, 1st floor, Anudhi Complex, Maninagar'),
(4, 'EV24 Nikol', 'EV24 Nikol', 'Jaldeep Kotadiya', 4545454545, 'Shop-101 NTC Complex ,Nikol'),
(5, 'EV24 Bopal', 'EV24 Bopal', 'Ansh Dhanani', 5656565656, 'Shop-109 ABC Complex Bhavya Park,Bopal'),
(6, 'EV24 Thaltej', 'EV24 Thaltej', 'Jaydeep Patoliya', 6767676767, 'Shop-10 DEF Compex ,Near Metro ,Thaltej');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_detail_table`
--

CREATE TABLE `vehicle_detail_table` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_name` varchar(50) DEFAULT NULL,
  `vehicle_image` varchar(50) DEFAULT NULL,
  `vehicle_description` text DEFAULT NULL,
  `vehicle_price` int(8) DEFAULT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_detail_table`
--

INSERT INTO `vehicle_detail_table` (`vehicle_id`, `vehicle_name`, `vehicle_image`, `vehicle_description`, `vehicle_price`, `color`) VALUES
(1, 'Revolt RV400', '1710305139.webp', 'Revolt RV400 is an electric two wheeler with a price tag ranging between Rs.1.43 to Rs. 1.60 Lakh.It is available in 3 variants and 6 colours.Revolt RV400 can run upto 80 km/charge in single charge.RV400 takes approx 4.5 Hr for a full charge and has a top speed of 85 km/Hr.', 143000, 'Cosmic Black, Stealth Black, India Blue, Mist Grey, Eclipse Red, Lightning Yellow'),
(2, 'Ultraviolette F77', '1710305843.jpg', 'Ultraviolette F77 is an electric two wheeler with a price tag ranging between Rs.3.80 to Rs. 5.60 Lakh.It is available in 3 variants and 4 colours.Ultraviolette F77 can run upto 118 km/charge in single charge.F77 takes approx 4 Hr for a full charge and has a top speed of 140 km/Hr.', 560000, 'Airstrike, White, Shadow, Laser'),
(3, 'Oben Rorr', 'oben-electric-bike6230708cc8f3c.webp', 'Oben Rorr is an electric two wheeler with a price tag of Rs.1.50 Lakh. and has a top speed of 100 km/Hr. The battery capacity of the Oben Rorr STD is 4.4 Kwh.The Rorr comes with a Disc brake up front and Disc brake at the rear.You can buy the Rorr in 2 colours - Electric Red, Voltaic Yellow.', 150000, 'Electric Red, Voltaic Yellow'),
(4, 'Tork Kratos R', 'tork kratos r.webp', 'Tork Kratos R is an electric two wheeler with a price tag ranging between Rs.1.67 to Rs. 1.87 Lakh.It is available in 2 variants and 5 colours.Tork Kratos R can run upto 70 km/charge in single charge.Kratos R takes approx 6-7 Hr for a full charge and has a top speed of 105 km/Hr.', 187000, 'Black, Red, Blue, White'),
(5, 'Matter Aera', 'matter-electric-bike.webp', 'Matter Aera is an electric two wheeler with a price tag ranging between Rs.1.74 to Rs. 1.84 Lakh.It is available in 2 variants and 5 colours.Aera takes approx 5 Hr for a full charge and has a top speed of. You can buy the Aera in 5 colours - Cosmic Black, Nord Grey, Blaze Red, Cosmic Blue, Glacier White.', 184000, 'Cosmic Black, Nord Grey, Blaze Red, Cosmic Blue, Glacier White'),
(6, 'One Electric Kridn', 'one electric kridn.webp', 'One Electric Motorcycles Kridn is an electric two wheeler with a price tag of Rs.1.35 Lakh. and has a top speed of 95 km/Hr.The Kridn comes with a Disc brake up front and Disc brake at the rear. As far as safety is concerned, it features Combi Brake System. You can buy the Kridn in 1 colour - Red.', 135000, 'Red'),
(7, 'Ola S1 Pro', 'ola s1pro.webp', 'Ola S1 Pro is an electric two wheeler with a price tag of Rs.1.30 Lakh.It is available in 1 variant and 5 colours.S1 Pro takes approx 6.5 Hr for a full charge and has a top speed of 120 km/Hr.The battery capacity of the Ola S1 Pro Gen 2 is 4 Kwh. The weight of the S1 Pro is 125 kg.', 130000, 'Mat White, Amethyst, Steller Blue, Midnight Blue, Jetblack'),
(8, 'TVS iQube', 'iqube.webp', 'TVS iQube is an electric two wheeler with a price tag ranging between Rs.1.30 to Rs. 1.33 Lakh.It is available in 3 variants and 7 colours.TVS iQube can run upto 75 km/charge in single charge. and has a top speed of 78 km/Hr.The battery capacity of the TVS iQube Electric S is 5.1 Kwh.', 133000, 'Titanium Grey, Mercury Grey, Copper Bronze, Mint Blue, Lucid Yellow, Racing Red, Pearl White'),
(9, 'Ather 450X', 'ather 450.webp', 'Ather 450X is an electric two wheeler with a price tag ranging between Rs.1.38 to Rs. 1.45 Lakh.It is available in 2 variants and 6 colours.Ather 450X can run upto 70 km, Warp-60 km in single charge.450X takes approx 8.36 Hr for a full charge and has a top speed of 90 km/Hr.', 145000, 'Cosmic Black, Still White, True Red, Salt Green, Lunar Grey, Space Grey'),
(11, 'Ola S1 X', 'ola s1 x.webp', 'Ola S1 X is an electric two wheeler with a price tag ranging between Rs.79,999 to Rs. 1.10 Lakh.S1 X takes approx 7.4 Hr for a full charge and has a top speed of 85 km/Hr.The battery capacity of the Ola S1 X 4kWh is 4 Kwh.The S1 X comes with a Disc brake up front and brake at the rear', 110000, 'Vogue, Red Velocity, White, Funk, Midnight, Liquid Silver, Steller'),
(12, 'Hero Electric Optima', 'heroelectric-optima.webp', 'Hero Electric Optima is an electric two wheeler with a price tag ranging between Rs.1.07 to Rs. 1.30 Lakh.Optima takes approx 4.5 Hr for a full charge and has a top speed of 48 km/Hr. The weight of the Optima is 102 kg.The Optima comes with a Drum brake up front and Drum brake at the rear', 130000, 'Maroon, Blue'),
(13, 'Bajaj Chetak', 'bajaj chetak.webp', 'Bajaj Chetak is an electric two wheeler with a price tag ranging between Rs.1.15 to Rs. 1.35 Lakh.It is available in 5 variants and 5 colours.Chetak takes approx 4.3 Hr for a full charge and has a top speed of 63 km/Hr.The battery capacity of the Bajaj Chetak Premium - Standard is 3.2 Kwh.', 135000, 'Brooklyn Black, Cyber White, Matte Coarse Grey, Indigo Metallic, Hazel Nut');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_service_detail`
--

CREATE TABLE `vehicle_service_detail` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(30) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `service_price` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_service_detail`
--

INSERT INTO `vehicle_service_detail` (`service_id`, `service_name`, `service_description`, `service_price`) VALUES
(1, 'Interim Service', 'Interim Service is due every 6 months or 6000 miles, whichever comes first. With a solid 25 point checklist, it is designed to check all the important parts and components of the vehicle.', 1500),
(2, 'Full Vehicle Service', 'A full service is also known as an Intermediate or Silver service, is usually recommended every 12 months or 12,000 miles, whichever comes first. Its ideal for drivers doing lower annual mileages.', 2500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `l_id` (`l_id`),
  ADD KEY `online_payment_id` (`online_payment_id`),
  ADD KEY `vehicle_id` (`vehicle_id`) USING BTREE;

--
-- Indexes for table `detail_table`
--
ALTER TABLE `detail_table`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `l_id` (`l_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `service_store_details_table`
--
ALTER TABLE `service_store_details_table`
  ADD PRIMARY KEY (`area_id`),
  ADD UNIQUE KEY `store_name` (`store_name`);

--
-- Indexes for table `vehicle_detail_table`
--
ALTER TABLE `vehicle_detail_table`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD UNIQUE KEY `vehicle_name` (`vehicle_name`);

--
-- Indexes for table `vehicle_service_detail`
--
ALTER TABLE `vehicle_service_detail`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name` (`service_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_table`
--
ALTER TABLE `detail_table`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_booking`
--
ALTER TABLE `service_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service_store_details_table`
--
ALTER TABLE `service_store_details_table`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle_detail_table`
--
ALTER TABLE `vehicle_detail_table`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vehicle_service_detail`
--
ALTER TABLE `vehicle_service_detail`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD CONSTRAINT `booking_table_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`),
  ADD CONSTRAINT `booking_table_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle_detail_table` (`vehicle_id`);

--
-- Constraints for table `detail_table`
--
ALTER TABLE `detail_table`
  ADD CONSTRAINT `detail_table_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);

--
-- Constraints for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD CONSTRAINT `payment_table_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`);

--
-- Constraints for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD CONSTRAINT `service_booking_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `login_table` (`l_id`),
  ADD CONSTRAINT `service_booking_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `vehicle_service_detail` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
