<?php
class ControladorCpu{

    static public function ctrMostrarCpu($item = null, $valor = null){ // Parámetros opcionales
        $tabla = "equipo";
        $respuesta = ModeloCpu::mdlMostrarCpu($tabla, $item, $valor);
        return $respuesta;
    }
}