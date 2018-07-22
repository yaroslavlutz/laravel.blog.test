-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2018 at 02:15 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blog_test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_short` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images_show` tinyint(1) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `viewed` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `alias`, `description_short`, `description`, `images`, `images_show`, `meta_title`, `meta_description`, `meta_keyword`, `published`, `viewed`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(2, 'Article-1', 'article-1-1006181959', 'У текста также есть определённая композиция (внутренняя структура). Она состоит из зачина (вступления), основной части и заключения. Наличие в тексте основной части обязательно, вступления и заключения - факультативно. Во всех частях последовательно раскрывается содержание текста.', 'У текста также есть определённая композиция (внутренняя структура). Она состоит из зачина (вступления), основной части и заключения. Наличие в тексте основной части обязательно, вступления и заключения - факультативно. Во всех частях последовательно раскрывается содержание текста.У текста также есть определённая композиция (внутренняя структура). Она состоит из зачина (вступления), основной части и заключения. Наличие в тексте основной части обязательно, вступления и заключения - факультативно. Во всех частях последовательно раскрывается содержание текста.У текста также есть определённая композиция (внутренняя структура). Она состоит из зачина (вступления), основной части и заключения. Наличие в тексте основной части обязательно, вступления и заключения - факультативно. Во всех частях последовательно раскрывается содержание текста.', NULL, NULL, 'Мета заголовок-1', 'Мета описание-1', 'Ключевые слова-1', 1, NULL, 1, NULL, '2018-06-10 16:59:58', '2018-06-10 16:59:58'),
(3, 'Article-2', 'article-2-1706180640', '<p>Эта <b>книга</b> адресована всем, кто изучает русский язык. Но состоит она не из правил, упражнений и учебных текстов. Для этого созданы другие замечательные учебники. YES</p>', '<p>Эта <b>книга</b> адресована всем, кто изучает русский язык. Но состоит она не из правил, упражнений и учебных текстов. Для этого созданы другие замечательные учебники. У этой книги совсем иная задача. Она поможет вам научиться не только разговаривать, но и размышлять по-русски. Книга, которую вы держите в руках, составлена из афоризмов и размышлений великих мыслителей, писателей, поэтов, философов и общественных деятелей различных эпох. Их мысли - о тех вопросах, которые не перестают волновать человечество. Вы можете соглашаться или не соглашаться с тем, что прочитаете в этой книге. Возможно, вам покажется, что какие-то мысли уже устарели. Но вы должны обязательно подумать и обосновать, почему вы так считаете.&nbsp; YES</p>', NULL, NULL, 'aaaaaaaaaaaaa++', 'bbbbbbbbbbbbb++', 'cccccccccc++  cccccccccc++  cccccccccc++', 1, NULL, 1, 1, '2018-06-17 03:40:06', '2018-06-17 08:40:55'),
(5, 'Article-5', 'article-3-1706180645', 'xsdsc', 'cdsccec', NULL, NULL, 'eef', 'efefe', 'efef', 1, NULL, 1, NULL, '2018-06-17 03:45:44', '2018-06-17 03:45:44'),
(7, 'fee', 'fee-1706181056', '<p><strong>dsds&nbsp;</strong></p>\r\n\r\n<ol>\r\n	<li>sdsd</li>\r\n	<li>sdsfd f e</li>\r\n	<li>fdfdf</li>\r\n</ol>', '<p><strong>dsds&nbsp;</strong></p>\r\n\r\n<ol>\r\n	<li>sdsd</li>\r\n	<li>sdsfd f e</li>\r\n	<li>fdfdf</li>\r\n</ol>\r\n\r\n<p>czsd nfdsbfrs fd</p>', NULL, NULL, 'cfdfdf', 'dfdfdfdfd', 'fdfdfdf', 1, NULL, 1, NULL, '2018-06-17 07:56:25', '2018-06-17 07:56:25'),
(8, 'efee', 'efee-1706181057', '<p><strong>dsds&nbsp;</strong></p>\r\n\r\n<ol>\r\n	<li>sdsd</li>\r\n	<li>sdsfd f e</li>\r\n	<li>fdfdf</li>\r\n</ol>', '<p><strong>dsds&nbsp;</strong></p>\r\n\r\n<ol>\r\n	<li>sdsd</li>\r\n	<li>sdsfd f e</li>\r\n	<li>fdfdf</li>\r\n</ol>\r\n\r\n<p><em>sdbshv efet r</em></p>', NULL, NULL, 'vdvdd', 'dfdfdfdfdf', 'dfdfdf', 1, NULL, 1, NULL, '2018-06-17 07:57:20', '2018-06-17 07:57:20'),
(9, 'Article-10', 'article-10-1706181203', '<p>edec</p>', '<p>cee</p>', NULL, NULL, 'de', 'cec', 'ce', 1, NULL, 1, NULL, '2018-06-17 09:03:05', '2018-06-17 09:03:05'),
(10, 'Article-11', 'article-11-1706181203', '<p>dewdfef</p>', '<p>eded</p>', NULL, NULL, 'eded', 'efef', 'fefe', 1, NULL, 1, NULL, '2018-06-17 09:03:23', '2018-06-17 09:03:23'),
(11, 'Article-12', 'article-12-1706181203', '<p>cce</p>', '<p>cee</p>', NULL, NULL, 'cec', 'cecec', 'ece', 1, NULL, 1, NULL, '2018-06-17 09:03:45', '2018-06-17 09:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_cat_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_cat_id`, `title`, `alias`, `published`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(6, 0, 'Первая категория', 'pervaya-kategoriya-0906181115', 1, NULL, NULL, '2018-06-09 08:15:00', '2018-06-09 08:15:00'),
(7, 0, 'Вторая категория', 'vtoraya-kategoriya-0906181115', 1, NULL, NULL, '2018-06-09 08:15:14', '2018-06-09 08:15:14'),
(8, 0, 'Третья категория', 'tretya-kategoriya-0906181115', 1, NULL, NULL, '2018-06-09 08:15:29', '2018-06-09 08:15:29'),
(9, 7, '__1111', '1111-0906181115', 1, NULL, NULL, '2018-06-09 08:15:50', '2018-06-09 08:15:50'),
(10, 7, '__2222', '2222-0906181116', 1, NULL, NULL, '2018-06-09 08:16:08', '2018-06-09 08:16:08'),
(11, 0, 'ssdd', 'ssdd-1006181939', 1, NULL, NULL, '2018-06-10 16:39:21', '2018-06-10 16:39:21'),
(12, 8, 'fdfgg++dede', 'fdfggdede-1706180644', 1, NULL, NULL, '2018-06-17 03:44:04', '2018-06-17 03:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `categoryables`
--

CREATE TABLE `categoryables` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `categoryable_id` int(11) NOT NULL,
  `categoryable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryables`
--

INSERT INTO `categoryables` (`id`, `category_id`, `categoryable_id`, `categoryable_type`) VALUES
(2, 6, 2, 'App\\Article'),
(3, 7, 2, 'App\\Article'),
(5, 6, 8, 'App\\Article'),
(6, 7, 8, 'App\\Article'),
(9, 6, 3, 'App\\Article'),
(10, 8, 3, 'App\\Article'),
(14, 7, 9, 'App\\Article'),
(15, 6, 10, 'App\\Article'),
(16, 7, 10, 'App\\Article'),
(17, 8, 10, 'App\\Article'),
(18, 6, 11, 'App\\Article'),
(19, 7, 11, 'App\\Article');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_03_104403_create_categories_table', 2),
(4, '2018_06_09_112704_create_articles_table', 3),
(5, '2018_06_10_110755_create_categoryable_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$CXB6uKBLrur2NNXeSXQjvuQvfyOyGkkUxt6zbhR6erBNiR5ZEXTpm', 'YNOR6HXgKpdfGFfFPOH5zVpPmmbuQeeA8jresqruWiIZ9vpgSuq7HanDDsYm', '2018-06-03 06:13:15', '2018-06-03 06:13:15'),
(2, 'littus', 'littus@i.ua', '$2y$10$N7za8itrJ71eYLlDa2MBf.FJBA6JJB6UTcd73oGPmY6CIWrr1SQs.', NULL, '2018-07-21 11:15:01', '2018-07-21 13:06:59'),
(3, 'fatHomer', 'homer@mail.us', '$2y$10$38TUJZBd.Iv2hUWhaBunM.8jVaYbCJUngHLmMtYwR2AoRnlv.BgBe', 'KU3NQ0KDQvcxoBydxJ6PYYCRIcYHkYpIqaUGyH5qmloBdoaCGer9qNgbxOX3', '2018-07-21 11:58:24', '2018-07-21 13:06:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_alias_unique` (`alias`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_alias_unique` (`alias`);

--
-- Indexes for table `categoryables`
--
ALTER TABLE `categoryables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `categoryables`
--
ALTER TABLE `categoryables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
