-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 08:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bapenda`
--

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
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `amenities` varchar(255) DEFAULT NULL,
  `revenue` bigint(20) NOT NULL,
  `tax_rate` double(8,2) NOT NULL,
  `tax_id_number` varchar(255) NOT NULL,
  `tax_due_date` date NOT NULL,
  `last_tax_payment` date DEFAULT NULL,
  `is_tax_paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `user_id`, `name`, `email`, `phone`, `address`, `rating`, `amenities`, `revenue`, `tax_rate`, `tax_id_number`, `tax_due_date`, `last_tax_payment`, `is_tax_paid`, `created_at`, `updated_at`) VALUES
(1, 4, 'Hotel Elresas', 'elresas@care.co.id', '201900', 'Jl. KH. Ahmad Dahlan No.24, Kauman, Sidoharjo, Lamongan, Jawa Timur, 62214', '3', 'Free Wi-Fi, Longue Bar, Live Music, AC, Parkir', 237450700, 3.50, '11002201', '2024-06-17', '2024-05-11', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(2, 2, 'Hotel Grand Mahkota', 'mahkota@grand.co.id', '1221500', 'Jl. Suanan Drajat No.4-8, Kauman, Sidoharjo, Lamongan, Jawa Timur, 62214', '4', 'Free Wi-Fi, AC, Longue Bar, Parkir, Sarapan', 282011500, 4.00, '11002202', '2024-06-20', '2024-05-15', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(3, 3, 'OYO 3434 Keluarga Syariah', 'oyo@syariah.co.id', '2305450', 'Jl. Merpati No.61, Krajan, Banjarmendalan, Lamongan, Jawa Timur, 62211', '3', 'Free Wi-Fi, Parkir, AC', 102011500, 2.00, '11002203', '2024-06-15', '2024-05-11', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(4, 3, 'OYO 3706 Griya Tentrem', 'oyogriya@tentrem.co.id', '23055041', 'Jl. Veteran No.150, Tlogoanyar, Lamongan, Jawa Timur, 62211', '3', 'Free Wi-Fi, Parkir, AC', 105170500, 2.00, '11002204', '2024-06-17', '2024-05-12', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(5, 4, 'OYO 3702 Homestay Bougenvile', 'oyo@bougenvile.co.id', '23054011', 'Jl. Sumargo, Gg. Bougenvile No.26, Lamongan, Jawa Timur, 62265', '3', 'Free Wi-Fi, Parkir, AC', 110210700, 2.00, '11002205', '2024-06-18', '2024-05-10', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(6, 3, 'Hotel Wijaya', 'wijaya@hotel.co.id', '2090991', 'Jl. Lamongrejo No.59, Lamongan, Jawa Timur, 62265', '2', 'Free Wi-Fi, Parkir', 83022500, 1.30, '11002206', '2024-06-25', '2024-05-17', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(7, 2, 'Mahkota Hotel', 'mahkota@hotel.co.id', '12102050', 'Jl. Lamongrejo No.99, Lamongan, Jawa Timur, 60000', '3', 'Free Wi-Fi, Lounge, AC, Parkir', 103022500, 2.50, '11002207', '2024-06-18', '2024-05-11', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(8, 4, 'Kabila Hotel', 'kabila@hotel.co.id', '2800100', 'Jl. Panglima Sudirman Kav.1, Dapur Utara, Sidokumpul, Lamongan, Jawa Timur, 62212', '3', 'Free Wi-Fi, AC, Parkir, Sarapan', 134052800, 3.00, '11002208', '2024-06-15', '2024-05-09', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03'),
(9, 2, 'Hotel Bougenvile Syariah', 'bougenvile@hotel.co.id', '110750', 'Jl. Jaksa Agung Suprapto, Sarirejo, Lamongan, Jawa Timur, 62212', '3', 'Free Wi-Fi, AC, Parkir, Sarapan', 117201900, 3.00, '11002209', '2024-06-17', '2024-05-11', 0, '2024-06-03 06:23:03', '2024-06-03 06:23:03');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_14_125458_create_restaurants_table', 1),
(6, '2024_05_29_114756_create_hotels_table', 1),
(7, '2024_05_29_171728_create_permission_tables', 1),
(8, '2024_06_03_030206_create_pembayarans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hotel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ammount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'editor admin', 'web', '2024-06-02 22:26:29', '2024-06-02 22:26:29'),
(2, 'editor user', 'web', '2024-06-02 22:26:29', '2024-06-02 22:26:29');

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
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `opening_hours` varchar(255) DEFAULT NULL,
  `closing_hours` varchar(255) DEFAULT NULL,
  `revenue` bigint(20) NOT NULL,
  `tax_rate` double(8,2) NOT NULL,
  `tax_id_number` varchar(255) NOT NULL,
  `tax_due_date` date NOT NULL,
  `last_tax_payment` date DEFAULT NULL,
  `is_tax_paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `user_id`, `name`, `email`, `phone`, `address`, `opening_hours`, `closing_hours`, `revenue`, `tax_rate`, `tax_id_number`, `tax_due_date`, `last_tax_payment`, `is_tax_paid`, `created_at`, `updated_at`) VALUES
(25, 2, 'Onnea Bar & Lounge', 'onnea@care.co.id', '2750020', 'Jl. Soewoko No. 150, Kauman, Sidoharjo, Lamongan, Jawa Timur, 62217', '16:00 WIB', '23:00 WIB', 185450700, 2.00, '22059001', '2024-06-25', '2024-05-20', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(26, 2, 'Shichi Japanese Eatery', 'shici@eatery.co.id', '2905001', 'Jl. Dokter Wahidin Sudiro Husodo No.129, Lamongan, Jawa Timur, 62211', '09:00 WIB', '22:00 WIB', 135406200, 1.70, '22059002', '2024-06-20', '2024-05-13', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(27, 4, 'PHD Lamongrejo', 'customer@phd.co.id', '1400500', 'Jl. Lamongrejo No.84, Lamongan, Jawa Timur, 62213', '10:00 WIB', '22:00 WIB', 287206250, 4.00, '22059003', '2024-06-23', '2024-05-17', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(28, 4, 'KFC Plaza Lamongan', 'hallo@kfc.co.id', '1700400', 'Jl. Panglima Sudirman No.184, Dapur Timur, Lamongan, Jawa Timur, 62217', '10:00 WIB', '22:00 WIB', 235206200, 3.00, '22059004', '2024-06-20', '2024-05-07', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(29, 2, 'Ayam Rekoso Basrah Lamongan', 'ayam@rekoso.co.id', '3030200', 'Jl. Basuki Rahmat No.35, Rangge, Sukomulyo, Lamongan, Jawa Timur, 62216', '10:00 WIB', '22:00 WIB', 120256220, 1.50, '22059005', '2024-06-18', '2024-05-10', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(30, 2, 'Ayam Rekoso Kombespol', 'ayam@rekosos.co.id', '3030201', 'Jl. Kombespol M Duriat, Jetis, Lamongan, Jawa Timur, 62211', '10:00 WIB', '22:00 WIB', 172256000, 1.50, '22059006', '2024-06-18', '2024-05-11', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(31, 3, 'Dapur Roti dan Dapur Kopi', 'bakery@dapur.co.id', '1002003', 'Jl. Sunan Drajat No.54, Kauman, Sidoharjo, Lamongan, Jawa Timur, 62217', '09:00 WIB', '21:00 WIB', 201200100, 1.70, '22059007', '2024-06-17', '2024-05-09', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(32, 4, 'Ayam & Bebek Jendral', 'bebek@jendral.co.id', '2244005', 'Jl. Sunan Giri Ruko LTC Blok A No. 6-7, Tumenggung Baru, Tumenggungan, Lamongan, Jawa Timur, 62214', '08:00 WIB', '21:30 WIB', 103450700, 1.50, '22059008', '2024-06-20', '2024-05-13', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(33, 3, 'Lazatto Basuki Rahmat', 'lazato@support.co.id', '11564005', 'Jl. Basuki Rahmat No.146, Rangge, Sukorejo, Lamongan, Jawa Timur, 62216', '09:00 WIB', '21:00 WIB', 95450700, 1.00, '22059009', '2024-06-22', '2024-05-15', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(34, 4, 'Rumah Makan Cokro', 'customer@cokro.co.id', '17002090', 'Jl. HOS Cokroaminoto No. 28, Bandung, Sukorejo, Lamongan, Jawa Timur, 62215', '10:00 WIB', '23:00 WIB', 101050220, 1.20, '22059010', '2024-06-18', '2024-05-10', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(35, 2, 'Ayam Geprek Sai Veteran Lamongan', 'ayam@preksai.co.id', '13002500', 'Jl. Veteran, Jetis, Lamongan, Jawa Timur, 62212', '09:00 WIB', '21:30 WIB', 153050800, 1.70, '22059011', '2024-06-15', '2024-05-05', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48'),
(36, 2, 'Ayam Geprek Sai Lamongan 2', 'ayam2@preksai.co.id', '13002501', 'Jl. Sunan Drajat No.16, Kauman, Sidoharjo, Lamongan, Jawa Timur, 62212', '09:00 WIB', '21:00 WIB', 120170200, 1.20, '22059012', '2024-06-16', '2024-05-05', 0, '2024-06-03 05:31:48', '2024-06-03 05:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-06-02 22:26:29', '2024-06-02 22:26:29'),
(2, 'user', 'web', '2024-06-02 22:26:29', '2024-06-02 22:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$8dBRNypuuCx9wTQGms4.b.5MoJNVetH/nInOAXC2ANrI6ZlOUIDum', NULL, '2024-06-02 22:26:29', '2024-06-02 22:26:29'),
(2, 'adit', 'adit@gmail.com', NULL, '$2y$12$Cz5O7HfaHJ.z465jkmpTGOxUpnFgqtO2Ea9xUM/Wz9fzuaRFagD82', NULL, '2024-06-02 22:26:30', '2024-06-02 22:26:30'),
(3, 'budi', 'budi@gmail.com', NULL, '$2y$12$7kLr0h2aVZ31Dj4r6dHO8O863rf.Hgz2RgLBhNeCSPJrWj8DG39Ku', NULL, '2024-06-02 22:26:30', '2024-06-02 22:26:30'),
(4, 'joni', 'joni@gmail.com', NULL, '$2y$12$u5dgbE8XZzPx0Io/Z2BraOqF3gtCmfdyVKs1JoATacGGTh8jgGdTO', NULL, '2024-06-02 22:26:30', '2024-06-02 22:26:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD UNIQUE KEY `hotels_email_unique` (`email`),
  ADD KEY `hotels_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `pembayarans_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD UNIQUE KEY `restaurants_email_unique` (`email`),
  ADD KEY `restaurants_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayarans_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
