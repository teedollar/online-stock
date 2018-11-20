-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 08:31 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `image`) VALUES
(8, 'Fruits', 0x2e2e2f63617465676f72792f6672756974312e6a7067),
(9, 'Juice', 0x2e2e2f63617465676f72792f6a756963652e6a7067),
(10, 'Kitchen Utensils', 0x2e2e2f63617465676f72792f6b752e6a7067),
(11, 'Chocolate', 0x2e2e2f63617465676f72792f63686f2e6a7067),
(12, 'Branded food', 0x2e2e2f63617465676f72792f62662e6a7067),
(13, 'Soft-drinks', 0x2e2e2f63617465676f72792f73662e6a7067),
(14, 'Vegetables', 0x2e2e2f63617465676f72792f76312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `Message` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE IF NOT EXISTS `customer_registration` (
  `id` int(11) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Other_name` varchar(100) NOT NULL,
  `Email_address` varchar(100) NOT NULL,
  `Home_address` varchar(100) NOT NULL,
  `Phone_number` int(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`id`, `Surname`, `Other_name`, `Email_address`, `Home_address`, `Phone_number`, `password`, `confirm_password`) VALUES
(2, ' Okunoye Bashir', 'Tunde', 'email@gmail.com', 'Adeoyo area, Ibadan', 2147483647, 'okunoye', 'okunoye'),
(3, 'Badmus ', 'Basheerat Biodun ', 'basheeratbiodun@gmail.com', 'No. 9, Oke Irorun Boluwaji Area Ibadan ', 2147483647, 'basheerat', 'basheerat'),
(4, 'Obasa', 'Adenike Aderonke', 'adenike_aderonke@yahoo.com', 'No 4 Sokota Layout UI Ibadan', 2147483647, 'adenike', 'adenike'),
(5, ' Fakomiti', 'Oluwadamilola', 'fakomitidamilola@gmail.com', 'No 26, Ring Road Ibadan ', 2147483647, 'dami', 'dami'),
(6, ' Akwari', 'Jennifer Nkechi', 'Nkechi_jenny@yahoo.com', 'Queen Elizabeth Hall II, University of Ibadan', 2147483647, 'nkechi', 'nkechi'),
(7, ' Olawale', 'Mubarak', 'olawalemubarak19@gmail.com', '14, Alapinnin Street, Boluwaji Elere, Ibadan', 2147483647, 'mubarak56', 'mubarak56'),
(8, ' oye', 'soji', 'phemmysoj@gmail.com', '12,morebise street.', 2147483647, 'greatness', 'greatness'),
(9, 'Owolabi', 'Adebolu ', 'owolabi_adebola@gmail.com', 'B9, Queen Elizabeth II, University of Ibadan ', 2147483647, 'owolabi', 'owolabi'),
(10, 'Akwari', 'Jennifer Nkechi', 'Nkechi_jenny@yahoo.com', 'E15, Queen Elizabeth Hall II University of Ibadan   ', 908752222, 'jen', 'jen'),
(12, 'BADMUS', 'MARIAM OYINDUNMOLA', 'mariam_olawumi@yahoo.com', 'No. 9, Oke Irorun Boluwaji Area Ibadan', 2147483647, 'oyin', 'oyin'),
(13, ' Omitola', 'Oladeji', 'devuja@gnail.com', 'Independence hall ', 2147483647, 'deji', 'deji'),
(14, ' Olufowobi', 'Mariam Motunrayo', 'matol@gmail.com', 'Agbowo Ibadan ', 2147483647, 'matol', 'matol'),
(15, 'Badmus', 'Olanrewaji Hassan ', 'larry@gmail.com', 'Apata, Ibadan ', 90, 'hassan', 'hassan'),
(16, ' Badmus ', 'Adam Opeyemi', 'adamopeyemi2001@yahoo.com', 'Apata, Ibadan ', 2147483647, 'adam', 'adam'),
(17, ' Wahab', 'Aremu', 'wahabaremu@gmail.com', 'bggafdfggg', 90867778, 'aremu', 'aremu'),
(18, ' jkgjdgshjf dfjhgg ', 'ghghjg hghgh ', 'hghghghgh@gmail.com ', 'hhvhvhvhvh ', 2147483647, '12345678', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `User_Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_page`
--

CREATE TABLE IF NOT EXISTS `order_page` (
  `S/N` int(2) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `Quantities` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `process` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `dates` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_page`
--

INSERT INTO `order_page` (`S/N`, `product_id`, `Quantities`, `user_id`, `amount`, `unit_price`, `process`, `day`, `month`, `year`, `dates`) VALUES
(1, '25', 222, 3, 44400.00, 200.00, 1, '17', 'Dec', '2017', '17-12-2017'),
(2, '25', 278, 3, 55600.00, 200.00, 1, '17', 'Dec', '2017', '17-12-2017'),
(3, '6', 5, 3, 7500.00, 1500.00, 1, '18', 'Dec', '2017', '18-12-2017'),
(4, '75', 50, 17, 5000.00, 100.00, 1, '18', 'Dec', '2017', '18-12-2017');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `Product_name` varchar(150) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `new_price` double(7,2) NOT NULL,
  `quantity` int(25) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Product_name`, `cat_id`, `new_price`, `quantity`, `image`) VALUES
(1, 'Milo', 7, 1500.00, 300, 0x2e2e2f696d6167652f50726f312e6a7067),
(2, 'Bournvita', 7, 1900.00, 400, 0x2e2e2f696d6167652f50726f322e6a7067),
(5, 'Apple', 8, 70.00, 5900, 0x2e2e2f696d6167652f6672756974352e6a7067),
(6, 'Water-Melon', 8, 1500.00, 6000, 0x2e2e2f696d6167652f6672756974342e6a7067),
(7, 'Pine-Apple', 8, 150.00, 2000, 0x2e2e2f696d6167652f6672756974362e6a7067),
(8, 'Grape', 8, 250.00, 2000, 0x2e2e2f696d6167652f6672756974372e6a7067),
(9, 'Mango', 8, 100.00, 1000, 0x2e2e2f696d6167652f6672756974382e6a7067),
(11, 'Plantain', 8, 200.00, 2000, 0x2e2e2f696d6167652f6672756974392e6a7067),
(12, 'Date Fruit', 8, 50.00, 1000, 0x2e2e2f696d6167652f667275697431322e6a7067),
(13, 'Paw-paw', 8, 150.00, 500, 0x2e2e2f696d6167652f667275697431332e6a7067),
(14, 'Papaya', 8, 400.00, 150, 0x2e2e2f696d6167652f667275697431362e6a7067),
(15, 'Tangerine', 8, 50.00, 600, 0x2e2e2f696d6167652f667275697431352e6a7067),
(18, 'Pear', 8, 300.00, 600, 0x2e2e2f696d6167652f667275697431342e6a7067),
(19, 'Lemon', 8, 150.00, 300, 0x2e2e2f696d6167652f667275697431312e6a7067),
(20, 'Coconut', 8, 180.00, 700, 0x2e2e2f696d6167652f667275697431382e6a7067),
(21, 'Guava', 8, 80.00, 150, 0x2e2e2f696d6167652f667275697432302e6a7067),
(22, 'Olive fruit', 8, 500.00, 700, 0x2e2e2f696d6167652f667275697431392e6a7067),
(23, '5 alive ', 9, 350.00, 2000, 0x2e2e2f696d6167652f6a75696365322e6a7067),
(24, '5 alive can', 9, 150.00, 1499, 0x2e2e2f696d6167652f6a75696365342e6a7067),
(25, '5 alive plastic', 9, 200.00, 1000, 0x2e2e2f696d6167652f6a75696365332e6a7067),
(26, 'Happy Hour', 9, 150.00, 2500, 0x2e2e2f696d6167652f6a75696365352e6a7067),
(27, 'Exotic juice', 9, 250.00, 600, 0x2e2e2f696d6167652f6a75696365362e6a7067),
(28, 'Nutrimilk', 9, 150.00, 1000, 0x2e2e2f696d6167652f6a75696365372e6a7067),
(29, 'Cocktail juice', 9, 200.00, 500, 0x2e2e2f696d6167652f6a75696365382e6a7067),
(30, 'Langer juice', 9, 1000.00, 498, 0x2e2e2f696d6167652f6a7569636531312e6a7067),
(31, 'BB star', 9, 70.00, 2000, 0x2e2e2f696d6167652f6a7569636531332e6a7067),
(32, 'Carrot juice', 9, 100.00, 500, 0x2e2e2f696d6167652f6a7569636531322e706e67),
(33, 'Tomato juice', 9, 80.00, 500, 0x2e2e2f696d6167652f6a7569636531302e6a7067),
(34, 'Grape fruit juice', 9, 150.00, 500, 0x2e2e2f696d6167652f6a7569636531342e6a7067),
(35, 'Grater', 10, 550.00, 1000, 0x2e2e2f696d6167652f6b75312e6a7067),
(36, 'Kettle', 10, 1500.00, 500, 0x2e2e2f696d6167652f6b75332e6a7067),
(37, 'Knive', 10, 500.00, 500, 0x2e2e2f696d6167652f6b75322e6a7067),
(38, 'Table spoon', 10, 1500.00, 500, 0x2e2e2f696d6167652f6b75362e6a7067),
(39, 'Serving tray', 10, 1000.00, 499, 0x2e2e2f696d6167652f6b75372e6a7067),
(40, 'Set of pots', 10, 5000.00, 500, 0x2e2e2f696d6167652f6b75382e6a7067),
(41, 'Frying pan ', 10, 1500.00, 200, 0x2e2e2f696d6167652f6b7531302e6a7067),
(42, 'Beef pot pie', 10, 2000.00, 200, 0x2e2e2f696d6167652f6b75392e6a7067),
(43, 'Coffee pot', 10, 2000.00, 100, 0x2e2e2f696d6167652f6b7531312e6a7067),
(44, 'Mars chocolate', 11, 250.00, 480, 0x2e2e2f696d6167652f63686f312e6a7067),
(45, 'Magnum chocolate', 11, 200.00, 500, 0x2e2e2f696d6167652f63686f322e6a7067),
(46, 'Galaxy', 11, 150.00, 300, 0x2e2e2f696d6167652f63686f372e6a7067),
(47, 'Toblerone', 11, 100.00, 450, 0x2e2e2f696d6167652f63686f332e6a7067),
(48, 'Kitkat chocolate', 11, 120.00, 100, 0x2e2e2f696d6167652f63686f342e6a7067),
(49, 'Dream cream choco', 11, 180.00, 245, 0x2e2e2f696d6167652f63686f362e6a7067),
(50, 'Rescue', 11, 170.00, 550, 0x2e2e2f696d6167652f63686f352e6a7067),
(51, 'Milka choco', 11, 190.00, 800, 0x2e2e2f696d6167652f63686f382e6a7067),
(52, 'Macadamia block', 11, 300.00, 700, 0x2e2e2f696d6167652f63686f392e6a7067),
(53, 'Cabury choco', 11, 120.00, 550, 0x2e2e2f696d6167652f63686f31302e6a7067),
(54, 'Indomietable Chicken', 12, 50.00, 5000, 0x2e2e2f696d6167652f6266312e6a7067),
(55, 'Indomietable Carton', 12, 1950.00, 499, 0x2e2e2f696d6167652f6266332e6a7067),
(56, 'Indomietable Onion', 12, 50.00, 5000, 0x2e2e2f696d6167652f6266322e6a7067),
(57, 'Oriental Indomie', 12, 2500.00, 500, 0x2e2e2f696d6167652f6266342e6a7067),
(58, 'Goldenpenny Noodles ', 12, 1200.00, 400, 0x2e2e2f696d6167652f6266372e6a7067),
(59, 'Honeywell Noodles', 12, 950.00, 300, 0x2e2e2f696d6167652f6266392e6a7067),
(60, 'Dangote spaghetti', 12, 200.00, 2000, 0x2e2e2f696d6167652f6266362e6a7067),
(61, 'Knoir Chicken', 12, 500.00, 1500, 0x2e2e2f696d6167652f626631322e6a7067),
(62, '|Honeywell wheat', 12, 450.00, 1500, 0x2e2e2f696d6167652f626631332e6a7067),
(63, 'Goldenmore', 12, 500.00, 1500, 0x2e2e2f696d6167652f626631312e6a7067),
(64, 'Dangote sugar', 12, 200.00, 2000, 0x2e2e2f696d6167652f626631302e6a7067),
(65, 'Coke (Can)', 13, 150.00, 5000, 0x2e2e2f696d6167652f7366312e6a7067),
(66, 'Pepsi (bottle)', 13, 110.00, 1500, 0x2e2e2f696d6167652f7366322e6a7067),
(67, 'Sprite (Can)', 13, 150.00, 1500, 0x2e2e2f696d6167652f7366332e6a7067),
(68, 'Mountain-dew (bottle)', 13, 100.00, 1000, 0x2e2e2f696d6167652f7366342e6a7067),
(69, 'Fanta (can)', 13, 150.00, 500, 0x2e2e2f696d6167652f7366352e6a7067),
(70, 'Pepsi (can)', 13, 150.00, 1966, 0x2e2e2f696d6167652f7366362e6a7067),
(71, '7up (can)', 13, 100.00, 550, 0x2e2e2f696d6167652f7366372e6a7067),
(72, 'Lacasera', 13, 120.00, 1500, 0x2e2e2f696d6167652f7366382e6a7067),
(73, 'Orijin zero', 13, 150.00, 1200, 0x2e2e2f696d6167652f7366392e6a7067),
(74, 'Bitter lemon', 13, 150.00, 500, 0x2e2e2f696d6167652f736631302e6a7067),
(75, 'Carrots', 14, 100.00, 450, 0x2e2e2f696d6167652f76342e6a7067),
(76, 'Tomatoes', 14, 100.00, 900, 0x2e2e2f696d6167652f76322e6a7067),
(77, 'Cabbage', 14, 200.00, 50, 0x2e2e2f696d6167652f76352e6a7067),
(78, 'Corn', 14, 50.00, 190, 0x2e2e2f696d6167652f76332e6a7067),
(79, 'Bell pepper', 14, 40.00, 200, 0x2e2e2f696d6167652f76362e6a7067),
(80, 'Greenbean', 14, 50.00, 400, 0x2e2e2f696d6167652f7631312e6a7067),
(81, 'Cucumber', 14, 200.00, 300, 0x2e2e2f696d6167652f7631322e6a7067),
(82, 'Sweet potatoes', 14, 100.00, 500, 0x2e2e2f696d6167652f76392e6a7067),
(83, 'Broccoli', 14, 250.00, 100, 0x2e2e2f696d6167652f7631302e6a7067),
(84, 'Egg plant', 14, 300.00, 350, 0x2e2e2f696d6167652f76372e6a7067),
(85, 'Pea', 14, 200.00, 400, 0x2e2e2f696d6167652f76382e6a7067),
(86, 'Orange', 8, 50.00, 1000, 0x2e2e2f696d6167652f6672756974332e6a7067),
(87, 'Cherry', 8, 150.00, 1000, 0x2e2e2f696d6167652f667275697431302e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `othername` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` varchar(22) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `surname`, `othername`, `address`, `email`, `phone_num`, `qualification`, `password`) VALUES
(1, 'Badmus', 'Basheerat Biodun', 'No 9 Boluwaji', 'basheeratbiodun@gmail.com', '09043217654', 'B.SC', 'Badmus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_page`
--
ALTER TABLE `order_page`
  ADD PRIMARY KEY (`S/N`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `order_page`
--
ALTER TABLE `order_page`
  MODIFY `S/N` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
