<?php 

$sql_secciones = "SELECT * FROM seccion_A as A INNER JOIN niveles as niv ON A.nivel_id = niv.id_nivel WHERE A.estado = '1'";
$query_secciones= $pdo->prepare($sql_secciones);
$query_secciones->execute();
$secciones = $query_secciones->fetchAll(PDO::FETCH_ASSOC);
?>