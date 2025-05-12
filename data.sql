-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_05_12_101848_create_products_table',1),(6,'2025_05_12_102036_create_user_ratings_table',1),(7,'2025_05_12_103328_add_unique_constraint_to_user_ratings',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',6,'API Token','55310257de600a80a2140ef78ff01ca602490f114d7d8f2e386b296e48c96fe0','[\"*\"]',NULL,NULL,'2025-05-12 08:49:01','2025-05-12 08:49:01');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'enim','Sed nam error amet quo nulla.',446.53,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(2,'ut','Et iste illum et et aut nesciunt corporis.',177.31,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(3,'vel','Distinctio sed soluta ut quaerat et.',203.80,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(4,'aperiam','Error nobis odit nemo facere qui.',202.56,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(5,'aspernatur','Earum voluptatibus quo saepe impedit rem illo.',449.65,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(6,'aperiam','Accusantium quis eos et magnam aliquam neque.',448.55,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(7,'nostrum','Ea doloribus error officia aut ut.',131.61,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(8,'laboriosam','Officia rerum cupiditate non aperiam.',496.65,'2025-05-12 07:29:52','2025-05-12 07:29:52'),(9,'natus','Aut qui quo facere cupiditate.',328.56,'2025-05-12 07:29:53','2025-05-12 07:29:53'),(10,'voluptatibus','Deleniti corporis repellendus et sunt.',312.22,'2025-05-12 07:29:54','2025-05-12 07:29:54');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_ratings`
--

LOCK TABLES `user_ratings` WRITE;
/*!40000 ALTER TABLE `user_ratings` DISABLE KEYS */;
INSERT INTO `user_ratings` VALUES (1,3,8,2,'2025-02-05 19:38:17','2025-05-12 07:29:54','2025-05-12 07:29:54'),(2,1,6,5,'2024-07-04 06:37:24','2025-05-12 07:29:54','2025-05-12 07:29:54'),(3,3,2,5,'2024-09-19 21:32:34','2025-05-12 07:29:54','2025-05-12 07:29:54'),(4,1,9,1,'2025-01-16 14:39:15','2025-05-12 07:29:54','2025-05-12 07:29:54'),(5,3,6,4,'2025-01-20 19:50:14','2025-05-12 07:29:54','2025-05-12 07:29:54'),(6,4,5,5,'2024-08-01 03:28:02','2025-05-12 07:29:54','2025-05-12 07:29:54'),(7,3,9,3,'2025-03-15 12:51:04','2025-05-12 07:29:54','2025-05-12 07:29:54'),(8,3,10,2,'2025-03-31 22:55:13','2025-05-12 07:29:55','2025-05-12 07:29:55'),(9,5,10,2,'2024-10-20 23:44:04','2025-05-12 07:29:55','2025-05-12 07:29:55'),(10,2,10,3,'2025-02-28 08:32:08','2025-05-12 07:29:55','2025-05-12 07:29:55');
/*!40000 ALTER TABLE `user_ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Vernice Dibbert','mgraham@example.net','2025-05-12 07:29:50','$2y$12$vLtKn8xhpiMmhqTPTMaKre/k.iPMBtL6pOzqJASQVZIOdMuuhlbVq','SmqY7y2Z7d','2025-05-12 07:29:51','2025-05-12 07:29:51'),(2,'Felipe Prohaska V','retta28@example.org','2025-05-12 07:29:50','$2y$12$pkUtvSosH/fIr3p06/StpuAAi.PzN6CFCysX7OmqP1q.LOxBjQ6r.','olTXlceuj8','2025-05-12 07:29:51','2025-05-12 07:29:51'),(3,'Harley Fahey','emard.eleanore@example.com','2025-05-12 07:29:50','$2y$12$5jcZFG9Z3OXYFPfvplZoG.nsNwc3iI9DRNTlsoBdzTtfn0C.a70am','9aIuHQp4zs','2025-05-12 07:29:51','2025-05-12 07:29:51'),(4,'Shanna Connelly','alba.mertz@example.net','2025-05-12 07:29:51','$2y$12$msxQPR.gWYxhvmjh3IfOXeeF9D3t8tPzeFMzhnuWMfdnGJGT/wkDe','N4McmvJuUk','2025-05-12 07:29:51','2025-05-12 07:29:51'),(5,'Angelica Lindgren','helmer30@example.org','2025-05-12 07:29:51','$2y$12$9Tn7tODgZDtVu0KtA3hfD.XEzn65673ilkW9TmT3iePSImmkEY1Um','RM6JNM4Og1','2025-05-12 07:29:52','2025-05-12 07:29:52'),(6,'Test user','testuser@test.com','2025-05-12 08:42:40','$2y$12$UrlqdNvTscB/856k.Z5o3eIMclmvoCgPcxCUEyxnlO.9Q3dboV0QK','m7elUshzCk','2025-05-12 08:42:41','2025-05-12 08:42:41');
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

-- Dump completed on 2025-05-12 15:16:58
