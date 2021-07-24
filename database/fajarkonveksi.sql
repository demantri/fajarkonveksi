-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2021 pada 22.14
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fajarkonveksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `groupsoal`
--

CREATE TABLE `groupsoal` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groupsoal`
--

INSERT INTO `groupsoal` (`groupid`, `groupname`) VALUES
(1, 'Kuisioner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabansubsoal`
--

CREATE TABLE `jawabansubsoal` (
  `jawabansubid` int(11) NOT NULL,
  `subsoalid` int(11) DEFAULT NULL,
  `namajawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawabansubsoal`
--

INSERT INTO `jawabansubsoal` (`jawabansubid`, `subsoalid`, `namajawaban`) VALUES
(28, 15, 'Rumah Sakit'),
(29, 15, 'Bidan'),
(30, 15, 'Dukun'),
(31, 15, 'Rumah Sendir'),
(32, 15, 'Puskesmas / Posyandu'),
(33, 16, 'Dokter'),
(34, 16, 'Bidan'),
(35, 16, 'Dukun'),
(36, 16, 'Sendiri/Keluarga'),
(37, 17, 'Pernah'),
(38, 17, 'Tidak'),
(39, 18, 'Ya'),
(40, 18, 'Tidak'),
(41, 19, 'Ya'),
(42, 19, 'Tidak'),
(43, 20, 'Rumah Sakit'),
(44, 20, 'Bidan'),
(45, 20, 'Dukun'),
(46, 20, 'Rumah Sendiri'),
(47, 20, 'Puskesmas '),
(48, 21, 'Puas'),
(49, 21, 'Cukup'),
(50, 21, 'Tidak Puas'),
(52, 22, 'Ya'),
(53, 22, 'Tidak'),
(54, 23, 'Ya'),
(55, 23, 'Tidak'),
(56, 24, 'Sesuai'),
(57, 24, 'Tidak Sesuai'),
(61, 25, 'Puas'),
(62, 25, 'Tidak'),
(63, 26, 'Kain Songket'),
(64, 26, 'Kain Tenun'),
(65, 26, 'Kain Batik'),
(66, 26, 'Kain Jumputan'),
(67, 27, 'Polos (Putih)'),
(68, 27, 'Hitam'),
(69, 27, 'Cokelat'),
(70, 27, 'Kuning'),
(71, 27, 'Emas'),
(72, 27, 'Merah'),
(73, 29, 'Kuning'),
(74, 29, 'Emas'),
(75, 29, 'Merah'),
(76, 30, 'Sumur'),
(77, 30, 'PDAM'),
(78, 30, 'Sungai'),
(79, 30, 'Lainnya'),
(80, 31, 'TIdak berasa, tidak berbau, tidak bewarna (jernih)'),
(81, 31, 'Tidak berasa, tidak berbau dan atau keruh'),
(82, 31, 'Lainnya'),
(83, 32, 'Terbuka'),
(84, 32, 'Tertutup'),
(85, 33, 'Tanah'),
(86, 33, 'Semen'),
(87, 33, 'Ubin / keramik'),
(88, 33, 'Lainnya'),
(89, 34, 'Ya'),
(90, 34, 'Tidak'),
(91, 35, 'Ya'),
(92, 35, 'Tidak'),
(93, 36, 'Ya'),
(94, 36, 'Tidak'),
(95, 37, 'Ya'),
(96, 37, 'Tidak'),
(97, 38, 'Ya'),
(98, 38, 'Tidak'),
(99, 39, 'Ya'),
(100, 39, 'Tidak'),
(101, 40, 'Ya'),
(102, 40, 'Tidak'),
(103, 41, 'Ya'),
(104, 41, 'Tidak'),
(105, 42, 'Ya'),
(106, 42, 'Tidak'),
(107, 43, 'Ya'),
(108, 43, 'Tidak'),
(109, 44, 'Ya'),
(110, 44, 'Tidak'),
(111, 45, 'Ya'),
(112, 45, 'Tidak'),
(113, 46, 'Ya'),
(114, 46, 'Tidak'),
(115, 47, 'Ya'),
(116, 47, 'Tidak'),
(117, 48, 'Ya'),
(118, 48, 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subsoal`
--

CREATE TABLE `subsoal` (
  `subid` int(11) NOT NULL,
  `grupid` int(11) NOT NULL,
  `subnama` text DEFAULT NULL,
  `subcreatedat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subsoal`
--

INSERT INTO `subsoal` (`subid`, `grupid`, `subnama`, `subcreatedat`) VALUES
(21, 1, 'Apakah Anda Puas Produk Kami ?', '2020-04-27 16:40:15'),
(22, 1, 'Apakah Website Ini Mudah Di Mengerti ?', '2020-04-27 16:43:38'),
(23, 1, 'Apakah Produk Sesuai Dengan Gambar ?', '2020-04-27 16:44:21'),
(24, 1, 'Apakah Kualitas Produk Kami Sesuai Dengan Harga ?', '2020-04-27 16:48:30'),
(25, 1, 'Apakah Pelayanan Kami Memuaskan Anda ?', '2020-04-27 16:49:02'),
(26, 1, 'Jenis Kain Apa Yang Menarik Anda ?', '2020-04-27 16:51:54'),
(27, 1, 'Warna Kain Apa Yang Anda Sukai ?', '2020-04-27 19:16:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nama_pensurvey` varchar(255) DEFAULT NULL,
  `id_subsoal` int(11) DEFAULT NULL,
  `namajawaban` text DEFAULT NULL,
  `saran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `survey`
--

INSERT INTO `survey` (`id_survey`, `nik`, `nama_pensurvey`, `id_subsoal`, `namajawaban`, `saran`) VALUES
(434, NULL, NULL, 21, 'Puas', 'Warna Kainnya Diperbanyak lagi'),
(435, NULL, NULL, 22, 'Ya', 'Warna Kainnya Diperbanyak lagi'),
(436, NULL, NULL, 23, 'Ya', 'Warna Kainnya Diperbanyak lagi'),
(437, NULL, NULL, 24, 'Sesuai', 'Warna Kainnya Diperbanyak lagi'),
(438, NULL, NULL, 25, 'Puas', 'Warna Kainnya Diperbanyak lagi'),
(439, NULL, NULL, 26, 'Kain Tenun', 'Warna Kainnya Diperbanyak lagi'),
(440, NULL, NULL, 27, 'Polos (Putih)', 'Warna Kainnya Diperbanyak lagi'),
(441, NULL, NULL, 21, 'Cukup', 'Mohon diperbanyak lagi produknya'),
(442, NULL, NULL, 22, 'Tidak', 'Mohon diperbanyak lagi produknya'),
(443, NULL, NULL, 23, 'Tidak', 'Mohon diperbanyak lagi produknya'),
(444, NULL, NULL, 24, 'Tidak Sesuai', 'Mohon diperbanyak lagi produknya'),
(445, NULL, NULL, 25, 'Tidak', 'Mohon diperbanyak lagi produknya'),
(446, NULL, NULL, 26, 'Kain Batik', 'Mohon diperbanyak lagi produknya'),
(447, NULL, NULL, 27, 'Kuning', 'Mohon diperbanyak lagi produknya'),
(448, NULL, NULL, 21, 'Tidak Puas', 'Sudah kerennn'),
(449, NULL, NULL, 22, 'Ya', 'Sudah kerennn'),
(450, NULL, NULL, 23, 'Ya', 'Sudah kerennn'),
(451, NULL, NULL, 24, 'Sesuai', 'Sudah kerennn'),
(452, NULL, NULL, 25, 'Puas', 'Sudah kerennn'),
(453, NULL, NULL, 26, 'Kain Songket', 'Sudah kerennn'),
(454, NULL, NULL, 27, 'Emas', 'Sudah kerennn'),
(455, NULL, NULL, 21, 'Puas', 'Warna kainnya min banyakin lagi biar banyak varian'),
(456, NULL, NULL, 22, 'Ya', 'Warna kainnya min banyakin lagi biar banyak varian'),
(457, NULL, NULL, 23, 'Ya', 'Warna kainnya min banyakin lagi biar banyak varian'),
(458, NULL, NULL, 24, 'Sesuai', 'Warna kainnya min banyakin lagi biar banyak varian'),
(459, NULL, NULL, 25, 'Puas', 'Warna kainnya min banyakin lagi biar banyak varian'),
(460, NULL, NULL, 21, 'Puas', 'Keren'),
(461, NULL, NULL, 22, 'Ya', 'Keren'),
(462, NULL, NULL, 23, 'Ya', 'Keren'),
(463, NULL, NULL, 24, 'Sesuai', 'Keren'),
(464, NULL, NULL, 25, 'Puas', 'Keren'),
(465, NULL, NULL, 26, 'Kain Batik', 'Keren'),
(466, NULL, NULL, 27, 'Polos (Putih)', 'Keren'),
(467, NULL, NULL, 21, 'Cukup', 'Sudah sangat bagus pelayanannya'),
(468, NULL, NULL, 22, 'Ya', 'Sudah sangat bagus pelayanannya'),
(469, NULL, NULL, 23, 'Ya', 'Sudah sangat bagus pelayanannya'),
(470, NULL, NULL, 24, 'Sesuai', 'Sudah sangat bagus pelayanannya'),
(471, NULL, NULL, 25, 'Puas', 'Sudah sangat bagus pelayanannya'),
(472, NULL, NULL, 26, 'Kain Songket', 'Sudah sangat bagus pelayanannya'),
(473, NULL, NULL, 27, 'Polos (Putih)', 'Sudah sangat bagus pelayanannya'),
(0, NULL, NULL, 21, 'Puas', 'sudah bagus'),
(0, NULL, NULL, 22, 'Ya', 'sudah bagus'),
(0, NULL, NULL, 23, 'Tidak', 'sudah bagus'),
(0, NULL, NULL, 24, 'Tidak Sesuai', 'sudah bagus'),
(0, NULL, NULL, 25, 'Puas', 'sudah bagus'),
(0, NULL, NULL, 26, 'Kain Jumputan', 'sudah bagus'),
(0, NULL, NULL, 27, 'Hitam', 'sudah bagus'),
(0, NULL, NULL, 21, 'Puas', 'Terbaik'),
(0, NULL, NULL, 22, 'Ya', 'Terbaik'),
(0, NULL, NULL, 23, 'Ya', 'Terbaik'),
(0, NULL, NULL, 24, 'Sesuai', 'Terbaik'),
(0, NULL, NULL, 25, 'Puas', 'Terbaik'),
(0, NULL, NULL, 26, 'Kain Songket', 'Terbaik'),
(0, NULL, NULL, 27, 'Emas', 'Terbaik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_sandi` text NOT NULL,
  `admin_foto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_nama`, `admin_email`, `admin_sandi`, `admin_foto`) VALUES
(60, 'admin', 'Lamindo Santa Riani', 'admin@gmail.com', '$2y$10$i.q9fviZUwPWQnjdODeN2eLjHGUjZxInJZFUptgQaKASab1N2jRVO', '18d059256eeb7ad6533e01531eb53bcb.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_blog`
--

CREATE TABLE `tb_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_judul` varchar(90) NOT NULL,
  `blog_url` text NOT NULL,
  `blog_tgl` datetime NOT NULL,
  `blog_isi` text NOT NULL,
  `blog_gambar` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_blog`
--

INSERT INTO `tb_blog` (`blog_id`, `blog_judul`, `blog_url`, `blog_tgl`, `blog_isi`, `blog_gambar`) VALUES
(305034855, 'Di Griya Kain Tuan Kentang Anda Beli Songket Langsung Dari Pengrajin', 'di-griya-kain-tuan-kentang-anda-beli-songket-langsung-dari-pengrajin-1601811001.html', '2020-10-04 18:30:01', 'TRIBUNNEWS.COM, JAKARTA - Kota Palembang memiliki kain khas yang telah dikenal oleh dunia, yaitu tenun songket. Konon, kata songket berasal dari kata disongsong dan di-teket. Kata “teket” dalam bahasa Palembang lama artinya sulam.\r\n\r\nKata tersebut merujuk pada proses penenunan dengan memasukkan benang dan peralatan lainnya ke Lungsin (benang tenun) dengan cara disongsong. Pembuatan kain songket pada dasarnya dilakukan dengan cara disongsong dan disulam.\r\n\r\nKali ini, Minggu (4/6), tim Tour de Sumatera Mudik 2017 mendatangi Griya Kain Tuan Kentang, di Jalan Aiptu A Wahab, Kelurahan Tuan Kentang, Kota Palembang.\r\nGriya Kain Tuan Kentang\r\nGerai Griya Kain Tuan Kentang di Jalan Aiptu A Wahab, Kelurahan Tuan Kentang, Kota Palembang.\r\n\r\nJika ditempuh naik mobil atau sepeda motor, lokasi Griya Kain dari pusat kota hanya sekitar 15 menit.\r\n\r\nKenapa tempat ini menjadi pilihan kami untuk disinggahi? Pasalnya, Griya Kain merupakan Kelompok Usaha Bersama (KUB), tempat di mana para pengrajin kain di Tuan Kentang menitipkan produknya untuk dipasarkan.\r\n\r\nSaat kami mendatangi Griya Kain tersebut, belasan pengunjung sedang memilih dan membeli kain. Habibi, Ketua KUB Griya Kain Tuan Kentang, mengatakan pihaknya juga menjual kain tenun tajung dan kain jumputan.\r\n\r\n“Ada sekitar 25 pengrajin kain, baik itu tenun tajung, tenun songket, maupun kain jumputan. Jadi pembeli mau cari model seperti apa saja yang diinginkannya bisa didapatkan disini,” kata Habibi.\r\n\r\nKain songket dijual mulai dari kisaran harga Rp1,5 juta hingga Rp5 juta. Sementara tenun tajung dijual mulai kisaran harga Rp100 ribu hingga Rp900 ribu. Bahannya ada yang dari sutra, semi sutra, dan katun.\r\n\r\nSedangkan kain jumputan dijual mulai harga Rp50 ribu-Rp400 ribu. Jenisnya ada sifon, katun, fiskos, dobi.\r\n\r\nMotif yang ditawarkan pun beragam. Mulai motif titik tuju, titik lima, titik sembilan, dan motif yang lebih modern.\r\n\r\n“Saat ini yang sedang ramai dibeli pelancong adalah kain jumputan. Jenis ini memang unik dan jarang ditemui di daerah lain,” kata Habibi.\r\n\r\nSementara itu, seorang pengunjung, Irma menuturkan, kedatangannya ke Griya Kain untuk membelikan buah tangan buat koleganya.\r\n\r\n“Kalau beli di sini harganya lebih murah dan jenisnya atau motifnya juga jarang ditemui di tempat lain. Kualitasnya juga bagus,” ujar perempuan asal Jakarta yang kebetulan berkunjung ke Palembang tersebut. (tribunnews/ape)\r\n', 'ac2ab37f6d14a15737838e43c9644f90.jpg'),
(754413934, 'Ke Palembang Jangan Lupa Mampir Ke Tuan Kentang ', 'ke-palembang-jangan-lupa-mampir-ke-tuan-kentang-1601811053.html', '2020-10-04 18:30:53', '\r\n\r\nTuan Kentang adalah nama kampung di tepi Sungai Ogan Palembang. Tepatnya di pertemuan Sungai Musi dan Sungai Ogan. Nama ini konon adalah saudagar Tionghoa yang pernah punya bisnis besar di sepanjang muara sungai dan dimakamkan di kampung tersebut.\r\n\r\nDahulu, warga sekitar melakukan sesajen di kuburannya yang paling besar diantara kuburan lain dan memanjang sendiri. Masyarakat sekitar yakin bahwa Tuan Kentang memiliki ‘sesuatu’ yang tidak dimiliki orang lain.\r\n\r\nBagi yang belum tahu dimanakah Kampung Tuan Kentang berada, kita bisa ambil patokan Jembatan Ampera ke arah timur. Setelah sampai perempatan jembatan layang, belok keselatan arah Kertapati. Tepat sebelah kiri jalan sebelum Jembatan Kertapati di Seberang Ulu 1, disitulah letak Kampung Tuan Kentang.\r\n\r\nKampung ini punya keistimewaaan yaitu sebagian besar warganya hidup sebagai perajin kain tradisional Palembang seperti kain songket, blongsong, tajung, pelangi, atau jumputan dengan mutu cukup baik. Produksinya besar dan dulu penyuplai utama beberapa galeri dan toko terkenal di kawasan kain Tangga Buntung, Palembang.\r\n\r\nMelihat potensi itu, Pemerintah Daerah Kota Palembang dan Bank Indonesia membangun sebuah galeri yang menampung produksi mereka dan dinamakan Griya Kain Tuan Kentang yang diresmikan tahun 2017. Pada perjalanannya, Griya Kain Tuan Kentang menjadi destinasi wisata belanja menarik di kota Palembang. Galeri ini tidak saja menjual kain, pakaian, tapi juga aksesoris khas Palembang.\r\n\r\nBagi para perajin, galeri ini cukup membantu pemasaran karena sebelumnya mereka harus keliling pasar untuk menjual hasil karya. Kini pemasaran terorganisir karena terbentuk Kelompok Usaha Bersama (KUB) Tuan Kentang yang kini terbukti bisa mengangkat ekonomi dan rasa percaya diri para perajin. KUB Tuan Kentang beranggotakan 200 perajin.\r\n\r\nAkses jalan dan lingkungan sekitar juga sudah tertata. Gapura Tuan Kentang sampai kantor Lurah 15 Ulu semua sudah dicor dan dapat dilalui kendaraan roda empat. Suasananya bersih, terang, dan teratur. Termasuk rumah-rumah panggung yang berdiri di pinggir sungai. Griya Kain Tuan Kentang berjarak 100 meter dari gapura. Ke depan, Pemda merencanakan akses melalui sungai (berperahu) ke tempat ini.\r\n\r\n \r\n\r\nJenis Kain yang Diproduksi\r\n\r\nSejak pagi sampai jelang petang, kampung Tuan Kentang tak pernah sepi dari bunyi kletak-klotok suara  Alat Tenun Bukan Mesin (ATBM) dari perajin. Mereka banyak memproduksi kain jumputan, kain tajung, kain blongsong, dan songket.\r\n\r\nDari beberapa jenis kain yang dibuat perajin, kain jumputan paling banyak dicari konsumen karena warnanya beraneka ragam, unik, dan tidak ditemui di daerah lain. Jumputan Palembang juga disebut kain pelangi. Kain jumputan bersifat fleksibel, bisa digunakan pria dan wanita, serta cocok untuk busana resmi maupun santai.\r\n\r\nDesainer nasional Ghea Panggabean juga tertarik pada kain jumputan ini sebagai bahan busana. Ghea bahkan mendapat penghargaan dari Asean Designer Show di Singapore pada tahun 1986 karena mengangkat jumputan.\r\n\r\nTeknik pembuatan, seperti jumputan pada umumnya yaitu dengan diikat atau dijahit kemudian baru dicelup. Bahan yang tersedia sifon, katun, fiskos, dan semi sutra. Motifnya yang terkenal titik tujuh, titik lima, titik sembilan, dan motif moderen. Di sini juga tersedia kain tajung dan blongsong yang merupakan kain yang sama, hanya berbeda pada penggunaannya saja.\r\n\r\nKain tajung adalah kain tenun yang berbentuk sarung dan biasa dipakai laki-laki untuk upacara adat atau hari raya. Kain tajung dulu dibuat dengan alat tenun gendong, tapi sejak tahun 1970 mulai menggunakan ATBM.  ATBM sangat menghemat waktu produksi dari 15 hari jika memakai alat tenun gendong, menjadi 2 hari saja jika memakai ATBM untuk satu lembar kain. Bahan yang digunakan katun dan sutra. Macam macam motif kain tajung antara lain limar, limar patut, petak-petak berwarna, dan gerbik.\r\n\r\nSedangkan kain blongsong digunakan oleh perempuan, terdiri dari sarung dan selendang. Selain itu ada juga kain blongsong yang menggunakan motif songket dan disebut blongket atau blongsong songket. Pengerjaannya lebih cepat dari songket karena menggunakan benang katun atau sutera.\r\n\r\nKampung ini juga memproduksi kain songket. Songket Palembang adalah salah satu karya budaya dari Sumatera Selatan yang telah ditetapkan sebagai Warisan Budaya Tak Benda (WBTB) Indonesia pada tahun 2013. Karya budaya ini masuk ke dalam domain Keterampilan dan Kemahiran Kerajinan Tradisional dengan nomor pencatatan 201300009.\r\n\r\nSongket berasal dari istilah sungkit yang berarti “mengait” atau “mencungkil.” Istilah ini secara langsung merepresentasikan metode pembuatannya yaitu mengaitkan dan mengambil sejumput kain tenun lalu menyelipkan benang emas kemudian menenun dan diakhiri dengan tahap penyempurnaan. Pembuatan bisa memakan waktu 3-6 bulan tergantung kerumitan motif. Ragamnya antara lain songket lepus, songket tabur, songket bunga, songket limar, songket trestes, dan songket rumpak.\r\n\r\nJadi, jika ke Palembang usahakan mampir ke Griya Kain Tuan Kentang. Di Kampung Tuan Kentang selain berburu kain khas Palembang juga bisa melihat proses pembuatannya. Tak ketinggalan, selfi dengan latar jemuran kain jumputan yang tentu sangat instagramable.(K-CD)\r\n', '3779fa0c6ab7f7ed260d051bf61a010f.jpg'),
(2007793391, 'Tuan Kentang Manfaatkan Jualan Online', 'tuan-kentang-manfaatkan-jualan-online-1601811147.html', '2020-10-04 18:32:27', 'PALEMBANG - Banyak segmen yang terkena imbas dari corona effect di kota Palembang. Bukan hanya sektor kesehatan, pendidikan, roda perekonomian dibeberapa sektor ikut menerima dampak yang signifikan. Seperti yang dirasakan para pengrajin kain jumputan di sentra Gria Kain Tuan Kentang. Tepatnya di Jalan Aiptu A Wahab, Kelurahan Tuan Kentang Seberang Ulu I.\r\n\r\nKewaspadaan yang semakin tinggi mencegah penularan corona, membuat masyarakat dalam dan luar kota mengurangi niat berpergian. Ketua Kelompok Usaha Bersama (KUB) Griya Kain...\r\n', 'b66579f1c78e844e1b3d09c2dc91abd7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_rowid` varchar(80) NOT NULL,
  `cart_name` text NOT NULL,
  `cart_price` varchar(8) NOT NULL,
  `cart_image` varchar(80) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_weight` varchar(7) NOT NULL,
  `cart_stok` int(11) NOT NULL,
  `cart_userid` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cart`
--

INSERT INTO `tb_cart` (`cart_id`, `cart_rowid`, `cart_name`, `cart_price`, `cart_image`, `cart_qty`, `cart_weight`, `cart_stok`, `cart_userid`, `cart_total`) VALUES
(2056, '61fa8a5ce6425bf77c6f61ed0e3a5094', 'Star Guardian', '50000', '8.jpg', 4, '1', 10, 11454, 200000),
(2977, '31b94e43c0bd5ab1eee514065920a389', 'T-shirt Black', '60000', '1.jpg', 3, '1', 20, 11454, 180000),
(12742, '3ce3f94b9ab20ef4a2e56ca9dc015e5a', 'Black Hodie', '200000', '3.jpg', 1, '1', 6, 11454, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `d_transaksi_id` varchar(10) NOT NULL,
  `d_transaksi_item` int(7) NOT NULL,
  `d_transaksi_qty` smallint(4) NOT NULL,
  `d_transaksi_biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`d_transaksi_id`, `d_transaksi_item`, `d_transaksi_qty`, `d_transaksi_biaya`) VALUES
('1581233088', 1506529438, 1, 340000),
('1581233088', 1804248788, 2, 120000),
('1581237331', 685126615, 3, 300000),
('1581239971', 584067184, 1, 160000),
('1601808972', 584067184, 1, 160000),
('1601869577', 1760903437, 3, 195000),
('1601869577', 584067184, 2, 320000),
('1601880309', 119766114, 2, 100000),
('1602044461', 119766114, 2, 100000),
('1602307026', 119766114, 1, 50000),
('1604635353', 1586572346, 2, 200000),
('1605947102', 1586572346, 2, 200000),
('1609066624', 1586572346, 1, 100000),
('1615549554', 1760903437, 1, 65000),
('1615549554', 119766114, 1, 50000),
('1620356222', 1506529438, 1, 340000),
('1620362586', 685126615, 1, 100000),
('1620368318', 1107070371, 1, 60000),
('1625718607', 584067184, 1, 80000),
('1626015895', 1760903437, 1, 65000),
('1626022679', 685126615, 1, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` smallint(6) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `url`) VALUES
(1, 'Kemeja', 'Kemeja'),
(2, 'Kaos', 'Kaos'),
(3, 'Jaket', 'Jaket'),
(4, 'Sweater', 'Sweater'),
(5, 'Celana', 'Celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lock`
--

CREATE TABLE `tb_lock` (
  `lock_id` int(11) NOT NULL,
  `lock_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lock`
--

INSERT INTO `tb_lock` (`lock_id`, `lock_status`) VALUES
(1, 'NO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `notif_id` varchar(90) NOT NULL,
  `notif_perihal` varchar(50) DEFAULT NULL,
  `notif_dari` varchar(70) DEFAULT NULL,
  `notif_time` timestamp NULL DEFAULT current_timestamp(),
  `notif_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`notif_id`, `notif_perihal`, `notif_dari`, `notif_time`, `notif_status`) VALUES
('1819ff61034d286716cddf37abf704f0', 'Pesan baru', NULL, '2020-10-15 22:10:02', 1),
('1d74bcafc3da43b5eafd0cc6fcb09bf0', 'Transaksi baru', 'Taufik', '2020-11-06 04:03:18', 1),
('25f200a4a666991c8275a9e9371d45d6', 'Transaksi baru', 'Muhammad Taufik Hidayat', '2020-10-04 10:56:48', 0),
('3f536ed8f17ec42b3194dc3b0232f3d9', 'Pesan baru', NULL, '2020-10-04 13:47:48', 1),
('5651b4622766f6a940af48f31bb21891', 'Pesan baru', NULL, '2021-03-24 04:26:44', 0),
('5ec14e1ed0bc4d112cb8b6d8512e2970', 'Pesan baru', NULL, '2021-03-07 17:40:22', 0),
('832dd3547ef3abee287664377a880581', 'Transaksi baru', 'Muhammad Taufik Hidayat', '2020-10-10 05:17:48', 1),
('951fcb9d1b9f9ebc3182b5700e014b6d', 'Transaksi baru', 'Ahmad Adha', '2020-02-11 12:13:28', 0),
('ee55113c4f31257603ece3a1b598e2c0', 'Transaksi baru', 'Miftahul Jannah', '2020-02-11 12:14:50', 0),
('f0c09e0e954112705a99c7c294e4a9db', 'Pesan baru', NULL, '2021-04-04 08:47:29', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `pesan_id` varchar(100) NOT NULL,
  `pesan_nama` varchar(50) NOT NULL,
  `pesan_email` varchar(50) NOT NULL,
  `pesan_tgl` datetime NOT NULL,
  `pesan_subjek` varchar(50) NOT NULL,
  `pesan_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`pesan_id`, `pesan_nama`, `pesan_email`, `pesan_tgl`, `pesan_subjek`, `pesan_isi`) VALUES
('03638878d1e1263f895a6982c7327752', 'Vaughn', 'vaughn@griyakaintuankentang.com', '2021-04-04 15:47:29', 'Griyakaintuankentang.com', 'Morning\r\n\r\nWorld\'s Best Neck Massager Get it Now 50% OFF + Free Shipping!\r\nWellness Enthusiasts! There has never been a better time to take care of your neck pain! \r\n\r\nOur clinical-grade TENS technology will ensure you have neck relief in as little as 20 minutes.\r\n\r\nGet Yours: hineck.online\r\n\r\nSincerely,\r\n\r\nVaughn\r\nKontak Kami - Griya Kain Tuan Kentang'),
('0b8117126afb3c5c3cc8edbcc7c25d44', 'Lupe', 'lupe@griyakaintuankentang.com', '2021-03-08 00:40:22', 'Lead For Griyakaintuankentang.com', 'Morning\r\n\r\nBuy face mask to protect your loved ones from the deadly CoronaVirus.  We wholesale N95 Masks and Surgical Masks for both adult and kids.  The prices begin at $0.19 each.  If interested, please check our site: pharmacyoutlets.online\r\n\r\nSincerely,\r\n\r\nKontak Kami - Griya Kain Tuan Kentang'),
('36d3a4c188e2b77769890f148feacdf5', 'Taufik', 'taufikyoungman@gmail.com', '2020-10-04 20:46:07', 'Halo', 'Keren'),
('5b53cfbda6fb78d42ae95475f0304595', 'Taufik', 'taufikyoungman@gmail.com', '2020-10-04 20:47:48', 'Tes', 'tes'),
('88686233946fa0f1afb9a3e309ae8b86', 'Eve', 'eve@griyakaintuankentang.com', '2021-03-24 11:26:44', 'Kontak Kami - Griya Kain Tuan Kentang', 'Morning\r\n\r\nWholesale Medical Surgical Masks for both adult and kids - Buy Now as Low as $0.19/mask\r\n\r\nShop now: pharmacyoutlets.online\r\n\r\nThank You,\r\n\r\nEve\r\nKontak Kami - Griya Kain Tuan Kentang'),
('c0700678ab31556660d069abcc5cdd68', 'Taufik', 'taufikyoungman@gmail.com', '2020-10-04 20:46:55', 'Tes', 'tes'),
('d400eb54e84afd5c9efb78bcc47d1d00', 'Damaris Wonggu', 'information@pppkpusri.com', '2020-10-16 05:10:02', 'Pppkpusri.com NOTICE.', 'ATT: pppkpusri.com / Index of / SITE SOLUTIONS\r\nThis notification ENDS ON: Oct 15, 2020\r\n\r\n\r\nWe have actually not received a settlement from you.\r\nWe  have actually attempted to call you but were not able to contact you.\r\n\r\n\r\nKindly See: https://bit.ly/353pEvg .\r\n\r\nFor details as well as to process a optional settlement for solutions.\r\n\r\n\r\n\r\n10152020181003.\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_url` text NOT NULL,
  `produk_name` varchar(50) NOT NULL,
  `produk_weight` int(11) NOT NULL,
  `produk_tgl` datetime NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_status` varchar(50) DEFAULT NULL,
  `produk_price` varchar(8) NOT NULL,
  `produk_description` text NOT NULL,
  `produk_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_url`, `produk_name`, `produk_weight`, `produk_tgl`, `produk_stok`, `produk_status`, `produk_price`, `produk_description`, `produk_image`) VALUES
(584067184, 'daphne-coat-1580699461.html', 'Kaos', 1000, '2020-02-03 09:16:44', 8, NULL, '80000', 'Kaos adalah pakaian sederhana ringan untuk tubuh bagian atas, biasanya lengan pendek T – shirt disebut demikian karena bentuknya. Sebuah T-shirt biasanya tanpa kancing dan kerah, dengan leher bulat dan lengan pendek.', 'ba31c7cc63c451fbc84d67b79bab4796.png'),
(685126615, 'chambray-shirt-1580699492.html', 'Sweater', 1000, '2020-02-03 09:12:13', 12, NULL, '100000', 'Sweater adalah jenis pakaian atas yang menetupi badan dan lengan, berbahan agak tebal daripada kaos, biasanya tanpa kancing dan bisa di jadikan pakaian luar. Sweater banyak terbuat dari bahan katun berupa benang yang di rajut.', 'b0af80d21e396a5c71b64270dac41115.jpg'),
(1107070371, 'salomon-kids-1580699532.html', 'Jaket', 1000, '2020-02-03 09:15:50', 3, NULL, '60000', 'Jaket adalah baju luar yang panjangnya hingga pinggang atau pinggul, dipakai untuk menahan angin dan cuaca dingin. Bukaan jaket terletak di bagian depan dari leher ke bawah. Ritsleting, kancing, atau sabuk dipakai sebagai alat untuk membuka dan menutup bukaan jaket.', '158af1c226f7fa3a782dd046b76eaccc.jpg'),
(1506529438, 'blazer-man-1580699590.html', 'Celana Panjang', 1000, '2020-02-03 09:08:35', 25, NULL, '340000', 'Celana panjang adalah busana luar bagian bawah yang dipakai oleh laki-laki dan perempuan, yang biasanya secara resmi dikenakan dengan kemeja.', 'eb48cba50e972b40b349cbc3c87af957.png'),
(1760903437, 'boston-lcs-1580699630.html', 'Kemeja', 1000, '2020-02-03 09:17:07', 20, NULL, '65000', 'Kemeja adalah salah pakaian atas yang menutupi bagian lengan, dada, bahu, berkerah dan menutupi tubuh sampai bagian perut. Kemeja biasanya dibuat menurut selera orang yang mengenakannya, kadang kemeja bisa dibuat berlengan panjang maupun berlengan pendek.', 'c62607494c6ed0c08f4ff74245c6104d.png'),
(1804248788, 'tshirt-black-1580699688.html', 'Celana Pendek', 1000, '2020-02-03 09:05:42', 36, NULL, '60000', 'Celana pendek adalah pakaian bawahan bercabang dua yang dikenakan oleh laki-laki dan perempuan di wilayah pinggul mereka, mengitari pinggang, dan menutupi bagian atas kaki, kadang-kadang lebih panjang sampai ke bawah lutut, tetapi tidak menutupi seluruh panjang kaki, baik sebagai pakaian luar atau dalam, yang membuat celana pendek nyaman dan mudah dipakai. ', '052c75066074a10356f14c17a868a72c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `profil_id` int(11) NOT NULL,
  `profil_nama` varchar(50) NOT NULL,
  `profil_email` varchar(80) NOT NULL,
  `profil_telp` varchar(14) NOT NULL,
  `profil_alamat` text NOT NULL,
  `profil_fb` varchar(50) NOT NULL,
  `profil_wa` varchar(14) NOT NULL,
  `profil_ig` varchar(50) NOT NULL,
  `profil_tw` varchar(50) NOT NULL,
  `profil_logo` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`profil_id`, `profil_nama`, `profil_email`, `profil_telp`, `profil_alamat`, `profil_fb`, `profil_wa`, `profil_ig`, `profil_tw`, `profil_logo`) VALUES
(1, 'Fajar Konveksi', 'fajarkonveksi@gmail.com', '082315783062', 'Bandung, Jawa Barat', 'fajarkonveksi', '082315783062', 'fajarkonveksi', 'fajarkonveksi', '69efb8fe21494d3fe0f61edf99e84e03.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rkategori`
--

CREATE TABLE `tb_rkategori` (
  `id_item` int(11) NOT NULL,
  `id_kategori_r` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rkategori`
--

INSERT INTO `tb_rkategori` (`id_item`, `id_kategori_r`) VALUES
(584067184, 3),
(685126615, 2),
(1107070371, 3),
(1506529438, 3),
(1760903437, 1),
(1804248788, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_text_1` varchar(30) NOT NULL,
  `slider_text_2` varchar(30) NOT NULL,
  `slider_text_3` varchar(30) NOT NULL,
  `slider_urutan` int(11) NOT NULL,
  `slider_gambar` varchar(80) NOT NULL,
  `slider_gaya_text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`slider_id`, `slider_text_1`, `slider_text_2`, `slider_text_3`, `slider_urutan`, `slider_gambar`, `slider_gaya_text`) VALUES
(4, 'Fajar Konveksi', 'Jual Beli Produk Pakaian', 'Tercepat dan Termurah', 1, '171240b1274cde3ec6de52372327133d.jpg', 'text-left');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_token`
--

CREATE TABLE `tb_token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` text NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_token`
--

INSERT INTO `tb_token` (`id`, `email`, `token`, `created`) VALUES
(9, 'taufikmuhfive7@gmail.com', 'zzzMyT9uJIUObGjvQrAvmSHAuoMO9IJprlbHaWbSiEY=', 1604635150),
(10, 'taufikmuhfive7@gmail.com', 'WSfUVAqCbLyyJHC8+cOTjvUae0icTk3HjHN3ayW/4N0=', 1604635304),
(11, 'precious.hodkiewicz@yahoo.com', '5rVTJoFslwU9CdPUnGzxnbwZSVYptTe7NA7kRMpl7jM=', 1604787782),
(12, 'suzysoftail@gmail.com', 'BljgkYZF+4jMtwmY7pXu9GqPNWWXabcM0ZNLZirUXy4=', 1607493362),
(13, 'wildan@gmail.com', 'jnkE1g7qlHDklcE/Hm98PGS6LN3Oax9z4mmKxw545ic=', 1609066343),
(14, 'luki.martino@gmail.com', 'eTME4UfJLr6cKfQZirfNHd+8byKoUgwKagGGe3JTOog=', 1611511967),
(15, 'sistyasafira2@gmail.com', 'CL5G+SAgm9vpNDkg/tFNd12HjN6nKhhShQcVkvurmxo=', 1611566722),
(16, 'julespcw@aol.com', 'fENQTGU2RiBhDMLm4FPNEFeXXIM7JmPnlDtbytV4ufw=', 1611787638),
(17, 'tania_powlowski@gmail.com', 'r0AxplGGrfo00uzS/QnOG41oPn/VOKJmyziB1EtVUfE=', 1611951013),
(18, 'magerbarry65@gmail.com', 'eR6/Z8/AXPsG7tFDmZ4/j3Vdm7NHvMF5qzu0rBINi7U=', 1612480649),
(19, 'endangerf@hotmail.co.uk', 'jMa18XX1a6B+CHhsghd5QYiCAQsRqOixePQ2STPAwuk=', 1612880425),
(20, 'monicaghayez@gmail.com', '3nli00XfoKf2G969fEoCJTkIyReKXx9/d4SVkkYeudA=', 1613624989),
(21, 'sameold77@gmail.com', 'vJyiiEIv0dfemHPxfij0R7tHbhDRTWjh1VWu+yFdaxU=', 1614292460),
(22, 'yanet.galindo@outlook.com', '2Pd1RhVx9HOMoT+PR+SPgNk6wsGmUCu85xBHJF9pNCg=', 1615463350),
(23, 'bclaudia2106@gmail.com', 'wlW5TM3lDECY5h1ezh2/IueIK+UFPyO43tctEhxoDk8=', 1615549384),
(24, 'dinesh.dhesabandu@providence.org', '82JceT1+cCpLVli3rk/B4clw+yhrfRzRdPLMulH57CI=', 1615985084),
(25, 'jlouise24@hotmail.com', '+QN+iw9lGScEhDYTWqC82ujQG/OnjnNPS8BjpCLrL9g=', 1616474072),
(26, 'mugiwara@gmail.com', 'O3Gk8TkcwCvGIe/TpyC+nJGOtzVmh7U/oH945BPQbZo=', 1620356125),
(27, 'lamindosantariani@gmail.com', 'ZSlZ/XM+QpbqFy5Dg5OLIzjNqZZ/5U88rCSYsL0VLHA=', 1620362239),
(28, 'vio@gmail.com', 'bkU5PeDlV5303Izvr3qk8XdvLHGMyq8n43TnCn+s25k=', 1626015181);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` varchar(10) NOT NULL,
  `transaksi_userid` int(7) NOT NULL,
  `transaksi_total` double NOT NULL,
  `transaksi_tujuan` varchar(255) NOT NULL,
  `transaksi_pos` int(5) NOT NULL,
  `transaksi_prov` varchar(80) NOT NULL,
  `transaksi_kota` varchar(25) NOT NULL,
  `transaksi_kurir` varchar(5) NOT NULL,
  `transaksi_service` varchar(50) NOT NULL,
  `transaksi_tgl_pesan` date NOT NULL,
  `transaksi_bts_bayar` date NOT NULL,
  `transaksi_status` enum('belum','diproses','Sudah Upload','tolak') NOT NULL,
  `transaksi_note` text NOT NULL,
  `transaksi_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `buktipembayaran` text NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_userid`, `transaksi_total`, `transaksi_tujuan`, `transaksi_pos`, `transaksi_prov`, `transaksi_kota`, `transaksi_kurir`, `transaksi_service`, `transaksi_tgl_pesan`, `transaksi_bts_bayar`, `transaksi_status`, `transaksi_note`, `transaksi_time`, `buktipembayaran`) VALUES
('1626015895', 1231698307, 96000, 'tes', 30118, 'Bali', 'Badung', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2021-07-11', '2021-07-14', 'diproses', 'tes', '2021-07-11 15:04:55', '8d0faf236358fc755e3a0b62d51f2c73.jpeg'),
('1626022679', 1231698307, 131000, 'tes', 30118, 'Bali', 'Badung', 'pos', 'Paket Kilat Khusus(Paket Kilat Khusus)', '2021-07-11', '2021-07-14', 'Sudah Upload', 'tes', '2021-07-11 16:57:59', 'ad6b5c68b19e7e76e9e377d05e933b1d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_sandi` text NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_nama`, `user_email`, `user_sandi`, `user_status`, `user_created`) VALUES
(11454, 'Ahmad Adha', 'ahmadadha19@gmail.com', '$2y$10$lWCfq2DWtDuNIsgpIceSD.jXZwm1ALsRoBQ5h.4G/I1gqHB2EqsFC', 1, '2020-02-06 02:12:02'),
(23094, 'Miftahul Jannah', 'miftah@gmail.com', '$2y$10$8h8Po8eaZTEOZG2.8d2OHOaQkU8.UkhutFOudrfOzy6Ge9NHNOJoq', 1, '2020-02-09 08:37:56'),
(165605889, 'Input', 'suzysoftail@gmail.com', '$2y$10$I400JLE8ncLEBkJuFMuTz.Y.9u/B/wmxE4Fiu.fKBZUru7GTnBMEi', 1, '2020-12-09 05:56:02'),
(212360163, 'Outdoors', 'sameold77@gmail.com', '$2y$10$8rPWvXiJJHZrxEr5/theg.G9X8dfC1Qz/Xa5fIVxnqjRtrJ9sHdha', 1, '2021-02-25 22:34:20'),
(220590712, 'Vertical', 'julespcw@aol.com', '$2y$10$JlUY4naJ6kMRMKrgSycK6OU4fWfIkQV8vexrl30n8VzZ7445mEa6G', 1, '2021-01-27 22:47:18'),
(230050363, 'Taufik', 'taufikmuhfive7@gmail.com', '$2y$10$i.q9fviZUwPWQnjdODeN2eLjHGUjZxInJZFUptgQaKASab1N2jRVO', 1, '2020-11-06 04:01:44'),
(413522916, 'Wiyah Mulyadi', 'mulyadibasith@gmail.com', '$2y$10$mnc1UylHXzluqWy1bBg2h.woET.uWQenDsZ0qcT8qK5eE/56nk8zW', 1, '2020-10-30 07:16:10'),
(623387359, 'Loaf', 'jlouise24@hotmail.com', '$2y$10$o8/YP3vcUO.U7myt9Ws82uK2TreyWIuFG6OpdvKM5vFP/oedXcdbi', 1, '2021-03-23 04:34:32'),
(760327822, 'Agent', 'yanet.galindo@outlook.com', '$2y$10$L8KSbSTyVtfYYCYVSMsu6uiU6oxRVR9ub2BkwAA3lw9lbFjnwlM8K', 1, '2021-03-11 11:49:10'),
(771861533, 'Wildan', 'wildan@gmail.com', '$2y$10$lAymu.LcWWmhHqRT600yqOkEjkQvpHL1uesgixMaw6KTtarg3NUUe', 1, '2020-12-27 10:52:23'),
(844231864, 'Lavender', 'luki.martino@gmail.com', '$2y$10$t.bM70X9gxl86nF.mnh4Z.l2u93.pU9gsibA/3p6GJ6Z5k.ejpZta', 1, '2021-01-24 18:12:47'),
(851922307, 'Magenta', 'magerbarry65@gmail.com', '$2y$10$j7WzSk4d28vNc/RnDk4oV.dq5u7xQkRyTQKAOEh1hYM9O5U.jEwaa', 1, '2021-02-04 23:17:29'),
(953854665, 'Lamindo Santa Riani', 'lamindosantariani@gmail.com', '$2y$10$wY./n7gO5TUXJsOKXn550eJ/sdez6zL/tmeRVewOt57UnWVQikN2a', 1, '2021-05-07 04:37:19'),
(1025425607, 'Safira ', 'sistyasafira2@gmail.com', '$2y$10$AZgT7.Ef5Slr3bgx67qLAOhGa4KFjy6aa2pLNH211AP3Z5Dp5oHjG', 1, '2021-01-25 09:25:22'),
(1090995608, 'Kids', 'dinesh.dhesabandu@providence.org', '$2y$10$Eqzygk3feEarsrLWq3WO/e8YG8dmQ9LcheXMiMtpsAAFWcoyMy8WK', 1, '2021-03-17 12:44:44'),
(1097065699, 'Lane', 'monicaghayez@gmail.com', '$2y$10$PaGWXO6NVs28qn/YoR8DLO5aIwmQFt1shYBvvxOGUI9T8Dr0tzrxa', 1, '2021-02-18 05:09:49'),
(1228289525, 'Indexing', 'precious.hodkiewicz@yahoo.com', '$2y$10$xGXgU26zaUQNZ/tN4YTPee/XZ4hSUuNtuB5Ps5VDTNVYbg5ijIBzy', 1, '2020-11-07 22:23:02'),
(1231698307, 'Vio Keren', 'vio@gmail.com', '$2y$10$NXHWgB3WkytS0OaWNT9Q7.EDSJKrVbeoleBDN7my2wbXrU/SB05qm', 1, '2021-07-11 14:53:01'),
(1405550934, 'Bella', 'bclaudia2106@gmail.com', '$2y$10$Ce9E7M8.lTy8pwXfC0RdWO4qgW1..cYY0jUH88FjfXm1nKcOPfLLW', 1, '2021-03-12 11:43:04'),
(1444957849, 'Mugiwara Sambles', 'mugiwara@gmail.com', '$2y$10$juKP7Y0YN65TWgBaDrVjpu0RI/OZPrQzRYJC43HdJ2cL9LfSbQGfa', 1, '2021-05-07 02:55:25'),
(1655859230, 'Slamet Widodo', 'slametwidodo@polsri.ac.id', '$2y$10$Oqpl91c.uk/a7HXWA0HmE.WmzcxHOZ3n4sMjZGnDw4BO7Yaln5Msq', 1, '2020-10-05 06:40:17'),
(1723565482, 'Taufik', 'taufikgoodman@gmail.com', '$2y$10$i.q9fviZUwPWQnjdODeN2eLjHGUjZxInJZFUptgQaKASab1N2jRVO', 0, '2020-11-06 03:28:40'),
(1745169384, 'Muhammad Taufik Hidayat', 'taufikyoungman@gmail.com', '$2y$10$km8reDhDNERuAgTVYDFw9OQEmwWN.Rlg5e00N/JiKNmJZVFXzx8iC', 1, '2020-10-04 10:44:58'),
(1784173575, 'Redundant', 'endangerf@hotmail.co.uk', '$2y$10$kGboD657lHZ5obei9jxl.u5rz43h6WMaCa3xdohIP4.akf1ZmLHxa', 1, '2021-02-09 14:20:25'),
(1785003467, 'Maftukah', 'maftukahntik@gmail.com', '$2y$10$h8FuZ6EGit6d6.sSlEMFd..wLleER1m55XEhoFA8nu8u.sThmIYny', 1, '2020-10-10 05:10:40'),
(2067184514, 'Circuit', 'tania_powlowski@gmail.com', '$2y$10$kU.GJP0Yuwif0qMZA3minuL5Mm12/OAMK/CNsxbva.CTeoqvfu9ce', 1, '2021-01-29 20:10:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `list_id` varchar(100) NOT NULL,
  `list_proid` int(11) NOT NULL,
  `list_userid` int(11) NOT NULL,
  `list_tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`list_id`, `list_proid`, `list_userid`, `list_tgl`) VALUES
('66c656a7768dcaec6f68a22a1446e72b', 119766114, 11454, '2020-02-10 12:45:35'),
('ff2f3aa7583304639231c2658720f37e', 2137020298, 11454, '2020-02-10 13:12:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indeks untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_lock`
--
ALTER TABLE `tb_lock`
  ADD PRIMARY KEY (`lock_id`);

--
-- Indeks untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`profil_id`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indeks untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`list_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
