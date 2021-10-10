-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2021 at 09:55 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17737508_web_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idBerita` char(5) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`idBerita`, `judul`, `kategori`, `gambar`, `penulis`, `tanggal`, `konten`) VALUES
('B0001', 'Resep Cilok Kanji Tanpa Daging Pakai Bumbu Kacang, Empuk dan Tidak Alot', 'Food', NULL, 'Yuharrani Aisyah', '2021-09-25', '<p><strong>KOMPAS.com</strong> - Cilok adalah kepanjangan aci dicolok tentunya dengan bahan utama aci atau tapioka yang disebut juga tepung kanji. Biasanya disajikan bersama bumbu kacang.</p>\r\n  <p>Penjual cilok biasanya ada yang menjajakan cilok daging dan cilok kanji tanpa daging.</p>\r\n  <p>Kamu dapat membuat sendiri cilok kanji yang ekonomis mengikuti resep dari Sobat Cookpad Nanik Cahyani Hernowo @dapurmamagembul berikut ini.</p>\r\n  <h2>Resep cilok kanji tanpa daging</h2>\r\n  <h3>Bahan biang</h3>\r\n  <ul>\r\n    <li>150 gram tepung terigu</li>\r\n    <li>300 ml air</li>\r\n    <li>2 siung bawang putih, haluskan</li>\r\n    <li>1/2 sdt garam</li>\r\n    <li>1/4 sdt kaldu bubuk</li>\r\n    <li>1/2 sdt ketumbar bubuk</li>\r\n    <li>1/4 sdt lada bubuk</li>\r\n    <li>Gula sejumput</li>\r\n  </ul>\r\n  <h3>Bahan kering</h3>\r\n  <ul>\r\n    <li>150-200 gram tepung kanji</li>\r\n    <li>2 batang daun bawang, cincang</li>\r\n  </ul>\r\n  <h3>Bahan bumbu kacang</h3>\r\n  <ul>\r\n    <li>100 gram kacang tanah goreng</li>\r\n    <li>3 buah cabai merah</li>\r\n    <li>4 siung bawang merah</li>\r\n    <li>4 siung bawang putih</li>\r\n    <li>2 lembar daun jeruk</li>\r\n    <li>2 sdm gula merah sisir</li>\r\n    <li>2 sdm kecap manis</li>\r\n    <li>Garam, gula pasir, dan kaldu bubuk jamur secukupnya</li>\r\n    <li>Air secukupnya</li>\r\n  </ul>\r\n  <h2>Cara membuat cilok kanji tanpa daging</h2>\r\n  <ol>\r\n    <li><strong>Biang</strong>: campur semua bahan biang di wajan antilengket, aduk rata.</li>\r\n    <li>Masak biang dengan api kecil sambil terus diaduk sampai adonan padat. Angkat dan dinginkan.</li>\r\n    <li>Tambahkan daun bawang, aduk menggunakan tangan. Tuang tepung kanji secara bertahap sampai adonan kalis atau tidak lengket di tangan.</li>\r\n    <li>Bentuk adonan menjadi bulat sesuai selera sampai semua adonan habis.</li>\r\n    <li>Rebus cilok di dalam air mendidih plus sedikit minyak goreng agar tidak menempel. Masak sampai mengapung. Angkat dan tiriskan.</li>\r\n    <li><strong>Bumbu kacang</strong>: goreng semua bawang dan cabai merah sampai layu. Blender kacang tanah goreng dengan bumbu dan air secukupnya. Masak di wajan.</li>\r\n    <li>Tambahkan gula merah, gula pasir, garam, dan daun jeruk. Aduk rata. Koreksi rasa. Masak sampai bumbu meletup-letup. Tambahkan sedikit kecap. Aduk.</li>\r\n    <li>Sajikan cilok kanji dengan bumbu kacang.</li>\r\n  </ol>'),
('B0002', '5 Hal yang Perlu Diperhatikan Saat Meletakkan Lucky Bamboo di Rumah', 'Lifestyle', '1633851054_60af92b599cf5.jpg', 'Aniza Pratiwi', '2021-10-10', 'JAKARTA, KOMPAS.com - Tanaman lucky bamboo atau bambu hoki adalah salah satu tanaman feng shui yang populer dan kuat. Lucky bamboo merupakan simbol keberuntungan, kesehatan yang baik, dan kemakmuran. Selain itu, tanaman ini dapat menarik dan meningkatkan aliran energi positif ke seluruh rumah atau ruang kerja. Tanaman lucky bamboo juga dapat mengaktifkan kembali energi stagnan dalam ruangan untuk memastikan Chi mengalir bebas ke seluruh ruangan di rumah.  Namun, meletakkan tanaman lucky bamboo tak boleh sembarangan agar dapat memperoleh energi positif tersebut. Melansir dari Love to Know, Minggu (10/10/2021), berikut ini hal yang perlu diperhatikan saat meletakkan tanaman lucky bamboo di dalam rumah agar memperoleh keberuntungan. '),
('B0003', 'Piala Thomas 2020 - Libas Aljazair, Indonesia Kian \'Pede\' Tantang Thailand', 'Sports', '1633852028_6161f32b91f4c.jpg', 'Farahdilla Puspa', '2021-10-10', 'KOMPAS.com - Kemenangan atas Aljazair menjadi modal berharga bagi Indonesia menjelang lawan Thailand di Piala Thomas 2020. Indonesia sudah menyelesaikan laga perdana Grup A Piala Thomas 2020 melawan Aljazair, Sabtu (9/10/2021) atau Minggu (10/10/2021) dini hari WIB. Hasilnya, Indonesia menyapu bersih kemenangan 5-0 atas Aljazair. Jonatan Christie yang dimainkan pada partai pertama membuka keunggulan Indonesia usai menang 21-8 dan 21-8 atas Youcef Sabri Medel. Indonesia lalu menggandakan keunggulan berkat kemenangan Shesar Hiren Rhustavito atas Mohamed Abderrahime Belarbi. Seperti Jonatan, Shesar menang dua gim langsung dengan skor 21-6 dan 21-12. Chico Aura Dwi Wardoyo memastikan kemenangan 3-0 Indonesia usai mengalahkan Adel Hamek 21-11 dan 21-6. Pasangan ganda putra Mohammad Ahsan/Hendra Setiawan dan Leo Rolly Carnando/Daniel Martin kemudian menyempurnakan kemenangan Indonesia.'),
('B0005', 'Bandara Bali Lakukan Simulasi Kedatangan Turis Asing, Siap Sambut Penerbangan Internasional', 'Travel', '1633856698_615c1e1512f64.jpeg', 'Nabila Ramadhian', '2021-10-10', 'KOMPAS.com – Bandara I Gusti Ngurah Rai Bali melakukan simulasi kedatangan wisatawan mancanegara (wisman) menjelang penerimaan kembali penerbangan internasional mulai Kamis (14/10/2021). General Manager PT Angkasa Pura I (Persero) Bandara I Gusti Ngurah Rai, Herry A.Y. Sikado, mengatakan bahwa simulasi ini sejalan dengan rencana pemerintah terkait kedatangan wisman, melansir keterangan pers yang diterima, Minggu (10/10/2021). Baca juga: Bali Sambut Kembali Turis Asing Mulai 14 Oktober 2021 “Sesuai dengan rencana pemerintah untuk membuka penerbangan internasional di Bandara Internasional I Gusti Ngurah Rai, kami menyambut antusias hal tersebut. Salah satunya dengan melakukan simulasi proses kedatangan penumpang,” jelas dia. Simulasi alur kedatangan tersebut dilakukan bersama sejumlah stakeholder terkait. Usai simulasi, evaluasi akan dilakukan secara bersama.  Artikel ini telah tayang di Kompas.com dengan judul \"Bandara Bali Lakukan Simulasi Kedatangan Turis Asing, Siap Sambut Penerbangan Internasional\", Klik untuk baca: https://travel.kompas.com/read/2021/10/10/112507027/bandara-bali-lakukan-simulasi-kedatangan-turis-asing-siap-sambut-penerbangan. Penulis : Nabilla Ramadhian Editor : Anggara Wikan Prasetya  Download aplikasi Kompas.com untuk akses berita lebih mudah dan cepat: Android: https://bit.ly/3g85pkA iOS: https://apple.co/3hXWJ0L. '),
('B0007', 'Dituding Korupsi, Kanselir Austria Sebastian Kurz Mengundurkan Diri', 'Politik', '1633857519_news korupsi.jpg', 'Ardi Priyatno Utomo', '2021-10-10', 'WINA, KOMPAS.com - Kanselir Austria Sebastian Kurz mengumumkan pengunduran diri setelah namanya masuk ke dalam skandal korupsi. Diwartakan BBC Sabtu (9/10/2021), Kurz sudah menawarkan Menteri Luar Negeri Alexander Schallenberg sebagai penggantinya. Kurz dan sembilan orang lainnya dalam penyelidikan dugaan rasuah dari partainya, konservatif Partai Rakyat OVP. Baca juga: Kanselir Austria Tolak Pengungsi Afghanistan Selama Saya Berkuasa Dia membantah tudingan sudah menggunakan dana pemerintah untuk memastikan mendapatkan citra positif di media massa. Tuduhan korupsi yang terjadi pada pekan ini itu tak pelak membuat koalisi pemerintahan Kurz berada di ujung tanduk. Mitra juniornya, Partai Hijau, menuding Sebastian Kurz sudah tidak layak menjabat sebagai Kanselir Austria. Dapatkan informasi, inspirasi dan insight di email kamu. Daftarkan email Karena itu, Partai Hijau kemudian mengajak berunding oposisi, yang berencana mengajukan mosi tidak percaya pekan depan. ');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idBerita` char(5) NOT NULL,
  `idKomentar` char(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` varchar(255) NOT NULL,
  `suka` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idBerita`, `idKomentar`, `username`, `tanggal`, `isi`, `suka`) VALUES
('B0001', 'K0001', 'admin', '2021-10-08', 'test komentar admin', 7),
('B0001', 'K0002', 'user', '2021-10-09', 'test komentar user', 9),
('B0001', 'K0003', 'admin', '2021-10-10', 'hebat', 0),
('B0001', 'K0004', 'hulkthor', '2021-10-10', 'ini komen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `tanggalLahir` date NOT NULL,
  `jenisKelamin` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `pass`, `salt`, `foto`, `firstName`, `lastName`, `tanggalLahir`, `jenisKelamin`) VALUES
('admin', 'admin@admin.com', '3b41bf6b2d28163ee961d24d88c12bb5', 'admin', NULL, 'my', 'admin', '2021-09-25', 'Male'),
('hulkthor', 'hulkthor@student.com', 'af943333cc80dbffe2519b122b6749d3', 'user', '10.jpg', 'Hulk', 'Thor', '2021-10-21', 'Male'),
('test', 'test@student.com', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'user', '1633792208_wallpaper4.jpg', 'test', NULL, '2021-10-20', 'Male'),
('user', 'user@user.com', '2ed0b6915dd624f8a66a9a1d1261bd14', 'user', '1633340506_28.jpg', 'my', 'admin', '2020-02-29', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idBerita`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idBerita`,`idKomentar`),
  ADD KEY `username` (`username`),
  ADD KEY `idBerita` (`idBerita`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idBerita`) REFERENCES `berita` (`idBerita`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
