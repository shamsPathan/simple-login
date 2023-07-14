-- Adminer 4.8.1 MySQL 10.11.4-MariaDB-1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(6,	'shams2@email.com',	'$2y$10$UUwa1fDKrStmLHqeIacEw.1IR7uc907tbdIbkVfqAKGADRwUC/jlC'),
(7,	'ripa@gmail.com',	'$2y$10$heiTeh1DY6eI5/eZOH5PN.Wwie6z9E0ZsR4db0MsjPwTQPWywyvRS');

-- 2023-07-14 11:19:40
