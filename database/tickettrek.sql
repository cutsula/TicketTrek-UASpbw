-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk tickettrek
CREATE DATABASE IF NOT EXISTS `tickettrek` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tickettrek`;

-- membuang struktur untuk table tickettrek.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `idpembayaran` int NOT NULL AUTO_INCREMENT,
  `idtransaksi` int NOT NULL DEFAULT '0',
  `nama` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tanggaltransfer` date NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel tickettrek.pembayaran: ~3 rows (lebih kurang)
INSERT INTO `pembayaran` (`idpembayaran`, `idtransaksi`, `nama`, `tanggaltransfer`, `tanggal`, `bukti`) VALUES
	(1, 4, 'Feby Saputra', '2024-05-23', '2024-05-23', '20240523040715ads59face09b8755.jpg'),
	(3, 6, 'Feby Saputra', '2024-05-24', '2024-05-24', '20240524063514WhatsApp Image 2024-05-22 at 21.50.13.jpeg');

-- membuang struktur untuk table tickettrek.pembelianwisata
CREATE TABLE IF NOT EXISTS `pembelianwisata` (
  `idpembelianwisata` int NOT NULL AUTO_INCREMENT,
  `idwisata` int NOT NULL DEFAULT '0',
  `idtransaksi` int NOT NULL DEFAULT '0',
  `judul` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `harga` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `subharga` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `jumlah` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpembelianwisata`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel tickettrek.pembelianwisata: ~3 rows (lebih kurang)
INSERT INTO `pembelianwisata` (`idpembelianwisata`, `idwisata`, `idtransaksi`, `judul`, `harga`, `subharga`, `jumlah`) VALUES
	(2, 4, 4, 'Pulau Kemaro', '25000', '25000', '1'),
	(4, 3, 6, 'Taman Bunga Celosia Spring Hill', '2000', '2000', '1');

-- membuang struktur untuk table tickettrek.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fotoprofil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel tickettrek.pengguna: ~0 rows (lebih kurang)
INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `fotoprofil`, `level`) VALUES
	(1, 'Fahrul Adib', 'fahruladib9@gmail.com', 'admin', '0810291', 'asddasd', 'asdasdaasd', 'Admin'),
	(2, 'Feby Saputra', 'feby@gmail.com', '1234', '082673828283', 'kenten laut', 'Untitled.png', 'Pelanggan');

-- membuang struktur untuk table tickettrek.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` int NOT NULL AUTO_INCREMENT,
  `notransaksi` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id` int DEFAULT NULL,
  `tanggalbeli` date DEFAULT NULL,
  `totalbeli` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statusbeli` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `bukti` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel tickettrek.transaksi: ~2 rows (lebih kurang)
INSERT INTO `transaksi` (`idtransaksi`, `notransaksi`, `id`, `tanggalbeli`, `totalbeli`, `alamat`, `statusbeli`, `waktu`, `bukti`) VALUES
	(4, '#TP20240523035132', 2, '2024-05-23', '25000', NULL, 'Di Terima, Silahkan Cetak Tiket', '2024-05-23 03:51:32', '20240523040715ads59face09b8755.jpg'),
	(6, '#TP20240524063447', 2, '2024-05-24', '2000', 'kenten laut', 'Di Terima, Silahkan Cetak Tiket', '2024-05-24 06:34:47', '20240524063514WhatsApp Image 2024-05-22 at 21.50.13.jpeg');

-- membuang struktur untuk table tickettrek.wisata
CREATE TABLE IF NOT EXISTS `wisata` (
  `idwisata` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `harga` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `foto` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`idwisata`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel tickettrek.wisata: ~4 rows (lebih kurang)
INSERT INTO `wisata` (`idwisata`, `judul`, `deskripsi`, `harga`, `lokasi`, `foto`, `created_at`, `updated_at`) VALUES
	(3, 'Taman Bunga Celosia Spring Hill', '<p>Taman Bunga Celosia Spring Hill termasuk tempat wisata di Palembang yang lagi hits belakangan ini. Lokasinya berada di Jalan Letjen TNI Dr. H. Ibnu Sutowo, Talang Klp., Kecamatan Alang-Alang Lebar, Kota Palembang.<br />\r\n<br />\r\nTaman ini buka dari 09:00-16:30 WIB, dengan biaya tiket masuk hanya Rp 10.000 dan tambahan tiket parkir sekitar Rp 2.000-3.000 ribu saja.<br />\r\nSalah satu bunga ikoniknya yaitu bunga celosia atau nama lainnya bunga jengger ayam (karena bentuknya menyerupai jengger ayam). Tempatnya yang indah, sangatlah cocok untuk dijadikan spot foto yang instagramable.</p>', '2000', 'Jalan Letjen TNI Dr. H. Ibnu Sutowo, Talang Klp., Kecamatan Alang-Alang Lebar, Kota Palembang', 'taman-bunga-celosia-spring-hill-palembang-profile1646287254.jpg', '2024-05-22', NULL),
	(4, 'Pulau Kemaro', '<p>Pulau Kemaro, merupakan sebuah&nbsp;<a href="https://id.wikipedia.org/wiki/Delta">Delta</a>&nbsp;kecil di&nbsp;<a href="https://id.wikipedia.org/wiki/Sungai_Musi">Sungai Musi</a>, terletak sekitar 6&nbsp;km dari&nbsp;<a href="https://id.wikipedia.org/wiki/Jembatan_Ampera">Jembatan Ampera</a>. Pulau Kemaro terletak di daerah&nbsp;<a href="https://id.wikipedia.org/wiki/Industri">industri</a>,yaitu di antara&nbsp;<em>Pabrik Pupuk Sriwijaya</em>&nbsp;dan&nbsp;<em>Pertamina Plaju</em>&nbsp;dan&nbsp;<a href="https://id.wikipedia.org/w/index.php?title=Sungai_Gerong&amp;action=edit&amp;redlink=1">Sungai Gerong</a>. Pulau kemaro berjarak sekitar 40&nbsp;km dari kota&nbsp;<a href="https://id.wikipedia.org/wiki/Palembang">Palembang</a>. Pulau Kemaro adalah tempat rekreasi yg terkenal di&nbsp;<a href="https://id.wikipedia.org/wiki/Sungai_Musi">Sungai Musi</a>. Di tempat ini terdapat sebuah&nbsp;<a href="https://id.wikipedia.org/wiki/Vihara">vihara</a>&nbsp;cina (<a href="https://id.wikipedia.org/wiki/Klenteng">klenteng</a>&nbsp;Hok Tjing Rio). Di Pulau Kemaro ini juga terdapat&nbsp;<a href="https://id.wikipedia.org/wiki/Kuil">kuil</a>&nbsp;<a href="https://id.wikipedia.org/wiki/Buddha">Buddha</a>&nbsp;yang sering dikunjungi umat&nbsp;<a href="https://id.wikipedia.org/wiki/Buddha">Buddha</a>&nbsp;untuk berdoa atau berziarah ke&nbsp;<a href="https://id.wikipedia.org/wiki/Makam">makam</a>. Di sana juga sering diadakan acara&nbsp;<a href="https://id.wikipedia.org/wiki/Cap_Go_Meh">Cap Go Meh</a>&nbsp;setiap Tahun Baru&nbsp;<a href="https://id.wikipedia.org/wiki/Imlek">Imlek</a>.</p>\r\n\r\n<p>Daya tarik Kemaro adalah&nbsp;<a href="https://id.wikipedia.org/wiki/Pagoda">Pagoda</a>&nbsp;berlantai 9 yang menjulang di tengah-tengah pulau. Bangunan ini baru dibangun tahun&nbsp;<a href="https://id.wikipedia.org/wiki/2006">2006</a>. Selain pagoda ada&nbsp;<a href="https://id.wikipedia.org/wiki/Klenteng">klenteng</a>&nbsp;yang sudah dulu ada. Klenteng Hok Tjing Rio atau lebih dikenal Klenteng Kuan Im dibangun sejak tahun&nbsp;<a href="https://id.wikipedia.org/wiki/1962">1962</a>. Di depan klenteng terdapat makam Tan Bun An (Pangeran) dan Siti Fatimah (Putri) yang berdampingan. Kisah cinta mereka berdualah yang menjadi legenda terbentuknya pulau ini.</p>\r\n\r\n<p>Pulau Kemaro dapat dicapai dengan menumpang taksi bandara langsung ke arah Jembatan Ampera dan menumpang perahu ke Pulau Kemaro.</p>', '25000', 'Pulau Kemaro, 1 Ilir, Kecamatan Ilir Timur II, Kota Palembang, Sumatera Selatan', 'S2CGg2vVEffJLL11NExweAScWAenhWvULgpKYiME.jpg', '2024-05-22', NULL),
	(5, 'Taman Kambang Iwak', '<p>Taman Kambang Iwak merupakan taman kota yang sudah ada sejak tahun 1900-an. Taman yang awalnya dibangun untuk orang keturunan Belanda sebagai tampat olahraga ini, memiliki danau di bagian tengahnya. Selain berfungsi sebagai penghias taman, danau buatan ini juga memiliki fungsi praktis sebagai tempat menampung luapan air hujan, sehingga mampu menangkal banjir.</p>\r\n\r\n<p>Di Palembang, Kambang Iwak merupakan tempat favorit bagi yang mau berolahraga pagi sembari rekreasi, tanpa harus mengeluarkan biaya alias gratis. Di sini ada jogging track, juga kolam dengan luas sekitar 750 meter. Tak hanya itu, ada juga tersedia fasilitas bersantai, termasuk arena bermain untuk remaja dan anak-anak.</p>\r\n\r\n<p>Taman Kambang Iwak dapat dicapai dengan menumpang taksi bandara langsung ke arah Taman Kambang Iwak.</p>', '5000', 'Jalan Tasik dan Jalan Sutomo, Kota Palembang', 's3gMJ2ny7xDITYTXYwXAOAnnOWHuTj1J9w1RBRFc.jpg', '2024-05-22', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
