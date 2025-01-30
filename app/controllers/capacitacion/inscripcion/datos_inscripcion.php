<?php
$sql_participaciones = "SELECT * FROM participaciones WHERE id_participantes ='$id_participantes'";
$query_participaciones = $pdo->prepare($sql_participaciones);
$query_participaciones->execute();
$participaciones = $query_participaciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($participaciones as $participante) {
    $curso_id = $participante['curso_id'];
    $empleado = $participante['empleado'];
}
?>
