<?php
//session_start();

class ArticuloController
{ public function actualizaImagenes()
  { $params = array('nombre'=>'',
                    'art'=>array(),
                  );
    if($_SERVER['REQUEST_METHOD']=='POST')
    { $params['nombre'] = $_POST['nombre'];
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      $params['art'] = (new ArticuloRepositorio)->findArticuloByNombre(array($_POST['nombre']));
    }
    require __DIR__ . '/../../app/plantillas/queArticulo.php';

  }

  public function verArticulo()
  { $id = $_GET['id'];
    require __DIR__ . '/../Repositorio/articuloRepositorio.php';
    $params = (new ArticuloRepositorio)->findArticuloById(array($id));
    require __DIR__ . '/../../app/plantillas/verArticulo.php';
  }

  public function nuevaFoto()
  { $params = array('id' => '',
                    'foto' => '', );
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    require __DIR__ . '/../../app/plantillas/nuevaFoto.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { $params['id'] = $id;
      $params['foto'] = fopen($_FILES['file']['tmp_name'], "r");
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      (new ArticuloRepositorio)->actualizaFoto($params);
    }
  }

}
