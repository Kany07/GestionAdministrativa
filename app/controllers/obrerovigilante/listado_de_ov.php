<?php

$sql_obrerosvigilantes = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
INNER JOIN obrerosvigilantes as ov ON ov.persona_id = per.id_persona WHERE ov.estado = '1'";
$query_obrerosvigilantes = $pdo->prepare($sql_obrerosvigilantes);
$query_obrerosvigilantes->execute();
$obrerosvigilantes = $query_obrerosvigilantes->fetchAll(PDO::FETCH_ASSOC);
