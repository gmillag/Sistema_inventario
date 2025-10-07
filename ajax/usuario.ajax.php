<?php
// Configuración para JSON
error_reporting(0);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');

// Incluir archivos necesarios
require_once '../control/usuarioControlador.php';
require_once '../model/usuarioModelo.php';
require_once '../model/conexion.php';

class AjaxUsuarios {
    
    public $usuario_id;
    
    /**
     * Cargar datos de usuario para editar (llenar modal)
     */
    public function cargarUsuario() {
        $item = "usuario_id";
        $valor = $this->usuario_id;
        
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    /**
     * Validar si usuario existe
     */
    public static function validarUsuario($usuario) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("SELECT COUNT(*) FROM usuario WHERE usuario_id = :usuario");
            $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
            $stmt->execute();
            
            $existe = $stmt->fetchColumn();
            echo json_encode(["existe" => $existe > 0]);
            exit;
            
        } catch (PDOException $e) {
            echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
            exit;
        }
    }
}

// ==================== PROCESAR PETICIONES ====================

// Verificar que sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
    exit;
}

// Obtener la acción desde POST (SIEMPRE usar parámetro explícito)
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

// Debug: Ver qué estamos recibiendo
error_log("Acción recibida: " . $accion);
error_log("Datos POST: " . print_r($_POST, true));

// Procesar según la acción
switch ($accion) {
    case 'validar':
        if (isset($_POST['usuario'])) {
            AjaxUsuarios::validarUsuario($_POST['usuario']);
        } else {
            echo json_encode(["error" => "No se recibió el parámetro usuario"]);
        }
        break;
        
    case 'cargar':
        if (isset($_POST['usuario_id'])) {
            $ajax = new AjaxUsuarios();
            $ajax->usuario_id = $_POST['usuario_id'];
            $ajax->cargarUsuario();
        } else {
            echo json_encode(["error" => "No se recibió el ID del usuario"]);
        }
        break;
        
    case 'editar':
        // Llamar al controlador que maneja la edición completa
        ControladorUsuarios::ctrEditarUsuarios();
        break;
        
    case 'eliminar':
        // Llamar al controlador que maneja la desactivación
        ControladorUsuarios::ctrDesactivarUsuario();
        break;
        
    default:
        // Si no hay acción específica, determinar por contexto
        if (isset($_POST['usuario']) && !isset($_POST['usuario_id'])) {
            // Validación de usuario
            AjaxUsuarios::validarUsuario($_POST['usuario']);
        } elseif (isset($_POST['usuario_id']) && isset($_POST['nombre_usuario'])) {
            // Edición de usuario
            ControladorUsuarios::ctrEditarUsuarios();
        } elseif (isset($_POST['usuario_id']) && count($_POST) == 2 && isset($_POST['accion'])) {
            // Eliminación (solo usuario_id y accion)
            ControladorUsuarios::ctrDesactivarUsuario();
        } else {
            // Cargar datos de usuario
            $ajax = new AjaxUsuarios();
            $ajax->usuario_id = $_POST['usuario_id'];
            $ajax->cargarUsuario();
        }
        break;
}
?>