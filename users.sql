SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS demo;
CREATE USER 'remoteusr'@'%' IDENTIFIED BY 'passw@rd123';
GRANT ALL ON *.* TO 'remoteusr'@'%' IDENTIFIED BY 'remotepwd';
use demo;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
FLUSH PRIVILEGES;
insert into users(username,password)values('demo','demo');
insert into users(username,password)values('demo1','demo1');