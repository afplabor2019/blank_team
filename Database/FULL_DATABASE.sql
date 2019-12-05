-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 02:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(5) COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` char(5) COLLATE utf8_hungarian_ci NOT NULL,
  `shipping_id` char(5) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`) VALUES
('io4OO', 'tTgJW', 'none'),
('FPgKX', 'hgkm8', 'none'),
('iK9xG', 'e3m3u', 'RsuP1'),
('Aqh2o', 'CUbFb', 'none'),
('MQTlh', '9HqQy', 'none'),
('yGOd4', 'WR0JS', 'none'),
('xhBkz', 'GUMAU', 'M3P4n'),
('xvH6I', 'kwU3F', 'none'),
('oQKJH', 'kwU3F', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` char(5) COLLATE utf8_hungarian_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `del` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `item_id`, `quantity`, `del`) VALUES
('iK9xG', 8, 1, 0),
('io4OO', 6, 1, 0),
('FPgKX', 57, 15, 0),
('Aqh2o', 8, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `price` float NOT NULL,
  `platform` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `release_year` int(4) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `description` text COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cover` text COLLATE utf8_hungarian_ci NOT NULL,
  `del` tinyint(1) DEFAULT NULL,
  `adpic` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `review_count` int(11) DEFAULT NULL,
  `stored` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `publisher`, `type`, `price`, `platform`, `release_year`, `score`, `description`, `cover`, `del`, `adpic`, `review_count`, `stored`) VALUES
(57, 'Death Stranding', 'Sony', 'Open world', 60, 'PS4', 2019, 0, 'A jÃ¶vÅ‘ a kezedben van a Death Stranding jÃ¡tÃ©kban! Ã‰ld Ã¡t Hideo Kojima (a Metal Gear Solid sorozat alkotÃ³ja) legÃºjabb akciÃ³jÃ¡tÃ©kÃ¡t, amely a kÃ¶zeli jÃ¶vÅ‘ben jÃ¡tszÃ³dik, Ã©s amelyben a szÃ©tszakadt tÃ¡rsadalmat kell Ãºjra egyesÃ­tened. Ez egy Ãºj, filmszerÅ± kaland, amely megreformÃ¡lja a mÅ±fajt!', 'images\\covers\\Yqxktds-ad2.jpg', 0, 'images/adimages/dscover.jpg', 0, 0),
(2, 'FIFA 20', 'EA Sports', 'Battle Royale', 59.99, 'XBOX 360', 2019, 0, ' LÃ©pj be a labdarÃºgÃ¡s vilÃ¡gÃ¡ba egyszerre kÃ©t oldalrÃ³l is! Az EA SPORTS FIFA 20 a profi futball mellett visszatÃ©r az utcÃ¡kra is a VOLTA Football segÃ­tsÃ©gÃ©vel! A VOLTA egy teljesen Ãºj, utcai focis Ã©lmÃ©ny tÃ¶bbfÃ©le jÃ¡tÃ©kmÃ³ddal, amelyben lÃ©trehozhatod sajÃ¡t karakteredet, Ã©s a vilÃ¡g minden tÃ¡jÃ¡n pÃ¡lyÃ¡ra lÃ©phetsz az utcai foci szabÃ¡lyai szerint. Szabd testre sportolÃ³dat szÃ¡mtalan ruhÃ¡val Ã©s kiegÃ©szÃ­tÅ‘vel, Ã©pÃ­tsd fel a sajÃ¡t jÃ¡tÃ©kstÃ­lusodat, Ã©s lÃ©gy az utcÃ¡k kirÃ¡lya!', 'images\\covers\\fifa20.png', 0, 'images/adimages/dscover.jpg', 0, 0),
(3, 'Luigi\'s Mansion 3', 'Nintendo', 'RPG', 59.99, 'Nintendo Switch', 2019, 0, ' A vilÃ¡gsikert aratott Luigiâ€™s Mansion sorozat visszatÃ©r az eddigi legszebb Ã©s legnagyobb epizÃ³ddal, kizÃ¡rÃ³lag Nintendo Switch konzolon! Luigi Ã©ppen vakÃ¡ciÃ³zik Mario Ã©s barÃ¡tai tÃ¡rsasÃ¡gÃ¡ban, amikor meghÃ­vÃ¡st kap egy luxushotelbe. Csakhogy az Ã¡lom hamarosan rÃ©mÃ¡lommÃ¡ vÃ¡lik, amikor King Boo felfedi, hogy mindez csak egy csapda volt ahhoz, hogy Mario Ã©s barÃ¡tai kelepcÃ©be kerÃ¼ljenek. IsmÃ©t Luigi kezÃ©ben a megoldÃ¡s! E. Gadd professzor segÃ­tsÃ©gÃ©vel Ãºjra szellemvadÃ¡szatra indulhatsz egy sÃ¶tÃ©t, fÃ©lelmetes szÃ¡lloda emeletein!', 'images\\covers\\luigism.jpg', 0, 'images/adimages/dscover.jpg', 0, 11),
(4, 'Cyberpunk 2077', 'CDProjekt Red', 'Open world', 59.99, 'PC', 2020, 0, ' A Cyberpunk 2077 a CD Projekt RED (The Witcher 3: Wild Hunt) Ãºj, nagyszabÃ¡sÃº, nyÃ­lt vilÃ¡gÃº akciÃ³jÃ¡tÃ©ka, amely egy futurisztikus nagyvÃ¡rosban, Night City-ben jÃ¡tszÃ³dik. A fÅ‘hÅ‘s V, egy tÃ¶rvÃ©nyen kÃ­vÃ¼li hacker Ã©s zsoldos, akinek a bÅ‘rÃ©be bÃºjva kell megszerezned egy kÃ¼lÃ¶nleges kibernetikus implantÃ¡tumot, amely a mondÃ¡k szerint Ã¶rÃ¶k Ã©letet biztosÃ­t. A CD Projekt RED minden szempontbÃ³l Ãºj szintre emeli a nyÃ­lt vilÃ¡gÃº szerepjÃ¡tÃ©kokat, a Cyberpunk 2077 nagyobb, sÅ±rÅ±bb Ã©s Ã¶sszetettebb jÃ¡tÃ©k, mint bÃ¡rmi, amit a stÃºdiÃ³ eddig kÃ©szÃ­tett!', 'images\\covers\\XXn9pcyberpunk.jpg', 0, 'images/adimages/dscover.jpg', 0, 18),
(5, 'Detroit Become Human', 'Sony', 'RPG', 59.99, 'PS4', 2018, 0, ' Mit jelent embernek lenni? Hol hÃºzÃ³dik a hatÃ¡r a gÃ©pek Ã©s az emberek Ã©lete kÃ¶zÃ¶tt? David Cage Ã©s a Quantic Dream legÃºjabb PS4 jÃ¡tÃ©ka ezekre a kÃ©rdÃ©sekre keresi a vÃ¡laszt 2038 Detroit-jÃ¡ban. A jÃ¡tÃ©kban a teljesen emberszerÅ± androidok sok ember munkÃ¡jÃ¡t Ã¡tvettÃ©k, Ã¡m nÃ©melyikÃ¼k furcsÃ¡n kezd viselkedni, mintha valÃ³di Ã©rzelmei lennÃ©nek. JÃ¡tÃ©koskÃ©nt hÃ¡rom ilyen androidot irÃ¡nyÃ­thatsz, akik morÃ¡lis kÃ©rdÃ©sek Ã©s dÃ¶ntÃ©sek elÃ© kerÃ¼lnek. Te hatÃ¡rozod meg a sorsukat, Ã©s a tÃ¶rtÃ©net alakulÃ¡sÃ¡t!', 'images\\covers\\detroit-become-human---button-fin-1553106540549.jpg', 0, 'images/adimages/dscover.jpeg', 0, 19),
(6, 'The Witcher III (3): Wild Hunt Complete Edition', 'CDProjekt Red', 'RPG', 59.99, 'PC', 2015, 0, ' BÃºjj RÃ­viai Geralt, a hÃ­res szÃ¶rnyvadÃ¡sz bÅ‘rÃ©be, Ã©s Ã©lj Ã¡t egy hihetetlen tÃ¶rtÃ©netet a The Witcher sorozat befejezÅ‘ rÃ©szÃ©ben. A lenyÅ±gÃ¶zÅ‘en szÃ©p jÃ¡tÃ©kban nehÃ©z dÃ¶ntÃ©seket kell meghoznod, melyek valÃ³di kÃ¶vetkezmÃ©nyekkel jÃ¡rnak a tÃ¶rtÃ©net alakulÃ¡sÃ¡ra nÃ©zve. Geralt kirÃ¡lyok, szeretÅ‘k, vad nÃ©pek Ã©s halÃ¡los szÃ¶rnyek labirintusÃ¡ban kÃ©nytelen megtalÃ¡lni a helyes utat. Hatalmas vilÃ¡g, hosszÃº mellÃ©kÃ¼ldetÃ©sek, lenyÅ±gÃ¶zÅ‘ tÃ¡jak vÃ¡rnak a valaha kÃ©szÃ¼lt egyik legjobb szerepjÃ¡tÃ©kban, amely tÃ¶bb szÃ¡z dÃ­jjal bÃ¼szkÃ©lkedhet. Vidd magaddal a kalandot, Ã©s Ã©lvezd Nintendo Switch-en is!', 'images\\covers\\witcher.jpg', 0, 'images/adimages/dscover.jpg', 0, 18),
(7, 'The Witcher III (3): Wild Hunt Complete Edition', 'CDProjekt Red', 'RPG', 59.99, 'XBOX One', 2015, 5, ' BÃºjj RÃ­viai Geralt, a hÃ­res szÃ¶rnyvadÃ¡sz bÅ‘rÃ©be, Ã©s Ã©lj Ã¡t egy hihetetlen tÃ¶rtÃ©netet a The Witcher sorozat befejezÅ‘ rÃ©szÃ©ben. A lenyÅ±gÃ¶zÅ‘en szÃ©p jÃ¡tÃ©kban nehÃ©z dÃ¶ntÃ©seket kell meghoznod, melyek valÃ³di kÃ¶vetkezmÃ©nyekkel jÃ¡rnak a tÃ¶rtÃ©net alakulÃ¡sÃ¡ra nÃ©zve. Geralt kirÃ¡lyok, szeretÅ‘k, vad nÃ©pek Ã©s halÃ¡los szÃ¶rnyek labirintusÃ¡ban kÃ©nytelen megtalÃ¡lni a helyes utat. Hatalmas vilÃ¡g, hosszÃº mellÃ©kÃ¼ldetÃ©sek, lenyÅ±gÃ¶zÅ‘ tÃ¡jak vÃ¡rnak a valaha kÃ©szÃ¼lt egyik legjobb szerepjÃ¡tÃ©kban, amely tÃ¶bb szÃ¡z dÃ­jjal bÃ¼szkÃ©lkedhet. Vidd magaddal a kalandot, Ã©s Ã©lvezd Nintendo Switch-en is!', 'images\\covers\\3nPhYwitcher.jpg', 0, 'images/adimages/dscover.jpg', 1, 20),
(8, 'The Witcher III (3): Wild Hunt Complete Edition', 'CDProjekt Red', 'RPG', 59.99, 'PS4', 2015, 5, ' BÃºjj RÃ­viai Geralt, a hÃ­res szÃ¶rnyvadÃ¡sz bÅ‘rÃ©be, Ã©s Ã©lj Ã¡t egy hihetetlen tÃ¶rtÃ©netet a The Witcher sorozat befejezÅ‘ rÃ©szÃ©ben. A lenyÅ±gÃ¶zÅ‘en szÃ©p jÃ¡tÃ©kban nehÃ©z dÃ¶ntÃ©seket kell meghoznod, melyek valÃ³di kÃ¶vetkezmÃ©nyekkel jÃ¡rnak a tÃ¶rtÃ©net alakulÃ¡sÃ¡ra nÃ©zve. Geralt kirÃ¡lyok, szeretÅ‘k, vad nÃ©pek Ã©s halÃ¡los szÃ¶rnyek labirintusÃ¡ban kÃ©nytelen megtalÃ¡lni a helyes utat. Hatalmas vilÃ¡g, hosszÃº mellÃ©kÃ¼ldetÃ©sek, lenyÅ±gÃ¶zÅ‘ tÃ¡jak vÃ¡rnak a valaha kÃ©szÃ¼lt egyik legjobb szerepjÃ¡tÃ©kban, amely tÃ¶bb szÃ¡z dÃ­jjal bÃ¼szkÃ©lkedhet. Vidd magaddal a kalandot, Ã©s Ã©lvezd Nintendo Switch-en is!', 'images\\covers\\ZouVqwitcher.jpg', 0, 'images/adimages/dscover.jpg', 1, 17),
(9, 'The Witcher III (3): Wild Hunt Complete Edition', 'CDProjekt Red', 'RPG', 59.99, 'Nintendo Switch', 2015, 0, ' BÃºjj RÃ­viai Geralt, a hÃ­res szÃ¶rnyvadÃ¡sz bÅ‘rÃ©be, Ã©s Ã©lj Ã¡t egy hihetetlen tÃ¶rtÃ©netet a The Witcher sorozat befejezÅ‘ rÃ©szÃ©ben. A lenyÅ±gÃ¶zÅ‘en szÃ©p jÃ¡tÃ©kban nehÃ©z dÃ¶ntÃ©seket kell meghoznod, melyek valÃ³di kÃ¶vetkezmÃ©nyekkel jÃ¡rnak a tÃ¶rtÃ©net alakulÃ¡sÃ¡ra nÃ©zve. Geralt kirÃ¡lyok, szeretÅ‘k, vad nÃ©pek Ã©s halÃ¡los szÃ¶rnyek labirintusÃ¡ban kÃ©nytelen megtalÃ¡lni a helyes utat. Hatalmas vilÃ¡g, hosszÃº mellÃ©kÃ¼ldetÃ©sek, lenyÅ±gÃ¶zÅ‘ tÃ¡jak vÃ¡rnak a valaha kÃ©szÃ¼lt egyik legjobb szerepjÃ¡tÃ©kban, amely tÃ¶bb szÃ¡z dÃ­jjal bÃ¼szkÃ©lkedhet. Vidd magaddal a kalandot, Ã©s Ã©lvezd Nintendo Switch-en is!', 'images\\covers\\feT81witcher.jpg', 0, 'none', 0, 19),
(10, 'Jurassic World Evolution', 'Frontier Development', 'RPG', 59.99, 'PC', 2018, 0, ' ÃœdvÃ¶zÃ¶l a Jurassic Park, a te sajÃ¡t Jurassic Parkod! A Frontier Developments (Zoo Tycoon, Elite Dangerous, Planet Coaster) legÃºjabb jÃ¡tÃ©ka egy igazi parkÃ©pÃ­tÅ‘ szimulÃ¡tor, amelyben tÃ¶bb, mint 50 dinoszaurusz fajt hozhatsz lÃ©tre, Ã©s a Jurassic Park Ã©s Jurassic World filmekben lÃ¡tott szigetek egyikÃ©n felÃ©pÃ­theted Ã¡lmaid parkjÃ¡t, ahol ezek az Ã¡llatok Ã©lnek. Ã‰pÃ­tkezÃ©sed hÃ¡rom irÃ¡nyt vehet: elÅ‘tÃ©rbe helyezheted a tudomÃ¡nyt, a szÃ³rakoztatÃ¡st vagy a biztonsÃ¡got, ennek megfelelÅ‘en kell kÃ¼lÃ¶nbÃ¶zÅ‘ kÃ¼ldetÃ©seket teljesÃ­tened. A szigeteken tÃ¶bbfÃ©le idÅ‘jÃ¡rÃ¡si kÃ¶rÃ¼lmÃ©ny is nehezÃ­ti a helyzetet! TrÃ³pusi viharok, vulkÃ¡nkitÃ¶rÃ©sek, fÃ¶ldrengÃ©sek csaphatnak le a parkra, a meghibÃ¡sodott kerÃ­tÃ©sen pedig kÃ¶nnyen kiszabadulnak a hÃºsevÅ‘k!', 'images\\covers\\Jurassic-World-Evolution-Cover.jpg', 0, 'none', 0, 19),
(11, 'The Legend of Zelda: Breath of the Wild', 'Nintendo', 'RPG', 59.99, 'Nintendo Switch', 2017, 0, ' A The Legend of Zelda: Breath of the Wild egy nyitott vilÃ¡gÃº szerepjÃ¡tÃ©kkÃ©nt ismÃ©t lehetÅ‘sÃ©get ad szÃ¡modra, hogy megmentsd a vilÃ¡got a pusztulÃ¡stÃ³l, de mikÃ¶zben cÃ©lodÃ©rt loholsz, Link tÃ¡rsasÃ¡gÃ¡ban rengeteg izgalmas kalandba keveredhetsz, kisebb-nagyobb bestiÃ¡kkal mÃ©rheted Ã¶ssze tudÃ¡sodat, fejlÅ‘dhetsz, elixÃ­reket fÅ‘zhetsz, kÃ¼lÃ¶nfÃ©le prÃ³bÃ¡kat teljesÃ­thetsz, fejtÃ¶rÅ‘ket oldhatsz meg Ã©s egy garantÃ¡ltan Ã©letre szÃ³lÃ³ Ã©lmÃ©nyt szerezhetsz magadnak.', 'images\\covers\\zelda.png', 0, 'none', 0, 20),
(12, 'The Outer Worlds', 'Obsidian', 'RPG', 59.99, 'PC', 2019, 0, ' ÃœdvÃ¶zlet a jÃ¶vÅ‘benâ€¦ LehetÅ‘leg ne tÃ¶rj Ã¶ssze semmit! A The Outer Worlds egy Ãºj, nagyszabÃ¡sÃº egyjÃ¡tÃ©kos szerepjÃ¡tÃ©k az Obsidian Entertainment (Pillars of Eternity) Ã©s a Private Division jÃ³voltÃ¡bÃ³l. Egy kolonista Å±rhajÃ³ utasakÃ©nt Ã©ppen a galaxis legtÃ¡volabbi csÃ¼cske felÃ© tartasz, amikor valami problÃ©ma tÃ¶rtÃ©nik, Ã©s csak Ã©vtizedekkel kÃ©sÅ‘bb tÃ©rsz magadhoz. Ã–sszeeskÃ¼vÃ©sek Ã©s ellensÃ©ges erÅ‘k prÃ³bÃ¡ljÃ¡k elpusztÃ­tani a Halcyon kolÃ³niÃ¡t! VeszÃ©lyes kalandra kell indulnod a vilÃ¡gÅ±r ismeretlen rÃ©szeibe, ahol kÃ¼lÃ¶nleges vilÃ¡gokat fedezhetsz fel, Å‘rÃ¼lt bandÃ¡kkal Ã©s frakciÃ³kkal szÃ¶vetkezhetsz, vagy Ã©ppen az Ãºtjukba Ã¡llhatsz, dÃ¶ntÃ©seidtÅ‘l fÃ¼ggÅ‘en. Te dÃ¶ntÃ¶d el, fÅ‘hÅ‘sÃ¶d milyen karakterrÃ© vÃ¡lik, de mindennek kÃ¶vetkezmÃ©nye van, Ã©s ez hatÃ¡ssal van a tÃ¶rtÃ©net vÃ©gkimenetelÃ©re is. Mindenki hatalomra vÃ¡gyik, Ã©s ebben a precÃ­zen megtervezett, elnyomÃ³ rendszerben te vagy az, akivel senki nem szÃ¡moltâ€¦', 'images\\covers\\outerworld.png', 0, 'none', 0, 20),
(13, 'Doom 2016', 'Bethesda', 'Shooter', 59.99, 'PC', 2016, 5, 'A Doom-sorozat legÃºjabb epizÃ³djÃ¡ban ismÃ©t felfedezheted a klasszikus FPS-jÃ¡tÃ©kok sajÃ¡tos Ã©lmÃ©nyÃ©t, mÃ©ghozzÃ¡ maximÃ¡lisan modern grafikÃ¡val ellÃ¡tva. A Doom (2016) ezÃºttal sem kÃ­nÃ¡l zsÃ¡kbamacskÃ¡t, csak brutÃ¡lis tempÃ³jÃº, izgalmas Ã¶sszecsapÃ¡sokat, amelyek sorÃ¡n gondosan felÃ©pÃ­tett pÃ¡lyÃ¡kon, fÃ©lelmetes dÃ©monokkal kell Ã¶sszemÃ©rnÃ¼nk tudÃ¡sunkat, de sokkal inkÃ¡bb fegyvereink erejÃ©t.', 'images\\covers\\doom.jpg', 0, 'images/adimages/dscover.jpg', 1, 19),
(14, 'Witcher 3 - The wild hunt', 'CD Projekt Red', 'Open world', 19.99, 'Nintendo Switch', 2015, 0, ' Best game ever', 'images\\covers\\YlZ1Twitcher3.jpg', 0, 'none', 0, 20),
(15, 'Red Dead Redemption 2', 'Rockstar', 'Open world', 29.99, 'PC', 2018, 0, ' Open world county shooter', 'images\\covers\\rdd2.jpg', 0, 'none', 0, 20),
(16, 'Destiny', 'Bungie', 'Shooter', 19.99, 'PC', 2016, 7, ' Pisti kedvenc jÃ¡tÃ©ka', 'images\\covers\\destiny.jpg', 0, 'images/adimages/dscover.jpg', 2, 19),
(17, 'Minecraft', 'Notch', 'Open world', 19.99, 'XBOX 360', 2009, 5, ' best game ever', 'images\\covers\\mc.jpg', 0, 'images/adimages/dscover.jpg', 1, 20),
(18, 'Call of Duty: Ghosts', 'Activision', 'Shooter', 19.99, 'XBOX 360', 2013, 0, ' Shooter game ', 'images\\covers\\cod-ghosts.jpg', 0, 'none', 0, 20),
(19, 'Battlefield 1', 'EA', 'Shooter', 29.99, 'PS4', 2016, 0, ' Shooter game', 'images\\covers\\bf1.jpg', 0, 'none', 0, 20),
(20, 'PlayerUnknownâ€™s Battlegrounds', 'PUBG Corporation', 'Battle Royale', 29.99, 'PC', 2017, 0, ' bruh', 'images\\covers\\pubg.jpg', 0, 'none', 0, 20),
(21, 'Cyberpunk 2077', 'CD Projekt', 'Shooter', 59.99, 'PC', 2020, 0, ' Yeaaah boi', 'images\\covers\\cyberpunk.jpg', 0, 'none', 0, 20),
(22, 'Metro Exodus', 'Deep Silver', 'Shooter', 49.99, 'XBOX One', 2019, 0, ' Kalash', 'images\\covers\\metro-exodus.jpg', 0, 'none', 0, 20),
(23, 'Witcher 3 - The wild hunt', 'CD Projekt Red', 'Open world', 19.99, 'Nintendo Switch', 2015, 0, ' Best game ever', 'images\\covers\\YlZ1Twitcher3.jpg', 0, 'none', 0, 20),
(24, 'Red Dead Redemption 2', 'Rockstar', 'Open world', 29.99, 'PC', 2018, 11, ' Open world county shooter', 'images\\covers\\rdd2.jpg', 0, 'images/adimages/dscover.jpg', 3, 20),
(25, 'Destiny', 'Bungie', 'Shooter', 19.99, 'PC', 2016, 0, ' Pisti kedvenc jÃ¡tÃ©ka', 'images\\covers\\destiny.jpg', 0, 'none', 0, 20),
(26, 'Minecraft', 'Notch', 'Open world', 19.99, 'XBOX 360', 2009, 0, ' best game ever', 'images\\covers\\mc.jpg', 0, 'none', 0, 20),
(27, 'Call of Duty: Ghosts', 'Activision', 'Shooter', 19.99, 'XBOX 360', 2013, 0, ' Shooter game ', 'images\\covers\\cod-ghosts.jpg', 0, 'none', 0, 20),
(28, 'Battlefield 1', 'EA', 'Shooter', 29.99, 'PS4', 2016, 0, ' Shooter game', 'images\\covers\\bf1.jpg', 0, 'none', 0, 20),
(29, 'PlayerUnknownâ€™s Battlegrounds', 'PUBG Corporation', 'Battle Royale', 29.99, 'PC', 2017, 0, ' bruh', 'images\\covers\\pubg.jpg', 0, 'none', 0, 20),
(30, 'Cyberpunk 2077', 'CD Projekt', 'Shooter', 59.99, 'PC', 2020, 0, ' Yeaaah boi', 'images\\covers\\cyberpunk.jpg', 0, 'none', 0, 20),
(31, 'Metro Exodus', 'Deep Silver', 'Shooter', 49.99, 'XBOX One', 2019, 0, 'Kalash', 'images\\covers\\metro-exodus.jpg', 0, 'none', 0, 20),
(32, 'Witcher 3 - The wild hunt', 'CD Projekt Red', 'Open world', 19.99, 'Nintendo Switch', 2015, 0, ' Best game ever', 'images\\covers\\YlZ1Twitcher3.jpg', 0, 'none', 0, 20),
(33, 'Red Dead Redemption 2', 'Rockstar', 'Open world', 29.99, 'PC', 2018, 0, ' Open world county shooter', 'images\\covers\\rdd2.jpg', 0, 'none', 0, 20),
(34, 'Destiny', 'Bungie', 'Shooter', 19.99, 'PC', 2016, 0, ' Pisti kedvenc jÃ¡tÃ©ka', 'images\\covers\\destiny.jpg', 0, 'none', 0, 20),
(35, 'Minecraft', 'Notch', 'Open world', 19.99, 'XBOX 360', 2009, 0, ' best game ever', 'images\\covers\\mc.jpg', 0, 'none', 0, 20),
(36, 'Call of Duty: Ghosts', 'Activision', 'Shooter', 19.99, 'XBOX 360', 2013, 0, ' Shooter game ', 'images\\covers\\cod-ghosts.jpg', 0, 'none', 0, 20),
(37, 'Battlefield 1', 'EA', 'Shooter', 29.99, 'PS4', 2016, 0, ' Shooter game', 'images\\covers\\bf1.jpg', 0, 'none', 0, 20),
(38, 'PlayerUnknownâ€™s Battlegrounds', 'PUBG Corporation', 'Battle Royale', 29.99, 'PC', 2017, 0, ' bruh', 'images\\covers\\pubg.jpg', 0, 'none', 0, 20),
(39, 'Cyberpunk 2077', 'CD Projekt', 'Shooter', 59.99, 'PC', 2020, 0, ' Yeaaah boi', 'images\\covers\\cyberpunk.jpg', 0, 'none', 0, 20),
(40, 'Metro Exodus', 'Deep Silver', 'Shooter', 49.99, 'XBOX One', 2019, 0, 'Kalash', 'images\\covers\\metro-exodus.jpg', 0, 'none', 0, 20),
(41, 'Monster Hunter : World', 'Capcom', 'MMO', 39.99, 'PC', 2018, 0, ' Bocsi', 'images\\covers\\mhw.jpg', 0, 'none', 0, 20),
(42, 'Far Cry 5', 'Ubisoft', 'Open world', 39.99, 'PS4', 2018, 0, ' Best', 'images\\covers\\fc5.jpg', 0, 'none', 0, 20),
(43, 'Far Cry 3', 'Ubisoft', 'Open world', 29.99, 'XBOX 360', 2012, 0, ' nosztalgia', 'images\\covers\\Oeillfc3.jpg', 0, 'none', 0, 20),
(44, 'Grand Theft Auto V', 'Rockstar', 'Open world', 50.99, 'PS3', 2013, 0, ' Ilyen rÃ©gen? bazdki', 'images\\covers\\gta5.png', 0, 'none', 0, 20),
(45, 'Overwatch', 'Blizzard Entertainment', 'Shooter', 39.99, 'XBOX One', 2016, 0, ' Overwatch', 'images\\covers\\overwatch.jpg', 0, 'none', 0, 20),
(46, 'Fifa 20', 'EA', 'Shooter', 49.99, 'PS4', 2019, 0, ' Football game', 'images\\covers\\fifa20.jpg', 0, 'none', 0, 0),
(47, 'Naruto Shippuden: Ultimate Ninja Storm 4', 'Bandai Namco Entertainment', 'Fighter', 39.99, 'XBOX 360', 2016, 0, ' Naruto fighter game', 'images\\covers\\naruto.jpg', 0, 'none', 0, 20),
(48, 'Detroit: Become Human', 'Sony', 'RPG', 49.99, 'PS4', 2018, 0, ' Bruh', 'images\\covers\\detroit.jpg', 0, 'none', 0, 20),
(49, 'Lego Star Wars: The Complete Saga', 'LucasArts', 'MMO', 59.99, 'Nintendo GameCube', 2007, 0, ' Gyerekkor pls', 'images\\covers\\sw.jpg', 0, 'none', 0, 19),
(50, 'Death Stranding', 'Sony', 'RPG', 59.99, 'PS4', 2019, 0, ' Death Stranding', 'images\\covers\\ds-ad2.jpg', 0, 'none', 0, 20),
(51, 'Final Fantasy XV', 'Square Enix', 'MMO', 49.99, 'PC', 2018, 0, 'JRPG', 'images\\covers\\ffXV.jpg', 0, 'none', 0, 20),
(52, 'Super Mario Odyssey', 'Nintendo', 'Open world', 59.99, 'Nintendo Switch', 2017, 0, 'Its-a-me', 'images\\covers\\supermarioodyssy.jpg', 0, 'none', 0, 20),
(53, 'Need for Speed Heat', 'EA', 'Sport', 39.99, 'XBOX One', 2019, 0, ' Car racing game', 'images\\covers\\nfsheat.jpg', 0, 'none', 0, 20),
(54, 'The Legend of Zelda: Breath of the Wild', 'Nintendo', 'Open world', 59.99, 'Nintendo Switch', 2017, 0, ' Link for the win', 'images\\covers\\zeldabotw.png', 0, 'none', 0, 20),
(55, 'Call of Duty: Modern Warfare', 'Activision', 'Shooter', 59.99, 'PC', 2019, 0, ' New cod new hope', 'images\\covers\\codmw.png', 0, 'none', 0, 19),
(56, 'Ni no Kuni II: Revenant Kingdom', 'Bandai Namco Entertainment JP', 'Open world', 49.99, 'PS4', 2018, 0, ' JRPG', 'images\\covers\\ninokuni.jpg', 0, 'none', 0, 20),
(1, 'GAMERZ', 'Blank_team', 'Webshop', 9999, 'all', 2019, 5, 'none', 'none', 0, 'images/adimages/dscover.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` char(5) COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` char(5) COLLATE utf8_hungarian_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `msg` text COLLATE utf8_hungarian_ci NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `msg`, `score`) VALUES
('AkyHH', 'e3m3u', 9, 'anyÃ¡tokat', 5),
('ib4TH', 'e3m3u', 9, 'miÃ©rt, nem is !', 4),
('2lirv', 'e3m3u', 9, 'szar', 1),
('Of6hM', 'e3m3u', 8, 'asd', 5),
('yQeDi', 'e3m3u', 1, 'szar', 3),
('kstgG', 'e3m3u', 7, 'ZsÃ­r. kappa', 1),
('YQ6AX', 'e3m3u', 7, 'ZsÃ­r. kappa', 1),
('rsayl', 'e3m3u', 12, 'gyerekkorom jÃ¡tÃ©ka!', 4),
('aQxhU', 'e3m3u', 25, 'Ã–t csillag', 5),
('PcfP7', 'e3m3u', 25, 'szerintem meg egy fos', 1),
('Xao7u', 'e3m3u', 3, 'yee', 5),
('na9s0', 'e3m3u', 17, 'best\r\n', 5),
('MyXF8', 'e3m3u', 8, 'review', 5),
('nzoEA', 'e3m3u', 7, 'wow', 5),
('ff7mW', 'e3m3u', 24, 'fos', 5),
('wBqZ8', 'e3m3u', 24, 'nem is', 5),
('X5Ef8', 'e3m3u', 24, 'asd', 1),
('qkq97', 'e3m3u', 0, 'Fasza oldal!', 5),
('4c4GE', 'e3m3u', 0, 'asd', 5),
('pbOsb', 'e3m3u', 57, 'asd', 5),
('V97RW', 'e3m3u', 1, 'jÃ³', 5),
('yp5zP', 'e3m3u', 1, 'jÃ³', 4),
('OTrWQ', 'GUMAU', 16, 'A kedvenc JÃ¡tÃ©kom!!4!!NÃ‰GY!', 5),
('tgjY4', 'GUMAU', 13, 'Am ezt is szeretem!!4!', 5),
('Vt18y', 'e3m3u', 1, 'TÃ©nyleg az.', 5),
('zV7Db', 'GUMAU', 1, 'HÃ¡t ez nagyon kaksi', 1),
('uKXtS', 'e3m3u', 16, 'nekem nem teccik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` char(5) COLLATE utf8_hungarian_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `country`, `client_name`, `city`, `address`, `tel`, `email`) VALUES
('RsuP1', 'HU', 'none', 'Eger', 'none', '06308965170', 'balazs.wolf@gmail.hu'),
('ntYXE', 'none', 'none', 'none', 'none', 'none', 'kalas.gaming@gmail.hu'),
('M3P4n', 'none', 'asd', 'none', 'none', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(5) COLLATE utf8_hungarian_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `shipping_id` char(5) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `password` text COLLATE utf8_hungarian_ci NOT NULL,
  `del` tinyint(1) DEFAULT NULL,
  `profile_pic` text COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `fullname`, `birth_date`, `age`, `role`, `registration_date`, `shipping_id`, `password`, `del`, `profile_pic`) VALUES
('Wvbo4', 'KÃ¡roly', 'viagrahun@gmail.com', 'Alexa KornÃ©l', '2000-01-20', 19, 1, '2019-11-05', 'pY4zn', '$2y$10$uyO8CjW2fEULIilYVDGz0.lQFyA4VcJTyoUGtvli/69k92ZaYFQr2', 0, 'images\\profilepic\\user.jpg'),
('e3m3u', 'Kalas47', 'balazs.wolf@gmail.hu', 'Farkas Balazs Alex', '2000-01-27', 19, 1, '2019-11-03', 'RsuP1', '$2y$10$qx3S0KL3jHFBbeTh6SaaFO8pSm.c/hq66KuCRdf4yEgJ2ck/y8rMO', 0, 'images\\profilepic\\LhJfq8578bfd439ef6ee41e103ae82b561986.png'),
('GUMAU', 'Steven_99', 'horvath.istvan1999@freemail.hu', 'HorvÃ¡th IstvÃ¡n', '1999-12-06', 19, 0, '2019-11-07', 'M3P4n', '$2y$10$BZGf5gsU1NFhG87MG.1EFegjxwgRgZCL1hMhNMUaLPpZF8jkd8f5K', 0, 'images\\profilepic\\jp7bfpityu.jpg'),
('eai40', 'Kalas392', 'kalas.gaming@gmail.hu', 'Farkas BalÃ¡zs', '2000-01-27', 19, 0, '2019-12-02', 'ntYXE', '$2y$10$t6A/LmRImt.2D8ONCMaqkOOP/yXUZHE6Fg..sgCP05xIfx53ZADqO', 0, 'images\\profilepic\\user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_id`,`item_id`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
