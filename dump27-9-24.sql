-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: sids
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allattamento`
--

DROP TABLE IF EXISTS `allattamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `allattamento` (
  `scheda_sids_schede_id` int unsigned NOT NULL,
  `allattamento_materno` enum('Y','N','mancante') DEFAULT NULL,
  `allattamento_materno_nascita` enum('Y','N') DEFAULT NULL,
  `allattamento_materno_settD` int DEFAULT NULL,
  `allattamento_materno_settA` int DEFAULT NULL,
  `allattamento_artificiale` enum('Y','N','mancante') DEFAULT NULL,
  `allattamento_artificiale_nascita` enum('Y','N') DEFAULT NULL,
  `allattamento_artificiale_settD` int DEFAULT NULL,
  `allattamento_artificiale_settA` int DEFAULT NULL,
  `allattamento_misto` enum('Y','N','mancante') DEFAULT NULL,
  `allattamento_misto_nascita` enum('Y','N') DEFAULT NULL,
  `allattamento_misto_settD` int DEFAULT NULL,
  `allattamento_misto_settA` int DEFAULT NULL,
  `allattamento_svezzato` enum('Y','N','mancante') DEFAULT NULL,
  `allattamento_svezzato_nascita` enum('Y','N') DEFAULT NULL,
  `allattamento_svezzato_settD` int DEFAULT NULL,
  `allattamento_svezzato_settA` int DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`scheda_sids_schede_id`),
  KEY `fk_allattamento_scheda_sids` (`scheda_sids_schede_id`),
  CONSTRAINT `fk_allattamento_scheda_sids` FOREIGN KEY (`scheda_sids_schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allattamento`
--

LOCK TABLES `allattamento` WRITE;
/*!40000 ALTER TABLE `allattamento` DISABLE KEYS */;
INSERT INTO `allattamento` VALUES (1,'Y','N',5,5,'mancante','N',NULL,NULL,'N','N',NULL,NULL,'mancante','N',NULL,NULL,'Y'),(8,'Y','N',4,5,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,NULL,'N',NULL,NULL,'Y'),(10,'N','N',NULL,NULL,'Y','N',3,6,'Y','N',6,8,'N','N',NULL,NULL,'Y'),(11,'Y','Y',NULL,3,'N','N',2,23,'Y','N',25,89,'Y','N',58,8,'Y'),(12,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,'N'),(17,'Y','N',NULL,NULL,'Y','N',NULL,NULL,'Y','N',NULL,NULL,'Y','N',NULL,NULL,'N'),(18,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'Y','N',NULL,NULL,NULL,'N',NULL,NULL,'N'),(19,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(20,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(32,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(37,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(43,'Y','Y',NULL,5,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(46,'mancante','N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,'Y','Y',NULL,2,'N','N',NULL,NULL,'N','N',NULL,NULL,'N',NULL,NULL,NULL,'Y'),(48,'Y','Y',NULL,3,'N','N',NULL,NULL,'N','N',NULL,NULL,'N',NULL,NULL,NULL,'Y'),(49,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'mancante',NULL,NULL,NULL,'Y'),(50,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'N',NULL,NULL,NULL,'Y'),(51,'Y','Y',NULL,8,'N','N',NULL,NULL,'N','N',NULL,NULL,'N',NULL,NULL,NULL,'Y'),(52,'Y','Y',NULL,44,'Y','N',44,44,'N','N',NULL,NULL,'Y',NULL,20,44,'Y'),(55,'N','N',NULL,NULL,'Y','Y',NULL,33,'N','N',NULL,NULL,'Y',NULL,24,33,'Y'),(56,'N','N',NULL,NULL,'N','N',NULL,NULL,'Y','Y',NULL,17,'N',NULL,NULL,NULL,'Y'),(57,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'Y','N',6,8,NULL,NULL,NULL,NULL,'Y'),(58,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,'mancante','N',NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(60,'Y','Y',NULL,8,'mancante','N',NULL,NULL,'mancante','N',NULL,8,NULL,NULL,NULL,NULL,'Y'),(61,'Y','Y',NULL,6,'N','N',NULL,NULL,'N','N',NULL,NULL,'N',NULL,NULL,NULL,'Y'),(62,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,'Y','N',NULL,NULL,'Y','N',NULL,NULL,'Y','N',NULL,NULL,'Y',NULL,NULL,NULL,'N'),(68,'Y','N',NULL,NULL,'Y','N',NULL,NULL,'Y','N',NULL,NULL,'Y',NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `allattamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apparato_cardiovascolare_mf`
--

DROP TABLE IF EXISTS `apparato_cardiovascolare_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apparato_cardiovascolare_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `versamenti` enum('Y','N') DEFAULT NULL,
  `altro` tinytext,
  `cuore_forma` tinytext,
  `cuore_volume` tinytext,
  `cuore_consistenza` tinytext,
  `epicardio` tinytext,
  `cuore_peso_gr` int DEFAULT NULL,
  `diametro_trasverso_mm` int DEFAULT NULL,
  `diametro_longitudinale_mm` int DEFAULT NULL,
  `diametro_antero_posteriore_mm` int DEFAULT NULL,
  `spessore_ventricolo_dx_mm` int DEFAULT NULL,
  `spessore_ventricolo_sx_mm` int DEFAULT NULL,
  `spessore_setto_interventricolare_mm` int DEFAULT NULL,
  `forame_ovale` tinytext,
  `dotto_arterioso` tinytext,
  `endocardio_parietale_valvolare` tinytext,
  `miocardio` tinytext,
  `osti_coronarici_seno_coronarico` tinytext,
  `coronarie` tinytext,
  `aorta_asc_arco_aortico` tinytext,
  `tronco_polmonare_rami_principali` tinytext,
  `grossi_tronchi_arteriosi_arco` tinytext,
  `aorta_toracica_addominale` tinytext,
  `vene_cave_tronchi_venosi` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_apparato_cardiovascolare_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apparato_cardiovascolare_mf`
--

LOCK TABLES `apparato_cardiovascolare_mf` WRITE;
/*!40000 ALTER TABLE `apparato_cardiovascolare_mf` DISABLE KEYS */;
INSERT INTO `apparato_cardiovascolare_mf` VALUES (3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'s',NULL,NULL,NULL,'N'),(4,'Y',NULL,'forma',NULL,'consistena','epicardio',369,25,NULL,NULL,85,NULL,14,'for','do','andoe','mio','osti','cornoari','aroto','tronvo','fteopw','sdkfnf','vene cave','Y'),(5,'Y','altro','forma','colvum','consistenza','epica',1,2,3,4,5,6,7,'for','dot','endo','mio','oti','conos','ao a','tro','gro','ao t','vene',NULL),(9,'Y',NULL,'asd',NULL,'ads',NULL,66,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fghjk',NULL,NULL,'sdasdada','Y'),(12,'Y',NULL,'forma',NULL,'consiste',NULL,580,NULL,NULL,NULL,NULL,NULL,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'tronchi','Y'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(54,NULL,NULL,NULL,'Ingrossato.','Aumentata',NULL,32,35,50,3,4,5,5,'Pervio',NULL,'Liscio','Dura ma friabile, sfaldante al tatto e al campionamento.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,NULL,NULL,NULL,NULL,'Aumentata per la presenza di coaguli',NULL,12,26,40,21,3,3,3,'Pervio',NULL,'Liscio e lucente','Normo-fascicolato',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `apparato_cardiovascolare_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apparato_cardiovascolare_sids`
--

DROP TABLE IF EXISTS `apparato_cardiovascolare_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apparato_cardiovascolare_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `versamenti` enum('Y','N') DEFAULT NULL,
  `altro` tinytext,
  `cuore_forma` tinytext,
  `cuore_volume` tinytext,
  `cuore_consistenza` tinytext,
  `epicardio` tinytext,
  `cuore_peso_gr` int DEFAULT NULL,
  `diametro_trasverso_mm` int DEFAULT NULL,
  `diametro_longitudinale_mm` int DEFAULT NULL,
  `diametro_antero_posteriore_mm` int DEFAULT NULL,
  `spessore_ventricolo_dx_mm` int DEFAULT NULL,
  `spessore_ventricolo_sx_mm` int DEFAULT NULL,
  `spessore_setto_interventricolare_mm` int DEFAULT NULL,
  `forame_ovale` tinytext,
  `dotto_arterioso` tinytext,
  `endocardio_parietale_valvolare` tinytext,
  `miocardio` tinytext,
  `osti_coronarici_seno_coronarico` tinytext,
  `coronarie` tinytext,
  `aorta_asc_arco_aortico` tinytext,
  `tronco_polmonare_rami_principali` tinytext,
  `grossi_tronchi_arteriosi_arco` tinytext,
  `aorta_toracica_addominale` tinytext,
  `vene_cave_tronchi_venosi` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_apparato_cardiovascolare_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `dati_protocollo_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apparato_cardiovascolare_sids`
--

LOCK TABLES `apparato_cardiovascolare_sids` WRITE;
/*!40000 ALTER TABLE `apparato_cardiovascolare_sids` DISABLE KEYS */;
INSERT INTO `apparato_cardiovascolare_sids` VALUES (1,'Y','altro versamento','forma','volume','consisteny','epicardio',1,2,3,4,5,8,9,'foramedsjkfkdjk','dottdfskdsjlfdÃ©lkfjsl','endo','mio','osti','conora','aort a','tronco','grossi','aorta t','vene','Y'),(8,'N',NULL,'dfd',NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,'df',NULL,'fdsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(10,'Y',NULL,'Rotonda','Volume grosso','Molle',NULL,256,NULL,NULL,NULL,NULL,NULL,22,'formale','dotto arterioso',NULL,'miocardio',NULL,NULL,'aorta ascnedente',NULL,'grossi trocnhi arteriosi',NULL,'vebeene','Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,'N',NULL,'Normoconformato.',NULL,'Duro-elastica','Liscio e lucente',27,30,46,36,4,9,9,'Pervio.','Chiuso artificialmente.','Liscio e lucente','Omogeneo.',NULL,NULL,NULL,'Presenza di coaguli.',NULL,NULL,NULL,'N'),(48,NULL,NULL,'Conica',NULL,'Duro-elastica, aumentata.',NULL,26,36,50,28,4,6,9,'Chiuso.',NULL,NULL,'Molto friabile.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(49,NULL,NULL,'Conica.',NULL,'Conservata.',NULL,19,40,40,28,6,7,9,'Pervio.',NULL,'Liscio e lucente.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(50,NULL,NULL,NULL,NULL,'Aumentata.',NULL,29,40,42,25,4,8,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(51,'N',NULL,'Conservata.',NULL,'Aumentata.',NULL,38,45,55,31,3,8,8,NULL,NULL,NULL,NULL,NULL,NULL,'Presente.',NULL,NULL,'Aorta addominale',NULL,'N'),(52,'N',NULL,'Conica',NULL,'Flaccida a destra, aumentata a sinistra.',NULL,56,44,56,39,1,7,6,'Chiuso','Chiuso','Liscio e lucente','Pallido.  Presenza di coaguli a stampo nel ventricolo di destra, Presenta di coaguli sia nel ventricolo sinistro che nell\'atrio sinistro.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(55,NULL,NULL,'Conica',NULL,'Ridotta a destra e aumentata a sinistra','liscio e lucente.',54,46,52,38,1,10,8,'Non completamente obliterato.','Chiuso.','Liscio e lucente.','Brunastro omogeneo.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(56,NULL,NULL,'Allungata.',NULL,'Rigida a destra e molto dure (linea) a sinistra.',NULL,27,35,50,26,1,7,5,'Pervio per 3 mm','Chiuso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `apparato_cardiovascolare_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apparato_respiratorio_mf`
--

DROP TABLE IF EXISTS `apparato_respiratorio_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apparato_respiratorio_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `laringe` varchar(45) DEFAULT NULL,
  `trachea` tinytext,
  `bronchi_principali` tinytext,
  `polmone_dx_peso_gr` int DEFAULT NULL,
  `polmone_sx_peso_gr` int DEFAULT NULL,
  `num_lobi_dx` int DEFAULT NULL,
  `num_lobi_sx` int DEFAULT NULL,
  `volume` tinytext,
  `consistenza` tinytext,
  `colore` tinytext,
  `sup_esterna` tinytext,
  `al_taglio` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_apparato_respiratorio_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apparato_respiratorio_mf`
--

LOCK TABLES `apparato_respiratorio_mf` WRITE;
/*!40000 ALTER TABLE `apparato_respiratorio_mf` DISABLE KEYS */;
INSERT INTO `apparato_respiratorio_mf` VALUES (3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(4,'laring',NULL,NULL,298,258,3,5,'volume',NULL,'colora',NULL,NULL,'Y'),(5,'laring','trac','bronchi',2,1,4,3,'vo','con','col','sup','tagio',NULL),(9,NULL,NULL,NULL,88,23,85,1,NULL,NULL,NULL,NULL,NULL,'Y'),(12,NULL,NULL,NULL,80,3,12,5,NULL,NULL,NULL,NULL,NULL,'Y'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(54,NULL,NULL,'Pervi.',24,20,3,2,NULL,'Duro elastica.','Brunastro','Fini petecchie.\r\nA livello apicale di entrambi i polmoni presenza di impronte costali',NULL,'Y'),(63,NULL,NULL,NULL,14,11,3,2,NULL,'Duro-elastica','Brunastro','Accenno di impronte costali apicali','Superficie brunastra omogenea','Y'),(65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `apparato_respiratorio_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apparato_respiratorio_sids`
--

DROP TABLE IF EXISTS `apparato_respiratorio_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apparato_respiratorio_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `laringe` tinytext,
  `trachea` tinytext,
  `bronchi_principali` tinytext,
  `polmone_dx_peso_gr` int DEFAULT NULL,
  `polmone_sx_peso_gr` int DEFAULT NULL,
  `num_lobi_dx` int DEFAULT NULL,
  `num_lobi_sx` int DEFAULT NULL,
  `volume` tinytext,
  `consistenza` tinytext,
  `colore` tinytext,
  `sup_esterna` tinytext,
  `al_taglio` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_apparato_respiratorio_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `dati_protocollo_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apparato_respiratorio_sids`
--

LOCK TABLES `apparato_respiratorio_sids` WRITE;
/*!40000 ALTER TABLE `apparato_respiratorio_sids` DISABLE KEYS */;
INSERT INTO `apparato_respiratorio_sids` VALUES (1,'alrigne','tachea','bronchi',1,2,4,3,'volume','consiste','color','supe','taglio','Y'),(8,NULL,NULL,NULL,147,56,7,5,NULL,NULL,NULL,NULL,NULL,'Y'),(10,NULL,NULL,NULL,83,89,2,3,NULL,NULL,NULL,NULL,NULL,'Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,NULL,'Presenza di muco denso.','Presenza di muco denso.',53,46,3,1,NULL,'Notevolmente aumentata.','Disomogeneo, brunastro.',NULL,NULL,'Y'),(48,NULL,NULL,NULL,58,39,3,2,NULL,'Duro-elastica.','Brunastro.','Fini petecchie.','Superficie omogenea, brunastra.','Y'),(49,NULL,NULL,NULL,39,26,3,2,NULL,'Duro-elastica.',NULL,'Disomogenea con aree grigio-brunastre.','Consistenza sostenuta per aumentata consistenza delle diramazioni bronchiali.','Y'),(50,'SI.','SI.','SI.',52,43,3,2,NULL,'Aumentata, duro-elastica, compatta a destra.','Bruno-grigiastro.','Disomogenea.','Colorito bruno-grigiastro, disomogeneo.','Y'),(51,NULL,'si','pervi.',62,44,3,2,NULL,NULL,'Sinistro: colorito bruno violaceo. \r\nDestro: colorito grigio brunastro','Lievi impronte costali, fini petecchie diffuse.','Polmone sinistro: Parenchima brunastro omogeneo.\r\nPolmone destro: parenchima disomogeneo di colorito grigio brunastro.','Y'),(52,'Perviene giÃ  aperta. Non si notano alterazioni macroscopicamente evidenti. Assenza di materiale al suo interno.','Perviene giÃ  aperta. Non si notano alterazioni macroscopicamente evidenti. Assenza di materiale al suo interno.','Perviene giÃ  aperta. Non si notano alterazioni macroscopicamente evidenti. Assenza di materiale al suo interno.',86,74,3,2,'Conservato.','Polmone destro Spugnosa dei lobi medio, mentre lobo inferiore aumentata.\r\nPolmone sinistro spugnosa nel lobo inferiore, mentre nel lobo superiore improntabile.','Polmone destro colorito violaceo marezzato.\r\nPolmone sinistro colorito violaceo marezzato','Polmone destro: qualche petecchia subpleurica.\r\npolmone sinistro: superficie opaca','Polmone destro: parenchima polmonare brunastro disomogeneo. spugnoso, con abbondante materia schiumosa sulla superficie di taglio sia per il lobo superiore e medio. Il parenchima polmonare del lobo inferiore appare brunastro compatto (color cioccolato) co','Y'),(55,NULL,NULL,NULL,72,93,3,2,'Forma e volumi conservati','Polmone sinistro consistenza aumentata.\r\nPolmone destro consistenza spugnosa','Polmone destro: superficie posteriore violacea.\r\nPolmone sinistro: violaceo marezzato con macro petecchie.','Polmone destro: presenza di qualche petecchia nel lobo superiore.\r\nPolmone sinistro: costellato da macro petecchie palpabili (fini a circa 0.4cm di diametro), soprattutto a carico del lobo superiore','Polmone destro: fuoriesce materiale spugnoso biancastro; il parenchima polmonare si presenta spugnoso, pallido e punteggiato.\r\nPolmone sinistro: alla spremitura fuoriuscita dei bronchi principali di materiale siero ematico e poltaceo brunastro. Il parench','Y'),(56,NULL,NULL,NULL,39,35,2,1,'Leggermente aumentato',NULL,'Grigiastro disomogeneo','Impronte costali pronunciate. Improntabile sulla superficie','Parenchima polmonare pallido spugnoso e compatto. Fuoriesce scarso materiale schiumoso.','Y'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `apparato_respiratorio_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cavita_addominale_mf`
--

DROP TABLE IF EXISTS `cavita_addominale_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cavita_addominale_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `stato_viscerale` enum('proprio','situs viscerum inversus') DEFAULT NULL,
  `num_arterie_vena_ombelicale_normali` int DEFAULT NULL,
  `arterie_vena_ombelicale_stato` enum('normali','agenesia','ipoplasia') DEFAULT NULL,
  `dotto_Aranzio` enum('pervio','stenotico','assente') DEFAULT NULL,
  `vene_sovraepatiche_vena_cava_inf` enum('normali','trombizzate','malformate') DEFAULT NULL,
  `specifica_vene_sovraepatiche_vena_cava_inf_malformate` tinytext,
  `stomaco` enum('normale','normodotato','ipoplasico','sovradisteso') DEFAULT NULL,
  `piccolo_grosso_intestino` enum('normosito e normoconformato','emorragie gastrointestinali','malformazioni') DEFAULT NULL,
  `specifica_piccolo_grosso_intestino_malformazioni` tinytext,
  `appendice_ciecale_sita_in` tinytext,
  `fegato_peso_gr` int DEFAULT NULL,
  `fegato_volume` enum('normale','aumentato','ridotto') DEFAULT NULL,
  `fegato_isomerismo` enum('Y','N') DEFAULT NULL,
  `specifica_fegato_isomerismo` tinytext,
  `fegato_consistenza` enum('propria','ridotta','aumentata') DEFAULT NULL,
  `fegato_superficie` enum('liscia lucente','granulare','mammellonata') DEFAULT NULL,
  `fegato_parenchima_al_taglio` enum('normale','congesto','pallido','giallastro','verdastro') DEFAULT NULL,
  `colecisti` enum('normale','ipoplasia','sovradistesa') DEFAULT NULL,
  `vie_biliarie_extraepatiche` enum('normali e pervie','ipoplasiche','assenti') DEFAULT NULL,
  `pancreas` enum('normale','ridotto','malformato') DEFAULT NULL,
  `specifica_pancreas_malformato` tinytext,
  `milza` enum('normale','a destra','assente','milza accessoria') DEFAULT NULL,
  `milza_num` int DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT NULL,
  `idreni` int DEFAULT NULL,
  `surreni` enum('normali','malformati') DEFAULT NULL,
  `specifica_surreni_malformati` tinytext,
  `surreni_emorragie` enum('Y','N') DEFAULT NULL,
  `surreni_ispessimenti` enum('diffusi','nodulari') DEFAULT NULL,
  `rene_dx_peso_gr` int DEFAULT NULL,
  `rene_dx_stato` enum('Y','N') DEFAULT NULL,
  `specifica_rene_dx_malformazione` tinytext,
  `rene_dx_ischemia_corticale_congestione_midollare` enum('Y','N') DEFAULT NULL,
  `rene_dx_microlisi_ascessualizzazioni` enum('Y','N') DEFAULT NULL,
  `rene_sx_peso_gr` int DEFAULT NULL,
  `rene_sx_stato` enum('Y','N') DEFAULT NULL,
  `specifica_rene_sx_malformazione` tinytext,
  `rene_sx_ischemia_corticale_congestione_midollare` enum('Y','N') DEFAULT NULL,
  `rene_sx_microlisi_ascessualizzazioni` enum('Y','N') DEFAULT NULL,
  `ureteri` enum('normali','malformati') DEFAULT NULL,
  `specifica_ureteri_malformazioni` tinytext,
  `vescica_urinaria` enum('normale','malformata') DEFAULT NULL,
  `specifica_vescica_urinaria_malformazione` tinytext,
  `vescica_urinaria_contenuto` enum('vuota','urina','sangue e coaguli ematici') DEFAULT NULL,
  `uraco` enum('normale','assente','cistico') DEFAULT NULL,
  `testicoli` enum('in addome','canale inguinale','scroto','assenti') DEFAULT NULL,
  `utero_tube_ovaie` enum('senza anomalie macroscopiche e di dimensione nella norma','cisti ovariche','malformazioni') DEFAULT NULL,
  `specifica_utero_tube_ovaie_malformazioni` tinytext,
  `grandi_vasi` enum('normali','trombizzati','malformati') DEFAULT NULL,
  `specifica_grandi_vasi_malformazione` tinytext,
  `conclusa2` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_cavita_addominale_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cavita_addominale_mf`
--

LOCK TABLES `cavita_addominale_mf` WRITE;
/*!40000 ALTER TABLE `cavita_addominale_mf` DISABLE KEYS */;
INSERT INTO `cavita_addominale_mf` VALUES (3,NULL,NULL,NULL,NULL,'malformate',NULL,NULL,'malformazioni',NULL,NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,NULL,NULL,'malformato',NULL,NULL,NULL,'N',3,'malformati',NULL,NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,'Y',NULL,NULL,NULL,'malformati',NULL,'malformata',NULL,NULL,NULL,NULL,'malformazioni',NULL,'malformati',NULL,'N'),(4,'situs viscerum inversus',5,'agenesia','stenotico','trombizzate',NULL,'normodotato','normosito e normoconformato',NULL,NULL,356,'aumentato','N',NULL,'ridotta','liscia lucente','giallastro','ipoplasia','ipoplasiche','malformato','malformato','milza accessoria',NULL,'Y',4,'malformati','tipo malfomtaroto','N','nodulari',123,'N',NULL,'N','Y',156,'Y','malfo SX','Y','N','normali',NULL,'malformata','vedcia','sangue e coaguli ematici','assente','canale inguinale',NULL,NULL,'trombizzati',NULL,'Y'),(5,'situs viscerum inversus',1,'ipoplasia','stenotico','malformate','sÃ¨peecc','sovradisteso','malformazioni','specintestino','ciaelcle',2,'aumentato','Y','isome','ridotta','mammellonata','congesto','ipoplasia','assenti','malformato','specififo','a destra',2,NULL,5,'malformati','fasdasd','Y','nodulari',1,'Y','apecifico','N','Y',1,'Y','sinistro','Y','N','malformati','specifico','malformata','specifico','sangue e coaguli ematici','assente','canale inguinale','malformazioni','speficica','malformati','fadgvhsagvdjhsd',NULL),(9,'proprio',6,'ipoplasia','stenotico','malformate',NULL,'normale','normosito e normoconformato',NULL,NULL,580,'normale','N',NULL,'propria','mammellonata','normale','normale','normali e pervie','ridotto',NULL,'normale',NULL,'N',9,'normali',NULL,'Y','diffusi',32,'N',NULL,'N','Y',88,'N',NULL,'N','Y','normali',NULL,'normale',NULL,'sangue e coaguli ematici','assente','canale inguinale',NULL,NULL,'normali',NULL,'Y'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(54,'proprio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',54,NULL,NULL,NULL,NULL,9,'N',NULL,NULL,NULL,8,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'scroto',NULL,NULL,NULL,NULL,'N'),(63,NULL,NULL,NULL,NULL,NULL,NULL,'normale','normosito e normoconformato',NULL,'Presente nei quadranti addominali inferiori di destra',30,'normale',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'normale',NULL,'N',63,'normali',NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(65,NULL,NULL,NULL,NULL,'malformate',NULL,NULL,'malformazioni',NULL,NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,NULL,NULL,'malformato',NULL,NULL,NULL,'N',65,'malformati',NULL,NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,'Y',NULL,NULL,NULL,'malformati',NULL,'malformata',NULL,NULL,NULL,NULL,'malformazioni',NULL,'malformati',NULL,'N');
/*!40000 ALTER TABLE `cavita_addominale_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cavita_addominale_sids`
--

DROP TABLE IF EXISTS `cavita_addominale_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cavita_addominale_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `eterotassia_viscerale` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_malformazioni` enum('Y','N') DEFAULT NULL,
  `specifica_tratto_gastroenterico_malformazioni` tinytext,
  `tratto_gastroenterico_emorragie` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_altro` tinytext,
  `surreni_peso_gr` int DEFAULT NULL,
  `surreni_emorragie` enum('Y','N') DEFAULT NULL,
  `surreni_ispessimenti` enum('diffusi','nodulari') DEFAULT NULL,
  `reni_peso_gr` int DEFAULT NULL,
  `reni_malformazioni` enum('Y','N') DEFAULT NULL,
  `ischemia_corticale_congestione_midollare` enum('Y','N') DEFAULT NULL,
  `microlitiasi_ascessualizzazioni` enum('Y','N') DEFAULT NULL,
  `milza_peso_gr` int DEFAULT NULL,
  `tipo` enum('assenza','milze multiple') DEFAULT NULL,
  `fegato_peso_gr` int DEFAULT NULL,
  `fegato_colore` tinytext,
  `pancreas_peso_gr` int DEFAULT NULL,
  `pancreas_colore` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_cavita_addominale_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `dati_protocollo_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cavita_addominale_sids`
--

LOCK TABLES `cavita_addominale_sids` WRITE;
/*!40000 ALTER TABLE `cavita_addominale_sids` DISABLE KEYS */;
INSERT INTO `cavita_addominale_sids` VALUES (1,'Y','Y','speci MG','N','altro G',4,'Y','diffusi',2,'Y','Y','N',2,'assenza',5,'asdsdasd',1,'adasdasdasddasdasdadasda','Y'),(8,'Y',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'milze multiple',NULL,NULL,NULL,'dfdsfsfs','N'),(10,'Y','N','dasjkdask','Y','niente da aggiungere',987,'Y','diffusi',1,'Y','Y','Y',21,'assenza',33,'consis',98,'taglio','Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(48,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,17,NULL,214,NULL,NULL,NULL,'N'),(49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,NULL,181,NULL,NULL,NULL,'N'),(50,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,160,NULL,NULL,NULL,'N'),(51,'Y','N',NULL,'N','Segni aspecifici di stasi ematica e focali petecchie sierose.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,290,NULL,50,NULL,'N'),(55,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(56,'Y','N',NULL,NULL,NULL,10,NULL,NULL,30,NULL,NULL,NULL,15,NULL,180,'Consistenza aumentata. Colorito giallo verdastro marezzato, disomogeneo.',NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,NULL,'Y',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `cavita_addominale_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cavita_toracica_mf`
--

DROP TABLE IF EXISTS `cavita_toracica_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cavita_toracica_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `stato_viscerale` enum('situs solitus','situs inversus') DEFAULT NULL,
  `versamenti_cavi_pleurici` enum('Y','N') DEFAULT NULL,
  `pneumotorace` enum('Y','N') DEFAULT NULL,
  `asimmetria_viscerale` enum('Y','N') DEFAULT NULL,
  `specifica_asimmetria_viscerale` tinytext,
  `laringe_trachea_bronchi` enum('normali','malformati','pervie') DEFAULT NULL,
  `specifica_laringe_trachea_bronchi_malformata` tinytext,
  `esofago` enum('normale','fistole','malformazioni') DEFAULT NULL,
  `specifica_esofago_malformazioni` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_cavita_toracica_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cavita_toracica_mf`
--

LOCK TABLES `cavita_toracica_mf` WRITE;
/*!40000 ALTER TABLE `cavita_toracica_mf` DISABLE KEYS */;
INSERT INTO `cavita_toracica_mf` VALUES (3,NULL,NULL,NULL,'Y',NULL,'malformati',NULL,'malformazioni',NULL,'N'),(4,'situs solitus','N','N','Y','specifico','pervie',NULL,'fistole',NULL,'Y'),(5,'situs inversus','Y','Y','Y','asdfghj','pervie','wrtztuiopÃ¨','malformazioni','dsfghjk',NULL),(9,'situs inversus','Y','N','N',NULL,'malformati','dsfsdf','fistole',NULL,'Y'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(54,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,NULL,'Y',NULL,'N',NULL,NULL,NULL,NULL,NULL,'N'),(65,NULL,NULL,NULL,'Y',NULL,'malformati',NULL,'malformazioni',NULL,'N');
/*!40000 ALTER TABLE `cavita_toracica_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cavita_toracica_sids`
--

DROP TABLE IF EXISTS `cavita_toracica_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cavita_toracica_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `vie_aeree` enum('pervie','corpi estranei','ab ingestis','edema glottide') DEFAULT NULL,
  `versamenti` enum('Y','N') DEFAULT NULL,
  `pneumotorace` enum('Y','N') DEFAULT NULL,
  `altro_cavi_pleurici` tinytext,
  `asimmetria_viscerale` enum('Y','N') DEFAULT NULL,
  `specifica_asimmetria_viscerale` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_cavita_toracica_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `dati_protocollo_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cavita_toracica_sids`
--

LOCK TABLES `cavita_toracica_sids` WRITE;
/*!40000 ALTER TABLE `cavita_toracica_sids` DISABLE KEYS */;
INSERT INTO `cavita_toracica_sids` VALUES (1,'pervie','Y','N','cavi pleuricofasdfdsff','Y','apapapapfsdfadffaf','Y'),(6,NULL,'N','N',NULL,'N',NULL,NULL),(8,'corpi estranei','N','Y',NULL,'N',NULL,'Y'),(10,'edema glottide','N','N',NULL,'N','asdasd','Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(48,'pervie',NULL,NULL,NULL,NULL,NULL,'N'),(49,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(50,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(51,NULL,'Y',NULL,NULL,NULL,NULL,'N'),(52,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(55,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(56,'pervie',NULL,NULL,NULL,NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,NULL,NULL,NULL,NULL,'Y',NULL,'N');
/*!40000 ALTER TABLE `cavita_toracica_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cavo_orale_mf`
--

DROP TABLE IF EXISTS `cavo_orale_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cavo_orale_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `tiroide_peso_gr` int DEFAULT NULL,
  `tiroide_stato` enum('normale','malformata') DEFAULT NULL,
  `specifica_tiroide_stato_malformata` tinytext,
  `timo_peso_gr` int DEFAULT NULL,
  `timo_stato` enum('presente','assente','petecchie emorragiche') DEFAULT NULL,
  `linfonodi` tinytext,
  `laringe_stato` enum('normale','malformata') DEFAULT NULL,
  `specifica_laringe_stato_malformata` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_cavo_orale_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cavo_orale_mf`
--

LOCK TABLES `cavo_orale_mf` WRITE;
/*!40000 ALTER TABLE `cavo_orale_mf` DISABLE KEYS */;
INSERT INTO `cavo_orale_mf` VALUES (3,NULL,'malformata',NULL,NULL,NULL,NULL,'malformata',NULL,'N'),(4,NULL,'malformata','speicifif',NULL,'petecchie emorragiche',NULL,'malformata','malfomarzionie','Y'),(5,4,'malformata','spec',5,'petecchie emorragiche','infogno','malformata','specifico',NULL),(9,NULL,'malformata','asdsadsad',NULL,NULL,NULL,NULL,NULL,'Y'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(54,NULL,'normale',NULL,4,'presente',NULL,'normale',NULL,'Y'),(63,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,'Y'),(65,NULL,'malformata',NULL,NULL,NULL,NULL,'malformata',NULL,'N');
/*!40000 ALTER TABLE `cavo_orale_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cavo_orale_sids`
--

DROP TABLE IF EXISTS `cavo_orale_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cavo_orale_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `tiroide` tinytext,
  `timo` tinytext,
  `paratiroidi` tinytext,
  `linfonodi` tinytext,
  `blocco_lingua_ipofaringe` tinytext,
  `ghiandole_salivari_paralinguali` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_cavo_orale_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `dati_protocollo_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cavo_orale_sids`
--

LOCK TABLES `cavo_orale_sids` WRITE;
/*!40000 ALTER TABLE `cavo_orale_sids` DISABLE KEYS */;
INSERT INTO `cavo_orale_sids` VALUES (1,'tiro','timo','para','allalala','blocco','ghiad','Y'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'sdf','wqw','da','ghjk','afa','sdaws','Y'),(10,'tiroide tiroide','timo timo','para tiroidi para tiroidi','linfonodi linfonodi','blocco lingua ipofaringe','ghiandole salivari paralinguali','Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(17,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(25,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(29,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(47,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(48,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(49,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(50,'SI','SI',NULL,NULL,NULL,NULL,'Y'),(51,NULL,'Peso 25.4 g, petecchie emorragiche sierose ed emorragia parenchimale al lobo di destra.',NULL,NULL,NULL,NULL,'Y'),(52,'In sede, normo sviluppata.','50 grammi',NULL,NULL,NULL,NULL,'Y'),(55,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(56,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(61,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(67,NULL,NULL,NULL,NULL,NULL,NULL,'Y');
/*!40000 ALTER TABLE `cavo_orale_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centri`
--

DROP TABLE IF EXISTS `centri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `centri` (
  `id` int unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `regione` varchar(45) NOT NULL COMMENT 'nella regione del centro nazionale ci saranno due centri',
  `via` varchar(45) NOT NULL,
  `citta` varchar(45) NOT NULL,
  `cap` varchar(5) NOT NULL,
  `info` tinytext,
  `telefono` varchar(20) DEFAULT '',
  `email` varchar(45) DEFAULT NULL,
  `direttore` tinytext,
  `responsabile_schede` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centri`
--

LOCK TABLES `centri` WRITE;
/*!40000 ALTER TABLE `centri` DISABLE KEYS */;
INSERT INTO `centri` VALUES (1,'Lombardia','Lombardia','Via della Commenda 9','Milano','20122','Centro Regionale Lombardia','025012345','lombardia@unimi.it','Luigi Pirandello','Grazia Grazie'),(2,'Nazionale','Nazionale','Via della Commenda 19','milano','20122','Centro Nazionale','025328838','linorossi@unimi.it',NULL,NULL),(3,'Abruzzo','Abruzzo','','L\'Aquila','','Centro Regionale Abruzzo',NULL,NULL,NULL,NULL),(4,'Basilicata','Basilicata','','Potenza','','Centro Regionale Basilicata',NULL,NULL,NULL,NULL),(5,'Calabria','Calabria','','Reggio Calabria','','Centro Regionale Calabria',NULL,NULL,NULL,NULL),(6,'Campania','Campania','','Napoli','','Centro Regionale Campania',NULL,NULL,NULL,NULL),(7,'Emilia Romagna','Emilia Romagna','','Bologna','','Centro Regionale Emilia Romagna',NULL,NULL,NULL,NULL),(8,'Friuli Venezia Giulia','Friuli Venezia Giulia','','Trieste','','Centro Regionale Friuli Venezia Giulia',NULL,NULL,NULL,NULL),(9,'Lazio','Lazio','','Roma','','Centro Regionale Lazio',NULL,NULL,NULL,NULL),(10,'Liguria','Liguria','','Genova','','Centro Regionale Liguria',NULL,NULL,NULL,NULL),(11,'Marche','Marche','','Ancona','','Centro Regionale Marche',NULL,NULL,NULL,NULL),(12,'Molise','Molise','','Campobasso','','Centro Regionale Molise',NULL,NULL,NULL,NULL),(13,'Piemonte','Piemonte','','Torino','','Centro Regionale Piemonte',NULL,NULL,NULL,NULL),(14,'Puglia','Puglia','','Bari','','Centro Regionale Puglia',NULL,NULL,NULL,NULL),(15,'Sardegna','Sadegna','','Cagliari','','Centro Regionale Sardegna',NULL,NULL,NULL,NULL),(16,'Sicilia','Sicilia','','Palermo','','Centro Regionale Sicilia',NULL,NULL,NULL,NULL),(17,'Toscana','Toscana','','Firenze','','Centro Regionale Toscana',NULL,NULL,NULL,NULL),(18,'Trentino Alto Adige','Trentino Alto Adige','','Trento','','Centro Regionale Trentino',NULL,NULL,NULL,NULL),(19,'Umbria','Umbria','','Perugia','','Centro Regionale Umbria',NULL,NULL,NULL,NULL),(20,'Valle d\'Aosta','Valle d\'Aosta','','Aosta','','Centro Regionale Valle d\'Aosta',NULL,NULL,NULL,NULL),(21,'Veneto','Veneto','','Venezia','','Centro Regionale Veneto',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `centri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consenso`
--

DROP TABLE IF EXISTS `consenso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consenso` (
  `id_scheda` int unsigned NOT NULL DEFAULT '0',
  `id` int NOT NULL DEFAULT '0',
  `name` varchar(60) DEFAULT NULL,
  `tipo` enum('riscontro','genetiche','tossicologiche') DEFAULT NULL,
  `conclusa` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_scheda`,`id`),
  CONSTRAINT `fk_consenso` FOREIGN KEY (`id_scheda`) REFERENCES `schede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consenso`
--

LOCK TABLES `consenso` WRITE;
/*!40000 ALTER TABLE `consenso` DISABLE KEYS */;
INSERT INTO `consenso` VALUES (1,1,NULL,NULL,'Y'),(1,2,NULL,NULL,'Y'),(1,3,NULL,NULL,'Y'),(4,1,'consenso_riscontro_reg_4.pdf',NULL,'Y'),(4,2,NULL,NULL,'Y'),(4,3,NULL,NULL,'Y'),(8,1,NULL,NULL,'Y'),(8,2,NULL,NULL,'Y'),(8,3,NULL,NULL,'Y'),(9,1,NULL,NULL,'Y'),(9,2,NULL,NULL,'Y'),(9,3,NULL,NULL,'Y'),(10,1,NULL,NULL,'Y'),(10,2,NULL,NULL,'Y'),(10,3,NULL,NULL,'Y'),(11,1,'brtM8dsMPjY5YcYiGZUMnYpje70ZQO.pdf',NULL,'Y'),(11,2,NULL,NULL,'Y'),(11,3,'92fCOnQhaFA8LylJR1JLN7KdrYkrXb.pdf',NULL,'Y'),(12,1,'qrZprZZFxqsUKxBnTfi11Fo1o6c5mj.pdf',NULL,'Y'),(12,2,'consenso_analisi_genetiche_reg_12.jpg',NULL,'Y'),(12,3,NULL,NULL,'Y'),(19,1,NULL,NULL,'Y'),(19,2,NULL,NULL,'Y'),(19,3,NULL,NULL,'Y'),(29,1,NULL,NULL,'Y'),(29,2,NULL,NULL,'Y'),(29,3,NULL,NULL,'Y'),(30,1,NULL,NULL,'Y'),(30,2,NULL,NULL,'Y'),(30,3,NULL,NULL,'Y'),(47,1,NULL,NULL,'Y'),(47,2,NULL,NULL,'Y'),(47,3,NULL,NULL,'Y'),(48,1,NULL,NULL,'N'),(48,2,NULL,NULL,'N'),(48,3,NULL,NULL,'N'),(49,1,NULL,NULL,'Y'),(49,2,NULL,NULL,'Y'),(49,3,NULL,NULL,'Y'),(50,1,NULL,NULL,'Y'),(50,2,NULL,NULL,'Y'),(50,3,NULL,NULL,'Y'),(51,1,NULL,NULL,'Y'),(51,2,NULL,NULL,'Y'),(51,3,NULL,NULL,'Y'),(52,1,NULL,NULL,'N'),(52,2,NULL,NULL,'N'),(52,3,NULL,NULL,'N'),(54,1,NULL,NULL,'Y'),(54,2,NULL,NULL,'Y'),(54,3,NULL,NULL,'Y'),(55,1,NULL,NULL,'N'),(55,2,NULL,NULL,'N'),(55,3,NULL,NULL,'N'),(56,1,NULL,NULL,'N'),(56,2,NULL,NULL,'N'),(56,3,NULL,NULL,'N'),(61,1,NULL,NULL,'Y'),(61,2,NULL,NULL,'Y'),(61,3,NULL,NULL,'Y'),(63,1,NULL,NULL,'N'),(63,2,NULL,NULL,'N'),(63,3,NULL,NULL,'N'),(67,1,NULL,NULL,'N'),(67,2,NULL,NULL,'N'),(67,3,NULL,NULL,'N');
/*!40000 ALTER TABLE `consenso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dati_feto`
--

DROP TABLE IF EXISTS `dati_feto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dati_feto` (
  `schede_id` int unsigned NOT NULL DEFAULT '0',
  `cognome` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `via` varchar(45) DEFAULT NULL,
  `cap` varchar(5) DEFAULT NULL,
  `comune` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `sesso` enum('maschio','femmina') DEFAULT NULL,
  `data_morte` date DEFAULT NULL,
  `data_ultimo_controllo` date DEFAULT NULL,
  `eta_settimana_gestazione` int unsigned DEFAULT NULL COMMENT 'compresa tra 24 e 42',
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`schede_id`),
  CONSTRAINT `fk_dati_feto_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dati_feto`
--

LOCK TABLES `dati_feto` WRITE;
/*!40000 ALTER TABLE `dati_feto` DISABLE KEYS */;
INSERT INTO `dati_feto` VALUES (3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(4,'prova','fetale',NULL,NULL,'milano','milano','maschio','2008-05-04','2008-05-01',8,'Y'),(5,'ferr','llalal','via e numero','12345','aa','prov','maschio','2015-10-03','2015-10-20',27,NULL),(9,'fafa','aadfkja',NULL,'3632','asdas','asdasd','maschio','2005-05-06','2005-02-09',6,'Y'),(12,'ferrari','asdsads',NULL,NULL,NULL,NULL,'maschio',NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'MIOcognome','MIOnome','MIAvia 123','20100','MIOcomune','MIAprovincia','maschio','2019-10-01','2019-09-19',4,'Y'),(54,'Petre','Lorenzo Daniel','Via del turchino 20','20123','Milano','MI','maschio','2018-10-24',NULL,39,'N'),(63,'Postiglione','Beniamino Flavio','Via Carducci, 35','20093','Cologno Monzese','Milano','maschio','2023-08-24',NULL,NULL,'N'),(65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `dati_feto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dati_pers`
--

DROP TABLE IF EXISTS `dati_pers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dati_pers` (
  `schede_id` int unsigned NOT NULL,
  `tipo` enum('MADRE','PADRE') NOT NULL COMMENT 'data una scheda abbiamo due dati pers: uno per il padre e uno per la madre',
  `cognome` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `luogo_nascita` varchar(45) DEFAULT NULL,
  `eta` int DEFAULT NULL COMMENT 'calcolato automaticamente',
  `via` varchar(45) DEFAULT NULL,
  `cap` varchar(5) DEFAULT NULL,
  `comune` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `etnia` enum('caucasica','ispanica','medio orientale','indiana','asiatica','nera','meticcia','magrebina','altra','mancante') DEFAULT NULL,
  `specifica_etnia` tinytext,
  `professione` varchar(45) DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`schede_id`,`tipo`),
  KEY `fk_dati_pers_schede` (`schede_id`),
  CONSTRAINT `fk_dati_pers_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dati_pers`
--

LOCK TABLES `dati_pers` WRITE;
/*!40000 ALTER TABLE `dati_pers` DISABLE KEYS */;
INSERT INTO `dati_pers` VALUES (1,'MADRE','ferr','asasd','1989-10-12','mila',26,'via e numeo','12345','camam','knfksdj','altra','assas','metalmeccanico','Y'),(1,'PADRE','fefefe','luca','2015-10-10','milazzo',12,'askdaksd','12345','comune','mialn','altra','asdasdsad','proov','Y'),(3,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(3,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(4,'MADRE','medre','madre','1967-03-15','firenze',48,NULL,NULL,'firenzq','firenze','mancante',NULL,'cuoco','Y'),(4,'PADRE','cognome','padre','1962-04-06','bagno a ripoli',53,NULL,NULL,'firenze','firenze','caucasica',NULL,'metalmeccanico','Y'),(5,'MADRE','lalalal','anamsnda','2014-08-20',NULL,NULL,NULL,'123','cc','ahahaha','altra','apecifico',NULL,NULL),(5,'PADRE','padre','nomep','2015-10-04',NULL,NULL,'via della commenda 5','20122','comune','milano','altra','spec',NULL,NULL),(6,'MADRE','Muse','Lily','2015-10-04','brasceia',NULL,'via delle case 14',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'MADRE','dsfghjk','adsa','1966-11-08','milano',48,NULL,NULL,'milano','milano','caucasica',NULL,'maestra','Y'),(8,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(9,'MADRE',NULL,'dasdas','1955-10-19',NULL,60,NULL,'3656',NULL,NULL,NULL,NULL,NULL,'N'),(9,'PADRE',NULL,NULL,'1951-07-11',NULL,64,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(10,'MADRE','Pini','Giovanna','1961-05-12','roma',54,NULL,NULL,'Vicenza','Vicenza','caucasica','specifico','Infermiera','Y'),(10,'PADRE','Lavolta','Federico','1959-01-23','milano',56,NULL,NULL,'Vicenza','Vicenza','medio orientale','sdhabsda','Cuoco','Y'),(11,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(12,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(12,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(19,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(23,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(26,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(44,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'MADRE','MIAmadrecognome','MIAmadrenome','2000-10-11','MIAmadreluogonascita',18,NULL,NULL,'MIAmadrecomune','MIAmadreprovincia','caucasica',NULL,'MIAmadreprofessione','Y'),(46,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,'MADRE',NULL,NULL,NULL,NULL,NULL,'Via Padova, 191','20100','Milano','MI','magrebina',NULL,'casalinga','N'),(47,'PADRE','El Mas',NULL,NULL,NULL,NULL,'Via Padova, 191','20100','Milano','MI','magrebina',NULL,NULL,'N'),(48,'MADRE','Del Rosario','Ann Juli','1995-07-23','Filippine',24,'Via Nonantolana, 113','41122','Modena','MO','asiatica',NULL,'Disoccupata.','Y'),(48,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nera',NULL,'Operaio metalmeccanico.','N'),(49,'MADRE',NULL,NULL,NULL,NULL,NULL,'Cavalli, 65','26013','Crema','CR','caucasica',NULL,'Impiegata in colorificio.','N'),(49,'PADRE','Marazzi','Marco',NULL,NULL,NULL,'Cavalli, 65','26013','Crema','CR','caucasica',NULL,'Imbianchino.','N'),(50,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,'20841','Carate Brianza','LC',NULL,NULL,NULL,'N'),(51,'MADRE','Lupo','Laura','1985-03-15','Casaranno',34,'Via del Rizzo 8/B','23808','Vercurago','LC','caucasica',NULL,'Casalinga','Y'),(51,'PADRE','Compaore','Yahiya','1989-08-31','Burkina Faso',30,'via del Rizzo 8/B','23808','Vercurago','LC','mancante',NULL,'Operaio','Y'),(52,'MADRE','Peverelli','Laura','1985-03-25','Lecco',34,'Via Paolo Borsellino 3','23811','Ballabio','LC','caucasica',NULL,'Infermiera','Y'),(52,'PADRE','Verducci','Antonio','1970-12-02','Reggio Calabria',48,'via Paolo Borsellino 3','23811','Ballabio','LC','caucasica',NULL,'Macchinista FFSS','Y'),(54,'MADRE','Lincan','Mihaela Cristina','1998-07-01','Bucuresti (Romania)',21,'via del Turchino 20','20123','Milano','MI','caucasica',NULL,NULL,'N'),(54,'PADRE','Petre','Valentin Mihai','1990-07-27','Bucuresti (Romania)',29,'via del Turchino 20','20139','Milano','MI','caucasica',NULL,'Vigilante (impiegato)','Y'),(55,'MADRE','Ravasi','Vanessa','1983-08-06','Merate',36,'via Adda 13','23885','Calco- Arlate','LC','caucasica',NULL,'Operaia Metalmeccanica','Y'),(55,'PADRE','Porta','Massimo','1976-12-21','Merate',42,'Via Adda 13','23885','Calco- Arlate','LC','caucasica',NULL,'Artigiano edile','Y'),(56,'MADRE','Islam','Mobeen','1983-02-27','Gujart Pakistan',36,'Via Saibanti 13','38068','Rovereto','TN','asiatica',NULL,'Casalinga','Y'),(56,'PADRE','Ghani','Shahbaz','1976-12-14','Sialkot Pakidtan',42,'Via Saibanti 13','38068','Rovereto','TN','asiatica',NULL,'Meccanico','Y'),(60,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(60,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(61,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(61,'PADRE','nnn','mmm','2023-10-01','ferr',NULL,'Via Celoria 18',NULL,'rapallo','Milano','mancante',NULL,'ssss','N'),(63,'MADRE','Borea','Viviana','1990-01-20','Napoli',33,'Via Carducci, 35','20093','Cologno Monzese','Milano','caucasica',NULL,'Impiegata','Y'),(63,'PADRE','Postiglione','Salvatore',NULL,NULL,NULL,'Via Carducci, 35','20093','Cologno Monzese','Milano','caucasica',NULL,'Impiegato','N'),(65,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'altra',NULL,NULL,'N'),(65,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'altra',NULL,NULL,'N'),(67,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'altra',NULL,NULL,'N'),(67,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'altra',NULL,NULL,'N'),(68,'MADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(68,'PADRE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `dati_pers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dati_protocollo_mf`
--

DROP TABLE IF EXISTS `dati_protocollo_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dati_protocollo_mf` (
  `schede_id` int unsigned NOT NULL,
  `autopsia` enum('Y','N') DEFAULT NULL,
  `num_autopsia` tinytext,
  `data_autopsia` date DEFAULT NULL,
  `medico_settore` varchar(45) DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT NULL,
  `idnote` int DEFAULT NULL,
  `principali_referti_patologici` mediumtext,
  `diagnosi_anatomo_patologica` mediumtext,
  `conclusa2` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`schede_id`),
  KEY `fk_dati_protocollo_sids_schede1` (`schede_id`),
  CONSTRAINT `fk_dati_protocollo_mf_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dati_protocollo_mf`
--

LOCK TABLES `dati_protocollo_mf` WRITE;
/*!40000 ALTER TABLE `dati_protocollo_mf` DISABLE KEYS */;
INSERT INTO `dati_protocollo_mf` VALUES (3,NULL,NULL,NULL,NULL,'N',3,NULL,NULL,'N'),(4,'Y','A-000004-2015','2015-11-07','medico','Y',4,'jdsnkdsjlbfaldjkb','sdkjfbaldkjfbaslkdjfbasklfasd','Y'),(5,NULL,NULL,'2015-10-03','medico settore',NULL,5,'referti','diagnosi',NULL),(9,'Y','A-000009-2015','2005-05-20',NULL,'N',9,'fasdsd','asdsadsdsd','Y'),(12,'Y','1234-a-2015',NULL,'pullll','N',12,NULL,NULL,'N'),(30,'Y',NULL,NULL,NULL,'N',30,NULL,NULL,'N'),(54,'Y','95/882','2018-10-24','M. Schiavo Lena','Y',54,'Cuore\r\nReperto microscopico:\r\nCoronarie: lievi ispessimenti mio-intimali nella coronaria di destra.\r\nMiocardio comune: congestione e stasi; fenomeni autolitici.\r\nSistema di conduzione cardiaco:\r\nâ€¢ Nodo seno-atriale: normoconformato e centrato dall\'arteria omonima.\r\nâ€¢ Nodo atrio-ventricolare: presenta aree di dispersione fetale e aree di tessuto connettivale piÃ¹ lasso,\r\nestese anche al corpo fibroso centrale, riconducibili al fenomeno della degenerazione da riassorbimento\r\n(resorptive degeneration).\r\nâ€¢ Corpo fibroso centrale: isole di tessuto giunzionale; aree di resorptive degeneration.\r\nâ€¢ Fascio di His: settato per interposizione di tralci fibrosi; aree di dispersione fetale con resorptive\r\ndegeneration.\r\nâ€¢ Biforcazione: intramurale e settata per interposizione di tralci fibrosi.\r\nâ€¢ Branche: intramurali, ravvicinate tra di loro.\r\nAORTA: lievi ispessimenti mio-intimali.\r\n\r\nApparato respiratorio\r\nPolmoni \r\nReperto microscopico:\r\nL\'arteria polmonare di destra, a livello dell\'ilo e a livello delle sue diramazioni nei lobi polmonari di destra\r\npresenta iperplasia fibromuscolare.\r\nCongestione, stasi, anectasia polmonare, squame cornee endoalveolari (da ingestione di liquido\r\namniotico), fenomeni autolitici. Normale sviluppo polmonare secondo il criterio microscopico RAC (conta\r\nradiale alveolare = 4; valore normale di riferimento per diagnosi di ipoplasia polmonare rapportato all\'etÃ \r\ngestazionale: &lt;3.6).\r\nLARINGE: priva di alterazioni di rilievo.\r\nTRACHEA, BRONCHI: privi di alterazioni di rilievo.\r\n\r\nAPPARATO DIGERENTE\r\nESOFAGO: normoconformato. Reperto microscopico: fenomeni autolitici, peraltro nessuna alterazione di\r\nrilievo.\r\nSTOMACO: normoconformato. Reperto microscopico: fenomeni autolitici, peraltro nessuna alterazione di\r\nrilievo.\r\nINTESTINO TENUE E CRASSO: normoconformatl. Reperto microscopico: nessuna alterazione di rilievo.\r\nFEGATO (gr 49): appare in autolisi, schiacciato sul piano antero-posteriore. Superficie esterna di colorito\r\nbrunastro regolare; consistenza diminuita. Al taglio parenchima omogeneo di colorito brunastro.\r\nFormazioni vascolari e vie biliari extraepatiche: pervie.\r\nReperto microscopico: fenomeni autolitici; nessuna alterazione di rilievo.\r\nCISTIFELLEA: fenomeni autolitici; nessuna alterazione di rilievo.\r\nPANCREAS: fenomeni autolitici.\r\nSISTEMA ENDOCRINO\r\nSURRENI: forma conservata. Reperto microscopico: fenomeni autolitici; nessuna alterazione di rilievo.\r\nTIROIDE: forma conservata; volume nella norma; consistenza parenchimatosa. Reperto microscopico:\r\nnessuna alterazione di rilievo.\r\nSISTEMA IMMUNITARIO\r\nTIMO (gr 4; dimensioni: cm 4 x 2.4 x 0.5): bilobato, di colorito grigio brunastro.\r\nReperto microscopico: autolisi della componente midollare.\r\nMILZA (gr 3; dimensioni: cm 3 x 1.4 x 1): perisplenio liscio; forma conservata; consistenza parenchimatosa.\r\nReperto microscopico: lieve congestione vascolare; fenomeni autolitici.\r\nAPPARATO GENITO-URINARIO\r\nRENI: Destro: peso di rene con surrene e capsula gr 22; solo rene gr 8. Sinistro: peso di rene con surrene e\r\ncapsula gr 20; solo rene gr 8. Forma propria; superficie liscia; consistenza parenchimatosa. Al taglio:\r\nbilateralmente si presentano normoconformatl.\r\nReperto microscopico: fenomeni autolitici, peraltro nessuna alterazione di rilievo.\r\nVESCICA: normoconformata. Reperto microscopico: fenomeni autolitici, peraltro nessuna alterazione di\r\nrilievo.\r\nPROSTATA, TESTICOLI: conformi all\'etÃ .\r\nAPPARATO SCHELETRICO\r\nCOSTA: midollo osseo in normale attivitÃ  proliferativa.\r\nSISTEMA NERVOSO CENTRALE E AUTONOMO\r\nENCEFALO (gr 397), tronco cerebrale e cervelletto (gr 24): di consistenza molto friabile; strutture non ben\r\ndelimitabili.\r\nReperto microscopico:\r\nTronco cerebrale: severo ritardo di sviluppo di tutti i componenti del network respiratorio (ipoplasia del\r\ndel nucleo di KÃ²lliker-Fuse nel ponte rostrale, del complesso retrotrapezoide/parafacciale nel ponte\r\ncaudale, del nucleo pre-BÃ²tzinger nel midollo allungato e del nucleo intermedio laterale nel midollo\r\nspinale). Severa ipoplasia del locus coeruleus nel ponte rostrale e del nucleo arcuato nel midollo allungato.\r\nDesquamazione dell\'epitelio ependimale del 3Â° e 4Â° ventricolo.\r\nCervelletto: normale sviluppo della corteccia cerebellare e del nucleo dentato.\r\nCorteccia cerebrale: livello di maturazione conforme all\'etÃ  gestazionale.','Feto espulso morto alla 38a settimana di gestazione con autolisi di grado elevato.\r\nL\'esame istopatologico del sistema di conduzione cardiaco ha messo in evidenza alterazioni nella\r\nmorfogenesi del tessuto giunzionale ad alta potenzialitÃ  aritmogena.\r\nL\'esame del sistema nervoso ha evidenziato una severa ipoplasia di tutti i componenti del network\r\nrespiratorio del tronco cerebrale (nucleo di KÃ²lliker-Fuse nel ponte rostrale, complesso\r\nretrotrapezoide/parafacciale nel ponte caudale, nucleo pre-BÃ²tzinger nel midollo allungato e nucleo\r\nintermedio laterale nel midollo spinale). Severa poplasia del locus coeruleus (maggior produttore di\r\nnoradrenalina, un neurotrasmettitore essenziale per il controllo dell\'attivitÃ  cardiorespiratoria).\r\nSindrome della morte improvvisa fetale (SlUDS: Sudden Intrauterine Unexplained Death Syndrome)\r\nda severe anomalie del sistema di conduzione cardiaco e del sistema nervoso autonomo.','Y'),(63,'Y','23-A-50','2023-08-28','Dr. Lucia Bongiovanni, Dr. Daniela Finocchiar','Y',63,'Infarti recenti e di vecchia data',NULL,'N'),(65,'Y',NULL,NULL,NULL,'N',65,NULL,NULL,'N');
/*!40000 ALTER TABLE `dati_protocollo_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dati_protocollo_sids`
--

DROP TABLE IF EXISTS `dati_protocollo_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dati_protocollo_sids` (
  `schede_id` int unsigned NOT NULL,
  `autopsia` enum('Y','N') DEFAULT NULL,
  `num_autopsia` tinytext,
  `data_autopsia` date DEFAULT NULL,
  `medico_settore` varchar(45) DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT NULL,
  `idnote` int DEFAULT NULL,
  `principali_referti_patologici` mediumtext,
  `diagnosi_anatomo_patologica` mediumtext,
  `caso_di_sids` enum('SIDS','SUID','non classificato','incerto') DEFAULT NULL,
  `conclusa2` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`schede_id`),
  KEY `fk_dati_protocollo_sids_schede1` (`schede_id`),
  CONSTRAINT `fk_dati_protocollo_sids_schede1` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dati_protocollo_sids`
--

LOCK TABLES `dati_protocollo_sids` WRITE;
/*!40000 ALTER TABLE `dati_protocollo_sids` DISABLE KEYS */;
INSERT INTO `dati_protocollo_sids` VALUES (1,'Y','AUTO-191827-15','2015-10-04','sassaroli','Y',1,'sakldklddasjdhasdjhshj sadhsajdhjasd asdhaisdhiasda sdaosidja','kasdssfgakbh  asdasdasdaskjd asldalsd','SUID','Y'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'Y','A-006578-15','2015-11-04',NULL,'N',8,'fsfs','fsfs','non classificato','Y'),(10,'Y','A-000010-2015','2013-05-10','Dott. Pilotti','Y',10,'referto patologico','diagnosi del dottore','SIDS','Y'),(11,'Y','A-000011-2015',NULL,'sassarelli','N',11,NULL,NULL,NULL,'N'),(17,'Y',NULL,NULL,NULL,'N',17,NULL,NULL,NULL,'N'),(18,NULL,NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL),(20,'Y',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL),(25,'Y',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL),(29,'Y',NULL,NULL,NULL,'N',29,NULL,NULL,NULL,'N'),(46,NULL,NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL),(47,'Y','951900018','2019-03-19','Lucia Bongiovanni','N',47,'Miocardio: congestione e stasi; soffusioni emorragiche.\r\nPleurite fibrinosa purulenta;\r\nPolmonite lobulare a focolai confluenti.\r\nTrachea: lievi infiltrati linfo-monocitari; contiene materiale denso purulento.\r\nTronco cerebrale: normale citoarchitettura delle principali strutture adibite al controllo delle funzioni vitali. Il nucleo arcuato risulta ipoplasico.\r\nCervelletto: lieve ritardo di maturazione della corteccia cerebellare (corrispondente alla 35a settimana di gestazione).\r\nCorteccia cerebrale: ritardo di sviluppo della corteccia frontale con persistenza della struttura radiale e assenza di cellule piramidali.','Polmonite lobulare a focolai confluenti in neonata operata per pervietÃ  del dotto di Botallo.\r\nIpoplasia del nucleo arcuato, potenzialmente responsabile di difetto di chemorecezione.',NULL,'N'),(48,'Y','46/18','2018-05-08','Valeria Piersanti','N',48,'Coronarie: ispessimenti mio-intimali.\r\nMiocardio comune: congestione e stasi.\r\nSistema di conduzione cardiaco:\r\nâ€¢ Nodo seno-atriale: normoconformato e centrato dall\'arteria omonima.\r\nâ€¢ Nodo atrio-ventricolare: fibra di Mahaim alta; aree di dispersione fetale e tessuto connettivale piÃ¹ lasso\r\nriconducibili al fenomeno della resorptive degeneration (Figura 1); si presenta sdoppiato per interposizione\r\ndi tralci fibrosi del corpo fibroso centrale; ispesssimenti mio-intimali nell\'arteria nodale.\r\nâ€¢ Corpo fibroso centrale: isole di tessuto giunzionale e resorptive degeneration.\r\nâ€¢ Fascio di His: presenta aree di dispersione di tipo fetale.\r\nâ€¢ Biforcazione: nella norma.\r\nâ€¢ Branche: nella norma.\r\nAORTA: lievi ispessimenti mio-intimali, a livello dell\'aorta ascendente.\r\nPOLMONI: stasi polmonare. Infiltrati monocitari intrasettali (di probabile natura virale).\r\nIpoplasia di sviluppo polmonare secondo il criterio microscopico RAC (conta radiale alveolare =3.5; valore\r\nnormale di riferimento per diagnosi di ipoplasia polmonare rapportato all\'etÃ : &lt;5.5).\r\nENCEFALO:\r\nReperto microscopico:\r\nNormale citoarchitettura delle principali strutture del ponte (gruppo retrotrapezoide/nucleo parafacciale,\r\nolivare superiore, locus coeruleus, KÃ²lliker-Fuse, nuclei magnus e medio del rafe) e del midollo allungato\r\n(nuclei ipoglosso, dorsale del vago, del tratto solitario, ambiguo, arcuato, pre-BÃ²tzinger). Ipoplasia del\r\nnucleo rafe oscuro nel midollo allungato.\r\nDa segnalare una severa alterazione dell\'area postrema nella porzione caudale del quarto ventricolo\r\n(assente nella parte destra e con profonde anomalie strutturali nella parte sinistra) e la presenza di\r\nnumerose zone di desquamazione e segni reattivi dell\'ependima che ricopre il 4Â° ventricolo.','Le alterazioni riscontrate nel sistema di conduzione cardiaco analizzato su sezioni seriate potrebbero\r\nrappresentare substrati anatomici per tachicardie parossistiche, la cui insorgenza sarebbe da ascriversi a\r\nmeccanismi di rientro basati sull\'esistenza di circuiti anatomo-funzionali e dualismo di conduzione.\r\nAll\'esame del tronco cerebrale si Ã¨ rilevata, oltre alla presenza nel midollo allungato di una ipoplasia del\r\nnucleo oscuro del rafe (contenente neuroni serotoninergici chemosensitivi adibiti al mantenimento\r\ndell\'omeostasi neuronale e al controllo di funzioni sia vegetative che sensitivo-motorie), una profonda\r\nalterazione dell\'area postrema alla base del quarto ventricolo. Tale struttura, ricca di capillari privi di\r\nbarriera ematoencefalica (vascolarizzazione tipica degli organi circumventricolari), volge un\'azione\r\nfondamentale nel controllo delle funzioni autonome del sistema nervoso e di diversi sistemi fisiologici\r\n(cardiovascolare, gastrointestinale, regolazione del metabolismo, ecc.) essendo dotata della capacitÃ  di\r\nselezionare le molecole che entrano dal sangue e dal liquido cefalo-rachidiano nel parenchima cerebrale.\r\nNel caso esaminato, l\'alterazione strutturale dell\'area postrema, unitamente alla frequente\r\ndesquamazione e ai segni reattivi dell\'ependima osservati nella parete di rivestimento del 4Â° ventricolo,\r\nporterebbero a interpretare queste lesioni non come alterazioni congenite ma piuttosto come risultato\r\ndell\'azione tossica di fattori esogeni (quali farmaci, infezioni, inquinanti atmosferici, ecc.). Il fumo della\r\nmadre prima e durante la gravidanza, come da lei stessa dichiarato, potrebbe aver procurato alterazioni di\r\nsviluppo del sistema nervoso fetale, quali l\'ipoplasia dei nuclei del rafe (la nicotina Ã¨ una delle poche\r\nsostanze liposolubili che sono in grado di oltrepassare in qualsiasi punto la barriera ematoencefalica\r\nesercitando direttamente un effetto nocivo sui centri nervosi nel parenchima cerebrale, quali i nuclei del\r\nrafe).','incerto','Y'),(49,'Y','951800035','2018-05-07','Gabriela Iasi','N',49,'1. CUORE:\r\nReperto microscopico:\r\nCoronarie: ispessimenti mio-intimali nei tronchi comune delle coronaria di destra e sinistra.\r\nMiocardio comune: congestione e stasi.\r\nSistema di conduzione cardiaco:\r\nâ€¢ Nodo seno-atriale: normoconformato e centrato dall\'arteria omonima.\r\nâ€¢ Nodo atrio-ventricolare: si presenta sdoppiato per interposizione di tralci fibrosi del corpo fibroso\r\ncentrale; presenta aree di dispersione fetale. Presenza di aree di tessuto connettivale piÃ¹ lasso, estese\r\nanche al corpo fibroso centrale, riconducibili al fenomeno della degenerazione da riassorbimento\r\n(resorptive degeneration).\r\nâ€¢ Corpo fibroso centrale: isole di dispersione fetale con resorptive degeneration.\r\nâ€¢ Fascio di His: nella norma.\r\nâ€¢ Biforcazione: spostata a sinistra; abbondanti soffusioni emorragiche.\r\nâ€¢ Branche: abbondanti soffusioni emorragiche nella branca di sinistra.\r\nAORTA: ispessimenti mio-intimali.\r\n2. POLMONI: Presenza di abbondanti squame cornee endoalveolari e endobronchiali provenienti da ingestione di liquido\r\namniotico e occasionali residui di meconio; aree diffuse di enfisema compensatorio, piÃ¹ abbondanti nel\r\npolmone destro; lievi infiltrati linfo-monocitari e granulocitari (Figura 1). Normale sviluppo polmonare\r\nsecondo il criterio microscopico RAC (conta radiale alveolare =4; valore normale di riferimento per diagnosi\r\ndi ipoplasia polmonare rapportato all\'etÃ  gestazionale: &lt;3.6).mali a livello dell\'aorta ascendente.\r\nENCEFALO: Reperto microscopico:\r\nTronco cerebrale: ipoplasia del gruppo retrotrapezoide/nucleo parafacciaie nel ponte caudale (Figura 2).\r\nSevera ipoplasia del nucleo arcuato nel midollo allungato (Figura 3).\r\nNormale citoarchitettura di tutte le altre principali strutture adibite al controllo delle funzioni vitali del\r\nmidollo allungato (nuclei ipoglosso, dorsale del vago, del tratto solitario, pre-BÃ²tzinger, oscuro e pallido del\r\nrafe) e del ponte (nuclei olivare superiore, locus coeruleus, nucleo di KÃ²lliker-Fuse, nuclei medio e magno\r\ndel rafe).\r\nCervelletto: livello di maturazione della corteccia cerebellare conforme all\'etÃ . Normale struttura del\r\nnucleo dentato.\r\nCorteccia cerebrale: normale livello di maturazione. Nuclei della base non ben distinguibili.','Pneumopatia massiva da aspirazione di liquido amniotico.\r\nIpoplasia del gruppo neuronale retrotrapezoide/nucleo parafacciaie nel ponte caudale (tale complesso Ã¨\r\ncostituito da neuroni coinvolti sia nella ritmogenesi respiratoria, precisamente nel controllo\r\ndell\'espirazione, che nella chemorecezione) e severa ipoplasra del nucleo arcuato (la cui funzione Ã¨\r\nprevalentemente chemorecettoriale).\r\nLe alterazioni riscontrate nel sistema di conduzione cardiaco analizzato su sezioni seriate potrebbero\r\nrappresentare substrati anatomici per battiti ectopici e per dualismo dÃ¬ conduzione responsabili di aritmie\r\ncardiache letali.',NULL,'N'),(50,'Y','A 20-16','2016-05-23','Mario Milani, Severo Campione','N',50,'1.CUORE: Reperto microscopico: \r\nMiocardio comune: congestione e stasi; Ipertrofia miocardiaca di grado moderato.\r\nCoronarie:  ispessimenti mio-intimali nella coronaria di sinistra (Figura 1).\r\nSistema di conduzione cardiaco:\r\nâ€¢Nodo seno-atriale: normoconformato e centrato dallâ€™arteria omonima. \r\nâ€¢Nodo atrio-ventricolare: aree di dispersione fetale riconducibili e di degenerazione da riassorbimento (resorptive degeneration), estese anche al corpo fibroso centrale. fibra di Mahaim alta collegante il nodo atrio-ventricolare direttamente con il setto interventricolare.\r\nâ€¢Fascio di His: duplice per interposizione di tralci fibrosi.\r\nâ€¢Biforcazione: spostata a destra.\r\nâ€¢Branche: branca sinistra intramurale; branca destra nella norma (Figura 2).\r\nAORTA: circonferenza dellâ€™aorta ascendente: cm 2. Nessuna alterazione di rilievo.\r\nPOLMONI: Reperto microscopico: \r\nStasi polmonare acuta ed edema polmonare, aree di enfisema e atelectasia, diffusi infiltrati infiammatori linfo-monocitari. Normale sviluppo polmonare secondo il criterio microscopico RAC (conta radiale alveolare = 5.5; valore normale di riferimento per diagnosi di ipoplasia polmonare rapportato allâ€™etÃ  gestazionale: &lt;5.5).\r\n3. LARINGE: infiltrati linfocitari, localizzati soprattutto nellâ€™emilaringe sinistra. \r\n\r\n4. TIMO: nessuna alterazione di rilievo.\r\n\r\n5. TIROIDE (peso: gr 6): nessuna alterazione di rilievo.\r\n\r\nENCEFALO: Tronco cerebrale:  ipoplasia di grado lieve del complesso facciale/parafacciale nella porzione caudale del ponte e ipoplasia del nucleo pre-BÃ¶tzinger nel midollo allungato (Figure 3 e 4).  Scarso sviluppo del nucleo arcuato.\r\nDa segnalare inoltre la presenza di alterazioni del rivestimento ependimale del IV ventricolo, quali desquamazioni, invaginazioni, noduli di cellule ependimali nello strato sottoventricolare,  eterotopia neuronale (presenza di neuroni intra e sopraependimali) (Figura 5).\r\n\r\nNormale citoarchitettura di tutte le altre strutture adibite al controllo delle funzioni vitali del midollo allungato (nuclei ipoglosso, dorsale del vago, del tratto solitario, ambiguo, oscuro e pallido del rafe) e del ponte/mesencefalo (nuclei olivare superiore, retrotrapezoide, locus coeruleus, KÃ¶lliker-Fuse, magno, mediano, dorsale e lineare del rafe).  \r\n\r\nCervelletto: ritardo di maturazione della corteccia cerebellare con elevato spessore dello strato granulare esterno scarso sviluppo dello strato molecolare (corrispondente circa alla 30a settimana di gestazione). Normale struttura del nucleo dentato.\r\n\r\nCorteccia cerebrale: ritardo di sviluppo soprattutto della corteccia pre-frontale con presenza ancora a tratti dello strato granulare esterno e diffusa cellularitÃ  a disposizione prevalentemente radiale (stato di maturazione corrispondente a 25 -30 settimane di gestazione).','DISCUSSIONE DEL CASO\r\n\r\noLe anomalie del sistema di conduzione cardiaco giunzionale atrio-ventricolare riscontrate nel presente caso potrebbero rappresentare, singolarmente e nellâ€™insieme, il substrato morfologico per lo sviluppo di gravi aritmie. In particolare, lo sdoppiamento del fascio di His potrebbe rappresentare una dissociazione longitudinale del tessuto giunzionale in due distinte vie a diversa velocitÃ  di conduzione, con conseguenti tachicardie parossistiche sopraventricolari rientranti, scatenate anche dalla fibra di Mahaim. \r\n\r\nLâ€™esame neuropatologico ha evidenziato alterazioni di sviluppo di strutture del sistema nervoso importanti  per lo svolgimento delle attivitÃ  vitali. In particolare sono state riscontrate:\r\n\r\n- Ipoplasia del complesso respiratorio costituito dal nucleo facciale/parafacciale nel ponte caudale e dal  nuleo pre-BÃ¶tzinger nel midollo allungato (il normale sviluppo di tali nuclei Ã¨ indispensabile  per lâ€™avvio e il controllo dellâ€™attivitÃ  respiratoria soprattutto alla nascita e nel periodo neonatale  - il nucleo parafacciale Ã¨ costituito in gran parte da neuroni definiti â€œpre-inspoiratoriâ€ in quanto adibiti alla stimolazione del nucleo pre-BÃ¶tzinger, vero responsabile dellâ€™avvio di ogni inspirazione);\r\n\r\n-Ipoplasia del nucleo arcuato nel midollo allungato (si tratta di un vasto nucleo sulla superficie del midollo allungato con prevalente attivitÃ  chemorecettoriale, in grado cioÃ¨ di rilevare nel liquido interstiziale e nel liquido cefalorachidiano le concentrazioni di O2, CO2 e il pH e di inviare costantemente le informazioni ai vari nuclei respiratori, i quali di conseguenza modulano il ritmo ventilatorio al fine di mantenere i livelli di gas nei valori normali).\r\n\r\n-molteplici alterazioni morfologiche del rivestimento ependimale, quali desquamazioni, invaginazioni, noduli subventricolari, neuroni eterotopici (lâ€™ependima svolge prevalentemente una funzione di barriera protettiva, impedendo il passaggio di agenti nocivi dal fluido cefalorachidiano nel parenchima cerebrale. Studi sperimentali hanno dimostrato che le alterazioni strutturali dellâ€™ependima, simili a quelle qui riportate, rappresentano una prima risposta alla presenza di sostanze tossiche circolanti.\r\n\r\nDiagnosi\r\nSIDS (Sudden Infant Death Sindrome). Le alterazioni congenite del tronco cerebrale e del sistema di conduzione cardiaco segnalate,  comportanti gravi anomalie sia del ritmo respiratorio che del battito cardiaco, possono rappresentare la causa della morte improvvisa.','SIDS','Y'),(51,'Y','A 44/15','2015-11-16','MARIO mILANI','N',51,'Cuore\r\nReperto microscopico: \r\nmiocardio comune: lieve congestione e piccoli stravasi emorragici, verosimilmente determinati da manovre rianimatorie.\r\ncoronarie e aorta: nella norma.\r\nsistema di conduzione cardiaco:\r\nNodo seno-atriale: nella norma.\r\nNodo atrio-ventricolare: aree di dispersione fetale estese anche al  corpo fibroso centrale riconducibili al fenomeno di degenerazione da riassorbimento (resorptive degeneration).\r\nFascio di His: settato per interposizione di tralci fibrosi.\r\nBiforcazione e branche: nella norma.\r\nPolmoni\r\nEntrambi mostrano lievi impronte costali e fini petecchie diffuse. Alla spremitura, fuoriuscita di materiale schiumoso dal polmone destro e di scarso materiale siero-ematico dal polmone sinistro.\r\nReperto microscopico: \r\nCongestione e stasi. Presenza specie nelle porzioni periferiche di alveoli dilatati talora con lacerazione dei setti interalveolari, verosimilmente espressione di manovre rianimatorie.\r\nEncefalo\r\nReperto microscopico  \r\nTronco cerebrale:  ipoplasia del nucleo pre-BÃ¶tzinger e della porzione caudale del nucleo arcuato nel midollo allungato. Da segnalare inoltre una marcata desquamazione e fragilitÃ  soprattutto della porzione sinistra dellâ€™area postrema.\r\nNormale citoarchitettura di tutte le altre strutture adibite al controllo delle funzioni vitali del midollo allungato (nuclei ipoglosso, dorsale del vago, del tratto solitario, ambiguo, arcuato, oscuro e pallido del rafe) e del ponte (nuclei facciale/parafacciale, olivare superiore, retrotrapezoide, locus coeruleus, KÃ¶lliker-Fuse).  \r\nLa valutazione immunoistochimica dellâ€™antigene NeuN (Neuronal Nuclear antigen) eseguita a vari livelli del tronco cerebrale ha dimostrato in generale marcati segni di  sofferenza  dei neuroni.\r\nCervelletto: livello di maturazione della corteccia cerebellare corrispondente allâ€™etÃ . Normale struttura del nucleo dentato.\r\nCorteccia cerebrale: stato di maturazione nella norma.','Lâ€™esame neuropatologico ha evidenziato alterazioni di sviluppo di strutture del sistema nervoso importanti  per lo svolgimento di funzioni vitali. In particolare sono state riscontrate:\r\nâ€¢Ipoplasia del nucleo pre-BÃ¶tzinger nel midollo allungato (tale struttura, costituita essenzialmente da motoneuroni inspiratori, Ã¨ coinvolto nella genesi e nel coordinamento del ritmo respiratorio nel primo periodo postnatale). \r\nâ€¢Ipoplasia della porzione caudale del nucleo arcuato (esteso nucleo con prevalente attivitÃ  chemorecettoriale). \r\nâ€¢Desquamazione e fragilitÃ  dellâ€™area postrema, specie a sinistra (lâ€™integritÃ  di tale struttura, altamente vascolarizzata e priva di barriera ematoencefalica, Ã¨ indispensabile sia per lâ€™assorbimento dal sangue di sostanze utili e sia per impedire il passaggio nellâ€™encefalo di sostanze tossiche, contribuendo cosÃ¬ a preservare  le principali funzioni vitali).\r\n\r\n\r\nIl complesso di anomalie riscontrate a carico di strutture del midollo allungato coinvolte nel controllo delle funzioni vitali sono compatibili con la diagnosi di SIDS (Sudden Infant Death Syndrome).','SIDS','Y'),(52,'Y',NULL,'2014-09-01','Mario Milani','N',52,'Cuore\r\nReperto microscopico\r\nmiocardio comune: congestione e stasi, trombosi dei vasi; trombi in via di organizzazione nei due\r\nventricoli. Iperplasia dei miociti e disorganizzazione cellulare (disarray) a carico del ventricolo\r\nsinistro. Piccoli stravasi emorragici nel setto interventricolare, verosimilmente determinati dalle\r\nmanovre rianimatorie.\r\ncoronarie e aorta: lievi ispessimenti miointimali di alcuni rami delle arterie coronarie (tronco\r\ncomune coronaria dx e tronco comune coronaria sx).\r\nsistema di conduzione cardiaco:\r\nNodo seno-atriale: nella norma\r\nNodo atrio-ventricolare: nella norma\r\nCorpo fibroso centrale: nella norma\r\nFascio di His: nella norma\r\nBiforcazione: nella norma\r\nBranche: nella norma\r\n \r\nPolmoni\r\nReperto microscopico: Il quadro istologico dei lobi inferiori e del lobo superiore del polmone\r\ndestro Ã¨ caratterizzato da infiltrati flogistici prevalentemente interstiziali, costituiti da linfociti,\r\nistiociti e granulociti, in gran parte eosinofili. Le cavitÃ  alveolari sono occupate da abbondante\r\nedema, in parte emorragico. I capillari interalveolari risultano dilatati e marcatamente congesti.\r\nNei lobi superiori gli alveoli appaiono dilatati con rottura dei setti, verosimilmente causata dalle\r\nmanovre rianimatorie. Si segnalano inoltre linfonodi paratracheali e peribronchiali con iperplasia\r\nlinfomonocitaria\r\n\r\nEncefalo\r\nReperto microscopico\r\nTronco cerebrale: normale citoarchitettura dÃ¬ tutte le strutture adibite al controllo delle funzioni\r\nvitali del midollo allungato (nuclei ipoglosso, dorsale del vago, del tratto solitario, ambiguo, pre-\r\nBÃ²tzinger, arcuato, oscuro e pallido del rafe) e del ponte (nuclei facciale/parafacciale, olivare\r\nsuperiore, retrotrapezoide, locus coeruleus, KÃ²lliker-Fuse). Lieve ipoplasia dei nuclei pontini del\r\nrafe (nuclei magno e medio).\r\nCervelletto: livello di maturazione della corteccia cerebellare corrispondente all\'etÃ . Normale\r\nstruttura del nucleo dentato.\r\nCorteccia cerebrale: stato di maturazione nella norma.\r\nLa valutazione immunoistochimica dell\'antigene NeuN (neuronal nuclear antigen) ha dimostrato\r\nun normale stato di maturazione e funzionalitÃ  dei neuroni.','Polmonite interstiziale acuta di verosimile natura virale.',NULL,'N'),(53,'Y',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL),(55,'Y','A 14/12','2014-08-04','Giorgio Rossi','N',55,'CUORE\r\nReperto microscopico\r\nmiocardio comune: congestione e stasi, trombosi dei vasi. Iperplasia dei miociti e\r\ndisorganizzazione cellulare (disarray) a carico del ventricolo sinistro.\r\ncoronarie e aorta: nella norma.\r\nsistema di conduzione cardiaco:\r\nNodo seno-atriale: nella norma\r\nNodo atrio-ventricolare: nella norma.\r\nCorpo fibroso centrale: metaplasia cartilaginea di grado moderato.\r\nFascio di His: nella norma.\r\nBiforcazione: dispersa; alcune isole di tessuto giunzionale nel setto interventricolare, a valle della\r\nbiforcazione.\r\nBranche: nella norma la branca sx, branca dx dispersa.\r\nPOLMONI\r\nReperto microscopico: stasi acuta, con capillari dilatati e zone con alveoli infarciti di emazie. SÃ¬\r\nevidenziano inoltre aree con macrofagi endoalveolarÃ¬, qualche cellula gigante, cellule epiteliali e\r\nmateriale alimentare. Si segnalano infine infiltrati linfomonocitari perÃ¬bronchiali, endoalveolarÃ¬ e\r\nnumerose colonie batteriche.\r\nTRONCO ENCEFALICO\r\nReperto microscopico\r\nNormale citoarchÃ¬tettura delle principali strutture del ponte (nuclei facciale/parafacciale, olÃ¬vare\r\nsuperiore, retrotrapezoÃ¬de, locus coeruleus, KÃ²lliker-Fuse, nuclei magnus e medio del rafe), del\r\nmesencefalo caudale (collicoli inferiori, sostanza nera, nuclei dorsale e lineare caudale del rafe) e\r\ndel midollo allungato (nuclei ipoglosso, dorsale del vago, del tratto solitario, ambiguo, arcuato,\r\nobscurus e pallidus del raphe, complesso pre-BÃ²tzinger).\r\nDa segnalare l\'assenza, nella porzione caudale del midollo allungato, a tutti i livelli dell\'area\r\npostrema e la presenza di numerose zone di desquamazione dell\'ependima che ricopre il 4Â°\r\nventricolo (Figure le 2).\r\nLa valutazione immunoistochimica dell\'antigene NeuN (neuronal nuclear antigen) ha dimostrato\r\nun moderato stato di sofferenza neuronale a tutti i livelli del tronco cerebrale.','All\'esame del tronco cerebrale non Ã¨ stata rilevata l\'area postrema. Tale struttura svolge un\'azione\r\nfondamentale nel controllo delle funzioni autonome del sistema nervoso e di diversi sistemi\r\nfisiologici (cardiovascolare, gastrointestinale, di controllo del metabolismo) essendo densamente\r\nvascolarizzata e pertanto un importante sito di integrazione chemorecettoriale. L\'area postrema Ã¨\r\ninclusa tra gli organi &quot;circumventricolari&quot;, caratterizzati dall\'assenza di barriera ematoencefalica e\r\ndotati della capacitÃ  di rilevare eventuali tossine presenti nel sangue e nel liquido cefalorachidiano.\r\nNel caso esaminato, l\'assenza neifarea corrispondente all\'area postrema di cellule di rivestimento,\r\nunitamente alla frequente desquamazione dell\'ependima osservata nella parete di rivestimento\r\ndel 4Â° ventricolo, non porterebbe a interpretare queste lesioni come alterazioni congenite ma\r\npiuttosto come risultato dell\'azione di fattori esogeni (farmaci? inquinanti atmosferici?- la\r\ndichiarazione di entrambi i genitori di non avere mai fumato escluderebbe un possibile effetto\r\ndiretto della nicotina).\r\nSono da segnalare inoltre:\r\n- Metaplasia cartilaginea di grado moderato del corpo fibroso centrale; biforcazione dispersa\r\ne alcune isole di tessuto giunzionale nel setto interventricolare, a valle della biforcazione;\r\nbranca dx dispersa.\r\n- Ipertrofia ventricolare sinistra\r\n- Polmonite a focolai da aspirazione\r\n- Polmone da stasi acuta','incerto','Y'),(56,'Y','2/14','2014-01-19','Teresa Pusiol','N',56,'CUORE\r\nReperto microscopico\r\nmiocardio comune: congestione e stasi, trombosi dei vasi. Presenza di materiale amorfo eosinofilo (fibrina) con copioso infiltrato linfomonocitario. Presenza di elementi indicativi di infezione malarica nei piccoli vasi.\r\ncoronarie e aorta: Ispessimenti miointimali delle principali arterie coronarie (ramo marginale della coronaria destra, tronco comune della coronaria sinistra, ramo discendente anteriore e ramo circonflesso) e dellâ€™arco aortico.\r\nsistema di conduzione cardiaco:\r\nNodo seno-atriale: nella norma\r\nNodo atrio-ventricolare: nella norma.\r\nCorpo fibroso centrale: lieve metaplasia cartilaginea.\r\nFascio di His: una fibra di Mahaim media fascicolo-ventricolare.\r\nBiforcazione: una fibra di Mahaim bassa biforco-ventricolare.\r\nBranche: nella norma, dove visibili.\r\nPOLMONI\r\nReperto microscopico: stasi acuta, trombosi dei vasi, capillari dilatati e congesti con llinfocitosi; diffusa dilatazione degli alveoli con rottura dei setti interalveolari, infiltrati linfomonocitari peribronchiali e peribronchiolari diffusi, piccole aree con alveoli ripieni di liquido eosinofilo acellulato, a tratti fibrillare, e macrofagi.\r\nPresenza di elementi suggestivi di infezione da Plasmodium  falciparum  negli eritrociti dei piccoli vasi e capillari dei setti interventricolari. Le varie fasi del ciclo schizogonico malarico (trofozoiti, schizonti, merozoiti) sono riconoscibili soprattutto nei preparati colorati con Giemsa.\r\n\r\nMedesimi reperti sono evidenziabili a livello epatico, splenico, intestinale, renale e surrenale. Inoltre sono presenti abbondanti depositi di emosiderina e emozoina (confermati con metodo Perls per il ferro) soprattutto nel parenchima epatico e splenico.\r\n\r\nENCEFALO\r\nReperto microscopico  \r\nTronco cerebrale: normale citoarchitettura di tutte le strutture adibite al controllo delle funzioni vitali del midollo allungato (nuclei ipoglosso, dorsale del vago, tratto solitario, ambiguo, pre-BÃ¶tzinger, arcuato) e del ponte (nuclei facciale/parafacciale, retrotrapezoide, locus coeruleus, KÃ¶lliker-Fuse). \r\nPresenza di numerosi schizonti nei capillari.\r\nCervelletto: livello di maturazione della corteccia cerebellare nella norma. Normale struttura del nucleo dentato. Presenza di schizonti e trofozoiti nei capillari.\r\nCorteccia cerebrale: sviluppo conforme allâ€™etÃ .','Malaria acuta suggestiva di infezione da Plasmodium falciparum con localizzazione parassitaria generalizzata (cerebrale, polmonare, cardiaca, renale, splenica, epatica, intestinale, surrenalica). \r\nSi associano anomalie congenite del sistema di conduzione cardiaco potenzialmente aritmogene (una fibra di Mahaim nodo-ventricolare, una fibra di Mahaim biforco-ventricolare, isole di tessuto giunzionale nel corpo fibroso centrale, lieve metaplasia cartilaginea).','incerto','Y'),(61,'Y',NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL),(67,'Y',NULL,NULL,NULL,'N',67,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `dati_protocollo_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dati_sids`
--

DROP TABLE IF EXISTS `dati_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dati_sids` (
  `schede_id` int unsigned NOT NULL DEFAULT '0' COMMENT 'solo se tipologia schede = sids',
  `cognome` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `via` varchar(45) DEFAULT NULL,
  `cap` varchar(5) DEFAULT NULL,
  `comune` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `sesso` enum('maschio','femmina') DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `data_morte` date DEFAULT NULL,
  `eta_postconcezionale` int DEFAULT NULL,
  `eta_gestazionale` int DEFAULT NULL,
  `eta_postnatale` int DEFAULT NULL,
  `ora_rilievo_decesso` time DEFAULT NULL,
  `ora_ultimo_controllo_parentale` time DEFAULT NULL,
  `conclusa` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`schede_id`),
  KEY `fk_dati_sids_schede` (`schede_id`),
  CONSTRAINT `fk_dati_sids_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dati_sids`
--

LOCK TABLES `dati_sids` WRITE;
/*!40000 ALTER TABLE `dati_sids` DISABLE KEYS */;
INSERT INTO `dati_sids` VALUES (1,'ferrari','luca',NULL,NULL,'comom','kjnfkasj','femmina','2015-10-04','2015-10-14',5,NULL,5,'06:03:00','02:49:00','Y'),(5,'lll','akakaka',NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-11',NULL,NULL,NULL,NULL,NULL,'N'),(8,'dadasd','das',NULL,NULL,'asds','asd','femmina','2005-03-01','2005-05-14',27,6,21,'12:45:00','12:49:00','Y'),(10,'lavolta','luigi','via dei mille 34','54217','vicenza','vicenza','femmina','2006-04-15','2013-05-08',11,3,8,'14:16:00','16:27:00','Y'),(11,'sdfsdf','asdsdasdad',NULL,'12345',NULL,NULL,'maschio','2013-06-14','2015-11-02',NULL,NULL,NULL,NULL,NULL,'N'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,'dsadsadsd',NULL,NULL,NULL,NULL,NULL,'maschio','2006-07-21','2009-05-22',NULL,NULL,NULL,NULL,NULL,'N'),(18,'cognome','nome',NULL,NULL,'comune','provicnia','maschio','2015-05-05','2015-09-23',5,NULL,5,'16:11:00','11:11:00','Y'),(19,'congnoam','odfmsdok',NULL,NULL,'dsflkmsdlka','dklsfmsdlk','maschio','2015-11-08','2015-11-10',3,NULL,3,'12:07:00','10:07:00','Y'),(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,'dsasd','adasasd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(43,'Ferrari','Ferrari','Viale Col di Lana 6/a, Scala 3',NULL,'milano','MI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,'El Mas','Sagda Faith Nabawi Mohamed','Padova,191','20100','Milano','MI','femmina','2019-03-04','2019-03-18',37,35,2,'07:45:00',NULL,'N'),(48,'Del Rosario','Karishma Chloe','Nonantolana, 113','41122','Modena','MO','femmina','2018-04-10','2018-05-05',43,40,3,NULL,NULL,'N'),(49,'Marazzi','Emma','Cavalli, 65','26013','Crema','CR','femmina','2018-05-05','2018-05-05',39,39,NULL,'01:47:00',NULL,'N'),(50,'Galletta','Gregorio NicolÃ²',NULL,'20841','Carate Brianza','LC','maschio','2016-04-21','2016-05-22',NULL,NULL,NULL,'05:47:00','01:47:00','N'),(51,'Compaore','Nathan','via Rizzo 8/B','23808','Vercurago','LC','maschio','2015-09-09','2015-11-13',48,40,8,'12:42:00','03:30:00','Y'),(52,'Verducci','Debora','Via Paolo Borsellino 3','23811','Ballabio','LC','femmina','2013-10-02','2014-08-31',84,40,44,'17:48:00','15:30:00','Y'),(55,'Porta','Rebecca','Via Adda 13','23885','Calco- Arlate','LC','femmina','2013-12-13','2014-08-03',33,NULL,33,'20:20:00','15:30:00','Y'),(56,'Ghani','Maheen','Via Saibanti 13','38068','Rovereto','TN','femmina','2013-09-16','2014-01-18',17,NULL,17,'18:50:00','18:30:00','Y'),(57,'a','a',NULL,NULL,'a','a','maschio','2023-10-02','2023-10-04',11,5,6,'14:03:00','10:54:00','Y'),(58,'a','a','a',NULL,'milano','Mi','maschio','2023-10-02','2023-10-22',2,NULL,2,'14:06:00','12:17:00','Y'),(60,'Rossi','Maria',NULL,NULL,'Milano','Milano','maschio','2023-10-02','2023-10-26',5,NULL,5,'14:49:00','14:28:00','Y'),(61,'Bocca','andrea',NULL,NULL,'rapallo','ge','maschio','2023-10-10','2023-10-18',8,5,3,NULL,NULL,'N'),(62,'Perlasca','Paolo',NULL,NULL,'Milano','Mi','maschio','2023-10-17','2023-10-25',5,NULL,5,NULL,NULL,'N'),(67,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `dati_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encefalo_mf`
--

DROP TABLE IF EXISTS `encefalo_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encefalo_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `peso_gr` int DEFAULT NULL,
  `fontanella_anteriore` enum('normotesa','estroflessa','introflessa') DEFAULT NULL,
  `fontanella_posteriore` enum('normotesa','estroflessa','introflessa') DEFAULT NULL,
  `dura_madre` enum('integra','liscia','madreperlacea') DEFAULT NULL,
  `seno_venoso` enum('pervio','congesto','trombizzato') DEFAULT NULL,
  `emorragie` enum('intradurale','sub aracnoidee','iperemia dei vasi meningei') DEFAULT NULL,
  `leptomeningi` enum('ben svolgibili','opache','congeste','verde-grigiastre') DEFAULT NULL,
  `poligono_Willis` tinytext,
  `solchi` enum('normali','allargati','ridotti con circonvoluzioni appiattite') DEFAULT NULL,
  `taglio_emisferi` enum('emorragie','rammollimenti') DEFAULT NULL,
  `tronco_cerebrale` enum('emorragie','rammollimenti') DEFAULT NULL,
  `plessi_corioidei` enum('normali','edematosi') DEFAULT NULL,
  `setto_pellucido` enum('normale','assente','assottigliato') DEFAULT NULL,
  `corpo_calloso` enum('normale','assente','assottigliato') DEFAULT NULL,
  `ventricoli` enum('normali','dilatati','stenotici') DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_encefalo_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encefalo_mf`
--

LOCK TABLES `encefalo_mf` WRITE;
/*!40000 ALTER TABLE `encefalo_mf` DISABLE KEYS */;
INSERT INTO `encefalo_mf` VALUES (3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(4,321,'estroflessa','normotesa','madreperlacea','congesto','iperemia dei vasi meningei','verde-grigiastre',NULL,'ridotti con circonvoluzioni appiattite','rammollimenti','emorragie','edematosi','assottigliato','assente','stenotici','Y'),(5,1,'estroflessa','introflessa','madreperlacea','pervio','sub aracnoidee','verde-grigiastre','willis','ridotti con circonvoluzioni appiattite','rammollimenti','emorragie','normali','assente','assottigliato','stenotici',NULL),(9,321,'normotesa','normotesa','liscia','pervio','intradurale','ben svolgibili',NULL,'ridotti con circonvoluzioni appiattite','rammollimenti','rammollimenti','edematosi','normale','normale','dilatati','Y'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(54,401,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,186,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `encefalo_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encefalo_sids`
--

DROP TABLE IF EXISTS `encefalo_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encefalo_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `peso_gr` int DEFAULT NULL,
  `malformazioni` enum('Y','N') DEFAULT NULL,
  `specifica_malformazioni` tinytext,
  `taglio_emisferi` enum('emorragie','rammollimenti') DEFAULT NULL,
  `tronco_cerebrale` enum('emorragie','rammollimenti') DEFAULT NULL,
  `aspetto_esterno` enum('emorragie','ipermia','edema','poligono di willis') DEFAULT NULL,
  `specifica_poligono_Willis` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_encefalo_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `dati_protocollo_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encefalo_sids`
--

LOCK TABLES `encefalo_sids` WRITE;
/*!40000 ALTER TABLE `encefalo_sids` DISABLE KEYS */;
INSERT INTO `encefalo_sids` VALUES (1,8,'Y','dadasdasdasda','rammollimenti','emorragie','poligono di willis','ertzuiop','Y'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(10,350,'Y','malformazioni laterali','emorragie','emorragie','emorragie','adasda','Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,357,'N',NULL,NULL,NULL,NULL,NULL,'N'),(48,520,'N',NULL,NULL,NULL,NULL,NULL,'N'),(49,385,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(50,413,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(51,686,'N',NULL,NULL,NULL,NULL,NULL,'N'),(52,1030,'N',NULL,NULL,NULL,NULL,NULL,'N'),(55,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(56,681,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,NULL,'Y',NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `encefalo_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esame_esterno_mf`
--

DROP TABLE IF EXISTS `esame_esterno_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `esame_esterno_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `documentazione_foto_video` enum('Y','N') DEFAULT 'N',
  `documentazione` varchar(60) DEFAULT '',
  `peso_gr` int DEFAULT NULL,
  `lunghezza_tot_cm` int DEFAULT NULL,
  `lunghezza_vertice_podice_cm` int DEFAULT NULL,
  `circ_cranica_cm` int DEFAULT NULL,
  `circ_toracica_cm` int DEFAULT NULL,
  `circ_addom_cm` int DEFAULT NULL,
  `lunghezza_omero_cm` int DEFAULT NULL,
  `lunghezza_femore_cm` int DEFAULT NULL,
  `lunghezza_piede` int DEFAULT NULL,
  `moncone_ombelicale_cm` int DEFAULT NULL,
  `percentile_crescita` int DEFAULT NULL,
  `plica_nucale_diametro_trasverso_mm` int DEFAULT NULL,
  `descrizione_fenotipo` enum('armonico','asimmetrico','dismorfico/malformato','papiraceo') DEFAULT NULL,
  `nutrizione` enum('adeguata','inadeguata') DEFAULT NULL,
  `idrope_cutanea` enum('diffusa','segmentaria') DEFAULT NULL,
  `igroma_cistico_collo` tinytext,
  `macerazione_grado` enum('I','II','III') DEFAULT NULL,
  `colorito` enum('pallido','rosso vivo','violaceo-mattone','grigio-verdastro','sub itterico','itterico','marezzature petecchie','sede') DEFAULT NULL,
  `specifica_sede_marezzature_petecchie` tinytext,
  `vernice_caseosa_sede_quantita` tinytext,
  `caratteristiche_genitali` enum('maschili','femminili','ambigui','ipotrofici','ipertrofici','endematosi') DEFAULT NULL,
  `estremita` enum('normali','incomplete','anomalie posturali') DEFAULT NULL,
  `moncone_cordone_ombelicale` enum('normale','marcato assottigliamento','discromie','cisti del cordone','ematoma','numero vasi') DEFAULT NULL,
  `moncone_cordone_ombelicale_num_vasi` int DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_esame_esterno_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esame_esterno_mf`
--

LOCK TABLES `esame_esterno_mf` WRITE;
/*!40000 ALTER TABLE `esame_esterno_mf` DISABLE KEYS */;
INSERT INTO `esame_esterno_mf` VALUES (3,'Y',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sede',NULL,NULL,NULL,NULL,'numero vasi',NULL,'N'),(4,'Y','documentazione_autopsia_reg_4.zip',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(5,'Y',NULL,1,2,3,7,6,5,6,7,8,3,11,12,'dismorfico/malformato','inadeguata','diffusa','ogrpma','II','sede','specifico','vernice','ambigui','anomalie posturali','numero vasi',5,NULL),(9,'Y','documentazione_autopsia_reg_9.zip',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,2,NULL,'adeguata',NULL,'sadasd',NULL,'sede','specifico','asadasda',NULL,NULL,'numero vasi',NULL,'N'),(12,'N',NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,'N','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(54,'N','',2500,44,26,38,33,27,NULL,NULL,7,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'maschili',NULL,NULL,NULL,'Y'),(63,'N','',1010,45,27,26,21,21,NULL,NULL,NULL,11,NULL,NULL,'armonico',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'maschili','normali','normale',NULL,'Y'),(65,'Y','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sede',NULL,NULL,NULL,NULL,'numero vasi',NULL,'N');
/*!40000 ALTER TABLE `esame_esterno_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esame_esterno_sids`
--

DROP TABLE IF EXISTS `esame_esterno_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `esame_esterno_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `documentazione_foto_video` enum('Y','N') DEFAULT 'N',
  `documentazione` varchar(60) DEFAULT NULL,
  `peso_gr` int DEFAULT NULL,
  `lunghezza_tot_cm` int DEFAULT NULL,
  `segni_tanatologici` enum('ipostasi','rigidita') DEFAULT NULL,
  `presenza_sangue_naso` enum('Y','N') DEFAULT 'N',
  `presenza_sangue_bocca` enum('Y','N') DEFAULT 'N',
  `presenza_urine_sangue_feci_orifizi` enum('Y','N') DEFAULT 'N',
  `specifica_presenza_urine_sangue_feci_orifizi` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_esame_esterno_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `dati_protocollo_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esame_esterno_sids`
--

LOCK TABLES `esame_esterno_sids` WRITE;
/*!40000 ALTER TABLE `esame_esterno_sids` DISABLE KEYS */;
INSERT INTO `esame_esterno_sids` VALUES (1,'Y','a3bYUmrNxncAdQlmL2iK7jKmKO1e9a.py',5,7,'ipostasi','N','Y','Y','speciaisd','Y'),(6,'N',NULL,NULL,NULL,NULL,'N','N','N',NULL,NULL),(8,'Y',NULL,2580,NULL,NULL,'N','N','N',NULL,'N'),(10,'N',NULL,3690,89,'rigidita','N','N','N',NULL,'Y'),(11,'Y',NULL,255,NULL,NULL,'N','N','N',NULL,'N'),(25,'N',NULL,NULL,NULL,NULL,'N','N','N',NULL,'N'),(29,'N',NULL,NULL,NULL,NULL,'N','N','N',NULL,'N'),(47,'N',NULL,2750,47,NULL,'N','N','N',NULL,'N'),(48,'N',NULL,4220,54,NULL,'N','N','N',NULL,'N'),(49,'N',NULL,3270,48,NULL,'N','N','N',NULL,'N'),(50,'N',NULL,2950,50,NULL,'Y','N','N',NULL,'N'),(51,'N',NULL,5920,58,NULL,'N','N','N',NULL,'N'),(52,'N',NULL,8970,70,NULL,'N','N','N',NULL,'N'),(53,'N',NULL,NULL,NULL,NULL,'N','N','N',NULL,'N'),(55,'N',NULL,10000,75,NULL,'N','Y','N',NULL,'N'),(56,'Y',NULL,4050,59,'ipostasi','N','N','Y','Feci normali','N'),(61,'N',NULL,NULL,NULL,NULL,'N','N','N',NULL,'N'),(67,'N',NULL,NULL,NULL,NULL,'N','N','Y',NULL,'N');
/*!40000 ALTER TABLE `esame_esterno_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esame_interno_mf`
--

DROP TABLE IF EXISTS `esame_interno_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `esame_interno_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `sterno_gabbia_toracica` enum('normali','malformati') DEFAULT NULL,
  `specifica_sterno_gabbia_toracica_malformati` tinytext,
  `colonna_vertebrale` enum('normale','in asse','scoliosi','cifosi','lordosi') DEFAULT NULL,
  `diaframma` enum('normoconformato','agenesia/fessurazione','eventratio') DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_esame_interno_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `dati_protocollo_mf` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esame_interno_mf`
--

LOCK TABLES `esame_interno_mf` WRITE;
/*!40000 ALTER TABLE `esame_interno_mf` DISABLE KEYS */;
INSERT INTO `esame_interno_mf` VALUES (3,'malformati',NULL,NULL,NULL,'N'),(4,'malformati','dasda','scoliosi','normoconformato','Y'),(5,'malformati','adasdada','cifosi','eventratio',NULL),(9,'malformati','sdasd','normale','normoconformato','Y'),(12,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,'N'),(54,NULL,NULL,NULL,NULL,'N'),(63,NULL,NULL,NULL,NULL,'N'),(65,'malformati',NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `esame_interno_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fratelli`
--

DROP TABLE IF EXISTS `fratelli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fratelli` (
  `patologie_gest_madre_schede_id` int unsigned NOT NULL,
  `num_figli_in_vita` tinytext,
  `data_ultimo_parto_precedente` date DEFAULT NULL,
  `num_figli_morti` tinytext,
  `dataN1` date DEFAULT NULL,
  `mesiM1` int DEFAULT NULL,
  `anniM1` int DEFAULT NULL,
  `causaM1` tinytext,
  `dataN2` date DEFAULT NULL,
  `mesiM2` int DEFAULT NULL,
  `anniM2` int DEFAULT NULL,
  `causaM2` tinytext,
  `dataN3` date DEFAULT NULL,
  `mesiM3` int DEFAULT NULL,
  `anniM3` int DEFAULT NULL,
  `causaM3` tinytext,
  `dataN4` date DEFAULT NULL,
  `mesiM4` int DEFAULT NULL,
  `anniM4` int DEFAULT NULL,
  `causaM4` tinytext,
  `conclusa` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`patologie_gest_madre_schede_id`),
  KEY `fk_fratelli_patologie_gest` (`patologie_gest_madre_schede_id`),
  CONSTRAINT `fk_fratelli_patologie_gest` FOREIGN KEY (`patologie_gest_madre_schede_id`) REFERENCES `madre` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fratelli`
--

LOCK TABLES `fratelli` WRITE;
/*!40000 ALTER TABLE `fratelli` DISABLE KEYS */;
INSERT INTO `fratelli` VALUES (1,'1','2014-03-12','1','2014-03-12',3,NULL,'causa di morte',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(12,'3','2015-11-08','3','2015-11-01',2,5,'causa','2015-11-07',3,5,'dasd','2015-11-05',3,NULL,'causa',NULL,NULL,NULL,NULL,'Y'),(23,'mancante',NULL,'1','2015-11-01',6,1,'causa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'nessuno',NULL,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,'3',NULL,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(48,'1','2016-12-30','nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(50,'3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(51,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(52,'1','2011-01-28','nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(54,'nessuno',NULL,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(55,'nessuno',NULL,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(56,'2','2011-05-24','nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,'nessuno',NULL,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(65,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,'3',NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `fratelli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fumo_attivo`
--

DROP TABLE IF EXISTS `fumo_attivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fumo_attivo` (
  `madre_schede_id` int unsigned NOT NULL,
  `prima_del_concepimento` enum('Y','N') DEFAULT NULL,
  `da_anni` int unsigned DEFAULT NULL,
  `num_sigarette_per_giornoA` int unsigned DEFAULT NULL,
  `durante_gravidanza` enum('Y','N') DEFAULT NULL,
  `fino_a_settimana` int unsigned DEFAULT NULL,
  `num_sigarette_per_giornoB` int unsigned DEFAULT NULL,
  `post_parto` enum('Y','N') DEFAULT NULL,
  `fino_a_eta_bambini_in_giorni` int unsigned DEFAULT NULL,
  `num_sigarette_per_giornoC` int unsigned DEFAULT NULL,
  `sigaretta_elettronica` enum('Y','N','mancante') DEFAULT NULL,
  `spec_sigaretta_elettronica` varchar(45) DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`madre_schede_id`),
  KEY `fk_fumo_attivo_madre` (`madre_schede_id`),
  CONSTRAINT `fk_fumo_attivo_madre` FOREIGN KEY (`madre_schede_id`) REFERENCES `madre` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fumo_attivo`
--

LOCK TABLES `fumo_attivo` WRITE;
/*!40000 ALTER TABLE `fumo_attivo` DISABLE KEYS */;
INSERT INTO `fumo_attivo` VALUES (1,'Y',1,2,'Y',3,4,'Y',5,6,'Y','media','Y'),(3,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,'N'),(4,'N',NULL,NULL,'Y',5,21,'N',NULL,NULL,'Y','alta','Y'),(5,'Y',3,2,'Y',2,3,'Y',7,22,'Y','media',NULL),(8,'Y',NULL,NULL,'Y',NULL,NULL,'N',NULL,NULL,'Y',NULL,'N'),(9,'Y',NULL,5,'Y',NULL,5,'Y',NULL,NULL,NULL,NULL,'N'),(10,'Y',2,5,'Y',3,3,'Y',32,2,'mancante',NULL,'Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,'Y'),(47,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,'Y'),(48,'Y',13,8,'Y',40,5,'Y',25,NULL,'N',NULL,'N'),(49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mancante',NULL,'N'),(50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mancante',NULL,'N'),(51,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'mancante',NULL,'N'),(52,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,'Y'),(54,'Y',17,5,'Y',39,1,NULL,NULL,NULL,'N',NULL,'Y'),(55,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'mancante',NULL,'Y'),(56,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,'Y'),(60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,'Y'),(65,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,'N'),(67,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,'N'),(68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `fumo_attivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fumo_passivo`
--

DROP TABLE IF EXISTS `fumo_passivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fumo_passivo` (
  `madre_schede_id` int unsigned NOT NULL,
  `prima_del_concepimento` enum('Y','N') DEFAULT NULL,
  `da_anni` int unsigned DEFAULT NULL,
  `luogoA` set('casa','lavoro') DEFAULT NULL,
  `durante_gravidanza` enum('Y','N') DEFAULT NULL,
  `fino_a_settimana` int unsigned DEFAULT NULL,
  `luogoB` set('casa','lavoro') DEFAULT NULL,
  `post_parto` enum('Y','N') DEFAULT NULL,
  `fino_a_eta_bambino_in_giorni` int unsigned DEFAULT NULL,
  `luogoC` set('casa','lavoro') DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`madre_schede_id`),
  KEY `fk_fumo_passivo_madre` (`madre_schede_id`),
  CONSTRAINT `fk_fumo_passivo_madre` FOREIGN KEY (`madre_schede_id`) REFERENCES `madre` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fumo_passivo`
--

LOCK TABLES `fumo_passivo` WRITE;
/*!40000 ALTER TABLE `fumo_passivo` DISABLE KEYS */;
INSERT INTO `fumo_passivo` VALUES (1,'Y',2,'casa','Y',3,'lavoro','Y',5,'casa','Y'),(3,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,NULL,'N'),(4,'Y',23,'casa','N',NULL,NULL,'N',NULL,NULL,'Y'),(5,'Y',2,'lavoro','Y',1,'casa','Y',2,'lavoro',NULL),(8,'Y',24,'lavoro','Y',3,'casa','Y',14,'lavoro','Y'),(9,'Y',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(10,'Y',23,'casa','Y',3,'casa','N',NULL,NULL,'Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'Y'),(47,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(48,'Y',10,'casa','Y',40,'casa',NULL,NULL,NULL,'Y'),(49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(50,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(51,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(52,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'Y'),(54,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'Y'),(55,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'Y'),(56,'N',NULL,NULL,'N',NULL,NULL,'N',NULL,NULL,'Y'),(60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(65,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,NULL,'N'),(67,'Y',NULL,NULL,'Y',NULL,NULL,'Y',NULL,NULL,'N'),(68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `fumo_passivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_morte_fetale`
--

DROP TABLE IF EXISTS `info_morte_fetale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_morte_fetale` (
  `madre_schede_id` int unsigned NOT NULL,
  `data_ultima_mestruazione` date DEFAULT NULL,
  `data_presunta_parto_anamnestico` date DEFAULT NULL,
  `data_presunta_parto_ecografico` date DEFAULT NULL,
  `num_visite_controllo_in_gravidanza` int unsigned DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT NULL,
  `idindagini` int DEFAULT NULL,
  `biopsia_villocoriale` enum('normale','non effettuata','patologico','mancante') DEFAULT NULL COMMENT 'dato mancante se null',
  `specifica_patologico_biopsia_villocoriale` tinytext,
  `amniocentesi` enum('normale','non effettuata','patologico','mancante') DEFAULT NULL COMMENT 'dato mancante se null',
  `specifica_patologico_amniocentesi` tinytext,
  `funicolocentesi` enum('normale','non effettuata','patologico','mancante') DEFAULT NULL COMMENT 'dato mancante se null',
  `specifica_patologico_funicolocentesi` tinytext,
  `fetoscopia` enum('normale','non effettuata','patologico','mancante') DEFAULT NULL COMMENT 'dato mancante se null',
  `specifica_patologico_fetoscopia` tinytext,
  `conclusa2` enum('Y','N') DEFAULT NULL,
  `idecografia` int DEFAULT NULL,
  `ecografia` enum('normale','non effettuata','patologico','mancante') DEFAULT NULL COMMENT 'dato mancante se null',
  `malformazioni_fetali` enum('cardiache','SNC','parete addominale','tratto gastroenterico','arteria ombelicale unica','apparato muscolo scheletrico') DEFAULT NULL COMMENT 'dato mancante se null',
  `placenta` enum('distacco intempestivo','previa','vasi previ','infarto','accreta-percreta') DEFAULT NULL COMMENT 'dato mancante se null',
  `malformazioni_utero` enum('Y','N') DEFAULT NULL,
  `specifica_malformazioni_utero` tinytext,
  `conclusa3` enum('Y','N') DEFAULT NULL,
  `idricovero` int DEFAULT NULL,
  `ricovero_durante_gravidanza` enum('Y','N','mancante') DEFAULT NULL,
  `diagnosi_dimissione` text,
  `conclusa4` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`madre_schede_id`),
  KEY `fk_info_morte_fetale_madre` (`madre_schede_id`),
  CONSTRAINT `fk_info_morte_fetale_madre` FOREIGN KEY (`madre_schede_id`) REFERENCES `madre` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_morte_fetale`
--

LOCK TABLES `info_morte_fetale` WRITE;
/*!40000 ALTER TABLE `info_morte_fetale` DISABLE KEYS */;
INSERT INTO `info_morte_fetale` VALUES (3,NULL,NULL,NULL,NULL,'N',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'2008-05-03','2008-03-23','2008-03-29',8,'Y',4,'non effettuata',NULL,'normale',NULL,'patologico','patologico','non effettuata',NULL,'Y',4,'normale',NULL,'vasi previ','Y','malformazione','Y',4,'Y','dimissione','Y'),(5,'2015-10-04','2015-10-13','2015-10-04',2,NULL,5,'non effettuata',NULL,'patologico','specicic','normale',NULL,'patologico',NULL,NULL,5,'patologico','parete addominale','infarto','Y','specifico',NULL,5,'Y','dasjkdasjkdas',NULL),(9,'2005-05-01','2005-05-04','2005-05-06',32,'Y',9,'patologico','asdas','patologico',NULL,'mancante',NULL,'mancante',NULL,'N',9,'patologico',NULL,NULL,'Y',NULL,'N',9,'Y','fdfdsfdsfd','Y'),(12,NULL,NULL,NULL,NULL,'N',12,'normale',NULL,'mancante',NULL,'non effettuata',NULL,'non effettuata',NULL,'Y',12,'mancante',NULL,'vasi previ','N',NULL,'Y',12,'Y','sadasdad','Y'),(30,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,'N'),(45,'2019-10-01','2019-10-01','2019-10-01',5,'Y',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'2018-01-27',NULL,NULL,9,'N',54,'non effettuata',NULL,'non effettuata',NULL,'non effettuata',NULL,'non effettuata',NULL,'Y',54,'normale',NULL,'infarto',NULL,NULL,'N',54,'mancante',NULL,'Y'),(63,'2022-01-24',NULL,NULL,NULL,'N',63,'non effettuata',NULL,'non effettuata',NULL,'non effettuata',NULL,'non effettuata',NULL,'Y',63,'normale',NULL,NULL,NULL,NULL,'N',63,'N',NULL,'Y'),(65,NULL,NULL,NULL,NULL,'N',65,'patologico',NULL,'patologico',NULL,'patologico',NULL,'patologico',NULL,'N',65,'patologico',NULL,NULL,'Y',NULL,'N',65,'Y',NULL,'N');
/*!40000 ALTER TABLE `info_morte_fetale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_activities` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `utente` varchar(45) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `oggetto` varchar(45) NOT NULL,
  `operazione` varchar(45) NOT NULL,
  `schede_id` int DEFAULT NULL,
  `id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1865 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_activities`
--

LOCK TABLES `log_activities` WRITE;
/*!40000 ALTER TABLE `log_activities` DISABLE KEYS */;
INSERT INTO `log_activities` VALUES (1861,'Lombardia','2024-09-23 16:57:41','Autenticazione','Accesso al sistema',NULL,NULL),(1862,'Lombardia','2024-09-24 12:45:32','Autenticazione','Accesso al sistema',NULL,NULL),(1863,'Lombardia','2024-09-25 12:26:17','Autenticazione','Accesso al sistema',NULL,NULL),(1864,'Lombardia','2024-09-25 12:30:50','Logut','Logout dal sistema',NULL,NULL);
/*!40000 ALTER TABLE `log_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `madre`
--

DROP TABLE IF EXISTS `madre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `madre` (
  `schede_id` int unsigned NOT NULL,
  `idalcol` int DEFAULT NULL,
  `alcool` enum('Y','N','mancante') DEFAULT NULL,
  `alcool_quali_quantita` tinytext,
  `stupefacenti` enum('Y','N','mancante') DEFAULT NULL,
  `stupefacenti_quali_quantita` tinytext,
  `conclusa1` enum('Y','N') DEFAULT NULL,
  `idfarmaci` int DEFAULT NULL,
  `farmaci` enum('Y','N','mancante') DEFAULT NULL,
  `farmaci_quali_quantita` tinytext,
  `HIV_positivo` enum('Y','N','mancante') DEFAULT NULL,
  `conclusa2` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`schede_id`),
  KEY `fk_madre_schede_idx` (`schede_id`),
  CONSTRAINT `fk_madre_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `madre`
--

LOCK TABLES `madre` WRITE;
/*!40000 ALTER TABLE `madre` DISABLE KEYS */;
INSERT INTO `madre` VALUES (1,1,'Y','akakakakaka','Y','ashjasdhjsa','Y',1,'Y','asjkasjkasd','mancante','Y'),(3,3,NULL,NULL,NULL,NULL,'N',3,NULL,NULL,NULL,'N'),(4,4,'mancante',NULL,'Y','marijuana','Y',4,'N',NULL,'N','Y'),(5,5,'Y','skladsjkndasjnkdsajnkds','Y','dadadad',NULL,5,'Y','ASDFGHJKLÃ©Ã ','Y',NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,8,'Y','asdfas','Y','ashis','Y',8,'Y',NULL,'N','N'),(9,9,'Y',NULL,'Y',NULL,'N',9,'Y',NULL,NULL,'N'),(10,10,'Y','vino a cena','mancante',NULL,'Y',10,'Y','maalox','mancante','Y'),(11,11,NULL,NULL,NULL,NULL,'N',11,NULL,NULL,NULL,'N'),(12,12,'N',NULL,'mancante',NULL,'Y',12,'mancante',NULL,NULL,'N'),(17,17,NULL,NULL,NULL,NULL,'N',17,NULL,NULL,NULL,'N'),(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,26,NULL,NULL,NULL,NULL,'N',26,NULL,NULL,NULL,'N'),(29,29,NULL,NULL,NULL,NULL,'N',29,NULL,NULL,NULL,'N'),(30,30,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,NULL,'N'),(44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,45,'N',NULL,'N',NULL,'Y',45,'N',NULL,'N','Y'),(46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,47,'N',NULL,'N',NULL,'Y',47,'mancante',NULL,'N','Y'),(48,48,'Y','Rum, whisky 6-7 bicchierini in occasione delle festivitÃ . Una birra al mese.','N',NULL,'Y',48,'N',NULL,'mancante','Y'),(49,49,'mancante',NULL,'mancante',NULL,'Y',49,'Y','Fludrocortisone acetato (Florinef), e Cortone acetato, Levotiroxina sodica (Tirosint).','N','Y'),(50,50,'mancante',NULL,'mancante',NULL,'Y',50,'mancante',NULL,'mancante','Y'),(51,51,'mancante',NULL,'mancante',NULL,'Y',51,'mancante',NULL,'mancante','Y'),(52,52,'N',NULL,'N',NULL,'Y',52,'N',NULL,'mancante','Y'),(54,54,'N',NULL,'N',NULL,'Y',54,'N',NULL,'N','Y'),(55,55,'N',NULL,'N',NULL,'Y',55,'N',NULL,'N','Y'),(56,56,'N',NULL,'N',NULL,'Y',56,'N',NULL,'N','Y'),(60,60,NULL,NULL,NULL,NULL,'N',60,NULL,NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,63,NULL,NULL,NULL,NULL,'N',63,'Y','Progesterone','N','Y'),(65,65,'Y',NULL,'Y',NULL,'N',65,'Y',NULL,'Y','N'),(67,67,'Y',NULL,'Y',NULL,'N',67,'Y',NULL,NULL,'N'),(68,68,NULL,NULL,NULL,NULL,'N',68,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `madre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padre`
--

DROP TABLE IF EXISTS `padre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `padre` (
  `schede_id` int unsigned NOT NULL,
  `noto` enum('Y','N') DEFAULT NULL,
  `idfumo` int DEFAULT NULL,
  `fumo` enum('Y','N','mancante') DEFAULT NULL,
  `num_sigarette_per_giorno` int unsigned DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT NULL,
  `idalcol` int DEFAULT NULL,
  `alcool` enum('Y','N','mancante') DEFAULT NULL,
  `alcool_quali_quantita` tinytext,
  `stupefacenti` enum('Y','N','mancante') DEFAULT NULL,
  `stupefacenti_quali_quantita` tinytext,
  `conclusa2` enum('Y','N') DEFAULT NULL,
  `idfarmaci` int DEFAULT NULL,
  `farmaci` enum('Y','N','mancante') DEFAULT NULL,
  `farmaci_quali_quantita` tinytext,
  `HIV_positivo` enum('Y','N','mancante') DEFAULT NULL,
  `conclusa3` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`schede_id`),
  CONSTRAINT `fk_padre_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padre`
--

LOCK TABLES `padre` WRITE;
/*!40000 ALTER TABLE `padre` DISABLE KEYS */;
INSERT INTO `padre` VALUES (1,'Y',1,'Y',4,'Y',1,'Y','asdasddasd','Y','aaaaaaaaaaaaa','Y',1,'Y','asjdnsakdnjd','mancante','Y'),(3,'Y',3,NULL,NULL,'N',3,NULL,NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,NULL),(4,'Y',4,'N',NULL,'Y',4,'Y','vino a cena','mancante',NULL,'Y',4,'Y','moment','N','Y'),(5,'Y',5,'Y',3,NULL,5,'Y','sAS','Y','asdasd',NULL,5,'Y','asdfgh','N',NULL),(8,'Y',8,NULL,NULL,'N',8,'Y',NULL,NULL,NULL,'N',8,'Y',NULL,NULL,'N'),(9,'N',9,'Y',54,'Y',9,'Y',NULL,'mancante',NULL,'N',9,NULL,NULL,NULL,'N'),(10,'Y',10,'Y',10,'Y',10,'Y','Vino a pranzo e cena','mancante','dasdasdad','Y',10,'N','dasdsad','mancante','Y'),(17,'Y',17,NULL,NULL,'N',17,NULL,NULL,NULL,NULL,'N',17,NULL,NULL,NULL,'N'),(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'Y',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'Y',29,NULL,NULL,'N',29,NULL,NULL,NULL,NULL,'N',29,NULL,NULL,NULL,'N'),(30,'Y',30,NULL,NULL,'N',30,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,NULL,'N'),(47,'Y',47,'mancante',NULL,'Y',47,'N',NULL,'mancante',NULL,'Y',47,'mancante',NULL,'mancante','Y'),(48,'Y',48,'N',NULL,'Y',48,'N',NULL,'mancante',NULL,'Y',48,'N',NULL,'mancante','Y'),(49,'Y',49,'mancante',NULL,'Y',49,'mancante',NULL,'mancante',NULL,'Y',49,'mancante',NULL,'mancante','Y'),(50,'N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,'Y',51,'mancante',NULL,'Y',51,'mancante',NULL,'mancante',NULL,'Y',51,'mancante',NULL,'mancante','Y'),(52,'Y',52,'N',NULL,'Y',52,'Y','vino ai pasti , 250 ml','N',NULL,'Y',52,'N',NULL,'N','Y'),(54,'Y',54,'Y',10,'Y',54,'Y','Occasionale.','N',NULL,'Y',54,'N',NULL,'mancante','Y'),(55,'Y',55,'N',NULL,'Y',55,'Y','Occasionalmente un bicchiere di birra al sabato','N',NULL,'Y',55,'N',NULL,'N','Y'),(56,'Y',56,'N',NULL,'Y',56,'mancante',NULL,'N',NULL,'Y',56,'Y','Utilizza farmaci contro la gotta (Iperuricemia)','N','Y'),(60,'Y',60,NULL,NULL,'N',60,NULL,NULL,NULL,NULL,'N',60,NULL,NULL,NULL,'N'),(61,'Y',61,'N',NULL,'Y',61,'N',NULL,'N',NULL,'Y',61,'N',NULL,'N','Y'),(63,'Y',63,'N',NULL,'Y',63,'Y','1 bicchiere di vino a pasto','N',NULL,'Y',63,'N',NULL,'N','Y'),(65,'Y',65,'Y',NULL,'N',65,'Y',NULL,'Y',NULL,'N',65,'Y',NULL,NULL,'N'),(67,'Y',67,'Y',NULL,'N',67,'Y',NULL,'Y',NULL,'N',67,'Y',NULL,NULL,'N'),(68,'Y',68,'Y',NULL,'N',68,'Y',NULL,'Y',NULL,'N',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `padre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parti_prec`
--

DROP TABLE IF EXISTS `parti_prec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parti_prec` (
  `madre_schede_id` int unsigned NOT NULL,
  `aborti_precedenti` tinytext,
  `tipo1` enum('feto','aborto','ivg') DEFAULT NULL,
  `settimana1` int unsigned DEFAULT NULL,
  `tipo2` enum('feto','aborto','ivg') DEFAULT NULL,
  `settimana2` int unsigned DEFAULT NULL,
  `tipo3` enum('feto','aborto','ivg') DEFAULT NULL,
  `settimana3` int unsigned DEFAULT NULL,
  `tipo4` enum('feto','aborto','ivg') DEFAULT NULL,
  `settimana4` int unsigned DEFAULT NULL,
  `tipo5` enum('feto','aborto','ivg') DEFAULT NULL,
  `settimana5` int unsigned DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`madre_schede_id`),
  KEY `fk_parti_prec_madre` (`madre_schede_id`),
  CONSTRAINT `fk_parti_prec_madre` FOREIGN KEY (`madre_schede_id`) REFERENCES `madre` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parti_prec`
--

LOCK TABLES `parti_prec` WRITE;
/*!40000 ALTER TABLE `parti_prec` DISABLE KEYS */;
INSERT INTO `parti_prec` VALUES (1,'1','aborto',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(9,'5','aborto',NULL,'feto',NULL,'ivg',NULL,'ivg',NULL,NULL,NULL,'N'),(12,'2','feto',2,'aborto',32,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(23,'5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(25,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(26,'4','aborto',7,'ivg',36,'feto',5,'ivg',3,NULL,NULL,'Y'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(46,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(47,'1','feto',39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(48,'1','aborto',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(49,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(50,'mancante',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(51,'2','ivg',NULL,'ivg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(52,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(54,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(55,'nessuno',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(56,'2','aborto',NULL,'aborto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,'1','aborto',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y'),(65,'1','ivg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(67,'3','feto',NULL,'aborto',NULL,'ivg',NULL,NULL,NULL,NULL,NULL,'N'),(68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `parti_prec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patologie_gest`
--

DROP TABLE IF EXISTS `patologie_gest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patologie_gest` (
  `madre_schede_id` int unsigned NOT NULL,
  `presenza_ipertensione` enum('Y','N','mancante') DEFAULT NULL COMMENT 'sì, no -> 1, 0\\ndato mancante -> valore null',
  `periodo_ipertensione` set('gestazionale','pregestazionale') DEFAULT NULL,
  `presenza_diabete` enum('Y','N','mancante') DEFAULT NULL,
  `periodo_diabete` set('gestazionale','pregestazionale') DEFAULT NULL,
  `presenza_alterazione_emoglobina` enum('Y','N','mancante') DEFAULT NULL,
  `tipologie_alterazione_emoglobina` enum('talassemia','metemoglobinemia','altro') DEFAULT NULL,
  `specifica_tipologie_alterazione_emoglobina` tinytext,
  `presenza_alterazione_coagulazione` enum('Y','N','mancante') DEFAULT NULL,
  `presenza_malattie_autoimmuni` enum('Y','N','mancante') DEFAULT NULL,
  `presenza_infezioni_materne` enum('Y','N','mancante') DEFAULT NULL,
  `tipologie_infezioni_materne_preconcezionale` set('hiv','hbv','hcv','lue','toxo','cmv','rubeo','altro') DEFAULT NULL,
  `specifica_tipologie_infezioni_materne_preconcezionale` tinytext,
  `tipologie_infezioni_materne_peri_postconcezionale` set('hiv','hbv','hcv','lue','toxo','cmv','rubeo','altro') DEFAULT NULL,
  `specifica_tipologie_infezioni_materne_peri_postconcezionale` tinytext,
  `altre_patologie` enum('Y','N','mancante') DEFAULT NULL,
  `tipo_altre_patologie` set('disturbi tiroide','cardiopatia','patologie renali','colestasi gravidica','parodontopatie','altro') DEFAULT NULL,
  `specifica_altre_patologie` tinytext,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`madre_schede_id`),
  KEY `fk_patologie_gest_madre` (`madre_schede_id`),
  CONSTRAINT `fk_patologie_gest_madre` FOREIGN KEY (`madre_schede_id`) REFERENCES `madre` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patologie_gest`
--

LOCK TABLES `patologie_gest` WRITE;
/*!40000 ALTER TABLE `patologie_gest` DISABLE KEYS */;
INSERT INTO `patologie_gest` VALUES (1,'Y','gestazionale','Y','pregestazionale','Y','altro','soassnda','Y','mancante','Y','lue,toxo,rubeo','asjdjsad','hiv,hbv,hcv','altro','Y','colestasi gravidica','altrotor','Y'),(3,'Y',NULL,'Y',NULL,'Y','altro',NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,'Y',NULL,NULL,'N'),(4,'Y','pregestazionale','Y','gestazionale','Y','altro','alterazione','N','Y','N',NULL,NULL,NULL,NULL,'Y','disturbi tiroide,colestasi gravidica',NULL,'Y'),(5,'Y','gestazionale','Y','pregestazionale','Y','altro','apec','Y','mancante','Y',NULL,'altro','hbv,hcv,lue',NULL,'Y','disturbi tiroide,patologie renali',NULL,NULL),(8,'N',NULL,'N',NULL,'Y','altro',NULL,'Y','Y','Y',NULL,NULL,NULL,NULL,'Y',NULL,NULL,'N'),(9,'Y',NULL,'Y',NULL,'N',NULL,NULL,NULL,'mancante','Y',NULL,NULL,NULL,NULL,'Y',NULL,NULL,'N'),(10,'mancante',NULL,'mancante',NULL,'Y','metemoglobinemia','asdas','Y','Y','Y','hbv',NULL,'hcv,lue',NULL,'Y',NULL,'altre patolgie','Y'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(17,'Y','gestazionale','Y','gestazionale','Y','altro',NULL,'N','N','Y',NULL,NULL,NULL,NULL,'Y','colestasi gravidica',NULL,'N'),(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'N',NULL,'N',NULL,'N',NULL,NULL,'N','N','N',NULL,NULL,NULL,NULL,'N',NULL,NULL,'Y'),(47,'N',NULL,'N',NULL,'N',NULL,NULL,'N','N','N',NULL,NULL,NULL,NULL,'Y',NULL,'Polidramnios.','Y'),(48,'N',NULL,'N',NULL,'N',NULL,NULL,'N','N','Y',NULL,NULL,NULL,'Streptococco Agalactie.','Y',NULL,'Polidramnios.','Y'),(49,'N',NULL,'N',NULL,'N',NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,NULL,'Y','disturbi tiroide','Morbo di Adison. Tiroidite di Hashimoto.','N'),(50,'mancante',NULL,'mancante',NULL,'mancante',NULL,NULL,'mancante','mancante','mancante',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(51,'mancante',NULL,'mancante',NULL,'mancante',NULL,NULL,'mancante','mancante','mancante',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(52,'N',NULL,'N',NULL,'N',NULL,NULL,'N','N','N',NULL,NULL,NULL,NULL,'N',NULL,NULL,'Y'),(54,'N',NULL,'N',NULL,'N',NULL,NULL,'mancante','N','mancante',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(55,'N',NULL,'N',NULL,'N',NULL,NULL,'Y','N','N',NULL,NULL,NULL,NULL,'Y',NULL,'Allergie alle graminacee','Y'),(56,'N',NULL,'N',NULL,'N',NULL,NULL,'N','N','N',NULL,NULL,NULL,NULL,'Y',NULL,'DifficoltÃ  respiratorie','Y'),(60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(63,'N',NULL,'N',NULL,'N',NULL,NULL,NULL,NULL,'N',NULL,NULL,NULL,NULL,'Y',NULL,'Portatrice di variante 1286A&gt;C in omozigosi del gene MTHFR','N'),(65,'Y',NULL,'Y',NULL,'Y','altro',NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,'Y',NULL,NULL,'N'),(67,'Y',NULL,'Y',NULL,'Y','altro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL,'N'),(68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Y',NULL,NULL,NULL,NULL,'Y',NULL,NULL,'N');
/*!40000 ALTER TABLE `patologie_gest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prelievi_mf`
--

DROP TABLE IF EXISTS `prelievi_mf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prelievi_mf` (
  `dati_protocollo_mf_schede_id` int unsigned NOT NULL,
  `encefalo_corteccia_cerebrale` varchar(45) DEFAULT NULL,
  `encefalo_ippocampo` enum('Y','N') DEFAULT NULL,
  `encefalo_nuclei_della_base` enum('Y','N') DEFAULT NULL,
  `enefalo_tronco_encefalico` enum('Y','N') DEFAULT NULL,
  `idpolmone` int DEFAULT NULL,
  `polmone_dx_ilo` enum('Y','N') DEFAULT NULL,
  `polmone_dx_lobo_superiore` enum('Y','N') DEFAULT NULL,
  `polmone_dx_lobo_medio` enum('Y','N') DEFAULT NULL,
  `polmone_dx_lobo_inferiore` enum('Y','N') DEFAULT NULL,
  `polmone_sx_ilo` enum('Y','N') DEFAULT NULL,
  `polmone_sx_lobo_superiore` enum('Y','N') DEFAULT NULL,
  `polmone_sx_lobo_inferiore` enum('Y','N') DEFAULT NULL,
  `idcircolatorio` int DEFAULT NULL,
  `app_circolatorio_paragangli_aortico_polmonari` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_aorta` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_tronco_polmonare` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_pericardio` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_atrio_dx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_atrio_sx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_setto_interventricolare` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_ventricolo_dx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_ventricolo_sx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_sx_ramo_disc_ant` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_sx_ramo_circ` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_dx_ramo_disc_post` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_dx_ramo_marg` enum('Y','N') DEFAULT NULL,
  `idgastro` int DEFAULT NULL,
  `tratto_gastroenterico_esofago` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_stomaco` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_duodeno` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_piccolo_intestino` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_grosso_intestino` enum('Y','N') DEFAULT NULL,
  `idrene` int DEFAULT NULL,
  `surrene_dx` enum('Y','N') DEFAULT NULL,
  `surrene_sx` enum('Y','N') DEFAULT NULL,
  `rene_dx` enum('Y','N') DEFAULT NULL,
  `rene_sx` enum('Y','N') DEFAULT NULL,
  `idaltro` int DEFAULT NULL,
  `gangli_simpatici_stellato` enum('Y','N') DEFAULT NULL,
  `gangli_simpatici_cervicale_sup` enum('Y','N') DEFAULT NULL,
  `biforcazione_carotidea_giomo_corpo_carotideo` enum('Y','N') DEFAULT NULL,
  `biforcazione_carotidea_seno_carotideo` enum('Y','N') DEFAULT NULL,
  `timo` enum('Y','N') DEFAULT NULL,
  `tiroide` enum('Y','N') DEFAULT NULL,
  `milza` enum('Y','N') DEFAULT NULL,
  `fegato` enum('Y','N') DEFAULT NULL,
  `pancreas` enum('Y','N') DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_mf_schede_id`),
  CONSTRAINT `fk_prelievi_mf_dati_protocollo_mf` FOREIGN KEY (`dati_protocollo_mf_schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prelievi_mf`
--

LOCK TABLES `prelievi_mf` WRITE;
/*!40000 ALTER TABLE `prelievi_mf` DISABLE KEYS */;
INSERT INTO `prelievi_mf` VALUES (3,'N','N','N','N',3,'N','N','N','N','N','N','N',3,'N','N','N','N','N','N','N','N','N','N','N','N','N',3,'N','N','N','N','N',3,'N','N','N','N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'N','N','N','N',4,'N','N','N','N','N','N','N',4,'N','N','N','N','N','N','N','N','N','N','N','N','N',4,'N','N','N','N','N',4,'N','N','N','N',4,'N','N','N','N','N','N','N','N','N','Y'),(5,'Y','Y','Y','Y',5,'Y','Y','Y','Y','Y','Y','N',5,'Y','Y','Y','Y','Y','Y','Y','N','N','Y','N','N','Y',5,'Y','Y','Y','Y','Y',5,'Y','Y','Y','Y',5,'Y','N','Y','N','Y','N','Y','Y','Y',NULL),(9,'N','N','N','N',9,'N','N','N','N','N','N','N',9,'N','N','N','N','N','N','N','N','N','N','N','N','N',9,'N','N','N','N','N',9,'N','N','N','N',9,'Y','Y','N','N','N','N','N','N','N','Y'),(12,'N','N','N','N',12,'N','N','N','N','N','N','N',12,'N','N','N','N','N','N','N','N','N','N','N','N','N',12,'N','Y','N','N','N',12,'N','N','N','N',12,'N','N','N','N','N','N','N','N','N','Y'),(30,'N','N','N','N',30,'N','N','N','N','N','N','N',30,'N','N','N','N','N','N','N','N','N','N','N','N','N',30,'N','N','N','N','N',30,'N','N','N','N',30,'N','N','N','N','N','N','N','N','N','Y'),(54,'N','N','N','Y',54,'Y','Y','Y','Y','Y','Y','Y',54,'Y','Y','N','Y','Y','Y','N','Y','Y','Y','Y','Y','Y',54,'Y','Y','Y','Y','Y',54,'Y','Y','Y','Y',54,'N','N','N','N','Y','Y','Y','Y','N','Y'),(63,'N','N','N','N',63,'Y','Y','Y','Y','Y','Y','Y',63,'Y','Y','N','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y',63,'Y','N','N','N','N',63,'N','N','N','N',63,'N','N','N','N','N','Y','N','N','N','Y'),(65,'N','N','N','N',65,'N','N','N','N','N','N','N',65,'N','N','N','N','N','N','N','N','N','N','N','N','N',65,'N','N','N','N','N',65,'N','N','N','N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `prelievi_mf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prelievi_sids`
--

DROP TABLE IF EXISTS `prelievi_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prelievi_sids` (
  `dati_protocollo_sids_schede_id` int unsigned NOT NULL,
  `encefalo_corteccia_cerebrale` varchar(45) DEFAULT NULL,
  `encefalo_ippocampo` enum('Y','N') DEFAULT NULL,
  `encefalo_nuclei_della_base` enum('Y','N') DEFAULT NULL,
  `enefalo_tronco_encefalico` enum('Y','N') DEFAULT NULL,
  `idpolmone` int DEFAULT NULL,
  `polmone_dx_ilo` enum('Y','N') DEFAULT NULL,
  `polmone_dx_lobo_superiore` enum('Y','N') DEFAULT NULL,
  `polmone_dx_lobo_medio` enum('Y','N') DEFAULT NULL,
  `polmone_dx_lobo_inferiore` enum('Y','N') DEFAULT NULL,
  `polmone_sx_ilo` enum('Y','N') DEFAULT NULL,
  `polmone_sx_lobo_superiore` enum('Y','N') DEFAULT NULL,
  `polmone_sx_lobo_inferiore` enum('Y','N') DEFAULT NULL,
  `idcircolatorio` int DEFAULT NULL,
  `app_circolatorio_paragangli_aortico_polmonari` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_aorta` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_tronco_polmonare` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_pericardio` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_atrio_dx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_atrio_sx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_setto_interventricolare` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_ventricolo_dx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_parete_ventricolo_sx` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_sx_ramo_disc_ant` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_sx_ramo_circ` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_dx_ramo_disc_post` enum('Y','N') DEFAULT NULL,
  `app_circolatorio_coronaria_dx_ramo_marg` enum('Y','N') DEFAULT NULL,
  `idgastro` int DEFAULT NULL,
  `tratto_gastroenterico_esofago` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_stomaco` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_duodeno` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_piccolo_intestino` enum('Y','N') DEFAULT NULL,
  `tratto_gastroenterico_grosso_intestino` enum('Y','N') DEFAULT NULL,
  `idrene` int DEFAULT NULL,
  `surrene_dx` enum('Y','N') DEFAULT NULL,
  `surrene_sx` enum('Y','N') DEFAULT NULL,
  `rene_dx` enum('Y','N') DEFAULT NULL,
  `rene_sx` enum('Y','N') DEFAULT NULL,
  `idaltro` int DEFAULT NULL,
  `gangli_simpatici_stellato` enum('Y','N') DEFAULT NULL,
  `gangli_simpatici_cervicale_sup` enum('Y','N') DEFAULT NULL,
  `biforcazione_carotidea_giomo_corpo_carotideo` enum('Y','N') DEFAULT NULL,
  `biforcazione_carotidea_seno_carotideo` enum('Y','N') DEFAULT NULL,
  `timo` enum('Y','N') DEFAULT NULL,
  `tiroide` enum('Y','N') DEFAULT NULL,
  `milza` enum('Y','N') DEFAULT NULL,
  `fegato` enum('Y','N') DEFAULT NULL,
  `pancreas` enum('Y','N') DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_protocollo_sids_schede_id`),
  CONSTRAINT `fk_prelievi_sids_dati_protocollo_sids` FOREIGN KEY (`dati_protocollo_sids_schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prelievi_sids`
--

LOCK TABLES `prelievi_sids` WRITE;
/*!40000 ALTER TABLE `prelievi_sids` DISABLE KEYS */;
INSERT INTO `prelievi_sids` VALUES (1,'N','Y','Y','Y',1,'N','N','N','N','Y','Y','Y',1,'N','Y','N','Y','N','Y','N','Y','N','Y','N','Y','N',1,'N','Y','N','Y','N',1,'N','Y','Y','Y',1,'N','N','Y','Y','N','N','Y','Y','Y','Y'),(8,'N','N','N','N',8,'N','N','N','N','N','N','N',8,'N','N','N','N','N','N','N','N','N','N','N','N','N',8,'N','N','N','N','N',8,'N','N','N','N',8,'N','N','N','N','N','N','N','N','N','Y'),(10,'N','N','N','N',10,'Y','Y','Y','N','Y','Y','N',10,'Y','N','Y','N','Y','Y','N','Y','N','Y','Y','N','N',10,'N','Y','N','Y','N',10,'Y','N','N','Y',10,'Y','N','N','Y','N','Y','Y','N','Y','Y'),(11,'N','N','N','N',11,'N','N','N','N','N','N','N',11,'N','N','N','N','N','N','N','N','N','N','N','N','N',11,'N','N','N','N','N',11,'N','N','N','N',11,'N','N','N','N','N','N','N','N','N','Y'),(17,'N','N','N','N',17,'N','N','N','N','N','N','N',17,'N','N','N','N','N','N','N','N','N','N','N','N','N',17,'N','N','N','N','N',17,'N','N','N','N',17,'N','N','N','N','N','N','N','N','N','Y'),(18,'N','N','N','N',18,'N','N','N','N','N','N','N',18,'N','N','N','N','N','N','N','N','N','N','N','N','N',18,'N','N','N','N','N',18,'N','N','N','N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'N','N','N','N',29,'N','N','N','N','N','N','N',29,'N','N','N','N','N','N','N','N','N','N','N','N','N',29,'N','N','N','N','N',29,'N','N','N','N',29,'N','N','N','N','N','N','N','N','N','Y'),(46,'N','N','N','N',46,'N','N','N','N','N','N','N',46,'N','N','N','N','N','N','N','N','N','N','N','N','N',46,'N','N','N','N','N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'N','N','N','Y',47,'Y','Y','Y','Y','Y','Y','Y',47,'Y','Y','N','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y',47,'Y','N','N','N','N',47,'N','N','N','N',47,'N','N','N','N','N','N','N','N','N','Y'),(48,'N','N','N','Y',48,'Y','Y','Y','Y','Y','Y','Y',48,'Y','Y','N','N','Y','Y','N','Y','Y','Y','Y','Y','Y',48,'N','N','N','N','N',48,'N','N','N','N',48,'N','N','N','N','N','N','N','N','N','Y'),(49,'Y','N','Y','Y',49,'Y','Y','Y','Y','Y','Y','Y',49,'Y','Y','N','Y','Y','Y','N','Y','Y','Y','Y','Y','Y',49,'N','N','N','N','N',49,'N','N','N','N',49,'N','N','N','N','Y','N','N','N','N','Y'),(50,'N','N','N','Y',50,'Y','Y','Y','Y','Y','Y','Y',50,'Y','Y','N','Y','Y','Y','N','Y','Y','Y','Y','Y','Y',50,'N','N','N','N','N',50,'N','N','N','N',50,'N','N','N','N','Y','N','N','N','N','Y'),(51,'N','N','N','Y',51,'Y','Y','Y','Y','Y','Y','Y',51,'Y','Y','N','Y','Y','Y','N','Y','Y','Y','Y','Y','Y',51,'N','N','N','N','N',51,'N','N','N','N',51,'N','N','N','N','N','N','N','N','N','Y'),(52,'N','N','N','Y',52,'Y','Y','Y','Y','Y','Y','Y',52,'Y','N','N','N','Y','Y','N','Y','Y','Y','Y','Y','Y',52,'N','N','N','N','N',52,'N','N','N','N',52,'N','N','N','N','N','Y','N','N','N','Y'),(55,'N','N','N','Y',55,'Y','Y','Y','Y','Y','Y','Y',55,'Y','N','N','N','Y','Y','N','Y','Y','Y','Y','Y','Y',55,'N','N','N','N','N',55,'N','N','N','N',55,'N','N','N','N','N','N','N','N','N','Y'),(56,'N','N','N','Y',56,'Y','Y','Y','Y','Y','Y','Y',56,'Y','N','N','Y','Y','Y','N','Y','Y','Y','Y','Y','Y',56,'N','N','N','N','Y',56,'Y','Y','Y','Y',56,'N','N','N','N','Y','N','Y','Y','Y','Y'),(67,'N','N','N','N',67,'N','N','N','N','N','N','N',67,'N','N','N','N','N','N','N','N','N','N','N','N','N',67,'N','N','N','N','N',67,'N','N','N','N',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `prelievi_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referto_macroscopico_annessi_fetali`
--

DROP TABLE IF EXISTS `referto_macroscopico_annessi_fetali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `referto_macroscopico_annessi_fetali` (
  `schede_id` int unsigned NOT NULL DEFAULT '0',
  `placenta` enum('singola','gemellare fusa','gemellare separata') DEFAULT NULL,
  `placenta_pervenuta` enum('fresca','fissata','refrigerata','congelata','intera','frammentata','parziale','cotiledoni lacerati','lembi di decidua basale adesi') DEFAULT NULL,
  `placenta_membrane_punto_rottura` enum('precisabile','imprecisabile') DEFAULT NULL,
  `placenta_distanza_margine_disco_coriale_cm` int DEFAULT NULL,
  `placenta_inserzione` enum('normale','marginale','extracoriale') DEFAULT NULL,
  `placenta_caratteristiche` enum('ispessite','sottili','opache','lucenti','colorazione di meconio','edema','emorragie retromembranosa') DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT NULL,
  `idcordone` int DEFAULT NULL,
  `cordone_ombelicale_lunghezza_cm` int DEFAULT NULL,
  `cordone_ombelicale_diametro_max_cm` int DEFAULT NULL,
  `cordone_ombelicale_diametro_min_cm` int DEFAULT NULL,
  `cordone_ombelicale_inserzione` enum('centrale','marginale','eccentrica','velamentosa') DEFAULT NULL,
  `cordone_ombelicale_dist_margine_materno_fetale_cm` int DEFAULT NULL,
  `cordone_ombelicale_altro` set('nodi veri','nodi falsi','torsione','restringimenti','iperspiralizzazione','aneurismi','ematomi','trombosi') DEFAULT NULL,
  `conclusa2` enum('Y','N') DEFAULT NULL,
  `iddisco` int DEFAULT NULL,
  `disco_coriale_peso_gr` int DEFAULT NULL,
  `disco_coriale_diametro1_cm` int DEFAULT NULL,
  `disco_coriale_diametro2_cm` int DEFAULT NULL,
  `disco_coriale_spessore_max_cm` int DEFAULT NULL,
  `disco_coriale_spessore_min_cm` int DEFAULT NULL,
  `disco_coriale_forma` enum('rotonda','ovale','a cuore','a rene','a racchetta','bilobata','trilobata','doppia','tripla','multipla','membranosa','fenestrata','anulare','lobi accessori','lobi aberranti') DEFAULT NULL,
  `versante_fetale` set('lucente','opaco','metaplasia squamosa','amnios nodosum','fibrina subcorionica','ematomi subcorionici','ematomi subamniotici') DEFAULT NULL,
  `versante_materno` set('cotiledoni prominenti','cavitazioni centrali','aree depresse','lacerazioni','fibrina perivillosa','sclerosi marginale','calcificazioni') DEFAULT NULL,
  `ematomi_retroplacentari` enum('Y','N') DEFAULT NULL,
  `ematomi_retroplacentari_diametro_max_cm` int DEFAULT NULL,
  `ematomi_marginali` enum('Y','N') DEFAULT NULL,
  `ematomi_marginali_diametro_max_cm` int DEFAULT NULL,
  `ematomi_intervillosi` enum('Y','N') DEFAULT NULL,
  `ematomi_intervillosi_diametro_max_cm` int DEFAULT NULL,
  `infarti_recenti` enum('Y','N') DEFAULT NULL,
  `infarti_recenti_diametro_max_cm` int DEFAULT NULL,
  `infarti_vecchia_data` enum('Y','N') DEFAULT NULL,
  `infarti_vecchia_diametro_max_cm` int DEFAULT NULL,
  `vasi_coriali_distribuzione` enum('magistrale','dispersa','anastomosi vascolari','angiodistopie') DEFAULT NULL,
  `conclusa3` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`schede_id`),
  CONSTRAINT `fk_referto_macroscopico_annessi_fetali_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referto_macroscopico_annessi_fetali`
--

LOCK TABLES `referto_macroscopico_annessi_fetali` WRITE;
/*!40000 ALTER TABLE `referto_macroscopico_annessi_fetali` DISABLE KEYS */;
INSERT INTO `referto_macroscopico_annessi_fetali` VALUES (3,NULL,NULL,NULL,NULL,NULL,NULL,'N',3,NULL,NULL,NULL,NULL,NULL,NULL,'N',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,NULL,'N'),(4,'gemellare separata','lembi di decidua basale adesi','imprecisabile',258,'extracoriale','emorragie retromembranosa','Y',4,98,25,12,'velamentosa',5,'nodi veri,restringimenti,iperspiralizzazione,trombosi','Y',4,25,8,4,5,8,'bilobata','metaplasia squamosa','lacerazioni','N',NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,'magistrale','Y'),(5,'gemellare fusa','cotiledoni lacerati','imprecisabile',4,'marginale','emorragie retromembranosa',NULL,5,1,5,3,'velamentosa',4,'nodi veri,restringimenti,iperspiralizzazione,aneurismi,trombosi',NULL,5,1,2,3,4,5,'a racchetta','amnios nodosum','cavitazioni centrali','N',1,'Y',2,'N',3,'Y',4,'N',5,'dispersa',NULL),(9,'singola',NULL,NULL,NULL,NULL,NULL,'N',9,NULL,NULL,NULL,NULL,NULL,NULL,'N',9,888,580,25,65,1,'ovale','opaco','cavitazioni centrali','Y',25,'N',NULL,'Y',NULL,'Y',NULL,'N',NULL,'magistrale','N'),(12,'gemellare fusa','fissata','precisabile',258,'normale','sottili','Y',12,NULL,NULL,NULL,NULL,NULL,NULL,'N',12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,NULL,'N'),(30,NULL,NULL,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,NULL,NULL,NULL,NULL,'N',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,NULL,'N'),(54,'singola',NULL,NULL,NULL,NULL,'ispessite','N',54,34,NULL,NULL,NULL,NULL,NULL,'N',54,310,16,13,3,NULL,NULL,NULL,NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,NULL,'N'),(63,'singola','fissata','imprecisabile',NULL,'normale','colorazione di meconio','N',63,17,1,1,'eccentrica',3,NULL,'N',63,200,11,11,3,1,'rotonda','lucente','cotiledoni prominenti','N',NULL,'N',NULL,'N',NULL,'Y',NULL,'Y',NULL,'magistrale','N'),(65,NULL,NULL,NULL,NULL,NULL,NULL,'N',65,NULL,NULL,NULL,NULL,NULL,NULL,'N',65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,'N',NULL,NULL,'N');
/*!40000 ALTER TABLE `referto_macroscopico_annessi_fetali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ritrovamento`
--

DROP TABLE IF EXISTS `ritrovamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ritrovamento` (
  `schede_id` int unsigned NOT NULL,
  `luogo_morte` enum('ospedale','casa','fuori casa') DEFAULT NULL,
  `posizione_se_sdraiato` enum('supina','prona','sul fianco','altra') DEFAULT NULL,
  `specifica_posizione_se_sdraiato` tinytext,
  `abbigliamento_indossato` tinytext,
  `cuscino` enum('Y','N') DEFAULT NULL,
  `succhiotto` enum('Y','N') DEFAULT NULL,
  `catenine_al_collo` enum('Y','N') DEFAULT NULL,
  `oggetti_nel_lettino` enum('Y','N') DEFAULT NULL,
  `consistenza_materasso` tinytext,
  `tentativo_di_rianimazione` enum('Y','N') DEFAULT NULL,
  `specifica_tentativo_di_rianimazione` enum('genitore','medico 118','altro 118','testimone medico','testimone non medico','mancante') DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT 'N',
  `idsituazione` int DEFAULT NULL,
  `mat_organico_bocca` enum('Y','N') DEFAULT NULL,
  `specifica_mat_organico_bocca` tinytext,
  `mat_organico_naso` enum('Y','N') DEFAULT NULL,
  `specifica_mat_organico_naso` tinytext,
  `mat_organico_pannolino` enum('Y','N') DEFAULT NULL,
  `specifica_mat_organico_pannolino` tinytext,
  `aspetto_bambino` set('decolorazione attorno al volto o bocca','sudato','secrezioni','flaccido','decolorazione cutanea','caldo','freddo','segni da pressione','rash o petecchie','rigido','impronte sul corpo','non valutato','altro') DEFAULT NULL,
  `specifica_aspetto_bambino` tinytext,
  `specifica_note_aspetto` tinytext,
  `conclusa2` enum('Y','N') DEFAULT 'N',
  `idpasti` int DEFAULT NULL,
  `data_ultimo_pasto` date DEFAULT NULL,
  `ora_ultimo_pasto` time DEFAULT NULL,
  `ultimo_pasto_somministrato_da` varchar(45) DEFAULT NULL,
  `alimenti_24_ore` set('materno','polvere','mucca','acqua','liquidi','omogeneizzati','altro') DEFAULT NULL,
  `latte` int DEFAULT NULL,
  `polvere` int DEFAULT NULL,
  `mucca` int DEFAULT NULL,
  `acqua` int DEFAULT NULL,
  `liquidi` tinytext,
  `omogeneizzati` int DEFAULT NULL,
  `specifica_altro_alimenti` tinytext,
  `nuovi_alimenti_ultime_24_ore` enum('Y','N') DEFAULT NULL,
  `specifica_nuovi_alimenti_ultime_24_ore` tinytext,
  `morte_rilevata_da` enum('medico di famiglia','medico 118','pediatra','altro') DEFAULT NULL,
  `specifica_morte_rilevata_da` tinytext,
  `conclusa3` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`schede_id`),
  CONSTRAINT `fk_ritrovamento_schede` FOREIGN KEY (`schede_id`) REFERENCES `schede` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ritrovamento`
--

LOCK TABLES `ritrovamento` WRITE;
/*!40000 ALTER TABLE `ritrovamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `ritrovamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ritrovamento_casa`
--

DROP TABLE IF EXISTS `ritrovamento_casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ritrovamento_casa` (
  `ritrovamento_schede_id` int unsigned NOT NULL,
  `luogo_morte_specifico` enum('in culla/lettino in camera coi genitori','in culla/lettino in camera separata','in altro luogo','a letto coi genitori','a letto con altre persone','nel seggiolone','in braccio','nel passeggino','nell infan-seat') DEFAULT NULL,
  `specifica_altro_abitazione` tinytext,
  `temperatura_stanza_ritrovamento` decimal(4,2) DEFAULT NULL,
  `temperatura_bambino` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`ritrovamento_schede_id`),
  KEY `fk_ritrovamento_casa_ritrovamento` (`ritrovamento_schede_id`),
  CONSTRAINT `fk_ritrovamento_casa_ritrovamento` FOREIGN KEY (`ritrovamento_schede_id`) REFERENCES `ritrovamento` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ritrovamento_casa`
--

LOCK TABLES `ritrovamento_casa` WRITE;
/*!40000 ALTER TABLE `ritrovamento_casa` DISABLE KEYS */;
INSERT INTO `ritrovamento_casa` VALUES (1,'in altro luogo','rtzuioiuzfdruklaltro',4.00,3.00),(8,NULL,NULL,NULL,NULL),(10,NULL,NULL,3.40,2.14),(11,'in altro luogo','askjdasd',16.50,36.80),(12,NULL,NULL,NULL,NULL),(17,NULL,NULL,NULL,NULL),(20,NULL,NULL,NULL,NULL),(25,NULL,NULL,NULL,NULL),(29,NULL,NULL,NULL,NULL),(41,NULL,NULL,NULL,NULL),(44,NULL,NULL,NULL,NULL),(46,NULL,NULL,NULL,NULL),(47,NULL,NULL,NULL,NULL),(48,NULL,NULL,NULL,NULL),(49,NULL,NULL,NULL,NULL),(50,NULL,NULL,NULL,NULL),(51,NULL,NULL,NULL,NULL),(52,NULL,NULL,NULL,NULL),(55,NULL,NULL,NULL,NULL),(56,NULL,NULL,NULL,NULL),(57,NULL,NULL,NULL,NULL),(60,NULL,NULL,NULL,NULL),(61,NULL,NULL,NULL,NULL),(67,NULL,NULL,NULL,NULL),(68,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ritrovamento_casa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ritrovamento_fuori_casa`
--

DROP TABLE IF EXISTS `ritrovamento_fuori_casa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ritrovamento_fuori_casa` (
  `ritrovamento_schede_id` int unsigned NOT NULL,
  `luogo_morte_specifico` enum('nel passeggino','nel seggiolino in automobile','in braccio','abitazione altrui','altro') DEFAULT NULL,
  `specifica_altro_luogo` tinytext,
  PRIMARY KEY (`ritrovamento_schede_id`),
  KEY `fk_ritrovamento_fuori_casa_ritrovamento` (`ritrovamento_schede_id`),
  CONSTRAINT `fk_ritrovamento_fuori_casa_ritrovamento` FOREIGN KEY (`ritrovamento_schede_id`) REFERENCES `ritrovamento` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ritrovamento_fuori_casa`
--

LOCK TABLES `ritrovamento_fuori_casa` WRITE;
/*!40000 ALTER TABLE `ritrovamento_fuori_casa` DISABLE KEYS */;
INSERT INTO `ritrovamento_fuori_casa` VALUES (1,'altro','aspcpaspapsaassa'),(8,NULL,NULL),(10,NULL,NULL),(11,'altro','asdlkasda'),(12,NULL,NULL),(17,NULL,NULL),(20,NULL,NULL),(25,NULL,NULL),(29,NULL,NULL),(41,NULL,NULL),(44,NULL,NULL),(46,NULL,NULL),(47,NULL,NULL),(48,NULL,NULL),(49,NULL,NULL),(50,NULL,NULL),(51,NULL,NULL),(52,'abitazione altrui',NULL),(55,NULL,NULL),(56,NULL,NULL),(57,NULL,NULL),(60,'nel passeggino',NULL),(61,NULL,NULL),(67,NULL,NULL),(68,NULL,NULL);
/*!40000 ALTER TABLE `ritrovamento_fuori_casa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ritrovamento_ospedale`
--

DROP TABLE IF EXISTS `ritrovamento_ospedale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ritrovamento_ospedale` (
  `ritrovamento_schede_id` int unsigned NOT NULL DEFAULT '0',
  `nome_ospedale` tinytext,
  PRIMARY KEY (`ritrovamento_schede_id`),
  CONSTRAINT `fk_ritrovamento_ospedale_ritrovamento` FOREIGN KEY (`ritrovamento_schede_id`) REFERENCES `ritrovamento` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ritrovamento_ospedale`
--

LOCK TABLES `ritrovamento_ospedale` WRITE;
/*!40000 ALTER TABLE `ritrovamento_ospedale` DISABLE KEYS */;
INSERT INTO `ritrovamento_ospedale` VALUES (1,'olospsp'),(8,'nome'),(10,'nome'),(11,'ascdcd'),(12,NULL),(17,NULL),(20,NULL),(25,NULL),(29,NULL),(41,NULL),(44,NULL),(46,NULL),(47,'Ospedale San Raffaele'),(48,NULL),(49,'Ospedale San Raffaele'),(50,NULL),(51,'Ospedale Alessandro Manzoni Lecco'),(52,NULL),(55,'Pronto soccorso di Merate'),(56,'Ospedale di Rovereto - Presidio Santa Maria del Carmine'),(57,NULL),(60,NULL),(61,NULL),(67,NULL),(68,NULL);
/*!40000 ALTER TABLE `ritrovamento_ospedale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheda_feto`
--

DROP TABLE IF EXISTS `scheda_feto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scheda_feto` (
  `dati_feto_schede_id` int unsigned NOT NULL DEFAULT '0',
  `liquido_amniotico` enum('normale','patologico','mancante') DEFAULT NULL,
  `specifica_patologico_liquido_amniotico` tinytext,
  `RX_scheletro` enum('Y','N','mancante') DEFAULT NULL COMMENT 'dato mancante se null',
  `specifica_RX_scheletro` tinytext,
  `prelievi_secondo_prot_naz` enum('Y','N','mancante') DEFAULT NULL,
  `effettuato_riscontro_diagnostico` enum('Y','N','mancante') DEFAULT NULL,
  `riscontro_diagnostico_dove` varchar(45) DEFAULT NULL,
  `data_riscontro_diagnostico` date DEFAULT NULL,
  `medico_effettuato_riscontro` varchar(45) DEFAULT NULL,
  `conclusa` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`dati_feto_schede_id`),
  CONSTRAINT `fk_scheda_feto_dati_feto` FOREIGN KEY (`dati_feto_schede_id`) REFERENCES `dati_feto` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheda_feto`
--

LOCK TABLES `scheda_feto` WRITE;
/*!40000 ALTER TABLE `scheda_feto` DISABLE KEYS */;
INSERT INTO `scheda_feto` VALUES (3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(4,'patologico','specifico','Y','rx scheletro','N','Y','milano','2015-11-01','medico','Y'),(5,'mancante','patolo','Y','specifico ssmdsaldsd','N','Y','aaaa','2015-10-11','medi',NULL),(9,'mancante','asdasdasda','Y','sdasdsds','mancante','Y','asdasds','2015-03-04','medico','Y'),(12,'normale',NULL,'mancante',NULL,'Y','mancante',NULL,NULL,NULL,'Y'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),(45,'normale',NULL,'mancante',NULL,'Y','mancante',NULL,NULL,NULL,'Y'),(54,'patologico','Ematico','N',NULL,'Y','Y','Ospedale San Raffaele Milano','2018-10-24','M. Schiavo Lena','Y'),(63,'mancante',NULL,'mancante',NULL,NULL,'Y',NULL,'2023-08-28','Dr.ssa Lucia Bongiovanni','N'),(65,'patologico',NULL,'Y',NULL,NULL,'Y',NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `scheda_feto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheda_sids`
--

DROP TABLE IF EXISTS `scheda_sids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scheda_sids` (
  `dati_sids_schede_id` int unsigned NOT NULL,
  `posizione_sonno` enum('supino','prono','fianco','mancante','mai stessa posizione') DEFAULT NULL,
  `succhiotto_sonno` enum('Y','N','mancante') DEFAULT NULL,
  `conclusa1` enum('Y','N') DEFAULT 'N',
  `idmedici` int DEFAULT NULL,
  `data_ultimo_controllo_pediatrico` date DEFAULT NULL,
  `patologie_in_atto` enum('Y','N') DEFAULT NULL,
  `tipologie_patologie_in_atto` set('raffreddore','tosse','febbre','diarrea','vomito/rigurgito','esantema/eczema','altro') DEFAULT NULL,
  `specifica_tipologie_patologie_in_atto` tinytext,
  `disturbi_respiratori` enum('Y','N') DEFAULT NULL,
  `tipologie_disturbi_respiratori` set('apnee notturne','altro') DEFAULT NULL,
  `specifica_tipologie_disturbi_respiratori` tinytext,
  `vaccinazioni_ultimo_mese` enum('Y','N','mancante') DEFAULT NULL,
  `tipologie_vaccinazioni_ultimo_mese` tinytext,
  `effettuato_riscontro_diagnostico` enum('Y','N','mancante') DEFAULT NULL,
  `riscontro_diagnostico_dove` varchar(45) DEFAULT NULL,
  `prelievi_secondo_prot_naz` enum('Y','N','mancante') DEFAULT NULL,
  `data_riscontro_diagnostico` date DEFAULT NULL,
  `medico_effettuato_riscontro` varchar(45) DEFAULT NULL,
  `conclusa2` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`dati_sids_schede_id`),
  KEY `fk_scheda_sids_schede_idx` (`dati_sids_schede_id`),
  CONSTRAINT `fk_scheda_sids_schede` FOREIGN KEY (`dati_sids_schede_id`) REFERENCES `dati_sids` (`schede_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheda_sids`
--

LOCK TABLES `scheda_sids` WRITE;
/*!40000 ALTER TABLE `scheda_sids` DISABLE KEYS */;
/*!40000 ALTER TABLE `scheda_sids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schede`
--

DROP TABLE IF EXISTS `schede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schede` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `idcaso` varchar(45) DEFAULT NULL,
  `idcaso_provv` varchar(45) DEFAULT NULL,
  `utenti_centri_id` int unsigned NOT NULL,
  `tipologia` enum('sids','morte fetale') NOT NULL COMMENT 'usato per discriminare la tipologia di schede',
  `info` tinytext,
  `data_creazione` date NOT NULL,
  `data_invio` date DEFAULT NULL,
  `data_ultima_modifica` date DEFAULT NULL,
  `bloccata` enum('Y','N') NOT NULL DEFAULT 'N',
  `completa` enum('Y','N') NOT NULL DEFAULT 'N',
  `consenso_diag` enum('Y','N') NOT NULL DEFAULT 'N',
  `consenso_analisi_gen` enum('Y','N') NOT NULL DEFAULT 'N',
  `consenso_analisi_toss` enum('Y','N') NOT NULL DEFAULT 'N',
  `nazionale` enum('Y','N') NOT NULL DEFAULT 'N',
  `cancellata` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `fk_schede_utenti` (`utenti_centri_id`),
  CONSTRAINT `fk_schede_utenti` FOREIGN KEY (`utenti_centri_id`) REFERENCES `utenti` (`centri_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schede`
--

LOCK TABLES `schede` WRITE;
/*!40000 ALTER TABLE `schede` DISABLE KEYS */;
INSERT INTO `schede` VALUES (1,'naz_1/2015','reg_1/2015',1,'sids','ppp','2015-10-15','2015-11-17','2015-11-17','N','N','N','N','N','N','Y'),(3,'naz_3/2015','reg_3/2015',9,'morte fetale','fetale','2015-10-22','2015-10-24',NULL,'Y','Y','N','N','N','N','Y'),(4,'naz_4/2015','reg_4/2015',1,'morte fetale','fetale','2015-10-22','2015-11-09',NULL,'Y','Y','Y','N','N','N','Y'),(5,NULL,'reg_5/2015',13,'morte fetale','torino','2015-10-22',NULL,NULL,'N','N','N','N','N','N','Y'),(6,NULL,'reg_6/2015',13,'sids','scheda sids','2015-10-22',NULL,NULL,'N','N','N','N','N','N','Y'),(8,'naz_8/2015','reg_8/2015',4,'sids','prova sids','2015-10-27','2015-11-07',NULL,'Y','Y','N','N','N','N','Y'),(9,NULL,'reg_9/2015',1,'morte fetale','prova feto','2015-10-27',NULL,'2015-11-18','N','N','N','N','N','N','Y'),(10,'naz_10/2015','reg_10/2015',8,'sids','prova decimali','2015-10-29','2015-09-13',NULL,'Y','Y','N','N','N','N','Y'),(11,NULL,'reg_11/2015',1,'sids','test autopsia','2015-11-05',NULL,'2015-11-28','N','N','Y','Y','Y','N','Y'),(12,NULL,'reg_12/2015',1,'morte fetale','test autopsia','2015-11-05',NULL,'2015-11-18','N','N','Y','Y','N','N','Y'),(14,NULL,'reg_14/2015',10,'sids','asdasd','2015-11-05',NULL,NULL,'N','N','N','N','N','N','Y'),(17,'naz_17/2015','reg_17/2015',20,'sids','dasdasdsd','2015-11-05','2015-03-09',NULL,'Y','Y','N','N','N','N','Y'),(18,'naz_18/2015','reg_18/2015',1,'sids','test conclusa','2015-11-06','2015-11-09',NULL,'N','N','N','N','N','N','Y'),(19,NULL,'reg_19/2015',1,'sids','prova consenso','2015-11-09',NULL,'2015-11-17','N','N','N','N','N','N','Y'),(20,NULL,'reg_20/2015',1,'sids','prova consenso','2015-11-09',NULL,'2015-11-18','N','N','N','N','N','N','Y'),(23,NULL,'reg_23/2015',1,'sids','asdsda','2015-11-17',NULL,'2015-11-18','N','N','N','N','N','N','Y'),(24,NULL,'reg_24/2015',1,'sids','fasdsd','2015-11-17',NULL,'2015-11-25','N','N','N','N','N','Y','Y'),(25,NULL,'reg_25/2015',1,'sids','dasdasd','2015-11-17',NULL,'2015-11-25','N','N','N','N','N','Y','Y'),(26,NULL,'reg_26/2015',1,'sids',NULL,'2015-11-18',NULL,'2015-11-18','N','N','N','N','N','N','Y'),(27,NULL,'reg_27/2015',1,'sids',NULL,'2015-11-18',NULL,NULL,'N','N','N','N','N','N','Y'),(28,NULL,'reg_28/2015',5,'sids',NULL,'2015-11-20',NULL,NULL,'N','N','N','N','N','Y','Y'),(29,NULL,'reg_29/2015',6,'sids',NULL,'2015-11-25',NULL,NULL,'N','N','N','N','N','Y','Y'),(30,NULL,'reg_30/2015',18,'morte fetale',NULL,'2015-11-25',NULL,NULL,'N','N','N','N','N','Y','Y'),(31,NULL,'reg_31/2015',1,'sids',NULL,'2015-11-27',NULL,NULL,'N','N','N','N','N','N','Y'),(32,NULL,'reg_32/2016',13,'sids',NULL,'2016-06-15',NULL,'2016-11-21','N','N','N','N','N','N','N'),(33,NULL,'reg_33/2016',13,'sids',NULL,'2016-06-15',NULL,'2016-11-21','N','N','N','N','N','N','Y'),(34,NULL,'reg_34/2016',13,'sids',NULL,'2016-06-15',NULL,'2016-11-21','N','N','N','N','N','N','Y'),(35,NULL,'reg_35/2016',13,'sids',NULL,'2016-06-15',NULL,'2016-11-21','N','N','N','N','N','N','Y'),(36,NULL,'reg_36/2016',13,'sids',NULL,'2016-06-15',NULL,'2016-11-21','N','N','N','N','N','N','Y'),(37,NULL,'reg_37/2016',1,'sids',NULL,'2016-07-22',NULL,NULL,'N','N','N','N','N','N','Y'),(38,NULL,'reg_38/2017',13,'sids',NULL,'2017-03-19',NULL,NULL,'N','N','N','N','N','N','N'),(39,NULL,'reg_39/2017',13,'sids',NULL,'2017-03-19',NULL,NULL,'N','N','N','N','N','N','N'),(40,NULL,'reg_40/2017',13,'sids',NULL,'2017-03-19',NULL,NULL,'N','N','N','N','N','N','N'),(41,NULL,'reg_41/2017',13,'sids',NULL,'2017-03-19',NULL,NULL,'N','N','N','N','N','N','N'),(42,NULL,'reg_42/2018',13,'sids',NULL,'2018-02-13',NULL,NULL,'N','N','N','N','N','N','N'),(43,NULL,'reg_43/2019',1,'sids',NULL,'2019-10-03',NULL,'2019-10-03','N','N','N','N','N','N','Y'),(44,NULL,'reg_44/2019',17,'sids',NULL,'2019-10-04',NULL,NULL,'N','N','N','N','N','N','N'),(45,NULL,'reg_45/2019',1,'morte fetale','Scheda di Prova','2019-10-07',NULL,NULL,'N','N','N','N','N','N','Y'),(46,NULL,'reg_46/2019',1,'sids','aa','2019-10-07',NULL,'2019-10-09','N','N','N','N','N','N','Y'),(47,NULL,'reg_47/2019',1,'sids','1-19','2019-10-09',NULL,'2024-06-19','N','N','N','N','N','N','N'),(48,NULL,'reg_48/2019',1,'sids','2-18','2019-10-10',NULL,NULL,'N','N','Y','Y','Y','N','N'),(49,NULL,'reg_49/2019',1,'sids','1-18','2019-10-11',NULL,'2023-10-24','N','N','N','N','N','N','N'),(50,NULL,'reg_50/2019',1,'sids','1-16','2019-10-15',NULL,'2019-10-22','N','N','N','N','N','N','N'),(51,NULL,'reg_51/2019',1,'sids','1-15','2019-10-16',NULL,'2023-10-27','N','N','N','N','N','N','N'),(52,NULL,'reg_52/2019',1,'sids','3-14','2019-10-17',NULL,'2023-10-24','N','N','Y','Y','Y','N','N'),(53,NULL,'reg_53/2019',1,'sids','1-19','2019-10-17',NULL,NULL,'N','N','N','N','N','N','Y'),(54,NULL,'reg_54/2019',1,'morte fetale','F 5 - 18','2019-10-18',NULL,NULL,'N','N','N','N','N','N','N'),(55,NULL,'reg_55/2019',1,'sids','2-14','2019-10-22',NULL,'2023-10-27','N','N','Y','Y','Y','N','N'),(56,NULL,'reg_56/2019',1,'sids','1-14','2019-10-24',NULL,'2023-10-24','N','N','Y','Y','Y','N','N'),(57,NULL,'reg_57/2023',1,'sids','abcd','2023-10-24',NULL,NULL,'N','N','N','N','N','N','N'),(58,NULL,'reg_58/2023',1,'sids',NULL,'2023-10-24',NULL,NULL,'N','N','N','N','N','N','N'),(59,NULL,'reg_59/2023',1,'sids',NULL,'2023-10-24',NULL,NULL,'N','N','N','N','N','N','N'),(60,NULL,'reg_60/2023',2,'sids','Anna','2023-10-27',NULL,NULL,'N','N','N','N','N','Y','N'),(61,NULL,'reg_61/2023',1,'sids',NULL,'2023-10-27',NULL,'2023-10-30','N','N','N','N','N','N','N'),(62,NULL,'reg_62/2023',1,'sids','Prova','2023-10-30',NULL,NULL,'N','N','N','N','N','N','N'),(63,NULL,'reg_63/2023',1,'morte fetale','Postiglione Beniamino Flavio','2023-11-08',NULL,'2023-11-10','N','N','Y','N','N','N','N'),(64,NULL,'reg_64/2023',1,'sids','Prova','2023-11-20',NULL,NULL,'N','N','N','N','N','N','N'),(65,NULL,'reg_65/2023',1,'morte fetale',NULL,'2023-11-20',NULL,'2023-12-04','N','N','N','N','N','N','N'),(66,NULL,'reg_65/2023',1,'morte fetale',NULL,'2023-11-20',NULL,'2023-12-04','N','N','N','N','N','N','N'),(67,NULL,'reg_67/2023',1,'sids',NULL,'2023-11-20',NULL,'2023-11-21','N','N','Y','Y','Y','N','N'),(68,NULL,'reg_68/2023',1,'sids',NULL,'2023-11-20',NULL,NULL,'N','N','N','N','N','N','N');
/*!40000 ALTER TABLE `schede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utenti` (
  `centri_id` int unsigned NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `otp` varchar(45) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `regionale` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`centri_id`),
  KEY `fk_utenti_centri` (`centri_id`),
  CONSTRAINT `fk_utenti_centri` FOREIGN KEY (`centri_id`) REFERENCES `centri` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES (1,'Lombardia','zahtjXyG',NULL,'Giuseppe','Rossi','Y'),(2,'Nazionale','FVu39N4k',NULL,'Lino','Rossi','N'),(3,'Abruzzo','CpV9U2mm',NULL,'','','Y'),(4,'Basilicata','7Vf4Y2qr',NULL,'','','Y'),(5,'Calabria','ge4pB2G9',NULL,'','','Y'),(6,'Campania','wRmr3BPv',NULL,'','','Y'),(7,'EmiliaRomagna','gpqENUTC',NULL,'','','Y'),(8,'FriuliVG','se74HZrv',NULL,'','','Y'),(9,'Lazio','HvTwByKE',NULL,'','','Y'),(10,'Liguria','e88fHQHF',NULL,'','','Y'),(11,'Marche','u4nr4dHB',NULL,'','','Y'),(12,'Molise','MU4Ajz8S',NULL,'','','Y'),(13,'Piemonte','rRmCmVNk',NULL,'','','Y'),(14,'Puglia','pEZxHACe',NULL,'','','Y'),(15,'Sardegna','6JBAyXqx',NULL,'','','Y'),(16,'Sicilia','AYwuTrWF',NULL,'','','Y'),(17,'Toscana','5MZYjHHA',NULL,'','','Y'),(18,'TrentinoAA','MxaDD83g',NULL,'','','Y'),(19,'Umbria','hNF3fHh2',NULL,'','','Y'),(20,'ValleDAosta','J2z4Xcdv',NULL,'','','Y'),(21,'Veneto','ZTxLnJYd',NULL,'','','Y');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-27  9:11:10
