-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Трв 17 2017 р., 13:23
-- Версія сервера: 10.1.21-MariaDB
-- Версія PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `blogtest`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Minolta'),
(2, 'Canon'),
(3, 'Zeiss');

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `pid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `message`, `pid`) VALUES
(18, '2', '2017-05-17 10:46:27', 'I had a copy of this once..quite soft at f2 and pretty useless at that aperture in most cases', 1),
(29, '1', '2017-05-17 12:03:32', 'nice lens of course, but im not sure if there is any point of buying old glass when its price is like of a new zeiss :(', 7),
(30, '7', '2017-05-17 12:24:15', 'icant fidn this anywhere on the market', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `body`, `author`, `tags`, `date`) VALUES
(1, 1, 'Minolta MD 50mm 1:2', '                <p>The Minolta MD 50mm 1:2 is one of the smallest and cheapest Minolta lenses and most importantly it is also an excellent lens for landscape photography.</p>\r\n              <p>Minolta made three different 2/50ï¿½s:</p>\r\n              <ul>\r\n                <li>The Minolta MC Rokkor 50mm 1:2 was introduced in 1973</li>\r\n                <li>The Minolta MD Rokkor 50mm 1:2  was introduced in 1977. As itï¿½s predecessor it has a 55mm filter thready and weights 230g.</li>\r\n                <li>The Minolta MD 50mm 1:2 was introduced in 1981, it has a 49mm filter thread and only weights 150g.</li>\r\n              </ul>        ', 'Maksym Shulha', 'minolta, lens', '2017-05-09 07:09:03'),
(2, 2, 'Canon FD 24mm 1:2.8', '<p>There are many manual lenses above 28mm which work quite well on modern cameras like the Alpha 7 but not that many wide angle lenses perform good enough on modern cameras.\r\n            </p>\r\n            <p>The Canon nFD 2.8/24 is one of the sharpest, affordable wide angle lenses and I think it can be a good solution for budget-oriented Sony Alpha 7 users.\r\n            </p>\r\n            <p> Build quality is good by today’s standards but if you compare it to other manual lenses the lens feels a bit cheap.\r\n</p>\r\n<p>\r\nThe lens is mostly metal but some parts like the aperture ring at the front plate are made from plastics. All the markings are engraved.\r\n</p>\r\n', 'Maksym Shulha', 'canon, lens', '2017-05-09 07:19:02'),
(3, 2, 'Canon FD 2.8/135', '<p>The Canon FD 2.8/135 is a lightweight and affordable lens. On my Sony  a7 it performs very well as a portrait and landscape lens.\r\n</p>\r\n<p>Canon only made one 2.8/135 lens with FD mount. It is part of the “new FD” generation so it is easier to mount than older FD lenses. You will find people referring to it as nFD or FDn.\r\n</p>\r\n<p>Canon also made 2/135, 2.5/135 and 3.5/135 lenses but  these will have different qualities than the FD 2.8/135 in this review.\r\n</p>', 'Maksym Shulha', 'canon, lens', '2017-05-09 07:23:39'),
(5, 2, 'CANON NEW FD 50 MM 1:1.4 ', 'As far as I know Canon made two mechanically and optically different 1.4/50 FD lenses. There was also an even older FL 1.4/50.\r\n\r\nThe older FD version has the classic silver breech lock mounting system and weights 370g and it is larger. Size and weight are the result of a very solid construction.\r\nThe newer  new FD version (nFD in short) is much lighter at 235g  and  has the new FD mounting system. Built quality is okay but more plasticky. I own this version and this review is about it.\r\nI never used the older FD version so I canâ€™t tell you how they compare optically. Comments on the comparison are welcome!', 'Maksym Shulha', 'canon, lens', '2017-05-09 14:36:47'),
(7, 3, 'ZEISS LOXIA PLANAR 2/50 T*', 'The Zeiss Loxia Planar 2/50 offers all the benefits of manual lens: a great focusing ring, very solid build quality and a small size but it gets rid of most disadvantages like outdated coatings, adapters and you get full exif info.Build Quality\r\nAs good as it gets. The lens feels very solid and it is a joy to handle.\r\nMost anything is made from metal and tightly assembled. This includes the inner barrel. So unlike Sonyâ€™s FE lenses this lens is metal on the inside as well.\r\nUnlike all Sony FE lenses the lens does have a rubber gasket around the mount. Zeiss doesnâ€™t claim any weather resistance but I would feel more confident about this lens than about any Sony FE lens in bad weather conditions.\r\nAll markings are engraved and filled with paint.', 'Maksym Shulha', 'zeiss, lens', '2017-05-15 14:55:10');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first` varchar(128) NOT NULL,
  `last` varchar(128) NOT NULL,
  `pwd` varchar(1000) NOT NULL,
  `uid` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `first`, `last`, `pwd`, `uid`) VALUES
(1, 'Maksym', 'Shulha', '123', 'Stockticker'),
(2, 'Roma', 'Mazyrok', '123', 'dreik'),
(7, 'Vasya', 'Pupkin', '123', 'rocket_1');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Індекси таблиці `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
