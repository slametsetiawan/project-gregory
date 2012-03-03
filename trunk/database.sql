-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2012 at 06:17 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perdagangan_elektronik`
--
CREATE DATABASE `perdagangan_elektronik` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `perdagangan_elektronik`;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `no_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(31) NOT NULL,
  `penulis` varchar(31) NOT NULL,
  `isi_berita` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`no_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`no_berita`, `judul`, `penulis`, `isi_berita`, `date_added`) VALUES
(4, 'tahun baru', 'gregory', 'selamat menempuh tahun naga air sukses untuk semuanya', '2012-02-03 00:34:45'),
(5, 'tahun baru', 'gregory', 'selamat menempuh tahun naga air sukses untuk semuanya', '2012-02-03 00:59:16'),
(6, 'Tahun 2012', 'gregory', 'tahun yang penuh keceriaan', '2012-02-09 19:30:23'),
(7, 'GRAND TESTER', 'gregory', 'SAPA AJA DEH', '2012-02-22 19:32:05'),
(8, 'GRAND TESTER 2', 'gregory', 'lagi lagi', '2012-02-22 19:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `detil_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detil_pemesanan` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `produk` bigint(20) unsigned NOT NULL,
  `jumlah` int(10) unsigned NOT NULL DEFAULT '0',
  `berat` double NOT NULL DEFAULT '0',
  `harga` double NOT NULL DEFAULT '0',
  `pada_pemesanan` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`no`),
  KEY `produk` (`produk`),
  KEY `kode` (`pada_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengguna`
--

CREATE TABLE IF NOT EXISTS `jenis_pengguna` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL DEFAULT '' COMMENT 'kode karena tidak mungkin ada nama jenis pengguna yang sama/ganda',
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_pengguna`
--

INSERT INTO `jenis_pengguna` (`no`, `kode`, `deskripsi`) VALUES
(1, 'ADMIN', ''),
(2, 'CUSTOMER', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(31) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`no`, `nama`) VALUES
(1, 'BURBERRY'),
(2, 'GUESS'),
(3, 'HERMES'),
(4, 'ICEBERG'),
(5, 'LACOSTE');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pembayaran` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pemesanan` bigint(20) unsigned NOT NULL,
  `metode_pembayaran` bigint(20) unsigned NOT NULL,
  `atas_nama` varchar(63) NOT NULL,
  `no_akun` varchar(31) NOT NULL,
  `sejumlah` double NOT NULL,
  `status_pemesanan` int(5) NOT NULL,
  `tanggal_disisipkan` datetime NOT NULL,
  PRIMARY KEY (`no`),
  KEY `pemesanan` (`pemesanan`),
  KEY `metode_pembayaran` (`metode_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(7) NOT NULL DEFAULT '',
  `nama` varchar(63) NOT NULL DEFAULT '',
  `deskripsi` text NOT NULL,
  `dipropinsi` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`),
  KEY `dipropinsi` (`dipropinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`no`, `kode`, `nama`, `deskripsi`, `dipropinsi`) VALUES
(1, 'SBY', 'Surabaya', '', 1),
(2, 'JKT', 'Jakarta', '', 2),
(3, 'BDG', 'Bandung', '', 5),
(4, 'SMG', 'Semarang', '', 3),
(5, 'DIY', 'Yogjakarta', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_produk`
--

CREATE TABLE IF NOT EXISTS `laporan_produk` (
  `no` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(63) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `produk` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `laporan_produk`
--

INSERT INTO `laporan_produk` (`no`, `nama`, `kuantitas`) VALUES
(2, 'test ae', 140),
(3, 'produk sore', 0),
(4, 'pro ku', 1),
(5, 'Kemeja Hitam', 0),
(6, 'Jaket', 0),
(7, 'Celana', 0),
(8, 'Celana Kain', 0),
(9, 'Kemeja keren terbaru	', 0);

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE IF NOT EXISTS `metode_pembayaran` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`no`, `kode`, `deskripsi`) VALUES
(1, 'BCA', 'REK: 1010648226\r\nA/N: Admin Berbaju'),
(2, 'MANDIRI', 'REK: 1010648226\r\nA/N: Admin Berbaju');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL,
  `tanggal_disisipkan` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `oleh_pengguna` bigint(20) unsigned NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `kota_pengiriman` bigint(20) unsigned NOT NULL,
  `telepon` varchar(31) NOT NULL DEFAULT '',
  `berat_keseluruhan` double NOT NULL DEFAULT '0',
  `tarif_pengiriman` bigint(20) unsigned NOT NULL,
  `biaya_pengiriman` double NOT NULL DEFAULT '0',
  `harga_keseluruhan` double NOT NULL DEFAULT '0',
  `metode_pembayaran` bigint(20) unsigned NOT NULL,
  `status_pemesanan` bigint(20) unsigned NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`),
  KEY `oleh_pengguna` (`oleh_pengguna`),
  KEY `metode_pembayaran` (`metode_pembayaran`),
  KEY `status_pemesanan` (`status_pemesanan`),
  KEY `tarif_pengiriman` (`tarif_pengiriman`),
  KEY `kota_pengiriman` (`kota_pengiriman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'no sebagai PK',
  `kode` varchar(31) NOT NULL DEFAULT '' COMMENT 'kode merupakan username, yang digunakan sebagai alternatif PK',
  `nama` varchar(63) NOT NULL DEFAULT '' COMMENT 'nama tidak unik, memungkinkan nama yang sama',
  `kata_kunci` varchar(63) NOT NULL DEFAULT '' COMMENT 'kata_kunci merupakan password',
  `alamat` text NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `email` varchar(63) NOT NULL DEFAULT '',
  `kota` bigint(20) unsigned NOT NULL,
  `telepon` varchar(31) NOT NULL DEFAULT '',
  `tanggal_disisipkan` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'tanggal_disisipkan merupakan tanggal dimana data dimasukkan',
  `jenis_pengguna` bigint(20) unsigned NOT NULL,
  `status_akses` enum('DIPERBOLEHKAN','DITOLAK') NOT NULL DEFAULT 'DIPERBOLEHKAN' COMMENT 'status_akses menandai pengguna tersebut bisa akses ke sistem atau tidak tanpa menghapus rekord',
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`),
  KEY `jenis_pengguna` (`jenis_pengguna`),
  KEY `kota` (`kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`no`, `kode`, `nama`, `kata_kunci`, `alamat`, `kode_pos`, `email`, `kota`, `telepon`, `tanggal_disisipkan`, `jenis_pengguna`, `status_akses`) VALUES
(2, 'asd', 'Gregory Adrianto Setiawan', '7815696ecbf1c96e6894b779456d330e', 'Jalan Kenjeran no 31', '60134', 'greyzher@gmail.com', 1, '03151500745', '2012-01-22 00:00:00', 1, 'DIPERBOLEHKAN'),
(6, 'leopradipta', 'Leo Pradipta', '99bd628c72e82b5e8524ae661ca417d7', 'Jagiran 3/45', '', 'leo@karuniaindah.net', 1, '081331224022', '2012-02-22 21:59:01', 2, 'DITOLAK'),
(7, 'asdasd', 'asdasdasd', 'a8f5f167f44f4964e6c998dee827110c', 'asdasdasd', '60134', 'asd@asd.com', 1, '03151500745', '2012-02-22 18:38:52', 2, 'DIPERBOLEHKAN'),
(8, 'asdf', 'asdf', 'a152e841783914146e4bcd4f39100686', 'asdf', '', 'asdf@asdf.com', 1, '0315920371', '2012-02-27 20:41:21', 2, 'DIPERBOLEHKAN'),
(9, 'glayzher', 'Gregory Adrianto Setiawan                    ', 'e10adc3949ba59abbe56e057f20f883e', 'Jalan Kenjeran no 31                      ', '60143', 'glayzher@yahoo.com', 1, '03151500745', '2012-02-27 21:23:32', 2, 'DIPERBOLEHKAN');

-- --------------------------------------------------------

--
-- Table structure for table `pengirim`
--

CREATE TABLE IF NOT EXISTS `pengirim` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`no`, `kode`, `deskripsi`) VALUES
(1, 'TOKO', ''),
(2, 'TIKI', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL DEFAULT '',
  `nama` varchar(63) NOT NULL DEFAULT '',
  `kategori_produk` bigint(20) unsigned NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` double NOT NULL,
  `harga` double NOT NULL,
  `kuantitas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`),
  UNIQUE KEY `nama` (`nama`),
  KEY `kategori_produk` (`kategori_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`no`, `kode`, `nama`, `kategori_produk`, `deskripsi`, `berat`, `harga`, `kuantitas`) VALUES
(1, 'PBP457', 'NEW POLO BURBERRY IMPORT', 1, 'Tersedia ukuran M, L, XL', 0.2, 160000, 18),
(2, 'JBB2', 'JEANS BURBERRY', 1, 'Tersedia Ukuran 29-38', 0.3, 340000, 37),
(3, 'JG001', 'JEANS GUESS PREMIUM', 2, 'Tersedia ukuran 30-24', 0.35, 320000, 67),
(4, 'KSG1', 'KEMEJA GUESS PENDEK PREMIUM', 2, 'Tersedia ukuran M, L, XL', 0.18, 230000, 41),
(5, 'PGS3', 'POLO SHIRT GUESS PREMIUM', 2, 'Tersedia ukuran M, L, XL', 0.22, 160000, 38),
(6, 'TGS3', 'T-SHIRT GUESS PREMIUM', 2, 'Tersedia ukuran M, L, XL', 0.2, 135000, 47);

-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

CREATE TABLE IF NOT EXISTS `propinsi` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(7) NOT NULL DEFAULT '',
  `nama` varchar(63) NOT NULL DEFAULT '',
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`no`, `kode`, `nama`, `deskripsi`) VALUES
(1, 'JATIM', 'Jawa Timur', ''),
(2, 'JKT', 'Jakarta', ''),
(3, 'JATENG', 'Jawa Tengah', ''),
(4, 'DIY', 'Daerah Istimewa Yogjakarta', ''),
(5, 'JABAR', 'Jawa Barat', '');

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE IF NOT EXISTS `status_pemesanan` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`no`, `kode`, `deskripsi`) VALUES
(1, 'MENUNGGU_PEMBAYARAN', 'Pemesanan diterima sistem dan menunggu pembayaran untuk langkah selanjutnya. Diharapkan mengkonfirmasi pembayaran agar langsung diproses sistem.'),
(2, 'DIPROSES', ''),
(3, 'SELESAI', '');

-- --------------------------------------------------------

--
-- Table structure for table `tarif_pengiriman`
--

CREATE TABLE IF NOT EXISTS `tarif_pengiriman` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL DEFAULT '',
  `nama` varchar(63) NOT NULL DEFAULT '',
  `deskripsi` text NOT NULL,
  `kisaran_berat_dari` double NOT NULL DEFAULT '0',
  `kisaran_berat_ke` double NOT NULL DEFAULT '0',
  `tarif` double NOT NULL DEFAULT '0',
  `oleh_pengirim` bigint(20) unsigned NOT NULL,
  `ke_kota` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`),
  KEY `oleh_pengirim` (`oleh_pengirim`),
  KEY `ke_kota` (`ke_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tarif_pengiriman`
--

INSERT INTO `tarif_pengiriman` (`no`, `kode`, `nama`, `deskripsi`, `kisaran_berat_dari`, `kisaran_berat_ke`, `tarif`, `oleh_pengirim`, `ke_kota`) VALUES
(1, 'TIKIYESSBY', 'TIKIYESSBY', '', 0, 10, 50000, 1, 1),
(2, 'TOKO', 'TOKO BERBAJU', '', 0, 1, 50000, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(31) NOT NULL,
  `deskripsi` text NOT NULL,
  `sebagai_default` enum('YA','TIDAK') NOT NULL DEFAULT 'TIDAK',
  PRIMARY KEY (`no`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`no`, `kode`, `deskripsi`, `sebagai_default`) VALUES
(1, 'emotion', 'Web template created by ddQ.', 'YA'),
(2, 'berbaju', 'Web template created by ddQ.	', 'TIDAK');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_pemesanan`
--
ALTER TABLE `detil_pemesanan`
  ADD CONSTRAINT `detil_pemesanan_ibfk_2` FOREIGN KEY (`pada_pemesanan`) REFERENCES `pemesanan` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_pemesanan_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`no`) ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pemesanan`) REFERENCES `pemesanan` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_2` FOREIGN KEY (`metode_pembayaran`) REFERENCES `metode_pembayaran` (`no`) ON UPDATE CASCADE;

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`dipropinsi`) REFERENCES `propinsi` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_15` FOREIGN KEY (`oleh_pengguna`) REFERENCES `pengguna` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_16` FOREIGN KEY (`kota_pengiriman`) REFERENCES `kota` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_17` FOREIGN KEY (`tarif_pengiriman`) REFERENCES `tarif_pengiriman` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_18` FOREIGN KEY (`metode_pembayaran`) REFERENCES `metode_pembayaran` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_19` FOREIGN KEY (`status_pemesanan`) REFERENCES `status_pemesanan` (`no`) ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`jenis_pengguna`) REFERENCES `jenis_pengguna` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pengguna_ibfk_2` FOREIGN KEY (`kota`) REFERENCES `kota` (`no`) ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk`) REFERENCES `kategori_produk` (`no`) ON UPDATE CASCADE;

--
-- Constraints for table `tarif_pengiriman`
--
ALTER TABLE `tarif_pengiriman`
  ADD CONSTRAINT `tarif_pengiriman_ibfk_2` FOREIGN KEY (`ke_kota`) REFERENCES `kota` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tarif_pengiriman_ibfk_3` FOREIGN KEY (`oleh_pengirim`) REFERENCES `pengirim` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
