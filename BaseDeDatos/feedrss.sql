-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2021 a las 15:45:34
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `feedrss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `IdFeed` int(11) NOT NULL AUTO_INCREMENT,
  `Image_link` text,
  `Image_title` text,
  `Image_url` text,
  `Image_width` int(11) DEFAULT NULL,
  `Image_height` int(11) DEFAULT NULL,
  `Imagelink` text,
  `Permalink` text,
  `Title` varchar(120) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  `Sourcepermalink` text,
  `Sourcetitle` text,
  `Date` datetime DEFAULT NULL,
  `Categories` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdFeed`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `feeds`
--

INSERT INTO `feeds` (`IdFeed`, `Image_link`, `Image_title`, `Image_url`, `Image_width`, `Image_height`, `Imagelink`, `Permalink`, `Title`, `Description`, `Sourcepermalink`, `Sourcetitle`, `Date`, `Categories`) VALUES
(1, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/deportes/paul-aguilar-campeon-con-america-ahora-arregla-y-vende-autos', 'Paul Aguilar, campeón con América, ahora arregla y vende autos', 'Paul Aguilar no logró encontrar acomodo en la Liga MX ni en la MLS, por lo que ahora enfoca su atención en impulsar un n', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:58:10', 'Deportes,Fútbol,futbol,Recomendada,'),
(2, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/mexico/tragedia-familiar-hallan-a-nina-viva-y-a-sus-padres-muertos-en-queretaro', 'Tragedia familiar: encuentran a niña viva y a sus padres muertos en Querétaro', 'QUERÉTARO,- En el municipio de Pedro Escobedo, Querétaro, encontraron muertos a un hombre y una mujer al interior de una', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:49:52', 'México,Recomendada,'),
(3, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/elecciones/elecciones-en-merida/canaco-merida-pide-campanas-propositivas-y-sin-ataques', 'Canaco Mérida pide campañas propositivas y sin ataques', 'MÉRIDA.- La Canaco Servytur de Mérida llamó a los partidos políticos y candidatos a la alcaldía de Mérida y diputados lo', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:42:10', 'Elecciones,Elecciones en Mérida,Elecciones 2021,Recomendada,'),
(4, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/espectaculos/deje-de-hablar-tanta-porqueria-niurka-estalla-contra-frida-sofia', '\\"Deje de hablar tanta porquería\\": Niurka estalla contra Frida Sofía (vídeo)', 'La cubana salió en defensa de Alejandra Guzmán y \\"aconsejó\\" a Frida Sofía sentarse con su mamá a resolver sus problema', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:39:09', 'Espectáculos,Farándula,Recomendada,'),
(5, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/mexico/banxico-asi-es-la-nueva-moneda-de-20-pesos-de-emiliano-zapata', 'Así es la nueva moneda de 20 pesos de Emiliano Zapata que entró en circulación', 'MÉXICO.-El Banco de México (Banxico) puso en circulación una nueva moneda de 20 pesos conmemorativa por el centenario de', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:32:19', 'México,Recomendada,'),
(6, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/yucatan/estilistas-profesionales-obsequian-cortes-de-cabello-a-ninas-y-ninos-de-ticul', 'Estilistas profesionales obsequian cortes de cabello a niñas y niños de Ticul', 'TICUL, Yucatán.- Con el fin de celebrar el Día del Niño, un grupo de estilistas profesionales de la ciudad, encabezados ', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:14:13', 'Yucatán,Recomendada,'),
(7, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/espectaculos/friends-la-reunion-ya-se-grabo-el-estreno-en-hbo-max-seria-en-mayo', '\\"Friends: la reunión\\" ya se grabó, el estreno en HBO Max sería en mayo', 'Tras varios retrasos debido a la pandemia de coronavirus, la reunión de Friends terminó su rodaje. El reencuentro de Jen', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:13:30', 'Espectáculos,TV y series,Recomendada,'),
(8, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/mexico/se-recuperan-mas-de-250000-empleos-en-el-primer-trimestre', 'Se recuperan más de 250,000 empleos en el primer trimestre', 'CIUDAD DE MÉXICO.- En el primer trimestre del año se recuperaron 251,977 empleos formales en el país frente al último tr', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 14:07:41', 'Economía,México,Recomendada,'),
(9, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/internacional/estudio-coctel-de-regeneron-reduce-81-infeccion-sintomatica-de-covid', 'Estudio: Coctel de Regeneron reduce 81&percnt; infección sintomática de Covid', 'NUEVA YORK.- La farmacéutica estadounidense Regeneron informó este lunes que su cóctel de anticuerpos monoclonales contr', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 13:59:28', 'Internacional,Coronavirus,Recomendada,'),
(10, 'https://www.yucatan.com.mx/', 'Diario de Yucatán', 'https://www.yucatan.com.mx/wp-content/themes/bimber/logoyuc.png', 235, 31, '', 'https://www.yucatan.com.mx/deportes/lance-armstrong-es-la-mayor-estafa-lo-acusan-de-doping-tecnologico', '\\"Lance Armstrong es la mayor estafa\\", lo acusan de \\"doping tecnológico\\"', 'El exciclista estadounidense Lance Armstrong, que fue suspendido de por vida del deporte profesional por dopaje sistemát', 'https://www.yucatan.com.mx/', 'El Diario de Yucatán', '2021-04-12 13:41:05', 'Deportes,Recomendada,');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `IdNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(45) DEFAULT NULL,
  `Fecha` time DEFAULT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  `Url` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Noticia` blob,
  PRIMARY KEY (`IdNoticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`IdNoticia`, `Titulo`, `Fecha`, `Categoria`, `Url`, `Descripcion`, `Noticia`) VALUES
(1, 'Yucatan', '00:00:05', 'General', 'https://www.yucatan.com.mx/', 'Prueba', 0x616c67756e61);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
