<?php

class ControladorSede{

    static public function ctrListarDependencia(){

        $tabla="dependencia";
        $respuesta=ModeloDependencia::ListarDependencia($tabla);
        return $respuesta;

    }



}




?>