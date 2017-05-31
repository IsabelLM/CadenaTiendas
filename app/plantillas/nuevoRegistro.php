<?/php ob_start() ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro usuarios nuevos</title>
        <link rel="stylesheet" type="text/css" href='web/css/estilo.css' />
    </head>
    <body>
        <div >
            <h1>Formulario de registro para nuevos usuarios</h1>
            <form action="index.php?ctl=nuevoRegistro" method="POST" class="formPerfil">
                Usuario*: <input type="text" name="usuario" value=""required> <br>
                Contraseña*: <input type="password" name="contra" required><br>
                <b>Datos de facturación</b><br>
                Nombre: <input type="text" name="nombre" ><br>
                Apellidos: <input type="text" name="apellidos" ><br>
                Direccion: <input type="text" name="direccion" ><br>
                Ciudad: <input type="text" name="ciudad" ><br>
                C.P: <input type="text" name="cp" ><br>
                <input type="submit" value="Registrarse">
                Los campos con * son obligatorios.
            </form> 

        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "Te has registrado correctamente. Ya puedes iniciar sesión.";
        }
        ?>
    </body>
</html>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
