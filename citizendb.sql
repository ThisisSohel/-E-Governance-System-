-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 05:46 PM
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
-- Database: `citizendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizen_info`
--

CREATE TABLE `citizen_info` (
  `citizen_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citizen_info`
--

INSERT INTO `citizen_info` (`citizen_id`, `password`) VALUES
('11111', '12345'),
('22222', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_name` varchar(45) NOT NULL,
  `dosage` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `citizen_id` varchar(45) NOT NULL,
  `reference` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_name`, `dosage`, `comment`, `citizen_id`, `reference`) VALUES
('Flexi®', '1-1-0', 'ewrwerewrwrwqe', '11111', '1677007591'),
('Flexi®', '1-1-0', 'ewrwerewrwrwqe', '11111', '1677007604'),
('Geston™', '1-1-1', 'sdfsdfs', '11111', '1677008192'),
('Tryptin®', '1-0-1', 'eat before', '11111', '1644957999'),
('Virux® HC', '1-1-0', 'eat after', '11111', '1644957999');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `citizen_id` varchar(45) NOT NULL,
  `reference` varchar(45) NOT NULL,
  `doctor_id` varchar(45) DEFAULT NULL,
  `hospital_name` varchar(45) DEFAULT NULL,
  `hospital_address` varchar(45) DEFAULT NULL,
  `doctor_name` varchar(45) DEFAULT NULL,
  `doctor_designation` varchar(45) DEFAULT NULL,
  `doctor_gender` varchar(45) DEFAULT NULL,
  `doctor_department` varchar(45) DEFAULT NULL,
  `doctor_degree` varchar(45) DEFAULT NULL,
  `doctor_institution` varchar(45) DEFAULT NULL,
  `hotline` varchar(45) DEFAULT NULL,
  `symptoms` varchar(45) DEFAULT NULL,
  `advice` varchar(45) DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `override_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`citizen_id`, `reference`, `doctor_id`, `hospital_name`, `hospital_address`, `doctor_name`, `doctor_designation`, `doctor_gender`, `doctor_department`, `doctor_degree`, `doctor_institution`, `hotline`, `symptoms`, `advice`, `follow_up_date`, `updated_at`, `created_at`, `override_key`) VALUES
('11111', '1644957999', '1111', 'Apollo Super-Specialized Hospital', '89 Winh Street, Dallas TX', 'Dr. Syed A.M. Anowarul Abedin', 'Head of NICU, Ibn Sina Hospital', 'Male', 'Pediatric and Neonatology', 'MBBS,DCH(Ireland)', '', '+88 09610010616', 'fever', 'rest needed!', '2022-02-28', '2022-02-15 20:46:40', '2022-02-15 20:46:40', ''),
('11111', '1677007591', '1111', 'Apollo Super-Specialized Hospital', '89 Winh Street, Dallas TX', 'Dr. Syed A.M. Anowarul Abedin', 'Head of NICU, Ibn Sina Hospital', 'Male', 'Pediatric and Neonatology', 'MBBS,DCH(Ireland)', '', '+88 09610010616', 'erwer', 'dafhgdfafd\nddjhgfga', '2021-05-05', '2023-02-21 19:26:31', '2023-02-21 19:26:31', ''),
('11111', '1677007604', '1111', 'Apollo Super-Specialized Hospital', '89 Winh Street, Dallas TX', 'Dr. Syed A.M. Anowarul Abedin', 'Head of NICU, Ibn Sina Hospital', 'Male', 'Pediatric and Neonatology', 'MBBS,DCH(Ireland)', '', '+88 09610010616', 'erwer', 'dafhgdfafd\nddjhgfga', '2021-05-05', '2023-02-21 19:26:44', '2023-02-21 19:26:44', ''),
('11111', '1677008192', '1111', 'Apollo Super-Specialized Hospital', '89 Winh Street, Dallas TX', 'Dr. Syed A.M. Anowarul Abedin', 'Head of NICU, Ibn Sina Hospital', 'Male', 'Pediatric and Neonatology', 'MBBS,DCH(Ireland)', '', '+88 09610010616', 'dfdfs', 'sdfsf sfsdfsf fsf ssdfsd sdfsdf ', '2021-02-22', '2023-02-21 19:36:32', '2023-02-21 19:36:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_name` varchar(100) NOT NULL,
  `test_report_file` varchar(100) DEFAULT NULL,
  `test_override` tinyint(4) DEFAULT NULL,
  `citizen_id` varchar(45) NOT NULL,
  `reference` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_name`, `test_report_file`, `test_override`, `citizen_id`, `reference`) VALUES
('CBC', '', 0, '11111', '1677007591'),
('CBC', '', 0, '11111', '1677007604'),
('Cir Eosinophil Count-Total', '', 0, '11111', '1677008192'),
('CLO Test (DFARUQUE)', '', 0, '11111', '1644957999'),
('HPV-DNA (Ql.)', '', 0, '11111', '1644957999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizen_info`
--
ALTER TABLE `citizen_info`
  ADD PRIMARY KEY (`citizen_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_name`,`citizen_id`,`reference`),
  ADD KEY `fk_medicine_records1_idx` (`citizen_id`,`reference`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`citizen_id`,`reference`),
  ADD KEY `fk_records_citizen_info_idx` (`citizen_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_name`,`citizen_id`,`reference`),
  ADD KEY `fk_test_records1_idx` (`citizen_id`,`reference`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `fk_medicine_records1` FOREIGN KEY (`citizen_id`,`reference`) REFERENCES `records` (`citizen_id`, `reference`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `fk_records_citizen_info` FOREIGN KEY (`citizen_id`) REFERENCES `citizen_info` (`citizen_id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `fk_test_records1` FOREIGN KEY (`citizen_id`,`reference`) REFERENCES `records` (`citizen_id`, `reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
