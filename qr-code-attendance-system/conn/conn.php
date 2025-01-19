<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qr_attendance_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$year_actual= date('Y');
date_default_timezone_set("America/Caracas");
$fechaHora = date('Y-m-d H:i:s');
?>
