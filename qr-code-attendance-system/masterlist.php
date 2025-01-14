<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Especifica la codificación de caracteres para el documento -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura el viewport para un diseño responsivo -->
    <title>Sistema de asistencia con código QR</title> <!-- Título de la página -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> <!-- Incluir el CSS de Bootstrap -->

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" /> <!-- Incluir el CSS de DataTables -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap'); /* Importar fuente desde Google Fonts */

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif; /* Aplicar fuente Poppins a todo el documento */
        }

        body {
            background: linear-gradient(to bottom, rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.15) 100%), 
                        radial-gradient(at top center, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.40) 120%) #989898;
            background-blend-mode: multiply, multiply; /* Aplicar modo de mezcla al fondo */
            background-attachment: fixed; /* Fijar el fondo */
            background-repeat: no-repeat; /* No repetir el fondo */
            background-size: cover; /* Ajustar el tamaño del fondo */
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh; /* Definir la altura de la sección principal */
        }

        .student-container {
            height: 90%;
            width: 90%;
            border-radius: 20px; /* Bordes redondeados */
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente */
        }

        .student-container > div {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; /* Sombra de caja */
            border-radius: 10px; /* Bordes redondeados */
            padding: 30px;
            height: 100%;
        }

        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting_asc_disabled, table.dataTable thead > tr > th.sorting_desc_disabled, table.dataTable thead > tr > td.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting_asc_disabled, table.dataTable thead > tr > td.sorting_desc_disabled {
            text-align: center; /* Alinear el texto al centro */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-4" href="#">Sistema de asistencia con código QR</a> <!-- Nombre del sistema -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <!-- Icono de la barra de navegación -->
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Asistencia<span class="sr-only">(current)</span></a> <!-- Enlace a la página de asistencia -->
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./masterlist.php">Empleados</a> <!-- Enlace a la lista de empleados -->
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3">
                    <p class="mb-0">
                        <button type="button" class="btn btn-success btn-xs" onclick="window.location.href='http://localhost/SGA/login'">Volver</button> <!-- Botón para volver a la página de inicio de sesión -->
                    </p>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main">

        <div class="student-container">
            <div class="student-list">
                <div class="title">
                    <h5>Lista de empleados</h5> <!-- Título de la lista de empleados -->
                    <!-- <button class="btn btn-dark" data-toggle="modal" data-target="#addStudentModal">Agregar empleado</button> //Botón para agregar empleado -->
                </div>
                <hr>
                <div class="table-container table-responsive"> 
                    <table class="table text-center table-sm table-striped table-bordered table-hover" id="studentTable"> <!-- Tabla de datos -->
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cédula de identidad</th>
                                <th scope="col">QR</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                include ('./conn/conn.php'); // Incluir la conexión a la base de datos

                                $stmt = $conn->prepare("SELECT * FROM tbl_student"); // Preparar la consulta SQL para obtener estudiantes
                                $stmt->execute(); // Ejecutar la consulta
                
                                $result = $stmt->fetchAll(); // Obtener todos los resultados
                
                                foreach ($result as $row) { // Iterar sobre cada resultado
                                    $studentID = $row["tbl_student_id"]; // Obtener el ID del estudiante
                                    $studentName = $row["student_name"]; // Obtener el nombre del estudiante
                                    $studentCourse = $row["course_section"]; // Obtener la cédula de identidad del estudiante
                                    $qrCode = $row["generated_code"]; // Obtener el código QR generado
                                ?>

                                <tr>
                                    <th scope="row" id="studentID-<?= $studentID ?>"><?= $studentID ?></th> <!-- Mostrar ID del estudiante -->
                                    <td id="studentName-<?= $studentID ?>"><?= $studentName ?></td> <!-- Mostrar nombre del estudiante -->
                                    <td id="studentCourse-<?= $studentID ?>"><?= $studentCourse ?></td> <!-- Mostrar cédula de identidad del estudiante -->
                                    <td>
                                        <div class="action-button">
                                            <button class="btn btn-sm" style="background-color:rgba(64, 32, 78, 0.9) " data-toggle="modal" data-target="#qrCodeModal<?= $studentID ?>"><i class="bi bi-qr-code-scan" style="color: white"></i></button> <!-- Botón para ver código QR -->

                                            <!-- QR Modal -->
                                            <div class="modal fade" id="qrCodeModal<?= $studentID ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><?= $studentName ?>'s QR Code</h5> <!-- Título del modal -->
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span> <!-- Botón para cerrar el modal -->
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= $qrCode ?>" alt="" width="300"> <!-- Código QR generado -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> <!-- Botón para cerrar el modal -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <button class="btn btn-secondary btn-sm" onclick="updateStudent(<?= $studentID ?>)">&#128393;</button> // Botón para actualizar estudiante 
                                            <button class="btn btn-danger btn-sm" onclick="deleteStudent(<?= $studentID ?>)">&#10006;</button> Botón para eliminar estudiante -->
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<style>
.action-button {
    display: flex;
    justify-content: space-around; /* Asegurarse de que los botones estén distribuidos uniformemente */
}

.action-button .btn {
    margin: 0 2px; /* Añadir un pequeño margen entre los botones */
}
</style>

    <!-- Add Modal -->
<div class="modal fade" id="addStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addStudent" aria-hidden="true">
    <!-- Contenedor del modal para agregar estudiante -->
    <div class="modal-dialog">
        <!-- Contenido del modal -->
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="addStudent">Agregar empleado</h5> <!-- Título del modal -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> <!-- Botón para cerrar el modal -->
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar un estudiante -->
                <form action="./endpoint/add-student.php" method="POST">
                    <div class="form-group">
                        <label for="studentName">Nombres:</label> <!-- Etiqueta para el nombre completo del estudiante -->
                        <input type="text" class="form-control" id="studentName" name="student_name"> <!-- Campo de entrada para el nombre completo -->
                    </div>
                    <div class="form-group">
                        <label for="studentCourse">Cédula de identidad:</label> <!-- Etiqueta para el curso y sección del estudiante -->
                        <input type="text" class="form-control" id="studentCourse" name="course_section"> <!-- Campo de entrada para el curso y sección -->
                    </div>
                    <button type="button" class="btn btn-secondary form-control qr-generator" onclick="generateQrCode()">Generate QR Code</button>
                    <!-- Botón para generar el código QR -->

                    <div class="qr-con text-center" style="display: none;">
                        <input type="hidden" class="form-control" id="generatedCode" name="generated_code"> <!-- Campo oculto para almacenar el código generado -->
                        <p>Take a pic with your qr code.</p> <!-- Mensaje de instrucciones -->
                        <img class="mb-4" src="" id="qrImg" alt=""> <!-- Imagen del código QR generado -->
                    </div>
                    <div class="modal-footer modal-close" style="display: none;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <!-- Botón para cerrar el modal -->
                        <button type="submit" class="btn btn-dark">Add List</button> <!-- Botón para enviar el formulario -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateStudent" aria-hidden="true">
    <!-- Contenedor del modal para actualizar estudiante -->
    <div class="modal-dialog">
        <!-- Contenido del modal -->
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="updateStudent">Update Student</h5> <!-- Título del modal -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> <!-- Botón para cerrar el modal -->
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para actualizar un estudiante -->
                <form action="./endpoint/update-student.php" method="POST">
                    <input type="hidden" class="form-control" id="updateStudentId" name="tbl_student_id"> <!-- Campo oculto para el ID del estudiante -->
                    <div class="form-group">
                        <label for="updateStudentName">Full Name:</label> <!-- Etiqueta para el nombre completo del estudiante -->
                        <input type="text" class="form-control" id="updateStudentName" name="student_name"> <!-- Campo de entrada para el nombre completo -->
                    </div>
                    <div class="form-group">
                        <label for="updateStudentCourse">Course and Section:</label> <!-- Etiqueta para el curso y sección del estudiante -->
                        <input type="text" class="form-control" id="updateStudentCourse" name="course_section"> <!-- Campo de entrada para el curso y sección -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <!-- Botón para cerrar el modal -->
                        <button type="submit" class="btn btn-dark">Add</button> <!-- Botón para enviar el formulario -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> <!-- Incluir jQuery -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> <!-- Incluir Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script> <!-- Incluir Bootstrap JS -->

<!-- Data Table -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> <!-- Incluir DataTables JS -->

<script>
    $(document).ready(function () {
        $('#studentTable').DataTable({ 
            "pageLength": 6, // Establecer la longitud de página a 6 filas
            "language": {
                "emptyTable": "No hay información", // Texto mostrado cuando no hay datos
                "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias", // Información de paginación
                "infoEmpty": "Mostrando 0 a 0 de 0 asistencias", // Texto cuando no hay información para mostrar
                "infoFiltered": "(Filtrado de _MAX_ total asistencias)", // Texto para información filtrada
                "infoPostFix": "",
                "thousands": ",",
                "loadingRecords": "Cargando...", // Texto mientras se cargan los registros
                "processing": "Procesando...", // Texto mientras se procesa la información
                "search": "Buscar:", // Texto del campo de búsqueda
                "zeroRecords": "No se encontraron resultados", // Texto cuando no se encuentran registros
                "paginate": {
                    "first": "Primero", // Texto del botón de primera página
                    "last": "Último", // Texto del botón de última página
                    "next": "Siguiente", // Texto del botón de página siguiente
                    "previous": "Anterior" // Texto del botón de página anterior
                }
            },
            "responsive": true, "lengthChange": false, "autoWidth": false, // Opciones para la tabla responsiva, sin cambio de longitud y ancho automático
            buttons: [{
                extend: 'collection',
                text: 'Reportes', // Texto del botón de colección de reportes
                orientation: 'landscape', // Orientación de los reportes
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy' // Botón para copiar
                }, { 
                    extend: 'pdf' // Botón para exportar a PDF
                }, {
                    extend: 'csv' // Botón para exportar a CSV
                }, {
                    extend: 'excel' // Botón para exportar a Excel
                }, {
                    text: 'Imprimir',
                    extend: 'print'  // Botón para imprimir
                }]
            }, {
                extend: 'colvis',
                text: 'Visor de columnas', // Texto del botón para la visibilidad de columnas
                collectionLayout: 'fixed three-column' // Disposición de la colección de visibilidad de columnas
            }]
        }).buttons().container().appendTo('#studentTable_wrapper .col-md-6:eq(0)'); // Agregar los botones al contenedor específico
    });

    function updateStudent(id) {
        $("#updateStudentModal").modal("show"); // Mostrar el modal de actualización

        // Obtener datos del estudiante desde las celdas de la tabla
        let updateStudentId = $("#studentID-" + id).text();
        let updateStudentName = $("#studentName-" + id).text();
        let updateStudentCourse = $("#studentCourse-" + id).text();

        // Asignar datos a los campos del formulario del modal
        $("#updateStudentId").val(updateStudentId);
        $("#updateStudentName").val(updateStudentName);
        $("#updateStudentCourse").val(updateStudentCourse);
    }

    function deleteStudent(id) {
        if (confirm("Do you want to delete this student?")) {
            window.location = "./endpoint/delete-student.php?student=" + id; // Redirigir a la URL para eliminar el estudiante
        }
    }

    function generateRandomCode(length) {
        const characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        let randomString = '';

        for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomString += characters.charAt(randomIndex);
            }

        return randomString; // Generar un código aleatorio de la longitud especificada
    }

    function generateQrCode() {
        const qrImg = document.getElementById('qrImg');

        let text = generateRandomCode(10); // Generar un código aleatorio de 10 caracteres y asignarlo a la variable "text"
$("#generatedCode").val(text); // Establecer el valor del campo oculto "generatedCode" al texto generado

if (text === "") { // Verificar si el texto generado está vacío
    alert("Please enter text to generate a QR code."); // Mostrar una alerta si el texto está vacío
    return; // Salir de la función si el texto está vacío
} else {
    const apiUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(text)}`;
    // Crear la URL del API para generar el código QR utilizando el texto generado

    qrImg.src = apiUrl; // Establecer la fuente de la imagen "qrImg" a la URL del API
    document.getElementById('studentName').style.pointerEvents = 'none'; // Deshabilitar la edición del campo "studentName"
    document.getElementById('studentCourse').style.pointerEvents = 'none'; // Deshabilitar la edición del campo "studentCourse"
    document.querySelector('.modal-close').style.display = ''; // Mostrar el botón de cerrar el modal
    document.querySelector('.qr-con').style.display = ''; // Mostrar el contenedor del código QR
    document.querySelector('.qr-generator').style.display = 'none'; // Ocultar el botón de generar el código QR
}
    }
    </script>

</body>
</html>
