<?php 

$sql_objetivos = "SELECT * FROM objetivos WHERE id_objetivos = '$id_objetivos'";
$query_objetivos = $pdo->prepare($sql_objetivos);
$query_objetivos->execute();
$objetivos = $query_objetivos->fetchAll(PDO::FETCH_ASSOC);

foreach ($objetivos as $objetivo) {
    $obj = $objetivo['obj'];
    $descripcion = $objetivo['descripcion'];
    $fecha_inicio = $objetivo['fecha_inicio'];
    $fecha_fin = $objetivo['fecha_fin'];
    $estado = $objetivo['estado'];
}
?>

