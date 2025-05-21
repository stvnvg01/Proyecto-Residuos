-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: bfdakbn25yxaxtofpu3f-mysql.services.clever-cloud.com:3306
-- Tiempo de generación: 29-04-2025 a las 12:45:46
-- Versión del servidor: 8.4.2-2
-- Versión de PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bfdakbn25yxaxtofpu3f`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canjes`
--

CREATE TABLE `canjes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `recompensa_id` int UNSIGNED NOT NULL,
  `puntos_usados` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `canjes`
--

INSERT INTO `canjes` (`id`, `user_id`, `recompensa_id`, `puntos_usados`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 50, '2025-04-29 03:35:12', '2025-04-29 03:35:12'),
(2, 10, 1, 50, '2025-04-29 04:43:11', '2025-04-29 04:43:11'),
(3, 11, 1, 50, '2025-04-29 04:50:25', '2025-04-29 04:50:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_recolectora`
--

CREATE TABLE `empresa_recolectora` (
  `id` int NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa_recolectora`
--

INSERT INTO `empresa_recolectora` (`id`, `nombre`) VALUES
(1, 'LimpiaYa'),
(2, 'RecoGreen'),
(3, 'BasuraCero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_28_163012_add_rol_and_puntos_to_usuarios_table', 2),
(7, '2025_04_28_210536_create_companies_table', 3),
(8, '2025_04_29_023130_create_recompensas_table', 3),
(9, '2025_04_29_023438_create_canjes_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recolecciones`
--

CREATE TABLE `recolecciones` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `empresa_id` int NOT NULL,
  `tipo_residuo_id` int NOT NULL,
  `fecha` date NOT NULL,
  `programada` tinyint(1) NOT NULL DEFAULT '1',
  `turno` int DEFAULT NULL,
  `peso_kg` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recolecciones`
--

INSERT INTO `recolecciones` (`id`, `user_id`, `empresa_id`, `tipo_residuo_id`, `fecha`, `programada`, `turno`, `peso_kg`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, '2025-04-26', 1, 1, 5.00, '2025-04-26 07:46:05', '2025-04-26 07:46:05'),
(2, 1, 2, 2, '2025-04-26', 1, 2, 2.00, '2025-04-26 07:47:32', '2025-04-26 07:47:32'),
(3, 1, 1, 3, '2025-04-30', 1, 1, 1.00, '2025-04-26 07:47:47', '2025-04-26 07:47:47'),
(4, 1, 3, 2, '2025-04-29', 1, 1, 8.00, '2025-04-26 07:55:35', '2025-04-26 07:55:35'),
(5, 1, 3, 2, '2025-04-28', 1, 1, 5.00, '2025-04-26 07:57:23', '2025-04-26 07:57:23'),
(6, 1, 2, 3, '2025-04-29', 1, 2, 8.00, '2025-04-26 08:09:18', '2025-04-26 08:09:18'),
(7, 1, 3, 1, '2025-04-29', 1, 3, 6.00, '2025-04-26 15:21:26', '2025-04-26 15:21:26'),
(8, 1, 3, 2, '2025-04-29', 1, 4, 5.00, '2025-04-26 20:52:01', '2025-04-26 20:52:01'),
(9, 1, 1, 3, '2025-04-29', 1, 5, 28.00, '2025-04-26 23:59:36', '2025-04-26 23:59:36'),
(10, 1, 3, 2, '2025-04-29', 1, 6, 252.00, '2025-04-27 17:20:39', '2025-04-27 17:20:39'),
(11, 8, 1, 1, '2025-05-01', 1, 8, NULL, '2025-04-28 21:41:53', '2025-04-28 21:41:53'),
(12, 8, 1, 3, '2025-05-01', 1, 8, NULL, '2025-04-28 21:42:10', '2025-04-28 21:42:10'),
(13, 8, 1, 1, '2025-05-10', 1, 7, NULL, '2025-04-28 21:43:00', '2025-04-28 21:43:00'),
(14, 8, 1, 1, '2025-05-10', 1, 5, 200.00, '2025-04-28 21:52:20', '2025-04-28 21:52:20'),
(15, 8, 2, 3, '2025-05-10', 1, 7, 50.00, '2025-04-28 22:02:00', '2025-04-28 22:02:00'),
(16, 8, 1, 1, '2025-05-04', 1, 6, 5.00, '2025-04-29 03:31:40', '2025-04-29 03:31:40'),
(17, 10, 1, 1, '2025-05-08', 1, 8, 60.00, '2025-04-29 04:41:23', '2025-04-29 04:41:23'),
(18, 10, 1, 1, '2025-05-09', 1, 4, 600.00, '2025-04-29 04:41:47', '2025-04-29 04:41:47'),
(19, 10, 1, 1, '2025-05-01', 1, 8, 600.00, '2025-04-29 04:42:03', '2025-04-29 04:42:03'),
(20, 10, 3, 3, '2025-05-09', 1, 2, 600.00, '2025-04-29 04:42:16', '2025-04-29 04:42:16'),
(21, 10, 1, 2, '2025-05-07', 1, 1, 50.00, '2025-04-29 04:42:30', '2025-04-29 04:42:30'),
(22, 11, 1, 1, '2025-05-11', 1, 4, 10.00, '2025-04-29 04:48:33', '2025-04-29 04:48:33'),
(23, 11, 1, 1, '2025-05-07', 1, 7, 1.00, '2025-04-29 04:48:55', '2025-04-29 04:48:55'),
(24, 11, 1, 1, '2025-05-01', 1, 2, 10.00, '2025-04-29 04:49:07', '2025-04-29 04:49:07'),
(25, 11, 1, 2, '2025-04-30', 1, 5, 11.00, '2025-04-29 04:49:20', '2025-04-29 04:49:20'),
(26, 11, 2, 1, '2025-05-01', 1, 6, 1.00, '2025-04-29 04:49:32', '2025-04-29 04:49:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recompensas`
--

CREATE TABLE `recompensas` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `puntos_requeridos` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recompensas`
--

INSERT INTO `recompensas` (`id`, `nombre`, `descripcion`, `puntos_requeridos`, `created_at`, `updated_at`) VALUES
(1, 'Descuento 10% en supermercado', 'Un cupón de descuento del 10% para usar en cualquier supermercado asociado.', 50, '2025-04-29 02:40:02', '2025-04-29 02:40:02'),
(2, 'Botella reutilizable', 'Una botella reutilizable de acero inoxidable.', 100, '2025-04-29 02:40:02', '2025-04-29 02:40:02'),
(3, 'Entrada gratis a evento ecológico', 'Entrada para un evento sobre sostenibilidad y medio ambiente.', 150, '2025-04-29 02:40:02', '2025-04-29 02:40:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('12gBHlAX9kyrDI2szwtIVWdixxkpGzMULpnrcBT8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXlhWVVWZjM1aXFZbUdPQTlJT0U5aEJwdTRCbzhPNkpNajRSTkdDciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1745869506),
('eMvSxOujvpr4w4vOzgnyU8otFHkflEStVjKWemQ0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianVxZFpFYjBsclZDMmJrY1I5QXprcFd0OEdmWnhzRWhNbmR2cnU3TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745867667),
('JXY2A6AhPWCrjVVXNVGZtCJFHxYDbsLorIk8fVGz', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQzUzTGxYNmJvM3cwY1JrZndmRHJUMm1UQ3ZuUzlEUTZnN21hWFdLRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW51Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1745851185),
('wv0sgqxjlvASFsoNtCc9wRrtnSdFEdvWu0ghu7jI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUI4TFNJTnhMNmk3R3RPNkdwUDRJVWtNbFlDNE13bUxPR1VpSnBDNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1745867778);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_residuo`
--

CREATE TABLE `tipo_residuo` (
  `id` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_residuo`
--

INSERT INTO `tipo_residuo` (`id`, `nombre`) VALUES
(1, 'Organico'),
(2, 'Inorganico'),
(3, 'Peligroso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rol` enum('admin','user','collector') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `puntos` int NOT NULL DEFAULT '0',
  `departamento` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `telefono`, `password`, `rol`, `puntos`, `departamento`, `municipio`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Pedro', 'Paramo', 'pedroparamo@example.com', '3001234567', '1234567890', NULL, 0, 'Antioquia', 'Medellin', 'carrera', '2025-04-28 18:23:32', NULL),
(6, 'nom', 'ape', 'nom@ape.com', '1234567890', '$2y$12$ESsWL9Y7jSKhnOEEDzgxZeo/uMguH9mXe0jYP4yTW3nmejyRqMnrS', 'admin', 0, 'antioquia', 'Municipio', 'carrera', '2025-04-28 18:52:32', '2025-04-28 18:52:32'),
(7, 'brayan', 'valencia', 'brayan@example', '1234567890', '$2y$12$/xSUW5Y1QlI3QPUe8SX09OmDTtRbM0pKna5kY.Ytwq1f.PgDgv/t2', 'admin', 0, 'Antioquia', 'Medellin', 'carrera', '2025-04-28 19:25:40', '2025-04-28 19:25:40'),
(8, 'bra', 'aa', 'aaa@example.com', '1234567890', '$2y$12$VmD61MQVy9rs.CG26KiYgOb5j82euLMHDiPyTz7gyS/.wSvrRzq3G', 'admin', 10, 'Antioquia', 'Medellin', 'assdsada', '2025-04-28 19:47:57', '2025-04-29 03:35:12'),
(9, 'fghjkl', 'vbnm', 'ghg@fg.com', '1234567890', '$2y$12$IKAlOqlYlvoEVO5tkLBMLuRwstJBm.x61HFXBBwdAiVpssa1mdXe6', 'user', 0, 'Antioquia', 'Medellin', 'gtfhjk', '2025-04-28 22:03:12', '2025-04-28 22:03:12'),
(10, 'Stiven', 'Valencia', 'stvnvg@gmail.com', '1234567890', '$2y$12$9DImnoUgIcnn.6x/JxFlb.i2syA60pTZIEFyMIWQhmwNSEQ7TeqXu', 'user', 0, 'Antioquia', 'Medellin', 'carrera 34', '2025-04-29 04:40:52', '2025-04-29 04:43:11'),
(11, 'nombre', 'aaa', 'asd@gmail.vom', '1234567890', '$2y$12$mC6qiZPH4kDyCULZrTMX7efgGCvgLT1BWRZyFu52O2jWe337clEw6', 'user', 0, 'Antioquia', 'Medellin', 'asdfg', '2025-04-29 04:47:50', '2025-04-29 04:50:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `canjes`
--
ALTER TABLE `canjes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `canjes_user_id_foreign` (`user_id`),
  ADD KEY `canjes_recompensa_id_foreign` (`recompensa_id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `recolecciones`
--
ALTER TABLE `recolecciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recompensas`
--
ALTER TABLE `recompensas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canjes`
--
ALTER TABLE `canjes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `recolecciones`
--
ALTER TABLE `recolecciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `recompensas`
--
ALTER TABLE `recompensas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canjes`
--
ALTER TABLE `canjes`
  ADD CONSTRAINT `canjes_recompensa_id_foreign` FOREIGN KEY (`recompensa_id`) REFERENCES `recompensas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `canjes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
