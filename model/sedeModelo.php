<?php

require_once 'conexion.php';

class ModeloSede{

    static public function mdlListarSede($tabla){

        // Consulta SQL

        $sql="SELECT sede_id,nombre_sede,direccion_sede FROM $tabla ORDER BY nombre_sede";

        // Asignar $stmt correctamente:

        $stmt=Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }




}


?>