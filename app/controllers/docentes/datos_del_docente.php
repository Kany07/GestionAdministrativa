<?php

$sql_docentes = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN docentes as doc ON doc.persona_id = per.id_persona WHERE doc.estado = '1' and doc.id_docentes = '$id_docentes'";
$query_docentes = $pdo->prepare($sql_docentes);
$query_docentes->execute();
$docentes = $query_docentes->fetchAll(PDO::FETCH_ASSOC);

foreach ($docentes as $docente) {
    $id_docentes = $docente['id_docentes'];
    $id_usuario = $docente['id_usuario'];
    $id_persona = $docente['id_persona'];

    $nombre_rol = $docente['nombre_rol'];
    $nombres = $docente['nombres'];
    $apellidos = $docente['apellidos'];
    $email = $docente['email'];
    $ci = $docente['ci'];
    $f_nacimiento = $docente['f_nacimiento'];
    $telefono = $docente['telefono'];
    $estatus = $docente['estatus'];
    $funcion = $docente['funcion'];
    $cod_cargo = $docente['cod_cargo'];
    $cod_dependencia = $docente['cod_dependencia'];
    $plantel = $docente['plantel'];
    $horas_trabajadas = $docente['horas_trabajadas'];
    $f_ingreso = $docente['f_ingreso'];
    $f_ingreso_plantel = $docente['f_ingreso_plantel'];
    $anos_servicio = $docente['anos_servicio'];
    $direccion = $docente['direccion'];
    $fyh_creacion = $docente['fyh_creacion'];
    $estado = $docente['estado'];
    
}


