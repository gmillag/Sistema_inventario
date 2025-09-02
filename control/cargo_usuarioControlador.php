<?php

class ControladorCargo_Usuario{

    static public function ctrListarCargoUsuario(){
        
        $tabla="cargo_usuario";
        $respuesta=ModeloCargo_usuario::mdlListarCargoUsuario($tabla);
        return $respuesta;

    }




}



?>