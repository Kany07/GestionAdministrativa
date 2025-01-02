<?php
include ('../../../app/config.php');


$tbl_attendance_id = $_POST['tbl_attendance_id'];


$sentencia = $pdo->prepare("DELETE FROM tbl_attendance WHERE tbl_attendance_id=:tbl_attendance_id");
$sentencia->bindParam('tbl_attendance_id', $tbl_attendance_id);

    if ($sentencia->execute()){
        session_start(); 
        $_SESSION['mensaje'] = "Eliminado"; 
        $_SESSION['icono'] = "success";
        header('Location: ' .APP_URL."/admin/asistencias");
     } else {
         session_start(); 
         $_SESSION['mensaje'] = "Error al eliminar"; 
         $_SESSION['icono'] = "error";
         ?><script>window.history.back();</script><?php
     } 
