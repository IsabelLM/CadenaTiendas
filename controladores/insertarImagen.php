<?php

require_once "../conexion/conexion.php";

$id=(isset($_POST['id']))? $_POST['id']: null;

function insertarFoto($id)
{
  global $con;
try
{ $sql = "UPDATE articulo
            SET foto = ?
          WHERE id = ".$id.";";
  $subeFoto = $con->prepare($sql);
  $fileStream = fopen($_FILES['file']['tmp_name'], "r");
  $subeFoto->bindParam(1, $fileStream, PDO::PARAM_LOB, 0,
                                       PDO::SQLSRV_ENCODING_BINARY);
  $subeFoto->execute();


}catch(Exception $ex)
{ die(print_r($ex->getMessage()));
}
}

insertarFoto($id);
//Redirecciona a la página inicial en la cual se muestra la tabla de datos actualizada.
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '../vistas/formSubirImagen.php';
header("Location: http://$host$uri/$extra");
exit;
