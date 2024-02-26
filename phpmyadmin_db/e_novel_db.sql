-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 07:14 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `ch_num` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `novel`
--

CREATE TABLE `novel` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `language` varchar(50) NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `novel-genre`
--

CREATE TABLE `novel-genre` (
  `id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `novel_view`
-- (See below for the actual view)
--
CREATE TABLE `novel_view` (
`Novel_id` int(11)
,`Novel_name` varchar(50)
,`Description` text
,`Language` varchar(50)
,`Image` varchar(100)
,`Author_name` varchar(50)
,`Chapter_title` varchar(100)
,`Chapter_number` int(11)
,`Content` text
,`Rating` int(11)
,`Review_text` text
,`Review_at` timestamp
,`Genre` varchar(50)
,`Username` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `read_progress`
--

CREATE TABLE `read_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `novel_id` int(11) NOT NULL,
  `last_read_chapter` int(11) NOT NULL,
  `last_read_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Nuon Uteytithya', '123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Nuon Uteytithya', '123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'tithya', '2343@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'tithya', '123@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
`User_Id` int(11)
,`Username` varchar(50)
,`Email` varchar(50)
,`Last_read_chapter` int(11)
,`Last_read_date` timestamp
,`Novel_name` varchar(50)
,`Image` varchar(100)
,`Rating` int(11)
,`Review_text` text
,`Review_at` timestamp
,`Chapter_number` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `novel_view`
--
DROP TABLE IF EXISTS `novel_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `novel_view`  AS SELECT `n`.`id` AS `Novel_id`, `n`.`name` AS `Novel_name`, `n`.`description` AS `Description`, `n`.`language` AS `Language`, `n`.`image` AS `Image`, `a`.`name` AS `Author_name`, `c`.`title` AS `Chapter_title`, `c`.`ch_num` AS `Chapter_number`, `c`.`content` AS `Content`, `r`.`rating` AS `Rating`, `r`.`review_text` AS `Review_text`, `r`.`review_date` AS `Review_at`, `g`.`name` AS `Genre`, `u`.`name` AS `Username` FROM ((((((`novel` `n` join `author` `a` on(`a`.`id` = `n`.`author_id`)) join `review` `r` on(`n`.`id` = `r`.`novel_id`)) join `chapter` `c` on(`n`.`id` = `c`.`novel_id`)) join `novel-genre` `ng` on(`n`.`id` = `ng`.`novel_id`)) join `genre` `g` on(`g`.`id` = `ng`.`genre_id`)) join `users` `u` on(`u`.`id` = `r`.`user_id`)) ORDER BY `n`.`id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS SELECT `u`.`id` AS `User_Id`, `u`.`name` AS `Username`, `u`.`email` AS `Email`, `rp`.`last_read_chapter` AS `Last_read_chapter`, `rp`.`last_read_timestamp` AS `Last_read_date`, `n`.`name` AS `Novel_name`, `n`.`image` AS `Image`, `r`.`rating` AS `Rating`, `r`.`review_text` AS `Review_text`, `r`.`review_date` AS `Review_at`, `c`.`ch_num` AS `Chapter_number` FROM (((((`users` `u` join `favorite` `f` on(`u`.`id` = `f`.`user_id`)) join `review` `r` on(`u`.`id` = `r`.`user_id`)) join `read_progress` `rp` on(`u`.`id` = `rp`.`user_id`)) join `novel` `n` on(`n`.`id` = `rp`.`novel_id`)) join `chapter` `c` on(`n`.`id` = `c`.`novel_id`)) ORDER BY `u`.`id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novel_id` (`novel_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novel_id` (`novel_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `authorId` (`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `novel-genre`
--
ALTER TABLE `novel-genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novel_id` (`novel_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `read_progress`
--
ALTER TABLE `read_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `novel_id` (`novel_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `novel`
--
ALTER TABLE `novel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `novel-genre`
--
ALTER TABLE `novel-genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `read_progress`
--
ALTER TABLE `read_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `novel`
--
ALTER TABLE `novel`
  ADD CONSTRAINT `novel_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `novel-genre`
--
ALTER TABLE `novel-genre`
  ADD CONSTRAINT `novel-genre_ibfk_1` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `novel-genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `read_progress`
--
ALTER TABLE `read_progress`
  ADD CONSTRAINT `read_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `read_progress_ibfk_2` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`novel_id`) REFERENCES `novel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
