-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Apr 27, 2022 at 02:08 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amdbms`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `retrive`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrive` (IN `BranchId` INTEGER)  BEGIN
SELECT `Branch_Id`,`Grade_A`,`Grade_B`,`Grade_C`, (`Grade_A`+`Grade_B`+`Grade_C`)as total FROM storage WHERE`Branch_Id`=`BranchId`;                                                
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `username` varchar(20) NOT NULL DEFAULT 'admin',
  `password` varchar(15) NOT NULL DEFAULT 'password'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `branch_details`
--

DROP TABLE IF EXISTS `branch_details`;
CREATE TABLE IF NOT EXISTS `branch_details` (
  `Branch_Id` int(100) NOT NULL AUTO_INCREMENT,
  `Branch_name` varchar(10) NOT NULL,
  `Branch_address` varchar(20) NOT NULL,
  PRIMARY KEY (`Branch_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

DROP TABLE IF EXISTS `buyer_details`;
CREATE TABLE IF NOT EXISTS `buyer_details` (
  `buyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(20) NOT NULL,
  `B_Address` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `Branch_Id` int(11) NOT NULL,
  PRIMARY KEY (`buyer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_transaction`
--

DROP TABLE IF EXISTS `buyer_transaction`;
CREATE TABLE IF NOT EXISTS `buyer_transaction` (
  `Branch_Id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `sell_date` date NOT NULL,
  `grade_A_quantity` int(11) NOT NULL,
  `grade_B_quantity` int(11) NOT NULL,
  `grade_C_quantity` int(11) NOT NULL,
  `transaction_id` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sellprice_A` int(11) NOT NULL,
  `sellprice_B` int(11) NOT NULL,
  `sellprice_C` int(11) NOT NULL,
  UNIQUE KEY `transaction_id` (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Triggers `buyer_transaction`
--
DROP TRIGGER IF EXISTS `decrement_storage_after_insert`;
DELIMITER $$
CREATE TRIGGER `decrement_storage_after_insert` AFTER INSERT ON `buyer_transaction` FOR EACH ROW UPDATE storage SET Grade_A=Grade_A-new.grade_A_quantity,Grade_B=Grade_B-new.grade_B_quantity,Grade_C=Grade_C-new.grade_C_quantity where Branch_Id=new.Branch_ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

DROP TABLE IF EXISTS `employee_table`;
CREATE TABLE IF NOT EXISTS `employee_table` (
  `Branch_Id` varchar(20) NOT NULL,
  `Employee_ID` int(100) NOT NULL AUTO_INCREMENT,
  `E_name` varchar(20) DEFAULT NULL,
  `Designation` varchar(10) DEFAULT 'employee',
  `username` varchar(10) DEFAULT NULL,
  `E_password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`),
  UNIQUE KEY `username` (`username`,`E_password`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `market_price`
--

DROP TABLE IF EXISTS `market_price`;
CREATE TABLE IF NOT EXISTS `market_price` (
  `Branch_Id` int(11) NOT NULL,
  `Grade_A_Price` int(11) NOT NULL,
  `Grade_B_Price` int(11) NOT NULL,
  `Grade_C_Price` int(11) NOT NULL,
  `m_date` date NOT NULL,
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_from_buyer`
--

DROP TABLE IF EXISTS `payment_from_buyer`;
CREATE TABLE IF NOT EXISTS `payment_from_buyer` (
  `buyer_id` int(11) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `recipt_no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`recipt_no`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_to_seller`
--

DROP TABLE IF EXISTS `payment_to_seller`;
CREATE TABLE IF NOT EXISTS `payment_to_seller` (
  `seller_id` int(11) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `recipt_no` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `recipt_no` (`recipt_no`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_details`
--

DROP TABLE IF EXISTS `seller_details`;
CREATE TABLE IF NOT EXISTS `seller_details` (
  `Branch_Id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `s_address` varchar(20) NOT NULL,
  `AC_no` int(11) NOT NULL,
  `IFSC` varchar(10) NOT NULL,
  `username` varchar(11) NOT NULL,
  `c_password` varchar(11) NOT NULL,
  PRIMARY KEY (`seller_id`),
  UNIQUE KEY `username` (`username`,`c_password`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_transaction`
--

DROP TABLE IF EXISTS `seller_transaction`;
CREATE TABLE IF NOT EXISTS `seller_transaction` (
  `Branch_Id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `purchased_date` date NOT NULL,
  `grade_A_quantity` int(11) NOT NULL,
  `grade_B_quantity` int(11) NOT NULL,
  `grade_C_quantity` int(11) NOT NULL,
  `buyprice_A` int(11) NOT NULL,
  `buyprice_B` int(11) NOT NULL,
  `buyprice_C` int(11) NOT NULL,
  `transaction_id` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Triggers `seller_transaction`
--
DROP TRIGGER IF EXISTS `update_storage_after_insert`;
DELIMITER $$
CREATE TRIGGER `update_storage_after_insert` AFTER INSERT ON `seller_transaction` FOR EACH ROW UPDATE storage SET Grade_A=Grade_A+new.grade_A_quantity,Grade_B=Grade_B+new.grade_B_quantity,Grade_C=Grade_C+new.grade_C_quantity where Branch_Id=new.Branch_ID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
CREATE TABLE IF NOT EXISTS `storage` (
  `Branch_Id` int(11) NOT NULL,
  `Grade_A` int(11) NOT NULL DEFAULT '0',
  `Grade_B` int(11) NOT NULL DEFAULT '0',
  `Grade_C` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `Branch_Id` (`Branch_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
