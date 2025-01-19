<?php

$sql_obrerosvigilantes = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN obrerosvigilantes as ov ON ov.persona_id = per.id_persona WHERE ov.estado = '1' and ov.id_ov = '$id_ov'";
$query_obrerosvigilantes = $pdo->prepare($sql_obrerosvigilantes);
$query_obrerosvigilantes->execute();
$obrerosvigilantes = $query_obrerosvigilantes->fetchAll(PDO::FETCH_ASSOC);

foreach ($obrerosvigilantes as $obrerovigilante) {
    $id_ov = $obrerovigilante['id_ov']; 
    $id_usuario = $obrerovigilante['id_usuario'];
    $id_persona = $obrerovigilante['id_persona'];

    $nombre_rol = $obrerovigilante['nombre_rol'];
    $nombres = $obrerovigilante['nombres'];
    $apellidos = $obrerovigilante['apellidos'];
    $email = $obrerovigilante['email'];
    $ci = $obrerovigilante['ci'];
    $f_nacimiento = $obrerovigilante['f_nacimiento'];
    $telefono = $obrerovigilante['telefono'];
    $estatus = $obrerovigilante['estatus'];
    $funcion = $obrerovigilante['funcion'];
    $cod_cargo = $obrerovigilante['cod_cargo'];
    $cod_dependencia = $obrerovigilante['cod_dependencia'];
    $plantel = $obrerovigilante['plantel'];
    $horas_trabajadas = $obrerovigilante['horas_trabajadas'];
    $f_ingreso = $obrerovigilante['f_ingreso'];
    $f_ingreso_plantel = $obrerovigilante['f_ingreso_plantel'];
    $anos_servicio = $obrerovigilante['anos_servicio'];
    $direccion = $obrerovigilante['direccion'];
    $fyh_creacion = $obrerovigilante['fyh_creacion'];
    $estado = $obrerovigilante['estado'];
    
}


