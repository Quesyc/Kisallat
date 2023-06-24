-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Jún 24. 16:08
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `feladat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `ID` int(10) NOT NULL,
  `Nev` varchar(30) NOT NULL,
  `jelszo` varchar(100) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`ID`, `Nev`, `jelszo`, `datum`) VALUES
(1, 'quesyc', '12345', '2023-05-21 13:46:52');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kisallatok`
--

CREATE TABLE `kisallatok` (
  `ID` int(11) NOT NULL,
  `Nev` varchar(30) NOT NULL,
  `Faj` varchar(30) NOT NULL,
  `Kor` int(11) NOT NULL,
  `Szine` varchar(10) NOT NULL,
  `Neme` tinyint(1) NOT NULL,
  `Sulya` int(11) NOT NULL,
  `Engedely` bit(3) NOT NULL,
  `Elohely` varchar(30) NOT NULL,
  `Ara` int(11) NOT NULL,
  `Elerheto` tinyint(4) NOT NULL,
  `Labak` int(11) NOT NULL,
  `Datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kisallatok`
--

INSERT INTO `kisallatok` (`ID`, `Nev`, `Faj`, `Kor`, `Szine`, `Neme`, `Sulya`, `Engedely`, `Elohely`, `Ara`, `Elerheto`, `Labak`, `Datum`) VALUES
(1, 'Gizi', 'Hörcsög', 31, 'fehér', 0, 341, b'001', 'Szárazföld', 40000, 0, 4, '2023-05-21 15:55:23'),
(3, 'Janka', 'Kígyó', 2, 'Sárga', 1, 1, b'000', 'Szárazföld', 23810, 0, 0, '2023-05-21 16:02:09'),
(4, 'Sanyi', 'Hörcsög', 2, 'szürke', 0, 2, b'000', 'Szárazföld', 20000, 0, 2, '2023-05-22 21:48:58');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `kisallatok`
--
ALTER TABLE `kisallatok`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `kisallatok`
--
ALTER TABLE `kisallatok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
