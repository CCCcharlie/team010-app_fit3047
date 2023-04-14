-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 06:51 AM
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
-- Database: `holistic`
-- VER 2.4

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
                           `booking_id` int(11) NOT NULL,
                           `booking_date` date NOT NULL,
                           `booking_time` time NOT NULL,
                           `cust_id` int(11) NOT NULL,
                           `staff_id` int(11) NOT NULL,
                           `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
                            `cust_id` int(11) NOT NULL,
                            `cust_fname` varchar(64) NOT NULL,
                            `cust_lname` varchar(64) NOT NULL,
                            `cust_phone` int(10) NOT NULL,
                            `cust_startdate` date NOT NULL,
                            `cust_email` varchar(320) NOT NULL,
                            `cust_password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
                             `expertise_title` varchar(64) NOT NULL,
                             `expertise_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
                           `payment_no` int(11) NOT NULL,
                           `booking_id` int(11) NOT NULL,
                           `payment_amount` double(4,2) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
                            `service_id` int(11) NOT NULL,
                            `service_name` varchar(64) NOT NULL,
                            `service_duration` time NOT NULL,
                            `service_desc` varchar(500) NOT NULL,
                            `service_price` decimal(10,2) NOT NULL,
                            `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
                         `staff_id` int(11) NOT NULL,
                         `staff_fname` varchar(64) NOT NULL,
                         `staff_lname` varchar(64) NOT NULL,
                         `staff_position` varchar(20) NOT NULL,
                         `staff_email` varchar(320) NOT NULL,
                         `staff_password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_expertise`
--

CREATE TABLE `staff_expertise` (
                                   `staff_exp_id` int(11) NOT NULL,
                                   `staff_id` int(11) NOT NULL,
                                   `expertise_title` varchar(64) NOT NULL,
                                   `staffexpert_date_completed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
    ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_booking_FK` (`cust_id`),
  ADD KEY `staff_booking_FK` (`staff_id`),
  ADD KEY `services_booking_FK` (`service_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
    ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
    ADD PRIMARY KEY (`expertise_title`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
    ADD PRIMARY KEY (`payment_no`),
  ADD KEY `booking_payment_FK` (`booking_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
    ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
    ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_expertise`
--
ALTER TABLE `staff_expertise`
    ADD PRIMARY KEY (`staff_exp_id`),
  ADD KEY `staff_se_FK` (`staff_id`),
  ADD KEY `expertise_se_FK` (`expertise_title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
    MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
    MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
    MODIFY `payment_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
    MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
    MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_expertise`
--
ALTER TABLE `staff_expertise`
    MODIFY `staff_exp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
    ADD CONSTRAINT `customer_booking_FK` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `services_booking_FK` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `staff_booking_FK` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
    ADD CONSTRAINT `booking_payment_FK` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`);

--
-- Constraints for table `staff_expertise`
--
ALTER TABLE `staff_expertise`
    ADD CONSTRAINT `expertise_se_FK` FOREIGN KEY (`expertise_title`) REFERENCES `expertise` (`expertise_title`),
  ADD CONSTRAINT `staff_se_FK` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
