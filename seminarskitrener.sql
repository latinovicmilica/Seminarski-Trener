-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 09:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarskitrener`
--
CREATE DATABASE IF NOT EXISTS `seminarskitrener` DEFAULT CHARACTER SET utf32 COLLATE utf32_croatian_ci;
USE `seminarskitrener`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `blogID` int(11) NOT NULL,
  `tipID` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `opis` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogID`, `tipID`, `naslov`, `opis`, `datum`) VALUES
(1, 2, '10 aktivnosti za koje nauka tvrdi da će vas učiniti srećnijim', '1.Mentalno izdvojite nešto dobro iz života\r\n2.Pošaljite poruku zahvalnosti\r\n3.Potrošite novac na nekog drugog\r\n4.Vežbajte\r\n5.Slušanje muzike\r\n6.Planiranje\r\n7.Navedite 3 dobre stvari koje su danas dogodile', '2021-01-22'),
(2, 3, 'Panični napad i simptomi- testirajte se i proverite Vaš rezultat', 'https://www.anxietycentre.com/anxiety-tests/panic-attack-test.shtml\r\nNa linku koji se nalazi u donjem redu možete preuzeti besplatan test sa 10 pitanja, koji će Vam pomoći da proverite koliki je Vaš nivo anksioznosti i mogućnost paničnog poremećaja.', '2021-01-15'),
(3, 2, 'Deset stvari koje kafa zaista radi vašem mozgu', '1-Kofein većinu ljudi ne sprečava da spavaju\r\n2-Ljudi krive kafu za sve i svašta\r\n3-Kofein i dremka?\r\n4-Pojačavanje održavanja pažnje\r\n5-Dve šolje dobro, pet šolja loše\r\n6-Bez simptoma povlačenja kada prestanete s uzimanjem?\r\n7-Dobro se osećate', '2021-01-01'),
(4, 4, 'Socijalna fobija- socijalna anksioznost i strah od odbacivanja', 'Socijalna fobija (socijalni anksiozni poremećaj) podrazumeva intenzivni strah od različitih društvenih situacija – posebno situacije koje nisu poznate ili u kojoj osećate da ćete biti posmatrani ili vrednovani od strane drugih. Ove društvene situacije ', '2021-01-16'),
(5, 1, 'Psihologija ljubavi koje traju čitav život', 'Nauka nam govori da romantična ljubav može da traje- i duže nego što joj često dajemo za pravo. Kao kultura, imamo tendenciju da budemo prilično cinični kada govorimo o mogućnostima romantične ljubavi', '2021-01-14'),
(6, 3, 'Test ličnosti – Big Five. O testu, njegovim dimenzijama i besplatno testiranje', 'NEUROTICIZAM(N)-razlikuje prilagođenost ili emocionalnu stabilnost od neprilagođenosti i neuroticizma.\r\nEKSTRAVERZIJA(E)-socijabilni\r\nOTVORENOST(O)-aktivna imaginacija\r\nSARADLJIVOST(A)-bazično altruistična\r\nSAVESNOST(C)-sposobnost kontrole impulsa', '2021-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE `korisnik` (
  `korisnikID` int(11) NOT NULL,
  `imePrezime` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `username` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `imePrezime`, `username`, `password`, `admin`) VALUES
(1, 'Sara Medic', 'medic', 'medic', 0),
(2, 'Milica Marinko', 'marinko', 'marinko', 0),
(3, 'Milica Latinovic', 'lata', 'lata', 1),
(4, 'Masa Aleksic', 'masa', 'masa', 1),
(5, 'Anja Atanasijevic', 'anja', 'anja', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

DROP TABLE IF EXISTS `tip`;
CREATE TABLE `tip` (
  `tipID` int(11) NOT NULL,
  `nazivTipa` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `slikica` varchar(255) COLLATE utf32_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`tipID`, `nazivTipa`, `slikica`) VALUES
(1, 'ljubav', 'heart'),
(2, 'top10', 'list-ol'),
(3, 'testovi', 'clipboard'),
(4, 'razno', 'users');

-- --------------------------------------------------------

--
-- Table structure for table `treneri`
--

DROP TABLE IF EXISTS `treneri`;
CREATE TABLE `treneri` (
  `trenerID` int(11) NOT NULL,
  `imePrezimeTrenera` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `grad` varchar(255) COLLATE utf32_croatian_ci NOT NULL,
  `slika` varchar(255) COLLATE utf32_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci;

--
-- Dumping data for table `treneri`
--

INSERT INTO `treneri` (`trenerID`, `imePrezimeTrenera`, `grad`, `slika`) VALUES
(1, 'Milica Latinovic', 'Beograd', 'milica.jpeg'),
(2, 'Masa Aleksic', 'Kragujevac', 'aleksic.jpeg\r\n'),
(3, 'Anja Atanasijevic', 'Novi Sad', 'anja.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`),
  ADD KEY `tipID_fk` (`tipID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`tipID`);

--
-- Indexes for table `treneri`
--
ALTER TABLE `treneri`
  ADD PRIMARY KEY (`trenerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `treneri`
--
ALTER TABLE `treneri`
  MODIFY `trenerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `tipID_fk` FOREIGN KEY (`tipID`) REFERENCES `tip` (`tipID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
