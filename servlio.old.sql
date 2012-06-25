-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2012 at 03:43 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `servlio`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `iCategoryId` int(10) NOT NULL AUTO_INCREMENT,
  `vCategory` varchar(255) NOT NULL,
  `eStatus` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`iCategoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`iCategoryId`, `vCategory`, `eStatus`) VALUES
(1, 'Beauty', 'Active'),
(2, 'Charity', 'Active'),
(3, 'Dental', 'Active'),
(4, 'Events', 'Active'),
(5, 'Fitness', 'Active'),
(6, 'Medical', 'Active'),
(7, 'Restaurants', 'Active'),
(8, 'Shopping', 'Active'),
(9, 'Spas &amp; Wellness', 'Active'),
(10, 'Other', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `iCityId` int(11) NOT NULL AUTO_INCREMENT,
  `vCityName` varchar(50) NOT NULL,
  `iStateId` int(11) NOT NULL,
  PRIMARY KEY (`iCityId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`iCityId`, `vCityName`, `iStateId`) VALUES
(1, 'Aurangabad', 5),
(2, 'Bakhtiarpur', 5),
(3, 'Baniapur', 5),
(4, 'Barahiya', 5),
(5, 'Barauni', 5),
(6, 'Bettiah', 5),
(7, 'Bhabua', 5),
(8, 'Bihar Sharif', 5),
(9, 'Bodh Gaya', 5),
(10, 'Buxar', 5),
(11, 'Chhapra', 5),
(12, 'Danapur', 5),
(13, 'Darbhanga', 5),
(14, 'Dighwara', 5),
(15, 'Gaya', 5),
(16, 'Gopalganj', 5),
(17, 'Hajipur', 5),
(18, 'Jehanabad', 5),
(19, 'Katihar', 5),
(20, 'Kharagpur', 5),
(21, 'Kishanganj', 5),
(22, 'Madhubani', 5),
(23, 'Maharajganj', 5),
(24, 'Mirganj', 5),
(25, 'Motihari', 5),
(26, 'Muzaffarpur', 5),
(27, 'Nalanda', 5),
(28, 'Patna', 5),
(29, 'Purnia', 5),
(30, 'Samastipur', 5),
(31, 'Sasaram', 5),
(32, 'Sitamarhi', 5),
(33, 'Siwan', 5),
(34, 'Sonepur', 5),
(35, 'Bhavnagar', 8),
(36, 'Baroda', 8),
(37, 'Ahmedabad', 8),
(38, 'Ankleshwar ', 8),
(39, 'Bharoch', 8),
(40, 'Bhuj', 8),
(41, 'Bulsar', 8),
(42, 'Bharuch', 8),
(43, 'Dwarka', 8),
(44, 'Div', 8),
(45, 'Vadodara', 8),
(46, 'Vapi ', 8),
(47, 'Godhra', 8),
(48, 'Rajkot', 8),
(49, 'Sachin', 8),
(50, 'Surat', 8),
(51, ' Jamnagar', 8),
(52, 'Porbandar', 8),
(53, 'Mandvi', 8),
(54, 'Vasco da Gama', 7),
(55, 'Chapora', 7),
(56, 'Dabolim', 7),
(57, 'Madgaon', 7),
(58, 'Panaji Port', 7),
(59, 'Panjim', 7),
(60, 'Talpona', 7),
(61, 'Betul', 7),
(62, 'Marmugao (Marmagao)', 7),
(63, 'Kota', 23),
(64, 'Boranada - Jodhpur', 23),
(65, 'Jaipur', 23),
(66, 'Banswara', 23),
(67, 'Jaipur-Kanakpura', 23),
(68, 'Jaipur-Sitapura', 23),
(69, 'Jodhpur-Thar', 23),
(70, 'Bhilwara', 23),
(71, 'Bikaner', 23),
(72, 'Udaipu', 23),
(73, 'Jaisalmer', 23),
(74, 'Munabao Rail Station', 23),
(75, 'Jodhpur-Bhagat Ki Kothi', 23),
(76, 'Jodhpur', 23),
(77, 'Bhiwadi', 23),
(78, 'Bhiwadi', 23),
(79, 'Basni', 23),
(80, 'Barmer Rail Station', 23),
(81, 'Fani', 52),
(82, 'Fenny', 52),
(83, 'Pheni', 52),
(84, 'Maheshpur', 52),
(85, 'Mahespur', 52),
(86, 'Ruhitia', 52),
(87, 'Katalia', 52),
(88, 'Bandua', 52),
(89, 'Daulatpur', 52),
(90, 'Daulatpur', 52),
(91, 'Bangaon', 52),
(92, 'North Gobindapur', 52),
(93, 'Kalidaha', 52),
(94, 'Majhbaria', 52),
(95, 'Uttar Gobindapur', 52),
(96, 'Maduai', 52),
(97, 'Dhonsahadda', 52),
(98, 'Madhuai', 52),
(99, 'Sarish', 52),
(100, 'Sarishadi', 52),
(101, 'Rawalpindi', 65),
(102, 'Kahuta', 65),
(103, 'Haripur', 65),
(104, 'Wah', 65),
(105, 'Murree', 65),
(106, 'Havelian', 65),
(107, 'Khalabat', 65),
(108, 'Kamra', 65),
(109, 'Abbottabad', 65),
(110, 'Gujar Khan', 65),
(111, 'Topi', 65),
(112, 'Hazro', 65),
(113, 'Daultala', 65),
(114, 'Sanjwal', 65),
(115, 'Zaida', 65),
(116, 'Ghasipur', 64),
(117, 'Chak Langa', 64),
(118, 'Nagial', 64),
(119, 'Bidar', 64),
(120, 'Bens', 64),
(121, 'Chak Dilu', 64),
(122, 'Manda', 64),
(123, 'Harchhial', 64),
(124, 'Jangian', 64),
(125, 'Chak Mughlani', 64),
(126, 'Ghasitpur', 64),
(127, 'Ahbdupur', 64),
(128, 'Gande', 64),
(129, 'Chak Qazi', 64),
(130, 'Tatrot', 64),
(131, 'Gobindpur', 64),
(132, 'Burial', 64),
(133, 'Ditial', 64),
(134, 'Juian', 64),
(135, 'Dhudian', 64),
(136, 'Rangpur', 64),
(137, 'Sagar', 64),
(138, 'Barsali', 64),
(139, 'Naugraon', 64),
(140, 'Mughal', 64);

-- --------------------------------------------------------

--
-- Table structure for table `company_location`
--

DROP TABLE IF EXISTS `company_location`;
CREATE TABLE IF NOT EXISTS `company_location` (
  `iCompanyLocationId` int(11) NOT NULL AUTO_INCREMENT,
  `iCountryId` int(11) DEFAULT NULL,
  `iStateId` int(11) DEFAULT NULL,
  `iCityId` int(11) DEFAULT NULL,
  PRIMARY KEY (`iCompanyLocationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `company_location`
--


-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

DROP TABLE IF EXISTS `company_services`;
CREATE TABLE IF NOT EXISTS `company_services` (
  `iCompanyServiceId` int(11) NOT NULL AUTO_INCREMENT,
  `iUserId` int(11) DEFAULT NULL,
  `iServiceId` int(11) NOT NULL,
  `vServiceName` varchar(255) NOT NULL,
  `iCategoryId` int(11) DEFAULT NULL,
  `iCurrencyId` int(11) DEFAULT NULL,
  `fPrice` float(5,2) DEFAULT NULL,
  `vImage` varchar(255) DEFAULT NULL,
  `vDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iCompanyServiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `company_services`
--


-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `iCountryId` int(11) NOT NULL AUTO_INCREMENT,
  `vCountryName` varchar(50) NOT NULL,
  PRIMARY KEY (`iCountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`iCountryId`, `vCountryName`) VALUES
(1, 'Afghanistan'),
(2, 'Argentina'),
(3, 'Austria'),
(4, 'Bahrain'),
(5, 'Bangladesh'),
(6, 'Bhutan'),
(7, 'Brazil '),
(8, 'Canada'),
(9, 'China'),
(10, 'Colombia'),
(11, 'Denmark'),
(12, 'France'),
(13, 'Germany'),
(14, 'Iceland'),
(15, 'India'),
(16, 'Indonesia'),
(17, 'Iran'),
(18, 'Iraq'),
(19, 'Ireland'),
(20, 'Israel'),
(21, 'Italy'),
(22, 'Japan'),
(23, 'Kenya'),
(24, 'Malaysia'),
(25, 'Mexico'),
(26, 'Nepal'),
(27, 'Netherlands'),
(28, 'New Zealand'),
(29, 'Pakistan'),
(30, 'Russian'),
(31, 'Saudi Arabia'),
(32, 'Singapore'),
(33, 'Singapore'),
(34, 'Sri Lanka'),
(35, 'Switzerland'),
(36, 'Thailand'),
(37, 'United Kingdom '),
(38, 'United States'),
(39, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `country_old`
--

DROP TABLE IF EXISTS `country_old`;
CREATE TABLE IF NOT EXISTS `country_old` (
  `iCountryId` int(11) NOT NULL AUTO_INCREMENT,
  `vCode` varchar(50) DEFAULT NULL,
  `vCountry` varchar(50) DEFAULT NULL,
  `eStatus` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`iCountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=260 ;

--
-- Dumping data for table `country_old`
--

INSERT INTO `country_old` (`iCountryId`, `vCode`, `vCountry`, `eStatus`) VALUES
(1, 'UK', 'United Kingdom', '1'),
(2, 'US', 'United States', '1'),
(3, 'CA', 'Canada', '1'),
(4, 'AF', 'Afghanistan', '1'),
(5, 'AL', 'Albania', '1'),
(6, 'AG', 'Algeria', '1'),
(7, 'AQ', 'American Samoa', '1'),
(8, 'AN', 'Andorra', '1'),
(9, 'AO', 'Angola', '1'),
(10, 'AV', 'Anguilla', '1'),
(11, 'AC', 'Antigua and Barbuda', '1'),
(12, 'AR', 'Argentina', '1'),
(13, 'AM', 'Armenia', '1'),
(14, 'AA', 'Aruba', '1'),
(15, 'AT', 'Ashmore and Cartier Islands', '1'),
(16, 'AS', 'Australia', '1'),
(17, 'AU', 'Austria', '1'),
(18, 'AJ', 'Azerbaijan', '1'),
(19, 'BF', 'Bahamas, The', '1'),
(20, 'BA', 'Bahrain', '1'),
(21, 'FQ', 'Baker Island', '1'),
(22, 'BG', 'Bangladesh', '1'),
(23, 'BB', 'Barbados', '1'),
(24, 'BS', 'Bassas da India', '1'),
(25, 'BO', 'Belarus', '1'),
(26, 'BE', 'Belgium', '1'),
(27, 'BH', 'Belize', '1'),
(28, 'BN', 'Benin', '1'),
(29, 'BD', 'Bermuda', '1'),
(30, 'BT', 'Bhutan', '1'),
(31, 'BL', 'Bolivia', '1'),
(32, 'BK', 'Bosnia and Herzegovina', '1'),
(33, 'BC', 'Botswana', '1'),
(34, 'BV', 'Bouvet Island', '1'),
(35, 'BR', 'Brazil', '1'),
(36, 'IO', 'British Indian Ocean Territory', '1'),
(37, 'VI', 'British Virgin Islands', '1'),
(38, 'BX', 'Brunei', '1'),
(39, 'BU', 'Bulgaria', '1'),
(40, 'UV', 'Burkina Faso', '1'),
(41, 'BM', 'Burma', '1'),
(42, 'BY', 'Burundi', '1'),
(43, 'CB', 'Cambodia', '1'),
(44, 'CM', 'Cameroon', '1'),
(45, 'CA', 'Canada', '1'),
(46, 'CV', 'Cape Verde', '1'),
(47, 'CJ', 'Cayman Islands', '1'),
(48, 'CT', 'Central African Republic', '1'),
(49, 'CD', 'Chad', '1'),
(50, 'CI', 'Chile', '1'),
(51, 'CH', 'China', '1'),
(52, 'KT', 'Christmas Island', '1'),
(53, 'IP', 'Clipperton Island', '1'),
(54, 'CK', 'Cocos (Keeling) Islands', '1'),
(55, 'CO', 'Colombia', '1'),
(56, 'CN', 'Comoros', '1'),
(57, 'CF', 'Congo, Republic of the', '1'),
(58, 'CW', 'Cook Islands', '1'),
(59, 'CR', 'Coral Sea Islands', '1'),
(60, 'CS', 'Costa Rica', '1'),
(61, 'IV', 'Cote d''Ivoire', '1'),
(62, 'HR', 'Croatia', '1'),
(63, 'CU', 'Cuba', '1'),
(64, 'CY', 'Cyprus', '1'),
(65, 'EZ', 'Czech Republic', '1'),
(66, 'DA', 'Denmark', '1'),
(67, 'DJ', 'Djibouti', '1'),
(68, 'DO', 'Dominica', '1'),
(69, 'DR', 'Dominican Republic', '1'),
(70, 'TT', 'East Timor', '1'),
(71, 'EC', 'Ecuador', '1'),
(72, 'EG', 'Egypt', '1'),
(73, 'ES', 'El Salvador', '1'),
(74, 'EK', 'Equatorial Guinea', '1'),
(75, 'ER', 'Eritrea', '1'),
(76, 'EN', 'Estonia', '1'),
(77, 'ET', 'Ethiopia', '1'),
(78, 'EU', 'Europa Island', '1'),
(79, 'FK', 'Falkland Islands (Islas Malvinas)', '1'),
(80, 'FO', 'Faroe Islands', '1'),
(81, 'FJ', 'Fiji', '1'),
(82, 'FI', 'Finland', '1'),
(83, 'FR', 'France', '1'),
(84, '-', 'Zaire', '1'),
(85, 'FG', 'French Guiana', '1'),
(86, 'FP', 'French Polynesia', '1'),
(87, 'GB', 'Gabon', '1'),
(88, 'GA', 'Gambia, The', '1'),
(89, 'GZ', 'Gaza Strip', '1'),
(90, 'GG', 'Georgia', '1'),
(91, 'GM', 'Germany', '1'),
(92, 'GH', 'Ghana', '1'),
(93, 'GI', 'Gibraltar', '1'),
(94, 'GO', 'Glorioso Islands', '1'),
(95, 'GR', 'Greece', '1'),
(96, 'GL', 'Greenland', '1'),
(97, 'GJ', 'Grenada', '1'),
(98, 'GP', 'Guadeloupe', '1'),
(99, 'GQ', 'Guam', '1'),
(100, 'GT', 'Guatemala', '1'),
(101, 'GK', 'Guernsey', '1'),
(102, 'GV', 'Guinea', '1'),
(103, 'PU', 'Guinea-Bissau', '1'),
(104, 'GY', 'Guyana', '1'),
(105, 'HA', 'Haiti', '1'),
(106, 'HM', 'Heard Island and McDonald Islands', '1'),
(107, 'VT', 'Holy See (Vatican City)', '1'),
(108, 'HO', 'Honduras', '1'),
(109, 'HK', 'Hong Kong', '1'),
(110, 'HQ', 'Howland Island', '1'),
(111, 'HU', 'Hungary', '1'),
(112, 'IC', 'Iceland', '1'),
(113, 'IN', 'India', '1'),
(114, 'ID', 'Indonesia', '1'),
(115, 'IR', 'Iran', '1'),
(116, 'IZ', 'Iraq', '1'),
(117, 'EI', 'Ireland', '1'),
(118, 'IS', 'Israel', '1'),
(119, 'IT', 'Italy', '1'),
(120, 'JM', 'Jamaica', '1'),
(121, 'JN', 'Jan Mayen', '1'),
(122, 'JA', 'Japan', '1'),
(123, 'DQ', 'Jarvis Island', '1'),
(124, 'JE', 'Jersey', '1'),
(125, 'JQ', 'Johnston Atoll', '1'),
(126, 'JO', 'Jordan', '1'),
(127, 'JU', 'Juan de Nova Island', '1'),
(128, 'KZ', 'Kazakhstan', '1'),
(129, 'KE', 'Kenya', '1'),
(130, 'KQ', 'Kingman Reef', '1'),
(131, 'KR', 'Kiribati', '1'),
(132, 'KN', 'Korea, North', '1'),
(133, 'KS', 'Korea, South', '1'),
(134, 'KU', 'Kuwait', '1'),
(135, 'KG', 'Kyrgyzstan', '1'),
(136, 'LA', 'Laos', '1'),
(137, 'LG', 'Latvia', '1'),
(138, 'LE', 'Lebanon', '1'),
(139, 'LT', 'Lesotho', '1'),
(140, 'LI', 'Liberia', '1'),
(141, 'LY', 'Libyan Arab', '1'),
(142, 'LS', 'Liechtenstein', '1'),
(143, 'LH', 'Lithuania', '1'),
(144, 'LU', 'Luxembourg', '1'),
(145, 'MC', 'Macau', '1'),
(146, 'MK', 'Macedonia', '1'),
(147, 'MA', 'Madagascar', '1'),
(148, 'MI', 'Malawi', '1'),
(149, 'MY', 'Malaysia', '1'),
(150, 'MV', 'Maldives', '1'),
(151, 'ML', 'Mali', '1'),
(152, 'MT', 'Malta', '1'),
(153, 'IM', 'Man, Isle of', '1'),
(154, 'RM', 'Marshall Islands', '1'),
(155, 'MB', 'Martinique', '1'),
(156, 'MR', 'Mauritania', '1'),
(157, 'MP', 'Mauritius', '1'),
(158, 'MF', 'Mayotte', '1'),
(159, 'MX', 'Mexico', '1'),
(160, 'MQ', 'Midway Islands', '1'),
(161, 'MD', 'Moldova, Republic of', '1'),
(162, 'MN', 'Monaco', '1'),
(163, 'MG', 'Mongolia', '1'),
(164, 'ME', 'Montenegro', '1'),
(165, 'MH', 'Montserrat', '1'),
(166, 'MO', 'Morocco', '1'),
(167, 'MZ', 'Mozambique', '1'),
(168, 'WA', 'Namibia', '1'),
(169, 'NR', 'Nauru', '1'),
(170, 'BQ', 'Navassa Island', '1'),
(171, 'NP', 'Nepal', '1'),
(172, 'NL', 'Netherlands', '1'),
(173, 'NT', 'Netherlands Antilles', '1'),
(174, 'NC', 'New Caledonia', '1'),
(175, 'NZ', 'New Zealand', '1'),
(176, 'NU', 'Nicaragua', '1'),
(177, 'NG', 'Niger', '1'),
(178, 'NI', 'Nigeria', '1'),
(179, 'NE', 'Niue', '1'),
(180, 'NF', 'Norfolk Island', '1'),
(181, 'CQ', 'Northern Mariana Islands', '1'),
(182, 'NO', 'Norway', '1'),
(183, 'MU', 'Oman', '1'),
(184, 'PK', 'Pakistan', '1'),
(185, 'PS', 'Palau', '1'),
(186, 'LQ', 'Palmyra Atoll', '1'),
(187, 'PM', 'Panama', '1'),
(188, 'PP', 'Papua New Guinea', '1'),
(189, 'PF', 'Paracel Islands', '1'),
(190, 'PA', 'Paraguay', '1'),
(191, 'PE', 'Peru', '1'),
(192, 'RP', 'Philippines', '1'),
(193, 'PC', 'Pitcairn Islands', '1'),
(194, 'PL', 'Poland', '1'),
(195, 'PO', 'Portugal', '1'),
(196, 'RQ', 'Puerto Rico', '1'),
(197, 'QA', 'Qatar', '1'),
(198, 'RE', 'Reunion', '1'),
(199, 'RO', 'Romania', '1'),
(200, 'RS', 'Russia', '1'),
(201, 'RW', 'Rwanda', '1'),
(202, 'SH', 'Saint Helena', '1'),
(203, 'SC', 'Saint Kitts and Nevis', '1'),
(204, 'ST', 'Saint Lucia', '1'),
(205, 'SB', 'Saint Pierre and Miquelon', '1'),
(206, 'VC', 'Saint Vincent and the Grenadines', '1'),
(207, 'WS', 'Samoa', '1'),
(208, 'SM', 'San Marino', '1'),
(209, 'TP', 'Sao Tome and Principe', '1'),
(210, 'SA', 'Saudi Arabia', '1'),
(211, 'SG', 'Senegal', '1'),
(212, 'RB', 'Serbia', '1'),
(213, 'SE', 'Seychelles', '1'),
(214, 'SL', 'Sierra Leone', '1'),
(215, 'SN', 'Singapore', '1'),
(216, 'LO', 'Slovakia', '1'),
(217, 'SI', 'Slovenia', '1'),
(218, 'BP', 'Solomon Islands', '1'),
(219, 'SO', 'Somalia', '1'),
(220, 'SF', 'South Africa', '1'),
(221, 'SX', 'South Georgia and the Islands', '1'),
(222, 'SP', 'Spain', '1'),
(223, 'PG', 'Spratly Islands', '1'),
(224, 'CE', 'Sri Lanka', '1'),
(225, 'SU', 'Sudan', '1'),
(226, 'NS', 'Suriname', '1'),
(227, 'SV', 'Svalbard', '1'),
(228, 'WZ', 'Swaziland', '1'),
(229, 'SW', 'Sweden', '1'),
(230, 'SZ', 'Switzerland', '1'),
(231, 'SY', 'Syrian Arab Republic', '1'),
(232, 'TW', 'Taiwan', '1'),
(233, 'TI', 'Tajikistan', '1'),
(234, 'TZ', 'Tanzania, United Republic of', '1'),
(235, 'TH', 'Thailand', '1'),
(236, 'TO', 'Togo', '1'),
(237, 'TL', 'Tokelau', '1'),
(238, 'TN', 'Tonga', '1'),
(239, 'TD', 'Trinidad and Tobago', '1'),
(240, 'TE', 'Tromelin Island', '1'),
(241, 'TS', 'Tunisia', '1'),
(242, 'TU', 'Turkey', '1'),
(243, 'TX', 'Turkmenistan', '1'),
(244, 'TK', 'Turks and Caicos Islands', '1'),
(245, 'TV', 'Tuvalu', '1'),
(246, 'UG', 'Uganda', '1'),
(247, 'UP', 'Ukraine', '1'),
(248, 'AE', 'United Arab Emirates', '1'),
(249, 'UY', 'Uruguay', '1'),
(250, 'UZ', 'Uzbekistan', '1'),
(251, 'NH', 'Vanuatu', '1'),
(252, 'VE', 'Venezuela', '1'),
(253, 'VM', 'Vietnam', '1'),
(254, 'VQ', 'Virgin Islands (US)', '1'),
(255, 'WQ', 'Wake Island', '1'),
(256, 'WF', 'Wallis and Futuna', '1'),
(257, 'WE', 'West Bank', '1'),
(258, 'WI', 'Western Sahara', '1'),
(259, 'YM', 'Yemen', '1');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `iCurrencyId` int(11) NOT NULL AUTO_INCREMENT,
  `vCurrencyVal` varchar(10) NOT NULL,
  `vCurrencySymbol` varchar(5) NOT NULL,
  `vCurrency` varchar(255) NOT NULL,
  `eStatus` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`iCurrencyId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`iCurrencyId`, `vCurrencyVal`, `vCurrencySymbol`, `vCurrency`, `eStatus`) VALUES
(1, 'GBP', '£', 'British pound - £', 'Active'),
(2, 'USD', '$', 'United States dollar - $', 'Active'),
(3, 'CAD', '$', 'Canadian dollar - $', 'Active'),
(4, 'EUR', '€', 'Euro - €', ''),
(5, 'AFN', '?', 'Afghan afghani - ?', 'Active'),
(6, 'ALL', 'L', 'Albanian lek - L', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `iServiceId` int(11) NOT NULL AUTO_INCREMENT,
  `vService` varchar(255) NOT NULL,
  `eStatus` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`iServiceId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`iServiceId`, `vService`, `eStatus`) VALUES
(1, 'All services', 'Active'),
(2, 'Personal Training', 'Active'),
(3, 'Pilates', 'Active'),
(4, 'Yoga', 'Active'),
(5, 'Jogging', 'Active'),
(6, 'Boxing', 'Active'),
(7, 'My service is not listed', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `iStateId` int(11) NOT NULL AUTO_INCREMENT,
  `vStateName` varchar(50) NOT NULL,
  `iCountryId` int(11) NOT NULL,
  PRIMARY KEY (`iStateId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`iStateId`, `vStateName`, `iCountryId`) VALUES
(1, 'Andra Pradesh', 15),
(2, 'Arunachal Pradesh', 15),
(4, 'Assam', 15),
(5, 'Bihar', 15),
(6, 'Chhattisgarh', 15),
(7, 'Goa', 15),
(8, 'Gujarat', 15),
(9, 'Haryana', 15),
(10, 'Himachal Pradesh', 15),
(11, 'Jammu and Kashmir', 15),
(12, 'Jharkhand', 15),
(13, 'Karnataka', 15),
(14, 'Kerala', 15),
(15, 'Madya Pradesh', 15),
(16, 'Maharashtra', 15),
(17, 'Manipur', 15),
(18, 'Meghalaya', 15),
(19, 'Mizoram', 15),
(20, 'Nagaland', 15),
(21, 'Orissa', 15),
(22, 'Punjab', 15),
(23, 'Rajasthan', 15),
(24, 'Sikkim', 15),
(25, 'Tamil Nadu', 15),
(26, 'Tripura', 15),
(27, 'Uttaranchal', 15),
(28, 'Uttar Pradesh', 15),
(29, 'West Bengal', 15),
(30, 'Badakhshan', 1),
(31, 'Badghis', 1),
(32, 'Farah', 1),
(33, 'Faryab', 1),
(34, 'Helmand', 1),
(35, 'Herat', 1),
(36, 'Kabul', 1),
(37, 'Kunduz', 1),
(38, 'Oruzgan', 1),
(39, 'Paktia', 1),
(40, 'Panjshir', 1),
(41, 'Velayat-e Khowst', 1),
(42, 'Velayat-e Nurestan', 1),
(43, 'Wilayat-e Baghlan', 1),
(44, 'Wilayat-e Balkh', 1),
(45, 'Wilayat-e Bamyan', 1),
(46, 'Wilayat-e Daykundi', 1),
(47, 'Capital Governorate', 4),
(48, 'Central Governorate', 4),
(49, 'Muharraq', 4),
(50, 'Northern Governorate', 4),
(51, 'Southern Governorate', 4),
(52, 'Borishal', 5),
(53, 'Chittagong', 5),
(54, 'Dhaka Division', 5),
(55, 'Khulna Division', 5),
(56, 'Rajshahi Division', 5),
(57, 'Rangpur Division', 5),
(58, 'Sylhet Division', 5),
(59, 'Punjab', 29),
(60, 'Sindh', 29),
(61, 'North-West Frontier', 29),
(62, 'Balochistan', 29),
(63, 'Northern Areas', 29),
(64, 'Azad Kashmir', 29),
(65, 'Islamabad', 29),
(66, 'Tianjin', 9),
(67, 'Shandong', 9),
(68, 'Fujian', 9),
(69, 'Guangdong', 9),
(70, 'Hainan', 9),
(71, 'Shaanxi', 9),
(72, 'Beijing', 9),
(73, 'Jiangxi', 9),
(74, 'Xinjiang', 9),
(75, 'Shanxi', 9),
(76, 'Suihua', 9),
(77, 'Ningxia', 9),
(78, 'Guizhou', 9),
(79, 'Gansu', 9),
(80, 'Xianggang', 9),
(81, 'Shanghai', 9),
(82, 'Jilin', 9),
(83, 'Hunan', 9),
(84, 'Jiangsu', 9),
(85, 'Heilongjiang', 9),
(86, 'Hubei', 9),
(87, 'Zhejiang', 9),
(88, 'Sichuan', 9),
(89, 'Xizang', 9),
(90, 'Henan', 9),
(91, 'Seti', 26),
(92, 'Bheri', 26),
(93, 'Dhawalagiri', 26),
(94, 'Gandaki', 26),
(95, 'Bagmati', 26),
(96, 'Karnali', 26),
(97, 'Kosi', 26),
(98, 'Lumbini', 26),
(99, 'Mahakali', 26),
(100, 'Mechi', 26),
(101, 'Narayani', 26),
(102, 'Rapti', 26),
(103, 'Sagarmatha', 26),
(104, 'zanakpur', 26);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `iTemplateId` int(11) NOT NULL AUTO_INCREMENT,
  `iUserId` int(11) DEFAULT NULL,
  `vTitle` varchar(200) DEFAULT NULL,
  `vImage` varchar(200) DEFAULT NULL,
  `dtAddedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eStatus` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`iTemplateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `templates`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iUserId` int(11) NOT NULL AUTO_INCREMENT,
  `vFirstName` varchar(200) DEFAULT NULL,
  `vLastName` varchar(200) DEFAULT NULL,
  `vCompanyName` varchar(200) DEFAULT NULL,
  `vCompanyLogo` varchar(255) DEFAULT NULL,
  `vAddress` varchar(255) DEFAULT NULL,
  `vEmail` varchar(100) DEFAULT NULL,
  `vPassword` varchar(100) DEFAULT NULL,
  `vWebSite` varchar(100) DEFAULT NULL,
  `vTwitter` varchar(100) DEFAULT NULL,
  `vPhone` varchar(100) DEFAULT NULL,
  `dtAddedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eStatus` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`iUserId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

