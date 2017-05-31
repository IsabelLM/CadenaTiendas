<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro usuarios nuevos</title>
        <link rel="stylesheet" type="text/css" href='web/css/estilo.css' />
    </head>
    <body>
        <h2>Perfil de  <b><?php echo $_SESSION['usuario'] ?></b></h2>
        <form action="index.php?ctl=editarPerfil" method="POST" class="formPerfil">
            <b>Datos de facturación</b><br>
            <label>Nombre:</label> <input type="text" name="nombre" value="<?= $params['nombre'] ?>"><br>
            <label>Apellidos:</label> <input type="text" name="apellidos" value="<?= $params['apellido'] ?>"><br>
            <label>Direccion:</label> <input type="text" name="direccion" value="<?= $params['direccion'] ?>"><br>
            <label>C.P:</label> <input type="text" name="cp" value="<?= $params['cp'] ?>"><br>
            <label>Ciudad: </label><input type="text" name="ciudad" value="<?= $params['ciudad'] ?>"><br>
            <input type="submit" value="Guardar Cambios ">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "Los datos han sido actualizados con éxito";
        }
        ?>
    </body>
</html>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
