<?php

class ControladorUsuarios
{
    /* ============================================================
       CREAR USUARIO
    ============================================================ */
    public static function ctrCrearUsuarios()
    {
        if (!isset($_POST['usuario_id'])) {
            return;
        }

        $tabla = "usuario";

        // Encriptamos la contraseña
        $encriptar = password_hash($_POST["clave_usuario"], PASSWORD_DEFAULT);

        $datos = array(
            'usuario_id'       => $_POST['usuario_id'],
            'nombre_usuario'   => $_POST['nombre_usuario'],
            'apellidop_usuario'=> $_POST['apellidop_usuario'],
            'apellidom_usuario'=> $_POST['apellidom_usuario'],
            'dni_usuario'      => $_POST['dni_usuario'],
            'clave_usuario'    => $encriptar,
            'email_usuario'    => $_POST['email_usuario'],
            'telf_usuario'     => $_POST['telf_usuario'],
            'cargo_id'         => $_POST['cargo_id'],
            'dependencia_id'   => $_POST['dependencia_id']
        );

        try {
            $respuesta = ModeloUsuarios::mdlGuardarUsuarios($tabla, $datos);

            if ($respuesta === "ok") {
                echo json_encode([
                    "status"  => "success",
                    "message" => "Usuario registrado correctamente"
                ]);
            } else {
                echo json_encode([
                    "status"  => "error",
                    "message" => "No se pudo registrar el usuario. Intente nuevamente."
                ]);
            }
        } catch (PDOException $e) {
            // Detectamos si es error de clave duplicada (MySQL usa el código 23000)
            if ($e->getCode() == 23000) {
                $msg = "El usuario o el DNI ya existen en la base de datos.";
            } else {
                $msg = "Error en la base de datos: " . $e->getMessage();
            }

            echo json_encode([
                "status"  => "error",
                "message" => $msg
            ]);
        }

        exit; // Para que no siga cargando toda la vista
    }

    /* ============================================================
       MOSTRAR UN USUARIO (por item)
    ============================================================ */
    public static function ctrMostrarUsuarios($item, $valor)
    {
        $tabla = "usuario";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    /* ============================================================
       MOSTRAR TODOS LOS USUARIOS CON JOINs
    ============================================================ */
    public static function ctrMostrarUsuariosConNombres()
    {
        $query = "
            SELECT 
                u.*,
                CONCAT(u.nombre_usuario,' ',u.apellidop_usuario,' ',u.apellidom_usuario) AS nombre_usuario,
                cu.nombre_cargo,
                d.nombre_dependencia,
                s.nombre_sede
            FROM usuario u
            JOIN cargo_usuario cu ON u.cargo_id = cu.cargo_id
            JOIN dependencia d ON u.dependencia_id = d.dependencia_id
            JOIN sede s ON d.sede_id = s.sede_id
            where u.estado_usuario =1
            ORDER BY nombre_usuario
        ";

        $stmt = Conexion::conectar()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /* ============================================================
       EDITAR USUARIO
    ============================================================ */
    public static function ctrEditarUsuarios()
    {
        if (!isset($_POST['usuario_id'])) {
            return;
        }

        $tabla = "usuario";

        // Encriptamos la contraseña
        $encriptar = password_hash($_POST["clave_usuario"], PASSWORD_DEFAULT);

        $datos = array(
            'usuario_id'       => $_POST['usuario_id'],
            'nombre_usuario'   => $_POST['nombre_usuario'],
            'apellidop_usuario'=> $_POST['apellidop_usuario'],
            'apellidom_usuario'=> $_POST['apellidom_usuario'],
            'dni_usuario'      => $_POST['dni_usuario'],
            'clave_usuario'    => $encriptar,
            'email_usuario'    => $_POST['email_usuario'],
            'telf_usuario'     => $_POST['telf_usuario'],
            'cargo_id'         => $_POST['cargo_id'],
            'dependencia_id'   => $_POST['dependencia_id']
        );

        try {
            $respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla, $datos);

            if ($respuesta === "ok") {
                echo json_encode([
                    "status"  => "success",
                    "message" => "Usuario actualizado"
                ]);
            } else {
                echo json_encode([
                    "status"  => "error",
                    "message" => "No se pudo actualizar el registro."
                ]);
            }
        } catch (PDOException $e) {
            // Detectamos si es error de clave duplicada (MySQL usa el código 23000)
            if ($e->getCode() == 23000) {
                $msg = "El usuario o el DNI ya existen en la base de datos.";
            } else {
                $msg = "Error en la base de datos: " . $e->getMessage();
            }

            echo json_encode([
                "status"  => "error",
                "message" => $msg
            ]);
        }

        exit; // Para que no siga cargando toda la vista
    }
















}

?>
