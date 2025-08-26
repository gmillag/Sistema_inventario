<?php

class ControladorUsuarios{

    //Mostrar usuarios
    static public function ctrMostrarUsuarios($item,$valor){

        $tabla="usuario";
        $respuesta=ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
        return $respuesta;

    }

}



?>