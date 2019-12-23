-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2019 a las 05:44:06
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoe`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `numeroDeRegistrosTablas` ()  select (SELECT COUNT(*) FROM users) as users, (SELECT COUNT(*) FROM roles) as roles$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_01_20_084450_create_roles_table', 1),
(4, '2015_01_20_084525_create_role_user_table', 1),
(5, '2015_01_24_080208_create_permissions_table', 1),
(6, '2015_01_24_080433_create_permission_role_table', 1),
(7, '2015_12_04_003040_add_special_role_column', 1),
(8, '2017_10_17_170735_create_permission_user_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Navegar usuarios', 'users.index', 'Lista y navega todos los usuarios del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(2, 'Ver detalle del usuario', 'users.show', 'Ver en detalle cada usuario del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(3, 'Editar usuario', 'users.edit', 'Editar cualquier usuario del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(4, 'Eliminar usuario', 'users.destroy', 'Eliminar cualquier usuario del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(5, 'Crear usuario', 'users.create', 'Crear un usuario nuevo en el sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(6, 'Navegar roles', 'roles.index', 'Lista y navega todos los roles del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(7, 'Ver detalle del rol', 'roles.show', 'Ver en detalle cada rol del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(8, 'Editar rol', 'roles.edit', 'Editar cualquier rol del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(9, 'Eliminar rol', 'roles.destroy', 'Eliminar cualquier rol del sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(10, 'Crear rol', 'roles.create', 'Crear un rol nuevo en el sistema', '2019-12-15 17:07:01', '2019-12-15 17:07:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'Admin', 'admin', NULL, '2019-12-15 17:07:01', '2019-12-15 17:07:01', 'all-access'),
(2, 'Supervisor', 'supervisor', 'solo tiene acceso a los listados de información', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ardella Kuhlman', 'satterfield.jessy@example.com', '2019-12-15 17:06:55', '$2y$10$d9xu.bJEL1vPDAajZOOr5.9rt3YvsD.jRKbs7OBNyBtdjjT0OLOcK', 'gfhkJN2EkD', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(2, 'Harmony Flatley', 'kyler.schuppe@example.org', '2019-12-15 17:06:55', '$2y$10$ylHn9SZeNp9oleFDH8Gpvu7AYgw6kbdJSs0gzDJBgkRznso3e6ERm', 'Nj5SVpIuaR', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(3, 'Ted Blick', 'rdaniel@example.org', '2019-12-15 17:06:55', '$2y$10$3/SGkwV1AveRIxhZ6KDrY.zBi5/t.LRQn9GbY0ZzNd0pGBRVXMmVi', '6lGikedaY8', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(4, 'Lauryn Jerde', 'chelsie35@example.com', '2019-12-15 17:06:55', '$2y$10$xRZpWKVOITSnq9Ssi9sNIOUWtjl2kWh79NBZxeA2CkoBJCAK1YmPG', 'wlcR3LUPTE', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(5, 'Johnathon Gutmann', 'ubaldo.abernathy@example.net', '2019-12-15 17:06:56', '$2y$10$mLw5I86sAraf3Xm1aDBPPuf4iD35mOCDlN0eij.xcGodNelea31pO', '1mfTKtkLmo', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(6, 'Kristian Torp IV', 'ulises.gorczany@example.org', '2019-12-15 17:06:56', '$2y$10$0KyfZzhKQT7YT.YFHb0nXOWlp0PrIjG0btoGWFZTaWwv7dhVhcT/C', 'WeuuIFw95m', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(7, 'Mr. Kevin Kuhic', 'elsie60@example.net', '2019-12-15 17:06:56', '$2y$10$ERdz.duPVzFqkbPRJitpHu/vbtodaOZWI87OVCozy/biE/DTnyAH.', '5b7sRMfgXK', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(8, 'Alfonso Hills', 'yklocko@example.net', '2019-12-15 17:06:56', '$2y$10$UHuEx7rQX2x.f6SdLWJv/OI1N6cfs6cFrGwGe8sAzo27bEfucM2Re', 'HKxtIEcOKU', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(9, 'Mr. Rickie Wuckert I', 'lorenza.herzog@example.com', '2019-12-15 17:06:56', '$2y$10$JS5oi7jzju6bIcatA6o5keOOMfF32wb19w35a6FWlHD76yZvpAwXq', 'x6JV6LfEHf', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(10, 'Leatha Brekke', 'jazlyn78@example.com', '2019-12-15 17:06:57', '$2y$10$grjzYdOfHX0D4a1xhhieK.MftOrrit3wMGvUqs/WRpaZh1cx8C2f.', 'RBZFfz26D4', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(11, 'Kaylah Sanford', 'adams.rose@example.org', '2019-12-15 17:06:57', '$2y$10$oIqsir8vw4IsMFhnIMNWtOKPWNjc1t0CJS.yeQTDDIYXY/bjsB9H6', 'c97e9Mxg5c', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(12, 'Buford Mraz', 'fern56@example.org', '2019-12-15 17:06:57', '$2y$10$HJ0QfwBV9XfvmVyMni0k.OC0M5V8NJaXDIDx6CpH3Mxx6qqEBp8TK', 'cy4g4m6vLH', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(13, 'Santa Botsford', 'nbosco@example.org', '2019-12-15 17:06:57', '$2y$10$58.YnSj2rNQcgMNOCE/n8uRduOZWF2HDTDq.PwIdEjD1EtzwHZZ3C', 'n0Pe0H1wjV', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(14, 'Natalie Larson PhD', 'etrantow@example.com', '2019-12-15 17:06:57', '$2y$10$l6Nw/tdFOjYwp86OzchnNeuYl2f3mlrcfAag3VnjVWK16VhGznFE2', 'R9dUl4Gve9', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(15, 'Gilda Kessler', 'brannon.jones@example.com', '2019-12-15 17:06:58', '$2y$10$CI/gYbe30DXf962qjF2fq.7bVBhzT8I23w3J3lU9TmVQEjFrZLPn6', '70k27G7lDp', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(16, 'Bernhard Murazik', 'champlin.ransom@example.com', '2019-12-15 17:06:58', '$2y$10$L7tK4X7NptSTpCjj/uj0me6CyAZA8ekRIa3UA3oH2lgzPeEcQ4wtC', '53ucFUeA9f', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(17, 'Mr. Justen Pfeffer IV', 'isabel41@example.org', '2019-12-15 17:06:58', '$2y$10$ZxAwU5sRQVz.Lzsh3BIXz.8LnSOIRVFIlvkJyT3A25laz5TXonaIG', '2X6OkzOFcH', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(18, 'Lindsey Langosh PhD', 'bogan.vidal@example.net', '2019-12-15 17:06:59', '$2y$10$adeh6Q7R6II5dmSvIMDnbejxUIeK.wqKgcjA9eGDTlpC0Y9njjSHO', 'GmwIzDgBf7', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(19, 'Adrian Bashirian', 'anderson90@example.org', '2019-12-15 17:06:59', '$2y$10$dv174Q9QU3.0MTVFCixlh.n0RzvG72NMUR6smodh9EEH7URVuGlui', 'S02NtxTHxZ', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(20, 'Delfina Pfannerstill', 'jamir.walker@example.com', '2019-12-15 17:06:59', '$2y$10$Le4hlJa2Y7yICehmfhHJSe2jlzzehHEW7weBMxv25Yfl8J/oBKNlC', '4QoAs89rde', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(21, 'Prof. Sherwood Deckow I', 'khamill@example.com', '2019-12-15 17:06:59', '$2y$10$cJ7u/bleKzbRljI3Y1UR6.uH8k5SSDcLUDIdlzDUJTXuYUKXhH5Ma', 'SdCwOmYaJt', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(22, 'Krystel Tremblay', 'psatterfield@example.org', '2019-12-15 17:06:59', '$2y$10$l0cbWDVkMu9kjoe3r4uUauni.JGKgrtu5Vt8QGPLLcIVKNZa0jp9O', 'tIvxWvTdfJ', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(23, 'Issac Prosacco', 'rabshire@example.org', '2019-12-15 17:07:00', '$2y$10$.AMWdAFG0NP4PCMovzSgfO6zsAXeBL1BsTzhz/O3Z7ICdE.G9TQ52', 'Rd257ZKIp7', '2019-12-15 17:07:00', '2019-12-15 17:07:00'),
(24, 'Ima Ondricka', 'effertz.rory@example.net', '2019-12-15 17:07:00', '$2y$10$9iyWAMKg3.bUf8XrHuV1weWp1KU8PdIm/fXSmbYLF2bQhajcjI0Ve', 'I9tXq1KHBB', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(25, 'Prof. Baby Gerhold', 'xstroman@example.com', '2019-12-15 17:07:00', '$2y$10$2UsIZw/W/INstT1AeJ08Q.X/zO.Vcdpefi554qmyu6wYMJEQIqlNy', 'gPohQ9sdZR', '2019-12-15 17:07:01', '2019-12-15 17:07:01'),
(26, 'Jorge m.', 'jm@yahoo.es', NULL, '$2y$10$18xL0sJL4zk00bDgHo0ucOOJoi/0rFJsNJwhx5j1yCtoY0g1BnhJK', NULL, NULL, NULL),
(28, 'borra2', 'juum@yahoo.es', NULL, '$2y$10$YuNkw/KDRuxfSwW6J3ymTug5TfrJO.VTfJMqnoN2Ls9ht0lxJkXWO', NULL, '2019-12-19 20:56:02', '2019-12-19 20:56:02'),
(29, 'jm', 'freida02@example.org', NULL, '$2y$10$qmkte0KQussxGRlSShqWpeQNi/2X3bSza8Ui/g.I7EanQg9Bg.MR.', NULL, '2019-12-19 20:59:25', '2019-12-19 20:59:25'),
(31, 'jorge12', 'rimo@yahoo.es', NULL, '$2y$10$oMiofQwQ66OoefaZ2jPOWOEFJ3NMSfNWJPPjdBLD7DDeSaUzFPcJW', NULL, '2019-12-19 23:01:55', '2019-12-19 23:01:55'),
(32, 'albert twski', 'azzs@yahoo.es', NULL, '$2y$10$R/IDdAIsS0tfQeZmvZYuqO1QzxWpsTbRrWgqKk/YZoPVZHd3FXeLm', NULL, '2019-12-19 23:02:17', '2019-12-19 23:02:17'),
(33, 'borra2aa', 'lordvaldomero1@yahoo.es', NULL, '$2y$10$ya9rExchveDVGL9P./F6A.Ysqq7KpSYN9bsPhhLozc/IiMtda88uK', NULL, '2019-12-19 23:03:55', '2019-12-19 23:03:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
