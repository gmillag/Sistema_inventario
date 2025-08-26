<?php

class Conexion{

    static public function conectar(){
        
        $link=new PDO('mysql:host=172.17.56.35;dbname=sis_inventario','g.infor','1nf0r.NCPP$');
        $link->exec("set names utf8");
        return $link;
    }

}

?>