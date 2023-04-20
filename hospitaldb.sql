-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 06:50 AM
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
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE `billers` (
  `pid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billers`
--

INSERT INTO `billers` (`pid`, `name`, `password`) VALUES
(111222, 'Sobuj Haldar', '147852'),
(112233, 'MD. Mostafa Kamal', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`) VALUES
(1, 'Pediatric and Neonatology'),
(2, 'Burn, Plastic & Cosmetic Surgery'),
(3, 'Cardiology'),
(4, 'Gastroenterology');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `room` int(11) NOT NULL,
  `chamber_time` varchar(45) NOT NULL,
  `hotline` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `departments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`pid`, `name`, `designation`, `gender`, `degree`, `institution`, `room`, `chamber_time`, `hotline`, `password`, `departments_id`) VALUES
(1111, 'Dr. Syed A.M. Anowarul Abedin', 'Head of NICU, Ibn Sina Hospital', 'Male', 'MBBS,DCH(Ireland)', NULL, 101, '10.00AM- 5.00PM (Friday Closed)', '+88 09610010616', '1010', 1),
(2222, 'Dr. Muhammod Noazesh Khan', 'Professor', 'Male', 'MBBS, FCPS (Sur), MS (Plastic Surgery)', 'Sheikh Hasina NIBPS', 105, '7.30 PM to 8.30 PM', '+88 09610010615', '2020', 2),
(3333, 'Dr. Md.Monsurul Haque', 'Associate Professor', 'Male', 'MBBS, MD (Cardiology), USMLE (USA)', 'National Institute of Cardiovascular Diseases (NICVD), Dhaka.', 402, '6.00 PM -8 PM', '+88 09610010677', '3030', 3),
(4444, 'Dr. Shireen Ahmed', 'Consultant', 'Female', 'MBBS, MD(Gastro), FCPS(Gastroenterology)', 'BIRDEM General Hospital, Dhaka', 620, '6:00 PM - 8:00 PM', '+88 09610010644', '4040', 4);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_has_patients`
--

CREATE TABLE `doctors_has_patients` (
  `doctors_pid` int(11) NOT NULL,
  `patients_pid` int(11) NOT NULL,
  `appointment_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors_has_patients`
--

INSERT INTO `doctors_has_patients` (`doctors_pid`, `patients_pid`, `appointment_token`) VALUES
(1111, 11111, 200),
(4444, 22222, 400);

-- --------------------------------------------------------

--
-- Table structure for table `drug_list`
--

CREATE TABLE `drug_list` (
  `drug_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drug_list`
--

INSERT INTO `drug_list` (`drug_name`) VALUES
('Acetazolamide'),
('Antiva®'),
('Esloric®'),
('Flexi®'),
('Geston™'),
('Nystatin'),
('Pilocarpine'),
('Spironolactone'),
('Suxamethonium'),
('Tryptin®'),
('Virux® HC');

-- --------------------------------------------------------

--
-- Table structure for table `lab_officers`
--

CREATE TABLE `lab_officers` (
  `pid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_officers`
--

INSERT INTO `lab_officers` (`pid`, `name`, `password`) VALUES
(111, 'Dr. Bariullah Shafiq', '112233112233'),
(111000, 'Dr. Shafiq Chowdhury', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `bg` varchar(45) DEFAULT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pid`, `name`, `phone`, `address`, `gender`, `age`, `bg`, `dob`) VALUES
(11111, 'White Roulf', '+8801835621621', 'Mohakhali DOHS', 'Male', 26, 'O+', '2004-04-06'),
(22222, 'Kamal Hossain', '+8801516175298', 'Dhanmondi  32', 'Male', 29, NULL, '1998-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `test_list`
--

CREATE TABLE `test_list` (
  `test_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_list`
--

INSERT INTO `test_list` (`test_name`) VALUES
('Abscess Fluid for AFB'),
('Anti HBc (Total)'),
('CBC'),
('Cir Eosinophil Count-Total'),
('CLO Test (DFARUQUE)'),
('Fibroscan with CAP'),
('HBV-DNA (Quantitative)'),
('HLA-B27 Genotyping'),
('HPV-DNA (Ql.)'),
('Sedation (P)');

-- --------------------------------------------------------

--
-- Table structure for table `test_token`
--

CREATE TABLE `test_token` (
  `test_token` int(11) NOT NULL,
  `patients_pid` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_token`
--

INSERT INTO `test_token` (`test_token`, `patients_pid`, `updated_at`, `created_at`) VALUES
(15, 11111, '2022-02-15 21:09:28', '2022-02-15 21:09:28'),
(16, 11111, '2023-02-21 19:30:56', '2023-02-21 19:30:56'),
(17, 11111, '2023-02-21 19:41:08', '2023-02-21 19:41:08'),
(18, 11111, '2023-02-21 19:43:32', '2023-02-21 19:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `test_token_has_test_list`
--

CREATE TABLE `test_token_has_test_list` (
  `test_token` int(11) NOT NULL,
  `test_name` varchar(45) NOT NULL,
  `reference_num` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_token_has_test_list`
--

INSERT INTO `test_token_has_test_list` (`test_token`, `test_name`, `reference_num`) VALUES
(15, 'CLO Test (DFARUQUE)', '1644957999'),
(15, 'HPV-DNA (Ql.)', '1644957999'),
(16, 'CBC', '1677007604'),
(17, 'Cir Eosinophil Count-Total', '1677008192'),
(18, 'Cir Eosinophil Count-Total', '1677008192');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billers`
--
ALTER TABLE `billers`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_doctors_departments1_idx` (`departments_id`);

--
-- Indexes for table `doctors_has_patients`
--
ALTER TABLE `doctors_has_patients`
  ADD PRIMARY KEY (`doctors_pid`,`patients_pid`),
  ADD KEY `fk_doctors_has_patients_patients1_idx` (`patients_pid`),
  ADD KEY `fk_doctors_has_patients_doctors1_idx` (`doctors_pid`);

--
-- Indexes for table `drug_list`
--
ALTER TABLE `drug_list`
  ADD PRIMARY KEY (`drug_name`);

--
-- Indexes for table `lab_officers`
--
ALTER TABLE `lab_officers`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `test_list`
--
ALTER TABLE `test_list`
  ADD PRIMARY KEY (`test_name`);

--
-- Indexes for table `test_token`
--
ALTER TABLE `test_token`
  ADD PRIMARY KEY (`test_token`),
  ADD KEY `fk_test_token_patients1_idx` (`patients_pid`);

--
-- Indexes for table `test_token_has_test_list`
--
ALTER TABLE `test_token_has_test_list`
  ADD PRIMARY KEY (`test_token`,`test_name`),
  ADD KEY `fk_test_token_has_test_list_test_list1_idx` (`test_name`),
  ADD KEY `fk_test_token_has_test_list_test_token1_idx` (`test_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_token`
--
ALTER TABLE `test_token`
  MODIFY `test_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_doctors_departments1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `doctors_has_patients`
--
ALTER TABLE `doctors_has_patients`
  ADD CONSTRAINT `fk_doctors_has_patients_doctors1` FOREIGN KEY (`doctors_pid`) REFERENCES `doctors` (`pid`),
  ADD CONSTRAINT `fk_doctors_has_patients_patients1` FOREIGN KEY (`patients_pid`) REFERENCES `patients` (`pid`);

--
-- Constraints for table `test_token`
--
ALTER TABLE `test_token`
  ADD CONSTRAINT `fk_test_token_patients1` FOREIGN KEY (`patients_pid`) REFERENCES `patients` (`pid`);

--
-- Constraints for table `test_token_has_test_list`
--
ALTER TABLE `test_token_has_test_list`
  ADD CONSTRAINT `fk_test_token_has_test_list_test_list1` FOREIGN KEY (`test_name`) REFERENCES `test_list` (`test_name`),
  ADD CONSTRAINT `fk_test_token_has_test_list_test_token1` FOREIGN KEY (`test_token`) REFERENCES `test_token` (`test_token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
