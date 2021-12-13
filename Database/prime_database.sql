-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 04:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prime_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'Illustrations', 'Adobe Illustrator, Adobe Photoshop, 2D Cartoons', '2021-04-10 21:57:04', 0),
(2, 'Photoshop', 'Photo Editing', '2021-12-09 18:28:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `imagelist`
--

CREATE TABLE `imagelist` (
  `id` int(11) NOT NULL,
  `IdUsers` int(11) NOT NULL,
  `userUsername` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imagelist`
--

INSERT INTO `imagelist` (`id`, `IdUsers`, `userUsername`, `img`, `caption`) VALUES
(35, 1, 'alpha23', '8317.jpg', 'ssss'),
(36, 1, 'alpha23', 'arrow.png', 'ddd'),
(37, 1, 'alpha23', 'twibbon im ready.png', 'wwww'),
(38, 1, 'alpha23', 'donasi_hafiz.jpg', 'popo');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(20) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(25, 1, 11, 'alpha23', 'Kak ini forum apa sih?', '2020-11-12 20:42:25'),
(26, 1, 11, 'alpha23', 'Makanya bang di kelas jangan tidur mulu', '2020-11-12 20:43:05'),
(31, 1, 11, 'alpha23', 'aaaa', '2020-12-04 08:02:20'),
(32, 1, 15, 'alpha23', 'test', '2020-12-09 23:19:54'),
(33, 1, 15, 'alpha23', 'blablabla', '2020-12-26 15:08:14'),
(34, 1, 15, 'alpha23', 'sssss', '2021-01-10 16:28:21'),
(35, 1, 17, 'alpha23', 'ssss', '2021-01-10 16:29:18'),
(36, 1, 17, 'alpha23', 'cina', '2021-01-29 23:06:45'),
(37, 1, 15, 'alpha23', 'kkkkkk', '2021-03-03 00:01:55'),
(38, 1, 15, 'alpha23', 'bacod', '2021-03-22 23:46:21'),
(39, 1, 18, 'alpha23', 'hari ini hari yang indah', '2021-04-10 21:57:04'),
(40, 2, 19, 'alpha23', 'ssss', '2021-04-11 20:46:36'),
(41, 2, 19, 'alpha23', 'sss', '2021-04-11 20:46:45'),
(42, 2, 20, 'alpha23', 'aa', '2021-12-09 18:28:20'),
(43, 2, 21, 'alpha23', 'vv', '2021-12-09 18:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reply_creator` varchar(20) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `category_id`, `topic_id`, `post_id`, `reply_creator`, `reply_content`, `reply_date`) VALUES
(7, 1, 11, 25, 'alpha23', 'Gatau saya, si admin sendiri juga bingung', '2020-11-12 20:42:43'),
(8, 1, 11, 31, 'alpha23', 'bbbbbb', '2020-12-04 08:02:26'),
(9, 1, 15, 34, 'alpha23', 'dddd', '2021-01-10 16:28:24'),
(10, 1, 17, 36, 'alpha23', 'apa lo cina\r\n', '2021-01-29 23:06:51'),
(11, 1, 15, 37, 'alpha23', 'lkkkk', '2021-03-03 00:02:05'),
(12, 1, 15, 38, 'alpha23', 'iye bacot juga lu', '2021-03-22 23:46:29'),
(13, 2, 19, 40, 'alpha23', 'ddd', '2021-04-11 20:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` varchar(20) NOT NULL,
  `topic_last_user` varchar(20) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT 0,
  `topic_replies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`, `topic_replies`) VALUES
(18, 1, 'Test Topic', 'alpha23', '', '2021-04-10 21:57:04', '2021-04-10 21:57:04', 4, 0),
(19, 2, 'Test Topic', 'alpha23', 'alpha23', '2021-04-11 20:46:36', '2021-04-11 20:46:48', 3, 1),
(20, 2, 'aa', 'alpha23', '', '2021-12-09 18:28:20', '2021-12-09 18:28:20', 0, 0),
(21, 2, 'vv', 'alpha23', '', '2021-12-09 18:28:23', '2021-12-09 18:28:23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUsers` int(11) NOT NULL,
  `userUsername` varchar(128) NOT NULL,
  `emailUsers` varchar(128) NOT NULL,
  `pwdUsers` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUsers`, `userUsername`, `emailUsers`, `pwdUsers`) VALUES
(1, 'alpha23', 'farelarden13@gmail.com', '$2y$10$AzPhyPJ7LfxE.Fz2fk0OsOnamYwPSsPFpooTfdeJKgWVqZfLsKR0G'),
(2, 'doni77', 'tabur112013@gmail.com', '$2y$10$7P3aMQ30erZEIwgG.EeEt.Qx9KvaU6NFPQkHMqs.bEHxcRRzSovZS'),
(3, 'farel23', 'alphaprime.arden@gmail.com', '$2y$10$lEz0hQkJPwaUGuKYB5eVBuiETrgnA0Quj2sVp6ZIkhJ/Ck7bdUQqW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagelist`
--
ALTER TABLE `imagelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imagelist`
--
ALTER TABLE `imagelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
