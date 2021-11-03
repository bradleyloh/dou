
USE f32ee;
--
-- Table structure for table `faq`
--
DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topicId` int(11) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,1,'How can I pay for my food?','edit'),(2,1,'q2','ans'),(3,2,'q3','ans');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqTopic`
--
CREATE TABLE `faqTopic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqTopic`
--

LOCK TABLES `faqTopic` WRITE;
/*!40000 ALTER TABLE `faqTopic` DISABLE KEYS */;
INSERT INTO `faqTopic` VALUES (1,'Main Topic 1'),(2,'Main Topic 2'),(3,'Main Topic 3');
/*!40000 ALTER TABLE `faqTopic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` VALUES (1,'a','a','a'),(2,'test','test','test');

--
-- Table structure for table `orderDetail`
--
CREATE TABLE `orderDetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` decimal(11,2) DEFAULT '0.00',
  `subtotal` decimal(11,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
--
-- Dumping data for table `orderDetail`
--
INSERT INTO `orderDetail` VALUES (3,8,1,1,2.80,2.80);

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` decimal(11,2) DEFAULT '0.00',
  `customerName` varchar(255) DEFAULT NULL,
  `customerEmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` VALUES (10,2.50,'a','a@mail.com');

--
-- Table structure for table `productType`
--

DROP TABLE IF EXISTS `productType`;
CREATE TABLE `productType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productType`
--

INSERT INTO `productType` VALUES (1,'Beancurd','Silky and smooth'),(2,'Drinks','Quench your thirst'),(3,'Muffins','Satisfy your cravings');

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(11,2) DEFAULT '0.00',
  `typeId` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `imageFileName` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--


-- ID, Name, Description, Price, Type-ID (1 = beancurd , 2 = soya drinks, 3 = muffins) , Stock, images
INSERT INTO `products` VALUES 
(1,'Soy Beancurd','Classic beancurd',1.50,1,10,'beancurd-soy.png'),
(2,'Almond Beancurd','Beancurd with almond toppings',2.40,1,10,'beancurd-almond.png'),
(3,'Matcha Beancurd','Beancurd with matcha flavoured recipes',2.40,1,10,'beancurd-matcha.png'),
(4,'Classic Soymilk','Classic Soymilk',1.50,2,0,'soymilk-1.png'),
(5,'Almond Soymilk','Matcha Soymilk',2.0,2,0,'soymilk-2.png'),
(6,'Coconut Soymilk','Coconut Soymilk',2.0,2,0,'soymilk-3.png'),
(7,'Banana Muffin','Banana Muffin',2.10,3,0,'muffin-banana.png'),
(8,'Blueberry Muffin','Blueberry is blue',1.50,3,0,'muffin-blueberry.png'),
(9,'Chocolate Muffin','Fine grains dark chooclate',1.50,3,0,'muffin-chocolate.png');
