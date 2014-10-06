-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2014 at 12:37 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autozany_dev`
--
CREATE DATABASE IF NOT EXISTS `autozany_dev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `autozany_dev`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `sync_dre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sync_dre`(IN `current_month` TINYINT, IN `current_year` MEDIUMINT)
    DETERMINISTIC
BEGIN

    DECLARE dre_count TINYINT DEFAULT 0;

	/*DECLARE current_month TINYINT DEFAULT 0;
    DECLARE current_year MEDIUMINT DEFAULT 0;*/
    
    DECLARE start_date, end_date DATE;
    
    DECLARE sales DECIMAL DEFAULT 0;
    
    /*SET current_month = MONTH(NOW());
    SET current_year = YEAR(NOW()); */
    
    SET start_date = CONCAT(current_year, '-' , current_month, '-1');
    SET end_date = DATE_ADD( start_date, INTERVAL 1 MONTH);
    
    SELECT SUM(total) INTO sales 
    FROM orders WHERE orders.date BETWEEN start_date AND end_date;
    
    SELECT COUNT(*) INTO dre_count
    FROM reports_dre
    WHERE month = current_month AND year = current_year; 
    
    IF dre_count > 0 THEN
        UPDATE reports_dre SET reports_dre.sales = sales
        WHERE month = current_month AND year = current_year;
    ELSE
	    INSERT INTO reports_dre VALUES (0, current_month, current_year, sales, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);
	END IF;


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

DROP TABLE IF EXISTS `methods`;
CREATE TABLE IF NOT EXISTS `methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `days` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Formas de Pagamento' AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `km` decimal(10,1) DEFAULT NULL,
  `vehicle` varchar(50) NOT NULL,
  `plate` varchar(8) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=622 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1743 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

DROP TABLE IF EXISTS `order_payments`;
CREATE TABLE IF NOT EXISTS `order_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `method_id` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `minimum_price` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110212 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports_dre`
--

DROP TABLE IF EXISTS `reports_dre`;
CREATE TABLE IF NOT EXISTS `reports_dre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` tinyint(4) NOT NULL,
  `year` smallint(6) NOT NULL,
  `sales` decimal(10,2) NOT NULL,
  `reduction` decimal(10,2) NOT NULL,
  `canceled` decimal(10,2) NOT NULL,
  `discounts` decimal(10,2) NOT NULL,
  `taxes` decimal(10,2) NOT NULL,
  `cmv` decimal(10,2) NOT NULL,
  `sales_expenses` decimal(10,2) NOT NULL,
  `financial_expenses` decimal(10,2) NOT NULL,
  `financial_income` decimal(10,2) NOT NULL,
  `general_expenses` decimal(10,2) NOT NULL,
  `operational_expenses` decimal(10,2) NOT NULL,
  `operational_income` decimal(10,2) NOT NULL,
  `other_income` decimal(10,2) NOT NULL,
  `other_expenses` decimal(10,2) NOT NULL,
  `fgts` decimal(10,2) NOT NULL,
  `ir` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Demonstração de Resultado de Exercicio' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `hash_change_password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_companies`
--

DROP TABLE IF EXISTS `users_companies`;
CREATE TABLE IF NOT EXISTS `users_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
