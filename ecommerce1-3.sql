-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 07:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CateID` int(11) NOT NULL,
  `CategoryName` varchar(150) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CateID`, `CategoryName`, `Description`) VALUES
(1, 'PHONE', 'DT'),
(2, 'Tablet', 'MTB'),
(3, 'Laptop', 'LT');

-- --------------------------------------------------------

--
-- Table structure for table `oderdetail`
--

CREATE TABLE `oderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oderproduct`
--

CREATE TABLE `oderproduct` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `ShipDate` datetime NOT NULL,
  `ShipName` varchar(150) NOT NULL,
  `ShipAddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` text DEFAULT NULL,
  `CateID` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES
(22, 'Macbookpro 13 2021', 3, 5000, 3, 'Macbook Chip M1', 'uploads/2021032502040435m1.jpg'),
(28, 'Ipadpro2020', 2, 3000, 2, 'Sản phẩm mới nhất của apple năm 2021', 'uploads/2021033109070740ipad.jpg'),
(29, 'Iphone 12 promax ', 1, 5000, 2, 'Thế hệ điện thoại mới nhất apple 2021', 'uploads/2021033109282839iphone.jpg'),
(30, 'Asus', 3, 5000, 3, 'Thế hệ mạnh mẽ ', 'uploads/20210331093131349.jpg'),
(31, 'Macbookpro 15 2019', 3, 500000, 4, 'I7 32gb 512SSD', 'uploads/2021040705323204bg15.png'),
(32, 'Dell XPS 2020 ', 3, 49000000, 2, 'i7 16gb 512SSD', 'uploads/2021040705464632Dell.png'),
(33, 'Thinkpad 490S', 3, 3000000, 4, 'I5 8gb 256SSD', 'uploads/2021040705474710Thinkpad.png'),
(34, 'Ipad pro 2021 xám', 2, 90000, 3, '8GB ', 'uploads/2021040706161652ipad-air-2020-gray.jpg'),
(35, 'Iphone 12 promax ', 1, 500000, 3, 'Gray ', 'uploads/2021040706171721iphone-12.jpg'),
(36, 'AsusZenBook 14', 3, 100000, 3, 'Màn Hình IPS , 8gb RAM , 512SSD', 'uploads/2021040708414103asuszen.jpg'),
(37, 'Asus Gaming 15', 3, 9999999, 4, 'Best Gamming 512SSD', 'uploads/2021040708414133AsusTuf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(5) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Email`, `Password`) VALUES
(1, 'minhthuan.0111999@gmail.com', '', 'd64fd3aaec2d1d86d28a4016334d0a80'),
(2, 'minhthuan.0111999@gmail.com', '01226156790', 'd41d8cd98f00b204e9800998ecf8427e'),
(3, 'thuanminh', '123', 'bf449875198a82f7ac647d02d67a771f'),
(4, 'minh123', '1', '226ee086aa60b0d2611346cd7ded6dad'),
(5, 'minhthuan.0111999@gmail.com', '01226156790', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, 'minhthuan.0111999@gmail.com', '01226156790', 'd41d8cd98f00b204e9800998ecf8427e'),
(7, 'mt123', '123', '967ff5038bd328bc2326fdaf7ee4820f'),
(8, 'minhthuan.0111999@gmail.com', '01226156790', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'minhthuan.0111999@gmail.com', '01226156790', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CateID`);

--
-- Indexes for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `oderproduct`
--
ALTER TABLE `oderproduct`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CateID` (`CateID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oderdetail`
--
ALTER TABLE `oderdetail`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oderproduct`
--
ALTER TABLE `oderproduct`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD CONSTRAINT `oderdetail_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `oderdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `oderdetail_ibfk_3` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `oderdetail_ibfk_4` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `oderdetail_ibfk_5` FOREIGN KEY (`OrderID`) REFERENCES `oderproduct` (`OrderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
