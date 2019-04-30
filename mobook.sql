-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 06:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobook`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `image`, `created_at`) VALUES
(1, 2, 'Mobook', 'Post 1 of mobook', '', '2019-04-29 14:00:17'),
(3, 2, 'Hardee&#39;s', 'I love Hardee&#39;s . It is my favorite burger restaurant.', 'hardees-gluten-free-menu.jpg', '2019-04-29 16:13:01'),
(4, 3, 'Working Hard', 'Working Hard is not easy. It is so hard.', 'lambo_1.jpg', '2019-04-29 16:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(2, 'Mohanned Farahat', 'mohanned@gmail.com', '$2y$12$.0fpbEx8iiOiq8NVsh6Fy.grEW9Z.XViYcH.r/apWhF35mErFC2MK', '2019-04-29 11:26:32'),
(3, 'Sayed Essam', 'sika@gmail.com', '$2y$12$fPZOEzvgnwcqMe2Yba9yb.KKtdULAL6uPTdvTC6hhOSUKYtgr9FbS', '2019-04-29 12:26:11'),
(4, 'Hosam Ihab', 'hosam@gmail.com', '$2y$12$N.2ZjChK52Ws4VPTX.HBtOstVWjRK/4rLLLScdCxbDxDcqnbIb1F6', '2019-04-29 12:27:18'),
(6, 'Mohab Farahat', 'hoba@gmail.com', '$2y$12$FQ0mpPe6nvJtuUfUqY21PukwqZUFVG5PInZ9fF3n/G0MTNEl2cMIm', '2019-04-29 12:31:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
