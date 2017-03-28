<?php

//Conexion con PDO

$pdo = new PDO("sqlsrv:Server=localhost;Database=CadenaTiendas", "", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//Para probar que funciona la conexion:

//try{
//$c = new PDO("sqlsrv:Server=localhost;Database=CadenaTiendas", "", "");
//
// foreach($c->query('SELECT * from articulo') as $fila) {
//        print_r($fila);
//    }
//    $c = null;
//} catch (PDOException $e) {
//    print "¡Error!: " . $e->getMessage() . "<br/>";
//    die();
//}

//Para cerrar la conexion

//$c = null;