<?php

try{
  //global $con;
  $serv = "(local)\sqlexpress";
  $con =new PDO("sqlsrv:Server=$serv;Database=CadenaTiendas");
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch( PDOException $Exception ) {

    print "Error: ".$Exception->getMessage( )."<br>";
    die();
}

?>
