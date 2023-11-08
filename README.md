# Contact-php  
 ## veritabanı
```sql
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
(1,	'Kaan Kaltakkıran',	'05076600884',	'IMG-654b31b7bc1fe8.35011243.jpg'),
(2,	'Veli Baba',	'05054235128',	'IMG-65439361884529.22739098.jpg'),
(3,	'Ayşe Yılmaz',	'05075366147',	'IMG-6543938e4474a9.79692124.jpg'),
(4,	'Selin Ak',	'05064357551',	'IMG-654393b6afb358.33856529.jpg'),
(5,	'Ahmet Yılmaz',	'05064423812',	'IMG-6543b114b9fab7.28522222.jpg'),
(6,	'Ali Ak',	'05057653227',	'IMG-6543b138dc2f88.75840205.jpg'),
(7,	'Selin Türkmen',	'05078624651',	'IMG-6543b158036719.64438706.jpg'),
(8,	'Adnan Soy',	'05045433597',	'IMG-6543b1831af8e3.47464387.jpg'),
(9,	'Veli Okumuş',	'5047620354',	'IMG-6543b19bd9ae76.61928296.jpg'),
(10,	'Zeynep Sever',	'05073146554',	'IMG-6543b1c7951f24.54371323.jpg'),
(11,	'Fırat Akbaş',	'05057310547',	'IMG-6543b1e79f27e4.13099479.png');

-- 2023-11-08 09:26:32
```
## Site Video
 https://github.com/kaankaltakkiran/php_video

