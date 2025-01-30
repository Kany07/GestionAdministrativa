<?php
include ('../../../../app/config.php');

$id_cursos = $_POST['id_cursos'];


$sentencia = $pdo->prepare("DELETE FROM cursos WHERE id_cursos=:id_cursos");
$sentencia->bindParam('id_cursos', $id_cursos);


    if ($sentencia->execute()){
        session_start(); 
        $_SESSION['mensaje'] = "Eliminado"; 
        $_SESSION['icono'] = "success";
        header('Location: ' .APP_URL."/admin/capacitacion/cursos/index.php");
     } else {
         session_start(); 
         $_SESSION['mensaje'] = "Error al eliminar"; 
         $_SESSION['icono'] = "error";
         ?><script>window.history.back();</script><?php   
     }
 
   ?>