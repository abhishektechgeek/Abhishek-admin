-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2013 at 11:45 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flewmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `company` varchar(32) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address_1` varchar(128) COLLATE utf8_bin NOT NULL,
  `address_2` varchar(128) COLLATE utf8_bin NOT NULL,
  `postcode` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `city` varchar(128) COLLATE utf8_bin NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`address_id`),
  KEY `customer_id` (`customer_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'admin', 'admin', 'Raman', 'Kumar', 'ramankumar@virtualemployee.com');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(10) NOT NULL,
  `attribute_value` varchar(50) NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL DEFAULT '0',
  `store_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `store_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `customer_group_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `fax` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(96) COLLATE utf8_bin NOT NULL DEFAULT '',
  `shipping_firstname` varchar(32) COLLATE utf8_bin NOT NULL,
  `shipping_lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `shipping_company` varchar(32) COLLATE utf8_bin NOT NULL,
  `shipping_address_1` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_address_2` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_city` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_postcode` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `shipping_zone` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_zone_id` int(11) NOT NULL,
  `shipping_country` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_country_id` int(11) NOT NULL,
  `shipping_address_format` text COLLATE utf8_bin NOT NULL,
  `shipping_method` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_company` varchar(32) COLLATE utf8_bin NOT NULL,
  `payment_address_1` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_address_2` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_city` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_postcode` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_zone` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_country` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_country_id` int(11) NOT NULL,
  `payment_address_format` text COLLATE utf8_bin NOT NULL,
  `payment_method` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` text COLLATE utf8_bin NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `currency_id` int(11) NOT NULL,
  `currency` varchar(3) COLLATE utf8_bin NOT NULL,
  `value` decimal(15,8) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`cart_id`),
  KEY `store_id` (`store_id`,`customer_id`,`currency_id`),
  KEY `currency_id` (`currency_id`),
  KEY `customer_id` (`customer_id`),
  KEY `customer_group_id` (`customer_group_id`),
  KEY `payment_country_id` (`payment_country_id`),
  KEY `shipping_country_id` (`shipping_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE IF NOT EXISTS `cart_products` (
  `cart_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `model` varchar(24) COLLATE utf8_bin NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `tax` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`cart_product_id`),
  KEY `product_id` (`product_id`),
  KEY `cart_id` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(80) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(200) COLLATE utf8_bin NOT NULL,
  `wall_side` int(4) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_id`, `description`, `wall_side`, `sort_order`, `date_added`, `date_modified`, `status`) VALUES
(3, 'Main category', 0, 'This is testing for main category.', 0, 0, '2013-09-11 02:01:35', '0000-00-00 00:00:00', 1),
(4, 'Main cub category', 3, 'Testing for sub category.', 0, 0, '2013-09-11 02:07:34', '0000-00-00 00:00:00', 1),
(5, 'Sub Sub category', 4, 'Sub Sub category Sub Sub category Sub Sub category', 0, 0, '2013-09-11 02:43:40', '0000-00-00 00:00:00', 1),
(6, 'Main category 2', 0, 'Main category 2 Main category 2 Main category 2', 0, 0, '2013-09-12 08:25:18', '0000-00-00 00:00:00', 1),
(7, 'Main2 Sub category', 6, 'Main2 Sub category Main2 Sub category Main2 Sub category', 0, 0, '2013-09-12 08:25:40', '0000-00-00 00:00:00', 1),
(8, 'Main2 Sub sub category', 7, 'Main2 Sub sub category Main2 Sub sub category Main2 Sub sub category', 0, 0, '2013-09-12 08:25:59', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_to_stores`
--

CREATE TABLE IF NOT EXISTS `categories_to_stores` (
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  KEY `category_id` (`category_id`),
  KEY `store_id` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `sort_order` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=246 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `iso_code_2`, `iso_code_3`, `status`, `sort_order`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1, 0),
(2, 'Albania', 'AL', 'ALB', 1, 0),
(3, 'Algeria', 'DZ', 'DZA', 1, 0),
(4, 'American Samoa', 'AS', 'ASM', 1, 0),
(5, 'Andorra', 'AD', 'AND', 1, 0),
(6, 'Angola', 'AO', 'AGO', 1, 0),
(7, 'Anguilla', 'AI', 'AIA', 1, 0),
(8, 'Antarctica', 'AQ', 'ATA', 1, 0),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1, 0),
(10, 'Argentina', 'AR', 'ARG', 1, 0),
(11, 'Armenia', 'AM', 'ARM', 1, 0),
(12, 'Aruba', 'AW', 'ABW', 1, 0),
(13, 'Australia', 'AU', 'AUS', 1, 0),
(14, 'Austria', 'AT', 'AUT', 1, 0),
(15, 'Azerbaijan', 'AZ', 'AZE', 1, 0),
(16, 'Bahamas', 'BS', 'BHS', 1, 0),
(17, 'Bahrain', 'BH', 'BHR', 1, 0),
(18, 'Bangladesh', 'BD', 'BGD', 1, 0),
(19, 'Barbados', 'BB', 'BRB', 1, 0),
(20, 'Belarus', 'BY', 'BLR', 1, 0),
(21, 'Belgium', 'BE', 'BEL', 1, 0),
(22, 'Belize', 'BZ', 'BLZ', 1, 0),
(23, 'Benin', 'BJ', 'BEN', 1, 0),
(24, 'Bermuda', 'BM', 'BMU', 1, 0),
(25, 'Bhutan', 'BT', 'BTN', 1, 0),
(26, 'Bolivia', 'BO', 'BOL', 1, 0),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1, 0),
(28, 'Botswana', 'BW', 'BWA', 1, 0),
(29, 'Bouvet Island', 'BV', 'BVT', 1, 0),
(30, 'Brazil', 'BR', 'BRA', 1, 0),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1, 0),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1, 0),
(33, 'Bulgaria', 'BG', 'BGR', 1, 0),
(34, 'Burkina Faso', 'BF', 'BFA', 1, 0),
(35, 'Burundi', 'BI', 'BDI', 1, 0),
(36, 'Cambodia', 'KH', 'KHM', 1, 0),
(37, 'Cameroon', 'CM', 'CMR', 1, 0),
(38, 'Canada', 'CA', 'CAN', 1, 0),
(39, 'Cape Verde', 'CV', 'CPV', 1, 0),
(40, 'Cayman Islands', 'KY', 'CYM', 1, 0),
(41, 'Central African Republic', 'CF', 'CAF', 1, 0),
(42, 'Chad', 'TD', 'TCD', 1, 0),
(43, 'Chile', 'CL', 'CHL', 1, 0),
(44, 'China', 'CN', 'CHN', 1, 0),
(45, 'Christmas Island', 'CX', 'CXR', 1, 0),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1, 0),
(47, 'Colombia', 'CO', 'COL', 1, 0),
(48, 'Comoros', 'KM', 'COM', 1, 0),
(49, 'Congo', 'CG', 'COG', 1, 0),
(50, 'Cook Islands', 'CK', 'COK', 1, 0),
(51, 'Costa Rica', 'CR', 'CRI', 1, 0),
(52, 'Cote D''Ivoire', 'CI', 'CIV', 1, 0),
(53, 'Croatia', 'HR', 'HRV', 1, 0),
(54, 'Cuba', 'CU', 'CUB', 1, 0),
(55, 'Cyprus', 'CY', 'CYP', 1, 0),
(56, 'Czech Republic', 'CZ', 'CZE', 1, 0),
(57, 'Denmark', 'DK', 'DNK', 1, 0),
(58, 'Djibouti', 'DJ', 'DJI', 1, 0),
(59, 'Dominica', 'DM', 'DMA', 1, 0),
(60, 'Dominican Republic', 'DO', 'DOM', 1, 0),
(61, 'Timor-Leste', 'TL', 'TLS', 1, 0),
(62, 'Ecuador', 'EC', 'ECU', 1, 0),
(63, 'Egypt', 'EG', 'EGY', 1, 0),
(64, 'El Salvador', 'SV', 'SLV', 1, 0),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1, 0),
(66, 'Eritrea', 'ER', 'ERI', 1, 0),
(67, 'Estonia', 'EE', 'EST', 1, 0),
(68, 'Ethiopia', 'ET', 'ETH', 1, 0),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1, 0),
(70, 'Faroe Islands', 'FO', 'FRO', 1, 0),
(71, 'Fiji', 'FJ', 'FJI', 1, 0),
(72, 'Finland', 'FI', 'FIN', 1, 0),
(73, 'France', 'FR', 'FRA', 1, 0),
(75, 'French Guiana', 'GF', 'GUF', 1, 0),
(76, 'French Polynesia', 'PF', 'PYF', 1, 0),
(77, 'French Southern Territories', 'TF', 'ATF', 1, 0),
(78, 'Gabon', 'GA', 'GAB', 1, 0),
(79, 'Gambia', 'GM', 'GMB', 1, 0),
(80, 'Georgia', 'GE', 'GEO', 1, 0),
(81, 'Germany', 'DE', 'DEU', 1, 0),
(82, 'Ghana', 'GH', 'GHA', 1, 0),
(83, 'Gibraltar', 'GI', 'GIB', 1, 0),
(84, 'Greece', 'GR', 'GRC', 1, 0),
(85, 'Greenland', 'GL', 'GRL', 1, 0),
(86, 'Grenada', 'GD', 'GRD', 1, 0),
(87, 'Guadeloupe', 'GP', 'GLP', 1, 0),
(88, 'Guam', 'GU', 'GUM', 1, 0),
(89, 'Guatemala', 'GT', 'GTM', 1, 0),
(90, 'Guinea', 'GN', 'GIN', 1, 0),
(91, 'Guinea-bissau', 'GW', 'GNB', 1, 0),
(92, 'Guyana', 'GY', 'GUY', 1, 0),
(93, 'Haiti', 'HT', 'HTI', 1, 0),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1, 0),
(95, 'Honduras', 'HN', 'HND', 1, 0),
(96, 'Hong Kong', 'HK', 'HKG', 1, 0),
(97, 'Hungary', 'HU', 'HUN', 1, 0),
(98, 'Iceland', 'IS', 'ISL', 1, 0),
(99, 'India', 'IN', 'IND', 1, 0),
(100, 'Indonesia', 'ID', 'IDN', 1, 0),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1, 0),
(102, 'Iraq', 'IQ', 'IRQ', 1, 0),
(103, 'Ireland', 'IE', 'IRL', 1, 0),
(104, 'Israel', 'IL', 'ISR', 1, 0),
(105, 'Italy', 'IT', 'ITA', 1, 0),
(106, 'Jamaica', 'JM', 'JAM', 1, 0),
(107, 'Japan', 'JP', 'JPN', 1, 0),
(108, 'Jordan', 'JO', 'JOR', 1, 0),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1, 0),
(110, 'Kenya', 'KE', 'KEN', 1, 0),
(111, 'Kiribati', 'KI', 'KIR', 1, 0),
(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1, 0),
(113, 'Korea, Republic of', 'KR', 'KOR', 1, 0),
(114, 'Kuwait', 'KW', 'KWT', 1, 0),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1, 0),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1, 0),
(117, 'Latvia', 'LV', 'LVA', 1, 0),
(118, 'Lebanon', 'LB', 'LBN', 1, 0),
(119, 'Lesotho', 'LS', 'LSO', 1, 0),
(120, 'Liberia', 'LR', 'LBR', 1, 0),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1, 0),
(122, 'Liechtenstein', 'LI', 'LIE', 1, 0),
(123, 'Lithuania', 'LT', 'LTU', 1, 0),
(124, 'Luxembourg', 'LU', 'LUX', 1, 0),
(125, 'Macao', 'MO', 'MAC', 1, 0),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1, 0),
(127, 'Madagascar', 'MG', 'MDG', 1, 0),
(128, 'Malawi', 'MW', 'MWI', 1, 0),
(129, 'Malaysia', 'MY', 'MYS', 1, 0),
(130, 'Maldives', 'MV', 'MDV', 1, 0),
(131, 'Mali', 'ML', 'MLI', 1, 0),
(132, 'Malta', 'MT', 'MLT', 1, 0),
(133, 'Marshall Islands', 'MH', 'MHL', 1, 0),
(134, 'Martinique', 'MQ', 'MTQ', 1, 0),
(135, 'Mauritania', 'MR', 'MRT', 1, 0),
(136, 'Mauritius', 'MU', 'MUS', 1, 0),
(137, 'Mayotte', 'YT', 'MYT', 1, 0),
(138, 'Mexico', 'MX', 'MEX', 1, 0),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1, 0),
(140, 'Moldova', 'MD', 'MDA', 1, 0),
(141, 'Monaco', 'MC', 'MCO', 1, 0),
(142, 'Mongolia', 'MN', 'MNG', 1, 0),
(143, 'Montserrat', 'MS', 'MSR', 1, 0),
(144, 'Morocco', 'MA', 'MAR', 1, 0),
(145, 'Mozambique', 'MZ', 'MOZ', 1, 0),
(146, 'Myanmar', 'MM', 'MMR', 1, 0),
(147, 'Namibia', 'NA', 'NAM', 1, 0),
(148, 'Nauru', 'NR', 'NRU', 1, 0),
(149, 'Nepal', 'NP', 'NPL', 1, 0),
(150, 'Netherlands', 'NL', 'NLD', 1, 0),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1, 0),
(152, 'New Caledonia', 'NC', 'NCL', 1, 0),
(153, 'New Zealand', 'NZ', 'NZL', 1, 0),
(154, 'Nicaragua', 'NI', 'NIC', 1, 0),
(155, 'Niger', 'NE', 'NER', 1, 0),
(156, 'Nigeria', 'NG', 'NGA', 1, 0),
(157, 'Niue', 'NU', 'NIU', 1, 0),
(158, 'Norfolk Island', 'NF', 'NFK', 1, 0),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1, 0),
(160, 'Norway', 'NO', 'NOR', 1, 0),
(161, 'Oman', 'OM', 'OMN', 1, 0),
(162, 'Pakistan', 'PK', 'PAK', 1, 0),
(163, 'Palau', 'PW', 'PLW', 1, 0),
(164, 'Panama', 'PA', 'PAN', 1, 0),
(165, 'Papua New Guinea', 'PG', 'PNG', 1, 0),
(166, 'Paraguay', 'PY', 'PRY', 1, 0),
(167, 'Peru', 'PE', 'PER', 1, 0),
(168, 'Philippines', 'PH', 'PHL', 1, 0),
(169, 'Pitcairn', 'PN', 'PCN', 1, 0),
(170, 'Poland', 'PL', 'POL', 1, 0),
(171, 'Portugal', 'PT', 'PRT', 1, 0),
(172, 'Puerto Rico', 'PR', 'PRI', 1, 0),
(173, 'Qatar', 'QA', 'QAT', 1, 0),
(174, 'Reunion', 'RE', 'REU', 1, 0),
(175, 'Romania', 'RO', 'ROU', 1, 0),
(176, 'Russian Federation', 'RU', 'RUS', 1, 0),
(177, 'Rwanda', 'RW', 'RWA', 1, 0),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1, 0),
(179, 'Saint Lucia', 'LC', 'LCA', 1, 0),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1, 0),
(181, 'Samoa', 'WS', 'WSM', 1, 0),
(182, 'San Marino', 'SM', 'SMR', 1, 0),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1, 0),
(184, 'Saudi Arabia', 'SA', 'SAU', 1, 0),
(185, 'Senegal', 'SN', 'SEN', 1, 0),
(186, 'Seychelles', 'SC', 'SYC', 1, 0),
(187, 'Sierra Leone', 'SL', 'SLE', 1, 0),
(188, 'Singapore', 'SG', 'SGP', 1, 0),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1, 0),
(190, 'Slovenia', 'SI', 'SVN', 1, 0),
(191, 'Solomon Islands', 'SB', 'SLB', 1, 0),
(192, 'Somalia', 'SO', 'SOM', 1, 0),
(193, 'South Africa', 'ZA', 'ZAF', 1, 0),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1, 0),
(195, 'Spain', 'ES', 'ESP', 1, 0),
(196, 'Sri Lanka', 'LK', 'LKA', 1, 0),
(197, 'St. Helena', 'SH', 'SHN', 1, 0),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1, 0),
(199, 'Sudan', 'SD', 'SDN', 1, 0),
(200, 'Suriname', 'SR', 'SUR', 1, 0),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1, 0),
(202, 'Swaziland', 'SZ', 'SWZ', 1, 0),
(203, 'Sweden', 'SE', 'SWE', 1, 0),
(204, 'Switzerland', 'CH', 'CHE', 1, 0),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1, 0),
(206, 'Taiwan', 'TW', 'TWN', 1, 0),
(207, 'Tajikistan', 'TJ', 'TJK', 1, 0),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1, 0),
(209, 'Thailand', 'TH', 'THA', 1, 0),
(210, 'Togo', 'TG', 'TGO', 1, 0),
(211, 'Tokelau', 'TK', 'TKL', 1, 0),
(212, 'Tonga', 'TO', 'TON', 1, 0),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1, 0),
(214, 'Tunisia', 'TN', 'TUN', 1, 0),
(215, 'Turkey', 'TR', 'TUR', 1, 0),
(216, 'Turkmenistan', 'TM', 'TKM', 1, 0),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1, 0),
(218, 'Tuvalu', 'TV', 'TUV', 1, 0),
(219, 'Uganda', 'UG', 'UGA', 1, 0),
(220, 'Ukraine', 'UA', 'UKR', 1, 0),
(221, 'United Arab Emirates', 'AE', 'ARE', 1, 0),
(222, 'United Kingdom', 'GB', 'GBR', 1, 0),
(223, 'United States', 'US', 'USA', 1, 0),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1, 0),
(225, 'Uruguay', 'UY', 'URY', 1, 0),
(226, 'Uzbekistan', 'UZ', 'UZB', 1, 0),
(227, 'Vanuatu', 'VU', 'VUT', 1, 0),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1, 0),
(229, 'Venezuela', 'VE', 'VEN', 1, 0),
(230, 'Viet Nam', 'VN', 'VNM', 1, 0),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1, 0),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1, 0),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1, 0),
(234, 'Western Sahara', 'EH', 'ESH', 1, 0),
(235, 'Yemen', 'YE', 'YEM', 1, 0),
(236, 'Serbia', 'RS', 'SRB', 1, 0),
(238, 'Zambia', 'ZM', 'ZMB', 1, 0),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1, 0),
(240, 'Aaland Islands', 'AX', 'ALA', 1, 0),
(241, 'Palestinian Territory', 'PS', 'PSE', 1, 0),
(242, 'Montenegro', 'ME', 'MNE', 1, 0),
(243, 'Guernsey', 'GG', 'GGY', 1, 0),
(244, 'Isle of Man', 'IM', 'IMN', 1, 0),
(245, 'Jersey', 'JE', 'JEY', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `code` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `symbol` varchar(12) COLLATE utf8_bin NOT NULL,
  `decimal_place` char(1) COLLATE utf8_bin NOT NULL,
  `value` decimal(15,8) NOT NULL,
  `status` int(1) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `loginname` varchar(96) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(96) COLLATE utf8_bin NOT NULL DEFAULT '',
  `telephone` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `fax` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `cart` text COLLATE utf8_bin,
  `newsletter` int(1) NOT NULL DEFAULT '0',
  `address_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '0',
  `customer_group_id` int(11) NOT NULL,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`customer_id`),
  KEY `store_id` (`store_id`),
  KEY `customer_group_id` (`customer_group_id`),
  KEY `address_id` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE IF NOT EXISTS `customer_groups` (
  `customer_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`customer_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL DEFAULT '0',
  `invoice_prefix` varchar(10) COLLATE utf8_bin NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT '0',
  `cart_id` int(11) NOT NULL,
  `store_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `store_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `customer_group_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `fax` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(96) COLLATE utf8_bin NOT NULL DEFAULT '',
  `shipping_firstname` varchar(32) COLLATE utf8_bin NOT NULL,
  `shipping_lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `shipping_company` varchar(32) COLLATE utf8_bin NOT NULL,
  `shipping_address_1` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_address_2` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_city` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_postcode` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `shipping_zone` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_zone_id` int(11) NOT NULL,
  `shipping_country` varchar(128) COLLATE utf8_bin NOT NULL,
  `shipping_country_id` int(11) NOT NULL,
  `shipping_address_format` text COLLATE utf8_bin NOT NULL,
  `shipping_method` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_company` varchar(32) COLLATE utf8_bin NOT NULL,
  `payment_address_1` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_address_2` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_city` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_postcode` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `payment_zone` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_country` varchar(128) COLLATE utf8_bin NOT NULL,
  `payment_country_id` int(11) NOT NULL,
  `payment_address_format` text COLLATE utf8_bin NOT NULL,
  `payment_method` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` text COLLATE utf8_bin NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `order_status_id` int(11) NOT NULL DEFAULT '0',
  `currency_id` int(11) NOT NULL,
  `currency` varchar(3) COLLATE utf8_bin NOT NULL,
  `value` decimal(15,8) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email_send` tinyint(1) NOT NULL,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`order_id`),
  KEY `store_id` (`store_id`),
  KEY `customer_id` (`customer_id`),
  KEY `customer_group_id` (`customer_group_id`),
  KEY `order_status_id` (`order_status_id`),
  KEY `currency_id` (`currency_id`),
  KEY `payment_country_id` (`payment_country_id`),
  KEY `cart_id` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `model` varchar(24) COLLATE utf8_bin NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `tax` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `quantity` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_product_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE IF NOT EXISTS `order_statuses` (
  `order_status_id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'translatable',
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `order_totals`
--

CREATE TABLE IF NOT EXISTS `order_totals` (
  `order_total_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `text` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `value` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int(3) NOT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`order_total_id`),
  KEY `idx_orders_total_orders_id` (`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(64) NOT NULL,
  `sku` varchar(64) NOT NULL,
  `location` varchar(128) NOT NULL,
  `quantity` int(4) NOT NULL,
  `stock_status_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `weight` double NOT NULL,
  `length` double NOT NULL,
  `width` double NOT NULL,
  `heigth` double NOT NULL,
  `wall_side` int(4) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `stock_status_id` (`stock_status_id`),
  KEY `seller_id` (`seller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_to_categories`
--

CREATE TABLE IF NOT EXISTS `products_to_categories` (
  `product_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  KEY `product_id` (`product_id`,`categories_id`),
  KEY `categories_id` (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE IF NOT EXISTS `product_attribute` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  KEY `product_id` (`product_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state_id` int(5) NOT NULL,
  `country_id` int(3) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(35) NOT NULL,
  `webaddress` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `seller_to_store`
--

CREATE TABLE IF NOT EXISTS `seller_to_store` (
  `seller_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  KEY `seller_id` (`seller_id`,`store_id`),
  KEY `store_id` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL DEFAULT '0',
  `state_code` varchar(32) NOT NULL DEFAULT '',
  `state_name` varchar(32) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=300 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_code`, `state_name`, `status`) VALUES
(1, 223, 'AL', 'Alabama', 1),
(2, 223, 'AK', 'Alaska', 1),
(3, 223, 'AS', 'American Samoa', 1),
(4, 223, 'AZ', 'Arizona', 1),
(5, 223, 'AR', 'Arkansas', 1),
(7, 223, 'AA', 'Armed Forces Americas', 1),
(9, 223, 'AE', 'Armed Forces Europe', 1),
(11, 223, 'AP', 'Armed Forces Pacific', 1),
(12, 223, 'CA', 'California', 1),
(13, 223, 'CO', 'Colorado', 1),
(14, 223, 'CT', 'Connecticut', 1),
(15, 223, 'DE', 'Delaware', 1),
(16, 223, 'DC', 'District of Columbia', 1),
(17, 223, 'FM', 'Federated States Of Micronesia', 1),
(18, 223, 'FL', 'Florida', 1),
(19, 223, 'GA', 'Georgia', 1),
(20, 223, 'GU', 'Guam', 1),
(21, 223, 'HI', 'Hawaii', 1),
(22, 223, 'ID', 'Idaho', 1),
(23, 223, 'IL', 'Illinois', 1),
(24, 223, 'IN', 'Indiana', 1),
(25, 223, 'IA', 'Iowa', 1),
(26, 223, 'KS', 'Kansas', 1),
(27, 223, 'KY', 'Kentucky', 1),
(28, 223, 'LA', 'Louisiana', 1),
(29, 223, 'ME', 'Maine', 1),
(30, 223, 'MH', 'Marshall Islands', 1),
(31, 223, 'MD', 'Maryland', 1),
(32, 223, 'MA', 'Massachusetts', 1),
(33, 223, 'MI', 'Michigan', 1),
(34, 223, 'MN', 'Minnesota', 1),
(35, 223, 'MS', 'Mississippi', 1),
(36, 223, 'MO', 'Missouri', 1),
(37, 223, 'MT', 'Montana', 1),
(38, 223, 'NE', 'Nebraska', 1),
(39, 223, 'NV', 'Nevada', 1),
(40, 223, 'NH', 'New Hampshire', 1),
(41, 223, 'NJ', 'New Jersey', 1),
(42, 223, 'NM', 'New Mexico', 1),
(43, 223, 'NY', 'New York', 1),
(44, 223, 'NC', 'North Carolina', 1),
(45, 223, 'ND', 'North Dakota', 1),
(46, 223, 'MP', 'Northern Mariana Islands', 1),
(47, 223, 'OH', 'Ohio', 1),
(48, 223, 'OK', 'Oklahoma', 1),
(49, 223, 'OR', 'Oregon', 1),
(50, 163, 'PW', 'Palau', 1),
(51, 223, 'PA', 'Pennsylvania', 1),
(52, 223, 'PR', 'Puerto Rico', 1),
(53, 223, 'RI', 'Rhode Island', 1),
(54, 223, 'SC', 'South Carolina', 1),
(55, 223, 'SD', 'South Dakota', 1),
(56, 223, 'TN', 'Tennessee', 1),
(57, 223, 'TX', 'Texas', 1),
(58, 223, 'UT', 'Utah', 1),
(59, 223, 'VT', 'Vermont', 1),
(60, 223, 'VI', 'Virgin Islands', 1),
(61, 223, 'VA', 'Virginia', 1),
(62, 223, 'WA', 'Washington', 1),
(63, 223, 'WV', 'West Virginia', 1),
(64, 223, 'WI', 'Wisconsin', 1),
(65, 223, 'WY', 'Wyoming', 1),
(66, 38, 'AB', 'Alberta', 1),
(67, 38, 'BC', 'British Columbia', 1),
(68, 38, 'MB', 'Manitoba', 1),
(69, 38, 'NL', 'Newfoundland', 1),
(70, 38, 'NB', 'New Brunswick', 1),
(71, 38, 'NS', 'Nova Scotia', 1),
(72, 38, 'NT', 'Northwest Territories', 1),
(73, 38, 'NU', 'Nunavut', 1),
(74, 38, 'ON', 'Ontario', 1),
(75, 38, 'PE', 'Prince Edward Island', 1),
(76, 38, 'QC', 'Quebec', 1),
(77, 38, 'SK', 'Saskatchewan', 1),
(78, 38, 'YT', 'Yukon Territory', 1),
(79, 81, 'NDS', 'Niedersachsen', 1),
(80, 81, 'BAW', 'Baden Württemberg', 1),
(81, 81, 'BAY', 'Bayern', 1),
(82, 81, 'BER', 'Berlin', 1),
(83, 81, 'BRG', 'Brandenburg', 1),
(84, 81, 'BRE', 'Bremen', 1),
(85, 81, 'HAM', 'Hamburg', 1),
(86, 81, 'HES', 'Hessen', 1),
(87, 81, 'MEC', 'Mecklenburg-Vorpommern', 1),
(88, 81, 'NRW', 'Nordrhein-Westfalen', 1),
(89, 81, 'RHE', 'Rheinland-Pfalz', 1),
(90, 81, 'SAR', 'Saarland', 1),
(91, 81, 'SAS', 'Sachsen', 1),
(92, 81, 'SAC', 'Sachsen-Anhalt', 1),
(93, 81, 'SCN', 'Schleswig-Holstein', 1),
(94, 81, 'THE', 'Thüringen', 1),
(95, 14, 'WI', 'Wien', 1),
(96, 14, 'NO', 'Niederösterreich', 1),
(97, 14, 'OO', 'Oberösterreich', 1),
(98, 14, 'SB', 'Salzburg', 1),
(99, 14, 'KN', 'Kärnten', 1),
(100, 14, 'ST', 'Steiermark', 1),
(101, 14, 'TI', 'Tirol', 1),
(102, 14, 'BL', 'Burgenland', 1),
(103, 14, 'VB', 'Voralberg', 1),
(104, 204, 'AG', 'Aargau', 1),
(105, 204, 'AI', 'Appenzell Innerrhoden', 1),
(106, 204, 'AR', 'Appenzell Ausserrhoden', 1),
(107, 204, 'BE', 'Bern', 1),
(108, 204, 'BL', 'Basel-Landschaft', 1),
(109, 204, 'BS', 'Basel-Stadt', 1),
(110, 204, 'FR', 'Freiburg', 1),
(111, 204, 'GE', 'Genf', 1),
(112, 204, 'GL', 'Glarus', 1),
(113, 204, 'JU', 'Graubnden', 1),
(114, 204, 'JU', 'Jura', 1),
(115, 204, 'LU', 'Luzern', 1),
(116, 204, 'NE', 'Neuenburg', 1),
(117, 204, 'NW', 'Nidwalden', 1),
(118, 204, 'OW', 'Obwalden', 1),
(119, 204, 'SG', 'St. Gallen', 1),
(120, 204, 'SH', 'Schaffhausen', 1),
(121, 204, 'SO', 'Solothurn', 1),
(122, 204, 'SZ', 'Schwyz', 1),
(123, 204, 'TG', 'Thurgau', 1),
(124, 204, 'TI', 'Tessin', 1),
(125, 204, 'UR', 'Uri', 1),
(126, 204, 'VD', 'Waadt', 1),
(127, 204, 'VS', 'Wallis', 1),
(128, 204, 'ZG', 'Zug', 1),
(129, 204, 'ZH', 'Zürich', 1),
(130, 195, 'A Coruña', 'A Coruña', 1),
(131, 195, 'Álava', 'Álava', 1),
(132, 195, 'Albacete', 'Albacete', 1),
(133, 195, 'Alicante', 'Alicante', 1),
(134, 195, 'Almería', 'Almería', 1),
(135, 195, 'Asturias', 'Asturias', 1),
(136, 195, 'Ávila', 'Ávila', 1),
(137, 195, 'Badajoz', 'Badajoz', 1),
(138, 195, 'Baleares', 'Baleares', 1),
(139, 195, 'Barcelona', 'Barcelona', 1),
(140, 195, 'Burgos', 'Burgos', 1),
(141, 195, 'Cáceres', 'Cáceres', 1),
(142, 195, 'Cádiz', 'Cádiz', 1),
(143, 195, 'Cantabria', 'Cantabria', 1),
(144, 195, 'Castellón', 'Castellón', 1),
(145, 195, 'Ceuta', 'Ceuta', 1),
(146, 195, 'Ciudad Real', 'Ciudad Real', 1),
(147, 195, 'Córdoba', 'Córdoba', 1),
(148, 195, 'Cuenca', 'Cuenca', 1),
(149, 195, 'Girona', 'Girona', 1),
(150, 195, 'Granada', 'Granada', 1),
(151, 195, 'Guadalajara', 'Guadalajara', 1),
(152, 195, 'Guipúzcoa', 'Guipúzcoa', 1),
(153, 195, 'Huelva', 'Huelva', 1),
(154, 195, 'Huesca', 'Huesca', 1),
(155, 195, 'Jaén', 'Jaén', 1),
(156, 195, 'La Rioja', 'La Rioja', 1),
(157, 195, 'Las Palmas', 'Las Palmas', 1),
(158, 195, 'León', 'León', 1),
(159, 195, 'Lérida', 'Lérida', 1),
(160, 195, 'Lugo', 'Lugo', 1),
(161, 195, 'Madrid', 'Madrid', 1),
(162, 195, 'Málaga', 'Málaga', 1),
(163, 195, 'Melilla', 'Melilla', 1),
(164, 195, 'Murcia', 'Murcia', 1),
(165, 195, 'Navarra', 'Navarra', 1),
(166, 195, 'Ourense', 'Ourense', 1),
(167, 195, 'Palencia', 'Palencia', 1),
(168, 195, 'Pontevedra', 'Pontevedra', 1),
(169, 195, 'Salamanca', 'Salamanca', 1),
(170, 195, 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife', 1),
(171, 195, 'Segovia', 'Segovia', 1),
(172, 195, 'Sevilla', 'Sevilla', 1),
(173, 195, 'Soria', 'Soria', 1),
(174, 195, 'Tarragona', 'Tarragona', 1),
(175, 195, 'Teruel', 'Teruel', 1),
(176, 195, 'Toledo', 'Toledo', 1),
(177, 195, 'Valencia', 'Valencia', 1),
(178, 195, 'Valladolid', 'Valladolid', 1),
(179, 195, 'Vizcaya', 'Vizcaya', 1),
(180, 195, 'Zamora', 'Zamora', 1),
(181, 195, 'Zaragoza', 'Zaragoza', 1),
(182, 13, 'ACT', 'Australian Capital Territory', 1),
(183, 13, 'NSW', 'New South Wales', 1),
(184, 13, 'NT', 'Northern Territory', 1),
(185, 13, 'QLD', 'Queensland', 1),
(186, 13, 'SA', 'South Australia', 1),
(187, 13, 'TAS', 'Tasmania', 1),
(188, 13, 'VIC', 'Victoria', 1),
(189, 13, 'WA', 'Western Australia', 1),
(190, 105, 'AG', 'Agrigento', 1),
(191, 105, 'AL', 'Alessandria', 1),
(192, 105, 'AN', 'Ancona', 1),
(193, 105, 'AO', 'Aosta', 1),
(194, 105, 'AR', 'Arezzo', 1),
(195, 105, 'AP', 'Ascoli Piceno', 1),
(196, 105, 'AT', 'Asti', 1),
(197, 105, 'AV', 'Avellino', 1),
(198, 105, 'BA', 'Bari', 1),
(199, 105, 'BT', 'Barletta Andria Trani', 1),
(200, 105, 'BL', 'Belluno', 1),
(201, 105, 'BN', 'Benevento', 1),
(202, 105, 'BG', 'Bergamo', 1),
(203, 105, 'BI', 'Biella', 1),
(204, 105, 'BO', 'Bologna', 1),
(205, 105, 'BZ', 'Bolzano', 1),
(206, 105, 'BS', 'Brescia', 1),
(207, 105, 'BR', 'Brindisi', 1),
(208, 105, 'CA', 'Cagliari', 1),
(209, 105, 'CL', 'Caltanissetta', 1),
(210, 105, 'CB', 'Campobasso', 1),
(211, 105, 'CI', 'Carbonia-Iglesias', 1),
(212, 105, 'CE', 'Caserta', 1),
(213, 105, 'CT', 'Catania', 1),
(214, 105, 'CZ', 'Catanzaro', 1),
(215, 105, 'CH', 'Chieti', 1),
(216, 105, 'CO', 'Como', 1),
(217, 105, 'CS', 'Cosenza', 1),
(218, 105, 'CR', 'Cremona', 1),
(219, 105, 'KR', 'Crotone', 1),
(220, 105, 'CN', 'Cuneo', 1),
(221, 105, 'EN', 'Enna', 1),
(222, 105, 'FM', 'Fermo', 1),
(223, 105, 'FE', 'Ferrara', 1),
(224, 105, 'FI', 'Firenze', 1),
(225, 105, 'FG', 'Foggia', 1),
(226, 105, 'FC', 'Forlì Cesena', 1),
(227, 105, 'FR', 'Frosinone', 1),
(228, 105, 'GE', 'Genova', 1),
(229, 105, 'GO', 'Gorizia', 1),
(230, 105, 'GR', 'Grosseto', 1),
(231, 105, 'IM', 'Imperia', 1),
(232, 105, 'IS', 'Isernia', 1),
(233, 105, 'AQ', 'Aquila', 1),
(234, 105, 'SP', 'La Spezia', 1),
(235, 105, 'LT', 'Latina', 1),
(236, 105, 'LE', 'Lecce', 1),
(237, 105, 'LC', 'Lecco', 1),
(238, 105, 'LI', 'Livorno', 1),
(239, 105, 'LO', 'Lodi', 1),
(240, 105, 'LU', 'Lucca', 1),
(241, 105, 'MC', 'Macerata', 1),
(242, 105, 'MN', 'Mantova', 1),
(243, 105, 'MS', 'Massa Carrara', 1),
(244, 105, 'MT', 'Matera', 1),
(245, 105, 'VS', 'Medio Campidano', 1),
(246, 105, 'ME', 'Messina', 1),
(247, 105, 'MI', 'Milano', 1),
(248, 105, 'MO', 'Modena', 1),
(249, 105, 'MB', 'Monza e Brianza', 1),
(250, 105, 'NA', 'Napoli', 1),
(251, 105, 'NO', 'Novara', 1),
(252, 105, 'NU', 'Nuoro', 1),
(253, 105, 'OG', 'Ogliastra', 1),
(254, 105, 'OT', 'Olbia-Tempio', 1),
(255, 105, 'OR', 'Oristano', 1),
(256, 105, 'PD', 'Padova', 1),
(257, 105, 'PA', 'Palermo', 1),
(258, 105, 'PR', 'Parma', 1),
(259, 105, 'PG', 'Perugia', 1),
(260, 105, 'PV', 'Pavia', 1),
(261, 105, 'PU', 'Pesaro Urbino', 1),
(262, 105, 'PE', 'Pescara', 1),
(263, 105, 'PC', 'Piacenza', 1),
(264, 105, 'PI', 'Pisa', 1),
(265, 105, 'PT', 'Pistoia', 1),
(266, 105, 'PN', 'Pordenone', 1),
(267, 105, 'PZ', 'Potenza', 1),
(268, 105, 'PO', 'Prato', 1),
(269, 105, 'RG', 'Ragusa', 1),
(270, 105, 'RA', 'Ravenna', 1),
(271, 105, 'RC', 'Reggio Calabria', 1),
(272, 105, 'RE', 'Reggio Emilia', 1),
(273, 105, 'RI', 'Rieti', 1),
(274, 105, 'RN', 'Rimini', 1),
(275, 105, 'RM', 'Roma', 1),
(276, 105, 'RO', 'Rovigo', 1),
(277, 105, 'SA', 'Salerno', 1),
(278, 105, 'SS', 'Sassari', 1),
(279, 105, 'SV', 'Savona', 1),
(280, 105, 'SI', 'Siena', 1),
(281, 105, 'SR', 'Siracusa', 1),
(282, 105, 'SO', 'Sondrio', 1),
(283, 105, 'TA', 'Taranto', 1),
(284, 105, 'TE', 'Teramo', 1),
(285, 105, 'TR', 'Terni', 1),
(286, 105, 'TO', 'Torino', 1),
(287, 105, 'TP', 'Trapani', 1),
(288, 105, 'TN', 'Trento', 1),
(289, 105, 'TV', 'Treviso', 1),
(290, 105, 'TS', 'Trieste', 1),
(291, 105, 'UD', 'Udine', 1),
(292, 105, 'VA', 'Varese', 1),
(293, 105, 'VE', 'Venezia', 1),
(294, 105, 'VB', 'Verbania', 1),
(295, 105, 'VC', 'Vercelli', 1),
(296, 105, 'VR', 'Verona', 1),
(297, 105, 'VV', 'Vibo Valentia', 1),
(298, 105, 'VI', 'Vicenza', 1),
(299, 105, 'VT', 'Viterbo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_statuses`
--

CREATE TABLE IF NOT EXISTS `stock_statuses` (
  `stock_status_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`stock_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `name` varchar(64) NOT NULL,
  `alias` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `description`, `name`, `alias`, `status`) VALUES
(1, 's', 's1', 's1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_config`
--

CREATE TABLE IF NOT EXISTS `store_config` (
  `config_id` int(11) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `firstname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `email` varchar(96) COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` int(1) NOT NULL,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `permission` varchar(240) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`currency_id`),
  ADD CONSTRAINT `carts_ibfk_4` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`customer_group_id`),
  ADD CONSTRAINT `carts_ibfk_5` FOREIGN KEY (`payment_country_id`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `carts_ibfk_6` FOREIGN KEY (`shipping_country_id`) REFERENCES `countries` (`country_id`);

--
-- Constraints for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `cart_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_products_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`);

--
-- Constraints for table `categories_to_stores`
--
ALTER TABLE `categories_to_stores`
  ADD CONSTRAINT `categories_to_stores_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`customer_group_id`),
  ADD CONSTRAINT `customers_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `customers_ibfk_4` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`customer_group_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`payment_country_id`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`currency_id`),
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`order_status_id`),
  ADD CONSTRAINT `orders_ibfk_7` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `order_totals`
--
ALTER TABLE `order_totals`
  ADD CONSTRAINT `order_totals_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`stock_status_id`) REFERENCES `stock_statuses` (`stock_status_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `products_to_categories`
--
ALTER TABLE `products_to_categories`
  ADD CONSTRAINT `products_to_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `products_to_categories_ibfk_2` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_attribute_ibfk_2` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`);

--
-- Constraints for table `seller_to_store`
--
ALTER TABLE `seller_to_store`
  ADD CONSTRAINT `seller_to_store_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `seller_to_store_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`user_group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
