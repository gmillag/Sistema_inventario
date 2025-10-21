<?php
require_once 'conexion.php';

class ModeloCpu{

    static public function mdlMostrarCpu($tabla, $item, $valor){

        if($item != null){
            // Consulta cuando hay filtro
            $sql = "SELECT  e.equipo_id,
                            e.hostname,
                            de.descripcion_nombre,
                            m.nombre_modelo,
                            e.patrimonio_equipo,
                            e.serie_equipo,
                            e.lic_windows,
                            e.lic_office,
                            e.fecha_adquisicion,
                            ee.nombre_estado,
                            e.usuario_id,
                            dep.nombre_dependencia,
                            s.nombre_sede,
                            e.nombre_ordencomp,
                            e.equipo_ip
                    FROM equipo e		
                    INNER JOIN descripcion_equipo de ON e.descripcion_id = de.descripcion_id
                    INNER JOIN modelo m ON e.modelo_id = m.modelo_id
                    INNER JOIN estado_equipo ee ON e.estadoeq_id = ee.estadoeq_id
                    INNER JOIN dependencia dep ON e.dependencia_id = dep.dependencia_id
                    INNER JOIN sede s ON dep.sede_id=s.sede_id
                    WHERE e.$item = :$item AND e.descripcion_id=1";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
        } else {
            // Consulta cuando NO hay filtro (todos los registros)
            $sql = "SELECT  e.equipo_id,
                            e.hostname,
                            de.descripcion_nombre,
                            m.nombre_modelo,
                            e.patrimonio_equipo,
                            e.serie_equipo,
                            e.lic_windows,
                            e.lic_office,
                            e.fecha_adquisicion,
                            ee.nombre_estado,
                            e.usuario_id,
                            dep.nombre_dependencia,
                            s.nombre_sede,
                            e.nombre_ordencomp,
                            e.equipo_ip
                    FROM equipo e		
                    INNER JOIN descripcion_equipo de ON e.descripcion_id = de.descripcion_id
                    INNER JOIN modelo m ON e.modelo_id = m.modelo_id
                    INNER JOIN estado_equipo ee ON e.estadoeq_id = ee.estadoeq_id
                    INNER JOIN dependencia dep ON e.dependencia_id = dep.dependencia_id
                    INNER JOIN sede s ON dep.sede_id=s.sede_id
                    WHERE e.descripcion_id=1";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC); // Cambiado a fetchAll
        }

        $stmt->closeCursor();
        $stmt = null;
        
        return $resultado;
    }
}