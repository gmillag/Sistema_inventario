<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

</head>
<body class="hold-transition sidebar-mini">
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
                <h3 class="card-title">DataTable with default features</h3>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
