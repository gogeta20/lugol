-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2020 a las 15:45:33
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `DC` text COLLATE utf8mb4_spanish_ci,
  `imagen` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_spanish_ci,
  `usuario` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `contador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `fecha`, `DC`, `imagen`, `descripcion`, `usuario`, `categoria`, `contador`) VALUES
(3, 'tercera Titulo', '2019-10-29', 'tercera Descripcion corta', 'tres.jpg', 'tercera Descripcion LARGA', 2, 1, NULL),
(22, 'Primer Titulo', '2019-10-29', 'primera Descripcion corta', 'uno.jpg', 'primera Descripcion LARGA', 2, 2, NULL),
(23, 'segunda Titulo', '2019-10-29', 'segunda Descripcion corta', 'dos.jpg', 'segunda Descripcion LARGA', 3, 3, NULL),
(24, 'tercera Titulo', '2019-10-29', 'tercera Descripcion corta', 'tres.jpg', 'tercera Descripcion LARGA', 4, 3, NULL),
(25, 'cuarta Titulo', '2019-10-29', 'cuarta Descripcion corta', 'cuatro.jpg', 'cuarta Descripcion LARGA', 3, 3, NULL),
(26, 'quinta Titulo', '2019-10-29', 'quinta Descripcion corta', 'cinco.jpg', 'quinta Descripcion LARGA', 3, 3, NULL),
(54, 'sexto Titulo', '2019-10-29', 'sexto Descripcion corta', 'uno.jpg', 'sexto Descripcion LARGA', 4, 4, NULL),
(55, 'sexto Titulo', '2019-10-29', 'sexto Descripcion corta', 'uno.jpg', 'sexto Descripcion LARGA', 4, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `subcategoria` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imagen` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `depende` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `subcategoria`, `imagen`, `depende`) VALUES
(1, 'nike', 'm', 'nike.png', NULL),
(2, 'adidas', 'm', 'adidas.jpg', NULL),
(3, 'fila', 'm', 'fila.jpeg', NULL),
(4, 'reebok', 'm', 'reebok.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lema` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci,
  `imagen` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `escudo` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sede` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `presidente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `lema`, `descripcion`, `imagen`, `escudo`, `sede`, `presidente`) VALUES
(1, 'Miraz Fc', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'miraz.jpg', 'Escmiraz.jpg', 'Av Amarillo n 666 bajo ', 100),
(2, 'yo y ellos FC', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'ellos.jpg', 'EscEllos.jpg', 'Av Amarillo n 666 bajo ', 100),
(3, 'Piringalla A', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'piringalla.jpeg', 'EscPiringalla.jpeg', 'Av Amarillo n 666 bajo ', 100),
(4, 'Manolo FC', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'manolo.png', 'EscManolo.png', 'Av Amarillo n 666 bajo ', 100),
(5, 'La Masia', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Masia.jpg', 'EscMasia.jpg', 'Av Amarillo n 666 bajo ', 100),
(6, 'Ultra Ronda Fc', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Ronda.jpg', 'EscRonda.jpg', 'Av Amarillo n 666 bajo ', 100),
(7, 'Pepe y amigos Fc', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Pepe.jpeg', 'EscPepe.jpeg', 'Av Amarillo n 666 bajo ', 100),
(8, 'Real Mandril Fc', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Mandril.jpg', 'EscMandril.jpg', 'Av Amarillo n 666 bajo ', 100),
(9, 'Catadores CF', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Catadores.jpg', 'EscCatadores.jpg', 'Av Amarillo n 666 bajo ', 100),
(10, 'Tres Pes Fc', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Pes.jpeg', 'EscPes.jpeg', 'Av Amarillo n 666 bajo ', 100),
(11, 'Leganes Fc', 'somos un equipo de amigos que nos gusta el deporte y bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Legales.jpeg', 'EscLegales.jpeg', 'Av Amarillo n 666 bajo ', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dc` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `miniatura` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `contador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `imagen`, `dc`, `miniatura`, `fecha`, `contador`) VALUES
(9, 'Comienza la liga LugoGol 2020 -1', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes ', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'inicioMin.jpg', '2020-04-20', 10),
(11, 'Inscripcion abierta para nuevos -2', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido ', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'nuevosEquiposMin.png', '2020-04-20', 9),
(12, 'El dia del Trabajo sera la primera Jorn -3', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tuPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido  contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tuPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido  contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'primeraJornadaMin.png', '2020-04-20', 8),
(13, 'Comienza la liga LugoGol 2020 -4', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido\r\n\r\nPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido\r\n\r\nPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido\r\n\r\nPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'dos.jpg', '2020-04-20', 7),
(14, 'Inscripcion abierta para nuevos Equip -5', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tuPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido  contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'tres.jpg', '2020-04-20', 6),
(15, 'El dia del Trabajo sera la primera Jorna -6', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidoPara eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenidotu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cuatro.jpg', '2020-04-20', 5),
(16, 'Comienza la liga LugoGol 2020 -7', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cinco.jpg', '2020-04-20', 0),
(17, 'Inscripcion abierta para nuevos Equi -8', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', '', '2020-04-20', 0),
(23, 'Comienza la liga LugoGol 2020 -9', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'inicioMin.jpg', '2020-04-20', 10),
(24, 'Inscripcion abierta para nuevos Equip -10', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'nuevosEquiposMin.png', '2020-04-20', 9),
(25, 'El dia del Trabajo sera la primera Jorn -11', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'primeraJornadaMin.png', '2020-04-20', 8),
(26, 'Comienza la liga LugoGol 20 -12', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'dos.jpg', '2020-04-20', 7),
(27, 'Inscripcion abierta para nuevos Equip -13', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'tres.jpg', '2020-04-20', 6),
(28, 'El dia del Trabajo sera la primera J -14', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cuatro.jpg', '2020-04-20', 5),
(29, 'Comienza la liga LugoGol 20 -15', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cinco.jpg', '2020-04-20', 0),
(30, 'Inscripcion abierta para nuevos Equip -16', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', '', '2020-04-20', 0),
(31, 'Comienza la liga LugoGol 20 -17', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'inicioMin.jpg', '2020-04-20', 10),
(32, 'Inscripcion abierta para nuevos Equip -18', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'nuevosEquiposMin.png', '2020-04-20', 9),
(33, 'El dia del Trabajo sera la primera Jornada -19', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'primeraJornadaMin.png', '2020-04-20', 8),
(34, 'Comienza la liga LugoGol 2020 -20', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'dos.jpg', '2020-04-20', 7),
(35, 'Inscripcion abierta para nuevos Equi -21', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'tres.jpg', '2020-04-20', 6),
(36, 'El dia del Trabajo sera la primera Jor -22', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cuatro.jpg', '2020-04-20', 5),
(37, 'Comienza la liga LugoGol 20 -23', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cinco.jpg', '2020-04-20', 0),
(38, 'Inscripcion abierta para nuevos Equip -24', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', '', '2020-04-20', 0),
(39, 'Comienza la liga LugoGol 20 -25', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'inicioMin.jpg', '2020-04-20', 10),
(40, 'Inscripcion abierta para nuevos Equipos', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'nuevosEquiposMin.png', '2020-04-20', 9),
(41, 'El dia del Trabajo sera la primera Jornada', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'primeraJornadaMin.png', '2020-04-20', 8),
(42, 'Comienza la liga LugoGol 2020', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'dos.jpg', '2020-04-20', 7),
(43, 'Inscripcion abierta para nuevos Equipos', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'tres.jpg', '2020-04-20', 6),
(44, 'El dia del Trabajo sera la primera Jorna', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cuatro.jpg', '2020-04-20', 5),
(45, 'Comienza la liga LugoGol 2020', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cinco.jpg', '2020-04-20', 0),
(46, 'Inscripcion abierta para nuevos Equipos', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', '', '2020-04-20', 0),
(47, 'Inscripcion abierta para nuevos Equipos', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'tres.jpg', '2020-04-20', 6),
(48, 'El dia del Trabajo sera la primera Jorna', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'primeraJornada.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cuatro.jpg', '2020-04-20', 5),
(49, 'Comienza la liga LugoGol 2020', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'inicio.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', 'cinco.jpg', '2020-04-20', 0),
(50, 'Inscripcion abierta para nuevos Equipos', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100px, si necesitas que crezca verticalmente, asignale el valor a auto; , como resultado el contenedor se adapta a tu contenido', 'nuevosEquipos.jpg', 'Para eso, debes reemplazar el valor de tu propiedad height a la que estas asignandole un alto de 100', '', '2020-04-20', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nick` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pass` text COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `nick`, `email`, `pass`) VALUES
(1, 'mauricio', 'vargas', 'kapo', 'mau20pro@gmail.com', 'cmauricio2'),
(2, 'carlos', 'vargas', 'carlinchi', 'carlos@hotmail.com', 'carlos5'),
(3, 'cesar', 'vargas', 'kapo2', 'mau20pro2@gmail.com', 'cmauricio22'),
(4, 'franco', 'vargas', 'franco11', 'franco@hotmail.com', 'franco11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_1` (`usuario`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_usuario_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
