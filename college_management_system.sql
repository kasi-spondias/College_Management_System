-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 02:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

INSERT INTO `alumni_reg` (`id`, `u_name`, `roll_no`, `email_id`, `dob`, `mobile_no`, `batch`, `branch`, `designation`, `work`) VALUES
(1, 'Bhanu', '314136410036', 'bhanu12@gmail.com', '1996-12-12', 9999912346, 2013, 'CSE', 'higher_studies', 'MBA');

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

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `branch`, `semester`, `sub_name`, `book_name`, `add_book`, `add_link`, `uploaded_by`) VALUES
(1, 'MCA', '1', 'MATHS', '', '', '', ''),
(2, 'MCA', '1', 'MATHS', '', '', '', ''),
(100, 'MCA', '1', 'MATHS', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `college_districts`
--

CREATE TABLE `college_districts` (
  `district` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_districts`
--

INSERT INTO `college_districts` (`district`) VALUES
('EG'),
('GTR'),
('KRI'),
('PKS'),
('SKL'),
('VSP'),
('VZM'),
('WG');

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
(1, 'CSE', '4-1', 'Artificial Intelligence', '1', '3', 'test'),
(2, 'CSE', '1-1', 'Big Data', '5', '5', 'lavanya');

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
(2, 'Dr D.Madhavi', 9874563210, 'drlbcse@gmail.com', 'drlb12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'CSE'),
(3, 'lavanya', 7894612306, 'lav@gmail.com', 'lbcw@gmail.com', 'abfb045b0af3ff779f7aa862b1dc2004', 'CSE');

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

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `branch`, `semester`, `subject`, `question`, `ans_1`, `ans_2`, `ans_3`, `ans_4`, `correct_ans`) VALUES
(1, 2, 'CSE', '1-1', 'Big Data', '         lavanya starting letter', '', 'l', 'i', 'o', 'Ans2'),
(2, 2, 'CSE', '1-1', 'Big Data', '         lavanya starting letter', '', 'l', 'i', 'o', 'Ans2');

-- --------------------------------------------------------

--
-- Table structure for table `ss`
--

CREATE TABLE `ss` (
  `cc` varchar(2) NOT NULL,
  `collegename` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `disp_status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ss`
--

INSERT INTO `ss` (`cc`, `collegename`, `district`, `disp_status`) VALUES
('34', 'GMR Institute of Technology,Rajam', 'SKL', 1),
('51', 'Sarada Inst of Sc Tech & Manag, Srikakulam', 'SKL', 1),
('A5', 'Aditya Inst of Tech & Manag, Tekkali', 'SKL', 1),
('MN', 'Sri Sivani Institute of Technology, Srikakulam', 'SKL', 1),
('MT', 'Sri Venkateswara College of Engineering & Technology, Etcherla', 'SKL', 1),
('W6', 'Sri Sivani College of Engineering, Srikakulam', 'SKL', 1),
('DA', 'Sri Sivani College of Pharmacy, Srikakulam', 'SKL', 1),
('33', 'MVGR College of Engineering, Chinthalavalasa.', 'VZM', 1),
('99', 'Avanthi\'s St. Theressa Institute of Engineering & Technology, Garividi', 'VZM', 1),
('G6', 'Thandrapaparaya Institute of Science & Technology, Bobbili', 'VZM', 1),
('H9', 'Gokul Institute of Technology & Science,Bobbili', 'VZM', 0),
('HQ', 'Avanthi\'s Research & Technological Academy, Bhogapuram', 'VZM', 1),
('JA', 'Coastal Inst of Technology & Management, Kothavalasa', 'VZM', 1),
('KD', 'Lendi Institute of Engineering & Technology, Denkada', 'VZM', 1),
('Q7', 'Avanthi Institute of Engineering & Technology,Bhogapuram', 'VZM', 1),
('T5', 'Avanthi Institute of Phramaceutical Sciences,Bhogapuram', 'VZM', 1),
('HH', 'Gokul Pharamacy College,Bhobbili', 'VZM', 1),
('6B', 'Swami Vivekananda Engineering College, Bobbili', 'VZM', 1),
('6C', 'Miracle Educational Society Group of Institutions, Bhogapuram', 'VZM', 1),
('8K', 'Gokul Group of Institutions, Bobbili', 'VZM', 1),
('B6', 'Satya Institute of Technology & Management, Gajularega.', 'VZM', 1),
('13', 'Gayathri Vidya Parishad College of Engineering,Madhurawada', 'VSP', 1),
('52', 'Viswanadha Inst of Tech & Management, Anandapuram', 'VSP', 1),
('81', 'Avanthi Inst of Engineering & Technology,Narsipatnam', 'VSP', 1),
('98', 'Raghu Engineering College, Bheemili', 'VSP', 1),
('JG', 'GVP College of Engg for Women, Madhurawada', 'VSP', 1),
('K1', 'Pydah Colloege of Engineering & Technology, Anandapuram', 'VSP', 1),
('L3', 'Vignan\'s Institute of Information Technology, Gajuwaka', 'VSP', 1),
('L6', 'Chaitanya Engineering College,Madhurawada', 'VSP', 1),
('NM', 'Vignan\'s Institute of Engineering for Women, Gajuwaka', 'VSP', 1),
('NR', 'Baba Institute of Technology & Science, Madhurawada', 'VSP', 1),
('NT', 'Visakha Institute of Enginrring & Technology,Narava', 'VSP', 1),
('NU', 'Nadimpalli  Satyanarayana Raju Institute of Technology, Sontyam', 'VSP', 1),
('PC', 'Vizag Institute of Technology, Bheemili', 'VSP', 1),
('U4', 'Dadi Inst of Engg & Tech, Anakapalli', 'VSP', 1),
('W2', 'Kaushik College of Engineering, Gambhiram', 'VSP', 1),
('AC', 'Vignan Inst Pharmaceutical Technology, Gajuwaka', 'VSP', 1),
('PK', 'Viswanadha Inst of Pharmaceuticel Sciences,Anandapuram', 'VSP', 1),
('6D', 'Sanketika Inst of Tech & Management,Visakhapatnam', 'VSP', 1),
('6E', 'Gonna Institute of Information Technology & Science, Aganampudi', 'VSP', 1),
('6F', 'Sai Ganapathi Engineering College, Anandapuram', 'VSP', 1),
('6G', 'Visakha Techinacl Campus, Narava', 'VSP', 1),
('6H', 'Sri Chaitanya Engineering College, Madhurawada ', 'VSP', 1),
('6J', 'Simhadhri Educational Socity Group of Inst, Sabbavaram', 'VSP', 1),
('8M', 'Visakha Institute of Management Science, Bheemili', 'VSP', 1),
('9D', 'Gonna Institute of Technology & Management, Aganampudi', 'VSP', 1),
('2Z', 'Indo American Institutions - Technical Campus,  Anakapalli', 'VSP', 0),
('3J', 'Raghu Institute of Technology, Dakammari, Bheemunipatnam Mandal, Visakhapatnam District', 'VSP', 1),
('B4', 'ASK College of Technology & Management, Anakapally', 'VSP', 1),
('C4', 'All Saints P.G.College, Singanabanda, Bheemili(M), Visakhapatnam', 'VSP', 1),
('C3', 'Varaha  College of Architecture & Planning, Nar ava, Visakhapatnam', 'VSP', 1),
('B7', 'Emmanuel College of Pharmacy, Singanna Banda ', 'VSP', 1),
('22', 'BVC Engineering College, Odalarevu', 'EG', 1),
('55', 'Godavari Inst of Engg & Tech, Rajahmundry', 'EG', 1),
('A3', 'Pragathi Engineering College, Surampalem', 'EG', 1),
('A6', 'Sri Prakash College of Engineering, Tuni', 'EG', 0),
('96', 'Lenora College of Engineering, Rampachodavaram ', 'EG', 1),
('JN', 'Kakinada Inst of Engg & Tech for Women, Korangi', 'EG', 1),
('HN', 'Adarsh College of Engineering, Chebrolu', 'EG', 1),
('H4', 'BVC Institute of Technology & Science, Amalapuram ', 'EG', 1),
('B2', 'Kakinada Institute of Engineering & Technology, Korangi', 'EG', 1),
('A9', 'Aditya Engineering College, Surampalem', 'EG', 1),
('JP', 'Kakinada Institute of Technoligical  & Sciences, Ramchandrapuram', 'EG', 1),
('JQ', 'Kakinada Institute of Technology & Science, Peddapuram', 'EG', 1),
('MD', 'Rajamhendri Institute of Engineering & Technology, Bhoopalapatnam', 'EG', 1),
('MH', 'Aditya College of Engineering, Surampalem', 'EG', 1),
('MM', 'Sri Sai Madhavi Institute of Science & Technology, Mallampudi', 'EG', 0),
('NJ', 'V S Lakshmi Engineering College, Matlapalem', 'EG', 1),
('P3', 'Aditya College of Engineering & Technology, Surampalem', 'EG', 1),
('S0', 'Chaitanya Institute of Science & Technology, Madhavaptnam', 'EG', 1),
('T9', 'GIET Engineering College', 'EG', 1),
('PE', 'Adarsa College of Pharmacy, Gokavaram', 'EG', 1),
('6K', 'Ideal Institute of Technology, Kakinada', 'EG', 1),
('6L', 'Amalapuram Institute of Management Science & College of Engineering ', 'EG', 1),
('6M', 'BVC College of Engineering, Rajanagaram', 'EG', 1),
('6N', 'Srinivasa Institute of Engineering & Technology, Amalapuram ', 'EG', 1),
('6P', 'Prasiddha College of Engineering & Technology, Amalapuram', 'EG', 1),
('6Q', 'Kakinada Institute of Engineering & Technology  - II, Korangi', 'EG', 1),
('6R', 'GIET College of Engineering, Rajahmundry', 'EG', 1),
('6T', 'Pydah College of Engineering, Matlapalem', 'EG', 1),
('6W', 'International School of Technology & Science for Women , Rajanagaram', 'EG', 1),
('8Q', 'St.Mary\'s Colleges of B Pharmacy,Surampalem,', 'EG', 1),
('8Z', 'Rajiv Gandhi Institute of Management & Science, Atchampeta', 'EG', 1),
('9M', 'Sri Sai Madhavi Institute of Engineering & Technology, Mallampudi ', 'EG', 1),
('2N', 'Chaitanya Institute of Computer Science, kakinada', 'EG', 1),
('3B', 'VSM College of Engineering, Ramachandra Puram', 'EG', 1),
('3G', 'Aditya Pharmacy College, Surampalem', 'EG', 1),
('3H', 'Aditya College of Pharmacy, Surampalem', 'EG', 1),
('3M', 'Koringa College of Pharmacy, Korangi', 'EG', 1),
('B5', 'Dr. Paul Raj Engineering college, Laxmidevipeta (V), Yatapaka (P), Nellipaka (M)', 'EG', 1),
('2K', 'Benaiah Institute of Technology & Science, Burugupudi,', 'EG', 1),
('53', 'Akula Sreeramulu College of Engineering, Tanuku', 'WG', 1),
('A0', 'Nova College of Engineering & Technology , Jangareddygudem', 'WG', 1),
('A2', 'Swarnandhra College of Engineering & Technology, Narsapur', 'WG', 1),
('A8', 'Sri Vasavi Engineering College, Tadepalligudem', 'WG', 1),
('AP', 'Bhimavaram Institute of Engineering & Technology, Bhimavaram', 'WG', 1),
('B0', 'Shri Vishnu Engineering College for Women, Bhimavaram', 'WG', 1),
('EM', 'Swarnandhra Institute of Engineering & Technology,Narsapur', 'WG', 1),
('G5', 'Akula Sreeramulu Institute of Engineering  & Technology, Tadepalligudem', 'WG', 0),
('HE', 'Jogaiah Institute of Technology & Science, Kalagampudi ', 'WG', 1),
('HK', 'AKRG College of Engineering & Technology, Nallajerla', 'WG', 1),
('JD', 'Eluru College of Engineering & Technology, Eluru', 'WG', 1),
('JH', 'Grandhi Varalakshmi Venkatarao Institute of Technology, Bhimavara,', 'WG', 1),
('K6', 'Sasi Institute of Technology & Engineering, Tadepalligudem', 'WG', 1),
('ME', 'Ramachandra College of Engineering, Eluru', 'WG', 1),
('MR', 'Sri Vatsavai Krishmraju College of Engineering & Technology, Gollala Koderu', 'WG', 0),
('MU', 'Sri Venkateswara Institute of Science & Information Technology, Nallajerla', 'WG', 1),
('PA', 'Vishnu Institute of Technology, Bhimavaram', 'WG', 1),
('PD', 'West Godavari Institute of Science & Technology, Nallajerla', 'WG', 1),
('T7', 'Nova College of Pharmacy, Jangareddygudem', 'WG', 1),
('GC', 'Jogaiah Institute of Technology & Science,Kalagampudi ', 'WG', 1),
('7A', 'Gayatri Institute of Engineering & Technology, Jangareddygudem', 'WG', 0),
('7H', 'Green Royal Acadamy of Pharmaceutical Education & Science,Koyyalagudem ', 'WG', 1),
('7D', 'Chaitanya Engineering College, Bhimavaram', 'WG', 0),
('7G', 'Muttamsetty Venkata Narayana Institute of Management Studies & Research, Eluru', 'WG', 1),
('7E', 'Helapuri Institute of Technology & Science, Vegavaram', 'WG', 1),
('8N', 'AKRG College of Pharmacy, Nallajerla', 'WG', 1),
('9F', 'Nova Institute of Technology, Eluru', 'WG', 1),
('9P', 'DNR College of Engineering & Technology, Bhimavaram', 'WG', 1),
('9Z', 'Gayatri Group of Institutions, Jangareddygudem', 'WG', 1),
('B8', 'SIR C.R.Reddy College of Engineering, Eluru', 'WG', 1),
('B9', 'Sagi Ramakrishnam Raju Engineering College, Chinnaamiram(Post), Bhimavaram', 'WG', 1),
('2L', 'D N R School of Business Management, Bhimavaram', 'WG', 1),
('C2', 'M.R.K. College of Architecture, Veeravasaram, Bhimavaram', 'WG', 1),
('23', 'Nimra College of Engineering & Technology, Imbrahimpatnam', 'KRI', 1),
('48', 'Gudlavalleru Engineering College, Gudlavalleru', 'KRI', 1),
('50', 'Prasad V Potluri Siddhartha Institute Technology,Kanuru', 'KRI', 1),
('54', 'Sri Sarathi Institute of Engineering & Technology,Nuzvid ', 'KRI', 1),
('76', 'Lakkireddy Balireddy College of Engineering, Mylavaram', 'KRI', 1),
('AJ', 'Amrita Sai Institute of Science & Technology,Paritala', 'KRI', 1),
('FF', 'Mandava Institute of engineering & Technology, Jagayyapet', 'KRI', 1),
('H7', 'DVR Dr. Hema Sekhar MIC College of Technology,Kachakacherla', 'KRI', 1),
('HP', 'Andhra Loyola Institute of Engineering & Technology, Vijayawada', 'KRI', 1),
('JC', 'DJR Institute of Engineering & Technology,Vijayawada', 'KRI', 1),
('JF', 'Gandhiji Institute of Science & Technology, Gattu Bhimavaram', 'KRI', 1),
('JM', 'GDMM College of Engineering & Technology, Naadigama', 'KRI', 1),
('KK', 'Nova College of Engineering & Technology,Ibrahimptnam ', 'KRI', 1),
('KN', 'NRI Institute of Technology,Pothavarappadu', 'KRI', 1),
('KR', 'Paladugu Parvathi Devi College of Engineering & Technology, surampalli', 'KRI', 1),
('KT', 'Potti Sreeramulu C M Rao College of Engineering & Technology, Vijayawada', 'KRI', 1),
('MC', 'R K College of Engineering,Vijayawada ', 'KRI', 1),
('MF', 'Sarojini Institute of Technology,Telaprolu ', 'KRI', 0),
('MG', 'Sree Vahini Institute of Science & Technology,Thiruvuru ', 'KRI', 1),
('MQ', 'Sri Vasavi Institute of Engineering & Technology ,Pedana', 'KRI', 1),
('NA', 'Lingayas Institute of Technology & Management, mandalavari Gudem ', 'KRI', 1),
('NG', 'Usha Rama College of Engineering & Technology ,Telaprolu', 'KRI', 1),
('NH', 'VKR & VNB & AGK College of Engineering, Gudiwada', 'KRI', 1),
('NP', 'Vijaya Institute of Technology for Women ,Enikepadu', 'KRI', 1),
('NQ', 'Vikas College of Engineering & Technology , Nunna', 'KRI', 1),
('R8', 'Sri Sunflower College of Engineering & Technology, Lankapalli', 'KRI', 1),
('W3', 'Nimra Institute of Science & Technology,Jupudi', 'KRI', 1),
('X4', 'S R K Institute of Technology,Enikepadu ', 'KRI', 1),
('DR', 'Nova College of Pharmaceutical Education & Research,Jupudi ', 'KRI', 1),
('PJ', 'MRR College of Pharmacy, Nandigama', 'KRI', 1),
('7J', 'Sri Vani Group of Institutions,Chevuturu ', 'KRI', 1),
('7Q', 'Vijaya Institute of Management Science for Women , Enikepadu', 'KRI', 0),
('7N', 'Vijaya Institute of Pharmaceutical Science for Women,Enikepadu', 'KRI', 1),
('7P', 'Global Institute of Management & Technology,Bommuluru', 'KRI', 1),
('7K', 'D J R College of Engineering & Technology,Vijayawada', 'KRI', 1),
('8H', 'MVR College of Engineering & Technology, Paritala,', 'KRI', 1),
('8T', 'Dhanekula Institute of Engineering & Technology, Ganguru, Vijayawada', 'KRI', 1),
('8W', 'Velagapudi Rama Krishna Siddhartha Engineering College, Vijayawada', 'KRI', 1),
('8Y', 'Vikas College of Pharmacy,Visanna peta', 'KRI', 1),
('9A', 'Nimra College of Pharmacy, Ibrahimpatnam', 'KRI', 1),
('9E', 'NRI College of Pharmacy, Pothavarapupadu', 'KRI', 1),
('9G', 'Montessori Siva Sivani College of Pharmacy, Myalavaram', 'KRI', 0),
('9L', 'Nimra College of Business Management, Ibrahimpatnam', 'KRI', 1),
('9N', 'Nova PG College(MCA),Jupudi Village', 'KRI', 1),
('9Q', 'Nova PG College(MBA),Jupudi Village', 'KRI', 1),
('9T', 'Vikas Group of Institutions, Vissannapet', 'KRI', 1),
('9Y', 'Nova College of Business Management, Nuzivid', 'KRI', 1),
('8F', 'Saradha Institute of Technology & Management, Vijayawada', 'KRI', 1),
('9V', 'Vallabhaneni Venkatadri Institute of Pharmaceutical Science,Gudlavalleru', 'KRI', 1),
('9W', 'Sri Sarathi Institute of Engineering & Technology,Nuzvid ', 'KRI', 1),
('2A', 'Satya Institute of Management Studies, Nugondapalli,', 'KRI', 1),
('3C', 'D M S S V Hindu College of Engineering, Machilipatnam.', 'KRI', 1),
('C0', 'Maestro School of Planning & Architecture, Vijayawada,', 'KRI', 1),
('C1', 'Vaishnavi School of Architecture & Planning Vijayawada, Vijayawada.', 'KRI', 1),
('A7', 'Nalanda Institute of Engineering &Technology,Satenapalli', 'GTR', 1),
('A4', 'Loyola Institute of Technology & Management,Dhulipalla', 'GTR', 1),
('A1', 'Newton\'s Institute of Engineering ,arugurajupally', 'GTR', 1),
('47', 'Narasaraopeta Engineering College, Yellamanda', 'GTR', 1),
('JK', 'Guntur Engineering College, Yanamandala', 'GTR', 1),
('HT', 'Chalapathi Institute of Technology, Mothada', 'GTR', 1),
('HU', 'Chebrolu Engineering College,Chebrolu', 'GTR', 1),
('JE', 'Eswar College of Engineering, Kesanupalli', 'GTR', 1),
('FE', 'Vignan\'s Lara Institute of Technology & Science,Vadlamudi', 'GTR', 1),
('HM', 'A M Reddy Memorial College of Engineering Technology, Narasaraopet', 'GTR', 1),
('BN', 'Tenali Engineering College, Anumariapudi', 'GTR', 1),
('BJ', 'St.Mary\'s Group of Institutions Guntur, Chebrolu', 'GTR', 1),
('AR', 'Sai Tirumala NVR Engineering College ,Narasaropeta', 'GTR', 1),
('AH', 'Amara Institute of Engineering & Technology,Satuluru', 'GTR', 0),
('BQ', 'Vasireddy Venkatadri Institute of Technology,Pedakakani', 'GTR', 1),
('JR', 'KKR & KSR Institute of Technology & Science,Vinjanampudi ', 'GTR', 1),
('JT', 'A S N  Women\'s Engineering College, Burrupalem', 'GTR', 1),
('KC', 'Krishnaveni Engineering College for Women, Narasaraopet', 'GTR', 1),
('KE', 'Malineni Lakshmaiah Women\'s Engineering College,Pulladigunta', 'GTR', 1),
('KH', 'Narasaraopeta Institute of Technology,Yallamanda', 'GTR', 1),
('KP', 'NRI institute of Technology,Guntur ', 'GTR', 1),
('KU', 'Priyadarshini Institute of Technology & Science for Women, Chintalapudi', 'GTR', 1),
('MK', 'Sri Mittapalli Institute of Technology for Women,Chintalapudi ', 'GTR', 1),
('ND', 'St.Mary\'s Women\'s Engineering College, Budampadu', 'GTR', 1),
('NE', 'Tirumala Engineering College,Narasaraopet ', 'GTR', 1),
('NF', 'Universal College of Engineering & Technology,Dokiparru', 'GTR', 1),
('NK', 'Velaga Nageswara Rao College ofEngineering,Ponnur', 'GTR', 1),
('NN', 'Vignan\'s Nirula Institute of Technology & Science for Women,Palakaluru ', 'GTR', 1),
('U9', 'Sri Mittapalli College of Engineering, Thummalapalem', 'GTR', 1),
('X2', 'Priyadarshini Institute of Technology & Science, Chintalapudi', 'GTR', 1),
('90', 'Sri Chundi Ranganayakulu Engineering College, Ganapavaram', 'GTR', 1),
('GK', 'Priayadarshni Institute of Technology & Management,Vatticherukuru', 'GTR', 1),
('10', 'Bapatla College of Pharmacy, Bapatla', 'GTR', 1),
('CD', 'Narasaraopeta Institute of Pharmaceutical Science,Narasaraopet', 'GTR', 1),
('CR', 'Nalanda Institute of Pharmaceutical Sciences,Kantepudi ', 'GTR', 1),
('AB', 'Vignan Pharmacy College,Vadlamudi ', 'GTR', 1),
('43', 'Vishwa Bharathi College of Pharmaceutical Science,Perecherla ', 'GTR', 1),
('7R', 'Chintalapudi Engineering College, Chintalapudi', 'GTR', 1),
('7T', 'Nannapaneni Venkata Rao College of Engineering & Technology,Tenali ', 'GTR', 1),
('7W', 'Malineni Perumallu Educational Society\'s Group of Inatiuttions ', 'GTR', 1),
('8X', 'Kallam Harinatha Reddy Institute of Technology, Chowdavaram, Guntur', 'GTR', 1),
('9H', 'Newton\'s Institute of Science & Technology, Macherla', 'GTR', 1),
('9U', 'Vishwa Bharathi College of Technology & Management', 'GTR', 1),
('2B', 'PNC & Vijai Institute of Engineering & Technology, Pirangipuram, ', 'GTR', 1),
('2R', 'Nalanda Institute of P.G. Studies, Kantepudi', 'GTR', 1),
('2W', 'G V R & S College of Engineering & Technology,Guntur', 'GTR', 1),
('2X', 'Hindu College of Engineering & Technology, Guntur', 'GTR', 1),
('B3', 'K C Reddy PG College', 'GTR', 0),
('35', 'Dr.Samuel George Institute of Engineering & Technology, Markapur', 'PKS', 1),
('49', 'QIS College of Engineering & Technology,Ongole', 'PKS', 1),
('77', 'Rao & Naidu Engineering College,Ongole', 'PKS', 0),
('85', 'Malineni Lakshmaiah Engineering College,Singarayakonda', 'PKS', 1),
('E9', 'Chirala Engineering College,Chirala ', 'PKS', 1),
('F0', 'St. Ann\'s College of Engineering & Technology,vetapalem ', 'PKS', 1),
('F9', 'Prakasam Engineering College,Kandukur ', 'PKS', 1),
('HJ', 'ABR College of Engineering & Technology , Kanigiri', 'PKS', 1),
('HR', 'Buchipalli Venkayamma Subbareddy Enginneering College,Chimakurthy.', 'PKS', 1),
('JU', 'Krishna Chaitanya Institute of Technology & Science,Devarajugattu. ', 'PKS', 1),
('KQ', 'Pace Institute of Technology & Science,Vallur', 'PKS', 1),
('L1', 'VRS & YRN College of Engineering & Technology,Chirala', 'PKS', 1),
('MA', 'QIS Institute of Technology,Ongole', 'PKS', 1),
('X9', 'Sri Satyanarayana Engineering College,Ongole', 'PKS', 1),
('Y3', 'QIS Collegeof Pharmacy ,Ongole', 'PKS', 1),
('DU', 'St. Ann\'s College of Pharmacy,Chirala ', 'PKS', 1),
('PG', 'BA&KR College of Pharmacy,Ongole', 'PKS', 1),
('PH', 'Bellamkonda Institute of Technology & Science,Podili ', 'PKS', 1),
('Z4', 'D C R M Pharmacy College,Inkollu', 'PKS', 1),
('7Y', 'A1 Global Institute of Engineering & Technology,Markapur ', 'PKS', 1),
('8C', 'Chaitanya College of Pharmacy,Devarajugattu ', 'PKS', 1),
('7Z', 'Indira Institute of Technology & Science,Markapur', 'PKS', 1),
('8A', 'Rise Krishna Sai Prakasam Group of Institutions, Vallur ', 'PKS', 1),
('8B', 'Rise Krishna Sai Gandhi Group of Institutions, Vallur', 'PKS', 1),
('8D', 'Addanki Institute of Management & Sciences, Addanki', 'PKS', 1),
('8R', 'BA&KR MCA College, Ongole', 'PKS', 1),
('9B', 'Global Institute of Business Management, Markapur', 'PKS', 1),
('9K', 'Sankar Reddy Institute of Pharmaceutical Sciences,Bestavaripeta', 'PKS', 1),
('2T', 'Malineni Lakshmaiah MBA College, Kanumalla,', 'PKS', 1),
('2C', 'Kamala Institute of Management Studies, Markapur', 'PKS', 1),
('2Y', 'Krishna Chaitanya Institute of Management, Devarajugattu, ', 'PKS', 1),
('3E', 'Chirla College of P.G. Studies, Chirala', 'PKS', 1),
('3F', 'Abinav Institute of Management & Technology, Singarayakonda.', 'PKS', 1),
('VV', 'University College Of Engineering, Vizianagaram', 'VZM', 1),
('03', 'University College Of Engineering,  Narasaraopet', 'GTR', 1),
('02', 'University College of Engineering, Kakinada', 'EG', 1);

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
-- Indexes for table `college_districts`
--
ALTER TABLE `college_districts`
  ADD PRIMARY KEY (`district`);

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
-- Indexes for table `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`cc`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_report`
--
ALTER TABLE `exam_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_register`
--
ALTER TABLE `faculty_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
