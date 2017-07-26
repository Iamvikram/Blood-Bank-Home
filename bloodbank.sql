-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2017 at 01:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_reseivers_information`
--

CREATE TABLE `blood_reseivers_information` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bgroup` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_reseivers_information`
--

INSERT INTO `blood_reseivers_information` (`ID`, `name`, `bgroup`, `email`, `password`) VALUES
(1, 'Kartik', 'A+', 'k1@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Rakesh', 'A-', 'rak112@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Abhinav', 'B+', 'abh@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'darshan', 'O+', 'dar@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'bajrang singh', 'AB+', 'baj@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Sunil', 'B+', 'sun@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'mukesh', 'B-', 'muk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'varun', 'AB+', 'van@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `blood_sample_request`
--

CREATE TABLE `blood_sample_request` (
  `ID` int(11) NOT NULL,
  `Requester_email` varchar(100) NOT NULL,
  `blood_sample` varchar(100) NOT NULL,
  `hospital_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_sample_request`
--

INSERT INTO `blood_sample_request` (`ID`, `Requester_email`, `blood_sample`, `hospital_name`) VALUES
(1, 'k1@gmail.com', 'A+', 'Mountain View Hospital Center'),
(2, 'k1@gmail.com', 'A-', 'Highlands General Hospital'),
(3, 'k1@gmail.com', 'A-', 'Highlands General Hospital'),
(4, 'k1@gmail.com', 'O+', 'Mountain View Hospital Center'),
(5, 'sun@gmail.com', 'O-', 'Orange Garden Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_blood_samples_information`
--

CREATE TABLE `hospital_blood_samples_information` (
  `ID` int(11) NOT NULL,
  `hospital_name` varchar(500) NOT NULL,
  `blood_samples` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_blood_samples_information`
--

INSERT INTO `hospital_blood_samples_information` (`ID`, `hospital_name`, `blood_samples`, `Status`) VALUES
(1, 'Mountain View Hospital Center', 'A+', 'Available'),
(2, 'Mountain View Hospital Center', 'A-', 'Available'),
(3, 'Mountain View Hospital Center', 'B-', 'Available'),
(4, 'Mountain View Hospital Center', 'O+', 'Available'),
(5, 'Mountain View Hospital Center', 'AB+', 'Available'),
(6, 'Mountain View Hospital Center', 'AB-', 'Available'),
(7, 'Mountain View Hospital Center', 'O-', 'Available'),
(8, 'Spring Forest Hospital', 'A+', 'Available'),
(9, 'Spring Forest Hospital', 'A-', 'Available'),
(10, 'Spring Forest Hospital', 'B-', 'Available'),
(11, 'Spring Forest Hospital', 'O-', 'Available'),
(12, 'Spring Forest Hospital', 'AB+', 'Available'),
(13, 'Spring Forest Hospital', 'AB-', 'Available'),
(14, 'Highlands General Hospital', 'A-', 'Available'),
(15, 'Highlands General Hospital', 'O+', 'Available'),
(16, 'Highlands General Hospital', 'AB+', 'Available'),
(17, 'Highlands General Hospital', 'AB-', 'Available'),
(18, 'Orange Garden Hospital', 'A-', 'Available'),
(19, 'Orange Garden Hospital', 'B-', 'Available'),
(20, 'Orange Garden Hospital', 'O+', 'Available'),
(21, 'Orange Garden Hospital', 'AB+', 'Available'),
(22, 'Orange Garden Hospital', 'AB+', 'Available'),
(23, 'Orange Garden Hospital', 'AB-', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_side_registered_users`
--

CREATE TABLE `hospital_side_registered_users` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Hospital_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_side_registered_users`
--

INSERT INTO `hospital_side_registered_users` (`ID`, `name`, `email`, `password`, `Hospital_name`) VALUES
(1, 'Vikram singh dhinwal', 'kumarvikram794@gmail.com', '9dbc640f9d57015ac210e1e6ef66eabc', 'Mountain View Hospital Center'),
(2, 'Ramesh dhinwal', 'ram1111@gmail.com', '9dbc640f9d57015ac210e1e6ef66eabc', 'Spring Forest Hospital'),
(3, 'vinod kumar dhinwal', 'vin@gmail.com', '9dbc640f9d57015ac210e1e6ef66eabc', 'Highlands General Hospital'),
(4, 'ankit', 'an@gmail.com', '9dbc640f9d57015ac210e1e6ef66eabc', 'Orange Garden Hospital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_reseivers_information`
--
ALTER TABLE `blood_reseivers_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blood_sample_request`
--
ALTER TABLE `blood_sample_request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hospital_blood_samples_information`
--
ALTER TABLE `hospital_blood_samples_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hospital_side_registered_users`
--
ALTER TABLE `hospital_side_registered_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_reseivers_information`
--
ALTER TABLE `blood_reseivers_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blood_sample_request`
--
ALTER TABLE `blood_sample_request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hospital_blood_samples_information`
--
ALTER TABLE `hospital_blood_samples_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `hospital_side_registered_users`
--
ALTER TABLE `hospital_side_registered_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
