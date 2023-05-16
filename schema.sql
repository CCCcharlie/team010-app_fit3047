-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 08:12 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u23s1010_holistichealing`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
                           `booking_id` char(36) NOT NULL,
                           `eventstart` datetime NOT NULL,
                           `staff_id` int(11) NOT NULL,
                           `service_id` int(11) NOT NULL,
                           `cust_fname` varchar(64) NOT NULL,
                           `cust_lname` varchar(64) NOT NULL,
                           `cust_phone` char(10) NOT NULL,
                           `cust_email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `eventstart`, `staff_id`, `service_id`, `cust_fname`, `cust_lname`, `cust_phone`, `cust_email`) VALUES
                                                                                                                                         ('1', '2023-05-25 11:30:47', 2, 2, 'Bill', 'Goats', '0412345677', 'app@gmail.com'),
                                                                                                                                         ('4', '2023-05-19 23:46:01', 2, 2, 'Osama', 'Obama', '0424284728', 'db@gmail.com'),
                                                                                                                                         ('5', '2023-05-03 13:29:47', 2, 2, 'Michael', 'Smith O\'Keefe', '0123324242', '1@'),
('6', '2023-05-16 12:00:00', 2, 2, 'Michael', 'Smith O\'Keefe', '0123324242', 'test@test.com'),
                                                                                                                                         ('7', '2023-05-23 12:00:00', 2, 2, 'Michael', 'Smith O\'Keefe', '0123456789', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `cb`
--

CREATE TABLE `cb` (
  `id` char(36) NOT NULL,
  `hint` varchar(128) NOT NULL,
  `content_type` varchar(32) NOT NULL,
  `content_value` text NOT NULL,
  `previous_value` text,
  `content_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cb`
--

INSERT INTO `cb` (`id`, `hint`, `content_type`, `content_value`, `previous_value`, `content_description`) VALUES
('1', 'nav_logo', 'image', 'holistichealinglogofull.png', 'healing_image_1_test1.jpg', 'The logo that appears in the top left of your web page.'),
('13', 'service_footer', 'text', 'Footer text', 'Footer text', 'Text for the footer, not currently shown.'),
('14', 'gallery_header', 'text', 'Gallery page here', 'Gallery page here', 'The Title for the Gallery Section'),
('15', 'gallery_image_1', 'image', 'LIFEBECOMINGAMOUNTAINPROMO.png', NULL, 'The first image shown in gallery.'),
('16', 'gallery_image_2', 'image', 'BECOMEGLOWINGPROMO.png', NULL, 'The second image shown in gallery'),
('17', 'gallery_image_3', 'image', 'GENERICPOSTER2.png', NULL, 'The third image shown in gallery'),
('18', 'gallery_image_4', 'image', 'HolisticHealingsStorefront.jpg', NULL, 'The fourth image shown in gallery'),
('19', 'gallery_image_5', 'image', 'GENERICPOSTER.png', NULL, 'The heading title in the top left.'),
('2', 'nav_heading', 'text', 'HOLISTIC HEALINGS', NULL, 'The heading title that appears in the top left of your web page.'),
('20', 'gallery_image_6', 'image', 'MEETOURNEWTEAMMEMBER.png', NULL, 'The Sixth image shown in the gallery'),
('21', 'gallery_image_7', 'image', 'Showcasephoto1.jpg', NULL, 'The Seventh image shown in the gallery'),
('22', 'gallery_image_8', 'image', 'Showcasephoto2.jpg', NULL, 'Eight image in the gallery'),
('23', 'contact_header', 'text', 'CONTACT US', NULL, 'Title for Contact Us section'),
('24', 'contact_description', 'text', 'To get in touch, please send us an enquiry and we will get back to you as soon as possible.\r\nWe can also be contacted through our social media, phone number and email.', 'To get in touch, please send us an enquiry and we will get back to you as soon as possible.\r\nWe can also be contacted through our social media, phone number and email.', 'Description for the contact us section'),
('25', 'contact_email', 'text', 'Email: holistichealing@u23s1010.monash-ie.me', 'Email: holistichealing@u23s1010.monash-ie.me', 'The e-mail shown in the contact us section'),
('26', 'contact_phone', 'text', 'Tel: 012345678', NULL, 'The phone number shown in the contact us section'),
('27', 'contact_social', 'text', 'IG: @holistichealing', 'IG: @holistichealing', 'The social media shown in the contact us section'),
('3', 'welcome_header', 'text', 'Welcome to Holistic Healing!', 'Welcome to Holistic Healing!', 'The First Title Text. Should be used to welcome the user.'),
('4', 'welcome_description', 'text', 'Begin your healing Journey', 'Begin your healing Journey', 'Line below the title text.'),
('5', 'welcome_image', 'image', 'header-bg.jpg', 'header-bg.jpg', 'Background image in the first section'),
('6', 'about_header', 'text', 'About us', NULL, 'Header for the About us Section.'),
('7', 'about_description', 'text', 'Holistic Healing provides a tranquil and personalized space in Melbourne and online. Our Spiritual practices facilitate life transformation by removing blocks and limiting beliefs, enabling you to achieve your highest potential. ', 'Holistic Healing provides a tranquil and personalized space in Melbourne and online. Our Spiritual practices facilitate life transformation by removing blocks and limiting beliefs, enabling you to achieve your highest potential. ', 'Description of the business in the \"About Us\" section.'),
('8', 'about_image', 'image', 'aboutbg.jpg', NULL, 'Image shown in the About Us Section'),
                                                                                                                                          ('82d9a495-dc65-11ed-a717-9828a62c97d0', 'gallery_caption_1', 'text', 'Life Feeling Like a Mountain? Holistic Healing is here to help. Come in store for a new promotion.', NULL, 'Caption for the first gallery image'),
                                                                                                                                          ('82d9b190-dc65-11ed-a717-9828a62c97d0', 'gallery_caption_8', 'text', 'Aligning with nature to reduce stress', 'Aligning with nature to reduce stress', 'Caption for the eigth gallery image'),
                                                                                                                                          ('82d9b297-dc65-11ed-a717-9828a62c97d0', 'gallery_caption_2', 'text', 'GLOW UP, WITH OUR GLOWING PROMO. TRY THE NEW \"GLOW\" HOLISTIC SESSION!', NULL, 'Caption for the second gallery image'),
                                                                                                                                          ('82d9b333-dc65-11ed-a717-9828a62c97d0', 'gallery_caption_4', 'text', 'Holistic Healing storefront', 'Holistic Healing storefront', 'Caption for the fourth gallery image'),
                                                                                                                                          ('82d9b401-dc65-11ed-a717', 'gallery_caption_3', 'text', ' Holistic Healing mental health tips ', ' Holistic Healing mental health tips ', 'Caption for the third gallery image'),
                                                                                                                                          ('82d9b410-dc65-11ed-a717-9828a62c97d0', 'gallery_caption_5', 'text', ' Holistic Healing - Open Now', ' Holistic Healing - Open Now', 'Caption for the fifth gallery image'),
                                                                                                                                          ('82d9b433-dc65-11ed-a717-9828a62c97d0', 'gallery_caption_6', 'text', ' Our newest specialist Joane Finn', ' Our newest specialist Joane Finn', 'Caption for the sixth gallery image'),
                                                                                                                                          ('82d9b621-dc65-11ed-a717-9828a62c97d0', 'gallery_caption_7', 'text', ' At Holistic Healing, we nurture a body and spirit connection with nature', ' At Holistic Healing, we nurture a body and spirit connection with nature', 'Caption for the seventh gallery image'),
                                                                                                                                          ('9', 'service_header', 'text', 'Services', NULL, 'Title in the Services Section');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
                            `cust_id` int(11) NOT NULL,
                            `cust_fname` varchar(64) NOT NULL,
                            `cust_lname` varchar(64) NOT NULL,
                            `cust_phone` int(10) NOT NULL,
                            `cust_startdate` date NOT NULL,
                            `cust_email` varchar(320) NOT NULL,
                            `cust_password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_fname`, `cust_lname`, `cust_phone`, `cust_startdate`, `cust_email`, `cust_password`) VALUES
    (1, 'Harry', 'Huebert', 412551889, '2023-04-15', 'warp3@live.com.au', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
                           `Name` text NOT NULL,
                           `Email` varchar(50) NOT NULL,
                           `Phone` char(10) NOT NULL,
                           `Message` varchar(1500) NOT NULL,
                           `enquiry_id` int(10) NOT NULL,
                           `replied` tinyint(1) NOT NULL DEFAULT '0',
                           `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='customer message';

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`Name`, `Email`, `Phone`, `Message`, `enquiry_id`, `replied`, `created`) VALUES
                                                                                                    ('Pierre', 'jjabrams@gmail.com', '0412551889', 'Hello I am interested in remedial dance therapy. Please give me a call.', 13, 1, '2023-05-06 01:26:00'),
                                                                                                    ('Sam Smith', 'ryan@gmail.com', '0484270010', 'hello, i need help pls call', 17, 1, '2023-05-06 01:26:00'),
                                                                                                    ('Team Thirteen', 'test@mail.com', '0466131331', 'Hi, I want to be healed. Thank you kindly sir/ma\'am', 18, 1, '2023-05-06 01:26:00'),
('John Marston', 'redrider@gmail.com', '0459910233', 'Howdy, just a friend looking for art therapy about getting some things right in my head. Give me an e-mail, cheers.', 19, 1, '2023-05-06 01:26:00'),
('Ryan Bregareia', 'rbro@hotmail.com', '0212551889', 'Hi There, How are you guys? ', 22, 0, '2023-05-06 01:26:00'),
('Connor Smith O\'Keefe', 'a@test.com', '0312345667', 'This inquiry has valid inputs! Your form validations work! But I struggled with the phone number input? Error message could be clearer.', 28, 0, '2023-05-15 11:43:26'),
                                                                                                    ('John Smith', 'jsmith@gmail.com', '0445672213', 'I am interested in potentially booking an expressive art therapy session. I am a beginner and wanted to know whether it is suited for all levels of experience? \r\nThanks! ', 29, 0, '2023-05-16 09:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
                             `expertise_title` varchar(64) NOT NULL,
                             `expertise_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
                            `service_id` int(11) NOT NULL,
                            `service_name` varchar(64) NOT NULL,
                            `service_duration` int(3) NOT NULL,
                            `service_desc` varchar(500) DEFAULT NULL,
                            `service_price` decimal(10,2) DEFAULT NULL,
                            `image_name` varchar(255) NOT NULL,
                            `home` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_duration`, `service_desc`, `service_price`, `image_name`, `home`) VALUES
                                                                                                                                     (2, 'Bikram Yoga Class ', 90, 'The same 26 poses in set cycles over a 90-minute class. ', 45.00, 'user-img/YogaImage.PNG', 1),
                                                                                                                                     (3, 'Spiritual Counselling ', 90, 'One on one focus on healing individual beliefs and values. ', 120.00, 'user-img/Counselling.PNG', 1),
                                                                                                                                     (4, 'Expressive Art Therapy ', 90, 'Expression through visual art media to reduce stress. \r\n', 100.00, 'user-img/ArtTherapy.PNG', 1),
                                                                                                                                     (5, 'Expressive Dance Therapy ', 90, 'Using movement to achieve emotional and physical stress reduction.', 100.00, 'user-img/Danceimage.PNG', 0),
                                                                                                                                     (22, 'New Therapy Massage', 60, 'This is a new revolutionary massage.', 140.00, 'user-img/golden-retriever-royalty-free-image-506756303-1560962726.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
                         `staff_id` int(11) NOT NULL,
                         `staff_fname` varchar(64) NOT NULL,
                         `staff_lname` varchar(64) NOT NULL,
                         `staff_position` varchar(20) NOT NULL,
                         `staff_email` varchar(320) NOT NULL,
                         `staff_password` varchar(100) NOT NULL,
                         `nonce` char(128) DEFAULT NULL,
                         `nonce_expiry` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fname`, `staff_lname`, `staff_position`, `staff_email`, `staff_password`, `nonce`, `nonce_expiry`) VALUES
                                                                                                                                               (2, 'Bryan', 'Brady', 'staff', 'bbra0010@student.monash.edu', '$2y$10$v9GdbJ.SCBGYcgEEkkfldONoeZJXJXojVWxZ.g7HvcQCLaAym8vxK', '5f72fff412bfd5bb9072be5b1629b33a4f86416eabb73ca5ff96486ce235158f129ffbb94822a05fef9ebf00faee746f8f31fd95e5df766df2310d8b38c6bc3c', '2023-05-16 14:26:03'),
                                                                                                                                               (3, 'Holistic', 'Admin', 'admin', 'holistichealing@u23s1010.monash-ie.me', '$2y$10$HRen38Ke4KwY8G0Ph5k9COAl0ErRLvxRaryzTrA9xOS0OGASFT21q', '0a4398e018c7e8dc28036812c1d55f211393362f4d796ce7280291d2b4627b63f10e6b1ff7919a7945da0b32d4a25f64036312800065ffad59d88feef612ece3', '2023-05-14 23:39:56'),
                                                                                                                                               (7, 'Alex', 'Dun', 'admin', 'adun0008@student.monash.edu', '$2y$10$TWkNvdW3mKZ3dMO0lNgtQ.MIXxsVcjIG9sBPaXZmaxmWPPocT6ySq', 'f4441a28dd5a4747002da5f74a782c17b6bcb9163b455a2e0364e52a67f6f9691ba109a68fa8f9e8cc92500b13734ad202fddc35446f536ebd69f00116fb0e20', '2023-05-16 14:26:02'),
                                                                                                                                               (10, 'Alissia ', 'M.', 'admin', 'interprise764@gmail.com', '$2y$10$V477fEJ8I22/fCz.4BQb..AhX6es3EKAXHcEgfloGYBx2T0b7FJWe', '8fe6172dd9d571d6c7f5ba0d6e1094dbd1f3732855ff3debe3a8d103a1bc3892ae4247abe10f8112dfe3cbc1cfdd06d780328d552a67233411b5a3ecc252986d', '2023-05-14 23:43:18'),
                                                                                                                                               (11, 'Mia', 'Weinmann', 'admin', 'miaweinmann@gmail.com', '$2y$10$xBZZTxh2b22..kL6MQURHOsAq4ym0A4on4dpGFQiyG3TtWJ6zqyKy', 'f1d17a36a78324ceb797d058e64a32603536e4eecb887e65b8a28940da1bd6ae02db414e96940bd3c1c6316a7682b7960084115c3d019a418c561747682460a7', '2023-05-14 23:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `staff_expertise`
--

CREATE TABLE `staff_expertise` (
                                   `staff_id` int(11) NOT NULL,
                                   `expertise_title` varchar(64) NOT NULL,
                                   `staffexpert_date_completed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
    ADD PRIMARY KEY (`booking_id`),
  ADD KEY `staff_booking_FK` (`staff_id`),
  ADD KEY `services_booking_FK` (`service_id`);

--
-- Indexes for table `cb`
--
ALTER TABLE `cb`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
    ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
    ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
    ADD PRIMARY KEY (`expertise_title`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
    ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
    ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_expertise`
--
ALTER TABLE `staff_expertise`
    ADD KEY `staff_se_FK` (`staff_id`),
  ADD KEY `expertise_se_FK` (`expertise_title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
    MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
    MODIFY `enquiry_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
    MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
    MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
    ADD CONSTRAINT `services_booking_FK` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `staff_booking_FK` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `staff_expertise`
--
ALTER TABLE `staff_expertise`
    ADD CONSTRAINT `expertise_se_FK` FOREIGN KEY (`expertise_title`) REFERENCES `expertise` (`expertise_title`),
  ADD CONSTRAINT `staff_se_FK` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
