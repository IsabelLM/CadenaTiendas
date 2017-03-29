<?php
require_once 'conexion.php';

function muestraFormSubirFoto($idProducto, $nombre) {
    echo "<h3 align='center'>Subir foto</h3>";
    echo "<h4 align='center'>$nombre</h4>";
    echo "<form align='center' action='fotoArticulo.php'
            enctype='multipart/form-data' method='POST'>
            <input type='hidden' name='accion' value='subeFoto'>
            <input type='hidden' name='idProducto' value='$idProducto'>
            <table align='center'>
              <tr>
                <td align='center'>
                  <input id='nombArch' type='file' name='file'>
                </td>
              </tr>
              <tr>
                <td align='center'>
                  <input type='submit' name='submit' value='Subir foto'>
                </td>
              </tr>
            </table>
          </form>";
}

function inicioTablaProductos($cantFilas) {
    $cabeceras = array("Id Producto", "Nombre", "Descripcion", "PVP");
    echo "<table align='center' cellpadding='5'>";
    echo "<tr bgcolor='silver'>$cantFilas Resultados</tr>
          <tr>";
    foreach ($cabeceras as $cabecera) {
        echo "<td>$cabecera</td>";
    }
    echo "</tr>";
}

function finalTablaProductos() {
    echo "</table><br>";
}

function muestraBotonFoto($idProducto) {
    echo "<table align='center'>
            <form action='appEjemplo.php' enctype='multipart/form-data' method='POST'>
              <input type='hidden' name='accion' value='cargarfoto'>
              <input type='hidden' name='idProducto' value='$idProducto'>
              <input type='submit' name='submit' value='Cargar foto'>
              </p></td></tr>
            </form>
          </table>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cargar foto articulo</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        ?>
    </body>
</html>
