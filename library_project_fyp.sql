-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 04:57 PM
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
-- Database: `library_project_fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` text NOT NULL,
  `feedback` text DEFAULT NULL,
  `vocabulary` tinyint(4) DEFAULT NULL,
  `inference` tinyint(4) DEFAULT NULL,
  `prediction` tinyint(4) DEFAULT NULL,
  `explanation` tinyint(4) DEFAULT NULL,
  `retrieval` tinyint(4) DEFAULT NULL,
  `summarise` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `name`, `book_id`, `student_id`, `teacher_id`, `status`, `feedback`, `vocabulary`, `inference`, `prediction`, `explanation`, `retrieval`, `summarise`, `created_at`, `updated_at`) VALUES
(114, 'Character Exploration', 75, 120, 114, 'Pending Feedback', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-27 15:14:05', '2025-04-27 15:19:45'),
(115, 'Weather Questions', NULL, 120, 114, 'Not Completed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-27 15:14:32', '2025-04-27 15:14:32'),
(116, 'Summarise the book', NULL, 120, 114, 'Not Completed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-27 15:14:45', '2025-04-27 15:14:45'),
(117, 'Explain the story', 75, 120, 114, 'Completed', 'Correct, can give more details from the story about it. Explain how Sebastian read \'The Lord of the flies\' before hand and he\'s proud he\'s doing better.', 3, 4, 2, 4, 2, 3, '2025-04-27 15:15:07', '2025-04-27 15:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `assignments_questions`
--

CREATE TABLE `assignments_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED DEFAULT NULL,
  `answer_field` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments_questions`
--

INSERT INTO `assignments_questions` (`id`, `assignment_id`, `question_id`, `answer_field`, `created_at`, `updated_at`) VALUES
(119, 114, 31, 'Sebastian Sunrise, Lina and Étienne.', '2025-04-27 15:14:05', '2025-04-27 15:19:45'),
(120, 115, 30, NULL, '2025-04-27 15:14:32', '2025-04-27 15:14:32'),
(121, 116, 32, NULL, '2025-04-27 15:14:45', '2025-04-27 15:14:45'),
(122, 117, 33, 'It takes place in an island because the ship has crashed.', '2025-04-27 15:15:07', '2025-04-27 15:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `or_level` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `created_at`, `updated_at`, `publisher`, `author`, `title`, `genre`, `category`, `description`, `or_level`, `content`, `image`) VALUES
(74, '2025-04-27 14:08:12', '2025-04-27 14:08:12', 'Random House Books', 'Dr Seuss', 'Cat in the Hat', NULL, 'Fiction', 'The Cat in the Hat came to play one rainy, nothing-to-do afternoon.', '11', 'A rainy day turns into a wild romp when the Cat in the Hat and his troublemaking friends, Thing One and Thing Two, unexpectedly appear! \r\n\"I know some new tricks,\" said the Cat in the Hat. \"A lot of good tricks. I will show them to you. Your mother will not mind at all if I do.\"', '1745766492.jpg'),
(75, '2025-04-27 14:10:14', '2025-04-27 14:10:14', 'Usborne Publishing Ltd', 'Jenny Pearson', 'Shipwrecked', NULL, 'Fiction', 'Three kids face shipwrecks, survival and pirates in the latest adventure from bestselling and award-winning author Jenny Pearson.', '10', 'Sebastian Sunrise and his two best friends, Lina and Étienne, are in a bit of trouble. They are stranded on a desert island in the middle of the Pacific Ocean, after a rowing race went very, very wrong.\r\n\r\nThe friends have no idea how long they might have to stay on the island, so they make a plan. They will try to survive, look after the island\'s baby turtles, and have fun, if they can.\r\n\r\nBut Sebastian\'s life has never gone to plan, and they quickly face jellyfish stings, burnt bums and an out-of-control goat. But when a boat arrives, bringing pirates who want to hunt the island\'s baby turtles, the friends face their greatest danger yet...', '1745766614.jpg'),
(76, '2025-04-27 14:12:51', '2025-04-27 14:12:51', 'Puffin Books', 'Nathan Bryon', 'Look Up!', NULL, 'Fiction', 'Look Up! by Nathan Bryon and Dapo Adeola features science-crazed chatterbox Rocket, who is determined to get her whole town out watching a meteor shower - to the annoyance of her big brother, who would rather stay glued to his phone.', '9', 'Meet hilarious, science-mad chatterbox, Rocket - she\'s going to be the greatest astronaut, star-catcher, space-traveller that has ever lived!\r\nBut... can she convince her big brother to stop looking down at his phone and start LOOKING UP at the stars?\r\n\r\nBursting with energy and passion about science and space, this heart-warming, inspirational picture book will have readers turning off their screens and switching on to the outside world.', '1745766771.jpg'),
(77, '2025-04-27 14:14:55', '2025-04-27 14:14:55', 'Usborne Picture Books', 'Russell Punter', 'The Dinosaur Who Lost His Roar', NULL, 'Fiction', 'Sid the dinosaur likes scaring his friends with his ear-splitting roar. But what would happen if he lost his voice? He\'s about to find out.', '8', 'This is a new, picture book version of one of the most popular titles in the \"First Reading\" series. Sid the dinosaur likes scaring his friends with his ear-splitting roar. But what would happen if he lost his voice? He\'s about to find out. This title comes now with rhyming text to add an extra level of interest and enjoyment. It features bright, animated, contemporary illustrations that bring the story to life.', '1745766895.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_genre`
--

CREATE TABLE `book_genre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `genre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_genre`
--

INSERT INTO `book_genre` (`id`, `book_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(82, 74, 16, NULL, NULL),
(83, 74, 18, NULL, NULL),
(84, 75, 16, NULL, NULL),
(85, 76, 15, NULL, NULL),
(86, 77, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmai.com|127.0.0.1', 'i:1;', 1745832764),
('admin@gmai.com|127.0.0.1:timer', 'i:1745832764;', 1745832764),
('shusanttamang@outlook.com|127.0.0.1', 'i:1;', 1745573085),
('shusanttamang@outlook.com|127.0.0.1:timer', 'i:1745573085;', 1745573085),
('student@gmail.com|127.0.0.1', 'i:1;', 1745851959),
('student@gmail.com|127.0.0.1:timer', 'i:1745851959;', 1745851959),
('student10@outlook.com|127.0.0.1', 'i:1;', 1741197833),
('student10@outlook.com|127.0.0.1:timer', 'i:1741197833;', 1741197833),
('teacher@gmail.com|127.0.0.1', 'i:1;', 1745840229),
('teacher@gmail.com|127.0.0.1:timer', 'i:1745840229;', 1745840229),
('teacher1@gmail.com|127.0.0.1', 'i:5;', 1745767624),
('teacher1@gmail.com|127.0.0.1:timer', 'i:1745767624;', 1745767624);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_notes`
--

CREATE TABLE `class_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `class_topics` varchar(255) DEFAULT NULL,
  `class_objectives` text NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `form_class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_notes`
--

INSERT INTO `class_notes` (`id`, `title`, `date`, `class_topics`, `class_objectives`, `teacher_id`, `form_class_id`, `created_at`, `updated_at`) VALUES
(19, 'Characters and Environments', '2025-04-27', 'Explore themes of the book.\r\nExplore different writing styles.', 'Find evidence within the text that supports your point.', 114, 11, '2025-04-27 15:17:09', '2025-04-27 15:17:09');

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
-- Table structure for table `form_classes`
--

CREATE TABLE `form_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `substitute_teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_classes`
--

INSERT INTO `form_classes` (`id`, `class_name`, `teacher_id`, `substitute_teacher_id`, `created_at`, `updated_at`) VALUES
(10, 'Class 1-A', 119, NULL, '2025-04-27 13:34:08', '2025-04-27 14:27:45'),
(11, 'Class 2-B', 114, NULL, '2025-04-27 13:34:17', '2025-04-27 13:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `created_at`, `updated_at`) VALUES
(15, 'Space', '2025-04-27 13:35:08', '2025-04-27 13:35:08'),
(16, 'Adventure', '2025-04-27 13:35:16', '2025-04-27 13:35:16'),
(17, 'Dinosaurs', '2025-04-27 13:35:23', '2025-04-27 13:35:23'),
(18, 'Comedy', '2025-04-27 13:35:32', '2025-04-27 13:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `genre_user`
--

CREATE TABLE `genre_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre_user`
--

INSERT INTO `genre_user` (`id`, `genre_id`, `user_id`, `created_at`, `updated_at`) VALUES
(123, 16, 115, NULL, NULL),
(125, 17, 117, NULL, NULL),
(128, 16, 118, NULL, NULL),
(129, 18, 118, NULL, NULL),
(130, 15, 116, NULL, NULL),
(131, 16, 120, NULL, NULL),
(132, 18, 120, NULL, NULL),
(133, 17, 120, NULL, NULL),
(134, 15, 120, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_13_153655_create_students_table', 1),
(5, '2025_01_14_122751_add__date__of__birth_to_users_table', 1),
(6, '2025_01_14_130938_add_role_to_users_table', 1),
(7, '2025_01_16_124258_add_additonal_users_fields_to_users', 1),
(8, '2025_01_16_140045_create_notes_table', 1),
(9, '2025_01_19_155434_create_books_table', 1),
(10, '2025_01_19_155455_create_reviews_table', 1),
(11, '2025_01_22_165704_add_created_to_assigned_to_to_notes_table', 1),
(12, '2025_01_25_164035_add_fields_to_books_table', 1),
(13, '2025_01_25_193815_add_content_to_books_table', 1),
(14, '2025_01_29_134406_add_image_to_books_table', 1),
(15, '2025_01_29_172741_add__f_k_book_id_to_users_table', 1),
(16, '2025_01_31_125230_create_genres_table', 1),
(17, '2025_01_31_150939_create_book_genres', 1),
(18, '2025_02_01_195252_create_genre_user', 1),
(19, '2025_02_03_210333_drop_notes_table', 1),
(20, '2025_02_03_210944_create_notes_table', 1),
(22, '2025_02_14_124402_create_questions_table', 2),
(25, '2025_02_22_133829_create_assignments_table', 3),
(26, '2025_02_26_135657_drop_assignmentstable', 4),
(27, '2025_02_26_140553_create_assignments_table', 5),
(28, '2025_02_26_140721_create_assignments_questions_table', 6),
(29, '2025_02_26_142828_alter_datatype_status', 7),
(30, '2025_03_05_112349_drop_feedback_column', 8),
(31, '2025_03_05_112459_add_feedback_column_to_assignments', 9),
(32, '2025_03_05_124114_alter_feedback_datatype_assignments', 10),
(33, '2025_03_10_145331_add_columns_to_reviews', 11),
(34, '2025_03_12_134804_create_form_classes_table', 12),
(35, '2025_03_12_135304_add_assigned_class', 13),
(36, '2025_03_12_135705_rename_id', 14),
(37, '2025_03_12_142912_create_form_classes_teacher', 15),
(38, '2025_03_12_160252_drop_form_classes_teachers', 16),
(39, '2025_03_12_160450_add_teacher_id_to_form_classes', 17),
(40, '2025_03_12_162516_add_substitute_teacher_to_form_classes', 18),
(41, '2025_04_24_135422_create_class_notes_table', 19),
(47, '2025_04_25_185418_rename_content_to_class_topics_table', 20),
(48, '2025_04_25_185516_add_new_column_class_objectives_table', 21),
(51, '2025_04_25_195238_make_added_vipers_columns_nullable', 22),
(53, '2025_04_25_201751_change_feedback_column_type_to_text', 23),
(54, '2025_04_25_221140_rename_content_to_objectives_comments_table', 24),
(55, '2025_04_25_221404_add_more_fields_to_notes_columns', 25),
(56, '2025_04_25_225029_add_foreign_keys_class_notes_and_assignments_to_notes', 26),
(57, '2025_04_26_184220_delete_form_classes_cascade', 27),
(58, '2025_04_26_203931_add_new_column_student_class_id', 28),
(64, '2025_04_26_212547_rename_column', 29);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `objectives_comments` text NOT NULL,
  `reading_ability_progress` text NOT NULL,
  `vipers_progress` text NOT NULL,
  `class_objectives` tinytext NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_notes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assignment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_class_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `date`, `objectives_comments`, `reading_ability_progress`, `vipers_progress`, `class_objectives`, `teacher_id`, `student_id`, `created_at`, `updated_at`, `class_notes_id`, `assignment_id`, `student_class_id`) VALUES
(42, 'Week 1: Characters and Environments Report', '2025-04-27', 'Evidence not used from the text to support the points of the answers.', 'Student has shown good ability to read at this level.', 'Inference and explanation were good however needs to be backed by points, which is why they were scored low on retrieval and prediction.', 'maintain', 114, 120, '2025-04-27 15:29:40', '2025-04-27 15:29:40', 19, 117, 11);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_text` varchar(255) DEFAULT NULL,
  `question_type` varchar(255) DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `question_type`, `book_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(30, 'What was the weather like outside? How did that make everyone feel?', 'Inference', 74, 13, '2025-04-27 14:18:28', '2025-04-27 14:19:07'),
(31, 'What are the main characters of the book called?', 'Retrieval', 76, 13, '2025-04-27 14:20:29', '2025-04-27 14:20:29'),
(32, 'What was the whole book about?', 'Summary', 77, 13, '2025-04-27 14:20:53', '2025-04-27 14:20:53'),
(33, 'Where does the story take place and why?', 'Explanation', 75, 13, '2025-04-27 14:22:10', '2025-04-27 14:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `created_at`, `updated_at`, `book_id`, `student_id`, `rating`, `comment_text`) VALUES
(16, '2025-04-27 14:48:56', '2025-04-27 14:48:56', 75, 120, 5, 'Great adventuring book about being on an island.'),
(17, '2025-04-27 14:49:39', '2025-04-27 14:49:39', 76, 120, 4, 'Lots of things about space, very good book');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('i4V7joci8PhIRhoYyS0PXfsAOh2pbKtnenyWj6jx', 120, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidmpPSnBpVU1STDJrTjNxZ3kwQ21kc3hNQjRraVROUXZxRW9kbHBocyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jcmVhdGVyZXZpZXcvMTIwIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTIwO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0NTg1MjExNzt9fQ==', 1745852126);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `or_level` varchar(255) DEFAULT NULL,
  `current_book_name` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `assigned_class` varchar(255) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `date_of_birth`, `role`, `or_level`, `current_book_name`, `topic`, `assigned_class`, `interests`, `book_id`) VALUES
(13, 'admin', 'admin@gmail.com', NULL, '$2y$12$gpxT6FwJiK8qglynWkrd5.YpeQuNBNLnKncsVgU8lnX0fqq.lOg2O', NULL, '2025-01-15 15:41:30', '2025-01-15 15:41:30', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Mr. Smith', 'teacher2@gmail.com', NULL, '$2y$12$LSrdMNkY86419qsFwpNLHuPhBOwSVKZJUJDr6ms/tHj885My4GoaC', NULL, '2025-04-27 13:33:48', '2025-04-27 13:33:48', '1984-01-10', 'teacher', NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Barry Bullock', 'student1@gmail.com', NULL, '$2y$12$4QFE6Mzf04EAqGfmNkWQ3e6I9jqOVqYwf3ymtpN/sX4Ip4PfFz4Wm', NULL, '2025-04-27 13:39:59', '2025-04-27 14:31:41', '2014-10-15', 'student', '10', NULL, NULL, '10', NULL, NULL),
(116, 'Damian Mccormick', 'student2@gmail.com', NULL, '$2y$12$cG93fdG1qmqExxvHiaj4v.SvOi3GBFWtpquc3KxQ3bs2y/q3EqvMe', NULL, '2025-04-27 13:57:15', '2025-04-27 14:31:13', '2014-01-29', 'student', '8', NULL, NULL, '10', NULL, NULL),
(117, 'Connor Dawson', 'student3@gmail.com', NULL, '$2y$12$/S9evYCuKi.GqctdSdcC5eHR3DlO9BRvFWIsEJBI0eTxM3J8y623S', NULL, '2025-04-27 14:00:11', '2025-04-27 14:32:36', '2014-06-12', 'student', '8', NULL, NULL, '11', NULL, NULL),
(118, 'Elena Walker', 'student4@gmail.com', NULL, '$2y$12$xeYSOAThfkb0GICvcbW7X.pVT4dG8zPdxMzAftZIrLSvroFFdsIka', NULL, '2025-04-27 14:01:17', '2025-04-27 14:38:12', '2014-02-06', 'student', '11', NULL, NULL, '10', NULL, NULL),
(119, 'Miss Orchid', 'teacher3@gmail.com', NULL, '$2y$12$IjncIkiIKVQodfuYneygyuXDke/cZT3af86tGrWcph81SKZmhku5u', NULL, '2025-04-27 14:27:33', '2025-04-27 14:27:33', '1997-11-14', 'teacher', NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'James Adams', 'student5@gmail.com', NULL, '$2y$12$mmaRyyImBwxL/xCJ/5C6HufD7E8YzAgTK/DEhuOigetRbpAvDS/ci', NULL, '2025-04-27 14:37:52', '2025-04-28 09:38:42', '2014-10-10', 'student', '10', 'Shipwrecked', NULL, '11', NULL, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_book_id_foreign` (`book_id`),
  ADD KEY `assignments_student_id_foreign` (`student_id`),
  ADD KEY `assignments_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `assignments_questions`
--
ALTER TABLE `assignments_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_questions_assignment_id_foreign` (`assignment_id`),
  ADD KEY `assignments_questions_question_id_foreign` (`question_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_genre_book_id_foreign` (`book_id`),
  ADD KEY `book_genre_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `class_notes`
--
ALTER TABLE `class_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_notes_teacher_id_foreign` (`teacher_id`),
  ADD KEY `class_notes_form_class_id_foreign` (`form_class_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_classes`
--
ALTER TABLE `form_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_classes_substitute_teacher_id_foreign` (`substitute_teacher_id`),
  ADD KEY `form_classes_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre_user`
--
ALTER TABLE `genre_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_user_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_teacher_id_foreign` (`teacher_id`),
  ADD KEY `notes_student_id_foreign` (`student_id`),
  ADD KEY `notes_class_notes_id_foreign` (`class_notes_id`),
  ADD KEY `notes_assignment_id_foreign` (`assignment_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_book_id_foreign` (`book_id`),
  ADD KEY `questions_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_book_id_foreign` (`book_id`),
  ADD KEY `reviews_student_id_foreign` (`student_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_book_id_foreign` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `assignments_questions`
--
ALTER TABLE `assignments_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `class_notes`
--
ALTER TABLE `class_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_classes`
--
ALTER TABLE `form_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `genre_user`
--
ALTER TABLE `genre_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignments_questions`
--
ALTER TABLE `assignments_questions`
  ADD CONSTRAINT `assignments_questions_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_questions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD CONSTRAINT `book_genre_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_genre_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_notes`
--
ALTER TABLE `class_notes`
  ADD CONSTRAINT `class_notes_form_class_id_foreign` FOREIGN KEY (`form_class_id`) REFERENCES `form_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_notes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_classes`
--
ALTER TABLE `form_classes`
  ADD CONSTRAINT `form_classes_substitute_teacher_id_foreign` FOREIGN KEY (`substitute_teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `genre_user`
--
ALTER TABLE `genre_user`
  ADD CONSTRAINT `genre_user_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `genre_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_class_notes_id_foreign` FOREIGN KEY (`class_notes_id`) REFERENCES `class_notes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
