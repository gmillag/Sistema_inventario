
<div class="wrapper">
  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
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
              <div class="card-header">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario
        </button>

              </div>
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
                    <th>Editar</th>
                    <th>Eliminar</th>


                  </tr>
                  </thead>

                  <tbody>
                  
                  <?php
                    $item=null;
                    $valor=null;

                    $usuarios =ControladorUsuarios::ctrMostrarUsuariosConNombres();

                    foreach($usuarios as $key=>$valores){
                      echo "
                      <tr>

                      <td>".($key+1)."</td>
                      <td>".$valores["nombre_usuario"]."</td>
                      <td>".$valores["usuario_id"]."</td>
                      <td>".$valores["dni"]."</td>
                      <td>".$valores["nombre_cargo"]."</td>
                      <td>".$valores["nombre_dependencia"]."</td>
                      <td>".$valores["nombre_sede"]."</td>
                      <td><button class='btn btn-primary'>Editar</button></td>
                      <td><button class='btn btn-danger'>Eliminar</button></td>                        



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

<!--  =================================================================================== -->

<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUsuario">
  <i class="fas fa-user-plus"></i> Nuevo Usuario
</button>

<!-- Modal -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <!-- Encabezado -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalUsuarioLabel"><i class="fas fa-user"></i> Registrar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Cuerpo -->
      <div class="modal-body">
        <form id="formUsuario">
          
          <div class="form-row">
            <!-- Usuario -->
            <div class="form-group col-md-6">
              <label for="usuario">Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese usuario">
              </div>
            </div>
            
            <!-- Contraseña -->
            <div class="form-group col-md-6">
              <label for="password">Contraseña</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña">
              </div>
            </div>
          </div>

          <div class="form-row">
            <!-- DNI -->
            <div class="form-group col-md-4">
              <label for="dni">DNI</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-id-card"></i></span>
                </div>
                <input type="text" class="form-control" id="dni" name="dni" maxlength="8" placeholder="Ingrese DNI">
              </div>
            </div>

            <!-- Nombre -->
            <div class="form-group col-md-8">
              <label for="nombre">Nombres</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                </div>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombres">
              </div>
            </div>
          </div>

          <div class="form-row">
            <!-- Apellido Paterno -->
            <div class="form-group col-md-6">
              <label for="apellidoPaterno">Apellido Paterno</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Ingrese apellido paterno">
              </div>
            </div>

            <!-- Apellido Materno -->
            <div class="form-group col-md-6">
              <label for="apellidoMaterno">Apellido Materno</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Ingrese apellido materno">
              </div>
            </div>
          </div>

          <div class="form-row">
            <!-- Email -->
            <div class="form-group col-md-6">
              <label for="email">Correo electrónico</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com">
              </div>
            </div>

            <!-- Teléfono -->
            <div class="form-group col-md-6">
              <label for="telefono">Teléfono</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese teléfono">
              </div>
            </div>
          </div>

          <div class="form-row">
            <!-- Cargo -->
            <div class="form-group col-md-6">
              <label for="cargo">Cargo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                </div>
                <select class="form-control" id="cargo" name="cargo">
                  <option value="">Seleccione un cargo</option>
                  <option value="1">Administrador</option>
                  <option value="2">Operador</option>
                  <option value="3">Soporte</option>
                </select>
              </div>
            </div>

            <!-- Sede -->
            <div class="form-group col-md-6">
              <label for="sede">Sede</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <select class="form-control" id="sede" name="sede">
                  <option value="">Seleccione una sede</option>
                  <option value="1">Lima</option>
                  <option value="2">Cañete</option>
                  <option value="3">Barranca</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-row">
            <!-- Dependencia -->
            <div class="form-group col-md-12">
              <label for="dependencia">Dependencia</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-building"></i></span>
                </div>
                <select class="form-control" id="dependencia" name="dependencia">
                  <option value="">Seleccione una dependencia</option>
                  <option value="1">Recursos Humanos</option>
                  <option value="2">Informática</option>
                  <option value="3">Contabilidad</option>
                </select>
              </div>
            </div>
          </div>

        </form>
      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="submit" form="formUsuario" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
      </div>

    </div>
  </div>
</div>
