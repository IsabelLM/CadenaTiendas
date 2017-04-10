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

//            $hash = password_hash($contra, PASSWORD_BCRYPT);            
//            $sql = "INSERT INTO USUARIO VALUES('$usuario', '$hash')";

            $sql = "INSERT INTO USUARIO VALUES('$usuario', '$contra')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "Te has registrado correctamente. Regresa al inicio para logearte.";
            return true;
        }
    }

    public function comprobarInicioSesion($usuario, $contra) {
        include __DIR__ . '/../../core/conexionBd.php';
        $conn = (new ConexionBd())->getConexion();
        $sql = "SELECT * from usuario where usuario = '$usuario' and contrasenia = '$contra'";

        $cursor = $conn->prepare($sql);
        $cursor->execute();
        $rows = $cursor->fetch(PDO::FETCH_BOUND);

        //Si hay coincidencia entre los datos pasados por el usuario y la base de datos devolvemos true
        if ($rows === true) {
            return true;
        } else {
            return false;
        }

        //Si el hash me funcionara la comprobación se haría de esta manera
        /*
         * Se comprueba si hay coincidencias de usuario y contrasena
          if ($rows === true) {
          $rows = $cursor->fetch();
         * Esto comprueba la contraseña que ha pasado el usuario con la que hay guardada en la base
          if (password_verify($contra, $rows['contrasenia'])) {
          return true;
          } else {
          return false;
          }
          } */
    }

}
