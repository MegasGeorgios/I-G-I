
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Vocabulario','2018-08-20 22:00:00',NULL),(2,'Animales','2018-08-21 16:54:19','2018-08-21 16:54:19'),(4,'Ropa','2018-08-30 18:50:39','2018-08-30 18:50:39'),(5,'Saludos y presentaciones','2018-09-11 15:26:14','2018-09-11 15:26:14'),(6,'¿Cómo te llamas?','2018-09-17 17:58:04','2018-09-17 17:58:04'),(7,'¿Cómo estás?','2018-09-17 18:30:01','2018-09-17 18:30:01');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cuestionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuestionarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `frase` text,
  `sig_frase` text,
  `idioma` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cuestionarios` WRITE;
/*!40000 ALTER TABLE `cuestionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuestionarios` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `griegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `griegos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `palabra` varchar(255) NOT NULL,
  `significado` varchar(255) NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `griegos_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `griegos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `griegos` WRITE;
/*!40000 ALTER TABLE `griegos` DISABLE KEYS */;
INSERT INTO `griegos` VALUES (1,'Παίζω','jugar',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(2,'Οικογένεια','familia',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(3,'Καινούριος','nuevo',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(4,'Αγκάθι','espina',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(5,'Βαγγέλης ','nombre',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(6,'Μπισκότο ','galleta',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(7,'Καμπούρα ','joroba',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(8,'Ντους','ducha',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(9,'Υγεία ','salud',1,'2018-08-20 22:00:00','2018-08-20 22:00:00'),(10,'Κάστρο','castillo',1,'2018-08-21 16:42:34','2018-08-21 16:42:34'),(11,'Γέφυρα','puente',1,'2018-08-21 16:43:05','2018-08-21 16:43:05'),(12,'Ήλιος','sol',1,'2018-08-21 16:43:21','2018-08-21 16:43:21'),(13,'Τραπέζι','mesa',1,'2018-08-21 16:43:32','2018-08-21 16:43:32'),(14,'Παραλία','playa',1,'2018-08-21 16:43:58','2018-08-21 16:43:58'),(15,'Θάλασσα','mar',1,'2018-08-21 16:44:12','2018-08-21 16:44:12'),(16,'Γαρίδα','gamba',1,'2018-08-21 16:44:30','2018-08-21 16:44:30'),(17,'Χαλί','alfombra',1,'2018-08-21 16:46:04','2018-08-21 16:46:04'),(18,'Ψώνια','compras',1,'2018-08-21 16:46:26','2018-08-21 16:46:26'),(19,'εισοδος','entrada',1,'2018-08-21 16:53:59','2018-08-21 16:53:59'),(20,'πουλι','pajaro',2,'2018-08-21 16:54:53','2018-08-21 16:54:53'),(21,'ευτυχισμενος','contento',1,'2018-08-21 16:56:04','2018-08-21 16:56:04'),(22,'παραγγελι\'α','pedido',1,'2018-08-21 16:57:09','2018-08-21 16:57:09'),(23,'σαλιγκαρι','caracol',2,'2018-08-21 16:57:58','2018-08-21 16:57:58'),(24,'παγκακι','banco(sentarse)',1,'2018-08-21 16:58:45','2018-08-21 16:58:45'),(25,'μπουκάλι','botella',1,'2018-08-21 16:59:51','2018-08-21 16:59:51'),(26,'λαμπα','bombillo',1,'2018-08-21 17:00:23','2018-08-21 17:00:23'),(27,'λιοντάρι','leon',2,'2018-08-21 17:01:18','2018-08-21 17:01:18'),(28,'δόντια','dientes',1,'2018-08-21 17:02:09','2018-08-21 17:02:09'),(29,'Μοιάζω','aparentar, parecer',1,'2018-08-30 18:49:28','2018-08-30 18:49:28'),(30,'Μοιάζω','aparentar, parecer',1,'2018-08-30 18:51:02','2018-08-30 18:51:02'),(31,'Φούστα','falda',4,'2018-08-30 18:51:55','2018-08-30 18:51:55'),(32,'Ειδήσεις','noticias',1,'2018-08-30 18:52:29','2018-08-30 18:52:29'),(33,'Τέλεια','perfecto',1,'2018-08-30 18:53:54','2018-08-30 18:53:54'),(34,'Κούρεμα','corte de pelo',1,'2018-08-30 18:55:11','2018-08-30 18:55:11'),(35,'Γεια σας','hola',5,'2018-09-11 15:29:27','2018-09-11 15:29:27'),(36,'χαιρετισμοί','saludos',5,'2018-09-11 15:29:59','2018-09-11 15:29:59'),(37,'αποχαιρετισμοί','despedidas',5,'2018-09-11 15:30:33','2018-09-11 15:30:33'),(38,'Γεια σου','hola, chao',5,'2018-09-11 15:31:14','2018-09-11 15:31:14'),(39,'Καλημέρα','buenos días',5,'2018-09-11 15:32:15','2018-09-11 15:32:15'),(40,'Καλησπέρα','buenas tardes',5,'2018-09-11 15:32:32','2018-09-11 15:32:32'),(41,'Καληνύχτα','buenas noches',5,'2018-09-11 15:32:53','2018-09-11 15:32:53'),(42,'Καλό μεσημέρι','buen mediodía',5,'2018-09-11 15:33:55','2018-09-11 15:33:55'),(43,'Καλό απόγευμα','buena tarde – después de comer',5,'2018-09-11 15:34:30','2018-09-11 15:34:30'),(44,'Καλό βράδυ','buena tarde-noche',5,'2018-09-11 15:35:02','2018-09-11 15:35:02'),(45,'Αντίο','adios',5,'2018-09-11 15:40:49','2018-09-11 15:40:49'),(46,'Τα λέμε','hasta luego',5,'2018-09-11 15:42:10','2018-09-11 15:42:10'),(47,'Θα τα πούμε','hablamos',5,'2018-09-11 15:42:41','2018-09-11 15:42:41'),(48,'Γεια','hola, chao',5,'2018-09-11 15:43:08','2018-09-11 15:43:08'),(49,'Στο καλό','que te vaya bien',5,'2018-09-11 15:43:40','2018-09-11 15:43:40'),(50,'Να είσαι/είστε καλά','que estés/esté bien',5,'2018-09-11 15:45:05','2018-09-11 15:45:05'),(51,'Καλημέρα σας','buenos dias (en plural)',5,'2018-09-11 15:46:51','2018-09-11 15:46:51'),(52,'Πώς σε/σας λένε;','¿cómo te/le dicen?',6,'2018-09-17 17:59:06','2018-09-17 17:59:06'),(53,'Πώς ονομάζεσαι/ονομάζεστε;','¿cómo te llamas/se llama usted?',6,'2018-09-17 17:59:58','2018-09-17 17:59:58'),(54,'(Εμένα) με λένε + nombre en acusativo','(a mí) me dicen',6,'2018-09-17 18:01:20','2018-09-17 18:01:20'),(55,'(Εγώ) είμαι + artículo ο/η + nombre en nominativo','(yo) soy ...',6,'2018-09-17 18:02:48','2018-09-17 18:02:48'),(56,'(Εγώ) ονομάζομαι + nombre en nominativo','(yo) me llamo …',6,'2018-09-17 18:03:15','2018-09-17 18:03:15'),(57,'Και εσένα, πώς σε λένε;','y tú, ¿cómo te llamas?',6,'2018-09-17 18:03:59','2018-09-17 18:03:59'),(58,'Τα 20 πιο συχνά ονόματα στην Ελλάδα','los 20 nombres más frecuentes en grecia',6,'2018-09-17 18:05:21','2018-09-17 18:05:21'),(59,'Τι κάνεις/κάνετε;','¿qué tal?',7,'2018-09-17 18:31:09','2018-09-17 18:31:09'),(60,'Καλά είσαι; / Είσαι καλά;','¿estás bien?',7,'2018-09-17 18:31:36','2018-09-17 18:31:36'),(61,'Πώς είσαι/είστε;','¿cómo estás?',7,'2018-09-17 18:32:05','2018-09-17 18:32:05'),(62,'Όλα καλά;','¿todo bien?',7,'2018-09-17 18:32:32','2018-09-17 18:32:32'),(63,'Πώς πάει;','¿cómo va?',7,'2018-09-17 18:33:04','2018-09-17 18:33:04'),(64,'Τι κάνεις, φίλε, καλά είσαι;','¿qué tal, amigo, estás bien?',7,'2018-09-17 18:34:28','2018-09-17 18:34:28'),(65,'Γεια σας, πώς είστε σήμερα;','hola, ¿cómo está usted hoy?',7,'2018-09-17 18:34:57','2018-09-17 18:34:57'),(66,'Έλα, πώς πάει;','hey, ¿cómo va?',7,'2018-09-17 18:35:20','2018-09-17 18:35:20'),(67,'Καλημέρα, αγάπη μου! Όλα καλά;','¡buenos días, mi amor! ¿todo bien?',7,'2018-09-17 18:35:52','2018-09-17 18:35:52'),(68,'Πολύ καλά','muy bien',7,'2018-09-17 18:37:21','2018-09-17 18:37:21'),(69,'Μια χαρά!','estupendamente',7,'2018-09-17 18:47:25','2018-09-17 18:47:25'),(70,'Καλά','bien',7,'2018-09-17 18:47:53','2018-09-17 18:47:53'),(71,'Εντάξει','ok',7,'2018-09-17 18:52:36','2018-09-17 18:52:36'),(72,'Έτσι κι έτσι','más o menos',7,'2018-09-17 18:53:15','2018-09-17 18:53:15'),(73,'Δεν είμαι καλά','no estoy bien',7,'2018-09-17 18:54:34','2018-09-17 18:54:34'),(74,'Ευχαριστώ','gracias',7,'2018-09-17 18:54:56','2018-09-17 18:54:56');
/*!40000 ALTER TABLE `griegos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `ingles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `palabra` varchar(255) NOT NULL,
  `significado` varchar(255) NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingles_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `ingles_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `ingles` WRITE;
/*!40000 ALTER TABLE `ingles` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `italianos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `italianos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `palabra` varchar(255) NOT NULL,
  `significado` varchar(255) NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `italianos_id_categoria_foreign` (`id_categoria`),
  CONSTRAINT `italianos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `italianos` WRITE;
/*!40000 ALTER TABLE `italianos` DISABLE KEYS */;
/*!40000 ALTER TABLE `italianos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (6,'2016_10_18_161006_create_categorias_table',1),(7,'2017_10_17_213028_create_italianos_table',1),(8,'2017_10_18_160607_create_griegos_table',1),(9,'2017_10_18_160903_create_ingles_table',1),(10,'2017_11_02_005631_create_cuestionarios_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
