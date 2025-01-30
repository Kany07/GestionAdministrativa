<?php
include ('../../../../app/config.php');

$id_evaluaciones = $_POST['id_evaluaciones'];


$sentencia = $pdo->prepare("DELETE FROM evaluaciones WHERE id_evaluaciones=:id_evaluaciones");
$sentencia->bindParam('id_evaluaciones', $id_evaluaciones);


    if ($sentencia->execute()){
        session_start(); 
        $_SESSION['mensaje'] = "Eliminado"; 
        $_SESSION['icono'] = "success";
        header('Location: ' .APP_URL."/admin/desempeno/evaluaciones/index.php");
     } else {
         session_start(); 
         $_SESSION['mensaje'] = "Error al eliminar"; 
         $_SESSION['icono'] = "error";
         ?><script>window.history.back();</script><?php   
     }
 
   ?>