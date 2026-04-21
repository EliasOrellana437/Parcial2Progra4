create database parcial2;

use parcial2

CREATE TABLE Estudiantes (
    id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(100) NOT NULL,
    correo_institucional VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) 
);

CREATE TABLE usuarios_admin (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(30) NOT NULL,
    clave VARCHAR(255) NOT NULL, 
    facultad VARCHAR(50) NOT NULL
);

select * from estudiantes