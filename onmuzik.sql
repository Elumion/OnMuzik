-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 18 2022 р., 15:54
-- Версія сервера: 10.3.29-MariaDB
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `onmuzik`
--

-- --------------------------------------------------------

--
-- Структура таблиці `band`
--

CREATE TABLE `band` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'name of the group/singer',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT 'Інформація про дану групу відсутня' COMMENT 'description of the group/singer',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT 'band_img.png' COMMENT 'path to the group image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `band`
--

INSERT INTO `band` (`id`, `name`, `description`, `image`) VALUES
(58, 'ТНМК', '«Танок на майдані Конґо» («ТНМК») — український \r\nгурт, що виконує музику в стилях репкор, хіп-хоп, \r\nрок та фанк. Перший прообраз гурту створили 14 \r\nчервня 1989 два друга та нинішні учасники ТНМК: \r\nФоззі та Котя. Як ТНМК гурт почав працювати з 1996 \r\nроку.\r\n\r\nСтаном на 7 липня 2015 року гурт випустив шість \r\nповноцінних альбомів та брав участь у записі \r\nлегендарних харківських збірок репу: ХарківРапаСіті \r\nта взяв участь майже у всіх найбільших музичних \r\nфестивалях на теренах України: Червона Рута, \r\nТаврійські Ігри, Захід Фест, In Da House та багато \r\nінших.', '58-61e4a46d010e8.jpg'),
(59, 'Скрябін', '«Скрябін» — український музичний гурт, що за час \r\nсвоєї творчої активності пройшов шлях від синті-\r\nпопу, постпанку і техно до поп-року та поп-музики. \r\nСклад гурту також неодноразово змінювався. Єдиним \r\nпостійним учасником колективу з часу його заснування \r\nі до своєї смерті був Андрій «Кузьма» Кузьменко. Як \r\nправило, музику гурту поділяють на «старий» \r\n(приблизно до 2003 року) та «новий» (до 2015) \r\nперіоди[1].\r\n\r\n«Скрябін» є першим україномовним гуртом у жанрі \r\nсинті-попу та альтернативної електроніки. За час \r\nтворчої діяльності гурт видав сімнадцять студійних \r\nальбомів, два збірники, дев\'ять макси-синглів, один \r\nконцертний альбом та багато інших музичних проєктів.', '59-61e4a4f32f7b9.jpg'),
(60, 'Скай', '«СКАЙ» (англ. SKAI) — український рок-гурт, що виконує \r\nмузику в стилі альтернативний рок, поп-рок та нової хвилі \r\nпост-панку. Заснований у 2001 році в Тернополі[2].', '60-61e4a57ed69a3.jpg'),
(61, 'Один в каное', 'Тарас Тополя, народився  21.06.1987 у Київі на \r\nПодолі в родині вчителя і міліціонера. У 6 років \r\nпішов до музичної школи на клас скрипки та займався \r\nаж до вступу до університету. Навчався у 48-й \r\nгімназії міста Києва, в цей період грав в струнному \r\nансамблі, співав у хорі при чоловічій хоровій капелі \r\nім. Ревуцького. Хор порівнювали з Віденським хором \r\nхлопчиків. Одного разу у складі хору співав Іоану \r\nПавлу Другому у Ватикані.\r\n\r\n      У старших класах зібрав першу музичну групу. \r\nСпочатку репетиції проводили у підвалі школи, \r\nпізніше орендували репетиційну базу. Згодом музичний \r\nколектив став його основним заняттям. Оволодів грою \r\nна гітарі. Закінчив університет внутрішніх справ за \r\nспеціальністю правознавство. Як і більшість \r\nмайбутніх учасників гурту мріє про велику сцену і \r\nнавіть не підозрює, що у недалекому 2007-му \r\nзберуться в міцну рок-банду з неймовірно цікавим \r\nжиттям! ', '61-61e4aa5fc1075.jpg'),
(62, 'Антитіла', 'Тарас Тополя, народився  21.06.1987 у Київі на \r\nПодолі в родині вчителя і міліціонера. У 6 років \r\nпішов до музичної школи на клас скрипки та займався \r\nаж до вступу до університету. Навчався у 48-й \r\nгімназії міста Києва, в цей період грав в струнному \r\nансамблі, співав у хорі при чоловічій хоровій капелі \r\nім. Ревуцького. Хор порівнювали з Віденським хором \r\nхлопчиків. Одного разу у складі хору співав Іоану \r\nПавлу Другому у Ватикані.\r\n\r\n      У старших класах зібрав першу музичну групу. \r\nСпочатку репетиції проводили у підвалі школи, \r\nпізніше орендували репетиційну базу. Згодом музичний \r\nколектив став його основним заняттям. Оволодів грою \r\nна гітарі. Закінчив університет внутрішніх справ за \r\nспеціальністю правознавство. Як і більшість \r\nмайбутніх учасників гурту мріє про велику сцену і \r\nнавіть не підозрює, що у недалекому 2007-му \r\nзберуться в міцну рок-банду з неймовірно цікавим \r\nжиттям! ', '62-61e4a88b5e3bd.jpg'),
(64, 'The Unsleeping', 'Інформація про дану групу відсутня', 'band_img.png');

-- --------------------------------------------------------

--
-- Структура таблиці `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL COMMENT 'date of creating playlist',
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name of the playlist',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'path to the image of playlist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `playlist`
--

INSERT INTO `playlist` (`id`, `date`, `name`, `image`) VALUES
(1, '2022-01-06 22:10:45', 'Test playlist', 'image.png');

-- --------------------------------------------------------

--
-- Структура таблиці `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `playlist_id` int(11) NOT NULL COMMENT 'id of playlist',
  `song_id` int(11) NOT NULL COMMENT 'id of song',
  `user_id` int(11) NOT NULL COMMENT 'user that created this playlist',
  `date` datetime NOT NULL COMMENT 'date of adding this song to playlist'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'the name of the role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'editor');

-- --------------------------------------------------------

--
-- Структура таблиці `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `title` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'title of the song',
  `media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'path to the song file',
  `band_id` int(11) DEFAULT NULL COMMENT 'id of band',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_song.png' COMMENT 'path to the song image',
  `user_id` int(11) NOT NULL COMMENT 'user that added this song',
  `date` datetime NOT NULL COMMENT 'date when song was added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `song`
--

INSERT INTO `song` (`id`, `title`, `media`, `band_id`, `image`, `user_id`, `date`) VALUES
(57, 'Гранули', '57-61e48f661a589.mpeg', 58, '57-61e48f656f17f.jpg', 27, '2022-01-17 00:34:29'),
(58, 'Місця щасливих людей', '58-61e48ffff2b37.mpeg', 59, '58-61e48fffaf11b.jpg', 27, '2022-01-17 00:37:03'),
(59, 'Танець пінгвіна', '59-61e4944ba757b.mpeg', 59, 'default_song.png', 28, '2022-01-17 00:55:23'),
(60, 'Тебе це може вбити', '60-61e4965c0f4b3.mpeg', 60, '60-61e4965be96e0.jpg', 28, '2022-01-17 01:04:11'),
(61, 'Демони', '61-61e4a656a1858.mpeg', 61, '61-61e4a656733bf.jpg', 28, '2022-01-17 02:12:22'),
(62, 'Кіно', '62-61e4a6cb35281.mpeg', 62, '62-61e4a6cb26506.jpg', 28, '2022-01-17 02:14:18'),
(63, 'TDME', '63-61e4ab3084f5e.mpeg', 62, '63-61e4ab3066f26.jpg', 30, '2022-01-17 02:33:04'),
(64, 'Говорили і курили', '64-61e4ab821db5e.mpeg', 59, 'default_song.png', 30, '2022-01-17 02:34:25'),
(65, 'Будувуду', '65-61e4adeee7e60.mpeg', 62, '65-61e4adeecdf2e.jpg', 30, '2022-01-17 02:44:46'),
(66, 'Люди як кораблі', '66-61e55812764de.mpeg', 62, '66-61e5581222443.jpg', 27, '2022-01-17 14:50:42'),
(67, 'Люди як кораблі', '67-61e5c420ef6a6.mpeg', 59, '67-61e5c420857d2.jpg', 27, '2022-01-17 22:31:44'),
(68, 'Fire of red', '68-61e6959cea81e.mpeg', 64, '68-61e6959c946f3.jpg', 31, '2022-01-18 13:25:32');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'user login',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'user password',
  `role_id` int(30) NOT NULL DEFAULT 2 COMMENT 'user role',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'user email',
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT 'user_img.png' COMMENT 'path to user image',
  `playlist_id` int(11) DEFAULT NULL COMMENT 'playlist that created by this user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `role_id`, `email`, `image`, `playlist_id`) VALUES
(27, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'admin@g', 'user_img.png', NULL),
(28, 'editor', 'e10adc3949ba59abbe56e057f20f883e', 3, 'editor@g', 'user_img.png', NULL),
(30, 'user', 'e10adc3949ba59abbe56e057f20f883e', 2, 'user@g', 'user_img.png', NULL),
(31, 'Vlad', 'e10adc3949ba59abbe56e057f20f883e', 2, 'vlad87@gmail.com', 'user_img.png', NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `band`
--
ALTER TABLE `band`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблиці `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `playlist_songs_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`),
  ADD CONSTRAINT `playlist_songs_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`),
  ADD CONSTRAINT `playlist_songs_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
