<?php

class ControladorUsuarios{

    // Método original (para compatibilidad)
    static public function ctrMostrarUsuarios($item, $valor){
        $tabla = "usuario";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    // Método NUEVO con JOINs para la vista
    static public function ctrMostrarUsuariosConNombres(){
        $query = "
            SELECT 
                u.*,
                concat(u.nombre_usuario,' ',u.apellidop_usuario,' ',u.apellidom_usuario) as nombre_usuario,
                cu.nombre_cargo,
                d.nombre_dependencia,
                s.nombre_sede
                FROM usuario u
                JOIN cargo_usuario cu ON u.cargo_id = cu.cargo_id
                JOIN dependencia d ON u.dependencia_id = d.dependencia_id
                JOIN sede s ON d.sede_id=s.sede_id
                ORDER BY nombre_usuario                        
        ";
        
        $stmt = Conexion::conectar()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>