<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <ul id="listadoCategorias">
            <?php for ($index = 1; $index < count($categorias); $index++) {
                ?>
                <li><a href="index.php?ctl=categoria&id=<?php echo $index ?>"><?php print_r($categorias[$index]) ?></a></li>
            <?php }
            ?>
        </ul>
        <div id="vistaCategoria">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['id'] != null) {
                ?>
                <h3><?php echo $categoriaElegida; ?></h3>
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
                    </table><?php
                } else {
                    echo "No hay articulos en esta categoria";
                }
            }
            ?>
        </div>

    </body>
</html>
<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>