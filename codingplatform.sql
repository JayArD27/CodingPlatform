-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 03:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingplatform`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_codeact`
--

CREATE TABLE `tbl_codeact` (
  `ACT_ID` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `ACT_DESC` varchar(250) NOT NULL,
  `OUTPUT` varchar(5000) NOT NULL,
  `S_CODE` varchar(5000) NOT NULL,
  `TEACHER` varchar(100) NOT NULL,
  `SCORE` int(11) NOT NULL,
  `DATE_CREATED` datetime NOT NULL,
  `DUE_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_codeact`
--

INSERT INTO `tbl_codeact` (`ACT_ID`, `TITLE`, `ACT_DESC`, `OUTPUT`, `S_CODE`, `TEACHER`, `SCORE`, `DATE_CREATED`, `DUE_DATE`) VALUES
(1, 'Create your First Program. ', 'Create a program that will output the word \"Hello World\"', 'Hello World!', '// Your First C++ Program\r\n\r\n#include <iostream>\r\n\r\nint main() {\r\n    std::cout << \"Hello World!\";\r\n    return 0;\r\n}', 'DELARAMA', 100, '2023-05-20 20:57:42', '2023-05-26 20:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_codeactresult`
--

CREATE TABLE `tbl_codeactresult` (
  `RES_ID` int(11) NOT NULL,
  `RES_ACT_ID` int(11) NOT NULL,
  `STUD_FNAME` varchar(100) NOT NULL,
  `STUD_LNAME` varchar(100) NOT NULL,
  `TIME_ELAPSE` time NOT NULL,
  `DATE_TAKEN` datetime NOT NULL,
  `SCORE` varchar(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `OUTPUT` varchar(5000) NOT NULL,
  `RES_CODE` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_codeactresult`
--

INSERT INTO `tbl_codeactresult` (`RES_ID`, `RES_ACT_ID`, `STUD_FNAME`, `STUD_LNAME`, `TIME_ELAPSE`, `DATE_TAKEN`, `SCORE`, `STATUS`, `OUTPUT`, `RES_CODE`) VALUES
(1, 1, 'JAY-AR', 'DELA RAMA', '21:01:22', '2023-05-20 21:01:22', '100', 'COMPLETE', 'Hello World!', '// Your First C++ Program\r\n\r\n#include <iostream>\r\n\r\nint main() {\r\n    std::cout << \"Hello World!\";\r\n    return 0;\r\n}\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_codeact`
--
ALTER TABLE `tbl_codeact`
  ADD PRIMARY KEY (`ACT_ID`);

--
-- Indexes for table `tbl_codeactresult`
--
ALTER TABLE `tbl_codeactresult`
  ADD PRIMARY KEY (`RES_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_codeact`
--
ALTER TABLE `tbl_codeact`
  MODIFY `ACT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_codeactresult`
--
ALTER TABLE `tbl_codeactresult`
  MODIFY `RES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
