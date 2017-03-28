<?php

//
//$serverName = "C6PC15\SQLEXPRESS";
//$conInfo = array("Database" => "CadenaTiendas");
//
//$conn = sqlsrv_connect($serverName, $conInfo);
//
//if ($conn) {
//    echo "Conexión establecida.<br />";
//} else {
//    echo "Conexión no se pudo establecer.<br />";
//    die(print_r(sqlsrv_errors(), true));
//}
//
//Conexion con PDO

$pdo = new PDO("sqlsrv:Server=localhost;Database=CadenaTiendas", "", "");



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