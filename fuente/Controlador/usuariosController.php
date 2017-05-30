<?php

class usuariosController {

    public function nuevoRegistro() {

        require __DIR__ . '/../../app/plantillas/nuevoRegistro.php';
        if (isset($_POST['usuario']) && isset($_POST['contra'])) {
            require __DIR__ . '/../Repositorio/usuarioRepositorio.php';
            $params = (new UsuarioRepositorio)->crearUsuarioNuevo($_POST['usuario'], $_POST['contra']);
        }
    }

    //Se comprueba si los datos son correctos, en caso de ser erroneos se lanza un aviso.
    public function inicioSesion() {
        if (isset($_POST['usuario']) && isset($_POST['contra'])) {
            require __DIR__ . '/../Repositorio/usuarioRepositorio.php';
            $params = (new UsuarioRepositorio)->comprobarInicioSesion($_POST['usuario'], $_POST['contra']);
        }
        if ($params == null) {
            echo "<b>Los datos introducidos son incorrectos.</b>";
        } else {
            $_SESSION['usuario'] = ($_POST['usuario']);
            $_SESSION['usuarioLoggeado'] = true;
            $_SESSION['grupo'] = $params;
        }
        require __DIR__ . '/../../app/plantillas/usuariosSesion.php';
    }

    public function cerrarSesion() {
        $_SESSION['usuarioLoggeado'] = null;
        $_SESSION['grupo'] = null;

        session_destroy();

        require __DIR__ . '/../../app/plantillas/usuariosSesion.php';
    }

    public function editarPerfil() {
        //Rellena el formulario con los datos del usuario que tiene, falta permitir que pueda editarlos y se actualice su perfil
        $usuario = $_SESSION['usuario'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = ["nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellidos'],
                "direccion" => $_POST['direccion'],
                "cp" => $_POST['cp'],
                "ciudad" => $_POST['ciudad']];
            print_r($datos);
            echo "<br>".$datos['nombre']. "<br>";
            require __DIR__ . '/../Repositorio/usuarioRepositorio.php';
            $params = (new UsuarioRepositorio)->actualizarDatos(array($datos));
        }
        require __DIR__ . '/../Repositorio/usuarioRepositorio.php';
        $params = (new UsuarioRepositorio)->datosUsuario($usuario);
        require __DIR__ . '/../../app/plantillas/editarPerfil.php';
    }

}
