-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2020 a las 18:35:53
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capullos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `name`, `status`) VALUES
(16, 'DIA DE LA MADRE', 'ACTIVE'),
(17, 'FUNEBRE', 'ACTIVE'),
(18, 'ARREGLOS VARIOS', 'ACTIVE'),
(19, 'QUINCEAÑEROS', 'ACTIVE'),
(20, 'BODAS', 'ACTIVE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company_configuration`
--

CREATE TABLE `company_configuration` (
  `id_config` int(11) NOT NULL,
  `nit` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `social_reason` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `occasions`
--

CREATE TABLE `occasions` (
  `id_ocaciones` int(11) NOT NULL,
  `name_ocaciones` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `occasions`
--

INSERT INTO `occasions` (`id_ocaciones`, `name_ocaciones`, `status`, `category`) VALUES
(6, 'MAMA', 'ACTIVE', 16),
(7, 'Ocacion 1', 'ACTIVE', 19),
(8, 'Ocacion 2', 'ACTIVE', 20),
(9, 'Ocacion 23', 'ACTIVE', 16),
(10, 'Ocacion 233', 'ACTIVE', 18),
(11, '767', 'ACTIVE', 20),
(12, '6767', 'ACTIVE', 20),
(13, '6767', 'ACTIVE', 20),
(14, 'DIA DE LA MADRE', 'ACTIVE', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `user` int(45) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `order_code` varchar(45) DEFAULT NULL,
  `operation_code` varchar(45) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `idpaymets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_details`
--

CREATE TABLE `orders_details` (
  `id_details` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id_payments` int(11) NOT NULL,
  `type_paymets` varchar(50) NOT NULL,
  `status` enum('APPROVED','REJECTED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `namep` varchar(45) DEFAULT NULL,
  `image_product` varchar(45) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` float DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `occasions` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `offer` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `namep`, `image_product`, `description`, `price`, `category`, `occasions`, `status`, `offer`) VALUES
(59, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'INACTIVE', 'ON'),
(60, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(61, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(62, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(63, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(64, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(65, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(66, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(67, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(68, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(69, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(70, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(71, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(72, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(73, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(74, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(75, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(76, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(77, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(78, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(79, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(80, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(81, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(82, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(83, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(84, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(85, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(86, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(87, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(88, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(89, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(90, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(91, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(92, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(93, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(94, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(95, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(96, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(97, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(98, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(99, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(100, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(101, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(102, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(103, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(104, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(105, 'FLOR 1', '1604417806.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(106, 'FLOR 2', '1604417823.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 20000, 16, 6, 'ACTIVE', 'ON'),
(107, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON'),
(108, 'FLOR 3', '1604417838.jpeg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 100000, 16, 6, 'ACTIVE', 'ON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(55) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `departament` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `image_profile` varchar(45) NOT NULL,
  `type` enum('SUPER','ADMINISTRADOR','CLIENTE') NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `name`, `surname`, `address`, `address2`, `city`, `departament`, `country`, `phone`, `image_profile`, `type`, `status`, `last_login`) VALUES
(1, 'adrianandres1998@gmail.com', 'e78fab2b02ff01b30e180546fff0379b6644bbc5', 'Adrian ', 'Atencia Caly', 'CR 19 A N21-32', '', 'San marcos', 'Sucre', 'Colombia', '31335802633', '1603329760.png', 'SUPER', 'ACTIVE', '2020-11-09 18:59:31'),
(42, 'YOLIS.CALY@GMAIL.COM', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'YOLIS', 'CALY', '1212', '12', '12', '12', 'Colombia', '12', 'default.png', 'CLIENTE', 'ACTIVE', '2020-11-08 17:11:07'),
(44, 'adrianandres1998@gmail.com11111', '80315637380dbbf00293e701510d7dbeb3747ead', 'ADRIAN', 'CALY', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'ADMINISTRADOR', 'ACTIVE', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `company_configuration`
--
ALTER TABLE `company_configuration`
  ADD PRIMARY KEY (`id_config`);

--
-- Indices de la tabla `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id_ocaciones`),
  ADD KEY `category` (`category`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `user` (`user`),
  ADD KEY `type_paymets` (`idpaymets`);

--
-- Indices de la tabla `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id_details`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payments`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category` (`category`),
  ADD KEY `occasions` (`occasions`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `company_configuration`
--
ALTER TABLE `company_configuration`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id_ocaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `occasions`
--
ALTER TABLE `occasions`
  ADD CONSTRAINT `occasions_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idpaymets`) REFERENCES `payments` (`id_payments`);

--
-- Filtros para la tabla `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`occasions`) REFERENCES `occasions` (`id_ocaciones`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
