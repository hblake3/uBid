-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 12:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubid`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_item`
--

CREATE TABLE `auction_item` (
  `itemID` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `startingPrice` decimal(10,2) DEFAULT NULL,
  `highestBid` decimal(10,2) DEFAULT NULL,
  `sellerProfile` int(11) DEFAULT NULL,
  `buyerProfile` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auction_item`
--

INSERT INTO `auction_item` (`itemID`, `title`, `description`, `startTime`, `endTime`, `startingPrice`, `highestBid`, `sellerProfile`, `buyerProfile`, `categoryID`) VALUES
(1, 'Antique Rocking Chair', 'Upholstered rocking chair with intricate carvings', '2024-06-25 12:00:00', '2024-07-10 12:00:00', 150.00, NULL, 27, NULL, 6),
(2, 'Gaming Laptop', 'High-performance laptop for gaming enthusiasts', '2024-06-24 18:00:00', '2024-07-08 18:00:00', 800.00, NULL, 12, NULL, 20),
(3, 'Signed Baseball Cap', 'Baseball cap signed by famous player', '2024-06-26 08:00:00', '2024-07-01 08:00:00', 25.00, NULL, 5, NULL, 29),
(4, 'Vintage Diamond Necklace', 'Sparkling diamond necklace, perfect for special occasions', '2024-06-22 15:00:00', '2024-07-15 15:00:00', 1200.00, NULL, 21, NULL, 10),
(5, 'Rare Collectible Action Figure', 'Highly collectible action figure', '2024-06-25 20:00:00', '2024-07-09 20:00:00', 50.00, NULL, 3, NULL, 30),
(6, 'First Edition Sci-Fi Novel', 'Rare first edition science fiction novel in mint condition', '2024-06-27 10:00:00', '2024-07-12 10:00:00', 100.00, NULL, 19, NULL, 21),
(7, 'Signed Sports Jersey', 'Jersey signed by legendary athlete', '2024-06-28 14:00:00', '2024-07-13 14:00:00', 200.00, NULL, 8, NULL, 29),
(8, 'Handmade Leather Wallet', 'Crafted from high-quality leather, perfect for everyday use', '2024-06-29 16:00:00', '2024-07-14 16:00:00', 35.00, NULL, 20, NULL, 24),
(9, 'Vintage Camera Collection', 'Set of vintage cameras in excellent condition', '2024-06-26 00:00:00', '2024-07-11 00:00:00', 500.00, NULL, 15, NULL, 19),
(10, 'Custom-Built Gaming PC', 'Top-of-the-line components for a superior gaming experience', '2024-06-27 08:00:00', '2024-07-12 08:00:00', 1500.00, NULL, 11, NULL, 20),
(11, 'Sterling Silver Flatware Set', 'Elegant set of sterling silver flatware for 12', '2024-06-28 09:00:00', '2024-07-16 09:00:00', 250.00, NULL, 22, NULL, 17),
(12, 'Rare Historical Document', 'Original document with historical significance', '2024-06-29 12:00:00', '2024-07-18 12:00:00', 1000.00, NULL, 4, NULL, 28),
(13, 'Acoustic Guitar', 'High-quality acoustic guitar for musicians of all levels', '2024-06-28 18:00:00', '2024-07-17 18:00:00', 400.00, NULL, 3, NULL, 32),
(14, 'Luxury Watch Collection', 'Set of luxury watches from prestigious brands', '2024-06-30 15:00:00', '2024-07-19 15:00:00', 5000.00, NULL, 16, NULL, 13),
(15, 'Hand-Painted Oil Painting', 'Original oil painting by a renowned artist', '2024-06-29 06:00:00', '2024-07-18 06:00:00', 2000.00, NULL, 7, NULL, 7),
(16, 'Porcelain Tea Set', 'Vintage porcelain tea set with intricate floral patterns', '2024-07-01 10:00:00', '2024-07-20 10:00:00', 75.00, NULL, 26, NULL, 8),
(17, 'Wireless Noise-Cancelling Headphones', 'Top-rated wireless headphones for immersive listening', '2024-07-02 14:00:00', '2024-07-21 14:00:00', 150.00, NULL, 12, NULL, 19),
(18, 'Antique Pocket Watch', 'Elegant pocket watch in excellent working condition', '2024-07-03 16:00:00', '2024-07-22 16:00:00', 200.00, NULL, 17, NULL, 15),
(19, 'Limited Edition Vinyl Record', 'Rare and collectible limited edition vinyl record', '2024-07-01 00:00:00', '2024-07-20 00:00:00', 100.00, NULL, 5, NULL, 31),
(20, 'Electric Guitar', 'Electric guitar perfect for beginners and experienced players alike', '2024-07-02 08:00:00', '2024-07-21 08:00:00', 300.00, NULL, 14, NULL, 31),
(21, 'Vintage Leather Sofa', 'Classic and comfortable vintage leather sofa', '2024-07-04 10:00:00', '2024-07-23 10:00:00', 200.00, NULL, 2, NULL, 17),
(22, 'Signed Baseball Collection', 'Collection of baseballs signed by legendary players', '2024-07-05 14:00:00', '2024-07-24 14:00:00', 500.00, NULL, 8, NULL, 29),
(23, 'High-End DSLR Camera', 'Professional-grade DSLR camera for serious photographers', '2024-07-06 16:00:00', '2024-07-25 16:00:00', 1200.00, NULL, 11, NULL, 19),
(24, 'Autographed Rock Band Photo', 'Photo of a famous rock band signed by all members', '2024-07-04 00:00:00', '2024-07-23 00:00:00', 150.00, NULL, 30, NULL, 28),
(25, 'Classic Rock Album Collection', 'Collection of classic rock albums on vinyl', '2024-07-05 08:00:00', '2024-07-24 08:00:00', 100.00, NULL, 25, NULL, 31),
(26, 'Designer Handbag', 'Luxurious designer handbag for fashion enthusiasts', '2024-07-07 10:00:00', '2024-07-26 10:00:00', 300.00, NULL, 18, NULL, 24),
(27, 'Collection of Vintage Comics', 'Set of classic vintage comics in good condition', '2024-07-08 14:00:00', '2024-07-27 14:00:00', 75.00, NULL, 6, NULL, 21),
(28, 'Wireless Gaming Headset', 'High-performance wireless headset for immersive gaming', '2024-07-09 16:00:00', '2024-07-28 16:00:00', 100.00, NULL, 12, NULL, 20),
(29, 'Signed Movie Poster', 'Movie poster signed by famous actors', '2024-07-07 00:00:00', '2024-07-26 00:00:00', 50.00, NULL, 23, NULL, 28),
(30, 'Acoustic Guitar Amplifier', 'Powerful amplifier for acoustic guitars', '2024-07-08 08:00:00', '2024-07-27 08:00:00', 200.00, NULL, 14, NULL, 32),
(31, 'Gold Necklace', 'Elegant gold necklace with a sparkling pendant', '2024-07-10 00:00:00', '2024-07-29 00:00:00', 300.00, NULL, 9, NULL, 10),
(32, 'Royal Chess Set', 'Hand-crafted chess set with exquisite detailing', '2024-07-11 12:00:00', '2024-07-30 12:00:00', 500.00, NULL, 2, NULL, 5),
(33, 'Smartwatch', 'Multifunctional smartwatch with fitness tracking and notification capabilities', '2024-07-12 14:00:00', '2024-07-31 14:00:00', 250.00, NULL, 12, NULL, 19),
(34, 'Collection of Antique Maps', 'Set of antique maps from different historical periods', '2024-07-13 16:00:00', '2024-08-01 16:00:00', 100.00, NULL, 15, NULL, 28),
(35, 'Coffee Table Book Collection', 'Collection of coffee table books on various topics (art, travel, photography)', '2024-07-14 18:00:00', '2024-08-02 18:00:00', 150.00, NULL, 19, NULL, 21),
(36, 'Garden Rake', 'Your standard garden rake. Don\'t leave home without one!', '2024-07-15 20:00:00', '2024-08-03 20:00:00', 20.00, NULL, 7, NULL, 18),
(37, 'Luxury Fountain Pen', 'Handcrafted fountain pen with a smooth nib for a superior writing experience', '2024-07-16 08:00:00', '2024-08-04 08:00:00', 150.00, NULL, 14, NULL, 22),
(38, 'Wireless Noise-Cancelling Headphones', 'High-fidelity headphones with noise cancellation for immersive listening', '2024-07-17 10:00:00', '2024-08-05 10:00:00', 300.00, NULL, 3, NULL, 19),
(39, 'Set of Porcelain Figurines', 'Delicate porcelain figurines depicting various scenes', '2024-07-18 12:00:00', '2024-08-06 12:00:00', 125.00, NULL, 20, NULL, 8),
(40, 'Rare First Edition Book', 'First edition book in collectible condition by a renowned author', '2024-07-19 14:00:00', '2024-08-07 14:00:00', 750.00, NULL, 27, NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bidID` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bidTime` date DEFAULT NULL,
  `profileID` int(11) DEFAULT NULL,
  `itemID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bidID`, `amount`, `bidTime`, `profileID`, `itemID`) VALUES
(1, 300.00, '2024-06-26', 4, 1),
(39, 27.00, '2024-06-26', 5, 3),
(40, 30.00, '2024-06-26', 17, 1),
(41, 1300.00, '2024-06-26', 24, 10),
(42, 225.00, '2024-06-26', 32, 11),
(43, 70.00, '2024-06-26', 10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `name`, `parentID`) VALUES
(1, 'Automobiles', NULL),
(2, 'Classic Cars', 1),
(3, 'Motorcycles', 1),
(4, 'Car Parts & Accessories', 1),
(5, 'Antiques', NULL),
(6, 'Furniture', 5),
(7, 'Art', 5),
(8, 'Decorative Arts', 5),
(9, 'Jewelry', NULL),
(10, 'Necklaces', 9),
(11, 'Rings', 9),
(12, 'Earrings', 9),
(13, 'Watches', NULL),
(14, 'Luxury Watches', 13),
(15, 'Vintage Watches', 13),
(16, 'Home & Garden', NULL),
(17, 'Furniture', 16),
(18, 'Garden Tools', 16),
(19, 'Electronics', NULL),
(20, 'Computers', 19),
(21, 'Books', NULL),
(22, 'Adult', 21),
(23, 'Children', 21),
(24, 'Clothing', NULL),
(25, 'Jackets', 24),
(26, 'Pants', 24),
(27, 'T-Shirts', 24),
(28, 'Memorabilia', NULL),
(29, 'Sports Collectibles', 28),
(30, 'Action Figures', 28),
(31, 'Music Albums', 28),
(32, 'Musical Instruments', NULL),
(33, 'Guitars', 32);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profileID` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `creditCard` varchar(20) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profileID`, `username`, `address`, `password`, `firstName`, `lastName`, `email`, `phoneNumber`, `creditCard`, `isAdmin`) VALUES
(2, 'EmJay987', '456 Maple Ave, Chicago, IL 60601', 'hashed_password_here', 'Emily', 'Johnson', 'emilyjohnson@email.com', '(312) 555-5678', '5555555555554444', 0),
(3, 'MikeBytes007', '789 Pine Rd, New York, NY 10001', 'hashed_password_here', 'Michael', 'Brown', 'mbrown@email.com', '(212) 555-9012', '378282246310005', 0),
(4, ' t3hPeNgU1NoFd00m', '321 Elm Blvd, Los Angeles, CA 90001', 'hashed_password_here', 'Sarah', 'Davis', 'sdavis@email.com', '(213) 555-3456', '6011111111111117', 0),
(5, 'JSpring82', '123 Oak St, Springfield, IL 62704', 'hashed_password_here', 'John', 'Smith', 'jsmith82@email.com', '(217) 555-1234', '4111111111111111', 0),
(6, 'BookwormLaura11', '789 Birch St, Seattle, WA 98101', 'hashed_password_here', 'Laura', 'Wilson', 'lwilson@email.com', '(206) 555-1212', '4111111111111111', 0),
(7, 'KungFuLee125', '456 Cedar Ave, San Francisco, CA 94102', 'hashed_password_here', 'Robert', 'Lee', 'rlee@email.com', '(415) 555-2323', '5555555555554444', 0),
(8, 'JennPDX05', '123 Redwood Blvd, Portland, OR 97201', 'hashed_password_here', 'Jennifer', 'Chen', 'jchen@email.com', '(503) 555-3434', '378282246310005', 0),
(9, 'KimPossible99', '789 Spruce Ln, Boston, MA 02108', 'hashed_password_here', 'David', 'Kim', 'dkim@email.com', '(617) 555-4545', '6011111111111117', 0),
(10, 'Smiley_SJ', '456 Maple Dr, Miami, FL 33101', 'hashed_password_here', 'Sarah', 'Jones', 'sjones@email.com', '(305) 555-5656', '3530111333300000', 0),
(11, 'AustinTech2020', '123 Pine St, Austin, TX 78701', 'hashed_password_here', 'Michael', 'Garcia', 'mgarcia@email.com', '(512) 555-6767', '4111111111111111', 0),
(12, 'EmilyNoodles_009', '789 Oak Ave, Denver, CO 80202', 'hashed_password_here', 'Emily', 'Nguyen', 'enguyen@email.com', '(303) 555-7878', '5555555555554444', 0),
(13, 'CaptainBill', '456 Elm St, Atlanta, GA 30303', 'hashed_password_here', 'William', 'Taylor', 'wtaylor@email.com', '(404) 555-8989', '378282246310005', 0),
(14, 'LivvyB_02', '123 Birch Ln, Philadelphia, PA 19102', 'hashed_password_here', 'Olivia', 'Brown', 'obrown@email.com', '(215) 555-9090', '6011111111111117', 0),
(15, 'SalsaKing', '789 Cedar Blvd, Phoenix, AZ 85001', 'hashed_password_here', 'Daniel', 'Martinez', 'dmartinez@email.com', '(602) 555-0101', '3530111333300000', 0),
(16, 'SophieStar72', '456 Spruce Ave, San Diego, CA 92101', 'hashed_password_here', 'Sophia', 'Anderson', 'sanderson@email.com', '(619) 555-1212', '4111111111111111', 0),
(17, 'GamerBoy1337', '123 Redwood Dr, Dallas, TX 75201', 'hashed_password_here', 'Ethan', 'Williams', 'ewilliams@email.com', '(214) 555-2323', '5555555555554444', 0),
(18, 'AvaTastic', '789 Pine Ave, Detroit, MI 48201', 'hashed_password_here', 'Ava', 'Thomas', 'athomas@email.com', '(313) 555-3434', '378282246310005', 0),
(19, 'noahjohnson424', '456 Oak Ln, Las Vegas, NV 89101', 'hashed_password_here', 'Noah', 'Johnson', 'njohnson@email.com', '(702) 555-4545', '6011111111111117', 0),
(20, 'EmmaSnow_23', '123 Maple Blvd, Nashville, TN 37201', 'hashed_password_here', 'Emma', 'White', 'ewhite@email.com', '(615) 555-5656', '3530111333300000', 0),
(21, 'LiamTheSwift', '789 Elm Ave, Charlotte, NC 28202', 'hashed_password_here', 'Liam', 'Harris', 'lharris@email.com', '(704) 555-6767', '4111111111111111', 0),
(22, 'SuperClark', '456 Birch Dr, Columbus, OH 43215', 'hashed_password_here', 'Oliver', 'Clark', 'oclark@email.com', '(614) 555-7878', '5555555555554444', 0),
(23, 'amelialewis_88', '123 Cedar St, Indianapolis, IN 46204', 'hashed_password_here', 'Amelia', 'Lewis', 'alewis@email.com', '(317) 555-8989', '378282246310005', 0),
(24, 'RockyRob', '789 Spruce Dr, San Antonio, TX 78205', 'hashed_password_here', 'Mason', 'Roberts', 'mroberts@email.com', '(210) 555-9090', '6011111111111117', 0),
(25, 'CityWalker', '456 Pine Ave, Jacksonville, FL 32202', 'hashed_password_here', 'Charlotte', 'Walker', 'cwalker@email.com', '(904) 555-0101', '3530111333300000', 0),
(26, 'CocoWest', '789 Elm St, Houston, TX 77002', 'hashed_password_here', 'Chloe', 'West', 'cwest@email.com', '(713) 555-2323', '4111111111111111', 0),
(27, 'noahmiller', '456 Birch Ln, Baltimore, MD 21202', 'hashed_password_here', 'Noah', 'Miller', 'nmiller@email.com', '(410) 555-3434', '5555555555554444', 0),
(28, 'avagray1221', '123 Cedar Blvd, Phoenix, AZ 85001', 'hashed_password_here', 'Ava', 'Gray', 'agray@email.com', '(602) 555-4545', '378282246310005', 0),
(29, 'HarleyMan66', '789 Spruce Ave, San Antonio, TX 78205', 'hashed_password_here', 'Liam', 'Wilson', 'lwilson@email.com', '(210) 555-5656', '6011111111111117', 0),
(30, 'tommyTutone', '456 Pine Dr, Jacksonville, FL 32202', 'hashed_password_here', 'Thomas', 'Grey', 'obrown@email.com', '(904) 555-6767', '3530111333300000', 0),
(31, 'MelodyMaker', '123 Oak St, Austin, TX 78701', 'hashed_password_here', 'Melody', 'Garcia', 'mgarcia@email.com', '(512) 555-7878', '4111111111111111', 0),
(32, 'BookwormBob', '789 Elm Ave, Denver, CO 80202', 'hashed_password_here', 'Robert', 'Nguyen', 'enguyen@email.com', '(303) 555-8989', '5555555555554444', 0),
(33, 'TechSavvySarah', '456 Birch Dr, Atlanta, GA 30303', 'hashed_password_here', 'Sarah', 'Taylor', 'wtaylor@email.com', '(404) 555-0101', '378282246310005', 0),
(34, 'GuitarGuy', '123 Cedar St, Philadelphia, PA 19102', 'hashed_password_here', 'Ethan', 'Brown', 'obrown@email.com', '(215) 555-1212', '6011111111111117', 0),
(35, 'SportsFanatic', '789 Spruce Ave, San Diego, CA 92101', 'hashed_password_here', 'Olivia', 'Harris', 'lharris@email.com', '(619) 555-2323', '3530111333300000', 0),
(43, 'test', '123 Fake St', '$2y$10$J5vN4dfzQyiXdSRpllV.0.WtcvyaJKvTqsXkZD7BMcGEjgrMdb8Oa', 'test', 'test', '1@2.com', NULL, '12365498765431', 0),
(44, 'admin', '123 Fake Street', '$2y$10$hB8G2b.9eAc17/N.bXY1Weeu4l3MGJwlGdAVXG1TaN/F0a3cXTMq2', 'admin', 'user', 'admin@uBid.com', NULL, '321654987654312', 1),
(45, 'test2', '123 Fake St', '$2y$10$ry.XeiUC/GRdbFyadSEN0eLi34COgrVQnOIOS9lEnl/ErjXgf1Yw.', 'test2', 'test2', 'test@test.com', NULL, '987654987654', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_item`
--
ALTER TABLE `auction_item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `sellerProfile` (`sellerProfile`),
  ADD KEY `buyerProfile` (`buyerProfile`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bidID`),
  ADD KEY `profileID` (`profileID`),
  ADD KEY `itemID` (`itemID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `parentID` (`parentID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profileID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction_item`
--
ALTER TABLE `auction_item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bidID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction_item`
--
ALTER TABLE `auction_item`
  ADD CONSTRAINT `auction_item_ibfk_1` FOREIGN KEY (`sellerProfile`) REFERENCES `user_profile` (`profileID`),
  ADD CONSTRAINT `auction_item_ibfk_2` FOREIGN KEY (`buyerProfile`) REFERENCES `user_profile` (`profileID`),
  ADD CONSTRAINT `auction_item_ibfk_3` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`profileID`) REFERENCES `user_profile` (`profileID`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `auction_item` (`itemID`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `category` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
