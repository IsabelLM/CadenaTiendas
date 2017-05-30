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
            <label>Nombre:</label> <input type="text" name="nombre" placeholder="<?= $params['nombre'] ?>"><br>
            <label>Apellidos:</label> <input type="text" name="apellidos" placeholder="<?= $params['apellido'] ?>"><br>
            <label>Direccion:</label> <input type="text" name="direccion" placeholder="<?= $params['direccion'] ?>"><br>
            <label>C.P:</label> <input type="text" name="cp" placeholder="<?= $params['cp'] ?>"><br>
            <label>Ciudad: </label><input type="text" name="ciudad" placeholder="<?= $params['ciudad'] ?>"><br>
            <input type="submit" value="Guardar Cambios ">
        </form>
    </body>
</html>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
