-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 01:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooDZ`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `orders_status` varchar(20) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `method`, `total_products`, `total_price`, `placed_on`, `orders_status`) VALUES
(2, 7, 'mb', '4', 1500, '2023-05-29', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `dish_id`, `item_quantity`) VALUES
(2, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 01:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooDz`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(50) NOT NULL,
  `dish_desc` varchar(50) NOT NULL,
  `dish_img` varchar(255) NOT NULL,
  `dish_price` int(10) NOT NULL,
  `dish_categ` varchar(30) DEFAULT NULL,
  `restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`dish_id`),
  ADD KEY `fk3_restaurant` (`restaurant`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk3_restaurant` FOREIGN KEY (`restaurant`) REFERENCES `restaurant` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `store_name` varchar(40) NOT NULL,
  `store_address` varchar(100) NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  `business` varchar(30) NOT NULL,
  `rest_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `email`, `store_name`, `store_address`, `phone_num`, `business`, `rest_img`) VALUES
(1, 'aicha@gmail.com', 'sdsd', 'dsds', '112', 'coffe_shop', 'uploads/64745c4f01ea78.73707293.png'),
(2, 'aichaaa@gmail.com', 'sds', 'dsd', '323', 'Restaurant', 'uploads/64745e04a7ebf1.40936097.png'),
(3, 'a@gmail.com', 'ds', 'sds', '222', 'Restaurant', 'uploads/64746194652e28.50488692.png'),
(4, 'ss@gmail.com', 'sds', 'sdsd', '323', 'Restaurant', 'uploads/647463e04258b6.91684953.png'),
(5, 'sdsdsd@gmail.com', 'sdsd', 'sds', '1234', 'Restaurant', 'uploads/647465e2eac0f2.25655485.png'),
(6, 'wewe@gmail.com', 'ererer', 'reerer', '2222', 'Coffee Shop', 'uploads/647466765a68a6.19087469.jpg'),
(7, 'aaaa@gmail.com', 'sds', 'ds', '111', 'coffe_shop', 'uploads/647467f86166f4.33087453.png'),
(8, 'diou@gmail.com', 'asas', 'asa', '1234', 'Restaurant', 'uploads/6475106ad7e341.54879024.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tlf_num` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `allergy` varchar(30) DEFAULT NULL,
  `profile_type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_full_name`, `email`, `pass`, `tlf_num`, `user_address`, `allergy`, `profile_type`, `user_id`) VALUES
('aicha', 'sar@gmail.com', '123', '133321', '12121', '', 'owner', 1),
('aicha', 'aicha@gmail.com', '333', '112', '1212', '', 'owner', 2),
('sdsd', 'aichaaa@gmail.com', '22', '323', 'dsds', NULL, 'owner', 3),
('aicha', 'a@gmail.com', 'dsd', '222', 'ssd', NULL, 'owner', 4),
('dsds', 'ss@gmail.com', '111', '323', 'sds', NULL, 'owner', 5),
('aicha', 'sdsdsd@gmail.com', 'wwew', '1234', 'sd', NULL, 'owner', 6),
('wew', 'wewe@gmail.com', '123', '23', '222', NULL, 'owner', 7),
('aaa', 'aaaa@gmail.com', '$2y$10$T9XHWO9e80v36PA6uq0Ki.ySxsVSM1HpCSNj3XIc9klOQzHC8Uwli', '111', 'ss', NULL, 'owner', 8),
('aicha', 'www@gmail.com', '$2y$10$/WLiFNHBqVkSpJO1dMYPDeSgD6MvYxEq/Yh1yMZzsnL262FPPEI0W', '3232', 'sdsdsdsd', 'Gluten-free', 'customer', 9),
('sdsd', 'dsds@gmail.com', '$2y$10$g/AUTAWT9pgXmYpceDznJewl6b1WiOdJ0r.Wvu.jU1QDlDiNhH/Ji', '32323', 'sdsdsd', 'Gluten-free', 'customer', 10),
('dwe', 'wewe@gmail.com', '$2y$10$fXI4JDoTIE5b5X5CrM/ikeBF5VDkV6nGRJg3TPhxPcGGuedi1iUku', '23232', 'sasas', NULL, 'owner', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `fk` (`order_id`),
  ADD KEY `fkdish` (`dish_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`dish_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkdish` FOREIGN KEY (`dish_id`) REFERENCES `products` (`dish_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`dish_id`) REFERENCES `products` (`dish_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
