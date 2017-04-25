<?php ob_start() ?>
<?php
if (isset($_SESSION['grupo'])) {
    //Se comprueba si el grupo pertenece a admin para poder darle acceso a otros sitios  
    if ($_SESSION['grupo'] == 'admin') {
        ?>
        <form name="formBusqueda" action="index.php?ctl=actualizaImagenes" method="POST">
            <h4>Introduzca términos de búsqueda de artículos</h4>
            <table>
                <tr>
                    <td>Nombre articulo:</td>
                    <td><input type="text" name="nombre" value="<?php echo $params['nombre'] ?>"></td>
                    <td><input type="submit" value="buscar"></td>
                </tr>
            </table>
        </form>
        <?php if (count($params['art']) > 0): ?>
            <table class="tablaArticulos">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Pvp</th>
                </tr>
                            <?php foreach ($params['art'] as $articulo) : ?>
                    <tr>
                        <td><a href="index.php?ctl=verArticulo&id=<?php echo $articulo['id'] ?>">
                <?= $articulo['nombre'] ?></a></td>
                        <td><?= $articulo['descripcion'] ?></td>
                        <td><?= $articulo['PVP'] //setlocale(LC_MONETARY, 'es_ES.utf8'); echo money_format('%i', $articulo['PVP']); ?></td>
                    </tr>
            <?php endforeach; ?>

            </table>
        <?php endif; ?>
    <?php }
    //Si es un cliente se le indica que no puede tener acceso
    else echo "Solo los administradores tienen acceso" ;
    //Si no se ha iniciado sesión se indica que debe hacerlo como admin
} else echo "Inicia sesión si eres un administrador"  ?>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
