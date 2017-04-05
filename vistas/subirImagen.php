<?php

require_once "../conexion/conexion.php";

$id=(isset($_POST['id']))? $_POST['id']: null;
$nombre=(isset($_POST['nombre']))? $_POST['nombre']: "No data display";
//  http://php.net/manual/es/pdo.lobs.php

function muestraFormSubirFoto($id,$nombre)
{ echo "<h3 align='center'>Subir foto</h3>";
  echo "<form align='center' action='../controladores/insertarImagen.php' enctype='multipart/form-data' method='POST'>
          <table align='center'>
            <tr>
            <td>".$id."</td>
            <td>".$nombre."</td>
              <td align='center'>
                <input id='fotoArticulo' type='file' name='file'>
              </td>
            </tr>
            <tr>
              <td align='center'>
                <input type='hidden' name='id' value='".$id."'>
                <input type='submit' name='submit' value='Subir Imagen'>
              </td>
            </tr>
          </table>
        </form>";
}

muestraFormSubirFoto($id,$nombre);
