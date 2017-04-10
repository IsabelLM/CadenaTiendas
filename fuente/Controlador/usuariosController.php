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
        if ($params == false) {
            echo "<b>Los datos introducidos son incorrectos.</b>";
        } else {
            $_SESSION['usuario'] = ($_POST['usuario']);
            $_SESSION['usuarioLoggeado'] = true;
        }
        require __DIR__ . '/../../app/plantillas/usuariosSesion.php';
    }

    public function cerrarSesion() {
        $_SESSION['usuarioLoggeado'] = null;
        session_destroy();
        require __DIR__ . '/../../app/plantillas/usuariosSesion.php';
    }

}
