
-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 15, 2017 at 08:18 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `period` int(10) UNSIGNED NOT NULL,
  `section` enum('A','B') COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `section` enum('A','B') COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `attendance` enum('P','A','L','S') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `semester`, `section`, `identifier`, `created_at`, `updated_at`) VALUES
(1, 'semester1', 'A', 'semester1_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(2, 'semester1', 'B', 'semester1_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(3, 'semester2', 'A', 'semester2_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(4, 'semester2', 'B', 'semester2_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(5, 'semester3', 'A', 'semester3_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(6, 'semester3', 'B', 'semester3_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(7, 'semester4', 'A', 'semester4_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(8, 'semester4', 'B', 'semester4_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(9, 'semester5', 'A', 'semester5_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(10, 'semester5', 'B', 'semester5_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(11, 'semester6', 'A', 'semester6_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(12, 'semester6', 'B', 'semester6_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(13, 'semester7', 'A', 'semester7_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(14, 'semester7', 'B', 'semester7_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(15, 'semester8', 'A', 'semester8_A', '2017-06-15 06:21:23', '2017-06-15 06:21:23'),
(16, 'semester8', 'B', 'semester8_B', '2017-06-15 06:21:23', '2017-06-15 06:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2017_06_12_091322_create_classes_table', 1),
(36, '2017_06_12_092021_create_students_table', 1),
(37, '2017_06_12_092827_create_teachers_table', 1),
(38, '2017_06_12_094347_create_subjects_table', 1),
(39, '2017_06_12_101156_create_attendances_table', 1),
(40, '2017_06_12_152000_add_teacher_id_in_users', 1),
(41, '2017_06_15_083416_create_assign_subjects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `section` enum('A','B') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_no` int(10) UNSIGNED NOT NULL,
  `enroll_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `semester`, `section`, `name`, `roll_no`, `enroll_no`, `email`, `phone_no`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'A', 'student2', 1, 'sem2323', 'student2@gmail.com', '09988796898789', 'India', 'active', '2017-06-15 06:22:41', '2017-06-15 06:22:41'),
(4, 1, 'A', 'semester8 student', 1, 'enoio090', 'shahzaib@gmail.com', '3131313', 'sfjkfkf', 'active', '2017-06-15 06:37:22', '2017-06-15 06:43:47'),
(5, 1, 'A', 'semester8 student1', 2, 'ksjdk', 'asas@gail.com', '2113', 'wdwe', 'active', '2017-06-15 06:44:58', '2017-06-15 06:44:58'),
(6, 1, 'A', 'weew', 3, 'eqewed', 'ncn@jsdnj.com', '1213', 'ewe', 'active', '2017-06-15 06:45:15', '2017-06-15 06:45:15'),
(7, 1, 'A', 'one more student', 4, 'jsnnkdkd', 'abdb@nasbjnsd.com', 'ijqejqkej', 'jsahdjwhdkhkq', 'active', '2017-06-15 07:52:10', '2017-06-15 07:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_key` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `phone_no`, `email`, `address`, `qualification`, `unique_name`, `cnic`, `status`, `created_at`, `updated_at`) VALUES
(1, 'teacher1', '03000589799080', 'teacher1@gmail.com', 'India', 'PHD chem', 'teacher1', '0987654321', 'active', '2017-06-15 06:21:23', '2017-06-15 06:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','teacher') COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `teacher_id`) VALUES
(1, 'amina', 'admin', 'amina', 'amina@gmail.com', '$2y$10$2bx2qK6cjWzehTu4zJve2O1LCxLB0nJlUYDgP10KKQRWpB.EFbHyW', NULL, '2017-06-15 06:21:23', '2017-06-15 06:21:23', NULL),
(2, 'test', 'teacher', 'test', 'amina.nisar55@gmail.com', '$2y$10$FmsD/Tzo5Nb1KsE9uKz3cuJJ7Z5hM7q.kbquMO/lnSm1sZTY1ohY6', NULL, '2017-06-15 10:59:23', '2017-06-15 10:59:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_subjects_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_subject_id_foreign` (`subject_id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_identifier_unique` (`identifier`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_enroll_no_unique` (`enroll_no`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_short_key_unique` (`short_key`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_unique_name_unique` (`unique_name`),
  ADD UNIQUE KEY `teachers_cnic_unique` (`cnic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_teacher_id_foreign` (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD CONSTRAINT `assign_subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;