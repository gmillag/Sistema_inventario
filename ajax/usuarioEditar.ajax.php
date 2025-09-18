<?php

require_once '../control/usuarioControlador.php';
require_once '../model/usuarioModelo.php';

class AjaxUsuarios{

    public $idUsuario;

    public function AjaxEditarUsuarios(){

        $item="usuario_id";
        $valor=$this->idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

        echo json_encode($respuesta);


    }



}

if (isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar->idUsuario=$_POST['idUsuario'];
    $editar->AjaxEditarUsuarios();


}