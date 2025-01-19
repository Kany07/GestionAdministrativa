<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de asistencia con código QR</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> <!-- Incluir el CSS de Bootstrap -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> <!-- Incluir el CSS de DataTables -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Incluir SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to bottom, rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.15) 100%), radial-gradient(at top center, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.40) 120%) #989898;
            background-blend-mode: multiply,multiply;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
        }

        .attendance-container {
            height: 90%;
            width: 90%;
            border-radius: 20px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .attendance-container > div {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            padding: 30px;
        }

        .attendance-container > div:last-child {
            width: 64%;
            margin-left: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-4" href="#" style="font-size: large">Registro de asistencia con código QR</a> <!-- Nombre del sistema -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" onclick="window.location.href='./index.php'" style="color:white">Asistencia</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="window.location.href='./masterlist.php'" style="color:white">Empleados</button>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <p class="mb-0">
                    <button type="button" class="btn btn-success btn-xs" onclick="window.location.href='http://localhost/SGA/login'">Volver</button>
                </p> <!-- Botón para volver a la página de inicio de sesión -->
            </li>
        </ul>
    </div>
</nav>
    <div class="main">
        <div class="attendance-container row">
            <div class="qr-container col-4">
                
                <div class="scanner-con">
                    <h5 class="text-center">Escanee su código QR aquí para registrar su entrada</h5><br>
                    <video id="interactive" class="viewport" width="100%"></video> <!-- Video para escaneo de código QR -->
                </div>  

                <div class="qr-detected-container" style="display: none;">
                    <form action="./endpoint/add-attendance.php" method="POST">
                        <h4 class="text-center">¡QR DETECTADO!</h4><br>
                        <input type="hidden" id="detected-qr-code" name="qr_code"> <!-- Campo oculto para almacenar el código QR detectado -->
                        <button type="submit" class="btn btn-primary form-control">Confirmar entrada</button> <!--Botón para confirmar asistencia -->
                    </form>
               </div>
                <br><br>
                <div>
                <?php
                date_default_timezone_set("America/Caracas");?> <!-- Establecer la zona horaria -->
                <center><h6 id="fecha"><?=date('Y-m-d H:i:s');?></h6></center> <!-- Mostrar la fecha y hora actual -->
                <script>
                  setInterval(() => {
                     let fecha = new Date();
                     let fechaHora = fecha.toLocaleString();
                    document.getElementById("fecha").textContent = fechaHora; // Actualizar la fecha y hora cada segundo
                  }, 1000);
                </script>
                </div>
            </div>

            <div class="attendance-list">
                <h5>Listado de asistencias</h5>
                <div class="table-container table-responsive">
                    <table class="table text-center table-sm table-striped table-bordered table-hover" id="studentTable"> <!-- Tabla de asistencia -->
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="text-align: center">ID</th>
                                <th scope="col" style="text-align: center">CI</th>
                                <th scope="col" style="text-align: center">Entrada</th>
                                <th scope="col" style="text-align: center">Salida</th>
                                <th scope="col" style="text-align: center"><big><i class="bi bi-calendar-x"></big></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include ('./conn/conn.php'); // Incluir conexión a la base de datos
                                $stmt = $conn->prepare("SELECT * FROM tbl_attendance LEFT JOIN tbl_student ON tbl_student.tbl_student_id = tbl_attendance.tbl_student_id"); // Preparar declaración para obtener asistencia
                                $stmt->execute(); // Ejecutar declaración
                                $result = $stmt->fetchAll(); // Obtener todos los resultados
                                foreach ($result as $row) {
                                    $attendanceID = $row["tbl_attendance_id"]; // ID de asistencia
                                    $studentCourse = $row["course_section"]; // Obtener la cédula de identidad del estudiante
                                    $timeIn = $row["time_in"]; // Hora de entrada
                                    $timeOut = $row["time_out"]; // Hora de salida
                            ?>
                            <tr>
                                <th scope="row" style="text-align: center"><?= $attendanceID ?></th>
                                <td id="studentCourse-<?= $studentID ?>"><?= $studentCourse ?></td>
                                <td style="text-align: center"><?= $timeIn ?></td>
                                <td style="text-align: center"><?= $timeOut ?></td>
                              <td>  
                                <form action="./endpoint/add_exit.php" method="POST">
                                   <input type="hidden" id="attendance_id" name="attendance_id">
                                   <button type="button" class="btn btn-danger btn-block btn-sm" onclick="registrarSalida(<?= $attendanceID ?>)"><small>Registrar salida</small></i></button>
                                    </form>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> <!-- Incluir jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> <!-- Incluir Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script> <!-- Incluir Bootstrap JS -->
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> <!-- Incluir DataTables JS -->
    <!-- Instascan JS -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> <!-- Incluir Instascan JS -->

    <script>
let scanner;

function startScanner() {
    scanner = new Instascan.Scanner({ video: document.getElementById('interactive') });
    scanner.addListener('scan', function (content) {
        document.getElementById('attendance_id').value = content; 
        document.getElementById('detected-qr-code').value = content;  // Asegurar la asignación correcta
        console.log('QR Detectado:', content);
        scanner.stop();
        document.querySelector(".qr-detected-container").style.display = '';
        document.querySelector(".scanner-con").style.display = 'none';
    });
    Instascan.Camera.getCameras()
        .then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        })
        .catch(function (err) {
            console.error('Camera access error:', err);
            alert('Camera access error: ' + err);
        });
}

document.addEventListener('DOMContentLoaded', startScanner);

function registrarSalida(attendanceId) {
    // Crear un formulario oculto
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = './endpoint/add_exit.php';

    // Agregar un campo oculto para el ID de asistencia
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'attendance_id';
    input.value = attendanceId;
    form.appendChild(input);

    // Agregar el formulario al documento y enviarlo
    document.body.appendChild(form);
    form.submit();
}

    $(function () {
        $("#studentTable").DataTable({
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
    </script>
</body>
</html>