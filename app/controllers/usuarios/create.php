<?php
include ('../../../app/config.php');

$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if($password == $password_repet){
    $password = password_hash($password, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('INSERT INTO usuarios
       (nombres, rol_id, email, password, fyh_creacion, estado)
VALUES (:nombres, :rol_id, :email, :password, :fyh_creacion, :estado)');
    
    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_de_registro); 

   try {
    if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Usuario registrado con exito!";
    $_SESSION['icono'] = "success";
    header('Location: ' .APP_URL."/admin/usuarios");  
        }else{
        echo 'error al registrar a la base de datos';
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

