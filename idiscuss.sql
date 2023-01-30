-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 30, 2023 at 10:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.', '2023-01-22 11:46:02'),
(2, 'javaScript', 'JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. As of 2022, 98% of websites use ', '2023-01-22 11:46:43'),
(3, 'ReactJS', 'This a powerful and trending web development language and can be used as a front end developement tool', '2023-01-24 19:28:18'),
(4, 'PHP', 'This is an another powerful and trending web development language', '2023-01-24 19:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_by`, `comment_content`, `thread_id`, `comment_time`) VALUES
(25, 16, 'you need to usea command-line ', 27, '2023-01-30 14:52:34'),
(26, 16, 'keep learn and practice it vl we become easy one day', 29, '2023-01-30 14:54:37'),
(27, 16, 'keep practice and at the ned of day u vl learn', 31, '2023-01-30 14:55:39'),
(28, 16, 'keep learn and practice that vl make u to create websites using php as i did', 32, '2023-01-30 14:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_description` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(27, 'is python difficult to learn?', 'i am beginner to python teach me to learn ', 1, 16, '2023-01-30 14:51:08'),
(28, 'how to run pythn', 'i am beginner to python pleaes help me', 1, 16, '2023-01-30 14:52:09'),
(29, 'how to learn javascript', 'i am beginner to javascript teach me to learn', 2, 16, '2023-01-30 14:53:19'),
(30, 'how to run javascript programs', 'it is similar as running a html page', 2, 16, '2023-01-30 14:54:04'),
(31, 'is reactjs difficult to learn', 'i am beginner to reactjs teach me to learn', 3, 16, '2023-01-30 14:55:15'),
(32, 'is php difficult to learn?', 'i am beginner to phpteach me to learn', 4, 16, '2023-01-30 14:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(10) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(2, 'viraj@gmail.com', '$2y$10$NT5ASsjA.bB.FKrGaVFYpeuYJ2bH/mJa8dcuR.D0FqpeCqY4937lC', '2023-01-29 12:22:56'),
(16, 'raj@gmail.com', '$2y$10$ylHr7.mU6DvlI3yKKxDBA.SFvl6XFyF4L3x3yui.Wgmffl9JUa7Tq', '2023-01-30 14:49:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
