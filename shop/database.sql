- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 11:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'dairy and eggs');

-- --------------------------------------------------------

--
-- Table structure for table `commentrating`
--

CREATE TABLE `commentrating` (
  `CommentRatingID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentrating`
--

INSERT INTO `commentrating` (`CommentRatingID`, `UserID`, `username`, `ProductID`, `Comment`, `Rating`, `Date`) VALUES
(64, NULL, 'kirigaya', 3, 'asdfasdfasdf', 4, '0000-00-00'),
(85, NULL, 'kirigaya', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate quam ut quam interdum, a blandit justo sagittis. Nam finibus nunc quis nunc tempus scelerisque. Etiam quis tortor ut massa suscipit interdum. Vivamus ut quam eu felis eleifend venenatis. Cras ut tortor vel ex ultrices consectetur.', 3, '2023-07-28'),
(92, NULL, 'kirigaya', 3, 'fasdfasdfasdfasdfasfdasdfasdf', 0, '2023-07-28'),
(93, NULL, 'kirigaya', 3, 'fasdfasdfasdfasdfasfdasdfasdf', 0, '2023-07-28'),
(94, NULL, 'kirigaya', 3, 'fasdfasdfasdfasdfasfdasdfasdf', 0, '2023-07-28'),
(95, NULL, 'kirigaya', 3, 'fasdfasdfasdfasdfasfdasdfasdf', 0, '2023-07-28'),
(96, NULL, 'kirigaya', 3, 'fasdfasdfasdfasdfasfdasdfasdf', 0, '2023-07-28'),
(97, NULL, 'kirigaya', 3, 'lgrgoooor', 4, '2023-07-28'),
(98, NULL, 'kirigaya', 3, 'asdfasdfasdfasdfasdf', 4, '2023-07-28'),
(99, NULL, 'kirigaya', 3, 'ana hwa kirigaya aaaaaa', 4, '2023-07-28'),
(100, NULL, 'kirigaya', 5, ' border-top: 1px solid gray;', 4, '2023-07-28'),
(101, NULL, 'kirigaya', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor, justo in pellentesque aliquet, sapien odio blandit nunc, eget tempus neque sapien eu nisi. Fusce sed metus eu tellus tincidunt accumsan. Etiam at tincidunt ex. Proin tincidunt nisl vitae ipsum malesuada, nec iaculis urna aliquam. ', 3, '2023-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `PaymentDate` date DEFAULT NULL,
  `PaymentStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `img1` varchar(100) DEFAULT NULL,
  `img2` varchar(100) DEFAULT NULL,
  `img3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `UserID`, `CategoryID`, `Title`, `Description`, `Price`, `Quantity`, `img1`, `img2`, `img3`) VALUES
(3, 1, 1, 'a random product', 'a random producta random producta random producta random producta random producta random producta random producta random p', 99.00, 99, 'h1.jpg', 'h2.jpg', 'h3.jpg'),
(4, 1, 1, 'product x ', 'product x product x product x product x product x product x product x product x product x product x product x product x product x ', 99.00, 99, 'buy.jpeg', 'sell.jpg', 'sell.jpg'),
(5, 2, 1, 'product y', 'product yproduct yproduct yproduct yproduct yproduct yproduct yproduct yproduct yproduct yproduct yproduct y', 99.00, 99, '444.jpeg', '44444.jpeg', '4444.jpeg'),
(6, 2, 1, 'product zz ', 'product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz product zz ', 120.00, 99, 'rok.jpg', 'rok.jpg', 'rok.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `PhoneNumber`) VALUES
(1, 'kirigaya', 'kirigaya', 'kiiriigayakasuto@gmail.com', '55266521'),
(2, 'kirigaya', 'kirigaya', 'kiiriigayakasuto@gmail.com', '55266521');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `commentrating`
--
ALTER TABLE `commentrating`
  ADD PRIMARY KEY (`CommentRatingID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CategoryID` (`CategoryID`);

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
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commentrating`
--
ALTER TABLE `commentrating`
  MODIFY `CommentRatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentrating`
--
ALTER TABLE `commentrating`
  ADD CONSTRAINT `commentrating_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `commentrating_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `ordertable_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `ordertable_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `ordertable` (`OrderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
