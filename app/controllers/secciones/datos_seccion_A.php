<?php 

$sql_secciones = "SELECT * FROM seccion_A as A INNER JOIN niveles as niv ON A.nivel_id = niv.id_nivel 
WHERE A.estado = '1' and id_seccion='$id_seccion'";
$query_secciones= $pdo->prepare($sql_secciones);
$query_secciones->execute();
$secciones = $query_secciones->fetchAll(PDO::FETCH_ASSOC);

foreach($secciones as $seccione){
$nivel_id = $seccione['nivel_id'];
$nombres = $seccione['nombres'];
$seccion = $seccione['seccion'];
$c_estudiantil = $seccione['c_estudiantil'];
$f_nacimiento = $seccione['f_nacimiento'];
$lugar = $seccione['lugar'];
$edad = $seccione['edad'];
$sexo = $seccione['sexo'];
$direccion = $seccione['direccion'];
$n_representante = $seccione['n_representante'];
$c_representante = $seccione['c_representante'];
$t_representante = $seccione['t_representante'];
$nivel = $seccione['nivel'];
}