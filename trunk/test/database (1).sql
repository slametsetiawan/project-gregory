-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2012 at 08:40 
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
(8, 'tahun baru ku', 'gregory', 'selamat menempuh tahun naga air sukses untuk semuanya', '2012-02-22 19:39:36');

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
  `kode` varchar(31) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `produk` (`produk`),
  KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `detil_pemesanan`
--

INSERT INTO `detil_pemesanan` (`no`, `produk`, `jumlah`, `berat`, `harga`, `kode`) VALUES
(12, 22, 1, 1, 150000, 'jhHGcq6xE2hHDrH'),
(13, 22, 1, 1, 150000, 'xs9zSD12MmnA3BO'),
(14, 22, 20, 1, 150000, 'ZhSPyODnmzRZ9f8'),
(15, 22, 50, 1, 150000, 'fCfX51YTXCbMMrf'),
(16, 2, 1, 1, 150000, 'Y5jN3CEk8gKpSCg'),
(17, 29, 50, 1, 150000, 'RahrTwk5ORqmNF8'),
(18, 31, 1, 1, 150000, 'M1ASqwcr9GSBNre'),
(19, 30, 1, 1, 150000, 'M1ASqwcr9GSBNre'),
(20, 31, 1, 1, 150000, 'AraGsX7Cxe3SyHp'),
(21, 30, 1, 1, 150000, 'AraGsX7Cxe3SyHp'),
(22, 31, 1, 1, 150000, '5H7YyxygrkPH1eM'),
(23, 22, 12, 1, 150000, '8s27PngEbRmb4BE'),
(24, 30, 35, 1, 150000, 'y48hOQ57Kry1hMA'),
(25, 29, 1, 1, 150000, '7zwr2r6swZNdQee'),
(26, 30, 1, 1, 150000, 'OtH5SRz4ynfGZXM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`no`, `nama`) VALUES
(1, 'celana'),
(2, 'jaket'),
(3, 'lainnya'),
(4, 'Kemeja'),
(5, 'celana pendek'),
(6, 'celana panjang');

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

--
-- Dumping data for table `konfirmasi_pembayaran`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`no`, `kode`, `nama`, `deskripsi`, `dipropinsi`) VALUES
(1, 'SBY', 'Surabaya', '', 1),
(2, 'JKT', 'Jakarta', '', 2),
(3, 'BDG', 'Bandung', '', 5),
(4, 'SMG', 'semarang', '', 3),
(5, 'DIY', 'yogjakarta', '', 4),
(10, 'MLG', 'Malang', '', 1);

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
(8, 'Celana Kain', 7),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`no`, `kode`, `tanggal_disisipkan`, `oleh_pengguna`, `alamat_pengiriman`, `kota_pengiriman`, `telepon`, `berat_keseluruhan`, `tarif_pengiriman`, `biaya_pengiriman`, `harga_keseluruhan`, `metode_pembayaran`, `status_pemesanan`, `pesan`) VALUES
(19, 'jhHGcq6xE2hHDrH', '2012-02-23 23:46:04', 6, '                    Jagiran 3/45                      ', 1, '                    08133122402', 1, 1, 50000, 181563, 2, 3, ''),
(20, 'xs9zSD12MmnA3BO', '2012-02-23 23:47:32', 6, 'Jagiran 3/45                      ', 1, '081331224022                   ', 1, 1, 50000, 178955, 1, 1, ''),
(21, 'ZhSPyODnmzRZ9f8', '2012-02-25 17:50:23', 2, '                    Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 2556114, 1, 1, ''),
(22, 'fCfX51YTXCbMMrf', '2012-02-25 23:22:17', 2, '                    Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 6301531, 1, 3, 'dari ie 8'),
(24, 'Y5jN3CEk8gKpSCg', '2012-02-25 23:47:35', 6, '                    Jagiran 3/45                      ', 1, '                    08133122402', 1, 1, 50000, 1555704, 1, 3, ''),
(25, 'RahrTwk5ORqmNF8', '2012-02-27 16:26:54', 2, '                    Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 557819, 1, 1, 'gtrrrr'),
(26, 'M1ASqwcr9GSBNre', '2012-02-27 17:27:56', 2, '                    Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 357775, 1, 1, 'wew'),
(27, 'AraGsX7Cxe3SyHp', '2012-02-27 17:29:14', 6, '                    Jagiran 3/45                      ', 1, '                    08133122402', 1, 1, 50000, 357341, 1, 1, '4444444444444'),
(28, '5H7YyxygrkPH1eM', '2012-02-27 17:30:12', 2, '                    Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 207853, 1, 1, ''),
(29, '8s27PngEbRmb4BE', '2012-02-27 21:31:35', 9, 'Jalan Kenjeran no 31                                            ', 1, '03151500745                    ', 1, 1, 50000, 1551857, 1, 1, ''),
(30, 'y48hOQ57Kry1hMA', '2012-02-28 14:18:05', 2, 'Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 5305251, 1, 1, ''),
(31, '7zwr2r6swZNdQee', '2012-03-06 09:03:20', 2, 'Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 54584, 1, 1, ''),
(32, 'OtH5SRz4ynfGZXM', '2012-03-07 14:25:33', 2, 'Jalan Kenjeran no 31                      ', 1, '                    03151500745', 1, 1, 50000, 58795, 1, 1, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pengirim`
--

INSERT INTO `pengirim` (`no`, `kode`, `deskripsi`) VALUES
(1, 'TOKO', ''),
(2, 'TIKI', ''),
(3, 'test', 'testing'),
(4, 'Malang', 'kota apel');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`no`, `kode`, `nama`, `kategori_produk`, `deskripsi`, `berat`, `harga`, `kuantitas`) VALUES
(2, 'PX025906', 'Jaket', 2, 'deskripsikan saja', 0.5, 1500001, 100),
(16, 'CELANA', 'Celana', 1, 'celana keren yang kudu dibeli', 1, 152000, 100),
(22, 'CLKN', 'Celana Kain ', 1, 'Celana Kain yang Trendi', 0.5, 125000, 81),
(23, 'HITAM', 'Kemeja Hitam', 4, 'Kemeja IRENG', 0.5, 899999, 80),
(27, 'KKTB2', 'Kemeja keren terbaru', 4, 'kemeja testing', 1, 155000, 100),
(29, 'TESTEST', 'test ae', 1, 'deskripsikan', 0.5, 10000, 100),
(30, 'PRODUKsore', 'produk sore', 4, 'sore sore', 1, 150000, 100),
(31, 'PROKU', 'pro ku', 4, 'wew', 1, 150000, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`no`, `kode`, `deskripsi`) VALUES
(1, 'MENUNGGU_PEMBAYARAN', 'Pemesanan diterima sistem dan menunggu pembayaran untuk langkah selanjutnya. Diharapkan mengkonfirmasi pembayaran agar langsung diproses sistem.'),
(3, 'DIPROSES', ''),
(5, 'SELESAI', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`no`, `kode`, `deskripsi`, `sebagai_default`) VALUES
(1, 'emotion', 'Web template created by ddQ.', 'YA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_pemesanan`
--
ALTER TABLE `detil_pemesanan`
  ADD CONSTRAINT `detil_pemesanan_ibfk_2` FOREIGN KEY (`produk`) REFERENCES `produk` (`no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_pemesanan_ibfk_3` FOREIGN KEY (`kode`) REFERENCES `pemesanan` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

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
