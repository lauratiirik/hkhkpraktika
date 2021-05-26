-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2021 at 04:55 PM
-- Server version: 5.7.23
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltiirik`
--

-- --------------------------------------------------------

--
-- Table structure for table `praktika_ettevotted`
--

CREATE TABLE `praktika_ettevotted` (
  `id` int(11) NOT NULL,
  `Nimi` varchar(199) NOT NULL,
  `Valdkond` json NOT NULL,
  `Registrikood` varchar(199) NOT NULL,
  `Aadress` varchar(199) NOT NULL,
  `Juhendaja` varchar(199) NOT NULL,
  `Epost` varchar(199) NOT NULL,
  `Telefoninumber` varchar(199) NOT NULL,
  `Koduleht` varchar(199) NOT NULL,
  `Uldkontakt` varchar(199) NOT NULL,
  `Lisainfo` text NOT NULL,
  `Tunnustamine` tinyint(4) NOT NULL,
  `Uldtelefon` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `praktika_ettevotted`
--

INSERT INTO `praktika_ettevotted` (`id`, `Nimi`, `Valdkond`, `Registrikood`, `Aadress`, `Juhendaja`, `Epost`, `Telefoninumber`, `Koduleht`, `Uldkontakt`, `Lisainfo`, `Tunnustamine`, `Uldtelefon`) VALUES
(2, 'Registrite ja infosüsteemida keskus', '[\"Sotsiaalhooldus\", \"Majutus- ja toitlustusteenindus\", \"IT\"]', '70000310', 'Lubja 4, Tallinn', 'Kristo Rooots', 'mehis.sihvart@rik.ee', '6636300', 'https://www.rik.ee/', 'bar', 'test', 1, '1223434'),
(3, 'Haapsalu Viigi kool', '[\"Puit\"]', '70005660', 'Suur-Mere 17, Haapsalu', 'Hedi Kumm', 'hedi.kumm@viigi.edu.ee', '', '', '', '', 0, ''),
(4, 'Astangu Kutserehabilitatsiooni Keskus', '[\"Majutus- ja toitlustusteenindus\"]', '70003566', 'Astangu 27, Tallinn', 'Kristjan Traks', 'kert.valdaru@astangu.ee', '6877214', '', '', '', 0, ''),
(5, 'Nertivel OÜ', 'null', '12125059', 'Suur-Lossi 7, Haapsalu, 90503 Lääne maakond', 'Aivar Raidla', 'aivar@saba.ee', '5082936', '', '', '', 0, ''),
(6, 'Atea AS', 'null', '10088390', 'Järvevana tee 7b 10132 Tallinn', 'Allan Einamaa', 'ruslan.stserbjuk@atea.ee', '6105920', '', '', '', 0, ''),
(7, 'Zetabit OÜ ', '[\"Kontoritöö\"]', '12626549', 'Pae, 25-32, 11414 Tallinn', 'Madis Männik', 'madis.mannik@z-bit.ee', '58042742', '', '', '', 0, ''),
(8, 'Eesti Rahvusringhääling', 'null', '74002322', 'Kreutzwaldi, 14 15029 Tallinn', 'Aarne Rummel', 'margus.tamm@err.ee', '5294104', '', '', '', 0, ''),
(9, 'Keila Kool', 'null', '75039439', 'Ehitajate tee 1, Keila 76606, Harjumaa', 'Alar Abe', 'mait.toitoja@keilakool.ee', '6755 700', '', '', '', 0, ''),
(10, 'ProDigi', 'null', '11323723', 'Ristiku 10, Pärnu maakond, Lihula', 'Markko Salm', 'Markko@prodigi.ee', '5289558', '', '', '', 0, ''),
(11, '(välispraktika 10.02.-10.03) +Telia Eesti AS', 'null', '10234957', 'Tallinna mnt 1, Haapsalu.', 'Andrus Mikkus', 'deana.ainsoo@telia.ee', '56802602', '', '', '', 0, ''),
(12, 'Dagöplast AS', 'null', '10434410', 'Spordi 4, Käina, 92101 Hiiumaa', 'Janek Elmi', 'personal@dagoplast.ee', '5750 3103', '', '', '', 0, ''),
(13, 'Maanteeamet - Haapsalus', 'null', '70001490', 'Tallinn mnt 70, Haapsalu. Teelise 4, Tallinn', 'Aleksander Kask ja Allar Raud', '\nAnnika.Kitsing@mnt.ee', '6119330', '', '', '', 0, ''),
(14, 'RIA', '[]', '70006317', 'Pärnu mnt 139a Tallinn', '', 'margus.noormaa@ria.ee', '', '', '', '', 1, ''),
(15, 'Primend  (380 t) + välispraktika', 'null', '12621569', 'Lõõtsa 12, 11415 Tallinn', 'Henri Niinepuu', 'info@primend.com', '6870600', '', '', '', 0, ''),
(16, 'Telia Eesti AS', '[\"Majutus- ja toitlustusteenindus\", \"Puit\", \"Käsitöö\"]', '10234957', 'Sõpruse pst 193, Tallinn', 'Aivar Gusev', 'deana.ainsoo@telia.ee', '56802602', '', 'asdsad@mail.com', 'weqweqwew', 0, '66666666'),
(19, 'asd', '[]', 'asd', 'asd', 'asd', 'test@test.test', '123', 'as', 'asd', 'asdasd', 0, ''),
(20, 'test', '[\"Sotsiaalhooldus\", \"Majutus- ja toitlustusteenindus\"]', '23113', 'test', 'assddan wqeqwe', 'asfaww@gmail.com', '456789', 'eitje', 'fwjlwrww', 'kekte\r\n\r\n\r\n', 1, ''),
(21, 'Haapsalu Viigi kool 	', '[]', '', 'asdf', '', '', '', '', '', '', 0, ''),
(22, 'puit', '[\"Puit\"]', '576890', 'test', 'laur', 'laur@laura.com', '67868709', 'www.neti.ee', '89789', '89afw09', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `praktika_kasutajad`
--

CREATE TABLE `praktika_kasutajad` (
  `id` int(11) NOT NULL,
  `Nimi` varchar(199) NOT NULL,
  `Kasutaja` varchar(199) NOT NULL,
  `Parool` text NOT NULL,
  `Admin` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `praktika_kasutajad`
--

INSERT INTO `praktika_kasutajad` (`id`, `Nimi`, `Kasutaja`, `Parool`, `Admin`) VALUES
(1, 'Laura Tiirik', 'ltiirik', '$2y$10$udgvOMS3wZE9hFnWvMzCLOlba7VJqW4U9UsT2Trw1U6DgDSP6j1wS', 0),
(2, 'test', 'testadmin', '$2y$10$s48XQ2fNmmC2mKnfba2f7u6z6/hYaMfNluFaLMfAuq/6p.9vFb9V6', 1),
(5, 'testkasutaja', 'testkasutaja', '$2y$10$z2qu40eANvhfShin4Hozk.CNtbMXNtNsh7F63tnRocLfzg1h.RYxi', 0),
(12, 'asd', 'asd', '$2y$10$3rSToc3UYPjGFrq80vyscu7Bu78XEq8pC3ZF9YUzZNhD.SG594z.W', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `praktika_ettevotted`
--
ALTER TABLE `praktika_ettevotted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praktika_kasutajad`
--
ALTER TABLE `praktika_kasutajad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `praktika_ettevotted`
--
ALTER TABLE `praktika_ettevotted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `praktika_kasutajad`
--
ALTER TABLE `praktika_kasutajad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
