
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
                    <form action="index.php?ctl=inicioSesion" id="formLogin" method="POST">
                        Usuario: <input type="text" name="usuario" value=""required> <br>
                        Contraseña: <input type="password" name="contra"  required><br>
                        <input type="submit" value="Iniciar Sesión">
                    </form>
                    <a href="index.php?ctl=nuevoRegistro">Registrarse</a>

                </div>

                <?php
            } else {
                ?>            
                <div class="formularioInicioSesion">Bienvenido/a <b><?php echo $_SESSION['usuario'] ?></b>
                    <a href="index.php?ctl=cerrarSesion">Cerrar sesion</a></div>

            <?php }
            ?>

        </header>

        <hr>
        <div id="header">
            <ul class="nav">
                <li><a href="index.php?ctl=inicio">Inicio</a> </li>
                <li><a href="index.php?ctl=categoria&id=">Categorias</a></li>
                <li><a href="index.php?ctl=verTodosArticulos">Todos los productos</a>   </li>
                <li><a href="">Nuestras tiendas</a>   </li>
                <?php
                if (isset($_SESSION['grupo'])) {
                    //Se comprueba si el grupo pertenece a admin para poder darle acceso a otros sitios  
                    if ($_SESSION['grupo'] == 'admin') {
                        ?>
                        <li> <a href="index.php?ctl=actualizaImagenes">Actualizar imágenes</a> </li>
                        <?php
                    }
                }
                if (isset($_SESSION['grupo'])) {
                    //Se comprueba si el grupo pertenece a cliente se le dará acceso a poder editar su perfil 
                    if ($_SESSION['grupo'] == 'cliente') {
                        ?>
                        <li> <a href="index.php?ctl=editarPerfil">Mi cuenta</a></li>
                        <?php
                    }
                }
                ?>                       
            </ul>
            <div id="carrito">Carrito
                <div id="infoCarrito">
                    <table>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                        </tr>
                        <?php
                        if (isset($_SESSION['productos'])) {
                            foreach ($_SESSION['productos'] as $key => $value) {
                                ?>  <tr><?php
                                    foreach ($value as $value2) {
                                        ?>
                                        <td><?php echo $value2 ?></td>

                                        <?php
                                    }
                                    ?></tr><?php
                            } {
                                
                            }
                            ?><tr><th>Total</th><td><?php echo $_SESSION['total'] . "€" ?></td></tr>
                                
                            <?php
                        }
                        ?>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <br>
        <hr>



    </body>
    <div id="contenido">
        <?= $contenido ?>
    </div>
    <footer>
        <hr>
        <p align="center">- Pie de página -</p>
    </footer>
</body>
</html>
