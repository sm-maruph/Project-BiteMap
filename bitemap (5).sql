-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitemap`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `typename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `typename`) VALUES
(1, 'Families'),
(2, 'Couples'),
(3, 'Solo'),
(4, 'Friends'),
(5, 'Restaurants'),
(6, 'Coffee & tea'),
(7, 'Quick bites'),
(8, 'Bakeries'),
(9, 'Dessert'),
(10, 'Delivery only'),
(11, 'Breakfast'),
(12, 'Lunch'),
(13, 'Dinner'),
(14, 'Cheap Eats'),
(15, 'Mid-range'),
(16, 'Fine Dining'),
(17, 'Beef'),
(18, 'Burger'),
(19, 'Cake'),
(20, 'Curry'),
(21, 'Fish'),
(22, 'Ice cream'),
(23, 'Lamb'),
(24, 'Pancakes'),
(25, 'Pasta'),
(26, 'Prawn'),
(27, 'Pesto'),
(28, 'Sandwich'),
(29, 'Family with children'),
(30, 'Kids'),
(31, 'Buisness meetings'),
(32, 'Large groups'),
(33, 'Romantic'),
(34, 'Local cuisin'),
(35, 'Scenic view'),
(36, 'Hidden gems'),
(37, 'Hot new restaurants'),
(38, 'Asian'),
(39, 'Bangladeshi'),
(40, 'Bar'),
(41, 'Cafe'),
(42, 'Indian'),
(43, 'Italian'),
(44, 'Fast Food'),
(45, 'Thai'),
(46, 'Malaysian'),
(47, 'Pizza'),
(48, 'Accept Credit Cards'),
(49, 'Buffet'),
(50, 'Delivery'),
(51, 'Digital Payments'),
(52, 'Free Wifi'),
(53, 'Family Style'),
(54, 'Non Smoking restaurant'),
(55, 'Outdoor Seating'),
(56, 'Parking Available'),
(57, 'Private Dining'),
(58, 'Reservations'),
(59, 'Seating'),
(60, 'Serves Alcohol'),
(61, 'Smoking restaurant'),
(62, 'Takeout'),
(63, 'Table service');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender_type` varchar(20) DEFAULT NULL,
  `receiver_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `sender_type`, `receiver_type`) VALUES
(75, 115, 95, 'Hi there?\r\n', '2023-12-17 00:06:19', 'user', 'restaurant'),
(76, 95, 115, 'Hlw', '2023-12-17 00:06:56', 'restaurant', 'user'),
(77, 95, 115, 'How can I help you ,sir?', '2023-12-17 00:09:05', 'restaurant', 'user'),
(78, 115, 95, 'Can you inform me about your special features for this week?', '2023-12-17 00:09:52', 'user', 'restaurant'),
(79, 95, 115, 'Yes Sure', '2023-12-17 00:10:08', 'restaurant', 'user'),
(80, 116, 95, 'HI', '2023-12-17 00:11:01', 'user', 'restaurant'),
(81, 119, 95, 'hi', '2023-12-17 00:21:38', 'user', 'restaurant'),
(82, 95, 119, 'Hlw', '2023-12-17 00:24:52', 'restaurant', 'user'),
(83, 95, 119, 'How can I help you', '2023-12-17 00:25:01', 'restaurant', 'user'),
(84, 95, 115, 'hi', '2023-12-17 09:30:59', 'restaurant', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `offer_post`
--

CREATE TABLE `offer_post` (
  `offer_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer_post`
--

INSERT INTO `offer_post` (`offer_id`, `restaurant_id`, `tittle`, `content`, `image`, `timestamp`, `likes`, `dislike`) VALUES
(10, 95, 'Exclusive 15% Off Burgers for UIU Students at Chef\'s Table Courtside! 🍔🎓', 'Hey UIU Foodies! 🎉\r\n\r\nCalling all burger enthusiasts! Chef\'s Table Courtside is giving UIU students an exclusive treat – 15% off on their mouthwatering burgers! 🍔✨\r\n\r\nHow to Claim:\r\n\r\nFlash your UIU ID.\r\nChoose your favorite burger.\r\nEnjoy a 15% discount!\r\n📆 Limited time only, so gather your squad and head to Chef\'s Table Courtside for a feast! Tag your friends and spread the word. Let the burger celebration begin! 🎊🍟\r\n\r\nNote: Offer subject to change, check with Chef\'s Table Courtside for the latest details.', '../image/restaurant/offerfeatured-stovetop-burgers-recipe.jpg', '2023-12-14 04:04:34', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer_post_comments`
--

CREATE TABLE `offer_post_comments` (
  `comment_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer_post_comments`
--

INSERT INTO `offer_post_comments` (`comment_id`, `restaurant_id`, `offer_id`, `comment_text`, `timestamp`) VALUES
(12, 95, 10, 'hi', '2023-12-16 14:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `offer_post_likes`
--

CREATE TABLE `offer_post_likes` (
  `restaurant_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `liked` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `restaurant_id`) VALUES
(21, 'juice', 'drinks', 140, 'image/restaurant/products/3893913.jpg', 95),
(22, 'Burger', 'fast food', 350, 'image/restaurant/products/featured-stovetop-burgers-recipe.jpg', 95),
(23, 'Coffee', 'drinks', 290, 'image/restaurant/products/gettyimages-500740897.webp', 95),
(37, 'kacchi', 'main dish', 450, 'image/restaurant/products/download.jpeg', 95);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `reservation_time` datetime DEFAULT NULL,
  `num_of_guest` int(11) DEFAULT NULL,
  `initial_payment` decimal(10,2) DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `chosen_products` text DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `payment` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `restaurant_id`, `reservation_time`, `num_of_guest`, `initial_payment`, `instruction`, `chosen_products`, `status`, `payment`) VALUES
(37, 116, 95, '2023-12-16 10:57:00', 2, 440.00, 'Yes,do on time', '21:1', 'completed', 'paid'),
(38, 116, 95, '2023-12-16 10:57:00', 2, 440.00, 'Yes,do on time', '21:1', 'completed', 'paid'),
(39, 116, 95, '2023-12-16 08:58:00', 2, 580.00, 'Yes,do on time', '21:2', 'completed', 'paid'),
(41, 116, 95, '2023-12-16 10:09:00', 10, 440.00, 'Reserve a table', '21:1', 'completed', 'paid'),
(42, 115, 95, '2023-12-16 10:43:00', 2, 440.00, 'I will come on time', '21:1', 'confirmed', 'paid'),
(43, 115, 95, '2023-12-16 11:07:00', 15, 750.00, 'Reserve a table', '37:1', 'pending', 'pending'),
(45, 115, 95, '2023-12-16 11:11:00', 5, 750.00, 'I will come on time', '37:1', 'pending', 'pending'),
(46, 115, 95, '2023-12-16 00:16:00', 3, 750.00, 'Yes,do on time', '37:1', 'pending', 'paid'),
(47, 115, 95, '2023-12-16 12:17:00', 2, 1000.00, 'NO', '22:2', 'pending', 'pending'),
(48, 115, 95, '2023-12-17 19:26:00', 5, 580.00, 'no', '21:2', 'confirmed', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `r_image` varchar(255) NOT NULL,
  `cityCorporation` varchar(255) NOT NULL,
  `policeStaion` varchar(255) NOT NULL,
  `contactNumber1` varchar(14) NOT NULL,
  `contactNumber2` varchar(14) NOT NULL,
  `detailsAddress` varchar(255) NOT NULL,
  `map` varchar(2000) NOT NULL,
  `curr_balance` int(11) NOT NULL,
  `signup_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_name`, `restaurant_id`, `email`, `password`, `type`, `r_image`, `cityCorporation`, `policeStaion`, `contactNumber1`, `contactNumber2`, `detailsAddress`, `map`, `curr_balance`, `signup_time`) VALUES
('Chefs Table Courtside', 95, 'chefstable@gmail.com', '$2y$10$s2o8mLmV4g9TiskiwOTTOe4yzwcuNeIBVIv8jQYEKOkNeoNcbnVXK', 'Restaurant', 'image/restaurants/profile_picture/Chefs-Table-Courtside.jpg', 'Dhaka North', 'Vatara', '01321098083', '01766972627', 'United City, Madani Avenue Near United International University, Dhaka City 1212 Bangladesh', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.5040765827093!2d90.45227007459458!3d23.80066788684616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c97685d22cb9%3A0x5974a5fb4fb4d83f!2sChef%27s+Table+Courtside+~+United+City!5e0!3m2!1sen!2sbd!4v1701795937025!5m2!1sen!2sbd', 27820, '2023-12-04 02:16:21'),
('Kacchi Bhai', 96, 'kacchibhai@gmail.com', '$2y$10$Lry9h/iZCrcSBYc0GKXwHO672MArb88mgbOmLrzbxDI4k3XmZXq3G', 'Restaurant', 'image/restaurant/profilekacchibhai.jpeg', 'Dhaka North', 'Banani', '01712744447', '01726859875', 'Gulshan 2 circle,Gulshan 2,Banani,Dhaka', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.7042933932116!2d90.41174357459434!3d23.793542187120103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7487573ccb9%3A0x992e0a3dd9140342!2sKacchi%20Bhai%20-%20Gulshan!5e0!3m2!1sen!2sbd!4v1701796077481!5m2!1sen!2sbd', 0, '2023-12-04 02:28:33'),
('Cilantro', 97, 'cilantro@gmail.com', '$2y$10$0QF5us2NmmDmFpu.z9rwRuRJ/WMTvWhjfOAMQ2uCjqYabgRISsrCe', 'Restaurant', 'image/restaurant/profile2019-12-30.jpg', 'Dhaka South', 'Dhanmondi', '01719595820', '01712345942', '49 Satmasjid Road, Dhaka 1209', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58432.393266627434!2d90.29857292167969!3d23.746502900000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf4c3d7fb629%3A0x84bdc7652ed6c9f7!2sCilantro!5e0!3m2!1sen!2sbd!4v1701796190918!5m2!1sen!2sbd', 20240, '2023-12-05 10:47:51'),
('Deck 13', 105, 'deck13@gmail.com', '$2y$10$3c7os1X9/MrX2WMlUKcny.jNQbNHIDIoYVmobaaY3KDSQiOmutvVa', 'Restaurant', 'image/restaurant/profile/download.jpeg', 'Dhaka North', 'Dhanmondi', '01712755547', '01726898796', ' Rangs Nasim Square, H.No 275/D (Old), 46 kha (new), 2nd Floor, Road No 16, Dhaka 1209', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.934299793392!2d90.36603617531372!3d23.749722178670837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf4e394877d1%3A0x8cf9bb90e107da2f!2sDeck%2013!5e0!3m2!1sen!2sbd!4v1701802807363!5m2!1sen!2sbd', 0, '2023-12-05 19:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_features`
--

CREATE TABLE `restaurant_features` (
  `restaurant_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant_features`
--

INSERT INTO `restaurant_features` (`restaurant_id`, `feature_id`) VALUES
(95, 1),
(95, 2),
(95, 3),
(95, 4),
(95, 5),
(95, 6),
(95, 11),
(95, 12),
(95, 13),
(95, 14),
(95, 15),
(95, 16),
(95, 17),
(95, 18),
(95, 19),
(95, 20),
(95, 21),
(95, 22),
(95, 23),
(95, 24),
(95, 25),
(95, 26),
(95, 27),
(95, 28),
(95, 29),
(95, 31),
(95, 32),
(95, 33),
(95, 35),
(95, 38),
(95, 39),
(95, 41),
(95, 44),
(95, 48),
(95, 51),
(95, 54),
(95, 55),
(95, 56),
(95, 58),
(95, 59),
(95, 63),
(96, 1),
(96, 2),
(96, 3),
(96, 4),
(96, 5),
(96, 11),
(96, 12),
(96, 13),
(96, 14),
(96, 15),
(96, 29),
(96, 32),
(96, 39),
(96, 48),
(96, 50),
(96, 51),
(96, 53),
(96, 54),
(96, 57),
(96, 58),
(96, 59),
(96, 63),
(97, 1),
(97, 2),
(97, 3),
(97, 4),
(97, 5),
(97, 6),
(97, 11),
(97, 12),
(97, 13),
(97, 15),
(97, 16),
(97, 17),
(97, 18),
(97, 19),
(97, 20),
(97, 21),
(97, 28),
(97, 29),
(97, 32),
(97, 33),
(97, 34),
(97, 35),
(97, 38),
(97, 41),
(97, 44),
(97, 45),
(97, 46),
(97, 47),
(97, 48),
(97, 50),
(97, 51),
(97, 54),
(97, 55),
(97, 56),
(97, 57),
(97, 58),
(97, 59),
(97, 62),
(97, 63),
(105, 1),
(105, 2),
(105, 3),
(105, 4),
(105, 5),
(105, 6),
(105, 7),
(105, 11),
(105, 12),
(105, 13),
(105, 15),
(105, 16),
(105, 38),
(105, 39),
(105, 48),
(105, 50),
(105, 51),
(105, 52),
(105, 57),
(105, 58);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_image`
--

CREATE TABLE `restaurant_image` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `review_text` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(14) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `curr_balance` int(11) NOT NULL,
  `signup_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `address`, `type`, `password`, `phone_no`, `Gender`, `profile_picture`, `curr_balance`, `signup_time`) VALUES
(114, 'Yasin', 'Dewan', 'dewaneasin@gmail.com', 'Uttara,Dhaka', 'Customer', '$2y$10$WSdixPTp1Nkh4HflpQ1gPefyEUzWvdCZiZ2DNCvcCp2XljSNGgiC6', '1635020204', 'MALE', 'image/customers/profile_picture138299098_2835154513421196_2427720257165028376_n.jpg', 0, '2023-12-04 20:05:42'),
(115, 'S. M. Shahriar Rahman ', 'Maruph', 'smmaruph.bhbd2001@gmail.com', 'Natunbazar, Vatara, Dhaka.', 'Customer', '$2y$10$zAnZ9Oc.OKkD8yi1dp.xhuBKLEvWS.Zsz8oFlrjH7dgvUjQuDUlby', '01766972626', 'Male', 'image/customers/profile_picture/138299098_2835154513421196_2427720257165028376_n.jpg', 8230, '2023-12-06 03:47:17'),
(116, 'MD.', 'Nayemur Rahman', 'nayemurstudent@gmail.com', 'Natunbazar, Vatara, Dhaka.', 'Customer', '$2y$10$lCCnPQM6F6DRBAAADJh7Ju8kV2/.fkS6TSdZErQ/yZpyke8yM8is2', '+8801766972626', 'Male', 'image/customers/profile_picture/340625334_605625974776018_1032563896059665037_n.jpg', 1920, '2023-12-06 03:47:48'),
(117, 'MD.', 'Dewan', 'dewan@gmail.com', 'Uttara,Dhaka', 'Customer', '$2y$10$/MlVqRH0B/ZY28fRgVPmzur5hvWvXbhFwg5FolHrfwLQEcKT/uwSO', '1635020204', 'Male', 'image/customers/profile_picture/147101842_234228028293770_5638769308123091830_n.jpg', 0, '2023-12-07 19:25:45'),
(119, 'Provat kundu', 'Shawon', 'pk@gmail.com', 'Natunbazar, Vatara, Dhaka.', 'Customer', '$2y$10$3aDA7L4jYrCfUMvY8y7/QOFrGeGUAxbU/TV4yugeCXsCGdIgH0ale', '01766972629', 'Male', 'image/customers/profile_picture/395462195_1032193137906052_8377360324447465153_n.jpg', 0, '2023-12-08 00:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_blogs`
--

CREATE TABLE `user_blogs` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_blogs`
--

INSERT INTO `user_blogs` (`blog_id`, `user_id`, `title`, `content`, `image`, `timestamp`, `likes`, `dislikes`) VALUES
(18, 115, 'Nice place To go', 'It\'s a sample content. Thank you', 'image/customers/blogChefs-Table-Courtside.jpg', '2023-12-15 12:27:02', 2, 0),
(19, 115, 'Hi there ,The decoration of the restaurant is so niceful.', 'This is a sample content', 'image/customers/blog360_F_324739203_keeq8udvv0P2h1MLYJ0GLSlTBagoXS48.jpg', '2023-12-16 12:34:43', 2, 0),
(20, 115, 'Hi there good afternoon', 'This is a sample content', 'image/customers/blogZero-interior_feature-900x600.jpg', '2023-12-16 12:37:08', 2, 0),
(21, 116, 'One of the best interior for a restaurant in Dhaka City', 'This is a sample text', 'image/customers/blogRestaurent-design-bd.jpg', '2023-12-16 12:41:45', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_blog_comments`
--

CREATE TABLE `user_blog_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_blog_comments`
--

INSERT INTO `user_blog_comments` (`comment_id`, `user_id`, `blog_id`, `comment_text`, `timestamp`) VALUES
(79, 115, 18, 'Amazing place', '2023-12-15 12:27:24'),
(80, 115, 18, 'hi', '2023-12-15 22:32:25'),
(81, 115, 18, 'hi', '2023-12-15 22:48:11'),
(82, 115, 18, 'it', '2023-12-15 22:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_blog_likes`
--

CREATE TABLE `user_blog_likes` (
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_blog_likes`
--

INSERT INTO `user_blog_likes` (`user_id`, `blog_id`, `liked`) VALUES
(115, 18, 1),
(115, 19, 1),
(115, 20, 1),
(116, 18, 1),
(116, 19, 1),
(116, 20, 1),
(116, 21, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservation_id` (`reservation_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `offer_post`
--
ALTER TABLE `offer_post`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `fk_restaurant_id` (`restaurant_id`);

--
-- Indexes for table `offer_post_comments`
--
ALTER TABLE `offer_post_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_post_comment_restaurant` (`restaurant_id`);

--
-- Indexes for table `offer_post_likes`
--
ALTER TABLE `offer_post_likes`
  ADD PRIMARY KEY (`restaurant_id`,`offer_id`) USING BTREE,
  ADD KEY `fk_column3` (`offer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `restaurant_features`
--
ALTER TABLE `restaurant_features`
  ADD PRIMARY KEY (`restaurant_id`,`feature_id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `restaurant_image`
--
ALTER TABLE `restaurant_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_blogs`
--
ALTER TABLE `user_blogs`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_blog_comments`
--
ALTER TABLE `user_blog_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `FK_user_blog` (`user_id`);

--
-- Indexes for table `user_blog_likes`
--
ALTER TABLE `user_blog_likes`
  ADD PRIMARY KEY (`user_id`,`blog_id`,`liked`),
  ADD KEY `blog_id` (`blog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `offer_post`
--
ALTER TABLE `offer_post`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offer_post_comments`
--
ALTER TABLE `offer_post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `restaurant_image`
--
ALTER TABLE `restaurant_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `user_blogs`
--
ALTER TABLE `user_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_blog_comments`
--
ALTER TABLE `user_blog_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`);

--
-- Constraints for table `offer_post`
--
ALTER TABLE `offer_post`
  ADD CONSTRAINT `fk_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `offer_post_comments`
--
ALTER TABLE `offer_post_comments`
  ADD CONSTRAINT `FK_post_comment_restaurant` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `offer_post_likes`
--
ALTER TABLE `offer_post_likes`
  ADD CONSTRAINT `fk_column1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_column2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_column3` FOREIGN KEY (`offer_id`) REFERENCES `offer_post` (`offer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `restaurant_features`
--
ALTER TABLE `restaurant_features`
  ADD CONSTRAINT `restaurant_features_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`),
  ADD CONSTRAINT `restaurant_features_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`);

--
-- Constraints for table `restaurant_image`
--
ALTER TABLE `restaurant_image`
  ADD CONSTRAINT `restaurant_image_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`);

--
-- Constraints for table `user_blogs`
--
ALTER TABLE `user_blogs`
  ADD CONSTRAINT `user_blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_blog_comments`
--
ALTER TABLE `user_blog_comments`
  ADD CONSTRAINT `FK_user_blog` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_blog_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_blog_comments_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `user_blogs` (`blog_id`);

--
-- Constraints for table `user_blog_likes`
--
ALTER TABLE `user_blog_likes`
  ADD CONSTRAINT `user_blog_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_blog_likes_ibfk_2` FOREIGN KEY (`blog_id`) REFERENCES `user_blogs` (`blog_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
