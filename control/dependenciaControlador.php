<?php

class ControladorDependencia{

    static public function ctrListarDependencia(){

        $tabla="dependencia";
        $respuesta=ModeloDependencia::mdlListarDependencia($tabla);
        return $respuesta;

    }

    // Metodo para recibir sede_id (para que en el FORM cuando se seleccione la sede
    //solo se cargue las dependencias correspondientes)

    static public function ctrListarDependenciaPorSede($sede_id){

        $tabla="dependencia";

        return ModeloDependencia::mdlListarDependenciaPorSede($tabla,$sede_id);
    }



}




?>