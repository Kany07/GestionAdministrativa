<?php

$sql_participaciones = "SELECT * FROM participaciones as par INNER JOIN cursos as sos ON par.curso_id = sos.id_cursos WHERE sos.estado = '1'";
$query_participaciones = $pdo->prepare($sql_participaciones);
$query_participaciones->execute();
$participaciones = $query_participaciones->fetchAll(PDO::FETCH_ASSOC);

?>
