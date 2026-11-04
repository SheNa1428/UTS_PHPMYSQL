
-- phpMyAdmin SQL Dump
-- Database: `sweet eid`
-- Tabel: `produk`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

--
-- Database: `sweet eid`
--

CREATE DATABASE IF NOT EXISTS `sweet eid`;
USE `sweet eid`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for table `admin`
--

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel `admin`
--

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `kemasan` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `harga`, `kemasan`, `deskripsi`, `gambar`) VALUES
(1, 'Nastar', 'Kue Kering Selai', 85000, 'Toples 500 gram', 'Kue kering lembut dengan isian selai nanas yang manis dan sedikit asam.', 'nastar.jpeg'),
(2, 'Cokelat Sprinkle', 'Kue Cokelat', 75000, 'Toples 500 gram', 'Kue cokelat renyah dengan taburan sprinkle warna-warni.', 'cokelat_sprinkle.jpeg'),
(3, 'Kastengel Keju', 'Kue Keju', 90000, 'Toples 500 gram', 'Kue kering gurih dengan rasa keju yang kuat dan tekstur renyah.', 'kastengel.jpeg'),
(4, 'Putri Salju', 'Kue Kering Gula', 80000, 'Toples 500 gram', 'Kue kering berbentuk bulan sabit dengan taburan gula halus.', 'putri_salju.jpeg'),
(5, 'Spritz Cokelat', 'Kue Cokelat', 75000, 'Toples 500 gram', 'Kue semprit bercita rasa cokelat dengan tekstur renyah dan lembut.', 'spritz_cokelat.jpeg'),
(6, 'Kue Cokelat Bakiak', 'Kue Cokelat', 75000, 'Toples 500 gram', 'Kue cokelat berbentuk khas bakiak dengan rasa manis dan renyah.', 'cokelat_bakiak.jpeg'),
(7, 'Lidah Kucing', 'Kue Kering Mentega', 80000, 'Toples 500 gram', 'Kue tipis berbentuk panjang dengan tekstur ringan dan renyah.', 'lidah_kucing.jpeg'),
(8, 'Sagu Keju', 'Kue Keju', 85000, 'Toples 500 gram', 'Kue sagu yang lembut dan lumer di mulut dengan perpaduan rasa keju.', 'sagu_keju.jpeg'),
(9, 'Kue Sus Kering', 'Kue Kering Sus', 80000, 'Toples 500 gram', 'Kue sus berukuran kecil dengan tekstur renyah dan rasa gurih.', 'sus_kering.jpeg'),
(10, 'Kue Kacang Tanah', 'Kue Kacang', 75000, 'Toples 500 gram', 'Kue kering berbahan dasar kacang tanah dengan rasa gurih dan manis.', 'kue_kacang.jpeg'),
(11, 'Kue Semprit Original', 'Kue Semprit', 75000, 'Toples 500 gram', 'Kue semprit klasik dengan rasa mentega yang gurih dan tekstur renyah.', 'semprit.jpeg'),
(12, 'Cookies Choco Chip', 'Kue Cokelat', 85000, 'Toples 500 gram', 'Cookies renyah dengan tambahan butiran cokelat di setiap gigitan.', 'choco_chip.jpeg'),
(13, 'Cornflakes Cookies', 'Kue Sereal', 80000, 'Toples 500 gram', 'Kue kering dengan campuran cornflakes yang memberikan tekstur renyah.', 'cornflakes.jpeg'),
(14, 'Kue Almond', 'Kue Kacang', 95000, 'Toples 500 gram', 'Kue kering dengan taburan almond yang gurih dan aroma khas kacang.', 'almond.jpeg'),
(15, 'Kue Thumbprint', 'Kue Kering Selai', 85000, 'Toples 500 gram', 'Kue kering lembut dengan cekungan selai manis di bagian tengah.', 'thumbprint.jpeg'),
(16, 'Kue Garpu', 'Kue Gurih', 65000, 'Toples 500 gram', 'Kue tradisional berbentuk garpu dengan cita rasa gurih dan renyah.', 'kue_garpu.jpeg'),
(17, 'Kue Bawang', 'Kue Gurih', 65000, 'Toples 500 gram', 'Camilan renyah dengan aroma bawang dan rasa gurih.', 'kue_bawang.jpeg'),
(18, 'Kue Wijen', 'Kue Kering Wijen', 75000, 'Toples 500 gram', 'Kue kering dengan taburan biji wijen yang gurih dan harum.', 'wijen.jpeg'),
(19, 'Florentine Cookies', 'Kue Kacang', 95000, 'Toples 500 gram', 'Kue tipis renyah dengan campuran kacang dan biji-bijian.', 'florentine.jpeg'),
(20, 'Kue Satu', 'Kue Tradisional', 70000, 'Toples 500 gram', 'Kue tradisional berbahan tepung kacang hijau dengan tekstur lembut dan mudah hancur.', 'kue_satu.jpeg');

--
-- Indexes for dumped tables
--

ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel `produk`
--

ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

COMMIT;
