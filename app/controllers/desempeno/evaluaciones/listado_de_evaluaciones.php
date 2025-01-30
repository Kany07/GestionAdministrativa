<?php 

// $sql_evaluaciones = "SELECT * FROM evaluaciones";
// $query_evaluaciones= $pdo->prepare($sql_evaluaciones);
// $query_evaluaciones->execute();
// $evaluaciones = $query_evaluaciones->fetchAll(PDO::FETCH_ASSOC);


$sql_evaluaciones = "SELECT e.*, o.obj FROM evaluaciones e   
JOIN objetivos o ON e.id_objetivos = o.id_objetivos 
 ORDER BY e.fyh_creacion DESC";
$query_evaluaciones= $pdo->prepare($sql_evaluaciones);
$query_evaluaciones->execute();
$evaluaciones = $query_evaluaciones->fetchAll(PDO::FETCH_ASSOC);
?>