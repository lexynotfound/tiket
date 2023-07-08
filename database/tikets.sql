-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Feb 2018 pada 09.21
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `014`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` decimal(20,0) NOT NULL,
  `gender` text NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `address`, `phone`, `gender`, `username`) VALUES
(1, 'Bayu Permana Putra', 'Susukan', '85877533128', 'Laki-laki', 'bayuper'),
(2, 'a', 'sruwen', '9891280139', 'Laki-laki', 'a'),
(3, 'A B C d', 'Salatiga', '85801874452', 'Laki-laki', 'abcd'),
(4, 'QWERTY', 'Susukan', '85801874452', 'Laki-laki', 'qwerty');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reserv`
--

CREATE TABLE `reserv` (
  `id_reserv` int(11) NOT NULL,
  `reserv_code` decimal(10,0) NOT NULL,
  `reserv_at` text NOT NULL,
  `reserv_date` date NOT NULL,
  `seat` decimal(10,0) NOT NULL,
  `depart` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reserv`
--

INSERT INTO `reserv` (`id_reserv`, `reserv_code`, `reserv_at`, `reserv_date`, `seat`, `depart`, `price`, `id_user`, `id_customer`, `id_rute`, `status`) VALUES
(1, '759268413', '2018-02-28', '2018-02-28', '21', '2018-03-31', '3500000', 1, 1, 3, 'Selesai'),
(2, '586927413', '2018-02-17', '2018-02-28', '21', '2018-03-31', '3500000', 3, 2, 3, 'Selesai'),
(3, '19283', '2018-02-28', '2018-02-28', '21', '2018-03-31', '3500000', 4, 3, 3, 'Selesai'),
(4, '827569134', '2018-02-28', '2018-02-28', '21', '2018-03-31', '3500000', 5, 4, 3, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `depart` date NOT NULL,
  `rute_from` text NOT NULL,
  `rute_to` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `id_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `depart`, `rute_from`, `rute_to`, `price`, `id_trans`) VALUES
(1, '2018-03-10', 'Indonesia', 'Inggris', '5000000', 1),
(2, '2018-03-08', 'Indonesia', 'Jepang', '2000000', 1),
(3, '2018-03-31', 'Indonesia', 'Kanada', '3500000', 1),
(4, '2018-04-25', 'Indonesia', 'Malaysia', '-4000000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans`
--

CREATE TABLE `trans` (
  `id_trans` int(11) NOT NULL,
  `code` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `seat` text NOT NULL,
  `id_trans_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans`
--

INSERT INTO `trans` (`id_trans`, `code`, `description`, `seat`, `id_trans_type`) VALUES
(1, '794285316', 'Garuda Indonesia', '21', 1),
(2, '415937862', 'Gumarang', '12', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_trans`
--

CREATE TABLE `type_trans` (
  `id_trans_type` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type_trans`
--

INSERT INTO `type_trans` (`id_trans_type`, `description`) VALUES
(1, 'Pesawat'),
(2, 'Kereta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`) VALUES
(1, 'bayuper', 'bayuper', 'Bayu Permana Putra'),
(2, 'bagus', 'nagus', 'bagus putera'),
(3, 'a', 'a', 'a'),
(4, 'abcd', 'abcd', 'A B C d'),
(5, 'qwerty', 'qwerty', 'QWERTY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `reserv`
--
ALTER TABLE `reserv`
  ADD PRIMARY KEY (`id_reserv`),
  ADD KEY `id_reserv` (`id_reserv`),
  ADD KEY `id_user` (`id_user`,`id_customer`,`id_rute`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `id_trans` (`id_trans`),
  ADD KEY `id_trans_type` (`id_trans_type`);

--
-- Indexes for table `type_trans`
--
ALTER TABLE `type_trans`
  ADD PRIMARY KEY (`id_trans_type`),
  ADD KEY `id_trans_type` (`id_trans_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserv`
--
ALTER TABLE `reserv`
  MODIFY `id_reserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type_trans`
--
ALTER TABLE `type_trans`
  MODIFY `id_trans_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `reserv`
--
ALTER TABLE `reserv`
  ADD CONSTRAINT `reserv_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `reserv_ibfk_3` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`);

--
-- Ketidakleluasaan untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `trans` (`id_trans`);

--
-- Ketidakleluasaan untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `trans_ibfk_1` FOREIGN KEY (`id_trans_type`) REFERENCES `type_trans` (`id_trans_type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
