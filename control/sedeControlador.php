<?php

class ControladorSede{

    static public function ctrListarSede(){

        $tabla="sede";
        $respuesta=ModeloSede::mdlListarSede($tabla);
        return $respuesta;
    }


}





?>