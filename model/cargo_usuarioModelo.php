<?php
require_once 'conexion.php';

class ModeloCargo_usuario{

    static public function mdlListarCargoUsuario($tabla){

        // Consulta SQL
        $sql ="SELECT cargo_id, nombre_cargo FROM $tabla ORDER BY nombre_cargo";

        // Asignar $stmt correctamente
        $stmt=Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}




?>