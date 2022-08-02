-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2022 at 06:53 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `subject` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `hours` float DEFAULT NULL,
  `topic` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`subject`, `date`, `hours`, `topic`) VALUES
('JAVA', '2022-07-22', 2, 'Instrallation of java jdk \r\njava:\r\nintroduction\r\nbasic structure\r\nvariables and data types\r\nliterals\r\nvideo(1-4)'),
('OTHER', '2022-07-22', 3, 'Git and github v(1-13)'),
('JAVA', '2022-07-23', 2, 'user Input,program to calculate percentage of student v(5-6)'),
('JAVA', '2022-07-24', 2, 'java V(7-12)'),
('JAVA', '2022-07-24', 2, 'hackerRank java problems'),
('DMS', '2022-07-27', 2, 'Chapter 3 '),
('DMS', '2022-07-28', 2, 'chapter 4 groups'),
('JAVA', '2022-07-29', 2, 'java string methods V(13-14)'),
('PROJECT', '2022-07-26', 0.5, 'introduction about block chine.'),
('JAVA', '2022-07-30', 2, 'Chapter 4 Strings compleated till V(19)'),
('JAVA', '2022-07-31', 3.5, 'leep year program and rock paper scissor program '),
('PROJECT', '2022-07-31', 0.5, 'bitcoin'),
('JAVA', '2022-08-01', 2, 'hacker rank problems'),
('DBMS', '2022-08-01', 2, 'till 2NF'),
('JAVA', '2022-08-01', 0.5, 'hacker rank problrm datatypes'),
('DMS', '2022-08-02', 1, 'Groups THMs'),
('DMS', '2022-08-02', 2, 'Ch3 and ch4 revision '),
('DBMS', '2022-08-02', 2, 'Ch4 and ch5 revision '),
('JAVA', '2022-08-02', 2, 'loops break continue V(20-24)'),
('OTHER', '2022-08-02', 0.5, 'display.php modified added total hours and the list of subjects');
