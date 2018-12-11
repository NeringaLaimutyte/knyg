-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 m. Grd 09 d. 19:39
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knygynas`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `autoriai`
--

CREATE TABLE `autoriai` (
  `fk_Knyga` int(11) NOT NULL,
  `fk_Autorius` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `autorius`
--

CREATE TABLE `autorius` (
  `id` int(11) NOT NULL,
  `vardas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `pavarde` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `biografija` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `issaugotos_knygos`
--

CREATE TABLE `issaugotos_knygos` (
  `id` int(11) NOT NULL,
  `fk_Vartotojas` int(11) NOT NULL,
  `fk_Knyga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kaina`
--

CREATE TABLE `kaina` (
  `id` int(11) NOT NULL,
  `kaina` double DEFAULT NULL,
  `pastaba` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `PrData` date DEFAULT NULL,
  `PaData` date DEFAULT NULL,
  `fk_Knyga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `knyga`
--

CREATE TABLE `knyga` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `isleidimo_metai` int(11) DEFAULT NULL,
  `kalba` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `paveikslelio_nuoroda` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `aprasymas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `puslapiu_skaicius` int(11) DEFAULT NULL,
  `ISBN_kodas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `virselio_tipas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `recenzija` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `knygu_sandelyje`
--

CREATE TABLE `knygu_sandelyje` (
  `id` int(11) NOT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `fk_Sandelis` int(11) NOT NULL,
  `fk_Knyga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `knygu_sarasas`
--

CREATE TABLE `knygu_sarasas` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `fk_Leidykla` int(11) NOT NULL,
  `fk_Sandelis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kuponas`
--

CREATE TABLE `kuponas` (
  `id` int(11) NOT NULL,
  `kodas` varchar(10) NOT NULL,
  `suma` double DEFAULT NULL,
  `galiojimo_data` date DEFAULT NULL,
  `ar_panaudotas` tinyint(1) DEFAULT NULL,
  `fk_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `leidykla`
--

CREATE TABLE `leidykla` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `miestas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `el_pasto_adresas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `gatve` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `namo_numeris` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `logas`
--

CREATE TABLE `logas` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `IP` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `URL` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `laikas` time DEFAULT NULL,
  `fk_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `naujienos`
--

CREATE TABLE `naujienos` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tekstas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `parasymo_data` date DEFAULT NULL,
  `publikavimo_data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `pastas`
--

CREATE TABLE `pastas` (
  `id` int(11) NOT NULL,
  `Cksum` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `checkedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `prekiu_sarasas`
--

CREATE TABLE `prekiu_sarasas` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `fk_Vartotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `sandelis`
--

CREATE TABLE `sandelis` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `gatve` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `miestas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `namo_numeris` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzsakymas`
--

CREATE TABLE `uzsakymas` (
  `id` int(11) NOT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `fk_Knyga` int(11) NOT NULL,
  `fk_Knygu_sarasas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `vartotojas`
--

CREATE TABLE `vartotojas` (
  `id` int(11) NOT NULL,
  `vardas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `pavarde` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `el_pastas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `slaptazodis` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `adresas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `isleista_pinigu` double DEFAULT NULL,
  `nupirkta_knygu` int(11) DEFAULT NULL,
  `bonus_pinigai` double DEFAULT NULL,
  `nuolaida` int(11) DEFAULT NULL,
  `bonus_narys` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `vartotojo_uzsakymas`
--

CREATE TABLE `vartotojo_uzsakymas` (
  `id` int(11) NOT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `uzsakymo_id` int(11) DEFAULT NULL,
  `fk_Prekiu_sarasas` int(11) NOT NULL,
  `fk_Knyga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `zanrai`
--

CREATE TABLE `zanrai` (
  `fk_Knyga` int(11) NOT NULL,
  `fk_zanras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `zanras`
--

CREATE TABLE `zanras` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoriai`
--
ALTER TABLE `autoriai`
  ADD PRIMARY KEY (`fk_Knyga`,`fk_Autorius`);

--
-- Indexes for table `autorius`
--
ALTER TABLE `autorius`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issaugotos_knygos`
--
ALTER TABLE `issaugotos_knygos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issaugo_knyga` (`fk_Vartotojas`),
  ADD KEY `itraukia_knyga` (`fk_Knyga`);

--
-- Indexes for table `kaina`
--
ALTER TABLE `kaina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turi` (`fk_Knyga`);

--
-- Indexes for table `knyga`
--
ALTER TABLE `knyga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knygu_sandelyje`
--
ALTER TABLE `knygu_sandelyje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turi1` (`fk_Sandelis`),
  ADD KEY `yra` (`fk_Knyga`);

--
-- Indexes for table `knygu_sarasas`
--
ALTER TABLE `knygu_sarasas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzsako_is` (`fk_Leidykla`),
  ADD KEY `sudaro` (`fk_Sandelis`);

--
-- Indexes for table `kuponas`
--
ALTER TABLE `kuponas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perka` (`fk_Vartotojas`);

--
-- Indexes for table `leidykla`
--
ALTER TABLE `leidykla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logas`
--
ALTER TABLE `logas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `padaro` (`fk_Vartotojas`);

--
-- Indexes for table `naujienos`
--
ALTER TABLE `naujienos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastas`
--
ALTER TABLE `pastas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prekiu_sarasas`
--
ALTER TABLE `prekiu_sarasas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pateikia` (`fk_Vartotojas`);

--
-- Indexes for table `sandelis`
--
ALTER TABLE `sandelis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzsako` (`fk_Knyga`),
  ADD KEY `itrauktas_i` (`fk_Knygu_sarasas`);

--
-- Indexes for table `vartotojas`
--
ALTER TABLE `vartotojas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vartotojo_uzsakymas`
--
ALTER TABLE `vartotojo_uzsakymas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itrauktas_i_uzsakyma` (`fk_Prekiu_sarasas`),
  ADD KEY `uzsako_preke` (`fk_Knyga`);

--
-- Indexes for table `zanrai`
--
ALTER TABLE `zanrai`
  ADD PRIMARY KEY (`fk_Knyga`,`fk_zanras`),
  ADD KEY `priklauso1` (`fk_zanras`);

--
-- Indexes for table `zanras`
--
ALTER TABLE `zanras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autorius`
--
ALTER TABLE `autorius`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issaugotos_knygos`
--
ALTER TABLE `issaugotos_knygos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kaina`
--
ALTER TABLE `kaina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `knyga`
--
ALTER TABLE `knyga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `knygu_sandelyje`
--
ALTER TABLE `knygu_sandelyje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `knygu_sarasas`
--
ALTER TABLE `knygu_sarasas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuponas`
--
ALTER TABLE `kuponas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `leidykla`
--
ALTER TABLE `leidykla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logas`
--
ALTER TABLE `logas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;

--
-- AUTO_INCREMENT for table `naujienos`
--
ALTER TABLE `naujienos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pastas`
--
ALTER TABLE `pastas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prekiu_sarasas`
--
ALTER TABLE `prekiu_sarasas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sandelis`
--
ALTER TABLE `sandelis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vartotojas`
--
ALTER TABLE `vartotojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vartotojo_uzsakymas`
--
ALTER TABLE `vartotojo_uzsakymas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zanras`
--
ALTER TABLE `zanras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `autoriai`
--
ALTER TABLE `autoriai`
  ADD CONSTRAINT `parase` FOREIGN KEY (`fk_Knyga`) REFERENCES `knyga` (`id`);

--
-- Apribojimai lentelei `issaugotos_knygos`
--
ALTER TABLE `issaugotos_knygos`
  ADD CONSTRAINT `issaugo_knyga` FOREIGN KEY (`fk_Vartotojas`) REFERENCES `vartotojas` (`id`),
  ADD CONSTRAINT `itraukia_knyga` FOREIGN KEY (`fk_Knyga`) REFERENCES `knyga` (`id`);

--
-- Apribojimai lentelei `kaina`
--
ALTER TABLE `kaina`
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_Knyga`) REFERENCES `knyga` (`id`);

--
-- Apribojimai lentelei `knygu_sandelyje`
--
ALTER TABLE `knygu_sandelyje`
  ADD CONSTRAINT `turi1` FOREIGN KEY (`fk_Sandelis`) REFERENCES `sandelis` (`id`),
  ADD CONSTRAINT `yra` FOREIGN KEY (`fk_Knyga`) REFERENCES `knyga` (`id`);

--
-- Apribojimai lentelei `knygu_sarasas`
--
ALTER TABLE `knygu_sarasas`
  ADD CONSTRAINT `sudaro` FOREIGN KEY (`fk_Sandelis`) REFERENCES `sandelis` (`id`),
  ADD CONSTRAINT `uzsako_is` FOREIGN KEY (`fk_Leidykla`) REFERENCES `leidykla` (`id`);

--
-- Apribojimai lentelei `kuponas`
--
ALTER TABLE `kuponas`
  ADD CONSTRAINT `perka` FOREIGN KEY (`fk_Vartotojas`) REFERENCES `vartotojas` (`id`);

--
-- Apribojimai lentelei `logas`
--
ALTER TABLE `logas`
  ADD CONSTRAINT `padaro` FOREIGN KEY (`fk_Vartotojas`) REFERENCES `vartotojas` (`id`);

--
-- Apribojimai lentelei `prekiu_sarasas`
--
ALTER TABLE `prekiu_sarasas`
  ADD CONSTRAINT `pateikia` FOREIGN KEY (`fk_Vartotojas`) REFERENCES `vartotojas` (`id`);

--
-- Apribojimai lentelei `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD CONSTRAINT `itrauktas_i` FOREIGN KEY (`fk_Knygu_sarasas`) REFERENCES `knygu_sarasas` (`id`),
  ADD CONSTRAINT `uzsako` FOREIGN KEY (`fk_Knyga`) REFERENCES `knyga` (`id`);

--
-- Apribojimai lentelei `vartotojo_uzsakymas`
--
ALTER TABLE `vartotojo_uzsakymas`
  ADD CONSTRAINT `itrauktas_i_uzsakyma` FOREIGN KEY (`fk_Prekiu_sarasas`) REFERENCES `prekiu_sarasas` (`id`),
  ADD CONSTRAINT `uzsako_preke` FOREIGN KEY (`fk_Knyga`) REFERENCES `knyga` (`id`);

--
-- Apribojimai lentelei `zanrai`
--
ALTER TABLE `zanrai`
  ADD CONSTRAINT `priklauso` FOREIGN KEY (`fk_Knyga`) REFERENCES `knyga` (`id`),
  ADD CONSTRAINT `priklauso1` FOREIGN KEY (`fk_zanras`) REFERENCES `zanras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
