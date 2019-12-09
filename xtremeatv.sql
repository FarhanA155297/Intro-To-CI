-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2017 at 04:42 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xtremeatv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands_a123456`
--

CREATE TABLE IF NOT EXISTS `tbl_brands_a123456` (
  `fld_brand_id` varchar(50) NOT NULL,
  `fld_brand_name` varchar(100) NOT NULL,
  `fld_brand_country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brands_a123456`
--

INSERT INTO `tbl_brands_a123456` (`fld_brand_id`, `fld_brand_name`, `fld_brand_country`) VALUES
('can', 'Can-Am', 'Canada'),
('hon', 'Honda', 'Japan'),
('pol', 'Polaris', 'USA'),
('suz', 'Suzuki', 'Japan'),
('yam', 'Yamaha', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers_a123456`
--

CREATE TABLE IF NOT EXISTS `tbl_customers_a123456` (
  `fld_customer_num` varchar(255) NOT NULL DEFAULT '',
  `fld_customer_fname` varchar(255) DEFAULT NULL,
  `fld_customer_lname` varchar(255) DEFAULT NULL,
  `fld_customer_gender` varchar(255) DEFAULT NULL,
  `fld_customer_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_a123456`
--

CREATE TABLE IF NOT EXISTS `tbl_orders_a123456` (
  `fld_order_num` varchar(255) NOT NULL DEFAULT '',
  `fld_order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fld_staff_num` varchar(255) DEFAULT NULL,
  `fld_customer_num` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_details_a123456`
--

CREATE TABLE IF NOT EXISTS `tbl_orders_details_a123456` (
  `fld_order_detail_num` varchar(255) NOT NULL,
  `fld_order_num` varchar(255) NOT NULL DEFAULT '',
  `fld_product_num` varchar(255) NOT NULL DEFAULT '',
  `fld_order_detail_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products_a123456`
--

CREATE TABLE IF NOT EXISTS `tbl_products_a123456` (
  `fld_product_num` varchar(255) NOT NULL,
  `fld_product_name` varchar(255) NOT NULL,
  `fld_product_price` float NOT NULL,
  `fld_product_brand` varchar(255) NOT NULL,
  `fld_product_condition` varchar(255) NOT NULL,
  `fld_product_year` int(11) NOT NULL,
  `fld_product_quantity` int(11) NOT NULL,
  `fld_product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products_a123456`
--

INSERT INTO `tbl_products_a123456` (`fld_product_num`, `fld_product_name`, `fld_product_price`, `fld_product_brand`, `fld_product_condition`, `fld_product_year`, `fld_product_quantity`, `fld_product_image`) VALUES
('atx-2833', 'Polaris Scrambler XP', 23500, 'pol', 'New', 2015, 2, 'polaris-scrambler-850-.jpg'),
('atx-3216', 'Yamaha Grizzly 700', 19350, 'yam', 'Used', 2015, 2, 'yamahagrizzly700fi-4100_4.jpg'),
('atx-8204', 'Can-Am Renegade X mr', 25500, 'can', 'Used', 2010, 1, '2017_renegade_x_mr_1000r_hyper_silver_black_can-am_red_3-4_front.jpg'),
('atx-9022', 'Suzuki Vinson 500', 20100, 'suz', 'New', 2016, 3, 'vinson500automatic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs_a123456`
--

CREATE TABLE IF NOT EXISTS `tbl_staffs_a123456` (
  `fld_staff_num` varchar(50) NOT NULL DEFAULT '',
  `fld_staff_password` varchar(50) DEFAULT NULL,
  `fld_staff_fname` varchar(50) DEFAULT NULL,
  `fld_staff_lname` varchar(50) DEFAULT NULL,
  `fld_staff_gender` varchar(10) DEFAULT NULL,
  `fld_staff_phone` varchar(50) DEFAULT NULL,
  `fld_staff_email` varchar(100) NOT NULL,
  `fld_staff_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_staffs_a123456`
--

INSERT INTO `tbl_staffs_a123456` (`fld_staff_num`, `fld_staff_password`, `fld_staff_fname`, `fld_staff_lname`, `fld_staff_gender`, `fld_staff_phone`, `fld_staff_email`, `fld_staff_level`) VALUES
('boss', 'qwerty', 'Siti', 'Abdullah', 'Female', '0137562660', 'siti@yahoo.com', 'admin'),
('sales', '123456', 'Ahmed', 'Elbab', 'Male', '+60149457025', 'ahmedelbab@gmail.com', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brands_a123456`
--
ALTER TABLE `tbl_brands_a123456`
  ADD PRIMARY KEY (`fld_brand_id`);

--
-- Indexes for table `tbl_customers_a123456`
--
ALTER TABLE `tbl_customers_a123456`
  ADD PRIMARY KEY (`fld_customer_num`);

--
-- Indexes for table `tbl_orders_a123456`
--
ALTER TABLE `tbl_orders_a123456`
  ADD PRIMARY KEY (`fld_order_num`);

--
-- Indexes for table `tbl_orders_details_a123456`
--
ALTER TABLE `tbl_orders_details_a123456`
  ADD PRIMARY KEY (`fld_order_detail_num`);

--
-- Indexes for table `tbl_products_a123456`
--
ALTER TABLE `tbl_products_a123456`
  ADD PRIMARY KEY (`fld_product_num`);

--
-- Indexes for table `tbl_staffs_a123456`
--
ALTER TABLE `tbl_staffs_a123456`
  ADD PRIMARY KEY (`fld_staff_num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
