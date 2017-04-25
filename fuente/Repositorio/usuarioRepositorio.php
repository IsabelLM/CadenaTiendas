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

    public function crearUsuarioNuevo($usuario, $contra) {
        include __DIR__ . '/../../core/conexionBd.php';
        $conn = (new ConexionBd())->getConexion();

        if ($this->comprobarUsuarioExiste($usuario, $conn) === true) {
            echo "<br>El usuario <b>" . $usuario . " </b>ya existe";
        } else {

            $hash = password_hash($contra, PASSWORD_BCRYPT);
            $sql = "INSERT INTO USUARIO (usuario, contrasenia) VALUES('$usuario', '$hash')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            echo "Te has registrado correctamente. Regresa al inicio para logearte.";
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

        //Si hay coincidencia entre los datos pasados por el usuario y la base de datos devolvemos true
//        if ($rows === true) {
//            return true;
//        } else {
//            return false;
//        }
    }

}
