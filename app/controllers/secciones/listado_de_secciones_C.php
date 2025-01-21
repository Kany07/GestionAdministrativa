<?php 

$sql_secciones = "SELECT * FROM seccion_C as C INNER JOIN niveles as niv ON C.nivel_id = niv.id_nivel 
INNER JOIN gestiones as ges ON C.gestion_id = ges.id_gestion WHERE C.estado = '1'";
$query_secciones= $pdo->prepare($sql_secciones);
$query_secciones->execute();
$secciones = $query_secciones->fetchAll(PDO::FETCH_ASSOC);
?>