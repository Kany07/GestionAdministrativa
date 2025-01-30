<?php 

$sql_objetivos = "SELECT * FROM objetivos";
$query_objetivos= $pdo->prepare($sql_objetivos);
$query_objetivos->execute();
$objetivos = $query_objetivos->fetchAll(PDO::FETCH_ASSOC);
?>