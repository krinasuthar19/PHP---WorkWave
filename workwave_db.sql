-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 07:01 AM
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
(2, 1035, '2024-02-02', NULL, NULL, 'absent'),
(3, 1036, '2024-02-03', NULL, NULL, 'half-day'),
(5, 1037, '2024-02-05', NULL, NULL, 'present'),
(6, 1037, '2024-02-06', NULL, NULL, 'present'),
(7, 1038, '2024-02-07', NULL, NULL, 'present'),
(8, 1038, '2024-02-08', NULL, NULL, 'half-day'),
(16, 1035, '2024-02-03', '00:00:00', '00:00:00', 'absent'),
(17, 1035, '2024-02-05', '08:57:00', '17:11:00', 'present'),
(18, 1035, '2024-02-06', '08:08:00', '16:06:00', 'half-day'),
(2933, 1035, '2024-01-01', NULL, NULL, 'holiday'),
(2934, 1036, '2024-01-01', NULL, NULL, 'holiday'),
(2935, 1037, '2024-01-01', NULL, NULL, 'holiday'),
(2936, 1038, '2024-01-01', NULL, NULL, 'holiday'),
(2937, 1035, '2024-01-07', NULL, NULL, 'holiday'),
(2938, 1036, '2024-01-07', NULL, NULL, 'holiday'),
(2939, 1037, '2024-01-07', NULL, NULL, 'holiday'),
(2940, 1038, '2024-01-07', NULL, NULL, 'holiday'),
(2941, 1035, '2024-01-14', NULL, NULL, 'holiday'),
(2942, 1036, '2024-01-14', NULL, NULL, 'holiday'),
(2943, 1037, '2024-01-14', NULL, NULL, 'holiday'),
(2944, 1038, '2024-01-14', NULL, NULL, 'holiday'),
(2945, 1035, '2024-01-15', NULL, NULL, 'holiday'),
(2946, 1036, '2024-01-15', NULL, NULL, 'holiday'),
(2947, 1037, '2024-01-15', NULL, NULL, 'holiday'),
(2948, 1038, '2024-01-15', NULL, NULL, 'holiday'),
(2949, 1035, '2024-01-21', NULL, NULL, 'holiday'),
(2950, 1036, '2024-01-21', NULL, NULL, 'holiday'),
(2951, 1037, '2024-01-21', NULL, NULL, 'holiday'),
(2952, 1038, '2024-01-21', NULL, NULL, 'holiday'),
(2953, 1035, '2024-01-26', NULL, NULL, 'holiday'),
(2954, 1036, '2024-01-26', NULL, NULL, 'holiday'),
(2955, 1037, '2024-01-26', NULL, NULL, 'holiday'),
(2956, 1038, '2024-01-26', NULL, NULL, 'holiday'),
(2957, 1035, '2024-01-28', NULL, NULL, 'holiday'),
(2958, 1036, '2024-01-28', NULL, NULL, 'holiday'),
(2959, 1037, '2024-01-28', NULL, NULL, 'holiday'),
(2960, 1038, '2024-01-28', NULL, NULL, 'holiday'),
(2961, 1035, '2024-02-04', NULL, NULL, 'holiday'),
(2962, 1036, '2024-02-04', NULL, NULL, 'holiday'),
(2963, 1037, '2024-02-04', NULL, NULL, 'holiday'),
(2964, 1038, '2024-02-04', NULL, NULL, 'holiday'),
(2965, 1035, '2024-02-11', NULL, NULL, 'holiday'),
(2966, 1036, '2024-02-11', NULL, NULL, 'holiday'),
(2967, 1037, '2024-02-11', NULL, NULL, 'holiday'),
(2968, 1038, '2024-02-11', NULL, NULL, 'holiday'),
(2969, 1035, '2024-02-18', NULL, NULL, 'holiday'),
(2970, 1036, '2024-02-18', NULL, NULL, 'holiday'),
(2971, 1037, '2024-02-18', NULL, NULL, 'holiday'),
(2972, 1038, '2024-02-18', NULL, NULL, 'holiday'),
(2973, 1035, '2024-02-21', NULL, NULL, 'holiday'),
(2974, 1036, '2024-02-21', NULL, NULL, 'holiday'),
(2975, 1037, '2024-02-21', NULL, NULL, 'holiday'),
(2976, 1038, '2024-02-21', NULL, NULL, 'holiday'),
(2977, 1035, '2024-02-25', NULL, NULL, 'holiday'),
(2978, 1036, '2024-02-25', NULL, NULL, 'holiday'),
(2979, 1037, '2024-02-25', NULL, NULL, 'holiday'),
(2980, 1038, '2024-02-25', NULL, NULL, 'holiday'),
(2981, 1035, '2024-03-03', NULL, NULL, 'holiday'),
(2982, 1036, '2024-03-03', NULL, NULL, 'holiday'),
(2983, 1037, '2024-03-03', NULL, NULL, 'holiday'),
(2984, 1038, '2024-03-03', NULL, NULL, 'holiday'),
(2985, 1035, '2024-03-08', NULL, NULL, 'holiday'),
(2986, 1036, '2024-03-08', NULL, NULL, 'holiday'),
(2987, 1037, '2024-03-08', NULL, NULL, 'holiday'),
(2988, 1038, '2024-03-08', NULL, NULL, 'holiday'),
(2989, 1035, '2024-03-10', NULL, NULL, 'holiday'),
(2990, 1036, '2024-03-10', NULL, NULL, 'holiday'),
(2991, 1037, '2024-03-10', NULL, NULL, 'holiday'),
(2992, 1038, '2024-03-10', NULL, NULL, 'holiday'),
(2993, 1035, '2024-03-17', NULL, NULL, 'holiday'),
(2994, 1036, '2024-03-17', NULL, NULL, 'holiday'),
(2995, 1037, '2024-03-17', NULL, NULL, 'holiday'),
(2996, 1038, '2024-03-17', NULL, NULL, 'holiday'),
(2997, 1035, '2024-03-24', NULL, NULL, 'holiday'),
(2998, 1036, '2024-03-24', NULL, NULL, 'holiday'),
(2999, 1037, '2024-03-24', NULL, NULL, 'holiday'),
(3000, 1038, '2024-03-24', NULL, NULL, 'holiday'),
(3001, 1035, '2024-03-31', NULL, NULL, 'holiday'),
(3002, 1036, '2024-03-31', NULL, NULL, 'holiday'),
(3003, 1037, '2024-03-31', NULL, NULL, 'holiday'),
(3004, 1038, '2024-03-31', NULL, NULL, 'holiday'),
(3005, 1035, '2024-04-07', NULL, NULL, 'holiday'),
(3006, 1036, '2024-04-07', NULL, NULL, 'holiday'),
(3007, 1037, '2024-04-07', NULL, NULL, 'holiday'),
(3008, 1038, '2024-04-07', NULL, NULL, 'holiday'),
(3009, 1035, '2024-04-14', NULL, NULL, 'holiday'),
(3010, 1036, '2024-04-14', NULL, NULL, 'holiday'),
(3011, 1037, '2024-04-14', NULL, NULL, 'holiday'),
(3012, 1038, '2024-04-14', NULL, NULL, 'holiday'),
(3013, 1035, '2024-04-19', NULL, NULL, 'holiday'),
(3014, 1036, '2024-04-19', NULL, NULL, 'holiday'),
(3015, 1037, '2024-04-19', NULL, NULL, 'holiday'),
(3016, 1038, '2024-04-19', NULL, NULL, 'holiday'),
(3017, 1035, '2024-04-21', NULL, NULL, 'holiday'),
(3018, 1036, '2024-04-21', NULL, NULL, 'holiday'),
(3019, 1037, '2024-04-21', NULL, NULL, 'holiday'),
(3020, 1038, '2024-04-21', NULL, NULL, 'holiday'),
(3021, 1035, '2024-04-28', NULL, NULL, 'holiday'),
(3022, 1036, '2024-04-28', NULL, NULL, 'holiday'),
(3023, 1037, '2024-04-28', NULL, NULL, 'holiday'),
(3024, 1038, '2024-04-28', NULL, NULL, 'holiday'),
(3025, 1035, '2024-05-01', NULL, NULL, 'holiday'),
(3026, 1036, '2024-05-01', NULL, NULL, 'holiday'),
(3027, 1037, '2024-05-01', NULL, NULL, 'holiday'),
(3028, 1038, '2024-05-01', NULL, NULL, 'holiday'),
(3029, 1035, '2024-05-05', NULL, NULL, 'holiday'),
(3030, 1036, '2024-05-05', NULL, NULL, 'holiday'),
(3031, 1037, '2024-05-05', NULL, NULL, 'holiday'),
(3032, 1038, '2024-05-05', NULL, NULL, 'holiday'),
(3033, 1035, '2024-05-12', NULL, NULL, 'holiday'),
(3034, 1036, '2024-05-12', NULL, NULL, 'holiday'),
(3035, 1037, '2024-05-12', NULL, NULL, 'holiday'),
(3036, 1038, '2024-05-12', NULL, NULL, 'holiday'),
(3037, 1035, '2024-05-19', NULL, NULL, 'holiday'),
(3038, 1036, '2024-05-19', NULL, NULL, 'holiday'),
(3039, 1037, '2024-05-19', NULL, NULL, 'holiday'),
(3040, 1038, '2024-05-19', NULL, NULL, 'holiday'),
(3041, 1035, '2024-05-26', NULL, NULL, 'holiday'),
(3042, 1036, '2024-05-26', NULL, NULL, 'holiday'),
(3043, 1037, '2024-05-26', NULL, NULL, 'holiday'),
(3044, 1038, '2024-05-26', NULL, NULL, 'holiday'),
(3045, 1035, '2024-06-02', NULL, NULL, 'holiday'),
(3046, 1036, '2024-06-02', NULL, NULL, 'holiday'),
(3047, 1037, '2024-06-02', NULL, NULL, 'holiday'),
(3048, 1038, '2024-06-02', NULL, NULL, 'holiday'),
(3049, 1035, '2024-06-09', NULL, NULL, 'holiday'),
(3050, 1036, '2024-06-09', NULL, NULL, 'holiday'),
(3051, 1037, '2024-06-09', NULL, NULL, 'holiday'),
(3052, 1038, '2024-06-09', NULL, NULL, 'holiday'),
(3053, 1035, '2024-06-16', NULL, NULL, 'holiday'),
(3054, 1036, '2024-06-16', NULL, NULL, 'holiday'),
(3055, 1037, '2024-06-16', NULL, NULL, 'holiday'),
(3056, 1038, '2024-06-16', NULL, NULL, 'holiday'),
(3057, 1035, '2024-06-23', NULL, NULL, 'holiday'),
(3058, 1036, '2024-06-23', NULL, NULL, 'holiday'),
(3059, 1037, '2024-06-23', NULL, NULL, 'holiday'),
(3060, 1038, '2024-06-23', NULL, NULL, 'holiday'),
(3061, 1035, '2024-06-30', NULL, NULL, 'holiday'),
(3062, 1036, '2024-06-30', NULL, NULL, 'holiday'),
(3063, 1037, '2024-06-30', NULL, NULL, 'holiday'),
(3064, 1038, '2024-06-30', NULL, NULL, 'holiday'),
(3065, 1035, '2024-07-07', NULL, NULL, 'holiday'),
(3066, 1036, '2024-07-07', NULL, NULL, 'holiday'),
(3067, 1037, '2024-07-07', NULL, NULL, 'holiday'),
(3068, 1038, '2024-07-07', NULL, NULL, 'holiday'),
(3069, 1035, '2024-07-14', NULL, NULL, 'holiday'),
(3070, 1036, '2024-07-14', NULL, NULL, 'holiday'),
(3071, 1037, '2024-07-14', NULL, NULL, 'holiday'),
(3072, 1038, '2024-07-14', NULL, NULL, 'holiday'),
(3073, 1035, '2024-07-21', NULL, NULL, 'holiday'),
(3074, 1036, '2024-07-21', NULL, NULL, 'holiday'),
(3075, 1037, '2024-07-21', NULL, NULL, 'holiday'),
(3076, 1038, '2024-07-21', NULL, NULL, 'holiday'),
(3077, 1035, '2024-07-28', NULL, NULL, 'holiday'),
(3078, 1036, '2024-07-28', NULL, NULL, 'holiday'),
(3079, 1037, '2024-07-28', NULL, NULL, 'holiday'),
(3080, 1038, '2024-07-28', NULL, NULL, 'holiday'),
(3081, 1035, '2024-08-04', NULL, NULL, 'holiday'),
(3082, 1036, '2024-08-04', NULL, NULL, 'holiday'),
(3083, 1037, '2024-08-04', NULL, NULL, 'holiday'),
(3084, 1038, '2024-08-04', NULL, NULL, 'holiday'),
(3085, 1035, '2024-08-11', NULL, NULL, 'holiday'),
(3086, 1036, '2024-08-11', NULL, NULL, 'holiday'),
(3087, 1037, '2024-08-11', NULL, NULL, 'holiday'),
(3088, 1038, '2024-08-11', NULL, NULL, 'holiday'),
(3089, 1035, '2024-08-15', NULL, NULL, 'holiday'),
(3090, 1036, '2024-08-15', NULL, NULL, 'holiday'),
(3091, 1037, '2024-08-15', NULL, NULL, 'holiday'),
(3092, 1038, '2024-08-15', NULL, NULL, 'holiday'),
(3093, 1035, '2024-08-18', NULL, NULL, 'holiday'),
(3094, 1036, '2024-08-18', NULL, NULL, 'holiday'),
(3095, 1037, '2024-08-18', NULL, NULL, 'holiday'),
(3096, 1038, '2024-08-18', NULL, NULL, 'holiday'),
(3097, 1035, '2024-08-25', NULL, NULL, 'holiday'),
(3098, 1036, '2024-08-25', NULL, NULL, 'holiday'),
(3099, 1037, '2024-08-25', NULL, NULL, 'holiday'),
(3100, 1038, '2024-08-25', NULL, NULL, 'holiday'),
(3101, 1035, '2024-09-01', NULL, NULL, 'holiday'),
(3102, 1036, '2024-09-01', NULL, NULL, 'holiday'),
(3103, 1037, '2024-09-01', NULL, NULL, 'holiday'),
(3104, 1038, '2024-09-01', NULL, NULL, 'holiday'),
(3105, 1035, '2024-09-02', NULL, NULL, 'holiday'),
(3106, 1036, '2024-09-02', NULL, NULL, 'holiday'),
(3107, 1037, '2024-09-02', NULL, NULL, 'holiday'),
(3108, 1038, '2024-09-02', NULL, NULL, 'holiday'),
(3109, 1035, '2024-09-08', NULL, NULL, 'holiday'),
(3110, 1036, '2024-09-08', NULL, NULL, 'holiday'),
(3111, 1037, '2024-09-08', NULL, NULL, 'holiday'),
(3112, 1038, '2024-09-08', NULL, NULL, 'holiday'),
(3113, 1035, '2024-09-15', NULL, NULL, 'holiday'),
(3114, 1036, '2024-09-15', NULL, NULL, 'holiday'),
(3115, 1037, '2024-09-15', NULL, NULL, 'holiday'),
(3116, 1038, '2024-09-15', NULL, NULL, 'holiday'),
(3117, 1035, '2024-09-22', NULL, NULL, 'holiday'),
(3118, 1036, '2024-09-22', NULL, NULL, 'holiday'),
(3119, 1037, '2024-09-22', NULL, NULL, 'holiday'),
(3120, 1038, '2024-09-22', NULL, NULL, 'holiday'),
(3121, 1035, '2024-09-29', NULL, NULL, 'holiday'),
(3122, 1036, '2024-09-29', NULL, NULL, 'holiday'),
(3123, 1037, '2024-09-29', NULL, NULL, 'holiday'),
(3124, 1038, '2024-09-29', NULL, NULL, 'holiday'),
(3125, 1035, '2024-10-02', NULL, NULL, 'holiday'),
(3126, 1036, '2024-10-02', NULL, NULL, 'holiday'),
(3127, 1037, '2024-10-02', NULL, NULL, 'holiday'),
(3128, 1038, '2024-10-02', NULL, NULL, 'holiday'),
(3129, 1035, '2024-10-06', NULL, NULL, 'holiday'),
(3130, 1036, '2024-10-06', NULL, NULL, 'holiday'),
(3131, 1037, '2024-10-06', NULL, NULL, 'holiday'),
(3132, 1038, '2024-10-06', NULL, NULL, 'holiday'),
(3133, 1035, '2024-10-13', NULL, NULL, 'holiday'),
(3134, 1036, '2024-10-13', NULL, NULL, 'holiday'),
(3135, 1037, '2024-10-13', NULL, NULL, 'holiday'),
(3136, 1038, '2024-10-13', NULL, NULL, 'holiday'),
(3137, 1035, '2024-10-20', NULL, NULL, 'holiday'),
(3138, 1036, '2024-10-20', NULL, NULL, 'holiday'),
(3139, 1037, '2024-10-20', NULL, NULL, 'holiday'),
(3140, 1038, '2024-10-20', NULL, NULL, 'holiday'),
(3141, 1035, '2024-10-27', NULL, NULL, 'holiday'),
(3142, 1036, '2024-10-27', NULL, NULL, 'holiday'),
(3143, 1037, '2024-10-27', NULL, NULL, 'holiday'),
(3144, 1038, '2024-10-27', NULL, NULL, 'holiday'),
(3145, 1035, '2024-10-28', NULL, NULL, 'holiday'),
(3146, 1036, '2024-10-28', NULL, NULL, 'holiday'),
(3147, 1037, '2024-10-28', NULL, NULL, 'holiday'),
(3148, 1038, '2024-10-28', NULL, NULL, 'holiday'),
(3149, 1035, '2024-11-02', NULL, NULL, 'holiday'),
(3150, 1036, '2024-11-02', NULL, NULL, 'holiday'),
(3151, 1037, '2024-11-02', NULL, NULL, 'holiday'),
(3152, 1038, '2024-11-02', NULL, NULL, 'holiday'),
(3153, 1035, '2024-11-03', NULL, NULL, 'holiday'),
(3154, 1036, '2024-11-03', NULL, NULL, 'holiday'),
(3155, 1037, '2024-11-03', NULL, NULL, 'holiday'),
(3156, 1038, '2024-11-03', NULL, NULL, 'holiday'),
(3157, 1035, '2024-11-10', NULL, NULL, 'holiday'),
(3158, 1036, '2024-11-10', NULL, NULL, 'holiday'),
(3159, 1037, '2024-11-10', NULL, NULL, 'holiday'),
(3160, 1038, '2024-11-10', NULL, NULL, 'holiday'),
(3161, 1035, '2024-11-17', NULL, NULL, 'holiday'),
(3162, 1036, '2024-11-17', NULL, NULL, 'holiday'),
(3163, 1037, '2024-11-17', NULL, NULL, 'holiday'),
(3164, 1038, '2024-11-17', NULL, NULL, 'holiday'),
(3165, 1035, '2024-11-24', NULL, NULL, 'holiday'),
(3166, 1036, '2024-11-24', NULL, NULL, 'holiday'),
(3167, 1037, '2024-11-24', NULL, NULL, 'holiday'),
(3168, 1038, '2024-11-24', NULL, NULL, 'holiday'),
(3169, 1035, '2024-12-01', NULL, NULL, 'holiday'),
(3170, 1036, '2024-12-01', NULL, NULL, 'holiday'),
(3171, 1037, '2024-12-01', NULL, NULL, 'holiday'),
(3172, 1038, '2024-12-01', NULL, NULL, 'holiday'),
(3173, 1035, '2024-12-08', NULL, NULL, 'holiday'),
(3174, 1036, '2024-12-08', NULL, NULL, 'holiday'),
(3175, 1037, '2024-12-08', NULL, NULL, 'holiday'),
(3176, 1038, '2024-12-08', NULL, NULL, 'holiday'),
(3177, 1035, '2024-12-15', NULL, NULL, 'holiday'),
(3178, 1036, '2024-12-15', NULL, NULL, 'holiday'),
(3179, 1037, '2024-12-15', NULL, NULL, 'holiday'),
(3180, 1038, '2024-12-15', NULL, NULL, 'holiday'),
(3181, 1035, '2024-12-22', NULL, NULL, 'holiday'),
(3182, 1036, '2024-12-22', NULL, NULL, 'holiday'),
(3183, 1037, '2024-12-22', NULL, NULL, 'holiday'),
(3184, 1038, '2024-12-22', NULL, NULL, 'holiday'),
(3185, 1035, '2024-12-25', NULL, NULL, 'holiday'),
(3186, 1036, '2024-12-25', NULL, NULL, 'holiday'),
(3187, 1037, '2024-12-25', NULL, NULL, 'holiday'),
(3188, 1038, '2024-12-25', NULL, NULL, 'holiday'),
(3189, 1035, '2024-12-29', NULL, NULL, 'holiday'),
(3190, 1036, '2024-12-29', NULL, NULL, 'holiday'),
(3191, 1037, '2024-12-29', NULL, NULL, 'holiday'),
(3192, 1038, '2024-12-29', NULL, NULL, 'holiday');

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
(9, 1036, 25000.00, 3000.00, 5000.00, 27000.00, 'January', 2022, '2024-02-25', 1, 1);

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
(33, 'test', 'test', 4, '2024-02-22', '2024-02-24', '2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3193;

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
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1042;

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
