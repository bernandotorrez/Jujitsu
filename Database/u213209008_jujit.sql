-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u213209008_jujit
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anggota` (
  `nim` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama_anggota` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `id_fakultas` int(1) NOT NULL,
  `id_jurusan` int(1) NOT NULL,
  `angkatan_kuliah` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `angkatan_jujitsu` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `register_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `referral_code` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_pendaftaran` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`nim`),
  KEY `fakultas` (`id_fakultas`),
  KEY `jurusan` (`id_jurusan`),
  KEY `email` (`email`),
  KEY `email_2` (`email`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anggota_ibfk_3` FOREIGN KEY (`email`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` VALUES ('1111111111','Kampang','L','Bandung','1995-10-19','111111111111',1,2,'2014','2014',NULL,'Kampang','111111111111','kampang.edan@gmail.com','2017-12-29 07:53:47',NULL,'Nwnwjwjwnwnwn','IUPCN','0'),('1310512042','Bernando Torrez','L','Jakarta','1995-10-19','089687610639',1,1,'2013','2013','13105120421.jpg','','','bernandotorrez4@gmail.com','2018-02-09 17:52:27',NULL,'Jalan Moh Kahfi 1, Gg.syarfa, Rt 09 / 01, Ciganjur, Jakarta Selatan\r\n','4XKDJ','0'),('1510512012','Deliana Sarimulia','P','Sukabumi','1997-11-14','081291204783',1,1,'2015','2016',NULL,'delianasm','089604970191','sarimuliad@gmail.com','2018-02-07 10:38:37',NULL,'Jalan Kayumanis Barat No.  95C, Kelurahan Kayumanis RT 1 RW 7, Matraman, Jakarta Timur 13130','0ZMQC','0');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `word` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captcha`
--

/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
INSERT INTO `captcha` VALUES (114,1518165379,'202.158.42.162','33728');
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;

--
-- Table structure for table `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fakultas` (
  `id_fakultas` int(1) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakultas`
--

/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` VALUES (1,'Fakultas Ilmu Komputer'),(2,'Fakultas Kedokteran'),(3,'Fakultas Hukum'),(4,'Fakultas Ilmu Sosial dan Politik'),(5,'Fakultas Ilmu - Ilmu Kesehatan'),(6,'Fakultas Teknik'),(7,'Fakultas Ekonomi dan Bisnis');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurusan` (
  `id_jurusan` int(1) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_fakultas` int(1) NOT NULL,
  PRIMARY KEY (`id_jurusan`),
  KEY `id_fakultas` (`id_fakultas`),
  CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan`
--

/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES (1,'S1 - Sistem Informasi',1),(2,'S1 - Teknik Informatika',1),(3,'D3 - Manajemen Informatika',1),(4,'S2 - Magister Manajemen',7),(5,'S1 - Ekonomi Islam',7),(6,'S1 - Ilmu Ekonomi Pembangunan',7),(7,'S1 - Manajemen',7),(8,'S1 - Akutansi',7),(9,'D3 - Akuntansi',7),(10,'D3 - Keuangan Dan Perbankan',7),(11,'S1  - Kedokteran',2),(12,'Profesi Dokter',2),(13,'S1 - Teknik Mesin',6),(14,'S1 - Teknik Perkapalan',6),(15,'S1 - Teknik Industri',6),(16,'S1 - Ilmu Komunikasi',4),(17,'S1 - Hubungan Internasional',4),(18,'S1 - Ilmu Politik',4),(19,'S1 - Ilmu Hukum',3),(20,'S2 - Ilmu Hukum ',3),(21,'D3 - Keperawatan',5),(22,'D3 - Fisioterapi',5),(23,'S1 - Keperawatan',5),(24,'S1 - Kesehatan Masyarakat',5),(25,'S1 - Ilmu Gizi',5),(26,'Profesi Ners',5);
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `verifikasi` enum('Done','None') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `status` enum('Active','None') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `level` enum('Admin','Anggota') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Anggota',
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `register_time` datetime DEFAULT NULL,
  `verifikasi_time` datetime DEFAULT NULL,
  `reset_time` datetime DEFAULT NULL,
  `passkey` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('bernandotorrez4@gmail.com','42018a23a4f89d3c246d1808aed0c2ec','Done','Active','Anggota','2018-02-09 15:36:41','2018-02-09 15:36:06','2018-02-08 15:31:06','2018-02-08 16:37:35',NULL,'815116b216484555a19fb8923a6ab203'),('kampang.edan@gmail.com','42018a23a4f89d3c246d1808aed0c2ec','Done','Active','Anggota','2018-02-05 16:48:23','2018-02-05 17:10:06','2017-12-27 22:16:05','2017-12-27 22:16:37',NULL,'de2f57364e0464167d5b607565bea2df'),('sarimuliad@gmail.com','015499afec072b2964b985fcd9a626da','Done','Active','Anggota','2018-02-07 10:35:32',NULL,'2018-02-07 10:34:28','2018-02-07 10:35:02',NULL,'a73eb0bac1ef1884a33291b6bb013813');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

--
-- Table structure for table `modul`
--

DROP TABLE IF EXISTS `modul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modul`
--

/*!40000 ALTER TABLE `modul` DISABLE KEYS */;
INSERT INTO `modul` VALUES (1,'Latihan','Yes','2018-02-08 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `modul` ENABLE KEYS */;

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `handphone` varchar(12) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesan`
--

/*!40000 ALTER TABLE `pesan` DISABLE KEYS */;
INSERT INTO `pesan` VALUES (1,'Bernand D H','bernandotorrez4@gmail.com','089687610639','Bagus banget web nya bro','2017-12-20 10:33:29'),(2,'Nansjsjsj','bernandotorrez@hotmail.com','089687610639','Ndndjsjsnsnsnsn','2017-12-20 11:39:30'),(3,'bernando torrez','bernandotorrez@hotmail.com','089687610639','widih\r\n','2017-12-21 11:26:10'),(4,'Bernand D H','bernandotorrez9@gmail.com','089687610639','Aasdasdasdasd','2017-12-26 16:56:05'),(5,'Asu','asu@gmail.com','111111111111','Asdasdasd','2018-01-07 17:09:03'),(6,'Asdam','asdam@gmail.com','011111111111','Tes Captcha\r\n','2018-02-05 14:54:02');
/*!40000 ALTER TABLE `pesan` ENABLE KEYS */;

--
-- Table structure for table `saran`
--

DROP TABLE IF EXISTS `saran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL AUTO_INCREMENT,
  `saran` text COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_saran` datetime NOT NULL,
  PRIMARY KEY (`id_saran`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saran`
--

/*!40000 ALTER TABLE `saran` DISABLE KEYS */;
INSERT INTO `saran` VALUES (1,'web nya bagus banget','2017-12-20 21:33:20'),(2,'\r\n\r\nsadasdsadasd','2017-12-21 11:25:22'),(3,'Sheheehehe','2017-12-24 08:15:58'),(4,'Sadasdsad','2017-12-26 16:55:22'),(5,'Babahabba','2017-12-28 17:08:10'),(6,'Apa Ya','2018-01-07 17:09:31'),(7,'Eweee','2018-02-05 11:06:10'),(8,'Tes Csrf','2018-02-05 11:07:50'),(9,'Tes Captacha','2018-02-05 14:37:50');
/*!40000 ALTER TABLE `saran` ENABLE KEYS */;

--
-- Dumping routines for database 'u213209008_jujit'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-10  8:33:37
