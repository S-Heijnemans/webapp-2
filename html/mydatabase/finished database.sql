-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 02, 2024 at 10:26 PM
-- Server version: 5.7.44
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodations`
--

CREATE TABLE `accomodations` (
  `accomodation_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `max_tenants` int(2) NOT NULL,
  `beds_per_room` int(1) NOT NULL,
  `rooms` int(2) NOT NULL,
  `bathrooms` int(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `pool_nearby` tinyint(1) NOT NULL,
  `toilets` int(10) NOT NULL,
  `accessibility` tinyint(1) NOT NULL,
  `airco` tinyint(1) NOT NULL,
  `date_booked` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `restaurant` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodations`
--

INSERT INTO `accomodations` (`accomodation_id`, `city_id`, `max_tenants`, `beds_per_room`, `rooms`, `bathrooms`, `wifi`, `pool_nearby`, `toilets`, `accessibility`, `airco`, `date_booked`, `restaurant`, `name`, `price_per_night`, `adress`, `description`, `img`) VALUES
(3, 1, 8, 2, 2, 2, 1, 0, 1, 0, 1, '2024-06-21 21:48:44', 1, 'schmotel', 64.00, 'kmjasdasdmjasmjdmjkasdkmj', 'very good very nice!', ''),
(9, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-06-25 21:14:58', 0, 'Kakel', 0.18, 'madeintokyo', 'kangeburen', NULL),
(11, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2024-06-25 21:25:25', 0, 'Kakel', 0.18, 'madeintokyo', 'kangeburen', NULL),
(27, 2, 7, 3, 1, 1, 1, 1, 1, 0, 0, '2024-06-26 08:45:59', 0, 'Demonstratie', 59.43, 'demonstratiestraat 16', 'een leuk verblijf!', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `airport_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `airport_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airport_id`, `city_id`, `airport_name`) VALUES
(1, 1, 'Kansai Airport'),
(2, 1, 'banzai'),
(3, 1, 'tokyo'),
(4, 2, 'KyotoRinusdesu');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `accomodation_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `travel_begin_date` datetime NOT NULL,
  `travel_end_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'In treatment'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `flight_id`, `country_id`, `accomodation_id`, `order_date`, `travel_begin_date`, `travel_end_date`, `status`) VALUES
(1, 1, 2, 1, NULL, '2024-07-02 20:20:37', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 'In treatment'),
(2, 1, 3, 1, NULL, '2024-07-02 20:48:28', '2024-06-25 03:35:46', '2024-06-25 03:35:46', 'In treatment'),
(3, 1, 2, 1, NULL, '2024-07-02 20:49:44', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 'In treatment'),
(4, 5, 2, 1, NULL, '2024-07-02 20:51:16', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 'In treatment'),
(5, 5, 3, 1, NULL, '2024-07-02 20:51:46', '2024-06-25 03:35:46', '2024-06-25 03:35:46', 'In treatment'),
(6, 5, 2, 1, NULL, '2024-07-02 21:41:42', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 'In treatment'),
(7, 6, 2, 1, NULL, '2024-07-02 21:46:03', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 'In treatment'),
(8, 6, 3, 1, NULL, '2024-07-02 21:46:55', '2024-06-25 03:35:46', '2024-06-25 03:35:46', 'In treatment'),
(9, 6, 1, 1, NULL, '2024-07-02 21:54:34', '2024-06-27 12:00:00', '2024-06-30 08:00:00', 'In treatment'),
(10, 5, 2, 1, NULL, '2024-07-02 22:25:10', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 'In treatment'),
(11, 6, 2, 1, NULL, '2024-07-02 22:25:35', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 'In treatment');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `city_name`, `img`) VALUES
(1, 1, 'osaka', NULL),
(2, 1, 'Kyoto', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `part_of_europe` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_code`, `part_of_europe`) VALUES
(1, 'Japan', '', 0),
(2, 'Zweden', '', 0),
(3, 'Norwegen', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `departure_airport` int(11) NOT NULL,
  `arrival_airport` int(11) NOT NULL,
  `flight_number` varchar(20) NOT NULL,
  `airline` varchar(50) NOT NULL,
  `flight_date` datetime NOT NULL,
  `retour_date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `departure_airport`, `arrival_airport`, `flight_number`, `airline`, `flight_date`, `retour_date`, `price`) VALUES
(1, 4, 2, '23njjkas', 'lokoti', '2024-06-27 12:00:00', '2024-06-30 08:00:00', 84.55),
(2, 3, 2, 'asdqwd123', 'oiyasyubd', '2024-06-26 08:00:00', '2024-06-29 13:00:00', 712.50),
(3, 1, 4, 'ui3n1n2', 'banana', '2024-06-25 03:35:46', '2024-06-25 03:35:46', 69.42);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `accomodation_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `accomodation_id`, `country_id`, `city_id`, `image_url`, `image`) VALUES
(1, NULL, 1, 1, '/assets/6238e7082d19e-jpeg.jpg', '/assets/6238e7082d19e-jpeg.jpg'),
(2, NULL, 1, 2, '/assets/avatar.png', 'Group 2698.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accomodation_id` int(11) DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `accomodation_id`, `flight_id`, `trip_id`, `comment`, `rating`) VALUES
(1, 7, NULL, NULL, NULL, 'choochooo goes the train', 5),
(2, 7, NULL, NULL, NULL, 'choochooo goes the train', 5);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `activity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `accomodation_id`, `flight_id`, `country_id`, `description`, `price`, `name`, `activity`) VALUES
(1, 3, 1, 2, 'A really fun trip to Sweden where there are all work shops that you can go to.', 792.50, 'Trip to Sweden ', 'a workshop where you can make meatballs in ikea, some populair music to see live. Like Heilung!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `roles` int(10) NOT NULL DEFAULT '10',
  `profile_img` varchar(255) DEFAULT '/assets/avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `roles`, `profile_img`) VALUES
(5, 'hoop', '89bbc7d16e018158b53c6007729f25a4', 'hoopdat@werkt', 0, '/assets/avatar.png'),
(6, 'kaas', '7546cef3b7b2c9de09f6974d75473bc6', 'kaas@boer', 10, '/assets/avatar.png'),
(7, 'choo', '50eff2fdd486d778fc3b3a22ee4f50fc', 'customer@test.nl', 10, '/assets/avatar.png'),
(9, 'hoop1', '7546cef3b7b2c9de09f6974d75473bc6', 'hoopkaas@home.soon', 10, '/assets/avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userdata_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userdata_id`, `first_name`, `last_name`, `registration_date`) VALUES
(5, 'Hope', 'BeDope', '2024-06-21 19:59:55'),
(6, 'johma', 'salade', '2024-06-21 21:22:45'),
(7, 'maik', 'hendriks', '2024-06-24 01:18:27'),
(9, 'kaas', 'baas', '2024-06-24 23:49:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD PRIMARY KEY (`accomodation_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`airport_id`),
  ADD UNIQUE KEY `airport_name` (`airport_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `accomodation_id` (`accomodation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`) USING BTREE,
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `city_name` (`city_name`) USING BTREE,
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `departure_airport` (`departure_airport`),
  ADD KEY `arrival_airport` (`arrival_airport`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `accomodation_id` (`accomodation_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `accomodation_id` (`accomodation_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `accomodation_id` (`accomodation_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userdata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodations`
--
ALTER TABLE `accomodations`
  MODIFY `accomodation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD CONSTRAINT `accomodation_fk_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `airports`
--
ALTER TABLE `airports`
  ADD CONSTRAINT `airport_fk_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `accomodation_fk_booking` FOREIGN KEY (`accomodation_id`) REFERENCES `accomodations` (`accomodation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `country_fk_booking` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `flight_fk_booking` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_fk_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `arrival_fk_airport` FOREIGN KEY (`arrival_airport`) REFERENCES `airports` (`airport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `departure_fk_airport` FOREIGN KEY (`departure_airport`) REFERENCES `airports` (`airport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `image_fk_accomodation` FOREIGN KEY (`accomodation_id`) REFERENCES `accomodations` (`accomodation_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_fk_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_fk_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review_fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trip_fk_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trip_fk_flight` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `userdata_fk_user` FOREIGN KEY (`userdata_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
