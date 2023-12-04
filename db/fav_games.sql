-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 04:44 AM
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
-- Database: `gmaan1_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `fav_games`
--

CREATE TABLE `fav_games` (
  `title` varchar(255) NOT NULL,
  `released` int(11) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `trailer` longtext NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `games_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fav_games`
--

INSERT INTO `fav_games` (`title`, `released`, `writer`, `genre`, `mode`, `publisher`, `trailer`, `filename`, `description`, `games_id`) VALUES
('GTA V', 2013, 'Dan Houser', 'Action', 'Single-Player', 'Rockstar games', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/HqZXw5M6qQY\" title=\"Grand Theft Auto V: Michael\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'gtav.jpg', 'An Open-World Game With Three characters whose life you can live in this game.', 2),
('Watch Dogs 2', 2016, 'Lucien Soulban', 'Adventure', 'Single-Player', 'Ubisoft', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/2GIVVsTKTLg\" title=\"Watch Dogs 2 – Launch Trailer | Ubisoft [NA]\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Watch dogs 2.jpg', 'Play as Marcus Holloway, a brilliant young hacker living in the birthplace of the tech revolution, the San Francisco Bay Area.', 3),
('Call of Duty: Modern Warfare II', 2022, 'Brian Bloom', 'Action', 'Multi-Player', 'Activision', '<iframe width=\"996\" height=\"498\" src=\"https://www.youtube.com/embed/r72GP1PIZa0\" title=\"Call of Duty: Modern Warfare II - World Gameplay Reveal Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'MWII-002-REVEAL-TOUT.jpg', 'Call of Duty: Modern Warfare II is a 2022 first-person shooter game developed by Infinity Ward and published by Activision. It is a sequel to the 2019 reboot, and serves as the nineteenth installment in the overall Call of Duty series. It drops players into an unprecedented global conflict that features the return of the iconic Operators of Task Force 141.', 5),
('Apex Legends', 2019, 'Mohammad Alavi', 'Battle royale', 'Multi-Player', 'Electronic Arts', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/innmNewjkuk\" title=\"Apex Legends Official Launch Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'apex-legends.jfif', 'Apex Legends is the award-winning, free-to-play Hero Shooter from Respawn Entertainment. Master an ever-growing roster of legendary characters with powerful abilities, and experience strategic squad play and innovative gameplay in the next evolution of Hero Shooter and Battle Royale.', 6),
('PUBG Battlegrounds', 2017, 'Brendan Greene', 'Battle royale', 'Multi-Player', 'Krafton', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/u1oqfdh4xBY\" title=\"PUBG: BATTLEGROUNDS Cinematic trailer | PUBG\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'pubg-battlegrounds.jpg', 'LAND, LOOT, SURVIVE!\r\nPlay PUBG: BATTLEGROUNDS for free.\r\nLand on strategic locations, loot weapons and supplies, and survive to become the last team standing across various, diverse Battlegrounds.\r\nSquad up and join the Battlegrounds for the original Battle Royale experience that only PUBG: BATTLEGROUNDS can offer.', 7),
('The Last Of Us Part I', 2022, 'Neil Druckmann', 'Action', 'Single-Player', 'Sony Entertainment', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/LW5NwaUXgIA\" title=\"The Last of Us Part I - Pre-Purchase Trailer | PC\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '20228301992937_1.jpg', 'Experience the emotional storytelling and unforgettable characters in The Last of Usâ„¢, winner of over 200 Game of the Year awards. a ravaged civilization, where infected and hardened survivors run rampant, Joel, a weary protagonist, is hired to smuggle 14-year-old Ellie out of a military quarantine zone. However, what starts as a small job soon transforms into a brutal cross-country journey.', 8),
('Valorant', 2020, 'Trevor Romleski', 'Battle royale', 'Multi-Player', 'Riot Games', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/IhhjcB2ZjIM\" title=\"Episode 1: IGNITION // Official Launch Gameplay Trailer - VALORANT\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'VALORANT.jpg', 'VALORANT is a character-based 5v5 tactical battle royaleset on the global stage. Outwit, outplay, and outshine your competition with tactical abilities, precise gunplay, and adaptive teamwork.', 9),
('Fortnite', 2018, 'Tim Sweeney', 'Battle royale', 'Multi-Player', 'Epic Games', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/NcQnHvvnehY\" title=\"Fortnite - Launch Cinematic Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'fortnite.jpg', 'Grab all of your friends and drop into Epic Games\' Fortnite, a massive 100-player face-off that combines looting, crafting, shootouts and chaos. The result is a completely unpredictable competitive online experience that gets bigger and even wilder with every new season.', 10),
('Call of duty: Warzone', 2020, 'Raven Ward', 'Battle royale', 'Multi-Player', 'Activision', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/0E44DClsX5Q\" title=\"Official Trailer | Call of Duty: Warzone\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'warzone.jpg', 'Welcome to Al Mazrah. Call of DutyÂ®: Warzone heads to the metropolitan area and rural outskirts within the Republic of Adal in the next iteration of Call of DutyÂ®â€™s massive Free-to-Play Battle Royale experience. The sprawling and immersive locale isnâ€™t the only thing thatâ€™s new: Warzoneâ„¢ 2.0 has been built from the ground up as the ultimate Battle Royale experience. ', 11),
('Mafia II', 2010, 'Jack Scalici', 'Open world', 'Single-Player', '2k games', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/xXayzihCGlc\" title=\"New Mafia II: Boom Boom Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'mafia2.jpg', 'War hero Vito Scaletta becomes entangled with the mob in hopes of paying his fatherâ€™s debts. Vito works to prove himself, climbing the family ladder with crimes of larger reward and consequence', 12),
('Watch Dogs', 2014, 'Kevin Shortt', 'Open world', 'Single-Player', 'Ubisoft', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/PFko4Kut39s\" title=\"Watch Dogs: Launch Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'watch-dogs.jpg', 'As Aiden Pearce, a brilliant hacker, turn Chicago into the ultimate weapon in your quest for revenge. But what happens when your personal quest collides with an entire city?', 13),
('Cyberpunk 2077', 2020, 'Marcin Blacha', 'Open world', 'Single-Player', 'CD Projekt', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/UnA7tepsc7s\" title=\"Cyberpunk 2077 — Official Launch Trailer — V\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'cyberpunk.jpg', 'Cyberpunk 2077 is an open-world, action-adventure RPG set in the megalopolis of Night City, where you play as a cyberpunk mercenary wrapped up in a do-or-die fight for survival. Improved and featuring all-new free additional content, customize your character and playstyle as you take on jobs, build a reputation, and unlock upgrades.', 14),
('Mafia III', 2016, 'Willaim Harms', 'Open world', 'Single-Player', '2k games', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/tM5XkXUXaZo\" title=\"Mafia 3 Definitive Edition - Official Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'mafia3.jpg', 'Part three of the Mafia crime saga - 1968, New Bordeaux, LA.\r\nAfter years of combat in Vietnam, Lincoln Clay knows this truth: family isnâ€™t who youâ€™re born with, itâ€™s who you die for. When his surrogate family is wiped out by the Italian Mafia, Lincoln builds a new family and blazes a path of revenge through the Mafioso responsible.', 15),
('Assassin\\\'s Creed Brotherhood', 2010, 'Corey May', 'Open world', 'Single-Player', 'Ubisoft', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/RVNfLKS_iiw\" title=\"Assassin\'s Creed Brotherhood - Official Trailer (4K 60FPS)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'brotherhood.jpg', 'Assassin\'s Creed: Brotherhood is an action-adventure, stealth game set in an open world environment and played from a third-person perspective.', 16),
('Assassin\\\'s Creed Revelations', 2011, 'Darby McDevitt', 'Open world', 'Single-Player', 'Ubisoft', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/yTVX9GulYdg\" title=\"ASSASSIN\'S CREED REVELATIONS Official Trailer (4K 60FPS)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'revelations.jpg', 'The plot is set in a fictional history of real-world events and follows the millennia-old struggle between the Assassins, who fight to preserve peace and free will, and the Templars, who desire peace through control.', 17),
('Assassin\\\'s Creed Origins', 2017, 'Alain Mercieca', 'Open world', 'Single-Player', 'Ubisoft', '<iframe width=\"1046\" height=\"445\" src=\"https://www.youtube.com/embed/cK4iAjzAoas\" title=\"Assassin\'s Creed Origins Cinematic Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'origin.jpg', 'Ancient Egypt, a land of majesty and intrigue, is disappearing in a ruthless fight for power. Unveil dark secrets and forgotten myths as you go back to the one founding moment: The Origins of the Assassinâ€™s Brotherhood.', 18),
('Red Dead Redemption', 2010, 'Dan Houser', 'Action', 'Single-Player', 'Rockstar games', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/-o7rES_3ymA\" title=\"Red Dead Redemption Official Launch Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'red-dead.jpg', 'Red Dead Redemption is a 2010 action-adventure game developed by Rockstar San Diego and published by Rockstar Games. A spiritual successor to 2004\'s Red Dead Revolver, it is the second game in the Red Dead series.', 19),
('Red Dead Redemption II', 2018, 'Dan Houser', 'Action', 'Single-Player', 'Rockstar games', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/gmA6MrX81z4\" title=\"Red Dead Redemption 2 Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'red-dead2.jpg', 'The game is presented through both first and third-person perspectives, and the player may freely roam in its interactive open world. Gameplay elements include shootouts, robberies, hunting, horseback riding, interacting with non-player characters, and maintaining the character\'s honor rating through moral choices and deeds.', 20),
('Rise Of The Tomb Raider', 2015, 'Rhianna Pratchett', 'Adventure', 'Single-Player', 'Ubisoft', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/qiYiddjc6cU\" title=\"Rise of the Tomb Raider Official Launch Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'rise_of_the_tomb_raider.jpg', 'Explore Croft Manor in the new â€œBlood Tiesâ€ story, then defend it against a zombie invasion in â€œLaraâ€™s Nightmareâ€. Survive extreme conditions with a friend in the new online Co-Op Endurance mode, and brave the new â€œExtreme Survivorâ€ difficulty. Also features an outfit and weapon inspired by Tomb Raider III, and 5 classic Lara skins', 21),
('Shadow Of The Tomb Raider', 2019, 'Jill Murray', 'Adventure', 'Single-Player', 'Ubisoft', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/XYtyeqVQnRI\" title=\"Shadow Of The Tomb Raider - Official Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'shadow.jpg', 'In Shadow of the Tomb Raider Definitive Edition experience the final chapter of Laraâ€™s origin as she is forged into the Tomb Raider she is destined to be. Combining the base game, all seven DLC challenge tombs, as well as all downloadable weapons, outfits, and skills, Shadow of the Tomb Raider Definitive Edition is the ultimate way to experience Laraâ€™s defining moment.', 22),
('Grand Theft Auto: Vice city', 2002, 'James Worrall', 'Action', 'Single-Player', 'Rockstar games', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/f_VBXRZuHTc\" title=\"Grand Theft Auto: Vice City - Anniversary Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'GTA-Vice-City.jpg', 'Vice City is a huge urban sprawl ranging from the beach to the swamps and the glitz to the ghetto, and is the most varied, complete, and alive digital city ever created. Combining non-linear gameplay with a character-driven narrative, you arrive in a town brimming with delights and degradation and are given the opportunity to take it over as you choose.', 23),
('Uncharted 4: A theifs End', 2016, 'Josh Scherr', 'Adventure', 'Single-Player', 'Sony Entertainment', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/y1Rx-Bbht5E\" title=\"Uncharted 4: A Thief\'s End E3 2014 Trailer (PS4)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'uncharted-4.jpg', 'On the hunt for Captain Henry Averyâ€™s long-lost treasure, Sam and Drake set off to find Libertalia, the pirate utopia deep in the forests of Madagascar. UNCHARTED 4: A Thiefâ€™s End takes players on a journey around the globe, through jungle isles, far-flung cities and snow-capped peaks on the search for Averyâ€™s fortune.', 24),
('God Of War', 2018, 'Matt Sophos', 'Adventure', 'Single-Player', 'Sony Entertainment', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/K0u_kAWLJOA\" title=\"God of War – Story Trailer | PS4\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'god-of-war.jfif', 'His vengeance against the Gods of Olympus years behind him, Kratos now lives as a man in the realm of Norse Gods and monsters. It is in this harsh, unforgiving world that he must fight to surviveâ€¦ and teach his son to do the same.\r\n', 25),
('The Witcher', 2007, 'Artur Ganszyniec', 'Action', 'Single-Player', 'CD Projekt', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/w2F_Ti_6E_k\" title=\"The Witcher 1 Enhanced Edition - Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'the-witcher.jpg', 'Become The Witcher, Geralt of Rivia, and get caught in a web of intrigue woven by forces vying for control of the world. Make difficult decisions and live with the consequences in a game that will immerse you in an extraordinary tale like no other.', 26),
('The Witcher: Wild Hunt', 2015, 'Marcin Blacha', 'Action', 'Single-Player', 'CD Projekt', '<iframe width=\"885\" height=\"498\" src=\"https://www.youtube.com/embed/XHrskkHf958\" title=\"Official Launch Trailer - The Witcher 3: Wild Hunt\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'wild-hunt.jfif', 'You are Geralt of Rivia, mercenary monster slayer. Before you stands a war-torn, monster-infested continent you can explore at will. Your current contract? Tracking down Ciri â€” the Child of Prophecy, a living weapon that can alter the shape of the world.', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fav_games`
--
ALTER TABLE `fav_games`
  ADD PRIMARY KEY (`games_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fav_games`
--
ALTER TABLE `fav_games`
  MODIFY `games_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
