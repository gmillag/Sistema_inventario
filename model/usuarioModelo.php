<?php
require_once 'conexion.php';

class ModeloUsuarios{

    static public function mdlGuardarUsuarios($tabla, $datos){

        // conexion
        $sql = "INSERT INTO $tabla(
                    usuario_id, nombre_usuario, apellidop_usuario, apellidom_usuario,
                    dni_usuario, clave_usuario, email_usuario, telf_usuario, cargo_id,
                    dependencia_id
                ) VALUES (
                    :usuario_id, :nombre_usuario, :apellidop_usuario, :apellidom_usuario,
                    :dni_usuario, :clave_usuario, :email_usuario, :telf_usuario, :cargo_id,
                    :dependencia_id
                )";

        // Asignar $stmt correctamente
        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":usuario_id", $datos["usuario_id"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_usuario", $datos["nombre_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidop_usuario", $datos["apellidop_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidom_usuario", $datos["apellidom_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":dni_usuario", $datos["dni_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":clave_usuario", $datos["clave_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":email_usuario", $datos["email_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":telf_usuario", $datos["telf_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo_id", $datos["cargo_id"], PDO::PARAM_STR);
        $stmt->bindParam(":dependencia_id", $datos["dependencia_id"], PDO::PARAM_STR);

        if($stmt->execute()){
            $return = "ok";

            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Usuario registrado!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location = '?ruta=users';
                });
            </script>";



        } else {
            // Obtener error específico
            $return = "error";

            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error al registrar usuario',
                    text: 'Revise los datos e intente nuevamente'
                }).then(function() {
                    window.location = '?ruta=users';
                });
            </script>";
        }

        // CERRAR CORRECTAMENTE
        $stmt->close();
        $stmt = null;

    }

    public static function mdlMostrarUsuarios($tabla, $item, $valor){
        
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }
}
?>