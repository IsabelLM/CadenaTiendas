<?php
  require_once "../conexion/conexion.php";

  function mostrarDatosTabla(){
    global $con;
    $gsent = $con->prepare("SELECT id, nombreCorto, nombre, descripcion, PVP, foto FROM articulo");
            $gsent->execute();
            //se desplegaran los resultados en la tabla
            echo "<table align='center' border='5'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>REFERENCIA</th>";
            echo "<th>NOMBRE</th>";
            echo "<th>DESRIPCIÓN</th>";
            echo "<th>PVP</th>";
            echo "<th>FOTO</th>";
            echo "</tr>";
        $resultado=$gsent->fetchAll($con::FETCH_ASSOC);
        foreach ($resultado as $key=>$value) {
          $id=$value['id'];
          $nombre=$value['nombre'];
          $nombreCorto=$value['nombreCorto'];
          $descripcion=$value['descripcion'];
          $pvp=$value['PVP'];
          $foto=$value['foto'];
echo '<tr>';
          echo "<td>".$id."</td>";
          echo "<td>".$nombreCorto."</td>";
          echo "<td>".$nombre."</td>";
          echo "<td>".nl2br(stripcslashes(substr($descripcion,0,150)))."<a href='./detalleProducto.php?id=".$id."'><b>...leer más</b></a></td>";
          echo "<td>".$pvp."€</td>";
          formBotonImagen($id,$nombre,$foto);
echo '</tr>';

        }
        echo '</table>';
  }

function formBotonImagen($id,$nombre,$foto){

if (is_null($foto)){
 echo "<td><form align='center' action='../vistas/subirImagen.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='id' value='".$id."'>
              <input type='hidden' name='nombre' value='".$nombre."'>
               <input type='submit' name='submit' value='Subir Imagen'>

       </form></td>";
     } else{
       echo "<td><img  src='../controladores/foto.php?productId=".$id."' height='100' align='center'/></td>";
     }

}
?>
  <!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <title>Tiendas: Subir imagen articulo</title>
    </head>
    <body>
    <h1 align='center'>Cadena Tiendas</h1>
<?php  mostrarDatosTabla() ?>
