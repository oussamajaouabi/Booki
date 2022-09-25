-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2022 at 02:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booki_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `object` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `price`, `image`) VALUES
(1, 'book1', 'Clean Code: Par Robert C. Martin ', 50.00, 'images/books/clean_code.jpg'),
(2, 'book2', 'The Mythical Man-month: Par Frederick Brooks ', 45.00, 'images/books/mythical_man_month.jpg'),
(3, 'book3', 'The Pragmatic Programmer', 72.00, 'images/books/the_pragmatic_programmer.jpg'),
(4, 'book4', 'Code Complete (2 Edition): Par Steve McConnell ', 49.60, 'images/books/code_complete_MS.jpg'),
(5, 'book5', 'Sea of Tranquility: Par Emily St. John Mandel', 108.00, 'images/books/Sea_of _tranquility.jpg'),
(6, 'book6', 'Programming Pearls', 46.00, 'images/books/programming_pearls.jpg'),
(7, 'book7', 'Code: Par Charles Petzold ', 32.00, 'images/books/code.jpg'),
(8, 'book8', 'Introduction to Algorithms', 227.00, 'images/books/intro_algorithms.jpg'),
(9, 'book9', 'Refactoring: Improving the Design of Existing Code ', 160.00, 'images/books/refactoring.jpg'),
(10, 'book10', 'The Immortal King Rao: Par Vauhini Vara', 85.40, 'images/books/the_immortal_king_rao.jpg'),
(11, 'book11', 'Verity: Par Colleen Hoover', 36.50, 'images/books/verity.jpg'),
(12, 'book12', 'Johnny the Walrus Board book: Par Matt Walsh', 58.00, 'images/books/johnny.jpg'),
(13, 'book13', 'I\'d Like to Play Alone, Please: Par Tom Segura ', 48.50, 'images/books/please.jpg'),
(14, 'book14', 'The War on the West Hardcover: Par Douglas Murray', 49.00, 'images/books/the_war.jpg'),
(15, 'book15', 'It Ends with Us: Par Colleen Hoover', 38.50, 'images/books/it_ends_with_us.jpg'),
(16, 'book16', 'Anthem: Par Noah Hawley', 57.00, 'images/books/anthem.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
