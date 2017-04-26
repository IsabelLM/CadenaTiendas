<?php ob_start() ?>
<?php  if (isset($_SESSION['usuarioLoggeado']) == false){
    echo "Has cerrado sesión";
}else{
    echo "Has iniciado sesión como ". $_SESSION['usuario'];
}
?>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
