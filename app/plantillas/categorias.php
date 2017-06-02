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
                <li><a href="index.php?ctl=categoria&id=<?php echo $index ?>"><?php print_r($categorias[$index]) ?></a></li>
            <?php }
            ?>
        </ul>

        <?php
        //print_r($categorias[$_GET['id']]);
        // print_r($categorias);
        ?>
    </body>
</html>
<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>