<?php ob_start() ?>

<?php if(isset($params['mensaje'])) :?>
  <b><span style="color: red;"><?= $params['mensaje'] ?></span></b>
<?php endif; ?>

<h3>Subir foto</h3>
<h4 ><?= $nombre ?></h4>
<form align='center' action='index.php?ctl=nuevaFoto'
          enctype='multipart/form-data' method='POST'>
  <table align='center'>
    <tr>
      <td align='center'>
        <input id='nombreArch' type='file' name='file'>
      </td>
    </tr>
    <tr>
      <td align='center'>
        <input type='submit' name='subeFoto' value='Subir foto'>
      </td>
    </tr>
  </table>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
