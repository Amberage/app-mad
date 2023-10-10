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