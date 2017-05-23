<?php ob_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro usuarios nuevos</title>
        <link rel="stylesheet" type="text/css" href='web/css/estilo.css' />
    </head>
    <body>
        <h2>Perfil de  <b><?php echo $_SESSION['usuario'] ?></b></h2>
        <form action="editarPerfil.php" method="POST" class="formPerfil">
            <b>Datos de facturación</b><br>
            <label>Nombre:</label> <input type="text" name="nombre" placeholder="prueba"><br>
            <label>Apellidos:</label> <input type="text" name="apellidos" placeholder="prueba" ><br>
            <label>Direccion:</label> <input type="text" name="direccion" placeholder="prueba"><br>
            <label>Ciudad: </label><input type="text" name="ciudad" placeholder="prueba"><br>
            <label>C.P:</label> <input type="text" name="cp" placeholder="prueba" ><br>
        </form>
    </body>
</html>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
