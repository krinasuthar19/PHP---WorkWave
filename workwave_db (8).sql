-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 08:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `assign_task`
--

CREATE TABLE `assign_task` (
  `id` int(11) NOT NULL,
  `u_id` int(20) NOT NULL,
  `t_id` int(11) NOT NULL,
  `d_id` int(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_task`
--

INSERT INTO `assign_task` (`id`, `u_id`, `t_id`, `d_id`, `status`) VALUES
(12, 1038, 32, 4, ''),
(13, 1038, 32, 4, ''),
(14, 1038, 33, 4, '');

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
(1, 'Finance'),
(2, 'Marketing'),
(3, 'Sales'),
(4, 'Operations'),
(5, 'Production'),
(6, 'Distribution'),
(7, 'Administration');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(20) NOT NULL,
  `attendance_date` date NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`id`, `emp_id`, `attendance_date`, `in_time`, `out_time`, `status`) VALUES
(1, 1035, '2024-02-01', NULL, NULL, 'present'),
(2, 1035, '2024-02-02', NULL, NULL, 'absent'),
(3, 1036, '2024-02-03', NULL, NULL, 'half-day'),
(4, 1036, '2024-02-04', NULL, NULL, 'absent'),
(5, 1037, '2024-02-05', NULL, NULL, 'present'),
(6, 1037, '2024-02-06', NULL, NULL, 'present'),
(7, 1038, '2024-02-07', NULL, NULL, 'present'),
(8, 1038, '2024-02-08', NULL, NULL, 'half-day'),
(16, 1035, '2024-02-03', '00:00:00', '00:00:00', 'absent'),
(17, 1035, '2024-02-05', '08:57:00', '17:11:00', 'present'),
(18, 1035, '2024-02-06', '08:08:00', '16:06:00', 'half-day');

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(11) NOT NULL,
  `emp_id` int(20) NOT NULL,
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

INSERT INTO `leave_tbl` (`id`, `emp_id`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `updated_on`, `applied_on`) VALUES
(2, 1036, 'i am pm and i am asking for 5 days leave', 'mane maja nathi', 1, '2024-02-09', '2024-02-14', '0000-00-00', '0000-00-00'),
(3, 1038, 'fracture', 'accident', 2, '2024-03-01', '2024-03-07', '0000-00-00', '2024-02-22');

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
(2, 'hr'),
(3, 'pm'),
(4, 'emp');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `base_salary` decimal(10,2) DEFAULT NULL,
  `deduction` decimal(10,2) DEFAULT NULL,
  `allowance` decimal(10,2) DEFAULT NULL,
  `final_salary` decimal(10,2) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` int(10) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `hr_status` int(11) DEFAULT 0,
  `admin_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `u_id`, `base_salary`, `deduction`, `allowance`, `final_salary`, `month`, `year`, `payment_date`, `hr_status`, `admin_status`) VALUES
(7, 1035, 50000.00, 0.00, 0.00, 50000.00, 'January ', 2024, '2024-02-24', 1, 1),
(9, 1036, 25000.00, 3000.00, 5000.00, 27000.00, 'January', 2022, '2024-02-24', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(11) NOT NULL,
  `t_title` varchar(255) NOT NULL,
  `t_description` varchar(255) NOT NULL,
  `department` int(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `t_title`, `t_description`, `department`, `start_date`, `end_date`, `status`) VALUES
(32, 'project5', 'complete it soon', 4, '2024-02-21', '2024-02-23', '1'),
(33, 'test', 'test', 4, '2024-02-22', '2024-02-24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `firstname` char(20) NOT NULL,
  `lastname` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `dob` date NOT NULL,
  `role` int(20) NOT NULL,
  `d_id` int(20) NOT NULL,
  `salary` int(5) NOT NULL,
  `total_salary_paid` int(20) NOT NULL DEFAULT 0,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_joining` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `profile_image`, `firstname`, `lastname`, `email`, `phone`, `dob`, `role`, `d_id`, `salary`, `total_salary_paid`, `address`, `city`, `state`, `pincode`, `country`, `gender`, `date_of_joining`) VALUES
(1035, 'username_admin', 'admin', 'profile_images/user_default_img.jpg', 'admin', 'admin', 'admin@gmail.com', 1234567890, '2024-02-08', 1, 1, 50000, 179010, 'qwe', 'ahmedabad', 'gujarat', 123456, 'india', 'male', '2024-02-09'),
(1036, 'username_hr', 'hr', 'profile_images/user_default_img.jpg', 'hr', 'hr', 'hr@gmail.com', 1234567890, '2024-02-08', 2, 2, 25000, 52000, 'qwe', 'ahmedabad', 'gujarat', 123456, 'india', 'male', '2024-02-09'),
(1037, 'username_pm', 'pm', 'profile_images/user_default_img.jpg', 'pm', 'pm', 'pm@gmail.com', 1234567890, '2024-02-08', 3, 4, 5000, 0, 'qwe', 'ahmedabad', 'gujarat', 123456, 'india', 'male', '2024-02-09'),
(1038, 'username_emp', 'emp', 'profile_images/user_default_img.jpg', 'emp', 'emp', 'emp@gmail.com', 1234567890, '2024-02-08', 4, 4, 1000, 0, 'qwe', 'ahmedabad', 'gujarat', 123456, 'india', 'male', '2024-02-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_task`
--
ALTER TABLE `assign_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user ref` (`emp_id`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `role ref` (`role`),
  ADD KEY `department ref` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_task`
--
ALTER TABLE `assign_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1039;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_task`
--
ALTER TABLE `assign_task`
  ADD CONSTRAINT `t_id` FOREIGN KEY (`t_id`) REFERENCES `task` (`t_id`),
  ADD CONSTRAINT `u_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD CONSTRAINT `user ref` FOREIGN KEY (`emp_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `users` (`u_id`);

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
