<?php

include ('../../../../app/config.php');

$nombre_institucion = $_POST['nombre_institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$redes_sociales = $_POST['redes_sociales'];
$codigo_postal = $_POST['codigo_postal'];
$codigo_dea = $_POST['codigo_dea'];
$codigo_administrativo = $_POST['codigo_administrativo'];
$codigo_estadistico = $_POST['codigo_estadistico'];
$rif = $_POST['rif'];
$territorio = $_POST['territorio'];
$resena = $_POST['resena'];

if ($_FILES['file'] ['name'] != null) {
    $nombre_del_archivo = date('Y-m-d-H-i-s').$_FILES['file']['name'];
    $location ="../../../../public/images/configuracion/".$nombre_del_archivo;
    move_uploaded_file($_FILES['file'] ['tmp_name'],$location);
    $logo = $nombre_del_archivo;
} else {
    $logo = "";
}
$sentencia = $pdo->prepare('INSERT INTO configuracion_instituciones 
       (nombre_institucion, logo, direccion, telefono, correo, redes_sociales, codigo_postal, codigo_dea, codigo_administrativo, codigo_estadistico, rif, territorio, resena, fyh_creacion, estado)
VALUES (:nombre_institucion, :logo, :direccion, :telefono, :correo, :redes_sociales, :codigo_postal, :codigo_dea, :codigo_administrativo, :codigo_estadistico, :rif, :territorio, :resena, :fyh_creacion, :estado)');

$sentencia->bindParam(':nombre_institucion', $nombre_institucion);
$sentencia->bindParam(':logo', $logo);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':correo', $correo);
$sentencia->bindParam(':redes_sociales', $redes_sociales);
$sentencia->bindParam(':codigo_postal', $codigo_postal);
$sentencia->bindParam(':codigo_dea', $codigo_dea);
$sentencia->bindParam(':codigo_administrativo', $codigo_administrativo);
$sentencia->bindParam(':codigo_estadistico', $codigo_estadistico);
$sentencia->bindParam(':rif', $rif);
$sentencia->bindParam(':territorio', $territorio);
$sentencia->bindParam(':resena', $resena);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_de_registro);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Datos registrados con exito!";
        $_SESSION['icono'] = "success";
        header('Location: ' .APP_URL."/admin/configuraciones/institucion");  
    }else{
        session_start();
        $_SESSION['mensaje'] = "error al registrar a la base de datos";
        $_SESSION['icono'] = "error"; 
         ?><script>window.history.back();</script><?php 
    }






        