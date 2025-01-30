<?php 
$sql_evaluaciones = "SELECT * FROM evaluaciones WHERE id_evaluaciones ='$id_evaluaciones'";
$query_evaluaciones = $pdo->prepare($sql_evaluaciones);
$query_evaluaciones->execute();
$evaluaciones = $query_evaluaciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($evaluaciones as $evaluacion) {
   
    $nombres = $evaluacion['nombres'];
    $apellidos = $evaluacion['apellidos'];
    $rol = $evaluacion['rol'];
    $puntualidad = $evaluacion['puntualidad'];
    $responsabilidad = $evaluacion['responsabilidad'];
    $entrega_recaudos = $evaluacion['entrega_recaudos'];
    $cumplimiento_normativo = $evaluacion['cumplimiento_normativo'];
    $eficiencia = $evaluacion['eficiencia'];
    $alcance = $evaluacion['alcance'];
    $media = $evaluacion['media'];
}
?>


<?php
$sql_evaluacion = "SELECT * FROM evaluaciones WHERE id_evaluaciones = :id_evaluaciones";
$query_evaluacion = $pdo->prepare($sql_evaluacion);
$query_evaluacion->bindParam(':id_evaluaciones', $id_evaluaciones);
$query_evaluacion->execute();

$evaluacion = $query_evaluacion->fetch(PDO::FETCH_ASSOC);

// Verifica si se encontró la evaluación
if ($evaluacion) {
    $nombres = $evaluacion['nombres'];
    $apellidos = $evaluacion['apellidos'];
    $rol = $evaluacion['rol'];
    $puntualidad = $evaluacion['puntualidad'];
    $responsabilidad = $evaluacion['responsabilidad'];
    $entrega_recaudos = $evaluacion['entrega_recaudos'];
    $cumplimiento_normativo = $evaluacion['cumplimiento_normativo'];
    $eficiencia = $evaluacion['eficiencia'];
    $alcance = $evaluacion['alcance'];
    $media = $evaluacion['media'];
} else {
    // Manejar el caso en que no se encontró la evaluación
    echo "Evaluación no encontrada.";
    exit();
}

?>