<?php 

$sql_instituciones = "SELECT * FROM configuracion_instituciones WHERE id_config_institucion = '$id_config_institucion' and estado ='1'";
$query_instituciones = $pdo->prepare($sql_instituciones);
$query_instituciones->execute();
$instituciones = $query_instituciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($instituciones as $institucione) {
    $nombre_institucion = $institucione['nombre_institucion'];
    $logo = $institucione['logo'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $correo = $institucione['correo'];
    $redes_sociales = $institucione['redes_sociales'];
    $codigo_postal = $institucione['codigo_postal'];
    $codigo_dea = $institucione['codigo_dea'];
    $codigo_administrativo = $institucione['codigo_administrativo'];
    $codigo_estadistico = $institucione['codigo_estadistico'];
    $rif = $institucione['rif'];
    $territorio = $institucione['territorio'];
    $resena = $institucione['resena'];
}
?>