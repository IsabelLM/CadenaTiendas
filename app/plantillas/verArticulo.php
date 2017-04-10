

<?php ob_start() ?>

<h1><?= $params['nombre'] ?></h1>
<table  border="1">
  <tr>
    <td>Descripción</td>
    <td><?= $params['descripcion'] ?></td>
  </tr>
  <tr>
    <td>Precio</td>
    <td><?= $params['PVP']?></td>
  </tr>
  <tr>
    <td>Imagen</td>
    <td><img src='<?= $params['foto'] ?>' height='150' width='150'></td>
    <td><a href="index.php?ctl=nuevaFoto&id=<?= $params['id'] ?>&nombre=<?= $params['nombre'] ?>">Subir nueva foto</a></td>
  </tr>
</table>
<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>
