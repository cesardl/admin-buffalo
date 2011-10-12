<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Master
 *
 * @author Cesardl
 */
class Master {

    private $id_master;
    private $clase;
    private $id_vehiculo;

    public function __construct() {
        $this->id_master = 0;
        $this->id_vehiculo = 0;
    }

    public function getId_master() {
        return $this->id_master;
    }

    public function setId_master($id_master) {
        $this->id_master = $id_master;
    }

    public function getClase() {
        return $this->clase;
    }

    public function setClase($clase) {
        $this->clase = $clase;
    }

    public function getId_vehiculo() {
        return $this->id_vehiculo;
    }

    public function setId_vehiculo($id_vehiculo) {
        $this->id_vehiculo = $id_vehiculo;
    }

}

?>
