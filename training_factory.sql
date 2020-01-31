-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 31 jan 2020 om 11:34
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_factory`
--
CREATE DATABASE IF NOT EXISTS `training_factory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `training_factory`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lessen`
--

CREATE TABLE `lessen` (
  `id` int(11) NOT NULL,
  `tijd` time NOT NULL,
  `datum` date NOT NULL,
  `locatie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_personen` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `lokaal` int(11) NOT NULL,
  `instructeur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lessen`
--

INSERT INTO `lessen` (`id`, `tijd`, `datum`, `locatie`, `max_personen`, `training_id`, `lokaal`, `instructeur_id`) VALUES
(1, '06:00:00', '2019-12-16', 'delft', 1, 9, 1, 16),
(2, '06:00:00', '2019-12-14', 'delft', 11, 2, 2, 16),
(3, '06:00:00', '2019-12-15', 'den haag', 4, 1, 10, 1),
(4, '06:05:00', '2015-01-01', '', 1, 1, 999, 1),
(5, '08:00:00', '2015-01-01', '', 22, 7, 12, 1),
(6, '00:00:00', '2015-01-01', '', 120200202, 1, 2, 1),
(7, '11:00:00', '2020-01-01', '', 14, 1, 4, 1),
(8, '05:05:00', '2020-03-19', 'Den haag ', 15, 10, 4, 1),
(11, '00:00:00', '2015-01-01', '1', 1, 1, 1, 16);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200130115830', '2020-01-30 11:58:48'),
('20200130120034', '2020-01-30 12:01:27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registreren`
--

CREATE TABLE `registreren` (
  `id` int(11) NOT NULL,
  `betaling` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lessen_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `registreren`
--

INSERT INTO `registreren` (`id`, `betaling`, `user_id`, `lessen_id`) VALUES
(34, 1, 18, 2),
(35, 1, 20, 2),
(36, 1, 20, 1),
(37, 0, 17, 2),
(39, 0, 17, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tijd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kosten` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `training`
--

INSERT INTO `training` (`id`, `naam`, `beschrijving`, `tijd`, `kosten`, `image`) VALUES
(1, 'MMA', 'hierbij gaan we MMA oefenen', '1:00:00', '20.00', 'boksen'),
(2, 'stootzak training', 'hierbij gaan we oefenen', '00:30:00', '20.00', 'kickboksen'),
(7, 'Boksen', 'boksen in de ring', '13:00', '5.50', 'boksen'),
(9, 'basketbal', 'stuiteren', '15:00', '5.00', 'boksen'),
(10, 'voetbal', 'gokken', '13:00', '1.00', 'kickboksen');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loginnaam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geboortedatum` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aanneemdatum` date DEFAULT NULL,
  `salaris` decimal(10,2) DEFAULT NULL,
  `straat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plaats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `loginnaam`, `naam`, `tussenvoegsel`, `achternaam`, `geboortedatum`, `gender`, `aanneemdatum`, `salaris`, `straat`, `postcode`, `plaats`) VALUES
(1, 'brahim701222@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$bUFYRHU0RlNUT3pYbzNCVg$wZtWoetlCegIoVpzNiMbVv9juQhyw+jfN/El0RZwIlY', 'Brahim Oosterveen', 'Brahim', '', 'Oosterveen', '2001-12-22', 'm', '2019-12-10', '2300.00', 'hemstraat 8', '1234FG', 'Schipluiden'),
(16, 'instructeur@gmail.com', '[\"ROLE_INSTRUCTEUR\"]', '$argon2id$v=19$m=65536,t=4,p=1$OTkvd3ZWTHNqVmpubGdtVg$kwomO+raxFni72M3hAqKzSeIir5Khas/74BFtjkRG8k', NULL, 'jan', 'van', 'qwerty', '2001-12-22', 'man', NULL, NULL, 'dildenberglaan', '2309KC', 'Rijswijk'),
(17, 'user@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$WGc4bUhodUtoUVZ2OWs2cA$Yi64DicQvCWTgG91ubQYTjlsfMbJF7+gA0Z2UHrNTOA', NULL, 'User', 'van', 'qwerty', '1900-01-01', 'man', NULL, NULL, 'dildenberglaan', '2309KC', 'Rijswijk'),
(18, 'user2@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Wk5ycTdIQTNPM3V0OVFVWg$Xg/4uMiKXdgbF0uFTsFaApxGskCjp10YIMwQNjrtDYA', NULL, 'user2', '1', 'qwerty', '1900-01-01', 'helicopter', NULL, NULL, 'dildenberglaan', '2309KC', '\'s-Gravenhage'),
(19, 'user3@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$NEdMZTVQSGE3T2o5amdaZA$Y/CM2VYI8Xq/JyY6egySEBcP5Ffd10jg8dbPOkwxto8', NULL, 'user', NULL, 'qwerty', '1921-09-20', 'man', NULL, NULL, 'qwerty', 'qwerty', 'qwerty'),
(20, 'user4@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$T0loMkFRR0pvbVBGTzYycg$hKRGA/4pRvDqOSi0/NdSjCSxDZC3o8CIigDc4Wf+wEo', NULL, 'qwerty', NULL, 'qwerty', '1900-01-01', 'man', NULL, NULL, 'qwerty', 'qwerty', 'qwerty');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29B9C79BEFD98D1` (`training_id`),
  ADD KEY `IDX_29B9C7925FCA809` (`instructeur_id`);

--
-- Indexen voor tabel `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `registreren`
--
ALTER TABLE `registreren`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2A8D9C6BA76ED395` (`user_id`),
  ADD KEY `IDX_2A8D9C6B87481937` (`lessen_id`);

--
-- Indexen voor tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `lessen`
--
ALTER TABLE `lessen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `registreren`
--
ALTER TABLE `registreren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT voor een tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `FK_29B9C7925FCA809` FOREIGN KEY (`instructeur_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_29B9C79BEFD98D1` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`);

--
-- Beperkingen voor tabel `registreren`
--
ALTER TABLE `registreren`
  ADD CONSTRAINT `FK_2A8D9C6B9D86650F` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_2A8D9C6BA4625618` FOREIGN KEY (`lessen_id`) REFERENCES `lessen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
