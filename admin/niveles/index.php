<?php 
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="content">
      <div class="container">
        <div class="row">
        <h1>Listado de Niveles</h1>
        </div>
        <div class="row">
          <div class = "col-md-9">
            <div class="card card-outline card-secondary">
              <div class="card-header">
                <h3 class="card-title">Niveles registrados</h3>
                <div class="card-tools">
                  <a href="create.php" class="btn btn-dark"><i class="bi bi-plus-circle"></i>   Crear nuevo nivel</a>
                </div>
              </div>
              <div class="card-body">
          <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
          <thead>
            <tr>
              <th style="text-align: center">Nro</th>
              <th style="text-align: center">Gestión academica</th>
              <th style="text-align: center">Nivel</th>
              <th style="text-align: center">Turno</th>
              <th style="text-align: center">Estado</th>
              <th style="text-align: center">Acciones</th>
            </tr>
          </thead>    
          <tbody>
            <?php                                                
            $contador_niveles = 0;
            foreach ($niveles as $nivele) {
              $id_nivel = $nivele['id_nivel'];
              $contador_niveles = $contador_niveles + 1; ?>
              <tr>
                <td style="text-align: center"><?=$contador_niveles;?></td>
                <td style="text-align: center"><?=$nivele['gestion'];?></td>
                <td style="text-align: center"><?=$nivele['nivel'];?></td>
                <td style="text-align: center"><?=$nivele['turno'];?></td>
                <td>
                  <?php
                  if ($nivele['estado'] == "1") { ?>
                  <center><button class="btn btn-primary btn-xs" style="border-radius: 20px">ACTIVO</button></center>
                  <?php
                  }else { ?>
                  <center><button class="btn btn-danger btn-xs" style="border-radius: 20px">INACTIVO</button></center>
                  <?php
                  }
                  ?>
                </td>
                <td style="text-align: center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="show.php?id=<?=$id_nivel;?>" type="button" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?=$id_nivel;?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style ="color: white"></i></a>
                  <form action="<?=APP_URL;?>/app/controllers/niveles/delete.php" onclick="preguntar<?=$id_nivel;?>(event)" method="post" id="miFormulario<?=$id_nivel;?>">
                    <input type="text" name="id_nivel" value="<?=$id_nivel;?>" hidden>
                  <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 3px 3px 0px"><i class="bi bi-trash3"></i></button>
                  </form>
                  <script>
                    function preguntar<?=$id_nivel;?> (event){
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
                          var form = $('#miFormulario<?=$id_nivel;?>');
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
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ niveles",
        "infoEmpty": "Mostrando 0 a 0 de 0 niveles",
        "infoFiltered": "(Filtrado de _MAX_ total niveles)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ niveles",
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