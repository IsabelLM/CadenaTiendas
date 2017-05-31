<?php ob_start() ?>
<?php

if (isset($_SESSION['usuarioLoggeado']) != null) {
    echo "Has iniciado sesión como <b>" . $_SESSION['usuario'] . "</b>";
} else if (isset($_SESSION['error']) == true) {
    echo "los datos son erroneos";
} else {
    echo "Has cerrado sesión.";
}
?>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
