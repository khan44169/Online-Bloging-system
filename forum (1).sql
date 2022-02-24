-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 04:18 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `category_date`) VALUES
(1, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification.', '2021-07-15 11:09:20'),
(2, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language,', '2021-07-15 12:26:50'),
(3, 'Python', 'Python is an interpreted high-level general-purpose programming language.', '2021-07-15 12:23:23'),
(4, 'C', 'C is a general-purpose, procedural computer programming language supporting structured programming', '2021-07-15 12:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(9) NOT NULL,
  `comment_desc` text NOT NULL,
  `user_id` int(9) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_desc`, `user_id`, `question_id`) VALUES
(257, 'to kar naa', 25, 11),
(258, 'to kar lo fir\r\n', 25, 11),
(259, 'lol', 25, 11),
(260, 'dshfkl', 3, 11),
(261, 'gfnhgdnfg', 25, 11),
(293, 'to kar na', 26, 16),
(294, 'to kar lo phir\r\n', 27, 16),
(295, 'lol', 27, 16),
(296, 'ghjgh', 27, 16),
(297, 'ttghdf', 27, 16),
(298, 'fgfgfgfgfgjhjhhhj', 27, 16),
(299, 'fgfgfgfgfgjhjhhhj', 27, 16),
(300, 'fgfgfgfgfgjhjhhhj', 27, 16),
(301, '1223', 27, 16),
(302, '1223', 27, 16),
(303, '111', 27, 16),
(304, 'fdhj', 27, 16),
(305, 'aaa', 3, 13),
(306, 'bbb', 3, 13),
(307, 'ccc', 3, 13),
(308, 'ddd', 3, 13),
(309, 'eee', 3, 13),
(310, 'fff', 3, 13),
(311, 'ggg', 3, 13),
(312, 'hhh', 3, 13),
(313, 'iii', 3, 13),
(314, 'jjj', 3, 13),
(315, 'kkk', 3, 13),
(316, 'lll\r\n', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `question_title` varchar(70) NOT NULL,
  `question_desc` longtext NOT NULL,
  `question_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `user_id`, `question_title`, `question_desc`, `question_cat_id`) VALUES
(11, 3, 'i want to install c ', '<p>dshfjkfhdwe</p>\r\n', 4),
(13, 25, 'bootstrap $(#myModal).modal({show:true}) is not working', '<p>i am new in php and bootstrap when I trigger the modal using .modal method it doesn&#39;t work</p>\r\n\r\n<p>PHP code</p>\r\n\r\n<pre>\r\n<code> if ($show_login_modal) {\r\n     echo &quot; &lt;script&gt;\r\n            $(&#39;#loginModal&#39;).modal({show:true});\r\n            &lt;/script&gt;&quot;;\r\n }</code></pre>\r\n', 1),
(14, 3, 'testing', '<p>&lt;script&gt;alert(&#39;xss attack&#39;)&lt;/script&gt;</p>\r\n', 1),
(15, 3, 'another testing', '<p>&lt;script&gt;alert(lol);&lt;script&gt;</p>\r\n', 1),
(16, 26, 'i want to install pycharm', '<p>hii&nbsp; there i want to insaall pycharm in my pc</p>\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `username`, `password`, `date`) VALUES
(3, 'khan44169@gmail.com', 'Khan Abu Talha', '$2y$10$kqR/aXrY3C/jWYfiudzsJeojs4.VD4IJXhzxBnHR6R9XfZ4U.Y7oy', '2021-08-01'),
(25, 'ahad@gmail.com', 'Abdul Ahad', '$2y$10$z7DnYo3D6a.UmxzrZIi9oe0/U8p/RyiEcJVYPia6Ofcm7sWhIH0o6', '2021-08-07'),
(26, 'masihulhasan@gmail.com', 'MashihulHasan', '$2y$10$ubw6R8ucjPHZ86fSM534TerhAH7RPJuefg2n5cBSCnbsVC8iNJfbu', '2021-10-20'),
(27, 'iqrakhan@gmail.com', 'Iqra Khan', '$2y$10$lgD.82txutvLEfPJmX066OqXGjllZWbN1Qj6bx4kCSDcaA24iZ4R6', '2021-10-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_cat_id` (`question_cat_id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `question` ADD FULLTEXT KEY `question_title` (`question_title`,`question_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
