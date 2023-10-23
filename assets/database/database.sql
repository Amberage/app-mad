CREATE DATABASE amberage_madness;

USE amberage_madness;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(12) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    aPaterno VARCHAR(50) NOT NULL,
    aMaterno VARCHAR(50),
    correo VARCHAR(75) NOT NULL,
    password VARCHAR(4096) NOT NULL,
    userType ENUM('alumno', 'docente', 'administrador') NOT NULL,
    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip VARCHAR(50)
);

-- Actividades Encapsulamiento
CREATE TABLE actividades_Encapsulamiento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT,
    username VARCHAR(12),
    aciertos INT,
    actRealizada ENUM('Si', 'No'),
    fechaEntrega TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actividadNumero INT CHECK (actividadNumero IN (1, 2, 3)),
    FOREIGN KEY (idAlumno) REFERENCES usuarios (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Actividades Herencia
CREATE TABLE actividades_Herencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT,
    username VARCHAR(12),
    aciertos INT,
    actRealizada ENUM('Si', 'No'),
    fechaEntrega TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actividadNumero INT CHECK (actividadNumero IN (1, 2, 3)),
    FOREIGN KEY (idAlumno) REFERENCES usuarios (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Actividades Polimorfismo
CREATE TABLE actividades_Polimorfismo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT,
    username VARCHAR(12),
    aciertos INT,
    actRealizada ENUM('Si', 'No'),
    fechaEntrega TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actividadNumero INT CHECK (actividadNumero IN (1, 2, 3)),
    FOREIGN KEY (idAlumno) REFERENCES usuarios (id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Trigger
DELIMITER //

CREATE TRIGGER after_insert_usuario
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
END;
//