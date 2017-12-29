-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Gru 2017, 23:12
-- Wersja serwera: 10.1.24-MariaDB
-- Wersja PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gainland`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_bag_character`
--

CREATE TABLE `gl_bag_character` (
  `id_bag` int(11) NOT NULL,
  `id_character` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_bag_object`
--

CREATE TABLE `gl_bag_object` (
  `id_bag` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_character`
--

CREATE TABLE `gl_character` (
  `id_character` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `id_religion` int(11) NOT NULL,
  `money` decimal(10,0) NOT NULL,
  `mobility` int(11) NOT NULL DEFAULT '5',
  `premium_points` int(11) NOT NULL DEFAULT '0',
  `increasing_energy` int(11) NOT NULL DEFAULT '5',
  `energy` int(11) NOT NULL DEFAULT '5000',
  `hp` int(11) NOT NULL DEFAULT '100',
  `experience` int(11) NOT NULL DEFAULT '0',
  `attack_own` int(11) NOT NULL,
  `attack_armament` int(11) NOT NULL DEFAULT '0',
  `defense_own` int(11) NOT NULL,
  `defense_armament` int(11) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL,
  `battle_win` int(11) NOT NULL DEFAULT '0',
  `battle_lost` int(11) NOT NULL DEFAULT '0',
  `battle_unresolved` int(11) NOT NULL DEFAULT '0',
  `killed_boss` int(11) NOT NULL DEFAULT '0',
  `killed_monster` int(11) NOT NULL DEFAULT '0',
  `date_add` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Struktura tabeli dla tabeli `gl_character_level`
--

CREATE TABLE `gl_character_level` (
  `id_character` int(11) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_level`
--

CREATE TABLE `gl_level` (
  `id_level` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `experience_required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gl_level`
--

INSERT INTO `gl_level` (`id_level`, `number`, `name`, `experience_required`) VALUES
(1, 1, 'giemek', 0),
(2, 2, 'orchmistrz', 500);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_month`
--

CREATE TABLE `gl_month` (
  `id_month` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gl_month`
--

INSERT INTO `gl_month` (`id_month`, `name`) VALUES
(1, 'Gallus'),
(2, 'Anguis'),
(3, 'Canem'),
(4, 'Bubalus');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_object`
--

CREATE TABLE `gl_object` (
  `id_object` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_rank`
--

CREATE TABLE `gl_rank` (
  `id_rank` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gl_rank`
--

INSERT INTO `gl_rank` (`id_rank`, `name`) VALUES
(1, 'Gracz'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_religions`
--

CREATE TABLE `gl_religions` (
  `id_religion` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gl_religions`
--

INSERT INTO `gl_religions` (`id_religion`, `name`) VALUES
(1, 'katolicyzm'),
(2, 'prawosławie'),
(3, 'buddyzm'),
(4, 'islam'),
(5, 'hinduizm'),
(6, 'judaizm'),
(7, 'taoizm');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_sessions`
--

CREATE TABLE `gl_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `gl_settings` (
  `id_settings` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `gl_settings`
--

INSERT INTO `gl_settings` (`id_settings`, `name`, `value`) VALUES
(1, 'month', 0),
(2, 'tour', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gl_user`
--

CREATE TABLE `gl_user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `recommended` varchar(20) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `online` tinyint(4) NOT NULL DEFAULT '0',
  `date_add` datetime DEFAULT NULL,
  `date_last_login` datetime DEFAULT NULL,
  `date_block` datetime DEFAULT NULL,
  `date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='email';

--
-- Zrzut danych tabeli `gl_user`
--


--
-- Struktura tabeli dla tabeli `gl_user_rank`
--

CREATE TABLE `gl_user_rank` (
  `id_user_rank` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `gl_bag_object`
--
ALTER TABLE `gl_bag_object`
  ADD PRIMARY KEY (`id_bag`);

--
-- Indexes for table `gl_character`
--
ALTER TABLE `gl_character`
  ADD PRIMARY KEY (`id_character`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_religion` (`id_religion`);

--
-- Indexes for table `gl_level`
--
ALTER TABLE `gl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `gl_month`
--
ALTER TABLE `gl_month`
  ADD PRIMARY KEY (`id_month`);

--
-- Indexes for table `gl_rank`
--
ALTER TABLE `gl_rank`
  ADD PRIMARY KEY (`id_rank`);

--
-- Indexes for table `gl_religions`
--
ALTER TABLE `gl_religions`
  ADD PRIMARY KEY (`id_religion`);

--
-- Indexes for table `gl_sessions`
--
ALTER TABLE `gl_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `gl_settings`
--
ALTER TABLE `gl_settings`
  ADD PRIMARY KEY (`id_settings`);

--
-- Indexes for table `gl_user`
--
ALTER TABLE `gl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `gl_user_rank`
--
ALTER TABLE `gl_user_rank`
  ADD PRIMARY KEY (`id_user_rank`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_account` (`id_rank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `gl_bag_object`
--
ALTER TABLE `gl_bag_object`
  MODIFY `id_bag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `gl_character`
--
ALTER TABLE `gl_character`
  MODIFY `id_character` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT dla tabeli `gl_level`
--
ALTER TABLE `gl_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `gl_month`
--
ALTER TABLE `gl_month`
  MODIFY `id_month` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `gl_rank`
--
ALTER TABLE `gl_rank`
  MODIFY `id_rank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `gl_religions`
--
ALTER TABLE `gl_religions`
  MODIFY `id_religion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT dla tabeli `gl_settings`
--
ALTER TABLE `gl_settings`
  MODIFY `id_settings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `gl_user`
--
ALTER TABLE `gl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `gl_user_rank`
--
ALTER TABLE `gl_user_rank`
  MODIFY `id_user_rank` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `gl_character`
--
ALTER TABLE `gl_character`
  ADD CONSTRAINT `gl_character_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `gl_user` (`id_user`),
  ADD CONSTRAINT `gl_character_ibfk_2` FOREIGN KEY (`id_religion`) REFERENCES `gl_religions` (`id_religion`);

--
-- Ograniczenia dla tabeli `gl_user_rank`
--
ALTER TABLE `gl_user_rank`
  ADD CONSTRAINT `gl_user_rank_ibfk_1` FOREIGN KEY (`id_rank`) REFERENCES `gl_rank` (`id_rank`),
  ADD CONSTRAINT `gl_user_rank_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `gl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
