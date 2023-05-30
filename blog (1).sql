-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 30, 2023 at 12:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `commet`
--

CREATE TABLE `commet` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_section` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commet`
--

INSERT INTO `commet` (`comment_id`, `post_id`, `user_id`, `comment_section`, `created_at`) VALUES
(43, 34, 75, 'this is master peice!', '2023-05-14'),
(44, 34, 75, 'yfgjhvyirxgm ', '2023-05-15'),
(45, 44, 75, 'no', '2023-05-16'),
(46, 35, 76, 'good practice', '2023-05-18'),
(47, 46, 76, 'nvhv', '2023-05-18'),
(48, 45, 76, 'comosita', '2023-05-18'),
(49, 46, 75, 'wow', '2023-05-18'),
(50, 35, 75, 'do do do', '2023-05-22'),
(51, 35, 75, 'hvoyvo', '2023-05-22'),
(52, 47, 75, 'jjkbjknkn', '2023-05-22'),
(53, 34, 75, 'qwertyu', '2023-05-22'),
(54, 34, 75, 'zxs', '2023-05-22'),
(55, 34, 75, 'sss', '2023-05-22'),
(56, 35, 75, 'sss', '2023-05-22'),
(57, 35, 75, 'sfwefwEDFH', '2023-05-22'),
(58, 50, 76, 'wow', '2023-05-27'),
(59, 45, 83, 'niceeee', '2023-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE `like_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `post_id`) VALUES
(1, 75, 34),
(2, 76, 34),
(3, 81, 34),
(4, 82, 34),
(5, 76, 47),
(6, 76, 47),
(7, 76, 47),
(8, 76, 47),
(9, 76, 47),
(10, 76, 35),
(11, 76, 46),
(12, 76, 45),
(13, 75, 46),
(14, 75, 35),
(15, 75, 47),
(16, 75, 45),
(17, 75, 48),
(18, 76, 50),
(19, 75, 49),
(20, 83, 45),
(21, 83, 49),
(22, 83, 51);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `topic_id`, `user_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(34, 25, 75, 'The Power of Positive Thinking', '1683401052_calc.jpg', '&lt;p&gt;Positive thinking can be a powerful tool for achieving success, happiness, and fulfillment in life. By focusing on the good in every situation, visualizing positive outcomes, and cultivating a mindset of optimism and gratitude, we can transform our lives and create the reality we desire.&lt;/p&gt;', 1, '2023-05-06'),
(35, 26, 75, 'The Benefits of Meditation', '1683401107_calc.jpg', '&lt;p&gt;&lt;br&gt;Meditation is a practice that has been used for centuries to promote relaxation, reduce stress, and improve overall health and well-being. By quieting the mind and focusing on the present moment, we can cultivate a sense of inner peace and clarity that can have a profound impact on our physical, mental, and emotional health&lt;/p&gt;', 1, '2023-05-06'),
(45, 27, 75, 'power of sport', '1684244140_photo_2022-06-02_09-49-31.jpg', 'In addition to his work with SpaceX and Tesla, Musk has been involved in a number of other ventures, including the development of Hyperloop, a high-speed transportation system, and Neuralink, a company focused on developing brain-machine interfaces. He has also been an advocate for open-source development and has released many of his company\'s patents to the public.\r\n\r\nMusk\'s entrepreneurial spirit and ambitious vision have earned him numerous accolades, including being named one of Time magazine\'s 100 most influential people in the world. However, his leadership style has also been controversial, with some critics accusing him of being overly demanding and insensitive to the needs of his employees.', 1, '2023-05-16'),
(46, 24, 75, 'Elon Musk', '1684244191_photo_2022-06-02_09-49-41.jpg', 'In 1995, Musk co-founded Zip2, a company that provided online business directories and maps to newspapers. The company was sold to Compaq for nearly $300 million in 1999, and Musk used the proceeds to start X.com, an online payment company. X.com later became PayPal, which was sold to eBay for $1.5 billion in 2002.\r\n\r\nAfter the sale of PayPal, Musk turned his attention to space exploration and founded SpaceX in 2002. The company\'s goal was to reduce the cost of space travel and eventually enable the colonization of Mars. In 2008, SpaceX became the first privately-funded company to send a spacecraft to the International Space Station. Since then, the company has continued to make significant advances in space technology, including the development of reusable rockets.\r\n\r\nMusk is also the CEO of Tesla, a company that designs and manufactures electric vehicles and renewable energy products. Under his leadership, Tesla has become one of the most valuable car manufacturers in the world, with a market capitalization of over $700 billion as of 2021. Musk has been a vocal advocate for the transition to renewable energy and has set ambitious goals for the company, including the production of a fully autonomous electric vehicle', 1, '2023-05-16'),
(47, 26, 75, 'Barak Obama', '1684244222_photo_2022-06-02_09-49-50.jpg', 'In 1995, Musk co-founded Zip2, a company that provided online business directories and maps to newspapers. The company was sold to Compaq for nearly $300 million in 1999, and Musk used the proceeds to start X.com, an online payment company. X.com later became PayPal, which was sold to eBay for $1.5 billion in 2002.\r\n\r\nAfter the sale of PayPal, Musk turned his attention to space exploration and founded SpaceX in 2002. The company\'s goal was to reduce the cost of space travel and eventually enable the colonization of Mars. In 2008, SpaceX became the first privately-funded company to send a spacecraft to the International Space Station. Since then, the company has continued to make significant advances in space technology, including the development of reusable rockets.\r\n\r\nMusk is also the CEO of Tesla, a company that designs and manufactures electric vehicles and renewable energy products. Under his leadership, Tesla has become one of the most valuable car manufacturers in the world, with a market capitalization of over $700 billion as of 2021. Musk has been a vocal advocate for the transition to renewable energy and has set ambitious goals for the company, including the production of a fully autonomous electric vehicle', 1, '2023-05-16'),
(48, 27, 75, 'love in the highschool', '1685128086_photo_2022-10-11_07-51-02.jpg', 'sdfho nsdkn fdfj l lsddkfjasdl lsdjl j', 1, '2023-05-26'),
(49, 24, 75, 'movies', '1685201122_photo_2022-06-02_09-49-50.jpg', 'It appears that there is an issue with Apache and it has shut down unexpectedly. This could be due to a number of reasons, such as a blocked port, missing dependencies, improper privileges, a crash, or a shutdown by another method.\r\n\r\nTo troubleshoot the issue, you can start by checking the error logs and Windows Event Viewer for more clues. The error logs may provide more information about the specific error that caused Apache to shut down. You can also check if there are any competing programs running on the same port as Apache.\r\n\r\nIf you are still experiencing issues, you can copy and post the entire log window on the forums to receive further assistance. More information on the specific error can help diagnose and resolve the issue', 1, '2023-05-27'),
(50, 28, 76, 'king of the century', '1685201338_photo_2022-06-02_09-50-26.jpg', 'It appears that there is an issue with Apache and it has shut down unexpectedly. This could be due to a number of reasons, such as a blocked port, missing dependencies, improper privileges, a crash, or a shutdown by another method.\r\n\r\nTo troubleshoot the issue, you can start by checking the error logs and Windows Event Viewer for more clues. The error logs may provide more information about the specific error that caused Apache to shut down. You can also check if there are any competing programs running on the same port as Apache.\r\n\r\nIf you are still experiencing issues, you can copy and post the entire log window on the forums to receive further assistance. More information on the specific error can help diagnose and resolve the issue', 1, '2023-05-27'),
(51, 26, 83, 'Yessir', '1685427346_photo_2022-06-02_09-49-31.jpg', '&lt;p&gt;Nice Website&lt;/p&gt;\r\n', 1, '2023-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `created_at`) VALUES
(23, 'poem', '<p>Love is a flame that burns so bright,<br>It fills our hearts with pure delight.<br>It warms us up on coldest nights,<br>And guides us through life\'s darkest fights.</p><p>It\'s the sweetest melody we hear,<br>A symphony that\'s always near.<br>It\'s the gentle touch that we feel,<br>A love so pure, so true, so real</p>', '2023-05-06'),
(24, 'Biography', '<p>Barack Obama is an American politician and lawyer who served as the 44th President of the United States from 2009 to 2017. He was born in Honolulu, Hawaii in 1961 and grew up in Indonesia and Hawaii. After graduating from Columbia University in 1983, he worked as a community organizer in Chicago and went on to attend Harvard Law School, where he earned his law degree in 1991. He then worked as a civil rights attorney and taught constitutional law at the University of Chicago Law School before entering politics. In 2004, he was elected to the U.S. Senate representing Illinois, and four years later, he became the first African American President of the United States. During his presidency, Obama implemented a number of significant policy initiatives, including the Affordable Care Act, the Dodd-Frank Wall Street Reform and Consumer Protection Act, and the Paris Agreement on climate change. He also oversaw the successful operation that resulted in the killing of Osama bin Laden. After leaving office, he has continued to be active in public</p>', '2023-05-06'),
(25, 'Motivation', '<p>You are capable of achieving great things. Don\'t let doubt or fear hold you back from pursuing your dreams and pushing beyond your limits. Every successful person has faced obstacles and setbacks, but it is their determination and resilience that sets them apart. Believe in yourself and your abilities, and don\'t be afraid to take risks and try new things. Remember that failure is not the end, but an opportunity to learn and grow. Surround yourself with positive influences and support, and never give up on your goals. With hard work, dedication, and a positive attitude, you have the power to achieve anything you set your mind to. So go out there and make it happen!</p>', '2023-05-06'),
(26, 'life lesson', '<p>Life is a journey that is full of ups and downs, joys and sorrows, triumphs and challenges. It is a precious gift that should be cherished and lived to the fullest. We all have a limited amount of time on this earth, and it is up to us to make the best of it. Life can be unpredictable and hard to navigate at times, but it is also full of beauty and wonder. It is a journey that is unique to each individual, and it is important to find purpose, meaning, and fulfillment in our own way. Ultimately, life is a precious opportunity to learn, grow, and make a positive impact on the world around us</p>', '2023-05-06'),
(27, 'Love', '<p>Love is a complex and multifaceted emotion that is central to human experience. It is an intense feeling of affection and connection towards someone or something, and it can inspire a range of emotions, from joy and happiness to sadness and heartbreak. Love can be romantic, platonic, or familial, and it can manifest in different ways depending on the person and the context. It has been the subject of countless works of art, literature, and music throughout history, and it continues to be a source of fascination and inspiration for people all over the world. Ultimately, love is a powerful force that has the ability to transform and enrich our lives in countless ways.</p>', '2023-05-06'),
(28, 'Bussines', '<p>A credit card account is a type of revolving credit account that allows you to borrow money up to a certain limit, which is determined by the credit card issuer. You can use the credit card to make purchases, and you\'re required to pay back the amount you borrow, along with any interest charges and fees.</p><p>When you use a credit card, you\'re essentially borrowing money from the credit card issuer, and they will send you a bill at the end of each billing cycle. The bill will show the amount you owe, the minimum payment due, and the due date. You can choose to pay off the full balance by the due date to avoid interest charges, or you can make a minimum payment to keep the account current, but you\'ll accrue interest on the remaining balance.</p><p>Credit card accounts can have a variety of features, such as rewards programs, cashback offers, and travel benefits. The terms and conditions of credit card accounts can vary widely, so it\'s important to read the fine print and understand the fees and interest rates associated with the account before you apply</p>', '2023-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(75, 1, 'Nebaw', 'nebiyuzewge@gmail.com', '$2y$10$24x8Dz5YPd.wQJz2PtFRCudsM8oxq5CgYGU5Ln6LqgoF7Q/Dgkr5O', '2023-05-06 16:09:54'),
(76, 1, 'Fenet', 'fenet@gmail.com', '$2y$10$0cI0Fi2PnWF6Kl2r9ICcPuZYPieL6ps28IHWWNg8Zn8u8EsAGJXrG', '2023-05-07 18:00:07'),
(77, 1, 'Rebuma', 'rebuma@gmail.com', '$2y$10$5BqgwCT1s5rs.3g8w5LiXulL2enrczJnK.7W4.Tq.S1YXoIHGSgJu', '2023-05-08 05:53:01'),
(78, 0, 'yordi', 'yordi@gmail.com', '$2y$10$ucF.Cosq4GhB4JNCxnxLhO82u74TB/nCz2ebCfGJTRrw8wey25Mmm', '2023-05-09 06:40:06'),
(80, 0, 'admin', 'nebiyuzewge@gmjail.com', '$2y$10$LnrV3XlMKH34Jlc73Kyqm.BXHbg6t0IJugLaKJ5x8nuT85miYYQ0e', '2023-05-10 15:36:40'),
(81, 0, 'Sofoniyas', 'sofoniyas@gmail.com', '$2y$10$fJyS53j5Z7im0.UtaH9o4uTHFkW0J4XmYd9BZbS/P47rbiTygAavK', '2023-05-14 17:50:06'),
(82, 0, 'Zewge', 'zewge@gmail.com', '$2y$10$.tCxmwd6P7lB1EeOUEZxge1PThar.AT2/mp2GCdEW9Ef6uXkG6evu', '2023-05-14 17:51:43'),
(83, 1, 'nicotean', 'nicotean187@gmail.com', '$2y$10$NwoD/Lr0AppKBAuapLyeROjqCkyXo9kYJdSUEhTYfnlYNh6tKfnN2', '2023-05-30 06:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `view_count`
--

CREATE TABLE `view_count` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `NumberOfViews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view_count`
--

INSERT INTO `view_count` (`id`, `post_id`, `NumberOfViews`) VALUES
(802, 34, 14),
(803, 35, 6),
(804, 48, 15),
(805, 47, 8),
(806, 50, 23),
(807, 49, 39),
(808, 45, 1),
(809, 51, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commet`
--
ALTER TABLE `commet`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `view_count`
--
ALTER TABLE `view_count`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commet`
--
ALTER TABLE `commet`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `view_count`
--
ALTER TABLE `view_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=810;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
