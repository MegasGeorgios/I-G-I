-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-09-2018 a las 20:18:44
-- Versión del servidor: 5.7.23-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `i-g-i`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Vocabulario', '2018-08-20 22:00:00', NULL),
(2, 'Animales', '2018-08-21 16:54:19', '2018-08-21 16:54:19'),
(3, 'Saludos y presentaciones', '2018-08-30 16:48:23', '2018-08-30 16:48:23'),
(4, 'Ropa', '2018-08-30 18:50:39', '2018-08-30 18:50:39'),
(5, 'Saludos y presentaciones', '2018-09-11 15:26:14', '2018-09-11 15:26:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `frase` text,
  `sig_frase` text,
  `idioma` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `griegos`
--

CREATE TABLE `griegos` (
  `id` int(10) UNSIGNED NOT NULL,
  `palabra` varchar(255) NOT NULL,
  `significado` varchar(255) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `griegos`
--

INSERT INTO `griegos` (`id`, `palabra`, `significado`, `id_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Παίζω', 'jugar', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(2, 'Οικογένεια', 'familia', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(3, 'Καινούριος', 'nuevo', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(4, 'Αγκάθι', 'espina', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(5, 'Βαγγέλης ', 'nombre', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(6, 'Μπισκότο ', 'galleta', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(7, 'Καμπούρα ', 'joroba', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(8, 'Ντους', 'ducha', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(9, 'Υγεία ', 'salud', 1, '2018-08-20 22:00:00', '2018-08-20 22:00:00'),
(10, 'Κάστρο', 'castillo', 1, '2018-08-21 16:42:34', '2018-08-21 16:42:34'),
(11, 'Γέφυρα', 'puente', 1, '2018-08-21 16:43:05', '2018-08-21 16:43:05'),
(12, 'Ήλιος', 'sol', 1, '2018-08-21 16:43:21', '2018-08-21 16:43:21'),
(13, 'Τραπέζι', 'mesa', 1, '2018-08-21 16:43:32', '2018-08-21 16:43:32'),
(14, 'Παραλία', 'playa', 1, '2018-08-21 16:43:58', '2018-08-21 16:43:58'),
(15, 'Θάλασσα', 'mar', 1, '2018-08-21 16:44:12', '2018-08-21 16:44:12'),
(16, 'Γαρίδα', 'gamba', 1, '2018-08-21 16:44:30', '2018-08-21 16:44:30'),
(17, 'Χαλί', 'alfombra', 1, '2018-08-21 16:46:04', '2018-08-21 16:46:04'),
(18, 'Ψώνια', 'compras', 1, '2018-08-21 16:46:26', '2018-08-21 16:46:26'),
(19, 'εισοδος', 'entrada', 1, '2018-08-21 16:53:59', '2018-08-21 16:53:59'),
(20, 'πουλι', 'pajaro', 2, '2018-08-21 16:54:53', '2018-08-21 16:54:53'),
(21, 'ευτυχισμενος', 'contento', 1, '2018-08-21 16:56:04', '2018-08-21 16:56:04'),
(22, 'παραγγελι\'α', 'pedido', 1, '2018-08-21 16:57:09', '2018-08-21 16:57:09'),
(23, 'σαλιγκαρι', 'caracol', 2, '2018-08-21 16:57:58', '2018-08-21 16:57:58'),
(24, 'παγκακι', 'banco(sentarse)', 1, '2018-08-21 16:58:45', '2018-08-21 16:58:45'),
(25, 'μπουκάλι', 'botella', 1, '2018-08-21 16:59:51', '2018-08-21 16:59:51'),
(26, 'λαμπα', 'bombillo', 1, '2018-08-21 17:00:23', '2018-08-21 17:00:23'),
(27, 'λιοντάρι', 'leon', 2, '2018-08-21 17:01:18', '2018-08-21 17:01:18'),
(28, 'δόντια', 'dientes', 1, '2018-08-21 17:02:09', '2018-08-21 17:02:09'),
(29, 'Μοιάζω', 'aparentar, parecer', 1, '2018-08-30 18:49:28', '2018-08-30 18:49:28'),
(30, 'Μοιάζω', 'aparentar, parecer', 1, '2018-08-30 18:51:02', '2018-08-30 18:51:02'),
(31, 'Φούστα', 'falda', 4, '2018-08-30 18:51:55', '2018-08-30 18:51:55'),
(32, 'Ειδήσεις', 'noticias', 1, '2018-08-30 18:52:29', '2018-08-30 18:52:29'),
(33, 'Τέλεια', 'perfecto', 1, '2018-08-30 18:53:54', '2018-08-30 18:53:54'),
(34, 'Κούρεμα', 'corte de pelo', 1, '2018-08-30 18:55:11', '2018-08-30 18:55:11'),
(35, 'Γεια σας', 'hola', 5, '2018-09-11 15:29:27', '2018-09-11 15:29:27'),
(36, 'χαιρετισμοί', 'saludos', 5, '2018-09-11 15:29:59', '2018-09-11 15:29:59'),
(37, 'αποχαιρετισμοί', 'despedidas', 5, '2018-09-11 15:30:33', '2018-09-11 15:30:33'),
(38, 'Γεια σου', 'hola, chao', 5, '2018-09-11 15:31:14', '2018-09-11 15:31:14'),
(39, 'Καλημέρα', 'buenos días', 5, '2018-09-11 15:32:15', '2018-09-11 15:32:15'),
(40, 'Καλησπέρα', 'buenas tardes', 5, '2018-09-11 15:32:32', '2018-09-11 15:32:32'),
(41, 'Καληνύχτα', 'buenas noches', 5, '2018-09-11 15:32:53', '2018-09-11 15:32:53'),
(42, 'Καλό μεσημέρι', 'buen mediodía', 5, '2018-09-11 15:33:55', '2018-09-11 15:33:55'),
(43, 'Καλό απόγευμα', 'buena tarde – después de comer', 5, '2018-09-11 15:34:30', '2018-09-11 15:34:30'),
(44, 'Καλό βράδυ', 'buena tarde-noche', 5, '2018-09-11 15:35:02', '2018-09-11 15:35:02'),
(45, 'Αντίο', 'adios', 5, '2018-09-11 15:40:49', '2018-09-11 15:40:49'),
(46, 'Τα λέμε', 'hasta luego', 5, '2018-09-11 15:42:10', '2018-09-11 15:42:10'),
(47, 'Θα τα πούμε', 'hablamos', 5, '2018-09-11 15:42:41', '2018-09-11 15:42:41'),
(48, 'Γεια', 'hola, chao', 5, '2018-09-11 15:43:08', '2018-09-11 15:43:08'),
(49, 'Στο καλό', 'que te vaya bien', 5, '2018-09-11 15:43:40', '2018-09-11 15:43:40'),
(50, 'Να είσαι/είστε καλά', 'que estés/esté bien', 5, '2018-09-11 15:45:05', '2018-09-11 15:45:05'),
(51, 'Καλημέρα σας', 'buenos dias (en plural)', 5, '2018-09-11 15:46:51', '2018-09-11 15:46:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingles`
--

CREATE TABLE `ingles` (
  `id` int(10) UNSIGNED NOT NULL,
  `palabra` varchar(255) NOT NULL,
  `significado` varchar(255) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `italianos`
--

CREATE TABLE `italianos` (
  `id` int(10) UNSIGNED NOT NULL,
  `palabra` varchar(255) NOT NULL,
  `significado` varchar(255) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2016_10_18_161006_create_categorias_table', 1),
(7, '2017_10_17_213028_create_italianos_table', 1),
(8, '2017_10_18_160607_create_griegos_table', 1),
(9, '2017_10_18_160903_create_ingles_table', 1),
(10, '2017_11_02_005631_create_cuestionarios_table', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `griegos`
--
ALTER TABLE `griegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `griegos_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `ingles`
--
ALTER TABLE `ingles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingles_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `italianos`
--
ALTER TABLE `italianos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `italianos_id_categoria_foreign` (`id_categoria`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `griegos`
--
ALTER TABLE `griegos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `ingles`
--
ALTER TABLE `ingles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `italianos`
--
ALTER TABLE `italianos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `griegos`
--
ALTER TABLE `griegos`
  ADD CONSTRAINT `griegos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingles`
--
ALTER TABLE `ingles`
  ADD CONSTRAINT `ingles_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `italianos`
--
ALTER TABLE `italianos`
  ADD CONSTRAINT `italianos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
