-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Jul 2019 um 18:55
-- Server-Version: 10.3.15-MariaDB
-- PHP-Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `generator`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `themen`
--

CREATE TABLE `themen` (
  `id` int(10) NOT NULL,
  `kw` int(10) NOT NULL,
  `jahr` int(5) NOT NULL,
  `headingMontag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `montag1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `montag2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `headingDienstag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dienstag1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dienstag2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `headingMittwoch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mittwoch1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mittwoch2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `headingDonnerstag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `donnerstag1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `donnerstag2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `donnerstag3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `headingFreitag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `freitag1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `freitag2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `themen`
--

INSERT INTO `themen` (`id`, `kw`, `jahr`, `headingMontag`, `montag1`, `montag2`, `headingDienstag`, `dienstag1`, `dienstag2`, `headingMittwoch`, `mittwoch1`, `mittwoch2`, `headingDonnerstag`, `donnerstag1`, `donnerstag2`, `donnerstag3`, `headingFreitag`, `freitag1`, `freitag2`, `author`) VALUES
(3, 27, 2019, 'MontagHeading', 'gmoeapg', 'pojg', 'opgj', 'pogjopjge', 'opjg', 'opegj', 'opgje', 'opjg', 'opgj', 'eopgj', 'pojg', 'eopjg', 'opjgpe', 'ojgop', 'ejgo', 'test'),
(4, 28, 2019, 'MontagHeading', 'gmoeapg', 'pojg', 'opgj', 'pogjopjge', 'opjg', 'opegj', 'opgje', 'opjg', 'opgj', 'eopgj', 'pojg', 'eopjg', 'opjgpe', 'ojgop', 'ejgo', 'test'),
(5, 20, 2019, 'Java-Programmierung', 'Datentypen', 'Selbststudium', 'Java-Programmierung', 'Variablen', 'Ãœbungsaufgaben', 'Java-Programmierung', 'Programm â€žHandelskalkulationâ€œ', 'Selbststudium', 'Java-Programmierung', 'Kommentare', 'Operatoren', 'Beschaffungswesen', 'Java-Programmierung', 'bitlogische Operatoren', 'binÃ¤re Addition', 'test'),
(6, 20, 2019, 'Java-Programmierung', 'Datentypen', 'Selbststudium', 'Java-Programmierung', 'Variablen', 'Ãœbungsaufgaben', 'Java-Programmierung', 'Programm â€žHandelskalkulationâ€œ', 'Selbststudium', 'Java-Programmierung', 'Kommentare', 'Operatoren', 'Beschaffungswesen', 'Java-Programmierung', 'bitlogische Operatoren', 'binÃ¤re Addition', 'test');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `vorName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nachName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fachrichtung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `punkte` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `vorName`, `nachName`, `email`, `passwort`, `fachrichtung`, `punkte`) VALUES
(3, 'Tayfun', 'Özdemir', 'tayfun.oezdemir@icloud.com', '$2y$10$Wy59Z5/qYWPzd10/lAQZiOjBDpSV3tiyRXRS08arddtI457L88qUa', 'Informatikkaufmann', 17),
(4, 'Max', 'Mustermann', 'mustermann@web.de', '$2y$10$qM7sPJIduMXt9IJ0UxA0CuNS6ftukHzfzKcl3u5JBdCPqsJzpYi1u', 'Fachinformatiker Anwendungsentwickler', 18);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `themen`
--
ALTER TABLE `themen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `themen`
--
ALTER TABLE `themen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
