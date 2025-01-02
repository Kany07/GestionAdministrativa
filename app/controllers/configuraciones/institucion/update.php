<?php

include ('../../../../app/config.php');

$logo = $_POST['logo']; 
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
$id_config_institucion = $_POST['id_config_institucion'];

if ($_FILES['file'] ['name'] != null) {
    $nombre_del_archivo = date('Y-m-d-H-i-s').$_FILES['file']['name'];
    $location ="../../../../public/images/configuracion/".$nombre_del_archivo;
    move_uploaded_file($_FILES['file'] ['tmp_name'],$location);
    $logo = $nombre_del_archivo;
} else {
    if ($logo == "") {
        $logo = "";
    }else {
        $logo = $_POST['logo'];
    }
}
$sentencia = $pdo->prepare('UPDATE configuracion_instituciones 
    SET nombre_institucion=:nombre_institucion, 
        logo=:logo,
        direccion=:direccion, 
        telefono=:telefono,
        correo=:correo, 
        redes_sociales=:redes_sociales, 
        codigo_postal=:codigo_postal, 
        codigo_dea=:codigo_dea, 
        codigo_administrativo=:codigo_administrativo, 
        codigo_estadistico=:codigo_estadistico, 
        rif=:rif, 
        territorio=:territorio, 
        resena=:resena, 
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_config_institucion=:id_config_institucion');

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
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_config_institucion', $id_config_institucion);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Datos actualizados con exito!";
        $_SESSION['icono'] = "success";
        header('Location: ' .APP_URL."/admin/configuraciones/institucion");  
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error al actulizar los datos";
        $_SESSION['icono'] = "error"; 
         ?><script>window.history.back();</script><?php 
    }
