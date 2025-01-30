<?php
include ('../../../../app/config.php'); 

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$instructor = $_POST['instructor'];
$fecha = $_POST['fecha'];
$duracion = $_POST['duracion'];
$estado = $_POST['estado'];

if ($estado == "ACTIVO") {
    $estado = 1;
}else {
    $estado = 0;
}

$sentencia = $pdo->prepare('INSERT INTO cursos
(nombre, descripcion, instructor, fecha, duracion, estado)
VALUES ( :nombre,:descripcion,:instructor,:fecha,:duracion,:estado)');

$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':instructor',$instructor);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':duracion',$duracion);
$sentencia->bindParam('estado',$estado);


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Curso registrado con exito!!";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/capacitacion/cursos/index.php");  
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al registrar el curso";
    $_SESSION['icono'] = "error"; 
     ?><script>window.history.back();</script><?php 
}
