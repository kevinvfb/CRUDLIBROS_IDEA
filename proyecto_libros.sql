-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 04:27:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `anio_publicacion` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `genero`, `anio_publicacion`, `descripcion`) VALUES
(2, 'The Hunger Games', 'Suzanne Collins', 'Novela, Ciencia ficción, Ficción adulto joven, Thriller, MÁS', 2008, 'Los Juegos del Hambre es el primer libro de la trilogía homónima escrita por la autora estadounidense Suzanne Collins. La editorial Scholastic Press lo publicó el 14 de septiembre de 2008.'),
(3, 'Harry Potter y la piedra filosofal', 'J. K. Rowling', 'Literatura fantástica, Literatura infantil', 1997, 'Harry Potter y la piedra filosofal, es el primer libro de la serie literaria Harry Potter, escrito por la autora británica J. K. Rowling en 1997.'),
(4, 'Dracula Bram Stoker', ' Bram Stoker', ' Novela, Terror, Ficción gótica, Novela epistolar, Literatura fantástica, Literatura de invasión', 1897, 'Drácula, es una novela de fantasía gótica escrita por Bram Stoker, publicada en 1897.​​ Publicada en castellano por Ediciones Hymsa bajo la colección La novela aventura en 1935, con portada de Juan Pablo Bocquet e ilustraciones de Femenía.'),
(5, 'Cien años de soledad', 'Gabriel García Márquez', ' Novela, Realismo mágico, Ficción, Alta fantasía, Saga familiar', 1967, 'Cien años de soledad es una novela del escritor colombiano Gabriel García Márquez, ganador del Premio Nobel de Literatura en 1982. Es considerada una obra maestra de la literatura hispanoamericana y universal, así como una de las obras más traducidas y leídas en español.​');


CREATE TABLE ResenasLibros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libro_title VARCHAR(255) NOT NULL,
    estado_lectura ENUM('leido', 'en_progreso', 'no_leido') NOT NULL,
    calificacion INT NOT NULL,
    contenido TEXT NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `password`) VALUES
('alex', '123'),
('katy', '123'),
('sofi', '123'),
('vlady', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
