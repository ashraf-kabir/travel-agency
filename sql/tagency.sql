-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 03:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(2, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Business'),
(2, 'Economy'),
(3, 'Regular');

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
  `c_passport` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `c_passport`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(7, '::1', 'Modric', 'modric@gmail.com', '123456', 'iuthd75323h', 'Croatia', 'Madrid', '09876543', 'pqr street, Madrid', 'modric.jpg'),
(8, '::1', 'Gareth Bale', 'bale@gmail.com', '12345678', 'asfkajfgkjasdhfk', 'England', 'Madrid', '1234678', 'pqr street, Madrid', 'bale.jpg'),
(9, '::1', 'Imrose Murshed', 'imrose@gmail.com', '12345678', 'kjahdjkahgjfkd', 'Bangladesh', 'Dhaka', '987654321', 'xyz street', '10257051_1478387172447340_7457831927587649442_n.jpg'),
(10, '::1', 'Toni Kroos', 'kroos@gmail.com', '123456', '12345678', 'Spain', 'Madrid', '123123813', 'abcd street', '53302383_2313952138849356_535954198475309056_n.jpg'),
(11, '::1', 'Dani Carvajal', 'dani@gmail.com', '123456', '121231', '--Select--', 'Madrid', 'asdasdasd', 'asdasdas', '13680916_523659327839565_4622168564214662790_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(100) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `emp_location` varchar(100) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_name`, `emp_email`, `emp_designation`, `emp_location`, `emp_address`, `emp_contact`) VALUES
(2, 'Virat Kohli', 'kohli@gmail.com', 'Local Agent', 'India', '123 street Mumbai', '+91123456789'),
(5, 'Lasith Malinga', 'malinga@gmail.com', 'Local Agent', 'Sri Lanka', '456 station road, Colombo', '+94 987654321'),
(6, 'Rajesh Pradhananga', 'rajesh@gmail.com', 'Local Agent', 'Nepal', '987 xyz street, KathMandu, Nepal', '+977 987654321');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(100) NOT NULL,
  `package_cat` int(100) NOT NULL,
  `package_type` int(100) NOT NULL,
  `package_title` varchar(255) NOT NULL,
  `package_price` int(100) NOT NULL,
  `package_desc` longtext NOT NULL,
  `package_image` text NOT NULL,
  `package_keywords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_cat`, `package_type`, `package_title`, `package_price`, `package_desc`, `package_image`, `package_keywords`) VALUES
(1, 1, 2, 'Bali, Indonesia', 5500, 'Bali is situated at Indonesia', 'balitravel.jpg', 'bali Bali BALI tour Tour package Package PACKAGES packages tours TOURS travel TRAVEL travels TRAVELS Travel Travels Indonesia indonesia'),
(2, 2, 2, 'Bichanakandi', 5000, '<p>Location: Bichanakandi, Sylhet</p>\r\n<p>About:&nbsp;<span style=\"font-weight: bold; color: #6a6a6a; font-family: arial, sans-serif; font-size: small;\">Bichanakandi</span><span style=\"color: #545454; font-family: arial, sans-serif; font-size: small;\">&nbsp;is all about waterfalls and collection of stones, pebbles in the crystal-clear river water.The ranges of the Khasi mountain meet at point here.</span></p>\r\n<p>&nbsp;</p>\r\n<p>Our offer: 3 days &amp; 2 nights family tour package (4 person)</p>\r\n<p>Hotel: Sylhet Parjoton</p>\r\n<p>Check availability: available</p>\r\n<p>&nbsp;</p>\r\n<p>Discount: not available</p>\r\n<p>Total cost: 2500 USD</p>', 'bichanakandi02.jpg', 'bichanakandi sylhet regular family Regular Family REGULAR FAMILY Bichanakandi'),
(4, 2, 3, 'Sri Lanka', 7000, '<p>Sri Lanka is a natural beauty</p>', 'srilanka01.jpg', 'srilanka SRILANKA Srilanka SriLanka Sri Lanka sri lanka tour travel Tour Travel TRAVEL TOUR'),
(6, 3, 2, 'Taj Mahal', 7000, '<p style=\"text-align: justify;\"><strong>Location: Taj Mahal</strong></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>About:</strong> The Taj Mahal (meaning \"Crown of the Palace\") is an ivory-white marble mausoleum on the south bank of the Yamuna river in the Indian city of Agra. It was commissioned in 1632 by the Mughal emperor, Shah Jahan (reigned from 1628 to 1658), to house the tomb of his favourite wife, Mumtaz Mahal. The tomb is the centrepiece of a 17-hectare (42-acre) complex, which includes a mosque and a guest house, and is set in formal gardens bounded on three sides by a crenellated wall.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Our offer:</strong> 3 days &amp; 2 nights family tour package (4 person)</p>\r\n<p style=\"text-align: justify;\"><strong>Hotel:</strong> Hotel Atulyaa Taj</p>\r\n<p style=\"text-align: justify;\"><strong>Check availability:</strong> available</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Discount: not available</p>\r\n<p style=\"text-align: justify;\">Total cost: 7000 USD</p>', 'taj01.jpg', 'tajmahal taj mahal TajMahal Taj Mahal TAJMAHAL TAJmahal tajMAHAL regular family Regular Family tour travel Tour Travel India india INDIA'),
(7, 2, 2, 'Kathmandu', 5000, '<p style=\"text-align: left;\">Location: <strong>Kathmandu, Nepal</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">About: Kathmandu (/ËŒk&aelig;tm&aelig;nËˆduË/;[2] Nepali: à¤•à¤¾à¤ à¤®à¤¾à¤¡à¥Œà¤‚, Nepal Bhasa: à¤¯à¥‡: Yei,</p>\r\n<p style=\"text-align: justify;\">Nepali pronunciation: [kaÊˆÊ°maÉ³É–u]) is the capital city of Nepal.</p>\r\n<p style=\"text-align: justify;\">It is the largest metropolis in Nepal, with a population of 1.5 million&nbsp;</p>\r\n<p style=\"text-align: justify;\">in the city proper, and 3 million in its urban agglomeration across&nbsp;</p>\r\n<p style=\"text-align: justify;\">the Kathmandu Valley, which includes the towns of Lalitpur, Kirtipur,&nbsp;</p>\r\n<p style=\"text-align: justify;\">Madhyapur Thimi, Bhaktapur making the total population to roughly 5&nbsp;</p>\r\n<p style=\"text-align: justify;\">million people and the municipalities across Kathmandu valley.&nbsp;</p>\r\n<p style=\"text-align: justify;\">Kathmandu is also the largest metropolis in the Himalayan hill region.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: left;\">Our offer: 3 days &amp; 2 nights family tour package (4 person)</p>\r\n<p style=\"text-align: left;\">Hotel: Kathmandu Grand Hotel</p>\r\n<p style=\"text-align: left;\">Check availability: available</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">Discount: 5% for MasterCard users</p>\r\n<p style=\"text-align: left;\">Total cost: 5000 USD</p>', 'nepal01.jpg', 'nepal kathmandu Nepal Kathmandu NEPAL KATHMANDU economy Economy ECONOMY family Family FAMILY'),
(8, 1, 3, 'Manali', 1400, '<p style=\"text-align: left;\">Location: <strong>Manali, Himachal Pradesh, India</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">About: Manali is a resort town nestled in the mountains of the Indian state of&nbsp;</p>\r\n<p style=\"text-align: justify;\">Himachal Pradesh near the northern end of the Kullu Valley, at an altitude of&nbsp;</p>\r\n<p style=\"text-align: justify;\">2,050 m (6,726 ft) in the Beas River Valley. It is located in the Kullu&nbsp;</p>\r\n<p style=\"text-align: justify;\">district, about 270 km (168 mi) north of the state capital, Shimla, 309 km&nbsp;</p>\r\n<p style=\"text-align: justify;\">(192 miles) northeast of Chandigarh and 544 km (338 miles) northeast of Delhi,&nbsp;</p>\r\n<p style=\"text-align: justify;\">the federal capital. The small town, with a population of 8,096, is the&nbsp;</p>\r\n<p style=\"text-align: justify;\">beginning of an ancient trade route to Ladakh and from there over the&nbsp;</p>\r\n<p style=\"text-align: justify;\">Karakoram Pass on to Yarkand and Khotan in the Tarim Basin. It is a popular&nbsp;</p>\r\n<p style=\"text-align: justify;\">tourist destination and serves as the gateway to Lahaul and Spiti district&nbsp;</p>\r\n<p style=\"text-align: justify;\">as well as Leh.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: left;\">Our offer: 5 days &amp; 2 nights couple tour package</p>\r\n<p style=\"text-align: left;\">Hotel: Hotel Devlok Manali</p>\r\n<p style=\"text-align: left;\">Check availability: available</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\">Discount: not available</p>\r\n<p style=\"text-align: left;\">Total cost: <strong>1400 USD</strong></p>', 'manali01.jpg', 'manali Manali MANALI india India tour travel Tour TRAVEL TOUR Travel Business Couple business couple BUSINESS COUPLE'),
(9, 1, 3, 'Coxs Bazar', 2200, '<p>something</p>', 'coxs04.jpg', 'coxs bazar business Business Couple couple BUSINESS COUPLE tour sea beach'),
(10, 1, 1, 'Switzerland', 7000, '<p>Location: Switzerland</p>\r\n<p>About: Switzerland</p>\r\n<p>Our offer: 3 days &amp; 2 nights single</p>\r\n<p>Hotel: ABCD Hotel</p>\r\n<p>Check availability: available</p>\r\n<p>Discount: not available</p>\r\n<p>Total cost: 3200 USD</p>', 'swiss.jpg', 'swiss switzerland Switzerland Europe Business Single business single europe'),
(11, 3, 2, 'Jaflong', 3000, '<p>Some information</p>\r\n<p>family tour package 4 person</p>\r\n<p>About: Jaflong is situated at Sylhet.....</p>\r\n<p>Hotel: ABC Hotel, Sylhet</p>\r\n<p>Cost: 3000</p>\r\n<p>Discount 5%</p>', 'jaflong.jpg', 'jaflong Jaflong JAFLONG regular Regular REGULAR FAMILY family Family sylhet Sylhet SYLHET'),
(12, 1, 1, 'Darjeeling', 2100, '<p style=\"text-align: justify;\"><strong style=\"color: #222222; font-family: sans-serif;\">Darjeeling</strong><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;is a town and a&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Municipality\" href=\"https://en.wikipedia.org/wiki/Municipality\">municipality</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;in the&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"India\" href=\"https://en.wikipedia.org/wiki/India\">Indian</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"States and union territories of India\" href=\"https://en.wikipedia.org/wiki/States_and_union_territories_of_India\">state</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;of&nbsp;</span><a style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"West Bengal\" href=\"https://en.wikipedia.org/wiki/West_Bengal\">West Bengal</a><span style=\"color: #222222; font-family: sans-serif;\">. It is located in the&nbsp;</span><a class=\"mw-redirect\" style=\"text-decoration-line: none; color: #0b0080; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: sans-serif;\" title=\"Lesser Himalaya\" href=\"https://en.wikipedia.org/wiki/Lesser_Himalaya\">Lesser Himalayas</a><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;at an elevation of 6,700&nbsp;ft (2,042.2&nbsp;m).</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #222222; font-family: sans-serif;\">Location: Darjeeling, India</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #222222; font-family: sans-serif;\">Offer: 2days 1 night</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #222222; font-family: sans-serif;\">Discount: 5% on MasterCard</span></p>\r\n<p style=\"text-align: justify;\"><strong><span style=\"color: #222222; font-family: sans-serif;\">Total Cost: 2100 USD</span></strong></p>', 'darjeeling.JPG', 'darjeeling Darjeeling DARJEELING india India INDIA business BUSINESS Business Single single SINGLE tour'),
(13, 2, 1, 'Tanguar Haor', 1000, '<p>About:&nbsp;<span style=\"color: #6a6a6a; font-family: arial, sans-serif; font-size: small;\">Tanguar haor</span><span style=\"color: #545454; font-family: arial, sans-serif; font-size: small;\">&nbsp;(Bengali: à¦Ÿà¦¾à¦™à§à¦—à§à¦¯à¦¼à¦¾à¦° à¦¹à¦¾à¦“à¦°), (also called Tangua haor), located in the Dharmapasha and Tahirpur upazilas of Sunamganj District in Bangladesh.</span></p>\r\n<p>Our offer: 2 days &amp; 1 night</p>\r\n<p>Hotel: ABC Hotel, Sylhet</p>\r\n<p>Discount: 10% on early booking</p>\r\n<p>Total Cost: 2000 USD</p>', 'tanguar.jpg', 'tanguar haor economy Economy ECONOMY SINGLE single Single Tanguar Haor'),
(14, 3, 3, 'Rajasthan', 9000, '<p>About: Rajasthan has many tourists attractions......</p>\r\n<p><span style=\"color: #222222; font-family: sans-serif;\">Our offer: 6days &amp; 5 nights couple tour</span></p>\r\n<p><span style=\"color: #222222; font-family: sans-serif;\">Hotel: ABC Hotel, Rajasthan</span></p>\r\n<p><span style=\"color: #222222; font-family: sans-serif;\">Discount: 10% for DBBL users</span></p>\r\n<p><span style=\"color: #222222; font-family: sans-serif;\">Total cost: 9000 USD</span></p>', 'rajasthan.jpg', 'rajasthan Rajasthan RAJASTHAN regular Regular REGULAR couple Couple Couple India india INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(100) NOT NULL,
  `type_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_title`) VALUES
(1, 'Single'),
(2, 'Family'),
(3, 'Couple');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
