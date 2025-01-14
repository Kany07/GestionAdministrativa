<?php
include ('../../../app/config.php');

$id_seccion = $_POST['id_seccion'];
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

$sentencia = $pdo->prepare('UPDATE seccion_a
SET nivel_id=:nivel_id,
    nombres=:nombres,
    seccion=:seccion,
    c_estudiantil=:c_estudiantil,
    f_nacimiento=:f_nacimiento,
    lugar=:lugar,
    edad=:edad,
    sexo=:sexo,
    direccion=:direccion,
    n_representante=:n_representante,
    c_representante=:c_representante,
    t_representante=:t_representante, 
    fyh_actualizacion=:fyh_actualizacion
WHERE id_seccion=:id_seccion');

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
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_seccion',$id_seccion);

if ($sentencia->execute()){
    session_start(); 
    $_SESSION['mensaje'] = "Estudiante actualizado con exito!!"; 
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/secciones/indexA.php");
 } else {
     session_start(); 
     $_SESSION['mensaje'] = "Error al actualizar estudiante"; 
     $_SESSION['icono'] = "error";
     ?><script>window.history.back();</script><?php  
 } 
