SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `mediciones` (
  `medicionID` int(11) NOT NULL,
  `medicion` float(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `pozoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `mediciones` (`medicionID`, `medicion`, `fecha`, `pozoID`) VALUES
(8, 500.22, '2022-02-28', 1),
(10, 360.54, '2021-12-17', 1),
(11, 400.50, '2022-03-10', 1),
(12, 600.64, '2021-12-02', 8),
(13, 300.00, '2022-03-01', 8),
(14, 700.20, '2022-03-25', 8);

CREATE TABLE `pozos` (
  `pozoID` int(11) NOT NULL,
  `nombrePozo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extension` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `pozos` (`pozoID`, `nombrePozo`, `extension`) VALUES
(1, 'CUENCA MARACAIBO - FALCÓN', '67.000Km2'),
(8, 'CUENCA ORIENTAL', '153.000km2')

CREATE TABLE `usuario` (
  `usuarioID` int(11) NOT NULL,
  `nombreUsuario` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuario` (`usuarioID`, `nombreUsuario`, `password`) VALUES
(2, 'andrea21', 'ec6a6536ca304edf844d1d248a4f08dc'),
(11, 'user', '827ccb0eea8a706c4c34a16891f84e7b');

ALTER TABLE `mediciones`
  ADD PRIMARY KEY (`medicionID`);

ALTER TABLE `pozos`
  ADD PRIMARY KEY (`pozoID`),
  ADD UNIQUE KEY `nombrePozo` (`nombrePozo`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioID`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`);

ALTER TABLE `mediciones`
  MODIFY `medicionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `pozos`
  MODIFY `pozoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `usuario`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;