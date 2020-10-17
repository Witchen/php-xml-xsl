-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 08:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laxada`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `stars` int(11) NOT NULL,
  `picurl` varchar(255) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `seller_id`, `category`, `title`, `price`, `brand`, `stars`, `picurl`, `detail`) VALUES
(1, 1, 'mobiles-tablets', 'Samsung Galaxy A71 (8GB RAM + 128GB ROM) Smartphone 1 Year Samsung Warranty Free Shipping', 1599, 'Samsung', 5, 'https://stg-images.samsung.com/is/image/samsung/my-galaxy-a51-a515-sm-a515fzbhxme-front-thumb-226627598', '6.7\" FHD+ sAMOLED Plus Infinity-U Display\r\n2.2GHz,1.8GHz\r\nOcta-Core\r\n8GB RAM, 128GB ROM\r\nExpendable up to 512GB\r\nRear Camera : 64.0 MP (F1.8) + 12.0 MP (F2.2) + 5.0 MP (F2.2) +5.0 MP (F2.4)\r\nFront Camera : 32MP (F2.2)\r\n4,500 mAH Battery (25W Fast Charging)\r\nWiFi + LTE\r\nBluetooth v5.0 + NFC\r\nDual Sim + MicroSD\r\nAccelerometer, Fingerprint Sensor, Gyro Sensor, Geomagnetic Sensor, Hall Sensor, RGB Light Sensor, Proximity Sensor'),
(2, 1, 'mobiles-tablets', 'iPhone 11 Pro Max 64GB / 256GB / 512GB', 5299, 'Apple', 5, 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-11-pro-max-silver-select-2019?wid=834&hei=1000&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1566953858420', 'Super Retina XDR OLED display2\r\nWater and dust resistant (4 metres for up to 30 minutes, IP68)3\r\nTriple-camera system with 12MP Ultra Wide, Wide and Telephoto cameras\r\n12MP TrueDepth front camera with Portrait Mode, 4K video and slow-motion video\r\nFace ID for secure authentication and Apple Pay\r\nA13 Bionic chip with third-generation Neural Engine'),
(3, 1, 'mobiles-tablets', 'ASUS ROG PHONE 3 Strix Edition - Gaming Smartphone (ZS661KS) 8GB+256GB - Official ASUS MALAYSIA', 2999, 'ASUS', 3, 'https://www.asus.com/media/global/products/21csrbgrtysfwbyq/P_setting_fff_1_90_end_600.png', 'The ROG Phone 3 Strix Edition uses the flagship Qualcomm® Snapdragon™ 865 Mobile Platform with advanced 5G1 mobile communications capabilities. Built for dedicated gamers, it has an amazing new 144 Hz / 1 ms display that leaves the competition standing. Alongside slick features like AirTrigger 3, you’ll find a monster 6000 mAh battery2, a unique side-charging design, dual front-facing stereo speakers, and a full range of modular accessories. ROG Phone 3 Strix Edition is everything you’ve always wanted for mobile gaming!'),
(4, 1, 'phone-cases', 'iPhone 11 Pro Max / 11 Pro / 11 / XS Max/ XR / XS / X Honeycomb Skid Resistance Carbon Fiber Matte Soft TPU Phone Case', 10, 'China OEM', 3, 'https://images-na.ssl-images-amazon.com/images/I/717-rbzZg3L._AC_SL1500_.jpg', ''),
(5, 1, 'phone-cases', 'WindCase for Samsung Galaxy A70S A70 A50S A50 A30S A20S A20E A30 A20 A10S A10 A7 A9 2018 Liquid Quicksand Glitter Bling Slim Clear Soft TPU Case Cover', 9, 'WindCase', 3, 'https://my-live.slatic.net/p/7243a54b7a15727e0dba366e2c7212ad.jpg', ''),
(6, 1, 'phone-cases', 'Transparent / Transparent Black Case for iPhone 5 , 6 , 6 plus , 7 , 8 plus , XR , XS , XS MAX , 11 , 11pro , 11 pro Max Soft Tpu Slim Thin Cases Cover Silicone Back Clear Casing', 6, 'No Brand', 3, 'https://stg-images.samsung.com/is/image/samsung/my-galaxy-a51-a515-sm-a515fzbhxme-front-thumb-226627598https://cf.shopee.com.my/file/74efc6b4f29596aeb06974affc337bd1', ''),
(7, 1, 'wall-chargers', 'Samsung Galaxy M51', 1599, 'Samsung', 3, 'https://stg-images.samsung.com/is/image/samsung/my-galaxy-a51-a515-sm-a515fzbhxme-front-thumb-226627598', '6.7\" FHD+ sAMOLED Plus Infinity-U Display\r\n2.2GHz,1.8GHz\r\nOcta-Core\r\n8GB RAM, 128GB ROM\r\nExpendable up to 512GB\r\nRear Camera : 64.0 MP (F1.8) + 12.0 MP (F2.2) + 5.0 MP (F2.2) +5.0 MP (F2.4)\r\nFront Camera : 32MP (F2.2)\r\n4,500 mAH Battery (25W Fast Charging)\r\nWiFi + LTE\r\nBluetooth v5.0 + NFC\r\nDual Sim + MicroSD\r\nAccelerometer, Fingerprint Sensor, Gyro Sensor, Geomagnetic Sensor, Hall Sensor, RGB Light Sensor, Proximity Sensor'),
(8, 1, 'wall-chargers', 'Samsung Galaxy M51', 1599, 'Samsung', 3, 'https://stg-images.samsung.com/is/image/samsung/my-galaxy-a51-a515-sm-a515fzbhxme-front-thumb-226627598', '6.7\" FHD+ sAMOLED Plus Infinity-U Display\r\n2.2GHz,1.8GHz\r\nOcta-Core\r\n8GB RAM, 128GB ROM\r\nExpendable up to 512GB\r\nRear Camera : 64.0 MP (F1.8) + 12.0 MP (F2.2) + 5.0 MP (F2.2) +5.0 MP (F2.4)\r\nFront Camera : 32MP (F2.2)\r\n4,500 mAH Battery (25W Fast Charging)\r\nWiFi + LTE\r\nBluetooth v5.0 + NFC\r\nDual Sim + MicroSD\r\nAccelerometer, Fingerprint Sensor, Gyro Sensor, Geomagnetic Sensor, Hall Sensor, RGB Light Sensor, Proximity Sensor'),
(9, 1, 'power-banks', 'Samsung Galaxy M51', 1599, 'Samsung', 3, 'https://stg-images.samsung.com/is/image/samsung/my-galaxy-a51-a515-sm-a515fzbhxme-front-thumb-226627598', '6.7\" FHD+ sAMOLED Plus Infinity-U Display\r\n2.2GHz,1.8GHz\r\nOcta-Core\r\n8GB RAM, 128GB ROM\r\nExpendable up to 512GB\r\nRear Camera : 64.0 MP (F1.8) + 12.0 MP (F2.2) + 5.0 MP (F2.2) +5.0 MP (F2.4)\r\nFront Camera : 32MP (F2.2)\r\n4,500 mAH Battery (25W Fast Charging)\r\nWiFi + LTE\r\nBluetooth v5.0 + NFC\r\nDual Sim + MicroSD\r\nAccelerometer, Fingerprint Sensor, Gyro Sensor, Geomagnetic Sensor, Hall Sensor, RGB Light Sensor, Proximity Sensor');

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `userid`, `name`, `rating`, `location`, `email`) VALUES
(1, 1, 'PC Master SDN BHD', 89, 'WP Kuala Lumpur', 'pcmaster@gmail.com'),
(2, 2, 'Hardware', 70, 'Johor', 'myhardware@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile_number` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varbinary(512) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `mobile_number`, `email`, `address`, `password`, `role`) VALUES
(10, 'Ariyadhana', 'ari123', 12345678, 'ariyadhana.sunardi38@gmail.com', 'endah promenade', 0x3432393766343462313339353532333532343562323439373339396437613933, 'seller'),
(11, 'Witchen', 'test123', 123123123, 'kevin@gmail.com', 'endah promenade', 0x3432393766343462313339353532333532343562323439373339396437613933, 'buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_FK` (`seller_id`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `seller_FK` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
