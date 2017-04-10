
<!DOCTYPE html>
<html>
    <head>
        <title>Cadena Tiendas</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href='web/css/estilo.css' />
    </head>
    <body>
        <header>
            <h1>Cadena Tiendas Media</h1>
            <?php
            if (isset($_SESSION['usuarioLoggeado']) == false) {
                ?>
                <div class="formularioInicioSesion" >
                    <form action="index.php?ctl=inicioSesion" method="POST">
                        Usuario: <input type="text" name="usuario" value=""required> <br>
                        Contraseña: <input type="password" name="contra"  required><br>
                        <input type="submit" value="Iniciar Sesión">
                    </form>
                    <form action="index.php?ctl=nuevoRegistro" method="POST">   
                        <input type="submit" value="Registrarse">
                    </form>
                </div>

                <?php
            } else {
                ?>            
                <div class="formularioInicioSesion">Bienvenido <?php echo $_SESSION['usuario']?>
                    <a href="index.php?ctl=cerrarSesion">Cerrar sesion</a></div>

            <?php }
            ?>
        </header>

        <hr>
        <a href="index.php?ctl=inicio">Inicio</a> |
        <a href="index.php?ctl=actualizaImagenes">Actualizar imágenes</a> |
        <hr>
    </body>
    <div id="contenido">
        <?= $contenido ?>
    </div>
    <footer>
        <hr>
        <p align="center">- Pie de página -</p>
        <footer>
            </body>
            </html>
