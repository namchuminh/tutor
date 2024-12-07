-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 09:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `gia_sus`
--

CREATE TABLE `gia_sus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `review_count` int(11) NOT NULL DEFAULT 0,
  `fee` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `years_of_experience` int(11) NOT NULL DEFAULT 1,
  `education_level` enum('Sinh Viên','Cử Nhân','Thạc Sĩ','Kỹ Sư','Chuyên Gia','Giáo Viên','Tiến Sĩ','Giáo Sư') NOT NULL DEFAULT 'Giáo Viên',
  `post_status` tinyint(1) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 0,
  `vip_package` varchar(255) DEFAULT NULL,
  `avatar` text NOT NULL,
  `bio` text NOT NULL DEFAULT 'Chưa có thông tin giới thiệu.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gia_sus`
--

INSERT INTO `gia_sus` (`id`, `user_id`, `rating`, `review_count`, `fee`, `area`, `years_of_experience`, `education_level`, `post_status`, `balance`, `vip_package`, `avatar`, `bio`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, 150000, 'Xã Đại Mạch, Huyện Đông Anh, Thành phố Hà Nội', 1, 'Giáo Viên', 0, 4847000, NULL, 'avatars/fAUSizIx3IPMvQu8TU9SZ1ioANNUNh1oCbki0rWo.jpg', 'Chưa có thông tin giới thiệu.', '2024-10-27 02:08:12', '2024-12-05 01:46:01'),
(2, 3, 0, 0, 200000, 'Phường Tân Hưng, Quận 7, Thành phố Hồ Chí Minh', 1, 'Giáo Viên', 0, 490000, NULL, 'avatars/fAUSizIx3IPMvQu8TU9SZ1ioANNUNh1oCbki0rWo.jpg', 'Chưa có thông tin giới thiệu.', '2024-10-27 02:23:23', '2024-12-05 05:30:06'),
(4, 5, 0, 0, 600000, 'Phường Minh Đức, Quận Đồ Sơn, Thành phố Hải Phòng', 1, 'Giáo Viên', 0, 50000, NULL, '', 'Chưa có thông tin giới thiệu.', '2024-10-27 02:30:26', '2024-12-04 01:33:48'),
(5, 6, 0, 0, 600000, 'Thị trấn Võ Xu, Huyện Đức Linh, Tỉnh Bình Thuận', 1, 'Giáo Viên', 0, 0, NULL, '', 'Chưa có thông tin giới thiệu.', '2024-10-27 02:31:10', '2024-10-27 02:31:10'),
(6, 7, 0, 0, 50000, 'Thị Xã Buôn Hồ, Tỉnh Đắk Lắk', 1, 'Giáo Viên', 0, 0, NULL, '', 'Chưa có thông tin giới thiệu.', '2024-10-27 03:28:21', '2024-10-27 03:28:21'),
(7, 10, 0, 0, 15000, 'Thị Xã Buôn Hồ, Tỉnh Đắk Lắk', 4, 'Thạc Sĩ', 0, 0, NULL, 'avatars/fAUSizIx3IPMvQu8TU9SZ1ioANNUNh1oCbki0rWo.jpg', 'gsdgdsg', '2024-12-06 05:56:41', '2024-12-06 05:56:41'),
(8, 11, 0, 0, 150000, 'Xã Ngọc Xá, Huyện Quế Võ, Tỉnh Bắc Ninh', 3, 'Thạc Sĩ', 0, 0, NULL, 'avatars/POGI0t54RJ9xL4HP4kXgt1UVWBqzCpWkVg8ZGL1F.jpg', 'abcde', '2024-12-06 06:06:21', '2024-12-06 06:06:21');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2024_10_24_162003_create_phu_huynhs_table', 2),
(14, '2024_10_24_162216_create_gia_sus_table', 2),
(15, '2024_10_24_162650_create_posts_table', 3),
(17, '2024_10_24_163307_create_reviews_table', 4),
(18, '2024_10_24_163742_create_vip_package_details_table', 4),
(19, '2024_10_24_163954_create_vip_packages_table', 5),
(20, '2024_10_24_164119_create_phu_huynh_details_table', 6),
(21, '2024_10_24_164202_create_gia_su_details_table', 7),
(22, '2024_10_24_164313_create_transactions_table', 8),
(23, '2024_10_24_164559_create_notifications_table', 9),
(24, '2024_10_24_164623_create_comments_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
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
-- Table structure for table `phu_huynhs`
--

CREATE TABLE `phu_huynhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vip_package` varchar(500) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phu_huynhs`
--

INSERT INTO `phu_huynhs` (`id`, `user_id`, `vip_package`, `balance`, `phone_number`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, '', 0, '0399889999', 'Hà Nội', 1, NULL, '2024-11-06 05:18:48'),
(2, 8, '', 247000, '0999888999', 'Tầng 1, Tòa ABC, Đường XYZ, Quận JQK', 1, '2024-12-05 23:50:32', '2024-12-06 22:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `gia_su_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `fee` int(11) NOT NULL DEFAULT 0,
  `status` enum('pending','reject','accept','') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `gia_su_id`, `user_id`, `subject_id`, `title`, `slug`, `description`, `fee`, `status`, `created_at`, `updated_at`) VALUES
(1, 'posts/ZhtlCTlP7unkeMgKRdpUzPK5TAxGpn5C0Qq1UEPe.jpg', 2, 2, 1, 'ABCDE nam', 'abcde-nam', '<p>ABAAAA được</p>', 0, 'accept', '2024-10-27 11:31:28', '2024-12-03 04:48:01'),
(2, 'posts/JOABXH95o8WYwdOxE8bEO23oiq7ebsWExolqhMXS.jpg', 5, 3, 2, 'Bài viết mới', 'bai-viet-moi', '<p>abcde</p>', 15000, 'accept', '2024-10-27 12:17:33', '2024-12-03 01:18:34'),
(3, 'posts/pnJyz1LRT5vABgfFm7z54FkCs3GUakY6razEWbrQ.jpg', 1, 2, 2, 'bài viết gia sư lớp 111', 'bai-viet-gia-su-lop-111', '<p>Nguyễn văn a</p>', 15000, 'accept', '2024-12-03 01:26:14', '2024-12-03 01:43:32'),
(4, 'posts/HUZD04IeL2jZi8TFi1s7ABqdoQXQ7lIL3CLZY03m.jpg', 2, 3, 1, 'Gia sư môn toán tại nhà', 'gia-su-mon-toan-tai-nha', '<p>aaaa</p>', 150000, 'accept', '2024-12-05 05:30:42', '2024-12-06 14:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phu_huynh_id` bigint(20) UNSIGNED NOT NULL,
  `gia_su_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `phu_huynh_id`, `gia_su_id`, `rating`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 3, '2024-11-07 11:56:53', '2024-11-07 11:56:53'),
(3, 1, 1, 4, '2024-12-03 08:51:31', '2024-12-03 08:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Giải Tích 12', 'subjects/zWdAdNORZRUQEMvdHSGIbp36HMdATRTNjU2APioy.jpg', 'giai-tich-12', '2024-11-06 09:06:23', '2024-11-06 03:59:44'),
(2, 'Tiếng Việt 2', 'subjects/uuf6Kh6NDoAm1lIputoI2LmgWZjP0lh8CeRfpZ04.jpg', 'tieng-viet-2', '2024-11-06 03:59:06', '2024-11-06 03:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 150000, 'Gia sư Nguyễn Văn Bình mua gói VIP3', '2024-11-09 19:06:04', '2024-11-09 19:06:04'),
(2, 7, 200000, 'Phụ huynh Nguyễn Văn Giang mua gói VIP1', '2024-11-09 20:06:04', '2024-11-09 19:06:04'),
(3, 2, 10000, 'Gia sư  nạp 10,000 vào tài khoản!', '2024-12-03 02:41:05', '2024-12-03 02:41:05'),
(4, 2, 12000, 'Gia sư  nạp 12,000 vào tài khoản!', '2024-12-03 02:45:59', '2024-12-03 02:45:59'),
(5, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 03:24:39', '2024-12-03 03:24:39'),
(6, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 03:30:50', '2024-12-03 03:30:50'),
(7, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 03:30:53', '2024-12-03 03:30:53'),
(8, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 03:34:59', '2024-12-03 03:34:59'),
(9, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 03:43:47', '2024-12-03 03:43:47'),
(10, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 03:48:07', '2024-12-03 03:48:07'),
(11, 2, -10000, 'Hệ thống trừ 10.000 gia sư mua gói VIP: VIP2', '2024-12-03 03:50:36', '2024-12-03 03:50:36'),
(12, 2, -10000, 'Hệ thống trừ 10.000 gia sư mua gói VIP: VIP2', '2024-12-03 04:17:23', '2024-12-03 04:17:23'),
(13, 2, 5000000, 'Gia sư  nạp 5,000,000 vào tài khoản!', '2024-12-03 04:25:23', '2024-12-03 04:25:23'),
(14, 2, 200000, 'Gia sư  nạp 200,000 vào tài khoản!', '2024-12-03 04:37:11', '2024-12-03 04:37:11'),
(15, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 04:38:09', '2024-12-03 04:38:09'),
(16, 2, -10000, 'Hệ thống trừ 10.000 gia sư mua gói VIP: VIP2', '2024-12-03 04:38:52', '2024-12-03 04:38:52'),
(17, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-03 04:39:36', '2024-12-03 04:39:36'),
(18, 3, 500000, 'Gia sư  nạp 500,000 vào tài khoản!', '2024-12-03 04:52:30', '2024-12-03 04:52:30'),
(19, 2, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-04 01:14:44', '2024-12-04 01:14:44'),
(20, 5, 200000, 'Gia sư  nạp 200,000 vào tài khoản!', '2024-12-04 01:33:34', '2024-12-04 01:33:34'),
(21, 5, -150000, 'Hệ thống trừ 150.000 gia sư mua gói VIP: VIP1', '2024-12-04 01:33:48', '2024-12-04 01:33:48'),
(22, 2, -10000, 'Hệ thống trừ 10.000 gia sư mua gói VIP: VIP2', '2024-12-04 01:34:07', '2024-12-04 01:34:07'),
(23, 3, -10000, 'Hệ thống trừ 10.000 gia sư mua gói VIP: VIP2', '2024-12-05 05:30:06', '2024-12-05 05:30:06'),
(24, 8, 15000, 'Phụ huynh  nạp 15,000 vào tài khoản!', '2024-12-06 13:59:27', '2024-12-06 13:59:27'),
(25, 8, 150000, 'Phụ huynh  nạp 150,000 vào tài khoản!', '2024-12-06 14:07:27', '2024-12-06 14:07:27'),
(26, 8, 10000, 'Phụ huynh  nạp 10,000 vào tài khoản!', '2024-12-06 14:10:18', '2024-12-06 14:10:18'),
(27, 8, 42000, 'Phụ huynh  nạp 42,000 vào tài khoản!', '2024-12-06 14:11:41', '2024-12-06 14:11:41'),
(28, 8, 20000, 'Phụ huynh  nạp 20,000 vào tài khoản!', '2024-12-06 14:12:58', '2024-12-06 14:12:58'),
(29, 8, 10000, 'Phụ huynh  nạp 10,000 vào tài khoản!', '2024-12-06 22:46:36', '2024-12-06 22:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('phu_huynh','gia_su','admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản Trị Viên', 'admin@gmail.com', '0888999888', '2024-10-25 10:49:43', '$2y$10$Vbd/YU.o5o9gII8BViJYMuN3yh25RnPMazLX0ruE8wMG1KyFkUTf6', 'admin', NULL, '2024-10-25 10:49:33', '2024-11-09 12:27:10'),
(2, 'Nguyễn Văn An', 'nguyenvana@gmail.com', '0888777333', NULL, '$2y$10$sSpmLv83F1VsGOggEnNJDuZDqI3IC0O/8hA5N/O0al9P4OoMI55qa', 'gia_su', NULL, '2024-10-27 02:08:12', '2024-12-03 01:59:02'),
(3, 'Nguyễn Văn Bình', 'nguyenvanb@gmail.com', '0333555666', NULL, '$2y$10$NNXneomHkanfl5bjduOGVey1vooSS42GQUugHnx75RcOVLJaN5bBW', 'gia_su', NULL, '2024-10-27 02:23:23', '2024-10-27 03:31:30'),
(5, 'Nguyễn Văn Dũng', 'nguyenvand@gmail.com', '0777888222', NULL, '$2y$10$f2KjdoS/6S5m9BRi01ZwCeOzccC3u0tiSu1Liw8JhDj1XNwp/3dGO', 'gia_su', NULL, '2024-10-27 02:30:26', '2024-10-27 02:30:26'),
(6, 'Nguyễn Văn Em', 'nguyenvane@gmail.com', '0666999888', NULL, '$2y$10$L3YLBTc.sUxVukbe1bOj5Oi7Jv2KvKqcBPNro96a5CH1rS4SpEWP6', 'gia_su', NULL, '2024-10-27 02:31:10', '2024-10-27 02:31:10'),
(7, 'Nguyễn Văn Giang', 'nguyenvang@gmail.com', '0555999888', NULL, '$2y$10$8iK1v5GWDFuFACK3ycWTJuITvr7HdxYAYZJaAVmvMImhi12v5uguq', 'phu_huynh', NULL, '2024-10-27 03:28:21', '2024-10-27 03:28:21'),
(8, 'Nguyễn Văn Zang', 'nguyenvanz@gmail.com', '0999888999', NULL, '$2y$10$HgCyagng7SNPCjbOpkURp.rtOD1O4V.mOGpA7rWzCuA/la8TOtIq.', 'phu_huynh', NULL, '2024-12-05 23:50:32', '2024-12-07 01:07:51'),
(9, 'Nguyễn Văn Ngọc', 'nguyenvann@gmail.com', '0555444666', NULL, '$2y$10$cKxwdXet9kaWLL4NDqF6ROw..YdwK4S/MuGwvL8qHZ4xBuT5EW5em', 'gia_su', NULL, '2024-12-06 05:55:25', '2024-12-06 05:55:25'),
(10, 'Nguyễn Văn Ngọc', 'nguyenvann2@gmail.com', '0555444666', NULL, '$2y$10$mE/Mtmx05WjpzUswaHMgPeK.HkZFNYQxmBShf66lUeaPOw1MNeVDO', 'gia_su', NULL, '2024-12-06 05:56:41', '2024-12-06 05:56:41'),
(11, 'Nguyễn Văn Hưng', 'nguyenvanh@gmail.com', '0555666777', NULL, '$2y$10$.kgjOZvEy35j5AQLKkgH.eXIQIPrvZcIODSOiUJr3/7pd.tLZARR.', 'gia_su', NULL, '2024-12-06 06:06:21', '2024-12-06 06:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `vip_packages`
--

CREATE TABLE `vip_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phu_huynh_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gia_su_id` int(11) DEFAULT NULL,
  `package_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `vip_package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vip_packages`
--

INSERT INTO `vip_packages` (`id`, `phu_huynh_id`, `gia_su_id`, `package_type`, `start_date`, `end_date`, `vip_package_id`, `created_at`, `updated_at`) VALUES
(14, NULL, 4, 'VIP1', '2024-12-04', '2024-12-11', 1, '2024-12-04 01:33:48', '2024-12-04 01:33:48'),
(15, NULL, 1, 'VIP2', '2024-12-04', '2024-12-09', 3, '2024-12-04 01:34:07', '2024-12-04 01:34:07'),
(16, NULL, 2, 'VIP2', '2024-12-05', '2024-12-10', 3, '2024-12-05 05:30:06', '2024-12-05 05:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `vip_package_details`
--

CREATE TABLE `vip_package_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration_days` int(11) NOT NULL,
  `post_number` int(11) NOT NULL DEFAULT 1,
  `benefits` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vip_package_details`
--

INSERT INTO `vip_package_details` (`id`, `package_type`, `price`, `duration_days`, `post_number`, `benefits`, `created_at`, `updated_at`) VALUES
(1, 'VIP1', 150000, 7, 20, 'Gói vip1', '2024-11-07 05:57:01', '2024-11-07 06:00:29'),
(3, 'VIP2', 10000, 5, 20, 'Đăng bài 5 bài', '2024-12-03 03:48:54', '2024-12-03 03:48:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gia_sus`
--
ALTER TABLE `gia_sus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gia_sus_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phu_huynhs`
--
ALTER TABLE `phu_huynhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phu_huynhs_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_gia_su_id_foreign` (`gia_su_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_phu_huynh_id_foreign` (`phu_huynh_id`),
  ADD KEY `reviews_gia_su_id_foreign` (`gia_su_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vip_packages`
--
ALTER TABLE `vip_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vip_packages_phu_huynh_id_foreign` (`phu_huynh_id`),
  ADD KEY `vip_packages_vip_package_id_foreign` (`vip_package_id`);

--
-- Indexes for table `vip_package_details`
--
ALTER TABLE `vip_package_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gia_sus`
--
ALTER TABLE `gia_sus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phu_huynhs`
--
ALTER TABLE `phu_huynhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vip_packages`
--
ALTER TABLE `vip_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vip_package_details`
--
ALTER TABLE `vip_package_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gia_sus`
--
ALTER TABLE `gia_sus`
  ADD CONSTRAINT `gia_sus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phu_huynhs`
--
ALTER TABLE `phu_huynhs`
  ADD CONSTRAINT `phu_huynhs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_gia_su_id_foreign` FOREIGN KEY (`gia_su_id`) REFERENCES `gia_sus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_gia_su_id_foreign` FOREIGN KEY (`gia_su_id`) REFERENCES `gia_sus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_phu_huynh_id_foreign` FOREIGN KEY (`phu_huynh_id`) REFERENCES `phu_huynhs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `vip_packages`
--
ALTER TABLE `vip_packages`
  ADD CONSTRAINT `vip_packages_phu_huynh_id_foreign` FOREIGN KEY (`phu_huynh_id`) REFERENCES `phu_huynhs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vip_packages_vip_package_id_foreign` FOREIGN KEY (`vip_package_id`) REFERENCES `vip_package_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
