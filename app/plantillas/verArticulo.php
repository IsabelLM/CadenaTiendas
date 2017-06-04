<?php ob_start() ?>

<h1><?= $params['nombre'] ?></h1>
<table>
    <tr>
        <th>Descripción</td>
        <td><?= $params['descripcion'] ?></td>
    </tr>
    <tr>
        <th>Precio</td>
        <td><?= $params['PVP'] ?></td>
    </tr>
    <tr>
        <th>Imagen</td>
        <td><img src='index.php?ctl=verFoto&id=<?= $params['id'] ?>' height='150' ></td>
        <td><?php
            if (isset($_SESSION['grupo'])) {
                //Se comprueba si el grupo pertenece a admin para poder darle acceso a otros sitios  
                if ($_SESSION['grupo'] == 'admin') {
                    ?><a href="index.php?ctl=nuevaFoto&id=<?= $params['id'] ?>&nombre=<?= $params['nombre'] ?>">Subir nueva foto</a>
                    <?php
                }//Si no es el admin, estará disponible la opción para comprar el articulo
            } else {
                ?><a href="">Añadir al carrito</a><?php
            }
            ?>

        </td>
    </tr>
</table>
<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>
