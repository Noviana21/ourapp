-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 05:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Kuliah'),
(2, 'Kerja'),
(3, 'Organisasi'),
(4, 'Magang'),
(5, 'Belajar Mandiri'),
(6, 'Olahraga'),
(7, 'Hobi'),
(8, 'Tugas Akhir'),
(9, 'Ujian'),
(10, 'Freelance'),
(11, 'Portofolio'),
(12, 'Keluarga'),
(13, 'Acara Sosial'),
(14, 'Belanja'),
(15, 'Film & Hiburan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-06-26-232104', 'App\\Database\\Migrations\\CreateUsers', 'default', 'App', 1750996189, 1),
(2, '2025-06-26-232133', 'App\\Database\\Migrations\\CreateCategories', 'default', 'App', 1750996189, 1),
(3, '2025-06-26-232140', 'App\\Database\\Migrations\\CreateTasks', 'default', 'App', 1750996189, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('pending','done') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `user_id`, `category_id`, `title`, `description`, `deadline`, `status`, `created_at`) VALUES
(1, 2, 7, 'let me in ur ocean swim', 'berenang', '2025-07-10', 'done', '2025-06-27 23:53:53'),
(2, 2, 3, 'rapat internal rizztech', 'when yahhhh', '2025-06-28', 'done', '2025-06-27 23:54:57'),
(4, 2, 4, 'fullstack developer batch 777', 'di jakarta', '2025-07-04', 'done', '2025-06-28 12:00:22'),
(6, 2, 1, 'uas web pa eka', 'mengerjakan manual book dan deploy', '2025-06-28', 'pending', '2025-06-28 13:52:42'),
(8, 3, 6, 'push up', '50 kali ', '2025-06-28', 'pending', '2025-06-28 15:05:03'),
(9, 3, 8, 'deploy web', 'mendeploy web melalui aeonfree', '2025-06-28', 'pending', '2025-06-28 18:05:33'),
(10, 2, 7, 'mendengarkan arctic monkeys', 'iyah lagunya bagussss', '2025-08-19', 'pending', '2025-06-28 22:59:17'),
(11, 4, 7, 'membaca pride and prejudice', 'buku', '2025-06-29', 'pending', '2025-06-29 11:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$12$U/YyJBhUHl95CGqG0g3ituacoSAzZEp6y/Tn.j5g12RB4kxRxSA8m', 'admin@example.com', '2025-06-27 15:03:48'),
(2, 'aventurine', '$2y$12$9orRldFgTYUqZAivPNwcAONaXUzlhLhMWyGCGrg/GjDnFMvW3pWlm', 'aventurine@gmail.com', '2025-06-27 15:04:45'),
(3, 'john mayer', '$2y$12$ecDiMt6ATz8PL3H/nogM.O.60gqxdXQK8uTqTSCa/w17R.c5VyxEC', 'johnmayer@gmail.com', '2025-06-28 14:05:51'),
(4, 'novi', '$2y$12$.S3/Ifa05XebrolMJ9Ec.OzYGM6OkJmJu13bhPuEGgLfdmMwQAB02', 'noviana21na@gmail.com', '2025-06-29 10:52:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
