-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 08:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saqecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updationDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `password`, `creation_date`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-04-11 23:21:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(9, 'Electronics', 'Electronic Products are related to the electronics goods like chargers, extension boards, table lamp,s etc.', '2021-05-02 07:24:22', NULL),
(10, 'First Aid', 'A first Aid box is also necessary in any case of emergency.', '2021-05-02 07:24:52', NULL),
(11, 'Personal Goods', 'Personal Goods are related to the person like a mirror, cattle, container, wall watches, masks, sanitizer, comb, etc.', '2021-05-02 07:25:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(9, 1, '28', 1, '2021-05-01 13:43:29', 'Debit / Credit card', NULL),
(10, 1, '27', 3, '2021-05-01 13:47:21', 'Internet Banking', 'Delivered'),
(11, 1, '27', 1, '2021-05-01 13:48:01', 'COD', 'in Process'),
(12, 2, '35', 1, '2021-05-02 06:41:49', 'Debit / Credit card', 'in Process'),
(13, 2, '27', 1, '2021-05-02 06:44:31', 'COD', NULL),
(14, 2, '27', 1, '2021-05-02 07:34:58', 'Internet Banking', NULL),
(15, 2, '28', 1, '2021-05-02 07:40:33', 'COD', NULL),
(16, 2, '35', 1, '2021-05-05 08:36:32', 'Internet Banking', 'in Process');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(5, 10, 'in Process', 'pending', '2021-05-02 05:49:57'),
(6, 10, 'Delivered', 'delivered', '2021-05-02 05:50:12'),
(7, 11, 'in Process', 'in process', '2021-05-02 06:39:19'),
(8, 12, 'in Process', 'Processing..', '2021-05-02 06:43:15'),
(9, 16, 'in Process', 'in process', '2021-05-05 08:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `sale_status` varchar(50) DEFAULT NULL,
  `updationDate` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productCompany`, `productPrice`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `category`, `subCategory`, `userId`, `productAvailability`, `postingDate`, `sale_status`, `updationDate`, `status`) VALUES
(27, 'Adaptive Fast Charging Wall Charger with 5-Feet/1.5 Meter Micro USB Cable Kit Set Compatible with Samsung', 'Adaptive-', 10, '                                                                                                                                                                                                                             CHARGE& SYNC: Fast Charger Kit charges Samsung phones and tablets with Micro USB ports at max speed. Offers SuperSpeed transfer of 480 Mbps designed for charging and syncing smartphones, tablets and other Micro-USB connector devices.\r\nCOMPATIBLE DEVICES: Samsung Galaxy S7, S7 Edge, S6, S6 Edge, Note 5 and Galaxy TAB S, S2, E, Tab A 10.1 (2016), Tab 8.0 (2015), Tab A 7.0, Tab A 9.7, Galaxy A6, Galaxy J3, J7.\r\nDOES NOT COMPATIBLE WITH: Samsung Galaxy S4, S8, S9, S10, S20, Note8, Note9, Note10, A10e, A20, and A50, Tab S3, Tab S4, Tab S5e, and Tab S6.                                                                                                                                                                                                                                                                                                                                ', 'adaptive2.jpg', 'adaptive.jpg', 'adaptive4.jpg', 4, 2, 5, 'In Stock', '2021-03-15 15:57:05', '  This product has been sold out.                 ', NULL, 'active'),
(28, 'Portable Charger Power Bank 2 USB Ports Quick Charging Portable Phone Charger for iPhone Samsung Android Tablet', 'HHETP', 20, '?Universal Compatibility?Suitable for all phones, tablets. (Note: The package comes with a micro USB cable used to charge the power bank and some Android phones. If your phone requires a Lighting cable and a Type C cable, please use your phone cable.)\r\n?Dual USB Ports & Quick Recharge?Dual outputs to charge your two devices at the same time. Fully recharges itself in 8~12 hours with 2.1A charger; and about 12~24 hours with 1A wall charger. LED colorful lights accurately track remaining battery power (Red light ON:0-25%; Green light ON:25%-50%; Blue light ON:50-75%; White light ON:75-100%).\r\n?External Battery Pack with Protection System? We use a high quality A + polymer lithium battery to extend the life of our products. Built-in security devices protect your devices from excessive power, overheating and overcharging.', 'powerbank1.jpg', 'powerbank2.jpg', 'powerbank3.jpg', 4, 3, 5, 'In Stock', '2021-03-16 16:25:58', NULL, NULL, 'active'),
(29, 'First Aid Kit Hard Case, Red, 326 Piece Set', 'Be Smart Get Prepared', 200, 'Made by the number one leading manufacturer of first Aid kits in the USA. 326 pieces of comprehensive first aid treatment products. manufactured from the highest of quality facility exceeding safety standards for emergency first aid, for adults and kids.\r\nMeets or exceeds OSHA and ANSI 2009 guidelines for 100 people. Ideal for most businesses and perfect for family Use at home.\r\nFully organized interior compartments provides quick access. Rugged, sturdy, high density plastic case is impact resistant.\r\nTwo separate layers of first Aid for large and small first aid Products and tilting shelves designed for easy access and refill.\r\nWall mounts or folds compactly for storage. Case dimensions: 13\" X 12\" X 4\". Easy slide latches securely locks into place. Includes a refill order form.', 'firstaid1.jpg', 'firstaid2.jpg', 'firstaid3.jpg', 7, 15, 6, 'In Stock', '2021-03-17 16:38:27', NULL, NULL, 'active'),
(34, 'test product', 'test company', 45, 'price description', 'Chrysanthemum.jpg', 'Tulips.jpg', 'Penguins.jpg', 4, 2, 0, 'In Stock', '2021-04-29 11:01:48', NULL, NULL, 'active'),
(35, 'iPhone charger', 'Apple', 25, 'iPhone charger', 'apple charger.jpg', 'apple charger.jpg', 'apple charger.jpg', 4, 2, 0, 'In Stock', '2021-05-02 06:38:17', NULL, NULL, 'active'),
(36, 'iPhone charger', 'Apple', 25, 'iPhone charger', 'apple charger.jpg', 'apple charger.jpg', 'apple charger.jpg', 9, 21, 0, 'In Stock', '2021-05-02 07:29:53', NULL, NULL, 'active'),
(37, 'First Aid Box', 'XEON', 200, 'First Aid Box', 'firstaid1.jpg', 'firstaid2.jpg', 'firstaid3.jpg', 10, 22, 0, 'In Stock', '2021-05-02 09:19:37', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Chargers', '2017-01-26 11:24:52', '31-03-2021 01:42:54 PM'),
(3, 4, 'Power Bank', '2017-01-26 11:29:09', '31-03-2021 01:43:09 PM'),
(6, 4, 'Laptops', '2017-02-03 23:13:00', '31-03-2021 01:50:09 PM'),
(7, 4, 'Computers', '2017-02-03 23:13:27', '31-03-2021 01:50:17 PM'),
(15, 7, 'First Aid Box', '2021-04-11 17:39:16', '31-02-2021 01:46:48 PM'),
(20, 5, 'Sleeping Bag', '2021-01-31 13:49:57', NULL),
(21, 9, 'Chargers', '2021-05-02 07:27:36', NULL),
(22, 10, 'First Aid Box', '2021-05-02 09:17:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(50) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_type`, `reg_date`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`) VALUES
(1, 'Test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com', '1235545544', 'user', '2021-04-27 01:38:07', 'Test', 'Test', 'test', 1234, 'test', 'test', 'test', 1234),
(2, 'Saqlain Mahin', 'ca273b274207fd230c73c7016364da78', 'saqlainmahin72@gmail.com', '9175448093', 'user', '2021-05-02 02:34:12', '1710 W 4TH ST, APT D6\r\nAPT D6', 'NY', 'brooklyn', 11223, '1710 W 4TH ST, APT D6\r\nAPT D6', 'NY', 'brooklyn', 11223);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(50) NOT NULL,
  `userId` int(50) DEFAULT NULL,
  `productId` int(50) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(4, 2, 28, '2021-05-02 07:26:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
