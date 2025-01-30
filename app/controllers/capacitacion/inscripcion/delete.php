<?php
include ('../../../../app/config.php');

$id_participantes = $_POST['id_participantes'];


$sentencia = $pdo->prepare("DELETE FROM participaciones WHERE id_participantes=:id_participantes");
$sentencia->bindParam('id_participantes', $id_participantes);


    if ($sentencia->execute()){
        session_start(); 
        $_SESSION['mensaje'] = "Eliminado"; 
        $_SESSION['icono'] = "success";
        header('Location: ' .APP_URL."/admin/capacitacion/inscripcion/index.php");
     } else {
         session_start(); 
         $_SESSION['mensaje'] = "Error al eliminar"; 
         $_SESSION['icono'] = "error";
         ?><script>window.history.back();</script><?php   
     }
 
   ?>