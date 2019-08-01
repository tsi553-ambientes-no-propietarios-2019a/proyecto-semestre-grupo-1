-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2019 at 12:39 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Info_Q_V5`
--

-- --------------------------------------------------------

--
-- Table structure for table `anony_complain`
--

CREATE TABLE `anony_complain` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` time NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_uni_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Sur'),
(2, 1, 'Centro'),
(3, 1, 'Norte');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` time NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_size` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `type`, `timestamp`, `status`, `city_id`, `user_id`, `image_name`, `image_size`, `updated_at`, `unit_id`) VALUES
(1, 'aaaa', '04:04:00', 'asas', 2, 1, 'daniel.jpg', 9471, '2019-08-01 08:39:29', 0),
(2, 'jjj', '04:04:00', 'jjj', 1, 1, 'equipo.png', 17294, '2019-08-01 11:07:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Quito');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `name`, `city_id`) VALUES
(1, 'angel', 'angel', 'angelmiguel@gmail.com', 'angelmiguel@gmail.com', 1, NULL, '$2y$13$ldqxybflqYtpmaaM4nir7.AcPkUP4WnRKx0QQx87p7lY3hvKgMEF2', '2019-08-01 11:07:33', NULL, NULL, 'a:0:{}', 'angel', 1),
(2, 'angelpj', 'angelpj', 'angelmiguelpj@gmail.com', 'angelmiguelpj@gmail.com', 1, NULL, '$2y$13$XzOwXDvrEWtmIYmnNnMgDuyCKfMpKHHPeBwe7LfjtLXhcUvXdWcZm', '2019-07-29 19:05:21', NULL, NULL, 'a:0:{}', '', 1),
(3, 'miguel', 'miguel', 'miguel@epn.com', 'miguel@epn.com', 1, NULL, '$2y$13$TTminuT99JsG6TjUxPNeXe3OZ0X03BTdqL3uCx9ZQ3NXJtlmKmTny', '2019-07-29 12:13:03', NULL, NULL, 'a:0:{}', '', 1),
(4, 'xavier', 'xavier', 'xavier@gmail.com', 'xavier@gmail.com', 1, NULL, '$2y$13$xy51PrOR1yyw209g.L7Tuua8ln7WZfSG317xlrhKbqNB.Ue04VMBq', '2019-07-29 12:15:42', NULL, NULL, 'a:0:{}', '', 1),
(5, 'superadminxavier', 'superadminxavier', 'xavier@sistema.com', 'xavier@sistema.com', 1, NULL, '$2y$13$dsKHRZQS3ySnfMqoIqSNSOYAKXuFWkj3LFB3DAoZbMjtr3IFhvNeq', NULL, NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', '', 1),
(6, 'superadminmiguel', 'superadminmiguel', 'miguel@sistema.com', 'miguel@sistema.com', 1, NULL, '$2y$13$8nAmfIW9rNm4hC2ab7Q13OlXD5lQ.YxEWSbYAuhgU9DZsNej.7kHS', '2019-08-01 01:43:48', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', '', 1),
(7, 'superadminbryan', 'superadminbryan', 'bryan@sistema.com', 'bryan@sistema.com', 1, NULL, '$2y$13$h5gqwMp6WHaItmAlYGKQO.1DKT7r2EbBtOUO754uma/D2QSGN8o6a', NULL, NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', '', 1),
(8, 'superadminjefferson', 'superadminjefferson', 'jefferson@sistema.com', 'jefferson@sistema.com', 1, NULL, '$2y$13$vdWED3fwruyypLHscHKTceq0gotsLdUmXeRUQb33QRNyzptwODL56', NULL, NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', '', 1),
(9, 'angelm', 'angelm', 'angelmiguelmapj@mail.com', 'angelmiguelmapj@mail.com', 1, NULL, '$2y$13$fD/056Mfxd54YDSY9BUtbewT7EW/iLJ9zNSzQiSyOBZNzDOsEQUBu', '2019-07-29 13:36:48', NULL, NULL, 'a:0:{}', 'angelmiguel', 1),
(10, 'jeffer', 'jeffer', 'jeffersonl@mail.com', 'jeffersonl@mail.com', 1, NULL, '$2y$13$EEj/UrIKYf/AMOUfudSpJ.WGRf14xjPh2EhLWu4Ma2XsBrqSSi/oa', '2019-07-29 13:38:26', NULL, NULL, 'a:0:{}', 'jefferson', 1),
(11, 'mapj', 'mapj', 'mapj@mail.com', 'mapj@mail.com', 1, NULL, '$2y$13$1UF9kfopCrd0SUbvtQQCYeMdSsmHjWvxt7CsmbLf8wa6JWqq5RuVW', '2019-07-29 15:33:20', NULL, NULL, 'a:0:{}', 'mapj', 1),
(12, 'luisito', 'luisito', 'luis@mail.com', 'luis@mail.com', 0, NULL, '$2y$13$Ci41WV0E9a6DlFm8DBPa2eIPOH9SbHwgY3CQkKUWNqEpozpKSiq5C', NULL, 'GURseMgY5OtTnMooop1ieDENkXOdgJ9FJ2Z5gqe26s8', NULL, 'a:0:{}', 'luis', 1),
(13, 'mp', 'mp', 'mp@mail.com', 'mp@mail.com', 0, NULL, '$2y$13$qqQa0XclBcxbaMGFPVdB7e0a2StVOeGkgHxBsi3nh.1lBMl2m.ljy', NULL, 'n2WeaEPh8lDI19kEoC_hKmHKvCVBxTs21qnfywK0tGM', NULL, 'a:0:{}', 'mp', 3),
(14, 'abcd', 'abcd', 'acd@mail.com', 'acd@mail.com', 0, NULL, '$2y$13$NL4L25kfBxOpBHYkryy6p.XoznjTKc26HnLNZCIVp6UaIDsefKocW', NULL, 'e2Bh5gS78X_s4abeFr_kha2TqGgRXAaG7bKLPlb3G5w', NULL, 'a:0:{}', 'abcd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190729172252', '2019-07-29 17:23:35'),
('20190729175508', '2019-07-29 17:55:47'),
('20190729200127', '2019-07-29 20:01:41'),
('20190801092331', '2019-08-01 09:23:56'),
('20190801093744', '2019-08-01 09:37:52'),
('20190801101011', '2019-08-01 10:10:17'),
('20190801101624', '2019-08-01 10:16:34'),
('20190801102143', '2019-08-01 10:21:53'),
('20190801104953', '2019-08-01 10:49:59'),
('20190801110814', '2019-08-01 11:08:23'),
('20190801111120', '2019-08-01 11:11:38'),
('20190801115334', '2019-08-01 11:54:46'),
('20190801151528', '2019-08-01 15:15:36'),
('20190801160237', '2019-08-01 16:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `name_sta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_sta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `name_sta`, `address_sta`) VALUES
(1, 'Recreo', 'Nose');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `type_uni` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_uni` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numer_uni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `station_id`, `type_uni`, `route_uni`, `numer_uni`) VALUES
(1, 1, 'doble', 'sur-norte', 25364);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anony_complain`
--
ALTER TABLE `anony_complain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_835DBDC68BAC62AF` (`city_id`),
  ADD KEY `IDX_835DBDC686055357` (`number_uni_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D5B0234F92F3E70` (`country_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2DD0CD6B8BAC62AF` (`city_id`),
  ADD KEY `IDX_2DD0CD6BA76ED395` (`user_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  ADD KEY `IDX_957A64798BAC62AF` (`city_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DCBB0C5321BDB235` (`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anony_complain`
--
ALTER TABLE `anony_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anony_complain`
--
ALTER TABLE `anony_complain`
  ADD CONSTRAINT `FK_835DBDC686055357` FOREIGN KEY (`number_uni_id`) REFERENCES `unit` (`id`),
  ADD CONSTRAINT `FK_835DBDC68BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `FK_2D5B0234F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `FK_2DD0CD6B8BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `FK_2DD0CD6BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A64798BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `FK_DCBB0C5321BDB235` FOREIGN KEY (`station_id`) REFERENCES `station` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
