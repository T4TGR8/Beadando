-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Máj 12. 08:37
-- Kiszolgáló verziója: 8.0.18
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `t4tgr8beadando`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ctext` mediumtext NOT NULL,
  `author` varchar(64) NOT NULL,
  `comcreated` datetime NOT NULL,
  `threadid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `ctext`, `author`, `comcreated`, `threadid`) VALUES
(42, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 'kacsa', '2020-05-12 08:25:25', 6);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `threads`
--

DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `ftext` mediumtext NOT NULL,
  `author` mediumtext NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `threads`
--

INSERT INTO `threads` (`id`, `title`, `ftext`, `author`, `created`) VALUES
(6, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus molestie leo at tempor. Mauris nibh ex, venenatis eu semper sit amet, ultricies et enim. Suspendisse venenatis est at fringilla tempus. Morbi dictum sem id molestie cursus. Nulla imperdiet sagittis leo ac interdum. Donec consequat tellus erat, eu ultricies risus accumsan a. Phasellus sagittis semper mi, ac ullamcorper nisl convallis ac. Donec quis dui quis nulla dictum scelerisque. Integer eleifend mauris augue, vitae vehicula lectus accumsan suscipit. Maecenas aliquet ligula urna, nec blandit elit sodales ac. Mauris aliquam maximus nisl, accumsan condimentum orci convallis ac.\r\n\r\nCras vehicula quam finibus libero vehicula tempor. Nunc molestie justo commodo pretium faucibus. Duis urna lacus, auctor in posuere ut, rhoncus ac risus. Vivamus et nisi enim. Nunc ac lobortis arcu. Nulla orci urna, luctus vel eleifend ut, bibendum id enim. Vivamus rhoncus, odio ac eleifend finibus, diam libero iaculis diam, vel blandit eros erat quis nunc. Suspendisse luctus venenatis rutrum. Sed lorem erat, varius vitae ipsum non, eleifend laoreet metus. Vivamus convallis nisi nec posuere faucibus. Ut quis commodo ex. Nullam pulvinar nunc vel ipsum elementum malesuada. Duis id metus pharetra, vehicula leo in, venenatis velit.\r\n\r\nFusce vitae dolor eu quam luctus consectetur. Vivamus fermentum dolor neque, eu porta ligula consequat nec. Suspendisse molestie, mi ac dictum finibus, tortor sem commodo est, non hendrerit sapien nulla nec justo. Ut ut erat a sapien laoreet egestas. Nullam sit amet nisi tempor est dignissim maximus eget vitae erat. Maecenas ut est diam. Aenean pellentesque nulla quis leo rutrum facilisis. Morbi id tincidunt nibh. Suspendisse ipsum risus, lacinia in libero nec, accumsan venenatis lorem. Aenean pretium, leo nec dapibus condimentum, arcu velit tempus magna, sed luctus ex tellus vel lacus. Sed nunc nulla, lobortis nec pretium et, tristique sed dui. Donec id rutrum nisi. Quisque condimentum sapien id velit rutrum imperdiet sed eget enim. Morbi id est facilisis, consequat libero scelerisque, congue dui.\r\n\r\nAenean elit nisl, molestie in dui eu, varius ultricies nisi. Pellentesque aliquet justo in mi auctor, sit amet bibendum mi cursus. Maecenas eu nisi turpis. Etiam elit tellus, vestibulum at massa in, sodales auctor ante. Etiam id neque quis sapien egestas rutrum a id enim. Etiam porttitor, lacus nec dictum vestibulum, metus mi sodales lectus, quis tempor eros neque ac mi. Phasellus arcu metus, pellentesque sed arcu id, iaculis cursus leo. Morbi viverra luctus mauris et imperdiet. Sed vel pharetra odio.\r\n\r\nVivamus malesuada ultrices lorem, id ultrices ipsum aliquet ac. Integer arcu tortor, finibus vitae ornare sit amet, convallis vulputate felis. Suspendisse in diam tempus, sagittis risus rutrum, sodales justo. Donec ullamcorper odio a auctor fringilla. Cras non diam non mi fermentum dictum eu dictum nisi. Aliquam ornare nunc et accumsan facilisis. Donec ac ante sit amet justo aliquam tristique. Ut et nisi neque. Curabitur varius eget arcu nec egestas.', 'BarnaBence', '2020-05-12 08:23:15'),
(7, 'Kira Yoshikage', 'My name is Yoshikage Kira. I\'m 33 years old. My house is in the northeast section of Morioh, where all the villas are, and I am not married. I work as an employee for the Kame Yu department stores, and I get home every day by 8 PM at the latest. I don\'t smoke, but I occasionally drink.\r\n\r\nI\'m in bed by 11 PM, and make sure I get eight hours of sleep, no matter what. After having a glass of warm milk and doing about twenty minutes of stretches before going to bed, I usually have no problems sleeping until morning. Just like a baby, I wake up without any fatigue or stress in the morning. I was told there were no issues at my last check-up.\r\n\r\nI\'m trying to explain that I\'m a person who wishes to live a very quiet life. I take care not to trouble myself with any enemies, like winning and losing, that would cause me to lose sleep at night. That is how I deal with society, and I know that is what brings me happiness. Although, if I were to fight I wouldn\'t lose to anyone.', 'kacsa', '2020-05-12 08:24:35');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `permission` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `permission`) VALUES
(10, 'BarnaBence', 'barnabence8@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(11, 'kacsa', 'asd@dsa.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0),
(24, 'test', 'valtozz@at.hu', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 0),
(25, 'halacska', 'nds@das.dsa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0),
(26, 'Admin', 'admin@admin.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
