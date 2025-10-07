<?php

require_once 'control/plantillaControlador.php';
require_once 'control/usuarioControlador.php';
require_once 'model/usuarioModelo.php';
require_once 'control/sedeControlador.php';
require_once 'model/sedeModelo.php';
require_once 'control/dependenciaControlador.php';
require_once 'model/dependenciaModelo.php';

$plantilla = new ControladorPlantilla();
$plantilla->Plantilla();

