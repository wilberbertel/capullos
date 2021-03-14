-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2021 a las 02:21:06
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name_city` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company_configuration`
--

CREATE TABLE `company_configuration` (
  `id_config` int(11) NOT NULL,
  `nit` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `social_reason` varchar(100) NOT NULL,
  `phone_fixed` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `iva` int(11) NOT NULL,
  `banner_image` varchar(45) DEFAULT NULL,
  `phone_mobile` varchar(45) DEFAULT NULL,
  `whatsapp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name_country` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `user` int(45) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `order_code` varchar(45) DEFAULT NULL,
  `operation_code` varchar(45) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `payment_method` varchar(45) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL
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
  `occasions` int(11) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `additions` enum('SI','NO') DEFAULT NULL,
  `secondary_sentences` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping`
--

CREATE TABLE `shipping` (
  `id_shipping` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address1` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `names` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `from` varchar(45) DEFAULT NULL,
  `for` varchar(45) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `payment_status` varchar(45) DEFAULT NULL,
  `date_complete` varchar(45) DEFAULT NULL,
  `request_status` varchar(45) DEFAULT NULL,
  `id_sold_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sold_products`
--

CREATE TABLE `sold_products` (
  `id_soldProduct` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `dia` varchar(45) DEFAULT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `año` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name_state` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `token` varchar(50) DEFAULT NULL,
  `token_password` varchar(50) DEFAULT NULL,
  `password_request` varchar(45) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `name`, `surname`, `address`, `address2`, `city`, `departament`, `country`, `phone`, `image_profile`, `type`, `status`, `token`, `token_password`, `password_request`, `last_login`) VALUES
(1, 'adrianandres1998@gmail.com', 'a05c0220614a3476868da6ce623467e67dba566e', 'Adrian Andres', 'Atencia Caly', 'CR 19 A N21-32', 'CR 19 A N21-32', 'SAN MARCOS ', 'SUCRE', 'COLOMBIA', '3133580263', '1614734241.jpg', 'SUPER', 'ACTIVE', NULL, NULL, NULL, '2021-03-02 20:19:23'),
(2, 'wilber.bertel@cecar.edu.co', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'WILBER ', 'BERTEL TOSCANO', 'DIRECCION ', NULL, 'SINCELEJO', 'SUCRE', 'COLOMBIA', '11111', '1611201035.png', 'SUPER', 'ACTIVE', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indices de la tabla `company_configuration`
--
ALTER TABLE `company_configuration`
  ADD PRIMARY KEY (`id_config`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category` (`category`),
  ADD KEY `occasions` (`occasions`);

--
-- Indices de la tabla `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `id_sold_product` (`id_sold_product`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sold_product_2` (`id_sold_product`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_orders` (`id_orders`);

--
-- Indices de la tabla `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`id_soldProduct`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

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
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `company_configuration`
--
ALTER TABLE `company_configuration`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id_ocaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `id_soldProduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `occasions`
--
ALTER TABLE `occasions`
  ADD CONSTRAINT `occasions_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`occasions`) REFERENCES `occasions` (`id_ocaciones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `shipping_ibfk_2` FOREIGN KEY (`id_sold_product`) REFERENCES `sold_products` (`id_soldProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shipping_ibfk_3` FOREIGN KEY (`id_orders`) REFERENCES `orders` (`id_orders`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sold_products`
--
ALTER TABLE `sold_products`
  ADD CONSTRAINT `sold_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
