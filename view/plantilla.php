<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INVENTARIO | NCPP</title>

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="view/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Preloader -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="view/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="view/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="view/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="view/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="view/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="view/plugins/summernote/summernote-bs4.min.css">
  
<!-- jQuery DEBE ir PRIMERO aquí -->
<script src="view/plugins/jquery/jquery.min.js"></script>

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- ./wrapper -->
<div class="wrapper">
<?php
include 'modulos/header.php';
include 'modulos/menu.php';

if(isset($_GET ["ruta"])){
  if($_GET["ruta"]=="users"){
    include "modulos/".$_GET["ruta"].".php";
  }
}else{
    include 'modulos/inicio/cajas.php';
}

include 'modulos/footer.php';
?>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="view/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- DataTables  & Plugins -->
<script src="view/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="view/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="view/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="view/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="view/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="view/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="view/plugins/jszip/jszip.min.js"></script>
<script src="view/plugins/pdfmake/pdfmake.min.js"></script>
<script src="view/plugins/pdfmake/vfs_fonts.js"></script>
<script src="view/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="view/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="view/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- ChartJS -->
<script src="view/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="view/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="view/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="view/plugins/moment/moment.min.js"></script>
<script src="view/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="view/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="view/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="view/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="view/dist/js/adminlte.js"></script>

</body>
</html>