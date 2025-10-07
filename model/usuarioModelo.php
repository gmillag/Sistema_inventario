<?php
require_once 'conexion.php';

class ModeloUsuarios{

    // Método que registra nuevos usuarios en la tabla USUARIO
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



    // Metodo que muestra todos los usuarios de la tabla USUARIO
    public static function mdlMostrarUsuarios($tabla, $item, $valor) {

        if ($item != null) {
            $sql = "SELECT u.*, d.sede_id 
                    FROM $tabla u
                    LEFT JOIN dependencia d ON u.dependencia_id = d.dependencia_id
                    WHERE u.$item = :$item";

            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT u.*, d.sede_id 
                    FROM $tabla u
                    LEFT JOIN dependencia d ON u.dependencia_id = d.dependencia_id";
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $stmt->closeCursor();
        $stmt = null;

        return $resultado;
    }

    // Metodo que carga los usuarios
    static public function mdlListarCargoUsuario($tabla){

        // Consulta SQL
        $sql ="SELECT cargo_id, nombre_cargo FROM $tabla ORDER BY nombre_cargo";

        // Asignar $stmt correctamente
        $stmt=Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }



    
       
   // Metodo que edita la información del usuario.
public static function mdlEditarUsuarios($tabla, $datos){

    try {
        $sql =  "UPDATE $tabla SET
                nombre_usuario = :nombre_usuario,
                apellidop_usuario = :apellidop_usuario,
                apellidom_usuario = :apellidom_usuario,
                dni_usuario = :dni_usuario,
                clave_usuario = :clave_usuario,
                email_usuario = :email_usuario,
                telf_usuario = :telf_usuario,
                cargo_id = :cargo_id,
                dependencia_id = :dependencia_id
                WHERE usuario_id = :usuario_id";  

        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(":usuario_id", $datos["usuario_id"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_usuario", $datos["nombre_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidop_usuario", $datos["apellidop_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidom_usuario", $datos["apellidom_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":dni_usuario", $datos["dni_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":clave_usuario", $datos["clave_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":email_usuario", $datos["email_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":telf_usuario", $datos["telf_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo_id", $datos["cargo_id"], PDO::PARAM_INT);
        $stmt->bindParam(":dependencia_id", $datos["dependencia_id"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        } else {
            // Mostrar el error exacto de MySQL
            $error = $stmt->errorInfo();
            return "Error SQL: " . $error[2];
        }

    } catch (PDOException $e) {
        return "Excepción: " . $e->getMessage();
    } finally {
        $stmt = null; // Cerrar statement
    }
}


    /// Método para desactivar usuario (borrado lógico)
static public function mdlDesactivarUsuario($tabla, $usuario_id){
    
    try {
        $sql = "UPDATE $tabla SET estado_usuario = 0 WHERE usuario_id = :usuario_id";
        
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_STR);
        
        if($stmt->execute()){
            return "ok";
        } else {
            $error = $stmt->errorInfo();
            return "Error: " . $error[2];
        }
        
    } catch (PDOException $e) {
        return "Excepción: " . $e->getMessage();
    } finally {
        $stmt = null;
    }
}






}


