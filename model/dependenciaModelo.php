<?php

require_once 'conexion.php';

class ModeloDependencia{

    static public function mdlListarDependencia($tabla){

        //Consulta SQL

        $sql = "SELECT  dependencia_id,nombre_dependencia,sede_id
                        FROM $tabla
                        ORDER BY nombre_dependencia";

        //Asignar stmt
        $stmt=Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // Metodo para filtrar dependencias por SEDE

    static public function mdlListarDependenciaPorSede($tabla,$sede_id){

        $sql="SELECT    dependencia_id, nombre_dependencia
                        FROM $tabla
                        WHERE sede_id=:sede_id
                        ORDER BY nombre_dependencia";
        
        //Asigna stmt
        $stmt=Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":sede_id",$sede_id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }








}

