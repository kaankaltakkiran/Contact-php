# Contact-php  
```sql
-- Adminer 4.8.1 MySQL 5.5.5-10.4.27-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `productdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `productdescription` text NOT NULL,
  `productimg` varchar(255) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

INSERT INTO `products` (`productid`, `productname`, `category`, `stock`, `price`, `productdate`, `productdescription`, `productimg`) VALUES
(1,	'Acer Laptop',	'',	'1.000',	'30.000',	'2023-11-05 10:36:58',	'Acer Laptop Description',	'IMG-6547704acbd209.04153442.jpg'),
(2,	'Hp Laptop',	'',	'500',	'25.000',	'2023-11-05 10:37:11',	'Hp Laptop Description',	'IMG-65477057aa22c8.22335014.jpg'),
(3,	'Monster Laptop',	'',	'917',	'17.000',	'2023-11-05 10:37:30',	'Monster Laptop Description',	'IMG-6547706aa1d080.91612054.jpg'),
(4,	'New Laptop',	'',	'1.430',	'47.000',	'2023-11-08 07:05:50',	'New Laptop Description',	'IMG-654b334e976597.61598384.jpg');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

INSERT INTO `users` (`userid`, `username`, `useremail`, `userpassword`, `role`) VALUES
(1,	'Ahmet Yılmaz',	'ahmet@gmail.com',	'$2y$10$SHJAe.TDg5jp4S/GJ9p1..N/K9Bcw9OvDwaEzyQKQm2aHtq5wcZ2.',	1),
(2,	'Admin',	'admin@gmail.com',	'$2y$10$T.V40CsyhHOj/pT922VwrOcRBksyCzvHfeAJNf/oOgdJQQKXzU9WC',	2);

-- 2023-11-08 09:35:13
```
## Site Video
 https://github.com/kaankaltakkiran/php_video

