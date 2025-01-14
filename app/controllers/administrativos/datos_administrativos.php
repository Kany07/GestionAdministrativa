<?php

$sql_administrativos = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN administrativos as adm ON adm.persona_id = per.id_persona WHERE adm.estado = '1' and adm.id_administrativos = '$id_administrativos'";
$query_administrativos = $pdo->prepare($sql_administrativos);
$query_administrativos->execute();
$administrativos = $query_administrativos->fetchAll(PDO::FETCH_ASSOC);

foreach ($administrativos as $administrativo) {
    $id_administrativos = $administrativo['id_administrativos'];
    $id_usuario = $administrativo['id_usuario'];
    $id_persona = $administrativo['id_persona'];

    $nombre_rol = $administrativo['nombre_rol'];
    $nombres = $administrativo['nombres'];
    $apellidos = $administrativo['apellidos'];
    $email = $administrativo['email'];
    $ci = $administrativo['ci'];
    $f_nacimiento = $administrativo['f_nacimiento'];
    $telefono = $administrativo['telefono'];
    $estatus = $administrativo['estatus'];
    $funcion = $administrativo['funcion'];
    $cod_cargo = $administrativo['cod_cargo'];
    $cod_dependencia = $administrativo['cod_dependencia'];
    $plantel = $administrativo['plantel'];
    $horas_trabajadas = $administrativo['horas_trabajadas'];
    $f_ingreso = $administrativo['f_ingreso'];
    $f_ingreso_plantel = $administrativo['f_ingreso_plantel'];
    $anos_servicio = $administrativo['anos_servicio'];
    $direccion = $administrativo['direccion'];
    $fyh_creacion = $administrativo['fyh_creacion'];
    $estado = $administrativo['estado'];
    
}

