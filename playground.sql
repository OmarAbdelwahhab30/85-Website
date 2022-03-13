-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2022 at 06:24 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playground`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `stadium_id` int NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `res_day` varchar(30) CHARACTER SET latin1 NOT NULL,
  `res_start` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cost` int NOT NULL,
  `appear_check` bit(1) NOT NULL DEFAULT b'1',
  `appear_comment` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`stadium_id`),
  KEY `stadium_id` (`stadium_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `stadium_id`, `comment`, `res_day`, `res_start`, `cost`, `appear_check`, `appear_comment`) VALUES
(19, 2, 1, NULL, '2022-01-28', '10:00pm', 100, b'1', b'1'),
(20, 2, 1, NULL, '2022-01-13', '06:00pm', 100, b'1', b'1'),
(21, 2, 5, NULL, '2022-01-20', '07:00pm', 100, b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `std_id` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `std_id` (`std_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `std_id`, `comment`, `date`) VALUES
(4, 2, 3, 'ماأجمل العشب الاخضر ♥', '2021-12-31 19:24:46'),
(5, 2, 5, 'hh', '2022-01-01 13:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

DROP TABLE IF EXISTS `stadiums`;
CREATE TABLE IF NOT EXISTS `stadiums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `std_name` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `std_loc` varchar(255) NOT NULL,
  `hour_price` int NOT NULL,
  `std_size` varchar(5) NOT NULL,
  `std_joinDate` datetime NOT NULL,
  `std_profits` int UNSIGNED NOT NULL,
  `owner_id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `iframe` text NOT NULL,
  `std_link` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `std_name`, `availability`, `std_loc`, `hour_price`, `std_size`, `std_joinDate`, `std_profits`, `owner_id`, `img`, `iframe`, `std_link`) VALUES
(1, 'ملعب أمل مصر', 'متاح كل الايام من 2 مساءا حتى 2 بعد منتصف الليل', 'المنصورة-شارع عبدالسلام عارف - شارع توكيل شيفورليت', 100, '7*7', '2021-12-08 23:28:32', 200, 1, 'pitch-1', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1918.6775775844912!2d31.379298399242476!3d31.029133917268503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79d38729675cf%3A0xb557a8cb5964ad71!2z2YXZhNin2LnYqCDYo9mF2YQg2YXYtdix!5e1!3m2!1sen!2seg!4v1640849061414!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://goo.gl/maps/Hkv6GLou5Gsj3Z739'),
(2, 'ملعب جديلة (الخزان)', 'متاح كل الايام من 2 مساءا حتى 2 بعد منتصف الليل', 'جديلة-عند المعسكر', 100, '5*5', '2021-12-01 23:28:32', 300, 1, 'pitch-2', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d959.0838088775279!2d31.408508078228145!3d31.054439910590002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79d44092b6539%3A0x448c41f4c52ef47c!2z2YXZiNmC2YEg2LPYsdmB2YrYsyDYs9mG2K_ZiNioINis2K_ZitmE2Kk!5e1!3m2!1sen!2seg!4v1640849026317!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://goo.gl/maps/52jnZUWJ54YMYahK8'),
(3, 'ملعب الكابيتانو', 'متاح كل الايام من 2 مساءا حتى 2 بعد منتصف الليل', 'المنصورة-المجزر', 120, '7*7', '2021-12-17 23:28:32', 240, 1, 'pitch-3', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3418.973330297458!2d31.361795813046122!3d31.026992678446362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79ddd5e532bed%3A0xbddb014f622226dd!2z2YXZhNin2LnYqCDYp9mE2YPYp9io2YrYqtin2YbZiA!5e0!3m2!1sen!2seg!4v1640848657263!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://goo.gl/maps/7yvHPffbZosucZmF9'),
(4, 'ملعب ليجا', 'متاح كل الايام من 2 مساءا حتى 2 بعد منتصف الليل', 'المنصورة-الاتوبيس الجديد', 120, '7*7', '2021-12-14 23:28:32', 240, 1, 'pitch-4', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d273.0963240997389!2d31.39019541252793!3d31.043369248330986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79d205797c55f%3A0x2b1c1514644b808d!2sLiga!5e0!3m2!1sen!2seg!4v1640848620925!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://goo.gl/maps/8P7BhWzNJhq4asQH7'),
(5, 'ملعب نادي الشرطة', 'متاح كل الايام من 2 مساءا حتى 2 بعد منتصف الليل', 'المنصورة-اخر المشاية السفلي -نادي الشرطة', 100, '5*5', '2021-12-01 23:51:18', 500, 1, 'pitch-5', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3418.2756523088287!2d31.3536725!3d31.0464249!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79dd79b774255%3A0xa6d607f9260d150!2z2YbYp9iv2Yog2KfZhNi02LHYt9ip!5e0!3m2!1sen!2seg!4v1640848240943!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://goo.gl/maps/yBuhXNjyRY2UZEUp7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_seen` datetime DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `isadmin` bit(1) NOT NULL DEFAULT b'0',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `phone`, `password`, `last_seen`, `dob`, `isadmin`, `image`) VALUES
(1, 'omarAhmed', 'omarabdelwahhabkishk2000@gmail.com', '01028689567', 'd4466cce49457cfea18222f5a7cd3573', NULL, '2000-09-30', b'1', '268965530_1634019420270211_6676651743708888699_n.jpg'),
(2, 'KhalidKishk', 'khalid@gmail.com', '01004688831', '8ce4b16b22b58894aa86c421e8759df3', NULL, '2005-10-01', b'0', 'khalid.jpg'),
(16, 'Ahmed Taha', 'ahmedmohamed2002@gmail.com', '01008327889', '967251b57be7b8e0a1a3a99597eb25fd', NULL, NULL, b'1', 'taha.jfif');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD CONSTRAINT `stadiums_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
