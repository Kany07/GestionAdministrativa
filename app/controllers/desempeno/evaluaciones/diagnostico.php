<?php
include ('../../../../app/config.php'); // Incluir configuración de la base de datos  
$id_objetivo_activo = obtenerObjetivoActivo($pdo);

$nombres = $_POST['nombres'];  
$apellidos = $_POST['apellidos'];  
$rol = $_POST['rol'];   
$puntualidad = (int)$_POST['puntualidad'];  
$responsabilidad = (int)$_POST['responsabilidad'];  
$entrega_recaudos = (int)$_POST['entrega_recaudos'];  
$cumplimiento_normativo = (int)$_POST['cumplimiento_normativo'];  
$eficiencia = (int)$_POST['eficiencia'];  
$alcance = (int)$_POST['alcance'];  
$media = (float)(( $puntualidad + $responsabilidad + $entrega_recaudos + $cumplimiento_normativo + $eficiencia + $alcance ) / 6);  


try {
    // Iniciar una transacción
    $pdo->beginTransaction();

    // Conectar a la base de datos  
    $sentencia = $pdo->prepare('INSERT INTO evaluaciones  
(nombres, apellidos, rol, puntualidad, responsabilidad, entrega_recaudos, cumplimiento_normativo, eficiencia, alcance, media, id_objetivos, fyh_creacion)  
VALUES (:nombres, :apellidos, :rol, :puntualidad, :responsabilidad, :entrega_recaudos, :cumplimiento_normativo, :eficiencia, :alcance, :media, :id_objetivos, :fyh_creacion)');  

// Asignar los parámetros  
$sentencia->bindParam(':id_objetivos', $id_objetivo_activo); // Agregar este parámetro




    // $sentencia = $pdo->prepare('INSERT INTO evaluaciones  
    // (nombres, apellidos, rol, puntualidad, responsabilidad, entrega_recaudos, cumplimiento_normativo, eficiencia, alcance, media, fyh_creacion)  
    // VALUES (:nombres, :apellidos, :rol, :puntualidad, :responsabilidad, :entrega_recaudos, :cumplimiento_normativo, :eficiencia, :alcance, :media, :fyh_creacion)');  

    // Asignar los parámetros  
    $sentencia->bindParam(':nombres', $nombres);  
    $sentencia->bindParam(':apellidos', $apellidos);  
    $sentencia->bindParam(':rol', $rol);  
    $sentencia->bindParam(':puntualidad', $puntualidad);  
    $sentencia->bindParam(':responsabilidad', $responsabilidad);  
    $sentencia->bindParam(':entrega_recaudos', $entrega_recaudos);  
    $sentencia->bindParam(':cumplimiento_normativo', $cumplimiento_normativo);  
    $sentencia->bindParam(':eficiencia', $eficiencia);  
    $sentencia->bindParam(':alcance', $alcance);  
    $sentencia->bindParam(':media', $media);  
    $sentencia->bindParam(':fyh_creacion', $fechaHora);

    if ($sentencia->execute()) {  
        $pdo->commit();  
        session_start();  
        $_SESSION['mensaje'] = "Evaluación registrada";   
        $_SESSION['icono'] = "success";  
        header('Location: ' . APP_URL . "/admin/desempeno/evaluaciones");  
    } else {  
        $pdo->rollBack();  
        session_start();   
        $_SESSION['mensaje'] = "Error al registrar evaluación";   
        $_SESSION['icono'] = "error";  
        echo "<script>window.history.back();</script>";  
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
function obtenerObjetivoActivo($pdo) {  
    $query = "SELECT id_objetivos FROM objetivos WHERE estado = '1' LIMIT 1"; // Esto asume que solo hay un objetivo activo  
    $stmt = $pdo->query($query);  
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $resultado ? $resultado['id_objetivos'] : null; // Devuelve el ID o null si no hay un objetivo activo  
}
?>
