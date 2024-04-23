-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 09:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE Database library_database;
USE library_database;

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
);

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_email` varchar(255) DEFAULT NULL,
  `user_pwd` varchar(255) NOT NULL,
);

ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

CREATE TABLE IF NOT EXISTS `book` (
    `book_id` int(10) NOT NULL,
    `book_title` varchar(255) NOT NULL,
    `book_author` varchar(255) NOT NULL,
    `book_description` varchar(1027),
    `book_length` int(5),
    `book_genre` varchar(255),
    `book_image` varchar(1027),
    PRIMARY KEY (`book_id`)
);

CREATE TABLE IF NOT EXISTS `book_issue` (
    `book_id` int(10) NOT NULL,
    `issue_id` int(10) NOT NULL,
    `availibility` BIT NOT NULL,
    `issued_to` varchar(255),
    `issued_time` varchar(255),
    `return_by` varchar(255),
    PRIMARY KEY (`issue_id`)
);

-- A table to store book requests
CREATE TABLE IF NOT EXISTS `requests` (
    `request_id` INT AUTO_INCREMENT PRIMARY KEY,
    `book_author` VARCHAR(255) NOT NULL,
    `book_title` VARCHAR(255) NOT NULL,
);

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pwd`) VALUES
(1, 'admin', 'admin');

INSERT INTO `user_info` (`user_id`, `user_email`, `user_pwd`) VALUES
(1, 'johnsmith@gmail.com', 'john123'),
(2, 'johndoe@gmail.com', 'john1234'),
(3, 'emilysmith@gmail.com', 'ilovedog1'),
(4, 'jd@gmail.com', 'abc123');

INSERT INTO `book` VALUES
(1, 'A Game Of Thrones', 'George R. R. Martin', 'The first book in A Song of Ice and Fire', 720, 'Fantasy', 'https://m.media-amazon.com/images/I/714ExofeKJL._AC_UF1000,1000_QL80_.jpg'),
(2, 'A Clash of Kings', 'George R. R. Martin', 'The second book in A Song of Ice and Fire', 1040, 'Fantasy', 'https://m.media-amazon.com/images/I/71R9pRtC6AL._AC_UF1000,1000_QL80_.jpg'),
(3, 'A Storm of Swords', 'George R. R. Martin', 'The third book in A Song of Ice and Fire', 1008, 'Fantasy', 'https://m.media-amazon.com/images/I/71hzYSMbvZL._AC_UF1000,1000_QL80_.jpg'),
(4, 'A Feast for Crows', 'George R. R. Martin', 'The fourth book in A Song of Ice and Fire', 1104, 'Fantasy', 'https://m.media-amazon.com/images/I/71wX5JhAkYL._AC_UF1000,1000_QL80_.jpg'),
(5, 'A Dance with Dragons', 'George R. R. Martin', 'The fifth book in A Song of Ice and Fire', 1152, 'Fantasy', 'https://m.media-amazon.com/images/I/71CrMiWhcDL._AC_UF1000,1000_QL80_.jpg'),
(6, 'Dune', 'Frank Herbert', 'The frist book in the Dune series', 896, 'Science Fiction', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJsO6s_O3oX-H6QDpdo5oafiXNvySAZ-z-PdoznbEYZA&s'),
(7, 'Dune Messiah', 'Frank Herbert', 'The second book in the Dune series', 352, 'Science Fiction', 'https://m.media-amazon.com/images/I/817Xh+bqwOL._AC_UF1000,1000_QL80_.jpg'),
(8, 'Children of Dune', 'Frank Herbert', 'The third book in the Dune series', 416, 'Science Fiction', 'https://m.media-amazon.com/images/I/817pAbUYBpL._AC_UF1000,1000_QL80_.jpg'),
(9, 'The Lord of the Rings', 'J. R. R. Tolkien', "The first book in The Lord of the Rings series", 1216, 'Fantasy', 'https://m.media-amazon.com/images/I/7125+5E40JL._AC_UF1000,1000_QL80_.jpg'),
(10, 'The Two Towers', 'J. R. R. Tolkien', "The second book in The Lord of the Rings series", 416, 'Fantasy', 'https://m.media-amazon.com/images/I/61JO1okOIHL._AC_UF1000,1000_QL80_.jpg'),
(11, 'The Return of the King', 'J. R. R. Tolkien', "The third book in The Lord of the Rings series", 512, 'Fantasy', 'https://m.media-amazon.com/images/I/71tDovoHA+L._AC_UF1000,1000_QL80_.jpg'),
(12, 'The Hobbit', 'J. R. R. Tolkien', "A prequel to The Lord of the Rings", 300, 'Fantasy', 'https://m.media-amazon.com/images/I/712cDO7d73L._AC_UF1000,1000_QL80_.jpg'),
(13, 'The Design of Everyday Things', 'Don Norman', 'This book explores the complex interactions between humans and everyday objects', 368, 'Technical', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYD_w4aVsG2IymZQUpYqSsR6KpSScrXQhfh7jTSHAmqg&s'),
(14, "Don't Make Me Think", 'Steve Krug', 'Guide to help understand the principles of intuitive design', 216, 'Technical', 'https://m.media-amazon.com/images/I/51sdCuqMwWL._AC_UF1000,1000_QL80_.jpg');

COMMIT;
