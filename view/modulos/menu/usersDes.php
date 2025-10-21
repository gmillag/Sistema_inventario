
<div class="wrapper">
  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios desactivados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped tablas">
                  <thead>
                  <tr> 
                    <th>Nº</th>
                    <th>NOMBRES COMPLETOS</th>
                    <th>USUARIO</th>
                    <th>DNI</th>
                    <th>CARGO</th>
                    <th>DEPENDENCIA</th>
                    <th>SEDE</th>
                    <th>ACCIONES</th>
                    </tr>
                  </thead>
                                  
                  <tbody>
                      <?php
                      $item = null;
                      $valor = null;

                      $usuarios = ControladorUsuarios::ctrMostrarUsuariosDesConNombres();

                      foreach($usuarios as $key => $valores){
                          echo "
                          <tr>
                              <td>".($key+1)."</td>
                              <td>".$valores['nombre_usuario']."</td>
                              <td>".$valores['usuario_id']."</td>
                              <td>".$valores['dni_usuario']."</td>
                              <td>".$valores['nombre_cargo']."</td>
                              <td>".$valores['nombre_dependencia']."</td>
                              <td>".$valores['nombre_sede']."</td>
                              <td>
                                <button class='btn btn-success btnActivarUsuario' 
                                      data-usuario_id='".$valores['usuario_id']."' 
                                      data-nombre='".$valores['nombre_usuario']."' 
                                      data-toggle='modal' data-target='#modalActivarUsuario'>
                                  Activar
                                </button>
                              </td>
                          </tr>
                          ";
                      }
                      ?>                  
                </tbody>                

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


<!-- ==================== MODAL ACTIVAR USUARIO ==================== -->
<div class="modal fade" id="modalActivarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalActivarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalActivarLabel">
                    <i class="fas fa-user-check"></i> Activar Usuario
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas activar al usuario <strong id="nombreUsuarioActivar"></strong>?</p>
                <p class="text-muted small">
                    <i class="fas fa-info-circle"></i> El usuario se mostrará en la lista de usuarios activos.
                </p>
                <input type="hidden" id="usuarioIdActivar" name="usuario_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="button" class="btn btn-success" id="btnConfirmarActivar">
                    <i class="fas fa-user-check"></i> Activar
                </button>
            </div>
        </div>
    </div>
</div>