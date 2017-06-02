<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //No es necesaria esta clase por ahora
        echo "probando";
        ?>
        hola
    </body>
</html>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php'; ?>
