-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2024 at 06:30 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataon`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `bean` varchar(100) NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `bean`, `deskripsi`, `harga`) VALUES
(1, 'cubita', 'cubita coffe is sun dried and hand sorted. it Originates from an elevation of ever 2000 meters in the andes mountain of ecuador.which is located closest to the sun on the equator aroma  and rich flavor', '$12.00'),
(2, 'colombian supremo', 'this smoot, full-flavored coffe from colombia boasts a sweet delicate aroma and a rich, balanced flavor, a classic coffe appropriate for any occasion', '$13.50'),
(3, 'Kenyan', 'The complex coffe from the highlans of eas africa features a winery, full flavor coupled woth an intiguing aroma a delightfully delicate selection for coffe lovers', '$24.00'),
(4, 'pure kona fancy', 'grown on the big islan of hawai, this coffe is known for its tantalizig aroma. This medium bodied brew offers a rich flavor with subtle winery tonea', '$15.90'),
(5, 'costa rican ', 'arrabicas normaly set aside for the demanding northen european marker produse this livly we balance', '$12.30'),
(6, 'kona peaberry', 'occasionally coffe fruit produce a singgle, rather than a double, bean ther \"peabernes\"provide all the flavor and aroma or their larger', '$10.00'),
(7, 'sumatra', 'the wonderful cocoa-like finish smooth full boodied coffe is reminiscent of rich, dark chocolate. ', '$9.50'),
(8, 'Kona Blend', '25% Kona, 25% Sumatra, 50% Colombian. This Combination unites the fragrant aroma of konta', '$12.15'),
(9, 'Kona Expresso', 'Some Like it dark roasted to give it the smokey, bittersweet thar expresso drinkers crave', '$13.00'),
(10, 'italian Roast', 'roasted in the southern italian tradition, this boldy flavored dark roast is a perfect choice for either a herty cup of drip coffe or a shot of espresso', '$11.90');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_edit_timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `nama`, `kota`, `wilayah`, `country`, `phone`, `email`, `last_edit_timestamp`) VALUES
(1, 'Bean US', 'Brisbane', 'Brisbane', 'US', '12334455', 'Bean@gmail.com', '0000-00-00 00:00:00'),
(2, 'the Buzz', 'Munich', 'munich', 'jerman', '9887722111', 'buzz@gmail.com', '0000-00-00 00:00:00'),
(3, 'coffe galore', 'caplle aa den Ussel', 'ussel', 'turki', '321111234', 'ussel@gmail.com', '0000-00-00 00:00:00'),
(4, 'park plus', 'salem', 'palestina', 'palestina', '2333333', 'perk@gmail.com', '0000-00-00 00:00:00'),
(5, 'cafe colombiann', 'hawthome', 'colombia', 'colombia', '2221134', 'cafe@gmail.com', '0000-00-00 00:00:00'),
(6, 'jumpin java', 'sydney', 'sydney', 'australia', '43212321', 'jumpin@gmail.com', '0000-00-00 00:00:00'),
(7, 'coffe 2000', 'munich', 'jerma', 'jerman', '337373722', 'jumoin@gmail.com', '0000-00-00 00:00:00'),
(8, 'the whole bean', 'alton', '', 'alton', '3212345', 'alton@gmail.com', '0000-00-00 00:00:00'),
(9, 'roast resellers ', 'vancouver', 'bandung', 'imdo', '332123', 'van@gmail.com', '0000-00-00 00:00:00'),
(10, 'Bean R ', 'serang', 'ss', 'ss', 'ss', 'ss', '0000-00-00 00:00:00'),
(11, 'triyo', 'serang', 'banten', 'indonesia', '082928282', 'prasetyo.triyo29@gmail.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
