CREATE TABLE roles ( 
    id_rol INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombre_rol VARCHAR(255) NOT NULL UNIQUE, 

    fyh_creacion DATETIME NULL, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11) 
    )ENGINE=InnoDB;
    INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('ADMINISTRADOR', '2024-12-22 17:20:00',  '1');
    INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('EMPLEADO', '2024-12-22 17:20:00',  '1');


CREATE TABLE usuarios ( 
    id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombres VARCHAR(255) NOT NULL, 
    rol_id INT(11) NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE, 
    password TEXT NOT NULL, 

    fyh_creacion DATETIME DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11),

    FOREIGN KEY (rol_id) REFERENCES roles(id_rol) on delete no action on update cascade
)ENGINE=InnoDB; 
INSERT INTO usuarios (nombres, rol_id, email, password, fyh_creacion, estado) 
VALUES ('Joskani', '1', 'mendozajoskani@gmail.com', '$2y$10$0tYmdHU9uCCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m312', '2024-12-16 08:46:00', '1');
INSERT INTO usuarios (nombres, rol_id, email, password, fyh_creacion, estado) 
VALUES ('Joskanis', '2', 'joskani@gmail.com', '$2y$10$0tYmdHU9uCCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m312', '2024-12-16 08:46:00', '1');

