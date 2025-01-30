<?php
include ('../../../../app/config.php'); // Incluir configuración de la base de datos  

$id_evaluaciones = $_POST['id_evaluaciones'];  
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
    $sentencia = $pdo->prepare('UPDATE evaluaciones  
SET nombres =:nombres, 
    apellidos =:apellidos, 
    rol =:rol, 
    puntualidad =:puntualidad, 
    responsabilidad =:responsabilidad, 
    entrega_recaudos =:entrega_recaudos, 
    cumplimiento_normativo =:cumplimiento_normativo, 
    eficiencia =:eficiencia, 
    alcance =:alcance, 
    media =:media 
WHERE id_evaluaciones =:id_evaluaciones');  

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
    $sentencia->bindParam(':id_evaluaciones', $id_evaluaciones);  

    if ($sentencia->execute()) {  
        $pdo->commit();  
        session_start();  
        $_SESSION['mensaje'] = "Evaluación actualizada de manera exitosa!!";   
        $_SESSION['icono'] = "success";  
        header('Location: ' . APP_URL . "/admin/desempeno/evaluaciones");  
    } else {  
        $pdo->rollBack();  
        session_start();   
        $_SESSION['mensaje'] = "Error al actualizar evaluación";   
        $_SESSION['icono'] = "error";  
        echo "<script>window.history.back();</script>";  
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
