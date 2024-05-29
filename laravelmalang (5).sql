-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 08:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelmalang`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pengiriman`
--

CREATE TABLE `alamat_pengiriman` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `IDGAME` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL,
  `EMAIL` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat_pengiriman`
--

INSERT INTO `alamat_pengiriman` (`id`, `user_id`, `status`, `IDGAME`, `no_tlp`, `EMAIL`, `created_at`, `updated_at`) VALUES
(0, 4, 'utama', '73883298492', '45454545', 'THEOFILUS@GMAIL.COM', '2024-05-29 10:50:40', '2024-05-29 10:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `status_cart` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `status_pengiriman` varchar(255) NOT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `ekspedisi` varchar(255) DEFAULT NULL,
  `subtotal` double(12,2) NOT NULL DEFAULT 0.00,
  `ongkir` double(12,2) NOT NULL DEFAULT 0.00,
  `diskon` double(12,2) NOT NULL DEFAULT 0.00,
  `total` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `no_invoice`, `status_cart`, `status_pembayaran`, `status_pengiriman`, `no_resi`, `ekspedisi`, `subtotal`, `ongkir`, `diskon`, `total`, `created_at`, `updated_at`) VALUES
(1, 4, 'INV 001', 'cart', 'belum', 'belum', NULL, NULL, 215000.00, 0.00, 0.00, 215000.00, '2024-05-29 11:10:54', '2024-05-29 11:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `qty` double(12,2) NOT NULL DEFAULT 0.00,
  `harga` double(12,2) NOT NULL DEFAULT 0.00,
  `diskon` double(12,2) NOT NULL DEFAULT 0.00,
  `subtotal` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `produk_id`, `cart_id`, `qty`, `harga`, `diskon`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 15, 0, 1.00, 15000.00, 0.00, 15000.00, '2024-05-29 11:10:55', '2024-05-29 18:14:38'),
(4, 27, 1, 1.00, 200000.00, 0.00, 200000.00, '2024-05-29 11:14:42', '2024-05-29 11:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `produk_id`, `parent_id`, `rating`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 4, 10, NULL, 3, 'WRWRWW', '2024-05-26 19:24:11', '2024-05-26 19:24:11', NULL),
(1, 2, 2, NULL, 4, 'murah dan terpercaya', '2024-05-15 23:02:04', '2024-05-15 23:02:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `deskripsi_kategori` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama_kategori`, `slug_kategori`, `deskripsi_kategori`, `status`, `foto`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 'FF001', 'DIAMOND FREE FIRE BOOYAH', 'gg-banget', 'GG BANGET', 'publish', NULL, 4, '2024-05-26 19:21:07', '2024-05-26 19:21:07'),
(1, 'JK001', 'JOKI MOBILE LEGEND', 'mantap', 'Joki tercepat dan terpercaya', 'publish', NULL, 2, '2024-05-15 02:36:29', '2024-05-15 02:36:29'),
(2, 'DM001', 'DIAMOND MOBILE LEGEND', 'diamond', 'DIAMOND MURAH DAN TERPERCAYA', 'publish', NULL, 2, '2024-05-15 02:53:52', '2024-05-15 02:53:52'),
(3, 'GC001', 'GENESIS CRYSTALS GENSHIN IMPACT', 'genesis cyrstals', 'GENESIS CRYSTALS MURAH DAN TERPERCAYA', 'publish', NULL, 2, '2024-05-17 03:50:06', '2024-05-17 03:50:06'),
(4, 'PB001', 'PUBG MOBILE', 'gg-banget', 'GG BANGET', 'publish', NULL, 4, '2024-05-26 19:19:42', '2024-05-26 19:19:42'),
(5, 'CC001', 'CLASH OF CLAN MOBILE', 'gg-banget', 'GG BANGET', 'publish', NULL, 4, '2024-05-26 19:20:23', '2024-05-26 19:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_26_123709_create_kategoris_table', 1),
(6, '2022_09_26_124117_create_produks_table', 1),
(7, '2022_09_26_124741_create_images_table', 1),
(8, '2022_09_26_125703_create_slideshows_table', 1),
(9, '2022_09_26_130236_create_produk_promos_table', 1),
(10, '2022_09_26_131915_create_wishlists_table', 1),
(11, '2022_09_26_132642_create_carts_table', 1),
(12, '2022_09_26_132940_create_cart_details_table', 1),
(13, '2022_09_26_133454_create_alamat_pengirimen_table', 1),
(14, '2022_09_26_133738_create_orders_table', 1),
(15, '2022_09_28_043632_create_produk_images_table', 1),
(16, '2022_11_20_144921_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tfilushandy@student.ciputra.ac.id', '$2y$10$NmLjUCf7t1hcKAkuh3AwtOm80RRY6Wir.qDR0sUqSAibkG5xCBdUS', '2024-05-15 02:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `qty` double(12,2) NOT NULL DEFAULT 0.00,
  `satuan` varchar(255) NOT NULL,
  `harga` double(12,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `user_id`, `kode_produk`, `nama_produk`, `slug_produk`, `deskripsi_produk`, `foto`, `qty`, `satuan`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'DM002', '3 DM', '3 diamond', 'DIAMOND MURAH DAN TERPERCAYA', '50orless_MLBB_Diamonds.png', 1000.00, '1', 1000.00, 'publish', '2024-05-15 02:55:23', '2024-05-15 02:55:23'),
(3, 2, 2, 'DM003', '5 DM', '5 diamond', 'DIAMOND MURAH TERPERCAYA', '50orless_MLBB_Diamonds.png', 1000.00, '1', 15000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(4, 3, 2, 'GC001', '8080 GC', '8080 genesis crystals', 'GENESIS CRYSTALS MURAH DAN TERPERCAYA', '6480_Genshin-Impact_Crystals.png', 1000.00, '1', 1465000.00, 'publish', '2024-05-17 02:58:23', '2024-05-18 23:36:23'),
(5, 3, 2, 'GC002', '3880 GC', '3880 genesis crystals', 'GENESIS CRYSTALS MURAH DAN TERPERCAYA', '3280_Genshin-Impact_Crystals.png', 1000.00, '1', 730000.00, 'publish', '2024-05-17 02:58:23', '2024-05-18 23:36:23'),
(6, 3, 2, 'GC003', '2240 GC', '2240 genesis crystals', 'GENESIS CRYSTALS MURAH DAN TERPERCAYA', '1980_Genshin-Impact_Crystals.png', 1000.00, '1', 420000.00, 'publish', '2024-05-17 02:58:23', '2024-05-18 23:36:23'),
(7, 3, 2, 'GC004', '1090 GC', '1090 genesis crystals', 'GENESIS CRYSTALS MURAH DAN TERPERCAYA', '980_Genshin-Impact_Crystals.png', 1000.00, '1', 227000.00, 'publish', '2024-05-17 02:58:23', '2024-05-18 23:36:23'),
(8, 3, 2, 'GC005', '330 GC', '330 genesis crystals', 'GENESIS CRYSTALS MURAH DAN TERPERCAYA', '300_Genshin-Impact_Crystals.png', 1000.00, '1', 70000.00, 'publish', '2024-05-17 02:58:23', '2024-05-18 23:36:23'),
(9, 3, 2, 'GC006', '60 GC', '60 genesis crystals', 'GENESIS CRYSTALS MURAH DAN TERPERCAYA', '60_Genshin-Impact_Crystals.png', 1000.00, '1', 15000.00, 'publish', '2024-05-17 02:58:23', '2024-05-18 23:36:23'),
(10, 3, 2, 'WM007', 'Blessing of the Welkin Moon', 'welkin moon', 'WELKIN MURAH DAN TERPERCAYA', 'genshin-impact-blessings-of-welkinmoon.png', 1000.00, '1', 71000.00, 'publish', '2024-05-17 02:58:23', '2024-05-18 23:36:23'),
(11, 2, 2, 'DM004', '12 DM', '12 diamond', 'DIAMOND MURAH TERPERCAYA', '50orless_MLBB_Diamonds.png', 1000.00, '1', 3000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(12, 2, 2, 'DM005', '19 DM', '19 diamond', 'DIAMOND MURAH TERPERCAYA', '50orless_MLBB_Diamonds.png', 1000.00, '1', 5000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(13, 2, 2, 'DM006', '28 DM', '28 diamond', 'DIAMOND MURAH TERPERCAYA', '50orless_MLBB_Diamonds.png', 1000.00, '1', 75000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(14, 2, 2, 'DM007', '44 DM', '44 diamond', 'DIAMOND MURAH TERPERCAYA', '50orless_MLBB_Diamonds.png', 1000.00, '1', 12000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(15, 2, 2, 'DM008', '59 DM', '59 diamond', 'DIAMOND MURAH TERPERCAYA', '50ormore_MLBB_Diamonds.png', 1000.00, '1', 15000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(16, 2, 2, 'DM009', '85 DM', '85 diamond', 'DIAMOND MURAH TERPERCAYA', '50ormore_MLBB_Diamonds.png', 1000.00, '1', 22000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(17, 2, 2, 'DM010', '170 DM', '170 diamond', 'DIAMOND MURAH TERPERCAYA', '150ormore_MLBB_Diamonds.png', 1000.00, '1', 43000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(18, 2, 2, 'DM011', '240 DM', '240 diamond', 'DIAMOND MURAH TERPERCAYA', '150ormore_MLBB_Diamonds.png', 1000.00, '1', 62000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(19, 2, 2, 'DM012', '296 DM', '296 diamond', 'DIAMOND MURAH TERPERCAYA', '150ormore_MLBB_Diamonds.png', 1000.00, '1', 76000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(20, 2, 2, 'DM013', '408 DM', '408 diamond', 'DIAMOND MURAH TERPERCAYA', '150ormore_MLBB_Diamonds.png', 1000.00, '1', 104000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(21, 2, 2, 'DM014', '568 DM', '568 diamond', 'DIAMOND MURAH TERPERCAYA', '500ormore_MLBB_Diamonds.png', 1000.00, '1', 142000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(22, 2, 2, 'DM015', '875 DM', '875 diamond', 'DIAMOND MURAH TERPERCAYA', '500ormore_MLBB_Diamonds.png', 1000.00, '1', 218000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(23, 2, 2, 'DM016', '2010 DM', '2010 diamond', 'DIAMOND MURAH TERPERCAYA', '1500ormore_MLBB_Diamonds.png', 1000.00, '1', 475000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(24, 2, 2, 'DM017', '4830 DM', '4830 diamond', 'DIAMOND MURAH TERPERCAYA', '5000ormore_MLBB_Diamonds.png', 1000.00, '1', 1140000.00, 'publish', '2024-05-15 02:58:47', '2024-05-15 02:58:47'),
(25, 1, 2, 'JK001', 'Mobile Legends Boost: Master to GM', 'Master to GM', 'JOKI MURAH TERPERCAYA', 'grandmaster.png', 1000.00, '1', 25000.00, 'publish', '2024-05-23 08:20:23', '2024-05-23 08:20:23'),
(26, 1, 2, 'JK002', 'Mobile Legends Boost: GM to Epic', 'GM to Legend', 'JOKI MURAH TERPERCAYA', 'epic.png', 1000.00, '1', 50000.00, 'publish', '2024-05-23 08:20:23', '2024-05-23 08:20:23'),
(26, 1, 2, 'JK003', 'Mobile Legends Boost: Epic to Legend', 'Epic to Legend', 'JOKI MURAH TERPERCAYA', 'legend.png', 1000.00, '1', 100000.00, 'publish', '2024-05-23 08:20:23', '2024-05-23 08:20:23'),
(27, 1, 2, 'JK004', 'Mobile Legends Boost: Legend to Mythic', 'Legend to Mythic', 'JOKI MURAH TERPERCAYA', 'mythic.png', 1000.00, '1', 200000.00, 'publish', '2024-05-23 08:20:23', '2024-05-23 08:20:23'),
(28, 1, 2, 'JK005', 'Mobile Legends Boost: Mythic to Mythical Glory', 'Mythic to Mythical Glory', 'JOKI MURAH TERPERCAYA', 'gloriousmythic.png', 1000.00, '1', 250000.00, 'publish', '2024-05-23 08:20:23', '2024-05-23 08:20:23'),
(29, 1, 2, 'JK006', 'Mobile Legends Boost: Mythical Glory to Immortal', 'Mythical Glory to Immortal', 'JOKI MURAH TERPERCAYA', 'immortal.png', 1000.00, '1', 300000.00, 'publish', '2024-05-23 08:20:23', '2024-05-23 08:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `produk_images`
--

CREATE TABLE `produk_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk_promo`
--

CREATE TABLE `produk_promo` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `harga_awal` decimal(16,2) NOT NULL DEFAULT 0.00,
  `harga_akhir` decimal(16,2) NOT NULL DEFAULT 0.00,
  `diskon_persen` int(11) NOT NULL DEFAULT 0,
  `diskon_nominal` decimal(16,2) NOT NULL DEFAULT 0.00,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `caption_title` varchar(255) DEFAULT NULL,
  `caption_content` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'member',
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'aktif',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `alamat`, `role`, `foto`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rama', 'admin@gmail.com', NULL, '$2y$10$3oToENsglce5suJh59aGuuRyVOOlDr/Gi.c4ZDSGEuQPrKi0XjHhq', '085855317653', 'Singosari, Malang', 'admin', NULL, 'aktif', NULL, '2023-03-03 03:40:16', '2023-03-03 03:40:16'),
(2, 'theofilus', 'tfilushandy@student.ciputra.ac.id', NULL, '$2y$10$o7C4clRRExyBRNjh8MyQt.rMkC/KmRa9IrpnU3gBkfAjLNbhNqV7G', '0895345902896', NULL, 'admin', NULL, 'aktif', NULL, '2024-05-15 02:06:51', '2024-05-15 02:06:51'),
(3, 'theo', 'THEOFILUS@GMAIL.COM', NULL, '$2y$10$WP/HSnMlBQqJaJw4buip4.iOcY1in5XKZs5TAS/cm.8b0e3k3.Xle', '0896324235', NULL, 'member', NULL, 'aktif', NULL, '2024-05-21 01:47:50', '2024-05-21 01:47:50'),
(4, 'admin1', 'admin1@gmail.com', NULL, '$2y$10$YQt3rvoVw.FmN2AGF6A5GeQMHLCcHDyNXaLP5Ii9wC0mW6RXA9Sm6', '089236237283', NULL, 'admin', NULL, 'aktif', NULL, '2024-05-22 23:21:49', '2024-05-22 23:21:49'),
(6, 'user1', 'user1@gmail.com', NULL, '$2y$10$PTVutp3J23K.snUB0qx22..T5c8Xak7upcLA6bp7luxZQ6fzjrPGK', '08923623724283', NULL, 'member', NULL, 'aktif', NULL, '2024-05-22 23:22:44', '2024-05-22 23:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_pengiriman_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`) USING BTREE,
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk_images`
--
ALTER TABLE `produk_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_images_produk_id_foreign` (`produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
