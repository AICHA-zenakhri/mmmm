


--
-- Database name : `fooDz`
--

-- --------------------------------------------------------

--
-- Table structure for table `products` 
--(contains all dishes/drinks that restaurants add to their menus)
--

CREATE TABLE `products` (
  `dish_id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_name` varchar(255) NOT NULL,
  `dish_desc` varchar(255) DEFAULT NULL,
  `dish_price` decimal(10,2) NOT NULL,
  `dish_img` varchar(255) DEFAULT NULL,
  `dish_categ` varchar(255) NOT NULL,
  PRIMARY KEY (`dish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users `
-- (contains all information of the users ( name , email , ....) )

CREATE TABLE `users` (
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tlf_num` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `allergy` varchar(30) DEFAULT NULL,
  `profile_type` varchar(20) NOT NULL,
  `user_id` int(11) PRIMARY KEY AUTO_INCREMENT  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table ` restaurant`
-- (contains all information of the business ( restaurant , coffee_shop) )



CREATE Table `restaurant` 
(
`restaurant_id` int(11) PRIMARY KEY AUTO_INCREMENT,
`email` varchar(100) NOT NULL,
`store_name` varchar(40) NOT NULL,
`store_address` varchar(100) NOT NULL,
`phone_num` varchar(20) NOT NULL,
`business` varchar(30) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------
--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




