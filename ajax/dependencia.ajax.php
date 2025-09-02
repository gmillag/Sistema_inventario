<?php

require_once '../control/dependenciaControlador.php';
require_once '../model/dependenciaModelo.php';

if(isset($_POST["sede_id"])){

    $sede_id=intval($_POST["sede_id"]);
    $dependencias=ControladorDependencia::ctrListarDependenciaPorSede($sede_id);

    echo json_encode($dependencias);
    return;
}
 echo json_encode([]);



?>