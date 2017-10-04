-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 08:10 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `about_image` text NOT NULL,
  `my_biodata` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `email`, `present_address`, `permanent_address`, `phone`, `nationality`, `about_image`, `my_biodata`) VALUES
(1, 'Suman Ahmed', 'suman777333@gmail.com', 'kazipara, Mirpur, Dhaka-1216', 'Chandina, Comilla-3510', '01620506565', 'Bangladesh', 'uploads/about-img/suman.jpg', 'Im a Web Developer To Creating Awesome And Effective Website For Your Company.If You Want To Build Up Your Personal Or Company Website.');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_image` text NOT NULL,
  `post_description` text NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `post_title`, `post_image`, `post_description`, `author_name`, `publication_status`) VALUES
(6, 'Matically sinrgize and rliable', 'uploads/blog-img/blog-img-01.jpg', 'Holisticly impact grar collaboron ashearing for magnetic scearios tart listic aileaership after staart process improvements.', 'Suman Ahmed', 0),
(7, 'Singing Song with guitter', 'uploads/blog-img/blog-img-02.jpg', 'Holisticly impact grar collaboron ashearing for magnetic scearios tart listic aileaership after staart process improvements.', 'Suman Ahmed', 1),
(8, 'In the Fashion Time', 'uploads/blog-img/blog-img-03.jpg', 'Holisticly impact grar collaboron ashearing for magnetic scearios tart listic aileaership after staart process improvements.', 'Suman Ahmed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `copyright`
--

CREATE TABLE `copyright` (
  `id` int(1) NOT NULL,
  `copyright_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `copyright`
--

INSERT INTO `copyright` (`id`, `copyright_text`) VALUES
(1, 'All Right Reserved Â© Suman Ahmed.');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `portfolio_title` varchar(50) NOT NULL,
  `portfolio_link` varchar(255) NOT NULL,
  `term_id` int(11) NOT NULL,
  `portfolio_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `portfolio_title`, `portfolio_link`, `term_id`, `portfolio_image`) VALUES
(5, 'Ecommerce', 'http://www.fabotronix.com', 3, 'uploads/portfolio-img/portfolio-img-2.jpg'),
(6, 'RedArt', 'http://www.design.com', 2, 'uploads/portfolio-img/portfolio-img-1.jpg'),
(7, 'News Portal', 'http://www.news.com', 4, 'uploads/portfolio-img/portfolio-img-3.jpg'),
(8, 'Remiex Theme', 'http://www.remiex.com', 1, 'uploads/portfolio-img/portfolio-img-4.jpg'),
(9, 'News Morning', 'https://www.newsmorning.com', 4, 'uploads/portfolio-img/portfolio-img-5.jpg'),
(10, 'Shop BD', 'https://www.shopbd.com', 3, 'uploads/portfolio-img/portfolio-img-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `progress_percent` int(11) NOT NULL,
  `progress_title` varchar(30) NOT NULL,
  `progress_color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `progress_percent`, `progress_title`, `progress_color`) VALUES
(1, 85, 'HTML', '084c61'),
(2, 75, 'CSS3', 'db504a'),
(3, 70, 'WORDPRESS', '3B1F2B'),
(4, 60, 'PHP', '788034');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `about_title` varchar(100) NOT NULL,
  `about_content` text NOT NULL,
  `skill_title` varchar(100) NOT NULL,
  `skill_content` text NOT NULL,
  `portfolio_s_title` varchar(100) NOT NULL,
  `portfolio_s_content` text NOT NULL,
  `service_title` varchar(100) NOT NULL,
  `service_content` text NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_content` text NOT NULL,
  `contact_title` varchar(100) NOT NULL,
  `contact_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `about_title`, `about_content`, `skill_title`, `skill_content`, `portfolio_s_title`, `portfolio_s_content`, `service_title`, `service_content`, `blog_title`, `blog_content`, `contact_title`, `contact_content`) VALUES
(1, 'About Me', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.', 'My Skills', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.', 'My Portfolios', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.', 'Services', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.', 'Latest Blog', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.', 'Contact With Me', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_title` varchar(100) NOT NULL,
  `service_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `service_text`) VALUES
(1, 'Web Development ', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.'),
(2, 'Web Design', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.'),
(3, 'UI/UX Design', 'A dream is a succession of images, ideas, emotions, and sensations that usually occur involuntarily in the mind during certain stages of sleep.[1] The content and purpose of dreams are not fully understood.');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `tw_link` varchar(255) NOT NULL,
  `ln_link` varchar(255) NOT NULL,
  `gp_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `fb_link`, `tw_link`, `ln_link`, `gp_link`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(11) NOT NULL,
  `term_class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_class`) VALUES
(1, 'design'),
(2, 'wordpress'),
(3, 'ecommerce'),
(4, 'news');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Suman Ahmed', 'suman777333@gmail.com', '0a6a85fd2a034f15ab6e89670b68e718');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
