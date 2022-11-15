-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 09:26:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `nombre_apellido` varchar(100) NOT NULL,
  `dni` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `num_cuenta` int(11) NOT NULL,
  `saldo` float DEFAULT NULL,
  `ultimo_movimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_cuenta`, `nombre_apellido`, `dni`, `direccion`, `fecha_nacimiento`, `num_cuenta`, `saldo`, `ultimo_movimiento`) VALUES
(2, 1, 'Flaco Leo ', 423423, 'Patagonia 13', '2022-09-12', 5542, 400.55, '2022-10-11'),
(3, 2, 'Matias Molina', 35562414, 'Ameghino 727', '2022-09-02', 32112, 45000, '2022-10-13'),
(13, 9, 'Cristian Molina', 29710739, 'Alsina 44', '2022-09-26', 14331, 43332, '2022-10-14'),
(14, 12, 'Celeste Escobar', 39423788, 'Av. Juan B Justo 833', '1997-03-02', 409, 700, '2022-10-12'),
(15, 5, 'UNCPBA', 67566609, 'Pinto 399', '2022-10-01', 23766, 9560000, '2022-10-17'),
(16, 4, 'Marcelo Gallardo', 23427711, 'Nuñez 912', '2018-12-09', 912, 14760000, '2022-10-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `tipo_cuenta` varchar(50) NOT NULL,
  `moneda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `tipo_cuenta`, `moneda`) VALUES
(1, 'Caja de ahorro especial', 'Dolares'),
(2, 'Cuenta corriente', 'Pesos'),
(4, 'Caja de ahorro', 'Euros'),
(5, 'Cuenta corriente', 'Euros'),
(9, 'Caja de ahorro', 'Pesos'),
(12, 'Cuenta sueldo', 'Pesos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `user`, `password`) VALUES
(1, 'molina727', '$2y$10$N2DBvaOQShvNIZedXsIineLxrbcrDvxLIWRzbIf5rq6IYYU/pFsQ.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_cliente_cuenta` (`id_cuenta`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_cuenta` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
