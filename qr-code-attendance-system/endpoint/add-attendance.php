<?php
// Incluir la conexión a la base de datos
include("../conn/conn.php");

// Verificar si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['qr_code'])) {
        $qrCode = $_POST['qr_code'];

        $selectStmt = $conn->prepare("SELECT tbl_student_id FROM tbl_student WHERE generated_code = :generated_code");
        $selectStmt->bindParam(":generated_code", $qrCode, PDO::PARAM_STR);
        if ($selectStmt->execute()) {
            $result = $selectStmt->fetch();
            if ($result !== false) {
                $studentID = $result["tbl_student_id"];

                // Verificar si ya se registró la entrada hoy
                $checkStmt = $conn->prepare("SELECT * FROM tbl_attendance WHERE tbl_student_id = :student_id AND DATE(time_in) = CURDATE()");
                $checkStmt->bindParam(":student_id", $studentID, PDO::PARAM_INT);
                $checkStmt->execute();
                $attendanceExists = $checkStmt->fetch(PDO::FETCH_ASSOC);
                

                if ($attendanceExists) {
                    echo "<script>alert('Error al registrar la entrada: Ya se ha registrado una entrada hoy.'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
                } else {
                    $timeIn = date("Y-m-d H:i:s");
                    try {
                        $stmt = $conn->prepare("INSERT INTO tbl_attendance (tbl_student_id, time_in) VALUES (:tbl_student_id, :time_in)");
                        $stmt->bindParam(":tbl_student_id", $studentID, PDO::PARAM_INT);
                        $stmt->bindParam(":time_in", $timeIn, PDO::PARAM_STR);
                        $stmt->execute();
                        echo "<script>alert('La entrada se ha registrado con éxito.'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
                    } catch (PDOException $e) {
                        echo "<script>alert('Error al registrar la entrada: " . $e->getMessage() . "'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
                    }
                }
            } else {
                echo "<script>alert('Código QR no válido.'); window.location.href = 'http://localhost/SGA/qr-code-attendance-system/index.php';</script>";
            }
        }
    }
}

?>


