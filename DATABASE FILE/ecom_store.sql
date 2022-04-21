-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2022 at 03:00 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us - Our Story for Hug With Mug Co.', 'Coffee. For some people, it’s more than a drink. It’s a way to connect. It’s a way to share moments. And, ok, sometimes it’s just a way to wake up and get work done.\r\n\r\n\r\n', 'Hug With Mug Co. is the collective vision of a small group of Computer Science students at the University of Texas at San Antonio for the Software Engineering course.\r\nEver since we joined together as a group, we decided coffee was the perfect thing to sell. It is a daily part of all our lives and routines, so when it came to picking a theme- coffee was a no-brainer! \r\n\r\n\r\nSo say hello to Hug With Mug Coffee Co. - I hope you like it.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'Administrator', 'admin@mail.com', 'Password@123', 'user-profile-min.png', '7777775500', 'Morocco', 'Front-End Developer', ' Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical ');

-- --------------------------------------------------------

--
-- Table structure for table `bundle_product_relation`
--

CREATE TABLE `bundle_product_relation` (
  `rel_id` int NOT NULL,
  `rel_title` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `bundle_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `coupon` int DEFAULT NULL,
  `flag` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `p_price`, `size`, `coupon`, `flag`) VALUES
(33, '136.50.168.49', 1, '6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Coffee', 'no', 'feminelg.png'),
(2, 'Tea', 'no', 'kidslg.jpg'),
(3, 'Merch', 'yes', 'othericon.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'ecomstore@mail.com', 'Contact  To Us', 'If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int NOT NULL,
  `product_id` int NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int NOT NULL,
  `coupon_used` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(6, 14, 'Sale', '65', 'CODEASTRO', 3, 1),
(12, 32, 'Sale', '5', 'HUGWMUG5OFF', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `username`, `customer_email`, `customer_pass`, `customer_contact`, `customer_address`) VALUES
(2, '', 'test_user', 'user@ave.com', '123', '0092334566931', 'new york'),
(3, '', 'test_user_2', 'demo@customer.com', 'Password123', '700000000', 'DemoAddress'),
(4, '', 'UTSA_user', 'thomas@demo.com', 'Password123', '777777777', '111 Address'),
(5, '', 'hellokitty', 'test@customer.com', 'Password123', '780000000', '112 Bleck Street'),
(6, '', 'smpl_user', 'customer@mail.com', 'Password123', '7800000000', 'Sample Address'),
(10, 'Kassie Garcia', 'hamtaro', 'kassiejgarcia@gmail.com', '$2y$10$YitACqQ5IJd2UTYgYAqv2.sdCfbF3vKL09.72v9p8StDmVyev26ae', '210210210', 'san antonio '),
(11, 'herm', 'herm', 'herm@coffee.com', '$2y$10$dTqLaF/F4m6IKjoGW1Ppf.h4/utk/NXJRuA9WE1j6Xw/wSIBbarAy', '210-111-1234', 'UTSA blvd'),
(12, 'herm', 'hg', 'hg@example.com', '$2y$10$P0e1Vhpfjcqx217OKSLegeGxai1RvS.AAsJfkMZghuKb29xghAJha', '2101234567', 'utsa blvd');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `due_amount` int NOT NULL,
  `invoice_no` int NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_status`) VALUES
(33, 10, 10, 533714995, 1, '', 'pending'),
(34, 10, 38, 533714995, 2, '', 'pending'),
(35, 10, 21, 533714995, 1, '', 'pending'),
(36, 10, 15, 533714995, 1, '', 'pending'),
(37, 10, 21, 533714995, 1, '', 'pending'),
(38, 10, 16, 801177859, 1, '', 'pending'),
(39, 10, 12, 2084351728, 2, '', 'pending'),
(40, 10, 12, 235453125, 2, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_types`
--

CREATE TABLE `enquiry_types` (
  `enquiry_id` int NOT NULL,
  `enquiry_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_types`
--

INSERT INTO `enquiry_types` (`enquiry_id`, `enquiry_title`) VALUES
(1, 'Order and Delivery Support'),
(2, 'Technical Support'),
(3, 'Price Concern');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(2, 'Adidas', 'no', 'adilg.png'),
(3, 'Nike', 'no', 'niketransl.png'),
(4, 'Philip Plein', 'no', 'pplg.png'),
(5, 'Lacoste', 'no', 'lacostelg.png'),
(7, 'Polo', 'no', 'polobn.jpg'),
(8, 'Gildan 1800', 'no', 'sample_img360.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_summary`
--

CREATE TABLE `order_summary` (
  `subtotal` int NOT NULL,
  `shipping` int NOT NULL,
  `tax` float NOT NULL,
  `total` float NOT NULL,
  `coupon_price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int NOT NULL,
  `code` int NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(2, 1607603019, 447, 'UBL/Omni', 5678, 33, '11/1/2016'),
(3, 314788500, 345, 'UBL/Omni', 443, 865, '11/1/2016'),
(4, 6906, 400, 'Western Union', 101025780, 696950, 'January 1'),
(5, 10023, 20, 'Bank Code', 1000010101, 6969, '09/14/2021'),
(6, 69088, 100, 'Bank Code', 1010101022, 88669, '09/14/2021'),
(7, 1835758347, 480, 'Western Union', 1785002101, 66990, '09-04-2021'),
(8, 1835758347, 480, 'Bank Code', 1012125550, 66500, '09-14-2021'),
(9, 1144520, 480, 'Bank Code', 1025000020, 66990, '09-14-2021'),
(10, 2145000000, 480, 'Bank Code', 2147483647, 66580, '09-14-2021'),
(20, 858195683, 100, 'Bank Code', 1400256000, 47850, '09-13-2021'),
(21, 2138906686, 120, 'Bank Code', 1455000020, 202020, '09-13-2021'),
(22, 2138906686, 120, 'Bank Code', 1450000020, 202020, '09-15-2021'),
(23, 361540113, 180, 'Western Union', 1470000020, 12001, '09-15-2021'),
(24, 361540113, 180, 'UBL/Omni', 1258886650, 200, '09-15-2021'),
(25, 901707655, 245, 'Western Union', 1200002588, 88850, '09-15-2021');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `product_id` text NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(33, 10, 533714995, '9', 1, '', 'pending'),
(34, 10, 533714995, '27', 2, '', 'pending'),
(35, 10, 533714995, '29', 1, '', 'pending'),
(36, 10, 533714995, '30', 1, '', 'pending'),
(37, 10, 533714995, '32', 1, '', 'pending'),
(38, 10, 801177859, '32', 1, '', 'pending'),
(39, 10, 2084351728, '33', 2, '', 'pending'),
(40, 10, 235453125, '33', 2, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `p_cat_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `manufacturer_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int NOT NULL,
  `product_psp_price` int NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_video` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `status` varchar(255) NOT NULL,
  `product_quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keywords`, `product_label`, `status`, `product_quantity`) VALUES
(9, 3, 3, 7, '2022-04-03 19:54:28', 'Coffee and work mug', 'coffee-work-mug', 'hugwithmugaccessory1.png', 'product_image_placeholder.jpeg', 'faded.jpg', 16, 35, '\r\n<p> A mug with a catchy slogan to display to your friends.</p>\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n\r\n', '\r\n\r\n\r\n\r\n\r\n', 'Merch', 'NULL', 'product', 100),
(13, 3, 3, 3, '2022-04-02 01:19:31', ' Coffee Definition T-shirt\r\n', 'coffee-definition-shirt', 'hugwithmugshirt1.png', 'product_image_placeholder.jpeg', 'product_image_placeholder.jpeg', 90, 85, '<p>A T-shirt that defines the qualities of coffee in the morning or anytime\r\n</p>\r\n\r\n', '', '', 'Merch', NULL, 'product', 50),
(15, 2, 2, 8, '2022-04-02 01:19:40', 'Organic Lemon Tea', 'lemon-tea', 'organiclemontea_1.png', 'product_image_placeholder.jpeg', 'product_image_placeholder.jpeg', 9, 75, ' <p>A box containing 10 organic tea bags ready to be brewed </p>', '', '\r\n\r\n\r\n\r\n', 'Tea', NULL, 'product', 90),
(18, 3, 3, 0, '2022-04-02 01:26:55', 'Coffee Heartbeat T-shirt', 'coffee-heartbeat-shirt', 'hugwithmugshirt2.png', 'product_image_placeholder.jpeg', 'product_image_placeholder.jpeg', 15, 0, '<p>A T-shirt that shows coffee flows with every heartbeat </p>', '', '', 'Merch', NULL, 'Product', 300),
(19, 3, 3, 0, '2022-04-02 01:29:08', ' PotHead T-shirt', 'pot-head-shirt', 'hugwithmugshirt3.png', 'product_image_placeholder.jpeg', 'product_image_placeholder.jpeg', 15, 0, '<p> A T-shirt that shows the wonders of caffeine contained within a pot of coffee  \r\n</p>', '', '', 'Merch', NULL, 'Product', 210),
(25, 1, 1, 0, '2022-04-02 04:05:13', 'Whole Bean Espresso', 'bean-espresso', 'coffee7.png', 'coffee_showcase_image_1.jpeg', 'coffee_showcase_image_2.jpeg', 23, 0, '<p> An espresso blend ready to be brewed to create the perfect cup of espresso </p>', '', '', 'Coffee', NULL, 'Product', 150),
(26, 2, 2, 0, '2022-04-02 04:07:11', 'Organic Green Tea', 'green-tea-org', 'greentea_1.jpeg', 'product_image_placeholder.jpeg', 'product_image_placeholder.jpeg', 9, 0, '<p> A bag containing 15 green tea bags ready to be brewed </p>', 'Tea', '', '', NULL, 'Product', 300),
(27, 1, 1, 0, '2022-04-02 04:22:31', 'Cold Brew Coffee Blend', 'cold-brew-blend', 'coffee6.png', 'coffee_showcase_image_1.jpeg', 'coffee_showcase_image_2.jpeg', 24, 19, '<p> A blend of coffee ready to be cold brewed into the perfect cup of coffee</p>', '', '', 'Coffee', 'Sale', 'Product', 110),
(28, 1, 1, 0, '2022-04-02 04:22:43', ' French Roast Coffee Blend', 'french-blend', 'coffee5.png', 'coffee_showcase_image_1.jpeg', 'coffee_showcase_image_2.jpeg', 21, 0, '<p> A french roast coffee blend enough for 15 cups </p>', '', '', 'Coffee', NULL, 'Product', 110),
(29, 1, 1, 0, '2022-04-02 04:23:00', 'Espresso Roast Coffee Blend', 'espresso-blend', 'coffee4.png', 'coffee_showcase_image_1.jpeg', 'coffee_showcase_image_2.jpeg', 21, 0, '<p>A espresso roast coffee blend enough for 15 cups. </p>', '', '', 'Coffee', NULL, 'Product', 120),
(30, 1, 1, 0, '2022-04-02 04:23:15', 'Premium Roast Coffee Beans', 'premium-coffee', 'coffee3.png', 'coffee_showcase_image_1.jpeg', 'coffee_showcase_image_2.jpeg', 15, 0, '\r\n<p> A valve bag containing high-quality coffee beans from the Caribbean. </p>', '', '', 'Coffee', NULL, 'Product', 130),
(31, 1, 1, 0, '2022-04-02 04:23:33', 'Breakfast Coffee Blend', 'breakfast-coffee', 'coffee2.png', 'coffee_showcase_image_1.jpeg', 'coffee_showcase_image_2.jpeg', 12, 0, '<p> A light roast coffee blend with enough to make 20 cups. Perfect for mornings </p>', '', '', 'Coffee', NULL, 'Product', 200),
(32, 3, 3, 2, '2022-04-02 04:24:39', 'Coffee Lover bag', 'coffee-tote-bg', 'hugwithmugaccessory2.png', 'tote_showcase_image_1.jpeg', 'tote_showcase_image_2.jpeg', 21, 180, '<p> A tote bag displaying for love for the liquid happiness that is coffee </p>', '', '', 'Merch', NULL, 'product', 120),
(33, 1, 1, 5, '2022-04-02 04:25:13', 'Yellow Instant Coffee Blend', 'yellow-coffee-blend', 'coffee1.png', 'coffee_showcase_image_1.jpeg', 'coffee_showcase_image_2.jpeg', 10, 6, '<p>A bag of instant coffee powder ready to make within minutes, med roast coffee. </p>\r\n', '\r\n', '', 'Coffee', 'Sale', 'product', 198),
(34, 2, 2, 4, '2022-04-02 04:25:38', 'Matcha Tea Powder', 'matcha-tea-powder', 'matchapowder.png', 'matcha_showcase_image_1.jpeg', 'matcha_showcase_image_2.jpeg', 15, 100, '\r\n\r\n\r\n<p> 20 servings of high-quality matcha tea powder </p>\r\n\r\n\r\n', '\r\n\r\n', '', 'Tea', NULL, 'product', 200);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, 'Coffee', 'no', 'coaticn.png'),
(2, 'Tea', 'yes', 'tshirticn.png'),
(3, 'Merch', 'yes', 'sweatericn.png');

-- --------------------------------------------------------

--
-- Table structure for table `search_results`
--

CREATE TABLE `search_results` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `search_results`
--

INSERT INTO `search_results` (`id`, `title`, `description`, `url`, `keywords`) VALUES
(1, 'Coffee ', '', 'http://ec2-54-172-16-142.compute-1.amazonaws.com/shop.php?page=1&cat[]=1&', 'coffee Coffee COFFEE'),
(3, 'Matcha', '', 'http://ec2-54-172-16-142.compute-1.amazonaws.com/shop.php?page=1&cat[]=2&', 'Matcha matcha MATCHA'),
(4, 'Tea', '', 'http://ec2-54-172-16-142.compute-1.amazonaws.com/shop.php?page=1&cat[]=2&', 'Tea tea TEA'),
(5, 'T-Shirt', '', 'http://ec2-54-172-16-142.compute-1.amazonaws.com/shop.php?page=1&cat[]=3&', 'T-shirt T-SHIRT t-shirt tshirt T-shirts T-SHIRTS t-shirts tshirts'),
(7, 'Espresso', '', 'http://ec2-54-172-16-142.compute-1.amazonaws.com/shop.php?page=1&cat[]=1&', 'Espresso ESPRESSO espresso'),
(9, 'Mug', '', 'http://ec2-54-172-16-142.compute-1.amazonaws.com/shop.php?page=1&cat[]=3&', 'mug Mug MUG mugs Mugs MUGS'),
(10, 'Bag', '', 'http://ec2-54-172-16-142.compute-1.amazonaws.com/shop.php?page=1&cat[]=3&', 'bag Bag BAG bags Bags BAGS');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int NOT NULL,
  `store_title` varchar(255) NOT NULL,
  `store_image` varchar(255) NOT NULL,
  `store_desc` text NOT NULL,
  `store_button` varchar(255) NOT NULL,
  `store_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_title`, `store_image`, `store_desc`, `store_button`, `store_url`) VALUES
(4, 'London Store', 'store (3).jpg', '<p style=\"text-align: center;\"><strong>180-182 RECENTS STREET, LONDON, W1B 5BT</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>', 'View Map', 'http://www.thedailylux.com/ecommerce'),
(5, 'New York Store', 'store (1).png', '<p style=\"text-align: center;\"><strong>109 COLUMBUS CIRCLE, NEW YORK, NY10023</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>', 'View Map', 'http://www.thedailylux.com/ecommerce'),
(6, 'Paris Store', 'store (2).jpg', '<p style=\"text-align: center;\"><strong>2133 RUE SAINT-HONORE, 75001 PARIS&nbsp;</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>', 'View Map', 'http://www.thedailylux.com/ecommerce');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(2, 2, 8),
(3, 5, 13),
(4, 3, 13),
(5, 6, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  ADD PRIMARY KEY (`rel_id`);

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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `search_results`
--
ALTER TABLE `search_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  MODIFY `rel_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  MODIFY `enquiry_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `search_results`
--
ALTER TABLE `search_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
