<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de asistencia con codigo QR</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            height: 110vh;
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
        <a class="navbar-brand ml-4" href="#">Sistema de asistencia con código QR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Asistencia <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="./masterlist.php">Empleados</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3">
                <p class="mb-0">
                <button type="button" class="btn btn-success btn-xs" onclick="window.location.href='http://localhost/SGA/login'">Volver</button></p>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main">
        <div class="attendance-container row">
            <div class="qr-container col-4">
                
                <div class="scanner-con">
                    <h5 class="text-center">Escanee su código QR aquí para su asistencia</h5>
                    <video id="interactive" class="viewport" width="100%">
                </div>  

                <div class="qr-detected-container" style="display: none;">
                    <form action="./endpoint/add-attendance.php" method="POST">
                        <h4 class="text-center">QR DETECTADO!</h4><br>
                        <input type="hidden" id="detected-qr-code" name="qr_code">
                        <button type="submit" class="btn btn-success form-control">Confirmar asistencia</button>
                    </form>
                </div>
                <br><br>
                <div>
                <?php
                date_default_timezone_set("America/Caracas");?>
                <center><h6 id="fecha"><?=date('Y-m-d H:i:s');?></h6></center>
                <script>
        
              setInterval(() => {
                 let fecha=new Date();
                 let fechaHora=fecha.toLocaleString();
                document.getElementById("fecha").textContent=fechaHora;
              }, 1000);
              </script>
                </div>
            </div>

            <div class="attendance-list">
                <h5>Lista de empleados</h5>
                <div class="table-container table-responsive">
                    <table class="table text-center table-sm table-striped table-bordered table-hover" id="studentTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col-1" style="text-align: center">ID</th>
                                <th scope="col" style="text-align: center">Nombre</th>
                                <th scope="col" style="text-align: center">Entrada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include ('./conn/conn.php');
                                $stmt = $conn->prepare("SELECT * FROM tbl_attendance LEFT JOIN tbl_student ON tbl_student.tbl_student_id = tbl_attendance.tbl_student_id");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                    $attendanceID = $row["tbl_attendance_id"];
                                    $studentName = $row["student_name"];
                                    $timeIn = $row["time_in"];
                            ?>
                            <tr>
                                <th scope="row" style="text-align: center"><?= $attendanceID ?></th>
                                <td style="text-align: center"><?= $studentName ?></td>
                                <td style="text-align: center"><?= $timeIn ?></td>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <!-- instascan Js -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>
        let scanner;
        function startScanner() {
            scanner = new Instascan.Scanner({ video: document.getElementById('interactive') });
            scanner.addListener('scan', function (content) {
                $("#detected-qr-code").val(content);
                console.log(content);
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

        $(function () {
            $("#studentTable").DataTable({
              "pageLength": 6,
              "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias",
                "infoEmpty": "Mostrando 0 a 0 de 0 asistencias",
                "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
                "infoPostFix": "",
                "thousands": ",",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
                }
              },
              "responsive": true, "lengthChange": false, "autoWidth": false, // Removed lengthChange option
              buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                  text: 'Copiar',
                  extend: 'copy',
                }, { 
                  extend: 'pdf',
                }, {
                  extend: 'csv',
                }, {
                  extend: 'excel',
                }, {
                  text: 'Imprimir',
                  extend: 'print',  
                }]
              }, {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column',
              }]
            }).buttons().container().appendTo('#studentTable_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>
</html>
