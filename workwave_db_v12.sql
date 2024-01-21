-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 12:22 PM
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

INSERT INTO `users` (`u_id`, `username`, `password`, `profile_image`, `firstname`, `lastname`, `email`, `phone`, `dob`, `role`, `d_id`, `salary`, `address`, `city`, `state`, `pincode`, `country`, `session_token`, `gender`, `date_of_joining`) VALUES
(1026, 'Yash Rana', '$2y$10$ci6nOPhlpJBqr', 'profile_images/img_65a91c2cb784a.jpg', 'Yash', 'Rana', 'yashrana123@gmail.com', 1234567899, '2024-01-01', 3, 4, 0, 'LJ', 'Ahmedabad', 'Gujarat', 380061, 'India', '', 'male', '2024-01-01'),
(1027, 'Jeel Viradiya', '$2y$10$m0JpDd8Op5Evx', 'profile_images/img_65a91c68a0b82.jpg', 'Jeel', 'Viradiya', 'jeelvir123@gmail.com', 2147481258, '2024-01-01', 4, 5, 0, 'LJ', 'Ahmedabad', 'Gujarat', 380051, 'India', '', 'male', '2024-01-02'),
(1029, 'Neha Soni', '$2y$10$g6/iI5dfDN8aB', 'profile_images/img_65acad197b00f.jpg', 'Neha', 'Soni', 'nehasoni@gmail.com', 2147483647, '2024-01-01', 4, 1, 0, 'ahm', 'ahm', 'guj', 333333, 'ind', '', 'female', '2024-01-16'),
(1030, 'parva shah', '$2y$10$rTYhKZfmfcZPS', 'profile_images/img_65ace50e832fe.jpg', 'parva', 'shah', 'parvi@gmail.com', 1234567890, '2024-01-23', 1, 4, 0, 'RAJ LAXMI PARK', 'Dhoraji (M)', 'Dhoraji,Rajkot,GJ', 360410, 'India', '', 'male', '2024-02-06'),
(1032, 'krina suthar', '123456', 'profile_images/img_65acef7ebe734.jpg', 'krina', 'suthar', 'krina@gmail.com', 2147483647, '2024-02-29', 3, 5, 0, 'qwer', 'asdf', 'zxcv', 123654, 'poiu', '', 'female', '2024-05-29'),
(1033, 'aaa aaa', '11111', 'profile_images/img_65acf179417e3.jpg', 'aaa', 'aaa', 'aaa@gmail.com', 1111111111, '2024-01-06', 3, 4, 0, 'aaa', 'aaa', 'aaa', 111111, 'aaa', '', 'male', '2023-12-31'),
(1034, 'qqq q', 'qqqq1111', 'profile_images/img_65acfa44da644.jpg', 'qqq', 'q', 'qqq@gmail.com', 1111111111, '2024-01-12', 1, 4, 0, 'q', 'q', 'q', 123465, 'q', '', 'male', '2024-02-01'),
(1035, 'ewefweff wefewfw', 'ewefweffwefewfw7890', 'profile_images/user_default_img.jpg', 'ewefweff', 'wefewfw', 'wefewf@gmail.com', 1234567890, '2024-01-06', 3, 1, 0, 'q', 'q', 'q', 124563, 'q', '', 'female', '2024-01-17');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;

--
-- Constraints for dumped tables
--

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
