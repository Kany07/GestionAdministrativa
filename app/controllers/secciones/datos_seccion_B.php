<?php 

$sql_secciones = "SELECT * FROM seccion_B as B INNER JOIN niveles as niv ON B.nivel_id = niv.id_nivel 
INNER JOIN gestiones as ges ON B.gestion_id = ges.id_gestion WHERE B.estado = '1' and id_seccion='$id_seccion'";
$query_secciones= $pdo->prepare($sql_secciones);
$query_secciones->execute();
$secciones = $query_secciones->fetchAll(PDO::FETCH_ASSOC);

foreach($secciones as $seccione){
$nivel_id = $seccione['nivel_id'];
$nombres = $seccione['nombres'];
$apellidos = $seccione['apellidos'];
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
$a_representante = $seccione['a_representante'];
$nivel = $seccione['nivel'];
$turnos = $seccione['turnos'];
$gestion = $seccione['gestion'];
}