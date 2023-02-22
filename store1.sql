-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 09:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `src` varchar(200) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `src`, `alt`) VALUES
(1, '\"assets/img/uabnr.jpg\"', 'umbrella academy banner'),
(2, '\"assets/img/sandbnr.jpg\"', 'sandman banner'),
(3, '\"assets/img/lockebnr.jpg\"', 'locke and key banner'),
(4, '\"assets/img/btbnr1.jpg\"', 'batman banner');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Supernatural horror'),
(2, 'Superhero fiction'),
(3, 'Graphic novel'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `mail`, `subject`, `msg`) VALUES
(2, 'Bruce Wayne', 'notbatman@gmail.com', 'Hey hello', 'Idk I\'m just testing');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `name`, `src`) VALUES
(1, 'HOME', 'index.php'),
(2, 'SHOP', 'shop.php'),
(3, 'CART', 'cart.php'),
(4, 'CONTACT', 'contact.php'),
(5, 'AUTHOR', 'author.php');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `src` varchar(200) NOT NULL,
  `alt` varchar(50) NOT NULL,
  `recommended` tinyint(1) NOT NULL,
  `author` varchar(200) NOT NULL,
  `instock` tinyint(1) NOT NULL,
  `pages` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `id_series` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `src`, `alt`, `recommended`, `author`, `instock`, `pages`, `date`, `description`, `id_series`) VALUES
(1, 'Locke & Key Vol. 1: Welcome To Lovecraft', '15.99', 'assets/img/locke1.jpg', 'locke1', 0, 'Joe Hill', 1, 210, '2017-02-17', 'The Eisner-nominated Locke & Key tells of Keyhouse, an unlikely New England mansion, with fantastic doors that transform all who dare to walk through them, and home to a hate-filled and relentless creature that will not rest until it forces open the most terrible door of them all!', 1),
(2, 'Locke & Key Vol. 2: Head Games', '13.99', 'assets/img/locke2.jpg', 'locke2', 0, 'Joe Hill', 1, 199, '2017-03-17', 'Following a shocking death that dredges up memories of their father\'s murder, Kinsey and Tyler Locke are thrown into choppy emotional waters, and turn to their new friend, Zack Wells, for support, little suspecting Zack\'s dark secret. Open your mind-- the head games are just getting started!', 1),
(3, 'Locke & Key Vol. 3: Crown of Shadows', '16.99', 'assets/img/locke3.jpg', 'locke3', 0, 'Joe Hill', 1, 200, '2017-05-17', 'The dead plot against the living, the darkness closes in on Keyhouse, and a woman is shattered beyond repair, in the third storyline of the acclaimed series. Dodge continues his relentless quest to find the key to the black door, and raises an army of shadows to wipe out anyone who might get in his way.', 1),
(4, 'Locke & Key Vol. 4: Keys To the Kingdom', '20.99', 'assets/img/locke4.jpg', 'locke4', 0, 'Joe Hill', 1, 205, '2017-07-23', 'With more keys making themselves known, and the depths of the Locke\'s family\'s mysteries ever-expanding, Dodge\'s desperation to end his shadowy quest drives the habitants of Keyhouse ever closer to a revealing conclusion.', 1),
(5, 'Locke & Key Vol. 5: Clockworks', '21.99', 'assets/img/locke5.jpg', 'locke5', 0, 'Joe Hill', 1, 180, '2018-01-12', 'The sprawling tale of the Locke family and their mastery of the whispering iron thunders to new heights as the true history of the family is revealed to Tyler and Kinsey. Zack Wells assumes a new form, Tyler and Kinsey travel through time, and surprises beyond imagination will be revealed.', 1),
(6, 'Locke & Key Vol. 6: Alpha & Omega', '22.99', 'assets/img/locke6.jpg', 'locke6', 1, 'Joe Hill', 1, 220, '2020-01-16', 'The shadows have never been darker and the end has never been closer. Turn the key and open the last door; it\'s time to say goodbye. Omega and Alpha, the final two storylines of the New York Times bestselling series, are collected together to offer a thunderous and compelling conclusion to Locke & Key. An event not to be missed!', 1),
(7, 'Spider-Man: Miles Morales Vol. 1', '14.99', 'assets/img/sp1.jpg', 'sp1', 0, 'Brian Michael Bendis', 1, 140, '2017-11-27', 'Miles Morales is hitting the big time! Not only is he joining the Marvel Universe, but he\'s also a card-carrying Avenger, rubbing shoulders with the likes of Iron Man, Thor and Captain America! But how have Miles\' first eight months been, coming to grips with an All-new, All-Different new York?', NULL),
(8, 'Daytripper', '25.99', 'assets/img/daytr.jpg', 'daytr', 1, 'Fabio Moon, Gabriel Ba', 1, 256, '2020-01-29', 'Daytripper follows the life of one man, Bras de Olivias Dominguez. Every chapter features an important period in Bras’ life in exotic Brazil, and each story ends the same way: with his death. And then, the following story starts up at a different point in his life, oblivious to his death in the previous issue—and then also ends with him dying again. In every chapter, Bras dies at different moments in his life, as the story follows him through his entire existence—one filled with possibilities of happiness and sorrow, good and bad, love and loneliness.', NULL),
(9, 'The Umbrella Academy, Vol. 1', '40.99', 'assets/img/ua1.jpg', 'Umbrella Academy 1', 0, 'Gerard Way', 0, 184, '2018-03-30', 'Seven children form the Umbrella Academy, a dysfunctional family of superheroes with bizarre powers. Their first adventure at the age of ten pits them against an erratic and deadly Eiffel Tower, piloted by the fearsome zombie-robot Gustave Eiffel. Nearly a decade later, the team disbands, but when Hargreeves unexpectedly dies, these disgruntled siblings reunite just in time to save the world once again.', 3),
(10, 'The Umbrella Academy: Dallas', '43.99', 'assets/img/ua2.jpg', 'Umbrella Academy 2', 0, 'Gerard Way', 1, 200, '2019-05-15', 'The team is despondent following the near apocalypse created by one of their own and the death of their beloved mentor Pogo. So it\'s a great time for another catastrophic event to rouse the team into action. Trouble is, each member of the team is distracted by some very real problems of their own.', 3),
(11, 'The Umbrella Academy Volume 3: Hotel Oblivion', '45.99', 'assets/img/ua3.jpg', 'Umbrella Academy 3', 1, 'Gerard Way', 1, 210, '2020-03-10', 'Just a few years after Hargreeves\'s death, his Umbrella Academy is scattered. Number Five is a hired gun, Kraken is stalking big game, Rumor is dealing with the wreckage of her marriage, an out-of-shape Spaceboy runs around the streets of Tokyo, Vanya continues her physical therapy after being shot in the head--and no one wants to even talk about what Séance is up to.', 3),
(12, 'The Sandman Vol. 1: Preludes & Nocturnes', '70.99', 'assets/img/sand1.jpg', 'Sandman 1', 0, 'Neil Gaiman', 0, 260, '2016-08-21', 'The Sandman Vol. 1: Preludes & Nocturnes 30th Anniversary Edition collects issues #1-8 of the original run of The Sandman, beginning an epic saga unique in graphic literature and introducing readers to a dark and enchanting world of dreams and nightmares--the home of Morpheus, the King of Dreams, and his kin, the Endless.', 4),
(13, 'The Sandman Vol. 3: Dream Country', '49.99', 'assets/img/sand3.jpg', 'Sandman 3', 0, 'Neil Gaiman', 1, 250, '2018-10-19', 'The third book of the Sandman collection is a series of four short comic book stories. In each of these otherwise unrelated stories, Morpheus serves only as a minor character. Here we meet the mother of Morpheus\'s son, find out what cats dream about, and discover the true origin behind Shakespeare\'s A Midsummer\'s Night Dream.', 4),
(14, 'The Sandman Vol. 11: Endless Nights', '59.99', 'assets/img/sand11.jpg', 'Sandman 11', 0, 'Neil Gaiman', 1, 220, '2019-12-12', 'Endless Nights returns to the realm of the Dreaming with seven remarkable stories--one for each member of the otherworldly Endless family. By turns haunting, bittersweet, erotic, and nightmarish, these provocative tales range across space and time to reveal strange secrets and surprising truths about the immortal siblings', 4),
(15, 'Mass Effect: The Complete Comics', '90.99', 'assets/img/me.jpg', 'Mass Effect', 0, 'Mac Walters, John Jackson Miller, Jeremy Barlow', 0, 820, '2020-02-20', 'Mass Effect\'s vibrant world is teeming with conflict, and always on the edge of tipping into despair--but there are some who still struggle to maintain order in the chaos and secure the future of the galaxy. Join Liara as she teams up with the Drell Feron to recover the body of Commander Shepard from the Shadow Broker, uncover the origins of the Illusive Man in an epic tale of betrayal and discovery, and witness Aria defend the space station Omega from Cerberus forces.', NULL),
(16, 'Batman: Gates of Gotham', '49.99', 'assets/img/bt1.jpg', 'Batman 1', 1, 'Scott Snyder, Kyle Higgins', 1, 190, '2020-01-23', 'To uncover the truth behind the Architect and his links to Gotham\'s violent past, Batman must call upon the help of Robin, Red Robin and even Batman, Inc.\'s Hong Kong operative, Black Bat. But can they track down this new villain before he finishes his grand design? Or will their proud metropolis end the same way it began--with an earth-shattering explosion?', 2),
(17, 'Batman Vol. 6: Bride or Burglar', '17.99', 'assets/img/bt6.jpg', 'Batman 6', 0, 'Tom King, Mikel Janin', 0, 160, '2019-05-30', 'Not long after Batman announces his engagement to Catwoman, he and Wonder Woman are called to honor an old commitment requiring them to fight for Earth in a distant, magical realm. But time flows strangely in this new land, and an hour in our world could be years there.', 2),
(18, 'Batman Vol. 7: Endgame', '20.99', 'assets/img/bt7.jpg', 'Batman 7', 0, 'Scott Snyder, Greg Capullo', 1, 192, '2019-06-30', 'Batman’s greatest foe has returned for one last gag. But this time, not even the Joker is laughing. In their last encounter, the Dark Knight failed to live up to Joker’s grand plans, so now the Joker is deadly serious. The games are over. And everything is on the table.', 2),
(19, 'Batman Vol. 8: Superheavy', '20.99', 'assets/img/bt8.jpg', 'Batman 8', 0, 'Scott Snyder, Greg Capullo', 0, 192, '2019-07-30', 'Following the disappearance and presumed death of Batman, former police commissioner Jim Gordon has been called to carry on the Dark Knight’s legacy and become the Dark Knight’s successor.', 2),
(20, 'Batman Vol. 10: Epilogue', '25.99', 'assets/img/bt10.jpg', 'Batman 10', 0, 'Scott Snyder, Greg Capullo', 1, 200, '2019-10-30', 'The conclusion of creative team Scott Snyder and Greg Capullo\'s #1 New York Times best-selling run! The people of Gotham all know who truly runs their city: Gotham is Batman. The fate of their home is time and time again tied to that of the Dark Knight, who would do anything to protect it.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_genre`
--

CREATE TABLE `product_genre` (
  `product_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_genre`
--

INSERT INTO `product_genre` (`product_id`, `genre_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 3),
(8, 3),
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 2),
(11, 3),
(12, 4),
(12, 3),
(13, 4),
(13, 3),
(14, 4),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(3, 'user'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`) VALUES
(1, 'Locke & Key'),
(2, 'Batman'),
(3, 'The Umbrella Academy'),
(4, 'The Sandman');

-- --------------------------------------------------------

--
-- Table structure for table `soc`
--

CREATE TABLE `soc` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soc`
--

INSERT INTO `soc` (`id`, `name`, `src`) VALUES
(1, '\"fab fa-twitter\"', '\"https://www.twitter.com/\"'),
(2, '\"fab fa-instagram\"', '\"https://www.instagram.com/\"'),
(3, '\"fab fa-facebook-f\"', '\"https://www.facebook.com/\"');

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE `survey_answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_answers`
--

INSERT INTO `survey_answers` (`id`, `answer`, `question_id`) VALUES
(1, 'Yes', 1),
(2, 'No', 1),
(3, 'Hellblazer', 2),
(4, 'Blacksad', 2),
(5, 'Horror', 3),
(6, 'Action', 3);

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`id`, `question`) VALUES
(1, 'Did the store have everything you needed in stock?'),
(2, 'Which series would you like to see in our shop?'),
(3, 'Which genre do you prefer?');

-- --------------------------------------------------------

--
-- Table structure for table `survey_user`
--

CREATE TABLE `survey_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_user`
--

INSERT INTO `survey_user` (`id`, `user_id`) VALUES
(5, 1),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `time_of_reg` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `time_of_reg`, `role_id`) VALUES
(1, 'sandra1', 'sandra1@gmail.com', '72052d55671378ebfc7a196b928d9d7d', '2020-03-26 23:14:48', 3),
(4, 'dadmin', 'imbatman@gmail.com', '6a0b6db62f8bcfb54a3f6ad56eb2f2a5', '2020-03-27 00:45:59', 4),
(5, 'superman3', 'supertrooper@gmail.com', '303b71af5d7489e475931cc1ae3f85ea', '2020-03-27 10:11:54', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_series` (`id_series`);

--
-- Indexes for table `product_genre`
--
ALTER TABLE `product_genre`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_user` (`user_id`),
  ADD KEY `purchase_product` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soc`
--
ALTER TABLE `soc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_user`
--
ALTER TABLE `survey_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soc`
--
ALTER TABLE `soc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_answers`
--
ALTER TABLE `survey_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_user`
--
ALTER TABLE `survey_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_series` FOREIGN KEY (`id_series`) REFERENCES `series` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_genre`
--
ALTER TABLE `product_genre`
  ADD CONSTRAINT `pro_gen` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_pro` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchase_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD CONSTRAINT `ans_ques` FOREIGN KEY (`question_id`) REFERENCES `survey_questions` (`id`);

--
-- Constraints for table `survey_user`
--
ALTER TABLE `survey_user`
  ADD CONSTRAINT `qu_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
