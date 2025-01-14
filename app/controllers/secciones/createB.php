<?php
include ('../../../app/config.php');

$nivel_id = $_POST['nivel_id'];
$nombres = $_POST['nombres'];
$seccion = $_POST['seccion'];
$c_estudiantil = $_POST['c_estudiantil'];
$f_nacimiento = $_POST['f_nacimiento'];
$lugar = $_POST['lugar'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$n_representante = $_POST['n_representante'];
$c_representante = $_POST['c_representante'];
$t_representante = $_POST['t_representante'];

$sentencia = $pdo->prepare('INSERT INTO seccion_b
(nivel_id,nombres,seccion,c_estudiantil,f_nacimiento,lugar,edad,sexo,direccion,n_representante,c_representante,t_representante, fyh_creacion, estado)
VALUES ( :nivel_id,:nombres,:seccion,:c_estudiantil,:f_nacimiento,:lugar,:edad,:sexo,:direccion,:n_representante,:c_representante,:t_representante,:fyh_creacion,:estado)');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':seccion',$seccion);
$sentencia->bindParam(':c_estudiantil',$c_estudiantil);
$sentencia->bindParam(':f_nacimiento',$f_nacimiento);
$sentencia->bindParam(':lugar',$lugar);
$sentencia->bindParam(':edad',$edad);
$sentencia->bindParam(':sexo',$sexo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':n_representante',$n_representante);
$sentencia->bindParam(':c_representante',$c_representante);
$sentencia->bindParam(':t_representante',$t_representante);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if ($sentencia->execute()){
    session_start(); 
    $_SESSION['mensaje'] = "Estudiante registrado con exito!!"; 
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/secciones/indexb.php");
 } else {
     session_start(); 
     $_SESSION['mensaje'] = "Error al registrar estudiante"; 
     $_SESSION['icono'] = "error";
     ?><script>window.history.back();</script><?php  
 } 
