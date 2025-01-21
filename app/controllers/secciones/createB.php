<?php
include ('../../../app/config.php');

$nivel_id = $_POST['nivel_id'];
$gestion_id = $_POST['gestion_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
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
$a_representante = $_POST['a_representante'];
$turnos = $_POST['turnos'];

$sentencia = $pdo->prepare('INSERT INTO seccion_b
(nivel_id, gestion_id, nombres, apellidos, seccion,c_estudiantil,f_nacimiento,lugar,edad,sexo,direccion,n_representante,c_representante,t_representante, a_representante, turnos, fyh_creacion, estado)
VALUES ( :nivel_id, :gestion_id, :nombres, :apellidos, :seccion,:c_estudiantil,:f_nacimiento,:lugar,:edad,:sexo,:direccion,:n_representante,:c_representante,:t_representante, :a_representante, :turnos, :fyh_creacion,:estado)');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':gestion_id',$gestion_id);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
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
$sentencia->bindParam(':a_representante',$a_representante);
$sentencia->bindParam(':turnos',$turnos);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if ($sentencia->execute()){
    session_start(); 
    $_SESSION['mensaje'] = "Estudiante registrado con exito!!"; 
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/secciones/indexB.php");
 } else {
     session_start(); 
     $_SESSION['mensaje'] = "Error al registrar estudiante"; 
     $_SESSION['icono'] = "error";
     ?><script>window.history.back();</script><?php  
 } 
