-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 22. Sep 2019 um 01:15
-- Server-Version: 5.7.27
-- PHP-Version: 7.2.21

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
  `headingMontag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `montag1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `montag2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headingDienstag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienstag1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienstag2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headingMittwoch` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mittwoch1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mittwoch2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headingDonnerstag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donnerstag1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donnerstag2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donnerstag3` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headingFreitag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `freitag1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `freitag2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `themen`
--

INSERT INTO `themen` (`id`, `kw`, `jahr`, `headingMontag`, `montag1`, `montag2`, `headingDienstag`, `dienstag1`, `dienstag2`, `headingMittwoch`, `mittwoch1`, `mittwoch2`, `headingDonnerstag`, `donnerstag1`, `donnerstag2`, `donnerstag3`, `headingFreitag`, `freitag1`, `freitag2`, `author`) VALUES
(6, 20, 2019, 'Java-Programmierung', 'Datentypen', 'Selbststudium', 'Java-Programmierung', 'Variablen', 'Übungsaufgaben', 'Java-Programmierung', 'Programm Handelskalkulation', 'Selbststudium', 'Java-Programmierung', 'Kommentare', 'Operatoren', 'Beschaffungswesen', 'Java-Programmierung', 'bitlogische Operatoren', 'binäre Addiotion', 'test'),
(9, 25, 2019, 'üüüüüü', 'öööö', 'TÄTTENETEN', 'ÄETÄATALEÄTPAL', 'TETÄT:AEÄÖ:SÄ:GE:G--', '$$$$Gagawg', 'lötm4tmä43öt,', 't4wtä,ötät4tlr3t', 't3öqltmq3löt', 'lt3ömqötmtq', '3tälm3', 'tm', '3tmlö', 'tmö', '3tml', 'tmö', 'Cengiz Özmen'),
(11, 30, 2019, 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Testneu', 'Tayfun Özdemir');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `themen2`
--

CREATE TABLE `themen2` (
  `id` int(50) NOT NULL,
  `kw` int(2) NOT NULL,
  `jahr` int(4) NOT NULL,
  `hMontag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tMontag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dMontag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sMontag` int(3) NOT NULL,
  `hDienstag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDienstag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dDienstag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sDienstag` int(3) NOT NULL,
  `hMittwoch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tMittwoch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dMittwoch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sMittwoch` int(3) NOT NULL,
  `hDonnerstag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tDonnerstag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dDonnerstag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sDonnerstag` int(3) NOT NULL,
  `hFreitag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tFreitag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dFreitag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sFreitag` int(3) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `themen2`
--

INSERT INTO `themen2` (`id`, `kw`, `jahr`, `hMontag`, `tMontag`, `dMontag`, `sMontag`, `hDienstag`, `tDienstag`, `dDienstag`, `sDienstag`, `hMittwoch`, `tMittwoch`, `dMittwoch`, `sMittwoch`, `hDonnerstag`, `tDonnerstag`, `dDonnerstag`, `sDonnerstag`, `hFreitag`, `tFreitag`, `dFreitag`, `sFreitag`, `author`) VALUES
(5, 32, 2019, 'Netzwerktechnik', 'Überblick Thema Netzwerktechnik,Selbststudium OSI-Modell', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Einführung Vernetzte IT-Systeme,Selbststudium', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'ISO/OSI-Modell,Selbststudium', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Stellenwertsysteme,Subnetting,Übungsaufgaben', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Subnetting,Dokumentation,Uebungsaufgaben', 'Herr Wehlitz', 10, 'Cengiz Andac'),
(6, 23, 2019, 'Java-Programmierung', 'Ergebnisabgleich Übungsaufgaben,Klausurvorbereitung', 'Herr Böhler', 10, 'Java-Programmierung', 'Java-Klausur,Nachbesprechung,Klausurvorbereitung AWL', 'Herr Böhler', 10, 'Wirtschaftsrechnen', 'Klausurvorbereitung AWL', 'Herr Böhler', 10, 'Wirtschaftsrechnen', 'Klausur,Nachbesprechnung', 'Herr Böhler, Herr Oehmke', 10, 'Java-Programmierung', 'Arrays,Übungsaufgaben', 'Herr Böhler', 10, 'Cengiz Andac'),
(7, 24, 2019, 'Feiertag', '', ' ', 0, 'Java-Programmierung', 'Übungsaufgaben', 'Herr Böhler', 10, 'Java-Programmierung', 'Übungsaufgaben,Optimierung der Tool Bibliothek', 'Herr Böhler', 10, 'Java-Programmierung', 'Optimierung der Tools-Bibliothek,Wirtschaft:,Beschaffungswesen', 'Herr Böhler, Herr Oehmke', 10, 'Java-Programmierung', 'Ergebnisabgleich,Übungsaufgaben', 'Herr Böhler', 10, 'Cengiz Andac'),
(9, 25, 2019, 'Java-Programmierung', 'fundametal classes,Methoden', 'Herr Böhler', 10, 'Java-Programmierung', 'Übungsaufgaben', 'Herr Böhler', 10, 'Java-Programmierung', 'Besprechung Übungsaufgaben, Neue Übungsaufgaben', 'Herr Böhler', 10, 'Feiertag', '', '', 0, 'Feiertag', '', '', 0, 'Cengiz Andac'),
(10, 26, 2019, 'Java-Programmierung', 'Übungsaufgaben', 'Herr Böhler', 10, 'Java-Programmierung', 'Kurzeinstieg UML,Selbststudium', 'Herr Böhler', 10, 'Software-Technik', 'Softwarelebenszyklus, Recherche Vogehensmodelle', 'Herr Böhler', 10, 'Software-Technik', 'Recherche Vorgehensmodelle, Wirtschaft:, Beschaffungswesen', 'Herr Böhler, Herr Oehmke', 10, 'Software-Technik', 'Recherche Vorgehensmodelle', 'Herr Böhler', 10, 'Cengiz Andac'),
(11, 27, 2019, 'Software-Technik', 'Recherche Vorgehensmodelle', 'Herr Böhler', 10, 'Software-Technik', 'Recherche Vorgehensmodelle', 'Herr Böhler', 10, 'Software-Technik', 'Vorträge Vorgehensmodelle', 'Herr Böhler', 10, 'Software-Technik', 'Vorträge Vorgehensmodelle, Wirtschaft:, Beschaffungwesen', 'Herr Böhler, Herr Oehmke', 10, 'Software-Technik', 'Vorträge Vorgehensmodelle, Dokumentation & Aufwandschätzung, Lasten & Pflichtenheft', 'Herr Böhler', 10, 'Cengiz Andac'),
(12, 28, 2019, 'Software-Technik', 'Projektarbeit \"Stadtwerke\"', 'Herr Böhler', 10, 'Software-Technik', 'Projektarbeit \"Stadtwerke\"', 'Herr Böhler', 10, 'Software-Technik', 'Projektarbeit \"Stadtwerke\", Wirtschaft:, Klausurvorbereitung', 'Herr Böhler', 10, 'Wirtschaftsrechnen', 'Klausur Beschaffungswesen', 'Herr Oehmke', 10, 'Software-Technik', 'Selbststudium', 'Herr Böhler', 10, 'Cengiz Andac'),
(13, 29, 2019, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Cengiz Andac'),
(14, 30, 2019, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Cengiz Andac'),
(15, 31, 2019, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Urlaub', '', '', 0, 'Cengiz Andac'),
(16, 33, 2019, 'Grundlagen der Netzwerktechnik', 'ISO/OSI-Modell,Netzwerktopologien', 'Herr Wehlitz', 10, 'Grundlagen der Netzwerktechnik', 'Transitsysteme im OSI-Modell', 'Herr Wehlitz', 10, 'Grundlagen der Netzwerktechnik', 'Ergebnisabgleich Übungsaufgaben ,Selbststudium', 'Herr Wehlitz', 10, 'Grundlagen der Netzwerktechnik', 'TCP/IP-Modell,IP-Adressen,Übungsaufgaben', 'Herr Wehlitz', 10, 'Grundlagen der Netzwerktechnik', 'Wiederholung: Stellenwertsysteme,Übungsaufgaben', 'Herr Wehlitz', 10, 'Michel Palmowski'),
(17, 33, 2019, 'Netzwerktechnik', 'ISO/OSI-Modell,Netzwerktopologien & -zugriffsverfahren,Selbststudium', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Transitsysteme im OSI-Modell,Ergebnisabgleich Übungsaufgaben', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Ergebnisabgleich Übungsaufgaben,Selbststudium', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'TCP/IP-Modell,IP-Adressen,Übungsaufgaben', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Wiederholung: Stellenwertsysteme,Dokumentation,Übungsaufgaben', 'Herr Wehlitz', 10, 'Tayfun Özdemir'),
(18, 34, 2019, 'Netzwerktechnik', 'Übertragungstechnik,Ergebnisabgleich Übungsaufgaben,Recherche Referat', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Ergebnisabgleich Übungsaufgaben,Recherche Referat', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Datenübertragung,Manchester Codierung,Präsentationsvorbereitung', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Multiplexing,Selbststudium', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Selbststudium,Präsentationsvorbereitung', 'Herr Wehlitz', 10, 'Tayfun Özdemir'),
(19, 35, 2019, 'Netzwerktechnik', 'Vortrag „Tiefseekabel“,Leitungstypen, strukturierte Verkabelung', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Übertragungstechnische Grundlagen,Selbststudium', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Vortrag „Lichtwellenleiter“,Testaufgaben,Ergebnisabgleich', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Vortrag „HTTP“,Cisco Packet Tracer Einführung', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Update Projektarbeit „Stadtwerke“', 'Herr Wehlitz', 10, 'Tayfun Özdemir'),
(21, 36, 2019, 'Java Grundlagen', 'mehrdimensionale Arrays,Übungsaufgabe(Tic Tac Toe)', 'Herr Böhler', 10, 'Java Grundlagen', 'Cisco Packet Tracer,Selbststudium', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'DHCP,Cisco Packet Tracer', 'Herr Wehlitz', 10, 'Netzwerktechnik', 'Routing, Übungsaufgaben,Selbststudium', 'Herr Wehlitz', 10, 'Java Grundlagen', 'Übungsaufgabe (Tic Tac Toe),Selbststudium', 'Herr Böhler', 10, 'Tayfun Özdemir');

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
(3, 'Tayfun', 'Özdemir', 'tayfun.oezdemir@icloud.com', '$2y$10$Wy59Z5/qYWPzd10/lAQZiOjBDpSV3tiyRXRS08arddtI457L88qUa', 'Informatikkaufmann', 91),
(8, 'Cengiz', 'Andac', 'cengiz.andac@gmail.com', '$2y$10$x95QTYb6Ujz75bp62LrpW.7w5FS8yTBpXudhDC2/yvfDTh3IT2BXO', 'FI Anwendungsentwicklung', 166),
(9, 'Kolja', 'Sagorski', 'tayfun@koljasagorski.de', '$2y$10$MLJe36SRyDzwA3mN8yqNwusCWIIycaUkECaDADfKkBGPDB3RFbTie', 'Fachinformatiker-Systemintegration', 6),
(10, 'Michel', 'Palmowski', 'mpalmowski@outlook.de', '$2y$10$vvFp04x7uj0Hq24x2TJWSe52tRbrB/5CgTJGtba2BBM9MkvM7LZRW', 'Fachinformatiker Systemintegration', 36);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `themen`
--
ALTER TABLE `themen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `themen2`
--
ALTER TABLE `themen2`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `themen2`
--
ALTER TABLE `themen2`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
