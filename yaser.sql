-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 09:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yaser`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_image`) VALUES
(7, 'ituns', '1151itunes.jpg'),
(8, 'google play', '1266GooglePlayHomeScreen.gif'),
(9, 'razer\r\n', '1902raizer.png'),
(14, 'pubg', '1926pug.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `codes_id` int(11) NOT NULL,
  `codes_name` varchar(255) NOT NULL,
  `codes_active` tinyint(4) NOT NULL DEFAULT '1',
  `codes_items` int(11) NOT NULL,
  `codes_users` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`codes_id`, `codes_name`, `codes_active`, `codes_items`, `codes_users`) VALUES
(21, 'vhjvhvnmvvvvvvvvvvvvv', 0, 4, 18),
(22, 'uuuuuuuuuuuuuuuuuuuuuuuuu', 0, 4, 18),
(23, 'tttttttttttttt', 1, 4, 0),
(24, 'uuuuuuuuuuuuuuuuuuuu', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_discount`, `coupon_status`) VALUES
(1, '123456', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `items_name` varchar(255) NOT NULL,
  `items_price` float NOT NULL,
  `items_desc` varchar(255) NOT NULL,
  `items_image` varchar(255) NOT NULL,
  `items_imagetwo` varchar(255) NOT NULL,
  `items_cat` int(11) NOT NULL,
  `items_point` int(11) NOT NULL,
  `items_discount` int(11) NOT NULL DEFAULT '0',
  `items_price_em` int(11) NOT NULL,
  `items_price_sa` int(11) NOT NULL,
  `items_price_ir` int(11) NOT NULL,
  `items_offres` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `items_name`, `items_price`, `items_desc`, `items_image`, `items_imagetwo`, `items_cat`, `items_point`, `items_discount`, `items_price_em`, `items_price_sa`, `items_price_ir`, `items_offres`) VALUES
(4, '10 دولار امريكي', 10, 'أحصل على بطاقات آيتونز امريكي واستمتع بالتطبيقات والألعاب والموسيقى والأفلام والبرامج التلفزيونية والمزيد من ذلك', '1153ItunesProductDisplay10$.png', '1328ItunesFinalProductPrice10$.png', 7, 25, 10, 100, 110, 1000, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `itemsview`
-- (See below for the actual view)
--
CREATE TABLE `itemsview` (
`items_id` int(11)
,`items_name` varchar(255)
,`items_price` float
,`items_desc` varchar(255)
,`items_image` varchar(255)
,`items_imagetwo` varchar(255)
,`items_cat` int(11)
,`items_point` int(11)
,`items_discount` int(11)
,`items_price_em` int(11)
,`items_price_sa` int(11)
,`items_price_ir` int(11)
,`items_offres` tinyint(4)
,`subcategories_id` int(11)
,`subcategories_name` varchar(255)
,`subcategories_image` varchar(255)
,`subcategories_cat` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `myordersview`
-- (See below for the actual view)
--
CREATE TABLE `myordersview` (
`codes_name` varchar(255)
,`items_name` varchar(255)
,`subcategories_name` varchar(255)
,`categories_name` varchar(255)
,`users_name` varchar(255)
,`users_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_users` int(11) NOT NULL,
  `orders_price` float NOT NULL,
  `orders_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_users`, `orders_price`, `orders_date`) VALUES
(50, 18, 18, '2021-01-12 21:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `orderscode`
--

CREATE TABLE `orderscode` (
  `orderscode_id` int(11) NOT NULL,
  `orderscode_code` varchar(255) NOT NULL,
  `orderscode_orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderscode`
--

INSERT INTO `orderscode` (`orderscode_id`, `orderscode_code`, `orderscode_orders`) VALUES
(0, 'vhjvhvnmvvvvvvvvvvvvv', 50),
(0, 'uuuuuuuuuuuuuuuuuuuuuuuuu', 50);

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `ordersdetails` int(11) NOT NULL,
  `ordersdetails_items` int(11) NOT NULL,
  `ordersdetails_order` int(11) NOT NULL,
  `ordersdetails_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`ordersdetails`, `ordersdetails_items`, `ordersdetails_order`, `ordersdetails_quantity`) VALUES
(37, 4, 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategories_id` int(11) NOT NULL,
  `subcategories_name` varchar(255) NOT NULL,
  `subcategories_image` varchar(255) NOT NULL,
  `subcategories_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategories_id`, `subcategories_name`, `subcategories_image`, `subcategories_cat`) VALUES
(7, 'حساب امريكي', '1015iTunesUSA.png', 7),
(8, 'حساب امريكي', '18721-149.png', 14),
(9, 'حساب سعودي', '19631-149.png', 14),
(10, 'حساب اماراتي', '1252iTunesUAE.png', 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `subcategoriesview`
-- (See below for the actual view)
--
CREATE TABLE `subcategoriesview` (
`subcategories_id` int(11)
,`subcategories_name` varchar(255)
,`subcategories_image` varchar(255)
,`subcategories_cat` int(11)
,`categories_id` int(11)
,`categories_name` varchar(255)
,`categories_image` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_password`, `users_email`) VALUES
(18, 'wael', 'wael', 'waeleagle1243@gmail.com');

-- --------------------------------------------------------

--
-- Structure for view `itemsview`
--
DROP TABLE IF EXISTS `itemsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itemsview`  AS  select `items`.`items_id` AS `items_id`,`items`.`items_name` AS `items_name`,`items`.`items_price` AS `items_price`,`items`.`items_desc` AS `items_desc`,`items`.`items_image` AS `items_image`,`items`.`items_imagetwo` AS `items_imagetwo`,`items`.`items_cat` AS `items_cat`,`items`.`items_point` AS `items_point`,`items`.`items_discount` AS `items_discount`,`items`.`items_price_em` AS `items_price_em`,`items`.`items_price_sa` AS `items_price_sa`,`items`.`items_price_ir` AS `items_price_ir`,`items`.`items_offres` AS `items_offres`,`subcategories`.`subcategories_id` AS `subcategories_id`,`subcategories`.`subcategories_name` AS `subcategories_name`,`subcategories`.`subcategories_image` AS `subcategories_image`,`subcategories`.`subcategories_cat` AS `subcategories_cat` from (`items` join `subcategories` on((`subcategories`.`subcategories_id` = `items`.`items_cat`))) ;

-- --------------------------------------------------------

--
-- Structure for view `myordersview`
--
DROP TABLE IF EXISTS `myordersview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `myordersview`  AS  select `codes`.`codes_name` AS `codes_name`,`items`.`items_name` AS `items_name`,`subcategories`.`subcategories_name` AS `subcategories_name`,`categories`.`categories_name` AS `categories_name`,`users`.`users_name` AS `users_name`,`users`.`users_id` AS `users_id` from ((((`codes` join `items` on((`items`.`items_id` = `codes`.`codes_items`))) join `subcategories` on((`items`.`items_cat` = `subcategories`.`subcategories_id`))) join `categories` on((`subcategories`.`subcategories_cat` = `categories`.`categories_id`))) join `users` on((`users`.`users_id` = `codes`.`codes_users`))) ;

-- --------------------------------------------------------

--
-- Structure for view `subcategoriesview`
--
DROP TABLE IF EXISTS `subcategoriesview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subcategoriesview`  AS  select `subcategories`.`subcategories_id` AS `subcategories_id`,`subcategories`.`subcategories_name` AS `subcategories_name`,`subcategories`.`subcategories_image` AS `subcategories_image`,`subcategories`.`subcategories_cat` AS `subcategories_cat`,`categories`.`categories_id` AS `categories_id`,`categories`.`categories_name` AS `categories_name`,`categories`.`categories_image` AS `categories_image` from (`subcategories` join `categories` on((`categories`.`categories_id` = `subcategories`.`subcategories_cat`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`codes_id`),
  ADD UNIQUE KEY `codes_name` (`codes_name`),
  ADD KEY `code_items` (`codes_items`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`),
  ADD KEY `items_cat` (`items_cat`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `orders_users` (`orders_users`);

--
-- Indexes for table `orderscode`
--
ALTER TABLE `orderscode`
  ADD KEY `orderscode_orders` (`orderscode_orders`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`ordersdetails`),
  ADD KEY `ordersdetails_items` (`ordersdetails_items`),
  ADD KEY `ordersdetails_order` (`ordersdetails_order`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategories_id`),
  ADD KEY `subcategories_cat` (`subcategories_cat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `codes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `ordersdetails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`codes_items`) REFERENCES `items` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`items_cat`) REFERENCES `subcategories` (`subcategories_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orders_users`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderscode`
--
ALTER TABLE `orderscode`
  ADD CONSTRAINT `orderscode_ibfk_1` FOREIGN KEY (`orderscode_orders`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD CONSTRAINT `ordersdetails_ibfk_1` FOREIGN KEY (`ordersdetails_items`) REFERENCES `items` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordersdetails_ibfk_2` FOREIGN KEY (`ordersdetails_order`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`subcategories_cat`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
