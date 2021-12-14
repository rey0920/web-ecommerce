-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2021 pada 12.27
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteksafir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`) VALUES
(8, 'Suplemen', 'Suplemen'),
(9, 'Herbal', 'Obat Herbal'),
(10, 'Alat Kesehatan', 'Alat-alat kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `keterangan`, `postingDate`) VALUES
(1, 5, 'in Process', 'Barang sedang di packing', '2021-02-09 07:09:47'),
(2, 5, 'in Process', 'Resi JPX23232323232', '2021-02-09 07:09:58'),
(3, 8, 'in Process', 'Sampai', '2021-02-09 07:31:28'),
(4, 8, 'Delivered', 'Sampai', '2021-02-09 07:31:37'),
(5, 27, 'in Process', 'barang sedang di packing', '2021-02-09 10:43:16'),
(6, 27, 'Delivered', 'barang sudah diterima', '2021-02-09 10:43:56'),
(7, 28, 'in Process', 'barang dipacking', '2021-02-09 11:03:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `productName` varchar(100) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `productImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kodepos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `nohp`, `password`, `alamat`, `provinsi`, `kota`, `kodepos`) VALUES
(2, 'Sutejo Baihaki', 'sutejo@gmail.com', '0898989898', '202cb962ac59075b964b07152d234b70', 'Jl. Mantap', 'Jawa Barat', 'Bekasi', '17111'),
(3, 'test', 'test@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL),
(4, 'A Riki Siokona', 'riki@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL),
(5, 'Achmad Viqih', 'a@gmail.com', '312', '202cb962ac59075b964b07152d234b70', 'Jl. Sumantap FSADFASDF', 'Jawa Barat', 'Bandung', '12312'),
(6, 'Test', 'test@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL),
(7, 'riki siokona', 'rikisiokona@gmail.com', NULL, 'd72cd11dfe80af5077c40415ceb87979', NULL, NULL, NULL, NULL),
(8, 'nanalia', 'nanaliaa5@gmai.com', '0875757879', '202cb962ac59075b964b07152d234b70', 'jln.majalah', 'DKI Jakarta', 'Jakarta', '134202');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
