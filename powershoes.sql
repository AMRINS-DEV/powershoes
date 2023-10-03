-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2023 at 08:49 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21035709_powershoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_vector` varchar(100) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `added`, `admin_vector`) VALUES
(1, 'Jamal', 'q', 'q', '0623820154', '2023-07-19 00:49:45', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`address_id`, `customer_id`, `city`, `province`, `zipcode`, `adress`) VALUES
(1, 1, 'asd', 'das', 231, 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `post_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(500) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`post_id`, `post_title`, `post_content`, `post_image`, `posted_by`, `added`) VALUES
(16, 'generator on the Internet. It uses a dictionary ', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'post_3c51413cf3047ab1c67ada6280b98f85_test - Copy.webp', 'Jamal', '2023-07-19 23:02:43'),
(17, 'generator on the Internet. It uses a dictionary ', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'post_9a951627fddbd5a18c63de19d130f001_img (1).jpg', 'Jamal', '2023-07-19 23:03:30'),
(18, 'Lorem Ipsum which looks reasonable', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'post_191e8a1f48514e8cf56dd9f7d9be003e_matthew-henry-2Ts5HnA67k8-unsplash.jpg', 'Jamal', '2023-07-19 23:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `com_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `com_content` text NOT NULL,
  `com_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`com_id`, `customer_id`, `post_id`, `com_content`, `com_added`) VALUES
(1, 2, 16, 'de', '2023-07-19 23:29:30'),
(2, 2, 17, 'gddfg', '2023-07-19 23:53:45'),
(3, 2, 17, 'cc', '2023-07-19 23:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `name`, `email`, `subject`, `message`, `added`) VALUES
(3, 'hj', 'hj', 'hj', 'hjhjjh', '2023-07-19 23:48:33'),
(4, '1', '2', '3', '4', '2023-07-19 23:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `customer_vector` varchar(100) NOT NULL DEFAULT 'user.png',
  `customer_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `customer_vector`, `customer_added`) VALUES
(1, 'j a', 'a', '0cc175b9c0f1b6a831c399e269772661', '23123', 'user.png', '2023-07-19 00:27:23'),
(2, 'as', 'as ', 'f970e2767d0cfe75876ea857f92e319b', NULL, 'user.png', '2023-07-19 18:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `added` timestamp NOT NULL DEFAULT current_timestamp(),
  `confirmed_on` datetime DEFAULT NULL,
  `delivered_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `size_id`, `count`, `confirmed`, `delivered`, `added`, `confirmed_on`, `delivered_on`) VALUES
(1, 1, 6, 45, 2, 1, 0, '2023-07-19 00:32:05', NULL, NULL),
(2, 1, 6, 45, 5, 0, 0, '2023-07-19 01:01:30', NULL, NULL),
(3, 1, 8, 55, 1, 1, 0, '2023-07-19 01:02:06', NULL, NULL),
(4, 1, 7, 5, 3, 0, 0, '2023-07-19 01:03:47', NULL, NULL),
(5, 1, 10, 21, 2, 0, 0, '2023-07-19 01:25:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `description` text NOT NULL,
  `product_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited` timestamp NULL DEFAULT NULL,
  `varient` varchar(10) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `discount`, `description`, `product_added`, `edited`, `varient`, `brand`, `category`) VALUES
(12, 'Nike Air Force 1', 1049, 0.2, 'Classics never fade away, just like the Nike Air Force 1 Low Retro is forever fresh. Packed with OG details, these sneakers put the legacy of sports and fashion under your feet. Adorned with stitched leather overlays, the durable upper pays tribute to the Air Force 1 heritage while delivering all-day ease. The signature Air-sole unit ensures cushiony comfort on the go. Own the streets in the celebrated style of the Nike Air Force 1 Low Retro.', '2023-07-19 18:45:37', NULL, 'ffffff', 'Nike', 'Shoes'),
(13, 'Nike React Vision', 79.99, 0.3, 'SURREAL COMFORT. BORN FROM DREAMS.The Nike React Vision is a story of surreal comfort. Layered textures, shapes and vivid colours are combined in a design influenced by the exaggerated world of our dreams, while React foam and an ultra-plush tongue provide surreal comfort.Dreamworld ExtravaganceRichly textured fabrics add to the continuously shifting sensation. In combination with a transparent heel clip and distorted sides, they create a unique layered look.Futuristic MaterialsThe revolutionary seamless mesh on the upper allows for colour pops and surreal textures. Its subtle pattern adds the perfect amount of bite to your look.Dream-Like ComfortNike React foam delivers unrivalled all-day comfort while the ultra-plush tongue combines with the padded heel for a soft, dreamlike feel.DIY StyleExposed stitching on the heel and tongue combines with the patchwork eyestays for a multi-dimensional, DIY look.Product DetailsRubber pods on the sole add traction and durabilityD/MS/X label on pull tabs and insoleOutlined Swoosh is printed on side', '2023-07-19 18:48:04', NULL, '9A82DD', 'Nike', 'Shoes'),
(15, 'Asics Gel Venture 6', 115.25, 0.1, 'Feel nothing but comfort as you lace up the ASICS Gel Venture 6. Made to be worn almost anywhere, these versatile shoes ensure ease and a laid-back look as you head out and about. Trail-inspired, the rearfoot GEL technology in these shoes brings in extra cushioning to increase shock absorption. Designed with the AHAR outsole, these silhouettes offer incredible traction and grip. Get fit, stay fuss-free, and look awesome in the ASICS Gel Venture 6.', '2023-07-19 22:27:03', NULL, '000000', 'Asics', 'Shoes'),
(16, 'Nike Dunk Low', 119.99, 0.15, 'Get ready to be a style pro with the Nike Dunk Low. Born on the hardwood, these ’80s inspired sneakers seamlessly blend street-ready edginess and sporty comfort. Giving a throwback feel of the original Dunk, the mixed leather upper adds a premium look and durability to your stride. The traction of the rubber outsole keeps your steps gripped and grounded, so you’re always ready to win.', '2023-07-19 22:28:37', NULL, '000000', 'Nike', 'Shoes'),
(17, 'Jordan 1 Low', 1110, 0, 'ALWAYS FRESH.Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look that\'s familiar yet always fresh. With an iconic design that pairs perfectly with any \'fit, these kicks ensure you\'ll always be on point.BenefitsEncapsulated Air-Sole unit provides lightweight cushioning.Genuine leather in the upper offers durability and a premium look.Solid rubber outsole enhances traction on a variety of surfaces.Tried and TrueA timeless rubber cupsole teams up with a plush sockliner and encapsulated Nike Air cushioning for all-day comfort. A rubber outsole supplies durable traction on a variety of surfaces.', '2023-07-19 22:37:40', NULL, '9A82DD', 'Jordan', 'Power Shoes'),
(18, 'Jordan One Take 4', 1240, 0, 'Get that speed you need, just like Russ. Inspired by Russell Westbrook\'s latest signature shoe, the outsole of the Jordan One Take 4 wraps up nearly to the midsole so you can start, stop or change direction in an instant. Meanwhile, energy-returning Zoom Air cushioning in the forefoot keeps you goin\' (and goin\' and goin\').Up-Front ResponseThe Zoom Air unit in the forefoot is top-loaded, bringing the responsive sensation closer to your foot when you\'re driving hard down the court.Cool ContainmentMade from synthetic leather, Ripstop and mesh, the airy-yet-durable upper keeps you contained with a unique, asymmetrical design. Lock loops give your feet even more security on the court.More BenefitsMidfoot plate runs through the shoe for added stability.Herringbone outsole provides ample traction.', '2023-07-19 22:37:43', NULL, '39ED8C', 'Jordan', 'Power Shoes'),
(19, 'Nike Air Trainer', 1235, 0, 'Fresh colour trims the clean, classic materials, imbuing modernity into a classic design.BenefitsAn Air-Sole unit provides lightweight cushioning.Real and synthetic leather in the upper offers durability and structure.A solid rubber outsole gives you traction on a variety of surfaces.Textile tongue feels soft and comfortable.', '2023-07-19 22:37:47', NULL, 'F36768', 'Nike', 'Power Shoes'),
(20, 'Jordan 1 Mid', 2032, 0.2, 'FRESH COLOUR, FAMILIAR DESIGN.Inspired by the original AJ1, the Air Jordan 1 Mid offers fans a chance to follow in MJ\'s footsteps. Fresh colour trims the clean, classic materials, imbuing modernity into a classic design.BenefitsAn Air-Sole unit provides lightweight cushioning.Real and synthetic leather in the upper offers durability and structure.A solid rubber outsole gives you traction on a variety of surfaces.Textile tongue feels soft and comfortable.', '2023-07-19 22:37:50', NULL, 'ECA23A', 'Jordan', 'Power Shoes'),
(21, 'adidas LA Trainer 1', 89.99, 0.1, 'If timeless luxury is your way to go, then the adidas Stan Smith is the perfect pick. Versatile and truly classic, these sneakers set you apart from the crowd. Featuring branded monogram for a luxe touch, the leather upper is a bundle of durability and elegance. The breathable textile lining feels soft and keeps your strides as fresh as ever while you walk to own the style game.', '2023-07-19 22:47:35', NULL, '000000', 'adidas', 'Electric Shoes'),
(22, 'Nike Air Force 1 Low', 134.99, 0, 'Bring vintage vibes to your everyday rotation with the Nike Air Force 1 Low. Made with a suede and leather upper, these shoes bring in durability and a cool, edgy look. Fitted with Nike Air cushioning, these shoes provide proper comfort and responsiveness as you head out for the day. The added, low-cut collar offers extra snugness, while the bold colorways spruce up your look.', '2023-07-19 22:47:38', NULL, 'ECA23A', 'Nike', 'Electric Shoes'),
(23, 'Nike Air Force 1 Low', 134.99, 0.2, 'Classics never fade away, just like the Nike Air Force 1 Low Retro is forever fresh. Packed with OG details, these sneakers put the legacy of sports and fashion under your feet. Adorned with stitched leather overlays, the durable upper pays tribute to the Air Force 1 heritage while delivering all-day ease. The signature Air-sole unit ensures cushiony comfort on the go. Own the streets in the celebrated style of the Nike Air Force 1 Low Retro.', '2023-07-19 22:47:40', NULL, 'A6ED42', 'Nike', 'Electric Shoes'),
(24, 'Jordan 1 Mid', 114.99, 0.1, 'FRESH COLOUR, FAMILIAR DESIGN.Inspired by the original AJ1, the Air Jordan 1 Mid offers fans a chance to follow in MJ\'s footsteps. Fresh colour trims the clean, classic materials, imbuing modernity into a classic design.BenefitsAn Air-Sole unit provides lightweight cushioning.Real and synthetic leather in the upper offers durability and structure.A solid rubber outsole gives you traction on a variety of surfaces.Textile tongue feels soft and comfortable.', '2023-07-19 22:47:43', NULL, '82C2DB', 'Jordan', 'Electric Shoes'),
(25, 'Nike Air Max 90', 1998, 0.3, 'Walking just became more fun with the Nike Air Max 90. The sneaker has kept true to its original design and comes in cool classic colorways that can be paired effortlessly with any outfit you choose. Stitched overlays add a pop of style. The padded ankle and Max Air unit add an extra layer of cushioning and make daily activities a breeze. It’s easy to make a style statement when you sport an Air Max 90.', '2023-07-19 22:57:50', NULL, 'EED739', 'Nike', 'Sports Shoes'),
(26, 'Nike Air Max Tuned 3', 789, 0.3, 'Rep some running legacy with every step you take while sporting the Nike Air Max Plus 3. Taking the best from Nike’s iconic sneakers in the past, these AM shoes nod to retro futurism. The upper blends synthetic leather and mesh to deliver flexible ease and proper breathability in one go. Located at the heel and forefoot, the signature Max Air unit keeps your strides cushioned and full of energy. Enabling great traction and sure-footed grip, the rubber outsole gets you ready to step into the glorious future.', '2023-07-19 22:57:53', NULL, 'ffffff', 'Nike', 'Sports Shoes'),
(27, 'Nike Gamma Force', 962, 0.1, 'Layers upon layers of dimensional style—that\'s a force to be reckoned with. Offering both comfort and versatility, these kicks are rooted in heritage basketball culture. Collar materials pay homage to vintage sport while the subtle platform elevates your look, literally. The Gamma Force is forging its own legacy: court style that can be worn all day, wherever you go. Speckled Nike Grind rubber outsole contains at least 5% recycled content. Rubber midsole. Debuting in 1982 as a basketball must-have, the Air Force 1 came into its own in the \'90s. The clean look of the classic white-on-white AF-1 was endorsed from the basketball courts to the street and beyond. Finding its rhythm in hip-hop culture, releasing limited collabs and colourways, Air Force 1 became an iconic sneaker around the globe. And with over 2,000 iterations of this staple, its impact on fashion, music and sneaker culture can\'t be denied.', '2023-07-19 22:57:56', NULL, '000000', 'Nike', 'Sports Shoes'),
(28, 'adidas Stan Smith', 1255, 0.3, 'Influencing sports, fashion and the streets for 50 years and counting, the adidas Stan Smith shoes show off their versatility through a denim upper made with organic cotton. The heel tab and tongue take on leather accents adding subtle contrasts while leaning into the classic denim pants look. The always-sleek shape and subtle tones leave your styling options wide open. This shoe is made with natural and renewable materials as part of our journey to design out finite resources and help end plastic waste. Regular fit. Lace closure. Denim upper. Textile lining. Rubber outsole.', '2023-07-19 22:57:59', NULL, 'ffffff', 'adidas', 'Sports Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `product_image`, `added`, `edited`) VALUES
(38, 12, 'product_12_314101996404_02.webp', '2023-07-19 18:45:37', NULL),
(39, 12, 'product_12_314101996404_03.webp', '2023-07-19 18:45:37', NULL),
(40, 12, 'product_12_314101996404_05.webp', '2023-07-19 18:45:37', NULL),
(41, 12, 'product_12_314101996404_06.webp', '2023-07-19 18:45:38', NULL),
(42, 13, 'product_13_314210672904_03.webp', '2023-07-19 18:48:05', NULL),
(43, 13, 'product_13_314210672904_05.webp', '2023-07-19 18:48:05', NULL),
(44, 13, 'product_13_314210672904_06.webp', '2023-07-19 18:48:05', NULL),
(45, 13, 'product_13_314210672904_02.webp', '2023-07-19 18:48:05', NULL),
(50, 15, 'product_15_314207936304_02.webp', '2023-07-19 22:27:03', NULL),
(51, 15, 'product_15_314207936304_03.webp', '2023-07-19 22:27:03', NULL),
(52, 15, 'product_15_314207936304_05.webp', '2023-07-19 22:27:03', NULL),
(53, 15, 'product_15_314207936304_06.webp', '2023-07-19 22:27:03', NULL),
(54, 16, 'product_16_314105518204_02.webp', '2023-07-19 22:28:38', NULL),
(55, 16, 'product_16_314105518204_03.webp', '2023-07-19 22:28:38', NULL),
(56, 16, 'product_16_314105518204_05.webp', '2023-07-19 22:28:38', NULL),
(57, 16, 'product_16_314105518204_06.webp', '2023-07-19 22:28:38', NULL),
(58, 17, 'product_17_314105116504_03.webp', '2023-07-19 22:37:40', NULL),
(59, 17, 'product_17_314105116504_05.webp', '2023-07-19 22:37:40', NULL),
(60, 17, 'product_17_314105116504_06.webp', '2023-07-19 22:37:40', NULL),
(61, 17, 'product_17_314105116504_02.webp', '2023-07-19 22:37:40', NULL),
(62, 18, 'product_18_314101371004_02.webp', '2023-07-19 22:37:44', NULL),
(63, 18, 'product_18_314101371004_03.webp', '2023-07-19 22:37:44', NULL),
(64, 18, 'product_18_314101371004_05.webp', '2023-07-19 22:37:44', NULL),
(65, 18, 'product_18_314101371004_06.webp', '2023-07-19 22:37:44', NULL),
(66, 19, 'product_19_314105527304_06.webp', '2023-07-19 22:37:47', NULL),
(67, 19, 'product_19_314105527304_02.webp', '2023-07-19 22:37:47', NULL),
(68, 19, 'product_19_314105527304_04.webp', '2023-07-19 22:37:47', NULL),
(69, 19, 'product_19_314105527304_05.webp', '2023-07-19 22:37:47', NULL),
(70, 20, 'product_20_314105535604_02.webp', '2023-07-19 22:37:50', NULL),
(71, 20, 'product_20_314105535604_03.webp', '2023-07-19 22:37:50', NULL),
(72, 20, 'product_20_314105535604_05.webp', '2023-07-19 22:37:50', NULL),
(73, 20, 'product_20_314105535604_06.webp', '2023-07-19 22:37:50', NULL),
(74, 21, 'product_21_314215930604_02.webp', '2023-07-19 22:47:35', NULL),
(75, 21, 'product_21_314215930604_03.webp', '2023-07-19 22:47:35', NULL),
(76, 21, 'product_21_314215930604_05.webp', '2023-07-19 22:47:35', NULL),
(77, 21, 'product_21_314215930604_06.webp', '2023-07-19 22:47:35', NULL),
(78, 22, 'product_22_314105172804_02.webp', '2023-07-19 22:47:38', NULL),
(79, 22, 'product_22_314105172804_03.webp', '2023-07-19 22:47:38', NULL),
(80, 22, 'product_22_314105172804_05.webp', '2023-07-19 22:47:38', NULL),
(81, 22, 'product_22_314105172804_06.webp', '2023-07-19 22:47:38', NULL),
(82, 23, 'product_23_314105046404_02.webp', '2023-07-19 22:47:41', NULL),
(83, 23, 'product_23_314105046404_03.webp', '2023-07-19 22:47:41', NULL),
(84, 23, 'product_23_314105046404_05.webp', '2023-07-19 22:47:41', NULL),
(85, 23, 'product_23_314105046404_06.webp', '2023-07-19 22:47:41', NULL),
(86, 24, 'product_24_314105097704_02.webp', '2023-07-19 22:47:44', NULL),
(87, 24, 'product_24_314105097704_03.webp', '2023-07-19 22:47:44', NULL),
(88, 24, 'product_24_314105097704_05.webp', '2023-07-19 22:47:44', NULL),
(89, 24, 'product_24_314105097704_06.webp', '2023-07-19 22:47:44', NULL),
(90, 25, 'product_25_315215028002_02.webp', '2023-07-19 22:57:50', NULL),
(91, 25, 'product_25_315215028002_03.webp', '2023-07-19 22:57:51', NULL),
(92, 25, 'product_25_315215028002_05.webp', '2023-07-19 22:57:51', NULL),
(93, 25, 'product_25_315215028002_06.webp', '2023-07-19 22:57:51', NULL),
(94, 26, 'product_26_314210663804_02.webp', '2023-07-19 22:57:53', NULL),
(95, 26, 'product_26_314210663804_03.webp', '2023-07-19 22:57:53', NULL),
(96, 26, 'product_26_314210663804_05.webp', '2023-07-19 22:57:53', NULL),
(97, 26, 'product_26_314210663804_06.webp', '2023-07-19 22:57:54', NULL),
(98, 27, 'product_27_315347440802_02.webp', '2023-07-19 22:57:56', NULL),
(99, 27, 'product_27_315347440802_03.webp', '2023-07-19 22:57:56', NULL),
(100, 27, 'product_27_315347440802_05.webp', '2023-07-19 22:57:56', NULL),
(101, 27, 'product_27_315347440802_06.webp', '2023-07-19 22:57:56', NULL),
(102, 28, 'product_28_314311429204_01.webp', '2023-07-19 22:58:00', NULL),
(103, 28, 'product_28_314311429204_02.webp', '2023-07-19 22:58:00', NULL),
(104, 28, 'product_28_314311429204_03.webp', '2023-07-19 22:58:00', NULL),
(105, 28, 'product_28_314311429204_06.webp', '2023-07-19 22:58:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `rev_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rev_comment` text NOT NULL,
  `rev_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`rev_id`, `customer_id`, `product_id`, `rev_comment`, `rev_added`) VALUES
(1, 2, 21, 'fdgfgdgfd', '2023-07-19 23:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` double NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp(),
  `edited` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`size_id`, `product_id`, `size`, `quantity`, `added`, `edited`) VALUES
(15, 12, 5, 23, '2023-07-19 18:45:37', NULL),
(16, 12, 7, 36, '2023-07-19 18:45:37', NULL),
(17, 12, 8, 58, '2023-07-19 18:45:37', NULL),
(18, 13, 5, 45, '2023-07-19 18:48:04', NULL),
(19, 13, 5.5, 86, '2023-07-19 18:48:05', NULL),
(20, 13, 6, 8, '2023-07-19 18:48:05', NULL),
(21, 13, 8, 89, '2023-07-19 18:48:05', NULL),
(22, 13, 8.5, 47, '2023-07-19 18:48:05', NULL),
(23, 13, 11, 25, '2023-07-19 18:48:05', NULL),
(26, 15, 7, 22, '2023-07-19 22:27:03', NULL),
(27, 15, 7.5, 45, '2023-07-19 22:27:03', NULL),
(28, 15, 8, 78, '2023-07-19 22:27:03', NULL),
(29, 15, 9, 65, '2023-07-19 22:27:03', NULL),
(30, 16, 8, 241, '2023-07-19 22:28:37', NULL),
(31, 16, 9, 41, '2023-07-19 22:28:38', NULL),
(32, 17, 9, 58, '2023-07-19 22:37:40', NULL),
(33, 17, 8, 654, '2023-07-19 22:37:40', NULL),
(34, 17, 10, 25, '2023-07-19 22:37:40', NULL),
(35, 18, 4, 96, '2023-07-19 22:37:44', NULL),
(36, 18, 5, 89, '2023-07-19 22:37:44', NULL),
(37, 18, 6, 58, '2023-07-19 22:37:44', NULL),
(38, 18, 8, 63, '2023-07-19 22:37:44', NULL),
(39, 19, 8, 52, '2023-07-19 22:37:47', NULL),
(40, 19, 9, 55, '2023-07-19 22:37:47', NULL),
(41, 20, 8, 99, '2023-07-19 22:37:50', NULL),
(42, 20, 9, 99, '2023-07-19 22:37:50', NULL),
(43, 20, 5, 99, '2023-07-19 22:37:50', NULL),
(44, 20, 4, 99, '2023-07-19 22:37:50', NULL),
(45, 21, 7, 98, '2023-07-19 22:47:35', NULL),
(46, 21, 6, 87, '2023-07-19 22:47:35', NULL),
(47, 21, 8, 56, '2023-07-19 22:47:35', NULL),
(48, 22, 11, 54, '2023-07-19 22:47:38', NULL),
(49, 23, 5, 123, '2023-07-19 22:47:41', NULL),
(50, 23, 5.5, 25, '2023-07-19 22:47:41', NULL),
(51, 23, 8, 456, '2023-07-19 22:47:41', NULL),
(52, 23, 8.5, 23, '2023-07-19 22:47:41', NULL),
(53, 23, 11, 78, '2023-07-19 22:47:41', NULL),
(54, 24, 9, 88, '2023-07-19 22:47:43', NULL),
(55, 24, 8, 52, '2023-07-19 22:47:44', NULL),
(56, 24, 4.5, 66, '2023-07-19 22:47:44', NULL),
(57, 25, 5, 58, '2023-07-19 22:57:50', NULL),
(58, 25, 4, 52, '2023-07-19 22:57:50', NULL),
(59, 25, 6, 25, '2023-07-19 22:57:50', NULL),
(60, 25, 10, 52, '2023-07-19 22:57:50', NULL),
(61, 26, 11, 895, '2023-07-19 22:57:53', NULL),
(62, 27, 12, 45, '2023-07-19 22:57:56', NULL),
(63, 27, 12.5, 54, '2023-07-19 22:57:56', NULL),
(64, 27, 13, 56, '2023-07-19 22:57:56', NULL),
(65, 27, 10, 123, '2023-07-19 22:57:56', NULL),
(66, 28, 5, 55, '2023-07-19 22:58:00', NULL),
(67, 28, 6, 64, '2023-07-19 22:58:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
