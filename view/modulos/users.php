
<div class="wrapper">
  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión de Usuarios</h1>
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
                    <th>ACCIONES</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                  <?php
                    $item=null;
                    $valor=null;

                    $usuarios =ControladorUsuarios::ctrMostrarUsuariosConNombres();
                    $cargoUsuario=ControladorCargo_Usuario::ctrListarCargoUsuario();
                    $sedeCSJCN=ControladorSede::ctrListarSede();
                    $dependenciaCSJCN=ControladorDependencia::ctrListarDependencia();

                    foreach($usuarios as $key=>$valores){
                      echo "
                      <tr>

                      <td>".($key+1)."</td>
                      <td>".$valores["nombre_usuario"]."</td>
                      <td>".$valores["usuario_id"]."</td>
                      <td>".$valores["dni_usuario"]."</td>
                      <td>".$valores["nombre_cargo"]."</td>
                      <td>".$valores["nombre_dependencia"]."</td>
                      <td>".$valores["nombre_sede"]."</td>
                      <td>
                      <button class='btn btn-primary btnEditarUsuario' usuario_id=".$valores["usuario_id"]."
                      data-toggle='modal' data-target='#modalEditarUsuario'>Editar</button>

                      <button class='btn btn-danger'>Eliminar</button>
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



<!-- ==================== MODAL CREAR USUARIO ====================-->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <!-- Formulario -->
      <form id="formUsuario" method="POST" action="">
        
        <!-- Encabezado -->
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalUsuarioLabel"><i class="fas fa-user"></i> Registrar Usuario</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- Cuerpo -->
        <div class="modal-body">
          
          <!-- Primera fila -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="usuario">Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                <input type="text" class="form-control" id="usuario" name="usuario_id" placeholder="Ingrese usuario">
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="password">Contraseña</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
                <input type="password" class="form-control" id="password" name="clave_usuario" placeholder="Ingrese contraseña">
              </div>
            </div>
          </div>

          <!-- Segunda fila -->
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="dni">DNI</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-id-card"></i></span></div>
                <input type="text" class="form-control" id="dni" name="dni_usuario" maxlength="8" placeholder="Ingrese DNI">
              </div>
            </div>

            <div class="form-group col-md-8">
              <label for="nombre">Nombres</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-tag"></i></span></div>
                <input type="text" class="form-control" id="nombre" name="nombre_usuario" placeholder="Ingrese nombres">
              </div>
            </div>
          </div>

          <!-- Apellidos -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="apellidoPaterno">Apellido Paterno</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                <input type="text" class="form-control" id="apellidoPaterno" name="apellidop_usuario" placeholder="Ingrese apellido paterno">
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="apellidoMaterno">Apellido Materno</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                <input type="text" class="form-control" id="apellidoMaterno" name="apellidom_usuario" placeholder="Ingrese apellido materno">
              </div>
            </div>
          </div>

          <!-- Correo y Teléfono -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Correo electrónico</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                <input type="email" class="form-control" id="email" name="email_usuario" placeholder="ejemplo@correo.com">
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="telefono">Teléfono</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                <input type="text" class="form-control" id="telefono" maxlength="9" name="telf_usuario" placeholder="Ingrese teléfono">
              </div>
            </div>
          </div>

          <!-- Cargo y Sede -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cargo">Cargo</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-briefcase"></i></span></div>
                <select class="form-control" id="cargo_id" name="cargo_id">
                  <option value="">Seleccione un cargo</option>
                  <?php foreach($cargoUsuario as $cargo): ?>
                    <option value="<?= $cargo['cargo_id'];?>"><?= $cargo['nombre_cargo'];?></option>
                  <?php endforeach; ?>        
                </select>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="sede">Sede</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                <select class="form-control" id="sede_id" name="nombre_sede">
                  <option value="">Seleccione una sede</option>
                  <?php foreach($sedeCSJCN as $sede): ?>
                    <option value="<?= $sede['sede_id'];?>"><?= $sede['nombre_sede'];?></option>
                  <?php endforeach; ?>        
                </select>
              </div>
            </div>
          </div>

          <!-- Dependencia -->
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="dependencia">Dependencia</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                <select class="form-control" id="dependencia_id" name="dependencia_id">
                  <option value="">Seleccione una dependencia</option>
 
                </select>
              </div>
            </div>
          </div>

        </div> <!-- /modal-body -->

        <!-- Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar
          </button>
        </div>

      </form>

      <?php
      $crearUsuarios = new ControladorUsuarios();
      $crearUsuarios->ctrCrearUsuarios();
      ?>

    </div>
  </div>
</div>



<!-- ==================== MODAL EDITAR USUARIO ====================-->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <!-- Formulario -->
      <form id="formUsuarioEditar" method="POST" action="">
        
        <!-- Encabezado -->
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalUsuarioLabel"><i class="fas fa-user"></i> Editar Usuario</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- Cuerpo -->
        <div class="modal-body">
          
          <!-- Primera fila -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="usuario">Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                <input type="text" class="form-control" id="usuarioEditar" name="usuario_id">
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="password">Contraseña</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
                <input type="" class="form-control" id="passwordEditar" name="clave_usuario">
              </div>
            </div>
          </div>

          <!-- Segunda fila -->
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="dni">DNI</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-id-card"></i></span></div>
                <input type="text" class="form-control" id="dniEditar" name="dni_usuario" maxlength="8">
              </div>
            </div>

            <div class="form-group col-md-8">
              <label for="nombre">Nombres</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-tag"></i></span></div>
                <input type="text" class="form-control" id="nombreEditar" name="nombre_usuario">
              </div>
            </div>
          </div>

          <!-- Apellidos -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="apellidoPaterno">Apellido Paterno</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                <input type="text" class="form-control" id="apellidoPaternoEditar" name="apellidop_usuario">
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="apellidoMaterno">Apellido Materno</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                <input type="text" class="form-control" id="apellidoMaternoEditar" name="apellidom_usuario">
              </div>
            </div>
          </div>

          <!-- Correo y Teléfono -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Correo electrónico</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                <input type="email" class="form-control" id="emailEditar" name="email_usuario">
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="telefono">Teléfono</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                <input type="text" class="form-control" id="telefonoEditar" maxlength="9" name="telf_usuario">
              </div>
            </div>
          </div>

          <!-- Cargo y Sede -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cargo">Cargo</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-briefcase"></i></span></div>
                <select class="form-control" id="cargo_idEditar" name="cargo_id">
                  <option value="">Seleccione un cargo</option>
                  <?php foreach($cargoUsuario as $cargo): ?>
                    <option value="<?= $cargo['cargo_id'];?>"><?= $cargo['nombre_cargo'];?></option>
                  <?php endforeach; ?>        
                </select>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="sede">Sede</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                <select class="form-control" id="sede_idEditar" name="sede_id">
                  <option value="">Seleccione una sede</option>
                  <?php foreach($sedeCSJCN as $sede): ?>
                    <option value="<?= $sede['sede_id'];?>"><?= $sede['nombre_sede'];?></option>
                  <?php endforeach; ?>        
                </select>
              </div>
            </div>
          </div>

          <!-- Dependencia -->
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="dependencia">Dependencia</label>
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                <select class="form-control" id="dependencia_idEditar" name="dependencia_id">
                  <option value="">Seleccione una dependencia</option>
 
                </select>
              </div>
            </div>
          </div>

        </div> <!-- /modal-body -->

        <!-- Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Cerrar
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Actualizar
          </button>
        </div>

      </form>
    </div>
  </div>
</div>
