<?php
include ('../../../../app/config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso_id = $_POST['curso_id'] ?? null; // Obtener el ID del curso seleccionado

    if ($curso_id) {
        // Aquí puedes proceder a guardar el curso en la tabla participaciones
        $empleado =$_POST['empleado']; // Define cómo obtendrás esto
        $fecha_inscripcion = date('Y-m-d H:i:s'); // O la fecha que necesites

        $pdo->beginTransaction();
        try {
            $sentencia = $pdo->prepare('INSERT INTO participaciones (curso_id, empleado, fecha_inscripcion) VALUES (:curso_id, :empleado, :fecha_inscripcion)');
            $sentencia->bindParam(':curso_id', $curso_id);
            $sentencia->bindParam(':empleado', $empleado);
            $sentencia->bindParam(':fecha_inscripcion', $fecha_inscripcion);
            $sentencia->execute();

            $pdo->commit();
            session_start();
            $_SESSION['mensaje'] = "Curso inscrito con éxito!";
            $_SESSION['icono'] = "success"; 
            header('Location: ' . APP_URL . "/admin/capacitacion/inscripcion/index.php"); 
        } catch (Exception $e) {
            $pdo->rollBack();
            // Manejo de error
            session_start();
            $_SESSION['mensaje'] = "Error al inscribir curso";
            $_SESSION['icono'] = "error"; 
            ?><script>window.history.back();</script><?php 
        }
    } else {
        // Manejo de error si no se selecciona un curso
        session_start(); 
        $_SESSION['mensaje'] = "Seleccione un curso"; 
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php   
    }
}

?>