<?php 
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/asistencias/listado_de_asistencias.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Listado de asistencias</h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-secondary">
              <div class="card-header">
                <h3 class="card-title">Registro de asistencias</h3>
                <div class="card-tools">
                  <a href="create.php" class="btn btn-dark"><i class="bi bi-plus-circle"></i>   Registar una nueva asistencia</a>
                </div>
              </div>
              <div class="card-body">
          <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
          <thead>
            <tr>
              <th style="text-align: center">Nro</th>
              <th style="text-align: center">Nombre y Apellido</th>
              <th style="text-align: center">Cédula de identidad</th>
              <th style="text-align: center">Rol</th>
              <th style="text-align: center">Hora de entrada</th>
              <th style="text-align: center">Hora de salida</th>
              <th style="text-align: center">Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $contador_asistencias = 0;
            foreach ($asistencias as $asistencia) {
              $tbl_attendance_id = $asistencia['tbl_attendance_id'];
              $contador_asistencias = $contador_asistencias + 1; ?>
              <tr>
                <td style="text-align: center"><?=$contador_asistencias;?></td>
                <td style="text-align: center"><?=$asistencia['student_name'];?> <?=$asistencia['student_last_name'];?></td>
                <td style="text-align: center"><?=$asistencia['course_section'];?></td>
                <td style="text-align: center"><?=$asistencia['rol'];?></td>
                <td style="text-align: center"><?=$asistencia['time_in'];?></td>
                <td style="text-align: center"><?=$asistencia['time_out'];?></td>
                <td style="text-align: center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <form action="<?=APP_URL;?>/app/controllers/asistencias/delete.php" onclick="preguntar<?=$tbl_attendance_id;?>(event)" method="post" id="miFormulario<?=$tbl_attendance_id;?>">
                    <input type="text" name="tbl_attendance_id" value="<?=$tbl_attendance_id;?>" hidden>
                  <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 3px 3px 3px 3px"><i class="bi bi-trash3"></i></button>
                  </form>
                  <script>
                    function preguntar<?=$tbl_attendance_id;?> (event){
                      event.preventDefault();
                      Swal.fire({
                        title: 'Eliminar registro',
                        text: "¿Desea eliminar este registro?",
                        icon: 'question',
                        showDenyButton: true,
                        confirmButtonText: 'Eliminar',
                        confirmButtonColor: '#df0000',
                        denyButtonColor: '#808080',
                        denyButtonText: 'Cancelar',
                      }) .then((result) => {
                        if (result.isConfirmed) {
                          var form = $('#miFormulario<?=$tbl_attendance_id;?>');
                          form.submit();
                        }
                      });
                    }
                  </script>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');
?>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 10,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias",
        "infoEmpty": "Mostrando 0 a 0 de 0 asistencias",
        "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ asistencias",
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
      "responsive": true, "lengthChange": true, "autoWidth": false,
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
        }
      ]
      }, {
        extend: 'colvis',
        text: 'Visor de columnas',
        collectionLayout: 'fixed three-column',
      }
    ],  
    }) .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

