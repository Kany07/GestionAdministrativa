<?php
include ('../../../app/config.php');

$gestion_id = $_POST['gestion_id'];
$nivel = $_POST['nivel'];
$turno = $_POST['turno'];

$sentencia = $pdo->prepare('INSERT INTO niveles
(gestion_id,nivel,turno, fyh_creacion, estado)
VALUES ( :gestion_id,:nivel,:turno,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion_id',$gestion_id);
$sentencia->bindParam(':nivel',$nivel);
$sentencia->bindParam(':turno',$turno);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if ($sentencia->execute()){
    session_start();  
    $_SESSION['mensaje'] = "Registrado"; 
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/niveles");
 } else {
     session_start(); 
     $_SESSION['mensaje'] = "Error al registrar"; 
     $_SESSION['icono'] = "error";
     ?><script>window.history.back();</script><?php   
 }