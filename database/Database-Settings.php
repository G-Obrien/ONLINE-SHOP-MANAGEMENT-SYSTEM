<?php

/*--
-- Database: `crane_shop`
*/
//-- Configuring database if not exist

$conn = mysqli_connect('localhost', 'root', '');

$Mydatabase = "CREATE DATABASE IF NOT EXISTS crane_shop";
mysqli_query($conn, $Mydatabase);

$useDB = "USE crane_shop";
mysqli_query($conn, $useDB);

/*
--
-- Table structure for table `cart`
*/
$cart = "CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $cart);
//-- --------------------------------------------------------

$category = "CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $category);
//-- --------------------------------------------------------

//-- Dumping data for table `category_list`

$insert_category = "INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Kitchen & Utensils'),
(2, 'Food & Items'),
(3, 'Phones'),
(4, 'Wearable Gadgets'),
(5, 'Electronics & TV Appliances'),
(6, 'Raw Products & Materials');";
mysqli_query($conn, $insert_category);
//-- --------------------------------------------------------

//-- Table structure for table `orders`

$order = "CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `ordereddate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $order);
//-- -------------------------------------------------------- 20.06.2021, 19:24:09

//-- Dumping data for table `orders`

$insert_order = "INSERT INTO `orders` (`id`, `name`, `address`, `mobile`, `email`, `status`, `ordereddate`) VALUES
(1, 'Alan Mukwaya', 'Kampala', '7556463215', 'alan@muk.com', 1, '2021-06-21 19:24:09'),
(2, 'Obrien Obita', 'Gulu', '770656976', 'obita@ob.com', 1, '2021-06-21 19:24:09'),
(3, 'benji Rubah', 'Hoima', '756590099', 'benjirubah@gmail.com', 2, '2021-06-13 19:24:09');";
mysqli_query($conn, $insert_order);
//-- --------------------------------------------------------

//-- Table structure for table `order_list`

$order_list = "CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $order_list);
//-- --------------------------------------------------------

//-- Dumping data for table `order_list`

$insert_order_list  = "INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 3, 1),
(2, 1, 5, 1),
(3, 1, 3, 1),
(4, 1, 6, 3),
(5, 2, 1, 2);";
mysqli_query($conn, $insert_order_list);
//-- --------------------------------------------------------

//-- Table structure for table `payments`

$paymets = "CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `amount` int(14) NOT NULL,
  `method` text NOT NULL,
  `basis` text NOT NULL,
  `paydate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= Uncleared, 2 Cleared'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $paymets);

//-- Dumping data for table `payments`

$insert_payments = "INSERT INTO `payments` (`id`, `order_id`, `amount`, `method`,`basis`, `paydate`, `status`) VALUES
(1, 1, 108500, 'Cash-on-Dilivery','Cash','2021-06-12 19:24:09', 1),
(2, 3, 400000, 'Order-With-Cash','Mobile Money','2021-06-12 19:24:09', 2);";
mysqli_query($conn, $insert_payments);
//-- --------------------------------------------------------
//-- Table structure for table `product_list`

$prod_list = "CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $prod_list);
//-- --------------------------------------------------------
//-- Dumping data for table `product_list`

$insert_prod_list = "INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`) VALUES

/*/Kitchen & Utencils*/
(1, 1, 'Blender ', 'Cookoing Gadget', 25000, 'kitchen/blender1.webp', 1),
(2, 1, 'Blender Coated type 1', 'Cookoing Gadget', 20000, 'kitchen/blender2.webp', 1),
(3, 1, 'Brewers', 'Cookoing Gadget', 40000, 'kitchen/brewer1.webp', 1),
(4, 1, 'Cooker Modle 009', 'Cookoing Gadget',43000, 'kitchen/cooker2.webp', 1),
(5, 1, 'Cooker Model Plate', 'Cookoing Gadget', 21000, 'kitchen/cooker3.webp', 1),
/*/Food Items')*/
(6, 2, 'Diet Coke', 'Can Cocacola-Food item', 2500, 'food/1600652160_diet_coke.jpg', 1),
(7, 2, 'Lemon Iced Tea', 'Food item', 15, 'food/1600652520_lemon iced tea.jpg', 1),
(8, 2, 'Chicken', 'Food item', 15000, 'food/1600652880_chicken.jpg', 1),
(9, 2, 'Steak', 'Food item', 20000, 'food/1600652880_steak.jpg', 1),
(10, 2, 'Phone Samsung', 'phone category', 250000, 'phones/fon1.webp', 1),

/*/Phones*/
(11, 3, 'Phone Samsung', 'phone category', 250000, 'phones/fon1.webp', 1),
(12, 3, 'Huawei', 'phone category', 450000, 'phones/fon2.webp', 1),
(13, 3, 'Infinix 8 Hot', 'phone category', 500000, 'phones/fon3.webp', 1),
(14, 3, 'Tecno Spark 7', 'phone category', 450000, 'phones/fon7.webp', 1),
(15, 3, 'Tecno 9', 'phone category', 650000, 'phones/fon9.webp', 1),
(16, 3, 'Iphone 256 Oval O', 'phone category', 950000, 'phones/fon4.webp', 1),
/* Wearable Gadgets  */
(17, 4, 'Dry-Cleaner Watch', 'Wearable Gadgets', 300000, 'watch/watch1.webp', 1),
(18, 4, 'Lemon Watch', 'Wearable Gadgets', 22000, 'watch/watch11.webp', 1),
(19, 4, 'Oking Watches',  'Wearable Gadgets', 200000, 'watch/watch10.webp', 1),
(20, 4, 'Steakanes 45',  'Wearable Gadgets', 200000, 'watch/watch4.webp', 1),
(21, 4, 'Elleven Maxi',  'Wearable Gadgets', 20000, 'watch/watch7.webp', 1),
/* 'Electronics & TVs Appliances */
(22, 5, 'LG large Screen', 'TV Appliances ', 2500000, 'tvs/tv1.webp', 1),
(23, 5, 'HUAWEI TV', 'TV Appliances ', 3500000, 'tvs/tv3.webp', 1),
(24, 5, 'SAMSUNG 8T-5 750x1080', 'TV Appliances ', 2000000, 'tvs/tv4.webp', 1),
(25, 5, 'Everlasting oan Tv', 'TV Appliances ', 1500000, 'tvs/tv7.webp', 1),
(26, 5, 'Belgium Prodcast TV', 'TV Appliances ', 900000, 'tvs/tv9.webp', 1),
/*(4, *//*(6, 'Raw Products & Materials*/
(27, 6, 'Camera 256 28px', 'Materials', 280000, 'cameras/cam4.webp', 1),
(28, 6, 'Dual Camera', 'Materials', 280000, 'cameras/cam2.webp', 1),
(29, 6, 'Electron cameras', 'Materials', 580000, 'cameras/cam9.webp', 1),
(30, 6, 'Pixa Clean Cameron', 'Materials', 480000, 'cameras/cam6.webp', 1),
(31, 6, 'Cameron Shiphon 12', 'Materials', 2900000, 'cameras/cam1.webp', 1);";
mysqli_query($conn, $insert_prod_list);
//-- --------------------------------------------------------

//-- Table structure for table `system_settings`


$system = "CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $system);
//-- --------------------------------------------------------

//-- Dumping data for table `system_settings`

$insert_system = "INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'CRANE SHOP ONLINE STORES', 'craneshop@gmail.com', '+25678 8542 623', 'assets/CraneBanner.jpg',
 '&lt;p style=&quot;text-align: center; background: transparent; 
 position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: 
 transparent; position: relative;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;
 p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;
 span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;
 span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 
 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align:
  justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open 
  Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;We are a team passionately focused on driving small business success.

We bring together the powers of world-class e-сommerce technologies 
and make them easy and 
accessible to the masses.

Our support is fanatical, and we never stop learning.
   .&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;
   p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span 
   style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;
   font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0);
    font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: 
    justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: 
    center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; 
    position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; 
    position: relative;&quot;&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; 
    position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; 
    margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial,
     sans-serif; font-weight: 400;&quot;&gt;Have you thought that selling online was a little out of your reach? Think again. Opening an online store 
     has never been easier. Ecwid is a leading choice for small business merchants to easily set up a store and start selling fast. No need to abandon your
      existing site — Ecwid can be added virtually anywhere you have an online presence. You have the freedom to operate multiple online stores including 
      on your website, social media channels,
      and mobile devices. So stop reading and start selling from your new online store!.&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;');";
mysqli_query($conn, $insert_system);
//-- --------------------------------------------------------

//-- Table structure for table `users`

$user = "CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $user);
//-- --------------------------------------------------------
//-- Dumping data for table `users`

$insert_user = "INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1);";
mysqli_query($conn, $insert_user);
//-- --------------------------------------------------------

//-- Table structure for table `user_info`

$userInfo = "CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysqli_query($conn, $userInfo);
//-- --------------------------------------------------------

//-- Dumping data for table `user_info`

$insertUserInfo = "INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'Alan', 'Mukwaya', 'alan@muk.com', 'mukwaya004', '7556463215', 'Kampala'),
(2, 'Obita', 'Obrien', 'obita@ob.com', 'obrien123', '770656976', 'Gulu'),
(3, 'benji', 'Rubah', 'benjirubah@gmail.com', 'rubah12', '756590099', 'Hoima');";
mysqli_query($conn, $insertUserInfo);
//-- --------------------------------------------------------



//-- Indexes for dumped tables
//--

//-- Indexes for table `cart`

$indexCart = "ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);";
  mysqli_query($conn, $indexCart);


//-- Indexes for table `category_list`

$indexCartList = "ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);";
   mysqli_query($conn, $indexCartList);

//-- Indexes for table `orders`

$indexOrder = "ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);";
   mysqli_query($conn, $indexOrder);

//-- Indexes for table `order_list`

$indexOrderList = "ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);";
   mysqli_query($conn, $indexOrderList);

//-- Indexes for table `product_list`

$indexProdList = "ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);";
   mysqli_query($conn, $indexProdList);

//-- Indexes for table `system_settings`

$indexSystemSet = "ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);";
   mysqli_query($conn, $indexSystemSet);

//-- Indexes for table `users`

$indexUser = "ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);";
   mysqli_query($conn, $indexUser);

//-- Indexes for table `user_info`

$indexUserInfo = "ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);";
   mysqli_query($conn, $indexUserInfo);
   //----------------------------------------------------------------

//-- AUTO_INCREMENT for dumped tables

//-- AUTO_INCREMENT for table `cart`

$autoCart = "ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;";
   mysqli_query($conn, $autoCart);

//-- AUTO_INCREMENT for table `category_list`

$autoCategoryList = "ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;";
  mysqli_query($conn, $autoCategoryList);

//-- AUTO_INCREMENT for table `orders`

$autoOrders = "ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;";
  mysqli_query($conn, $autoOrders);

//-- AUTO_INCREMENT for table `order_list`

$autoOrderList = "ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;";
  mysqli_query($conn, $autoOrderList);

//-- AUTO_INCREMENT for table `product_list`

$autoProdList = "ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;";
  mysqli_query($conn, $autoProdList);

//-- AUTO_INCREMENT for table `system_settings`
 
$autoSystemSet = "ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
  mysqli_query($conn, $autoSystemSet);


//-- AUTO_INCREMENT for table `users`

$autoUser = "ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
  mysqli_query($conn, $autoUser);

//-- AUTO_INCREMENT for table `user_info`

$autoUserInfo = "ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
  mysqli_query($conn, $autoUserInfo);
$commit = "COMMIT;";
mysqli_query($conn, $commit);

