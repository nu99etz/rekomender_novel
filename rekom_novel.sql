-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Jan 2021 pada 19.56
-- Versi server: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekom_novel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_kategori`
--

CREATE TABLE `ms_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_kategori`
--

INSERT INTO `ms_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'action'),
(2, 'adult'),
(3, 'adventure'),
(4, 'comedy'),
(5, 'drama'),
(6, 'ecchi'),
(7, 'fantasy'),
(8, 'genderbender'),
(9, 'harem'),
(10, 'historical'),
(11, 'horror'),
(12, 'josei'),
(13, 'martialarts'),
(14, 'mature'),
(15, 'mecha'),
(16, 'mystery'),
(17, 'psychological'),
(18, 'romance'),
(19, 'schoollife'),
(20, 'sci-fi'),
(21, 'seinen'),
(22, 'shoujo'),
(23, 'shoujoai'),
(24, 'shounen'),
(25, 'shounenai'),
(26, 'sliceoflife'),
(27, 'smut'),
(28, 'sports'),
(29, 'supernatural'),
(30, 'tragedy'),
(31, 'wuxia'),
(32, 'xianxia'),
(33, 'xuanhuan'),
(34, 'yaoi'),
(35, 'yuri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_novel`
--

CREATE TABLE `ms_novel` (
  `id_novel` int(11) NOT NULL,
  `no_novel` char(10) DEFAULT NULL,
  `nama_novel` varchar(255) DEFAULT NULL,
  `authors_novel` varchar(255) DEFAULT NULL,
  `genre_novel` varchar(255) DEFAULT NULL,
  `year_novel` varchar(255) DEFAULT NULL,
  `sampul_novel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_novel`
--

INSERT INTO `ms_novel` (`id_novel`, `no_novel`, `nama_novel`, `authors_novel`, `genre_novel`, `year_novel`, `sampul_novel`) VALUES
(1, '34622', 'A Good Girl and Her Protective Billionaire Husband', '[\'东二爷\']', '1,2,3,4,5', '2017', NULL),
(2, '2765', 'A Record of a Mortal’s Journey to Immortality', '[\'wang yu\', \'忘语\']', '1,3', '2008', NULL),
(3, '34618', 'A Surprise Pregnancy: Billionaire’s Secret Baby', '[\'浅年华\']', '1,2,3', '2019', NULL),
(4, '17893', 'Addicted Pampering You: The Mysterious Pampered Wife of The Military Ye', '[\'jiu mo li\', \'久陌离\']', '1,4,5', '-', NULL),
(5, '11764', 'Adorable Creature Attacks! Cuteness Overload!', '[\'ying lanmeng\', \'盈蓝梦\']', '1,2,3', '2017', NULL),
(6, '33122', 'After Being Picked up by the Top Alpha', '[\'zi jin\', \'紫矜\']', '3,4,5', '2019', NULL),
(7, '32889', 'After Being Turned Into a Dog, I Conned My Way Into Freeloading at My Rival’s Place', '[\'zi jin\', \'紫矜\']', '2,3,4', '2020', NULL),
(8, '18024', 'Ai o Ataeru Kemono-tachi', '[\'chabashira ichigo\', \'茶柱一号\']', '2,4', '2016', NULL),
(9, '26588', 'Almighty Sword Domain', '[\'on azure phoenix peak\', \'青鸾峰上\']', '2', '2015', NULL),
(10, '29443', 'AV Filming Guidebook', '[\'小說製造機\']', '4', '2015', NULL),
(11, '34656', 'Back To The Beginning Of Ming To Do Charity', '[\'蜀七\']', '1', '2018', NULL),
(12, '31046', 'Bai Fumei in the 70’s', '[\'sù mèi píng shēng\', \'素昧平生\']', '2', '2018', NULL),
(13, '13538', 'Being Able to Edit Skills in Another World, I Gained OP Waifus (WN)', '[\'sengetsu sakaki\', \'千月さかき\']', '3', '2016', NULL),
(14, '34817', 'Bestie, Stop Seducing My Husband!', '[\'拉布\']', '2,3', '2017', NULL),
(15, '34864', 'Bite Your Fingertips', '[\'su jingxian\', \'苏景闲\']', '2,3,4', '2019', NULL),
(16, '16868', 'Boukensha ni Naritai to Miyako ni Deteitta Musume ga S Rank ni Natteta', '[\'mojikakiya\', \'門司柿家\']', '2', '2017', NULL),
(17, '23803', 'Boyfriends Always Turned out to Be a Horror Movie Boss', '[\'小生不知\']', '4', '2018', NULL),
(18, '25545', 'Breakthrough with the Forbidden Master', '[\'anikki burazza\', \'アニッキーブラッザー\']', '5', '2019', NULL),
(19, '27453', 'Cāi Cāi', '[\'mò lǐ\', \'莫里_\']', '1', '2019', NULL),
(20, '34820', 'Can’t Help Loving: Cheating On Each Other', '[\'织语长心\']', '2', '2017', NULL),
(21, '34904', 'Cohabiting Husband, Go Find Your Ex-lovers', '[\'洛小二\']', '3', '2019', NULL),
(22, '30540', 'Counterattack of the Cannon Fodder Chambermaid', '[\'jia mian de sheng yan\', \'mask feast\', \'假面的盛宴\']', '4', '2015', NULL),
(23, '7847', 'Cursed Sword Master', '[\'fukuryuu\', \'伏竜\']', '1,2,3,4', '2015', NULL),
(24, '23502', 'Dinghai Fusheng Records', '[\'fei tian ye xiang\', \'非天夜翔\']', '2', '2019', NULL),
(25, '31859', 'Does Love at First Sight Exist in E-Sports?', '[\'路嘻法\']', '3,4', '2019', NULL),
(26, '4214', 'Dragon-Marked War God', '[\'su yue xi\']', '2', '2014', NULL),
(27, '34263', 'Dying in the Male Lead’s Arms Every Time I Transmigrate', '[\'jiang zhi yu\', \'姜之魚\']', '3', '2017', NULL),
(28, '615', 'Elf Tensei Kara no Cheat Kenkoku-ki', '[\'tsukiyo rui\', \'月夜\\u3000涙（るい）\']', '4', '2008', NULL),
(29, '6363', 'Emperor’s Domination', '[\'yan bi xiao sheng\', \'厌笔萧生\']', '2', '2014', NULL),
(30, '35253', 'Entering a Company From Another World!?', '[\'nanashi nanami\']', '1', '2019', NULL),
(31, '15593', 'Escape the Infinite Chamber', '[\'zǐ jiè\', \'紫界\']', '3', '2013', NULL),
(32, '15752', 'Extraordinary Genius', '[\'qióng sì\', \'穷四\']', '4', '2015', NULL),
(33, '31011', 'Falling in Love With the Male God', '[\'廿朔\']', '1,2,3,4,5', '2018', NULL),
(34, '28510', 'Farmer Lady of Fortune, Imperial Concubine, Don’t Be Too Sweet', '[\'橙子澄澄\']', '1,3', '-', NULL),
(35, '10432', 'Father, Mother Escaped Again', '[\'tu mi lei\', \'荼靡泪\']', '1,2,3', '2014', NULL),
(36, '34716', 'Forensic Traversing Notes', '[\'luo bin\', \'络缤\']', '1,4,5', '2014', NULL),
(37, '28303', 'Game of Divine Thrones', '[\'jang myeongsu\', \'장명수\']', '1,2,3', '2016', NULL),
(38, '27810', 'Genius Detective', '[\'xin bai\', \'辛白\']', '3,4,5', '-', NULL),
(39, '31851', 'Genius Maiden Transmigrates: The Empress of Weapons', '[\'度寒\']', '2,3,4', '-', NULL),
(40, '34819', 'Gigolo CEO Hides Under My Bed', '[\'豆豆白\']', '2,4', '2020', NULL),
(41, '25853', 'Global University Entrance Examination', '[\'mu su li\', \'木苏里\']', '2', '2019', NULL),
(42, '17593', 'Godly Farmer Doctor: Arrogant Husband, Can’t Afford to Offend!', '[\'xiao xiao mu tong\', \'小小牧童\']', '4', '2017', NULL),
(43, '28572', 'Going Against the Wind', '[\'lan lin\', \'蓝淋\']', '1', '2007', NULL),
(44, '30723', 'Greetings, Ninth Uncle', '[\'九月流火\']', '2', '2019', NULL),
(45, '4332', 'Heaven’s Devourer', '[\'feng qingyang\', \'风青阳\']', '3', '2015', NULL),
(46, '33678', 'Hell App', '[\'xuezhiyu shizhifeng\', \'雪之羽时之风\']', '2,3', '2018', NULL),
(47, '10947', 'Holistic Fantasy', '[\'ruqing rusu\', \'如倾如诉\']', '2,3,4', '2016', NULL),
(48, '35045', 'Honeyed Marriage', '[\'慕义\']', '2', '2020', NULL),
(49, '20265', 'I am a Big Villain', '[\'打字机n号\']', '4', '2018', NULL),
(50, '32290', 'I Am a Magic Sword', '[\'worry-free dance\', \'无忧的舞曲\']', '5', '-', NULL),
(51, '34370', 'I Became The Stepmother of My Ex-husband', '[\'九月流火\']', '1', '2018', NULL),
(52, '18813', 'I Got a Cheat and Moved to Another World, so I Want to Live as I Like', '[\'munmun\', \'ムンムン\']', '2', '2016', NULL),
(53, '26632', 'I Met the Male Lead in Prison', '[\'moon shi-hyun\', \'문시현\']', '3', '2019', NULL),
(54, '31511', 'I Was Once a Legend', '[\'kuang zhu\', \'狂渚\']', '4', '2020', NULL),
(55, '30710', 'I Will Leisurely Become Healer in Another World', '[\'kaya\', \'カヤ\']', '1,2,3,4', '2017', NULL),
(56, '34756', 'I’m an Adventurer! ~Musou Skill is Plane Magic~', '[\'misotakuan\', \'みそたくあん\']', '2', '2016', NULL),
(57, '26676', 'Ihoujin, Dungeon ni Moguru', '[\'asami hinagi\', \'麻美ヒナギ\']', '3,4', '2016', NULL),
(58, '14808', 'Immortal Devil Transformation', '[\'innocent\', \'无罪\']', '2', '2012', NULL),
(59, '21645', 'Incurable', '[\'西方经济学\']', '3', '-', NULL),
(60, '28987', 'Infinite Bloodcore', '[\'gu zhen ren\', \'蛊真人\']', '4', '2020', NULL),
(61, '32524', 'Isekai Sozo no Susu-me ~ Sumahoapuri de Wakusei o Tsukutte Shimatta Ore wa Kami to Nari Sekai o Meguru', '[\'tamagokake candy\', \'たまごかけキャンディー\']', '2', '2019', NULL),
(62, '7903', 'Itai no wa Iya nanode Bōgyo-Ryoku ni Kyokufuri Shitai to Omoimasu', '[\'ユーキャン\']', '1', '2016', NULL),
(63, '30359', 'Kajiya de Hajimeru Isekai Slow Life', '[\'tamamaru\', \'たままる\']', '3', '2018', NULL),
(64, '9919', 'Kou 1 Desu ga Isekai de Joushu Hajimemashita', '[\'kagami hiroyuki\', \'鏡裕之\']', '4', '2013', NULL),
(65, '20139', 'Let Me Shoulder This Blame!', '[\"three thousand big dreams to narrate one\'s life\", \'三千大夢敘平生\']', '1,2,3,4,5', '2018', NULL),
(66, '19639', 'Let’s be an Adventurer! ~Defeating Dungeons with a Skill Board~', '[\'hagiu aki\', \'萩鵜アキ\']', '1,3', '2017', NULL),
(67, '32804', 'Little Terrified Bun', '[\'暗香漂浮\']', '1,2,3', '-', NULL),
(68, '33838', 'Little Tyrant Doesn’t Want to Meet with a Bad End', '[\'猫耳铃铛\']', '1,4,5', '-', NULL),
(69, '29566', 'Live Broadcasting Raising Dragons in the Interstellar', '[\'yú zhī shuǐ\', \'鱼之水\']', '1,2,3', '2020', NULL),
(70, '6599', 'Lord of All Realms', '[\'ni cang tian\', \'逆蒼天\']', '3,4,5', '2016', NULL),
(71, '34476', 'Lord of Flames', '[\'天火燎原\']', '2,3,4', '-', NULL),
(72, '34842', 'Lose My Heart to the Lovely Kitten Princess', '[\'yue xiamian\', \'月下眠\']', '2,4', '2019', NULL),
(73, '439', 'Magi Craft Meister', '[\'aki gitsune\', \'秋ぎつね\']', '2', '2013', NULL),
(74, '24858', 'Magic Industry Empire', '[\"eight o\'clock at night\", \'晚间八点档\']', '4', '2014', NULL),
(75, '28060', 'Married To The Male Lead’s Father', '[\'九月微蓝\']', '1', '-', NULL),
(76, '29551', 'Marrying the Soft-hearted Villain', '[\'mu mu liang chen\', \'沐沐良辰\']', '2', '2019', NULL),
(77, '10553', 'Martial King’s Retired Life', '[\'lee taibai\', \'lee太白\']', '3', '2016', NULL),
(78, '2866', 'Martial Peak', '[\'momo\', \'莫默\']', '2,3', '2013', NULL),
(79, '34595', 'Menu wo Douzo: Here’s the Menu', '[\'hina\', \'shiomura hina\', \'雛／汐邑雛\']', '2,3,4', '2012', NULL),
(80, '34106', 'Mr. Melancholy Wants to Live a Peaceful Life', '[\'cyan wings\', \'青色羽翼\']', '2', '2020', NULL),
(81, '35008', 'My Favorite Wang Fei', '[\'昔年年\']', '4', '2016', NULL),
(82, '34903', 'My Sister Caught Us In Bed', '[\'乌月星\']', '5', '2019', NULL),
(83, '24402', 'My Wife is My Life!', '[\'公子闻筝\']', '1', '2019', NULL),
(84, '22800', 'Nan Chan', '[\'tang jiuqing\', \'唐酒卿\']', '2', '2018', NULL),
(85, '16609', 'Necropolis Immortal', '[\'immortal amidst snow in july\']', '3', '2017', NULL),
(86, '28863', 'Netherworld Investigator', '[\'ninth daoist\', \'道门老九\']', '4', '-', NULL),
(87, '32877', 'Night Train', '[\'morimi tomihiko\', \'森見登美彦\']', '1,2,3,4', '2016', NULL),
(88, '5273', 'Nirvana In Fire', '[\'hai yan\', \'海宴\']', '2', '2006', NULL),
(89, '29505', 'Not Allowed to Leak a Single Drop', '[\'魏承澤\']', '3,4', '2019', NULL),
(90, '35349', 'Obscene Immortal', '[]', '2', '-', NULL),
(91, '22586', 'Otonari no Tenshi-sama ni Itsu no Ma ni ka Dame Ningen ni Sareteita Ken (WN)', '[\'saeki-san\', \'佐伯さん\']', '3', '2018', NULL),
(92, '32395', 'Pastel Colours', '[\'shi jiu yao\', \'十九瑶\']', '4', '-', NULL),
(93, '33497', 'Pay Attention to Me', '[\'little ice cube\', \'冰块儿\']', '2', '2020', NULL),
(94, '24113', 'Physician’s Odyssey', '[\'smoking pipe bro\', \'烟斗老哥\']', '1', '2016', NULL),
(95, '25415', 'Plan to Trap the Golden Thigh', '[\'水破长空\']', '3', '2019', NULL),
(96, '9686', 'Princess Medical Doctor', '[\'cheng jiu\']', '4', '-', NULL),
(97, '23690', 'Quick Transmigration Female Lead: Male God, Never Stopping', '[\'origami glazed tile\', \'折纸琉璃\']', '1,2,3,4,5', '2017', NULL),
(98, '18139', 'Quick Transmigration System: Male God, Come Here', '[\'pineapple cake\', \'凤梨糕\']', '1,3', '-', NULL),
(99, '34688', 'Quick Transmigration: Adonis, Let’s Talk!', '[\'折树梨花\']', '1,2,3', '-', NULL),
(100, '18887', 'Quick Transmigration: Snatching Golden Fingers', '[\'六皮\']', '1,4,5', '-', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_rating`
--

CREATE TABLE `ms_rating` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_novel` int(11) DEFAULT NULL,
  `jumlah_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_rating`
--

INSERT INTO `ms_rating` (`id_rating`, `id_user`, `id_novel`, `jumlah_rating`) VALUES
(1, 2, 9, 5),
(2, 2, 7, 1),
(3, 2, 75, 1),
(4, 2, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_role`
--

CREATE TABLE `ms_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_role`
--

INSERT INTO `ms_role` (`id_role`, `nama_role`) VALUES
(1, 'Super Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user`
--

CREATE TABLE `ms_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `is_login` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `username`, `nama_user`, `password`, `role`, `is_login`, `is_delete`) VALUES
(1, 'foo', 'Foo Bar Administrator', '37b51d194a7513e45b56f6524f2d51f2', 1, 0, 0),
(2, 'nui43', 'Nui Herawati 1', '202cb962ac59075b964b07152d234b70', 2, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_ms_novel`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_ms_novel` (
`id_novel` int(11)
,`no_novel` char(10)
,`nama_novel` varchar(255)
,`authors_novel` varchar(255)
,`genre_novel` varchar(255)
,`year_novel` varchar(255)
,`sampul_novel` varchar(255)
,`id_user` int(11)
,`username` varchar(255)
,`nama_user` varchar(255)
,`password` varchar(255)
,`role` int(11)
,`is_login` int(11)
,`is_delete` int(11)
,`jumlah_rating` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_ms_rating`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_ms_rating` (
`id_rating` int(11)
,`nama_user` varchar(255)
,`nama_novel` varchar(255)
,`jumlah_rating` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_ms_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_ms_user` (
`id_user` int(11)
,`username` varchar(255)
,`nama_user` varchar(255)
,`password` varchar(255)
,`is_login` int(11)
,`is_delete` int(11)
,`nama_role` varchar(255)
,`id_role` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_ms_novel`
--
DROP TABLE IF EXISTS `v_ms_novel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ms_novel`  AS  select `a`.`id_novel` AS `id_novel`,`a`.`no_novel` AS `no_novel`,`a`.`nama_novel` AS `nama_novel`,`a`.`authors_novel` AS `authors_novel`,`a`.`genre_novel` AS `genre_novel`,`a`.`year_novel` AS `year_novel`,`a`.`sampul_novel` AS `sampul_novel`,`b`.`id_user` AS `id_user`,`b`.`username` AS `username`,`b`.`nama_user` AS `nama_user`,`b`.`password` AS `password`,`b`.`role` AS `role`,`b`.`is_login` AS `is_login`,`b`.`is_delete` AS `is_delete`,`c`.`jumlah_rating` AS `jumlah_rating` from ((`ms_novel` `a` left join `ms_rating` `c` on(`a`.`id_novel` = `c`.`id_novel`)) left join `ms_user` `b` on(`b`.`id_user` = `c`.`id_user`)) where 1 = 1 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_ms_rating`
--
DROP TABLE IF EXISTS `v_ms_rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ms_rating`  AS  select `a`.`id_rating` AS `id_rating`,`b`.`nama_user` AS `nama_user`,`c`.`nama_novel` AS `nama_novel`,`a`.`jumlah_rating` AS `jumlah_rating` from ((`ms_rating` `a` join `ms_user` `b` on(`a`.`id_user` = `b`.`id_user`)) join `ms_novel` `c` on(`a`.`id_novel` = `c`.`id_novel`)) where 1 = 1 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_ms_user`
--
DROP TABLE IF EXISTS `v_ms_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ms_user`  AS  select `a`.`id_user` AS `id_user`,`a`.`username` AS `username`,`a`.`nama_user` AS `nama_user`,`a`.`password` AS `password`,`a`.`is_login` AS `is_login`,`a`.`is_delete` AS `is_delete`,`b`.`nama_role` AS `nama_role`,`b`.`id_role` AS `id_role` from (`ms_user` `a` join `ms_role` `b` on(`a`.`role` = `b`.`id_role`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_kategori`
--
ALTER TABLE `ms_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ms_novel`
--
ALTER TABLE `ms_novel`
  ADD PRIMARY KEY (`id_novel`);

--
-- Indeks untuk tabel `ms_rating`
--
ALTER TABLE `ms_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_novel` (`id_novel`);

--
-- Indeks untuk tabel `ms_role`
--
ALTER TABLE `ms_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ms_kategori`
--
ALTER TABLE `ms_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `ms_novel`
--
ALTER TABLE `ms_novel`
  MODIFY `id_novel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `ms_rating`
--
ALTER TABLE `ms_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ms_role`
--
ALTER TABLE `ms_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ms_user`
--
ALTER TABLE `ms_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ms_rating`
--
ALTER TABLE `ms_rating`
  ADD CONSTRAINT `ms_rating_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `ms_user` (`id_user`),
  ADD CONSTRAINT `ms_rating_ibfk_2` FOREIGN KEY (`id_novel`) REFERENCES `ms_novel` (`id_novel`);

--
-- Ketidakleluasaan untuk tabel `ms_user`
--
ALTER TABLE `ms_user`
  ADD CONSTRAINT `ms_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `ms_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
