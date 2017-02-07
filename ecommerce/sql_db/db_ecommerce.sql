-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 07:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Syed Ariful Islam Emon', 'admin', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(3, 'ACER'),
(4, 'CANON'),
(1, 'iPhones'),
(2, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Mobile Phones'),
(2, 'Desktop'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(7, 'Footwear'),
(8, 'Jewellery'),
(9, 'Clothing'),
(10, 'Home Decor &amp; Kitchen'),
(11, 'Beauty &amp; Healthcare'),
(12, 'Toys, Kids &amp; Babies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'Md. Masud Sikder', 'Pirojpur', 'Barisal', 'Bangladesh', '1200', '01234567890', 'masud@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(37, 1, 5, 'Lorem Ipsum is simplya', 2, 117760.00, 'uploads/3c8faf5e12.jpg', '2017-01-07 12:58:13', 2),
(38, 1, 6, 'Lorem Ipsum is simplyaa', 2, 200000.00, 'uploads/6935d6a4b1.png', '2017-01-07 12:58:46', 2),
(39, 1, 5, 'Lorem Ipsum is simplya', 1, 58880.00, 'uploads/3c8faf5e12.jpg', '2017-01-07 13:19:44', 0),
(40, 1, 6, 'Lorem Ipsum is simplyaa', 4, 400000.00, 'uploads/6935d6a4b1.png', '2017-01-07 13:20:32', 2),
(41, 1, 5, 'Lorem Ipsum is simplya', 1, 58880.00, 'uploads/3c8faf5e12.jpg', '2017-01-07 13:43:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(4, 'Lorem Ipsum is simply', 1, 1, '<p>Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply</p>', 80000.000, 'uploads/b828bf4f9d.png', 0),
(5, 'Lorem Ipsum is simplya', 2, 2, '<p>Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply</p>', 58880.000, 'uploads/3c8faf5e12.jpg', 0),
(6, 'Lorem Ipsum is simplyaa', 3, 3, '<p>Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply</p>', 100000.000, 'uploads/6935d6a4b1.png', 0),
(7, 'Lorem Ipsum is simplyaaas', 8, 4, '<p>Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simplyLorem Ipsum is simply&nbsp;Lorem Ipsum is simply&nbsp;Lorem Ipsum is simply</p>', 250000.000, 'uploads/5ca4061338.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(1, 1, 4, 'Lorem Ipsum is simply', 80000.00, 'uploads/b828bf4f9d.png'),
(2, 1, 5, 'Lorem Ipsum is simplya', 58880.00, 'uploads/3c8faf5e12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`),
  ADD UNIQUE KEY `brandName` (`brandName`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
