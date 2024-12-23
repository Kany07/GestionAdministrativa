CREATE TABLE usuarios ( 
    id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombres VARCHAR(255) NOT NULL, 
    cargo VARCHAR(255) NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE, 
    password TEXT NOT NULL, 
    fyh_creacion DATETIME NULL, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11) 
    )ENGINE=InnoDB; 
    INSERT INTO usuarios (nombres, cargo, email, password, fyh_creacion, estado) 
    VALUES ('Joskani', 'ADMINISTRADOR', 'mendozajoskani@gmail.com', '$2y$10$0tYmdHU9uCCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m312', '2024-12-16 08:46:00', '1');

CREATE TABLE roles ( 
    id_rol INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombre_rol VARCHAR(255) NOT NULL UNIQUE, 

    fyh_creacion DATETIME NULL, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11) 
    )ENGINE=InnoDB;
    INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('ADMINISTRADOR', '2024-12-22 17:20:00',  '1');
    INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('EMPLEADO', '2024-12-22 17:20:00',  '1');
