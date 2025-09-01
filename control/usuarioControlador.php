<?php

class ControladorUsuarios{

static public function ctrCrearUsuarios(){
    if (isset($_POST['usuario_id'])){
        
        $tabla = "usuario";  // ← Variable asignada
        
        $encriptar = password_hash($_POST["clave_usuario"], PASSWORD_DEFAULT);

        $datos = array(
            'usuario_id' => $_POST['usuario_id'],
            'nombre_usuario' => $_POST['nombre_usuario'],
            'apellidop_usuario' => $_POST['apellidop_usuario'],
            'apellidom_usuario' => $_POST['apellidom_usuario'],
            'dni_usuario' => $_POST['dni_usuario'],
            'clave_usuario' => $encriptar,
            'email_usuario' => $_POST['email_usuario'],
            'telf_usuario' => $_POST['telf_usuario'],
            'cargo_id' => $_POST['cargo_id'],
            'dependencia_id' => $_POST['dependencia_id']
        );

        $respuesta = ModeloUsuarios::mdlGuardarUsuarios($tabla, $datos);

        if($respuesta == "ok"){
            echo "Usuario registrado";
        } else {
            echo "ERROR: Usuario no registrado";
        }
    }
}

    // Método original (para compat ibilidad)
    static public function ctrMostrarUsuarios($item, $valor){
        $tabla = "usuario";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    // Método NUEVO con JOINs para la vista
    static public function ctrMostrarUsuariosConNombres(){
        $query = "
            SELECT 
                u.*,
                concat(u.nombre_usuario,' ',u.apellidop_usuario,' ',u.apellidom_usuario) as nombre_usuario,
                cu.nombre_cargo,
                d.nombre_dependencia,
                s.nombre_sede
                FROM usuario u
                JOIN cargo_usuario cu ON u.cargo_id = cu.cargo_id
                JOIN dependencia d ON u.dependencia_id = d.dependencia_id
                JOIN sede s ON d.sede_id=s.sede_id
                ORDER BY nombre_usuario                        
        ";
        
        $stmt = Conexion::conectar()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>