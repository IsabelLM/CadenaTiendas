<?/php ob_start() ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro usuarios nuevos</title>
        <link rel="stylesheet" type="text/css" href='web/css/estilo.css' />
    </head>
    <body id="registro">
        <div >
            <h1>Formulario de registro para nuevos usuarios</h1>

            <form action="index.php?ctl=nuevoRegistro" method="POST">
                Usuario: <input type="text" name="usuario" value=""required> <br>
                Contraseña: <input type="password" name="contra" required><br>
                <input type="submit" value="Registrarse">
            </form>
            <a href="index.php?ctl=inicio">Inicio</a>

        </div>

    </body>
</html>
<?/php $contenido = ob_get_clean() ?>

<?/php include 'base.php' ?>
