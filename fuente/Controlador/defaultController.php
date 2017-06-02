<?php

class DefaultController {

    public function inicio() {
        $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
            'fecha' => date('d-m-Y'),);
        require __DIR__ . '/../../app/plantillas/inicio.php';
    }

    public function categorias() {
        require __DIR__ . '/../../app/plantillas/categorias.php';
    }

}
