-- MySQL dump 10.11
--
-- Host: 66.40.52.43    Database: pedkos6_books
-- ------------------------------------------------------
-- Server version	5.1.50-log

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `books` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(150) NOT NULL,
  `Author` varchar(150) NOT NULL,
  `Date read` date DEFAULT NULL,
  `Rating` float DEFAULT NULL,
  `Comments` varchar(500) DEFAULT NULL,
  `fiction` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (2,'Papillon','Henri Charriere','2010-11-30',4.75,'A bit long, for relaxation.',1),(6,'The time machine','H. G. Wells','2010-12-01',4,'very short',1),(7,'1984','George Orwell','2010-03-01',5,'Read for baccalaureate essays',1),(9,'East of Eden','John Steinbeck','2011-02-15',4,'too long, excellent example of manipulation and cruelty.',1),(10,'To kill a mockingbird','Harper Lee','2010-12-25',4.5,'\"Shoot all the bluejays you want, if you can hit \'em, but remember it\'s a sin to kill a mockingbird.\" -Atticus\r\n\r\nA book showing discrimination against the black, and teaches that one should not punish an innocent because he\'s different. Even if it seems worthless.',1),(11,'Chronicle of a death foretold','Gabriel Garcia Marquez','2011-03-10',2,'I think it is very overrated. I was not very satisfying nor was its lesson inspiring.',1),(12,'The name of the rose','Umberto Eco','2011-04-20',3.75,'Story of intelligence, preservation of knowledge and some boring religious observations (Like \"Was Jesus rich? or \"Did Jesus laugh?\")',1),(13,'One flew over the cuckoo\'s nest','Ken Kesey','2011-03-05',5,'Very entertaining novel, about McMurphy and other patients at a psihitric hospital who try to break free of the rule of Miss Rutchel. Includes the motive of manipulation.',1),(14,'Catch 22','Joseph Helle','2010-10-01',4.5,'Quite entertaining and fascinating. Shows life as a Catch 22, that is a cycle that you can\'t break free no matter what you do. ',1),(16,'Animal farm','George Orwell','2011-03-01',4,'Quite funny and interesting. A farm\'s animals break free from their lord, and the pigs (who are smart) take the rule. Slowly they become so gready with their status that they become acting almost like humans. Conclusion: humans are not bad, it the way we become due to power and wealth that makes as evil.',1),(17,'Three men in a boat','Jerome Klapka','2011-03-27',0.5,'Maybe I read the short version, but I found the book to be very boring and uninspiring.',1),(18,'The adventures of Huchlberry Finn','Mark Twain','2011-03-30',1.25,'As stated initially, the book has no moral. It is only a suite of events that happen to an adventurous boy. \r\n\r\nThis was not enough to captivate me, so I left it unread (I read about a third of it). ',1),(19,'His dark materials','Phillip Pullman','2010-10-15',5,'trilogy. Very entertaining novel. Recommend. Concludes by glorifying knowledge and emphasizing the importance of studying.',1),(27,'The old man and the sea','Ernest Hemingway','2010-01-01',3.25,'boring',1),(31,'Business stripped bare','Richard Branson','2010-10-15',3.5,NULL,0),(32,'How to talk to anyone','Leil Lowndes','2010-11-05',4,'Worth rereading once every few years',0),(33,'The visual display of quantitative information','Edward Tufte','2011-02-20',5,'Excellent book on statistics and visualizing information. Highly recommend.',0),(34,'Where good ideas come from','Steven Johnson','2011-05-19',4,'First part of the book was interesting and entertaining, the end was reapeating and a bit boring IMO.\r\n',0),(35,'Sirene s Titana','Kurt Vonnegut','2011-05-27',3.5,'Slovenian translation was quite bad.\r\nA science fiction novel about meaning of life, beliefs.',1),(37,'The Tipping Point','Malcom Gladwell','2011-07-26',4,'How Little Things Can Make a Big Difference',0),(38,'Osnovne Vescine postavljanja vprasanj','Dr. Marilee Adams','2011-08-15',4,'Z vprasanji do sprememb.\r\nTeaches a way of thinking by asking questions. \r\nEmphasizes the importance of being a student (curious, willing to learn and understand), and not an accuser.',0),(39,'2666','Roberto BolaÃ±o','2011-10-01',1.5,'Unfinished. Read a bit more than half of the english translation. (p 474/898)\r\nIt\'s long, repeating story telling without a real story. The book can be summarized in a single paragraph. \r\n\r\nAbout critics:\r\nFour PhD students try to track down their idol and author Archimboldi without success. The book tells their lives in great detail.\r\nAbout Amalfitano:\r\nTells a story of a depressed professor who has a daughter. He\'s sorry to have moved to Santa Teresa.\r\nAbout Fate:\r\nA journalist is sent to Sant',1),(40,'Javascript: The Good Parts','Douglas Crockford','2012-02-09',4.5,'Tells what parts of javascrpit to avoid, and which to use in order to write higher quality applications. ',0),(41,'Responsive Web Design','Ethan Marcotte','2012-02-19',3.75,'Shows the fundamentals required to quickly create a responsive layout: the flexible grid, images and media queries.\r\nIt is a short, nice read. \r\nContains a few annoying remarks by the author, but it doesn\'t spoil the content.\r\nWish it included: more involvement from the user. This is a book to read, not write the code while reading.',0),(42,'MapReduce: Simpliï¬ed Data Processing ',' Jeffrey Dean and Sanjay Ghemawa','2012-02-26',4.5,'Presents the MapReduce model, and its applications with examples.',0),(43,'Eloquent Javascript','Marijn Haverbeke','2011-02-19',4.5,'Very good intruductiory book for javascript with great examples. The online version has a very nice Javascript console so one can test out the examples.',0),(44,'GPU acceleration of the particle filter','Lawrence Murray','2012-03-19',2,'Short, incomplete? presentation of resampling techniques (esp. Metropolis resampler) for the particle filters.\r\nLack depth and explanation.',0),(45,'The Black Swan','Nassim Nicholas Taleb','2012-03-20',4,'The Black Swan: The Impact of the Highly Improbable\r\n\r\nPresents the importance of Black swans (events that are unknown unknowns) and their impact esp in economics. \r\nExplains why Gaussian bells are bad (they completely fail to accommodate for Black Swans) for scalable properties (eq. wealth) and why Mandelbrot\'s Fractal distributions are better at it (convert Black swans to Grey swans). \r\nWhat I missed: some more technical explanations. The author seemed to avoid even presenting the Gauss formal',0),(46,'Anatomy of a Large-Scale  Web Search Engine','Sergey Brin, Lawrence Page','2012-03-28',4.5,'Describes the Google search engine, their heuristics, pagerank, its architecture, data structures, indexing, crawling and seaching.\r\nThe Anatomy of a Large-Scale Hypertextual\r\nWeb Search Engine: \r\nhttp://ilpubs.stanford.edu:8090/361/1/1998-8.pdf',0),(47,'Beautiful Data: Behind Elegant Data Solutions','Toby Segaran, Jeff Hammerbacker','2012-04-10',4,'Ensemble of essays about using and interpreting large data sets in the real world. Most stories were very interesting, a few were too basic (building web forms), one too complex (one about chemistry). Mostly great. ',0),(48,'7 Weeks to 50 Pull-Ups','Brett Stewart','2012-04-10',3,'The text is not very high quality. I just started working on the workout. I hope it is good. ',0);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'http://kennyanderica.com/wp-content/uploads/2009/11/facebook-no-image1.gif',
  `Name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','root','http://kennyanderica.com/wp-content/uploads/2009/11/facebook-no-image1.gif','SIte admin'),('pedrokost','flape','https://lh5.googleusercontent.com/-RkG0LEaHEro/AAAAAAAAAAI/AAAAAAAAD90/zbOgVeecab8/photo.jpg?sz=100','Pedro Kostelec');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-04-14 15:20:31
