<?php
include ('../../../app/config.php'); 

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
    $query = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE email = :email');
    $query->bindParam(':email', $email);
    $query->execute();
    $email_count = $query->fetchColumn();

    if ($email_count > 0) {
        throw new Exception('Este correo electrónico ya está registrado');
    }

    // Insertar en la tabla usuarios
    $password = password_hash($ci, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('INSERT INTO usuarios
           (rol_id, email, password, fyh_creacion, estado)
    VALUES (:rol_id, :email, :password, :fyh_creacion, :estado)');
        
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':estado', $estado_de_registro);
    $sentencia->execute(); 

    $id_usuario = $pdo->lastInsertId();

    // Insertar en la tabla personas
    $sentencia = $pdo->prepare('INSERT INTO personas
           (usuario_id, nombres, apellidos, ci, f_nacimiento, telefono, direccion, funcion, cod_cargo, cod_dependencia, plantel, horas_trabajadas, estatus, f_ingreso, f_ingreso_plantel, anos_servicio, fyh_creacion, estado)
    VALUES (:usuario_id, :nombres, :apellidos, :ci, :f_nacimiento, :telefono, :direccion, :funcion, :cod_cargo, :cod_dependencia, :plantel, :horas_trabajadas, :estatus, :f_ingreso, :f_ingreso_plantel, :anos_servicio, :fyh_creacion, :estado)');

    $sentencia->bindParam(':usuario_id', $id_usuario);
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
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':estado', $estado_de_registro);
    $sentencia->execute(); 

    $id_persona = $pdo->lastInsertId();

    // Insertar en la tabla administrativos
    $sentencia = $pdo->prepare('INSERT INTO administrativos
           (persona_id, fyh_creacion, estado)
    VALUES (:persona_id, :fyh_creacion, :estado)');

    $sentencia->bindParam(':persona_id', $id_persona);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);
    $sentencia->bindParam(':estado', $estado_de_registro);

    if ($sentencia->execute()) {
        $pdo->commit();
        session_start(); 
        $_SESSION['mensaje'] = "Registrado"; 
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/administrativos");
    } else {
        $pdo->rollBack();
        session_start(); 
        $_SESSION['mensaje'] = "Error al registrar"; 
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php   
    }
?>
