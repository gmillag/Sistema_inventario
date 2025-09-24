<?php
require_once '../control/usuarioControlador.php';
require_once '../model/usuarioModelo.php';

class AjaxUsuarios {

    public $usuario_id;

    // ==========================
    // CARGAR DATOS (llenar modal)
    // ==========================
    public function AjaxEditarUsuarios() {
        $item = "usuario_id";
        $valor = $this->usuario_id;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        // Asegurarse de que siempre sea JSON válido
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

// ==========================
// SI SE RECIBE usuario_id -> cargar datos
// ==========================
if (isset($_POST["usuario_id"]) && !isset($_POST["nombre_usuario"])) {
    $editar = new AjaxUsuarios();
    $editar->usuario_id = $_POST['usuario_id'];
    $editar->AjaxEditarUsuarios();
}

// ==========================
// SI SE RECIBE FORMULARIO COMPLETO -> actualizar usuario
// ==========================
if (isset($_POST["usuario_id"]) && isset($_POST["nombre_usuario"])) {

    // Llamar al controlador que maneja la edición
    ControladorUsuarios::ctrEditarUsuarios();
    // 🚨 No se necesita otro echo, el controlador devuelve JSON y hace exit
}
