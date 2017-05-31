<?php

class UsuarioRepositorio {

    //Esta funcion comprueba si el nombre de usuario que se va a registrar ya existe
    public function comprobarUsuarioExiste($usuario, $conn) {
        $sql = "SELECT * FROM usuario where usuario = '$usuario'";
        $cursor = $conn->prepare($sql);
        $cursor->execute();
        $rows = $cursor->fetch(PDO::FETCH_BOUND);
        return $rows;
    }

    public function crearUsuarioNuevo($datos) {
        include __DIR__ . '/../../core/conexionBd.php';
        $conn = (new ConexionBd())->getConexion();

        if ($this->comprobarUsuarioExiste($datos['usuario'], $conn) === true) {
            echo "<br>El usuario <b>" . $datos['usuario'] . " </b>ya existe";
        } else {

            $hash = password_hash($datos['contra'], PASSWORD_BCRYPT);
            $sql = "INSERT INTO USUARIO (usuario, contrasenia, nombre, apellido, direccion, cp, ciudad) VALUES(?, '$hash', ? , ? , ? , ? ,? )";


            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $datos['usuario']);
            $stmt->bindParam(2, $datos['nombre']);
            $stmt->bindParam(3, $datos['apellido']);
            $stmt->bindParam(4, $datos['direccion']);
            $stmt->bindParam(5, $datos['cp']);
            $stmt->bindParam(6, $datos['ciudad']);

            $stmt->execute();

           
            return true;
        }
    }

    public function comprobarInicioSesion($usuario, $contra) {
        include __DIR__ . '/../../core/conexionBd.php';

        $conn = (new ConexionBd())->getConexion();
        $sql = "SELECT * from usuario where usuario = '$usuario'";
        $cursor = $conn->prepare($sql);
        $cursor->execute();

        if ($fila = $cursor->fetch()) {
            if (password_verify($contra, $fila['contrasenia'])) {
                $grupo = $fila['grupo'];
                return $grupo;
            } else {
                return null;
            }
        }
    }

    //Devuelve la información del usuario
    public function datosUsuario($usuario, $con) {
        // include __DIR__ . '/../../core/conexionBd.php';
        $sql = "SELECT * from usuario where usuario = '$usuario'";
        //$con = (new ConexionBd())->getConexion();
        $cursor = $con->prepare($sql);
        $cursor->execute();

        if ($fila = $cursor->fetch()) {
            $datos = array("nombre" => $fila['nombre'], "apellido" => $fila['apellido'], "direccion" => $fila['direccion'],
                "cp" => $fila["cp"], "ciudad" => $fila["ciudad"]);
        }

        return $datos;
    }

    public function actualizarDatos($datos, $usuario, $con) {
//        include __DIR__ . '/../../core/conexionBd.php';

        $datos2 = $datos[0];

        $sql = "UPDATE usuario SET nombre = ? , apellido = ? , direccion = ? , cp = ? , ciudad = ? WHERE usuario = '$usuario'";
        //$con = (new ConexionBd())->getConexion();
        $cursor = $con->prepare($sql);
        $cursor->bindParam(1, $datos2['nombre']);
        $cursor->bindParam(2, $datos2['apellido']);
        $cursor->bindParam(3, $datos2['direccion']);
        $cursor->bindParam(4, $datos2['cp']);
        $cursor->bindParam(5, $datos2['ciudad']);

        $cursor->execute();
    }

}
