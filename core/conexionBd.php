<?php
require_once __DIR__ . '/../app/conf/config.php';
//session_start();

class ConexionBd
{ private $con;

  public function __construct()
  { $params = (new Configuracion())->getDbParams();
    //$uid = file_get_contents("C:\AppData\uid.txt");
    //$pwd = file_get_contents("C:\AppData\pwd.txt");
    try
    { $this->con = new PDO("sqlsrv:server={$params['server']},{$params['port']};Database={$params['database']}", //$uid, $pwd);
                           $params['user'], $params['pass']);
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $ex)
    { die("Error de conexión".$ex->getMessage());
    }
  }

  public function getConexion()
  { return $this->con;
  }
}
