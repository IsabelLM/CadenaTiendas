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

        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        require __DIR__ . '/../../app/plantillas/nuevaFoto.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params['id'] = $id;
            $params['foto'] = fopen($_FILES['file']['tmp_name'], "r");
            require __DIR__ . '/../Repositorio/articuloRepositorio.php';
            (new ArticuloRepositorio)->actualizaFoto($params);
        }
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

        $_SESSION['productos'][] = array("nombre" => $nombre, "pvp" => $pvp);
        $_SESSION['total'] += $pvp;
        //echo "total:" . $_SESSION['total'];
        //session_destroy();
//        $_SESSION['idArticulo'] = $id;
//        $_SESSION['nombreArticulo'] = $nombre;
//        $_SESSION['PVP'] = $pvp;
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

}
