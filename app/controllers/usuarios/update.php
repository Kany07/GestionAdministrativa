<?php
include ('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];

$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if ($password == "") {
    
    $sentencia = $pdo->prepare("UPDATE usuarios 
    SET rol_id=:rol_id,
        email=:email,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_usuario=:id_usuario");
    
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario); 

   try {
    if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actulizó el usuario con éxito!";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/usuarios");  
    }else{
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar el usuario";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php  
    }
   } catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Este usuario ya existe";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php   
   }
}else {
        
if($password == $password_repet){
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare("UPDATE usuarios 
    SET rol_id=:rol_id,
        email=:email, 
        password=:password,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_usuario=:id_usuario");
    
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario); 

   try {
    if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Contraseña actualizada con exito!";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/usuarios");  
    }else{
    session_start();
    $_SESSION['mensaje'] = "Error, no se puedo actualizar la contraseña";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php   
    }
   } catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = "Este email ya existe";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php   
   }
}else {
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
}