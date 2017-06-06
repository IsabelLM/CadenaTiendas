<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table id="tablaCategoria">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            <?php
            if (isset($_SESSION['productos'])) {

                foreach ($_SESSION['productos'] as $key => $value) {
                    ?>  <tr>
                        <td>
                            <?php echo $value["nombre"]; ?>
                        </td>
                        <td>
                            <?php echo $value["pvp"]; ?>
                        </td>
                        <td>
                            <?php echo $value["cantidad"]; ?>
                        </td>
                        <td><form action="index.php?ctl=eliminarArticuloCarrito" method="POST">
                                <input type="text" hidden name="id" value="<?php echo $value["nombre"]; ?>" >
                                <input type="submit" value="Eliminar">
                            </form>
                        </td></tr><?php
                }
                ?><tr><th>Total</th><td colspan="2">
                            <?php
                            if (isset($_SESSION['total'])) {
                                echo $_SESSION['total'] . "€";
                            } else {
                                echo "yoquese";
                                echo "0€";
                            }
                            ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <a href="index.php?ctl=eliminarTodoCarrito">Eliminar todo el carrito</a><br>
        <a href="index.php?ctl=tramitarPedido">Tramitar pedido</a>
</html>
<?php $contenido = ob_get_clean() ?>
<?php include "base.php" ?>