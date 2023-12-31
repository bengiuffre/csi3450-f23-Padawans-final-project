-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 01:21 AM
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
-- Database: `tec_temp_employment`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL,
  `candidate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `candidate_name`) VALUES
(0, 'wadaw'),
(1, 'Candidate'),
(2, 'dawda'),
(3, 'wwww');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_course_assignment`
--

CREATE TABLE `candidate_course_assignment` (
  `candidate_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_course_assignment`
--

INSERT INTO `candidate_course_assignment` (`candidate_id`, `course_code`) VALUES
(1, 'SEC-45'),
(2, 'SEC-60');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_qualification`
--

CREATE TABLE `candidate_qualification` (
  `candidate_id` int(11) NOT NULL,
  `qualification_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_session`
--

CREATE TABLE `candidate_session` (
  `candidate_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`) VALUES
(0, 'the'),
(1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(10) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `qualification_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_description`, `qualification_code`) VALUES
('CLERK', 'General clerking work', NULL),
('DBA-DB2', 'Database Administrator, IBM DB2', NULL),
('DBA-ORA', 'Database Administrator, Oracle', NULL),
('DBA-SQLSER', 'Database Administrator, MS SQL Server', NULL),
('NW-CIS', 'Network Administrator, Cisco experience', NULL),
('PRG-C++', 'Programmer, C++', NULL),
('PRG-PY', 'Programmer, Python', NULL),
('SEC-45', 'Secretarial work; candidate must type at least 45 words per minute', NULL),
('SEC-60', 'Secretarial work; candidate must type at least 60 words per minute', NULL),
('SYS-1', 'Systems Analyst, level 1', NULL),
('SYS-2', 'Systems Analyst, level 2', NULL),
('WD-CF', 'Web Developer, ColdFusion', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `candidate_id` int(11) NOT NULL,
  `job_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`candidate_id`, `job_details`) VALUES
(1, 'ahhhhhh'),
(2, 'ahhhhhh'),
(3, 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `opening`
--

CREATE TABLE `opening` (
  `opening_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `required_qualification_code` varchar(10) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `hourly_pay` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `opening_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `total_hours_worked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualification_code` varchar(10) NOT NULL,
  `qualification_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `session_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `candidate_course_assignment`
--
ALTER TABLE `candidate_course_assignment`
  ADD PRIMARY KEY (`candidate_id`,`course_code`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `candidate_qualification`
--
ALTER TABLE `candidate_qualification`
  ADD PRIMARY KEY (`candidate_id`,`qualification_code`),
  ADD KEY `qualification_code` (`qualification_code`);

--
-- Indexes for table `candidate_session`
--
ALTER TABLE `candidate_session`
  ADD PRIMARY KEY (`candidate_id`,`session_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `qualification_code` (`qualification_code`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`candidate_id`,`job_details`);

--
-- Indexes for table `opening`
--
ALTER TABLE `opening`
  ADD PRIMARY KEY (`opening_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `required_qualification_code` (`required_qualification_code`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`opening_id`,`candidate_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualification_code`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_course_assignment`
--
ALTER TABLE `candidate_course_assignment`
  ADD CONSTRAINT `candidate_course_assignment_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`candidate_id`);

--
-- Constraints for table `candidate_qualification`
--
ALTER TABLE `candidate_qualification`
  ADD CONSTRAINT `candidate_qualification_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`candidate_id`),
  ADD CONSTRAINT `candidate_qualification_ibfk_2` FOREIGN KEY (`qualification_code`) REFERENCES `qualification` (`qualification_code`);

--
-- Constraints for table `candidate_session`
--
ALTER TABLE `candidate_session`
  ADD CONSTRAINT `candidate_session_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`candidate_id`),
  ADD CONSTRAINT `candidate_session_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`qualification_code`) REFERENCES `qualification` (`qualification_code`);

--
-- Constraints for table `job_history`
--
ALTER TABLE `job_history`
  ADD CONSTRAINT `job_history_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`candidate_id`);

--
-- Constraints for table `opening`
--
ALTER TABLE `opening`
  ADD CONSTRAINT `opening_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `placement`
--
ALTER TABLE `placement`
  ADD CONSTRAINT `placement_ibfk_1` FOREIGN KEY (`opening_id`) REFERENCES `opening` (`opening_id`),
  ADD CONSTRAINT `placement_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`candidate_id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
