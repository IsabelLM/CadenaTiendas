<?php
 $serverName = "(local)\sqlexpress";

 // Conecta mediante autenticación Windows
 try
 { $con = new PDO("sqlsrv:server=$serverName;Database=AdventureWorks2012", "", "");
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(Exception $e)
 { die(print_r( $e->getMessage()));
 }

 // Consigue la foto del producto de un Id de producto dadod
 try
 { $sql = "SELECT LargePhoto
              FROM Production.ProductPhoto AS p
        INNER JOIN Production.ProductProductPhoto AS q
                ON p.ProductPhotoID = q.ProductPhotoID
             WHERE ProductID = ?";
   $cursor = $con->prepare($sql);
   $cursor->execute(array($_GET['productId']));
   $cursor->bindColumn(1, $imagen, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
   $cursor->fetch(PDO::FETCH_BOUND);
   echo $imagen;
 }catch(Exception $ex)
 { die(print_r($ex->getMessage()));
 }
?>
