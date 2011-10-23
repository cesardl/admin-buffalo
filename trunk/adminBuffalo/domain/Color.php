<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Color
 *
 * @author Cesardl
 */
class Color {

    private $id_color;
    private $nombre;
    private $codigo;

    public function __construct() {
        $this->id_color = 0;
    }

    public function getId_color() {
        return $this->id_color;
    }

    public function setId_color($id_color) {
        $this->id_color = $id_color;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

}

?>
