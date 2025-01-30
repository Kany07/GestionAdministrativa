<?php
include ('../../../../app/config.php'); 

$id_objetivos = $_POST['id_objetivos'];
$obj = $_POST['obj'];
$descripcion = $_POST['descripcion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$estado = $_POST['estado'];

if ($estado == "ACTIVO") {
    $estado = 1;
}else {
    $estado = 0;
}

$sentencia = $pdo->prepare('UPDATE objetivos
SET obj=:obj, 
    descripcion=:descripcion, 
    fecha_inicio=:fecha_inicio, 
    fecha_fin=:fecha_fin, 
    estado=:estado
WHERE id_objetivos=:id_objetivos');

$sentencia->bindParam(':id_objetivos',$id_objetivos);
$sentencia->bindParam(':obj',$obj);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':fecha_inicio',$fecha_inicio);
$sentencia->bindParam(':fecha_fin',$fecha_fin);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Objetivo actualizado con exito!!";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/desempeno/objetivos");  
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el objetivo";
    $_SESSION['icono'] = "error"; 
     ?><script>window.history.back();</script><?php 
}
