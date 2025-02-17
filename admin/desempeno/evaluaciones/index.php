<?php 
include ('../../../app/config.php');
include ('../../../admin/layout/parte1.php');
include ('../../../app/controllers/desempeno/evaluaciones/listado_de_evaluaciones.php');

include ('../../../app/controllers/desempeno/objetivos/listado_de_objetivos.php');
?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Listado de evaluaciones</h1>
        </div>
        <div class="row">
          <div class = "col-md-12">
            <div class="card card-outline card-secondary">
              <div class="card-header">
                <h3 class="card-title">Evaluaciones registradas</h3>
                <div class="card-tools">
                  <a href="diagnostico.php" class="btn btn-dark"><i class="bi bi-plus-circle"></i>   Evaluar personal</a>
                </div>
              </div>
              <div class="card-body">
          <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
          <thead>
            <tr>
              <th style="text-align: center">Nro</th>
              <th style="text-align: center">Objetivo</th>
              <th style="text-align: center">Nombre y Apellido</th>
              <th style="text-align: center">Rol</th>
              <th style="text-align: center">Resultado</th>
              <th style="text-align: center">Fecha de evaluación</th>
              <th style="text-align: center">Acciones</th>
            </tr>
          </thead>    
          <tbody>
            <?php                                                
            $contador_evaluaciones = 0;
            foreach ($evaluaciones as $evaluacion) {
              $id_evaluaciones = $evaluacion['id_evaluaciones'];
              $contador_evaluaciones = $contador_evaluaciones + 1; ?>
              <tr>
                <td style="text-align: center"><?=$contador_evaluaciones;?></td>
                <td style="text-align: center"><?=$evaluacion['obj'];?></td>
                <td style="text-align: center"><?=$evaluacion['nombres']." ".$evaluacion['apellidos'];?></td>
                <td style="text-align: center"><?=$evaluacion['rol'];?></td>
                <td style="text-align: center"><?=$evaluacion['media'];?></td>
                <td style="text-align: center"><?=$evaluacion['fyh_creacion'];?></td>

                <td style="text-align: center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="edit.php?id=<?=$id_evaluaciones;?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style ="color: white"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/desempeno/evaluaciones/delete.php" onclick="preguntar<?=$id_evaluaciones;?>(event)" method="post" id="miFormulario<?=$id_evaluaciones;?>">
                    <input type="text" name="id_evaluaciones" value="<?=$id_evaluaciones;?>" hidden>
                  <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 3px 3px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
                  <script>
                    function preguntar<?=$id_evaluaciones;?> (event){
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
                          var form = $('#miFormulario<?=$id_evaluaciones;?>');
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
include ('../../../admin/layout/parte2.php');
include ('../../../layout/mensajes.php');
?>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 10,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ evaluaciones",
        "infoEmpty": "Mostrando 0 a 0 de 0 evaluaciones",
        "infoFiltered": "(Filtrado de _MAX_ total evaluaciones)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ evaluaciones",
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