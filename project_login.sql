-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Jún 16. 13:20
-- Kiszolgáló verziója: 10.1.38-MariaDB
-- PHP verzió: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `project_login`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `project_login_users`
--

CREATE TABLE `project_login_users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` text NOT NULL,
  `nice_user_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `project_login_users_log`
--

CREATE TABLE `project_login_users_log` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `type` enum('login','register','logout','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `project_login_users`
--
ALTER TABLE `project_login_users`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `project_login_users_log`
--
ALTER TABLE `project_login_users_log`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `project_login_users`
--
ALTER TABLE `project_login_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `project_login_users_log`
--
ALTER TABLE `project_login_users_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
