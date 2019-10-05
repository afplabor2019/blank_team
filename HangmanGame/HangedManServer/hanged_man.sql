-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Okt 05. 12:24
-- Kiszolgáló verziója: 10.1.38-MariaDB
-- PHP verzió: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hanged_man`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `game_log`
--

CREATE TABLE `game_log` (
  `id` int(11) NOT NULL,
  `p1` int(11) NOT NULL,
  `p2` int(11) NOT NULL DEFAULT '0',
  `p1_word` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `p2_word` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `p1_score` int(11) NOT NULL,
  `p2_score` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `game_log`
--

INSERT INTO `game_log` (`id`, `p1`, `p2`, `p1_word`, `p2_word`, `p1_score`, `p2_score`, `time`) VALUES
(12, 4, 0, '1', NULL, 4, NULL, '2019-10-05 09:34:28'),
(13, 4, 0, '1', NULL, 4, NULL, '2019-10-05 09:35:30'),
(14, 4, 0, '1', NULL, 4, NULL, '2019-10-05 09:35:40'),
(15, 4, 0, '1', NULL, 4, NULL, '2019-10-05 09:35:58'),
(16, 56, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:06'),
(17, 12, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:06'),
(18, 78, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:07'),
(19, 57, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:07'),
(20, 38, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:07'),
(21, 74, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:07'),
(22, 98, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:08'),
(23, 96, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:08'),
(24, 60, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:09'),
(25, 97, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:09'),
(26, 26, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:09'),
(27, 94, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:09'),
(28, 72, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:09'),
(29, 81, 0, '1', NULL, 4, NULL, '2019-10-05 09:57:10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usr` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `psw` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `usr`, `email`, `psw`, `score`) VALUES
(0, 'A.I.', 'ai@hangedman.game', '-', 0),
(3, 'Test2', 'test2', 'sha1:64000:18:G4XbafvrfJPns9+LBro7o4km4MAfwnpU:YOZqZo/c9OSXto0s6ZTyEtLE', 0),
(4, 'test3', 'test3@example.com', 'sha1:64000:18:y33co39uiM1LX9dKGKAk/kiXiObN2PX4:pjwIlPR/B/vttE+fUhT70TUZ', 16),
(5, 'Test_User0', 'test0@example.com', 'sha1:64000:18:QYIetgmbRy74fJxRj3xYWkVOnh+kYeG+:yZtUf8mjnR4gMH6rTAngJMh1', 0),
(6, 'Test_User1', 'test1@example.com', 'sha1:64000:18:bjbaye4IIKqJGD82OJRBeGf3gMZgrvic:pkpcKk93ZlkgGOxEYoN3W97H', 0),
(7, 'Test_User2', 'test2@example.com', 'sha1:64000:18:A09a1QZEP2/fwD+czXGhTm+grJH6Z1Yg:CHYY8oIqJlABxEdrwHkSgepU', 0),
(8, 'Test_User4', 'test4@example.com', 'sha1:64000:18:eT8XSU+UZAMu/G+J3vx8eDv06YKp+fVN:oGzmlEW5aALyxHGACwI6i52o', 0),
(9, 'Test_User5', 'test5@example.com', 'sha1:64000:18:DkyxYYbw6BVVhM16z4DtmXX3iDG80xiz:0rK0zflOgCsrHPkigTSaX9Ts', 0),
(10, 'Test_User6', 'test6@example.com', 'sha1:64000:18:wlhTOrl687VsY1oIgaCNYHKKHQ/voiYi:rGpc5zPlBMy8FWItCTP/OzRZ', 0),
(11, 'Test_User7', 'test7@example.com', 'sha1:64000:18:vut3aIe6EsN1n13gBBoIs1LMmOin/ZE2:Sn3wDZMuXBRHMEffSLzjZ65w', 0),
(12, 'Test_User8', 'test8@example.com', 'sha1:64000:18:8CWPcYPYfD7x/A38fD13K5wzsBhl5fQT:EZ+SSmSK1D9myEWYgXVqBXe5', 4),
(13, 'Test_User9', 'test9@example.com', 'sha1:64000:18:Ue9IHCZ20IhyytoE+oOoopem3Nhmgev8:i1ujyiB+dX8fP/zyanurLWl0', 0),
(14, 'Test_User10', 'test10@example.com', 'sha1:64000:18:eip8cusFr3ej0HKkpOpstXFsKFQl/oZr:p4NB47Ctzkh9tdaYEVTYLqeT', 0),
(15, 'Test_User11', 'test11@example.com', 'sha1:64000:18:Nzg4qT9ZRIxnoN9pyGC8HMbHroAmxMQH:DcKU1wxU0ydJmiO/xckJEDe0', 0),
(16, 'Test_User12', 'test12@example.com', 'sha1:64000:18:7wm3IfYgX7iDuJfKlDe3wek2PUnYsByy:K8I35dfAEAQF6g5uDSJTE4tT', 0),
(17, 'Test_User13', 'test13@example.com', 'sha1:64000:18:fK67XOziKZM2mIJrwbEqv6C7I7QqdDEd:SG0CxTrjfr5r1Aek88/TlAvt', 0),
(18, 'Test_User14', 'test14@example.com', 'sha1:64000:18:DrAlwawGSFFCW2WGU0DGKl0IJKhueSwm:IM005K/DpXY6h+5ZZSOOEcen', 0),
(19, 'Test_User15', 'test15@example.com', 'sha1:64000:18:lV8TjznoVUkCT/+WIt4GTVYcfxRYu5Wr:TXru7/WqNLOevinxMREr4Dfc', 0),
(20, 'Test_User16', 'test16@example.com', 'sha1:64000:18:GWyZJg4ZwjsbqP+msMvB1fpRnirDOPPG:WaQZadVdjRRwMPrh3QJbpP1x', 0),
(21, 'Test_User17', 'test17@example.com', 'sha1:64000:18:RAWJ35szQ7pvgnDHr/JiG/FfXO089392:NMbaU//M5SFRkatKKIvbFlDU', 0),
(22, 'Test_User18', 'test18@example.com', 'sha1:64000:18:Br3C8E6JKIconAUaSqMBxKt4yElrXOOp:ytdb2FKqShp0cjnH9NUfofuv', 0),
(23, 'Test_User19', 'test19@example.com', 'sha1:64000:18:PRq02LCDOMUZYUjYXOa7EMv0o0QbJngM:pBli+mdA6F1Ssn/IZALAmosB', 0),
(24, 'Test_User20', 'test20@example.com', 'sha1:64000:18:grsayaPoOUE8wB4pQiHrhG/FRdwonRIF:Bmnq85GlTjAdPIQXT1HcfDl3', 0),
(25, 'Test_User21', 'test21@example.com', 'sha1:64000:18:gGrnCgMzezsHptH1S842QMeiFtDQKq3f:jSOcK5gPbM3371GBFf2w2Oyf', 0),
(26, 'Test_User22', 'test22@example.com', 'sha1:64000:18:DMPbrlgOl0sZyFFKYaCpUk0bXkqIDRXo:ScPxhPcBt6a8OCM+Bu1jXYhV', 4),
(27, 'Test_User23', 'test23@example.com', 'sha1:64000:18:lkgIj7DSmwTE0uztAqO01eOwQFQwwQID:y+aXyrXzo51se6PMEtR0/O43', 0),
(28, 'Test_User24', 'test24@example.com', 'sha1:64000:18:WD2WEeGkKfq1qSdUU3SbS2MZERrbU4jo:hFymbBzHN+m1aComOMSKZti3', 0),
(29, 'Test_User25', 'test25@example.com', 'sha1:64000:18:gSXbhW8jNXAeGMB1gxp8jkm7+sW/MNyR:JCqOWUpjeQSxmP3XX2HHs688', 0),
(30, 'Test_User26', 'test26@example.com', 'sha1:64000:18:RzoU6UFSFBiyOXRuZSMk+vguEnj7Ttiw:gR5BFKEJW2LwNjv2G3IyZhgu', 0),
(31, 'Test_User27', 'test27@example.com', 'sha1:64000:18:RqZNdBM3XOg+7pUvIvly37Oli9xqV9Hp:UnYQY5TvAQU7wK7mnqIVCsE2', 0),
(32, 'Test_User28', 'test28@example.com', 'sha1:64000:18:InbyqDMPFk7y+mEs8eOrRuQ1uI1LJeAI:cbviAjQeQefHkGMgkF2+iLg1', 0),
(33, 'Test_User29', 'test29@example.com', 'sha1:64000:18:/O9HsJNhYkdL3Ekk41ANpL6og01ACQg/:Un8AmJ1dnMhGVP3w8i74INSt', 0),
(34, 'Test_User30', 'test30@example.com', 'sha1:64000:18:n8A+YE8Tcqla6Xdrg9NQhZ/o/mST6s2w:XL3H+oxeNbYYAS7iuYevD/hs', 0),
(35, 'Test_User31', 'test31@example.com', 'sha1:64000:18:YfZSCwbRpZTLA/GAAuskOGt8wvuDVnQR:2fNTx4u5TuOKtcNVkpUsg+6R', 0),
(36, 'Test_User32', 'test32@example.com', 'sha1:64000:18:ahdmW8yrvBq9Hv5wPMN/w3XMsFQHSh/S:a2mD3aDbLcVI7C1tlBXYoVRf', 0),
(37, 'Test_User33', 'test33@example.com', 'sha1:64000:18:qwRBXAZt/W1PtjqLaqyXCxDtOQrCAtfm:19Kp8GQIQopf7MBoUDI96mG7', 0),
(38, 'Test_User34', 'test34@example.com', 'sha1:64000:18:MyyR+KaGdF0kSJvyggqs19tBuNyDf0il:T/fM5bBCOGa6bS5xBNyNHTxP', 4),
(39, 'Test_User35', 'test35@example.com', 'sha1:64000:18:R7TpVGp3jmCvFXYHTtLlt2n7VZAkmoAS:INBhL+u9O64Nm5lWBq3ZHKcy', 0),
(40, 'Test_User36', 'test36@example.com', 'sha1:64000:18:t8xqPquPOgum+dXhk2HghgCYjfpgoVrC:siV7ycgOdSn+jl/y9DPhWZxc', 0),
(41, 'Test_User37', 'test37@example.com', 'sha1:64000:18:eAgckDMlN2EeZl/uPZU9o0PGcwHooqBo:izLb6mZKAiYBF0d4cEB9HbrE', 0),
(42, 'Test_User38', 'test38@example.com', 'sha1:64000:18:5BwHOCfwChfhpC9n7LyuOfEm6/6nH6/S:Z2VuTXszxeYFDBU5ktvOlrAz', 0),
(43, 'Test_User39', 'test39@example.com', 'sha1:64000:18:3xMEeY/5qo1AcQsk9/TpLJFHykVZT4xD:h+iboZzzSkvqLXyKm8aYSlyq', 0),
(44, 'Test_User40', 'test40@example.com', 'sha1:64000:18:HW8EYDwE8ScyNwllXIttOMkBsOmPtyH6:3PdLPsg1OXsOchCbBd0Cqr8L', 0),
(45, 'Test_User41', 'test41@example.com', 'sha1:64000:18:T2Gsrxqv62vF+pqQ7PxLyjR1fsbiuZu+:hivY8YylK9YK9ihetGzpReVH', 0),
(46, 'Test_User42', 'test42@example.com', 'sha1:64000:18:O82TD2kXQv3a/uZzPOtu6/EmQz17QQtl:FfHdRNYO0YFuzMV5JZDnr8FL', 0),
(47, 'Test_User43', 'test43@example.com', 'sha1:64000:18:NhtHvATF4L96ZcO+Jdho19jTtl7yD9Bh:9eEb7PifGmT2OqPu7zO++84c', 0),
(48, 'Test_User44', 'test44@example.com', 'sha1:64000:18:Glcc6C9rxvEt4pcjlJGnYkVy1sukN+tS:zM7jbyEGUA1160sw8DAq4EKi', 0),
(49, 'Test_User45', 'test45@example.com', 'sha1:64000:18:KwbRYBohVpk4DqurgP+lXGKvDtrkmaad:Jb6JvFhZa3gXDyJe1KfGpoiK', 0),
(50, 'Test_User46', 'test46@example.com', 'sha1:64000:18:d3tnNFDJC2tNz0/DWeaPv1+nzmkxIzkq:lAbCfQqNOaG2MY1a7eIzwWLw', 0),
(51, 'Test_User47', 'test47@example.com', 'sha1:64000:18:orRT9/86g1srZ2kF/qZ/oV3GXiEPOzIr:Iyxn4OMMAL3amMvACf6pDfvY', 0),
(52, 'Test_User48', 'test48@example.com', 'sha1:64000:18:JEkaqM1nvYY+y1YeLe0e4OH5cYwUoYYj:8nkqDmSizuqq6l7K4ua1mN7A', 0),
(53, 'Test_User49', 'test49@example.com', 'sha1:64000:18:Zyl1xFwZB3SHEn6KJlq37yOK3Th+v2av:ua9rm7pWWys7QIRsxkMhEDyo', 0),
(54, 'Test_User50', 'test50@example.com', 'sha1:64000:18:9j7roiVX7kJrFE/wqWVB0r8A2AJZow6J:7oD3s3qC+h77y7TbgieXdGVF', 0),
(55, 'Test_User51', 'test51@example.com', 'sha1:64000:18:D5p7mPoCvH7iYwP8Qp7GZN7Kl+N+rjsV:mVA8DHR2KN2GBrIcM5/jgSOJ', 0),
(56, 'Test_User52', 'test52@example.com', 'sha1:64000:18:N0CDOb3mO1ZmyGvk+ln3XeH+ORo63xaJ:zKxnBQT4jk/R0mPjwEvG7On7', 4),
(57, 'Test_User53', 'test53@example.com', 'sha1:64000:18:ZO6/hH5x6qvzWcRtiAYnB+7BICz3idSr:BcMjqdbkrBQQLgE78jhQZuRv', 4),
(58, 'Test_User54', 'test54@example.com', 'sha1:64000:18:Zwny7GC/U/j7Kt48wPWeHBQfnf4+jCEI:nyed/pkBwPJcc3WQtH9P3439', 0),
(59, 'Test_User55', 'test55@example.com', 'sha1:64000:18:Hla5Lm397vnxeHWk+l2VQxr9ZdzbzZQk:cHWfqOEMrPOJN/hIBUYQKl0d', 0),
(60, 'Test_User56', 'test56@example.com', 'sha1:64000:18:uDRKnXTP2LdEgTMTFnbUitzFm73Czq7g:OlBLqdZ94sxTOD1S59MILKdc', 4),
(61, 'Test_User57', 'test57@example.com', 'sha1:64000:18:sVU2kDddT+4wFMPoH3hmJYJ0msud/5kJ:ZIg+JJWHYRIVBsVepLMJOH3A', 0),
(62, 'Test_User58', 'test58@example.com', 'sha1:64000:18:+sn6TQhp+UjiQUIfhGhHEDU+nqaUHv6C:/NRvlkB33QDoqJaodJ5QYrK+', 0),
(63, 'Test_User59', 'test59@example.com', 'sha1:64000:18:RpDm6B7tLBvMMKVQHQIFbZco+tiRQgph:lRLBOC9s23OUQlFNahLgNJoU', 0),
(64, 'Test_User60', 'test60@example.com', 'sha1:64000:18:o/E4qKURK6KNQLDX/0AE+HEDRXgp+pUa:ExEIsFpJL76a8VZ03ULk0LTz', 0),
(65, 'Test_User61', 'test61@example.com', 'sha1:64000:18:RmjCdshSRsYJuHWLXnD9X6Ta2+d9whIQ:nVrPbMS0j0U7k4FhctPpGnDa', 0),
(66, 'Test_User62', 'test62@example.com', 'sha1:64000:18:587bTyyXgb0gg6PQbc6AXMH17s6N4mL5:DGqZNk8HcCJmF8d+ighIGFql', 0),
(67, 'Test_User63', 'test63@example.com', 'sha1:64000:18:Z8n0TtydnuXgzAva6ZSZxAlJU0uvhEnS:fu/eRk0mNjBjpHBErKrKuRBe', 0),
(68, 'Test_User64', 'test64@example.com', 'sha1:64000:18:CHrDXyDVYmGDoW8d3SAu2kLgIJsCMHof:tP5F0l31r7wwKEAXn7mprrHY', 0),
(69, 'Test_User65', 'test65@example.com', 'sha1:64000:18:d/MkNkXc2JPjo0XgUgSHuWAd4TtgoVz5:vwIIRWLKMVEciLRY4sOc0Em2', 0),
(70, 'Test_User66', 'test66@example.com', 'sha1:64000:18:LF9xk7JYe3UFSY1er9EycV6uQV3ov4IM:L7ulscRBgxaP0N3a1U1qNjYB', 0),
(71, 'Test_User67', 'test67@example.com', 'sha1:64000:18:JuC10FCrbTYdMSjrOnkmCuPQNNWzAORV:L3yW95e7d66Aqw8KCcaNyACr', 0),
(72, 'Test_User68', 'test68@example.com', 'sha1:64000:18:89oE7dE6mwItR627fWJu8VGKam60uljK:5NhURrswGudiqf7EMFlgiTyZ', 4),
(73, 'Test_User69', 'test69@example.com', 'sha1:64000:18:BhG+jgko401ZG+aiv2szvHAEI0dHaDRn:48ka2iEdXLWCLmUGEXIIIdwz', 0),
(74, 'Test_User70', 'test70@example.com', 'sha1:64000:18:+q/Z87rMlf+B9tBV6vzxTwumuA7ECATj:OF2O2va5S7nu5or/M8c9pJZT', 4),
(75, 'Test_User71', 'test71@example.com', 'sha1:64000:18:+Kv5JL+6KhYwJyXCRoJWWcYT6Mfhe7vP:YjwizW65JVZ+sVLZntDIJfAk', 0),
(76, 'Test_User72', 'test72@example.com', 'sha1:64000:18:8P09DFnTvO3Sd1R27x2PizdtJwXc47Ak:GOZsrUFj8112DTrjT87s6ocm', 0),
(77, 'Test_User73', 'test73@example.com', 'sha1:64000:18:ncjxKOLS64P8SPp5bciIZhsx4EqYMixo:4P6CwiXjF+3K1ytzAL3kiGp7', 0),
(78, 'Test_User74', 'test74@example.com', 'sha1:64000:18:b37Woc7GzX4njkdZ5TbbgfN7SvG/4JqA:l2zb4jYyqjuO0M5vF1BADz6p', 4),
(79, 'Test_User75', 'test75@example.com', 'sha1:64000:18:Xe0NWR+osFUziQXL5sXPtnLkQroDE/Sx:L9gTOANq0RrOQX01j/r8gups', 0),
(80, 'Test_User76', 'test76@example.com', 'sha1:64000:18:n91orXvpMb0dyGp6BfB2cuxPXKhKYN+z:O4MtVBZGocwxwdFguG7a9J5H', 0),
(81, 'Test_User77', 'test77@example.com', 'sha1:64000:18:6ebr5E7Pv5QVHqvYcxl4v9AMjTMuzCuX:qRTdCNQWyVqtjj8wUR8rMjSt', 4),
(82, 'Test_User78', 'test78@example.com', 'sha1:64000:18:+/x6xjAM3eUgkhy1p7GR4RTn29L/p+W7:WpeEQ0epPlTtGjs99Ogcem5s', 0),
(83, 'Test_User79', 'test79@example.com', 'sha1:64000:18:jIYx7OPA6ddup0+nM47FbC9sGU3C4OV7:hpaH3bflxnM/Wn1UOyi2fL75', 0),
(84, 'Test_User80', 'test80@example.com', 'sha1:64000:18:vBUhi8n5smyPVnojmwEERr7UwL8W/nhW:8vs+GQbBA0qePm0iFoipjJ/r', 0),
(85, 'Test_User81', 'test81@example.com', 'sha1:64000:18:IY32I+NQ4OfUjmU0+hqC6wb7evVq0js4:+JG51e23fzISsJd02ASph0R0', 0),
(86, 'Test_User82', 'test82@example.com', 'sha1:64000:18:+rkAMmU24UlVBWpPDRPn6W+MuKz9nG8S:slNmpUMRtJphp220EruCl75x', 0),
(87, 'Test_User83', 'test83@example.com', 'sha1:64000:18:XSvkLZwtmPejjucY0pmD5nl3A+IAEyvG:kIKxlrzzW+W4vbqTYKp6oP8f', 0),
(88, 'Test_User84', 'test84@example.com', 'sha1:64000:18:z+c3v+328rhDpok1d8Z259LBUuuOnywv:sApxO4aAF9giJiemS2bGhccb', 0),
(89, 'Test_User85', 'test85@example.com', 'sha1:64000:18:tClqZeNJeBAcRzGoY6I6FX0qQ2CrGp2l:P4yi32IPu2QgHPLMKIJ4p3Gc', 0),
(90, 'Test_User86', 'test86@example.com', 'sha1:64000:18:dkY5VU1/O4ucDFzSNumiYQQNdpOnpvj3:a5bOGDB4+x1PjnlPog9TjLG8', 0),
(91, 'Test_User87', 'test87@example.com', 'sha1:64000:18:P6zbtX10QlpFSnj47bHwZiD8VAWjAJWE:5hIPCF0kgqFfwHHlirnJbhEf', 0),
(92, 'Test_User88', 'test88@example.com', 'sha1:64000:18:WrugpDNy1WuWC3sgpOUWU8yH0e/Hrjcp:Nu7Ms2UT8i6yMAM45V/EaXf+', 0),
(93, 'Test_User89', 'test89@example.com', 'sha1:64000:18:RqajeiEhXOLY0bTlMT5oeE5rMZwGrVVL:dfN49DAjBS1OZ7UOwVKZEFWl', 0),
(94, 'Test_User90', 'test90@example.com', 'sha1:64000:18:Tx6hWrT2OZYkxtWKZ1pRsPDd2/ye1bTn:9x/UWYnHIjyshA8XdCGsg7yV', 4),
(95, 'Test_User91', 'test91@example.com', 'sha1:64000:18:XZJK6FSkinFsArfvDouMf5lhjucJDmab:KVGySNDaKI/WcT3Z5j42CaGN', 0),
(96, 'Test_User92', 'test92@example.com', 'sha1:64000:18:RGmHgUfxYiX29IDmF/xGLzqfNF66xqdg:8VPrHc+W1Z0H/q0qtt9DzNvM', 4),
(97, 'Test_User93', 'test93@example.com', 'sha1:64000:18:t/T76Va9LYkw2PIU3nsTBg5xnRBd8ewV:QopqrMOf+gPfbp1rS91Jrv0o', 4),
(98, 'Test_User94', 'test94@example.com', 'sha1:64000:18:FcNmQeleYxE9roEcgRdJ5QZKYt04AOOU:CgSCQAY8wQ8S69uovRbA4vOW', 4),
(99, 'Test_User95', 'test95@example.com', 'sha1:64000:18:X0PMyMmRkT7lrM+qYuSsKA50AMRrZbHL:5fMNXFyCGJsNqkcm5/10vG2D', 0),
(100, 'Test_User96', 'test96@example.com', 'sha1:64000:18:9zi1fIdUQLrYVF9dGTWhu2h0SmBPdsq0:YuSv4QNRyomHjprpv3eYBGqk', 0),
(101, 'Test_User97', 'test97@example.com', 'sha1:64000:18:j1D1WWt556DziSe6Tkn5q/J6XukQVpwD:TL8AKxO3ZZSM1YTXQh90ci+P', 0),
(102, 'Test_User98', 'test98@example.com', 'sha1:64000:18:Om4DI1w83xiPpMZ/oNnlZ/qeIfjrKit9:bqqe3geQfn9SOOa0b/YYp9y4', 0),
(103, 'Test_User99', 'test99@example.com', 'sha1:64000:18:vmCKrXygUimbA35gLCJhd8LbvRys26j4:1UMIoALkmbmOsgN4m0f7VTVy', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `word` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `extra_score` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `words`
--

INSERT INTO `words` (`id`, `word`, `extra_score`) VALUES
(1, 'alma', 0),
(2, 'Dezertőr', 2);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `game_log`
--
ALTER TABLE `game_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p1` (`p1`),
  ADD KEY `p2` (`p2`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usr` (`usr`) USING BTREE;

--
-- A tábla indexei `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_word` (`word`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `game_log`
--
ALTER TABLE `game_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT a táblához `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
