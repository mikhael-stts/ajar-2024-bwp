CREATE DATABASE `kuliah_bwp_php`;

USE `kuliah_bwp_php`;

/*Table structure for table `anime` */

DROP TABLE IF EXISTS `anime`;

CREATE TABLE `anime` (
  `anime_id` int NOT NULL AUTO_INCREMENT,
  `anime_name` varchar(255) NOT NULL,
  `genre_id` int DEFAULT NULL,
  `anime_year` int DEFAULT NULL,
  `anime_image` varchar(255) DEFAULT NULL,
  `anime_description` text,
  PRIMARY KEY (`anime_id`)
);

/*Data for the table `anime` */

insert  into `anime`(`anime_id`,`anime_name`,`genre_id`,`anime_year`,`anime_image`,`anime_description`) values 
(1,'Naruto',1,2002,'https://img.antaranews.com/cache/1200x800/2012/12/2012120220120625naruto.jpg','A young ninja strives to become the leader of his village.'),
(2,'One Piece',1,1999,'https://images.tokopedia.net/img/KRMmCm/2023/9/18/9f609a7c-bcb1-488e-938c-6df8576dea06.jpg','A pirate seeks the ultimate treasure to become the Pirate King.'),
(3,'Attack on Titan',1,2013,'https://i.pinimg.com/originals/7a/0d/c2/7a0dc24f568b81a39ba1ce797f65d355.jpg','Humans fight against giant humanoid creatures known as Titans.'),
(4,'My Hero Academia',1,2016,'https://wallpapers.com/images/featured/my-hero-academia-pictures-otjtzn3d4q78f6kx.jpg','A young boy born without superpowers dreams of becoming a hero.'),
(5,'Dragon Ball Z',1,1989,'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTc5Re2Pdt4AtzhT9-b-KNYFQyN-naTCdIq1Rah-THydYSkIlc88ujWDvJqt908_phoWuFg883MkLGYk-ZXSbCQH52sqC_DdqZHtNb_oA','Goku defends Earth from powerful foes.'),
(6,'One Punch Man',1,2015,'https://i.ytimg.com/vi/Y9WCr7zsKu8/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLB6sN2KhIqROjuELUG9WDSfUOChUA','A hero who can defeat any opponent with a single punch.'),
(7,'Death Note',5,2006,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTnvlRfG3ECe_tS8WpIEdiyVlSDmlMMJNg7w&s','A high school student discovers a supernatural notebook that allows him to kill anyone.'),
(8,'Tokyo Ghoul',5,2014,'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/75/2024/08/03/ken-1-364049490.jpeg','A college student turns into a half-ghoul and struggles with his new identity.'),
(9,'Parasyte',5,2014,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgddE3wF5lUecHCK9r-qlydtzDjryORDeruw&s','A teenager fights parasitic creatures that have taken over human bodies.'),
(10,'Berserk',5,1997,'https://awsimages.detik.net.id/community/media/visual/2024/06/13/berserk.webp?w=700&q=90','A lone warrior seeks revenge in a dark medieval fantasy world.'),
(11,'Konosuba',2,2016,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','A boy is sent to a fantasy world after his death, with comedic misadventures.'),
(12,'The Disastrous Life of Saiki K.',2,2016,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','A psychic high school student tries to live a normal life.'),
(13,'Nichijou',2,2011,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','Follows the surreal and absurd everyday lives of several high school friends.'),
(14,'Gintama',2,2006,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','A samurai and his friends navigate a world where aliens have invaded feudal Japan.'),
(15,'Kaguya-sama: Love is War',2,2019,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','Two student council members engage in a war of love and pride.'),
(16,'Clannad',3,2007,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','A high school delinquent meets a strange girl and helps her revive her school’s drama club.'),
(17,'Your Lie in April',3,2014,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','A piano prodigy rediscovers his love for music after meeting a violinist.'),
(18,'Steins;Gate',3,2011,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','A group of friends accidentally invent a time machine.'),
(19,'Re:Zero',4,2016,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','A boy is transported to a fantasy world and experiences a time-loop.'),
(20,'Sword Art Online',4,2012,'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg','Players of a virtual reality MMORPG find themselves trapped inside the game.');

/*Table structure for table `genre` */

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `genre_id` bigint NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(100) NOT NULL,
  PRIMARY KEY (`genre_id`)
);

/*Data for the table `genre` */

insert  into `genre`(`genre_id`,`genre_name`) values 
(1,'Action'),
(2,'Comedy'),
(3,'Drama'),
(4,'Fantasy'),
(5,'Horror');
