<?php
// Incluir la conexión a la base de datos
include("../conn/conn.php");

// Verificar si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Verificar si se ha enviado el código QR
    if (isset($_POST['qr_code'])) {
        $qrCode = $_POST['qr_code']; //Almacenar el código QR en una variable

        // Preparar una declaración para seleccionar el ID del empleado en función del código generado
        $selectStmt = $conn->prepare("SELECT tbl_student_id FROM tbl_student WHERE generated_code = :generated_code");
        $selectStmt->bindParam(":generated_code", $qrCode, PDO::PARAM_STR);

        // Ejecutar la declaración y verificar si se ha encontrado un resultado
        if ($selectStmt->execute()) {
            $result = $selectStmt->fetch();
            if ($result !== false) {
                $studentID = $result["tbl_student_id"]; //Almacenar el ID empleado
                $timeIn =  date("Y-m-d H:i:s"); // Obtener la fecha y hora actual
            } else {
                echo "No student found in QR Code"; //Mensaje si no encuentra un estudiante
            }
        } else {
            echo "Failed to execute the statement."; // Mensaje si falla la ejecución de la declaración
        }

        // Intentar insertar un registro en la tabla de asistencia
        try {
            $stmt = $conn->prepare("INSERT INTO tbl_attendance (tbl_student_id, time_in) VALUES (:tbl_student_id, :time_in)");
            
            $stmt->bindParam(":tbl_student_id", $studentID, PDO::PARAM_STR); 
            $stmt->bindParam(":time_in", $timeIn, PDO::PARAM_STR); 

            $stmt->execute(); //Ejecutar la declaración
            
            // Redirigir al usuario a la página principal
            header("Location: http://localhost/SGA/qr-code-attendance-system/index.php");

        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage(); //Mensaje de error en caso de una excepción PDO
        }

    } else {
        // Mostrar una alerta y redirigir si no se han llenado todos los campos
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';
            </script>
        ";
    }
}
?>



