-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 09:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercetest`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Star Foods'),
(2, 'Raj Kachuri'),
(3, 'Green Garden'),
(4, 'Kitchen'),
(5, 'Chillox'),
(6, 'Radhuni');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(3, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Snacks'),
(2, 'Dessert'),
(3, 'Dinner'),
(4, 'Packages'),
(5, 'Sweets'),
(6, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `Customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `Customer_address`, `customer_image`) VALUES
(4, '::1', 'Abid Mofazzel', 'souleater00100@gmail.com', '12345678', 'Bangladesh', 'Khulna', '01685456625', 'qwertyu zxcvbnm,.', 'IMAG0891-01.jpeg'),
(5, '::1', 'Hossain Ismot Ara', 'moyna.ismotara@gmail.com', '1234567', 'Bangladesh', 'Bagerhat', '019326896', 'asdfsdaf xcbxcvb', 'received_1056918184696459-01.jpeg'),
(6, '::1', 'Asdf', 'abc@bcd.com', '123456789', 'Bangladesh', 'Khulna', '1234', 'adsfasdfsdfafd', 'IMAG0117-02.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(7, 1, 1, 'Big Chicken Burger', 150, '<p>Spice Big Chicken Burger with a blast of taste.</p>', 'Big Chicken Burger.jpg', 'SF CB1'),
(8, 1, 5, '2 Layer Beef Burger', 260, '<p>2 Layer Beef Burger. BBQ beef peti.</p>', '2 Layer Beef Burger.jpg', 'C BB1'),
(9, 2, 3, 'Berry Pastry', 70, '<p>A taste blast from misture of a variety of berries.</p>', 'Berry Pastry.jpg', 'GFC P1'),
(10, 6, 3, 'Black Hot Coffee', 50, '<p>Original Black Coffee.</p>', 'Black Hot Coffee.jpg', 'GFC C1'),
(11, 1, 1, 'Chicken Cheese Pizza', 480, '<p>8 inch Chicken Chesse Pizza</p>', 'Chicken Cheese Pizza.png', 'SF P1'),
(12, 3, 2, 'Chicken Khichuri', 180, '<p>Khichuri with pickled juicy chicken.</p>', 'Chicken Khichuri.jpg', 'RK K1'),
(13, 6, 5, 'Chocolate Cold Coffee', 120, '<p>Cold Coffee with original chocolate</p>', 'Chocolate Cold Coffee.jpg', 'Ch C1'),
(14, 2, 1, 'Cinnamon Sugar Puff Pastry Squares', 80, '<p>Sweet Dessert. Healthy and delicious.</p>', 'Cinnamon Sugar Puff Pastry Squares1.jpg', 'SF DE1'),
(15, 2, 3, 'Egg Pastry', 60, '<p>Sweet and sour dessert. Healthy and tasty.</p>', 'Egg Pastry.jpg', 'GFC DE1'),
(16, 2, 5, 'Egg Toast', 70, '<p>Spicy Dessert. Healthy and tasty.</p>', 'Egg Toast.jpg', 'Ch DE1'),
(17, 5, 6, 'Festival Special Sweets', 110, '<p>The best sweets for festivals</p>', 'Festival Special Sweets.jpg', 'Ra SW1'),
(18, 3, 4, 'Hyderabadi Chicken Dum Biryani', 280, '<p>The original Hyderabadi Chicken Dum Biryani.</p>', 'Hyderabadi Chicken Dum Biryani.jpg', 'Ki B1'),
(19, 5, 6, 'Laddu', 25, '<p>The deshi cultural laddu.</p>', 'Laddu.jpg', 'Ra SW2'),
(20, 1, 5, 'Mutton Pizza', 450, '<p>6 inch mutton pizza</p>', 'Mutton Pizza.jpg', 'Ch P1'),
(21, 3, 2, 'Mutton Teheri', 250, '<p>The cultural Mughol style Mutton Teheri</p>', 'Mutton Teheri.jpg', 'RK T1'),
(22, 2, 3, 'Pudding', 75, '<p>Egg and butter pudding.</p>', 'Pudding.jpg', 'GFC DE2'),
(23, 3, 4, 'Shahi Chicken Biriani', 220, '<p>Pickeled tasty Shahi Chicken Biriani.</p>', 'Shahi Chicken Biriani.jpg', 'Ki B2'),
(24, 5, 6, 'Sweet Patis', 35, '<p>Delecious sweet patis.</p>', 'Sweet Patis.jpg', 'Ra SW3'),
(25, 6, 3, 'Vanilla Cold Coffee.jpg', 180, '<p>Extra Vanilla Cold Coffee.</p>', 'Vanilla Cold Coffee.jpg', 'GFC C2'),
(26, 6, 5, 'Vanilla Hot Coffee', 80, '<p>Vanilla Hot coffee with deep layer chocolate.</p>', 'Vanilla Hot coffee.jpg', 'Ch C2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_brand` (`product_brand`),
  ADD KEY `product_cat` (`product_cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
