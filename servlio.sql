/*
SQLyog Ultimate v8.55 
MySQL - 5.5.16 : Database - servlio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `iCategoryId` int(10) NOT NULL AUTO_INCREMENT,
  `vCategory` varchar(255) NOT NULL,
  `eStatus` enum('Active','Inactive') NOT NULL,
  PRIMARY KEY (`iCategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`iCategoryId`,`vCategory`,`eStatus`) values (1,'Beauty','Active'),(2,'Charity','Active'),(3,'Dental','Active'),(4,'Events','Active'),(5,'Fitness','Active'),(6,'Medical','Active'),(7,'Restaurants','Active'),(8,'Shopping','Active'),(9,'Spas &amp; Wellness','Active'),(10,'Other','Active');

/*Table structure for table `company_location` */

DROP TABLE IF EXISTS `company_location`;

CREATE TABLE `company_location` (
  `iCompanyLocationId` int(11) NOT NULL AUTO_INCREMENT,
  `iCompanyServiceId` int(11) DEFAULT NULL,
  `iUserId` int(11) DEFAULT NULL,
  `vCountryCode` varchar(100) DEFAULT NULL,
  `vStateCode` varchar(100) DEFAULT NULL,
  `iCityId` int(11) DEFAULT NULL,
  PRIMARY KEY (`iCompanyLocationId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `company_location` */

insert  into `company_location`(`iCompanyLocationId`,`iCompanyServiceId`,`iUserId`,`vCountryCode`,`vStateCode`,`iCityId`) values (1,1,1,'15','8',37),(2,3,4,'15','8',37),(3,4,5,'15','8',37),(4,5,6,'15','8',37),(5,6,7,'US','NY',152172),(6,7,8,'IN','',124547),(7,8,9,'IN','',124547),(8,9,10,'US','AK',163396);

/*Table structure for table `company_services` */

DROP TABLE IF EXISTS `company_services`;

CREATE TABLE `company_services` (
  `iCompanyServiceId` int(11) NOT NULL AUTO_INCREMENT,
  `iUserId` int(11) DEFAULT NULL,
  `iServiceId` int(11) DEFAULT NULL,
  `vServiceName` varchar(255) DEFAULT NULL,
  `iCategoryId` int(11) DEFAULT NULL,
  `iCurrencyId` int(11) DEFAULT NULL,
  `fPrice` float(5,2) DEFAULT NULL,
  `vImage` varchar(255) DEFAULT NULL,
  `vDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iCompanyServiceId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `company_services` */

insert  into `company_services`(`iCompanyServiceId`,`iUserId`,`iServiceId`,`vServiceName`,`iCategoryId`,`iCurrencyId`,`fPrice`,`vImage`,`vDescription`) values (1,1,3,'',5,0,100.00,'1340456546gallery_image1.jpg','teststs'),(2,1,3,'',5,0,100.00,'1340456724gallery_image1.jpg','teststs'),(3,4,3,'',5,0,100.00,'1340456819gallery_image1.jpg','teststs'),(4,5,4,'',5,0,100.00,'1340623569mattroberts2.jpg','testes'),(5,6,4,'',5,0,100.00,'1340623686mattroberts2.jpg','testes'),(6,7,2,'',5,0,100.00,'1340660484','small desciption are this'),(7,8,0,'',5,1,123.00,'1340665611mattroberts2.jpg','Upload an image that best represents this service. You can always change it after your listing has been created.'),(8,9,0,'',5,1,123.00,'1340665761mattroberts2.jpg','Upload an image that best represents this service. You can always change it after your listing has been created.'),(9,10,4,'',5,2,100.00,'1340707114mr1.jpg','Personal Training is all about staying motivated, getting results and getting them on schedule. We recognise that every client is individual, and we know that every client requires a bespoke programme.');

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `iCountryId` int(11) NOT NULL AUTO_INCREMENT,
  `vCountryCode` varchar(50) DEFAULT NULL,
  `vCountry` varchar(50) DEFAULT NULL,
  `eStatus` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`iCountryId`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1;

/*Data for the table `country` */

insert  into `country`(`iCountryId`,`vCountryCode`,`vCountry`,`eStatus`) values (1,'UK','United Kingdom','1'),(2,'US','United States','1'),(3,'CA','Canada','1'),(4,'AF','Afghanistan','1'),(5,'AL','Albania','1'),(6,'AG','Algeria','1'),(7,'AQ','American Samoa','1'),(8,'AN','Andorra','1'),(9,'AO','Angola','1'),(10,'AV','Anguilla','1'),(11,'AC','Antigua and Barbuda','1'),(12,'AR','Argentina','1'),(13,'AM','Armenia','1'),(14,'AA','Aruba','1'),(15,'AT','Ashmore and Cartier Islands','1'),(16,'AS','Australia','1'),(17,'AU','Austria','1'),(18,'AJ','Azerbaijan','1'),(19,'BF','Bahamas, The','1'),(20,'BA','Bahrain','1'),(21,'FQ','Baker Island','1'),(22,'BG','Bangladesh','1'),(23,'BB','Barbados','1'),(24,'BS','Bassas da India','1'),(25,'BO','Belarus','1'),(26,'BE','Belgium','1'),(27,'BH','Belize','1'),(28,'BN','Benin','1'),(29,'BD','Bermuda','1'),(30,'BT','Bhutan','1'),(31,'BL','Bolivia','1'),(32,'BK','Bosnia and Herzegovina','1'),(33,'BC','Botswana','1'),(34,'BV','Bouvet Island','1'),(35,'BR','Brazil','1'),(36,'IO','British Indian Ocean Territory','1'),(37,'VI','British Virgin Islands','1'),(38,'BX','Brunei','1'),(39,'BU','Bulgaria','1'),(40,'UV','Burkina Faso','1'),(41,'BM','Burma','1'),(42,'BY','Burundi','1'),(43,'CB','Cambodia','1'),(44,'CM','Cameroon','1'),(45,'CA','Canada','1'),(46,'CV','Cape Verde','1'),(47,'CJ','Cayman Islands','1'),(48,'CT','Central African Republic','1'),(49,'CD','Chad','1'),(50,'CI','Chile','1'),(51,'CH','China','1'),(52,'KT','Christmas Island','1'),(53,'IP','Clipperton Island','1'),(54,'CK','Cocos (Keeling) Islands','1'),(55,'CO','Colombia','1'),(56,'CN','Comoros','1'),(57,'CF','Congo, Republic of the','1'),(58,'CW','Cook Islands','1'),(59,'CR','Coral Sea Islands','1'),(60,'CS','Costa Rica','1'),(61,'IV','Cote d\'Ivoire','1'),(62,'HR','Croatia','1'),(63,'CU','Cuba','1'),(64,'CY','Cyprus','1'),(65,'EZ','Czech Republic','1'),(66,'DA','Denmark','1'),(67,'DJ','Djibouti','1'),(68,'DO','Dominica','1'),(69,'DR','Dominican Republic','1'),(70,'TT','East Timor','1'),(71,'EC','Ecuador','1'),(72,'EG','Egypt','1'),(73,'ES','El Salvador','1'),(74,'EK','Equatorial Guinea','1'),(75,'ER','Eritrea','1'),(76,'EN','Estonia','1'),(77,'ET','Ethiopia','1'),(78,'EU','Europa Island','1'),(79,'FK','Falkland Islands (Islas Malvinas)','1'),(80,'FO','Faroe Islands','1'),(81,'FJ','Fiji','1'),(82,'FI','Finland','1'),(83,'FR','France','1'),(84,'-','Zaire','1'),(85,'FG','French Guiana','1'),(86,'FP','French Polynesia','1'),(87,'GB','Gabon','1'),(88,'GA','Gambia, The','1'),(89,'GZ','Gaza Strip','1'),(90,'GG','Georgia','1'),(91,'GM','Germany','1'),(92,'GH','Ghana','1'),(93,'GI','Gibraltar','1'),(94,'GO','Glorioso Islands','1'),(95,'GR','Greece','1'),(96,'GL','Greenland','1'),(97,'GJ','Grenada','1'),(98,'GP','Guadeloupe','1'),(99,'GQ','Guam','1'),(100,'GT','Guatemala','1'),(101,'GK','Guernsey','1'),(102,'GV','Guinea','1'),(103,'PU','Guinea-Bissau','1'),(104,'GY','Guyana','1'),(105,'HA','Haiti','1'),(106,'HM','Heard Island and McDonald Islands','1'),(107,'VT','Holy See (Vatican City)','1'),(108,'HO','Honduras','1'),(109,'HK','Hong Kong','1'),(110,'HQ','Howland Island','1'),(111,'HU','Hungary','1'),(112,'IC','Iceland','1'),(113,'IN','India','1'),(114,'ID','Indonesia','1'),(115,'IR','Iran','1'),(116,'IZ','Iraq','1'),(117,'EI','Ireland','1'),(118,'IS','Israel','1'),(119,'IT','Italy','1'),(120,'JM','Jamaica','1'),(121,'JN','Jan Mayen','1'),(122,'JA','Japan','1'),(123,'DQ','Jarvis Island','1'),(124,'JE','Jersey','1'),(125,'JQ','Johnston Atoll','1'),(126,'JO','Jordan','1'),(127,'JU','Juan de Nova Island','1'),(128,'KZ','Kazakhstan','1'),(129,'KE','Kenya','1'),(130,'KQ','Kingman Reef','1'),(131,'KR','Kiribati','1'),(132,'KN','Korea, North','1'),(133,'KS','Korea, South','1'),(134,'KU','Kuwait','1'),(135,'KG','Kyrgyzstan','1'),(136,'LA','Laos','1'),(137,'LG','Latvia','1'),(138,'LE','Lebanon','1'),(139,'LT','Lesotho','1'),(140,'LI','Liberia','1'),(141,'LY','Libyan Arab','1'),(142,'LS','Liechtenstein','1'),(143,'LH','Lithuania','1'),(144,'LU','Luxembourg','1'),(145,'MC','Macau','1'),(146,'MK','Macedonia','1'),(147,'MA','Madagascar','1'),(148,'MI','Malawi','1'),(149,'MY','Malaysia','1'),(150,'MV','Maldives','1'),(151,'ML','Mali','1'),(152,'MT','Malta','1'),(153,'IM','Man, Isle of','1'),(154,'RM','Marshall Islands','1'),(155,'MB','Martinique','1'),(156,'MR','Mauritania','1'),(157,'MP','Mauritius','1'),(158,'MF','Mayotte','1'),(159,'MX','Mexico','1'),(160,'MQ','Midway Islands','1'),(161,'MD','Moldova, Republic of','1'),(162,'MN','Monaco','1'),(163,'MG','Mongolia','1'),(164,'ME','Montenegro','1'),(165,'MH','Montserrat','1'),(166,'MO','Morocco','1'),(167,'MZ','Mozambique','1'),(168,'WA','Namibia','1'),(169,'NR','Nauru','1'),(170,'BQ','Navassa Island','1'),(171,'NP','Nepal','1'),(172,'NL','Netherlands','1'),(173,'NT','Netherlands Antilles','1'),(174,'NC','New Caledonia','1'),(175,'NZ','New Zealand','1'),(176,'NU','Nicaragua','1'),(177,'NG','Niger','1'),(178,'NI','Nigeria','1'),(179,'NE','Niue','1'),(180,'NF','Norfolk Island','1'),(181,'CQ','Northern Mariana Islands','1'),(182,'NO','Norway','1'),(183,'MU','Oman','1'),(184,'PK','Pakistan','1'),(185,'PS','Palau','1'),(186,'LQ','Palmyra Atoll','1'),(187,'PM','Panama','1'),(188,'PP','Papua New Guinea','1'),(189,'PF','Paracel Islands','1'),(190,'PA','Paraguay','1'),(191,'PE','Peru','1'),(192,'RP','Philippines','1'),(193,'PC','Pitcairn Islands','1'),(194,'PL','Poland','1'),(195,'PO','Portugal','1'),(196,'RQ','Puerto Rico','1'),(197,'QA','Qatar','1'),(198,'RE','Reunion','1'),(199,'RO','Romania','1'),(200,'RS','Russia','1'),(201,'RW','Rwanda','1'),(202,'SH','Saint Helena','1'),(203,'SC','Saint Kitts and Nevis','1'),(204,'ST','Saint Lucia','1'),(205,'SB','Saint Pierre and Miquelon','1'),(206,'VC','Saint Vincent and the Grenadines','1'),(207,'WS','Samoa','1'),(208,'SM','San Marino','1'),(209,'TP','Sao Tome and Principe','1'),(210,'SA','Saudi Arabia','1'),(211,'SG','Senegal','1'),(212,'RB','Serbia','1'),(213,'SE','Seychelles','1'),(214,'SL','Sierra Leone','1'),(215,'SN','Singapore','1'),(216,'LO','Slovakia','1'),(217,'SI','Slovenia','1'),(218,'BP','Solomon Islands','1'),(219,'SO','Somalia','1'),(220,'SF','South Africa','1'),(221,'SX','South Georgia and the Islands','1'),(222,'SP','Spain','1'),(223,'PG','Spratly Islands','1'),(224,'CE','Sri Lanka','1'),(225,'SU','Sudan','1'),(226,'NS','Suriname','1'),(227,'SV','Svalbard','1'),(228,'WZ','Swaziland','1'),(229,'SW','Sweden','1'),(230,'SZ','Switzerland','1'),(231,'SY','Syrian Arab Republic','1'),(232,'TW','Taiwan','1'),(233,'TI','Tajikistan','1'),(234,'TZ','Tanzania, United Republic of','1'),(235,'TH','Thailand','1'),(236,'TO','Togo','1'),(237,'TL','Tokelau','1'),(238,'TN','Tonga','1'),(239,'TD','Trinidad and Tobago','1'),(240,'TE','Tromelin Island','1'),(241,'TS','Tunisia','1'),(242,'TU','Turkey','1'),(243,'TX','Turkmenistan','1'),(244,'TK','Turks and Caicos Islands','1'),(245,'TV','Tuvalu','1'),(246,'UG','Uganda','1'),(247,'UP','Ukraine','1'),(248,'AE','United Arab Emirates','1'),(249,'UY','Uruguay','1'),(250,'UZ','Uzbekistan','1'),(251,'NH','Vanuatu','1'),(252,'VE','Venezuela','1'),(253,'VM','Vietnam','1'),(254,'VQ','Virgin Islands (US)','1'),(255,'WQ','Wake Island','1'),(256,'WF','Wallis and Futuna','1'),(257,'WE','West Bank','1'),(258,'WI','Western Sahara','1'),(259,'YM','Yemen','1');

/*Table structure for table `currencies` */

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `iCurrencyId` int(11) NOT NULL AUTO_INCREMENT,
  `vCurrencyVal` varchar(10) NOT NULL,
  `vCurrencySymbol` varchar(5) NOT NULL,
  `vCurrency` varchar(255) NOT NULL,
  `eStatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iCurrencyId`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

/*Data for the table `currencies` */

insert  into `currencies`(`iCurrencyId`,`vCurrencyVal`,`vCurrencySymbol`,`vCurrency`,`eStatus`) values (1,'GBP','£','British pound - £',1),(2,'USD','$','United States dollar - $',1),(3,'CAD','$','Canadian dollar - $',1),(4,'EUR','€','Euro - €',1),(5,'AFN','?','Afghan afghani - ?',1),(6,'ALL','L','Albanian lek - L',1),(7,'DZD','?.?','Algerian dinar - ?.?',1),(8,'AOA','Kz','Angolan kwanza - Kz',1),(9,'ARS','$','Argentine peso - $',1),(10,'AMD','??.','Armenian dram - ??.',1),(11,'AWG','ƒ','Aruban florin - ƒ',1),(12,'AUD','$','Australian dollar - $',1),(13,'AZN','¤','Azerbaijani manat - ¤',1),(14,'BSD','$','Bahamian dollar - $',1),(15,'BHD','?.?','Bahraini dinar - ?.?',1),(16,'BDT','¤','Bangladeshi taka - ¤',1),(17,'BBD','$','Barbadian dollar - $',1),(18,'BYR','Br','Belarusian ruble - Br',1),(19,'BZD','$','Belize dollar - $',1),(20,'BMD','$','Bermudian dollar - $',1),(21,'BTN','¤','Bhutanese ngultrum - ¤',1),(22,'BOB','Bs.','Bolivian boliviano - Bs.',1),(23,'BAM','KM','Bosnia &amp; Herzegovina mark - KM',1),(24,'BWP','P','Botswana pula - P',1),(25,'BRL','R$','Brazilian real - R$',1),(26,'BND','$','Brunei dollar - $',1),(27,'BGN','??','Bulgarian lev - ??',1),(28,'BIF','Fr','Burundian franc - Fr',1),(29,'KHR','¤','Cambodian riel - ¤',1),(30,'CVE','Esc','Cape Verdean escudo - Esc',1),(31,'KYD','$','Cayman Islands dollar - $',1),(32,'XAF','Fr','Central African CFA franc - Fr',1),(33,'XPF','Fr','CFP franc - Fr',1),(34,'CLP','$','Chilean peso - $',1),(35,'CNY','¥','Chinese yuan - ¥',1),(36,'COP','$','Colombian peso - $',1),(37,'KMF','Fr','Comorian franc - Fr',1),(38,'CDF','Fr','Congolese franc - Fr',1),(39,'CRC','¢','Costa Rican colón - ¢',1),(40,'HRK','kn','Croatian kuna - kn',1),(41,'CUC','$','Cuban convertible peso - $',1),(42,'CUP','$','Cuban peso - $',1),(43,'CZK','Kc','Czech koruna - Kc',1),(44,'DKK','kr.','Danish krone - kr.',1),(45,'DJF','Fr','Djiboutian franc - Fr',1),(46,'DOP','$','Dominican peso - $',1),(47,'XCD','$','East Caribbean dollar - $',1),(48,'EGP','?.?','Egyptian pound - ?.?',1),(49,'ERN','Nfk','Eritrean nakfa - Nfk',1),(50,'EEK','kr','Estonian kroon - kr',1),(51,'ETB','¤','Ethiopian birr - ¤',1),(52,'FKP','£','Falkland Islands pound - £',1),(53,'FJD','$','Fijian dollar - $',1),(54,'GMD','D','Gambian dalasi - D',1),(55,'GEL','?','Georgian lari - ?',1),(56,'GHS','?','Ghanaian cedi - ?',1),(57,'GIP','£','Gibraltar pound - £',1),(58,'GTQ','Q','Guatemalan quetzal - Q',1),(59,'GNF','Fr','Guinean franc - Fr',1),(60,'GYD','$','Guyanese dollar - $',1),(61,'HTG','G','Haitian gourde - G',1),(62,'HNL','L','Honduran lempira - L',1),(63,'HKD','$','Hong Kong dollar - $',1),(64,'HUF','Ft','Hungarian forint - Ft',1),(65,'ISK','kr','Icelandic króna - kr',1),(66,'INR','Rs','Indian rupee - Rs',1),(67,'IDR','Rp','Indonesian rupiah - Rp',1),(68,'IRR','?','Iranian rial - ?',1),(69,'IQD','?.?','Iraqi dinar - ?.?',1),(70,'ILS','?','Israeli new sheqel - ?',1),(71,'JMD','$','Jamaican dollar - $',1),(72,'JPY','¥','Japanese yen - ¥',1),(73,'JOD','?.?','Jordanian dinar - ?.?',1),(74,'KZT','?','Kazakhstani tenge - ?',1),(75,'KES','Sh','Kenyan shilling - Sh',1),(76,'KWD','?.?','Kuwaiti dinar - ?.?',1),(77,'KGS','¤','Kyrgyzstani som - ¤',1),(78,'LAK','?','Lao kip - ?',1),(79,'LVL','Ls','Latvian lats - Ls',1),(80,'LBP','?.?','Lebanese pound - ?.?',1),(81,'LSL','L','Lesotho loti - L',1),(82,'LRD','$','Liberian dollar - $',1),(83,'LYD','?.?','Libyan dinar - ?.?',1),(84,'LTL','Lt','Lithuanian litas - Lt',1),(85,'MOP','P','Macanese pataca - P',1),(86,'MKD','???','Macedonian denar - ???',1),(87,'MGA','¤','Malagasy ariary - ¤',1),(88,'MWK','MK','Malawian kwacha - MK',1),(89,'MYR','RM','Malaysian ringgit - RM',1),(90,'MVR','Rf','Maldivian rufiyaa - Rf',1),(91,'MRO','UM','Mauritanian ouguiya - UM',1),(92,'MUR','?','Mauritian rupee - ?',1),(93,'MXN','$','Mexican peso - $',1),(94,'MDL','L','Moldovan leu - L',1),(95,'MNT','?','Mongolian tögrög - ?',1),(96,'MAD','?.?.','Moroccan dirham - ?.?.',1),(97,'MZN','MTn','Mozambican metical - MTn',1),(98,'MMK','K','Myanma kyat - K',1),(99,'NAD','$','Namibian dollar - $',1),(100,'NPR','?','Nepalese rupee - ?',1),(101,'ANG','ƒ','Netherlands Antillean guilder - ƒ',1),(102,'TWD','$','New Taiwan dollar - $',1),(103,'NZD','$','New Zealand dollar - $',1),(104,'NIO','C$','Nicaraguan córdoba - C$',1),(105,'NGN','?','Nigerian naira - ?',1),(106,'KPW','?','North Korean won - ?',1),(107,'NOK','kr','Norwegian krone - kr',1),(108,'OMR','?.?.','Omani rial - ?.?.',1),(109,'PKR','?','Pakistani rupee - ?',1),(110,'PAB','B/.','Panamanian balboa - B/.',1),(111,'PGK','K','Papua New Guinean kina - K',1),(112,'PYG','?','Paraguayan guaraní - ?',1),(113,'PEN','S/.','Peruvian nuevo sol - S/.',1),(114,'PHP','?','Philippine peso - ?',1),(115,'PLN','zl','Polish zloty - zl',1),(116,'QAR','?.?','Qatari riyal - ?.?',1),(117,'RON','L','Romanian leu - L',1),(118,'RUB','?.','Russian ruble - ?.',1),(119,'RWF','Fr','Rwandan franc - Fr',1),(120,'SHP','£','Saint Helena pound - £',1),(121,'SVC','¢','Salvadoran colón - ¢',1),(122,'WST','T','Samoan tala - T',1),(123,'STD','Db','São Tomé and Príncipe dobra - Db',1),(124,'SAR','?.?','Saudi riyal - ?.?',1),(125,'RSD','???.','Serbian dinar - ???.',1),(126,'SCR','?','Seychellois rupee - ?',1),(127,'SLL','Le','Sierra Leonean leone - Le',1),(128,'SGD','$','Singapore dollar - $',1),(129,'SGD','$','Singapore dollar - $',1),(130,'SBD','$','Solomon Islands dollar - $',1),(131,'SOS','Sh','Somali shilling - Sh',1),(132,'ZAR','R','South African rand - R',1),(133,'KRW','?','South Korean won - ?',1),(134,'LKR','Rs','Sri Lankan rupee - Rs',1),(135,'SDG','£','Sudanese pound - £',1),(136,'SRD','$','Surinamese dollar - $',1),(137,'SZL','L','Swazi lilangeni - L',1),(138,'SEK','kr','Swedish krona - kr',1),(139,'CHF','Fr','Swiss franc - Fr',1),(140,'SYP','?.?','Syrian pound - ?.?',1),(141,'TJS','??','Tajikistani somoni - ??',1),(142,'TZS','Sh','Tanzanian shilling - Sh',1),(143,'THB','?','Thai baht - ?',1),(144,'TOP','T$','Tongan pa?anga - T$',1),(145,'TTD','$','Trinidad and Tobago dollar - $',1),(146,'TND','?.?','Tunisian dinar - ?.?',1),(147,'TRY','TL','Turkish lira - TL',1),(148,'TMM','m','Turkmenistani manat - m',1),(149,'UGX','Sh','Ugandan shilling - Sh',1),(150,'UAH','?','Ukrainian hryvnia - ?',1),(151,'AED','?.?','United Arab Emirates dirham - ?.?',1),(152,'UYU','$','Uruguayan peso - $',1),(153,'UZS','¤','Uzbekistani som - ¤',1),(154,'VUV','Vt','Vanuatu vatu - Vt',1),(155,'VEF','Bs F','Venezuelan bolívar - Bs F',1),(156,'VND','?','Vietnamese d?ng - ?',1),(157,'XOF','Fr','West African CFA franc - Fr',1),(158,'YER','?','Yemeni rial - ?',1),(159,'ZMK','ZK','Zambian kwacha - ZK',1),(160,'ZWR','$','Zimbabwean dollar - $',1);

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `iServiceId` int(11) NOT NULL AUTO_INCREMENT,
  `iCategoryId` int(11) DEFAULT NULL,
  `vService` varchar(255) DEFAULT NULL,
  `eStatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iServiceId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `services` */

insert  into `services`(`iServiceId`,`iCategoryId`,`vService`,`eStatus`) values (1,1,'Personal Training',1),(2,5,'Pilates',1),(3,5,'Yoga',1),(4,5,'Jogging',1),(5,1,'Boxing',1);

/*Table structure for table `state` */

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `iStateId` int(11) NOT NULL AUTO_INCREMENT,
  `vCountryCode` varchar(10) DEFAULT NULL,
  `vStateCode` varchar(10) DEFAULT NULL,
  `vState` varchar(255) DEFAULT NULL,
  `eStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`iStateId`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `state` */

insert  into `state`(`iStateId`,`vCountryCode`,`vStateCode`,`vState`,`eStatus`) values (1,'CA','AB','Alberta',1),(2,'CA','BC','British Columbia',1),(3,'CA','MB','Manitoba',1),(4,'CA','NB','New Brunswick',1),(5,'CA','NL','Newfoundland',1),(6,'CA','NS','Nova Scotia',1),(7,'CA','NU','Nunavut',1),(8,'CA','ON','Ontario',1),(9,'CA','PE','Prince Edward Island',1),(10,'CA','QC','Quebec',1),(11,'CA','SK','Saskatchewan',1),(12,'CA','NT','Northwest Territories',1),(13,'CA','YT','Yukon Territory',1),(14,'US','AA','Armed Forces Americas',1),(15,'US','AE','Armed Forces Europe, Middle East, & Canada',1),(16,'US','AK','Alaska',1),(17,'US','AL','Alabama',1),(18,'US','AP','Armed Forces Pacific',1),(19,'US','AR','Arkansas',1),(20,'US','AS','American Samoa',1),(21,'US','AZ','Arizona',1),(22,'US','CA','California',1),(23,'US','CO','Colorado',1),(24,'US','CT','Connecticut',1),(25,'US','DC','District of Columbia',1),(26,'US','DE','Delaware',1),(27,'US','FL','Florida',1),(28,'US','FM','Federated States of Micronesia',1),(29,'US','GA','Georgia',1),(30,'US','GU','Guam',1),(31,'US','HI','Hawaii',1),(32,'US','IA','Iowa',1),(33,'US','ID','Idaho',1),(34,'US','IL','Illinois',1),(35,'US','IN','Indiana',1),(36,'US','KS','Kansas',1),(37,'US','KY','Kentucky',1),(38,'US','LA','Louisiana',1),(39,'US','MA','Massachusetts',1),(40,'US','MD','Maryland',1),(41,'US','ME','Maine',1),(42,'US','MH','Marshall Islands',1),(43,'US','MI','Michigan',1),(44,'US','MN','Minnesota',1),(45,'US','MO','Missouri',1),(46,'US','MP','Northern Mariana Islands',1),(47,'US','MS','Mississippi',1),(48,'US','MT','Montana',1),(49,'US','NC','North Carolina',1),(50,'US','ND','North Dakota',1),(51,'US','NE','Nebraska',1),(52,'US','NH','New Hampshire',1),(53,'US','NJ','New Jersey',1),(54,'US','NM','New Mexico',1),(55,'US','NV','Nevada',1),(56,'US','NY','New York',1),(57,'US','OH','Ohio',1),(58,'US','OK','Oklahoma',1),(59,'US','OR','Oregon',1),(60,'US','PA','Pennsylvania',1),(61,'US','PR','Puerto Rico',1),(62,'US','PW','Palau',1),(63,'US','RI','Rhode Island',1),(64,'US','SC','South Carolina',1),(65,'US','SD','South Dakota',1),(66,'US','TN','Tennessee',1),(67,'US','TX','Texas',1),(68,'US','UT','Utah',1),(69,'US','VA','Virginia',1),(70,'US','VI','Virgin Islands',1),(71,'US','VT','Vermont',1),(72,'US','WA','Washington',1),(73,'US','WV','West Virginia',1),(74,'US','WI','Wisconsin',1),(75,'US','WY','Wyoming',1);

/*Table structure for table `templates` */

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `iTemplateId` int(11) NOT NULL AUTO_INCREMENT,
  `iCompanyServiceId` int(11) DEFAULT NULL,
  `iUserId` int(11) DEFAULT NULL,
  `vTitle` varchar(200) DEFAULT NULL,
  `vImage` varchar(200) DEFAULT NULL,
  `dtAddedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`iTemplateId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `templates` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
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
  `eType` enum('Basic','Pro') DEFAULT 'Basic',
  `eStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`iUserId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`iUserId`,`vFirstName`,`vLastName`,`vCompanyName`,`vCompanyLogo`,`vAddress`,`vEmail`,`vPassword`,`vWebSite`,`vTwitter`,`vPhone`,`dtAddedDate`,`eType`,`eStatus`) values (1,NULL,NULL,'test','1340456219logo1.jpg',NULL,'alex.php1982@gmail.com','test','htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:26:59','Basic',1),(2,NULL,NULL,'test','1340456546logo1.jpg',NULL,'test@gmail.com',NULL,'htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:32:26','Basic',1),(3,NULL,NULL,'test','1340456724logo1.jpg',NULL,'test@gmail.com',NULL,'htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:35:24','Basic',1),(4,NULL,NULL,'test','1340456819logo1.jpg',NULL,'test@gmail.com',NULL,'htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:36:59','Basic',1),(5,NULL,NULL,'cjigar','1340623569chuka.jpg',NULL,'abc@abc.com',NULL,'','','','2012-06-25 16:56:09','Basic',1),(6,NULL,NULL,'cjigar','1340623686chuka.jpg',NULL,'abc@abc.com',NULL,'','','','2012-06-25 16:58:06','Basic',1),(7,NULL,NULL,'alex Jones','1340660484goldlogo.jpg',NULL,'alex.php1982@gmail.com',NULL,'http://techrevolutionweb.com','http://twitter.com/chuka','22424324','2012-06-26 03:11:24','Basic',1),(8,NULL,NULL,'demo','1340665611goldlogo.jpg',NULL,'g@gmail.com',NULL,'http://techrevolutionweb.com','http://twitter.com/chuka','12424','2012-06-26 04:36:51','Basic',1),(9,NULL,NULL,'demo','1340665761goldlogo.jpg',NULL,'g@gmail.com','demo','http://techrevolutionweb.com','http://twitter.com/chuka','12424','2012-06-26 04:39:21','Basic',1),(10,NULL,NULL,'Demo Demo','1340707114goldlogo.jpg',NULL,'demo@gmail.com','demo123','htttp://techrevolutionweb.com','http://twitter.com/alex','9998391508','2012-06-26 16:08:34','Basic',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
