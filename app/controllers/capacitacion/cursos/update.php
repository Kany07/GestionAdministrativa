<?php
include ('../../../../app/config.php'); 

$id_cursos = $_POST['id_cursos'];
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

$sentencia = $pdo->prepare('UPDATE cursos
SET nombre=:nombre, 
    descripcion=:descripcion, 
    instructor=:instructor, 
    fecha=:fecha, 
    duracion=:duracion, 
    estado=:estado
WHERE id_cursos=:id_cursos');

$sentencia->bindParam(':id_cursos',$id_cursos);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':instructor',$instructor);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':duracion',$duracion);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Curso actualizado de manera exitosa";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/capacitacion/cursos/index.php");  
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el curso";
    $_SESSION['icono'] = "error"; 
     ?><script>window.history.back();</script><?php 
}
