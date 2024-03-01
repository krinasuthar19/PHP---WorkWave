-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 05:47 AM
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
(14, 1038, 33, 4, ''),
(15, 1038, 35, 4, '');

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
(4517, 1036, '2024-01-01', NULL, NULL, 'holiday'),
(4518, 1037, '2024-01-01', NULL, NULL, 'holiday'),
(4519, 1038, '2024-01-01', NULL, NULL, 'holiday'),
(4521, 1036, '2024-01-07', NULL, NULL, 'holiday'),
(4522, 1037, '2024-01-07', NULL, NULL, 'holiday'),
(4523, 1038, '2024-01-07', NULL, NULL, 'holiday'),
(4525, 1036, '2024-01-14', NULL, NULL, 'holiday'),
(4526, 1037, '2024-01-14', NULL, NULL, 'holiday'),
(4527, 1038, '2024-01-14', NULL, NULL, 'holiday'),
(4529, 1036, '2024-01-15', NULL, NULL, 'holiday'),
(4530, 1037, '2024-01-15', NULL, NULL, 'holiday'),
(4531, 1038, '2024-01-15', NULL, NULL, 'holiday'),
(4533, 1036, '2024-01-21', NULL, NULL, 'holiday'),
(4534, 1037, '2024-01-21', NULL, NULL, 'holiday'),
(4535, 1038, '2024-01-21', NULL, NULL, 'holiday'),
(4537, 1036, '2024-01-26', NULL, NULL, 'holiday'),
(4538, 1037, '2024-01-26', NULL, NULL, 'holiday'),
(4539, 1038, '2024-01-26', NULL, NULL, 'holiday'),
(4541, 1036, '2024-01-28', NULL, NULL, 'holiday'),
(4542, 1037, '2024-01-28', NULL, NULL, 'holiday'),
(4543, 1038, '2024-01-28', NULL, NULL, 'holiday'),
(4545, 1036, '2024-02-04', NULL, NULL, 'holiday'),
(4546, 1037, '2024-02-04', NULL, NULL, 'holiday'),
(4547, 1038, '2024-02-04', NULL, NULL, 'holiday'),
(4549, 1036, '2024-02-11', NULL, NULL, 'holiday'),
(4550, 1037, '2024-02-11', NULL, NULL, 'holiday'),
(4551, 1038, '2024-02-11', NULL, NULL, 'holiday'),
(4553, 1036, '2024-02-18', NULL, NULL, 'holiday'),
(4554, 1037, '2024-02-18', NULL, NULL, 'holiday'),
(4555, 1038, '2024-02-18', NULL, NULL, 'holiday'),
(4557, 1036, '2024-02-21', NULL, NULL, 'holiday'),
(4558, 1037, '2024-02-21', NULL, NULL, 'holiday'),
(4559, 1038, '2024-02-21', NULL, NULL, 'holiday'),
(4561, 1036, '2024-02-25', NULL, NULL, 'holiday'),
(4562, 1037, '2024-02-25', NULL, NULL, 'holiday'),
(4563, 1038, '2024-02-25', NULL, NULL, 'holiday'),
(4565, 1036, '2024-03-03', NULL, NULL, 'holiday'),
(4566, 1037, '2024-03-03', NULL, NULL, 'holiday'),
(4567, 1038, '2024-03-03', NULL, NULL, 'holiday'),
(4569, 1036, '2024-03-08', NULL, NULL, 'holiday'),
(4570, 1037, '2024-03-08', NULL, NULL, 'holiday'),
(4571, 1038, '2024-03-08', NULL, NULL, 'holiday'),
(4573, 1036, '2024-03-10', NULL, NULL, 'holiday'),
(4574, 1037, '2024-03-10', NULL, NULL, 'holiday'),
(4575, 1038, '2024-03-10', NULL, NULL, 'holiday'),
(4577, 1036, '2024-03-17', NULL, NULL, 'holiday'),
(4578, 1037, '2024-03-17', NULL, NULL, 'holiday'),
(4579, 1038, '2024-03-17', NULL, NULL, 'holiday'),
(4581, 1036, '2024-03-24', NULL, NULL, 'holiday'),
(4582, 1037, '2024-03-24', NULL, NULL, 'holiday'),
(4583, 1038, '2024-03-24', NULL, NULL, 'holiday'),
(4585, 1036, '2024-03-31', NULL, NULL, 'holiday'),
(4586, 1037, '2024-03-31', NULL, NULL, 'holiday'),
(4587, 1038, '2024-03-31', NULL, NULL, 'holiday'),
(4589, 1036, '2024-04-07', NULL, NULL, 'holiday'),
(4590, 1037, '2024-04-07', NULL, NULL, 'holiday'),
(4591, 1038, '2024-04-07', NULL, NULL, 'holiday'),
(4593, 1036, '2024-04-14', NULL, NULL, 'holiday'),
(4594, 1037, '2024-04-14', NULL, NULL, 'holiday'),
(4595, 1038, '2024-04-14', NULL, NULL, 'holiday'),
(4597, 1036, '2024-04-19', NULL, NULL, 'holiday'),
(4598, 1037, '2024-04-19', NULL, NULL, 'holiday'),
(4599, 1038, '2024-04-19', NULL, NULL, 'holiday'),
(4601, 1036, '2024-04-21', NULL, NULL, 'holiday'),
(4602, 1037, '2024-04-21', NULL, NULL, 'holiday'),
(4603, 1038, '2024-04-21', NULL, NULL, 'holiday'),
(4605, 1036, '2024-04-28', NULL, NULL, 'holiday'),
(4606, 1037, '2024-04-28', NULL, NULL, 'holiday'),
(4607, 1038, '2024-04-28', NULL, NULL, 'holiday'),
(4609, 1036, '2024-05-01', NULL, NULL, 'holiday'),
(4610, 1037, '2024-05-01', NULL, NULL, 'holiday'),
(4611, 1038, '2024-05-01', NULL, NULL, 'holiday'),
(4613, 1036, '2024-05-05', NULL, NULL, 'holiday'),
(4614, 1037, '2024-05-05', NULL, NULL, 'holiday'),
(4615, 1038, '2024-05-05', NULL, NULL, 'holiday'),
(4617, 1036, '2024-05-12', NULL, NULL, 'holiday'),
(4618, 1037, '2024-05-12', NULL, NULL, 'holiday'),
(4619, 1038, '2024-05-12', NULL, NULL, 'holiday'),
(4621, 1036, '2024-05-19', NULL, NULL, 'holiday'),
(4622, 1037, '2024-05-19', NULL, NULL, 'holiday'),
(4623, 1038, '2024-05-19', NULL, NULL, 'holiday'),
(4625, 1036, '2024-05-26', NULL, NULL, 'holiday'),
(4626, 1037, '2024-05-26', NULL, NULL, 'holiday'),
(4627, 1038, '2024-05-26', NULL, NULL, 'holiday'),
(4629, 1036, '2024-06-02', NULL, NULL, 'holiday'),
(4630, 1037, '2024-06-02', NULL, NULL, 'holiday'),
(4631, 1038, '2024-06-02', NULL, NULL, 'holiday'),
(4633, 1036, '2024-06-09', NULL, NULL, 'holiday'),
(4634, 1037, '2024-06-09', NULL, NULL, 'holiday'),
(4635, 1038, '2024-06-09', NULL, NULL, 'holiday'),
(4637, 1036, '2024-06-16', NULL, NULL, 'holiday'),
(4638, 1037, '2024-06-16', NULL, NULL, 'holiday'),
(4639, 1038, '2024-06-16', NULL, NULL, 'holiday'),
(4641, 1036, '2024-06-23', NULL, NULL, 'holiday'),
(4642, 1037, '2024-06-23', NULL, NULL, 'holiday'),
(4643, 1038, '2024-06-23', NULL, NULL, 'holiday'),
(4645, 1036, '2024-06-30', NULL, NULL, 'holiday'),
(4646, 1037, '2024-06-30', NULL, NULL, 'holiday'),
(4647, 1038, '2024-06-30', NULL, NULL, 'holiday'),
(4649, 1036, '2024-07-07', NULL, NULL, 'holiday'),
(4650, 1037, '2024-07-07', NULL, NULL, 'holiday'),
(4651, 1038, '2024-07-07', NULL, NULL, 'holiday'),
(4653, 1036, '2024-07-14', NULL, NULL, 'holiday'),
(4654, 1037, '2024-07-14', NULL, NULL, 'holiday'),
(4655, 1038, '2024-07-14', NULL, NULL, 'holiday'),
(4657, 1036, '2024-07-21', NULL, NULL, 'holiday'),
(4658, 1037, '2024-07-21', NULL, NULL, 'holiday'),
(4659, 1038, '2024-07-21', NULL, NULL, 'holiday'),
(4661, 1036, '2024-07-28', NULL, NULL, 'holiday'),
(4662, 1037, '2024-07-28', NULL, NULL, 'holiday'),
(4663, 1038, '2024-07-28', NULL, NULL, 'holiday'),
(4665, 1036, '2024-08-04', NULL, NULL, 'holiday'),
(4666, 1037, '2024-08-04', NULL, NULL, 'holiday'),
(4667, 1038, '2024-08-04', NULL, NULL, 'holiday'),
(4669, 1036, '2024-08-11', NULL, NULL, 'holiday'),
(4670, 1037, '2024-08-11', NULL, NULL, 'holiday'),
(4671, 1038, '2024-08-11', NULL, NULL, 'holiday'),
(4673, 1036, '2024-08-15', NULL, NULL, 'holiday'),
(4674, 1037, '2024-08-15', NULL, NULL, 'holiday'),
(4675, 1038, '2024-08-15', NULL, NULL, 'holiday'),
(4677, 1036, '2024-08-18', NULL, NULL, 'holiday'),
(4678, 1037, '2024-08-18', NULL, NULL, 'holiday'),
(4679, 1038, '2024-08-18', NULL, NULL, 'holiday'),
(4681, 1036, '2024-08-25', NULL, NULL, 'holiday'),
(4682, 1037, '2024-08-25', NULL, NULL, 'holiday'),
(4683, 1038, '2024-08-25', NULL, NULL, 'holiday'),
(4685, 1036, '2024-09-01', NULL, NULL, 'holiday'),
(4686, 1037, '2024-09-01', NULL, NULL, 'holiday'),
(4687, 1038, '2024-09-01', NULL, NULL, 'holiday'),
(4689, 1036, '2024-09-02', NULL, NULL, 'holiday'),
(4690, 1037, '2024-09-02', NULL, NULL, 'holiday'),
(4691, 1038, '2024-09-02', NULL, NULL, 'holiday'),
(4693, 1036, '2024-09-08', NULL, NULL, 'holiday'),
(4694, 1037, '2024-09-08', NULL, NULL, 'holiday'),
(4695, 1038, '2024-09-08', NULL, NULL, 'holiday'),
(4697, 1036, '2024-09-15', NULL, NULL, 'holiday'),
(4698, 1037, '2024-09-15', NULL, NULL, 'holiday'),
(4699, 1038, '2024-09-15', NULL, NULL, 'holiday'),
(4701, 1036, '2024-09-22', NULL, NULL, 'holiday'),
(4702, 1037, '2024-09-22', NULL, NULL, 'holiday'),
(4703, 1038, '2024-09-22', NULL, NULL, 'holiday'),
(4705, 1036, '2024-09-29', NULL, NULL, 'holiday'),
(4706, 1037, '2024-09-29', NULL, NULL, 'holiday'),
(4707, 1038, '2024-09-29', NULL, NULL, 'holiday'),
(4709, 1036, '2024-10-02', NULL, NULL, 'holiday'),
(4710, 1037, '2024-10-02', NULL, NULL, 'holiday'),
(4711, 1038, '2024-10-02', NULL, NULL, 'holiday'),
(4713, 1036, '2024-10-06', NULL, NULL, 'holiday'),
(4714, 1037, '2024-10-06', NULL, NULL, 'holiday'),
(4715, 1038, '2024-10-06', NULL, NULL, 'holiday'),
(4717, 1036, '2024-10-13', NULL, NULL, 'holiday'),
(4718, 1037, '2024-10-13', NULL, NULL, 'holiday'),
(4719, 1038, '2024-10-13', NULL, NULL, 'holiday'),
(4721, 1036, '2024-10-20', NULL, NULL, 'holiday'),
(4722, 1037, '2024-10-20', NULL, NULL, 'holiday'),
(4723, 1038, '2024-10-20', NULL, NULL, 'holiday'),
(4725, 1036, '2024-10-27', NULL, NULL, 'holiday'),
(4726, 1037, '2024-10-27', NULL, NULL, 'holiday'),
(4727, 1038, '2024-10-27', NULL, NULL, 'holiday'),
(4729, 1036, '2024-10-28', NULL, NULL, 'holiday'),
(4730, 1037, '2024-10-28', NULL, NULL, 'holiday'),
(4731, 1038, '2024-10-28', NULL, NULL, 'holiday'),
(4733, 1036, '2024-11-02', NULL, NULL, 'holiday'),
(4734, 1037, '2024-11-02', NULL, NULL, 'holiday'),
(4735, 1038, '2024-11-02', NULL, NULL, 'holiday'),
(4737, 1036, '2024-11-03', NULL, NULL, 'holiday'),
(4738, 1037, '2024-11-03', NULL, NULL, 'holiday'),
(4739, 1038, '2024-11-03', NULL, NULL, 'holiday'),
(4741, 1036, '2024-11-10', NULL, NULL, 'holiday'),
(4742, 1037, '2024-11-10', NULL, NULL, 'holiday'),
(4743, 1038, '2024-11-10', NULL, NULL, 'holiday'),
(4745, 1036, '2024-11-17', NULL, NULL, 'holiday'),
(4746, 1037, '2024-11-17', NULL, NULL, 'holiday'),
(4747, 1038, '2024-11-17', NULL, NULL, 'holiday'),
(4749, 1036, '2024-11-24', NULL, NULL, 'holiday'),
(4750, 1037, '2024-11-24', NULL, NULL, 'holiday'),
(4751, 1038, '2024-11-24', NULL, NULL, 'holiday'),
(4753, 1036, '2024-12-01', NULL, NULL, 'holiday'),
(4754, 1037, '2024-12-01', NULL, NULL, 'holiday'),
(4755, 1038, '2024-12-01', NULL, NULL, 'holiday'),
(4757, 1036, '2024-12-08', NULL, NULL, 'holiday'),
(4758, 1037, '2024-12-08', NULL, NULL, 'holiday'),
(4759, 1038, '2024-12-08', NULL, NULL, 'holiday'),
(4761, 1036, '2024-12-15', NULL, NULL, 'holiday'),
(4762, 1037, '2024-12-15', NULL, NULL, 'holiday'),
(4763, 1038, '2024-12-15', NULL, NULL, 'holiday'),
(4765, 1036, '2024-12-22', NULL, NULL, 'holiday'),
(4766, 1037, '2024-12-22', NULL, NULL, 'holiday'),
(4767, 1038, '2024-12-22', NULL, NULL, 'holiday'),
(4769, 1036, '2024-12-25', NULL, NULL, 'holiday'),
(4770, 1037, '2024-12-25', NULL, NULL, 'holiday'),
(4771, 1038, '2024-12-25', NULL, NULL, 'holiday'),
(4773, 1036, '2024-12-29', NULL, NULL, 'holiday'),
(4774, 1037, '2024-12-29', NULL, NULL, 'holiday'),
(4775, 1038, '2024-12-29', NULL, NULL, 'holiday'),
(4777, 1036, '2024-01-02', '09:12:00', '18:18:00', 'present'),
(4778, 1037, '2024-01-02', '10:55:00', '16:59:00', 'present'),
(4779, 1038, '2024-01-02', '10:46:00', '18:45:00', 'absent'),
(4781, 1036, '2024-01-03', '10:18:00', '17:14:00', 'present'),
(4782, 1037, '2024-01-03', '09:58:00', '16:39:00', 'present'),
(4783, 1038, '2024-01-03', '09:59:00', '16:20:00', 'present'),
(4785, 1036, '2024-01-04', '08:29:00', '17:11:00', 'present'),
(4786, 1037, '2024-01-04', '09:10:00', '16:51:00', 'absent'),
(4787, 1038, '2024-01-04', '10:14:00', '18:36:00', 'present'),
(4789, 1036, '2024-01-05', '09:42:00', '17:43:00', 'present'),
(4790, 1037, '2024-01-05', '08:52:00', '17:09:00', 'present'),
(4791, 1038, '2024-01-05', '10:01:00', '18:36:00', 'half-day'),
(4793, 1036, '2024-01-06', '09:26:00', '17:46:00', 'present'),
(4794, 1037, '2024-01-06', '09:45:00', '16:05:00', 'present'),
(4795, 1038, '2024-01-06', '09:50:00', '17:23:00', 'half-day'),
(4797, 1036, '2024-01-08', '10:37:00', '17:41:00', 'present'),
(4798, 1037, '2024-01-08', '10:17:00', '17:49:00', 'absent'),
(4799, 1038, '2024-01-08', '09:03:00', '16:17:00', 'present'),
(4801, 1036, '2024-01-09', '09:19:00', '17:29:00', 'half-day'),
(4802, 1037, '2024-01-09', '08:13:00', '16:52:00', 'present'),
(4803, 1038, '2024-01-09', '09:47:00', '16:56:00', 'present'),
(4805, 1036, '2024-01-10', '08:22:00', '16:31:00', 'present'),
(4806, 1037, '2024-01-10', '08:43:00', '18:05:00', 'present'),
(4807, 1038, '2024-01-10', '09:54:00', '16:39:00', 'present'),
(4809, 1036, '2024-01-11', '10:15:00', '18:01:00', 'half-day'),
(4810, 1037, '2024-01-11', '09:47:00', '18:30:00', 'present'),
(4811, 1038, '2024-01-11', '08:49:00', '18:32:00', 'half-day'),
(4813, 1036, '2024-01-12', '08:56:00', '17:36:00', 'present'),
(4814, 1037, '2024-01-12', '08:58:00', '18:04:00', 'present'),
(4815, 1038, '2024-01-12', '10:45:00', '18:19:00', 'absent'),
(4817, 1036, '2024-01-13', '10:54:00', '18:44:00', 'half-day'),
(4818, 1037, '2024-01-13', '09:45:00', '16:30:00', 'half-day'),
(4819, 1038, '2024-01-13', '10:20:00', '16:37:00', 'absent'),
(4821, 1036, '2024-01-16', '08:49:00', '16:35:00', 'half-day'),
(4822, 1037, '2024-01-16', '08:36:00', '18:08:00', 'present'),
(4823, 1038, '2024-01-16', '10:04:00', '16:41:00', 'absent'),
(4825, 1036, '2024-01-17', '10:00:00', '16:50:00', 'present'),
(4826, 1037, '2024-01-17', '08:55:00', '16:21:00', 'present'),
(4827, 1038, '2024-01-17', '10:31:00', '16:30:00', 'absent'),
(4829, 1036, '2024-01-18', '10:36:00', '16:19:00', 'present'),
(4830, 1037, '2024-01-18', '09:05:00', '17:47:00', 'present'),
(4831, 1038, '2024-01-18', '10:41:00', '17:44:00', 'present'),
(4833, 1036, '2024-01-19', '09:00:00', '18:04:00', 'absent'),
(4834, 1037, '2024-01-19', '09:45:00', '17:17:00', 'present'),
(4835, 1038, '2024-01-19', '08:38:00', '17:58:00', 'present'),
(4837, 1036, '2024-01-20', '10:52:00', '18:47:00', 'absent'),
(4838, 1037, '2024-01-20', '09:59:00', '18:56:00', 'present'),
(4839, 1038, '2024-01-20', '10:37:00', '16:33:00', 'present'),
(4841, 1036, '2024-01-22', '09:59:00', '16:02:00', 'present'),
(4842, 1037, '2024-01-22', '09:28:00', '16:02:00', 'absent'),
(4843, 1038, '2024-01-22', '08:55:00', '18:38:00', 'present'),
(4845, 1036, '2024-01-23', '10:18:00', '18:05:00', 'present'),
(4846, 1037, '2024-01-23', '10:01:00', '16:06:00', 'half-day'),
(4847, 1038, '2024-01-23', '10:30:00', '18:17:00', 'present'),
(4849, 1036, '2024-01-24', '10:24:00', '18:11:00', 'present'),
(4850, 1037, '2024-01-24', '08:50:00', '17:06:00', 'present'),
(4851, 1038, '2024-01-24', '08:38:00', '17:26:00', 'present'),
(4853, 1036, '2024-01-25', '08:38:00', '16:39:00', 'absent'),
(4854, 1037, '2024-01-25', '09:19:00', '18:53:00', 'absent'),
(4855, 1038, '2024-01-25', '09:27:00', '18:31:00', 'half-day'),
(4857, 1036, '2024-01-27', '10:13:00', '16:03:00', 'half-day'),
(4858, 1037, '2024-01-27', '09:11:00', '16:01:00', 'present'),
(4859, 1038, '2024-01-27', '09:24:00', '18:40:00', 'present'),
(4861, 1036, '2024-01-29', '08:37:00', '16:39:00', 'present'),
(4862, 1037, '2024-01-29', '09:05:00', '18:46:00', 'present'),
(4863, 1038, '2024-01-29', '09:57:00', '18:40:00', 'present'),
(4865, 1036, '2024-01-30', '09:34:00', '18:25:00', 'absent'),
(4866, 1037, '2024-01-30', '09:51:00', '17:41:00', 'present'),
(4867, 1038, '2024-01-30', '08:27:00', '18:04:00', 'present'),
(4869, 1036, '2024-01-31', '08:44:00', '18:23:00', 'present'),
(4870, 1037, '2024-01-31', '08:09:00', '18:51:00', 'present'),
(4871, 1038, '2024-01-31', '08:54:00', '18:45:00', 'present'),
(4873, 1036, '2024-02-01', '08:23:00', '17:03:00', 'present'),
(4874, 1037, '2024-02-01', '10:51:00', '17:58:00', 'present'),
(4875, 1038, '2024-02-01', '09:46:00', '17:37:00', 'half-day'),
(4877, 1036, '2024-02-02', '08:19:00', '17:53:00', 'absent'),
(4878, 1037, '2024-02-02', '08:18:00', '18:26:00', 'absent'),
(4879, 1038, '2024-02-02', '10:56:00', '17:29:00', 'present'),
(4881, 1036, '2024-02-03', '10:33:00', '17:16:00', 'present'),
(4882, 1037, '2024-02-03', '08:25:00', '18:57:00', 'present'),
(4883, 1038, '2024-02-03', '08:53:00', '16:51:00', 'present'),
(4885, 1036, '2024-02-05', '10:15:00', '17:55:00', 'present'),
(4886, 1037, '2024-02-05', '10:04:00', '17:19:00', 'present'),
(4887, 1038, '2024-02-05', '09:54:00', '18:53:00', 'present'),
(4889, 1036, '2024-02-06', '10:55:00', '16:01:00', 'present'),
(4890, 1037, '2024-02-06', '10:08:00', '16:02:00', 'absent'),
(4891, 1038, '2024-02-06', '10:59:00', '18:56:00', 'present'),
(4893, 1036, '2024-02-07', '09:39:00', '17:13:00', 'present'),
(4894, 1037, '2024-02-07', '09:40:00', '16:08:00', 'present'),
(4895, 1038, '2024-02-07', '10:38:00', '16:24:00', 'present'),
(4897, 1036, '2024-02-08', '08:01:00', '17:07:00', 'absent'),
(4898, 1037, '2024-02-08', '08:34:00', '18:38:00', 'present'),
(4899, 1038, '2024-02-08', '08:13:00', '17:12:00', 'present'),
(4901, 1036, '2024-02-09', '09:25:00', '18:15:00', 'present'),
(4902, 1037, '2024-02-09', '10:12:00', '16:05:00', 'present'),
(4903, 1038, '2024-02-09', '09:13:00', '17:23:00', 'present'),
(4905, 1036, '2024-02-10', '08:00:00', '17:18:00', 'present'),
(4906, 1037, '2024-02-10', '09:49:00', '18:22:00', 'half-day'),
(4907, 1038, '2024-02-10', '10:34:00', '18:43:00', 'absent'),
(4909, 1036, '2024-02-12', '10:30:00', '18:51:00', 'present'),
(4910, 1037, '2024-02-12', '09:02:00', '16:00:00', 'half-day'),
(4911, 1038, '2024-02-12', '10:21:00', '16:56:00', 'present'),
(4913, 1036, '2024-02-13', '08:45:00', '17:18:00', 'present'),
(4914, 1037, '2024-02-13', '09:14:00', '18:41:00', 'absent'),
(4915, 1038, '2024-02-13', '08:01:00', '18:47:00', 'present'),
(4917, 1036, '2024-02-14', '10:48:00', '17:43:00', 'half-day'),
(4918, 1037, '2024-02-14', '09:53:00', '17:30:00', 'present'),
(4919, 1038, '2024-02-14', '10:44:00', '18:49:00', 'present'),
(4921, 1036, '2024-02-15', '08:58:00', '18:09:00', 'present'),
(4922, 1037, '2024-02-15', '10:08:00', '17:58:00', 'present'),
(4923, 1038, '2024-02-15', '10:29:00', '16:19:00', 'half-day'),
(4925, 1036, '2024-02-16', '09:12:00', '16:07:00', 'absent'),
(4926, 1037, '2024-02-16', '08:29:00', '16:07:00', 'present'),
(4927, 1038, '2024-02-16', '09:14:00', '17:44:00', 'half-day'),
(4929, 1036, '2024-02-17', '10:07:00', '17:48:00', 'present'),
(4930, 1037, '2024-02-17', '10:06:00', '18:02:00', 'half-day'),
(4931, 1038, '2024-02-17', '10:47:00', '17:53:00', 'present'),
(4933, 1036, '2024-02-19', '08:09:00', '18:44:00', 'present'),
(4934, 1037, '2024-02-19', '10:19:00', '17:11:00', 'absent'),
(4935, 1038, '2024-02-19', '10:36:00', '18:46:00', 'present'),
(4937, 1036, '2024-02-20', '09:54:00', '18:42:00', 'present'),
(4938, 1037, '2024-02-20', '08:00:00', '18:29:00', 'present'),
(4939, 1038, '2024-02-20', '09:04:00', '16:28:00', 'present'),
(4941, 1036, '2024-02-22', '09:08:00', '17:30:00', 'present'),
(4942, 1037, '2024-02-22', '10:51:00', '17:21:00', 'present'),
(4943, 1038, '2024-02-22', '09:02:00', '16:27:00', 'present'),
(4945, 1036, '2024-02-23', '08:20:00', '16:01:00', 'absent'),
(4946, 1037, '2024-02-23', '09:15:00', '17:40:00', 'present'),
(4947, 1038, '2024-02-23', '09:19:00', '16:22:00', 'present'),
(4949, 1036, '2024-02-24', '09:03:00', '18:27:00', 'present'),
(4950, 1037, '2024-02-24', '08:28:00', '17:18:00', 'present'),
(4951, 1038, '2024-02-24', '08:45:00', '18:09:00', 'present'),
(4953, 1036, '2024-02-26', '09:39:00', '16:00:00', 'present'),
(4954, 1037, '2024-02-26', '08:57:00', '17:08:00', 'absent'),
(4955, 1038, '2024-02-26', '08:21:00', '18:42:00', 'absent'),
(4957, 1036, '2024-02-27', '09:55:00', '17:56:00', 'present'),
(4958, 1037, '2024-02-27', '08:55:00', '18:36:00', 'half-day'),
(4959, 1038, '2024-02-27', '10:49:00', '16:14:00', 'present'),
(4961, 1036, '2024-02-28', '10:40:00', '16:54:00', 'present'),
(4962, 1037, '2024-02-28', '08:50:00', '17:39:00', 'present'),
(4963, 1038, '2024-02-28', '08:24:00', '16:15:00', 'present');

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
(2, 1036, 'i am pm and i am asking for 5 days leave', 'mane maja nathi', 1, '2024-02-09', '2024-02-14', '0000-00-00', '2024-08-18'),
(3, 1038, 'fracture', 'accident', 1, '2024-03-01', '2024-03-07', '0000-00-00', '2024-03-22'),
(4, 1037, '1234321234', '5445g4g544hgreg', 2, '2024-02-28', '2024-02-29', '0000-00-00', '2024-02-27');

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
(9, 1036, 25000.00, 3000.00, 5000.00, 27000.00, 'January', 2022, '2024-02-25', 1, 1),
(11, 1038, 34000.00, 2040.00, 8040.00, 40000.00, 'January', 2024, '2024-02-25', 1, 1),
(12, 1037, 5000.00, 1521.74, 400.00, 3878.26, 'January', 2022, NULL, 1, 0),
(13, 1038, 34000.00, 5173.91, 7.00, 28833.09, 'February', 2024, '2024-02-28', 1, 1),
(14, 1035, 50000.00, 0.00, 0.00, 0.00, 'January', 0, NULL, 1, 0);

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
(32, 'project5', 'complete it soon', 4, '2024-02-21', '2024-02-23', '2'),
(33, 'test', 'test', 4, '2024-02-22', '2024-02-24', '2'),
(34, 'Adding a task ', 'task is a good thing', 3, '2024-02-28', '2024-02-29', '0'),
(35, 'test', 'same', 4, '2024-02-28', '2024-03-05', '1'),
(36, 'krinaa', 'dhuadshf', 4, '2024-02-28', '2024-02-29', '0');

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
(1037, 'username_pm', 'pm', 'profile_images/user_default_img.jpg', 'pm', 'pm', 'pm@gmail.com', 1234567890, '2024-02-08', 3, 4, 5000, 403478, 'qwe', 'ahmedabad', 'gujarat', 123456, 'india', 'male', '2024-02-09'),
(1038, 'username_emp', 'emp', 'profile_images/user_default_img.jpg', 'emp', 'emp', 'emp@gmail.com', 1234567890, '2024-02-08', 4, 4, 34000, 68833, 'qwe', 'ahmedabad', 'gujarat', 123456, 'india', 'male', '2024-02-09'),
(1047, 'Parva Shah', 'parvashah2279', 'profile_images/img_65e152936d92d.png', 'Parva', 'Shah', 'shahparva06@gmail.com', 2147483647, '2006-01-22', 2, 1, 20000, 0, 'c401 devarchan complex', 'ahmedabad', 'gujarat', 380006, 'India', 'male', '2024-01-09'),
(1048, 'Yash Rana', 'yashrana2125', 'profile_images/img_65e1534a5e6be.png', 'Yash', 'Rana', 'Yashrana52@gmail.com', 2147483647, '2005-01-06', 2, 2, 50252, 0, 'c-583 devarpan flat', 'borivali', 'maharashtra', 150121, 'india', 'male', '2022-01-13'),
(1049, 'jeel viradiya', 'jeelviradiya5262', 'profile_images/img_65e1546acbfc9.png', 'jeel', 'viradiya', 'jeelviradiya23@gmail.com', 2147483647, '1999-01-13', 3, 3, 25000, 0, '501 dev complex', 'surat', 'gujarat', 342110, 'india', 'male', '2024-01-24'),
(1050, 'Harsh Vataliya', 'harshvataliya2027', 'profile_images/img_65e1551c1da02.png', 'Harsh', 'Vataliya', 'harshvataliya@gmail.com', 2147483647, '2006-02-09', 3, 4, 251020, 0, '698 navkar flat', 'dhoraji', 'gujarat', 255252, 'india', 'male', '2024-03-05'),
(1051, 'bhakti patel', 'bhaktipatel2461', 'profile_images/img_65e1567bd2ddc.png', 'bhakti', 'patel', 'bhaktipatel@gmail.com', 2147483647, '2003-03-12', 3, 5, 48541, 0, '764 gopal flates', 'vesu', 'surat', 554154, 'india', 'female', '2024-03-13'),
(1052, 'neha soni', 'nehasoni8524', 'profile_images/img_65e157341b93a.png', 'neha', 'soni', 'nehasoni@gmail.com', 2147483647, '2000-09-21', 4, 6, 352252, 0, '374 krishna bunglows', 'ahmedabad', 'gujarat', 525252, 'india', 'female', '2021-04-15');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4964;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

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
