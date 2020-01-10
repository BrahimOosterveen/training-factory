-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jan 2020 om 12:13
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.1.33

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
  `locatie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_personen` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `lokaal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lessen`
--

INSERT INTO `lessen` (`id`, `tijd`, `datum`, `locatie`, `max_personen`, `training_id`, `lokaal`) VALUES
(1, '06:00:00', '2019-12-16', 'delft', 12, 2, 0),
(2, '06:00:00', '2019-12-14', 'delft', 11, 2, 0),
(3, '06:00:00', '2019-12-15', 'den haag', 4, 1, 0),
(4, '06:05:00', '2015-01-01', NULL, 1, 1, 999),
(5, '08:00:00', '2015-01-01', NULL, 22, 7, 12),
(6, '00:00:00', '2015-01-01', NULL, 120200202, 1, 2),
(7, '11:00:00', '2020-01-01', NULL, 14, 1, 4);

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
('20191209111038', '2019-12-09 11:11:07'),
('20191209113403', '2019-12-09 11:34:16'),
('20191209113949', '2019-12-09 11:40:00'),
('20191210100940', '2019-12-10 10:10:28'),
('20191210101205', '2019-12-10 10:12:33'),
('20191210104130', '2019-12-10 10:41:59'),
('20191210104239', '2019-12-10 10:43:04'),
('20191213085727', '2019-12-13 08:58:18'),
('20191216124557', '2019-12-16 12:48:08'),
('20191216124733', '2019-12-16 12:48:09'),
('20191218083808', '2019-12-18 08:38:54'),
('20191218083830', '2019-12-18 08:38:54'),
('20191218110833', '2019-12-18 11:10:04'),
('20191218110858', '2019-12-18 11:10:04');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `registreren`
--

CREATE TABLE `registreren` (
  `id` int(11) NOT NULL,
  `betaling` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, 'zwaargewicht', 'idk', '00:20:00', '10.20', 'boksen'),
(7, 'Boksen', 'boksen in de ring', '13:00', '5.50', 'boksen'),
(8, 'kickboksen', 'vechten', '13:00', '10.20', 'kickboksen');

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
(1, 'brahim701222@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$DKm7VHVAb1t943RyIceZ3OUWptnozB1wlvocTZSywZsN6tEBw7g1e', 'Brahim Oosterveen', 'Brahim', '', 'Oosterveen', '2001-12-22', 'm', '2019-12-10', '2300.00', 'hemstraat 8', '1234FG', 'Schipluiden'),
(16, 'instructeur@gmail.com', '[\"ROLE_INSTRUCTEUR\"]', '$2y$13$kABWbROk6N0qQ2VXOAWZHef107/osOp7kD10neVZSgcg8bMh0YGqO', NULL, 'Instructeur', NULL, 'qwerty', '2001-12-22', 'man', NULL, NULL, 'dildenberglaan', '2309KC', 'Rijswijk'),
(17, 'user@gmail.com', '[]', '$2y$13$piJ3z/6luNM9hKJarI9nNuNDfHcQ13GEl7dOB/nrKPyEHA7PJZUgi', NULL, 'User', 'van', 'qwerty', '1900-01-01', 'man', NULL, NULL, 'dildenberglaan', '2309KC', 'Rijswijk'),
(18, 'user2@gmail.com', '[]', '$2y$13$9Pu60s4rPvHSDx1BBzH0TuKq4x7hV0ZjQiiEAnC/z7MBWUkkAAa9q', NULL, 'user2', '1', 'qwerty', '1900-01-01', 'helicopter', NULL, NULL, 'dildoberglaan', '2309KC', '\'s-Gravenhage');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29B9C79BEFD98D1` (`training_id`);

--
-- Indexen voor tabel `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `registreren`
--
ALTER TABLE `registreren`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `registreren`
--
ALTER TABLE `registreren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `FK_29B9C79BEFD98D1` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
