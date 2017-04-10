<?php
session_start();

//index.php
/*include __DIR__ . '/core/conexionBd.php';
new ConexionBd(); */

require_once __DIR__ . '/fuente/Modelo/articulo.php';
require_once __DIR__ . '/fuente/Modelo/usuario.php';
require_once __DIR__ . '/fuente/Controlador/defaultController.php';
require_once __DIR__ . '/fuente/Controlador/articuloController.php';
require_once __DIR__ . '/fuente/Controlador/usuariosController.php';

require_once __DIR__ . '/app/conf/rutas.php';


// Parseo de la ruta
if (isset($_GET['ctl']))
{ if (isset($mapeoRutas[$_GET['ctl']]))
  { $ruta = $_GET['ctl'];
  }else
  { header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: No existe la ruta <i>' .
          $_GET['ctl'] .
          '</p></body></html>';
    exit;
  }
}else
{ $ruta = 'inicio';
}

$controlador = $mapeoRutas[$ruta];
// Ejecución del controlador asociado a la ruta

if (method_exists($controlador['controller'],$controlador['action']))
{ call_user_func(array(new $controlador['controller'], $controlador['action']));
}else
{ header('Status: 404 Not Found');
  echo '<html><body><h1>Error 404: El controlador <i>' .
       $controlador['controller'] .
       '->' . $controlador['action'] .
       '</i> no existe</h1></body></html>';
}
