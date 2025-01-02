<?php
include ('../../../../app/config.php'); 
$id_gestion=$_POST['id_gestion'];
$gestion = $_POST['gestion'];
$estado = $_POST['estado'];

if ($estado == "ACTIVO") {
    $estado = 1;
}else {
    $estado = 0;
}

$sentencia = $pdo->prepare('UPDATE gestiones
SET gestion=:gestion, 
    fyh_actualizacion=:fyh_actualizacion, 
    estado=:estado
WHERE id_gestion=:id_gestion');

$sentencia->bindParam(':id_gestion',$id_gestion);
$sentencia->bindParam(':gestion',$gestion);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Gestión actualizada con exito!!";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/configuraciones/gestion");  
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar a la gestión en base de datos";
    $_SESSION['icono'] = "error"; 
     ?><script>window.history.back();</script><?php 
}
