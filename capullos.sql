-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2020 a las 07:21:04
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
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(11, 'Rosas', 'ACTIVE'),
(13, 'SOLITARIOS ', 'ACTIVE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company_configuration`
--

CREATE TABLE `company_configuration` (
  `id` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `idorders` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `type_paymets` varchar(50) NOT NULL,
  `status` enum('APPROVED','REJECTED') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `namep` varchar(45) DEFAULT NULL,
  `image_product` varchar(45) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` float DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `offer` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`idproduct`, `namep`, `image_product`, `description`, `price`, `category`, `status`, `offer`) VALUES
(24, 'ROSAS AMARILLAS', '1603329593.jpeg', 'ROSAS ROJA', 150000, 11, 'ACTIVE', 'ON'),
(26, 'pruea', '1603329607.jpeg', 'qw', 1212, 13, 'ACTIVE', 'ON'),
(29, 'DIA DE LA MADRE', '1603332686.jpeg', 'fbd', 7, 13, 'ACTIVE', 'ON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
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
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idusers`, `email`, `password`, `name`, `surname`, `address`, `address2`, `city`, `departament`, `country`, `phone`, `image_profile`, `type`, `status`) VALUES
(1, 'adrianandres1998@gmail.com', 'Colombia1234@', 'Adrian ', 'Atencia Caly', 'CR 19 A N21-32', '', 'San marcos', 'Sucre', 'Colombia', '31335802633', '1603329760.png', 'SUPER', 'ACTIVE'),
(3, 'angel Atencia Caly', 'Colombia1234@', 'Angel Andres', 'Atencai Caly', 'DG 41B 42C-50', NULL, 'Sincelejo', 'Sicre', 'Colombia', '00000', '1603329760.png', 'ADMINISTRADOR', 'ACTIVE'),
(10, 'YOLIS.CALY@GMAIL.COM', 'capullosadmin', 'YOLIS', 'CALY', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'ADMINISTRADOR', 'ACTIVE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company_configuration`
--
ALTER TABLE `company_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorders`),
  ADD KEY `user` (`user`),
  ADD KEY `type_paymets` (`idpaymets`);

--
-- Indices de la tabla `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`),
  ADD KEY `category` (`category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `company_configuration`
--
ALTER TABLE `company_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `idorders` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`idusers`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idpaymets`) REFERENCES `payments` (`id`);

--
-- Filtros para la tabla `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`idproduct`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`idorders`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
