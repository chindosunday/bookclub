-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 09:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buka_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bk_id` int(11) NOT NULL,
  `bk_title` varchar(500) NOT NULL,
  `bk_category_id` int(11) NOT NULL,
  `bk_author` varchar(100) NOT NULL,
  `bk__publisher` varchar(200) NOT NULL,
  `bk_description` text NOT NULL,
  `bk_published_year` year(4) NOT NULL,
  `bk_added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(200) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `com_content` text NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_summary_id` int(11) NOT NULL,
  `com_date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `summaries`
--

CREATE TABLE `summaries` (
  `sum_id` int(11) NOT NULL,
  `sum_content` text NOT NULL,
  `sum_user_id` int(11) NOT NULL,
  `sum_book_id` int(11) NOT NULL,
  `sum_approved` tinyint(1) NOT NULL DEFAULT 1,
  `sum_date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(22) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_Intro` text NOT NULL,
  `user_dp` varchar(200) NOT NULL DEFAULT 'profile.png',
  `user_role` enum('user','admin') NOT NULL DEFAULT 'user',
  `user_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_Intro`, `user_dp`, `user_role`, `user_created`) VALUES
(1, 'User Six', 'user6@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 14:20:24'),
(4, 'User Six Six', 'user66@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 16:20:22'),
(5, 'User 77', 'user77@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 16:22:31'),
(6, 'User 77', 'user7987@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 17:47:14'),
(7, 'User 9', 'user9@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 17:47:45'),
(8, 'User 10', 'user10@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 18:10:23'),
(9, 'User 11', 'user11@gmail.com', 'password1234', 'I am star boy Six', 'profile.png', 'user', '2023-05-29 18:11:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `bk_category_id` (`bk_category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_title` (`cat_title`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `com_userId` (`com_user_id`),
  ADD KEY `comment_summary_id` (`com_summary_id`);

--
-- Indexes for table `summaries`
--
ALTER TABLE `summaries`
  ADD PRIMARY KEY (`sum_id`),
  ADD KEY `sum_user_id` (`sum_user_id`),
  ADD KEY `sum_book_id` (`sum_book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `summaries`
--
ALTER TABLE `summaries`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`bk_category_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_summary_id` FOREIGN KEY (`com_summary_id`) REFERENCES `summaries` (`sum_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`com_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `summaries`
--
ALTER TABLE `summaries`
  ADD CONSTRAINT `sum_book_id` FOREIGN KEY (`sum_book_id`) REFERENCES `books` (`bk_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `sum_user_id` FOREIGN KEY (`sum_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
