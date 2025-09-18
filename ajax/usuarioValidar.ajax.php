<?php

// ==================== VALIDANDO DUPLICIDAD DE USUARIOS EN LA BD ====================

header('Content-Type: application/json; charset=utf-8');

require_once "../model/conexion.php";

try {
    // Obtengo la conexión 
    $conexion = Conexion::conectar();

    if (isset($_POST['usuario'])) {
        $usuario = trim($_POST['usuario']);

        // Consulta con PDO
        $stmt = $conexion->prepare("SELECT COUNT(*) FROM usuario WHERE usuario_id = :usuario");
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->execute();

        $existe = $stmt->fetchColumn();

        echo json_encode(["existe" => $existe > 0]);
        exit;
    } else {
        echo json_encode(["error" => "No se recibió el parámetro usuario"]);
        exit;
    }

} catch (PDOException $e) {
    echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
    exit;
}

