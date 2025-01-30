<?php 

$sql_capacitaciones = "SELECT * FROM cursos WHERE id_cursos ='$id_cursos'";
$query_capacitaciones = $pdo->prepare($sql_capacitaciones);
$query_capacitaciones->execute();
$capacitaciones = $query_capacitaciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($capacitaciones as $capacitacion) {
    $nombre = $capacitacion['nombre'];
    $descripcion = $capacitacion['descripcion'];
    $instructor = $capacitacion['instructor'];
    $fecha = $capacitacion['fecha'];
    $duracion = $capacitacion['duracion'];
    $estado = $capacitacion['estado'];
}
?>

