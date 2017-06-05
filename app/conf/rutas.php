<?php

// enrutamiento
$mapeoRutas = array(
    'inicio' =>
    array('controller' => 'defaultController', 'action' => 'inicio'),
    'actualizaImagenes' =>
    array('controller' => 'articuloController', 'action' => 'actualizaImagenes'),
    'verArticulo' =>
    array('controller' => 'articuloController', 'action' => 'verArticulo'),
    'nuevaFoto' =>
    array('controller' => 'articuloController', 'action' => 'nuevaFoto'),
    'categoria' =>
    array('controller' => 'articuloController', 'action' => 'categoria'),
    'verTodosArticulos' =>
    array('controller' => 'articuloController', 'action' => 'verTodosArticulos'),
    'verFoto' =>
    array('controller' => 'articuloController', 'action' => 'verFoto'),
    'anadirCarrito' =>
    array('controller' => 'articuloController', 'action' => 'anadirAlCarrito'),
    'nuevoRegistro' =>
    array('controller' => 'usuariosController', 'action' => 'nuevoRegistro'),
    'inicioSesion' =>
    array('controller' => 'usuariosController', 'action' => 'inicioSesion'),
    'cerrarSesion' =>
    array('controller' => 'usuariosController', 'action' => 'cerrarSesion'),
    'editarPerfil' =>
    array('controller' => 'usuariosController', 'action' => 'editarPerfil'),
    
);
