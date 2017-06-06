<?php

//session_start();

class ArticuloController {

    public function actualizaImagenes() {
        $params = array('nombre' => '',
            'art' => array(),
        );
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params['nombre'] = $_POST['nombre'];
            require __DIR__ . '/../Repositorio/articuloRepositorio.php';
            $params['art'] = (new ArticuloRepositorio)->findArticuloByNombre(array($_POST['nombre']));
        }
        require __DIR__ . '/../../app/plantillas/queArticulo.php';
    }

    public function verArticulo() {
        $id = $_GET['id'];
        require __DIR__ . '/../Repositorio/articuloRepositorio.php';
        $params = (new ArticuloRepositorio)->findArticuloById(array($id));
        require __DIR__ . '/../../app/plantillas/verArticulo.php';
    }

    public function nuevaFoto() {
        $params = array('id' => '',
            'foto' => '');

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $nombre = $_GET['nombre'];
        }

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $params['id'] = $id;
            $params['foto'] = fopen($_FILES['file']['tmp_name'], "r");
            require __DIR__ . '/../Repositorio/articuloRepositorio.php';
            (new ArticuloRepositorio)->actualizaFoto($params);
        }
        require __DIR__ . '/../../app/plantillas/nuevaFoto.php';
    }

    public function verFoto() {
        $id = $_GET['id'];
        require_once __DIR__ . '/../Repositorio/articuloRepositorio.php';
        $articulo = (new ArticuloRepositorio)->verFoto($id);
    }

    //Obtiene un listado de las categorias que hay. 
    //Si haces click sobre una, se mostrará otro listado de los articulos que pertenecen a dicha categoria.
    public function categoria() {
        require_once __DIR__ . '/../Repositorio/articuloRepositorio.php';
        $categorias = (new ArticuloRepositorio)->obtenerCategorias();
        require_once __DIR__ . '/../../core/conexionBd.php';
        $con = (new ConexionBd())->getConexion();

        //Si se ha pulsado sobre una categoria en concreto se recogerá cual es 
        //y se mostrarán los productos de dicha categoria. 
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id'] != null) {
            $categoriaElegida = ($categorias[$_GET['id']]);
            $todos = false;
            $articulo = (new ArticuloRepositorio)->articuloPorCategoria($_GET['id'], $con, $todos);
        }
        require __DIR__ . '/../../app/plantillas/categorias.php';
    }

    //Muestra un listado de todos los productos.
    public function verTodosArticulos() {
        require_once __DIR__ . '/../../core/conexionBd.php';
        require_once __DIR__ . '/../Repositorio/articuloRepositorio.php';
        $con = (new ConexionBd())->getConexion();
        $todos = true;
        $articulo = (new ArticuloRepositorio)->articuloPorCategoria(null, $con, $todos);
        require __DIR__ . '/../../app/plantillas/verTodosArticulos.php';
    }

    public function anadirAlCarrito() {
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $pvp = $_GET['pvp'];
        $cantidad = 1;
        //Se comprueba si ya se ha cogido un producto. Si no, se crea la sesión producto y se añade

        if (isset($_SESSION['productos'])) {
            $hay = false;
            //Este for es para comprobar si ya existe el producto seleccionado
            for ($index = 0; $index < count($_SESSION['productos']); $index++) {
                //Si existe se modifica la cantidad
                if (in_array($nombre, $_SESSION['productos'][$index])) {
                    $hay = true;
                    $cantidad = $_SESSION['productos'][$index]['cantidad'];
                    $cantidad += 1;
                    $_SESSION['productos'][$index]['cantidad'] = $cantidad;
                    break;
                }
            }
            //Si no existe, se añade el producto al carrito
            if ($hay == false) {
                $_SESSION['productos'][] = array("id" => $id, "nombre" => $nombre, "pvp" => $pvp, "cantidad" => $cantidad);
            }
        } else {
            $_SESSION['productos'][] = array("id" => $id, "nombre" => $nombre, "pvp" => $pvp, "cantidad" => $cantidad);
        }
        if (isset($_SESSION['total'])) {
            $_SESSION['total'] += $pvp;
        } else {
            $_SESSION['total'] = $pvp;
        }

//        header("Location:" . $_SERVER['HTTP_REFERER']);
        require __DIR__ . '/../../app/plantillas/carrito.php';
    }

    public function eliminarArticuloCarrito() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['id'];

            for ($index = 0; $index <= count($_SESSION['productos']); $index++) {
                //Con array_search buscamos si hay coincidencia del nombre del producto en el array de productos
                if (array_search($nombre, $_SESSION['productos'][$index])) {
                    //Sacamos lo que cuesta el producto por la cantidad que hay para restarlo al total del carrito
                    $total = $_SESSION['productos'][$index]["pvp"] * $_SESSION['productos'][$index]["cantidad"];
                    $_SESSION['total'] = $_SESSION['total'] - $total;
                    //Como ha habido coincidencia eliminamos el producto del array
                    unset($_SESSION['productos'][$index]);
                }
            }
        }
        if ($_SESSION['productos'] == null) {
            $_SESSION['total'] = 0;
        }
        //session_destroy();
        // header("Location:" . $_SERVER['HTTP_REFERER']);
        require __DIR__ . '/../../app/plantillas/carrito.php';
    }

    public function eliminarTodoCarrito() {
        $_SESSION['productos'] = null;
        require __DIR__ . '/../../app/plantillas/carrito.php';
    }

    public function tramitarPedido() {
        require_once __DIR__ . '/../../core/conexionBd.php';
        $con = (new ConexionBd())->getConexion();
        $usuario = null;
        $total = $_SESSION['total'];
        $tramitar = null;
        $mensajeError = null;

        //Serie de comprobaciones:        
        //Comprobar si el usuario se ha loggeado como cliente,
        // dar error si es un administrador o no está loggeado
        if (isset($_SESSION['usuarioLoggeado'])) {
            if ($_SESSION['grupo'] == 'admin') {
                $mensajeError = "Tienes que iniciar sesión como cliente";
            }
        } else {
            $mensajeError = "tienes que loggearte";
        }
        //Si no hay errores:
        if ($mensajeError == null) {
            $usuario = $_SESSION['usuario'];
            //Si el carrito está vacío impedir la acción
            if ($_SESSION['productos'] == null) {
                $mensajeError = "Lo sentimos, el carrito está vacio.";
                //Si el carro está lleno y se han aceptado los datos de usuario, 
                //se procede a realizar el pedido 
            } else {
                //Primero se mostrarán los datos del usuario  para que compruebe que todo está correcto
                //Si es así le dará a tramitar pedido, si hay algo mal podrá editarlo.
                require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
                $params = (new UsuarioRepositorio)->datosUsuario($usuario, $con);
            }
            //Si se le ha dado a tramitar el pedido, se insertará en la bbdd
            //Una vez hecho se borrará el carrito.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require_once __DIR__ . '/../Repositorio/articuloRepositorio.php';
                $tramitar = (new ArticuloRepositorio)->tramitarPedido($usuario, intval($total), $con);
                if ($tramitar != false) {
                    $_SESSION['productos'] = null;
                    $_SESSION['total'] = 0;
                }
            }
        }
        require __DIR__ . '/../../app/plantillas/tramitarPedido.php';
    }

}
