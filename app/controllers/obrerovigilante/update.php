<?php
include ('../../../app/config.php'); 

$id_ov = $_POST['id_ov'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];

$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$ci = $_POST['ci'];
$f_nacimiento = $_POST['f_nacimiento'];
$telefono = $_POST['telefono'];
$funcion = $_POST['funcion'];
$cod_cargo = $_POST['cod_cargo'];
$cod_dependencia = $_POST['cod_dependencia'];
$plantel = $_POST['plantel'];
$horas_trabajadas = $_POST['horas_trabajadas'];
$estatus = $_POST['estatus'];
$f_ingreso = $_POST['f_ingreso'];
$f_ingreso_plantel = $_POST['f_ingreso_plantel'];
$anos_servicio = $_POST['anos_servicio'];
$direccion = $_POST['direccion'];

    $pdo->beginTransaction();

    // Verificar si el correo electrónico ya existe
    // $query = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE email = :email');
    // $query->bindParam(':email', $email);
    // $query->execute();
    // $email_count = $query->fetchColumn();

    // if ($email_count > 0) {
    //     throw new Exception('Este correo electrónico ya está registrado');
    // }

    // Actualizar a la tabla usuarios
    $password = password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('UPDATE usuarios
        SET rol_id=:rol_id,
            email=:email,
            password=:password, 
            fyh_actualizacion=:fyh_actualizacion 
      WHERE id_usuario=:id_usuario');
        
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->execute(); 


    // Actualizar en la tabla personas
    $sentencia = $pdo->prepare('UPDATE personas
    SET    nombres=:nombres, 
           apellidos=:apellidos, 
           ci=:ci, 
           f_nacimiento=:f_nacimiento, 
           telefono=:telefono, 
           direccion=:direccion, 
           funcion=:funcion, 
           cod_cargo=:cod_cargo, 
           cod_dependencia=:cod_dependencia, 
           plantel=:plantel, 
           horas_trabajadas=:horas_trabajadas, 
           estatus=:estatus, 
           f_ingreso=:f_ingreso, 
           f_ingreso_plantel=:f_ingreso_plantel, 
           anos_servicio=:anos_servicio, 
           fyh_actualizacion=:fyh_actualizacion
    WHERE  id_persona=:id_persona');

    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':apellidos', $apellidos);
    $sentencia->bindParam(':ci', $ci);
    $sentencia->bindParam(':f_nacimiento', $f_nacimiento);
    $sentencia->bindParam(':telefono', $telefono);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':funcion', $funcion);
    $sentencia->bindParam(':cod_cargo', $cod_cargo);
    $sentencia->bindParam(':cod_dependencia', $cod_dependencia);
    $sentencia->bindParam(':plantel', $plantel);
    $sentencia->bindParam(':horas_trabajadas', $horas_trabajadas);
    $sentencia->bindParam(':estatus', $estatus);
    $sentencia->bindParam(':f_ingreso', $f_ingreso);
    $sentencia->bindParam(':f_ingreso_plantel', $f_ingreso_plantel);
    $sentencia->bindParam(':anos_servicio', $anos_servicio);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_persona', $id_persona);
    $sentencia->execute(); 


    // Actualizar a la tabla administrativos
    $sentencia = $pdo->prepare('UPDATE obrerosvigilantes
    SET     fyh_actualizacion=:fyh_actualizacion
    WHERE   id_ov=:id_ov');

    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_ov', $id_ov);

    if ($sentencia->execute()) {
        $pdo->commit();
        session_start(); 
        $_SESSION['mensaje'] = "Actualizado"; 
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/obrerovigilante");
    } else {
        $pdo->rollBack();
        session_start(); 
        $_SESSION['mensaje'] = "Error al actualizar"; 
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php   
    }
?>
