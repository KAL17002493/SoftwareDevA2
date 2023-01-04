-- Dumping database structure for shop
CREATE DATABASE IF NOT EXISTS `A2CMS` /*!40100 DEFAULT CHARACTER SET utf16 */;
USE `A2CMS`;

-- Dumping structure for table shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf16;

-- Dumping data for table shop.products: ~1 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
	(1, 'Flowers', 'Pretty Flowers', 10, './images/uploads/639b249e3e22f.webp'),
	(2, 'Flowers', 'Pretty Flowers', 8, './images/uploads/639b250bdc520.webp'),
	(3, 'Flowers', 'Pretty Flowers', 9, './images/uploads/639b2511f388d.webp');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` text,
  `email` varchar(255) DEFAULT NULL,
  `createdOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf16;

-- Dumping data for table shop.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `createdOn`, `modifiedOn`) VALUES
	(1, 'John', 'Doe', '$2y$10$hQ46qoiTiNYCdNsjB6/C2OyX3VzeSe43l0mYJoWyESNFg5e3zU4fW', 'simon@example.com', '2022-12-13 15:42:10', '2022-12-13 15:42:10');
