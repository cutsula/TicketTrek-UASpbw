-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Jun 2024 pada 17.46
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tickettrek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_11_054859_create_kategori_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(500) NOT NULL DEFAULT '0',
  `tanggaltransfer` date NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idtransaksi`, `nama`, `tanggaltransfer`, `tanggal`, `bukti`) VALUES
(1, 4, 'Feby Saputra', '2024-05-23', '2024-05-23', '20240523040715ads59face09b8755.jpg'),
(3, 6, 'Feby Saputra', '2024-05-24', '2024-05-24', '20240524063514WhatsApp Image 2024-05-22 at 21.50.13.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelianwisata`
--

CREATE TABLE `pembelianwisata` (
  `idpembelianwisata` int(11) NOT NULL,
  `idwisata` int(11) NOT NULL DEFAULT 0,
  `idtransaksi` int(11) NOT NULL DEFAULT 0,
  `judul` varchar(500) NOT NULL DEFAULT '0',
  `harga` varchar(500) NOT NULL DEFAULT '0',
  `subharga` varchar(500) NOT NULL DEFAULT '0',
  `jumlah` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelianwisata`
--

INSERT INTO `pembelianwisata` (`idpembelianwisata`, `idwisata`, `idtransaksi`, `judul`, `harga`, `subharga`, `jumlah`) VALUES
(2, 4, 4, 'Pulau Kemaro', '25000', '25000', '1'),
(4, 3, 6, 'Taman Bunga Celosia Spring Hill', '2000', '2000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `telepon` text NOT NULL,
  `alamat` text NOT NULL,
  `fotoprofil` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `fotoprofil`, `level`) VALUES
(1, 'Admin', 'tickettrek_admin@gmail.com', 'admin', '085283758380', 'a', 'a', 'Admin'),
(2, 'Cut Sula Fhatia Rahma', 'cutsula@gmail.com', '1234', '081219497856', 'Lampineung', 'Untitled.png', 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `notransaksi` varchar(250) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `tanggalbeli` date DEFAULT NULL,
  `totalbeli` varchar(250) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `statusbeli` varchar(500) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `bukti` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `notransaksi`, `id`, `tanggalbeli`, `totalbeli`, `alamat`, `statusbeli`, `waktu`, `bukti`) VALUES
(4, '#TP20240523035132', 2, '2024-05-23', '25000', NULL, 'Di Terima, Silahkan Cetak Tiket', '2024-05-23 03:51:32', '20240523040715ads59face09b8755.jpg'),
(6, '#TP20240524063447', 2, '2024-05-24', '2000', 'kenten laut', 'Di Terima, Silahkan Cetak Tiket', '2024-05-24 06:34:47', '20240524063514WhatsApp Image 2024-05-22 at 21.50.13.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `idwisata` int(11) NOT NULL,
  `judul` varchar(250) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` varchar(250) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`idwisata`, `judul`, `deskripsi`, `harga`, `lokasi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Taman Bunga Celosia Spring Hill', '<p>Taman Bunga Celosia Spring Hill termasuk tempat wisata di Palembang yang lagi hits belakangan ini. Lokasinya berada di Jalan Letjen TNI Dr. H. Ibnu Sutowo, Talang Klp., Kecamatan Alang-Alang Lebar, Kota Palembang.<br />\r\n<br />\r\nTaman ini buka dari 09:00-16:30 WIB, dengan biaya tiket masuk hanya Rp 10.000 dan tambahan tiket parkir sekitar Rp 2.000-3.000 ribu saja.<br />\r\nSalah satu bunga ikoniknya yaitu bunga celosia atau nama lainnya bunga jengger ayam (karena bentuknya menyerupai jengger ayam). Tempatnya yang indah, sangatlah cocok untuk dijadikan spot foto yang instagramable.</p>', '2000', 'Jalan Letjen TNI Dr. H. Ibnu Sutowo, Talang Klp., Kecamatan Alang-Alang Lebar, Kota Palembang', 'taman-bunga-celosia-spring-hill-palembang-profile1646287254.jpg', '2024-05-22', NULL),
(4, 'Pulau Kemaro', '<p>Pulau Kemaro, merupakan sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Delta\">Delta</a>&nbsp;kecil di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sungai_Musi\">Sungai Musi</a>, terletak sekitar 6&nbsp;km dari&nbsp;<a href=\"https://id.wikipedia.org/wiki/Jembatan_Ampera\">Jembatan Ampera</a>. Pulau Kemaro terletak di daerah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Industri\">industri</a>,yaitu di antara&nbsp;<em>Pabrik Pupuk Sriwijaya</em>&nbsp;dan&nbsp;<em>Pertamina Plaju</em>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Sungai_Gerong&amp;action=edit&amp;redlink=1\">Sungai Gerong</a>. Pulau kemaro berjarak sekitar 40&nbsp;km dari kota&nbsp;<a href=\"https://id.wikipedia.org/wiki/Palembang\">Palembang</a>. Pulau Kemaro adalah tempat rekreasi yg terkenal di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sungai_Musi\">Sungai Musi</a>. Di tempat ini terdapat sebuah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Vihara\">vihara</a>&nbsp;cina (<a href=\"https://id.wikipedia.org/wiki/Klenteng\">klenteng</a>&nbsp;Hok Tjing Rio). Di Pulau Kemaro ini juga terdapat&nbsp;<a href=\"https://id.wikipedia.org/wiki/Kuil\">kuil</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Buddha\">Buddha</a>&nbsp;yang sering dikunjungi umat&nbsp;<a href=\"https://id.wikipedia.org/wiki/Buddha\">Buddha</a>&nbsp;untuk berdoa atau berziarah ke&nbsp;<a href=\"https://id.wikipedia.org/wiki/Makam\">makam</a>. Di sana juga sering diadakan acara&nbsp;<a href=\"https://id.wikipedia.org/wiki/Cap_Go_Meh\">Cap Go Meh</a>&nbsp;setiap Tahun Baru&nbsp;<a href=\"https://id.wikipedia.org/wiki/Imlek\">Imlek</a>.</p>\r\n\r\n<p>Daya tarik Kemaro adalah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Pagoda\">Pagoda</a>&nbsp;berlantai 9 yang menjulang di tengah-tengah pulau. Bangunan ini baru dibangun tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/2006\">2006</a>. Selain pagoda ada&nbsp;<a href=\"https://id.wikipedia.org/wiki/Klenteng\">klenteng</a>&nbsp;yang sudah dulu ada. Klenteng Hok Tjing Rio atau lebih dikenal Klenteng Kuan Im dibangun sejak tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1962\">1962</a>. Di depan klenteng terdapat makam Tan Bun An (Pangeran) dan Siti Fatimah (Putri) yang berdampingan. Kisah cinta mereka berdualah yang menjadi legenda terbentuknya pulau ini.</p>\r\n\r\n<p>Pulau Kemaro dapat dicapai dengan menumpang taksi bandara langsung ke arah Jembatan Ampera dan menumpang perahu ke Pulau Kemaro.</p>', '25000', 'Pulau Kemaro, 1 Ilir, Kecamatan Ilir Timur II, Kota Palembang, Sumatera Selatan', 'S2CGg2vVEffJLL11NExweAScWAenhWvULgpKYiME.jpg', '2024-05-22', NULL),
(5, 'Taman Kambang Iwak', '<p>Taman Kambang Iwak merupakan taman kota yang sudah ada sejak tahun 1900-an. Taman yang awalnya dibangun untuk orang keturunan Belanda sebagai tampat olahraga ini, memiliki danau di bagian tengahnya. Selain berfungsi sebagai penghias taman, danau buatan ini juga memiliki fungsi praktis sebagai tempat menampung luapan air hujan, sehingga mampu menangkal banjir.</p>\r\n\r\n<p>Di Palembang, Kambang Iwak merupakan tempat favorit bagi yang mau berolahraga pagi sembari rekreasi, tanpa harus mengeluarkan biaya alias gratis. Di sini ada jogging track, juga kolam dengan luas sekitar 750 meter. Tak hanya itu, ada juga tersedia fasilitas bersantai, termasuk arena bermain untuk remaja dan anak-anak.</p>\r\n\r\n<p>Taman Kambang Iwak dapat dicapai dengan menumpang taksi bandara langsung ke arah Taman Kambang Iwak.</p>', '5000', 'Jalan Tasik dan Jalan Sutomo, Kota Palembang', 's3gMJ2ny7xDITYTXYwXAOAnnOWHuTj1J9w1RBRFc.jpg', '2024-05-22', NULL),
(8, 'Museum Tsunami', '<p>Museum Tsunami ini menyimpan sekitar 6.038 koleksi. Koleksi tersebut dibagi ke dalam beberapa jenis, yaitu koleksi etnografika, arkelogika, biologika, teknologika, keramonologika, seni rupa, numismatika dan heraldika, geologika, filologika, serta historika dan ruang audio visual.&amp;nbsp;Koleksi ini tidak dipamerkan secara serentak, ada beberapa yang nantinya diadakan dalam pameran temporer, jadi bagi pengunjung juga dapat menyaksikan semuanya secara bersamaan. Pengelola museum merotasi koleksi setiap enam bulan sekali. Dalam satu pameran, terdapat sekitar 1.300 koleksi yang tersebar di tiga titik, yaitu rumah Aceh, pameran temporer, dan ruang pameran tetap.</p>\r\n\r\n<p>Ketika memasuki ruangan museum, kalian akan melewati sebuah lorong kecil dengan pencahayaan minim. Lorong ini membuat emosi pengunjung campur aduk. Setelah itu ada ruang bernama&amp;nbsp;&lt;em&gt;The Light of God&lt;/em&gt;&amp;nbsp;yang terdapat ratusan ribu nama korban dari bencana Tsunami Aceh</p>', '5000', 'Jl. Sultan Iskandar Muda No.3, Sukaramai, Kec. Baiturrahman, Kota Banda Aceh, Aceh', 'iVpdhUCXc2rMCIJYgNrIsE1b1aI1NYXu94lx2Xi8.jpg', '2024-06-06', NULL),
(9, 'Masjid Raya Baiturrahman', '<p>Mesjid Raya Baiturrahman adalah sebuah masjid yang terletak di pusat Kota Banda Aceh, Provinsi Aceh, Indonesia. Masjid ini merupakan salah satu ikon dari Kota Banda Aceh dan memiliki sejarah yang kaya. Dibangun pada abad ke-19 oleh Sultan Iskandar Muda, masjid ini merupakan salah satu contoh arsitektur klasik Aceh yang indah. Masjid Raya Baiturrahman juga memiliki makam Sultan Iskandar Muda di dalam kompleksnya, menjadikannya tempat ziarah yang penting bagi masyarakat Aceh. Selain sebagai tempat ibadah, masjid ini juga menjadi pusat kegiatan keagamaan dan sosial masyarakat Aceh</p>\r\n\r\n<p>Masjid Raya Baiturrahman tidak mengenakan biaya tiket masuk dan terbuka untuk umum. Pengunjung hanya perlu membayar biaya parkir sekitar 2000 - 3000</p>', '0', 'Jl. Moh. Jam No.1, Kp. Baru, Kec. Baiturrahman, Kota Banda Aceh, Aceh', '8GFb3c8xZk4L8bIlApM9zHrUouAG9sagVQmvbEEO.jpg', '2024-06-06', NULL),
(10, 'Pantai Lampuuk', '<p>Pantai Lampuuk adalah salah satu pantai yang terletak di Provinsi Aceh, Indonesia. Pantai ini terkenal dengan keindahan pasir putihnya dan ombak yang cocok untuk berselancar. Selain itu, Pantai Lampuuk juga menawarkan pemandangan matahari terbenam yang memukau. Di sekitar Pantai Lampuuk terdapat beberapa restoran seafood yang menyajikan hidangan laut segar. Restoran-restoran ini menawarkan berbagai menu seafood yang lezat, seperti ikan bakar, kepiting saus tiram, udang goreng, dan masih banyak lagi. Pengunjung dapat menikmati hidangan laut sambil menikmati pemandangan pantai yang indah. Pantai ini terbuka untuk umum dengan biaya masuk sekitar 3000 rupiah per orang. Biaya masuk ini biasanya digunakan untuk pemeliharaan dan pengembangan pantai serta fasilitas yang ada di sekitarnya. Dengan biaya masuk yang terjangkau, Pantai Lampuuk menjadi salah satu destinasi wisata yang populer di Aceh</p>', '3000', 'Meunasah Lambaro, Kec. Lhoknga, Kabupaten Aceh Besar, Aceh', '4V8LCeeI9CZrxv5h2MZd68Vi6dnvWKBWto1LTIaG.jpg', '2024-06-06', NULL),
(11, 'Museum Aceh', '<p>Museum Aceh adalah museum yang terletak di Banda Aceh, Provinsi Aceh, Indonesia. Didirikan pada masa pemerintahan Hindia Belanda, museum ini diresmikan pada tanggal 31 Juli 1915 oleh Jenderal H.N.A. Swart, yang saat itu menjabat sebagai Gubernur Sipil dan Militer Belanda di Aceh.</p>\r\n\r\n<p>Bangunan Museum Aceh awalnya adalah sebuah rumah tradisional Aceh (Rumoh Aceh). Bangunan ini berasal dari Paviliun Aceh yang sebelumnya dipamerkan di arena Pameran Kolonial di Semarang pada tanggal 13 Agustus - 15 November 1914. Sejak didirikan, Museum Aceh telah menjadi tempat penyimpanan dan pameran berbagai koleksi sejarah, budaya, dan kearifan lokal Aceh. Museum ini menjadi saksi bisu perjalanan sejarah panjang Aceh, mulai dari masa prasejarah hingga masa keemasan Kesultanan Aceh Darussalam dan masa kolonial Belanda.</p>', '3000', 'Jl. Sultan Mahmudsyah No.10, Peuniti, Kec. Baiturrahman, Kota Banda Aceh, Aceh', 'LXIHUE6EcuEQOfKa91jfCMA4B5EVwFSpI1WvhtvW.png', '2024-06-06', NULL),
(12, 'Mataie Hillside Adventure & Water Park', '<p>The Hillside adalah tempat wisata yang buka setiap hari dari jam 08.00 hingga 18.00.&amp;nbsp;Tempat ini menawarkan pemandangan yang indah dan suasana yang menyenangkan bagi pengunjung yang ingin bersantai dan menikmati waktu di waterpark.&amp;nbsp;Di The Hillside, pengunjung dapat menikmati berbagai permainan seru seperti ATV, flying fox, dan seluncur. ATV adalah kendaraan off-road yang cocok untuk menjelajahi area sekitar The Hillside dengan sensasi petualangan yang menyenangkan. Flying fox merupakan wahana terbang melintasi ketinggian dengan menggunakan tali dan helm pengaman, memberikan pengalaman yang mengasyikkan dan menegangkan. Seluncur air juga merupakan salah satu atraksi yang menyenangkan, terutama untuk menghindari teriknya sinar matahari sambil menikmati sensasi kesegaran air. Dengan berbagai pilihan permainan seru ini, pengunjung dapat merasakan sensasi petualangan yang tak terlupakan di The Hillside.</p>\r\n\r\n<p>Harga tiket masuknya adalah 15.000 rupiah untuk hari biasa dan 20.000 rupiah untuk akhir pekan</p>', '20000', 'l. Mataie - keude Bieng Km 1,8, Lambaro Kueh, Lhoknga, Aceh Besar Regency, Aceh', 'feRr5Zzh6jykvZwkk5eILMMFBaQyrtluUpl4IJ4l.png', '2024-06-06', NULL),
(13, 'Snorkling Pulau Rubia Sabang', '<p>Nikmati keindahan bawah laut Pulau Rubiah, Sabang, dengan paket snorkeling yang menarik. Paket ini menyediakan alat snorkeling lengkap dan pemandu profesional yang siap membantu Anda menjelajahi keindahan terumbu karang dan keanekaragaman hayati laut yang menakjubkan. Pulau Rubiah dikenal sebagai salah satu destinasi snorkeling terbaik di Indonesia dengan air yang jernih dan terumbu karang yang masih alami. Jangan lewatkan kesempatan untuk berenang di antara ikan-ikan warna-warni dan melihat kehidupan laut yang luar biasa. Paket snorkeling ini tersedia setiap hari dengan harga yang terjangkau.</p>', '200000', 'Pulau Rubiah, Sabang, Aceh', 'HHjBPaYDebqQftWOgVHAYeu0ZqFLena8ZI8WTj7w.png', '2024-06-06', NULL),
(14, 'Diving Sabang', '<p>Diving di Sabang menawarkan pengalaman yang luar biasa bagi para pecinta laut dan penyelam. Terletak di ujung barat Pulau Weh, Sabang menawarkan beberapa situs penyelaman terbaik di Indonesia dengan visibilitas air yang luar biasa, kehidupan laut yang kaya, dan terumbu karang yang indah.</p>\r\n\r\n<p>Salah satu situs yang terkenal adalah Batee Tokong, yang menawarkan dinding terumbu karang yang curam dan penuh warna serta kemungkinan melihat hiu, penyu, dan ikan pelagis lainnya. Pantai Gapang juga populer di kalangan penyelam karena terumbu karangnya yang indah dan beragam.</p>\r\n\r\n<p>Selain itu, Anda juga dapat menjelajahi wrack diving di Kota Sabang, di mana kapal-kapal karam menawarkan pengalaman penyelaman yang menarik. Pulau Rubiah juga terkenal dengan terumbu karangnya yang indah dan beragam kehidupan laut.</p>', '500000', 'Pulau Rubiah, Sabang, Aceh', 'Fc93Z3qLb0kCzA5XhqTNbdhg43AqvS4FFE4LTyRD.png', '2024-06-06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indeks untuk tabel `pembelianwisata`
--
ALTER TABLE `pembelianwisata`
  ADD PRIMARY KEY (`idpembelianwisata`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`idwisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelianwisata`
--
ALTER TABLE `pembelianwisata`
  MODIFY `idpembelianwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `idwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
