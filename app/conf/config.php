<?php
class configuracion
{ private $dbParams = array("driver"=>"pdo_sqlsrv",
                            "server"=>"(local)",
                            "port"=>"1433",
                            "database"=>"CadenaTiendas",
                            "user"=>null,
                            "pass"=>null,
                            "charset"=>"utf-8");

  public function __construct()
  {
  }

  public function getDbParams()
  { return $this->dbParams;

  }
}
