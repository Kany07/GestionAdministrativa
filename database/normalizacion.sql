CREATE TABLE roles ( 
    id_rol INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nombre_rol VARCHAR(255) NOT NULL UNIQUE, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11) 
    )ENGINE=InnoDB;
    


CREATE TABLE usuarios ( 
    id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
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

    CREATE TABLE seccion_A ( 
    id_seccion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nivel_id INT(11) NOT NULL, 
    nombres VARCHAR(255) NOT NULL, 
    seccion VARCHAR(255) NOT NULL, 
    c_estudiantil VARCHAR(255) NOT NULL, 
    f_nacimiento VARCHAR(255) NOT NULL, 
    lugar VARCHAR(255) NOT NULL, 
    edad VARCHAR(255) NOT NULL, 
    sexo VARCHAR(255) NOT NULL, 
    direccion VARCHAR(255) NOT NULL, 
    n_representante VARCHAR(255) NOT NULL, 
    c_representante VARCHAR(255) NOT NULL, 
    t_representante VARCHAR(255) NOT NULL, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11),

    FOREIGN KEY (nivel_id) REFERENCES niveles(id_nivel) on delete no action on update cascade
)ENGINE=InnoDB; 

    CREATE TABLE seccion_B ( 
    id_seccion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nivel_id INT(11) NOT NULL, 
    nombres VARCHAR(255) NOT NULL, 
    seccion VARCHAR(255) NOT NULL, 
    c_estudiantil VARCHAR(255) NOT NULL, 
    f_nacimiento VARCHAR(255) NOT NULL, 
    lugar VARCHAR(255) NOT NULL, 
    edad VARCHAR(255) NOT NULL, 
    sexo VARCHAR(255) NOT NULL, 
    nivel VARCHAR(255) NOT NULL, 
    direccion VARCHAR(255) NOT NULL, 
    n_representante VARCHAR(255) NOT NULL, 
    c_representante VARCHAR(255) NOT NULL, 
    t_representante VARCHAR(255) NOT NULL, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11),

    FOREIGN KEY (nivel_id) REFERENCES niveles(id_nivel) on delete no action on update cascade
)ENGINE=InnoDB; 

    CREATE TABLE seccion_C ( 
    id_seccion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nivel_id INT(11) NOT NULL, 
    nombres VARCHAR(255) NOT NULL, 
    seccion VARCHAR(255) NOT NULL, 
    c_estudiantil VARCHAR(255) NOT NULL, 
    f_nacimiento VARCHAR(255) NOT NULL, 
    lugar VARCHAR(255) NOT NULL, 
    edad VARCHAR(255) NOT NULL, 
    sexo VARCHAR(255) NOT NULL, 
    nivel VARCHAR(255) NOT NULL, 
    direccion VARCHAR(255) NOT NULL, 
    n_representante VARCHAR(255) NOT NULL, 
    c_representante VARCHAR(255) NOT NULL, 
    t_representante VARCHAR(255) NOT NULL, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11),

    FOREIGN KEY (nivel_id) REFERENCES niveles(id_nivel) on delete no action on update cascade
)ENGINE=InnoDB; 



CREATE TABLE administrativos (
  id_administrativos int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id INT(11) NOT NULL,
  
  fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
  fyh_actualizacion DATETIME NULL, 
  estado VARCHAR(11),

   FOREIGN KEY (persona_id) REFERENCES personas(id_persona) on delete no action on update cascade
   
) ENGINE=InnoDB;

 CREATE TABLE docentes (
  id_docentes int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id INT(11) NOT NULL,
  
   fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
   fyh_actualizacion DATETIME NULL, 
   estado VARCHAR(11),

 FOREIGN KEY (persona_id) REFERENCES personas(id_persona) on delete no action on update cascade
   
) ENGINE=InnoDB;

 CREATE TABLE personas (
  id_persona int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id int(11) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellidos VARCHAR(50) NOT NULL,
  ci VARCHAR(50) NOT NULL UNIQUE,
  f_nacimiento varchar(45) NOT NULL,
  telefono varchar(45) NOT NULL,
  funcion varchar(45) NOT NULL,
  cargo_nominal varchar(45) NOT NULL,
  cod_cargo varchar(45) NOT NULL,
  cod_dependencia varchar(45) NOT NULL,
  plantel varchar(200) NOT NULL,
  horas_trabajadas time DEFAULT NULL,
  estatus text NOT NULL,
  f_ingreso varchar(45) NOT NULL,
  f_ingreso_plantel varchar(45) NOT NULL,
  anos_servicio varchar(45) NOT NULL,
  direccion varchar(60) NOT NULL,
  
   fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
   fyh_actualizacion DATETIME NULL, 
   estado VARCHAR(11),

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario) on delete no action on update cascade
   
) ENGINE=InnoDB;

CREATE TABLE cargos ( 
    id_cargo INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    cargo_nominal VARCHAR(255) NOT NULL UNIQUE, 

    fyh_creacion DATETIME DEFAULT CURRENT_TIMESTAMP, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR(11) 
    )ENGINE=InnoDB;


CREATE TABLE `tbl_student` (
  `tbl_student_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `student_name` varchar(255) NOT NULL,
  `course_section` varchar(255) NOT NULL,
  `generated_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DELIMITER $$

CREATE TRIGGER after_insert_admin
AFTER INSERT ON administrativos
FOR EACH ROW
BEGIN
    -- Generar el código QR basado en el ci
    SET @generated_code = CONCAT('QR_', NEW.ci);
    
    -- Insertar en tbl_student con el tipo de empleado 'administrativo'
    INSERT INTO tbl_student (tbl_student_id, student_name, course_section, generated_code, tipo_empleado)
    VALUES (NEW.id_administrativo, NEW.nombres, NEW.ci, @generated_code, 'administrativo');
END$$

DELIMITER ;



DELIMITER $$

CREATE TRIGGER after_insert_docente
AFTER INSERT ON docentes
FOR EACH ROW
BEGIN
    -- Generar el código QR basado en el ci
    SET @generated_code = CONCAT('QR_', NEW.ci);
    
    -- Insertar en tbl_student con el tipo de empleado 'docente'
    INSERT INTO tbl_student (tbl_student_id, student_name, course_section, generated_code, tipo_empleado)
    VALUES (NEW.id_docentes, NEW.nombres, NEW.ci, @generated_code, 'docente');
END$$

DELIMITER ;


CREATE TABLE `tbl_attendance` (
  `tbl_attendance_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tbl_student_id` int(11) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

