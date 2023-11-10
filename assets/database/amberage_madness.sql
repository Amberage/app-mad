-- --------------------------------------------------------
-- Host:                         192.185.131.25
-- Versión del servidor:         5.7.23-23 - Percona Server (GPL), Release 23, Revision 500fcf5
-- SO del servidor:              Linux
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para amberage_madness
CREATE DATABASE IF NOT EXISTS `amberage_madness` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `amberage_madness`;

-- Volcando estructura para tabla amberage_madness.actividades_Encapsulamiento
CREATE TABLE IF NOT EXISTS `actividades_Encapsulamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAlumno` int(11) DEFAULT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aciertos` int(11) DEFAULT NULL,
  `actRealizada` enum('Si','No') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaEntrega` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actividadNumero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAlumno` (`idAlumno`),
  CONSTRAINT `actividades_Encapsulamiento_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla amberage_madness.actividades_Encapsulamiento: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `actividades_Encapsulamiento` DISABLE KEYS */;
INSERT INTO `actividades_Encapsulamiento` (`id`, `idAlumno`, `username`, `aciertos`, `actRealizada`, `fechaEntrega`, `actividadNumero`) VALUES
	(1, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 1),
	(2, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 2),
	(3, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 3),
	(4, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 1),
	(5, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 2),
	(6, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 3),
	(7, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 1),
	(8, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 2),
	(9, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 3),
	(10, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 1),
	(11, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 2),
	(12, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 3),
	(13, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 1),
	(14, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 2),
	(15, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 3),
	(16, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 1),
	(17, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 2),
	(18, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 3);
/*!40000 ALTER TABLE `actividades_Encapsulamiento` ENABLE KEYS */;

-- Volcando estructura para tabla amberage_madness.actividades_Herencia
CREATE TABLE IF NOT EXISTS `actividades_Herencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAlumno` int(11) DEFAULT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aciertos` int(11) DEFAULT NULL,
  `actRealizada` enum('Si','No') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaEntrega` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actividadNumero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAlumno` (`idAlumno`),
  CONSTRAINT `actividades_Herencia_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla amberage_madness.actividades_Herencia: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `actividades_Herencia` DISABLE KEYS */;
INSERT INTO `actividades_Herencia` (`id`, `idAlumno`, `username`, `aciertos`, `actRealizada`, `fechaEntrega`, `actividadNumero`) VALUES
	(1, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 1),
	(2, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 2),
	(3, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 3),
	(4, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 1),
	(5, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 2),
	(6, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 3),
	(7, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 1),
	(8, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 2),
	(9, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 3),
	(10, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 1),
	(11, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 2),
	(12, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 3),
	(13, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 1),
	(14, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 2),
	(15, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 3),
	(16, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 1),
	(17, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 2),
	(18, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 3);
/*!40000 ALTER TABLE `actividades_Herencia` ENABLE KEYS */;

-- Volcando estructura para tabla amberage_madness.actividades_Polimorfismo
CREATE TABLE IF NOT EXISTS `actividades_Polimorfismo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAlumno` int(11) DEFAULT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aciertos` int(11) DEFAULT NULL,
  `actRealizada` enum('Si','No') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaEntrega` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actividadNumero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAlumno` (`idAlumno`),
  CONSTRAINT `actividades_Polimorfismo_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla amberage_madness.actividades_Polimorfismo: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `actividades_Polimorfismo` DISABLE KEYS */;
INSERT INTO `actividades_Polimorfismo` (`id`, `idAlumno`, `username`, `aciertos`, `actRealizada`, `fechaEntrega`, `actividadNumero`) VALUES
	(1, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 1),
	(2, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 2),
	(3, 1, 'admin', NULL, 'No', '2023-11-09 08:23:05', 3),
	(4, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 1),
	(5, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 2),
	(6, 2, 'AlejandroGV', NULL, 'No', '2023-11-09 08:23:05', 3),
	(7, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 1),
	(8, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 2),
	(9, 3, 'MarianaVS', NULL, 'No', '2023-11-09 08:23:05', 3),
	(10, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 1),
	(11, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 2),
	(12, 4, 'DulceNA', NULL, 'No', '2023-11-09 08:23:05', 3),
	(13, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 1),
	(14, 5, 'AlumnoTest', NULL, 'No', '2023-11-09 08:23:05', 2),
	(15, 5, 'AlumnoTest', 0, 'Si', '2023-11-09 09:18:57', 3),
	(16, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 1),
	(17, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 2),
	(18, 6, 'Afedo11', NULL, 'No', '2023-11-09 17:25:43', 3);
/*!40000 ALTER TABLE `actividades_Polimorfismo` ENABLE KEYS */;

-- Volcando estructura para tabla amberage_madness.encuesta_satisfaccion
CREATE TABLE IF NOT EXISTS `encuesta_satisfaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAlumno` int(11) DEFAULT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pregunta1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pregunta2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pregunta3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pregunta4` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentarios` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  `encuestaContestada` enum('Si','No') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAlumno` (`idAlumno`),
  CONSTRAINT `encuesta_satisfaccion_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla amberage_madness.encuesta_satisfaccion: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `encuesta_satisfaccion` DISABLE KEYS */;
INSERT INTO `encuesta_satisfaccion` (`id`, `idAlumno`, `username`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `comentarios`, `encuestaContestada`) VALUES
	(1, 1, 'admin', NULL, NULL, NULL, NULL, NULL, 'No'),
	(2, 2, 'AlejandroGV', NULL, NULL, NULL, NULL, NULL, 'No'),
	(3, 3, 'MarianaVS', NULL, NULL, NULL, NULL, NULL, 'No'),
	(4, 4, 'DulceNA', NULL, NULL, NULL, NULL, NULL, 'No'),
	(5, 5, 'AlumnoTest', NULL, NULL, NULL, NULL, NULL, 'No'),
	(6, 6, 'Afedo11', NULL, NULL, NULL, NULL, NULL, 'No');
/*!40000 ALTER TABLE `encuesta_satisfaccion` ENABLE KEYS */;

-- Volcando estructura para tabla amberage_madness.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aPaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aMaterno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  `userType` enum('alumno','docente','administrador') COLLATE utf8_unicode_ci NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla amberage_madness.usuarios: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `username`, `nombre`, `aPaterno`, `aMaterno`, `correo`, `password`, `userType`, `fechaRegistro`, `ip`) VALUES
	(1, 'admin', 'Administrador', 'admin', 'admin', 'admin@alumno.uaemex.mx', '$2y$10$IUW3T7T8lsdijFVQG0ha7O4Sv/IZKdQ83HZyej4zy/.SUMojrqva.', 'administrador', '2023-10-23 10:53:20', '187.191.38.172'),
	(2, 'AlejandroGV', 'Roberto Alejandro', 'Galicia', 'Vega', 'rgaliciav001@alumno.uaemex.mx', '$2y$10$blpmVoAOUDRgkbfL2iPjpezwz.x//MOfMNQxLGCRpDiBT/imLq68C', 'docente', '2023-10-23 10:54:35', '187.191.38.172'),
	(3, 'MarianaVS', 'Mariana', 'Vázquez', 'Silva', 'mvazquezs011@alumno.uaemex.mx', '$2y$10$EVGE/TZrZNFQmCBp5OzeJehX40b1YQSITHjjocA3maqtzTlb1n//C', 'docente', '2023-10-23 10:55:31', '187.191.38.172'),
	(4, 'DulceNA', 'Dulce Lucero', 'Navarrete', 'Arroyo', 'dnavarretea001@alumno.uaemex.mx', '$2y$10$GMQmR47vzbNbnnB8SLKSFudwLxwvzJ9P5wSOtJYf03YDo6rIMk/sq', 'docente', '2023-10-26 12:38:50', '187.191.38.172'),
	(5, 'AlumnoTest', 'Alumno', 'Testing', 'Tester', 'test@alumno.uaemex.mx', '$2y$10$z2THW3Hffp6N5JPeqGcs2ei/Pfxe7XdOc.12Zqfc90JVnEWmvBI7C', 'alumno', '2023-10-26 12:39:24', '187.191.38.172'),
	(6, 'Afedo11', 'Jose Alfredo', 'Sanchez', 'Bautista', 'jsanchezb011@alumno.uaemex.mx', '$2y$10$.ZXQUGVbgYBcGEAQaDESG.TbgkxSQ2TlfJC.Qf/oA5YeDpj.0JCOm', 'alumno', '2023-11-09 17:25:43', '77.111.246.31');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para disparador amberage_madness.after_insert_usuario
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE DEFINER=`amberage_root`@`%` TRIGGER after_insert_usuario
AFTER INSERT ON usuarios
FOR EACH ROW
BEGIN
    /*Registros para Encapsulamiento:*/
    INSERT INTO actividades_Encapsulamiento (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 1, NULL);

    INSERT INTO actividades_Encapsulamiento (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 2, NULL);

    INSERT INTO actividades_Encapsulamiento (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 3, NULL);

    /*Registros para Herencia:*/
    INSERT INTO actividades_Herencia (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 1, NULL);

    INSERT INTO actividades_Herencia (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 2, NULL);

    INSERT INTO actividades_Herencia (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 3, NULL);

    /*Registros para Polimorfismo:*/
    INSERT INTO actividades_Polimorfismo (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 1, NULL);

    INSERT INTO actividades_Polimorfismo (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 2, NULL);

    INSERT INTO actividades_Polimorfismo (idAlumno, username, aciertos, actRealizada, actividadNumero, fechaEntrega)
    VALUES (NEW.id, NEW.username, NULL, 'No', 3, NULL);

    /*Registros para la encuesta de satisfacción*/
    INSERT INTO encuesta_satisfaccion (idAlumno, username, pregunta1, pregunta2, pregunta3, pregunta4, comentarios, encuestaContestada)
    VALUES (NEW.id, NEW.username, NULL, NULL, NULL, NULL, NULL, 'No');
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
