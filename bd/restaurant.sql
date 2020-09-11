-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2020 at 05:45 PM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `details` text NOT NULL,
  `erase` tinyint(4) NOT NULL DEFAULT 0,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `details`, `erase`, `menu_id`) VALUES
(1, 'Fromage chédar', 2.5, '350g de fromage chédar coupé en tranche', 0, 1),
(2, 'Sauce tomate', 0.99, '100ml de sauce tomate fait maison', 0, 1),
(6, 'Steak', 99.08, 'Un bon steak', 0, 3),
(7, 'Sauce BBQ', 123.01, 'De la sauce maison BBQ', 0, 3),
(11, 'Bacon', 10, 'Bacon', 0, 3),
(12, 'Fromage chédar', 12.99, 'Du fromage chédar', 0, 2),
(18, 'Fromage chédar', 12.99, 'Du fromage chédar', 1, 3),
(19, 'Boeuf', 30.99, 'Morceaux de viande de bœuf', 0, 8),
(20, 'Champignon', 2.5, 'Des champignons', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `details` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `date_start`, `date_end`, `details`, `email`, `user_id`) VALUES
(1, 'Lasagne Bolognaise', '2020-02-13', '2020-02-14', 'Une lasagne à la sauce tomate, soupoudrée de fromage chédar et de bacon', 'antoine.laboissiere@gmail.com', 1),
(2, 'Pizza Québécoise', '2020-02-27', '2020-02-28', 'Trois fromages, pizza de la belle province du Québec', 'antoine.laboissiere@gmail.com', 1),
(3, 'Hamburger Steak', '2020-04-30', '2020-04-29', 'Un burger américain à la sauce BBQ et soupoudré de bacons', 'antoine.laboissiere@gmail.com', 1),
(8, 'Boeuf Bourguignon', '2020-05-10', '2020-05-29', 'Le bœuf bourguignon est une recette de cuisine d\'estouffade de bœuf, traditionnelle de la cuisine bourguignonne, cuisinée au vin rouge de Bourgogne, avec une garniture de champignons, de petits oignons et de lardons.', 'antoine.laboissiere@gmail.com', 1),
(14, 'Un menu d\'un autre utilisateur', '2020-05-11', '2020-05-29', 'Menu de André Pilon', 'prof@prof.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `login`, `password`) VALUES
(1, 'Antoine La Boissière', 'alaboissiere', 'etudiant'),
(2, 'Administrateur', 'admin', 'admin'),
(3, 'André Pilon', 'apilon', 'prof');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
