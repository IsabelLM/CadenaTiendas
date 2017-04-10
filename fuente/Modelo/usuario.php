<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Isabel
 */
class usuario {

    private $usuario;
    private $contra;

    public function __contrunct() {
        
    }

    public function setUsuario($aUsuario) {
        $this->usuario = $aUsuario;
    }

    public function setContra($aContra) {
        $this->contra = $aContra;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getContra() {
        return $this->contra;
    }

}
