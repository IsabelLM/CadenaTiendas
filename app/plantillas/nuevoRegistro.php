<?/php ob_start() ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro usuarios nuevos</title>
        <link rel="stylesheet" type="text/css" href='web/css/estilo.css' />
    </head>
    <body id="registro">
        <div >
            
            <!--Añadir que se puede ver/modificar el perfil del usuario-->
            <h1>Formulario de registro para nuevos usuarios</h1>
            <form action="index.php?ctl=nuevoRegistro" method="POST">
                Usuario: <input type="text" name="usuario" value=""required> <br>
                Contraseña: <input type="password" name="contra" required><br>
                <b>Datos de facturación</b><br>
                Nombre: <input type="text" name="nombre" ><br>
                Apellidos: <input type="text" name="apellidos" ><br>
                Direccion: <input type="text" name="direccion" ><br>
                Ciudad: <input type="text" name="ciudad" ><br>
                C.P: <input type="text" name="cp" ><br>
                <input type="submit" value="Registrarse">
            </form>
            <a href="index.php?ctl=inicio">Inicio</a>

        </div>

    </body>
</html>
<?/php $contenido = ob_get_clean() ?>

<?/php include 'base.php' ?>
