CREATE TABLE roles ( 
    id_rol INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombre_rol VARCHAR(255) NOT NULL UNIQUE, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11) 
    )ENGINE=InnoDB;
    


CREATE TABLE usuarios ( 
    id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombres VARCHAR(255) NOT NULL, 
    rol_id INT(11) NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE, 
    password TEXT NOT NULL, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11),

    FOREIGN KEY (rol_id) REFERENCES roles(id_rol) on delete no action on update cascade
)ENGINE=InnoDB; 





CREATE TABLE configuracion_instituciones ( 
    id_config_institucion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombre_institucion VARCHAR(255) NOT NULL, 
    logo VARCHAR(255) NULL, 
    direccion VARCHAR(255) NULL, 
    telefono VARCHAR(255) NULL, 
    correo VARCHAR(255) NULL, 
    redes_sociales VARCHAR(255) NULL, 
    codigo_postal VARCHAR(255) NULL, 
    codigo_dea VARCHAR(255) NULL, 
    codigo_administrativo VARCHAR(255) NULL, 
    codigo_estadistico VARCHAR(255) NULL, 
    rif VARCHAR(255) NULL,
    territorio VARCHAR(255) NULL,
    resena TEXT NULL,

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11)

    
)ENGINE=InnoDB; 
INSERT INTO configuracion_instituciones (nombre_institucion, logo, direccion, telefono, correo, redes_sociales, codigo_postal, codigo_dea, codigo_administrativo, codigo_estadistico, rif, territorio, resena, fyh_creacion, estado) 
VALUES ('EEIB Julio César Sánchez Olivo', 'logo.jpg', 'Urb. Los centauros', '0247-3416982', 'eeibjuliocesarsanchezolivo@gmail.com', 'Facebook: Julio César Sánchez Olivo', '7001', '0D07290407','06589763', '041076', 'J-408211823', 'APU0701015', 'GFGGFGFFHFFJJYFYTDTD', '2024-12-16 08:46:00', '1');




CREATE TABLE gestiones ( 
    id_gestion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    gestion VARCHAR(255) NOT NULL, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11)
   
)ENGINE=InnoDB; 


CREATE TABLE niveles ( 
    id_nivel INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    gestion_id INT(11) NOT NULL, 
    nivel VARCHAR(255) NOT NULL, 
    turno VARCHAR(11) NOT NULL, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11),

    FOREIGN KEY (gestion_id) REFERENCES gestiones(id_gestion) on delete no action on update cascade
)ENGINE=InnoDB; 
INSERT INTO niveles(gestion_id, nivel, turno, fyh_creacion, estado)
    VALUES ('1', 'Inicial', 'Mañana', '2024-12-30 18:26:00', '1');
