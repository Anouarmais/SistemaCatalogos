-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2024 a las 17:14:41
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
-- Base de datos: `sistemacatalogos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cesta`
--

CREATE TABLE `cesta` (
  `username` varchar(255) NOT NULL,
  `producto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cesta`
--

INSERT INTO `cesta` (`username`, `producto`) VALUES
('gggg', ''),
('', 'Screen iphone 14pro'),
('', 'Screen iphone 14pro'),
('anouarmais', ''),
('hasna', 'Screen Iphone 14'),
('hasna', 'jbisajbdsa'),
('raul', 'Iphone 14 Battery '),
('anouar', 'Screen Iphone SE 3 gen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `name` varchar(50) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `opinion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`name`, `producto`, `opinion`) VALUES
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'oajbsiubands'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'saasasas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'saasasas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'saasasas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'saasasas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'saasasas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'saasasas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'saasasas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'aosnkoak'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'aosnkoak'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'sj alksa'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'ssasa'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'asasasasjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj\r\n'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'aasjbdkajsbdkas'),
('anouarcacas', 'Samsung Galaxy S23 Ultra', 'hola\r\n'),
('anouarcacas', 'iPhone 14 Pro', 'abjodasda\r\n'),
('', 'Samsung Galaxy S23 Ultra', 'sdadasdAS'),
('', 'Samsung Galaxy S23 Ultra', 'DASDN.BAÑIUCBAJO'),
('', 'Samsung Galaxy S23 Ultra', 'dadsadasda'),
('', 'Samsung Galaxy S23 Ultra', 'asdas'),
('www', 'Samsung Galaxy S23 Ultra', 'slkdbaihydvbaós'),
('www', 'Samsung Galaxy S23 Ultra', 'asdihfaougsvdhñai'),
('www', 'Samsung Galaxy S23 Ultra', 'sa-md ñakjsd\r\n\r\n'),
('www', 'Samsung Galaxy S23 Ultra', 'dkugycoa8syd'),
('www', 'Samsung Galaxy S23 Ultra', '-akjvhñkjda'),
('anouarcacas', 'Google Pixel 7 Pro', 'vaya mierda tio'),
('anouarcacas', 'anouar', 'AXASXz'),
('anouarcacas', 'Screen Iphone 14', 'adasda'),
('anouarcacas', 'Screen iphone 14pro', 'Papá Sanchez'),
('clase', 'Screen Iphone 14', 'Estafa'),
('clase', 'Screen Iphone 14', '1\r\n23\r\n54324'),
('deivid', 'Screen iphone 14pro', 'una mielda'),
('deivid', '[value-5]', 'comentario '),
('anouarcacas', 'Screen iphone 14pro', 'ohdfsiubsf\r\n'),
('anouarcacas', 'Screen iphone 14pro', 'ad,nsadojñasbdoasda\r\n'),
('anouarcacas', 'Screen iphone 14pro', 'xvxcvc'),
('anouarcacas', '[value-2]', 'dsfsd'),
('anouarcacas', '[value-2]', 'sfdsfsdsdfdsfsdfdsfsdf'),
('anouarcacas', 'Screen Iphone 14', 'adsadas'),
('anouarcacas', 'Screen iphone 14pro', 'caca'),
('asdf', 'Screen Iphone 14', 'a\r\n'),
('anouarcacas', 'Screen iphone 14pro', 'sasa'),
('anouarcacas', 'Screen iphone 14pro', 'qwqwqqqw'),
('anouarcacas', 'Screen iphone 14pro', 'wqqqqqqqqqqqqqqqq'),
('anouarmaissaydi', ' iphone 12 speakers', 'Este producto mola'),
('raul', 'Iphone 12 charging port', 'este mola'),
('raul', 'Iphone 14 Battery ', 'raul\r\n'),
('anouar', 'Screen Iphone SE 3 gen', 'mola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(3) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `description`, `img`) VALUES
(0, 'Screen Iphone 14', 40, 'The iPhone 14 screen has rounded corners that follow the phone\'s sleek curved design.', 'iPhone-14-512GB-Red-0194253412540-21092022-02-p.webp'),
(0, 'Screen iphone 14pro', 50, 'The iPhone 14 pro screen has rounded corners that follow the phone\'s sleek curved design.', 'iPhone-14-Pro-LCD-Display-Black-Original-Quality-07032023-01-p.webp'),
(0, 'Screen iphone 15', 40, 'The iPhone 15 screen has rounded corners that follow the phone\'s sleek curved design.', 'iPhone-15-Pro-LCD-Display-Black-Original-Quality-11102023-01-p (1).webp'),
(0, 'Screen iphone 15 pro', 45, 'The iPhone 15 pro screen has rounded corners that follow the phone\'s sleek curved design,', 'iPhone-15-Pro-LCD-Display-Black-Original-Quality-11102023-01-p.webp'),
(0, ' iphone 12 speakers', 5, '\r\nHigh quality speakers for iPhone 12, offering clear and crisp sound for calls, music and videos.', 'altavioces12ypro.jpg'),
(0, 'iphone12 pro speakers', 6, '\r\nHigh quality speakers for iPhone 12pro, offering clear and crisp sound for calls, music and videos.', 'altavioces12ypro.jpg'),
(0, 'Face id for Iphone13', 20, 'Face ID on iPhone 13 allows you to unlock the device and authenticate payments quickly and securely using facial recognition.', 'faceid13.jpg'),
(0, ' Iphone 14 charging port', 12, 'This port allows for fast charging, data transfer, and connection of compatible accessories. Although the Lightning connector is maintained, it is also compatible with MagSafe and Qi wireless charging', 'puerto14y14pro.jpg'),
(0, 'Iphone 13 charging port', 15, 'This port allows you to quickly charge the device, as well as transfer data and connect accessories.', 'iphone13ypro.jpg'),
(0, 'Iphone 12 charging port', 8, 'This port allows you to quickly charge the device, as well as transfer data and connect accessories.', 'puerto12 y 12 pro.jpg'),
(0, 'Iphone 12 pro charging port', 9, 'This port allows you to quickly charge the device, as well as transfer data and connect accessories.', 'puerto12 y 12 pro.jpg'),
(0, 'Screen Iphone SE 3 gen', 15, 'The screen offers vivid colors and sharp details, making it ideal for viewing photos, videos, and apps. The display also includes Haptic Touch for quick actions, and is protected by Ion-strengthened glass.', 'se3gen.jpg'),
(0, 'Screen Iphone SE  2 gen', 13, 'The iPhone SE (2nd generation) features a 4.7-inch Retina HD display with True Tone. This display provides crisp, clear visuals with wide color support, making it ideal for watching videos', 'sepantalla2gen.jpg'),
(0, 'Iphone 15 Battery ', 10, 'The iPhone 15 is equipped with a battery designed for all-day use, providing up to 20 hours of video playback. It supports fast charging, allowing you to charge up to 50% in around 30 minutes', 'bateria15.jpg'),
(0, 'Iphone 15 pro Battery ', 13, 'The iPhone 15 Pro features a long-lasting battery that offers up to 23 hours of video playback. It benefits from enhanced power efficiency due to the A17 Pro chip', 'bateria15projpg.jpg'),
(0, 'Iphone 14 pro Battery ', 16, 'The iPhone 14 Pro features a long-lasting battery that offers up to 23 hours of video playback. It benefits from enhanced power efficiency due to the A16 Pro chip', 'bateria14pro.jpg'),
(0, 'Iphone 14 Battery ', 13, 'The iPhone 14 features a long-lasting battery that offers up to 19 hours of video playback. It benefits from enhanced power efficiency due to the A14 chip', 'bateria14.jpg'),
(0, 'Iphone 12 pro Battery ', 12, 'The iPhone 12 Pro features a long-lasting battery that offers up to 19 hours of video playback. It benefits from enhanced power efficiency due to the A12 chip', 'bateria12pro.jpg'),
(0, 'Iphone 13 Battery ', 13, 'The iPhone 13 features a long-lasting battery that offers up to 23 hours of video playback. It benefits from enhanced power efficiency due to the A13 Pro chip', 'bateria13.jpg'),
(0, 'Iphone13 pro Battery', 13, 'The iPhone 13Pro features a long-lasting battery that offers up to 23 hours of video playback. It benefits from enhanced power efficiency due to the A13 Pro chip', 'bateria13pro.jpg'),
(0, 'Screen Iphone11', 13, 'That screen is awesome', 'pantalla iphone11.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `ubicacion` text NOT NULL,
  `nombrecompleto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `admin`, `email`, `telefono`, `ubicacion`, `nombrecompleto`) VALUES
(39, 'anouar', '$2y$10$5.3eOcPcg1TQp6Clfqe.HucKvTQwzHn/Vi01z4UdEWQwkTqeFMHPK', 1, 'ams0054@alu.medac.es', 2147483647, 'akpsnd', 'dasdasds'),
(49, 'soyRomero', '$2y$10$VpEz.imA/K2f3SKUM3X1ZeLCacY6NoJiYZoB8c4rrCQVledcc7uNi', 0, 'juan.romero@gmail.com', 0, 'Murcia', 'Romero'),
(61, 'juan', '$2y$10$0u0LdjCAiqpe776/SOEiUeLdF3z0mI/xfv01elZUzNtsB9qze0CMe', 0, 'juan@juan.es', 234234, 'murcia', 'juan'),
(65, 'anouarmaissaydi', '$2y$10$96Jz/qs9uncplhJKMprEceq1nJ243IWwqYUcFuWaI0KWGeSy7mGZK', 0, 'hola@youtube.com', 123456789, 'Murcia', 'Anouar mais'),
(66, 'raul', '$2y$10$FFU.EsxGFqE.Fx3bPF43IeyPPwWAJfPvRMq.fs6eMaEgBhYQY1X4O', 1, 'raul@raul.com', 123456789, 'Murcia', 'Raul');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
