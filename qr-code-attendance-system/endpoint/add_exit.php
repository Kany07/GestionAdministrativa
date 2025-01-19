<?php
// Incluir la conexión a la base de datos
include("../conn/conn.php"); // Incluir el archivo que contiene la conexión a la base de datos

// Verificar si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Comprobar si la solicitud es de tipo POST
    if (isset($_POST['attendance_id'])) { // Verificar si se ha enviado un ID de asistencia
        $attendanceID = $_POST['attendance_id']; // Asignar el ID de asistencia enviado a la variable

        // Verificar si ya se registró la entrada hoy
        $checkAttendanceStmt = $conn->prepare("SELECT * FROM tbl_attendance WHERE tbl_attendance_id = :attendance_id AND DATE(time_in) = CURDATE()"); 
        $checkAttendanceStmt->bindParam(":attendance_id", $attendanceID, PDO::PARAM_INT); 
        $checkAttendanceStmt->execute(); 
        $attendanceExists = $checkAttendanceStmt->fetch(PDO::FETCH_ASSOC); 

        if ($attendanceExists) {
            // Verificar si ya se registró la salida hoy
            $checkExitStmt = $conn->prepare("SELECT * FROM tbl_attendance WHERE tbl_student_id = :student_id AND DATE(time_out) = CURDATE()"); 
            $checkExitStmt->bindParam(":student_id", $attendanceExists['tbl_student_id'], PDO::PARAM_INT); 
            $checkExitStmt->execute(); 
            $exitExists = $checkExitStmt->fetch(PDO::FETCH_ASSOC); 

            if ($exitExists) {
                // Mensaje de error: salida ya registrada
                echo "<script>alert('Error: La salida ya se ha registrado.'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
            } else {
                $timeOut = date("Y-m-d H:i:s"); // Obtener la fecha y hora actual para la salida
                try {
                    // Preparar la consulta para actualizar el registro de salida
                    $updateStmt = $conn->prepare("UPDATE tbl_attendance SET time_out = :time_out WHERE tbl_attendance_id = :attendance_id");
                    $updateStmt->bindParam(":time_out", $timeOut, PDO::PARAM_STR); 
                    $updateStmt->bindParam(":attendance_id", $attendanceID, PDO::PARAM_INT); 
                    $updateStmt->execute(); 

                    // Mensaje de éxito: salida registrada
                    echo "<script>alert('La salida se ha registrado con éxito.'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
                } catch (PDOException $e) {
                    // Mensaje de error en caso de fallo
                    echo "<script>alert('Error al registrar la salida: " . $e->getMessage() . "'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
                }
            }
        } else {
            // Mensaje de error: no se encontró entrada
            echo "<script>alert('Error: No se ha registrado una entrada para hoy.'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
        }
    }
}
?>
