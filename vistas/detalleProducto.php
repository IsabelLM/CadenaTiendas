<?php
  require_once "../conexion/conexion.php";

 $id=(isset($_GET['id']))? $_GET['id']: null;
  function mostrarDetalles($id){
    global $con;
    $gsent = $con->prepare("SELECT id, nombreCorto, nombre, descripcion, PVP, foto FROM articulo WHERE id=".$id.";");
            $gsent->execute();
        $resultado=$gsent->fetchAll($con::FETCH_ASSOC);
      echo "<table align='center'>";
        foreach ($resultado as $key=>$value) {
          $id=$value['id'];
          $nombre=$value['nombre'];
          $nombreCorto=$value['nombreCorto'];
          $descripcion=$value['descripcion'];
          $pvp=$value['PVP'];
          $foto=$value['foto'];

          formBotonImagen($id,$nombre,$foto);
          echo "<tr><td><h3>".$nombre."</h3></td>";
          echo "<td><h3>--".$pvp."€</h3></td></tr>";
          echo "<tr><td colspan='4'>".nl2br(stripcslashes($descripcion))."<br><a href='./formSubirImagen.php'><b>Volver a la tabla</b></a></td></tr>";

        }
        echo '</table>';

  }

function formBotonImagen($id,$nombre,$foto){

if (is_null($foto)){
 echo "<tr><td colspan='4'><form align='center' action='../vistas/subirImagen.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='id' value='".$id."'>
              <input type='hidden' name='nombre' value='".$nombre."'>
               <input type='submit' name='submit' value='Subir Imagen'>

       </form></td></tr>";
     } else{
       echo "<tr><td colspan='4'  align='center'><img src='../controladores/foto.php?productId=".$id."' width='150'/></td></tr>";
     }

}
?>
  <!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <title>Detalle Producto</title>
    </head>
    <body>
    <h1 align='center'>Detalle Producto</h1>
<?php  mostrarDetalles($id) ?>
