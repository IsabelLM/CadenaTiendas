<?php

require_once 'conexion.php';
//include 'conexion.php';

$pdo->beginTransaction();

try {

    $sql = "INSERT INTO almacen VALUES (1, 2, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE almacen SET stock = stock - 1 WHERE idArticulo = 1 AND idTienda = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $pdo->commit();

    echo 'Transacción realizada';
}
catch (Exception $e) {
 
    echo $e->getMessage();
    $pdo->rollBack();
}