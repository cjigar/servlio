/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.16-log : Database - servlio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`servlio` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `servlio`;

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
  `vCountry` varchar(100) DEFAULT NULL,
  `vStateCode` varchar(100) DEFAULT NULL,
  `vState` varchar(100) DEFAULT NULL,
  `iCityId` int(11) DEFAULT NULL,
  `vCity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iCompanyLocationId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `company_location` */

insert  into `company_location`(`iCompanyLocationId`,`iCompanyServiceId`,`iUserId`,`vCountryCode`,`vCountry`,`vStateCode`,`vState`,`iCityId`,`vCity`) values (1,1,1,'15',NULL,'8',NULL,37,NULL),(2,3,4,'15',NULL,'8',NULL,37,NULL),(3,4,5,'15',NULL,'8',NULL,37,NULL),(4,5,6,'15',NULL,'8',NULL,37,NULL),(5,6,7,'US',NULL,'NY',NULL,152172,NULL),(6,7,8,'IN',NULL,'',NULL,124547,NULL),(7,8,9,'IN',NULL,'',NULL,124547,NULL),(8,9,10,'US',NULL,'AK',NULL,163396,NULL),(9,10,11,'IN',NULL,'',NULL,62098,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `company_services` */

insert  into `company_services`(`iCompanyServiceId`,`iUserId`,`iServiceId`,`vServiceName`,`iCategoryId`,`iCurrencyId`,`fPrice`,`vImage`,`vDescription`) values (1,1,3,'',5,0,100.00,'1340456546gallery_image1.jpg','teststs'),(2,1,3,'',5,0,100.00,'1340456724gallery_image1.jpg','teststs'),(3,4,3,'',5,0,100.00,'1340456819gallery_image1.jpg','teststs'),(4,5,4,'',5,0,100.00,'1340623569mattroberts2.jpg','testes'),(5,6,4,'',5,0,100.00,'1340623686mattroberts2.jpg','testes'),(6,7,2,'',5,0,100.00,'1340660484','small desciption are this'),(7,8,0,'',5,1,123.00,'1340665611mattroberts2.jpg','Upload an image that best represents this service. You can always change it after your listing has been created.'),(8,9,0,'',5,1,123.00,'1340665761mattroberts2.jpg','Upload an image that best represents this service. You can always change it after your listing has been created.'),(9,10,4,'',5,2,100.00,'1340707114mr1.jpg','Personal Training is all about staying motivated, getting results and getting them on schedule. We recognise that every client is individual, and we know that every client requires a bespoke programme.'),(10,11,4,'IT Related',5,2,500.00,'1340777357mattroberts.jpg','At Gold\'s Gym you\'ll find all of the latest cardio and strength training equipment along with a dynamic group exercise program that includes classes like yoga, group cycling, mixed martial arts and muscle endurance.'),(11,11,5,'',1,2,233.00,'1340825826Desert.jpg','re');

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

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `iPaymentId` int(11) NOT NULL AUTO_INCREMENT,
  `iUserId` int(11) DEFAULT NULL,
  `iCompanyServiceId` int(11) DEFAULT NULL,
  `fAmount` float(10,2) DEFAULT NULL,
  `iTransactionId` varchar(50) DEFAULT NULL,
  `dtAddeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`iPaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `templates` */

insert  into `templates`(`iTemplateId`,`iCompanyServiceId`,`iUserId`,`vTitle`,`vImage`,`dtAddedDate`,`eStatus`) values (1,11,11,NULL,'1340825828Desert.jpg','2012-06-28 01:07:09',1),(2,11,11,NULL,'1340825829Hydrangeas.jpg','2012-06-28 01:07:10',1),(3,11,11,NULL,'1340825830','2012-06-28 01:07:10',1),(4,11,11,NULL,'1340825830','2012-06-28 01:07:10',1),(5,11,11,NULL,'1340825830','2012-06-28 01:07:10',1);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`iUserId`,`vFirstName`,`vLastName`,`vCompanyName`,`vCompanyLogo`,`vAddress`,`vEmail`,`vPassword`,`vWebSite`,`vTwitter`,`vPhone`,`dtAddedDate`,`eType`,`eStatus`) values (1,NULL,NULL,'test','1340456219logo1.jpg',NULL,'alex.php1982@gmail.com','test','htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:26:59','Pro',1),(2,NULL,NULL,'test','1340456546logo1.jpg',NULL,'test@gmail.com',NULL,'htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:32:26','Basic',1),(3,NULL,NULL,'test','1340456724logo1.jpg',NULL,'test@gmail.com',NULL,'htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:35:24','Basic',1),(4,NULL,NULL,'test','1340456819logo1.jpg',NULL,'test@gmail.com',NULL,'htttp://www.google.com','http://twitter.com/chuka','15131654','2012-06-23 18:36:59','Pro',1),(5,NULL,NULL,'cjigar','1340623569chuka.jpg',NULL,'abc@abc.com',NULL,'','','','2012-06-25 16:56:09','Pro',1),(6,NULL,NULL,'cjigar','1340623686chuka.jpg',NULL,'abc@abc.com',NULL,'','','','2012-06-25 16:58:06','Basic',1),(7,NULL,NULL,'alex Jones','1340660484goldlogo.jpg',NULL,'alex.php1982@gmail.com',NULL,'http://techrevolutionweb.com','http://twitter.com/chuka','22424324','2012-06-26 03:11:24','Basic',1),(8,NULL,NULL,'demo','1340665611goldlogo.jpg',NULL,'g@gmail.com',NULL,'http://techrevolutionweb.com','http://twitter.com/chuka','12424','2012-06-26 04:36:51','Basic',1),(9,NULL,NULL,'demo','1340665761goldlogo.jpg',NULL,'g@gmail.com','demo','http://techrevolutionweb.com','http://twitter.com/chuka','12424','2012-06-26 04:39:21','Basic',1),(10,NULL,NULL,'Demo Demo','1340728503mrlogo.jpg','Alaska, US','demo@gmail.com','demo123','http://techrevolutionweb.com','http://twitter.com/alex','9998391508','2012-06-26 16:08:34','Basic',1),(11,NULL,NULL,'cjigar','1340777357newservice_image.png','','cjigar@gmail.com','cjigar','http://techrevolutionweb.com','http://twitter.com/cjigar','9998391508','2012-06-27 11:39:17','Basic',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
