<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($mensajeError != null) {
            echo $mensajeError;
        } else
        if ($tramitar == true) {
            echo "Pedido realizado con éxito. ";
        } else {
            ?>
            <table id="tablaCategoria"><h4>Datos facturación</h4>
                <tr>
                    <th>Nombre:</th>
                    <td><?= $params['nombre'] ?></td>
                </tr>
                <tr>
                    <th>Apellidos:</th>
                    <td><?= $params['apellido'] ?></td>
                </tr>
                <tr>
                    <th>Direccion:</th>
                    <td><?= $params['direccion'] ?></td>
                </tr>
                <tr>
                    <th>CP:</th>
                    <td><?= $params['cp'] ?>"</td>
                </tr>
                <tr>
                    <th>Ciudad:</th>
                    <td><?= $params['ciudad'] ?></td>
                </tr>
            </table>
            Puede editar su perfil <a href="index.php?ctl=editarPerfil">aquí</a>
            <br>
            <form action="index.php?ctl=tramitarPedido" method="POST">
                <input type="submit" value="Tramitar pedido">
            </form>
            <?php
        }
        ?>


    </body>
</html>
<?php $contenido = ob_get_clean() ?>
<?php include 'base.php'; ?>