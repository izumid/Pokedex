-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 09:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `association`
--
CREATE DATABASE IF NOT EXISTS `association` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `association`;

-- --------------------------------------------------------

--
-- Table structure for table `pokemonability`
--

CREATE TABLE `pokemonability` (
  `IdPokemon` int(11) NOT NULL,
  `IdAbility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemonability`
--

INSERT INTO `pokemonability` (`IdPokemon`, `IdAbility`) VALUES
(1, 1),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pokemonattack`
--

CREATE TABLE `pokemonattack` (
  `IdPokemon` int(11) NOT NULL,
  `IdAttack` int(11) NOT NULL,
  `PokemonAttackLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemonattack`
--

INSERT INTO `pokemonattack` (`IdPokemon`, `IdAttack`, `PokemonAttackLevel`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 3),
(1, 4, 6),
(1, 5, 9),
(1, 6, 12),
(1, 7, 15),
(1, 8, 15),
(1, 9, 18),
(1, 10, 21),
(1, 11, 24),
(1, 12, 27),
(1, 13, 30),
(1, 14, 33),
(1, 15, 36),
(13, 1, 1),
(13, 2, 1),
(13, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pokemonevolution`
--

CREATE TABLE `pokemonevolution` (
  `IdPokemon` int(11) NOT NULL,
  `IdEvolution` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemonevolution`
--

INSERT INTO `pokemonevolution` (`IdPokemon`, `IdEvolution`) VALUES
(1, 1),
(13, 1),
(14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pokemonevolutiontrail`
--

CREATE TABLE `pokemonevolutiontrail` (
  `IdPokemon` int(11) NOT NULL,
  `IdPokemonEvolution1` int(11) NOT NULL,
  `PositionEvo1` int(11) NOT NULL,
  `IdPokemonEvolution2` int(11) NOT NULL,
  `PositionEvo2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemonevolutiontrail`
--

INSERT INTO `pokemonevolutiontrail` (`IdPokemon`, `IdPokemonEvolution1`, `PositionEvo1`, `IdPokemonEvolution2`, `PositionEvo2`) VALUES
(1, 2, 2, 3, 3),
(13, 14, 2, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pokemonimages`
--

CREATE TABLE `pokemonimages` (
  `IdPokemon` int(11) NOT NULL,
  `ImagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemonimages`
--

INSERT INTO `pokemonimages` (`IdPokemon`, `ImagePath`) VALUES
(1, 'cf36323546a6f56d321fd81f5ba3b08b.png'),
(2, '1e3670a55d2ba6e3faf7e44b3b91989b.png'),
(3, '4eaf1eabea2bd05a0d146b680354eea9.png'),
(13, 'cef87933c98a4fedb1af21f95b3cfcdc.png'),
(14, '6fbfbe7b13184b9fe57a73bc764d0f03.png'),
(15, '8a61bc302501b9b3f8a54e0ae6b7d188.png'),
(66, 'c58bddea6918ecc2421ce4344f4cacca.png'),
(67, '93b509da6f04a27f6091ed3cf9c3ad59.png'),
(68, 'fa3c80881e5d8f71f9b7d1fd73ba5afe.png'),
(88, 'a83b1f1628f63d05b4901483e2cbac06.png'),
(89, '48bd2b2ce028904dc33391c55ce71619.png'),
(92, 'f2e6a5796f4810fc96dc4eb7db3472b8.png'),
(93, '0d56a7d5e214e47d8675bea791b6f095.png'),
(94, '65dde1fe9da2e568b96d8413a80f3446.png'),
(155, '669ca1cf01234d337b9cd9f84f587df4.png'),
(156, '8932d388cd844c7540235cb6edf6c7e3.png'),
(157, '4831b1b6d15f270aa1e34fc0e1eaa75b.png'),
(163, '494241f7daea9ea4078540b899f85217.png'),
(164, 'ba80ef802c3b43d2dba1487ca57681d3.png');

-- --------------------------------------------------------

--
-- Table structure for table `pokemontype`
--

CREATE TABLE `pokemontype` (
  `IdPokemon` int(11) NOT NULL,
  `IdType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemontype`
--

INSERT INTO `pokemontype` (`IdPokemon`, `IdType`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(13, 2),
(13, 3),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(66, 4),
(67, 4),
(68, 4),
(88, 2),
(88, 5),
(89, 2),
(89, 5),
(92, 2),
(92, 6),
(93, 2),
(93, 6),
(94, 2),
(94, 6),
(155, 9),
(156, 9),
(157, 9),
(163, 7),
(163, 8),
(164, 7),
(164, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemonability`
--
ALTER TABLE `pokemonability`
  ADD PRIMARY KEY (`IdPokemon`,`IdAbility`),
  ADD KEY `FK_Ability` (`IdAbility`);

--
-- Indexes for table `pokemonattack`
--
ALTER TABLE `pokemonattack`
  ADD KEY `FK_PokemonAttack` (`IdPokemon`),
  ADD KEY `FK_AttackPokemon` (`IdAttack`);

--
-- Indexes for table `pokemonevolution`
--
ALTER TABLE `pokemonevolution`
  ADD PRIMARY KEY (`IdPokemon`,`IdEvolution`),
  ADD KEY `FK_Evolution` (`IdEvolution`);

--
-- Indexes for table `pokemonevolutiontrail`
--
ALTER TABLE `pokemonevolutiontrail`
  ADD PRIMARY KEY (`IdPokemon`,`IdPokemonEvolution1`,`IdPokemonEvolution2`),
  ADD KEY `FK_PokemonEvolutionTrail1` (`IdPokemonEvolution1`),
  ADD KEY `FK_PokemonEvolutionTrail2` (`IdPokemonEvolution2`);

--
-- Indexes for table `pokemonimages`
--
ALTER TABLE `pokemonimages`
  ADD KEY `FK_PokemonImages` (`IdPokemon`);

--
-- Indexes for table `pokemontype`
--
ALTER TABLE `pokemontype`
  ADD PRIMARY KEY (`IdPokemon`,`IdType`),
  ADD KEY `FK_Type` (`IdType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemonattack`
--
ALTER TABLE `pokemonattack`
  MODIFY `IdPokemon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pokemonability`
--
ALTER TABLE `pokemonability`
  ADD CONSTRAINT `FK_Ability` FOREIGN KEY (`IdAbility`) REFERENCES `history`.`ability` (`IdAbility`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PokemonAbility` FOREIGN KEY (`IdPokemon`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pokemonattack`
--
ALTER TABLE `pokemonattack`
  ADD CONSTRAINT `FK_AttackPokemon` FOREIGN KEY (`IdAttack`) REFERENCES `history`.`attack` (`IdAttack`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PokemonAttack` FOREIGN KEY (`IdPokemon`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pokemonevolution`
--
ALTER TABLE `pokemonevolution`
  ADD CONSTRAINT `FK_Evolution` FOREIGN KEY (`IdEvolution`) REFERENCES `history`.`evolution` (`IdEvolution`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PokemonEvolution` FOREIGN KEY (`IdPokemon`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pokemonevolutiontrail`
--
ALTER TABLE `pokemonevolutiontrail`
  ADD CONSTRAINT `FK_PokemonEvolutionTrail` FOREIGN KEY (`IdPokemon`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PokemonEvolutionTrail1` FOREIGN KEY (`IdPokemonEvolution1`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PokemonEvolutionTrail2` FOREIGN KEY (`IdPokemonEvolution2`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pokemonimages`
--
ALTER TABLE `pokemonimages`
  ADD CONSTRAINT `FK_PokemonImages` FOREIGN KEY (`IdPokemon`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pokemontype`
--
ALTER TABLE `pokemontype`
  ADD CONSTRAINT `FK_PokemonType` FOREIGN KEY (`IdPokemon`) REFERENCES `history`.`pokemon` (`IdPokemon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Type` FOREIGN KEY (`IdType`) REFERENCES `history`.`type` (`IdType`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `dimension`
--
CREATE DATABASE IF NOT EXISTS `dimension` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dimension`;

-- --------------------------------------------------------

--
-- Table structure for table `typerelationship`
--

CREATE TABLE `typerelationship` (
  `IdTypeRelationship` int(11) NOT NULL,
  `IdType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `typerelationship`
--
ALTER TABLE `typerelationship`
  ADD PRIMARY KEY (`IdTypeRelationship`),
  ADD KEY `FK_IdType` (`IdType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `typerelationship`
--
ALTER TABLE `typerelationship`
  MODIFY `IdTypeRelationship` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `typerelationship`
--
ALTER TABLE `typerelationship`
  ADD CONSTRAINT `FK_IdType` FOREIGN KEY (`IdType`) REFERENCES `history`.`type` (`IdType`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `history`
--
CREATE DATABASE IF NOT EXISTS `history` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `history`;

-- --------------------------------------------------------

--
-- Table structure for table `ability`
--

CREATE TABLE `ability` (
  `IdAbility` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ability`
--

INSERT INTO `ability` (`IdAbility`, `Name`, `Description`) VALUES
(1, 'Nothing', 'It has no abilities.'),
(2, 'Run Away', 'Makes escaping easier.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `IdUser` int(11) NOT NULL,
  `User` varchar(150) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Date` datetime NOT NULL,
  `validCtrl` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attack`
--

CREATE TABLE `attack` (
  `IdAttack` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `IdType` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `PowerPoints` tinyint(4) NOT NULL,
  `Power` tinyint(4) NOT NULL,
  `Accuracy` tinyint(4) NOT NULL,
  `Description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attack`
--

INSERT INTO `attack` (`IdAttack`, `Name`, `IdType`, `Category`, `PowerPoints`, `Power`, `Accuracy`, `Description`) VALUES
(1, 'Tackle', 7, 'Physical', 40, 100, 35, 'A physical attack in which the user charges, full body, into the foe.'),
(2, 'Growl', 7, 'Status', 0, 100, 40, 'The user growls in a cute way, making the foe lower its Attack. stat.'),
(3, 'Vine Whip', 1, 'Physical', 45, 100, 25, 'The foe is struck with slender, whiplike vines.'),
(4, 'Growth', 7, 'Status', 0, 0, 20, 'The users body is forced to grow, raising the Sp. Atk stat.'),
(5, 'Leech Seed', 1, 'Status', 0, 90, 10, 'A seed is planted on the foe to steal some HP for the user on every turn'),
(6, 'Razor Leaf', 1, 'Physical', 55, 95, 25, 'The foe is hit with a cutting leaf. It has a high critical-hit ratio.'),
(7, 'Poison Powder', 2, 'Status', 0, 75, 35, 'A cloud of toxic dust is scattered. It may poison the foe.'),
(8, 'Sleep Powder', 1, 'Status', 0, 75, 15, 'A sleep-inducing dust is scattered in high volume around a foe.'),
(9, 'Seed Bomb', 1, 'Physical', 80, 100, 15, 'The user slams a barrage of hard-shelled seeds down on the foe from above.'),
(10, 'Take Down', 7, 'Physical', 90, 85, 20, 'A reckless, full-body charge attack that also hurts the user a little.'),
(11, 'Sweet Scent', 7, 'Status', 0, 100, 20, 'Allures the foe to reduce evasiveness. It also attracts wild Pokémon.'),
(12, 'Synthesis', 1, 'Status', 0, 0, 5, 'Restores the users HP. The amount of HP regained varies with the weather.'),
(13, 'Worry Seed', 1, 'Status', 0, 100, 10, 'A seed that causes worry is planted on the target. It prevents sleep by making the targets Ability Insomnia.'),
(14, 'Double-Edge', 7, 'Physical', 120, 100, 15, 'A reckless, life risking tackle that also hurts the user a little.'),
(15, 'Solar Beam', 1, 'Special', 120, 100, 10, 'A 2 turn move that blasts the foe with absorbed energy in the 2nd turn.'),
(16, 'Poison Sting', 2, 'Physical', 15, 100, 35, 'The foe is stabbed with a toxic barb, etc. It may poison the foe.'),
(17, 'String Shot', 2, 'Status', 0, 95, 40, 'The foe is bound with strings shot from the mouth to reduce its Speed.'),
(18, 'Bug Bite', 2, 'Physical', 60, 100, 20, 'The user bites the foe. If the foe is holding a Berry, the user eats it and gains its effect.');

-- --------------------------------------------------------

--
-- Table structure for table `evolution`
--

CREATE TABLE `evolution` (
  `IdEvolution` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evolution`
--

INSERT INTO `evolution` (`IdEvolution`, `Name`, `Description`) VALUES
(1, 'Level', 'Raising Levels');

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `IdPokemon` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Height` float NOT NULL,
  `Weight` float NOT NULL,
  `HealthPoints` smallint(6) NOT NULL,
  `Attack` smallint(6) NOT NULL,
  `Defense` smallint(6) NOT NULL,
  `SpecialAttack` smallint(6) NOT NULL,
  `SpecialDefense` smallint(6) NOT NULL,
  `Speed` smallint(6) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`IdPokemon`, `Name`, `Gender`, `Height`, `Weight`, `HealthPoints`, `Attack`, `Defense`, `SpecialAttack`, `SpecialDefense`, `Speed`, `Description`) VALUES
(1, 'Bulbasaur', 'B', 0.7, 6.9, 45, 49, 49, 65, 65, 45, 'A strange seed was planted on its back at birth. The plant sprouts and grows with this Pokémon.'),
(2, 'Ivysaur', 'B', 1, 13, 60, 62, 63, 80, 80, 60, 'When the bulb on its back grows large, it appears to lose the ability to stand on its hind legs.'),
(3, 'Venusaur', 'B', 2, 100, 80, 82, 83, 100, 100, 80, '	The plant blooms when it is absorbing solar energy. It stays on the move to seek sunlight.'),
(13, 'Weedle', 'B', 0.3, 3.2, 40, 35, 30, 20, 20, 50, 'Often found in forests, eating leaves. It has a sharp venomous stinger on its head.'),
(14, 'Kakuna', 'B', 0.6, 10, 45, 25, 50, 25, 25, 35, 'Almost incapable of moving, this Pokémon can only harden its shell to protect itself from predators.'),
(15, 'Beedrill', 'B', 1, 29.5, 65, 80, 40, 45, 80, 75, 'Flies at high speed and attacks using its large venomous stingers on its forelegs and tail.'),
(66, 'Machop', 'B', 0.8, 19.5, 70, 80, 50, 35, 35, 35, '	Loves to build its muscles. It trains in all styles of martial arts to become even stronger.'),
(67, 'Machoke', 'B', 1.5, 70.5, 100, 80, 70, 50, 60, 45, 'Its muscular body is so powerful, it must wear a power save belt to be able to regulate its motions.'),
(68, 'Machamp', 'B', 1.6, 130, 90, 130, 80, 65, 85, 55, 'Using its heavy muscles, it throws powerful punches that can send the victim clear over the horizon.'),
(88, 'Grimer', 'B', 0.9, 30, 80, 80, 50, 40, 50, 25, '	Appears in filthy areas. Thrives by sucking up polluted sludge that is pumped out of factories.'),
(89, 'Muk', 'B', 1.2, 30, 105, 105, 75, 65, 100, 50, 'Thickly covered with a filthy, vile sludge. It is so toxic, even its footprints contain poison'),
(92, 'Gastly', 'B', 1.3, 0.1, 30, 35, 30, 1000, 35, 80, 'Almost invisible, this gaseous Pokémon cloaks the target and puts it to sleep without notice.'),
(93, 'Haunter', 'B', 1.6, 0.1, 45, 50, 45, 115, 55, 95, 'Because of its ability to slip through block walls, it is said to be from another dimension.'),
(94, 'Gengar', 'B', 1.5, 40.5, 60, 65, 60, 130, 75, 110, 'Under a full moon, this Pokémon likes to mimic the shadows of people and laugh at their fright.'),
(155, 'Cyndaquil', 'B', 0.5, 7.9, 39, 52, 43, 60, 50, 65, 'It is timid, and always curls itself up in a ball. If attacked, it flares up its back for protection.'),
(156, 'Quilava', 'B', 0.9, 19, 58, 64, 58, 80, 65, 80, 'Be careful if it turns its back during battle. It means that it will attack with the fire on its back.'),
(157, 'Typhlosion', 'B', 1.7, 79.5, 78, 84, 78, 109, 85, 100, '	If its rage peaks, it becomes so hot that anything that touches it will instantly go up in flames.'),
(163, ' Hoothoot', 'B', 0.7, 21.2, 60, 30, 30, 36, 56, 50, 'It always stands on one foot. It changes feet so fast, the movement can rarely be seen.'),
(164, 'Noctowl', 'B', 1.6, 40.8, 100, 50, 50, 76, 96, 70, 'Its eyes are specially adapted. They concentrate even faint light and enable it to see in the dark.');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `IdType` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`IdType`, `Name`) VALUES
(1, 'Grass'),
(2, 'Poison'),
(3, 'Bug'),
(4, 'Fighting'),
(5, 'Dark'),
(6, 'Ghost'),
(7, 'Normal'),
(8, 'Flying'),
(9, 'Fire'),
(10, 'Physical'),
(11, 'Status'),
(12, 'Special');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ability`
--
ALTER TABLE `ability`
  ADD PRIMARY KEY (`IdAbility`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `UN_AdminUser` (`User`);

--
-- Indexes for table `attack`
--
ALTER TABLE `attack`
  ADD PRIMARY KEY (`IdAttack`),
  ADD KEY `FK_TypeAttack` (`IdType`);

--
-- Indexes for table `evolution`
--
ALTER TABLE `evolution`
  ADD PRIMARY KEY (`IdEvolution`);

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`IdPokemon`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`IdType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ability`
--
ALTER TABLE `ability`
  MODIFY `IdAbility` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attack`
--
ALTER TABLE `attack`
  MODIFY `IdAttack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `evolution`
--
ALTER TABLE `evolution`
  MODIFY `IdEvolution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `IdType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attack`
--
ALTER TABLE `attack`
  ADD CONSTRAINT `FK_TypeAttack` FOREIGN KEY (`IdType`) REFERENCES `type` (`IdType`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"history\",\"table\":\"type\"},{\"db\":\"history\",\"table\":\"pokemon\"},{\"db\":\"history\",\"table\":\"attack\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-04-04 13:58:07', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
