-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 02-07-2013 a las 10:35:15
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `odontosoft`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cita`
-- 

CREATE TABLE `cita` (
  `id` int(11) NOT NULL auto_increment,
  `nombre_paciente` varchar(150) NOT NULL,
  `nombre_tratamientos` varchar(1500) NOT NULL,
  `tiempo` time NOT NULL,
  `fecha` datetime NOT NULL,
  `costo_final` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `cita`
-- 

INSERT INTO `cita` VALUES (12, 'Edith Trujillo', 'Endodoncia Normal|', '00:30:00', '2013-07-02 05:00:00', 50);
INSERT INTO `cita` VALUES (14, 'Leyla Díaz', 'Prótesis Fijas|', '01:30:00', '2013-07-02 06:30:00', 200);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `paciente`
-- 

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `paciente`
-- 

INSERT INTO `paciente` VALUES (1, 'Leyla Díaz');
INSERT INTO `paciente` VALUES (2, 'Raúl Perez');
INSERT INTO `paciente` VALUES (3, 'Luis Nureña');
INSERT INTO `paciente` VALUES (4, 'Edith Trujillo');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tratamiento`
-- 

CREATE TABLE `tratamiento` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tiempo` time NOT NULL,
  `costo` double NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `tratamiento`
-- 

INSERT INTO `tratamiento` VALUES (13, 'Endodoncia Normal', 'Tratamiento de conductos radiculares, esto corresponde a toda terapia que es practicada en el complejo dentino-pulpar.', '00:30:00', 50);
INSERT INTO `tratamiento` VALUES (14, 'Endodoncia Fuerte', '(Fuerte) Tratamiento de conductos radiculares, esto corresponde a toda terapia que es practicada en el complejo dentino-pulpar.', '00:30:00', 75);
INSERT INTO `tratamiento` VALUES (16, 'Prótesis dental', 'Las prótesis fijas, son prótesis completamente dentosoportadas, que toman apoyo únicamente en los dientes.', '01:00:00', 200);
INSERT INTO `tratamiento` VALUES (18, 'Endodoncia', 'Alguna descripción cualquiera.', '01:30:00', 20);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `appat` varchar(20) NOT NULL,
  `apmat` varchar(20) NOT NULL,
  `nick` varchar(6) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cargo` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO `usuario` VALUES (10, 'Dany', 'Nureña', 'Trujillo', 'nuda87', 'd153f871598e8290a3fba38ba8fc5945', 'email@email.com', 1);
INSERT INTO `usuario` VALUES (11, 'Leyla', 'Díaz', 'Mondragón', 'díle65', 'e10adc3949ba59abbe56e057f20f883e', 'mail@mail.com', 1);
INSERT INTO `usuario` VALUES (12, 'Raúl', 'Perez', 'Becerra', 'pera40', 'e10adc3949ba59abbe56e057f20f883e', 'raul@mail.com', 1);
