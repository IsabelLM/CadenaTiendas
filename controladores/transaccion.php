<?php
require_once "../conexion/conexion.php";
/*si no consigue cargar el archivo especificado informa el error. Como sólo lo necesitamos una vez informamos require_once
Include intenta cargarlo pero no informa si existe algún error.*/

  try{
      $con->beginTransaction();
      $consultaUpdate = "UPDATE almacen SET stock = stock - 1 WHERE idArticulo = 1 AND idTienda = 1";
      $con->exec($consultaUpdate);

      $consultaInsert = "INSERT INTO almacen (idArticulo, idTienda, stock) VALUES (1, 2, 1)";
      $con->exec($consultaInsert);

      $con->commit();

  }catch( Exception $Exception ) {

    $con->rollBack();
    $Exception->getMessage( );
}

  ?>
