/*
SQLyog Ultimate v10.42 
MySQL - 5.5.32 : Database - simperpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`simperpus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `simperpus`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `idanggota` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(70) DEFAULT NULL,
  `alamat_sekolah` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `kelas` int(5) DEFAULT NULL,
  `jeniskel` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `masaberlaku` date DEFAULT NULL,
  `foto` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`idanggota`,`nama`,`alamat`,`alamat_sekolah`,`status`,`kelas`,`jeniskel`,`tgllahir`,`telp`,`masaberlaku`,`foto`) values ('P02.001','Andre Firmansyah','Wonorejo Karanganyar',NULL,'1',2,'Laki-Laki','2009-03-17','088654343256','2021-06-30','7c7924ac678134f9b3bfa9e2d5ff580f_DSCN0536.JPG'),('P02.002','Abdul Hakim','Wonorejo Karanganyar',NULL,'1',2,'Laki-Laki','2009-01-19','0854332456','2021-06-30','7fac469adc4d8b486902390e28010cbd_DSCN0538.JPG'),('P02.003','Fathiya Amaliya','Wonorejo Karanganyar',NULL,'1',2,'Perempuan','2009-02-04','0843232434','2021-06-30','27d9f1b72a873615acbdf3dae38b284e_DSCN0522.JPG'),('P03.004','Angelina Ayu L','Wonorejo Karanganyar',NULL,'1',3,'Perempuan','2008-11-14','','2020-06-30',''),('P03.005','M. Syifa Abdika','Wonorejo Karanganyar',NULL,'1',3,'Laki-Laki','2008-12-02','','2020-06-30',''),('P03.006','Fitriyani','Wonorejo Karanganyar',NULL,'1',3,'Perempuan','2008-08-27','','2020-07-31',''),('P04.007','Aldi Ardiansyah','Wonorejo Karanganyar',NULL,'1',4,'Laki-Laki','2007-12-31','0898783676727','2020-06-30','b8fa76f0d5f3393fe648ee8e0e3756b6_DSCN0535.JPG'),('P04.008','Dewi Munasiroh','Wonorejo Karanganyar',NULL,'1',4,'Perempuan','2007-11-23','','2019-06-30',''),('P05.010','Naila Nurmala','Wonorejo Karanganyar',NULL,'1',5,'Perempuan','2006-11-07','','2018-06-30',''),('P06.013','M. Faidzin Saputra','Wonorejo Karanganyar',NULL,'1',6,'Laki-Laki','2005-11-02','','2017-06-30',''),('PG.001','Endang Rochana, S.Pd','Karanganyar',NULL,'2',0,'Perempuan','1969-03-09','','2020-06-30','');

/*Table structure for table `asalbuku` */

DROP TABLE IF EXISTS `asalbuku`;

CREATE TABLE `asalbuku` (
  `idasal` varchar(1) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `asalbuku` */

insert  into `asalbuku`(`idasal`,`asal`) values ('A','Hadiah'),('B','Pembelian');

/*Table structure for table `bahasa` */

DROP TABLE IF EXISTS `bahasa`;

CREATE TABLE `bahasa` (
  `idbahasa` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idbahasa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bahasa` */

insert  into `bahasa`(`idbahasa`,`bahasa`) values (1,'Inggris'),(2,'Indonesia');

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `idbuku` varchar(10) NOT NULL,
  `idletak` varchar(10) DEFAULT NULL,
  `idklass` varchar(10) DEFAULT NULL,
  `idpeng` varchar(10) DEFAULT NULL,
  `peng1` varchar(20) DEFAULT NULL,
  `idpenerbit` varchar(10) DEFAULT NULL,
  `idjudul` varchar(10) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `penerjemah` varchar(50) DEFAULT NULL,
  `editor` varchar(30) DEFAULT NULL,
  `tim` varchar(30) DEFAULT NULL,
  `volume` varchar(30) DEFAULT NULL,
  `edisi` varchar(10) DEFAULT NULL,
  `cetakan` varchar(10) DEFAULT NULL,
  `kopike` varchar(10) DEFAULT NULL,
  `idjenis` varchar(10) DEFAULT NULL,
  `idbahasa` varchar(10) DEFAULT NULL,
  `idasal` varchar(10) DEFAULT NULL,
  `notasi` text,
  `idkota` varchar(10) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `harga` decimal(20,0) DEFAULT NULL,
  `pengadaan` date DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `accnumber` varchar(10) DEFAULT NULL,
  `tglinput` date DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idbuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buku` */

insert  into `buku`(`idbuku`,`idletak`,`idklass`,`idpeng`,`peng1`,`idpenerbit`,`idjudul`,`judul`,`penerjemah`,`editor`,`tim`,`volume`,`edisi`,`cetakan`,`kopike`,`idjenis`,`idbahasa`,`idasal`,`notasi`,`idkota`,`tahun`,`harga`,`pengadaan`,`kondisi`,`accnumber`,`tglinput`,`jumlah`,`ket`) values ('BI2','500.4','500','Sim','Simin, Karmo','PT003','B','Bina Bahasa Indonesia','','Tim Editor','Simin','','','2009','','','2','B','','5',2009,45000,'2017-01-09','1','BI2/B/2017','2017-08-07',5,'Dapat Dipinjam'),('IP2','400.14','400','Sut','Sutoyo','PT003','I','IPS Kelas 4','','Tim Editor','','','','','','14','2','B','','5',2009,45000,'2017-01-09','1','IP2/B/2017','2017-08-07',4,'Dapat Dipinjam'),('MT2','900.32','900','Tri','Tri Dayat','PT003','M','Matematika Kelas 2','','Roekhan','','','','1','1','','2','B','','5',2009,45000,'2017-01-09','1','MT2/B/2017','2017-08-06',5,'Dapat Dipinjam'),('MT3','900.1','900','Nur','Nurul Masitoch','PT003','M','Matematika Kelas 3','','Tim Editor','','','','','','1','2','B','','5',2009,45000,'2017-04-07','1','MT3/B/2017','2017-07-28',4,'Dapat Dipinjam'),('MT4','900.1','900','Mas','Mas Titing','PT003','A','Asyiknya Belajar Matematika','','Sherly Hanawati','','','','','','','2','B','','5',2009,45000,'2017-04-07','1','MT4/B/07','2017-08-07',5,'Dapat Dipinjam'),('PA5','900.2','900','Mun','Munawar Kholil','PT003','I','Ilmu Pengetahuan Alam Kelas 5','','Tim Editor','','','','','','2','2','B','','5',2009,50000,'2017-01-09','1','PA5/B/2017','2017-08-07',5,'Dapat Dipinjam'),('PK1','400.13','400','Ani','Anis Kusumawardani','PT003','P','Pendidikan Kewarganegaraan Kelas 1','','Tim Editor','','','','','','13','2','B','','',2009,45000,'2017-01-09','1','PK1/B/2017','2017-08-07',5,'Dapat Dipinjam');

/*Table structure for table `buku1` */

DROP TABLE IF EXISTS `buku1`;

CREATE TABLE `buku1` (
  `idbuku` varchar(10) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `idpengarang` varchar(10) DEFAULT NULL,
  `idrak` varchar(10) DEFAULT NULL,
  `idjenis` varchar(10) DEFAULT NULL,
  `bahasa` varchar(100) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `idpenerbit` varchar(10) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  PRIMARY KEY (`idbuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buku1` */

insert  into `buku1`(`idbuku`,`judul`,`idpengarang`,`idrak`,`idjenis`,`bahasa`,`asal`,`idpenerbit`,`kondisi`,`jumlah`) values ('BK001','Laskar Pelangi','P0001','1','JN001','Indonesia','Beli','PT001','Baru',2),('BK002','Laskar','P0001','4','JN001','Indonesia','Beli','PT001','Bekas',5);

/*Table structure for table `buku2` */

DROP TABLE IF EXISTS `buku2`;

CREATE TABLE `buku2` (
  `idbuku` int(11) NOT NULL AUTO_INCREMENT,
  `accnumber` varchar(10) DEFAULT NULL,
  `idletak` varchar(10) DEFAULT NULL,
  `asal` varchar(10) DEFAULT NULL,
  `idklass` varchar(10) DEFAULT NULL,
  `idpeng` varchar(10) DEFAULT NULL,
  `idjud` varchar(10) DEFAULT NULL,
  `idtahun` varchar(10) DEFAULT NULL,
  `letak` varchar(10) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `bahasa` varchar(255) DEFAULT NULL,
  `peng1` varchar(255) DEFAULT NULL,
  `peng2` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `judulasli` varchar(255) DEFAULT NULL,
  `kolasi` varchar(255) DEFAULT NULL,
  `notasi` text,
  `subjek` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `tglinput` date DEFAULT NULL,
  `inputby` varchar(255) DEFAULT NULL,
  `penerjemah` varchar(255) DEFAULT NULL,
  `editor` varchar(255) DEFAULT NULL,
  `anotasi` varchar(255) DEFAULT NULL,
  `tim` text,
  `edisi` text,
  `volume` text,
  `cetakan` text,
  `kopike` text,
  `hal` text,
  `il` text,
  `tinggibuku` text,
  `tanggalbeli` date DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kondisi` text,
  `dptdpjm` text,
  `harga` decimal(10,0) DEFAULT NULL,
  `cekilus` enum('Yes','No') DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `coverblk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idbuku`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `buku2` */

insert  into `buku2`(`idbuku`,`accnumber`,`idletak`,`asal`,`idklass`,`idpeng`,`idjud`,`idtahun`,`letak`,`jenis`,`bahasa`,`peng1`,`peng2`,`judul`,`judulasli`,`kolasi`,`notasi`,`subjek`,`penerbit`,`tahun`,`tglinput`,`inputby`,`penerjemah`,`editor`,`anotasi`,`tim`,`edisi`,`volume`,`cetakan`,`kopike`,`hal`,`il`,`tinggibuku`,`tanggalbeli`,`kota`,`kondisi`,`dptdpjm`,`harga`,`cekilus`,`cover`,`coverblk`) values (1,'1/B/2017','S','B','631','rob','K',NULL,'S','','2','robert',NULL,'Kancil',NULL,NULL,NULL,NULL,'PT001','2017','2017-03-02',NULL,'','','','','','','','',NULL,NULL,NULL,'2017-05-01','3','1',NULL,0,NULL,NULL,NULL),(2,'2/B/2002','S','B','100','Sus','M',NULL,'S','2','2','Susanto',NULL,'Matematika',NULL,NULL,NULL,NULL,'PT001','2002','2017-05-12',NULL,'Susanto','Susanto','iiiiiiiiiiiii','Susanto','2','2','20','20',NULL,NULL,NULL,'2002-02-26','2','1',NULL,60000,NULL,NULL,NULL),(3,'3/A/2017','C','A','001','Oks','M',NULL,'C','1','2','Oksa',NULL,'Matematika',NULL,NULL,NULL,NULL,'PT002','2002','2017-07-11',NULL,'Dea','Dea','yyyyy','Dea','1','1','1','1',NULL,NULL,NULL,'2017-07-09','5','1',NULL,30000,NULL,NULL,NULL);

/*Table structure for table `denda` */

DROP TABLE IF EXISTS `denda`;

CREATE TABLE `denda` (
  `id_denda` varchar(10) NOT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `denda` */

/*Table structure for table `jenisbuku` */

DROP TABLE IF EXISTS `jenisbuku`;

CREATE TABLE `jenisbuku` (
  `idjenis` int(10) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) DEFAULT NULL,
  `idklasifikasi` int(5) DEFAULT NULL,
  PRIMARY KEY (`idjenis`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `jenisbuku` */

insert  into `jenisbuku`(`idjenis`,`jenis`,`idklasifikasi`) values (1,'Matematika',900),(2,'IPA',900),(3,'IPS',800),(4,'Indonesia',500),(5,'Inggris',500),(6,'Jawa',500),(7,'Teknologi Baru\r\n',600),(8,'teknologi pengembangan',600),(9,'Teknologi tinggi',600),(10,'Karya Seni Rupa Murni',700),(11,'Karya Umum',100),(12,'Seni Rupa Terapan',700),(13,'PKn',400),(14,'Pengetahuan Sosial',400),(15,'Pengetahuan Sosial Geografi',400),(16,'Pengetahuan Sosial Sejarah',400),(17,'Pengetahuan sosial ekonomi',400),(20,'Agama samawi',300),(21,'Agama budaya',300),(22,'Spiritualisme',300),(23,'Materialisme',300),(32,'	Filsafat Barat',200),(33,'Filsafat Timur',200),(34,'Filsafat Islam',200),(35,'Filsafat Kristen',200);

/*Table structure for table `jenispeminjam` */

DROP TABLE IF EXISTS `jenispeminjam`;

CREATE TABLE `jenispeminjam` (
  `idpeminjam` int(5) NOT NULL,
  `jenispeminjam` varchar(255) DEFAULT NULL,
  `biaya` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idpeminjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenispeminjam` */

insert  into `jenispeminjam`(`idpeminjam`,`jenispeminjam`,`biaya`) values (1,'Siswa',500),(2,'Guru',1000);

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(30) DEFAULT NULL,
  `idpeminjam` int(5) DEFAULT NULL,
  PRIMARY KEY (`idkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`idkelas`,`kelas`,`idpeminjam`) values (1,'I (SATU)',1),(2,'II (DUA)',1),(3,'III (TIGA)',1),(4,'IV (EMPAT)',1),(5,'V (LIMA)',1),(6,'VI (ENAM)',NULL);

/*Table structure for table `klasifikasi` */

DROP TABLE IF EXISTS `klasifikasi`;

CREATE TABLE `klasifikasi` (
  `idklasifikasi` int(5) NOT NULL,
  `klasifikasi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idklasifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `klasifikasi` */

insert  into `klasifikasi`(`idklasifikasi`,`klasifikasi`) values (100,'Karya Umum'),(200,'Filsafat'),(300,'Agama'),(400,'Ilmu Sosial'),(500,'Bahasa'),(600,'Teknologi'),(700,'Kesenian'),(800,'Geografi dan Sejarah'),(900,'Ilmu Murni');

/*Table structure for table `kondisi` */

DROP TABLE IF EXISTS `kondisi`;

CREATE TABLE `kondisi` (
  `idkondisi` int(11) NOT NULL AUTO_INCREMENT,
  `kondisi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idkondisi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kondisi` */

insert  into `kondisi`(`idkondisi`,`kondisi`) values (1,'Baik'),(2,'Rusak'),(3,'Hilang');

/*Table structure for table `koran` */

DROP TABLE IF EXISTS `koran`;

CREATE TABLE `koran` (
  `idedisi` int(10) NOT NULL,
  `id` int(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `volume` int(10) DEFAULT NULL,
  `no` int(10) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `tahun` int(10) DEFAULT NULL,
  `kopike` int(10) DEFAULT NULL,
  `harga` decimal(30,0) DEFAULT NULL,
  `musim` varchar(255) DEFAULT NULL,
  `tglpengadaan` date DEFAULT NULL,
  PRIMARY KEY (`idedisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `koran` */

/*Table structure for table `kota` */

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `idkota` int(11) NOT NULL AUTO_INCREMENT,
  `kota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idkota`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kota` */

insert  into `kota`(`idkota`,`kota`) values (1,'Aceh'),(2,'Bandung'),(3,'Cirebon'),(4,'Yogyakarta'),(5,'Jakarta'),(6,'Solo'),(7,'Semarang');

/*Table structure for table `majalah` */

DROP TABLE IF EXISTS `majalah`;

CREATE TABLE `majalah` (
  `idmajalah` varchar(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `issn` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `idasal` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idmajalah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `majalah` */

insert  into `majalah`(`idmajalah`,`nama`,`penerbit`,`kota`,`issn`,`alamat`,`jenis`,`idasal`) values ('2','Derap Guru','Lontar Media Semarang','Semarang','1411-4658','Semarang','majalah','A');

/*Table structure for table `majalah_detail` */

DROP TABLE IF EXISTS `majalah_detail`;

CREATE TABLE `majalah_detail` (
  `idedisi` varchar(10) NOT NULL,
  `idmajalah` varchar(10) DEFAULT NULL,
  `volume` int(25) DEFAULT NULL,
  `bulan` varchar(30) DEFAULT NULL,
  `kopike` int(10) DEFAULT NULL,
  `musim` varchar(50) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `tglpengadaan` date DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idedisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `majalah_detail` */

insert  into `majalah_detail`(`idedisi`,`idmajalah`,`volume`,`bulan`,`kopike`,`musim`,`no`,`tahun`,`harga`,`tglpengadaan`,`cover`) values ('1','2',2,'2',2,'kemarau',1,2017,'2000','2017-05-01','3fd266e8c1cd2f0c07ea40f627e570bf_Koala.jpg');

/*Table structure for table `peminjam` */

DROP TABLE IF EXISTS `peminjam`;

CREATE TABLE `peminjam` (
  `id_pinjam` varchar(10) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `id_buku` varchar(10) DEFAULT NULL,
  `id_siswa` varchar(10) DEFAULT NULL,
  `tgl_hrskembali` varchar(50) DEFAULT NULL,
  `jumlah_pinjam` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjam` */

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `idpinjam` varchar(20) NOT NULL,
  `idanggota` varchar(10) DEFAULT NULL,
  `tglpinjam` date DEFAULT NULL,
  `totalpinjam` varchar(11) DEFAULT NULL,
  `tanggungan` int(1) DEFAULT NULL,
  `totaldenda` varchar(20) DEFAULT NULL,
  `historykey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idpinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman` */

insert  into `peminjaman`(`idpinjam`,`idanggota`,`tglpinjam`,`totalpinjam`,`tanggungan`,`totaldenda`,`historykey`) values ('20170501-1','P02.003','2017-05-01','1',1,'0','c21a2'),('20170505-2','P04.007','2017-05-05','1',1,'500','4c8b9'),('20170605-3','P05.010','2017-06-05','1',1,'0','9d66f'),('20170718-4','P02.001','2017-07-18','1',1,'0','b8689'),('20170724-5','P04.007','2017-07-24','1',NULL,NULL,'28e37'),('20170728-6','P02.003','2017-07-28','2',1,'1500','68f85'),('20170728-7','P03.004','2017-07-28','1',1,'1500','7cde5'),('20170807-8','P03.004','2017-08-07','2',2,'0','925bd');

/*Table structure for table `peminjaman_detail` */

DROP TABLE IF EXISTS `peminjaman_detail`;

CREATE TABLE `peminjaman_detail` (
  `idpinjamdetail` int(10) NOT NULL AUTO_INCREMENT,
  `idbuku` varchar(11) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `isperpanjang` enum('0','1') DEFAULT '0',
  `tglhrskembali` date DEFAULT NULL,
  `tgldikembalikan` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `historykey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idpinjamdetail`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman_detail` */

insert  into `peminjaman_detail`(`idpinjamdetail`,`idbuku`,`jml`,`isperpanjang`,`tglhrskembali`,`tgldikembalikan`,`denda`,`potongan`,`historykey`) values (233,'MT2',1,'0','2017-05-08','2017-05-08',0,0,'c21a2'),(234,'IP2',1,'0','2017-05-12','2017-05-13',500,0,'4c8b9'),(235,'PA5',1,'0','2017-06-12','2017-06-09',0,0,'9d66f'),(236,'MT2',1,'0','2017-07-25','2017-07-24',0,0,'b8689'),(237,'IP2',1,'1','2017-07-31',NULL,NULL,NULL,'28e37'),(238,'MT3',1,'0','2017-08-04',NULL,NULL,NULL,'68f85'),(239,'MT4',1,'0','2017-08-04','2017-08-07',1500,0,'68f85'),(240,'MT3',1,'0','2017-08-04','2017-08-07',1500,0,'7cde5'),(241,'IP2',1,'0','2017-08-14','2017-08-07',0,0,'925bd'),(242,'MT2',1,'0','2017-08-14','2017-08-07',0,0,'925bd');

/*Table structure for table `penerbit` */

DROP TABLE IF EXISTS `penerbit`;

CREATE TABLE `penerbit` (
  `idpenerbit` varchar(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpenerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penerbit` */

insert  into `penerbit`(`idpenerbit`,`nama`,`kota`,`tahun`) values ('PT001','Era Intermedia','Solo',2015),('PT002','Erlangga','Yogyakarta',2000),('PT003','Pusat Perbukuan','Jakarta',2009);

/*Table structure for table `pengarang` */

DROP TABLE IF EXISTS `pengarang`;

CREATE TABLE `pengarang` (
  `idpengarang` varchar(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idpengarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengarang` */

insert  into `pengarang`(`idpengarang`,`nama`) values ('P0001','Raditya Dika'),('P0002','Dewi Lestari');

/*Table structure for table `pengembalian` */

DROP TABLE IF EXISTS `pengembalian`;

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denda` double DEFAULT NULL,
  `kembali` date DEFAULT NULL,
  `totaldenda` double DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `idpinjam` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengembalian` */

/*Table structure for table `perpanjangan` */

DROP TABLE IF EXISTS `perpanjangan`;

CREATE TABLE `perpanjangan` (
  `idperpanjangan` int(11) NOT NULL AUTO_INCREMENT,
  `historykey` varchar(20) DEFAULT NULL,
  `tglperpanjang` date DEFAULT NULL,
  PRIMARY KEY (`idperpanjangan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `perpanjangan` */

insert  into `perpanjangan`(`idperpanjangan`,`historykey`,`tglperpanjang`) values (4,'a88b0',NULL),(5,'ace5a','2017-05-26'),(6,'6215a',NULL),(7,'7d027',NULL),(8,'9d2b4','2017-05-25'),(9,'5e505','2017-05-26'),(10,'804b5','2002-05-29');

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `petugas` */

/*Table structure for table `suratkabar` */

DROP TABLE IF EXISTS `suratkabar`;

CREATE TABLE `suratkabar` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `idpenerbit` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `ISSN` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `idjenis` varchar(255) DEFAULT NULL,
  `idasal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `suratkabar` */

insert  into `suratkabar`(`id`,`nama`,`idpenerbit`,`kota`,`ISSN`,`alamat`,`idjenis`,`idasal`) values (2,'','PT001','','','','2','B');

/*Table structure for table `tblhistorypembelian` */

DROP TABLE IF EXISTS `tblhistorypembelian`;

CREATE TABLE `tblhistorypembelian` (
  `tblhistorypembelian_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbllistbarang_id` int(11) DEFAULT NULL,
  `tblhistorypembelian_jumlah` varchar(255) DEFAULT NULL,
  `tblhistorypembelian_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tblhistorypembelian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblhistorypembelian` */

/*Table structure for table `tbllistbarang` */

DROP TABLE IF EXISTS `tbllistbarang`;

CREATE TABLE `tbllistbarang` (
  `tbllistbarang_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbllistbarang_kode` varchar(255) DEFAULT NULL,
  `tbllistbarang_nama` varchar(255) DEFAULT NULL,
  `tbllistbarang_harga` varchar(255) DEFAULT NULL,
  `tbllistbarang_stok` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tbllistbarang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbllistbarang` */

insert  into `tbllistbarang`(`tbllistbarang_id`,`tbllistbarang_kode`,`tbllistbarang_nama`,`tbllistbarang_harga`,`tbllistbarang_stok`) values (1,'AT1','Ballpoint','1500','10'),(2,'AT2','Ballpoint Gel','2000','10'),(3,'AT3','Pensil','1000','10'),(4,'AT4','Whiteboard Marker','5000','10'),(5,'AT5','Crayon','15000','10'),(6,'AT6','Pensil Warna','10000','10'),(7,'AT7','Kuas Lukis','3000','10'),(8,'AT8','Spidol','5000','10');

/*Table structure for table `tbltransaksi` */

DROP TABLE IF EXISTS `tbltransaksi`;

CREATE TABLE `tbltransaksi` (
  `tbltransaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbltransaksi_nomor` varchar(255) DEFAULT NULL,
  `tbltransaksi_tanggal` varchar(255) DEFAULT NULL,
  `tbltransaksi_keterangan` text,
  `tbltransaksi_total` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tbltransaksi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbltransaksi` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` enum('admin','operator') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`level`,`email`,`telp`) values (1,'admin','827ccb0eea8a706c4c34a16891f84e7b','admin','milafiolita@gmail.com','089625152086'),(2,'operator','202cb962ac59075b964b07152d234b70','operator','operator123@gmail.com','08123456789');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
