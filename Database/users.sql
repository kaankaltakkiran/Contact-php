-- Adminer 4.8.1 MySQL 5.5.5-10.4.27-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

INSERT INTO `users` (`userid`, `username`, `phonenumber`, `userimg`) VALUES
(1,	'Kaan Kaltakkıran',	'05076600884',	'IMG-6550defbc50575.89537023.jpg'),
(2,	'Ahmet Yılmaz',	'05075542251',	'IMG-6550df0e703858.62173091.jpg'),
(3,	'Selin Günyüz',	'05054235128',	'IMG-6550df206dbff5.05319589.jpg'),
(4,	'Veli Baba',	'05075366147',	'IMG-6550df3b936c03.16476117.jpg'),
(5,	'Veli Okumuş',	'05064357551',	'IMG-6550df5db4f6e0.87741771.jpg'),
(6,	'Furkan Akbaş',	'05053543243',	'IMG-6550df7230c579.91114273.jpg'),
(7,	'Kerem Gün',	'05064124201',	'IMG-6550df9de53f82.47636557.png'),
(8,	'Fatma Bak',	'05075329561',	'IMG-6550dfd39d1181.62107239.jpg'),
(9,	'Yusuf Soy',	'05062924530',	'IMG-6550e006b1f1f8.94012059.jpg'),
(10,	'Serap Yıldırım',	'0505791486',	'IMG-6550e01eb57500.96230924.jpg'),
(11,	'Veli Baba',	'05076654124',	'IMG-6550e039eab267.73735813.jpg'),
(12,	'Kaan Kaltakkıran',	'05076600884',	'IMG-6550e047c05fa4.59777721.jpg');

-- 2023-11-13 11:13:48
