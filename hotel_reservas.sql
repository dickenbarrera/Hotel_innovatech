-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2024 a las 22:37:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel_reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(150) NOT NULL,
  `replies` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, '¿Cuál es la dirección del hotel?', 'La dirección del hotel es [insertar dirección aquí]. ¿Te gustaría saber cómo llegar?'),
(2, '¿Qué servicios ofrece el hotel?', 'Nuestro hotel ofrece [insertar servicios aquí: Wi-Fi, gimnasio, restaurante, etc.]. ¿Te gustaría más detalles sobre alguno?'),
(3, '¿Cuál es el horario de check-in?', 'El horario de check-in es a partir de las 3:00 PM. Si llegas antes, podemos guardar tu equipaje.'),
(4, '¿Cuál es el horario de check-out?', 'El horario de check-out es hasta las 12:00 PM. Si necesitas más tiempo, podemos ofrecerte una extensión según disponibilidad.'),
(5, '¿Tienen habitaciones disponibles?', 'Déjame verificar la disponibilidad para las fechas que indiques. ¿Cuándo planeas hospedarte?'),
(6, '¿Puedo cancelar o modificar mi reserva?', 'Sí, puedes cancelar o modificar tu reserva según nuestra política de cancelación. ¿Te gustaría hacer un cambio?'),
(7, '¿Hay estacionamiento en el hotel?', 'Sí, ofrecemos estacionamiento gratuito para nuestros huéspedes. ¿Necesitas más información sobre esto?'),
(8, '¿El hotel tiene piscina?', 'Sí, contamos con una piscina en las instalaciones. ¡Es ideal para relajarte!'),
(9, '¿El hotel es accesible para personas con discapacidad?', 'Sí, nuestro hotel es accesible para personas con discapacidad. Disponemos de habitaciones adaptadas y otras facilidades.'),
(10, '¿Hay transporte al aeropuerto?', 'Ofrecemos un servicio de transporte al aeropuerto. ¿Te gustaría reservarlo?'),
(11, '¿El hotel tiene restaurante?', 'Sí, tenemos un restaurante que ofrece [tipo de cocina]. ¡Te encantaría! ¿Quieres hacer una reserva?'),
(12, '¿Puedo llevar mascotas al hotel?', 'Lamentablemente, no aceptamos mascotas en el hotel. ¿Te gustaría saber sobre opciones cercanas?'),
(13, '¿Hay Wi-Fi gratis en las habitaciones?', 'Sí, ofrecemos Wi-Fi gratuito en todas nuestras habitaciones y áreas comunes.'),
(14, '¿Tienen habitaciones para no fumadores?', 'Sí, todas nuestras habitaciones son para no fumadores. ¡Te aseguramos una estancia libre de humo!'),
(15, '¿Cuáles son las opciones de pago?', 'Aceptamos tarjetas de crédito, débito y pagos en efectivo. También puedes pagar en línea al hacer tu reserva.'),
(16, '¿El hotel ofrece desayuno?', 'Sí, ofrecemos un delicioso desayuno buffet todos los días desde las 7:00 AM hasta las 10:00 AM.'),
(17, '¿Cómo puedo hacer una reserva?', 'Puedes hacer una reserva directamente desde nuestra página web o llamarnos al [número de teléfono].'),
(18, '¿Ofrecen promociones o descuentos?', 'Tenemos varias promociones dependiendo de la temporada. ¿Te gustaría saber más sobre nuestras ofertas actuales?'),
(19, '¿Cuál es la política de niños en el hotel?', 'Los niños menores de [edad] pueden hospedarse sin costo adicional. ¿Te gustaría obtener más detalles?'),
(20, '¿El hotel tiene gimnasio?', 'Sí, contamos con un gimnasio totalmente equipado para nuestros huéspedes.'),
(21, '¿Cómo llego desde la estación de tren al hotel?', 'El hotel está a [número] minutos en taxi de la estación de tren. También puedes tomar [número] línea de autobús.'),
(22, '¿Puedo dejar mi equipaje antes del check-in?', 'Sí, puedes dejar tu equipaje con nosotros antes de hacer el check-in.'),
(23, '¿Hay algún lugar para hacer compras cerca del hotel?', 'Sí, hay varios centros comerciales y tiendas en las cercanías. Te podemos recomendar algunos.'),
(24, '¿Tienen habitaciones con vista al mar?', 'Sí, tenemos habitaciones con vista al mar disponibles. ¿Te gustaría reservar una de ellas?'),
(25, '¿El hotel ofrece actividades para niños?', 'Sí, contamos con un área de juegos y actividades especiales para niños. ¿Te gustaría saber más?'),
(26, '¿El hotel tiene spa?', 'Sí, ofrecemos servicios de spa para relajarte durante tu estancia. ¿Te gustaría agendar una cita?'),
(27, '¿Tienen habitaciones familiares?', 'Sí, tenemos habitaciones familiares con más espacio y comodidades. ¿Te gustaría conocer más?'),
(28, '¿Puedo realizar un pago anticipado?', 'Sí, puedes realizar un pago anticipado al hacer tu reserva para asegurar tu habitación.'),
(29, '¿Cómo puedo solicitar una cuna o cama extra?', 'Puedes solicitar una cuna o cama extra al hacer la reserva o durante el check-in.'),
(30, '¿El hotel organiza tours o excursiones?', 'Sí, podemos organizar tours y excursiones por la zona. ¿Te gustaría obtener más información sobre ellos?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `correo`, `mensaje`) VALUES
(2, 'Juan', 'Juan123@Gmail.com', 'Estoy interesado en realizar una reserva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `documento` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `salario` float UNSIGNED NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `documento`, `telefono`, `cargo`, `salario`, `fecha_ingreso`, `fecha_salida`, `fecha_nacimiento`) VALUES
(2, 's', 's', 1, 1234567, 's', 1, '2024-11-29', '2024-11-29', '2024-11-29'),
(4, 's', 's', 12, 1234567, 'a', 12, '2024-11-29', '2024-11-29', '2024-11-29'),
(6, 'qwerwr', 'qwerqwr', 741742752, 2147483647, 'qwerqw', 213135, '2024-11-29', '2024-11-15', '2024-11-09'),
(35, 'fasfas', 'asdfsdfasf', 252111234, 234123412, 'fsf', 234412, '2024-11-25', '2024-11-22', '2024-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `ID_habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`ID_habitacion`) VALUES
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `codigo_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `cantidad_stock` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `proveedor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`codigo_producto`, `nombre_producto`, `descripcion`, `cantidad_stock`, `precio`, `proveedor`) VALUES
(234214, 'arroz', 'grano', 234, 2134123, 'diana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `ID_habitacion` varchar(10) NOT NULL,
  `estado_habitacion` char(10) DEFAULT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id`, `nombre`, `apellido`, `telefono`, `ID_habitacion`, `estado_habitacion`, `fecha_entrada`, `fecha_salida`, `precio`) VALUES
(1, 'juan', 'barrera', '42444222', '101', 'Disponible', '2024-12-19', '2024-12-28', 34234.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `pass_user` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `email`, `pass_user`) VALUES
(1, 'Juan', 'Juan@gmail.123', 'MTIzNDU=');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`ID_habitacion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`codigo_producto`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `codigo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234215;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
