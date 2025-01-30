<?php
include ('../../../../app/config.php');

$id_objetivos = $_POST['id_objetivos'];


$sentencia = $pdo->prepare("DELETE FROM objetivos WHERE id_objetivos=:id_objetivos");
$sentencia->bindParam('id_objetivos', $id_objetivos);


    if ($sentencia->execute()){
        session_start(); 
        $_SESSION['mensaje'] = "Eliminado"; 
        $_SESSION['icono'] = "success";
        header('Location: ' .APP_URL."/admin/desempeno/objetivos/index.php");
     } else {
         session_start(); 
         $_SESSION['mensaje'] = "Error al eliminar"; 
         $_SESSION['icono'] = "error";
         ?><script>window.history.back();</script><?php   
     }
 
   ?>