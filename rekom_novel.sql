-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Jan 2021 pada 15.13
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
  `year_novel` date DEFAULT NULL,
  `sampul_novel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_novel`
--

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
(1, 'foo', 'Foo Bar Administrator', '37b51d194a7513e45b56f6524f2d51f2', 1, 1, 0),

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
,`year_novel` date
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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ms_novel`
--
ALTER TABLE `ms_novel`
  MODIFY `id_novel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ms_rating`
--
ALTER TABLE `ms_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

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
