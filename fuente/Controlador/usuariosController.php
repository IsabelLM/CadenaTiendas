<?php

class usuariosController {

    public function nuevoRegistro() {

        require __DIR__ . '/../../app/plantillas/nuevoRegistro.php';
        if (isset($_POST['usuario']) && isset($_POST['contra'])) {

            $usuario = $_POST['usuario'];
            $contra = $_POST['contra'];
            $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
            $apellido = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
            $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
            $cp = (isset($_POST['cp'])) ? $_POST['cp'] : null;
            $ciudad = (isset($_POST['ciudad'])) ? $_POST['ciudad'] : null;

            $datos = ["usuario" => $usuario,
                "contra" => $contra,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "direccion" => $direccion,
                "cp" => $cp,
                "ciudad" => $ciudad];

            require __DIR__ . '/../Repositorio/usuarioRepositorio.php';
            $params = (new UsuarioRepositorio)->crearUsuarioNuevo($datos);
        }
    }

    //Se comprueba si los datos son correctos, en caso de ser erroneos se lanza un aviso.
    public function inicioSesion() {
        if (isset($_POST['usuario']) && isset($_POST['contra'])) {
            require __DIR__ . '/../Repositorio/usuarioRepositorio.php';
            $params = (new UsuarioRepositorio)->comprobarInicioSesion($_POST['usuario'], $_POST['contra']);
        }
        if ($params == null) {
            //Si los datos introducidos son erroneos (Usuario/contraseña mal escrito, se lanza un mensaje avisando
            $_SESSION['error'] = true;
        } else {
            //Si los datos coinciden se inicia sesión correctamente
            $_SESSION['usuario'] = ($_POST['usuario']);
            $_SESSION['usuarioLoggeado'] = true;
            $_SESSION['grupo'] = $params;
        }
        require __DIR__ . '/../../app/plantillas/usuariosSesion.php';
    }

    public function cerrarSesion() {
        $_SESSION['usuarioLoggeado'] = null;
        $_SESSION['grupo'] = null;
        $_SESSION['usuario'] = null;
        $_SESSION['error'] = null;
        session_destroy();

        require __DIR__ . '/../../app/plantillas/usuariosSesion.php';
    }

    public function editarPerfil() {
        //Rellena el formulario con los datos del usuario que tiene y si se modifica se actualiza
        $usuario = $_SESSION['usuario'];
        require_once __DIR__ . '/../../core/conexionBd.php';
        $con = (new ConexionBd())->getConexion();
        require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = ["nombre" => $_POST['nombre'],
                "apellido" => $_POST['apellidos'],
                "direccion" => $_POST['direccion'],
                "cp" => $_POST['cp'],
                "ciudad" => $_POST['ciudad']];

            $params = (new UsuarioRepositorio)->actualizarDatos(array($datos), $usuario, $con);
        }

        $params = (new UsuarioRepositorio)->datosUsuario($usuario, $con);

        require __DIR__ . '/../../app/plantillas/editarPerfil.php';
    }

}
