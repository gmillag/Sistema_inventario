<?php
// Incluir archivos necesarios
require_once '../control/cpuControlador.php';
require_once '../model/cpuModelo.php';
require_once '../model/conexion.php';

// Configurar para JSON 
error_reporting(0);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');

class AjaxCpu{

    public $equipo_id; // Agregar propiedad

    /**
     * Cargar datos de CPU para editar (llenar modal)
     */
    public function cargarCPU(){
        if(isset($this->equipo_id)){
            $item = "equipo_id";
            $valor = $this->equipo_id;

            $respuesta = ControladorCpu::ctrMostrarCpu($item, $valor);
            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
}

// Procesar solicitudes AJAX
if(isset($_POST['accion']) && $_POST['accion'] == 'cargarCPU'){
    $ajaxCpu = new AjaxCpu();
    $ajaxCpu->equipo_id = $_POST['equipo_id'];
    $ajaxCpu->cargarCPU();
}