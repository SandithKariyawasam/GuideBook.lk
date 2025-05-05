-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 06:04 PM
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
-- Database: `dblanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `cat_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `cat_img`) VALUES
(1, 'Hospital', 'hospital.png'),
(2, 'Fuel station', 'gas-station.png'),
(3, 'Resturent', 'restaurant.png'),
(4, 'Pharmacy', 'pharmacy.png'),
(5, 'Food city', 'foodcity.png'),
(6, 'ATM', 'atm.png'),
(7, 'School', ''),
(8, 'Salon', 'scissors.png');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(6) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `district_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `district_id`) VALUES
(1, 'Horana', 1),
(3, 'Bulathsinhala', 1),
(4, 'Kalutara', 1),
(5, 'Walallawita', 1),
(6, 'Agalawatta', 1),
(7, 'Bandaragama', 1),
(8, 'Matugama', 1),
(9, 'Madurawala', 1),
(10, 'Beruwala', 1),
(11, 'Millaniya', 1),
(12, 'Ingiriya', 1),
(13, 'Dodangoda', 1),
(14, 'Panadura', 1),
(15, 'Ayagama', 4),
(16, 'Godakawela', 4),
(17, 'Kolonna', 4),
(18, 'Weligepola', 4),
(19, 'Balangoda', 4),
(20, 'Imbulpe', 4),
(21, 'Kuruwita', 4),
(22, 'Kalthota', 4),
(23, 'Eheliyagoda', 4),
(24, 'Kahawatta', 4),
(25, 'Elapatha', 4),
(26, 'Nivithigala', 4),
(27, 'Kalawana', 4),
(28, 'Opanayaka', 4),
(29, 'Embilipitiya', 4),
(30, 'Kiriella', 4),
(31, 'Pelmadulla', 4),
(32, 'Palindanuwara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(3) NOT NULL,
  `district_name` varchar(50) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `province_id`) VALUES
(1, 'Kalutara', 1),
(2, 'Colombo', 1),
(3, 'Gampaha', 1),
(4, 'Rathnapura', 4);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `category_id` int(20) NOT NULL,
  `place_id` int(3) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `place_address` varchar(50) NOT NULL,
  `place_telephone` varchar(10) NOT NULL,
  `place_email` varchar(30) NOT NULL,
  `place_image` varchar(450) NOT NULL,
  `place_location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`category_id`, `place_id`, `place_name`, `city_id`, `place_address`, `place_telephone`, `place_email`, `place_image`, `place_location`) VALUES
(1, 1, 'Teaching Hospital - Kalutara', 4, 'Mathugama road,Kalutara', '0342222261', '', '', 'https://goo.gl/maps/3AEoTWnKGyDXj2Qa8'),
(1, 2, 'Family Care Hospital', 4, 'Kalutara', '342229944', '', '', 'https://goo.gl/maps/j7CwSxyv7sQFQ7k39'),
(1, 4, 'New Philip Hospital', 4, 'No.225 , Gall road , Kalutara', '342222888', '', '', 'https://goo.gl/maps/rN5HmRUJeGWLqHtN9'),
(1, 5, 'Medihelp Hospital', 4, 'No.558 , Galle road , Kalutara', '342030200', '', '', 'https://goo.gl/maps/6UVuuDkJqDkSifqW8'),
(1, 6, 'Kalutara medical center', 4, 'No.721 , Galle road , Kalutara', '712111850', '', '', 'https://goo.gl/maps/QcXbonjZJLr8AX247'),
(1, 7, 'Green Houe Medical center', 4, 'Green house medical center , Kalutara', '342221736', '', '', 'https://goo.gl/maps/Zco77cQ2XjxDQbj2A'),
(1, 8, 'Katukurunda Nursing Home', 4, 'Katukurunda nursing home , A2 , Kalutara', '342222212', '', '', 'https://goo.gl/maps/FfE44VN66RDoSJTN7'),
(4, 9, 'New Pharmacy - Kalutara', 4, '212 , Galle road , Kalutara', '342222558', '', '', 'https://goo.gl/maps/17wf6pyd94ER4t9B9'),
(4, 10, 'New Philip Pharmacy', 4, 'Kalutara', '342222888', '', '', 'https://goo.gl/maps/qN777xP5Exx2rA888'),
(4, 11, 'Isuru Pharmacy', 4, 'Cross road , Kalutara south', '0', '', '', 'https://goo.gl/maps/CVMitdU3sZZNQV7y5'),
(4, 12, 'Wickrama pharmacy', 4, 'Wickrama pharmacy , Nagoda ,Kalutara', '342221355', '', '', 'https://goo.gl/maps/xHrmBV5E1CNw5fEs9'),
(6, 13, 'People\'s bank ATM', 4, 'Nagoda road , Kalutara', '0', '', '', 'https://goo.gl/maps/CcroecjP96fPar546'),
(6, 14, 'Bank Of Ceylon - ATM', 4, 'Main street , Kalutara', '0', '', '', 'https://goo.gl/maps/tUMb9zbdTX5PouSg9'),
(3, 15, 'Nadee Indian Resturent', 4, '355/1/A , Galle road , Kalutara', '344300700', '', '', 'https://goo.gl/maps/Gx4hf77e1Aqpo7CPA'),
(3, 16, 'CafeMint Resturent', 4, 'Mathugama road , Kalutara', '788172542', '', '', 'https://goo.gl/maps/xWhg83rujicqczYr8'),
(3, 17, 'New kalutara Hotel', 4, 'No.422 , Galle road , Kalutara', '0', '', '', 'https://goo.gl/maps/iC3fntFJaPkksRr68'),
(5, 18, 'Perera Super Market', 4, '20 , Good dhed road , Kalutara', '714464351', '', '', 'https://goo.gl/maps/dqFoZH52XQXSpQi78'),
(5, 19, 'Sampath Super Market', 4, 'Central Junction , Kalutara', '0', '', '', 'https://goo.gl/maps/beCqnnjCGAD3qj3T7'),
(2, 20, 'L.L. Kulathunga lanka filing station', 4, 'Galle road , Kalutara', '342228020', '', '', 'https://goo.gl/maps/hwZikhDPBQphFj7q9'),
(2, 21, 'Lanka Ceypetco filing station', 4, 'A2,Kalutara', '344280294', '', '', 'https://goo.gl/maps/Lyn8eYJLVPkNeLXP9'),
(1, 23, ' Medihelp Hospitals', 1, '172/3, Panadura road, Horana', '0342261115', '', '', 'https://goo.gl/maps/chu5EwcgTh7EgGMo8');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(4) NOT NULL,
  `province_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Western Province'),
(2, 'Uwa Province'),
(3, 'Southern Province'),
(4, 'Sabaragamuwa Province'),
(5, 'North Western Province'),
(6, 'North Province'),
(7, 'Central Province'),
(8, 'North Central Province'),
(9, 'Eastern Province');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(450) NOT NULL,
  `user_roll_id` int(11) NOT NULL,
  `user_enable` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_roll_id`, `user_enable`) VALUES
(1, 'imesh', 'imeshnaveen@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 0),
(2, 'binod', 'binod7@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 3, 0),
(3, 'Narada', 'naradado@gmail.com', '5013140f9f6ecfade3ac8ac2e5a970613f634a74', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roll`
--

CREATE TABLE `user_roll` (
  `user_roll_id` int(1) NOT NULL,
  `user_roll_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visiting_category`
--

CREATE TABLE `visiting_category` (
  `vc_id` int(4) NOT NULL,
  `vc_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visiting_places`
--

CREATE TABLE `visiting_places` (
  `vp_id` int(4) NOT NULL,
  `vp_name` varchar(150) NOT NULL,
  `vp_category` int(4) NOT NULL,
  `vp_address` varchar(250) NOT NULL,
  `vp_description` varchar(3000) NOT NULL,
  `vp_district` int(3) NOT NULL,
  `vp_image` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_roll`
--
ALTER TABLE `user_roll`
  ADD PRIMARY KEY (`user_roll_id`);

--
-- Indexes for table `visiting_category`
--
ALTER TABLE `visiting_category`
  ADD PRIMARY KEY (`vc_id`);

--
-- Indexes for table `visiting_places`
--
ALTER TABLE `visiting_places`
  ADD PRIMARY KEY (`vp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roll`
--
ALTER TABLE `user_roll`
  MODIFY `user_roll_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visiting_category`
--
ALTER TABLE `visiting_category`
  MODIFY `vc_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visiting_places`
--
ALTER TABLE `visiting_places`
  MODIFY `vp_id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
