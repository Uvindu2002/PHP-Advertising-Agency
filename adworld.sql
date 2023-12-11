-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 03:12 AM
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
-- Database: `adworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `fname`, `lname`, `mobile`) VALUES
(1, 'wupu0327@gmail.com', 'uvindu', 'pramuditha', '0715266522');

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `joined_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `verification_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`email`, `fname`, `lname`, `password`, `mobile`, `joined_date`, `status`, `verification_code`) VALUES
('wupu0327@gmail.com', 'Uvindu', 'Pramuditha', '123456', '0750273901', '2023-06-11 06:03:31', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_payment`
--

CREATE TABLE `advertiser_payment` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_unit`
--

CREATE TABLE `ad_unit` (
  `a_id` int(11) NOT NULL,
  `ad_units` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad_unit`
--

INSERT INTO `ad_unit` (`a_id`, `ad_units`) VALUES
(1, 'Native banner'),
(2, 'Social bar'),
(3, 'In Page Push');

-- --------------------------------------------------------

--
-- Table structure for table `ad_units`
--

CREATE TABLE `ad_units` (
  `a_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad_units`
--

INSERT INTO `ad_units` (`a_id`, `type`) VALUES
(1, 'Banner 468x60'),
(2, 'Banner 300x250'),
(3, 'Banner 160x300'),
(4, 'Banner 160x600'),
(5, 'Banner 320x50'),
(6, 'Banner 728x90'),
(7, 'Native Banner');

-- --------------------------------------------------------

--
-- Table structure for table `audience`
--

CREATE TABLE `audience` (
  `a_id` int(11) NOT NULL,
  `catergory` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audience`
--

INSERT INTO `audience` (`a_id`, `catergory`) VALUES
(1, 'Asia'),
(2, 'Africa'),
(3, ' North America'),
(4, 'Europe'),
(5, 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `budget_type`
--

CREATE TABLE `budget_type` (
  `b_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget_type`
--

INSERT INTO `budget_type` (`b_id`, `type`) VALUES
(1, '10$ -  20$'),
(2, '20$ - 100$'),
(3, '100$ - 500$');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `campaign_id` int(11) NOT NULL,
  `campaign_name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `advertisers_email` varchar(100) NOT NULL,
  `ad_units` int(11) NOT NULL,
  `Budget_type_id` int(11) NOT NULL,
  `Audience_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `campaign_name`, `content`, `advertisers_email`, `ad_units`, `Budget_type_id`, `Audience_id`, `period_id`, `status`) VALUES
(42, 'campaign 1', 'ahhdhdahiuhu uhuahufhiuahfiu hauihdiuahfiu', 'wupu0327@gmail.com', 1, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `inventory_id` int(11) NOT NULL,
  `inventory_name` varchar(50) NOT NULL,
  `website_url` text NOT NULL,
  `publisher_email` varchar(100) NOT NULL,
  `web_catergory_id` int(11) NOT NULL,
  `ad_units` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`inventory_id`, `inventory_name`, `website_url`, `publisher_email`, `web_catergory_id`, `ad_units`, `status`) VALUES
(19, 'inventory 2', 'https://fffuel.co/', 'wupu0327@gmail.com', 1, 1, 2),
(20, 'inventory 3', 'https://fffuel.co/', 'wupu0327@gmail.com', 1, 1, 1),
(21, 'inventory 4', 'https://fffuel.co/', 'wupu0327@gmail.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payforinventories`
--

CREATE TABLE `payforinventories` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `accountnum` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payforinventories`
--

INSERT INTO `payforinventories` (`id`, `inventory_id`, `bankname`, `accountnum`, `amount`) VALUES
(6, 19, 'sampath', '5214365285697458', '20');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `p_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`p_id`, `type`) VALUES
(1, '24 Hours'),
(2, 'Week'),
(3, '1 Month'),
(4, '3 Month');

-- --------------------------------------------------------

--
-- Table structure for table `profilead_image`
--

CREATE TABLE `profilead_image` (
  `path_url` varchar(100) NOT NULL,
  `advertiser_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilepub_image`
--

CREATE TABLE `profilepub_image` (
  `path_url` varchar(100) NOT NULL,
  `publisher_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profilepub_image`
--

INSERT INTO `profilepub_image` (`path_url`, `publisher_email`) VALUES
('resource/profile_img/uvindu_6484fc8193008.svg', 'wupu0327@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `joined_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `verification_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`email`, `fname`, `lname`, `password`, `mobile`, `joined_date`, `status`, `verification_code`) VALUES
('wupu0327@gmail.com', 'uvindu', 'pramuditha', '123456', '0750273902', '2023-06-11 04:11:44', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `publisher_bank_acc`
--

CREATE TABLE `publisher_bank_acc` (
  `bank_name` varchar(50) NOT NULL,
  `Account_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher_bank_acc`
--

INSERT INTO `publisher_bank_acc` (`bank_name`, `Account_number`, `email`) VALUES
('sampath', '5214365285697458', 'wupu0327@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `web_catergory`
--

CREATE TABLE `web_catergory` (
  `w_id` int(11) NOT NULL,
  `catergory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_catergory`
--

INSERT INTO `web_catergory` (`w_id`, `catergory`) VALUES
(1, 'social'),
(2, 'anime'),
(3, 'sports'),
(4, 'news'),
(5, 'videohost'),
(6, 'torrents'),
(7, 'ecommerce'),
(8, 'books');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `advertiser_payment`
--
ALTER TABLE `advertiser_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `ad_unit`
--
ALTER TABLE `ad_unit`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `ad_units`
--
ALTER TABLE `ad_units`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `audience`
--
ALTER TABLE `audience`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `budget_type`
--
ALTER TABLE `budget_type`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaign_id`),
  ADD KEY `Audience_id` (`Audience_id`),
  ADD KEY `Budget_type_id` (`Budget_type_id`),
  ADD KEY `advertisers_email` (`advertisers_email`),
  ADD KEY `period_id` (`period_id`),
  ADD KEY `ad_units` (`ad_units`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `web_catergory_id` (`web_catergory_id`),
  ADD KEY `inventories_ibfk_1` (`publisher_email`),
  ADD KEY `ad_units` (`ad_units`);

--
-- Indexes for table `payforinventories`
--
ALTER TABLE `payforinventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `profilead_image`
--
ALTER TABLE `profilead_image`
  ADD PRIMARY KEY (`path_url`),
  ADD KEY `advertiser_email` (`advertiser_email`);

--
-- Indexes for table `profilepub_image`
--
ALTER TABLE `profilepub_image`
  ADD PRIMARY KEY (`path_url`),
  ADD KEY `publisher_email` (`publisher_email`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `publisher_bank_acc`
--
ALTER TABLE `publisher_bank_acc`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `web_catergory`
--
ALTER TABLE `web_catergory`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertiser_payment`
--
ALTER TABLE `advertiser_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_unit`
--
ALTER TABLE `ad_unit`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `audience`
--
ALTER TABLE `audience`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `budget_type`
--
ALTER TABLE `budget_type`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payforinventories`
--
ALTER TABLE `payforinventories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertiser_payment`
--
ALTER TABLE `advertiser_payment`
  ADD CONSTRAINT `advertiser_payment_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`);

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`Audience_id`) REFERENCES `audience` (`a_id`),
  ADD CONSTRAINT `campaigns_ibfk_2` FOREIGN KEY (`Budget_type_id`) REFERENCES `budget_type` (`b_id`),
  ADD CONSTRAINT `campaigns_ibfk_3` FOREIGN KEY (`advertisers_email`) REFERENCES `advertisers` (`email`),
  ADD CONSTRAINT `campaigns_ibfk_4` FOREIGN KEY (`period_id`) REFERENCES `period` (`p_id`),
  ADD CONSTRAINT `campaigns_ibfk_5` FOREIGN KEY (`ad_units`) REFERENCES `ad_unit` (`a_id`);

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_ibfk_1` FOREIGN KEY (`publisher_email`) REFERENCES `publisher` (`email`),
  ADD CONSTRAINT `inventories_ibfk_2` FOREIGN KEY (`web_catergory_id`) REFERENCES `web_catergory` (`w_id`),
  ADD CONSTRAINT `inventories_ibfk_3` FOREIGN KEY (`ad_units`) REFERENCES `ad_units` (`a_id`);

--
-- Constraints for table `profilead_image`
--
ALTER TABLE `profilead_image`
  ADD CONSTRAINT `profilead_image_ibfk_1` FOREIGN KEY (`advertiser_email`) REFERENCES `advertisers` (`email`);

--
-- Constraints for table `profilepub_image`
--
ALTER TABLE `profilepub_image`
  ADD CONSTRAINT `profilepub_image_ibfk_1` FOREIGN KEY (`publisher_email`) REFERENCES `publisher` (`email`);

--
-- Constraints for table `publisher_bank_acc`
--
ALTER TABLE `publisher_bank_acc`
  ADD CONSTRAINT `publisher_bank_acc_ibfk_1` FOREIGN KEY (`email`) REFERENCES `publisher` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
