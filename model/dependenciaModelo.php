<?php

require_once 'conexion.php';

class ModeloDependencia{

    static public function ListarDependencia($tabla){

        //Consulta SQL

        $sql = "SELECT dependencia_id,nombre_dependencia,sede_id  from $tabla ORDER BY nombre_dependencia";

        //Asignar stmt
        $stmt=Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt=fetchAll(PDO::FETCH_ASSOC);

    }

}

?>