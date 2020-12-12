-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 04:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekweb_tubes_11`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(9) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `biaya_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(9) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'kemeja'),
(2, 'celana'),
(3, 'jas'),
(4, 'dress'),
(6, 'gaun'),
(7, 'vest');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(9) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'santai'),
(2, 'klasik'),
(3, 'retro'),
(4, 'modis'),
(6, 'kantoran'),
(7, 'pernikahan'),
(8, 'pesta'),
(9, 'olahraga'),
(10, 'rumahan'),
(11, 'street wear'),
(12, 'formal'),
(13, 'rock n roll'),
(14, 'akademik'),
(15, 'bikers');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(9) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(2000) NOT NULL,
  `stok_produk` int(9) NOT NULL,
  `total_pesanan` int(9) NOT NULL,
  `total_wishlist` int(11) NOT NULL,
  `id_jenis` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `stok_produk`, `total_pesanan`, `total_wishlist`, `id_jenis`) VALUES
(1, 'kemeja panjang', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 100, 0, 0, 1),
(3, 'gaun putih', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 45, 0, 0, 1),
(4, 'Using color to add meaning only provides a visual indication, which will not be conveyed to users of', 'Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text)', 123, 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk_diskon`
--

CREATE TABLE `produk_diskon` (
  `id_produk` int(9) NOT NULL,
  `diskon_persen` int(3) DEFAULT NULL,
  `total_produk` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_diskon`
--

INSERT INTO `produk_diskon` (`id_produk`, `diskon_persen`, `total_produk`) VALUES
(117, 929, 200),
(1, 20, 10),
(3, 0, NULL),
(4, 12, 200);

-- --------------------------------------------------------

--
-- Table structure for table `produk_gambar`
--

CREATE TABLE `produk_gambar` (
  `id_produk` int(9) NOT NULL,
  `gambar_1` varchar(255) NOT NULL,
  `gambar_2` varchar(255) DEFAULT NULL,
  `gambar_3` varchar(255) DEFAULT NULL,
  `gambar_4` varchar(255) DEFAULT NULL,
  `gambar_5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_gambar`
--

INSERT INTO `produk_gambar` (`id_produk`, `gambar_1`, `gambar_2`, `gambar_3`, `gambar_4`, `gambar_5`) VALUES
(117, 'gambar_1_1607757274_f52d7875377eaacfc87e.jpg', NULL, NULL, NULL, NULL),
(1, 'gambar_1_1607771944_1addb13da1f7d6dd6e1a.jpg', 'gambar_2_1607771944_61a77a8fe5124a9695a0.jpg', NULL, NULL, NULL),
(3, 'gambar_1_1607772133_e5926899778c115f96ec.jpg', 'gambar_2_1607772133_bd119176ae8dfb361dfb.jpg', NULL, NULL, NULL),
(4, 'gambar_1_1607778624_b3b660e339f528b41d8b.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk_harga`
--

CREATE TABLE `produk_harga` (
  `id_produk` int(11) NOT NULL,
  `harga_normal` int(11) NOT NULL,
  `harga_diskon` int(11) DEFAULT NULL,
  `harga_saat_ini` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_harga`
--

INSERT INTO `produk_harga` (`id_produk`, `harga_normal`, `harga_diskon`, `harga_saat_ini`) VALUES
(117, 100, -829, -829),
(1, 200000, 160000, 160000),
(3, 100000, NULL, 100000),
(4, 50000, 44000, 44000);

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_produk` int(9) NOT NULL,
  `id_kategori_1` int(9) NOT NULL,
  `id_kategori_2` int(9) DEFAULT NULL,
  `id_kategori_3` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_produk`, `id_kategori_1`, `id_kategori_2`, `id_kategori_3`) VALUES
(117, 1, 2, NULL),
(1, 1, 2, 4),
(3, 1, 2, 3),
(4, 1, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk_rating`
--

CREATE TABLE `produk_rating` (
  `id_produk` int(9) NOT NULL,
  `bintang_1` int(9) NOT NULL,
  `bintang_2` int(9) NOT NULL,
  `bintang_3` int(9) NOT NULL,
  `bintang_4` int(9) NOT NULL,
  `bintang_5` int(9) NOT NULL,
  `total_rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_rating`
--

INSERT INTO `produk_rating` (`id_produk`, `bintang_1`, `bintang_2`, `bintang_3`, `bintang_4`, `bintang_5`, `total_rating`) VALUES
(1, 0, 0, 0, 0, 0, 3),
(3, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0),
(117, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_ukuran`
--

CREATE TABLE `produk_ukuran` (
  `id_produk` int(9) NOT NULL,
  `id_ukuran_1` int(9) DEFAULT NULL,
  `id_ukuran_2` int(9) DEFAULT NULL,
  `id_ukuran_3` int(9) DEFAULT NULL,
  `id_ukuran_4` int(9) DEFAULT NULL,
  `id_ukuran_5` int(9) DEFAULT NULL,
  `id_ukuran_6` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_ukuran`
--

INSERT INTO `produk_ukuran` (`id_produk`, `id_ukuran_1`, `id_ukuran_2`, `id_ukuran_3`, `id_ukuran_4`, `id_ukuran_5`, `id_ukuran_6`) VALUES
(117, 2, 3, NULL, NULL, NULL, NULL),
(1, 1, 2, 4, 5, NULL, NULL),
(3, 1, 3, 6, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `id_status_pemesanan` int(9) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(9) NOT NULL,
  `nama_ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XXXL'),
(7, 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(9) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_keranjang`
--

CREATE TABLE `user_keranjang` (
  `id_user` int(9) NOT NULL,
  `id_produk` int(9) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_otentikasi`
--

CREATE TABLE `user_otentikasi` (
  `id_user` int(9) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_pemesanan_produk`
--

CREATE TABLE `user_pemesanan_produk` (
  `id_pesanan` int(9) NOT NULL,
  `id_produk` int(9) NOT NULL,
  `jumlah` int(9) NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_pesanan`
--

CREATE TABLE `user_pesanan` (
  `id_pesanan` int(9) NOT NULL,
  `id_user` int(9) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `id_status_pemesanan` int(9) NOT NULL,
  `id_bank` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_pesanan_alamat`
--

CREATE TABLE `user_pesanan_alamat` (
  `id_pesanan` int(9) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_pesanan_kurir`
--

CREATE TABLE `user_pesanan_kurir` (
  `id_pesanan` int(9) NOT NULL,
  `nama_kurir` int(50) NOT NULL,
  `layanan_kurir` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE `user_wishlist` (
  `id_user` int(9) NOT NULL,
  `id_produk` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `jenis` (`id_jenis`);

--
-- Indexes for table `produk_diskon`
--
ALTER TABLE `produk_diskon`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_gambar`
--
ALTER TABLE `produk_gambar`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_harga`
--
ALTER TABLE `produk_harga`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_rating`
--
ALTER TABLE `produk_rating`
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  ADD KEY `id_produk` (`id_produk`,`id_ukuran_1`),
  ADD KEY `id_ukuran` (`id_ukuran_1`),
  ADD KEY `id_ukuran_2` (`id_ukuran_2`,`id_ukuran_3`,`id_ukuran_4`,`id_ukuran_5`),
  ADD KEY `id_ukuran_3` (`id_ukuran_3`),
  ADD KEY `id_ukuran_4` (`id_ukuran_4`),
  ADD KEY `id_ukuran_5` (`id_ukuran_5`),
  ADD KEY `id_ukuran_6` (`id_ukuran_6`);

--
-- Indexes for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`id_status_pemesanan`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_keranjang`
--
ALTER TABLE `user_keranjang`
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `user_otentikasi`
--
ALTER TABLE `user_otentikasi`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_pemesanan_produk`
--
ALTER TABLE `user_pemesanan_produk`
  ADD KEY `id_pesanan` (`id_pesanan`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `user_pesanan`
--
ALTER TABLE `user_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`,`id_status_pemesanan`,`id_bank`),
  ADD KEY `id_status_pemesanan` (`id_status_pemesanan`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `user_pesanan_alamat`
--
ALTER TABLE `user_pesanan_alamat`
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `user_pesanan_kurir`
--
ALTER TABLE `user_pesanan_kurir`
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  MODIFY `id_status_pemesanan` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_pesanan`
--
ALTER TABLE `user_pesanan`
  MODIFY `id_pesanan` int(9) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_diskon`
--
ALTER TABLE `produk_diskon`
  ADD CONSTRAINT `produk_diskon_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_gambar`
--
ALTER TABLE `produk_gambar`
  ADD CONSTRAINT `produk_gambar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_harga`
--
ALTER TABLE `produk_harga`
  ADD CONSTRAINT `produk_harga_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD CONSTRAINT `produk_kategori_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_rating`
--
ALTER TABLE `produk_rating`
  ADD CONSTRAINT `produk_rating_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  ADD CONSTRAINT `produk_ukuran_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_keranjang`
--
ALTER TABLE `user_keranjang`
  ADD CONSTRAINT `user_keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_otentikasi`
--
ALTER TABLE `user_otentikasi`
  ADD CONSTRAINT `user_otentikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pemesanan_produk`
--
ALTER TABLE `user_pemesanan_produk`
  ADD CONSTRAINT `user_pemesanan_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pemesanan_produk_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `user_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pesanan`
--
ALTER TABLE `user_pesanan`
  ADD CONSTRAINT `user_pesanan_ibfk_1` FOREIGN KEY (`id_status_pemesanan`) REFERENCES `status_pemesanan` (`id_status_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pesanan_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pesanan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pesanan_alamat`
--
ALTER TABLE `user_pesanan_alamat`
  ADD CONSTRAINT `user_pesanan_alamat_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `user_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pesanan_kurir`
--
ALTER TABLE `user_pesanan_kurir`
  ADD CONSTRAINT `user_pesanan_kurir_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `user_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD CONSTRAINT `user_wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_wishlist_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
