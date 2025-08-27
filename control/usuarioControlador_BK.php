<?php

class ControladorUsuarios{

    //Mostrar usuarios
    static public function ctrMostrarUsuarios($item,$valor){

        $tabla="usuario";
        $respuesta=ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;

    }

    //Mostrar cargo y dependencia

    static public function ctrCargoDependenciaUs(){
        $query ="
            select
            cu.nombre_cargo,
            d.nombre_dependencia
            s.nombre_sede
            from usuario u
            join cargo_usuario cu on u.cargo_id =cu.cargo_id
            join dependencia d on u.dependencia_id =d.dependencia_id
            join sede s on u.sede_id = s.sede_id
        ";

        $stmt=Conexion::conectar()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }

}



?>