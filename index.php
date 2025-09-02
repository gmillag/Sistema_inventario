<?php

require_once 'control/plantillaControlador.php';
require_once 'control/usuarioControlador.php';
require_once 'model/usuarioModelo.php';
require_once 'control/cargo_usuarioControlador.php';
require_once 'model/cargo_usuarioModelo.php';
require_once 'control/sedeControlador.php';
require_once 'model/sedeModelo.php';

$plantilla = new ControladorPlantilla();
$plantilla->Plantilla();

