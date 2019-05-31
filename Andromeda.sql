-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 31-05-2019 a las 17:35:48
-- Versión del servidor: 5.7.25
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `Andromeda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos_tecnologicos`
--

CREATE TABLE `activos_tecnologicos` (
  `id_inventario` int(3) NOT NULL,
  `Asignado` int(3) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` int(3) NOT NULL,
  `Marca` int(3) NOT NULL,
  `Modelo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Serial` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fabricante` int(3) NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `invproveedor` int(3) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Salida` date DEFAULT NULL,
  `Seguimientos` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `idFabricante` int(3) NOT NULL,
  `NombreFabricante` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(3) NOT NULL,
  `NombreMarca` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `ID` int(3) NOT NULL,
  `Login` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL,
  `Rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_Proveedor` int(3) NOT NULL,
  `NIT` int(45) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `tipo_rol` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_hardware`
--

CREATE TABLE `tipo_hardware` (
  `idTipo_Hardware` int(3) NOT NULL,
  `NombreTipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(3) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Cargo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Area` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos_tecnologicos`
--
ALTER TABLE `activos_tecnologicos`
  ADD PRIMARY KEY (`id_inventario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD KEY `Asignacion` (`Asignado`),
  ADD KEY `Proveedor` (`invproveedor`),
  ADD KEY `Marca_Activo` (`Marca`),
  ADD KEY `Fabricante_Activo` (`Fabricante`),
  ADD KEY `Tipo_Activo` (`Tipo`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`idFabricante`),
  ADD UNIQUE KEY `NombreFabricante` (`NombreFabricante`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`),
  ADD UNIQUE KEY `NombreMarca` (`NombreMarca`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Login` (`Login`),
  ADD KEY `Rol_Perfil` (`Rol`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_Proveedor`),
  ADD UNIQUE KEY `NIT` (`NIT`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `tipo_rol` (`tipo_rol`);

--
-- Indices de la tabla `tipo_hardware`
--
ALTER TABLE `tipo_hardware`
  ADD PRIMARY KEY (`idTipo_Hardware`),
  ADD UNIQUE KEY `NombreTipo` (`NombreTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos_tecnologicos`
--
ALTER TABLE `activos_tecnologicos`
  MODIFY `id_inventario` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `idFabricante` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_Proveedor` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_hardware`
--
ALTER TABLE `tipo_hardware`
  MODIFY `idTipo_Hardware` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(3) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos_tecnologicos`
--
ALTER TABLE `activos_tecnologicos`
  ADD CONSTRAINT `Asignacion` FOREIGN KEY (`Asignado`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `Fabricante_Activo` FOREIGN KEY (`Fabricante`) REFERENCES `fabricante` (`idFabricante`),
  ADD CONSTRAINT `Marca_Activo` FOREIGN KEY (`Marca`) REFERENCES `marca` (`idMarca`),
  ADD CONSTRAINT `Proveedor` FOREIGN KEY (`invproveedor`) REFERENCES `proveedor` (`id_Proveedor`),
  ADD CONSTRAINT `Tipo_Activo` FOREIGN KEY (`Tipo`) REFERENCES `tipo_hardware` (`idTipo_Hardware`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `Rol_Perfil` FOREIGN KEY (`Rol`) REFERENCES `roles` (`id_rol`);