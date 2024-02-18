-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:37 AM
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
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `empreg`
--

CREATE TABLE `empreg` (
  `empreg_id` int(11) NOT NULL,
  `empreg_code` text NOT NULL,
  `empreg_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oes_examstatus`
--

CREATE TABLE `oes_examstatus` (
  `code` int(11) NOT NULL,
  `sid` char(6) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_result`
--

CREATE TABLE `oes_exam_result` (
  `studentid` char(6) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `examdate` varchar(50) NOT NULL,
  `examtime` varchar(50) NOT NULL,
  `totalmark` int(11) NOT NULL,
  `examstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `oes_exam_result`
--

INSERT INTO `oes_exam_result` (`studentid`, `studentname`, `course`, `semester`, `subject`, `examdate`, `examtime`, `totalmark`, `examstatus`) VALUES
('std001', 'Raman Bhalla', 'B.Tech', 'Semester 1', 'C', '2024-01-14', '2:18', 90, 'closed'),
('std004', 'Phil Junior', 'B.Tech', 'Semester 1', 'C', '2024-01-15', '9:57', 10, 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `oes_exam_schedule`
--

CREATE TABLE `oes_exam_schedule` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `examdate` varchar(20) NOT NULL,
  `scheduledbyid` varchar(40) NOT NULL,
  `scheduledbyname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `oes_exam_schedule`
--

INSERT INTO `oes_exam_schedule` (`id`, `course`, `semester`, `subject`, `examdate`, `scheduledbyid`, `scheduledbyname`) VALUES
(1, 'B.Tech', 'Semester 1', 'C', '2024-01-15', 'adm001', 'Anshuman Dash'),
(3, 'B.Tech', 'Semester 1', 'C', '2024-01-14', 'adm001', 'Anshuman Dash'),
(4, 'B.Tech', 'Semester 1', 'Software engineering', '2024-01-15', 'adm001', 'Anshuman Dash');

-- --------------------------------------------------------

--
-- Table structure for table `oes_login`
--

CREATE TABLE `oes_login` (
  `userid` char(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(30) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `oes_login`
--

INSERT INTO `oes_login` (`userid`, `username`, `userpass`, `usertype`, `status`) VALUES
('adm001', 'Phil Junior', 'password', 'administrator', 'active'),
('emp001', 'Trailokya Sethi', 'password', 'employee', 'active'),
('emp002', 'Ishita Bhalla', 'password', 'employee', 'active'),
('emp003', 'Shagun Modi', 'password', 'employee', 'active'),
('emp004', 'Rekha Mazumdar', 'password', 'employee', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `oes_questionbank`
--

CREATE TABLE `oes_questionbank` (
  `code` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `oes_questionbank`
--

INSERT INTO `oes_questionbank` (`code`, `subject`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 'Java', 'Which is a valid keyword in java?', 'interface', 'Float', 'string', 'unsigned', 'option1'),
(2, 'Java', 'Which is a reserved word in the Java programming language?', 'method', 'native', 'subclasses', 'reference', 'option2'),
(3, 'Java', 'Which will legally declare, construct, and initialize an array?', 'int [] myList = {\"1\", \"2\", \"3\"};', 'int [] myList = (5, 8, 2);', 'int myList [] [] = {4,9,7,0};', 'int myList [] = {4, 3, 7};', 'option4'),
(4, 'Java', 'Which one of these lists contains only Java programming language keywords?', 'class, if, void, long, Int, continue', 'goto, instanceof, native, finally, default, throws', 'try, virtual, throw, final, volatile, transient', 'byte, break, assert, switch, include', 'option2'),
(5, 'Java', 'Which one of the following will declare an array and initialize it with five numbers?', 'Array a = new Array(5);', 'int [] a = {23,22,21,20,19};', 'int a [] = new int[5];', 'int [5] array;', 'option2'),
(7, 'Java', 'Which one is a valid declaration of a boolean?', 'boolean b1 = 0;', 'boolean b3 = false;', 'boolean b4 = Boolean.false();', 'boolean b5 = no;', 'option2'),
(8, 'Java', 'Which class cannot be a subclass in java', 'abstract class', 'parent class', 'Final class', 'None of above', 'option3'),
(9, 'Java', 'Why we use array as a parameter of main method', 'it is syntax', 'Can store multiple values', 'Both of above', 'None of above', 'option2'),
(10, 'Java', 'Suspend thread can be revived by using', 'start() method', 'Suspend() method', 'resume() method', 'yield() method', 'option3'),
(11, 'Java', 'Runnable is', 'Class', 'Method', 'Variable', 'Interface', 'option4'),
(13, 'Java', 'Which method is used to perform DML statements in JDBC?', 'execute()', 'executeUpdate()', 'executeQuery()', 'None of above', 'option2'),
(14, 'Java', 'Program which executes applet is known as', 'applet engine', 'virtual machine', 'JVM', 'None of above', 'option1'),
(15, 'Java', 'Which statement is static and synchronized in JDBC API', 'executeQuery()', 'executeUpdate()', 'getConnection()', 'prepareCall()', 'option3'),
(16, 'Java', 'The class java.sql.Timestamp is associated with', 'java.util.Time', 'java.sql.Time', 'java.util.Date', 'None of above', 'option3'),
(17, 'C', 'which language is suitable for software developers?', 'C', 'Python', 'Any language the developer is suitable with', 'PHP', 'option3');

-- --------------------------------------------------------

--
-- Table structure for table `oes_student`
--

CREATE TABLE `oes_student` (
  `studentid` char(6) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `course` varchar(30) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `oes_student`
--

INSERT INTO `oes_student` (`studentid`, `studentname`, `password`, `course`, `semester`, `status`) VALUES
('std001', 'Raman Bhalla', 'password', 'B.Tech', 'Semester 1', 'active'),
('std002', 'Pratyush Mohapatra', 'password', 'B.Tech', 'Semester 2', 'active'),
('std003', 'Sonali Dey', 'password', 'B.Tech', 'Semester 3', 'active'),
('std004', 'Phil Junior', 'password', 'B.Tech', 'Semester 1', 'active'),
('std005', 'Sandrine', 'password', 'B.Tech', 'Semester 1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `oes_subject`
--

CREATE TABLE `oes_subject` (
  `code` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `subject` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `oes_subject`
--

INSERT INTO `oes_subject` (`code`, `course`, `semester`, `subject`) VALUES
(5, 'B.Tech', 'Semester 1', 'C'),
(6, 'B.Tech', 'Semester 2', 'MATHS'),
(7, 'B.Tech', 'Semester 3', 'JAVA'),
(8, 'B.Tech', 'Semester 4', 'PHP'),
(9, 'B.Tech', 'Semester 1', 'Software engineering');

-- --------------------------------------------------------

--
-- Table structure for table `studentreg`
--

CREATE TABLE `studentreg` (
  `stdreg_id` int(11) NOT NULL,
  `std_code` text NOT NULL,
  `stdreg_user` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `studentreg`
--

INSERT INTO `studentreg` (`stdreg_id`, `std_code`, `stdreg_user`) VALUES
(1, 'YF@)M+Q3pK:A', 'std005'),
(2, 'a#P)7TYLnVrO', 'std006'),
(3, 'jT@KHB%-?vy#', '1214007'),
(4, '2OF@GkNt7o)D', '14073');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empreg`
--
ALTER TABLE `empreg`
  ADD PRIMARY KEY (`empreg_id`);

--
-- Indexes for table `oes_examstatus`
--
ALTER TABLE `oes_examstatus`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `oes_exam_result`
--
ALTER TABLE `oes_exam_result`
  ADD PRIMARY KEY (`studentid`,`subject`);

--
-- Indexes for table `oes_exam_schedule`
--
ALTER TABLE `oes_exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oes_login`
--
ALTER TABLE `oes_login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `oes_questionbank`
--
ALTER TABLE `oes_questionbank`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `oes_student`
--
ALTER TABLE `oes_student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `oes_subject`
--
ALTER TABLE `oes_subject`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `studentreg`
--
ALTER TABLE `studentreg`
  ADD PRIMARY KEY (`stdreg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empreg`
--
ALTER TABLE `empreg`
  MODIFY `empreg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oes_examstatus`
--
ALTER TABLE `oes_examstatus`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oes_exam_schedule`
--
ALTER TABLE `oes_exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oes_questionbank`
--
ALTER TABLE `oes_questionbank`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `oes_subject`
--
ALTER TABLE `oes_subject`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `studentreg`
--
ALTER TABLE `studentreg`
  MODIFY `stdreg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
