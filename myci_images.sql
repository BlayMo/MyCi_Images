-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2017 a las 18:53:44
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myci_images`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda_categoria`
--

CREATE TABLE `boda_categoria` (
  `id_categoria` int(11) NOT NULL,
  `idcategoria` varchar(32) DEFAULT NULL,
  `categoria` varchar(150) DEFAULT NULL,
  `descripcion` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Categorias de blog';

--
-- Volcado de datos para la tabla `boda_categoria`
--

INSERT INTO `boda_categoria` (`id_categoria`, `idcategoria`, `categoria`, `descripcion`) VALUES
(1, '28a60db599bce9e1d05a7efa75d3c8b9', 'Todas', 'Categoria generica'),
(2, 'cb5d126d33d6c1a79423c0973c4b4c71', 'En la reunion', 'Ejemplo de categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda_fotos`
--

CREATE TABLE `boda_fotos` (
  `id_foto` int(11) NOT NULL,
  `idfoto` varchar(32) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `video` varchar(150) DEFAULT NULL,
  `fecha_alta` varchar(150) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `autor` varchar(150) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boda_fotos`
--

INSERT INTO `boda_fotos` (`id_foto`, `idfoto`, `id_categoria`, `id_user`, `foto`, `video`, `fecha_alta`, `title`, `autor`, `url`, `priority`) VALUES
(1, '01bb23e3875a280cb202c5e817004e77', 1, 1, 'robot-1084776_1920.jpg', NULL, '2017-12-16T13:10:57+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(2, 'f566a656f4621311ac53388497024957', 1, 1, 'sailing-vessel-360847_1920.jpg', NULL, '2017-12-16T13:10:57+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(3, 'fa1b586849c165d6aa74d0fb4ede96ae', 1, 1, 'saturn-341379_1280.jpg', NULL, '2017-12-16T13:10:57+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(4, '15a930463bbd562269d959fd89ec4028', 1, 1, 'skyline-106094_1280.jpg', NULL, '2017-12-16T13:10:57+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(5, '01149545314beab1c8075e49a1aeb50b', 1, 1, 'skyline-1172724_1920.jpg', NULL, '2017-12-16T13:10:57+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(6, 'e13fed6b7565cc1412301171df01bcfd', 1, 1, 'smoke-386359_1920.jpg', NULL, '2017-12-16T13:10:57+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(7, '60f17b737576141259b6fce8c541425e', 1, 1, 'space-54999_640.jpg', NULL, '2017-12-16T13:10:58+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(8, '6c05b374df88a16ba44c30a1cdee8619', 1, 1, 'spain-379535_1920.jpg', NULL, '2017-12-16T13:10:58+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(9, 'aea7ee5b46ab13b87b518481dd44ab3b', 2, 1, 'failed-1248855.jpg', NULL, '2017-12-16T13:12:20+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(10, '5f9962ed1069644342a10c53ccbc1557', 2, 1, 'frog-1234543_1920.jpg', NULL, '2017-12-16T13:12:20+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(11, '3da12a08d687fd6f9e42cb44a3c7d209', 2, 1, 'head-915129_1920.jpg', NULL, '2017-12-16T13:12:20+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(12, '25a70962225d96306d62b2298aebf5fc', 2, 1, 'icon-set-1175046_1920.jpg', NULL, '2017-12-16T13:12:20+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(13, 'c904d966b17c1a4adac3e5e2459261b5', 2, 1, 'informatica-1234208_1920.jpg', NULL, '2017-12-16T13:12:21+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(14, '05af9e5b71b0bd4d84dc053a1955fa54', 2, 1, 'integrated-circuit-441291_1920.jpg', NULL, '2017-12-16T13:12:21+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(15, '97ad4d82c60c86ce0542e93f2a875e43', 2, 1, 'lego-568039_1920.jpg', NULL, '2017-12-16T13:12:21+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(16, '7df852844b89b5d260ba119c8916cb7c', 2, 1, 'london-123778_1920.jpg', NULL, '2017-12-16T13:12:21+0100', 'Nuestras Fotos', 'Webmaster', '', 1),
(17, '7d26f4374756a28fd8438ff0a61b384f', 2, 1, 'london-140785_1920.jpg', NULL, '2017-12-16T13:12:22+0100', 'Nuestras Fotos', 'Webmaster', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda_groups`
--

CREATE TABLE `boda_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boda_groups`
--

INSERT INTO `boda_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrador'),
(2, 'invitados', 'Invitados que pueden ver fotos'),
(3, 'anfitriones', 'Propietarios del sitio web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda_login_attempts`
--

CREATE TABLE `boda_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda_tags`
--

CREATE TABLE `boda_tags` (
  `id_tag` int(11) NOT NULL,
  `idtag` varchar(32) DEFAULT NULL,
  `id_foto` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tag` varchar(40) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boda_tags`
--

INSERT INTO `boda_tags` (`id_tag`, `idtag`, `id_foto`, `id_user`, `tag`, `descripcion`) VALUES
(1, '01bb23e3875a280cb202c5e817004e77', 1, 1, 'ejemplo', ''),
(2, '01bb23e3875a280cb202c5e817004e77', 1, 1, 'pixabay', ''),
(3, '01bb23e3875a280cb202c5e817004e77', 1, 1, 'todas', ''),
(4, '01bb23e3875a280cb202c5e817004e77', 1, 1, 'test', ''),
(5, 'f566a656f4621311ac53388497024957', 2, 1, 'ejemplo', ''),
(6, 'f566a656f4621311ac53388497024957', 2, 1, 'pixabay', ''),
(7, 'f566a656f4621311ac53388497024957', 2, 1, 'todas', ''),
(8, 'f566a656f4621311ac53388497024957', 2, 1, 'test', ''),
(9, 'fa1b586849c165d6aa74d0fb4ede96ae', 3, 1, 'ejemplo', ''),
(10, 'fa1b586849c165d6aa74d0fb4ede96ae', 3, 1, 'pixabay', ''),
(11, 'fa1b586849c165d6aa74d0fb4ede96ae', 3, 1, 'todas', ''),
(12, 'fa1b586849c165d6aa74d0fb4ede96ae', 3, 1, 'test', ''),
(13, '15a930463bbd562269d959fd89ec4028', 4, 1, 'ejemplo', ''),
(14, '15a930463bbd562269d959fd89ec4028', 4, 1, 'pixabay', ''),
(15, '15a930463bbd562269d959fd89ec4028', 4, 1, 'todas', ''),
(16, '15a930463bbd562269d959fd89ec4028', 4, 1, 'test', ''),
(17, '01149545314beab1c8075e49a1aeb50b', 5, 1, 'ejemplo', ''),
(18, '01149545314beab1c8075e49a1aeb50b', 5, 1, 'pixabay', ''),
(19, '01149545314beab1c8075e49a1aeb50b', 5, 1, 'todas', ''),
(20, '01149545314beab1c8075e49a1aeb50b', 5, 1, 'test', ''),
(21, 'e13fed6b7565cc1412301171df01bcfd', 6, 1, 'ejemplo', ''),
(22, 'e13fed6b7565cc1412301171df01bcfd', 6, 1, 'pixabay', ''),
(23, 'e13fed6b7565cc1412301171df01bcfd', 6, 1, 'todas', ''),
(24, 'e13fed6b7565cc1412301171df01bcfd', 6, 1, 'test', ''),
(25, '60f17b737576141259b6fce8c541425e', 7, 1, 'ejemplo', ''),
(26, '60f17b737576141259b6fce8c541425e', 7, 1, 'pixabay', ''),
(27, '60f17b737576141259b6fce8c541425e', 7, 1, 'todas', ''),
(28, '60f17b737576141259b6fce8c541425e', 7, 1, 'test', ''),
(29, '6c05b374df88a16ba44c30a1cdee8619', 8, 1, 'ejemplo', ''),
(30, '6c05b374df88a16ba44c30a1cdee8619', 8, 1, 'pixabay', ''),
(31, '6c05b374df88a16ba44c30a1cdee8619', 8, 1, 'todas', ''),
(32, '6c05b374df88a16ba44c30a1cdee8619', 8, 1, 'test', ''),
(33, 'aea7ee5b46ab13b87b518481dd44ab3b', 9, 1, 'Internet', ''),
(34, 'aea7ee5b46ab13b87b518481dd44ab3b', 9, 1, 'web', ''),
(35, 'aea7ee5b46ab13b87b518481dd44ab3b', 9, 1, 'social', ''),
(36, 'aea7ee5b46ab13b87b518481dd44ab3b', 9, 1, 'test', ''),
(37, '5f9962ed1069644342a10c53ccbc1557', 10, 1, 'Internet', ''),
(38, '5f9962ed1069644342a10c53ccbc1557', 10, 1, 'web', ''),
(39, '5f9962ed1069644342a10c53ccbc1557', 10, 1, 'social', ''),
(40, '5f9962ed1069644342a10c53ccbc1557', 10, 1, 'test', ''),
(41, '3da12a08d687fd6f9e42cb44a3c7d209', 11, 1, 'Internet', ''),
(42, '3da12a08d687fd6f9e42cb44a3c7d209', 11, 1, 'web', ''),
(43, '3da12a08d687fd6f9e42cb44a3c7d209', 11, 1, 'social', ''),
(44, '3da12a08d687fd6f9e42cb44a3c7d209', 11, 1, 'test', ''),
(45, '25a70962225d96306d62b2298aebf5fc', 12, 1, 'Internet', ''),
(46, '25a70962225d96306d62b2298aebf5fc', 12, 1, 'web', ''),
(47, '25a70962225d96306d62b2298aebf5fc', 12, 1, 'social', ''),
(48, '25a70962225d96306d62b2298aebf5fc', 12, 1, 'test', ''),
(49, 'c904d966b17c1a4adac3e5e2459261b5', 13, 1, 'Internet', ''),
(50, 'c904d966b17c1a4adac3e5e2459261b5', 13, 1, 'web', ''),
(51, 'c904d966b17c1a4adac3e5e2459261b5', 13, 1, 'social', ''),
(52, 'c904d966b17c1a4adac3e5e2459261b5', 13, 1, 'test', ''),
(53, '05af9e5b71b0bd4d84dc053a1955fa54', 14, 1, 'Internet', ''),
(54, '05af9e5b71b0bd4d84dc053a1955fa54', 14, 1, 'web', ''),
(55, '05af9e5b71b0bd4d84dc053a1955fa54', 14, 1, 'social', ''),
(56, '05af9e5b71b0bd4d84dc053a1955fa54', 14, 1, 'test', ''),
(57, '97ad4d82c60c86ce0542e93f2a875e43', 15, 1, 'Internet', ''),
(58, '97ad4d82c60c86ce0542e93f2a875e43', 15, 1, 'web', ''),
(59, '97ad4d82c60c86ce0542e93f2a875e43', 15, 1, 'social', ''),
(60, '97ad4d82c60c86ce0542e93f2a875e43', 15, 1, 'test', ''),
(61, '7df852844b89b5d260ba119c8916cb7c', 16, 1, 'Internet', ''),
(62, '7df852844b89b5d260ba119c8916cb7c', 16, 1, 'web', ''),
(63, '7df852844b89b5d260ba119c8916cb7c', 16, 1, 'social', ''),
(64, '7df852844b89b5d260ba119c8916cb7c', 16, 1, 'test', ''),
(65, '7d26f4374756a28fd8438ff0a61b384f', 17, 1, 'Internet', ''),
(66, '7d26f4374756a28fd8438ff0a61b384f', 17, 1, 'web', ''),
(67, '7d26f4374756a28fd8438ff0a61b384f', 17, 1, 'social', ''),
(68, '7d26f4374756a28fd8438ff0a61b384f', 17, 1, 'test', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda_users`
--

CREATE TABLE `boda_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boda_users`
--

INSERT INTO `boda_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1513439949, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'propietarios@mail.com', '$2y$08$vMUhIktLT02X69GapYAWiO2OKeY9CY.HSDRWLKhMDXt8ulJPZfKYm', NULL, 'propietarios@mail.com', NULL, NULL, NULL, NULL, 1510247164, 1513425966, 1, 'Propietarios', 'Evento', 'Nuestro evento', '123456789'),
(3, '::1', 'invitados_@mail.com', '$2y$08$YFzRgdp.LobOQzv6RHz64OaCfOy.kNQkhW2ZRSjjuy9ECuzC/afWe', NULL, 'invitados_@mail.com', NULL, NULL, NULL, NULL, 1510247257, 1510303337, 1, 'Invitados', 'Todos los Invitados', 'Nuestra evento', '987654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boda_users_groups`
--

CREATE TABLE `boda_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boda_users_groups`
--

INSERT INTO `boda_users_groups` (`id`, `user_id`, `group_id`) VALUES
(6, 1, 1),
(7, 1, 2),
(8, 1, 3),
(5, 2, 3),
(4, 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boda_categoria`
--
ALTER TABLE `boda_categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `boda_fotos`
--
ALTER TABLE `boda_fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `idfoto` (`idfoto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `boda_groups`
--
ALTER TABLE `boda_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `boda_login_attempts`
--
ALTER TABLE `boda_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `boda_tags`
--
ALTER TABLE `boda_tags`
  ADD PRIMARY KEY (`id_tag`),
  ADD KEY `idtag` (`idtag`),
  ADD KEY `id_foto` (`id_foto`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `boda_users`
--
ALTER TABLE `boda_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `boda_users_groups`
--
ALTER TABLE `boda_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boda_categoria`
--
ALTER TABLE `boda_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `boda_fotos`
--
ALTER TABLE `boda_fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `boda_groups`
--
ALTER TABLE `boda_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `boda_login_attempts`
--
ALTER TABLE `boda_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `boda_tags`
--
ALTER TABLE `boda_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `boda_users`
--
ALTER TABLE `boda_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `boda_users_groups`
--
ALTER TABLE `boda_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boda_users_groups`
--
ALTER TABLE `boda_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `boda_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `boda_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
