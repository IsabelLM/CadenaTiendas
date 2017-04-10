<?php ob_start() ?>

  <form name="formBusqueda" action="index.php?ctl=actualizaImagenes" method="POST">
    <h4>Introduzca términos de búsqueda de artículos</h4>
    <table>
      <tr>
        <td>Nombre articulo:</td>
        <td><input type="text" name="nombre" value="<?php echo $params['nombre']?>"></td>
        <td><input type="submit" value="buscar"></td>
      </tr>
    </table>
  </form>
<?php if(count($params['art'])>0): ?>
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

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
