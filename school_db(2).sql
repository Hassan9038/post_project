-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2022 at 02:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answered_tests`
--

CREATE TABLE `answered_tests` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `submitted` tinyint(1) NOT NULL DEFAULT 0,
  `submitted_date` datetime DEFAULT NULL,
  `marked` tinyint(1) NOT NULL DEFAULT 0,
  `marked_by` varchar(60) DEFAULT NULL,
  `marked_date` datetime DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answered_tests`
--

INSERT INTO `answered_tests` (`id`, `user_id`, `test_id`, `submitted`, `submitted_date`, `marked`, `marked_by`, `marked_date`, `date`) VALUES
(1, 'hassan.ali', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 1, '2022-08-25 13:50:05', 0, NULL, NULL, '2022-07-21 11:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `test_id`, `question_id`, `answer`, `date`) VALUES
(1, 'hassan.ali', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 1, 'not', '2022-07-20 11:50:41'),
(2, 'hassan.ali', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 7, 'sudent', '2022-07-20 11:50:41'),
(3, 'hassan.ali', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 11, 'D', '2022-07-20 11:50:41'),
(4, 'hassan.ali', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 12, 'yes', '2022-07-20 11:50:41'),
(5, 'hassan.ali', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 14, '', '2022-07-20 11:50:41'),
(6, 'hassan.ali', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 13, 'B', '2022-07-20 13:50:32'),
(7, 'esra.oma', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 1, 'there is no deffrerent', '2022-07-21 01:23:11'),
(8, 'esra.oma', '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 7, 'learning', '2022-07-21 01:23:12'),
(9, 'mona.masara', 'v8emvzAu286Pi6vJiiNibEpIm7r8LnivmOrmnilIvP52CsNrlINPiLm2bsvi', 15, 'A', '2022-08-04 01:23:11'),
(10, 'mona.masara', 'v8emvzAu286Pi6vJiiNibEpIm7r8LnivmOrmnilIvP52CsNrlINPiLm2bsvi', 16, 'هو عبار عن دالة التبادل', '2022-08-04 01:23:11'),
(11, 'mona.masara', 'v8emvzAu286Pi6vJiiNibEpIm7r8LnivmOrmnilIvP52CsNrlINPiLm2bsvi', 17, 'هذا الصورة يدل علي ان هناك مجموعة المدرسين يقومون بالاجتماع', '2022-08-04 01:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `user_id`, `school_id`, `class_id`, `date`) VALUES
(1, 'class one', 'hassanco.usper', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', '2022-07-05 14:04:44'),
(2, 'class two', 'hassanco.usper', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', '2022-07-10 10:44:49'),
(7, 'php', 'yaya.ali', '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', 'Qxju4Nf11l4gxgwiyhxj20hhj8xb2svvvob2gouguodI12Agd1fIgbIj2dod', '2022-07-23 13:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `class_lecturers`
--

CREATE TABLE `class_lecturers` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_lecturers`
--

INSERT INTO `class_lecturers` (`id`, `user_id`, `class_id`, `disabled`, `school_id`, `date`) VALUES
(1, 'sara.ibrahim', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-06 21:11:43'),
(2, 'sara.ibrahim', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-11 12:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `user_id`, `class_id`, `disabled`, `school_id`, `date`) VALUES
(1, 'ali.adam', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', 1, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-06 21:25:43'),
(2, 'ibrahem.issa', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-06 21:38:24'),
(3, 'omar.abdoulkarim', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-06 21:39:19'),
(4, 'hassan.ali', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-10 10:45:13'),
(5, 'ali.adam', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-12 11:52:41'),
(6, 'esra.oma', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-12 11:52:57'),
(7, 'mona.masara', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-12 11:53:26'),
(8, 'yaya.osama', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-12 11:53:36'),
(9, 'omar.abdoulkarim', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', 0, '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-19 00:53:14'),
(10, 'zohal.zzz', 'Qxju4Nf11l4gxgwiyhxj20hhj8xb2svvvob2gouguodI12Agd1fIgbIj2dod', 0, '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', '2022-07-23 13:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `class_tests`
--

CREATE TABLE `class_tests` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `test` varchar(100) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `school_id`, `date`, `user_id`) VALUES
(1, 'Al Bayan', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', '2022-07-05 13:44:25', 'hassanco.usper'),
(2, 'Tofeg two', 'ptHuJuIAzHzpbeEezvvrIJdr5zeJeeesJeeeNevJz9peJeeImJ6vJ6j69epe', '2022-07-11 10:46:44', 'hassanco.usper'),
(6, 'Al gabas', '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', '2022-07-23 13:53:54', 'hassanco.usper'),
(8, 'Ebno sena', 'BkB8b38atetBxlpP01rC88jynrCCbC8mbf8t22N8x89tm74BB448jB3O4mB3', '2022-08-04 01:26:13', 'hassanco.usper');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `test` varchar(100) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `date` datetime NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 1,
  `editable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_id`, `class_id`, `school_id`, `user_id`, `test`, `description`, `date`, `disabled`, `editable`) VALUES
(1, '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'hassanco.usper', 'First class', 'This is first test', '2022-07-11 16:33:22', 0, 0),
(5, 'EP5gBuqo1Q6733J1tormuAmvjjqLQ6mh5q5qmzQOxcq9Qub19QlcamluQ1Oc', 'AfCBMhj8zhjhsukshjljhvgEmA430A4fAf4Dhhkgh0EffA34fflv5gEIJ3fI', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'hassanco.usper', 'the end test', 'this is the final test ', '2022-07-19 03:53:53', 0, 0),
(6, 'AeC6s0nLisAEhLohHizFuccouL6L4iuB666ugqene6nFnuu0nuI6ucgeuEwI', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'hassanco.usper', 'php', 'description for php', '2022-07-19 04:21:50', 0, 1),
(8, 'm6IeqLcLCCbFfbqspBgbl2h5cq9xcL7lLxlqqqzJc95qleDOxl5eqHOq5qDD', 'Qxju4Nf11l4gxgwiyhxj20hhj8xb2svvvob2gouguodI12Agd1fIgbIj2dod', '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', 'yaya.ali', 'php', 'php test', '2022-07-23 14:11:19', 0, 1),
(9, 'v8emvzAu286Pi6vJiiNibEpIm7r8LnivmOrmnilIvP52CsNrlINPiLm2bsvi', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'hassanco.usper', 'css', '', '2022-08-04 01:15:29', 0, 0),
(10, '0dtktBNQqLjOmAAad9MOqqhdMOlOId9uIqt9qLq5dOAqkrCrdpA6CqNAhusN', 'DMwHruzAksOjazmMbvQQJ33wvQpEQ1yylyMpq11mqLq1lQpw1Mpmu1MPL1MQ', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'sara.ibrahim', 'اختار', 'جديد', '2022-09-18 13:58:25', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_question`
--

CREATE TABLE `test_question` (
  `id` int(11) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `question` text NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `question_type` varchar(10) NOT NULL,
  `correct_answer` text DEFAULT NULL,
  `choices` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_question`
--

INSERT INTO `test_question` (`id`, `test_id`, `question`, `comment`, `image`, `question_type`, `correct_answer`, `choices`, `date`, `user_id`) VALUES
(1, '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 'What is the different between   html and css', '', NULL, 'subjective', NULL, NULL, '2022-07-12 15:22:33', 'hassanco.usper'),
(7, '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 'image question', '1 point', 'uploads/1658078219_507992_gettyimages548929129_199395_crop.jpg', 'subjective', NULL, NULL, '2022-07-13 02:43:04', 'hassanco.usper'),
(11, '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 'ماهي تاريخ بداية الحرب العالمية الاولي', '', NULL, 'multiple', 'D', '{\"A\":\"1900\",\"B\":\"1910\",\"C\":\"1880\",\"D\":\"1914\"}', '2022-07-18 11:35:27', 'hassanco.usper'),
(12, '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 'ما هي البرمجة ؟ ', '1 point', 'uploads/1658192118_VisualsStock_AK59196.jpg', 'subjective', NULL, NULL, '2022-07-19 00:54:51', 'hassanco.usper'),
(13, '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 'متي تم حرب العالمية الثانية', '2 point', NULL, 'multiple', 'B', '{\"A\":\"1990\",\"B\":\"1945\",\"C\":\"1955\",\"D\":\"1880\"}', '2022-07-19 00:59:40', 'hassanco.usper'),
(14, '7nNpCNHNLCrJvQ2O9vsfOuHQuHn6QaBhhnfuBM9Q7hvQza0w93Q6Qh590OMQ', 'this is test o...', '', NULL, 'objective', 'one', NULL, '2022-07-19 01:01:21', 'hassanco.usper'),
(15, 'v8emvzAu286Pi6vJiiNibEpIm7r8LnivmOrmnilIvP52CsNrlINPiLm2bsvi', 'متي بدأت الحرب العالمية الأولي', '5درجة ', NULL, 'multiple', 'B', '{\"A\":\"1990\",\"B\":\"1914\",\"C\":\"1913\"}', '2022-08-04 01:17:35', 'hassanco.usper'),
(16, 'v8emvzAu286Pi6vJiiNibEpIm7r8LnivmOrmnilIvP52CsNrlINPiLm2bsvi', 'عرف التبادل', '2  درجة', NULL, 'objective', 'التبادل هو عبار عن دالة تعمل علي التبديل', NULL, '2022-08-04 01:19:24', 'hassanco.usper'),
(17, 'v8emvzAu286Pi6vJiiNibEpIm7r8LnivmOrmnilIvP52CsNrlINPiLm2bsvi', 'اوصف الصورة التالي', '', 'uploads/1659576030_staff_meeting_training.jpg', 'subjective', NULL, NULL, '2022-08-04 01:20:30', 'hassanco.usper');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `date`, `email`, `user_id`, `gender`, `school_id`, `rank`, `image`, `password`) VALUES
(3, 'Hassanco', 'usper', '2022-07-05 13:37:50', 'super@gmail.com', 'hassanco.usper', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'super_admin', 'uploads/290525278_1638618063183675_1877540800453520996_n.jpg', '$2y$10$5X13/h5xsejV.Xyz4yJteeo8Eg6EqQ78AoHjASqU06izV5pTdDXF.'),
(4, 'Ali', 'Adam', '2022-07-05 13:47:45', 'ali@gmail.com', 'ali.adam', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/01.png', '$2y$10$QztnAfetIdH2YvoAXIYJN.Mib4uOZireOzoRvzE2kah.8mJdK4GfC'),
(5, 'Osman', 'ali', '2022-07-05 14:10:59', 'osman@gamil.com', 'osman.ali', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/happy-student-boy-school-bag-books-childhood-education-people-concept-smiling-62889476.jpg', '$2y$10$VClj0OVRNtd0F8z9JupQsOKYMf9GO.ez2c6DL9wMqUxS2tvoRKVcu'),
(6, 'Omar', 'Abdoulkarim', '2022-07-06 12:00:09', 'omar@gmail.com', 'omar.abdoulkarim', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/DMA_Blog_OnlineClassBullying_Image_Opt-510x340.jpg', '$2y$10$xxPtfUg7XPcINUDVPu52d.LK/0m4YY7SZNqu7rccdQhzkhcAAlr52'),
(7, 'Ibrahem', 'Issa', '2022-07-06 12:01:24', 'ibra@yahoo.com', 'ibrahem.issa', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/boy-adverb-worksheet-school_edd6613209.jpg', '$2y$10$0SHGd9aF4pnD4.ajeiZqwOSKgBj9JNcbrS6TxpyyD3Ojt708MRNrC'),
(8, 'Sara', 'Ibrahim', '2022-07-06 12:41:15', 'sara@gmail.com', 'sara.ibrahim', 'female', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'lecturer', 'uploads/beauty-islamic-muslim-religion-woman-girl-eyes-fashion-architecture.jpg', '$2y$10$1hw9o0h3LJIpdDS4Hpkr2O4dUn9r923uNBTwS7pbbHFHYNH5nG8RO'),
(9, 'Wad', 'Adam', '2022-07-06 12:42:07', 'wad@gmail.com', 'wad.adam', 'female', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'admin', 'uploads/a9f422e9408cccaa8b12396103cc23dd.jpg', '$2y$10$6hHn7TvuYBWhu/3ZzPt4feF9YSLxLfLEgpexXdPIV43kFIXKDxUPW'),
(10, 'Issa', 'Mohamed', '2022-07-06 12:43:27', 'res@gmail.com', 'issa.mohamed', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'reception', 'uploads/db39fe44-6a6b-4292-841f-e79b9f40ff9c.jpeg', '$2y$10$jbsytuAhHb3bb3QAP0oeluFQGKWtknlpnZ3x0uGmB/w2c/Cm9Vw2O'),
(11, 'Mona', 'Masara', '2022-07-08 15:05:39', 'mona@gmail.com', 'mona.masara', 'female', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/3-2-1-_Bridge_1340x720-495x270.jpg', '$2y$10$8Q7omSeWLDGNcLrt6BpuBuAZoEzomrDDd8T4e8Yn4N2sIKWLkhJ/K'),
(12, 'Esra', 'Oma', '2022-07-08 15:19:17', 'es@gmail.com', 'esra.oma', 'female', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/smiling-female-student-school-bag-18208030.jpg', '$2y$10$6AbC6qj1GB/XF1mpan9KEejZHEudc/xDh/HnPLA9iIDoluvz6aUby'),
(13, 'Hassan', 'Ali', '2022-07-08 15:20:31', 'hassan90@gmail.com', 'hassan.ali', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/475130427-56a77cde3df78cf772966cce.jpg', '$2y$10$INZU2FxYKPX.oSKQZSizJO6gXnUQ0CHRRFH7EdfchEbjMHjceLiUS'),
(14, 'Yaya', 'osama', '2022-07-08 15:21:36', 'yaya@gamil.com', 'yaya.osama', 'male', '2I9cix26mF6d16OmFI6uB6i2Pfyc1y6zOO8Imioicdott7oO7P6Pz6826Pq2', 'student', 'uploads/1669902493_FB_IMG_1667992176775.jpg', '$2y$10$Qm/ckHjDY/QlP14TYsO5cuV4mJ2.2RffNFJNRR/SadL2MaukV/EzS'),
(15, 'Ali', 'Omar', '2022-07-23 13:44:23', 'aa@gmail.com', 'ali.omar', 'male', 'ptHuJuIAzHzpbeEezvvrIJdr5zeJeeesJeeeNevJz9peJeeImJ6vJ6j69epe', 'student', NULL, '$2y$10$z1p7Xr/B05EO.7kUiw8o..3/yHzD5S2ng3MUbkfFvXdHgFQYqoWsy'),
(16, 'yaya', 'Ali', '2022-07-23 13:55:00', 'yy@gmail.com', 'yaya.ali', 'male', '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', 'admin', 'uploads/1658584520_pexels-italo-melo-2379004.jpg', '$2y$10$Nt32mn1VhugrC.wYrfM/6ebcfzAfG2Ufi/GreKiFLNFViGd1N7LTG'),
(17, 'Mazin', 'Kamil', '2022-07-23 13:56:13', 'maz@gmail.com', 'mazin.kamil', 'male', '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', 'lecturer', NULL, '$2y$10$XhqM/FDrG2PO.1Ri9be9hucWYbHRSD4UCPXwHyCheoQZVCgb894pK'),
(18, 'receptional', 'res', '2022-07-23 13:57:32', 'ion@gmail.com', 'receptional.res', 'female', '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', 'reception', NULL, '$2y$10$SW15xJ7WQnhPR.AsjTZJ3uIGOZPVPLjshzTZJ/tXxroZ7RVG8wMzy'),
(19, 'Zohal', 'zzz', '2022-07-23 13:58:58', 'zoj@gmail.com', 'zohal.zzz', 'female', '4jdFHNip3F9u0d0eqe0PA3wDAF00djAdD6dbdbzAsFfJ6CsfHtjQ3pACbjAd', 'student', 'uploads/1658584760_5cef2f63-0637-49aa-9577-761b27b84ee0-m.jpg', '$2y$10$u00kKYFMXHEGwRYpDOmfcezIiyHBQaMenYp619Hhi18mBC0Q69S82'),
(20, 'Jamal', 'Ali', '2022-07-23 21:36:50', 'jj@gmail.com', 'jamal.ali', 'male', 'ExCLgsNEung5QgBl0QEhEghQFxfisEhEg601BEkk08xLE1kE9LgiHCbkgNQg', 'admin', 'uploads/1658612242_2487414-bigthumbnail.jpg', '$2y$10$c9/JnMRwFtLHrjdddVYdTeiohkJfXJkj/NslkEgKQzbbryfYdDW22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answered_tests`
--
ALTER TABLE `answered_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `submitted` (`submitted`),
  ADD KEY `marked` (`marked`),
  ADD KEY `marked_by` (`marked_by`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `class_lecturers`
--
ALTER TABLE `class_lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `class_tests`
--
ALTER TABLE `class_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `test` (`test`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `date` (`date`),
  ADD KEY `disabled_2` (`disabled`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school` (`school`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `test` (`test`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `editable` (`editable`);

--
-- Indexes for table `test_question`
--
ALTER TABLE `test_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `test_type` (`question_type`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `date` (`date`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `rank` (`rank`),
  ADD KEY `email` (`email`),
  ADD KEY `image` (`image`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answered_tests`
--
ALTER TABLE `answered_tests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_lecturers`
--
ALTER TABLE `class_lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_tests`
--
ALTER TABLE `class_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_question`
--
ALTER TABLE `test_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
