<?php 

$sql_secciones = "SELECT * FROM seccion_B as B INNER JOIN niveles as niv ON B.nivel_id = niv.id_nivel WHERE B.estado = '1'";
$query_secciones= $pdo->prepare($sql_secciones);
$query_secciones->execute();
$secciones = $query_secciones->fetchAll(PDO::FETCH_ASSOC);
?>