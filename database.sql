-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2012 at 04:14 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
  KEY `pada_pemesanan` (`pada_pemesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `detil_pemesanan`
--

INSERT INTO `detil_pemesanan` (`no`, `produk`, `jumlah`, `berat`, `harga`, `pada_pemesanan`) VALUES
(2, 1, 1, 0.5, 125000, 2),
(3, 3, 1, 0.35, 320000, 3),
(4, 4, 1, 0.18, 230000, 4),
(5, 3, 1, 0.35, 320000, 4),
(6, 1, 30, 0.5, 125000, 6),
(7, 6, 1, 0.2, 135000, 7),
(8, 1, 1, 0.5, 125000, 8),
(9, 6, 1, 0.2, 135000, 11),
(10, 9, 1, 0.5, 125000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(63) NOT NULL DEFAULT '',
  `jawaban` text NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `pertanyaan` (`pertanyaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`no`, `pertanyaan`, `jawaban`) VALUES
(1, 'Bagaimana Cara Mencetak Nota Penjualan?', 'Melalui side menu Daftar Pemesanan dan pilih transaksi Tertentu yang ingin dicetak menjadi Bukti Pemesanan'),
(2, 'Kenapa Bukti Pembelian Tidak Lsg dicetak Saat transaksi Selesai', 'Karen Untuk Memudahkan pengguna yang kehilangan bukti pembeliannya pada saat ingin melakukan transaksi pengiriman uang');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`no`, `nama`) VALUES
(1, 'celana'),
(2, 'jaket'),
(3, 'lainnya'),
(4, 'Kemeja'),
(8, 'celana panjang'),
(9, 'Kaos'),
(10, 'Jas');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pembayaran` (
  `no` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pemesanan` bigint(20) unsigned NOT NULL,
  `metode_pembayaran` bigint(20) unsigned NOT NULL,
  `atas_nama` varchar(63) NOT NULL,
  `no_akun_bank` varchar(16) NOT NULL,
  `sejumlah` double NOT NULL,
  `tanggal_disisipkan` datetime NOT NULL,
  PRIMARY KEY (`no`),
  KEY `pemesanan` (`pemesanan`),
  KEY `metode_pembayaran` (`metode_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`no`, `pemesanan`, `metode_pembayaran`, `atas_nama`, `no_akun_bank`, `sejumlah`, `tanggal_disisipkan`) VALUES
(3, 2, 2, 'Gregory Adrianto Setiawan', '3124234123', 125000, '2012-03-08 09:02:12'),
(4, 3, 2, 'Leo Pradipta', '6784567834567', 320000, '2012-03-08 10:27:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`no`, `kode`, `nama`, `deskripsi`, `dipropinsi`) VALUES
(1, 'SBY', 'Surabaya', '', 1),
(2, 'JKT', 'Jakarta', '', 2),
(3, 'BDG', 'Bandung', '', 5),
(4, 'SMG', 'Semarang', '', 3),
(5, 'DIY', 'Yogjakarta', '', 4),
(10, 'MLG', 'Malang', '', 1),
(11, 'MND', 'Manado', '', 24);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `laporan_produk`
--

INSERT INTO `laporan_produk` (`no`, `nama`, `kuantitas`) VALUES
(10, 'NEW POLO BURBERRY IMPORT', 11),
(11, 'JEANS BURBERRY', 0),
(12, 'JEANS GUESS PREMIUM', 2),
(13, 'KEMEJA GUESS PENDEK PREMIUM', 0),
(14, 'POLO SHIRT GUESS PREMIUM', 0),
(15, 'T-SHIRT GUESS PREMIUM', 1);

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
  `nama_penerima` varchar(63) NOT NULL DEFAULT '',
  `alamat_pengiriman` text NOT NULL,
  `kota_pengiriman` bigint(20) unsigned NOT NULL,
  `telepon_penerima` varchar(31) NOT NULL DEFAULT '',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`no`, `kode`, `tanggal_disisipkan`, `oleh_pengguna`, `nama_penerima`, `alamat_pengiriman`, `kota_pengiriman`, `telepon_penerima`, `berat_keseluruhan`, `tarif_pengiriman`, `biaya_pengiriman`, `harga_keseluruhan`, `metode_pembayaran`, `status_pemesanan`, `pesan`) VALUES
(2, '665f644e43731ff9db3d341da5c827e', '2012-03-08 00:09:01', 2, 'Gregory Adrianto Setiawan', 'Jalan Kenjeran no 31', 1, '03151500745', 0.5, 2, 9000, 125000, 1, 2, 'Harap Segera Dikirim'),
(3, '38026ed22fc1a91d92b5d2ef93540f2', '2012-03-08 10:26:43', 6, 'Leo Pradipta', 'Jagiran 3/45', 1, '081331224022', 0.35, 4, 5000, 320000, 2, 3, 'oke'),
(4, '011ecee7d295c066ae68d4396215c3d', '2013-01-01 10:36:17', 2, 'Gregory Adrianto Setiawan', 'Jalan Kenjeran no 31', 11, '03151500745', 0.53, 5, 11000, 550000, 1, 3, 'oke'),
(6, '3d2f8900f2e49c02b481c2f717aa902', '2012-03-11 08:56:13', 2, 'Gregory Adrianto Setiawan', 'Jalan Kenjeran no 31', 1, '03151500745', 15, 1, 165000, 3750000, 1, 1, ''),
(7, 'cd7fd1517e323f26c6f1b0b6b96e3b3', '2012-03-12 00:55:14', 2, 'Gregory Adrianto Setiawan', 'Jalan Kenjeran no 31', 1, '03151500745', 0.2, 4, 5000, 135000, 2, 1, ''),
(8, '815e6212def15fe76ed27cec7a393d5', '2012-03-20 08:45:17', 2, 'Gregory Adrianto Setiawan', 'Jalan Kenjeran no 31', 1, '03151500745', 0.5, 4, 5000, 125000, 2, 1, ''),
(11, '7bfc85c0d74ff05806e0b5a0fa0c1df', '2012-03-20 08:54:38', 2, 'Gregory Adrianto Setiawan', 'Jalan Kenjeran no 31', 1, '03151500745', 0.2, 2, 9000, 135000, 1, 1, 'harap cepat'),
(12, 'c8b2f17833a4c73bb20f88876219ddc', '2012-03-20 09:22:53', 2, 'Gregory Adrianto Setiawan', 'Jalan Kenjeran no 31', 1, '03151500745', 0.5, 4, 5000, 125000, 2, 1, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`no`, `kode`, `deskripsi`) VALUES
(1, 'TOKO', ''),
(2, 'TIKI', ''),
(3, 'JNE', ''),
(4, 'PT POS INDONESIA', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`no`, `kode`, `nama`, `kategori_produk`, `deskripsi`, `berat`, `harga`, `kuantitas`) VALUES
(1, 'PB01', 'NEW POLO BURBERRY IMPORT BIRU TUA', 9, 'Ukuran M\r\nBerbahan Katun 100%', 0.5, 125000, 16),
(2, 'JBB2', 'JEANS BURBERRY', 1, 'Ukuran All size\r\n', 0.3, 340000, 37),
(3, 'JG001', 'JEANS GUESS PREMIUM', 1, 'ukuran All siza', 0.35, 320000, 65),
(4, 'KSG1', 'KEMEJA GUESS PENDEK PREMIUM MERAH', 4, 'ukuran All siza\r\nBerbahan Katun 100%', 0.18, 230000, 41),
(5, 'PGS3', 'POLO SHIRT GUESS PREMIUM', 9, 'Ukuran All size\r\nBerbahan Katun 100%', 0.22, 160000, 38),
(6, 'TGS3', 'T-SHIRT GUESS PREMIUM', 9, 'Ukuran All size\r\nBerbahan Katun 100%', 0.2, 135000, 44),
(8, 'KSG2', 'KEMEJA GUESS PENDEK PREMIUM BIRU', 4, 'ukuran All siza\r\nBerbahan Katun 100%\r\ndengan tambahan kancing dari italia', 0.18, 230000, 100),
(9, 'PB02', 'NEW POLO BURBERRY IMPORT HITAM', 9, 'Ukuran M\r\nBerbahan Katun 100%', 0.5, 125000, 100);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`no`, `kode`, `nama`, `deskripsi`) VALUES
(1, 'ID-JI', 'Jawa Timur', ''),
(2, 'ID-JK', 'Jakarta', ''),
(3, 'ID-JT', 'Jawa Tengah', ''),
(4, 'ID-YO', 'Daerah Istimewa Yogjakarta', ''),
(5, 'ID-JB', 'Jawa Barat', ''),
(6, 'ID-AC', 'Aceh', ''),
(7, 'ID-SU', 'Sumatera Utara', ''),
(8, 'ID-SB', 'Sumatera Barat', ''),
(9, 'ID-RI', 'Riau', ''),
(10, 'ID-JA', 'jambi', ''),
(11, 'ID-SS', 'Sumatera Selatan', ''),
(12, 'ID-BE', 'Bengkulu', ''),
(13, 'ID-LA', 'Lampung', ''),
(14, 'ID-BB', 'Kepulauan Bangka Belitung', ''),
(15, 'ID-KR', 'Kepulauan Riau', ''),
(16, 'ID-BT', 'Banten', ''),
(17, 'ID-BA', 'Bali', ''),
(18, 'ID-NB', 'Nusa Tenggara Barat', ''),
(19, 'ID-NT', 'Nusa Tenggara Timur', ''),
(20, 'ID-KB', 'Kalimantan Barat', ''),
(21, 'ID-KT', 'Kalimantan Tengah', ''),
(22, 'ID-KS', 'Kalimantan Selatan', ''),
(23, 'ID-KI', 'Kalimantan Timur', ''),
(24, 'ID-SA', 'Sulawesi Utara', ''),
(25, 'ID-ST', 'Sulawesi Tengah', ''),
(26, 'ID-SN', 'Sulawesi Selatan', ''),
(27, 'ID-SG', 'Sulawesi Tenggara', ''),
(28, 'ID-GO', 'Gorontalo', ''),
(29, 'ID-SR', 'Sulawesi Barat', ''),
(30, 'ID-MA', 'Maluku', ''),
(31, 'ID-MU', 'Maluku Utara', ''),
(32, 'ID-PB', 'Papua Barat', ''),
(33, 'ID-PA', 'Papua', '');

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
  `nama` varchar(63) NOT NULL DEFAULT '',
  `deskripsi` text NOT NULL,
  `tarif` double NOT NULL DEFAULT '0',
  `oleh_pengirim` bigint(20) unsigned NOT NULL,
  `ke_kota` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`no`),
  KEY `oleh_pengirim` (`oleh_pengirim`),
  KEY `ke_kota` (`ke_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tarif_pengiriman`
--

INSERT INTO `tarif_pengiriman` (`no`, `nama`, `deskripsi`, `tarif`, `oleh_pengirim`, `ke_kota`) VALUES
(1, 'YES', 'Yakin Esok Sampai', 11000, 3, 1),
(2, 'ONS', 'One Night Service', 9000, 2, 1),
(3, 'REGULAR', '', 3500, 3, 1),
(4, 'REGULAR', '', 5000, 2, 1),
(5, 'YES', 'Yakin Esok Sampai', 11000, 3, 11),
(6, 'REGULAR', '', 15000, 1, 11),
(7, 'MND', 'expres 1 hari', 25000, 2, 11);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`no`, `kode`, `deskripsi`, `sebagai_default`) VALUES
(1, 'emotion', 'Web template created by ddQ.', 'TIDAK'),
(2, 'social_net', 'template awal', 'TIDAK'),
(3, 'full_cut', '', 'YA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_pemesanan`
--
ALTER TABLE `detil_pemesanan`
  ADD CONSTRAINT `detil_pemesanan_ibfk_1` FOREIGN KEY (`produk`) REFERENCES `produk` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_pemesanan_ibfk_2` FOREIGN KEY (`pada_pemesanan`) REFERENCES `pemesanan` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pemesanan_ibfk_5` FOREIGN KEY (`oleh_pengguna`) REFERENCES `pengguna` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_6` FOREIGN KEY (`metode_pembayaran`) REFERENCES `metode_pembayaran` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_7` FOREIGN KEY (`status_pemesanan`) REFERENCES `status_pemesanan` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_8` FOREIGN KEY (`kota_pengiriman`) REFERENCES `kota` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_9` FOREIGN KEY (`tarif_pengiriman`) REFERENCES `tarif_pengiriman` (`no`) ON UPDATE CASCADE;

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
