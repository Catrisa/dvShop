-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 22-12-2020 a las 17:17:22
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dv-produccion_web-tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'manga corta'),
(2, 'manga larga'),
(5, 'bermuda'),
(6, 'buzo'),
(7, 'campera'),
(8, 'camisa'),
(9, 'chino'),
(10, 'jean'),
(11, 'musculosa'),
(12, 'jogging');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ropa_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `descripcion`, `imagen`, `categoria_id`) VALUES
(1, 'Bermuda denim atenea', 2978, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', '5fcae63fe3bba.jpeg', 5),
(2, 'bermuda corte chino solano', 4121, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'bermuda-02.jpg', 5),
(3, 'bermuda 5 bolsillos victoria beach', 3412, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'bermuda-03.jpg', 5),
(7, 'buzo canguro light ranglan', 4132, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'buzo-01.jpg', 6),
(8, 'buzo canguro liso', 3412, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'buzo-02.jpg', 6),
(9, 'buzo canguro semi camuflado', 4152, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'buzo-03.jpg', 6),
(10, 'buzo canguro byw', 4876, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'buzo-04.jpg', 6),
(11, 'camisa lisa blanca', 4123, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'camisa-01.jpg', 8),
(12, 'camisa jean azul', 4565, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'camisa-02.jpg', 8),
(13, 'camisa oscura cuadritos', 2445, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'camisa-03.jpg', 8),
(14, 'camisa clara rhodes', 2341, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'camisa-04.jpg', 8),
(15, 'campera camo rebel', 5313, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'campera-01.jpg', 7),
(16, 'campera lisa paradise', 5613, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'campera-02.jpg', 7),
(17, 'campera tipo buzo', 5125, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'campera-03.jpg', 7),
(18, 'campera con cierre charly', 5835, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'campera-04.jpg', 7),
(19, 'chino color avila', 3976, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'chino-01.jpg', 9),
(20, 'chino bolsillos berkley', 3214, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'chino-02.jpg', 9),
(21, 'chino summer oscuro', 3781, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'chino-03.jpg', 9),
(22, 'jean clasico azul', 3451, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'jean-01.jpg', 10),
(23, 'Jean gris oscuro', 4098, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'jean-02.jpg', 10),
(24, 'Jean denim azul oscuro', 4125, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'jean-03.jpg', 10),
(25, 'Jogging gris claro', 2415, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'jogging-01.jpg', 12),
(26, 'jogging negro con blanco', 2341, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'jogging-02.jpg', 12),
(27, 'jogging gris oscuro', 4122, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'jogging-03.jpg', 12),
(28, 'musculosa lisa blanca', 1512, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'musculosa-01.jpg', 11),
(29, 'musculosa california', 1562, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'musculosa-02.jpg', 11),
(30, 'musculosa cali 3', 1245, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'musculosa-03.jpg', 11),
(31, 'remera lisa negra', 1231, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'remera-corta-01.jpg', 1),
(32, 'remera lisa blanca', 1234, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'remera-corta-02.jpg', 1),
(33, 'remera tigers oscura', 1755, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'remera-corta-03.jpg', 1),
(34, 'remera blanca y negra 53 flowers', 1232, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusandae? Ratione praesentium provident dignissimos et quam, voluptatibus perspiciatis eligendi earum illo voluptatum repudiandae distinctio culpa cupiditate recusandae ut fugiat!', 'remera-corta-04.jpg', 1),
(35, 'remera manga larga oscura', 1562, 'Obcaecati, corrupti repudiandae. Odit exercitationem repellendus quidem amet rem nostrum recusanda? Ratione praesentium fugiat!', '5fc2cf0774b51.jpeg', 2),
(46, 'remera mid cud rof', 2532, 'Prueba de la funcion uniqid() para guardar los nombres de las imagenes 2', '5fc2cedd68453.jpeg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rol` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `email`, `clave`, `rol`) VALUES
(7, 'saul', 'zarate', 'saul@gmail.com', '$2y$10$aos9BUmBqWVIHEB2yaqvA.q29PG3FLBfeb/hy/y9onGSyPjSoU4Fu', 'admin');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_ropa_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
