<?php
define ('SERVIDOR','localhost');
define ('USUARIO','root');
define ('PASSWORD','');
define ('BD','qr_attendance_db');

define ('APP_NAME','SISTEMA DE GESTIÓN ADMINISTRATIVA');
define ('APP_URL','http://localhost/SGA');
define('KEY_API_MAPS','');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // echo "Conexión";
} catch (PDOException $e) {
    print_r($e);
    echo "Sin conexión";
}
date_default_timezone_set("America/Caracas");
$fechaHora = date('Y-m-d H:i:s');

$fecha_actual= date('Y-m-d');
$dia_actual= date('d');
$mes_actual= date('m');
$year_actual= date('Y');

$estado_de_registro = '1';

