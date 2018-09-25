-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 10:56 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent` varchar(20) NOT NULL,
  `total_refered` varchar(20) NOT NULL DEFAULT '0',
  `total_activated` varchar(20) DEFAULT '0',
  `earnings` varchar(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agent`, `total_refered`, `total_activated`, `earnings`, `created_at`, `updated_at`) VALUES
(1, '172', '1', '2', '5500', '2018-05-02 16:52:11', '2018-06-08 13:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

DROP TABLE IF EXISTS `deposits`;
CREATE TABLE IF NOT EXISTS `deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `plan` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user`, `amount`, `payment_mode`, `plan`, `status`, `proof`, `created_at`, `updated_at`) VALUES
(1, '172', '242', 'Bitcoin', NULL, 'Processed', 'male.png', '2018-04-24 09:44:03', '2018-04-24 18:50:23'),
(12, '172', '500', 'On request', '6', 'Processed', 'bg.png', '2018-06-08 13:37:18', '2018-06-08 17:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `member` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `paid_from` varchar(50) NOT NULL,
  `paid_to` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Rejoice2017@gmail.com', '1a637489097377dbf21c8a7a7ba973d63a25f2f4ef2c483edb62f104a2182f1c', '2017-02-26 23:29:47'),
('rialebrume@gmail.com', 'd53c6a25865107ac7400f22436e6d37da6721bcdd36e9a67b86afee9c9fc9b7d', '2017-03-09 18:19:02'),
('test123@HApp.com', '$2y$10$mN9hSkvaFInMWnRyzCYWeO5JdoAXlINNi2Kh8TyZ79g8VnTr1UtD6', '2018-04-28 08:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `expected_return` varchar(20) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `increment_interval` varchar(20) NOT NULL,
  `increment_type` varchar(20) NOT NULL,
  `increment_amount` varchar(20) DEFAULT NULL,
  `expiration` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `expected_return`, `type`, `created_at`, `updated_at`, `increment_interval`, `increment_type`, `increment_amount`, `expiration`) VALUES
(1, 'Micro', '1000', '5000', 'Promo', '2018-04-24 21:25:37', '2018-05-18 13:26:21', '', '', NULL, ''),
(2, 'Basic', '5000', '15000', 'Promo', '2018-04-25 09:33:37', '2018-05-18 13:26:29', '', '', NULL, ''),
(7, 'Diamond', '50000', '7000', 'Main', '2018-05-16 10:40:27', '2018-06-08 19:31:50', 'Daily', 'Percentage', '10', 'One year'),
(9, 'Premium', '10000', '25000', 'Promo', '2018-05-18 13:20:51', '2018-05-18 13:26:41', '', '', NULL, ''),
(5, 'Basic', '1000', '3000', 'Main', '2018-04-25 15:02:29', '2018-06-08 19:31:21', 'Weekly', 'Percentage', '14', 'One week'),
(6, 'Silver', '10000', '4000', 'Main', '2018-04-28 12:58:40', '2018-06-08 19:31:32', 'Weekly', 'Fixed', '20', 'One month'),
(8, 'Gold', '100000', '12000', 'Promo', '2018-05-16 10:41:02', '2018-06-08 13:40:20', '', '', NULL, ''),
(10, 'Platinum', '50000', '150000', 'Promo', '2018-05-18 13:21:17', '2018-05-18 13:27:18', '', '', NULL, ''),
(11, 'Gold', '100000', '300000', 'Main', '2018-06-08 19:00:04', '2018-06-08 19:32:08', 'Monthly', 'Percentage', '30', 'One year');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `eth_address` varchar(200) NOT NULL,
  `btc_address` varchar(200) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_address` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `trade_mode` varchar(20) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `referral_commission` varchar(20) DEFAULT NULL,
  `update` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `description`, `currency`, `bank_name`, `account_name`, `account_number`, `eth_address`, `btc_address`, `payment_mode`, `keywords`, `site_title`, `site_address`, `logo`, `trade_mode`, `contact_email`, `referral_commission`, `update`, `created_at`, `updated_at`) VALUES
(1, 'Online trade', 'online forex and cryptocurrencies Investment system', '$', '', '', '', 'njhjhkskhjgjsgashghghhgy73767efe63te653767776737', 'f655787gjgjsgashghghhgy73767efe63te653767776737', 'BTC', 'make money online, hyips', 'online forex and cryptocurrencies Investment system', 'sitename.com', 'loogo.png', 'on', 'rialekingsley@gmail.com', '20', 'Hello, we successfully launched', '2017-02-27 01:10:03', '2018-06-08 22:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `phone`, `created_at`, `updated_at`) VALUES
(1, '08169701672', '2017-04-05 11:28:33', '0000-00-00 00:00:00'),
(2, '07030626644', '2017-04-05 11:38:26', '0000-00-00 00:00:00'),
(3, '08037252468', '2017-04-06 01:28:19', '0000-00-00 00:00:00'),
(4, '08037252468', '2017-04-06 01:28:21', '0000-00-00 00:00:00'),
(5, '08037252468', '2017-04-06 01:28:59', '0000-00-00 00:00:00'),
(6, '08037252468', '2017-04-06 01:29:00', '0000-00-00 00:00:00'),
(7, '08130991778', '2017-04-13 07:02:10', '0000-00-00 00:00:00'),
(8, '08061155143', '2017-04-14 04:43:21', '0000-00-00 00:00:00'),
(9, '08037252468', '2017-04-14 08:22:00', '0000-00-00 00:00:00'),
(10, '9063559664', '2017-04-17 15:18:42', '0000-00-00 00:00:00'),
(11, '9063559664', '2017-04-17 15:18:55', '0000-00-00 00:00:00'),
(12, '08120284913', '2017-04-18 16:03:11', '0000-00-00 00:00:00'),
(13, '08038763462', '2017-04-19 02:33:51', '0000-00-00 00:00:00'),
(14, '07066745546', '2017-04-20 02:49:31', '0000-00-00 00:00:00'),
(15, '08124806609', '2017-04-21 05:12:05', '0000-00-00 00:00:00'),
(16, '08032688250', '2017-04-21 05:42:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `reply_to` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `bank_name` varchar(25) DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `account_no` varchar(50) DEFAULT NULL,
  `btc_address` varchar(255) DEFAULT NULL,
  `eth_address` varchar(255) DEFAULT NULL,
  `plan` varchar(25) DEFAULT '0',
  `promo_plan` varchar(20) NOT NULL DEFAULT '0',
  `confirmed_plan` varchar(25) DEFAULT '0',
  `account_bal` varchar(20) NOT NULL DEFAULT '0',
  `ref_bonus` varchar(20) NOT NULL DEFAULT '0',
  `bonus_released` varchar(20) NOT NULL DEFAULT '0',
  `ref_by` varchar(20) DEFAULT NULL,
  `ref_link` varchar(100) DEFAULT NULL,
  `entered_at` datetime DEFAULT NULL,
  `activated_at` datetime DEFAULT NULL,
  `last_growth` datetime DEFAULT NULL,
  `status` varchar(25) DEFAULT 'blocked',
  `type` varchar(25) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `password`, `remember_token`, `bank_name`, `account_name`, `account_no`, `btc_address`, `eth_address`, `plan`, `promo_plan`, `confirmed_plan`, `account_bal`, `ref_bonus`, `bonus_released`, `ref_by`, `ref_link`, `entered_at`, `activated_at`, `last_growth`, `status`, `type`, `created_at`, `updated_at`) VALUES
(172, 'Test User', 'test123@HApp.com', 'male.png', '$2y$10$LmttshFQpOG9/pffkD4vSuN.G1l3JU7wlVykf4Rm.tVilDQHQmJf.', 'F8sUpyn2tgISUVtoGlR6CyGp2RhBlLGtKoKxK5qMOb6OK4IFMrnznrbubn85', NULL, NULL, NULL, 'fbd65372h376762g37636hd7dfftcfgf77', NULL, '5', '1', NULL, '6656.071428571429', '0', '0', '172', 'https://www.sitename.com/ref/172', '2018-06-07 22:36:05', '2018-06-08 14:30:11', '2018-06-08 14:30:11', 'active', '1', '2018-04-23 08:35:25', '2018-06-08 14:30:11'),
(182, 'Test1 User1', 'test1234@happ.com', NULL, '$2y$10$LmttshFQpOG9/pffkD4vSuN.G1l3JU7wlVykf4Rm.tVilDQHQmJf.', 'xgkSmM7cvrFTltber7Ri1WK0RKpFNn4xOrqaQqCDkvJNCLj3byoWuMYdi3ZY', NULL, NULL, NULL, '12dwd', NULL, '7', '0', '0', '100', '0', '0', NULL, 'sitename.com/ref/182', '2018-06-08 17:43:16', NULL, NULL, 'active', '0', '2018-05-22 22:59:45', '2018-06-08 17:43:16'),
(183, 'Serome', 'seromedaniel@gmail.com', NULL, '$2y$10$EKDp0/ULVeEBtgBRv854LOKzcBlt80t/a6.G35V0M1jCqZEE2lTa6', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', NULL, 'sitename.com/ref/183', NULL, NULL, NULL, 'active', '0', '2018-06-08 06:36:01', '2018-06-08 13:43:36'),
(184, 'Nino Jintcharadze', 'no_ange@mail.ru', NULL, '$2y$10$v7SER5nIDplyaaV/x18wy.FpBLRBtpkrHRzq5onxh83RV/I/yVF0y', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', NULL, 'sitename.com/ref/184', NULL, NULL, NULL, 'blocked', '0', '2018-06-08 07:14:01', '2018-06-08 07:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user`, `amount`, `status`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, '172', '100', 'Processed', 'Bitcoin', '2018-06-08 13:42:30', '2018-06-08 17:42:30'),
(4, '182', '100', 'Pending', 'On request', '2018-06-08 02:13:21', '2018-06-08 02:13:21'),
(5, '182', '$3000', 'Processed', 'On request', '2018-06-08 13:42:21', '2018-06-08 17:42:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
