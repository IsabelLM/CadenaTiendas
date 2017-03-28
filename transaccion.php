<?php

include './conexion.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$pdo->beginTransaction();

try {

    $sql = "INSERT INTO almacen VALUES (1, 2, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE almacen SET stock = stock - 1 WHERE idTienda = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo 'Transacción realizada';
    $pdo->commit();
}
catch (Exception $e) {
 
    echo $e->getMessage();
    $pdo->rollBack();
}