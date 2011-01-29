
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2011 at 05:21 PM
-- Server version: 5.0.91
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bap_imtek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpeserta`
--

CREATE TABLE `tblpeserta` (
  `kodepes` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kodesek` int(11) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY  (`kodepes`),
  KEY `fk_sekolah` (`kodesek`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpeserta`
--

INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(11111111, 'sakti dwi cahyono', 1, '081914947566', 'hehe \npertamax');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(22222222, 'sakti dc', 1, '122312321', 'test komentar');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(21213121, 'detasemen', 4, '2123423', '2131231');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(35431368, 'Rudy Setyawan', 5, '085695984354', 'Aq gor nyobo tok lho yo!!!!!!!!!\n\nbtw kok harus diisi semua sih');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(10000000, 'lulhhkhklhklj', 1, '02154878', 'jhjhkjhkjh');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(23234444, 'abu mundzir', 1, '0899333', 'njajal');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(12345678, 'fauzan Riyadi malik', 1, '085624121477', 'ngetes');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(2463589, 'ex kepala suku', 9, '085272789090', 'siiiiiiiippppppppp');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(34224342, 'xxxxx', 1, '43243243123', 'sad');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(23553455, 'sadsdas ', 1, '43243243123', 'sad');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(13333333, 'imathosan', 1, '081544637565', 'test');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(12145678, 'si x', 1, '3213131', 'hoammm..ngantuk');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(11307019, '123456', 8, '123456416', '123456');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(78678687, 'asdfa', 1, '979879', 'fdadf');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(90779890, '\\''', 1, '879879', '\\''jk;j');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(45363476, '123', 1, '123', 'asfdsadf');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(90990900, '121212343', 1, '34323', '23432');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(11111112, ' 1', 10, '2', 'dddddd');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(0, 'bagas', 8, '000000000000000', 'ajax,, nais...');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(1, 'bagas', 8, '111111111111111', 'jQuery (write less, do more) tapi rung mudeng...');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(99990909, '99090', 1, '909090', '99099 masuk');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(12312768, '12123', 1, '123', 'keren euy pake ajax');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(98767896, 'testing lagi', 7, '09237162376123', 'la la li li sdfasdfs asdfas');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(14575899, 'rudy setyawan', 1, '08628061357', 'Hehehe coba  masukin lgi ah!!');
INSERT INTO `tblpeserta` (`kodepes`, `nama`, `kodesek`, `notelp`, `komentar`) VALUES(45678123, 'coba ah', 1, '085762456134', 'hahahaha aq cba lgi yah,,\n');

-- --------------------------------------------------------

--
-- Table structure for table `tblsekolah`
--

CREATE TABLE `tblsekolah` (
  `kodesek` int(11) NOT NULL auto_increment,
  `nama` varchar(40) NOT NULL,
  PRIMARY KEY  (`kodesek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tblsekolah`
--

INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(1, 'SMA N 1 Kebumen');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(2, 'SMA N 2 Kebumen');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(3, 'SMA N 1 Pejagoan');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(4, 'SMA N 1 Gombong');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(5, 'SMA N 1 Karanganyar');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(6, 'SMA N 1 Kutowinangun');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(7, 'SMA N 1 Prembun');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(8, 'SMA N 1 Klirong');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(9, 'MAN 1 Kebumen');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(10, 'MAN 2 Kebumen');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(11, 'SMK Komputer');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(12, 'SMK N 2 Kebumen');
INSERT INTO `tblsekolah` (`kodesek`, `nama`) VALUES(13, 'SMA PGRI Kebumen');
