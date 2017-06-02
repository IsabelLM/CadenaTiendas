<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <ul>
            <?php for ($index = 1; $index < count($categorias); $index++) {
                ?>
                <li><?php print_r($categorias[$index]) ?></li>
            <?php }
            ?>
        </ul>
        <?php
        print_r($categorias);
        ?>
    </body>
</html>
<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>