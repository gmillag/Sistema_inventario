
<div class="wrapper">
  <!-- Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión de CPU</h1>
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

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCPU">
          Agregar CPU
        </button>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped tablas">
                  <thead>
                  <tr> 
                    <th>Nº</th>
                    <th>DESCRIPCION</th>
                    <th>MODELO</th>
                    <th>HOSTNAME</th>
                    <th>PATRIMONIO</th>
                    <th>SERIE</th>
                    <th>IP</th>
                    <th>USUARIO</th>
                    <th>DEPENDENCIA</th>
                    <th>SEDE</th>
                    <th>ACCIONES</th>
                    </tr>
                  </thead>
                                  
<!-- En la sección del table body -->
<tbody>
    <?php
    $item = null;
    $valor = null;
    
    $cpu = ControladorCpu::ctrMostrarCpu();
    $sedeCSJCN=ControladorSede::ctrListarSede(); 

    if(!empty($cpu)){
        foreach($cpu as $key => $valores){
            echo "
            <tr>
                <td>".($key+1)."</td>
                <td>".$valores['descripcion_nombre']."</td>
                <td>".$valores['nombre_modelo']."</td>
                <td>".$valores['hostname']."</td>
                <td>".$valores['patrimonio_equipo']."</td>
                <td>".$valores['serie_equipo']."</td>
                <td>".$valores['equipo_ip']."</td>
                <td>".$valores['usuario_id']."</td>
                <td>".$valores['nombre_dependencia']."</td>
                <td>".$valores['nombre_sede']."</td>  
                <td>
                    <button class='btn btn-primary btnEditarCpu' 
                            equipo_id='".$valores['equipo_id']."' 
                            data-toggle='modal' data-target='#equipoModal'>
                        Editar
                    </button>

                    <button class='btn btn-danger btnEliminarCpu' 
                            data-equipo_id='".$valores['equipo_id']."' 
                            data-hostname='".$valores['hostname']."'>
                        Baja
                    </button>
                </td>
            </tr>
            ";
        }
    } else {
        echo "<tr><td colspan='8' class='text-center'>No hay CPUs registrados</td></tr>";
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



<!-- ==================== MODAL REGISTRAR CPU ====================-->
<div class="modal fade" id="modalAgregarCPU" tabindex="-1" aria-labelledby="modalAgregarCPULabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Formulario -->
      <form id="formAgregarCPU" method="POST">

        <!-- Encabezado -->
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalAgregarCPULabel"><i class="fas fa-microchip"></i> Registrar CPU</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
        </div>

        <!-- Cuerpo -->
        <div class="modal-body">

          <!-- Primera fila -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="hostname" class="form-label fw-bold">Hostname</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                <input type="text" class="form-control" id="hostname" name="hostname" placeholder="Ingrese hostname">
              </div>
            </div>
            <div class="col-md-6">
              <label for="descripcion" class="form-label fw-bold">Marca</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Seleccione Marca">
              </div>
            </div>
          </div>

          <!-- Segunda fila -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="modelo" class="form-label fw-bold">Modelo</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ej: Dell OptiPlex 7080">
              </div>
            </div>
            <div class="col-md-6">
              <label for="codPatrimonial" class="form-label fw-bold">Código Patrimonial</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                <input type="text" class="form-control" id="codPatrimonial" name="codPatrimonial" placeholder="Ej: PAT-2023-0456">
              </div>
            </div>
          </div>

          <!-- Tercera fila -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="serie" class="form-label fw-bold">Serie</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                <input type="text" class="form-control" id="serie" name="serie" placeholder="Ingrese número de serie">
              </div>
            </div>
            <div class="col-md-6">
              <label for="licWindows" class="form-label fw-bold">Licencia Windows</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fab fa-windows"></i></span>
                <input type="text" class="form-control" id="licWindows" name="licWindows" placeholder="Ej: W10PRO-2023">
              </div>
            </div>
          </div>

          <!-- Cuarta fila -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="licOffice" class="form-label fw-bold">Licencia Office</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-file-word"></i></span>
                <input type="text" class="form-control" id="licOffice" name="licOffice" placeholder="Ej: O365-BUSINESS">
              </div>
            </div>
            <div class="col-md-6">
              <label for="fechaAdquisicion" class="form-label fw-bold">Fecha de Adquisición</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                <input type="date" class="form-control" id="fechaAdquisicion" name="fechaAdquisicion">
              </div>
            </div>
          </div>

          <!-- Quinta fila -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="ordenCompra" class="form-label fw-bold">Orden de Compra</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                <input type="text" class="form-control" id="ordenCompra" name="ordenCompra" placeholder="Ej: OC-2023-789">
              </div>
            </div>
            <div class="col-md-6">
              <label for="ordenCompra" class="form-label fw-bold">Dirección IP</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
                <input type="text" class="form-control" id="ordenCompra" name="ordenCompra" placeholder="Ej: 172.17.59.209">
              </div>
            </div>
          </div>

          <!-- Sexta fila -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="usuarioAsignado" class="form-label fw-bold">Usuario Asignado</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                <input type="text" class="form-control" id="usuarioAsignado" name="usuarioAsignado" placeholder="Ej: Juan Pérez">
              </div>
            </div>
            <div class="col-md-6">
              <label for="sede" class="form-label fw-bold">Sede</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                <select class="form-control" id="sede" name="sede">
                  <option value="">Seleccione sede</option>
                  <?php foreach($sedeCSJCN as $sede): ?>
                    <option value="<?= $sede['sede_id'];?>"><?= $sede['nombre_sede'];?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <!-- Séptima fila -->
          <div class="row mb-3">
            <div class="col-md-12">
              <label for="dependencia" class="form-label fw-bold">Dependencia</label>
              <div class="input-group">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
                <select class="form-control" id="dependencia" name="dependencia">
                  <option value="">Seleccione dependencia</option>
                  <?php foreach($dependencias as $dep): ?>
                    <option value="<?= $dep['dependencia_id'];?>"><?= $dep['nombre_dependencia'];?></option>
                  <?php endforeach; ?>
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
    </div>
  </div>
</div>
