<?php
session_start(); // Iniciar sesión al principio
include ('../../../../app/config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso_id = $_POST['curso_id'] ?? null; // Obtener el ID del curso seleccionado
    $id_participantes = $_POST['id_participantes'] ?? null; // Obtener el ID del participante

    if ($curso_id && $id_participantes) {
        $empleado = $_POST['empleado'] ?? null; // Obtener el empleado

        // Validar datos
        if (empty($empleado)) {
            $_SESSION['mensaje'] = "El campo empleado es obligatorio.";
            $_SESSION['icono'] = "error"; 
            header('Location: ' . APP_URL . "/admin/capacitacion/inscripcion/index.php"); 
            exit();
        }

        $pdo->beginTransaction();
        try {
            $sentencia = $pdo->prepare('UPDATE participaciones 
            SET curso_id = :curso_id, 
                empleado = :empleado 
            WHERE id_participantes = :id_participantes');

            $sentencia->bindParam(':id_participantes', $id_participantes);
            $sentencia->bindParam(':curso_id', $curso_id);
            $sentencia->bindParam(':empleado', $empleado);
            $sentencia->execute();

            $pdo->commit();
            $_SESSION['mensaje'] = "Curso actualizado con éxito!";
            $_SESSION['icono'] = "success"; 
            header('Location: ' . APP_URL . "/admin/capacitacion/inscripcion/index.php"); 
            exit();
        } catch (Exception $e) {
            $pdo->rollBack();
            $_SESSION['mensaje'] = "Error al actualizar curso: " . $e->getMessage();
            $_SESSION['icono'] = "error"; 
            header('Location: ' . APP_URL . "/admin/capacitacion/inscripcion/index.php"); 
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "Faltan datos requeridos.";
        $_SESSION['icono'] = "error"; 
        header('Location: ' . APP_URL . "/admin/capacitacion/inscripcion/index.php"); 
        exit();
    }
}
?>
