-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 05:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workwave_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(20) NOT NULL,
  `d_name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(1, 'Department 1'),
(2, 'Department 2'),
(3, 'Department 3');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`id`, `emp_id`, `attendance_date`, `in_time`, `out_time`, `status`) VALUES
(1, 1001, '2024-01-01', '08:55:00', '00:00:17', 'Present'),
(2, 1001, '2024-01-02', '10:36:00', '00:00:15', 'Half Day'),
(3, 1001, '2024-01-17', '11:09:00', '00:00:16', 'Half Day'),
(4, 1002, '2024-01-18', '05:10:00', '00:00:17', 'Present'),
(5, 1001, '2024-01-24', '00:00:00', '00:00:00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_reason` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `updated_on` date NOT NULL,
  `applied_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `staff_id`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `updated_on`, `applied_on`) VALUES
(1, 2, 'Sick', 'Not feeling well enough to join', 1, '2021-01-15', '2021-01-17', '0000-00-00', '2021-01-15'),
(2, 5, 'Casual Leave', 'been working for full hours since last month, got to free my mind for few days', 1, '2021-05-28', '2021-05-29', '0000-00-00', '2021-05-27'),
(3, 6, 'Day Off', 'Requesting for a day off as I need to join my pal\'s wedding!', 1, '2021-05-28', '2021-05-29', '0000-00-00', '2021-05-27'),
(4, 3, 'Casual Leave', 'for vacation, rest, and family events', 1, '2021-05-30', '2021-06-06', '0000-00-00', '2021-05-27'),
(5, 9, 'Quarantine', 'i need to quarantine myself for few weeks as i got some symptoms of covid-19', 1, '2021-05-28', '2021-06-11', '0000-00-00', '2021-05-27'),
(6, 5, 'sick', 'i am sick', 1, '2024-01-13', '2024-01-16', '0000-00-00', '2024-01-12'),
(7, 5, 'fever', 'i am sick', 1, '2024-01-13', '2024-01-15', '0000-00-00', '2024-01-12'),
(8, 0, 'fracture', 'i had an accident', 0, '2024-01-13', '2024-01-14', '0000-00-00', '0000-00-00'),
(9, 0, 'fractured', 'problem', 1, '2024-01-13', '2024-01-19', '0000-00-00', '0000-00-00'),
(10, 0, 'sicked', 'i will sick', 0, '2024-01-19', '2024-01-26', '0000-00-00', '0000-00-00'),
(11, 0, 'sicked', 'i will sick', 0, '2024-01-19', '2024-01-26', '0000-00-00', '0000-00-00'),
(13, 0, 'wedding', 'cousin wedding', 0, '2024-01-15', '2024-01-20', '0000-00-00', '0000-00-00'),
(14, 0, 'no mood', 'no mood to come office', 0, '2024-01-16', '2024-01-27', '0000-00-00', '0000-00-00'),
(15, 0, 'no mood to come', 'no mood to coe to office', 0, '2024-01-18', '2024-01-26', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(20) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` char(10) NOT NULL,
  `u_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `description`, `start_date`, `end_date`, `status`, `u_id`) VALUES
(1, 'test', '', '0000-00-00', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(20) NOT NULL,
  `r_name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `r_name`) VALUES
(1, 'admin'),
(2, 'HR'),
(3, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `bonus` decimal(10,2) NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `u_id`, `basic_salary`, `bonus`, `total_salary`, `payment_date`) VALUES
(3, 1000, 12000.00, 1000.00, 13000.00, '2024-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(11) NOT NULL,
  `t_title` varchar(255) NOT NULL,
  `t_description` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `t_title`, `t_description`, `department`, `start_date`, `end_date`, `status`) VALUES
(0, '', '', 'Department 2', '2024-01-30', '2024-02-10', ''),
(0, '', '', 'Department 2', '2024-01-30', '2024-02-10', ''),
(0, 'jeel nu ghar', '', 'Department 2', '2024-01-30', '2024-02-10', ''),
(0, 'jeeeeeeel', 'killllllllllllllllllllll', 'Department 3', '2024-01-17', '2024-02-05', ''),
(0, 'jeeeeeeel', 'killllllllllllllllllllll', 'Department 3', '2024-01-17', '2024-02-05', ''),
(0, '', '', '', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'krina', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_image` varchar(50) NOT NULL,
  `firstname` char(20) NOT NULL,
  `lastname` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `dob` date NOT NULL,
  `role` int(20) NOT NULL,
  `project_id` int(20) NOT NULL,
  `d_id` int(20) NOT NULL,
  `salary` int(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_joining` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `profile_image`, `firstname`, `lastname`, `email`, `phone`, `dob`, `role`, `project_id`, `d_id`, `salary`, `address`, `city`, `state`, `pincode`, `country`, `session_token`, `gender`, `date_of_joining`) VALUES
(1000, 'admin', 'admin', '', 'Admin', 'Admin', 'admin@123', 1111111111, '2005-01-06', 1, 1, 1, 12000, '', '', '', 0, '', '', '', '0000-00-00'),
(1001, 'krina', '123', '', 'krina', 'suthar', 'krina@123', 1234567890, '2005-01-05', 2, 1, 2, 20000, '', '', '', 0, '', '', '', '0000-00-00'),
(1014, '', '$2y$10$THHxLsn4IDOZh', 'profile_images/img_65a7c0bd1f44e.png', 'Yash', 'Rana', 'efacec@ijeac.com', 987654321, '2024-01-01', 1, 0, 2, 6969696, 'america', 'vaeaefvQE', 'qdw', 380060, 'India', '', 'male', '2024-01-01'),
(1015, '', '$2y$10$KIkPE7afdVdOB', 'profile_images/img_65a7c1091b901.png', 'Yash', 'Rana', 'efacec@ijeac.com', 987654321, '2024-01-01', 1, 0, 2, 6969696, 'america', 'vaeaefvQE', 'qdw', 380060, 'India', '', 'male', '2024-01-01'),
(1016, '', '$2y$10$8XaXI32Jakwt7', 'profile_images/img_65a7c22a8c4d2.png', 'Yash', 'Rana', 'efacec@ijeac.com', 987654321, '2024-01-01', 1, 0, 2, 6969696, 'america', 'vaeaefvQE', 'qdw', 380060, 'India', '', 'male', '2024-01-01'),
(1017, 'Yash Rana', '$2y$10$U4xdPquQcSJ.g', 'profile_images/img_65a7c26a7c02a.png', 'Yash', 'Rana', 'efacec@ijeac.com', 987654321, '2024-01-01', 1, 0, 2, 6969696, 'america', 'vaeaefvQE', 'qdw', 380060, 'India', '', 'male', '2024-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `project ref` (`project_id`),
  ADD KEY `role ref` (`role`),
  ADD KEY `department ref` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `department ref` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`),
  ADD CONSTRAINT `role ref` FOREIGN KEY (`role`) REFERENCES `role` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
