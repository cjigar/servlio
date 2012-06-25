-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2012 at 08:38 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `servlio`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_location`
--

CREATE TABLE IF NOT EXISTS `company_location` (
  `iCompanyLocationId` int(11) DEFAULT NULL,
  `iCountryId` int(11) DEFAULT NULL,
  `iStateId` int(11) DEFAULT NULL,
  `iCityId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

CREATE TABLE IF NOT EXISTS `company_services` (
  `iCompanyServiceId` int(11) DEFAULT NULL,
  `iUserId` int(11) DEFAULT NULL,
  `iCategoryId` int(11) DEFAULT NULL,
  `iCurrencyId` int(11) DEFAULT NULL,
  `fPrice` float(5,2) DEFAULT NULL,
  `vImage` varchar(255) DEFAULT NULL,
  `vDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `iCountryId` int(11) NOT NULL AUTO_INCREMENT,
  `vCode` varchar(50) DEFAULT NULL,
  `vCountry` varchar(50) DEFAULT NULL,
  `eStatus` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`iCountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=260 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`iCountryId`, `vCode`, `vCountry`, `eStatus`) VALUES
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
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `iTemplateId` int(11) NOT NULL AUTO_INCREMENT,
  `iUserId` int(11) DEFAULT NULL,
  `vTitle` varchar(200) DEFAULT NULL,
  `vImage` varchar(200) DEFAULT NULL,
  `dtAddedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eStatus` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`iTemplateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
