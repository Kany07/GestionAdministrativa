<?php
$sql_capacitaciones = "SELECT * FROM cursos"; // Solo cursos activos
$query_capacitaciones = $pdo->prepare($sql_capacitaciones);
$query_capacitaciones->execute();
$capacitaciones = $query_capacitaciones->fetchAll(PDO::FETCH_ASSOC);
?>