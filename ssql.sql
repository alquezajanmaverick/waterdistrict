-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dbwaterdistrict
DROP DATABASE IF EXISTS `dbwaterdistrict`;
CREATE DATABASE IF NOT EXISTS `dbwaterdistrict` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbwaterdistrict`;

-- Dumping structure for table dbwaterdistrict.rates
DROP TABLE IF EXISTS `rates`;
CREATE TABLE IF NOT EXISTS `rates` (
  `Classification` varchar(50) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Minimum` decimal(9,2) DEFAULT NULL,
  `First` decimal(9,2) DEFAULT NULL,
  `Second` decimal(9,2) DEFAULT NULL,
  `Third` decimal(9,2) DEFAULT NULL,
  `Fourth` decimal(9,2) DEFAULT NULL,
  `Fifth` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dbwaterdistrict.rates: ~15 rows (approximately)
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` (`Classification`, `Size`, `Minimum`, `First`, `Second`, `Third`, `Fourth`, `Fifth`) VALUES
	(' Residential', '3/4 \'\'', 312.00, 20.80, 21.85, 23.10, 24.50, 26.35),
	('Commercial', '3/4 \'\'', 624.00, 41.60, 43.70, 46.20, 49.00, 52.70),
	(' Residential', '1/2 \'\'', 195.00, 20.80, 21.85, 23.10, 24.50, 26.35),
	('Commercial A', '3/4 \'\'', 546.00, 36.40, 38.24, 40.43, 42.88, 46.11),
	('Commercial', '1/2 \'\'', 390.00, 41.60, 43.70, 46.20, 49.00, 52.70),
	(' Residential', '1 \'\'', 624.00, 20.80, 21.85, 23.10, 24.50, 26.35),
	('Commercial B', '3/4 \'\'', 468.00, 31.20, 32.78, 34.65, 36.75, 39.53),
	('Commercial', '1 \'\'', 1248.00, 41.60, 43.70, 46.20, 49.00, 52.70),
	('Commercial A', '1 \'\'', 1092.00, 36.40, 38.24, 40.43, 42.88, 46.11),
	('Commercial A', '1/2 \'\'', 341.25, 36.40, 38.24, 40.43, 42.88, 46.11),
	('Commercial B', '1 \'\'', 936.00, 31.20, 32.78, 34.65, 36.75, 39.53),
	('Commercial B', '1/2 \'\'', 292.00, 31.20, 32.78, 34.65, 36.75, 39.53),
	('Commercial C', '3/4 \'\'', 390.00, 26.00, 27.31, 28.88, 30.63, 32.94),
	('Commercial C', '1 \'\'', 780.00, 26.00, 27.31, 28.88, 30.63, 32.94),
	('Commercial C', '1/2 \'\'', 243.75, 26.00, 27.31, 28.88, 30.63, 32.94);
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;

-- Dumping structure for table dbwaterdistrict.tblbillingrecord
DROP TABLE IF EXISTS `tblbillingrecord`;
CREATE TABLE IF NOT EXISTS `tblbillingrecord` (
  `BillingNo` int(11) DEFAULT NULL,
  `AcctNo` varchar(50) NOT NULL,
  `IssuanceDate` date DEFAULT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `Reading` int(11) NOT NULL,
  `cum` int(11) DEFAULT NULL,
  `AmountDue` decimal(9,2) DEFAULT NULL,
  KEY `AcctNo` (`AcctNo`),
  CONSTRAINT `FK_tblbillingrecord_tblclient` FOREIGN KEY (`AcctNo`) REFERENCES `tblclient` (`AcctNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dbwaterdistrict.tblbillingrecord: ~0 rows (approximately)
/*!40000 ALTER TABLE `tblbillingrecord` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblbillingrecord` ENABLE KEYS */;

-- Dumping structure for table dbwaterdistrict.tblbillingrecord_temp
DROP TABLE IF EXISTS `tblbillingrecord_temp`;
CREATE TABLE IF NOT EXISTS `tblbillingrecord_temp` (
  `BillingNo` int(11) DEFAULT NULL,
  `AcctNo` varchar(50) NOT NULL,
  `IssuanceDate` date DEFAULT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `Reading` int(11) NOT NULL,
  `cum` int(11) DEFAULT NULL,
  `AmountDue` decimal(9,2) DEFAULT NULL,
  KEY `AcctNo` (`AcctNo`),
  CONSTRAINT `tblbillingrecord_temp_ibfk_1` FOREIGN KEY (`AcctNo`) REFERENCES `tblclient` (`AcctNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table dbwaterdistrict.tblbillingrecord_temp: ~0 rows (approximately)
/*!40000 ALTER TABLE `tblbillingrecord_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblbillingrecord_temp` ENABLE KEYS */;

-- Dumping structure for table dbwaterdistrict.tblcashadvance
DROP TABLE IF EXISTS `tblcashadvance`;
CREATE TABLE IF NOT EXISTS `tblcashadvance` (
  `AcctNo` varchar(50) NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  KEY `AcctNo` (`AcctNo`),
  CONSTRAINT `FK_tblcashadvance_tblclient` FOREIGN KEY (`AcctNo`) REFERENCES `tblclient` (`AcctNo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dbwaterdistrict.tblcashadvance: ~0 rows (approximately)
/*!40000 ALTER TABLE `tblcashadvance` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcashadvance` ENABLE KEYS */;

-- Dumping structure for table dbwaterdistrict.tblclient
DROP TABLE IF EXISTS `tblclient`;
CREATE TABLE IF NOT EXISTS `tblclient` (
  `AcctNo` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) NOT NULL,
  `NameEx` varchar(50) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `ZoneNum` int(11) NOT NULL,
  `Class` varchar(50) NOT NULL,
  `isSenior` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`AcctNo`),
  KEY `ZoneNum` (`ZoneNum`),
  CONSTRAINT `FK_tblclient_tblzone` FOREIGN KEY (`ZoneNum`) REFERENCES `tblzone` (`ZoneNum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dbwaterdistrict.tblclient: ~2 rows (approximately)
/*!40000 ALTER TABLE `tblclient` DISABLE KEYS */;
INSERT INTO `tblclient` (`AcctNo`, `Fname`, `Mname`, `Lname`, `NameEx`, `Size`, `ZoneNum`, `Class`, `isSenior`) VALUES
	('111', 'Jan Maverick', NULL, 'Alqueza', NULL, '1/2', 6, 'asd', 0),
	('112', 'Mark Reymond', NULL, 'Avelis', NULL, '1/2', 6, 'asd', 0),
	('113', 'karl', NULL, 'Avecialla', NULL, NULL, 14, 'asd', 0);
/*!40000 ALTER TABLE `tblclient` ENABLE KEYS */;

-- Dumping structure for table dbwaterdistrict.tbluser
DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `privilege` varchar(50) DEFAULT NULL,
  `fullname` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dbwaterdistrict.tbluser: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` (`username`, `password`, `privilege`, `fullname`) VALUES
	('bill', 'bill', 'Bill', 'Bill Bill'),
	('admin', 'admin', 'Admin', 'Admin');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;

-- Dumping structure for table dbwaterdistrict.tblzone
DROP TABLE IF EXISTS `tblzone`;
CREATE TABLE IF NOT EXISTS `tblzone` (
  `ZoneNum` int(11) NOT NULL,
  `StreetName` varchar(100) NOT NULL,
  PRIMARY KEY (`ZoneNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dbwaterdistrict.tblzone: ~17 rows (approximately)
/*!40000 ALTER TABLE `tblzone` DISABLE KEYS */;
INSERT INTO `tblzone` (`ZoneNum`, `StreetName`) VALUES
	(1, 'Farañal'),
	(2, 'Amagna'),
	(3, 'Rosete'),
	(4, 'East Feria'),
	(5, 'West Feria'),
	(6, 'Apostol'),
	(7, 'Manglicmot'),
	(8, 'San Rafael'),
	(9, 'Sto. Niño'),
	(10, 'Sindol'),
	(11, 'Farañal'),
	(12, 'Amagna'),
	(13, 'Rosete'),
	(14, 'Apostol'),
	(15, 'Manglicmot'),
	(16, 'Sto. Niño'),
	(17, 'Sto. Niño'),
	(18, 'Maloma');
/*!40000 ALTER TABLE `tblzone` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
