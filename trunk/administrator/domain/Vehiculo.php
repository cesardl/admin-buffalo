<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vehiculo
 *
 * @author Cesardl
 */
class Vehiculo {

    private $id_vehiculo;
    private $nombre;

    public function __construct() {
        $this->id_vehiculo = 0;
    }

    public function getId_vehiculo() {
        return $this->id_vehiculo;
    }

    public function setId_vehiculo($id_vehiculo) {
        $this->id_vehiculo = $id_vehiculo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}

?>
