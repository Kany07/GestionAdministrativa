<?php
// Incluir el archivo de conexión a la base de datos
include("../conn/conn.php");

// Verificar si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si los campos 'student_name' y 'course_section' están establecidos en la solicitud POST
    if (isset($_POST['student_name'], $_POST['course_section'])) {
        $studentName = $_POST['student_name']; // Obtener el nombre del estudiante del formulario POST
        $studentCourse = $_POST['course_section']; // Obtener el curso y la sección del estudiante del formulario POST
        $generatedCode = $_POST['generated_code']; // Obtener el código generado del formulario POST
        
        try {
            // Preparar una declaración para insertar un nuevo estudiante en la base de datos
            $stmt = $conn->prepare("INSERT INTO tbl_student (student_name, course_section, generated_code) VALUES (:student_name, :course_section, :generated_code)");
            
            // Vincular los parámetros a los valores del formulario
            $stmt->bindParam(":student_name", $studentName, PDO::PARAM_STR); 
            $stmt->bindParam(":course_section", $studentCourse, PDO::PARAM_STR);
            $stmt->bindParam(":generated_code", $generatedCode, PDO::PARAM_STR);

            // Ejecutar la declaración
            $stmt->execute();

            // Redirigir al usuario a la lista principal después de agregar el estudiante
            header("Location: http://localhost/SGA/qr-code-attendance-system/masterlist.php");

            exit(); // Salir del script después de la redirección
        } catch (PDOException $e) {
            // Mostrar mensaje de error si ocurre una excepción
            echo "Error:" . $e->getMessage();
        }

    } else {
        // Mostrar una alerta y redirigir al usuario si faltan campos en el formulario
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://localhost/SGA/qr-code-attendance-system/masterlist.php';
            </script>
        ";
    }
}
?>



