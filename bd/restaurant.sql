-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2020 at 02:29 AM
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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(11, 'fr_CA', 'Menus', 1, 'name', 'Délicieuse pizza'),
(12, 'fr_CA', 'Menus', 1, 'details', 'Une pizza très délicieuse'),
(13, 'fr_CA', 'Menus', 2, 'name', 'Savoureux Burger'),
(14, 'fr_CA', 'Menus', 2, 'details', 'Un très bon burger'),
(15, 'fr_CA', 'Menus', 3, 'details', 'Un test de l\'administrateur'),
(16, 'fr_CA', 'Menus', 10, 'name', 'Grand Pad Thaï'),
(17, 'fr_CA', 'Menus', 10, 'details', 'Le meilleur Pad Thaï jamais créé'),
(18, 'es_ES', 'Menus', 1, 'name', 'Deliciosa pizza'),
(19, 'es_ES', 'Menus', 1, 'details', 'Una pizza muy deliciosa'),
(20, 'es_ES', 'Menus', 2, 'name', 'Sabrosa hamburguesa'),
(21, 'es_ES', 'Menus', 2, 'details', 'Una muy buena hamburguesa'),
(22, 'es_ES', 'Menus', 3, 'name', 'Prueba'),
(23, 'es_ES', 'Menus', 3, 'details', 'Una prueba del administrador'),
(24, 'es_ES', 'Menus', 10, 'name', 'Gran Pad Thaï'),
(25, 'es_ES', 'Menus', 10, 'details', 'El mejor Pad Thaï jamás creado'),
(26, 'es_ES', 'Items', 1, 'name', 'Queso'),
(27, 'es_ES', 'Items', 1, 'details', 'Un infierno de queso'),
(28, 'es_ES', 'Items', 2, 'name', 'Prueba'),
(29, 'es_ES', 'Items', 2, 'details', 'Otra prueba del administrador'),
(30, 'fr_CA', 'Items', 1, 'name', 'Fromage'),
(31, 'fr_CA', 'Items', 1, 'details', 'Un fromage d\'enfer'),
(32, 'fr_CA', 'Items', 2, 'details', 'Un autre test de l\'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `details` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `menu_id`, `name`, `price`, `details`, `created`, `modified`) VALUES
(1, 1, 'Cheese', 0.2, 'One hell of a cheese', '2020-09-11 13:25:28', '2020-10-19 17:44:04'),
(2, 3, 'Test', 0, 'Another test from the admin', '2020-09-11 13:26:08', '2020-10-19 17:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `details` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `name`, `slug`, `details`, `created`, `modified`) VALUES
(1, 1, 'Delicious Pizza', 'pizza', 'A very delicious pizza', '2020-09-11 13:23:26', '2020-10-19 17:34:37'),
(2, 1, 'Tasty Burger', 'burger', 'A very good burger', '2020-09-11 13:23:52', '2020-10-19 17:35:06'),
(3, 2, 'Test', 'test', 'A test from the admin', '2020-09-11 13:24:27', '2020-10-19 17:35:34'),
(10, 4, 'Great Pad Thaï', 'Pad-Thai', 'The best Pad Thaï ever created', '2020-09-28 14:39:04', '2020-10-19 17:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `menus_files`
--

CREATE TABLE `menus_files` (
  `id_menu` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `name`, `location`, `created`, `modified`) VALUES
(1, 1, 'San Antonio Restaurant', '632 rue Notre-Dame, Repentigny QC', '2020-10-19 11:27:59', '2020-10-19 11:27:59'),
(2, 4, 'Simon\'s Restaurant', '7800 Constantia, South Africa', '2020-10-19 11:29:27', '2020-10-19 11:29:27'),
(3, 1, 'Test', '1260 Test', '2020-10-19 16:02:47', '2020-10-19 16:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL DEFAULT 'author',
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `grade`, `username`, `email`, `password`, `uuid`, `confirmed`, `created`, `modified`) VALUES
(1, 'author', 'Antoine La Boissière', 'antoine.laboissiere@gmail.com', '$2y$10$FYnAag4tDcWrfnSmAtTOk.4jF6EqS9ZOy.WNO6i.8IP3QJPBRP2WW', '76e345e8-4f4f-437b-8f01-0999bf9c2835', 0, '2020-09-11 13:21:37', '2020-10-20 01:16:01'),
(2, 'administrator', 'Admin', 'admin@gmail.com', '$2y$10$ri97XUBCGa8.vmj0R..u8.i6e/fxJ/UwCtEzr2pFoDrghB/XjWeWe', '9f924ef3-236e-4079-b7ec-34fa9222d887', 0, '2020-09-11 13:22:24', '2020-10-20 01:16:22'),
(4, 'author', 'Simon Desjardins', 'simon.desjardins@hotmail.com', '$2y$10$KitfBr6rXqQBybkj40zUwuo0BSEueGcEkB2qywnM.wrQxKDj4YFrq', '58136847-1c36-4580-be4b-7f97ddfb296c', 0, '2020-09-28 14:31:18', '2020-10-20 01:16:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

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
-- Indexes for table `menus_files`
--
ALTER TABLE `menus_files`
  ADD KEY `id_menu` (`id_menu`,`id_image`),
  ADD KEY `id_image` (`id_image`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Constraints for table `menus_files`
--
ALTER TABLE `menus_files`
  ADD CONSTRAINT `menus_files_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `menus_files_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `files` (`id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
