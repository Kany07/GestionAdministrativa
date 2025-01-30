<?php
include ('../../../../app/config.php'); 

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

$sentencia = $pdo->prepare('INSERT INTO objetivos
(obj, descripcion, fecha_inicio, fecha_fin, estado)
VALUES ( :obj,:descripcion,:fecha_inicio,:fecha_fin,:estado)');

$sentencia->bindParam(':obj',$obj);
$sentencia->bindParam('descripcion',$descripcion);
$sentencia->bindParam('fecha_inicio',$fecha_inicio);
$sentencia->bindParam('fecha_fin',$fecha_fin);
$sentencia->bindParam('estado',$estado);


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Objetivo registrado con exito!!";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/desempeno/objetivos/index.php");  
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al registrar el objetivo";
    $_SESSION['icono'] = "error"; 
     ?><script>window.history.back();</script><?php 
}
