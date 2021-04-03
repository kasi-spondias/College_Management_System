-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2019 at 08:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_stu_marks`
--

CREATE TABLE `add_stu_marks` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `exam` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `total_marks` varchar(100) NOT NULL,
  `stu_marks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_stu_marks`
--

INSERT INTO `add_stu_marks` (`id`, `roll_no`, `branch`, `semester`, `exam`, `subject`, `total_marks`, `stu_marks`) VALUES
(8, '123', 'CSE', '1-2', 'Mid-1', '', '25', '20'),
(9, '1431', 'CSE', '4-1', 'Mid-1', '', '25', '21'),
(10, '1431', 'CSE', '3-2', 'Mid-2', '', '25', '21'),
(11, '315136410038', 'CSE', '4-1', 'Mid-1', '', '30', '26'),
(12, '315136410038', 'CSE', '4-1', 'Mid-1', 'Artificial Intelligence', '30', '24');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `u_name`, `u_pass`) VALUES
(1, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_reg`
--

CREATE TABLE `alumni_reg` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `batch` int(11) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `work` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_reg`
--

INSERT INTO `alumni_reg` (`id`, `u_name`, `roll_no`, `email_id`, `dob`,`mobile_no` , `batch`, `branch`, `designation`, `work`) VALUES
(1, 'Bhanu', '314136410036', 'bhanu12@gmail.com', '1996-12-12',9999912346, 2013, 'CSE', 'higher_studies', 'MBA');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(30) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `working_days` varchar(100) NOT NULL,
  `attended_days` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `branch`, `semester`, `roll_no`, `month`, `working_days`, `attended_days`) VALUES
(4, 'EEE', '2-2', '123', 'may', '25', '18'),
(5, 'EEE', '2-2', '456', 'june', '25', '20'),
(6, 'CSE', '1-2', '143', 'feb', '28', '12');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `add_book` varchar(255) NOT NULL,
  `add_link` varchar(255) NOT NULL,
  `uploaded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `time_duration` varchar(255) NOT NULL,
  `no_of_questions` varchar(255) NOT NULL,
  `uploaded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `branch`, `semester`, `subject`, `time_duration`, `no_of_questions`, `uploaded_by`) VALUES
(1, 'CSE', '4-1', 'Artificial Intelligence', '1', '3', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `exam_report`
--

CREATE TABLE `exam_report` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `marks_secured` varchar(255) NOT NULL,
  `total_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_register`
--

CREATE TABLE `faculty_register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `clg_mail_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_register`
--

INSERT INTO `faculty_register` (`id`, `name`, `mobile_no`, `email_id`, `clg_mail_id`, `password`, `branch`) VALUES
(1, 'test', 1234567890, 'test@gmail.com', 'testing@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'CSE'),
(2, 'Dr D.Madhavi', 9874563210, 'drlbcse@gmail.com', 'drlb12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `solution` varchar(1000) NOT NULL,
  `uploaded_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `question` varchar(500) NOT NULL,
  `ans_1` varchar(255) NOT NULL,
  `ans_2` varchar(255) NOT NULL,
  `ans_3` varchar(255) NOT NULL,
  `ans_4` varchar(255) NOT NULL,
  `correct_ans` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semister` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`id`, `name`, `roll_no`, `dob`, `mobile_no`, `email_id`, `password`, `branch`, `semister`) VALUES
(1, 'Alekhya', '315136410038', '1998-03-26', 7894561230, 'alekhya12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'CSE', '4-1');

-- --------------------------------------------------------

--
-- Table structure for table `stud_ans`
--

CREATE TABLE `stud_ans` (
  `ans_id` int(11) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `stud_ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stu_subjects`
--

CREATE TABLE `stu_subjects` (
  `id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `semister` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_subjects`
--

INSERT INTO `stu_subjects` (`id`, `qualification`, `stream`, `semister`, `subject`) VALUES
(2, 'B.Tech', 'CSE', '4-1', 'Artificial Intelligence'),
(3, 'B.Tech', 'CSE', '4-1', 'Big Data'),
(4, 'B.Tech', 'CSE', '4-1', 'Cyber Security'),
(5, 'B.Tech', 'CSE', '4-1', 'PEM'),
(6, 'B.Tech', 'ECE', '1-1', 'Physics'),
(7, 'B.Tech', 'CSE', '1-1', 'CPNM'),
(8, 'B.Tech', 'CSE', '2-1', 'OOPS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_stu_marks`
--
ALTER TABLE `add_stu_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_reg`
--
ALTER TABLE `alumni_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_report`
--
ALTER TABLE `exam_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_register`
--
ALTER TABLE `faculty_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_ans`
--
ALTER TABLE `stud_ans`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `stu_subjects`
--
ALTER TABLE `stu_subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_stu_marks`
--
ALTER TABLE `add_stu_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumni_reg`
--
ALTER TABLE `alumni_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_report`
--
ALTER TABLE `exam_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_register`
--
ALTER TABLE `faculty_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stud_ans`
--
ALTER TABLE `stud_ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stu_subjects`
--
ALTER TABLE `stu_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
