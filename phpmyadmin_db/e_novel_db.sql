-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 10:56 AM
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
-- Database: `e_novel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'Nuon Uteytithya'),
(2, 'Willliam Shakesphere'),
(3, 'H. P. Lovecraft'),
(4, 'Test'),
(5, 'Stephen King');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `novel_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 2),
(4, 4, 1),
(5, 5, 2),
(6, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Fantasy'),
(2, 'Mystery'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Horror'),
(6, 'Action'),
(7, 'Psychological'),
(8, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `novel`
--

CREATE TABLE `novel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `language` varchar(50) NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `novel`
--

INSERT INTO `novel` (`id`, `name`, `author_id`, `genre_id`, `description`, `language`, `published_at`, `image`) VALUES
(1, 'The Call of Cthulhu', 3, 5, 'Call Of Cthulhu', 'English', '2024-03-24 03:27:00', 'uploads\\cthulu.jpg'),
(2, 'Romeo & Juliet', 2, 4, 'Romeo and Juliet', 'English', '2024-03-24 03:27:00', 'uploads\\romeo.jpg'),
(3, 'Test', 4, 7, 'Test123', 'Khmer', '2024-03-24 03:27:00', 'uploads\\65fef4d17d3026.74457442.jpg'),
(4, 'Love ', 1, 8, 'Love is war', 'Japanese', '2024-03-24 03:27:00', 'uploads\\love.jpg'),
(7, '123', 5, 8, '123', 'Chinese', '2024-03-24 04:25:21', 'uploads/65ffc00c266b82.61206246.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `novel_rating_view`
-- (See below for the actual view)
--
CREATE TABLE `novel_rating_view` (
`Cover` varchar(50)
,`Novel` varchar(50)
,`Rating` decimal(14,4)
,`User_Count` bigint(21)
,`Last_Updated_Rating` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `novel_view`
-- (See below for the actual view)
--
CREATE TABLE `novel_view` (
`Id` int(11)
,`Cover` varchar(50)
,`Novel` varchar(50)
,`Author` varchar(50)
,`Description` text
,`Language` varchar(50)
,`Genre` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `novel_id`, `rating`, `review_text`, `review_date`) VALUES
(1, 1, 1, 10, 'Cool', '2024-03-24 03:32:41'),
(2, 1, 2, 8, 'Very sad and good plot', '2024-03-24 03:32:41'),
(3, 2, 1, 7, 'Too scary', '2024-03-24 03:38:49'),
(4, 3, 2, 6, 'Not interesting', '2024-03-24 03:38:49'),
(5, 3, 1, 3, 'Not interesting', '2024-03-24 03:39:09'),
(6, 4, 1, 9, 'Cool', '2024-03-24 03:48:59'),
(7, 5, 2, 8, 'Cool', '2024-03-24 03:48:59'),
(8, 4, 3, 6, 'Test', '2024-03-24 03:48:59'),
(9, 4, 2, 8, 'Cool', '2024-03-24 03:48:59'),
(10, 5, 1, 7, 'T', '2024-03-24 03:48:59'),
(11, 1, 4, 5, 'Mid', '2024-03-24 04:10:50'),
(12, 1, 3, 7, 'test123', '2024-03-24 09:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Tithya', 'tithyautey@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'user', 'user@email.com', '393645bf994114c23be28028a47a77a0'),
(3, 'visal', 'visal@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'dummy', '123@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(5, 'tithya', 'tithyautey@gmail.com', '88299d66994c8abfe63c6bd0d6c1923d'),
(6, '12345', '123@gmail.com', '1f32aa4c9a1d2ea010adcf2348166a04');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
`Id` int(11)
,`Novel_id` int(11)
,`Username` varchar(50)
,`Email` varchar(50)
,`Favorite_Novel` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `novel_rating_view`
--
DROP TABLE IF EXISTS `novel_rating_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `novel_rating_view`  AS SELECT `n`.`image` AS `Cover`, `n`.`name` AS `Novel`, avg(`r`.`rating`) AS `Rating`, count(`r`.`id`) AS `User_Count`, current_timestamp() AS `Last_Updated_Rating` FROM (`review` `r` join `novel` `n` on(`r`.`novel_id` = `n`.`id`)) GROUP BY `n`.`name` ORDER BY avg(`r`.`rating`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `novel_view`
--
DROP TABLE IF EXISTS `novel_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `novel_view`  AS SELECT `n`.`id` AS `Id`, `n`.`image` AS `Cover`, `n`.`name` AS `Novel`, `a`.`name` AS `Author`, `n`.`description` AS `Description`, `n`.`language` AS `Language`, `g`.`name` AS `Genre` FROM ((`novel` `n` join `author` `a` on(`a`.`id` = `n`.`author_id`)) join `genre` `g` on(`g`.`id` = `n`.`genre_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS SELECT `u`.`id` AS `Id`, `n`.`id` AS `Novel_id`, `u`.`name` AS `Username`, `u`.`email` AS `Email`, `n`.`name` AS `Favorite_Novel` FROM ((`users` `u` join `favorite` `f` on(`u`.`id` = `f`.`user_id`)) join `novel` `n` on(`n`.`id` = `f`.`novel_id`)) ORDER BY `u`.`id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`novel_id`),
  ADD KEY `novel_id` (`novel_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `novel_id` (`novel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `novel`
--
ALTER TABLE `novel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `novel`
--
ALTER TABLE `novel`
  ADD CONSTRAINT `novel_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `novel_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
