<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($articulo != null) {
            ?>
            <table id="tablaCategoria">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
                <?php
                foreach ($articulo as $key => $value) {
                    foreach ($value as $value2) {
                        ?>
                        <tr>
                            <td><?php echo $value2[0]; ?></td>
                            <td><?php echo $value2[1] . " €"; ?></td> 
                            <td><a href="index.php?ctl=verArticulo&id=<?php echo $value2[2] ?>">Ver más</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table><?php }
            ?>
    </body>
</html>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php'; ?>
